<?php


class admin_model extends CI_Model {

    var $details;

    function AdminLogin( $username, $password ) {
        
        $this->db->from('users');
        $this->db->where('username',$username );
        $this->db->where( 'password', md5($password) );
        $login = $this->db->get()->result();

        
        if ( is_array($login) && count($login) == 1 ) {
            
            $this->details = $login[0];
            $this->set_session();
            return true;
        }

        return false;
    }

    function set_session() {
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->first_name . ' ' . $this->details->last_name,
                'email'=>$this->details->email,
				'username'=>$this->details->username,
				'type'=>$this->details->user_type_id,
                'isLoggedIn'=>true
            )
        );
    }

        
    function  insertOrg($name,$addr ) {
	$data=array('name'=>$name,'address'=>$addr,'status_id'=>'1');
	$this->db->set('created', 'NOW()', FALSE);
	return $this->db->insert('organisations',$data);
    }
    
    function getOrg(){
	$query=$this->db->get('organisations');
	return $query->result_array();
    }
	function getProfile(){
	$this->db->from('users');
	$this->db->where('id',$this->session->userdata('id'));
	return $this->db->get()->result();
    }
	function updateProfile($data){
	$this->db->where('id',$this->session->userdata('id') );
	$this->db->update('users',$data);
	
    }
   

   
}
