<?php
 if(($this->mysession->get('org_id')!=null)&&($this->mysession->get('user_id')!=null)){
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
 }elseif($this->mysession->get('post')==null){
           $ownership ="";
			$vehicle_type="";
			$make="";
			$year="";
			$ac="";
			$fuel="";
			$seat="";
			$driver="";
			$from_date="";
			$reg_number="";
			$reg_date="";
			$eng_num="";
			$chases_num="";
			$permit="";
			$permit_date="";
			$permit_amount="";
			$tax_amount="";
			$tax_date="";
	

}
else
{
$data=$this->mysession->get('post');
           $ownership =$data['vehicle_ownership_types_id'];
			$vehicle_type=$data['vehicle_type_id'];
			$make=$data['vehicle_make_id'];
			$year=$data['vehicle_manufacturing_year'];
			$ac=$data['vehicle_ac_type_id'];
			$fuel=$data['vehicle_fuel_type_id'];
			$seat=$data['vehicle_seating_capacity_id'];
			$driver=$data['driver'];
			$from_date=$data['from_date'];
			$reg_number=$data['registration_number'];
			$reg_date=$data['registration_date'];
			$eng_num=$data['engine_number'];
			$chases_num=$data['engine_number'];
			$permit=$data['vehicle_permit_type_id']; 
			$permit_date=$data['vehicle_permit_renewal_date'];
			$permit_amount=$data['vehicle_permit_renewal_amount'];
			$tax_amount=$data['tax_renewal_amount'];
			$tax_date=$data['tax_renewal_date'];	
$this->mysession->delete('post');
}

