<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->load->helper('my_helper');
	$this->load->model('user_model');
	$this->load->model('driver_model');
	$this->load->model('customers_model');
	$this->load->model('trip_booking_model');
	$this->load->model('customers_model');
    $this->load->model('tarrif_model');
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
		$param1=$this->uri->segment(3);
		$param2=$this->uri->segment(4);
		$param3=$this->uri->segment(5);
        if($this->session_check()==true) {
		if($param1==''){
		$data['title']="Home | CC Phase1";    
        $page='user-pages/user_home';
		$this->load_templates($page,$data);
		}elseif($param1=='profile'){
		$this->profile();
		}elseif($param1=='changepassword'){
		$this->changePassword();
		}
		elseif($param1=='settings'){
		$this->settings();
		}elseif($param1=='trip-booking'){

		$this->ShowBookTrip($param2);
		}elseif($param1=='trips'){

		$this->Trips($param2);
		}elseif($param1=='customer'){

		$this->Customer($param2);

		}elseif($param1=='customers'){

		$this->Customers($param2);

		}elseif($param1=='tarrif-masters'&& ($param2== ''|| is_numeric($param2))){
		$this->tarrif_masters($param1,$param2);
		}elseif($param1=='tarrif'&& ($param2== ''|| is_numeric($param2))){
		$this->tarrif($param1,$param2);

		}
		elseif($param1=='driver'){

		$this->ShowDriverView($param1);
		}elseif($param1=='list-driver'&&($param2== ''|| is_numeric($param2))){
		$this->ShowDriverList($param1,$param2);
		}elseif($param1=='driver-profile'&&($param2== ''|| is_numeric($param2))){
		$this->ShowDriverProfile($param1,$param2);
		}
		elseif($param1=='vehicle' && ($param2== ''|| is_numeric($param2)) &&($param3== ''|| is_numeric($param3))){

		$this->ShowVehicleView($param1,$param2,$param3);
		}
		elseif($param1=='vehicle' && $param2=='insurance'&& ($param3== ''|| is_numeric($param3))){
		$this->ShowVehicleView($param1,$param2,$param3);
		}
		elseif($param1=='vehicle' && $param2=='loan' && ($param3== ''|| is_numeric($param3))){
		$this->ShowVehicleView($param1,$param2,$param3);
		}
		elseif($param1=='vehicle' && $param2=='owner' && ($param3== ''|| is_numeric($param3))){
		$this->ShowVehicleView($param1,$param2,$param3);
		}
		elseif($param1=='list-vehicle'&&($param2== ''|| is_numeric($param2)) && ($param3== ''|| is_numeric($param3))){
		$this->ShowVehicleList($param1,$param2,$param3);
		}
		}else{
			echo 'you are not authorized access this page..';
		}
	
    }
	
	public function settings() {
	if($this->session_check()==true) {
	$tbl_arry=array('vehicle_ownership_types','vehicle_types','vehicle_ac_types','vehicle_fuel_types','vehicle_seating_capacity','vehicle_beacon_light_options','vehicle_makes','vehicle_driver_bata_percentages','vehicle_permit_types','languages','language_proficiency','driver_type','payment_type','customer_types','customer_groups','customer_registration_types','marital_statuses','bank_account_types','id_proof_types','trip_models','trip_statuses','booking_sources','trip_expense_type','vehicle_models');
	
	for ($i=0;$i<24;$i++){
	$result=$this->user_model->getArray($tbl_arry[$i]);
	if($result!=false){
	$data[$tbl_arry[$i]]=$result;
	}
	else{
	$data[$tbl_arry[$i]]='';
	}
	}
	$data['title']="Settings | ".PRODUCT_NAME;  
	$page='user-pages/settings';
	$this->load_templates($page,$data);
	}
	else{
			echo 'you are not authorized access this page..';
		}
	}
	public function tarrif_masters($param1,$param2) {
	if($this->session_check()==true) {
	$tbl_arry=array('trip_models','vehicle_makes','vehicle_ac_types','vehicle_types');
	$this->load->model('user_model');
		for ($i=0;$i<4;$i++){
	$result=$this->user_model->getArray($tbl_arry[$i]);
	if($result!=false){
	$data[$tbl_arry[$i]]=$result;
	//print_r($result);exit;
	//echo $result['id'];exit;
	}
	else{
	$data[$tbl_arry[$i]]='';
	}
	}
	
		$condition='';
	    $per_page=10;
	    $like_arry='';
	    $where_arry='';
	if(isset($_REQUEST['search'])){
		$title = $this->input->post('search_title');
		$trip_model_id = $this->input->post('search_trip_model');
		$vehicle_ac_type_id = $this->input->post('search_ac_type');
	 if(($title=='')&& ($trip_model_id == -1) && ($vehicle_ac_type_id ==-1)){
	 $this->session->set_userdata('Required','Choose Any Category');
	 redirect(base_url().'organization/front-desk/tarrif-masters');
		}
		else {
		//show search results
		
	if((isset($_REQUEST['search_title'])|| isset($_REQUEST['search_trip_model'])||isset($_REQUEST['search_ac_type']))&& isset($_REQUEST['search'])){
	if($param2==''){
	$param2=0;
	}
	
	if($_REQUEST['search_title']!=null){
	
	$like_arry=array('title'=> $_REQUEST['search_title']);
	}
	if($_REQUEST['search_trip_model']>0){
	$where_arry['trip_model_id']=$_REQUEST['search_trip_model'];
	}
	if($_REQUEST['search_ac_type']>0){
	$where_arry['vehicle_ac_type_id']=$_REQUEST['search_ac_type'];
	}
	$this->session->set_userdata(array('condition'=>array("like"=>$like_arry,"where"=>$where_arry)));
	
	}
	}
	}
	    
		$tbl="tariff_masters";
		$baseurl=base_url().'organization/front-desk/tarrif-masters/';
		$uriseg ='4';
		if($param2==''){
		$this->session->set_userdata('condition','');
		}
		
		$p_res=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
		
		
	$data['values']=$p_res['values'];
	$data['page_links']=$p_res['page_links'];
	$data['title']="Tarrif Masters | ".PRODUCT_NAME;  
	$page='user-pages/tarrif_master';
	$this->load_templates($page,$data);
	
	
	}
	else{
			echo 'you are not authorized access this page..';
		}
	
	}
	public function tarrif($param1,$param2){
	if($this->session_check()==true) {
	$result=$this->user_model->getTarrif_masters();
	if($result!=false){
	$data['masters']=$result;
	}else
	{
	$data['masters']='';
	}	//start
		$condition='';
	    $per_page=10;
	    $where_arry='';
	if(isset($_REQUEST['search'])){
		$fdate = $this->input->post('search_from_date');
		$tdate = $this->input->post('search_to_date');
		if($fdate!=''&& $tdate==''){
		$tdate=date('Y-m-d');
		}
	 if(($fdate=='')&& ($tdate =='')){
	 $this->session->set_userdata('Required','Choose Date');
	 redirect(base_url().'organization/front-desk/tarrif');
		}
		else {
		//show search results
		
	if((isset($_REQUEST['search_from_date'])|| isset($_REQUEST['search_to_date']))&& isset($_REQUEST['search'])){
	if($param2==''){
	$param2=0;
	}
	if(($_REQUEST['search_from_date']>= $tdate)){
	$this->session->set_userdata('Date_err','Not a valid search');
	}
	if($_REQUEST['search_from_date']!=null){
	
	$where_arry['from_date >=']=$_REQUEST['search_from_date'];
	}
	if($_REQUEST['search_to_date']!=null){
	$where_arry['to_date <=']= $_REQUEST['search_to_date'];
	}
	else{
	$where_arry['to_date <=']= $tdate;
	}
	
	$this->session->set_userdata(array('condition'=>array("where"=>$where_arry)));
	
	//print_r($where_arry);
	}
	}
	}
	    
		$tbl="tariffs";
		$baseurl=base_url().'organization/front-desk/tarrif/';
		$uriseg ='4';
		if($param2==''){
		$this->session->set_userdata('condition','');
		}
		
		$p_res=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
		
		
	$data['values']=$p_res['values'];
	$data['page_links']=$p_res['page_links'];
	//end
	//$data['allDetails']=$this->user_model->getAll_tarrifDetails();
	$data['title']="Tarrif| ".PRODUCT_NAME; 
	$page='user-pages/tarrif';
	$this->load_templates($page,$data);
	
	}
	else{
			echo 'you are not authorized access this page..';
		}
	}
	public function ShowBookTrip($trip_id =''){
	if($this->session_check()==true) {
	
	$tbl_arry=array('booking_sources','trip_models','vehicle_types','vehicle_ac_types','vehicle_fuel_types','vehicle_seating_capacity','vehicle_beacon_light_options','languages','payment_type','customer_types','customer_groups');
	
	for ($i=0;$i<count($tbl_arry);$i++){
	$result=$this->user_model->getArray($tbl_arry[$i]);
	if($result!=false){
	$data[$tbl_arry[$i]]=$result;
	}
	else{
	$data[$tbl_arry[$i]]='';
	}
	}//echo date('Y-m-d H:i');
	$conditon =array('trip_status_id'=>TRIP_STATUS_PENDING,'CONCAT(pick_up_date," ",pick_up_time) >='=>date('Y-m-d H:i'));
	$orderby = ' CONCAT(pick_up_date,pick_up_time) ASC';
	$data['notification']=$this->trip_booking_model->getDetails($conditon,$orderby);
	$data['customers_array']=$this->customers_model->getArray();

	if($trip_id!='' && $trip_id > 0) {
	$conditon = array('id'=>$trip_id);
	$result=$this->trip_booking_model->getDetails($conditon);
	$result=$result[0];
	$data1['trip_id']=$result->id;
	$data1['recurrent_continues']='';
	$data1['recurrent_alternatives']='';
	if(isset($result->customer_group_id) && $result->customer_group_id > 0){
		$data1['advanced']=TRUE;
		$data1['customer_group']=$result->customer_group_id;
	}else{
		$data1['advanced']='';
		$data1['customer_group']='';
	}

	
	if(isset($result->guest_id) && $result->guest_id > 0){
	$dbdata=array('id'=>$result->guest_id);
	$guest 	=	$this->customers_model->getCustomerDetails($dbdata);
	$guest 	=$guest[0];
	$data1['guest_id']	= $result->guest_id;
	$data1['guest']	=	TRUE;
	$data1['guestname']=	$guest['name'];
	$data1['guestemail']=$guest['email'];
	$data1['guestmobile']=$guest['mobile'];
	}else{
	$data1['guest']='';
	$data1['guestname']='';
	$data1['guestemail']='';
	$data1['guestmobile']='';
	}
	
	$dbdata=array('id'=>$result->customer_id);	
	$customer 	=	$this->customers_model->getCustomerDetails($dbdata);
	$customer=$customer[0];
	$data1['customer']				=	$customer['name'];
	$data1['new_customer']			=	'false';
	$data1['email']					=	$customer['email'];
	$data1['mobile']				=	$customer['mobile'];

	$this->session->set_userdata('customer_id',$result->customer_id);
	$this->session->set_userdata('customer_name',$customer['name']);
	$this->session->set_userdata('customer_email',$customer['email']);
	$this->session->set_userdata('customer_mobile',$customer['mobile']);
	
	$data1['booking_source']			=	$result->booking_source_id;	
	$data1['source']					=	$result->source;
	$data1['trip_model']				=	$result->trip_model_id;
	$data1['no_of_passengers']		=	$result->no_of_passengers;
	$data1['pickupcity']				=	$result->pick_up_city;
	$data1['pickupcitylat']			=	$result->pick_up_lat;
	$data1['pickupcitylng']			=	$result->pick_up_lng;
	$data1['pickuparea']				=	$result->pick_up_area;
	$data1['pickuplandmark']			=	$result->pick_up_landmark;
	$data1['viacity']				=	$result->via_city;
	$data1['viacitylat']				=	$result->via_lat;
	$data1['viacitylng']				=	$result->via_lng;
	$data1['viaarea']				=	$result->via_area;
	$data1['vialandmark']			=	$result->via_landmark;
	$data1['dropdownlocation']		=	$result->drop_city;
	$data1['dropdownlocationlat']	=	$result->drop_lat;
	$data1['dropdownlocationlng']	=	$result->drop_lng;
	$data1['dropdownarea']			=	$result->drop_area;
	$data1['dropdownlandmark']		=	$result->drop_landmark;
	$data1['pickupdatepicker']		=	$result->pick_up_date;
	$data1['dropdatepicker']			=	$result->drop_date;
	$data1['pickuptimepicker']		=	$result->pick_up_time;
	$data1['droptimepicker']			=	$result->drop_time;
	$pickupdatetime			= $result->pick_up_date.' '.$result->pick_up_time;
	$dropdatetime			= $result->drop_date.' '.$result->drop_time;
	$data1['vehicle_type']			=	$result->vehicle_type_id;
	$data1['vehicle_ac_type']		=	$result->vehicle_ac_type_id;
	$data1['recurrent_yes']			= 	'';
	if(isset($result->vehicle_beacon_light_option_id) && $result->vehicle_beacon_light_option_id > 0){
		$data1['beacon_light']=TRUE;
		if($result->vehicle_beacon_light_option_id==BEACON_LIGHT_RED){

			$data1['beacon_light_radio']='red';
					
		}else{
	
			$data1['beacon_light_radio']='blue';
			
		}
	}else{

		$data1['beacon_light']='';
		$data1['beacon_light_radio']='';
		$data1['beacon_light_id'] = '';

	}
	if(isset($result->pluckcard) && $result->pluckcard==true){
		$data1['pluck_card']=TRUE;
	}else{
		$data1['pluck_card']='';
	}
	if(isset($result->uniform) && $result->uniform==true){
		$data1['uniform']=TRUE;
	}else{
		$data1['uniform']='';
	}
	$data1['seating_capacity']		=	$result->vehicle_seating_capacity_id;
	$data1['language']				=	$result->driver_language_id;
	$data1['tariff']				=	$result->tariff_id;
	$data1['available_vehicle']		=	$result->vehicle_id;
	$this->session->set_userdata('driver_id',$result->driver_id);
	$data1['customer_type']			=	$result->customer_type_id;
	}
	if(isset($data1['vehicle_type']) && isset($data1['vehicle_ac_type']) && isset($pickupdatetime) && isset($dropdatetime)){
	$available=array('vehicle_type'=>$data1['vehicle_type'],'vehicle_ac_type'=>$data1['vehicle_ac_type'],'pickupdatetime'=>$pickupdatetime,'dropdatetime'=>$dropdatetime,'organisation_id'=>$this->session->userdata('organisation_id'));
	$res_vehicles=$this->getAvailableVehicle($available);
	
	$res_tariffs=$this->tariffSelecter($available);
	$available_vehicles='';
	$available_tarif='';
	if(count($res_vehicles[0])>0){
	for($index_vehicles=0;$index_vehicles<count($res_vehicles);$index_vehicles++){
		$available_vehicles[$res_vehicles[$index_vehicles]['vehicle_id']]=$res_vehicles[$index_vehicles]['registration_number'];
	}
	}
	for($index_tarif=0;$index_tarif<count($res_tariffs);$index_tarif++){
		$available_tarif[$res_tariffs[$index_tarif]['id']]=$res_tariffs[$index_tarif]['title'];
	}
	$data['tariffs']=$available_tarif;
	$data['available_vehicles']=$available_vehicles;
	}else if(isset($data1['vehicle_type']) && isset($data1['vehicle_ac_type'])){
	$available=array('vehicle_type'=>$data1['vehicle_type'],'vehicle_ac_type'=>$data1['vehicle_ac_type'],'organisation_id'=>$this->session->userdata('organisation_id'));
	$res_tariffs=$this->tariffSelecter($available);
	$data['available_vehicles']='';
	}else{
	$data['tariffs']='';
	$data['available_vehicles']='';
	}
	if(isset($data1) && count($data1)>0){
	$data['information']=$data1;
	}else{
	$data['information']=false;
	}
	$data['title']="Trip Booking | ".PRODUCT_NAME;  
	$page='user-pages/trip-booking';
	$this->load_templates($page,$data);
	}
	else{
			echo 'you are not authorized access this page..';
		}
	}

	public function getAvailableVehicle($available){
	
	
	return $this->trip_booking_model->selectAvailableVehicles($available);

	}
	public function tariffSelecter($data){
	
	return $this->tarrif_model->selectAvailableTariff($data);

	

	}
	public function Trips($param2){
		if($this->session_check()==true) {
			
			$tbl="trips";
			$baseurl=base_url().'organization/front-desk/trips/';
			$per_page=10;
			$uriseg ='4';
			$tdate=date('Y-m-d');
			$where_arry['organisation_id']=$this->session->userdata('organisation_id');
			if((isset($_REQUEST['trip_pick_date'])|| isset($_REQUEST['trip_drop_date']))&& isset($_REQUEST['trip_search'])){
				if($param2==''){
				$param2=0;
				}
				if($_REQUEST['trip_pick_date']!=null && $_REQUEST['trip_drop_date']!=null){
					$data['trip_pick_date']=$_REQUEST['trip_pick_date'];
					$data['trip_drop_date']=$_REQUEST['trip_drop_date'];
					$where_arry['pick_up_date >=']=$_REQUEST['trip_pick_date'];
					$where_arry['drop_date <=']= $_REQUEST['trip_drop_date'];
				}else if($_REQUEST['trip_pick_date']!=null){
				$data['trip_pick_date']=$_REQUEST['trip_pick_date'];
				$where_arry['pick_up_date =']=$_REQUEST['trip_pick_date'];
				}else if($_REQUEST['trip_drop_date']!=null){
				$where_arry['drop_date =']= $_REQUEST['trip_drop_date'];
				$data['trip_drop_date']=$_REQUEST['trip_drop_date'];
				}
				if($_REQUEST['vehicles']!=null && $_REQUEST['vehicles']!=gINVALID){
					$data['vehicle_id']= $_REQUEST['vehicles'];
					$where_arry['vehicle_id']= $_REQUEST['vehicles'];
				}
				if($_REQUEST['drivers']!=null && $_REQUEST['drivers']!=gINVALID){
					$data['driver_id']= $_REQUEST['drivers'];
					$where_arry['driver_id']= $_REQUEST['drivers'];
				}
				if($_REQUEST['trip_status_id']!=null && $_REQUEST['trip_status_id']!=gINVALID){
					$data['trip_status_id']= $_REQUEST['trip_status_id'];
					$where_arry['trip_status_id']= $_REQUEST['trip_status_id'];
				}
				
			}
			$tbl_arry=array('trip_statuses');
	
			for ($i=0;$i<count($tbl_arry);$i++){
			$result=$this->user_model->getArray($tbl_arry[$i]);
			if($result!=false){
			$data[$tbl_arry[$i]]=$result;
			}
			else{
			$data[$tbl_arry[$i]]='';
			}
			}
			$data['vehicles']=$this->trip_booking_model->getVehiclesArray($condition='');
			$data['drivers']=$this->driver_model->getDriversArray($condition='');
			$this->mysession->set('condition',array("where"=>$where_arry));
			$paginations=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
			if($param2==''){
				$this->mysession->delete('condition');
			}
			$data['page_links']=$paginations['page_links'];
			$data['trips']=$paginations['values'];//echo '<pre>';print_r($data['trips']);echo '</pre>';exit;
			//$data['trips']=$this->trip_booking_model->getDetails($conditon='');echo '<pre>';print_r($data['trips']);echo '</pre>';exit;
			$data['status_class']=array(TRIP_STATUS_PENDING=>'label-warning',TRIP_STATUS_CONFIRMED=>'label-success',TRIP_STATUS_CANCELLED=>'label-danger',TRIP_STATUS_CUSTOMER_CANCELLED=>'label-danger',TRIP_STATUS_ON_TRIP=>'label-primary',TRIP_STATUS_TRIP_COMPLETED=>'label-success',TRIP_STATUS_TRIP_PAYED=>'label-info');
			$data['trip_statuses']=$this->user_model->getArray('trip_statuses');
			$data['customers']=$this->customers_model->getArray();
			$data['title']="Trips | ".PRODUCT_NAME;  
			$page='user-pages/trips';
		    $this->load_templates($page,$data);
		    }else{
				echo 'you are not authorized access this page..';
			}
		
	}	
	
	public function Customer($param2=''){
		if($this->session_check()==true) {
			if($param2!=''){
				$condition=array('id'=>$param2);
				$result=$this->customers_model->getCustomerDetails($condition);
				$pagedata['id']=$result[0]['id'];
				$pagedata['name']=$result[0]['name'];
				$pagedata['email']=$result[0]['email'];
				$pagedata['dob']=$result[0]['dob'];
				$pagedata['mobile']=$result[0]['mobile'];
				$pagedata['address']=$result[0]['address'];
				$pagedata['customer_group_id']=$result[0]['customer_group_id'];
				$pagedata['customer_type_id']=$result[0]['customer_type_id'];
			}
			$tbl_arry=array('customer_types','customer_groups');
	
			for ($i=0;$i<count($tbl_arry);$i++){
			$result=$this->user_model->getArray($tbl_arry[$i]);
			if($result!=false){
			$data[$tbl_arry[$i]]=$result;
			}
			else{
			$data[$tbl_arry[$i]]='';
			}
			}
			$data['title']="Customer | ".PRODUCT_NAME;
			if(isset($pagedata)){ 
				$data['values']=$pagedata;
			}else{
				$data['values']=false;
			}
			
			$page='user-pages/customer';
		    $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}

	}	

	public function load_templates($page='',$data=''){
	if($this->session_check()==true) {
		$this->load->view('admin-templates/header',$data);
		$this->load->view('admin-templates/nav');
		$this->load->view($page,$data);
		$this->load->view('admin-templates/footer');
		}
	else{
			echo 'you are not authorized access this page..';
		}
	}

