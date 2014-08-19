<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function index(){
        $Title['title'] = "";
        $this->load->helper('form');
        $this->load->helper('html');
        $Title['title']="Home | ";    
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('admin-pages/home');
        $this->load->view('admin-templates/footer');
    }
    public function new_organization(){
	echo "hi"; exit();
       $this->load->view('admin-templates\addOrg');
       if(isset($_REQUEST['name'])&& isset($_REQUEST['addr'])){
			echo "hi"; exit();
		    $name = $this->input->post('name');
		    $addr  = $this->input->post('addr');
	}
}
}
?>