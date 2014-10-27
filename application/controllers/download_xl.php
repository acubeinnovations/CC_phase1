<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Download_xl extends CI_Controller {

	public function __construct()
{
    parent::__construct();
    $this->load->helper('my_helper');
    no_cache();

}
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==FRONT_DESK)) {
		return true;
	} else {
		return false;
	}

	}    
	public function index(){
		$param1=$this->uri->segment(4);
        if($this->session_check()==true) {
		
			if($param1=='driver'){

				$this->driverXL();

			}else if($param1=='vehicle'){
			
				$this->vehicleXL();

			}else if($param1=='trips'){

				$this->tripsXL();

			}else{

				$this->notFound();
			}
		}else{
			
			$this->notAuthorized();
		}
	
    }
	
    public function driverXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');
	

	}
	public function vehicleXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');

	}
	public function tripsXL(){
		//echo $this->input->get('name');
		//echo $this->input->get('age');
	
	}
	
	public function load_templates($page='',$data=''){
	if($this->session_check()==true) {
    $this->load->view('admin-templates/header',$data);
    $this->load->view('admin-templates/nav');
    $this->load->view($page,$data);
    $this->load->view('admin-templates/footer');
	}
	else{
			$this->notAuthorized();
		}

    }  
	public function notAuthorized(){
	$data['title']='Not Authorized | '.PRODUCT_NAME;
	$page='not_authorized';
	$this->load->view('admin-templates/header',$data);
	$this->load->view('admin-templates/nav');
	$this->load->view($page,$data);
	$this->load->view('admin-templates/footer');
	
	}
	public function notFound(){
		if($this->session_check()==true) {
		 $this->output->set_status_header('404'); 
		 $data['title']="Not Found";
      	 $page='not_found';
         $this->load_templates($page,$data);
		}else{
			$this->notAuthorized();
	}
	}

}
