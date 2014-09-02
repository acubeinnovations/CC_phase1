<?php 
class Trip_booking_model extends CI_Model {
	
	
	public function getCustomerDetails($data){ 
	$this->db->select('id,name,email,mobile');
	$this->db->from('customers');
	$this->db->where($data);
	return $this->db->get()->result_array();
	
	}
	
}
?>
