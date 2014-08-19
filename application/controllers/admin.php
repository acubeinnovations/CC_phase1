<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index(){
        
        $this->load->helper('form');
        $this->load->helper('html');
        $Title['title']="Home | CC Phase1";    
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('admin-pages/home');
        $this->load->view('admin-templates/footer');
	
    }
    public function organization($action){
    if ($action =='new'){
	if(isset($_REQUEST['name']) && isset($_REQUEST['addr'])&& isset($_REQUEST['submit'])){ 
		    $name = $this->input->post('name');
		    $addr  = $this->input->post('addr');
		    $this->load->model('admin_model');
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
    else if($action=='list'){
	$this->load->model('admin_model');
	$data=array('values'=>$this->admin_model->getOrg());
	//print_r($data);exit();
	$this->load->view('admin-pages\orgList',$data);	
	 
	}
    else
	{
	
	}
		}	
   

}
?>