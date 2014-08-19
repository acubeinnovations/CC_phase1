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

    function  create_new_user( $userData ) {
      $data['firstName'] = $userData['firstName'];
      $data['lastName'] = $userData['lastName'];
      $data['email'] = $userData['email'];
	  $data['type'] = '3';
      $data['password'] = sha1($userData['password1']);

      return $this->db->insert('user',$data);
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
   

   
}
