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
	
		$tbl=array('vehicle-ownership'=>'vehicle_ownership_types','vehicle-types'=>'vehicle_types','ac-types'=>'vehicle_ac_types','fuel-types'=>'vehicle_fuel_types','seating-capacity'=>'vehicle_seating_capacity','beacon-light-options'=>'vehicle_beacon_light_options ','vehicle-makes'=>'vehicle_makes','driver-bata-percentages'=>'vehicle_driver_bata_percentages ','permit-types'=>'vehicle_permit_types');
			if($param1=='getDescription') {
			$this->getDescription();
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
				if(isset($_REQUEST['submit-one'])){
				$this->vehicle_validation();
				}
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
			$data['driver']=$this->input->post('driver');
			$data['from_date']=$this->input->post('from_date');
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
			
			
					$this->form_validation->set_rules('place_of_birth','Birth Place','trim|required|xss_clean|alpha');
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
	if(preg_match('#[^0-9\.]#', $data['permit_amount'])){
			$this->mysession->set('Err_permit_amt','Invalid Characters on Permit Amount field!');
			$err=false;
			}
	if(preg_match('#[^0-9\.]#', $data['tax_amount'])){
			$this->mysession->set('Err_tax_amt','Invalid Characters on Tax Amount field!');
			$err=false;
			}
	if($data['ownership'] ==-1){
	 $data['ownership'] ='';
	 $err=False;
	 $this->mysession->set('ownership','Choose Ownership Type');
	 }
	 if($data['vehicle_type'] ==-1){
	 $data['vehicle_type'] ='';
	 $err=False;
	 $this->mysession->set('vehicle_type','Choose Vehicle Type');
	 }
	 if($data['make'] ==-1){
	 $data['make'] ='';
	 $err=False;
	 $this->mysession->set('make','Choose Vehicle Make');
	 }
	 if($data['ac'] ==-1){
	 $data['ac'] ='';
	 $err=False;
	 $this->mysession->set('ac','Choose AC Type');
	 }
	 if($data['fuel'] ==-1){
	 $data['fuel'] ='';
	 $err=False;
	 $this->mysession->set('fuel','Choose Fuel Type');
	 }
	  if($data['seat'] ==-1){
	 $data['seat'] ='';
	 $err=False;
	 $this->mysession->set('seat','Choose Seat Capacity');
	 }
	  if($data['permit'] ==-1){
	 $data['permit'] ='';
	 $err=False;
	 $this->mysession->set('permit','Choose Permit Type');
	 }
	  if($data['driver'] ==-1){
	 $data['driver'] ='';
	 $err=False;
	 $this->mysession->set('Driver','Choose Any Driver');
	 }
	 if($this->form_validation->run()==False|| $err==False){
		$this->mysession->set('post',$data);
		redirect(base_url().'organization/front-desk/vehicle',$data);	
	 }
	  else{
	  //database insertion for vehicle
	  echo "hi";exit;
	  $result=$this->vehicle_model->insertVehicle($data);
	  }
		}
		else{
			echo 'you are not authorized access this page..';
			}
		}
}
?>