<?php

function get_cnc_session($session_id)
{
	set_global_connection();

	$sql = "SELECT * FROM ci_sessions WHERE session_id='".$session_id."'";


	$result = db_query($sql, "could not get user");


	return db_fetch($result);
}

function get_cnc_organization($org_id=-1)
{
	$sql = "SELECT * FROM organisations WHERE id='".$org_id."'";

	$result = db_query($sql,"could not get company information");

	return db_fetch($result);
}

function sync_cnc_org_login($conn, $username,$password)
{
	$sql = "UPDATE ".$conn['tbpref']."users SET password=".db_escape($password) . ",user_id = ".db_escape($username) . " WHERE user_id='admin'";
	db_query($sql, "could not update user password for 'admin'");
}

function get_cnc_org_admin($org_id = -1)
{
	$sql = "SELECT * FROM users WHERE organisation_id=".db_escape($org_id)." AND user_type_id = 2";


	$result = db_query($sql, "could not get user");


	return db_fetch_assoc($result);
}

function update_fa_account_in_organisations($org_id = -1)
{
	$sql = "UPDATE organisations SET fa_account = 1"
		." WHERE id=".db_escape($org_id);
	db_query($sql, "Organisation updated");
}

function get_cnc_user($userid)
{
	$sql = "SELECT * FROM users WHERE id =".db_escape($userid);

	$result = db_query($sql, "could not get user");


	return db_fetch_assoc($result);
}

function get_cnc_voucher($id = 0)
{
	$sql = "SELECT 
		cust.id AS cnc_cust_id,
		cust.name AS customer_name,
		vehicle.registration_number AS vehicle_no,
		tripmd.name AS trip_model,
		trip.id AS trip_id,
		trip.pick_up_city AS from_city,
		trip.drop_city AS to_city,
		(voucher.parking_fees+
		voucher.toll_fees+
		voucher.state_tax+
		voucher.night_halt_charges+
		voucher.fuel_extra_charges) AS extra_charge,
		(voucher.end_km_reading-voucher.start_km_reading) AS total_km_reading,
		10000 as tariff,
		58000 as amount
		";
	$sql .="  FROM trip_vouchers voucher ";
	$sql .= " LEFT JOIN trips trip ON voucher.trip_id = trip.id";
	$sql .= " LEFT JOIN trip_models tripmd ON tripmd.id = trip.trip_model_id";
	$sql .= " LEFT JOIN vehicles vehicle ON vehicle.id = trip.vehicle_id";
	//$sql .= " LEFT JOIN tariffs ON tariffs.id = trip.tariff_id";
	//$sql .= " LEFT JOIN tariff_masters ON tariff_masters.id = tariffs.tariff_master_id";
	$sql .= " LEFT JOIN customers cust ON cust.id = trip.customer_id";
	$sql .= " LEFT JOIN customer_groups custg ON custg.id = trip.customer_group_id";
	$sql .= " WHERE voucher.id = ".db_escape($id);
	$result = db_query($sql, "could not get voucher");

	return db_fetch_assoc($result);
}

function get_cnc_customer_id($ref = '')
{
	$sql = "SELECT debtor_no FROM ".TB_PREF."debtors_master WHERE debtor_ref = ".db_escape($ref);
//echo $sql;exit;
	$result = db_query($sql, "could not get voucher");
	
	$row = db_fetch_assoc($result);

	return $row['debtor_no'];
}

function get_cnc_customer_branch($debtor_no = '')
{
	$sql = "SELECT branch_code FROM ".TB_PREF."cust_branch WHERE debtor_no = ".db_escape($debtor_no);
//echo $sql;exit;
	$result = db_query($sql, "could not get voucher");
	
	$row = db_fetch_assoc($result);

	return $row['branch_code'];
}


?>
