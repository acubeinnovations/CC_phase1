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
		echo $param1;exit;
		$tbl=array('vehicle-ownership'=>'vehicle_ownership_types','vehicle-types'=>'vehicle_types','ac-types'=>'vehicle_ac_types','fuel-types'=>'vehicle_fuel_types','seating-capacity'=>'vehicle_seating_capacity','beacon-light-options '=>'vehicle_beacon_light_options ','vehicle-makes'=>'vehicle_makes','driver-bata-percentages '=>'vehicle_driver_bata_percentages ','permit-types'=>'vehicle_permit_types');
			if($param1=='vehicle-ownership') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='vehicle-types') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='ac-types') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='fuel-types') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='seating-capacity') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='beacon-light-options') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='vehicle-makes') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='driver-bata-percentages') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
		if($param1=='permit-types') {
			
				if(isset($_REQUEST['add'])){
					$this->addOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['edit'])){
					$this->editOwnership($tbl,$param1);
					}
				if(isset($_REQUEST['delete'])){
					$this->deleteOwnership($tbl,$param1);
					}
		}
	}
		
		else{
			echo 'you are not authorized access this page..';
			}
	}
		
	
	public function addOwnership($tbl,$param1){
	echo $tbl.$param1;exit;
	$data['name']=$this->input->post('name');
	
	$data['description']=$this->input->post('description');
	$result=$this->settings_model->addValues($tbl[$param1],$data);
	if($result==true){
	 $this->session->set_userdata(array('dbSuccess'=>'Details Added Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'user/settings');
	}
	
	}
	
	public function editOwnership($tbl,$param1){
	//get id via ajax
	$data['name']=$this->input->post('name');
	$data['description']=$this->input->post('description');
	$result=$this->settings_model->updateValues($tbl[$param1],$data);
	if($result==true){
	 $this->session->set_userdata(array('dbSuccess'=>'Details Updated Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'user/settings');
	}
	}
	
	public function deleteOwnership(){
	//get id via ajax
	$result=$this->settings_model->deleteValues($tbl[$param1],$data);
	if($result==true){
	 $this->session->set_userdata(array('dbSuccess'=>'Details Updated Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'user/settings');
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