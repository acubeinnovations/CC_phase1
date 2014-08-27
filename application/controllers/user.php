<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	//newly added nijo
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
		} else {
		return false;
		}
	}   
	public function index(){
		$param1=$this->uri->segment(3);
        if($this->session_check()==true) {
		if($param1==''){
		$data['title']="Home | CC Phase1";    
        $page='user-pages/user_home';
		$this->load_templates($page,$data);
		}elseif($param1=='profile'){
		$this->profile();
		}elseif($param1=='changepassword'){
		$this->changePassword();
		}
		}else{
			echo 'you are not authorized access this page..';
		}
	
    }
	
	public function load_templates($page='',$data=''){
		$this->load->view('admin-templates/header',$data);
		$this->load->view('admin-templates/nav');
		$this->load->view($page,$data);
		$this->load->view('admin-templates/footer');

	}
	
public function profile() {
	   if($this->session_check()==true) {
		$this->load->model('user_model');
		$dbdata = '';
              if(isset($_REQUEST['user-profile-update'])){
			//$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[1]|max_length[20]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[1]|max_length[20]|xss_clean|alpha_numeric');
			$this->form_validation->set_rules('email','Email','trim|required|min_length[5]|max_length[50]|valid_email|xss_clean');
			$this->form_validation->set_rules('phone','Phone','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('address','Address','trim|required|min_length[5]|max_length[50]|xss_clean');
			//$dbdata['username']  = $this->input->post('username');
		   	$dbdata['first_name'] = $this->input->post('firstname');
			$dbdata['last_name']  = $this->input->post('lastname');
		    $dbdata['email'] 	   = $this->input->post('email');
			$dbdata['phone'] 	   = $this->input->post('phone');
		    $dbdata['address']   = $this->input->post('address');
			$dbdata['username']   = $this->input->post('husername');
			if($this->form_validation->run() != False) {
				$val    		   = $this->user_model->updateProfile($dbdata);
				redirect(base_url().'organization/front-desk');
			}else{
				$this->show_profile($dbdata);
			}
		}else{
			
			$this->show_profile($dbdata);

		}
	   }	
		else{
			echo 'you are not authorized access this page..';
		}
	}
	public function show_profile($data) {
		  if($this->session_check()==true) {
			if($data == ''){
			$data['values']=$this->user_model->getProfile();
			}else{
			$data['postvalues']=$data;
			}
			$data['title']="Profile | ".PRODUCT_NAME;  
			$page='user-pages/profile';
		    $this->load_templates($page,$data);
		    }
			else{
				echo 'you are not authorized access this page..';
			}
	}
	public function changePassword() {
	if($this->session_check()==true) {
	   $this->load->model('user_model');
	   $data['old_password'] = 	'';
		$data['password']	  = 	'';
		$data['cpassword'] 	  = 	'';
       if(isset($_REQUEST['user-password-update'])){
			$this->form_validation->set_rules('old_password','Current Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password','New Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|min_length[5]|max_length[20]|matches[password]|xss_clean');
			$data['old_password'] = trim($this->input->post('old_password'));
			$data['password'] = trim($this->input->post('password'));
			$data['cpassword'] = trim($this->input->post('cpassword'));
			if($this->form_validation->run() != False) {
				$dbdata['password']  	= md5($this->input->post('password'));
				$dbdata['old_password'] = md5(trim($this->input->post('old_password')));
				$val    			    = $this->user_model->changePassword($dbdata);
				if($val == true) {				
					redirect(base_url().'organization/front-desk');
				}else{
					$this->show_change_password($data);
				}
			} else {
				
					$this->show_change_password($data);
			}
		} else {
			
					$this->show_change_password($data);
		}
		           }
		else{
			echo 'you are not authorized access this page..';
		}
	}	
   
	public function show_change_password($data) {
		if($this->session_check()==true) {
				$data['title']="Change Password | ".PRODUCT_NAME;  
				$page='user-pages/change_password';
				 $this->load_templates($page,$data);
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	   

}
?>
