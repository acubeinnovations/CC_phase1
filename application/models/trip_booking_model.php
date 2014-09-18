<?php 
class Trip_booking_model extends CI_Model {
	
	function getDriver($vehicle_id){

	$this->db->from('vehicle_drivers');
    $this->db->where('vehicle_id',$vehicle_id);
	
    $results = $this->db->get()->result();
	if(count($results)>0){
	return $results['driver_id'];
	}
	}

	function  bookTrip($data) {
	
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('trips',$data);
	return true;
	 
    }

	function getDetails($conditon =''){

	$this->db->from('trips');
	if($conditon!=''){
		$this->db->where($conditon);
	}
 	$results = $this->db->get()->result();
		if(count($results)>0){
		return $results;

		}else{
			return false;
		}
	}
	
}
?>
