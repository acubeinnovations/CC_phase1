<?php 
class Customers_model extends CI_Model {
	
	
	public function getCustomerDetails($data){ 
	//$this->db->select('id,name,email,mobile');
	$this->db->from('customers');
	if($data!=''){
		$this->db->where($data);
	}
	return $this->db->get()->result_array();
	
	}

	public function addCustomer($data){
 		
		$condition=array('mobile'=>$data['mobile']);
		$res=$this->getCustomerDetails($condition);
		if(count($res)==0){
		$this->db->set('created', 'NOW()', FALSE);
		$this->db->insert('customers',$data);
		$insert_id=$this->db->insert_id();

		if($insert_id > 0){
			return $insert_id;
		}else{
			return false;
		}
		}else{
			return $res[0]['id'];
		}
	
	}
	function  updateCustomers($data,$id) {
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update("customers",$data);
	return true;
	}
	
	public function getArray(){
		$qry=$this->db->get('customers');
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
?>
