<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	//newly added nijo
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && ($this->session->userdata('type')==SYSTEM_ADMINISTRATOR)) {
		return true;
	} else {
		return false;
	}

	}    
	public function index(){
        if($this->session_check()==true) {//newly added nijo
		$Title['title']="Home | CC Phase1";    
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('admin-pages/home');
        $this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}
	
    }
	
    public function organization($action = '', $secondaction = ''){
    if ($action =='new' && $secondaction == ''){
      
	if(isset($_REQUEST['name']) && isset($_REQUEST['addr'])&& isset($_REQUEST['uname'])&& isset($_REQUEST['pwd'])&& isset($_REQUEST['mail'])&& isset($_REQUEST['phn'])&& isset($_REQUEST['fname'])&& isset($_REQUEST['lname'])&&  isset($_REQUEST['submit'])){ 
		    $name = $this->input->post('name');
		    $fname = $this->input->post('fname');
		    $lname = $this->input->post('lname');
		    $addr  = $this->input->post('addr');
		    $uname  = $this->input->post('uname');
		    $pwd  = $this->input->post('pwd');
		    $mail  = $this->input->post('mail');
		    $phn = $this->input->post('phn');
	        $this->form_validation->set_rules('name','Organization','trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[organisations.name]');
		$this->form_validation->set_rules('fname','First Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('addr','Address','trim|required|min_length[20]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('uname','Username','trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[users.username]');
		$this->form_validation->set_rules('pwd','Password','trim|required|min_length[4]|max_length[12]|matches[cpwd]|xss_clean');
		$this->form_validation->set_rules('cpwd','Confirmation','trim|required|min_length[4]|max_length[12]|xss_clean');
		$this->form_validation->set_rules('mail','Mail','trim|required|valid_email');
		$this->form_validation->set_rules('phn','Contact Info','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
		
      if($this->form_validation->run()==False){
        $data=array('name'=>$name,'fname'=>$fname,'lname'=>$lname,'uname'=>$uname,'pwd'=>$pwd,'addr'=>$addr,'mail'=>$mail,'phn'=>$phn,'cpwd'=>'');
	$this->showAddOrg($data);
	}
      else {
	$this->load->model('admin_model');
		   
		   //inserting values to db
		    $res=$this->admin_model->insertOrg($name,$fname,$lname,$addr,$uname,$pwd,$mail,$phn);
		       if($res==true){ 
			    //sending email to admin
				// $data=array('name'=>$name,'fname'=>$fname,'lname'=>$lname,'uname'=>$uname,'pwd'=>$pwd,'addr'=>$addr,'mail'=>$mail,'phn'=>$phn);
				 // $rs=$this->sendEmail($data);
				 // if($rs==true){
				    $this->session->set_userdata(array('dbSuccess'=>'Organization Added Succesfully..!'));
				    $this->session->set_userdata(array('dbError'=>''));
				    redirect(base_url().'admin/organization/list');
		
				  //}
				}
	}
		}
			else if(($this->session->userdata('isLoggedIn')==true )&&($this->session->userdata('type')==SYSTEM_ADMINISTRATOR)){
				$data=array('name'=>'','fname'=>'','lname'=>'','uname'=>'','pwd'=>'','addr'=>'','mail'=>'','phn'=>'','cpwd'=>'');
				$this->showAddOrg($data);
		} 
		
		}
    else if($action=='list' && $secondaction == '') {
	$this->load->model('admin_model');
	$data=array('values'=>$this->admin_model->getOrg());
	//print_r($data);exit();
	$Title['title']='Organization List| CC Phase1';
	$this->load->view('admin-templates/header',$Title);
	$this->load->view('admin-templates/nav');
	$this->load->view('admin-pages/orgList',$data);
	$this->load->view('admin-templates/footer');
	 
	}
    else
	{
	$this->load->model('admin_model');
	$result=$this->admin_model->checkOrg($action);
	$org_res=$result['org_res'];
	$user_res=$result['user_res'];
			// $org_result holds organization info && $user_res holds user info
	if($secondaction != '' && $secondaction =='password-reset'){
		//if organization name  and password-reset comes what to do?
		$this->load->model('admin_model');
	   	$data['title']		  =		"Reset Password | CC Phase 1"; 
		$data['password']	  = 	'';
		$data['cpassword'] 	  = 	'';
		$data['orgname']	  =		$action;
       if(isset($_REQUEST['admin-org-password-reset'])){
			$this->form_validation->set_rules('password','New Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|min_length[5]|max_length[20]|matches[password]|xss_clean');
			$data['password'] = trim($this->input->post('password'));
			$data['cpassword'] = trim($this->input->post('cpassword'));
			if($this->form_validation->run() != False) {
				$dbdata['password']  	= md5($this->input->post('password'));
				$dbdata['id'] 			= '';
				$val    			    = $this->admin_model->resetOrganizationPasswordAdmin($dbdata);
				if($val == true) {				
					redirect(base_url().'admin');
				}else{
					$this->show_org_reset_password($data);
				}
			} else {
				
					$this->show_org_reset_password($data);
			}
		} else {
			
					$this->show_org_reset_password($data);
		}
	}else{
		//if organization name comes what to do?
		$status=$this->admin_model->getStatus();
		print_r( $status);exit();
		
	}
	}
	}
	public function show_org_reset_password($data) {
				$this->load->view('admin-templates/header',$data);
			  	$this->load->view('admin-templates/nav');
				$this->load->view('admin-pages/password-reset',$data);
				$this->load->view('admin-templates/footer');
	}
	public function profile(){
	   $this->load->model('admin_model');
	   $dbdata = '';
       if(isset($_REQUEST['admin-profile-update'])){
			$this->form_validation->set_rules('username','Username','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('firstname','First Name','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('lastname','Last Name','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('email','Email','trim|required|min_length[5]|max_length[50]|valid_email|xss_clean');
			$this->form_validation->set_rules('phone','Phone','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('address','Address','trim|required|min_length[5]|max_length[50]|xss_clean');
			$dbdata['username']  = $this->input->post('username');
		   	$dbdata['first_name'] = $this->input->post('firstname');
			$dbdata['last_name']  = $this->input->post('lastname');
		    $dbdata['email'] 	   = $this->input->post('email');
			$dbdata['phone'] 	   = $this->input->post('phone');
		    $dbdata['address']   = $this->input->post('address');
			if($this->form_validation->run() != False) {
				$val    		   = $this->admin_model->updateProfile($dbdata);
				redirect(base_url().'admin');
			}else{
				$this->show_profile($dbdata);
			}
		}else{
			
			$this->show_profile($dbdata);

		}
	}
	public function show_profile($data) {
			if($data == ''){
			$data['values']=$this->admin_model->getProfile();
			}else{
			$data['postvalues']=$data;
			}
			$Title['title']="Profile | CC Phase 1";  
			$this->load->view('admin-templates/header',$Title);
		  	$this->load->view('admin-templates/nav');
		    $this->load->view('admin-pages/profile',$data);
		    $this->load->view('admin-templates/footer');
	}
	public function changePassword() {
	   $this->load->model('admin_model');
	   	$data['title']		  =		"Change Password | CC Phase 1"; 
		$data['old_password'] = 	'';
		$data['password']	  = 	'';
		$data['cpassword'] 	  = 	'';
       if(isset($_REQUEST['admin-password-update'])){
			$this->form_validation->set_rules('old_password','Current Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password','New Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|min_length[5]|max_length[20]|matches[password]|xss_clean');
			$data['old_password'] = trim($this->input->post('old_password'));
			$data['password'] = trim($this->input->post('password'));
			$data['cpassword'] = trim($this->input->post('cpassword'));
			if($this->form_validation->run() != False) {
				$dbdata['password']  	= md5($this->input->post('password'));
				$dbdata['old_password'] = md5(trim($this->input->post('old_password')));
				$val    			    = $this->admin_model->changePassword($dbdata);
				if($val == true) {				
					redirect(base_url().'admin');
				}else{
					$this->show_change_password($data);
				}
			} else {
				
					$this->show_change_password($data);
			}
		} else {
			
					$this->show_change_password($data);
		}
	}	
   
	public function show_change_password($data) {
				$this->load->view('admin-templates/header',$data);
			  	$this->load->view('admin-templates/nav');
				$this->load->view('admin-pages/change-password',$data);
				$this->load->view('admin-templates/footer');
	}

	public function showAddOrg($data){
		$Title['title']="Add New Organization | CC Phase 1";  
		$this->load->view('admin-templates/header',$Title);
		$this->load->view('admin-templates/nav');
		$this->load->view('admin-pages/addOrg',$data);
		$this->load->view('admin-templates/footer');
	
	}
	
	public function sendEmail($data){
	
	 $config = Array(
  'protocol' => 'smtp',
  'smtp_host' => 'ssl://smtp.googlemail.com',
  'smtp_port' => 465,
  'smtp_user' => 'xxx@gmail.com', // change it to yours
  'smtp_pass' => 'xxx', // change it to yours
  'mailtype' => 'html',
  'charset' => 'iso-8859-1',
  'wordwrap' => TRUE
);
		$this->email->from(SYSTEM_EMAIL, 'Acube Innovations');
		$this->email->to($data['mail']);
		//$this->email->cc('another@another-example.com');
		//$this->email->bcc('them@their-example.com');
		$this->email->subject('Succes Message');
		$this->email->message('You have succesfully added a new organisation'.$data['name'].'!!</br> Following are your User Credentials.</br> Username:'.$data['uname'].'</br> Password:'.$data['pwd'].'Thanks & Regards</br> Acube Innovations');
		if($this->email->send())
			{
			echo 'Email sent.';
			return true;
			}
		else
			{
			show_error($this->email->print_debugger());
			}
	}

}
?>
