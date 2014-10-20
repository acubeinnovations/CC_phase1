<?php
/**********************************************************************
    Copyright (C) FrontAccounting, LLC.
	Released under the terms of the GNU General Public License, GPL, 
	as published by the Free Software Foundation, either version 3 
	of the License, or (at your option) any later version.
    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  
    See the License here <http://www.gnu.org/licenses/gpl-3.0.html>.
***********************************************************************/
$page_security = $_POST['PARAM_0'] == $_POST['PARAM_1'] ?
	'SA_SALESTRANSVIEW' : 'SA_SALESBULKREP';
// ----------------------------------------------------------------
// $ Revision:	2.0 $
// Creator:	Joe Hunt
// date_:	2005-05-19
// Title:	Print Invoices
// ----------------------------------------------------------------
$path_to_root="..";

include_once($path_to_root . "/includes/session.inc");
include_once($path_to_root . "/includes/date_functions.inc");
include_once($path_to_root . "/includes/data_checks.inc");
include_once($path_to_root . "/sales/includes/sales_db.inc");

//----------------------------------------------------------------------------------------------------

print_invoices();

function get_trip($voucher = 0)
{
	$sql = "SELECT vehicle.registration_number as vehicle_no,trip.pick_up_date as trip_date,voucher.id as voucher_no,voucher.total_trip_amount as amount";
	$sql .= " FROM trip_vouchers voucher";
	$sql .= " LEFT JOIN trips trip ON trip.id = voucher.trip_id";
	$sql .= " LEFT JOIN vehicles vehicle ON trip.vehicle_id = vehicle.id";
	$sql .= " WHERE voucher.id = ".db_escape($voucher);

	$result = db_query($sql, "Error getting order details");
	return db_fetch_assoc($result);
	
}

//----------------------------------------------------------------------------------------------------

