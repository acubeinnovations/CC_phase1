<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 */
	public function index()
	{	$Title['title']="Home | Acube Innovations";	
		$this->load->view('templates/header',$Title);
		$this->load->view('templates/nav');
		$this->load->view('home');
		$this->load->view('templates/footer');
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
