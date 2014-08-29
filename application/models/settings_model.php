<?php 
class Settings_model extends CI_Model {
	
	
	public function addValues($tbl,$data){
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$data);
	return true;
	}
	public function getValues($tbl){
	$qry=$this->db->get($tbl);
	return $this->qry->result_array();
	}
	public function updateValues($tbl,$data){
	$this->db->update($tbl,$data);
	return true;
	}
	public function deleteValues($tbl,$data){
	$this->db->delete($tbl,$data);
	return true;
	}
}
?>
