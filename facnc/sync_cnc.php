<?php
	
	$path_to_root=".";

	$page_security = 'SA_OPEN';

	include_once("includes/session.inc");

	if(isset($_GET['NewBankPayment'])){

		meta_forward('gl/gl_bank.php','NewPayment=Yes');
	}
	elseif(isset($_GET['NewBankDeposit'])){

		meta_forward('gl/gl_bank.php','NewDeposit=Yes');
	}
	elseif(isset($_GET['CompanySetup'])){
		meta_forward('admin/company_preferences.php');
		
	}
	elseif(isset($_GET['DisplaySetup'])){
		meta_forward('admin/display_prefs.php');
		
	}
	elseif(isset($_GET['FormSetup'])){
		meta_forward('admin/forms_setup.php');
		
	}
	elseif(isset($_GET['PaymentTerms'])){
		meta_forward('admin/payment_terms.php');
		
	}
	elseif(isset($_GET['FiscalYear'])){
		meta_forward('admin/fiscalyears.php');
		
	}
	elseif(isset($_GET['SystemGl'])){
		meta_forward('admin/gl_setup.php');
		
	}
	elseif(isset($_GET['VoidTransaction'])){
		meta_forward('admin/void_transaction.php');
		
	}
	elseif(isset($_GET['Backup'])){
		meta_forward('admin/backups.php');
		
	}
	
	
	
	


	
				

?>
