<?php 
class Trip_booking extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("trip_booking_model");
		$this->load->helper('my_helper');
		no_cache();

		}
	public function index($param1 ='',$param2='',$param3=''){
	if($this->session_check()==true) {
		if($param1=='trip-booking') {
		
		if($param2=='book-trip') {
		
			$this->bookTrip();
			
		}
		}
	}else{
			echo 'you are not authorized access this page..';
	}
	}
		
	public function bookTrip() {
			
			if(isset($_REQUEST['book_trip'])){
				if(isset($_REQUEST['advanced'])){
					$this->form_validation->set_rules('customer_groups','Customer groups','trim|required|xss_clean');
				}
				if(isset($_REQUEST['guest'])){
					$this->form_validation->set_rules('guestname','Guest name','trim|required|xss_clean');
					$this->form_validation->set_rules('guestemail','Guest email','trim|required|valid_email|is_unique[customers.email]');
					$this->form_validation->set_rules('guestmobile','Guest mobile','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean|is_unique[customers.mobile]');
				}
				$this->form_validation->set_rules('booking_source','Booking source','trim|required|xss_clean');
				$this->form_validation->set_rules('source','Source','trim|required|min_length[2]|xss_clean|alpha');
				$this->form_validation->set_rules('trip_models','Trip models','trim|required|xss_clean');
				$this->form_validation->set_rules('no_of_passengers','No of passengers','trim|required|xss_clean');
				$this->form_validation->set_rules('pickupcity','Pickup city','trim|required|xss_clean');
				$this->form_validation->set_rules('pickuparea','Pickup area','trim|required|xss_clean');
				$this->form_validation->set_rules('pickuplandmark','Pickup landmark','trim|alpha|xss_clean');
				$this->form_validation->set_rules('viacity','Via city','trim|alpha|xss_clean');
				$this->form_validation->set_rules('viaarea','Via area','trim|alpha|xss_clean');
				$this->form_validation->set_rules('vialandmark','Via landmark','trim|alpha|xss_clean');
				$this->form_validation->set_rules('dropdownlocation','Drop down location','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdownarea','Drop down area','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdownlandmark','Drop down landmark','trim|alpha|xss_clean');
				$this->form_validation->set_rules('pickupdatetimepicker','Pickup date time','trim|required|xss_clean');
				$this->form_validation->set_rules('dropdatetimepicker','Drop date time','trim|required|xss_clean');
				$this->form_validation->set_rules('vehicle_types','Vehicle types','trim|alpha|xss_clean');
				$this->form_validation->set_rules('vehicle_ac_types','Vehicle ac types','trim|required|xss_clean');
				$this->form_validation->set_rules('vehicle_seating_capacity','Vehicle seating capacity','trim|required|xss_clean');
				$this->form_validation->set_rules('languages','Languages','trim|required|xss_clean');
				$this->form_validation->set_rules('tarrifs','Vehicle ac types','trim|required|xss_clean');
				$this->form_validation->set_rules('available_vehicles','Vehicle seating capacity','trim|required|xss_clean');
				if(isset($_REQUEST['recurrent-yes'])){
				if($this->input->post('recurrent')=='continues'){
					$this->form_validation->set_rules('reccurent_continues_pickupdatetimepicker','Pickup date time','trim|required|xss_clean');
					$this->form_validation->set_rules('reccurent_continues_dropdatetimepicker','Drop date time','trim|required|xss_clean');
				}else if($this->input->post('recurrent')=='alternatives'){
					$this->form_validation->set_rules('reccurent_alternatives_pickupdatetimepicker[]','Pickup date time','trim|required|xss_clean');
					$this->form_validation->set_rules('reccurent_alternatives_dropdatetimepicker[]','Drop date time','trim|required|xss_clean');
				}
				}
		
			if($this->form_validation->run()==False){
				redirect(base_url().'organization/front-desk/trip-booking');
			}else{

				if(isset($_REQUEST['advanced'])){
					$data['customer_groups']=$this->input->post('customer_groups');
				}
				if(isset($_REQUEST['guest'])){
					$data_guest['name']=$this->input->post('guestname');
					$data_guest['email']=$this->input->post('guestemail');
					$data_guest['mobile']=$this->input->post('guestmobile');
				}

				$data['booking_source_id']=$this->input->post('booking_source');
				$data['source']=$this->input->post('source');
				$data['trip_models_id']=$this->input->post('trip_models');
				$data['no_of_passengers']=$this->input->post('no_of_passengers');
				$data['pickupcity']=$this->input->post('pickupcity');
				$data['pickuparea']=$this->input->post('pickuparea');
				$data['pickuplandmark']=$this->input->post('pickuplandmark');
				$data['viacity']=$this->input->post('viacity');
				$data['viaarea']=$this->input->post('viaarea');
				$data['vialandmark']=$this->input->post('vialandmark');
				$data['dropdownlocation']=$this->input->post('dropdownlocation');
				$data['dropdownarea']=$this->input->post('dropdownarea');
				$data['dropdownlandmark']=$this->input->post('dropdownlandmark');
				$data['pickupdatetimepicker']=$this->input->post('pickupdatetimepicker');
				$data['dropdatetimepicker']=$this->input->post('dropdatetimepicker');
				$data['vehicle_types_id']=$this->input->post('vehicle_types');
				$data['vehicle_ac_types_id']=$this->input->post('vehicle_ac_types');
				$data['vehicle_seating_capacity_id']=$this->input->post('vehicle_seating_capacity');
				$data['languages_id']=$this->input->post('languages');
				$data['tarrifs_id']=$this->input->post('tarrifs');

				if(isset($_REQUEST['recurrent-yes'])){
					if($this->input->post('recurrent')=='continues'){
						
						$reccurent_continues_pickupdatetimepicker =explode('-',$this->input->post('reccurent_continues_pickupdatetimepicker'));
						$pickupdatetimepicker_start=$reccurent_continues_pickupdatetimepicker[0];
						$pickupdatetimepicker_end=$reccurent_continues_pickupdatetimepicker[1];
					
						$reccurent_continues_dropdatetimepicker	  =$this->input->post('reccurent_continues_dropdatetimepicker');
						$start = $pickupdatetimepicker_start; //start date
						$end = $pickupdatetimepicker_end; //end date

						$dates = array();
						$start = $current = strtotime($start);
						$end = strtotime($end);

						while ($current <= $end) {
							$dates[] = date('d/m/Y', $current);
							$current = strtotime('+1 days', $current);
						}
						//print_r($dates);
						
				
					}else if($this->input->post('recurrent')=='alternatives'){

						$reccurent_alternatives_pickupdatetimepicker =$this->input->post('reccurent_alternatives_pickupdatetimepicker');print_r($reccurent_alternatives_pickupdatetimepicker);exit;
						$reccurent_alternatives_dropdatetimepicker	  =$this->input->post('reccurent_alternatives_dropdatetimepicker');
						
					}
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

	
}
?>
	
