<?php 
class Vehicle extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("settings_model");
		$this->load->model("vehicle_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){

	
		if($this->session_check()==true) {
	
		$tbl=array('vehicle-ownership'=>'vehicle_ownership_types','vehicle-types'=>'vehicle_types','ac-types'=>'vehicle_ac_types','fuel-types'=>'vehicle_fuel_types','seating-capacity'=>'vehicle_seating_capacity','beacon-light-options'=>'vehicle_beacon_light_options ','vehicle-makes'=>'vehicle_makes','driver-bata-percentages'=>'vehicle_driver_bata_percentages ','permit-types'=>'vehicle_permit_types');
			if($param1=='getDescription') {
			$this->getDescription();
			}
			if($param1==''){ 
			if(isset($_REQUEST['submit-vehicle'])){
				$this->vehicle_validation();
				}
			if(isset($_REQUEST['submit-insurance'])){
				$this->insurance_validation();
				}
			if(isset($_REQUEST['submit-loan'])){
				$this->loan_validation();
				}
			}
			if($param1) {
				
				if(isset($_REQUEST['add'])){
					$this->add($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->edit($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->delete($tbl,$param1);
					}
				//if(isset($_REQUEST['submit-vehicle'])){
				//$this->vehicle_validation();
				//}
				//if(isset($_REQUEST['submit-insurance'])){
				//$this->insurance_validation();
				//}
		}
		
		
	}
		
		else{
			echo 'you are not authorized access this page..';
			}
	}
		
	
	public function add($tbl,$param1){
	
	if(isset($_REQUEST['select'])&& isset( $_REQUEST['description'])&& isset($_REQUEST['add'])){ 
			$err=false;
		    $data['name']=$this->input->post('select');
			$data['description']=$this->input->post('description');
			if($data['name']==''||$data['description']==''){
			
			$this->session->set_userdata(array('dbvalErr'=>'Fields Required..!'));
			$err=true;
			}
			if(is_numeric($data['name'])){
			$this->session->set_userdata(array('Err_num_name'=>'Invalid input on name field!'));
			$err=true;
			}
			if(is_numeric($data['description'])){
			$this->session->set_userdata(array('Err_num_desc'=>'Invalid input on description field!'));
			$err=true;
			}
			if(preg_match('#[^a-zA-Z0-9]#', $data['name'])){
			$this->session->set_userdata(array('Err_name'=>'Invalid Characters on name field!'));
			$err=true;
			}
			if(preg_match('#[^a-zA-Z0-9]#', $data['description'])){
			$this->session->set_userdata(array('Err_desc'=>'Invalid Characters on description field!'));
			$err=true;
			}
			if($err==true){
			redirect(base_url().'organization/front-desk/settings');
			}
			else{
			$data['organisation_id']=$this->session->userdata('organisation_id');
			$data['user_id']=$this->session->userdata('id');
			
	        
        
	
		$result=$this->settings_model->addValues($tbl[$param1],$data);
		if($result==true){
					$this->session->set_userdata(array('dbSuccess'=>'Details Added Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'organization/front-desk/settings');
						}
			
							}
							}
	}
	public function edit($tbl,$param1){
	if(isset($_REQUEST['select_text'])&& isset( $_REQUEST['description'])&& isset($_REQUEST['edit'])){ 
			$err=false;
		    $data['name']=$this->input->post('select_text');
			$data['description']=$this->input->post('description');
			if($data['name']==''||$data['description']==''){
			
			$this->session->set_userdata(array('dbvalErr'=>'Fields Required..!'));
			$err=true;
			}
			if(is_numeric($data['name'])){
			$this->session->set_userdata(array('Err_num_name'=>'Invalid input on name field!'));
			$err=true;
			}
			if(is_numeric($data['description'])){
			$this->session->set_userdata(array('Err_num_desc'=>'Invalid input on description field!'));
			$err=true;
			}
			if(preg_match('#[^a-zA-Z0-9]#', $data['name'])){
			$this->session->set_userdata(array('Err_name'=>'Invalid Characters on name field!'));
			$err=true;
			}
			if(preg_match('#[^a-zA-Z0-9]#', $data['description'])){
			$this->session->set_userdata(array('Err_desc'=>'Invalid Characters on description field!'));
			$err=true;}
			if($err==true){
			redirect(base_url().'user/settings');
			}
			else{
			$id=$this->input->post('id_val');
	        $this->form_validation->set_rules('select_text','Values','trim|required|min_length[2]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('description','Description','trim|required|min_length[2]|xss_clean|alpha_numeric');
		
      
		$result=$this->settings_model->updateValues($tbl[$param1],$data,$id);
		if($result==true){
					$this->session->set_userdata(array('dbSuccess'=>'Details Updated Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'user/settings');
						}
			
			}
							}
	
	}
	
	public function delete($tbl,$param1){
	if(isset($_REQUEST['delete'])){ 
	
	$id=$this->input->post('id_val');
	        $this->form_validation->set_rules('select_text','Values','trim|required|min_length[2]|xss_clean|alpha_numeric');
			//$this->form_validation->set_rules('select','Values','trim|required|min_length[2]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('description','Description','trim|required|min_length[2]|xss_clean|alpha_numeric');
		if($this->form_validation->run()==False){
        redirect(base_url().'user/settings');
		}
      else {
		$result=$this->settings_model->deleteValues($tbl[$param1],$id);
		if($result==true){
					$this->session->set_userdata(array('dbSuccess'=>'Details Deleted Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'user/settings');
						}
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

		public function getDescription(){
		$id=$_REQUEST['id'];
		$tbl=$_REQUEST['tbl'];
		$res=$this->settings_model->getValues($id,$tbl);
		echo $res[0]['id']." ".$res[0]['description']." ".$res[0]['name'];
		
		//return 
		}
		public function vehicle_validation(){
		if($this->session_check()==true) {
		
			$data['vehicle_ownership_types_id']=$this->input->post('ownership');
			$data['vehicle_type_id']=$this->input->post('vehicle_type');
			$data['vehicle_make_id']=$this->input->post('make');
			$data['vehicle_manufacturing_year']=$this->input->post('year');
			$data['vehicle_ac_type_id']=$this->input->post('ac');
			$data['vehicle_fuel_type_id']=$this->input->post('fuel');
			$data['vehicle_seating_capacity_id']=$this->input->post('seat');
			$driver_data['driver']=$this->input->post('driver');
			$driver_data['from_date']=$this->input->post('from_date');
			$data['registration_number']=$this->input->post('reg_number');
			$data['registration_date']=$this->input->post('reg_date');
			$data['engine_number']=$this->input->post('eng_num');
			$data['chases_number']=$this->input->post('chases_num');
			$data['vehicle_permit_type_id']=$this->input->post('permit');
			$data['vehicle_permit_renewal_date']=$this->input->post('permit_date');
			$data['vehicle_permit_renewal_amount']=$this->input->post('permit_amount');
			$data['tax_renewal_amount']=$this->input->post('tax_amount');
			$data['tax_renewal_date']=$this->input->post('tax_date');
			$data['organisation_id']=$this->session->userdata('organisation_id');
			$data['user_id']=$this->session->userdata('id');
			
			
					//$this->form_validation->set_rules('place_of_birth','Birth Place','trim|required|xss_clean|alpha');
					$this->form_validation->set_rules('year','Year','trim|required|xss_clean');
					 $this->form_validation->set_rules('reg_number','Registeration Number','trim|required|xss_clean|alpha_numeric');
					 $this->form_validation->set_rules('from_date','From Date ','trim|required|xss_clean');
					 $this->form_validation->set_rules('reg_date','Registration Date','trim|required|xss_clean');
					 $this->form_validation->set_rules('eng_num','Engine Number','trim|required|xss_clean|numeric');
					 $this->form_validation->set_rules('chases_num','Chases Number','trim|required|xss_clean|numeric');
					 $this->form_validation->set_rules('permit_date','Permit Renewal Date','trim|required|xss_clean');
					 $this->form_validation->set_rules('permit_amount','Permit Renewal  Amount','trim|required|xss_clean');
					 $this->form_validation->set_rules('tax_amount','Tax Amount','trim|required|xss_clean|numeric');
					 $this->form_validation->set_rules('tax_date','Tax Date','trim|required|xss_clean');
					 //for insurance
$err=True;
	if(preg_match('#[^0-9\.]#', $data['vehicle_permit_renewal_amount'])){
			$this->mysession->set('Err_permit_amt','Invalid Characters on Permit Amount field!');
			$err=False;
			}
	if(preg_match('#[^0-9\.]#', $data['tax_renewal_amount'])){
			$this->mysession->set('Err_tax_amt','Invalid Characters on Tax Amount field!');
			$err=False;
			}
	if($data['vehicle_ownership_types_id'] ==-1){
	 $data['vehicle_ownership_types_id'] ='';
	 $err=False;
	 $this->mysession->set('ownership','Choose Ownership Type');
	 }
	 if($data['vehicle_type_id'] ==-1){
	 $data['vehicle_type_id'] ='';
	 $err=False;
	 $this->mysession->set('vehicle_type','Choose Vehicle Type');
	 }
	 if($data['vehicle_make_id'] ==-1){
	 $data['vehicle_make_id'] ='';
	 $err=False;
	 $this->mysession->set('make','Choose Vehicle Make');
	 }
	 if($data['vehicle_ac_type_id'] ==-1){
	 $data['vehicle_ac_type_id'] ='';
	 $err=False;
	 $this->mysession->set('ac','Choose AC Type');
	 }
	 if($data['vehicle_fuel_type_id'] ==-1){
	 $data['vehicle_fuel_type_id'] ='';
	 $err=False;
	 $this->mysession->set('fuel','Choose Fuel Type');
	 }
	  if($data['vehicle_seating_capacity_id'] ==-1){
	 $data['vehicle_seating_capacity_id'] ='';
	 $err=False;
	 $this->mysession->set('seat','Choose Seat Capacity');
	 }
	  if($data['vehicle_permit_type_id'] ==-1){
	 $data['vehicle_permit_type_id'] ='';
	 $err=False;
	 $this->mysession->set('permit','Choose Permit Type');
	 }
	  if($driver_data['driver'] ==-1){
	 $driver_data['driver'] ='';
	 $err=False;
	 $this->mysession->set('Driver','Choose Any Driver');
	 } 

	 if($this->form_validation->run()==False|| $err==False){

		$this->mysession->set('post_all',$data);
		$this->mysession->set('post_driver',$driver_data);
		redirect(base_url().'organization/front-desk/vehicle',$data);	
	 }
	 
	  else{
	  //database insertion for vehicle

	  $result=$this->vehicle_model->insertVehicle($data,$driver_data);
	  if($result==true){
		$v_id=
		$this->mysession->set('dbSuccess',' Added Succesfully..!');
				    $this->mysession->set('dbError','');
				    redirect(base_url().'organization/front-desk/vehicle');
		}
		else{
		$this->mysession->set('post_all',$data);
		$this->mysession->set('post_driver',$driver_data);
		redirect(base_url().'organization/front-desk/vehicle');
		}
	  }
		}
		else{
			echo 'you are not authorized access this page..';
			}
		}
		public function insurance_validation(){
		if($this->session_check()==true) {
			$data['vehicle_id']=$this->mysession->get('vehicle_id');
			$data['insurance_number']=$this->input->post('insurance_number');
			$data['insurance_date']=$this->input->post('insurance_date');
			$data['insurance_renewal_date']=$this->input->post('insurance_renewal_date');
			$data['insurance_premium_amount']=$this->input->post('insurance_pre-amount');
			$data['insurance_amount']=$this->input->post('insurance_amount');
			$data['Insurance_agency']=$this->input->post('insurance_agency');
			$data['Insurance_agency_address']=$this->input->post('insurance_agency_address');
			$data['Insurance_agency_phone']=$this->input->post('insurance_agency_phn');
			$data['Insurance_agency_email']=$this->input->post('insurance_agency_mail');
			$data['Insurance_agency_web']=$this->input->post('insurance_agency_web');
			//$this->form_validation->set_rules('place_of_birth','Birth Place','trim|required|xss_clean|alpha');
					$this->form_validation->set_rules('insurance_number','Insurance Number','trim|required|xss_clean|numeric');
					 $this->form_validation->set_rules('insurance_date','Insurance Date','trim|required|xss_clean');
					 $this->form_validation->set_rules('insurance_renewal_date','Insurance Renewal Date ','trim|required|xss_clean');
					 $this->form_validation->set_rules('insurance_amount','Insurance Amount','trim|required|xss_clean');
					 $this->form_validation->set_rules('insurance_pre-amount','Insurance Pre Amount','trim|required|xss_clean');
					 $this->form_validation->set_rules('insurance_agency','Insurance Agency','trim|required|xss_clean|alpha_numeric');
					 $this->form_validation->set_rules('insurance_agency_address','Address','trim|required|xss_clean|alpha_numeric');
					 $this->form_validation->set_rules('insurance_agency_phn','Agency ContactInfo ','trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|is_unique[vehicles_insurance.Insurance_agency_phone]');
					 $this->form_validation->set_rules('insurance_agency_mail','Mail ID','trim|required|xss_clean|valid_email|is_unique[vehicles_insurance.Insurance_agency_email]');
					 $this->form_validation->set_rules('insurance_agency_web','Web Address','trim|required|xss_clean|alpha_numeric');
					 
					 //for insurance
$err=True;
	if(preg_match('#[^0-9\.]#', $data['insurance_amount'])){
			$this->mysession->set('Err_insurance_amt','Invalid Characters on  Amount field!');
			$err=False;
			}
	if(preg_match('#[^0-9\.]#', $data['insurance_premium_amount'])){
			$this->mysession->set('Err_insurance_pre_amt','Invalid Characters on Pre Amount field!');
			$err=False;
			}

	 if($this->form_validation->run()==False|| $err==False){
		
		$this->mysession->set('ins_post_all',$data);
		
		redirect(base_url().'organization/front-desk/vehicle/insurance',$data);	
	 }
	 
	  else{
	  //database insertion for vehicle

	  $result=$this->vehicle_model->insertInsurance($data);
	 
	  if($result==true){
		$this->mysession->set('ins_Success',' Added Succesfully..!');
				    $this->mysession->set('ins_Error','');
				    redirect(base_url().'organization/front-desk/vehicle/insurance');
		}
		else{
		$this->mysession->set('ins_post_all',$data);
		
		redirect(base_url().'organization/front-desk/vehicle/insurance');
		}
	  }
		}
		else{
			echo 'you are not authorized access this page..';
			}
		}
		
			public function loan_validation(){
		if($this->session_check()==true) {
			$data['vehicle_id']=$this->mysession->get('vehicle_id');
			$data['total_amount']=$this->input->post('total_amt');
			$data['number_of_emi']=$this->input->post('emi_number');
			$data['emi_amount']=$this->input->post('emi_amt');
			$data['number_of_paid_emi']=$this->input->post('no_paid_emi');
			$data['emi_payment_date']=$this->input->post('emi_date');
			$data['loan_agency']=$this->input->post('loan_agency');
			$data['loan_agency_address']=$this->input->post('loan_agency_address');
			$data['loan_agency_phone']=$this->input->post('loan_agency_phn');
			$data['loan_agency_email']=$this->input->post('loan_agency_mail');
			$data['loan_agency_web']=$this->input->post('loan_agency_web');
			$data['organisation_id']=$this->session->userdata('organisation_id');
			$data['user_id']=$this->session->userdata('id');
			
			//$this->form_validation->set_rules('place_of_birth','Birth Place','trim|required|xss_clean|alpha');
	
					 $this->form_validation->set_rules('total_amt','Total Amount','trim|required|xss_clean');
					 $this->form_validation->set_rules('emi_number','EMI Number ','trim|required|xss_clean|alpha_numeric');
					 $this->form_validation->set_rules('emi_amt','EMI Amount ','trim|required|xss_clean');
					 $this->form_validation->set_rules('no_paid_emi','Number of Paid EMI','trim|required|xss_clean|numeric');
					 $this->form_validation->set_rules('emi_date','EMI Payment Date','trim|required|xss_clean');
					 $this->form_validation->set_rules('loan_agency','Loan Agency','trim|required|xss_clean|alpha');
					 $this->form_validation->set_rules('loan_agency_address','Address','trim|required|xss_clean|alpha_numeric');
					 $this->form_validation->set_rules('loan_agency_phn','Agency ContactInfo ','trim|required|xss_clean|regex_match[/^[0-9]{10}$/]|is_unique[vehicle_loans.loan_agency_phone]');
					 $this->form_validation->set_rules('loan_agency_mail','Mail ID','trim|required|xss_clean|valid_email|is_unique[vehicle_loans.loan_agency_email]');
					 $this->form_validation->set_rules('loan_agency_web','Web Address','trim|required|xss_clean|alpha_numeric');
					 
					 //for insurance
$err=True;
	if(preg_match('#[^0-9\.]#', $data['total_amount'])){
			$this->mysession->set('Err_loan_amt','Invalid Characters on Total Amount field!');
			$err=False;
			}
	if(preg_match('#[^0-9\.]#', $data['emi_amount'])){
			$this->mysession->set('Err_loan_emi_amt','Invalid Characters on EMI Amount field!');
			$err=False;
			}

	 if($this->form_validation->run()==False|| $err==False){
		
		$this->mysession->set('loan_post_all',$data);
		
		redirect(base_url().'organization/front-desk/vehicle/loan',$data);	
	 }
	 
	  else{
	  //database insertion for vehicle

	  $result=$this->vehicle_model->insertLoan($data);
	 
	  if($result==true){
		$this->mysession->set('loan_Success',' Added Succesfully..!');
				    $this->mysession->set('loan_Error','');
				    redirect(base_url().'organization/front-desk/vehicle/loan');
		}
		else{
		$this->mysession->set('loan_post_all',$data);
		
		redirect(base_url().'organization/front-desk/vehicle/loan');
		}
	  }
		}
		else{
			echo 'you are not authorized access this page..';
			}
		}
}
?>