?>
<?php if($this->session->userdata('dbSuccess') != '') { ?>
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
		<?php echo form_open('vehicle/vehicle_manage');?>
		<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
        <li class="active"><a href="#tab_1" data-toggle="tab">Vehicle </a></li>
        <li class=""><a href="#tab_2" data-toggle="tab">Insurance </a></li>
         <li class=""><a href="#tab_3" data-toggle="tab">Loan </a></li>
		  <li class=""><a href="#tab_4" data-toggle="tab">Owner </a></li>
       
    </ul>
    <div class="tab-content">
	<?php if($this->mysession->get('Err_permit_amt') != ''||$this->mysession->get('Err_tax_amt') != ''||$this->mysession->get('ownership') != ''||$this->mysession->get('vehicle_type') != ''||$this->mysession->get('make') != ''||$this->mysession->get('fuel') != ''||$this->mysession->get('seat') != ''||$this->mysession->get('permit') != ''||$this->mysession->get('driver') != ''||$this->mysession->get('ac') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->mysession->get('Err_permit_amt').br();
													echo $this->mysession->get('Err_tax_amt').br();
													echo $this->mysession->get('ownership').br();
													echo $this->mysession->get('vehicle_type').br();
													echo $this->mysession->get('ac').br();
													echo $this->mysession->get('make').br();
													echo $this->mysession->get('fuel').br();
													echo $this->mysession->get('seat').br();
													echo $this->mysession->get('permit').br();
													echo $this->mysession->get('driver').br();
										
														$this->mysession->delete('Err_permit_amt');
														$this->mysession->delete('Err_tax_amt');
														$this->mysession->delete('ownership');
														$this->mysession->delete('vehicle_type');
														$this->mysession->delete('ac');
														$this->mysession->delete('make');
														$this->mysession->delete('fuel');
														$this->mysession->delete('seat');
														$this->mysession->delete('permit');
														$this->mysession->delete('driver');
														
														
										?>
                                    </div>
<?php  } ?>
        <div class="tab-pane active" id="tab_1">
           <div class="width-30-percent-with-margin-left-20-Driver-View">

<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Vehicle Details</legend>

		<?php  echo form_open(base_url()."vehicle/vehicle-manage");?>
        <div class="form-group">
	<?php echo form_label('Vehicle Ownership Type','usernamelabel'); ?>
     <?php
	 $class="form-control";
		$msg="Select Ownership Type";
		$name="ownership";
		if($ownership!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ownership_types'],$ownership,$class,$id='',$msg);
	}
	else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ownership_types'],$ownership='',$class,$id='',$msg);
	}?>
	   <?php echo $this->form_functions->form_error_session('ownership', '<p class="text-red">', '</p>'); ?>
        </div>
	
	<div class="form-group">
	<?php echo form_label('Vehicle Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Vehicle type";
		$name="vehicle_type";
		
	//if(($this->session->userdata('org_id')!=null)&&($this->session->userdata('user_id')!=null)){
	//$marital_status_id=$result[0]['marital_status_id'];
	//echo $marital_status_id;exit;
	if($vehicle_type!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_types'],$vehicle_type,$class,$id='',$msg);
	}else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_types'],$vehicle_type='',$class,$id='',$msg);
	}
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
		if($make!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_makes'],$make,$class,$id='',$msg);
	}else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_makes'],$make='',$class,$id='',$msg);
	}?>
	   <?php echo $this->form_functions->form_error_session('make', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label(' Manufacturing Year','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'year','class'=>'fromdatepicker form-control' ,'value'=>$year));?>
	   <?php echo $this->form_functions->form_error_session('year', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Ac Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select AC Type";
		$name="ac";
		if($ac!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ac_types'],$ac,$class,$id='',$msg); 
	}else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_ac_types'],$ac='',$class,$id='',$msg); 
	}?>
	   <?php echo $this->form_functions->form_error_session('ac', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label(' Fuel Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Fuel Type";
		$name="fuel";
		if($fuel!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_fuel_types'],$fuel,$class,$id='',$msg); 
     }else{
   echo $this->form_functions->populate_dropdown($name,$select['vehicle_fuel_types'],$fuel='',$class,$id='',$msg);
}	?>
	   <?php echo $this->form_functions->form_error_session('fuel', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label(' Seating Capacity','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Seating Capacity";
		$name="seat";
		if($seat!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_seating_capacity'],$seat,$class,$id='',$msg); 
}else{
echo $this->form_functions->populate_dropdown($name,$select['vehicle_seating_capacity'],$seat='',$class,$id='',$msg); 
}	?>
	   <?php echo $this->form_functions->form_error_session('seat', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Select Driver','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Driver";
		$name="driver";
		if($driver!=null){
	echo $this->form_functions->populate_dropdown($name,$select['drivers'],$driver,$class,$id='',$msg); 
}else{
echo $this->form_functions->populate_dropdown($name,$select['drivers'],$driver='',$class,$id='',$msg); 
}	?>
	   <?php echo $this->form_functions->form_error_session('driver', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('From Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'from_date','class'=>'fromdatepicker form-control' ,'value'=>$from_date));?>
	   <?php echo $this->form_functions->form_error_session('from_date', '<p class="text-red">', '</p>'); ?>
        </div>
	
		</fieldset> </div>
		
		<div class="width-30-percent-with-margin-left-20-Driver-View">
<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Other Details</legend>
	<div class="form-group">
		<?php echo form_label('Registration Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'reg_number','class'=>'form-control','id'=>'reg_number','value'=>$reg_number)); ?>
	   <?php echo $this->form_functions->form_error_session('reg_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Registration Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'reg_date','class'=>'fromdatepicker form-control' ,'value'=>$reg_date));?>
	   <?php echo $this->form_functions->form_error_session('reg_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Engine Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'eng_num','class'=>'form-control','value'=>$eng_num));?>
	   <?php echo $this->form_functions->form_error_session('eng_num', '<p class="text-red">', '</p>'); ?>
        </div>
        <div class="form-group">
		<?php echo form_label('Chases Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'chases_num','class'=>'form-control','id'=>'chases_num','value'=>$chases_num)); ?>
	   <?php echo $this->form_functions->form_error_session('chases_num', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Permit Type','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Permit Type";
		$name="permit";
		if($permit!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_permit_types'],$permit,$class,$id='',$msg); }
	else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_permit_types'],$permit='',$class,$id='',$msg);
	}
	?>
	   <?php echo $this->form_functions->form_error_session('permit', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Permit Renewal Date','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'permit_date','class'=>'fromdatepicker form-control' ,'value'=>$permit_date));?>
	   <?php echo $this->form_functions->form_error_session('permit_date', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
	<?php echo form_label('Permit Renewal Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'permit_amount','class'=>'form-control','id'=>'license_number','value'=>$permit_amount)); ?>
	   <?php echo $this->form_functions->form_error_session('permit_amount', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Tax Renewal Amount ','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'tax_amount','class'=>'form-control','id'=>'tax_amount','value'=>$tax_amount));?>
	   <?php echo $this->form_functions->form_error_session('tax_amount', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Tax Renewal Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'tax_date','class'=>'fromdatepicker form-control' ,'value'=>$tax_date)); ?>
	   <?php echo $this->form_functions->form_error_session('tax_date', '<p class="text-red">', '</p>'); ?>
        </div>
	
	
   		<div class="box-footer">
		<?php // echo validation_errors();?>
		<?php //if(!isset($org_id) && !isset($user_id)) {
		
		 //}else {
		
		// echo form_submit("driver-detail-update","Update","class='btn btn-primary'");}  ?>  
        </div>

	</fieldset>

<?php echo form_submit("submit-one","Next >>","class='btn btn-primary next'");?>
</div>
        </div>
        <div class="tab-pane" id="tab_2">
             <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Insurance Details</legend>
			
		
			<div class="form-group">
		<?php echo form_label('Insurance Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_number','class'=>'form-control','id'=>'insurance_number','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Insurance Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_date', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Insurance Renewal Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_renewal_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Premium Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_pre-amount','class'=>'form-control','id'=>'insurance_pre-amount','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_pre-amount', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance  Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_amount','class'=>'form-control','id'=>'insurance_amount','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_amount', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance  Agency','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency','class'=>'form-control','id'=>'insurance_agency','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'insurance_agency_address','class'=>'form-control','id'=>'insurance_agency_address','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Phone','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_phn','class'=>'form-control','id'=>'insurance_agency_phn','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_phn', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_mail','class'=>'form-control','id'=>'insurance_agency_mail','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_mail', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Web','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_web','class'=>'form-control','id'=>'insurance_agency_web','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_web', '<p class="text-red">', '</p>'); ?>
        </div>
			</fieldset>
			<?php 
			echo form_submit("driver-submit","<< Previous","class='btn btn-primary prev1'");
			echo form_submit("driver-submit","Next >>","class='btn btn-primary next1'");?>
			</div>
        </div>
        <div class="tab-pane" id="tab_3">
                      <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Loan Details</legend>
				<div class="form-group">
		<?php echo form_label('Total Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'total_amt','class'=>'form-control','id'=>'total_amt','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('total_amt', '<p class="text-red">', '</p>'); ?>
        </div>
		
			<div class="form-group">
		<?php echo form_label('Number of EMI','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'emi_number','class'=>'form-control','id'=>'emi_number','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('emi_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('EMI Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'emi_amt','class'=>'form-control','id'=>'emi_amt','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('emi_amt', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Number of Paid EMI','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'no_paid_emi','class'=>'form-control','id'=>'no_paid_emi','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('no_paid_emi', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('EMI Payment Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'emi_date','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining)); ?>
	   <?php echo $this->form_functions->form_error_session('emi_date', '<p class="text-red">', '</p>'); ?>
        </div>
		
		<div class="form-group">
		<?php echo form_label('Loan Agency','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency','class'=>'form-control','id'=>'loan_agency','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'loan_agency_address','class'=>'form-control','id'=>'loan_agency_address','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Phone','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_phn','class'=>'form-control','id'=>'loan_agency_phn','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_phn', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_mail','class'=>'form-control','id'=>'loan_agency_mail','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_mail', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Web','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_web','class'=>'form-control','id'=>'loan_agency_web','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_web', '<p class="text-red">', '</p>'); ?>
        </div>
			</fieldset>
			<?php 
			echo form_submit("driver-submit","<< Previous","class='btn btn-primary prev2'");
			echo form_submit("driver-submit","Next >>","class='btn btn-primary next2'");?>
			</div>
        </div>
		<div class="tab-pane" id="tab_4">
		                    <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Owner Details</legend>
				<div class="form-group">
		<?php echo form_label('Name','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'owner_name','class'=>'form-control','id'=>'total_amt','value'=>'')); ?>
	   <?php echo $this->form_functions->form_error_session('owner_name', '<p class="text-red">', '</p>'); ?>
        </div>

		<div class="form-group">
		<?php echo form_label(' Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'address','class'=>'form-control','id'=>'address','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Mobile','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mobile','class'=>'form-control','id'=>'mobile','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('mobile', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label(' Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mail','class'=>'form-control','id'=>'mail','value'=>'','rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('mail', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Date of Birth','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'dob','class'=>'fromdatepicker form-control' ,'value'=>$date_of_joining)); ?>
	   <?php echo $this->form_functions->form_error_session('dob', '<p class="text-red">', '</p>'); ?>
        </div>
		
			</fieldset>
			<?php echo form_submit("vehicle-submit","Save","class='btn btn-primary next'");?>
			</div>
		</div>
    </div>
</div>
		

<?php echo form_close();?>
</fieldset>
</div>