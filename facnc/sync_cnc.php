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

	
	
	


	
				

?>
