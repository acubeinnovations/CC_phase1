<?php
class Vehicle_model extends CI_Model {
echo $data['organisation_id'];exit;
public function insertVehicle($data){
$qry=$this->db->set('created', 'NOW()', FALSE);
$qry=$this->db->insert('vehicles',$data);
$v_id=mysql_insert_id();
if($qry>0){
$arry=array('vehicle_id'=>,'driver_id'=>,'from_date'=>,'organisation_id'=>,'user_id'=>)

}
}


}?>