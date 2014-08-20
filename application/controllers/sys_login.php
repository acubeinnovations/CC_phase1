<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys_login extends CI_Controller {

	
	public function index()
	{		
		if( $this->session->userdata('isLoggedIn') ) {
        	redirect(base_url().'admin');
		} else if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			 $this->load->model('admin_model');
			 $username = $this->input->post('username');
		   	 $pass  = $this->input->post('password');

		     if( $username && $pass && $this->admin_model->AdminLogin($username,$pass)) {
		       
				 redirect(base_url().'admin');
		        
		    } else {
		        
		        $this->show_login(true);
		    }

		} else {

		 	$this->show_login(false);
		}
			
	}
		
	public function show_login( $show_error = false ) 
	{   $Data['error'] = $show_error;
       	$Data['title']="Login | CC Phase 1";	
		$this->load->view('admin-pages/login',$Data);
		
    }
	
	
}


