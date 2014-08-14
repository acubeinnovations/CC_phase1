<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 */
	public function index($user = 'Accube Innovations')
	{	$this->load->helper('url');
		$Title['title']="Home | ".$user;	
		$this->load->view('templates/header',$Title);
		$this->load->view('templates/nav');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
