<?php 
class Customers extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("customers_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){
		if($this->session_check()==true) {
		if($param1=='customer-check') {
			
			$this->checkCustomer();
				
		}else if($param1=='add-customer') {
			
			$this->addCustomer();
				
		}
		
	}else{
			echo 'you are not authorized access this page..';
	}
	}
		
	
		public function checkCustomer(){
		if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!=''){
			$data['mobile']=$_REQUEST['mobile'];
		}
		if(isset($_REQUEST['email']) && $_REQUEST['email']!=''){
			$data['email']=$_REQUEST['email'];
		}
		
		$res=$this->customers_model->getCustomerDetails($data);
		if(!empty($res)){
		echo json_encode($res);
		if(isset($_REQUEST['customer']) && $_REQUEST['customer']=='yes'){
		$this->set_customer_session($res);
		}
		}else{
		return false;
		}
		
		}

		public function addCustomer(){
		if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!=''  && isset($_REQUEST['name']) && $_REQUEST['name']!=''){
			$data['mobile']=$_REQUEST['mobile'];
			$data['email']=$_REQUEST['email'];
			$data['name']=$_REQUEST['name'];
			$data['registration_type_id']=CUSTOMER_REG_TYPE_PHONE_CALL;	
		$res=$this->customers_model->addCustomer($data);
		if(isset($res) && $res!=false){
			
			echo true;
		}else{
			echo false;
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

	public function set_customer_session($data){
	$session_data=array('customer_id'=>$data[0]['id'],'customer_name'=>$data[0]['name'],'customer_email'=>$data[0]['email'],'customer_mobile'=>$data[0]['mobile']);
	$this->session->set_userdata($session_data);
	
	}

	
}
?>
	
