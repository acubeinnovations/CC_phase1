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
	$this->load->model('admin_model');
    }
    public function new_organization(){
    if(isset($_REQUEST['name']) && isset($_REQUEST['addr'])&& isset($_REQUEST['submit'])){ 
		    $name = $this->input->post('name');
		    $addr  = $this->input->post('addr');
		    $res=$this->admin_model->insertOrg($name,$addr);
		       if($res){
				   $data['msg']='Saved'; 
				   $this->load->view('admin-pages\addOrg',$data);
				}
		        }
			else if(($this->session->userdata('isLoggedIn')==true )&&($this->session->userdata('type')==SYSTEM_ADMINISTRATOR)){
				$this->load->view('admin-pages\addOrg');
		} 
		
		
	 
	 
	}

}
?>