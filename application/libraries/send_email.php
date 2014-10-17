<?php 
class Send_email{

	function emailMe($email,$subject,$message){

	$this->email->from(SYSTEM_EMAIL, PRODUCT_NAME);
	$this->email->to($email);


	$this->email->subject($subject);
	$this->email->message($message);

	$this->email->send();

	echo $email.' '.$subject.' '.$message;exit;

	}

}
?>
