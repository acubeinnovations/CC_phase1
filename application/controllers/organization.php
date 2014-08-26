<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Organization extends CI_Controller {
	 public function index($param1 ='',$param2='',$param3 ='',$param4='')
		{
		if($param1=='login' && $param2=='' && $param3==''){

			$this->checking_credentials();

		 }elseif($param1=='admin' && $param2=='' && $param3==''){
			$this->admin();
		 }elseif($param1=='front-desk' && $param2=='' && $param3==''){
			$this->front_desk_home();
		 }elseif($param1=='admin' && $param2=='profile' && $param3==''){
			$this->redirect_to_profile();
		 }elseif(($param1=='admin' || $param1=='front-desk' ) && $param2=='changepassword' && $param3==''){ 
			$this->changepassword();
		 } elseif($param1=='admin'  && $param2=='front-desk' && $param3== 'new'){
			$this->front_desk($param3);
		 }
		
		}

	
	public function checking_credentials() {
	if($this->session_check()==true) {
        	if($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR){
				 redirect(base_url().'organization/admin');
				 }
				 elseif($this->session->userdata('type')==FRONT_DESK){
				 redirect(base_url().'organization/front_desk');
				 }
		} else if(isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
			 $this->load->model('organization_model');
			 $username=$this->input->post('username');
			 $this->organization_model->LoginAttemptsChecks($username);
			 if( $this->session->userdata('isloginAttemptexceeded')==false){
			 $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[10]|xss_clean');
			 $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[10]|xss_clean');
			 } else {
			 $captcha = $this->input->post('captcha');
			 $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
			 $this->form_validation->set_rules('username','Username','trim|required|min_length[4]|max_length[10]|xss_clean');
			 $this->form_validation->set_rules('password','Password','trim|required|min_length[4]|max_length[10]|xss_clean');
			}
			 if($this->form_validation->run()!=False){
			 $username = $this->input->post('username');
		   	 $pass  = $this->input->post('password');

		     if( $username && $pass && $this->organization_model->OrganizationOrUserLogin($username,$pass)) {
				 if($this->session->userdata('loginAttemptcount') > 1){
		       	 $this->organization_model->clearLoginAttempts($username);
				 }
				 if($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR){
				 redirect(base_url().'organization/admin');
				 }elseif($this->session->userdata('type')==FRONT_DESK){
				 redirect(base_url().'organization/front_desk');
				 }
				 
		        
		    } else {
		        $this->organization_model->recordLoginAttempts($username);
		        $this->show_login();
		    }
			} else {

		 	$this->show_login();
			}
		} else {

		 	$this->show_login();
		}
	}
	public function admin(){
	
	if($this->session_check()==true) {
		$Title['title']="Home | ".PRODUCT_NAME;	
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('organization-pages/admin_home');
        $this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function front_desk_home(){
	if($this->session_check()==true) {
		$Title['title']="Home | ".PRODUCT_NAME;	
        $this->load->view('admin-templates/header',$Title);
        $this->load->view('admin-templates/nav');
        $this->load->view('organization-pages/staff_home');
        $this->load->view('admin-templates/footer');
		}else{
			echo 'you are not authorized access this page..';
		}
	}
	public function show_login() 
	{   $Data['title']="Login".PRODUCT_NAME;	
		$this->load->view('organization-pages/login',$Data);
		
    }
	public function redirect_to_profile() {
	$this->load->model('organization_model');
	if(isset($_REQUEST['org-profile-update'])){
			$data['name'] = str_replace(' ','',($this->input->post('name')));
			$data['uname'] = trim($this->input->post('uname'));
			$data['hname']  = trim($this->input->post('hname'));
		    $data['fname'] = $this->input->post('fname');
		    $data['lname'] = $this->input->post('lname');
		    $data['addr']  = $this->input->post('addr');
		    $data['mail']  = $this->input->post('mail');
		    $data['phn'] = $this->input->post('phn');
			$data['user_id'] = $this->input->post('user_id');
			$data['org_id'] = $this->input->post('org_id');
			
		if($data['name'] == $data['hname']){
			$this->form_validation->set_rules('name','Organization','trim|required|min_length[5]|max_length[20]|xss_clean');
		}else{
			$this->form_validation->set_rules('name','Organization','trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[organisations.name]');
		}
		$this->form_validation->set_rules('fname','First Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('addr','Address','trim|required|min_length[20]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('mail','Mail','trim|required|valid_email');
		$this->form_validation->set_rules('phn','Contact Info','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
		if($this->form_validation->run()!=False){
		
		$res    		   = $this->organization_model->update($data);
		if($res == true) { 
	   	    $this->session->set_userdata(array('dbSuccess'=>'Organization Profile Updated Succesfully..!'));
		    $this->session->set_userdata(array('dbError'=>''));
		    redirect(base_url().'organization/admin');
		}
		}
		else{
			 $this->profile($data);
			
		}
			
		}else{
		$result=$this->organization_model->getProfile();
		$org_res=$result['org_res'];
		$user_res=$result['user_res'];
		$data['org_id']=$org_res['id'];
		$data['name']=$org_res['name'];
		$data['hname']  = $org_res['name'];;
		$data['addr']=$org_res['address'];

		$data['user_id']=$user_res['id'];
		$data['uname']=$user_res['username'];
		$data['fname']=$user_res['first_name'];
		$data['lname']=$user_res['last_name'];
		$data['mail']=$user_res['email'];
		$data['phn']=$user_res['phone'];
		$data['status']=$user_res['user_status_id'];
		$this->profile($data);
	}
	
	}

	public function profile($data ='') {
		if($this->session_check()==true) {
		$Title['title']="Profile Update | ".PRODUCT_NAME;  
		$this->load->view('admin-templates/header',$Title);
	  	$this->load->view('admin-templates/nav');
	    $this->load->view('organization-pages/profile',$data);
	    $this->load->view('admin-templates/footer');
	}
	}

	public function changepassword() {
	if($this->session_check()==true) {
		$this->load->model('organization_model');
		$data['old_password'] = 	'';
		$data['password']	  = 	'';
		$data['cpassword']	  = 	'';
       if(isset($_REQUEST['password-update'])){
			$this->form_validation->set_rules('old_password','Current Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('password','New Password','trim|required|min_length[5]|max_length[20]|xss_clean');
			$this->form_validation->set_rules('cpassword','Confirm Password','trim|required|min_length[5]|max_length[20]|matches[password]|xss_clean');
			$data['old_password'] = trim($this->input->post('old_password'));
			$data['password'] = trim($this->input->post('password'));
			$data['cpassword'] = trim($this->input->post('cpassword'));
			if($this->form_validation->run() != False) {
				$dbdata['password']  	= md5($this->input->post('password'));
				$dbdata['old_password'] = md5(trim($this->input->post('old_password')));
				$val    			    = $this->organization_model->changePassword($dbdata);
				if($val == true) {
				if($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR){
				redirect(base_url().'organization/admin');
				}else if($this->session->userdata('type')==FRONT_DESK){
				redirect(base_url().'organization/front-desk');
				}			
					
				}else{
					$this->show_change_password($data);
				}
			} else {
				
					$this->show_change_password($data);
			}
			} else {
			
					$this->show_change_password($data);
			}
		}else{
			echo 'you are not authorized access this page..';
		}
		
	}
	

			public function show_change_password($data = '') {
					$Title['title']="Change Password | ".PRODUCT_NAME;  
					$this->load->view('admin-templates/header',$Title);
				  	$this->load->view('admin-templates/nav');
					$this->load->view('organization-pages/change-password',$data);
					$this->load->view('admin-templates/footer');

			}
	public function front_desk($action ='',$secondaction = '') {
		 if ($action =='new' && $secondaction == ''){
      
	if(isset($_REQUEST['name']) && isset($_REQUEST['addr'])&& isset($_REQUEST['uname'])&& isset($_REQUEST['pwd'])&& isset($_REQUEST['mail'])&& isset($_REQUEST['phn'])&& isset($_REQUEST['fname'])&& isset($_REQUEST['lname'])&&  isset($_REQUEST['submit'])){ 
		    $name = str_replace(' ','',($this->input->post('name')));
		    $fname = trim($this->input->post('fname'));
		    $lname = trim($this->input->post('lname'));
		    $addr  = $this->input->post('addr');
		    $uname  = trim($this->input->post('uname'));
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
        $data=array('title'=>'Add New Organization | '.PRODUCT_NAME,'name'=>$name,'fname'=>$fname,'lname'=>$lname,'uname'=>$uname,'pwd'=>$pwd,'addr'=>$addr,'mail'=>$mail,'phn'=>$phn,'cpwd'=>'');
	$this->showAddOrg($data);
	}
      else {
	$this->load->model('organization_model');
		   
		   //inserting values to db
		    $res=$this->organization_model->insertOrg($name,$fname,$lname,$addr,$uname,$pwd,$mail,$phn);
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
			else if(session_check()==true){
			$data=array('title'=>'Add New Organization |'.PRODUCT_NAME,'name'=>'','fname'=>'','lname'=>'','uname'=>'','pwd'=>'','addr'=>'','mail'=>'','phn'=>'','cpwd'=>'');
				$this->showAddUser($data);
		} 
		
		}
    else if($action=='list' && ($secondaction == ''|| is_numeric($secondaction))) {
	$this->load->model('organization_model');
	$data['status']=$this->organization_model->getStatus();
	$condition='';
	$per_page=5;
	$like_arry='';
	$where_arry='';
	//for search
    if((isset($_REQUEST['sname'])|| isset($_REQUEST['status']))&& isset($_REQUEST['search'])){
	$this->session->unset_userdata('condition');
	if($_REQUEST['sname']!=null&& $_REQUEST['status']!=-1){
	$like_arry=array('name'=> $_REQUEST['sname']);
	$where_arry=array('status_id'=>$_REQUEST['status']);
	}
	if($_REQUEST['sname']==null&& $_REQUEST['status']!=-1){
	$where_arry=array('status_id'=>$_REQUEST['status']);
	}
	if($_REQUEST['sname']!=null&& $_REQUEST['status']==-1){
	$like_arry=array('name'=> $_REQUEST['sname']);
	}
	$this->session->set_userdata(array('condition'=>array($like_arry,$where_arry)));
	}
	$tbl='organisations';
	
    $p_res=$this->mypage->paging($tbl,$per_page,$secondaction);
	$data['values']=$p_res['values'];
	$data['page_links']=$p_res['page_links'];
	$Title['title']='User List| '.PRODUCT_NAME;
	$this->load->view('admin-templates/header',$Title);
	$this->load->view('admin-templates/nav');
	$this->load->view('admin-pages/userList',$data);
	$this->load->view('admin-templates/footer');
	     
	}
    else
	{
	$this->load->model('organization_model');
	$result=$this->organization_model->checkOrg($action);
	if(!$result){
	echo "page not found";

	}
	else{
	$org_res=$result['org_res'];
	$user_res=$result['user_res'];
	
			// $org_result holds organization info && $user_res holds user info		
	if($secondaction != '' && $secondaction =='password-reset'){
		//if organization name  and password-reset comes what to do?
		$this->load->model('organization_model');
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
				$dbdata['password']  				= md5($this->input->post('password'));
				$dbdata['passwordnotencrypted']  	= $this->input->post('password');
				$dbdata['name']  					= $org_res['name'];
				$dbdata['username'] 				= $user_res['username'];
				$dbdata['email']  					= $user_res['email'];
				$dbdata['id'] 						= $user_res['id'];
				$val    			    			= $this->organization_model->resetOrganizationPasswordAdmin($dbdata);
				if($val == true) {
					//$this->sendEmailOnorganizationPaswordReset($dbdata);			
					redirect(base_url().'admin/organization/list');
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
		
		$data['title']='Profile Update |'.PRODUCT_NAME;
		if(isset($_REQUEST['admin-user-profile-update'])){
			$data['name'] = str_replace(' ','',($this->input->post('name')));
			$data['uname'] = trim($this->input->post('uname'));
			$data['hname']  = trim($this->input->post('hname'));
		    $data['fname'] = $this->input->post('fname');
		    $data['lname'] = $this->input->post('lname');
		    $data['addr']  = $this->input->post('addr');
		    $data['mail']  = $this->input->post('mail');
		    $data['phn'] = $this->input->post('phn');
			$data['user_id'] = $this->input->post('user_id');
			$data['org_id'] = $this->input->post('org_id');
			$data['status'] = $this->input->post('status');
		if($data['name'] == $data['hname']){
			$this->form_validation->set_rules('name','Organization','trim|required|min_length[5]|max_length[20]|xss_clean');
		}else{
			$this->form_validation->set_rules('name','Organization','trim|required|min_length[5]|max_length[20]|xss_clean|is_unique[organisations.name]');
		}
		$this->form_validation->set_rules('fname','First Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('lname','Last Name','trim|required|min_length[4]|max_length[10]|xss_clean');
		$this->form_validation->set_rules('addr','Address','trim|required|min_length[20]|max_length[40]|xss_clean');
		$this->form_validation->set_rules('mail','Mail','trim|required|valid_email');
		$this->form_validation->set_rules('phn','Contact Info','trim|required|regex_match[/^[0-9]{10}$/]|numeric|xss_clean');
		if($this->form_validation->run()!=False){

		$res    		   = $this->organization_model->updateOrganization($data);
		if($res == true) { 
	   	    $this->session->set_userdata(array('dbSuccess'=>'Organization Profile Updated Succesfully..!'));
		    $this->session->set_userdata(array('dbError'=>''));
		    redirect(base_url().'admin/organization/list');
		}
		}else{
		$this->showAddOrg($data);

		}
		} else {
		$status=$this->organization_model->getStatus();
		$data['org_id']=$org_res['id'];
		$data['name']=$org_res['name'];
		$data['hname']  = $org_res['name'];;
		$data['addr']=$org_res['address'];

		$data['user_id']=$user_res['id'];
		$data['uname']=$user_res['username'];
		$data['fname']=$user_res['first_name'];
		$data['lname']=$user_res['last_name'];
		$data['mail']=$user_res['email'];
		$data['phn']=$user_res['phone'];
		$data['status']=$user_res['user_status_id'];
		$this->showAddOrg($data);
		}
		
		}
		}
		}
		}
	
			  
	public function session_check() {
	if(($this->session->userdata('isLoggedIn')==true ) && (($this->session->userdata('type')==ORGANISATION_ADMINISTRATOR) ||($this->session->userdata('type')==FRONT_DESK))) {
		return true;
		} else {
		return false;
		}
	}
}
	?>
