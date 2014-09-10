<?php 
class Tarrif_model extends CI_Model {
	public function addValues($data){
	print_r($data);exit;
	$tbl="tariff_masters";
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$data);
	return true;
	}
	}
	?>