<?php 
class Tarrif extends CI_Controller {
	public function __construct()
		{
		parent::__construct();
		$this->load->model("tarrif_model");
		$this->load->helper('my_helper');
		no_cache();

		}
		public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
	} else {
		return false;
	}
	}
	public function add(){
	if($this->session_check()==true) {
	if(isset($_REQUEST['add'])){
	 $data['title'] = $this->input->post('title');
	 $data['trip_model_id'] = $this->input->post('select_trip_model');
	 $data['vehicle_make_id'] = $this->input->post('select_vehicle_makes');
	 $data['vehicle_ac_type_id'] = $this->input->post('select_ac_type');
	 $data['minimum_kilometers'] = $this->input->post('min_kilo');
	 $data['minimum_hours'] = $this->input->post('min_hours');
	 $data['organisation_id']=$this->session->userdata('organisation_id');
	 $data['user_id']=$this->session->userdata('id');
	
	 $this->form_validation->set_rules('title','Title','trim|required|min_length[2]|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('select_trip_model', 'Trip Model', 'callback_value_check');
	 $this->form_validation->set_rules('select_vehicle_makes', 'Trip Model', 'callback_value_check');
	 $this->form_validation->set_rules('select_ac_type', 'Trip Model', 'callback_value_check');
	 $this->form_validation->set_rules('min_kilo','Minimum Kilometers','trim|required|min_length[2]|xss_clean|numeric');
	 $this->form_validation->set_rules('min_hours','Minimum Hours','trim|required|min_length[2]|xss_clean|numeric');
	
		if($this->form_validation->run()==False){//echo "err";exit;
		redirect(base_url().'organization/front-desk/tarrif-masters');
		}
		else {
		$res=$this->tarrif_model->addValues($data);
		if($res==true){
		$this->session->set_userdata(array('dbSuccess'=>' Added Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'organization/front-desk/tarrif-masters');
		}
		}
	}
	}
	else{
			echo 'you are not authorized access this page..';
			}
	}
	public function value_check($str)
	{
	
		if ($str == -1)
		{
			$this->form_validation->set_message('value_check', 'Choose Trip Model');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
	
}
?>