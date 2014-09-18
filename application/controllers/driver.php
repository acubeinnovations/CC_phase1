<?php 
class Driver extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("driver_model");
		$this->load->helper('my_helper');
		no_cache();

		}
		public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
	} else {
		return false;
	}
	}
	//for driver view display

	public function driver_manage(){
	if($this->session_check()==true) {
	if(isset($_REQUEST['driver-submit'])){
	$data['name']=$this->input->post('name');
	$data['place_of_birth']=$this->input->post('place_of_birth');
	$data['dob']=$this->input->post('dob');
	$data['blood group']=$this->input->post('blood group');
	$data['marital_status_id']=$this->input->post('marital_status_id');
	$data['children']=$this->input->post('children');
	$data['present_address']=$this->input->post('present_address');
	$data['permanent_address']=$this->input->post('permanent_address');
	$data['district']=$this->input->post('district');
	$data['state']=$this->input->post('state');
	$data['pin_code']=$this->input->post('pin_code');
	$data['phone']=$this->input->post('phone');
	$data['mobile']=$this->input->post('mobile');
	$data['email']=$this->input->post('email');
	$data['date_of_joining']=$this->input->post('date_of_joining');
	$data['badge']=$this->input->post('badge');
	$data['license_renewal_date']=$this->input->post('license_renewal_date');
	$data['badge_renewal_date']=$this->input->post('badge_renewal_date');
	$data['mother_tongue']=$this->input->post('mother_tongue');
	$data['pan_number']=$this->input->post('pan_number');
	$data['bank_account_number']=$this->input->post('bank_account_number');
	$data['name_on_bank_pass_book']=$this->input->post('name_on_bank_pass_book');
	$data['bank_name']=$this->input->post('bank_name');
	$data['branch']=$this->input->post('branch');
	$data['bank_account_type_id']=$this->input->post('bank_account_type_id');
	$data['ifsc_code']=$this->input->post('ifsc_code');
	$data['id_proof_type_id']=$this->input->post('id_proof_type_id');
	$data['id_proof_document_number']=$this->input->post('id_proof_document_number');
	$data['name_on_id_proof']=$this->input->post('name_on_id_proof');
	$data['salary']=$this->input->post('salary');
	$data['minimum_working_days']=$this->input->post('minimum_working_days');
	$data['organisation_id']=$this->session->userdata('organisation_id'); 
	$data['user_id']=$this->session->userdata('id');
	print_r($data);
	 $this->form_validation->set_rules('name','Name','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('place_of_birth','Place Of Birth','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('dob','Date of Birth ','trim|required|xss_clean');
	 $this->form_validation->set_rules('blood group','Blood Group','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('marital_status_id','Marital Status','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('children','children','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('present_address','Present Address','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('permanent_address','Permanent Address','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('district','District','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('state','State','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('pin_code','Pin Code','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('phone','Phone','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('mobile','Mobile','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('email','Email','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('date_of_joining','Date of Joining ','trim|required|xss_clean');
	 $this->form_validation->set_rules('badge','Badge','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('license_renewal_date','License Renewal Date','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('badge_renewal_date','Badge Renewal Date','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('mother_tongue','Mother Tongue','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('pan_number','Pan Number','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('bank_account_number','Bank Account Number','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('name_on_bank_pass_book','Name on Bank Pass Book','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('bank_name','Bank Name','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('branch','Branch','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('bank_account_type_id','Bank Account ','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('ifsc_code','IFSC Code','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('id_proof_type_id','ID Proof','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('id_proof_document_number','ID Proof Number','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('name_on_id_proof','ID Proof Holder','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('salary','Salary','trim|required|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('minimum_working_days','Minimum Working days','trim|required|xss_clean|alpha_numeric');
	 if($this->form_validation->run()==False){
		$this->session->set_userdata('post',$data);
		redirect(base_url().'organization/front-desk/driver_manage',$data);	
	 }
	  else{//to do
	   $res=$this->driver_model->addDriverdetails($data);
		if($res==true){
		$this->session->set_userdata(array('dbSuccess'=>' Added Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'organization/front-desk/driver');
		}
		else{
		$this->session->set_userdata('post',$data);
		//$this->session->set_userdata(array('Err_date'=>'Invalid Date!'));
		redirect(base_url().'organization/front-desk/driver');
		}
	 }
	}
	}
	else{
			echo 'you are not authorized access this page..';
			}
	}
	}