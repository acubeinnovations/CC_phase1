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
	public function tarrif_manage(){
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
	$err=True;
	$this->form_validation->set_rules('title','Title','trim|required|min_length[2]|xss_clean|alpha_numeric');
	 if($data['trip_model_id'] ==-1){
	 $data['trip_model_id'] ='';
	 $err=False;
	 $this->session->set_userdata('select_trip_model','Choose Any Trip Model');
	 }
	 if($data['vehicle_make_id']==-1){
	  $data['vehicle_make_id'] = '';
	 $err=False;
	 $this->session->set_userdata('select_vehicle_makes','Choose Any Vehicle Makes');
	 } 
	 if($data['vehicle_ac_type_id']==-1){
	 $data['vehicle_ac_type_id'] ='';
	 $err=False;
	 $this->session->set_userdata('select_ac_type','Choose Any AC Type');
	 }
	 $this->form_validation->set_rules('min_kilo','Minimum Kilometers','trim|required|xss_clean|numeric');
	 $this->form_validation->set_rules('min_hours','Minimum Hours','trim|required|xss_clean|numeric');
	
		if($this->form_validation->run()==False || $err==False){//echo "err";exit;
		 $this->session->set_userdata('post',$data);
		redirect(base_url().'organization/front-desk/tarrif-masters',$data);
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
	if(isset($_REQUEST['edit'])){
	 $data['title'] = $this->input->post('manage_title');
	 $data['trip_model_id'] = $this->input->post('manage_select_trip_model');
	 $data['vehicle_make_id'] = $this->input->post('manage_select_vehicle_makes');
	 $data['vehicle_ac_type_id'] = $this->input->post('manage_select_ac_type');
	 $data['minimum_kilometers'] = $this->input->post('manage_min_kilo');
	 $data['minimum_hours'] = $this->input->post('manage_min_hours');
	 $this->form_validation->set_rules('manage_title','Title','trim|required|min_length[2]|xss_clean|alpha_numeric');
	 $this->form_validation->set_rules('manage_min_kilo','Minimum Kilometers','trim|required|xss_clean|numeric');
	 $this->form_validation->set_rules('manage_min_hours','Minimum Hours','trim|required|xss_clean|numeric');
	 if($this->form_validation->run()==False){//echo "err";exit;
		 $this->session->set_userdata('post',$data);
		redirect(base_url().'organization/front-desk/tarrif-masters',$data);
		}
		else {
		$res=$this->tarrif_model->editValues($data);
		if($res==true){
		$this->session->set_userdata(array('dbSuccess'=>' Updated Succesfully..!'));
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
	
	
}
?>