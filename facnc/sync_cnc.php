<?php
	
	$path_to_root=".";

	$page_security = 'SA_OPEN';

	include_once("includes/session.inc");

	if(isset($_GET['NewBankPayment'])){

		meta_forward('gl/gl_bank.php','NewPayment=Yes');
	}
	if(isset($_GET['NewBankDeposit'])){

		meta_forward('gl/gl_bank.php','NewDeposit=Yes');
	}

	
	
	


	
				

?>
