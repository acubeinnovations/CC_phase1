<?php 
class Tarrif_model extends CI_Model {
	public function addValues($data){
	$tbl="tariff_masters";
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$data);
	return true;
	}
	public function editValues($data){
	$tbl="tariff_masters";
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update($tbl,$data);
	return true;
	}
	}
	?>