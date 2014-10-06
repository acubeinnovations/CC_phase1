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

	function checkTripVoucherEntry($trip_id){

	$this->db->from('trip_vouchers');
    $this->db->where('trip_id',$trip_id);
	
    $results = $this->db->get()->result();
	if(count($results)>0){//print_r($results);
	return $results;
	}else{
	return gINVALID;
	}
	}

	function  bookTrip($data) {
	
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('trips',$data);
	return true;
	 
    }	

	function  generateTripVoucher($data) {
	
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('trip_vouchers',$data);
	
	$id=$data['trip_id'];
	$updatedata=array('trip_status_id'=>TRIP_STATUS_TRIP_BILLED);
	$res=$this->updateTrip($updatedata,$id);	
	if($res=true){
	return true;
	}else{
	return false;
	}
    }

	
	function  updateTripVoucher($data,$id) {
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update("trip_vouchers",$data);
	return true;
	}

	function  updateTrip($data,$id) {
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update("trips",$data);
	return true;
	}

	function getDetails($conditon ='',$orderby=''){

	$this->db->from('trips');
	if($conditon!=''){
		$this->db->where($conditon);
	}
	if($orderby!=''){
		$this->db->order_by($orderby);
	}
 	$results = $this->db->get()->result();//echo $this->db->last_query();
		if(count($results)>0){
		return $results;

		}else{
			return false;
		}
	}
	
	function getDriverVouchers($driver_id){
$qry='SELECT TV.start_km_reading,TV.end_km_reading,TV.end_km_reading,TV.releasing_place,TV.parking_fees,TV.toll_fees,TV.state_tax,TV.night_halt_charges,TV.fuel_extra_charges, T.id,T.pick_up_city,T.drop_city,T.pick_up_date FROM trip_vouchers AS TV LEFT JOIN trips AS T ON  TV.trip_id =T.id AND TV.organisation_id = '.$this->session->userdata('organisation_id').' WHERE T.organisation_id = '.$this->session->userdata('organisation_id').' AND T.driver_id='.$driver_id;
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
	return $result;
	}else{
	return false;
	}

	}

	function selectAvailableVehicles($data){
	$qry='SELECT V.id as vehicle_id, V.registration_number,V.vehicle_model_id,V.vehicle_make_id FROM vehicles AS V LEFT JOIN trips T ON  V.id =T.vehicle_id AND T.organisation_id = '.$data['organisation_id'].' WHERE V.vehicle_type_id = '.$data['vehicle_type'].' AND V.vehicle_ac_type_id ='.$data['vehicle_ac_type'].' AND V.organisation_id = '.$data['organisation_id'].' AND ((T.pick_up_date IS NULL AND pick_up_time IS NULL AND T.drop_date IS NULL AND drop_time IS NULL ) OR ((CONCAT(T.pick_up_date," ", T.pick_up_time) NOT BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'") AND (CONCAT( T.drop_date," ", T.drop_time ) NOT BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'")))';
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
	return $result;
	}else{
	return false;
	}

	}
	function getVehiclesArray($condion=''){
	$this->db->from('vehicles');
	if($condion!=''){
    $this->db->where($condion);
	}
    $results = $this->db->get()->result();
	
				//print_r($results);
		
			for($i=0;$i<count($results);$i++){
			$values[$results[$i]->id]=$results[$i]->registration_number;
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
