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
		$this->load->helper('url');
		if( $this->session->userdata('isLoggedIn') ) {
        	$this->load->view('home');
		} else if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			 $this->load->model('user_model');
			 $email = $this->input->post('username');
		   	 $pass  = $this->input->post('password');

		     if( $email && $pass && $this->user_model->validate_user($email,$pass)) {
		        
		        $this->load->view('home');
		    } else {
		        
		        $this->show_login(true);
		    }

		} else {

		 	$this->show_login('false');
		}
			
	}
		
	public function show_login( $show_error = false ) 
	{   $error = $show_error;
        $this->load->helper('form'); 
		$this->load->helper('html');
		$Title['title']="Home | ";	
		$this->load->view('admin-templates/header',$Title);
		$this->load->view('admin-templates/nav');
		$this->load->view('login');
		$this->load->view('admin-templates/footer');
    }
	function logout() 
	{
      $this->session->sess_destroy();
      $this->show_login('false');
    }
}

/* Location: ./application/controllers/welcome.php */
