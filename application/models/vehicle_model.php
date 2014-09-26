<?php
class Vehicle_model extends CI_Model {
public function insertVehicle($data,$driver_data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$qry=$this->db->insert('vehicles',$data);
$v_id=mysql_insert_id();
if($qry>0){
//date insertion for vehicle-drivers
	
	//$date=explode("-",$driver_data['from_date']);
	//$year=$date[0];
	//$month=$date[1];
	//$day=$date[2];
	$date=$driver_data['from_date'];
	$date_result=$this->date_check($date);
	if($date_result==true ) {
	$to_date='9999-12-30';
	$tbl="vehicle_drivers";
	$arry=array('vehicle_id'=>$v_id,'driver_id'=>$driver_data['driver'],'from_date'=>$date,'organisation_id'=>$data['organisation_id'],'user_id'=>$data['user_id'],'to_date'=>$to_date);
	//$this->db->set('to_date', $to_date);
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$arry);
	$this->mysession->set('vehicle_id',$v_id);
	return true;
	}
	else
	{
	$this->mysession->set('date_err','Invalid Date');
	}


}
}

public function date_check($date){
	if( strtotime($date) >= strtotime(date('Y-m-d')) ){
	return true;
	}	
	}
	
public function insertInsurance($data){
$qry=$this->db->insert('vehicles_insurance',$data);
$in_id=mysql_insert_id();
$map_qry=$this->db->set('vehicles_insurance_id', $in_id);
$map_qry=$this->db->update('vehicles');
return true;

}
public function insertLoan($data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$qry=$this->db->insert('vehicle_loans',$data);
$l_id=mysql_insert_id();
$map_qry=$this->db->set('vehicle_loan_id', $l_id);
$map_qry=$this->db->update('vehicles');
return true;

}

public function insertOwner($data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$qry=$this->db->insert('vehicle_owners',$data);
$o_id=mysql_insert_id();
$map_qry=$this->db->set('vehicle_owner_id', $o_id);
$map_qry=$this->db->update('vehicles');
return true;

}
}?>