function print_invoices()
{
	global $path_to_root, $alternative_tax_include_on_docs, $suppress_tax_rates, $no_zero_lines_amount;
	
	include_once($path_to_root . "/reporting/includes/pdf_report.inc");

	$from = $_POST['PARAM_0'];
	$to = $_POST['PARAM_1'];
	$currency = $_POST['PARAM_2'];
	$email = $_POST['PARAM_3'];
	$pay_service = $_POST['PARAM_4'];
	$comments = $_POST['PARAM_5'];
	$customer = $_POST['PARAM_6'];
	$orientation = $_POST['PARAM_7'];

	if (!$from || !$to) return;

	$orientation = ($orientation ? 'L' : 'P');
	$dec = user_price_dec();

 	$fno = explode("-", $from);
	$tno = explode("-", $to);
	$from = min($fno[0], $tno[0]);
	$to = max($fno[0], $tno[0]);

	//$cols = array(4, 60, 225, 300, 325, 385, 450, 515);
	$cols = array(4, 30, 110, 140, 230, 300, 500, 535);

	// $headers in doctext.inc
	$aligns = array('center','center','center', 'center', 'center', 'left', 'center');

	$params = array('comments' => $comments);

	

	$cur = get_company_Pref('curr_default');

	if ($email == 0)
		$rep = new FrontReport(_('INVOICE'), "InvoiceBulk", user_pagesize(), 9, $orientation);
	if ($orientation == 'L')
		recalculate_cols($cols);
	for ($i = $from; $i <= $to; $i++)
	{
			if (!exists_customer_trans(ST_SALESINVOICE, $i))
				continue;
			$sign = 1;
			$myrow = get_customer_trans($i, ST_SALESINVOICE);
			
			
			
			if($customer && $myrow['debtor_no'] != $customer) {
				continue;
			}
			$baccount = get_default_bank_account($myrow['curr_code']);
			$params['bankaccount'] = $baccount['id'];

			$branch = get_branch($myrow["branch_code"]);
			$sales_order = get_sales_order_header($myrow["order_"], ST_SALESORDER);
			if ($email == 1)
			{
				$rep = new FrontReport("", "", user_pagesize(), 9, $orientation);
				$rep->title = _('INVOICE');
				$rep->filename = "Invoice" . $myrow['reference'] . ".pdf";
			}	
			$rep->SetHeaderType('Header4');
			$rep->currency = $cur;
			$rep->Font();
			$rep->Info($params, $cols, null, $aligns);

			$contacts = get_branch_contacts($branch['branch_code'], 'invoice', $branch['debtor_no'], true);
			$baccount['payment_service'] = $pay_service;
			$rep->SetCommonData($myrow, $branch, $sales_order, $baccount, ST_SALESINVOICE, $contacts);
			$rep->NewPage();
   			$result = get_customer_trans_details(ST_SALESINVOICE, $i);
			$SubTotal = 0;
			$slno = 1;

			


			while ($myrow2=db_fetch($result))
			{
				$memo = get_comments_string(ST_SALESINVOICE, $myrow2['id']);
			
				$trip = get_trip($myrow2['trip_voucher']);
				
				$rep->TextCol(0, 1,  $slno);
				$rep->TextCol(1, 2,  @$trip['voucher_no']);
				$rep->TextCol(2, 3,  @$trip['trip_date']);
				$rep->TextCol(3, 4,  @$trip['vehicle_no']);
				$rep->TextCol(4, 5,  "OFFICER");
				$rep->TextColLines(5, 6,  $memo);

				$Net = round2($sign * ((1 - $myrow2["discount_percent"]) * $myrow2["unit_price"] * $myrow2["quantity"]),
				   user_price_dec());
				$SubTotal += $Net;
		    		
		    		$DisplayNet = number_format2($Net,$dec);

				
				$rep->TextCol(6, 7,  $DisplayNet);

				$rep->NewLine(2);

				$slno++;
			}


   			$DisplaySubTot = number_format2($SubTotal,$dec);
   			$DisplayFreight = number_format2($sign*$myrow["ov_freight"],$dec);

    			$rep->row = $rep->bottomMargin + (15 * $rep->lineHeight);
			$doctype = ST_SALESINVOICE;

			$rep->TextCol(3, 6, _("Sub-total"), -2);
			$rep->TextCol(6, 7,	$DisplaySubTot, -2);
			$rep->NewLine();
			$rep->TextCol(3, 6, _("Shipping"), -2);
			$rep->TextCol(6, 7,	$DisplayFreight, -2);
			$rep->NewLine();
			$tax_items = get_trans_tax_details(ST_SALESINVOICE, $i);
			$first = true;

	    		while ($tax_item = db_fetch($tax_items))
	    		{
	    			if ($tax_item['amount'] == 0)
	    				continue;
	    			$DisplayTax = number_format2($sign*$tax_item['amount'], $dec);
	    			
	    			if (isset($suppress_tax_rates) && $suppress_tax_rates == 1)
	    				$tax_type_name = $tax_item['tax_type_name'];
	    			else
	    				$tax_type_name = $tax_item['tax_type_name']." (".$tax_item['rate']."%) ";

	    			if ($tax_item['included_in_price'])
	    			{
	    				if (isset($alternative_tax_include_on_docs) && $alternative_tax_include_on_docs == 1)
	    				{
	    					if ($first)
	    					{
								$rep->TextCol(3, 6, _("Total Tax Excluded"), -2);
								$rep->TextCol(6, 7,	number_format2($sign*$tax_item['net_amount'], $dec), -2);
								$rep->NewLine();
	    					}
							$rep->TextCol(3, 6, $tax_type_name, -2);
							$rep->TextCol(6, 7,	$DisplayTax, -2);
							$first = false;
	    				}
	    				else
							$rep->TextCol(3, 7, _("Included") . " " . $tax_type_name . _("Amount") . ": " . $DisplayTax, -2);
					}
	    			else
	    			{
						$rep->TextCol(3, 6, $tax_type_name, -2);
						$rep->TextCol(6, 7,	$DisplayTax, -2);
					}
					$rep->NewLine();
	    		}

    			$rep->NewLine();
			$DisplayTotal = number_format2($sign*($myrow["ov_freight"] + $myrow["ov_gst"] +
				$myrow["ov_amount"]+$myrow["ov_freight_tax"]),$dec);
			$rep->Font('bold');
			$rep->TextCol(3, 6, _("TOTAL INVOICE"), - 2);
			$rep->TextCol(6, 7, $DisplayTotal, -2);
			$words = price_in_words($myrow['Total'], ST_SALESINVOICE);
			if ($words != "")
			{
				$rep->NewLine(1);
				$rep->TextCol(1, 7, $myrow['curr_code'] . ": " . $words, - 2);
			}
			$rep->Font();
			if ($email == 1)
			{
				$rep->End($email);
			}
	}
	if ($email == 0)
		$rep->End();
}

?>
