<?php 
class Driver extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("driver_model");
		$this->load->model('account_model');
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
	$data['name']=$this->input->post('driver_name');
	$data['place_of_birth']=$this->input->post('place_of_birth');
	$data['dob']=$this->input->post('dob');
	$data['blood_group']=$this->input->post('blood_group'); 
	$data['marital_status_id']=$this->input->post('marital_status_id');
	$data['children']=$this->input->post('children');
	$data['present_address']=$this->input->post('present_address');
	$data['permanent_address']=$this->input->post('permanent_address');
	$data['district']=$this->input->post('district');
	$data['state']=$this->input->post('state');
	$data['pin_code']=$this->input->post('pin_code');
	$data['phone']=$this->input->post('phone');
	$data['mobile']=$this->input->post('mobile');
	$hmob=$this->input->post('hmob'); 
	$data['email']=$this->input->post('email');
	$hmail=$this->input->post('hmail');
	$data['license_number']=$this->input->post('license_number');
	$data['date_of_joining']=$this->input->post('date_of_joining');
	$h_join=$this->input->post('h_join');
	$data['badge']=$this->input->post('badge');
	$data['license_renewal_date']=$this->input->post('license_renewal_date');
	$h_license=$this->input->post('h_license');
	$data['badge_renewal_date']=$this->input->post('badge_renewal_date');
	$h_badge=$this->input->post('h_badge');
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
	$dr_id=$this->input->post('hidden_id');
	$data['organisation_id']=$this->session->userdata('organisation_id'); 
	$data['user_id']=$this->session->userdata('id'); 
		$err=True;
	/*if($data['blood_group'] ==-1){
	$data['blood_group'] ='';
	 $err=False;
	 $this->session->set_userdata('blood group','Choose Blood Group');
	 }*/
	/*if($data['marital_status_id'] ==-1){
	 $data['marital_status_id'] ='';
	 $err=False;
	 $this->session->set_userdata('marital_status_id','Choose Marital Status');
	 }
	 if($data['bank_account_type_id'] ==-1){
	 $data['bank_account_type_id'] ='';
	 $err=False;
	 $this->session->set_userdata('bank_account_type_id','Choose Bank Account Type');
	 }
	 if($data['id_proof_type_id'] ==-1){
	 $data['id_proof_type_id'] ='';
	 $err=False;
	 $this->session->set_userdata('id_proof_type_id','Choose Identity Proof');
	 }*/
	
	
	
	 $this->form_validation->set_rules('driver_name','Name','trim|required|xss_clean');
	 $this->form_validation->set_rules('place_of_birth','Place Of Birth','trim|required|xss_clean');
	 $this->form_validation->set_rules('dob','Date of Birth ','trim|xss_clean');
	 $this->form_validation->set_rules('children','children','trim|xss_clean|numeric');
	 $this->form_validation->set_rules('present_address','Present Address','trim|required|xss_clean');
	 $this->form_validation->set_rules('permanent_address','Permanent Address','trim|xss_clean');
	 $this->form_validation->set_rules('district','District','trim|required|xss_clean|alpha');
	 $this->form_validation->set_rules('state','State','trim|xss_clean');
	 $this->form_validation->set_rules('pin_code','Pin Code','trim|xss_clean|regex_match[/^[0-9]{6}$/]');
	 $this->form_validation->set_rules('license_number','License Number','trim|xss_clean');
	 $this->form_validation->set_rules('phone','Phone Number','trim|required|xss_clean|numeric]');
		if($data['mobile']==$hmob){
		$this->form_validation->set_rules('mobile','10 digit Mobile Number','trim|required|xss_clean|regex_match[/^[0-9]{10}$/]');
	 }else{
	 $this->form_validation->set_rules('mobile','10 digit Mobile Number ','trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|is_unique[drivers.mobile]');
	 }if($data['email']==$hmail){
	 $this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email');
	 }
	 else{
	 $this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|is_unique[drivers.email]');
	 }
	 $this->form_validation->set_rules('date_of_joining','Date of Joining ','trim|required|xss_clean');
	 $this->form_validation->set_rules('badge','Badge','trim|xss_clean');
	 $this->form_validation->set_rules('license_renewal_date','License Renewal Date','trim|xss_clean');
	 $this->form_validation->set_rules('badge_renewal_date','Badge Renewal Date','trim|xss_clean');
	 $this->form_validation->set_rules('mother_tongue','Mother Tongue','trim|xss_clean');
	 $this->form_validation->set_rules('pan_number','Pan Number','trim|xss_clean');
	 $this->form_validation->set_rules('bank_account_number','Bank Account Number','trim|xss_clean');
	 $this->form_validation->set_rules('name_on_bank_pass_book','Name on Bank Pass Book','trim|xss_clean');
	 $this->form_validation->set_rules('bank_name','Bank Name','trim|xss_clean');
	 $this->form_validation->set_rules('branch','Branch','trim|xss_clean');
	 $this->form_validation->set_rules('ifsc_code','IFSC Code','trim|xss_clean');
	 $this->form_validation->set_rules('id_proof_type_id','ID Proof','trim|xss_clean');
	 $this->form_validation->set_rules('id_proof_document_number','ID Proof Number','trim|xss_clean');
	 $this->form_validation->set_rules('name_on_id_proof','ID Proof Holder','trim|xss_clean');
	
	
	
		
	 if($this->form_validation->run()==False|| $err==False){ 
		$this->mysession->set('driver_id',$dr_id);
		$this->mysession->set('post',$data); 
		redirect(base_url().'organization/front-desk/driver-profile',$data);	
	 } 
	 else{
	//echo "val success";exit;
		if($dr_id==gINVALID ){
			$res=$this->driver_model->addDriverdetails($data); 
			//$ins_id=$this->mysession->get('vehicle_id');
			if($res){
				//add driver as supplier in fa
				$this->account_model->add_fa_supplier($res,"DR");
				//$data['driver_tab']='active';
				$this->session->set_userdata(array('dbSuccess'=>' Added Succesfully..!'));
				$this->session->set_userdata(array('dbError'=>''));
				redirect(base_url().'organization/front-desk/driver-profile');
			}
		}
		else{
			
			$res=$this->driver_model->UpdateDriverdetails($data,$dr_id);
			
			if($res==true){
				//edit driver as supplier in fa 
				$this->account_model->edit_fa_supplier($dr_id,"DR");

				$this->session->set_userdata(array('dbSuccess'=>' Updated Succesfully..!'));
				$this->session->set_userdata(array('dbError'=>''));
				redirect(base_url().'organization/front-desk/driver-profile/'.$dr_id);
			}
		}
	
	 }
	
	
	}
	
	}
	else{
			$this->notAuthorized();
			}
	}
	
	/*public function list_driver(){
	if($this->session_check()==true) {
	$organisation_id=$this->session->userdata('organisation_id'); 
	$data['values']=$this->driver_model->getDriverList($organisation_id);
	$data['title']="List Driver | ".PRODUCT_NAME;  
	$page="user-pages/driverList";
	$this->load_templates($page,$data);
	}
	else{
			echo 'you are not authorized access this page..';
			}
	}*/

	
	
	public function load_templates($page='',$data=''){
	if($this->session_check()==true) {
		$this->load->view('admin-templates/header',$data);
		$this->load->view('admin-templates/nav');
		$this->load->view($page,$data);
		$this->load->view('admin-templates/footer');
		}
	else{
			$this->notAuthorized();
		}
	}
	public function notAuthorized(){
	$data['title']='Not Authorized | '.PRODUCT_NAME;
	$page='not_authorized';
	$this->load->view('admin-templates/header',$data);
	$this->load->view('admin-templates/nav');
	$this->load->view($page,$data);
	$this->load->view('admin-templates/footer');
	
	}	

	public function date_check($date){
	if( strtotime($date) >= strtotime(date('Y-m-d')) ){
	return true;
	}	
	}
	}	
