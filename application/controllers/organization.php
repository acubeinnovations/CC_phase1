<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends CI_Controller {
	 public function index()
		{		
		if( $this->session->userdata('isLoggedIn')&&(($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR) ||($this->session->userdata('type')==FRONT_DESK))) {
        	if($this->session->userdata('user_type')==ORGANISATION_ADMINISTRATOR){
				 redirect(base_url().'organization/admin');
				 }
				 elseif($this->session->userdata('user_type')==FRONT_DESK){
				 redirect(base_url().'organization/front_desk');
				 }
		} else if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			 $this->load->model('org_model');
			 $username=$this->input->post('username');
			 $this->org_model->LoginAttemptsChecks($username);
			 if( $this->session->userdata('isloginAttemptexceeded')==false){
			 $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[10]|xss_clean');
			 $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[10]|xss_clean');
			 } else {
			  $captcha = $this->input->post('captcha');
			 $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
				$this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[10]|xss_clean');
			 $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[10]|xss_clean');
			}
			 if($this->form_validation->run()!=False){
			 $username = $this->input->post('username');
		   	 $pass  = $this->input->post('password');

		     if( $username && $pass && $this->org_model->OrgLogin($username,$pass)) {
				 if($this->session->userdata('loginAttemptcount') > 1){
		       	 $this->org_model->clearLoginAttempts($username);
				 }
				 if($this->session->userdata('user_type')==ORGANISATION_ADMINISTRATOR){
				 echo "hi";exit;
				 redirect(base_url().'organization/admin');
				 }
				 elseif($this->session->userdata('user_type')==FRONT_DESK){
				 redirect(base_url().'organization/front_desk');
				 }
				 
		        
		    } else {
		        $this->org_model->recordLoginAttempts($username);
		        $this->show_login();
		    }
			} else {

		 	$this->show_login();
			}
		} else {

		 	$this->show_login();
		}
			
	}
	
	public function admin(){
	
	if($this->session_check()==true) {
		$Title['title']="Home | CC Phase1";    
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('organization-pages/admin_home');
        $this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function front_desk(){
	if($this->session_check()==true) {
		$Title['title']="Home | CC Phase1";    
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('organization-pages/staff_home');
        $this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function show_login() 
	{   $Data['title']="Login".PRODUCT_NAME;	
		$this->load->view('organization-pages/login',$Data);
		
    }
	
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && (($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR) ||($this->session->userdata('type')==FRONT_DESK))) {
		return true;
		} else {
		return false;
		}
	}
}
	?>