public function	Customers($param2){
			if($this->session_check()==true) {
			$tbl_arry=array('customer_types');
	
			for ($i=0;$i<count($tbl_arry);$i++){
			$result=$this->user_model->getArray($tbl_arry[$i]);
			if($result!=false){
			$data[$tbl_arry[$i]]=$result;
			}
			else{
			$data[$tbl_arry[$i]]='';
			}
			}
			
			$tbl="customers";
			$baseurl=base_url().'organization/front-desk/customers/';
			$per_page=10;
			$uriseg ='4';
			//$like_arry='';
			
			$where_arry['organisation_id']=$this->session->userdata('organisation_id');
			if((isset($_REQUEST['customer'])|| isset($_REQUEST['mobile']) || isset($_REQUEST['customer_type_id']))&& isset($_REQUEST['customer_search'])){				$like_arry='';
				if($param2==''){
				$param2=0;
				}
				if($_REQUEST['customer']!=null){
					$data['customer']=$_REQUEST['customer'];
					$like_arry['name']=$_REQUEST['customer'];
				}
				if($_REQUEST['mobile']!=null){
					$data['mobile']=$_REQUEST['mobile'];
					$like_arry['mobile']=$_REQUEST['mobile'];
				}
				if($_REQUEST['customer_type_id']!=null && $_REQUEST['customer_type_id']!=gINVALID){
				$data['customer_type_id']=$_REQUEST['customer_type_id'];
				$where_arry['customer_type_id']=$_REQUEST['customer_type_id'];
				}
				$this->mysession->set('condition',array("where"=>$where_arry,"like"=>$like_arry));
			}
			
			
			$paginations=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
			if($param2==''){
				$this->mysession->delete('condition');
			}
			$data['page_links']=$paginations['page_links'];
			$data['customers']=$paginations['values'];			
	
			$data['title']="Customers | ".PRODUCT_NAME;  
			$page='user-pages/customers';
		    $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}
}
	
