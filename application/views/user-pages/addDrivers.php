 <?php
 if(($this->session->userdata('org_id')!=null)&&($this->session->userdata('user_id')!=null)){
    $name=$result[0]['name'];
	$place_of_birth=$result[0]['place_of_birth'];
	$dob=$result[0]['dob'];
	$blood_group=$result[0]['blood_group'];
	$marital_status_id=$result[0]['marital_status_id'];
	$children=$result[0]['children'];
	$present_address=$result[0]['present_address'];
	$permanent_address=$result[0]['permanent_address'];
	$district=$result[0]['district'];
	$state=$result[0]['state'];
	$pin_code=$result[0]['pin_code'];
	$phone=$result[0]['phone'];
	$mobile=$result[0]['mobile'];
	$email=$result[0]['email'];
	$date_of_joining=$result[0]['date_of_joining'];
	$badge=$result[0]['badge'];
	$license_number=$result[0]['license_number'];
	$license_renewal_date=$result[0]['license_renewal_date'];
	$badge_renewal_date=$result[0]['badge_renewal_date'];
	$mother_tongue=$result[0]['mother_tongue'];
	$pan_number=$result[0]['pan_number'];
	$bank_account_number=$result[0]['bank_account_number'];
	$name_on_bank_pass_book=$result[0]['name_on_bank_pass_book'];
	$bank_name=$result[0]['bank_name'];
	$branch=$result[0]['branch'];
	$bank_account_type_id=$result[0]['bank_account_type_id'];
	$ifsc_code=$result[0]['ifsc_code'];
	$id_proof_type_id=$result[0]['id_proof_type_id'];
	$id_proof_document_number=$result[0]['id_proof_document_number'];
	$name_on_id_proof=$result[0]['name_on_id_proof'];
$this->session->set_userdata('org_id','');
$this->session->set_userdata('user_id','');
 }elseif($this->session->userdata('post')==null){
	$name='';
	$place_of_birth='';
	$dob='';
	$blood_group='';
	$marital_status_id='';
	$children='';
	$present_address='';
	$permanent_address='';
	$district='';
	$state='';
	$pin_code='';
	$phone='';
	$mobile='';
	$email='';
	$date_of_joining='';
	$badge='';
	$license_number='';
	$license_renewal_date='';
	$badge_renewal_date='';
	$mother_tongue='';
	$pan_number='';
	$bank_account_number='';
	$name_on_bank_pass_book='';
	$bank_name='';
	$branch='';
	$bank_account_type_id='';
	$ifsc_code='';
	$id_proof_type_id='';
	$id_proof_document_number='';
	$name_on_id_proof='';
	

}
else
{
$data=$this->session->userdata('post');
	$name=$data['name'];
	$place_of_birth=$data['place_of_birth'];
	$dob=$data['dob'];
	$blood_group=$data['blood_group'];
	$marital_status_id=$data['marital_status_id'];
	$children=$data['children'];
	$present_address=$data['present_address'];
	$permanent_address=$data['permanent_address'];
	$district=$data['district'];
	$state=$data['state'];
	$pin_code=$data['pin_code'];
	$phone=$data['phone'];
	$mobile=$data['mobile'];
	$email=$data['email'];
	$date_of_joining=$data['date_of_joining'];
	$badge=$data['badge'];
	$license_number=$data['license_number'];
	$license_renewal_date=$data['license_renewal_date'];
	$badge_renewal_date=$data['badge_renewal_date'];
	$mother_tongue=$data['mother_tongue'];
	$pan_number=$data['pan_number'];
	$bank_account_number=$data['bank_account_number'];
	$name_on_bank_pass_book=$data['name_on_bank_pass_book'];
	$bank_name=$data['bank_name'];
	$branch=$data['branch'];
	$bank_account_type_id=$data['bank_account_type_id'];
	$ifsc_code=$data['ifsc_code'];
	$id_proof_type_id=$data['id_proof_type_id'];
	$id_proof_document_number=$data['id_proof_document_number'];
	$name_on_id_proof=$data['name_on_id_proof'];
$this->session->set_userdata('post','');
}

if($this->session->userdata('marital_status_id') != ''||$this->session->userdata('bank_account_type_id') != ''||$this->session->userdata('id_proof_type_id') != ''||$this->session->userdata('Err_sal') != ''||$this->session->userdata('Err_blood_group') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->session->userdata('marital_status_id').br();
													echo $this->session->userdata('bank_account_type_id').br();
													echo $this->session->userdata('id_proof_type_id').br();
													echo $this->session->userdata('Err_sal').br();
													echo $this->session->userdata('Err_blood_group').br();
										
														$this->session->set_userdata(array('marital_status_id'=>''));
														$this->session->set_userdata(array('bank_account_type_id'=>''));
														$this->session->set_userdata(array('id_proof_type_id'=>''));
														$this->session->set_userdata(array('Err_sal'=>''));
														$this->session->set_userdata(array('Err_blood_group'=>''));
														
										?>
                                    </div>
<?php  }  if($this->session->userdata('dbSuccess') != '') { ?>
        <div class="success-message">
			
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php 
                echo $this->session->userdata('dbSuccess');
                $this->session->set_userdata(array('dbSuccess'=>''));
                ?>
           </div>
       </div>
       <?php    } ?>
		<div class="page-outer">
	   <fieldset class="body-border">
		<legend class="body-head">Manage Drivers</legend>
		
