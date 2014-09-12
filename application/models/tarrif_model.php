<?php 
class Tarrif_model extends CI_Model {
	public function addValues($data){
	//print_r($data);exit;
	$tbl="tariff_masters";
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$data);
	return true;
	}
	public function editValues($data,$id){
	$tbl="tariff_masters";
	
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update($tbl,$data);
	return true;
	}
	public function deleteValues($id){
	$tbl="tariff_masters";
	$this->db->where('id',$id );
	$this->db->delete($tbl);
	return true;
	}
	public function addTariff($data){
	$tbl="tariffs";
	$to_date='9999-12-30';
	$this->db->set('to_date', $to_date);
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$data);
	return true;
	}
	}
	?>