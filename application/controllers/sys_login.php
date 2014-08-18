<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sys_login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function index()
	{		
		if( $this->session->userdata('isLoggedIn') ) {
        	$this->load->view('home');
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
	{   $Error['error'] = $show_error;
       	$Title['title']="Home | ";	
		$this->load->view('admin-templates/header',$Title);
		$this->load->view('admin-templates/nav');
		$this->load->view('admin-pages/login',$Error);
		$this->load->view('admin-templates/footer');
    }
	
	
}


