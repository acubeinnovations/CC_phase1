<?php
class Org_model extends CI_Model {

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
				'type'=>$this->details->user_type_id,
                'isLoggedIn'=>true
            )
        );
    }
	function OrgLogin( $username, $password ) {
        
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
	function clearLoginAttempts($username){
		$tables = array('user_login_attempts');
		$this->db->where('username', $username);
		$this->db->delete($tables);

	}
	function recordLoginAttempts($username) {
		$data=array('username'=>$username);
		$this->db->insert('user_login_attempts',$data);

	}
}
?>