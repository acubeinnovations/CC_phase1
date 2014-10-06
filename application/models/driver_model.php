<?php
class Driver_model extends CI_Model {
public function addDriverdetails($data){

	$this->db->set('salary', '2500');
	$this->db->set('minimum_working_days', '25');
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('drivers',$data);
	return $this->db->insert_id();
}

public function getDriverDetails($data){ 
		
	$this->db->from('customers');
	$this->db->where($data);
	return $this->db->get()->result_array();
	
	}

	function getDriversArray($condion=''){
	$this->db->from('drivers');
	if($condion!=''){
    $this->db->where($condion);
	}
    $results = $this->db->get()->result();
	

		for($i=0;$i<count($results);$i++){
		$values[$results[$i]->id]=$results[$i]->name;
		}
		if(!empty($values)){
		return $values;
		}
		else{
		return false;
		}

	}

	public function UpdateDriverdetails($data,$id){
	$arry=array('id'=>$id,'organisation_id'=>$data['organisation_id']);
	$this->db->set('updated', 'NOW()', FALSE);
	$qry=$this->db->where($arry);
	$qry=$this->db->update("drivers",$data);
	
	return true;
	}


}?>