public function profile() {
	   if($this->session_check()==true) {
		
		$dbdata = '';
              if(isset($_REQUEST['user-profile-update'])){
			  $dbdata['first_name'] = $this->input->post('firstname');
			$dbdata['last_name']  = $this->input->post('lastname');
		    $dbdata['email'] 	   = $this->input->post('email');
			$hmail 	   = $this->input->post('hmail');
			$dbdata['phone'] 	   = $this->input->post('phone');
			$hphone 	   = $this->input->post('hphone');
		    $dbdata['address']   = $this->input->post('address');
			$dbdata['username']   = $this->input->post('husername');
			//$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|xss_clean|alpha_numeric');
			if($dbdata['email'] == $hmail){
			$this->form_validation->set_rules('email','Mail','trim|required|valid_email');
		}else{
			$this->form_validation->set_rules('email','Mail','trim|required|valid_email|is_unique[users.email]');
		}
			if($dbdata['phone'] == $hphone){
			$this->form_validation->set_rules('phone','Phone','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
		}else{
			$this->form_validation->set_rules('phone','Phone','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean||is_unique[users.phone]');
		}
			
			$this->form_validation->set_rules('address','Address','trim|required|min_length[10]|xss_clean');
			//$dbdata['username']  = $this->input->post('username');
		   	
			
			if($this->form_validation->run() != False) {
				$val    		   = $this->user_model->updateProfile($dbdata);
				redirect(base_url().'organization/front-desk');
			}else{
				$this->show_profile($dbdata);
			}
		}else{
			
			$this->show_profile($dbdata);

		}
	   }	
		else{
			echo 'you are not authorized access this page..';
		}
	}
	public function show_profile($data) {
		  if($this->session_check()==true) {
			if($data == ''){
			$data['values']=$this->user_model->getProfile();
			}else{
			$data['postvalues']=$data;
			}
			$data['title']="Profile | ".PRODUCT_NAME;  
			$page='user-pages/profile';
		    $this->load_templates($page,$data);
		    }
			else{
				echo 'you are not authorized access this page..';
			}
	}
	public function changePassword() {
	if($this->session_check()==true) {
	   $this->load->model('user_model');
	   $data['old_password'] = 	'';
		$data['password']	  = 	'';
		$data['cpassword'] 	  = 	'';
       if(isset($_REQUEST['user-password-update'])){
			$this->form_validation->set_rules('old_password','Current Password','trim|required|min_length[5]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('password','New Password','trim|required|min_length[5]|max_length[12]|xss_clean');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|min_length[5]|max_length[12]|matches[password]|xss_clean');
			$data['old_password'] = trim($this->input->post('old_password'));
			$data['password'] = trim($this->input->post('password'));
			$data['cpassword'] = trim($this->input->post('cpassword'));
			if($this->form_validation->run() != False) {
				$dbdata['password']  	= md5($this->input->post('password'));
				$dbdata['old_password'] = md5(trim($this->input->post('old_password')));
				$val    			    = $this->user_model->changePassword($dbdata);
				if($val == true) {				
					redirect(base_url().'organization/front-desk');
				}else{
					$this->show_change_password($data);
				}
			} else {
				
					$this->show_change_password($data);
			}
		} else {
			
					$this->show_change_password($data);
		}
		           }
		else{
			echo 'you are not authorized access this page..';
		}
	}	
   
	public function show_change_password($data) {
		if($this->session_check()==true) {
				$data['title']="Change Password | ".PRODUCT_NAME;  
				$page='user-pages/change_password';
				 $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function ShowDriverView($param1) {
		if($this->session_check()==true) {
			//sample starts
				$data['select']=$this->select_Box_Values();
	
			//sample ends
				$data['title']="Driver Details | ".PRODUCT_NAME;  
				$page='user-pages/addDrivers';
				 $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	
	  public function ShowDriverList($param1,$param2) {
	if($this->session_check()==true) {
	$condition='';
	$per_page=10;
	$like_arry=''; 
	$org_id=$this->session->userdata('organisation_id');
	$where_arry['organisation_id']=$org_id;
	//for search
	   if(isset($_REQUEST['driver_name'])&& isset($_REQUEST['search'])){
	if($param2==''){
	$param2=0;
	}
	if($_REQUEST['driver_name']!=null){
	$like_arry['name']=$_REQUEST['driver_name'];
	}

	$this->mysession->set('condition',array("like"=>$like_arry,"where"=>$where_arry));
	$condition=array("like"=>$like_arry,"where"=>$where_arry); //print_r($condition);exit;
	}
	//$condition=array("like"=>$like_arry,"where"=>$where_arry); //print_r($condition);exit;
	//print_r($condition);exit;
	$this->mysession->set('condition',array("like"=>$like_arry,"where"=>$where_arry));
	//print_r($this->mysession->get('condition'));exit;
	$tbl="drivers";
	$baseurl=base_url().'organization/front-desk/list-driver/';
	$uriseg ='4';

	   $p_res=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
	if($param2==''){
	$this->mysession->delete('condition');

	}
	$data['values']=$p_res['values'];
	$data['page_links']=$p_res['page_links'];
	$data['title']='List Driver| '.PRODUCT_NAME;
	$page='user-pages/driverList';
	$this->load_templates($page,$data);	
	}
	else{
	echo 'you are not authorized access this page..';
	}
	}
		
		public function ShowDriverProfile($param1,$param2){
			if($this->session_check()==true) {
			
			if($param2!=null&& $param2!=gINVALID){
			$org_id=$this->session->userdata('organisation_id');
			$arry=array('id'=>$param2,'organisation_id'=>$org_id);
			$data['result']=$this->user_model->getDriverDetails($arry);
			
			
		}   $data['title']='Driver Profile| '.PRODUCT_NAME;
			$page='user-pages/addDrivers';
			$data['select']=$this->select_Box_Values();
			$this->load_templates($page,$data);
		
			}
			else{
					echo 'you are not authorized access this page..';
			}
	}
	public function select_Box_Values(){
		$tbl_arry=array('marital_statuses','bank_account_types','id_proof_types');
		$this->load->model('user_model');
		for ($i=0;$i<count($tbl_arry);$i++){
		$result=$this->user_model->getArray($tbl_arry[$i]);
		if($result!=false){
		$data[$tbl_arry[$i]]=$result;
		}
		else{
		$data[$tbl_arry[$i]]='';
		}
		}
		return $data;
	}
	
	public function ShowVehicleView($param1,$param2,$param3) {
		if($this->session_check()==true) {
		
		if($param2!=null&& $param2!=gINVALID){
		$data['vehicle_tab']='active';
		$tbl='vehicles';
		$id=$param2;
		}  
			//sample starts
				if($param2==''||is_numeric($param2)){
				$data['vehicle_tab']='active';
				$tbl='vehicles';
				$id=$param2;
				if($id!=null){
			
				$this->mysession->set('vehicle_id',$id);
				
				}
				}
				
				if($param2=='insurance'){
				
				$data['insurance_tab']='active';
				$tbl='vehicles_insurance';
				$id=$param3;
				if($id!=null){
			
				$this->mysession->set('vehicle_id',$id);
				
				}
				
				}
				if($param2=='loan'&&($param3== ''|| is_numeric($param3))){
				$data['loan_tab']='active';
				$tbl='vehicle_loans';
				$id=$param3;
				}
				if($param2=='owner'&&($param3== ''|| is_numeric($param3))) {
				$data['owner_tab']='active';
				$tbl='vehicle_owners';
				$id=$param3;
				}
				$org_id=$this->session->userdata('organisation_id');
				$arry=array('id'=>$id,'organisation_id'=>$org_id);
				$data['select']=$this->select_Vehicle_Values();
				$data['record_values']=$this->user_model->getRecordsById($tbl,$id);
				//print_r($data['record_values']);
				$data['driver']=$data['record_values']['driver'];
				$data['vehicle']=$data['record_values']['vehicle'];
				
				
			//sample ends
				$data['title']="Vehicle Details | ".PRODUCT_NAME;  
				$page='user-pages/addVehicles';
				 $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function select_Vehicle_Values(){
	$tbl_arry=array('vehicle_models','drivers','vehicle_ownership_types','vehicle_types','vehicle_makes','vehicle_ac_types','vehicle_fuel_types','vehicle_seating_capacity','vehicle_permit_types');
	$this->load->model('user_model');
	for ($i=0;$i<count($tbl_arry);$i++){
	$result=$this->user_model->getArray($tbl_arry[$i]);
	if($result!=false){
	$data[$tbl_arry[$i]]=$result;
	}
	else{
	$data[$tbl_arry[$i]]='';
	}
	}
	return $data;
	}
	
	public function ShowVehicleList($param1,$param2) {
	if($this->session_check()==true) {
	$condition='';
	$per_page=10;
	$like_arry=''; 
	$org_id=$this->session->userdata('organisation_id');
	$where_arry['organisation_id']=$org_id;
	//for search
	   if(isset($_REQUEST['driver_name'])&& isset($_REQUEST['search'])){
	if($param2==''){
	$param2=0;
	}
	if($_REQUEST['driver_name']!=null){
	$like_arry['name']=$_REQUEST['driver_name'];
	}

	$this->mysession->set('condition',array("like"=>$like_arry,"where"=>$where_arry));
	$condition=array("like"=>$like_arry,"where"=>$where_arry); //print_r($condition);exit;
	}
	//$condition=array("like"=>$like_arry,"where"=>$where_arry); //print_r($condition);exit;
	//print_r($condition);exit;
	$this->mysession->set('condition',array("like"=>$like_arry,"where"=>$where_arry));
	//print_r($this->mysession->get('condition'));exit;
	$tbl="vehicles";
	$baseurl=base_url().'organization/front-desk/list-driver/';
	$uriseg ='4';

	   $p_res=$this->mypage->paging($tbl,$per_page,$param2,$baseurl,$uriseg);
	if($param2==''){
	$this->mysession->delete('condition');

	}
	$data['values']=$p_res['values'];
	$data['page_links']=$p_res['page_links'];
	$tbl_arry=array('vehicle_models','vehicle_types');
	for ($i=0;$i<2;$i++){
	$result=$this->user_model->getArray($tbl_arry[$i]);
	if($result!=false){
	$data[$tbl_arry[$i]]=$result;
	}
	else{
	$data[$tbl_arry[$i]]='';
	}
	}
	$data['title']='List Driver| '.PRODUCT_NAME;
	$page='user-pages/vehicleList';
	
	$this->load_templates($page,$data);	
	}
	else{
	echo 'you are not authorized access this page..';
	}
	}
}
?>
