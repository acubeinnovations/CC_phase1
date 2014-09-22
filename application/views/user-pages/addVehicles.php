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
		<legend class="body-head">Manage Vehicles</legend>
		
<div class="width-30-percent-with-margin-left-20-Driver-View">

<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Vehicle Details</legend>

		<?php  echo form_open(base_url()."vehicle/");?>
        
	
		<div class="form-group">
		<?php echo form_label('Vehicle Insurance ID','usernamelabel'); ?>
	<?php
		echo form_input(array('name'=>'insurance','class'=>'form-control','id'=>'insurance','value'=>$children));
		echo $this->form_functions->form_error_session('insurance', '<p class="text-red">', '</p>');
	
	?></div>
	<div class="form-group">
	<?php echo form_label('Vehicle Loan ID','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan','class'=>'form-control','id'=>'loan','value'=>$children)); ?>
	   <?php echo $this->form_functions->form_error_session('loan', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Vehicle Owner ID','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'owner','class'=>'form-control','id'=>'owner','value'=>$children)); ?>
	   <?php echo $this->form_functions->form_error_session('owner', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Vehicle Ownership Type','usernamelabel'); ?>
     <?php
	 $class="form-control";
		$msg="Select Ownership Type";
		$name="ownership";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ownership_types'],$vehicle_ownership='',$class,$id='',$msg);?>
	   <?php echo $this->form_functions->form_error_session('ownership', '<p class="text-red">', '</p>'); ?>
        </div>
	
	<div class="form-group">
	<?php echo form_label('Vehicle Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Vehicle type";
		$name="vehicle type";
		
	//if(($this->session->userdata('org_id')!=null)&&($this->session->userdata('user_id')!=null)){
	//$marital_status_id=$result[0]['marital_status_id'];
	//echo $marital_status_id;exit;
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_types'],$vehicle_type_id='',$class,$id='',$msg);
//}	else{
  //echo $this->form_functions->populate_dropdown($name,$select['marital_statuses'],$marital_status_id='',$class,$id='',$msg);
//} ?>
	   <?php echo $this->form_functions->form_error_session('permanent_address', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Vehicle Make','usernamelabel'); 
	 $class="form-control";
		$msg="Select Vehicle Make";
		$name="make";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_makes'],$vehicle_make_id='',$class,$id='',$msg);?>
	   <?php echo $this->form_functions->form_error_session('make', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label(' Manufacturing Year','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'year','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining));?>
	   <?php echo $this->form_functions->form_error_session('year', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Ac Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select AC Type";
		$name="ac";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ac_types'],$vehicle_ac='',$class,$id='',$msg); ?>
	   <?php echo $this->form_functions->form_error_session('ac', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label(' Fuel Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Fuel Type";
		$name="fuel";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_fuel_types'],$vehicle_fuel='',$class,$id='',$msg);  ?>
	   <?php echo $this->form_functions->form_error_session('fuel', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label(' Seating Capacity','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Seating Capacity";
		$name="seat";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_seating_capacity'],$vehicle_seat='',$class,$id='',$msg);  ?>
	   <?php echo $this->form_functions->form_error_session('seat_capacity', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Permit Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Permit Type";
		$name="permit";
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_permit_types'],$vehicle_permit='',$class,$id='',$msg); ?>
	   <?php echo $this->form_functions->form_error_session('permit', '<p class="text-red">', '</p>'); ?>
        </div>
		</fieldset> </div>
<div class="width-30-percent-with-margin-left-20-Driver-View">
<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Other Details</legend>
	<div class="form-group">
		<?php echo form_label('Registration Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'reg_number','class'=>'form-control','id'=>'reg_number','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('reg_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Registration Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'reg_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining));?>
	   <?php echo $this->form_functions->form_error_session('reg_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Engine Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'eng_num','class'=>'form-control','value'=>$dob));?>
	   <?php echo $this->form_functions->form_error_session('eng_num', '<p class="text-red">', '</p>'); ?>
        </div>
        <div class="form-group">
		<?php echo form_label('Chases Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'chases_num','class'=>'form-control','id'=>'chases_num','value'=>$blood_group)); ?>
	   <?php echo $this->form_functions->form_error_session('chases_num', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Select Driver','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Driver";
		$name="driver";
	echo $this->form_functions->populate_dropdown($name,$select['drivers'],$driver='',$class,$id='',$msg);  ?>
	   <?php echo $this->form_functions->form_error_session('driver', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('From Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'from_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining));?>
	   <?php echo $this->form_functions->form_error_session('from_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Permit Renewal Date','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'permit_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining));?>
	   <?php echo $this->form_functions->form_error_session('permit_renewal', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label('Permit Renewal Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'permit_amount','class'=>'form-control','id'=>'license_number','value'=>$license_number)); ?>
	   <?php echo $this->form_functions->form_error_session('permit_amount', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Tax Renewal Amount ','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'tax_amount','class'=>'form-control','id'=>'tax_amount','value'=>$license_number));?>
	   <?php echo $this->form_functions->form_error_session('tax_amount', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Tax Renewal Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'tax_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining)); ?>
	   <?php echo $this->form_functions->form_error_session('tax_date', '<p class="text-red">', '</p>'); ?>
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