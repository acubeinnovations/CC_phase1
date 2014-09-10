<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	/**
	 * Index Page for this controller.
	 
	 */
	public function index()
	{	$Title['title']="Home | Acube Innovations";	
		$this->load->view('home',$Title);
		
	}
}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
