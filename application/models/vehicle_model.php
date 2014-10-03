<?php
class Vehicle_model extends CI_Model {
public function insertVehicle($data,$driver_data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$qry=$this->db->insert('vehicles',$data);
$v_id=mysql_insert_id();
if($qry>0){
	
	$this->mysession->set('vehicle_id',$v_id);
	return true;
	}
	else
	{
	$this->mysession->set('date_err','Invalid Date');
	}


}



	
public function insertInsurance($data){
$v_id=$this->mysession->get('vehicle_id');
$qry=$this->db->set('vehicle_id', $v_id);
$qry=$this->db->insert('vehicles_insurance',$data);
$in_id=mysql_insert_id();
$map_qry=$this->db->set('vehicles_insurance_id', $in_id);
$map_qry=$this->db->where('id',$v_id);
$map_qry=$this->db->update('vehicles');
return true;

}
public function insertLoan($data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$v_id=$this->mysession->get('vehicle_id');
$qry=$this->db->set('vehicle_id', $v_id);
$qry=$this->db->insert('vehicle_loans',$data);
$l_id=mysql_insert_id();
$map_qry=$this->db->set('vehicle_loan_id', $l_id);
$map_qry=$this->db->where('id',$v_id);
$map_qry=$this->db->update('vehicles');
return true;

}

public function insertOwner($data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$v_id=$this->mysession->get('vehicle_id');
$qry=$this->db->set('vehicle_id', $v_id);
$qry=$this->db->insert('vehicle_owners',$data);
$o_id=mysql_insert_id();
$map_qry=$this->db->set('vehicle_owner_id', $o_id);
$v_id=$this->mysession->get('vehicle_id');
$map_qry=$this->db->where('id',$v_id);
$map_qry=$this->db->update('vehicles');
return true;

}
public function  UpdateVehicledetails($data,$v_id){
	
	$this->db->where('id',$v_id );
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update('vehicles',$data);
	return true;


}

public function map_drivers($driver_id,$from_date,$updated_date) {
	$v_id=$this->mysession->get('vehicle_id');
	$to_date='9999-12-30';
	$tbl="vehicle_drivers";
	$qry=$this->db->where(array('vehicle_id'=>$v_id,'organisation_id'=>$this->session->userdata('organisation_id'),'to_date'=>$to_date));
	$qry=$this->db->get($tbl);
	$result=$qry->result_array();
	if($qry->num_rows()>0){
	$this->db->where('id',$result[0]['id']);
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update($tbl,array('to_date'=>$updated_date));
	}

	$arry=array('vehicle_id'=>$v_id,'driver_id'=>$driver_id,'from_date'=>$from_date,'organisation_id'=>$this->session->userdata('organisation_id'),'user_id'=>$this->session->userdata('id'),'to_date'=>$to_date);
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$arry);

	}



public function sample_call($data,$driver_data,$v_id){
	$to_date='9999-12-30';
	$tbl="vehicle_drivers";
	$qry=$this->db->where(array('vehicle_id'=>$v_id,'organisation_id'=>$data['organisation_id'],'to_date'=>$to_date));
	$qry=$this->db->get($tbl);
	$result=$qry->result_array();
	//$from=$result[0]['from_date'];
	if($qry->num_rows()>0){
	$this->db->where('id',$result[0]['id']);
	$this->db->set('updated', 'NOW()', FALSE);
	$this->db->update($tbl,array('to_date'=>$formatted_date));
	
	}
	
	$arry=array('vehicle_id'=>$v_id,'driver_id'=>$driver_data['driver_id'],'from_date'=>$date,'organisation_id'=>$data['organisation_id'],'user_id'=>$data['user_id'],'to_date'=>$to_date);
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert($tbl,$arry);
	$this->mysession->set('vehicle_id',$v_id);
}
public function UpdateInsurancedetails($data,$id){

$this->db->where('vehicle_id',$id);
$this->db->update('vehicles_insurance',$data); 
return true;

}
public function UpdateLoandetails($data,$id){
$this->db->set('updated', 'NOW()', FALSE);
$this->db->where('vehicle_id',$id);
$this->db->update('vehicle_loans',$data); 
return true;

}
public function UpdateOwnerdetails($data,$id){
$this->db->set('updated', 'NOW()', FALSE);
$this->db->where('vehicle_id',$id);
$this->db->update('vehicle_owners',$data);  
return true;

}
}?>
