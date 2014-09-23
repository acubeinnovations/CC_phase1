<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('my_helper');
		no_cache();
	}

	public function index($param1 ='')
	{
		
	}
	
	//cnc organization create company in fa
	public function add_accounts($org_id = -1)
	{
		if($this->admin_session_check()==true) {
			$data['url'] = "facnc/admin/create_coy.php?NewCompany=".$org_id."&cnc_token=".$this->session->userdata('session_id');
			$page='fa-modules/module';
			$this->load_admin_templates($page,$data);
			
		}else{
				echo 'you are not authorized access this page..';
		}
	}

	public function organization(){

		if($this->org_session_check()==true) {
			$data['url'] = "facnc/gl/gl_bank.php?NewPayment=Yes&token=".$this->session->userdata('session_id');
		$data['url'] = "facnc/sync_cnc.php?NewBankPayment=Yes&cnc_token=".$this->session->userdata('session_id');
			$page='fa-modules/module';
			$this->load_admin_templates($page,$data);
		}
	  	else{
			echo 'you are not authorized access this page..';
		}
	}

	//admin templates
	public function load_admin_templates($page='',$data=''){
	
		if($this->admin_session_check()==true) {
		    	$this->load->view('admin-templates/header',$data);
			$this->load->view('admin-templates/nav');
			$this->load->view($page,$data);
			$this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}

	}

	//check system administrator logged in 
	public function admin_session_check() {
		if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')== SYSTEM_ADMINISTRATOR) ) {
			return true;
		} else {
			return false;
		}
	}
	
	//check organization administrator logged in 
	public function org_session_check() {
		if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')== ORGANISATION_ADMINISTRATOR) ) {
			return true;
		} else {
			return false;
		}
	}

}
?>
