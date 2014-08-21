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

        
    function  insertOrg($name,$fname,$lname,$addr,$uname,$pwd,$mail,$phn ) {
	$data=array('name'=>$name,'address'=>$addr,'status_id'=>'1');
	$this->db->set('created', 'NOW()', FALSE);
	$this->db->insert('organisations',$data);
	$insert_id=$this->db->insert_id();
	if($insert_id){
	$data2=array('username'=>$uname,'password'=>md5($pwd),'first_name'=>$fname,'last_name'=>$lname,'phone'=>$phn,'address'=>$addr,'user_status_id'=>'1','user_type_id'=>ORGANISATION_ADMINISTRATOR,'email'=>$mail,'organisation_id'=>$insert_id);
	$this->db->set('registration_date', 'NOW()', FALSE);
	$this->db->insert('users',$data2);
	return true;
	  }
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
		$succes=$this->db->update('users',$data);
		if($succes > 0) {
		$this->session->set_userdata(array('dbSuccess'=>'Profile Updated Successfully'));
		}
    }
   	function changePassword($data) {
		$this->db->from('users');
        $this->db->where('id',$this->session->userdata('id'));
        $this->db->where( 'password', $data['old_password']);
        $changepassword = $this->db->get()->result();
		if ( is_array($changepassword) && count($changepassword) == 1 ) {
			$dbdata=array('password'=>$data['password']);
			$this->db->where('id',$this->session->userdata('id') );
			$succes=$this->db->update('users',$dbdata);
			if($succes > 0) {
			$this->session->set_userdata(array('dbSuccess'=>'Password changed Successfully'));
			$this->session->set_userdata(array('dbError'=>''));
			return true;
			}
		}else{
			$this->session->set_userdata(array('dbError'=>'Current Password seems to be different'));
			return false;
		}

   	}

	function checkOrg($name){
		$query=$this->db->get_where('organisations',array('name'=>$name));
		$org_res=$query->row_array(); 
		$id=$org_res['id'];
		$qry=$this->db->get_where('users',array('organisation_id'=>$id));
		$user_res=$qry->row_array();
		$data=array('org_res'=>$org_res,'user_res'=>$user_res);
		return $data;
		}
	function getStatus(){
		$qry=$this->db->get('user_statuses');
		return $qry->result_array();
	}
   
}
