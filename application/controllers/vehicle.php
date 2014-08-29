<?php 
class Vehicle extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("settings_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){
		if($this->session_check()==true) {
			if($param1=='vehicle-ownership' && isset($_REQUEST['add'])){
				$this->addOwnership();
				}
			if($param1=='vehicle-ownership' && isset($_REQUEST['edit'])){
				$this->editOwnership();
			}
			if($param1=='vehicle-ownership' && isset($_REQUEST['delete'])){
				$this->deleteOwnership();
			}
		
		
		else{
			echo 'you are not authorized access this page..';
			}
		}
	}	
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
		} else {
		return false;
		}
	}    
}
?>