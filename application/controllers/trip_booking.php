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
		if($param1=='customer-check') {
			
			$this->customer_check();
				
		}else if($param1=='get-distance') {
			
			$this->getDistance();
				
		}else if($param1=='get-places') {
			
			$this->getPlaces();
				
		}
		
	}else{
			echo 'you are not authorized access this page..';
	}
	}
		
	
		public function customer_check(){
		if(isset($_REQUEST['mobile']) && $_REQUEST['mobile']!=''){
			$data['mobile']=$_REQUEST['mobile'];
		}
		if(isset($_REQUEST['email']) && $_REQUEST['email']!=''){
			$data['email']=$_REQUEST['email'];
		}
		
		$res=$this->trip_booking_model->getCustomerDetails($data);
		if(!empty($res)){
		echo json_encode($res);
		$this->set_customer_session($res);
		}else{
		return false;
		}
		
		}
		public function getDistance(){
		if(isset($_REQUEST['url']) && $_REQUEST['via']=='NO') {
		$target_url=$_REQUEST['url'];
			$data=file_get_contents($target_url);
			$decode = json_decode($data);//print_r($decode);
			if(isset($decode->rows[0]->elements[0]->status) && $decode->rows[0]->elements[0]->status!='NOT_FOUND') {
			$jsondata['distance']=$decode->rows[0]->elements[0]->distance->text;
			$jsondata['duration']=$decode->rows[0]->elements[0]->duration->text;
			$jsondata['via']='NO';
			$jsondata['No_Data']='false';
			echo json_encode($jsondata);
			}
		else{
			$jsondata['No_Data']='true';
			echo json_encode($jsondata);
		}
		}elseif(isset($_REQUEST['url']) && $_REQUEST['via']=='YES'){
			$target_url=$_REQUEST['url'];
			$data=file_get_contents($target_url);
			$decode = json_decode($data);//print_r($decode);exit;
			if(isset($decode->rows[0]->elements[0]->status) && $decode->rows[0]->elements[0]->status!='NOT_FOUND' && isset($decode->rows[0]->elements[1]->status) && $decode->rows[0]->elements[1]->status!='NOT_FOUND') {
			$jsondata['first_distance']=$decode->rows[0]->elements[0]->distance->text;
			$jsondata['first_duration']=$decode->rows[0]->elements[0]->duration->text;
			$jsondata['second_distance']=$decode->rows[1]->elements[1]->distance->text;
			$jsondata['second_duration']=$decode->rows[1]->elements[1]->duration->text;
			$jsondata['via']='YES';
			$jsondata['No_Data']='false';
			echo json_encode($jsondata);
		}else{
			$jsondata['No_Data']='true';
			echo json_encode($jsondata);
		}

		}
		}
		
		public function getPlaces(){
			if(isset($_REQUEST['url']) && isset($_REQUEST['insert_to'])) {
			$target_url=$_REQUEST['url'];
			$jsondata ='';
				$data=file_get_contents($target_url);
				$decode = json_decode($data);//print_r($decode);exit;
				if(isset($decode->status) && $decode->status!='ZERO_RESULTS') {
				for($jsondata_index=0;$jsondata_index<count($decode->predictions);$jsondata_index++){
				$place=explode(",", $decode->predictions[$jsondata_index]->description);
				$jsondata.='<li><a class="drop-down-places" place='.$place[0].' insert_to="'.$_REQUEST['insert_to'].'">'.$decode->predictions[$jsondata_index]->description.'</a></li><li class="divider"></li>';
				}
				echo $jsondata;
				}
				}
			else{
				$jsondata='false';
				echo $jsondata;
			}
		
		}
		
		public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
		} else {
		return false;
		}
	} 

	public function set_customer_session($data){
	$session_data=array('customer_id'=>$data[0]['id'],'customer_name'=>$data[0]['name'],'customer_email'=>$data[0]['email'],'customer_mobile'=>$data[0]['mobile']);
	$this->session->set_userdata($session_data);

	}
}
?>
	
