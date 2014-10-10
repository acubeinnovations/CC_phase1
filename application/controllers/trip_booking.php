<?php 
class Trip_booking extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("trip_booking_model");
		$this->load->model("tarrif_model");
		$this->load->model("customers_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){
	if($this->session_check()==true) {
		if($param1=='trip-booking') {
		
		if($param2=='book-trip') {
		
			$this->bookTrip();
			
		}else if($param2=='getAvailableVehicles') {
		
			$this->getAvailableVehicles();
			
		}else if($param2=='tripVoucher') {
		
			$this->tripVoucher();
			
		}else if($param2=='getTarrif') {
		
			$this->getTarrif();
			
		}else if($param2=='getVouchers') {
		
			$this->getVouchers();
		}	
		}
	}else{
			echo 'you are not authorized access this page..';
	}
	}
		
	public function bookTrip() {
			
			if(isset($_REQUEST['book_trip'])){

				if(isset($_REQUEST['trip_id'])){
					$data['trip_id']=$this->input->post('trip_id');
				}else{
					$data['trip_id']='';
				}
				if(isset($_REQUEST['advanced'])){
					$this->form_validation->set_rules('customer_group','Customer groups','trim|required|xss_clean');
					$data['advanced']=TRUE;
					$data['customer_group']=$this->input->post('customer_group');
				}else{
					$data['advanced']='';
					$data['customer_group']='';
				}
				if(isset($_REQUEST['guest'])){
					if($_REQUEST['guest_id']==gINVALID){
					$this->form_validation->set_rules('guestname','Guest name','trim|required|xss_clean');
					$this->form_validation->set_rules('guestemail','Guest email','trim|valid_email');
					$this->form_validation->set_rules('guestmobile','Guest mobile','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');	
					}
					$data['guest']=TRUE;
					$data['guestname']=$this->input->post('guestname');
					$data['guestemail']=$this->input->post('guestemail');
					$data['guestmobile']=$this->input->post('guestmobile');
					$data['guest_id']=$this->input->post('guest_id');
				}else{
					$data['guest']='';
					$data['guestname']='';
					$data['guestemail']='';
					$data['guestmobile']='';
					$data['guest_id']=gINVALID;
				}

				$this->form_validation->set_rules('customer','Customer name','trim|xss_clean');
				$this->form_validation->set_rules('email','Email','trim|xss_clean|valid_email|');
				$this->form_validation->set_rules('mobile','Mobile','trim|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
				$this->form_validation->set_rules('booking_source','Booking source','trim|xss_clean');
				$this->form_validation->set_rules('source','Source','trim|min_length[2]|xss_clean|alpha');
				$this->form_validation->set_rules('trip_model','Trip models','trim|required|xss_clean');
				$this->form_validation->set_rules('no_of_passengers','No of passengers','trim|xss_clean');
				$this->form_validation->set_rules('pickupcity','Pickup city','trim|required|xss_clean');
				$this->form_validation->set_rules('pickuparea','Pickup area','trim|xss_clean');
				$this->form_validation->set_rules('pickuplandmark','Pickup landmark','trim|xss_clean');
				$this->form_validation->set_rules('viacity','Via city','trim|xss_clean');
				$this->form_validation->set_rules('viaarea','Via area','trim|xss_clean');
				$this->form_validation->set_rules('vialandmark','Via landmark','trim|xss_clean');
				$this->form_validation->set_rules('dropdownlocation','Drop location','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdownarea','Drop  area','trim|xss_clean');
				$this->form_validation->set_rules('dropdownlandmark','Drop landmark','trim|xss_clean');
				$this->form_validation->set_rules('pickupdatepicker','Date','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdatepicker','Date ','trim|required|xss_clean');
				$this->form_validation->set_rules('pickuptimepicker','Time','trim|required|xss_clean');
				$this->form_validation->set_rules('droptimepicker','Time','trim|required|xss_clean');
				$this->form_validation->set_rules('vehicle_type','Vehicle types','trim|xss_clean');
				$this->form_validation->set_rules('vehicle_ac_type','Vehicle ac types','trim|xss_clean');
				$this->form_validation->set_rules('seating_capacity','Vehicle seating capacity','trim|xss_clean');
				$this->form_validation->set_rules('language','Languages','trim|xss_clean');
				$this->form_validation->set_rules('tarrif','Vehicle ac types','trim|xss_clean');
				
	
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
						$data['beacon_light_id'] = BEACON_LIGHT_RED;
						
					}else{
						$data['beacon_light_radio']='blue';
						$data['beacon_light_id'] = BEACON_LIGHT_BLUE;
					}
				}else{
					$data['beacon_light']=FALSE;
					$data['beacon_light_radio']='';
					$data['beacon_light_id'] = '';
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
				$data['seating_capacity']		=	$this->input->post('seating_capacity');
				$data['language']				=	$this->input->post('language');
				$data['tariff']					=	$this->input->post('tariff');
				$data['available_vehicle']		=	$this->input->post('available_vehicle');
				$data['customer_type']			=	$this->input->post('customer_type');
				if($data['trip_id']==''){
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
							$pickup_dates[] = date('Y-m-d', $current);
							$current = strtotime('+1 days', $current);
						}
					
						$dropdown_dates = array();
						$start = $current = strtotime($dropdatepicker_start);
						$end = strtotime($dropdatepicker_end);

						while ($current <= $end) {
							$dropdown_dates[] = date('Y-m-d', $current);
							$current = strtotime('+1 days', $current);
						}
												

					}else if($this->input->post('recurrent')=='alternatives'){
						$this->form_validation->set_rules('reccurent_alternatives_pickupdatepicker','Pickup date','trim|xss_clean');
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
				}else{
	
						$data['recurrent_yes'] = '';
						$data['recurrent_continues'] = '';
						$data['recurrent_alternatives'] = '';

					}

				
			if($this->form_validation->run()==False){
				$this->mysession->set('post',$data);
				redirect(base_url().'organization/front-desk/trip-booking/'.$data['trip_id']);
			}else{
				if(isset($_REQUEST['guest'])){
				if(isset($_REQUEST['guest_id']) && $_REQUEST['guest_id']==gINVALID){
				
				$dbdata1=array('name'=>$data['guestname'],'email'=>$data['guestemail'],'mobile'=>$data['guestmobile'],'registration_type_id'=>$data['registration_type_id']);
				$data['guest_id']=$this->customers_model->addCustomer($dbdata1);
				}else{
				$data['guest_id']=$_REQUEST['guest_id'];

				}
				}
				if($data['available_vehicle']>0){

					$data['driver_id'] = $this->trip_booking_model->getDriver($data['available_vehicle']);
					$trip_status=TRIP_STATUS_CONFIRMED;

				}else{
					$data['driver_id'] = gINVALID;
					$trip_status=TRIP_STATUS_PENDING;
				}
				
				
			$dbdata['customer_id']					=$this->session->userdata('customer_id');
			$dbdata['guest_id']						=$data['guest_id'];
			$dbdata['customer_type_id']				=$data['customer_type'];
			$dbdata['trip_status_id']				=$trip_status;
			$dbdata['booking_date']					= date('Y-m-d');
			$dbdata['booking_time']					= date('H:i');
			$dbdata['booking_source_id']			=$data['booking_source'];
			$dbdata['source']						=$data['source'];
			$dbdata['pick_up_date']					=$data['pickupdatepicker'];
			$dbdata['pick_up_time']					=$data['pickuptimepicker'];
			$dbdata['drop_date']					=$data['dropdatepicker'];
			$dbdata['drop_time']					=$data['droptimepicker'];
			$dbdata['pick_up_city']					=$data['pickupcity'];
			$dbdata['pick_up_lat']					=$data['pickupcitylat'];
			$dbdata['pick_up_lng']					=$data['pickupcitylng'];
			$dbdata['pick_up_area']					=$data['pickuparea'];
			$dbdata['pick_up_landmark']				=$data['pickuplandmark'];
			$dbdata['via_city']						=$data['viacity'];
			$dbdata['via_lat']						=$data['viacitylat'];
			$dbdata['via_lng']						=$data['viacitylng'];
			$dbdata['via_area']						=$data['viaarea'];
			$dbdata['via_landmark']					=$data['vialandmark'];
			$dbdata['drop_city']					=$data['dropdownlocation'];
			$dbdata['drop_lat']						=$data['dropdownlocationlat'];
			$dbdata['drop_lng']						=$data['dropdownlocationlng'];
			$dbdata['drop_area']					=$data['dropdownarea'];	
			$dbdata['drop_landmark']				=$data['dropdownlandmark'];
			$dbdata['no_of_passengers']				=$data['no_of_passengers'];
			$dbdata['vehicle_type_id']				=$data['vehicle_type'];
			$dbdata['vehicle_ac_type_id']			=$data['vehicle_ac_type'];
			$dbdata['vehicle_seating_capacity_id']	=$data['seating_capacity'];
			$dbdata['vehicle_beacon_light_option_id']=$data['beacon_light_id'];
			$dbdata['pluckcard']					=$data['pluck_card'];
			$dbdata['uniform']						=$data['uniform'];
			$dbdata['driver_language_id']			=$data['language'];
			$dbdata['trip_model_id']				=$data['trip_model'];
			$dbdata['tariff_id']					=$data['tariff'];
			$dbdata['driver_id']					=$data['driver_id'];
			$dbdata['vehicle_id']					=$data['available_vehicle'];
			$dbdata['organisation_id']				=$this->session->userdata('organisation_id');
			$dbdata['user_id']						=$this->session->userdata('id');
	
			$this->session->set_userdata('customer_id','');
			$this->session->set_userdata('customer_name','');
			$this->session->set_userdata('customer_email','');
			$this->session->set_userdata('customer_mobile','');
	
				if(isset($data['trip_id']) && $data['trip_id']>0){
				$res = $this->trip_booking_model->updateTrip($dbdata,$data['trip_id']);
				if($res==true){
					$this->session->set_userdata(array('dbSuccess'=>'Trip Updated Succesfully..!!'));
					$this->session->set_userdata(array('dbError'=>''));
				}else{
					$this->session->set_userdata(array('dbError'=>'Trip Updated unsuccesfully..!!'));
					$this->session->set_userdata(array('dbSuccess'=>''));
				}
				
				redirect(base_url().'organization/front-desk/trip-booking');

				}else{
				$res = $this->trip_booking_model->bookTrip($dbdata);
				if($res==true){
					$this->session->set_userdata(array('dbSuccess'=>'Trip Booked Succesfully..!!'));
					$this->session->set_userdata(array('dbError'=>''));
				}else{
					$this->session->set_userdata(array('dbError'=>'Trip Booked unsuccesfully..!!'));
					$this->session->set_userdata(array('dbSuccess'=>''));
				}
				if(isset($_REQUEST['recurrent_yes'])){
					if($this->input->post('recurrent')=='continues'){
						for($index=0;$index<count($pickup_dates);$index++){
							$dbdata['pick_up_date']					=$pickup_dates[$index];
							$dbdata['pick_up_time']					=$reccurent_continues_pickuptimepicker;
							$dbdata['drop_date']					=$dropdown_dates[$index];
							$dbdata['drop_time']					=$reccurent_continues_droptimepicker;
							$dbdata['vehicle_id']					=gINVALID;
							$dbdata['trip_status_id']				=TRIP_STATUS_PENDING;
							if($dbdata['pick_up_date']!='' && $dbdata['pick_up_time']!='' && $dbdata['drop_date']!='' &&  $dbdata['drop_time']!=''){
							$res = $this->trip_booking_model->bookTrip($dbdata);
								if($res==true){
									$this->session->set_userdata(array('dbSuccess'=>'Trips Booked Succesfully..!!'));
									$this->session->set_userdata(array('dbError'=>''));
								}
							}
						}
					}else if($this->input->post('recurrent')=='alternatives'){
						for($index=0;$index<count($reccurent_alternatives_pickupdatepicker);$index++){
							$dbdata['pick_up_date']					=$reccurent_alternatives_pickupdatepicker[$index];
							$dbdata['pick_up_time']					=$reccurent_alternatives_pickuptimepicker[$index];
							$dbdata['drop_date']					=$reccurent_alternatives_dropdatepicker[$index];
							$dbdata['drop_time']					=$reccurent_alternatives_droptimepicker[$index];
							$dbdata['vehicle_id']					=gINVALID;
							$dbdata['trip_status_id']				=TRIP_STATUS_PENDING;
							if($dbdata['pick_up_date']!='' && $dbdata['pick_up_time']!='' && $dbdata['drop_date']!='' &&  $dbdata['drop_time']!=''){	 
							$res = $this->trip_booking_model->bookTrip($dbdata);
									if($res==true){
										$this->session->set_userdata(array('dbSuccess'=>'Trips Booked Succesfully..!!'));
										$this->session->set_userdata(array('dbError'=>''));
									}
							}
						}
					}
				}
				redirect(base_url().'organization/front-desk/trip-booking');
			}
		}
		}else if(isset($_REQUEST['cancel_trip'])){
			if(isset($_REQUEST['trip_id'])){
			
				$trip_id			=	$this->input->post('trip_id');
				
				$customer_id 		=	$this->session->userdata('customer_id');
				$customer_name 		=	$this->session->userdata('customer_name');
				$customer_mobile 	= 	$this->session->userdata('customer_mobile');

				$driver_id			=$this->session->userdata('driver_id');	
				$condition=array('id'=>$driver_id);
				$driver				=$this->driver_model->getDriverDetails($condition);
				$data['trip_status_id']=TRIP_STATUS_CANCELLED;
				$res = $this->trip_booking_model->updateTrip($data,$trip_id);
				if($res==true){
					$this->session->set_userdata(array('dbSuccess'=>'Trip Cancelled Succesfully..!!'));
					$this->session->set_userdata(array('dbError'=>''));
				}else{
					$this->session->set_userdata(array('dbError'=>'Trip Cancelled unsuccesfully..!!'));
					$this->session->set_userdata(array('dbSuccess'=>''));
				}
				$this->session->set_userdata('customer_id','');
				$this->session->set_userdata('customer_name','');
				$this->session->set_userdata('customer_email','');
				$this->session->set_userdata('customer_mobile','');
				$this->session->set_userdata('driver_id','');
				redirect(base_url().'organization/front-desk/trip-booking');
			}
		} 
	}
	public function tripVoucher(){
	if($_REQUEST['startkm'] && $_REQUEST['endkm'] && $_REQUEST['garageclosingkm'] && $_REQUEST['garageclosingtime'] && $_REQUEST['trip_id']){
	$data['start_km_reading']=$_REQUEST['startkm'];
	$data['end_km_reading']=$_REQUEST['endkm'];
	$data['driver_id']=$_REQUEST['driver_id'];
	$data['garage_closing_kilometer_reading']=$_REQUEST['garageclosingkm'];
	$data['garage_closing_time']=$_REQUEST['garageclosingtime'];
	$data['releasing_place']=$_REQUEST['releasingplace'];
	$data['parking_fees']=$_REQUEST['parkingfee'];
	$data['toll_fees']=$_REQUEST['tollfee'];
	$data['state_tax']=$_REQUEST['statetax'];
	$data['night_halt_charges']=$_REQUEST['nighthalt'];
	$data['fuel_extra_charges']=$_REQUEST['extrafuel'];
	$data['total_trip_amount']=$_REQUEST['totexpense'];
	$data['user_id']=$this->session->userdata('id');
	$data['trip_id']=$_REQUEST['trip_id'];
	$data['organisation_id']=$this->session->userdata('organisation_id');

	$voucher=$this->getVouchers($data['trip_id'],$ajax='NO');
	if($voucher==false){
	$res=$this->trip_booking_model->generateTripVoucher($data);
	}else{
	$res=$this->trip_booking_model->updateTripVoucher($data,$voucher[0]->id);
	}
	if($res==false){
	echo 'false';
	}else{
	echo $res;
	}

	}

	}	

	public function getVouchers($trip_id='',$ajax='NO'){
	if(isset($_REQUEST['trip_id']) && isset($_REQUEST['ajax'])){
	$trip_id=$_REQUEST['trip_id'];
	$ajax=$_REQUEST['ajax'];
	}
	$voucher=$this->trip_booking_model->checkTripVoucherEntry($trip_id);
	if($voucher==gINVALID){
		echo 'false';
	}else{
		if($ajax=='NO'){
		return $voucher;
		}else{
		header('Content-Type: application/json');
		echo json_encode($voucher);
		}
	}
	}
	public function getTarrif(){
		if($_REQUEST['tarrif_id'] && $_REQUEST['ajax']){
			$res=$this->tarrif_model->selectTariffDetails($_REQUEST['tarrif_id']);
			if(count($res)>0){
			header('Content-Type: application/json');
			echo json_encode($res);
			}else{
			echo 'false';
			}
		}
	}
	public function getAvailableVehicles(){
	if($_REQUEST['vehicle_type'] && $_REQUEST['vehicle_ac_type'] && $_REQUEST['pickupdatetime'] && $_REQUEST['dropdatetime']){
	$data['vehicle_type']=$_REQUEST['vehicle_type'];
	$data['vehicle_ac_type']=$_REQUEST['vehicle_ac_type'];
	$data['pickupdatetime']=$_REQUEST['pickupdatetime'];
	$data['dropdatetime']=$_REQUEST['dropdatetime'];
	$data['organisation_id']=$this->session->userdata('organisation_id');
	
	$res['data']=$this->trip_booking_model->selectAvailableVehicles($data);
	if($res['data']==false){
	echo false;
	}else{
	echo json_encode($res);
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
	
