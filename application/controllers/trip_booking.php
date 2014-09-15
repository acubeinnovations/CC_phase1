<?php 
class Trip_booking extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("trip_booking_model");
		$this->load->model("customers_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){
	if($this->session_check()==true) {
		if($param1=='trip-booking') {
		
		if($param2=='book-trip') {
		
			$this->bookTrip();
			
		}else if($param2=='set-session-post') {
		
			$this->setSession();
			
		}
		}
	}else{
			echo 'you are not authorized access this page..';
	}
	}
		
	public function bookTrip() {
			
			if(isset($_REQUEST['book_trip'])){
				if(isset($_REQUEST['advanced'])){
					$this->form_validation->set_rules('customer_group','Customer groups','trim|required|xss_clean');
					$data['advanced']=TRUE;
					$data['customer_group']=$this->input->post('customer_group');
				}else{
					$data['advanced']='';
					$data['customer_group']='';
				}
				if(isset($_REQUEST['guest'])){
					$this->form_validation->set_rules('guestname','Guest name','trim|required|xss_clean');
					$this->form_validation->set_rules('guestemail','Guest email','trim|valid_email|is_unique[customers.email]');
					$this->form_validation->set_rules('guestmobile','Guest mobile','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean|is_unique[customers.mobile]');
					$data['guest']=TRUE;
					$data['guestname']=$this->input->post('guestname');
					$data['guestemail']=$this->input->post('guestemail');
					$data['guestmobile']=$this->input->post('guestmobile');
				}else{
					$data['guest']='';
					$data['guestname']='';
					$data['guestemail']='';
					$data['guestmobile']='';
				}

				$this->form_validation->set_rules('customer','Customer name','trim|required|xss_clean');
				$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|');
				$this->form_validation->set_rules('mobile','Mobile','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
				$this->form_validation->set_rules('booking_source','Booking source','trim|xss_clean');
				$this->form_validation->set_rules('source','Source','trim|min_length[2]|xss_clean|alpha');
				$this->form_validation->set_rules('trip_model','Trip models','trim|required|xss_clean');
				$this->form_validation->set_rules('no_of_passengers','No of passengers','trim|xss_clean');
				$this->form_validation->set_rules('pickupcity','Pickup city','trim|required|xss_clean');
				$this->form_validation->set_rules('pickuparea','Pickup area','trim|xss_clean|alpha_numeric');
				$this->form_validation->set_rules('pickuplandmark','Pickup landmark','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('viacity','Via city','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('viaarea','Via area','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('vialandmark','Via landmark','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('dropdownlocation','Drop down location','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdownarea','Drop down area','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('dropdownlandmark','Drop down landmark','trim|alpha_numeric|xss_clean');
				$this->form_validation->set_rules('pickupdatepicker','Pickup date','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdatepicker','Drop date ','trim|xss_clean');
				$this->form_validation->set_rules('pickuptimepicker','Pickup time','trim|xss_clean');
				$this->form_validation->set_rules('droptimepicker','Drop time','trim|xss_clean');
				$this->form_validation->set_rules('vehicle_types','Vehicle types','trim|required|xss_clean');
				$this->form_validation->set_rules('vehicle_ac_types','Vehicle ac types','trim|xss_clean');
				$this->form_validation->set_rules('seating_capacity','Vehicle seating capacity','trim|xss_clean');
				$this->form_validation->set_rules('languages','Languages','trim|xss_clean');
				$this->form_validation->set_rules('tarrifs','Vehicle ac types','trim|xss_clean');
				
	
				$data['customer']			=	$this->input->post('customer');
				$data['new_customer']		=	$this->input->post('new_customer');
				$data['email']				=	$this->input->post('email');
				$data['mobile']				=	$this->input->post('mobile');
				$data['registration_type_id']=CUSTOMER_REG_TYPE_PHONE_CALL;	
				$data['booking_source']		=	$this->input->post('booking_source');
				$data['source']				=	$this->input->post('source');
				$data['trip_model']			=	$this->input->post('trip_model');
				$data['no_of_passengers']	=	$this->input->post('no_of_passengers');
				$data['pickupcity']			=	$this->input->post('pickupcity');
				$data['pickupcitylat']		=	$this->input->post('pickupcitylat');
				$data['pickupcitylng']		=	$this->input->post('pickupcitylng');
				$data['pickuparea']			=	$this->input->post('pickuparea');
				$data['pickuplandmark']		=	$this->input->post('pickuplandmark');
				$data['viacity']			=	$this->input->post('viacity');
				$data['viacitylat']			=	$this->input->post('viacitylat');
				$data['viacitylng']			=	$this->input->post('viacitylng');
				$data['viaarea']			=	$this->input->post('viaarea');
				$data['vialandmark']		=	$this->input->post('vialandmark');
				$data['dropdownlocation']	=	$this->input->post('dropdownlocation');
				$data['dropdownlocationlat']	=	$this->input->post('dropdownlocationlat');
				$data['dropdownlocationlng']	=	$this->input->post('dropdownlocationlng');
				$data['dropdownarea']		=	$this->input->post('dropdownarea');
				$data['dropdownlandmark']	=	$this->input->post('dropdownlandmark');
				$data['pickupdatepicker']	=	$this->input->post('pickupdatepicker');
				$data['dropdatepicker']		=	$this->input->post('dropdatepicker');
				$data['pickuptimepicker']	=	$this->input->post('pickuptimepicker');
				$data['droptimepicker']		=	$this->input->post('droptimepicker');
				$data['vehicle_type']		=	$this->input->post('vehicle_type');
				$data['vehicle_ac_type']	=	$this->input->post('vehicle_ac_type');
				if(isset($_REQUEST['beacon_light'])){
					$data['beacon_light']=TRUE;
					if($this->input->post('beacon_light_radio')=='red'){
						$data['beacon_light_radio']='red';
						
					}else{
						$data['beacon_light_radio']='blue';
						
					}
				}else{
					$data['beacon_light']='';
					$data['beacon_light_radio']='';
					
				}
				if(isset($_REQUEST['pluck_card'])){
					$data['pluck_card']=TRUE;
				}else{
					$data['pluck_card']='';
				}
				if(isset($_REQUEST['uniform'])){
				$data['uniform']=TRUE;
				}else{
					$data['uniform']='';
				}
				$data['seating_capacity']=$this->input->post('seating_capacity');
				$data['language']=$this->input->post('language');
				$data['tariff']=$this->input->post('tariff');
				$data['available_vehicle']=$this->input->post('available_vehicle');

				if(isset($_REQUEST['recurrent_yes'])){
				$data['recurrent_yes'] = TRUE;
				$data['recurrent_continues'] = '';
				$data['recurrent_alternatives'] = '';
				if($this->input->post('recurrent')=='continues'){
					$this->form_validation->set_rules('reccurent_continues_pickupdatepicker','Pickup date','trim|required|xss_clean');
					$this->form_validation->set_rules('reccurent_continues_dropdatepicker','Drop date','trim|xss_clean');
					$this->form_validation->set_rules('reccurent_continues_pickuptimepicker','Pickup time','trim|xss_clean');
					$this->form_validation->set_rules('reccurent_continues_droptimepicker','Drop time','trim|xss_clean');

					$data['recurrent'] = 'continues';
					$data['recurrent_continues'] = TRUE;
					$data['recurrent_alternatives'] = '';
					$data['reccurent_continues_pickupdatepicker'] = $this->input->post('reccurent_continues_pickupdatepicker');
					$reccurent_continues_pickupdatepicker = explode('-',$this->input->post('reccurent_continues_pickupdatepicker'));
					$data['reccurent_continues_pickuptimepicker'] = $reccurent_continues_pickuptimepicker = $this->input->post('reccurent_continues_pickuptimepicker');
					$pickupdatepicker_start=$reccurent_continues_pickupdatepicker[0];
					$pickupdatepicker_end=$reccurent_continues_pickupdatepicker[1];
				
					$data['reccurent_continues_dropdatepicker'] = $this->input->post('reccurent_continues_dropdatepicker');
					$reccurent_continues_dropdatepicker	  = explode('-',$this->input->post('reccurent_continues_dropdatepicker'));
					$data['reccurent_continues_droptimepicker'] = $reccurent_continues_droptimepicker	  = $this->input->post('reccurent_continues_droptimepicker');
					$dropdatepicker_start=$reccurent_continues_dropdatepicker[0];
					$dropdatepicker_end=$reccurent_continues_dropdatepicker[1];

					$pickup_dates = array();
					$start = $current = strtotime($pickupdatepicker_start);
					$end = strtotime($pickupdatepicker_end);

					while ($current <= $end) {
						$pickup_dates[] = date('d/m/Y', $current);
						$current = strtotime('+1 days', $current);
					}
					
					$dropdown_dates = array();
					$start = $current = strtotime($dropdatepicker_start);
					$end = strtotime($dropdatepicker_end);

					while ($current <= $end) {
						$dropdown_dates[] = date('d/m/Y', $current);
						$current = strtotime('+1 days', $current);
					}
												

				}else if($this->input->post('recurrent')=='alternatives'){
					$this->form_validation->set_rules('reccurent_alternatives_pickupdatepicker','Pickup date','trim|required|xss_clean');
					$this->form_validation->set_rules('reccurent_alternatives_dropdatepicker','Drop date ','trim|xss_clean');
					$this->form_validation->set_rules('reccurent_alternatives_pickuptimepicker','Pickup time','trim|xss_clean');
					$this->form_validation->set_rules('reccurent_alternatives_droptimepicker','Drop time','trim|xss_clean');
			
					$data['recurrent'] = 'alternatives';
					$data['recurrent_continues'] = '';
					$data['recurrent_alternatives'] = TRUE;
					$data['reccurent_alternatives_pickupdatepicker'] = $reccurent_alternatives_pickupdatepicker = $this->input->post('reccurent_alternatives_pickupdatepicker');
					$data['reccurent_alternatives_pickuptimepicker'] = $reccurent_alternatives_pickuptimepicker = $this->input->post('reccurent_alternatives_pickuptimepicker');
					$data['reccurent_alternatives_dropdatepicker'] = $reccurent_alternatives_dropdatepicker	 = $this->input->post('reccurent_alternatives_dropdatepicker');
					$data['reccurent_alternatives_droptimepicker'] = $reccurent_alternatives_droptimepicker	 = $this->input->post('reccurent_alternatives_droptimepicker');

				}
				}else{
	
					$data['recurrent_yes'] = '';
					$data['recurrent_continues'] = '';
					$data['recurrent_alternatives'] = '';

				}

				
			if($this->form_validation->run()==False){
				$this->mysession->set( 'post',$data);
				redirect(base_url().'organization/front-desk/trip-booking');
			}else{
				$dbdata=array('customer'=>$data['customer'],'email'=>$data['email'],'mobile'=>$data['mobile'],'registration_type_id'=>$data['registration_type_id']);
				$data['guest_id']=$this->customers_model->addCustomer($dbdata);
				
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

	
}
?>
	
