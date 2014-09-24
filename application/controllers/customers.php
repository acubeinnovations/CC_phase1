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
				
		}else if($param1=='AddUpdate') {
			
			$this->Customer();
				
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

		public function Customer(){
		if(isset($_REQUEST['customer-add-update'])){
			$customer_id=$this->input->post('customer_id');
			$data['name']=$this->input->post('name');
			$data['email']=$this->input->post('email');
			$data['dob']=$this->input->post('dob');
			$data['mobile']=$this->input->post('mobile');
			$data['address']=$this->input->post('address');
			$data['customer_group_id']=$this->input->post('customer_group_id');
			$data['customer_type_id']=$this->input->post('customer_type_id');
			if($customer_id!=gINVALID){ 
			$hmail=$this->input->post('h_email');
			$hphone=$this->input->post('h_phone');
			}else{
			$hmail='';
			$hphone='';
			}
			$this->form_validation->set_rules('name','Name','trim|required|min_length[2]|xss_clean');
			
			if($customer_id!=gINVALID && $data['email'] == $hmail){
			$this->form_validation->set_rules('email','Mail','trim|required|valid_email');
			}else{
				$this->form_validation->set_rules('email','Mail','trim|required|valid_email|is_unique[users.email]');
			}
			if($customer_id!=gINVALID && $data['phone'] == $hphone){
			$this->form_validation->set_rules('phone','Phone','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
			}else{
			$this->form_validation->set_rules('phone','Phone','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean||is_unique[users.phone]');
			}
			$data['registration_type_id']=CUSTOMER_REG_TYPE_PHONE_CALL;	
			$data['organisation_id']=$this->session->userdata('organisation_id');	
			$data['user_id']=$this->session->userdata('id');
			if($this->form_validation->run() != False) {
				if($customer_id>gINVALID) {
				$res=$this->customers_model->updateCustomers($data,$customer_id);
					if(isset($res) && $res!=false){
			
						
					}else{
						
					}
				}else if($customer_id==gINVALID){ 
				$res=$this->customers_model->addCustomer($data);
					if(isset($res) && $res!=false){
				
					redirect(base_url().'organization/front-desk/customers');	
					}
				}
				}else{
				$data['customer_id']=$customer_id;
				$this->mysession->set('post',$data);
				redirect(base_url().'organization/front-desk/customer/'.$customer_id);

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
	
