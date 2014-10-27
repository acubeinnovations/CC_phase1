<?php
class print_model extends CI_Model {
public function all_details($qry){
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
		return $result;
	}else{
		return false;
	}
}
}
?>