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
				   $this->load->view('admin-pages/addOrg',$data);
				}
		        }
			else if(($this->session->userdata('isLoggedIn')==true )&&($this->session->userdata('type')==SYSTEM_ADMINISTRATOR)){
				$Title['title']="Add New Organization | CC Phase 1";  
				$this->load->view('admin-templates/header',$Title);
			  	$this->load->view('admin-templates/nav');
				$this->load->view('admin-pages/addOrg');
				$this->load->view('admin-templates/footer');
		} 
		}
    else if($action=='list'){
	$this->load->model('admin_model');
	$data=array('values'=>$this->admin_model->getOrg());
	//print_r($data);exit();
	$this->load->view('admin-pages/orgList',$data);	
	 
	}
    else
	{
	
	}
	}
	public function profile(){
	   $this->load->model('admin_model');
       if(isset($_REQUEST['admin-profile-update'])){
			$dbdata['username']  = $this->input->post('username');
		   	$dbdata['first_name'] = $this->input->post('firstname');
			$dbdata['last_name']  = $this->input->post('lastname');
		    $dbdata['email'] 	   = $this->input->post('email');
			$dbdata['phone'] 	   = $this->input->post('phone');
		    $dbdata['address']   = $this->input->post('address');
			$val    		   = $this->admin_model->updateProfile($dbdata);
			redirect(base_url().'admin');
		}else{
			$data['values']=$this->admin_model->getProfile();
			$Title['title']="Profile | CC Phase 1";  
			$this->load->view('admin-templates/header',$Title);
		  	$this->load->view('admin-templates/nav');
		    $this->load->view('admin-pages/profile',$data);
		    $this->load->view('admin-templates/footer');

		}
	}	
   

}
?>
