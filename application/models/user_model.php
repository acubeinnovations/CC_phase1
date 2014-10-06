<?php
class user_model extends CI_Model {

    var $details;

   
	function getProfile(){
	$this->db->from('users');
	$this->db->where('id',$this->session->userdata('id'));
	return $this->db->get()->result();
    }
	function updateProfile($data){
		$this->db->where('id',$this->session->userdata('id') );
		$succes=$this->db->update('users',$data);
		if($succes > 0) {
		$this->session->set_userdata(array('dbSuccess'=>'Profile Updated Successfully'));
		}
    }
   	function changePassword($data) {
		$this->db->from('users');
        $this->db->where('id',$this->session->userdata('id'));
        $this->db->where( 'password', $data['old_password']);
        $changepassword = $this->db->get()->result();
		if ( is_array($changepassword) && count($changepassword) == 1 ) {
			$dbdata=array('password'=>$data['password']);
			$this->db->where('id',$this->session->userdata('id') );
			$succes=$this->db->update('users',$dbdata);
			if($succes > 0) {
			$this->session->set_userdata(array('dbSuccess'=>'Password changed Successfully'));
			$this->session->set_userdata(array('dbError'=>''));
			return true;
			}
		}else{
			$this->session->set_userdata(array('dbError'=>'Current Password seems to be different'));
			return false;
		}

   	}

	public function getArray($tbl){
	if($tbl=='drivers'){
	$org_id=$this->session->userdata('organisation_id');
	$query='SELECT * FROM drivers WHERE drivers.id NOT IN (SELECT driver_id FROM vehicle_drivers WHERE organisation_id='.$org_id.') And organisation_id='.$org_id.'';
	$qry=$this->db->query($query);
	//echo $this->db->select('*')->from('drivers');exit;
	//$qry=$this->db->where('`id` NOT IN (SELECT `driver_id` FROM `vehicle_drivers`)', NULL, FALSE);
	//echo $this->db->last_query();exit;
	//$qry=$this->db->where(array('organisation_id'=>$org_id));
	//$qry=$this->db->get($tbl);
	//get drivers who not get assigned for any vehicle
	
	}
	else{
		$qry=$this->db->get($tbl);
		}
		$count=$qry->num_rows();
			$l= $qry->result_array();
		
			for($i=0;$i<$count;$i++){
			$values[$l[$i]['id']]=$l[$i]['name'];
			}
			if(!empty($values)){
			return $values;
			}
			else{
			return false;
			}
	}
   
	
	public function getAll_tarrifDetails(){
	$qry=$this->db->get('tariffs');
	$count=$qry->num_rows();
	$result=$qry->result_array();
	return $result;
	
	
	}
	public function getTarrif_masters(){
	$this->db->where('organisation_id',$this->session->userdata('organisation_id') );
	$this->db->where('user_id',$this->session->userdata('id') );
	$qry=$this->db->get('tariff_masters');
	$count=$qry->num_rows();
	$l= $qry->result_array();
	for($i=0;$i<$count;$i++){
			$values[$l[$i]['id']]=$l[$i]['title'];
			}
			if(!empty($values)){
			return $values;
			}
			else{
			return false;
			}
	}
	
	public function getDriverList($organisation_id){
	$qry=$this->db->select('id,name,phone,mobile');
	$qry=$this->db->where('organisation_id',$organisation_id);
	$qry=$this->db->get('drivers');
	$count=$qry->num_rows();
	return $qry->result_array();
	 
}
   public function getDriverDetails($arry){
   $qry=$this->db->where($arry);
   $qry=$this->db->get('drivers');
   return $qry->row_array();
   
   }
   public function getType($id){
   $qry=$this->db->select('id,name,phone,mobile');
   }
   public function getRecordsById($tbl,$id){ 
   if($tbl=='vehicles'){
   $to_date='9999-12-30';
   $qry=$this->db->where(array('vehicle_id'=>$id,'to_date'=>$to_date));
   $qry=$this->db->get('vehicle_drivers'); //echo $this->db->last_query();exit;
   $result['driver']= $qry->row_array();
   
   }
	$v_qry=$this->db->where('id',$id);
	$v_qry=$this->db->get($tbl);
	$result['vehicle']= $v_qry->row_array();
	return $result;
}
	public function getDriverNameById($param2){
	$qry=$this->db->select('name');
	$qry=$this->db->where('id',$param2);
	$qry=$this->db->get('drivers');

	return $qry->row_array();
	}
	public function getInsurance($id){
	$qry=$this->db->where('id',$id);
	$qry=$this->db->get('vehicles_insurance');
	return $qry->row_array();
	
	}
	public function getLoan($id){
	$qry=$this->db->where('id',$id);
	$qry=$this->db->get('vehicle_loans');
	return $qry->row_array();
	
	}
	public function getOwner($id){
	$qry=$this->db->where('id',$id);
	$qry=$this->db->get('vehicle_owners');
	return $qry->row_array();
	
	}
	public function getValues($tbl,$id){
	$qry=$this->db->select('name');
	$qry=$this->db->where('id',$id);
	$qry=$this->db->get($tbl);
	return $qry->result_array();
	
	}
	public function getValueArray($tbl,$id){
		$qry=$this->db->where('id',$id);
		$qry=$this->db->get($tbl); 
		$count=$qry->num_rows();
			$l= $qry->result_array();
			for($i=0;$i<$count;$i++){
			$values[$l[$i]['id']]=$l[$i]['name'];
			}
			if(!empty($values)){
			return $values; 
			}
			else{
			return false;
			}
	}
}
