<?php
class Driver_model extends CI_Model {
public function addDriverdetails($data){
$this->db->set('salary', '2500');
$this->db->set('minimum_working_days', '25');
$this->db->set('created', 'NOW()', FALSE);
$this->db->insert('drivers',$data);
return true;
}


}?>