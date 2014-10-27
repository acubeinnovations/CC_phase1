<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_xl extends CI_Controller {

	public function __construct()
{
    parent::__construct();
    $this->load->helper('my_helper');
    $this->load->model('print_model');
    $this->load->model('driver_model');
    $this->load->model('vehicle_model');
    $this->load->model('customers_model');
    $this->load->model('user_model');
    $this->load->model('trip_booking_model');
    no_cache();

}
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
	} else {
		return false;
	}

	}    
	public function index(){
		$param1=$this->uri->segment(4);
        if($this->session_check()==true) {
		
			if($param1=='driver'){

				$this->driverXL();

			}else if($param1=='vehicle'){
			
				$this->vehicleXL();

			}else if($param1=='trips'){
				
				$this->tripsXL();

			}else{

				$this->notFound();
			}
		}else{
			
			$this->notAuthorized();
		}
	
    }
	
    public function driverXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');
	$name= $this->input->get('name');
	$city= $this->input->get('city');
	$qry='select * from drivers where organisation_id='.$this->session->userdata('organisation_id');
		if(isset($name)&& $name!=null && isset($city)&& $city!=null){
		$qry.=' AND name LIKE "%'.$name.'%" AND district LIKE "%'.$city.'%" ';
		}
		if($name!=null && $city==null){
		$qry.=' AND name LIKE "%'.$name.'%" ';
		}
		if($name==null && $city!=null){
		$qry.=' AND district LIKE "%'.$city.'%" ';
		}
	
	$data['values']=$this->print_model->all_details($qry);
	$data['title']='Driver List| '.PRODUCT_NAME;
	$page='user-pages/print_listDrivers';
	$this->load_templates($page,$data);	

	}
	public function vehicleXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');

	}
	public function tripsXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');
		
			
			if((isset($_REQUEST['pickupdate']) || isset($_REQUEST['dropdate']) || isset($_REQUEST['vehicles'])|| isset($_REQUEST['drivers'])|| isset($_REQUEST['trip_status']))){
				$qry='SELECT VO.name as ownership,T.customer_id,T.customer_group_id,T.vehicle_model_id,T.driver_id,T.vehicle_id,T.guest_id,V.vehicle_ownership_types_id,T.tariff_id,T.trip_status_id,T.id as trip_id,T.booking_date,T.drop_date,T.drop_time,T.pick_up_date,T.pick_up_time,VM.name as model,V.registration_number,T.pick_up_city,T.pick_up_area,G.name as guest_name,G.mobile as guest_info,T.drop_city,T.drop_area,C.name as customer_name,C.mobile as customer_mobile,CG.name as customer_group,D.name as driver,D.mobile as driver_info FROM trips T LEFT JOIN vehicle_models VM ON VM.id=T.vehicle_model_id LEFT JOIN vehicles V ON V.id=T.vehicle_id LEFT JOIN customers G ON G.id=T.guest_id LEFT JOIN customers C ON C.id=T.customer_id LEFT JOIN customer_groups CG ON CG.id=T.customer_group_id LEFT JOIN drivers D ON D.id=T.driver_id LEFT JOIN vehicle_ownership_types VO ON V.vehicle_ownership_types_id=VO.id where T.organisation_id='.$this->session->userdata('organisation_id');
				
				if(isset($_REQUEST['pickupdate']) && isset($_REQUEST['dropdate'])){
					
					$qry.=' AND T.pick_up_date BETWEEN "'.$_REQUEST['pickdate'].'" AND "'.$_REQUEST['dropdate'].'" AND T.drop_date BETWEEN "'.$_REQUEST['pickdate'].'" AND "'.$_REQUEST['dropdate'].'"';		
					
				}else if(isset($_REQUEST['pickupdate'])){
				
				$qry.=' AND T.pick_up_date ="'.$_REQUEST['pickupdate'].'"';
				
				}else if(isset($_REQUEST['dropdate'])){
				
				$qry.=' AND T.drop_date ="'.$_REQUEST['dropdate'].'"';
				}
				if(isset($_REQUEST['vehicles']) && $_REQUEST['vehicles']!=gINVALID){
					
					$qry.=' AND T.vehicle_id ="'.$_REQUEST['vehicles'].'"';
				
				}
				if(isset($_REQUEST['drivers']) && $_REQUEST['drivers']!=gINVALID){
					
					$qry.=' AND T.driver_id ="'.$_REQUEST['drivers'].'"';
					
				}
				if(isset($_REQUEST['trip_status']) && $_REQUEST['trip_status']!=gINVALID){
					
					$qry.=' AND T.trip_status_id ="'.$_REQUEST['trip_status'].'"';
				
					
				}
		
					$qry.=' order by T.id desc';
				$tbl_arry=array('trip_statuses','customer_groups');
	
			for ($i=0;$i<count($tbl_arry);$i++){
			$result=$this->user_model->getArray($tbl_arry[$i]);
			if($result!=false){
			$data[$tbl_arry[$i]]=$result;
			}
			else{
			$data[$tbl_arry[$i]]='';
			}
			}
			/*if($param2=='1'){
				$param2=0;
			}*/
			//echo $qry;exit;
			$data['vehicles']=$this->trip_booking_model->getVehiclesArray($condition='');
			$data['drivers']=$this->driver_model->getDriversArray($condition=''); 
			
			$data['trips']=$this->print_model->all_details($qry);
			if(empty($data['trips'] || $data['trips']==false)){
				$data['result']="No Results Found !";
			}
			$data['status_class']=array(TRIP_STATUS_PENDING=>'label-warning',TRIP_STATUS_CONFIRMED=>'label-success',TRIP_STATUS_CANCELLED=>'label-danger',TRIP_STATUS_CUSTOMER_CANCELLED=>'label-danger',TRIP_STATUS_ON_TRIP=>'label-primary',TRIP_STATUS_TRIP_COMPLETED=>'label-success',TRIP_STATUS_TRIP_PAYED=>'label-info',TRIP_STATUS_TRIP_BILLED=>'label-success');
			$data['trip_statuses']=$this->user_model->getArray('trip_statuses'); 
			$data['customers']=$this->customers_model->getArray();
			$data['title']="Trips | ".PRODUCT_NAME;  
			$page='user-pages/print_listTrips';
		    $this->load_templates($page,$data);
	}

	}
	
	public function load_templates($page='',$data=''){
	if($this->session_check()==true) {
   	$this->load->view($page,$data);
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
	public function notFound(){
		if($this->session_check()==true) {
		 $this->output->set_status_header('404'); 
		 $data['title']="Not Found";
      	 $page='not_found';
         $this->load_templates($page,$data);
		}else{
			$this->notAuthorized();
	}
	}

}
