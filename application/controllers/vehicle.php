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
		public function vehicle_manage(){
		if($this->session_check()==true) {
	$data['name']=$this->input->post('name');
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
	$data['email']=$this->input->post('email');
	$data['license_number']=$this->input->post('license_number');
		
		}
		else{
			echo 'you are not authorized access this page..';
			}
		}
}
?>