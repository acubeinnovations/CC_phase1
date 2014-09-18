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
	function selectAvailableVehicles($data){
	$qry='SELECT V.registration_number,V.id FROM vehicle as V, LEFT JOIN trips T on T.vehicle_id=V.id AND CONCAT(T.pick_up_date,T.pick_up_time) NOT BETWEEN('.$data['pickupdatetime'].','.$data['dropdatetime'].') CONCAT(T.drop_date,T.drop_time) NOT BETWEEN('.$data['pickupdatetime'].','.$data['dropdatetime'].') WHERE V.vehicle_type_id='.$data['vehicle_type'].' AND vehicle_ac_type_id='.$data['vehicle_ac_type_id'];
	$result=$this->db->query($qry);
	$result=$result->result_array();
	return $result;

	}
}
?>
