<?php
class Device_model extends CI_Model {
	public function addDevice($data){
		$this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('devices',$data);
		return true;
	}
		
	function  updateDevice($data,$id) {
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update("devices",$data);
	return true;
	}

	public function getDeviceDetails($data){ 
		
	$this->db->from('deivices');
	$this->db->where($data);
	return $this->db->get()->result_array();
	
	}

	function getDeviceArray($condion=''){
	$this->db->from('devices');
	if($condion!=''){
    $this->db->where($condion);
	}
    $results = $this->db->get()->result();
	

		for($i=0;$i<count($results);$i++){
		$values[$results[$i]['id']]=$results[$i]['sim_no'];
		}
		if(!empty($values)){
		return $values;
		}
		else{
		return false;
		}

	}


}?>