<div class="width-30-percent-with-margin-left-20-Driver-View">

<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Personal Details</legend>

		<?php  echo form_open(base_url()."driver/driver_manage");?>
        <div class="form-group">
		<?php echo form_label('Enter Name','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'name','class'=>'form-control','id'=>'name','placeholder'=>'Enter Name','value'=>$name)); ?>
	   <?php echo $this->form_functions->form_error_session('name', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Enter Place Of Birth','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'place_of_birth','class'=>'form-control','id'=>'place_of_birth','placeholder'=>'Enter Place Of Birth','value'=>$place_of_birth)); ?>
	   <?php echo $this->form_functions->form_error_session('place_of_birth', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'dob','class'=>'fromdatepicker form-control' ,'placeholder'=>'Date','value'=>$dob));?>
	   <?php echo $this->form_functions->form_error_session('dob', '<p class="text-red">', '</p>'); ?>
        </div>
        <div class="form-group">
		<?php echo form_label('Blood Group','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'blood_group','class'=>'form-control','id'=>'blood_group','placeholder'=>'Blood Group','value'=>$blood_group)); ?>
	   <?php echo $this->form_functions->form_error_session('blood_group', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label(' Marital Status','usernamelabel'); ?>
	<?php
		$class="form-control";
		$msg="Select Marital Status";
		$name="marital_status_id";
	if(($this->session->userdata('org_id')!=null)&&($this->session->userdata('user_id')!=null)){
	$marital_status_id=$result[0]['marital_status_id'];
	echo $marital_status_id;exit;
	echo $this->form_functions->populate_dropdown($name,$select['marital_statuses'],$marital_status_id,$class,$id='',$msg);
}	else{
  echo $this->form_functions->populate_dropdown($name,$select['marital_statuses'],$marital_status_id='',$class,$id='',$msg);
}
	
	
	?></div>
	<div class="form-group">
	<?php echo form_label('Children','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'children','class'=>'form-control','id'=>'children','placeholder'=>'Children','value'=>$children)); ?>
	   <?php echo $this->form_functions->form_error_session('children', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Present Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'present_address','class'=>'form-control','id'=>'present_address','placeholder'=>'Present Address','value'=>$present_address,'rows'=>7)); ?>
	   <?php echo $this->form_functions->form_error_session('present_address', '<p class="text-red">', '</p>'); ?>
        </div>
	
	<div class="form-group">
	<?php echo form_label('Permanent Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'permanent_address','class'=>'form-control','id'=>'permanent_address','placeholder'=>'Permanent Address','value'=>$permanent_address,'rows'=>7)); ?>
	   <?php echo $this->form_functions->form_error_session('permanent_address', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('District','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'district','class'=>'form-control','id'=>'district','placeholder'=>'District','value'=>$district)); ?>
	   <?php echo $this->form_functions->form_error_session('district', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('State','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'state','class'=>'form-control','id'=>'state','placeholder'=>'State','value'=>$state)); ?>
	   <?php echo $this->form_functions->form_error_session('state', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Pin Code','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'pin_code','class'=>'form-control','id'=>'pin_code','placeholder'=>'Pin Code','value'=>$pin_code)); ?>
	   <?php echo $this->form_functions->form_error_session('pin_code', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label('Phone','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'phone','class'=>'form-control','id'=>'phone','placeholder'=>'Phone','value'=>$phone)); ?>
	   <?php echo $this->form_functions->form_error_session('phone', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Mobile','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mobile','class'=>'form-control','id'=>'mobile','placeholder'=>'Mobile','value'=>$mobile)); ?>
	   <?php echo $this->form_functions->form_error_session('mobile', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('E-mail ID','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'email','class'=>'form-control','id'=>'email','placeholder'=>'E-mail ID','value'=>$email)); ?>
	   <?php echo $this->form_functions->form_error_session('email', '<p class="text-red">', '</p>'); ?>
        </div>
		</fieldset> </div>
<div class="width-30-percent-with-margin-left-20-Driver-View">
<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Other Details</legend>

	<div class="form-group">
	<?php echo form_label('Date of Joining','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'date_of_joining','class'=>'fromdatepicker form-control' ,'placeholder'=>' Date of Joining','value'=>$date_of_joining));?>
	   <?php echo $this->form_functions->form_error_session('date_of_joining', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label('License Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'license_number','class'=>'form-control','id'=>'license_number','placeholder'=>'License Number','value'=>$license_number)); ?>
	   <?php echo $this->form_functions->form_error_session('license_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Date of Renewal','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'license_renewal_date','class'=>'fromdatepicker form-control' ,'placeholder'=>' Date of Renewal','value'=>$license_renewal_date));?>
	   <?php echo $this->form_functions->form_error_session('license_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Badge','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'badge','class'=>'form-control','id'=>'badge','placeholder'=>'Badge','value'=>$badge)); ?>
	   <?php echo $this->form_functions->form_error_session('badge', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Date of Badge Renewal','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'badge_renewal_date','class'=>'fromdatepicker form-control' ,'placeholder'=>'Date of Badge Renewal','value'=>$badge_renewal_date));?>
	   <?php echo $this->form_functions->form_error_session('badge_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Mother Tongue','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mother_tongue','class'=>'form-control','id'=>'mother_tongue','placeholder'=>'Mother Tongue','value'=>$mother_tongue)); ?>
	   <?php echo $this->form_functions->form_error_session('mother_tongue', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Pan Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'pan_number','class'=>'form-control','id'=>'pan_number','placeholder'=>'Pan Number','value'=>$pan_number)); ?>
	   <?php echo $this->form_functions->form_error_session('pan_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Bank Account Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'bank_account_number','class'=>'form-control','id'=>'bank_account number','placeholder'=>'Bank Account Number','value'=>$bank_account_number)); ?>
	   <?php echo $this->form_functions->form_error_session('bank_account_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Name on Bank PassBook','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'name_on_bank_pass_book','class'=>'form-control','id'=>'name_on_bank_pass_book','placeholder'=>'Name on Bank PassBook','value'=>$name_on_bank_pass_book)); ?>
	   <?php echo $this->form_functions->form_error_session('name_on_bank_pass_book', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Bank Name','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'bank_name','class'=>'form-control','id'=>'bank_name','placeholder'=>'Bank Name','value'=>$bank_name)); ?>
	   <?php echo $this->form_functions->form_error_session('bank_name', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Branch','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'branch','class'=>'form-control','id'=>'branch','placeholder'=>'Branch','value'=>$branch)); ?>
	   <?php echo $this->form_functions->form_error_session('branch', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Bank Account','usernamelabel'); ?>
	<?php
		$class="form-control";
		$msg="Select Bank Account";
		$name="bank_account_type_id";
		
	echo $this->form_functions->populate_dropdown($name,$select['bank_account_types'],$bank_account_type_id='',$class,$id='',$msg); 
	?></div>
	<div class="form-group">
	<?php echo form_label('IFSC Code','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'ifsc_code','class'=>'form-control','id'=>'ifsc_code','placeholder'=>'IFSC Code','value'=>$ifsc_code)); ?>
	   <?php echo $this->form_functions->form_error_session('ifsc_code', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('ID Proof Type','usernamelabel'); ?>
	<?php
		$class="form-control";
		$msg="Select ID Proof Type";
		$name="id_proof_type_id";
		
	echo $this->form_functions->populate_dropdown($name,$select['id_proof_types'],$id_proof_type_id='',$class,$id='',$msg); 
	?></div>
	<div class="form-group">
	<?php echo form_label('ID Proof Document Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'id_proof_document_number','class'=>'form-control','id'=>'id_proof_document_number','placeholder'=>'ID Proof Document Number','value'=>$id_proof_document_number)); ?>
	   <?php echo $this->form_functions->form_error_session('id_proof_document_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Name on ID Proof','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'name_on_id_proof','class'=>'form-control','id'=>'name_on_id_proof','placeholder'=>'Name on ID Proof','value'=>$name_on_id_proof)); ?>
	   <?php echo $this->form_functions->form_error_session('name_on_id_proof', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Salary','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'salary','class'=>'form-control','id'=>'ifsc_code','placeholder'=>'Salary','value'=>'2500','readonly'=>'readonly')); ?>
	   <?php echo $this->form_functions->form_error_session('salary', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Minimum Working Days','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'minimum_working_days','class'=>'form-control','id'=>'minimum_working_days','placeholder'=>'Minimum Working Days','value'=>' 25','readonly'=>'readonly')); ?>
	   <?php echo $this->form_functions->form_error_session('minimum_working_days', '<p class="text-red">', '</p>'); ?>
        </div>
   		<div class="box-footer">
		<?php // echo validation_errors();?>
		<?php //if(!isset($org_id) && !isset($user_id)) {
		echo form_submit("driver-submit","Save","class='btn btn-primary'");
		 //}else {
		
		// echo form_submit("driver-detail-update","Update","class='btn btn-primary'");}  ?>  
        </div>
	 <?php echo form_close(); ?>
	</fieldset>


</div>
</fieldset>
</div>