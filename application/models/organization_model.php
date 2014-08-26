<?php
class Organization_model extends CI_Model {
	function OrganizationOrUserLogin( $username, $password ) {
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
	function getProfile(){
		$query=$this->db->get_where('organisations',array('id'=>$this->session->userdata('organisation_id')));
		if($query->num_rows()>0){
		$org_res=$query->row_array(); 
		$qry=$this->db->get_where('users',array('organisation_id'=>$this->session->userdata('organisation_id')));
		$user_res=$qry->row_array();
		$data=array('org_res'=>$org_res,'user_res'=>$user_res);
		return $data;
		}else {
		return false;
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
	function LoginAttemptsChecks($username) {
		$this->db->from('user_login_attempts');
        $this->db->where('username',$username);
        $login_attempts = $this->db->get()->result();
		 if (count( $login_attempts) >= 3 ) {
			$this->session->set_userdata(array('isloginAttemptexceeded'=>true));
			$this->session->set_userdata(array('loginAttemptcount'=>count($login_attempts)));
		}else{
			$this->session->set_userdata(array('isloginAttemptexceeded'=>false));
		}
	}
    function set_session() {
        $this->session->set_userdata( array(
                'id'=>$this->details->id,
                'name'=> $this->details->first_name . ' ' . $this->details->last_name,
                'email'=>$this->details->email,
				'username'=>$this->details->username,
				'organisation_id'=>$this->details->organisation_id,
				'type'=>$this->details->user_type_id,
                'isLoggedIn'=>true
            )
        );
    }
	
	function clearLoginAttempts($username){
		$tables = array('user_login_attempts');
		$this->db->where('username', $username);
		$this->db->delete($tables);

	}
	function recordLoginAttempts($username) {
		$data=array('username'=>$username);
		$this->db->insert('user_login_attempts',$data);

	}
	function update($data){
		$orgdbdata = array('name'=>$data['name'],'address'=>$data['addr'],'updated'=>NOW());
		$userdbdata = array('first_name'=>$data['fname'],'last_name'=>$data['lname'],'address'=>$data['addr'],'email'=>$data['mail'],'phone'=>$data['phn']);
		$this->db->where('id',$data['user_id'] );
		$succesuser=$this->db->update('users',$userdbdata);
		if($succesuser>0){
		$this->db->where('id',$data['org_id'] );
		$succes=$this->db->update('organisations',$orgdbdata);
		if($succes > 0) {
		return true;
		}
		}
	}
	function  insertUser($fname,$lname,$addr,$uname,$pwd,$mail,$phn) {
	$org_id=$this->session->userdata('id');
	if($org_id){
	$data=array('username'=>$uname,'password'=>md5($pwd),'first_name'=>$fname,'last_name'=>$lname,'phone'=>$phn,'address'=>$addr,'user_status_id'=>USER_STATUS_ACTIVE,'user_type_id'=>FRONT_DESK,'email'=>$mail,'organisation_id'=>$org_id);
	$this->db->set('registration_date', 'NOW()', FALSE);
	$this->db->insert('users',$data);
	return true;
	  }
    }
	function checkUser($username){
		$qry=$this->db->get_where('users',array('username'=>$username));
		$user_res=$qry->row_array();
		if(count($user_res) > 0){
		return $user_res;
		} else {
		return false;
		}
		}


	function getUserStatus(){
		$qry=$this->db->get('user_statuses');
		$count=$qry->num_rows();
			$s= $qry->result_array();
		
			for($i=0;$i<$count;$i++){
			
			$status[$s[$i]['id']]=$s[$i]['name'];
			}
			return $status;
	}
	function updateUser($data){
		
		$userdbdata = array('first_name'=>$data['firstname'],'last_name'=>$data['lastname'],'address'=>$data['address'],'email'=>$data['email'],'phone'=>$data['phone']);
		$this->db->where('id',$data['id'] );
		$succesuser=$this->db->update('users',$userdbdata);
		if($succesuser>0){
		return true;
		}else{
		return false;
		}
		
	}
}
?>
