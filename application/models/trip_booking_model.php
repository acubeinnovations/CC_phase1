<?php 
class Trip_booking_model extends CI_Model {
	
	function getDriver($vehicle_id){

	$this->db->from('vehicle_drivers');
	$condition=array('vehicle_id'=>$vehicle_id,'organisation_id'=>$this->session->userdata('organisation_id'));
    $this->db->where($condition);
	
    $results = $this->db->get()->result();
	if(count($results)>0){
	return $results[0]->driver_id;
	}
	}

	function getVehicle($id){

	$this->db->from('vehicles');
	$condition=array('id'=>$id,'organisation_id'=>$this->session->userdata('organisation_id'));
    $this->db->where($condition);
	
    $results = $this->db->get()->result();
	if(count($results)>0){
	return $results;
	}else{
		return false;
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
	if($this->db->insert_id()>0){
		return $this->db->insert_id();
	}else{
		return false;
	}
	 
    }	

	function  generateTripVoucher($data) {
	
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('trip_vouchers',$data);
	$trip_voucher_id = $this->db->insert_id();

	$id=$data['trip_id'];
	$updatedata=array('trip_status_id'=>TRIP_STATUS_TRIP_BILLED);
	$res=$this->updateTrip($updatedata,$id);	
	if($res=true){
	return $trip_voucher_id;
	}else{
	return false;
	}
    }

	
	function  updateTripVoucher($data,$id) {
	$this->db->where('id',$id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update("trip_vouchers",$data);
	return $id;
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
$qry='SELECT TV.total_trip_amount,TV.start_km_reading,TV.end_km_reading,TV.end_km_reading,TV.releasing_place,TV.parking_fees,TV.toll_fees,TV.state_tax,TV.night_halt_charges,TV.fuel_extra_charges, T.id,T.pick_up_city,T.drop_city,T.pick_up_date,T.pick_up_time,T.drop_date,T.drop_time,T.tariff_id FROM trip_vouchers AS TV LEFT JOIN trips AS T ON  TV.trip_id =T.id AND TV.organisation_id = '.$this->session->userdata('organisation_id').' WHERE T.organisation_id = '.$this->session->userdata('organisation_id').' AND T.driver_id='.$driver_id;
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
	return $result;
	}else{
	return false;
	}

	}
	function getVehicleVouchers($vehicle_id){
$qry='SELECT TV.total_trip_amount,TV.start_km_reading,TV.end_km_reading,TV.end_km_reading,TV.releasing_place,TV.parking_fees,TV.toll_fees,TV.state_tax,TV.night_halt_charges,TV.fuel_extra_charges, T.id,T.pick_up_city,T.drop_city,T.pick_up_date,T.pick_up_time,T.drop_date,T.drop_time,T.tariff_id FROM trip_vouchers AS TV LEFT JOIN trips AS T ON  TV.trip_id =T.id AND TV.organisation_id = '.$this->session->userdata('organisation_id').' WHERE T.organisation_id = '.$this->session->userdata('organisation_id').' AND T.vehicle_id='.$vehicle_id;
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
	return $result;
	}else{
	return false;
	}

	}
	function getCustomerVouchers($customer_id){
$qry='SELECT TV.total_trip_amount,TV.start_km_reading,TV.end_km_reading,TV.end_km_reading,TV.releasing_place,TV.parking_fees,TV.toll_fees,TV.state_tax,TV.night_halt_charges,TV.fuel_extra_charges, T.id,T.pick_up_city,T.drop_city,T.pick_up_date,T.pick_up_time,T.drop_date,T.drop_time,T.tariff_id FROM trip_vouchers AS TV LEFT JOIN trips AS T ON  TV.trip_id =T.id AND TV.organisation_id = '.$this->session->userdata('organisation_id').' WHERE T.organisation_id = '.$this->session->userdata('organisation_id').' AND T.customer_id='.$customer_id;
	$result=$this->db->query($qry);
	$result=$result->result_array();
	if(count($result)>0){
	return $result;
	}else{
	return false;
	}

	}

	function selectAvailableVehicles($data){
	//$qry='SELECT V.id as vehicle_id, V.registration_number,V.vehicle_model_id,V.vehicle_make_id FROM vehicles AS V LEFT JOIN trips T ON  V.id =T.vehicle_id AND T.organisation_id = '.$data['organisation_id'].' WHERE V.vehicle_type_id = '.$data['vehicle_type'].' AND V.vehicle_ac_type_id ='.$data['vehicle_ac_type'].' AND V.organisation_id = '.$data['organisation_id'].' AND ((T.pick_up_date IS NULL AND pick_up_time IS NULL AND T.drop_date IS NULL AND drop_time IS NULL ) OR ((CONCAT(T.pick_up_date," ", T.pick_up_time) NOT BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'") AND (CONCAT( T.drop_date," ", T.drop_time ) NOT BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'")) AND CONCAT( T.pick_up_date," ", T.pick_up_time ) >= CURDATE() AND CONCAT( T.drop_date," ", T.drop_time ) >= CURDATE() AND CONCAT( T.pick_up_date," ", T.pick_up_time ) < "'.$data['dropdatetime'].'" )';
	//echo $qry;exit;	
	$qry='SELECT V1.id as vehicle_id, V1.registration_number,V1.vehicle_model_id,V1.vehicle_make_id FROM vehicles V1 WHERE V1.vehicle_type_id ='.$data['vehicle_type'].' AND V1.vehicle_make_id ='.$data['vehicle_make'].' AND V1.vehicle_model_id ='.$data['vehicle_model'].' AND V1.vehicle_ac_type_id ='.$data['vehicle_ac_type'].' AND V1.organisation_id = '.$data['organisation_id'].' AND V1.id NOT IN (SELECT V.id FROM vehicles AS V LEFT JOIN trips T ON V.id =T.vehicle_id WHERE V.vehicle_type_id ='.$data['vehicle_type'].' AND V.vehicle_make_id ='.$data['vehicle_make'].' AND V.vehicle_model_id ='.$data['vehicle_model'].' AND V.vehicle_ac_type_id ='.$data['vehicle_ac_type'].' AND V.organisation_id = '.$data['organisation_id'].' AND ((CONCAT( T.pick_up_date," ", T.pick_up_time ) BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'") OR (CONCAT( T.drop_date," ", T.drop_time ) BETWEEN "'.$data['pickupdatetime'].'" AND "'.$data['dropdatetime'].'")) OR ("'.$data['pickupdatetime'].'" BETWEEN CONCAT( T.pick_up_date," ", T.pick_up_time ) AND CONCAT( T.drop_date," ", T.drop_time )) OR ("'.$data['dropdatetime'].'" BETWEEN CONCAT( T.pick_up_date, " ", T.pick_up_time ) AND CONCAT( T.drop_date, " ", T.drop_time )))';
//echo $qry;exit;	
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
	$org_id=$this->session->userdata('organisation_id');
	$this->db->where('organisation_id',$org_id);
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

	function getTodaysTripsDriversDetails(){
$qry='SELECT T.id,T.pick_up_date,T.pick_up_time,T.drop_date,T.drop_time,T.pick_up_city,T.drop_city,D.id,D.name FROM trips AS T LEFT JOIN drivers AS D ON  T.driver_id =D.id AND T.organisation_id = '.$this->session->userdata('organisation_id').' WHERE D.organisation_id = '.$this->session->userdata('organisation_id').' AND (T.pick_up_date="'.date('Y-m-d').'" OR T.drop_date="'.date('Y-m-d').'") OR ((T.pick_up_date < "'.date('Y-m-d').'" AND T.drop_date > "'.date('Y-m-d').'"))';

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
