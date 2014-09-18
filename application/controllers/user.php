<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
    parent::__construct();
    $this->load->helper('my_helper');
	$this->load->model('user_model');
	$this->load->model('customers_model');
	$this->load->model('trip_booking_model');
	$this->load->model('customers_model');
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
		}elseif($param1=='tarrif-masters'){
		$this->tarrif_masters();
		}elseif($param1=='tarrif'){
		$this->tarrif();
		}
		}else{
			echo 'you are not authorized access this page..';
		}
	
    }
	
	public function settings() {
	if($this->session_check()==true) {
	$tbl_arry=array('vehicle_ownership_types','vehicle_types','vehicle_ac_types','vehicle_fuel_types','vehicle_seating_capacity','vehicle_beacon_light_options','vehicle_makes','vehicle_driver_bata_percentages','vehicle_permit_types','languages','language_proficiency','driver_type','payment_type','customer_types','customer_groups','customer_registration_types','marital_statuses','bank_account_types','id_proof_types','trip_models','trip_statuses','booking_sources','trip_expense_type');
	
	for ($i=0;$i<23;$i++){
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
	public function tarrif_masters() {
	if($this->session_check()==true) {
	$tbl_arry=array('trip_models','vehicle_makes','vehicle_ac_types');
	$this->load->model('user_model');
		for ($i=0;$i<3;$i++){
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
	$data['allDetails']=$this->user_model->getAllDetails();
	$data['title']="Tarrif Masters | ".PRODUCT_NAME;  
	$page='user-pages/tarrif_master';
	$this->load_templates($page,$data);
	}
	else{
			echo 'you are not authorized access this page..';
		}
	
	}
	public function tarrif(){
	if($this->session_check()==true) {
	$result=$this->user_model->getTarrif_masters();
	if($result!=false){
	$data['masters']=$result;
	}else
	{
	$data['masters']='';
	}
	$data['allDetails']=$this->user_model->getAll_tarrifDetails();
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

	$data['notification']=$this->trip_booking_model->getDetails($conditon = '');
	$data['customers_array']=$this->customers_model->getArray();

	if($trip_id!='' && $trip_id > 0) {
	$conditon = array('id'=>$trip_id);
	$result=$this->trip_booking_model->getDetails($conditon);
	$result=$result[0];
	$data1['id']=$result->id;
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
	$data1['new_customer']			=	false;
	$data1['email']					=	$customer['email'];
	$data1['mobile']					=	$customer['mobile'];
	 
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
	$data1['customer_type']			=	$result->customer_type_id;
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
	
public function profile() {
	   if($this->session_check()==true) {
		$this->load->model('user_model');
		$dbdata = '';
              if(isset($_REQUEST['user-profile-update'])){
			//$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[2]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[2]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|xss_clean');
			$this->form_validation->set_rules('phone','Phone','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
			$this->form_validation->set_rules('address','Address','trim|required|min_length[10]|xss_clean');
			//$dbdata['username']  = $this->input->post('username');
		   	$dbdata['first_name'] = $this->input->post('firstname');
			$dbdata['last_name']  = $this->input->post('lastname');
		    $dbdata['email'] 	   = $this->input->post('email');
			$dbdata['phone'] 	   = $this->input->post('phone');
		    $dbdata['address']   = $this->input->post('address');
			$dbdata['username']   = $this->input->post('husername');
			
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
	
}
?>
