<?php 
class Customers_model extends CI_Model {
	
	
	public function getCustomerDetails($data){ 
	$this->db->select('id,name,email,mobile');
	$this->db->from('customers');
	$this->db->where($data);
	return $this->db->get()->result_array();
	
	}

	public function addCustomer($data){ 
	
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('customers',$data);
	$insert_id=$this->db->insert_id();

	if($insert_id > 0){
		return $insert_id;
	}else{
		return false;
	}
	
	}
	
}
?>
