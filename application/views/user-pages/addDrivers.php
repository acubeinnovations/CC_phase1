 <?php
if($this->session->userdata('post')==null){
$tariff_master_id='';
$from_date='';
$rate='';
$additional_kilometer_rate='';
$additional_hour_rate='';
$driver_bata='';
$night_halt='';
}
else
{
$data=$this->session->userdata('post');
$tariff_master_id=$data['tariff_master_id'];
$from_date=$data['from_date'];
$rate=$data['rate'];
$additional_kilometer_rate=$data['additional_kilometer_rate'];
$additional_hour_rate=$data['additional_hour_rate'];
$driver_bata=$data['driver_bata'];
$night_halt=$data['night_halt'];
$this->session->set_userdata('post','');
}

if($this->session->userdata('dbvalTarrif_Err') != ''||$this->session->userdata('Err_date') != ''||$this->session->userdata('Err_rate') != ''||$this->session->userdata('Err_add_kilo') != ''||$this->session->userdata('Err_add_hrs') != ''||$this->session->userdata('Err_bata') != ''||$this->session->userdata('Err_halt') != ''||$this->session->userdata('Required') != ''||$this->session->userdata('Date_err') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->session->userdata('dbvalTarrif_Err').nbs();
													echo $this->session->userdata('Err_date').nbs();
													echo $this->session->userdata('Err_rate').nbs();
													echo $this->session->userdata('Err_add_kilo').nbs();
													echo $this->session->userdata('Err_add_hrs').nbs();
													echo $this->session->userdata('Err_bata').nbs();
													echo $this->session->userdata('Err_halt').nbs();
													echo $this->session->userdata('Required').nbs();
													echo $this->session->userdata('Date_err').nbs();
														$this->session->set_userdata(array('dbvalTarrif_Err'=>''));
														$this->session->set_userdata(array('Err_date'=>''));
														$this->session->set_userdata(array('Err_rate'=>''));
														$this->session->set_userdata(array('Err_add_kilo'=>''));
														$this->session->set_userdata(array('Err_add_hrs'=>''));
														$this->session->set_userdata(array('Err_bata'=>''));
														$this->session->set_userdata(array('Err_halt'=>''));
														$this->session->set_userdata(array('Required'=>''));
														$this->session->set_userdata(array('Date_err'=>''));
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
	   
<div class="width-30-percent-with-margin-left-20-Driver-View">

<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Personal Details</legend>

		<?php  echo form_open(base_url()."driver/driver_manage");?>
        <div class="form-group">
           <?php echo form_input(array('name'=>'name','class'=>'form-control','id'=>'name','placeholder'=>'Enter Name','value'=>' ')); ?>
	   <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'place_of_birth','class'=>'form-control','id'=>'place_of_birth','placeholder'=>'Enter Place Of Birth','value'=>' ')); ?>
	   <?php echo form_error('place_of_birth', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'dob','class'=>'fromdatepicker form-control' ,'placeholder'=>'Pick up Date','value'=>''));?>
	   <?php echo form_error('dob', '<p class="text-red">', '</p>'); ?>
        </div>
        <div class="form-group">
           <?php echo form_input(array('name'=>'blood group','class'=>'form-control','id'=>'blood group','placeholder'=>'Blood Group','value'=>' ')); ?>
	   <?php echo form_error('blood group', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php
		$class="form-control";
		$msg="Select Marital Status";
		$name="marital_status_id";
		$selected='';
	echo $this->form_functions->populate_dropdown($name,$marital_statuses,$selected,$class,$id='',$msg); 
	?></div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'children','class'=>'form-control','id'=>'children','placeholder'=>'Children','value'=>' ')); ?>
	   <?php echo form_error('children', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_textarea(array('name'=>'present_address','class'=>'form-control','id'=>'present_address','placeholder'=>'Present Address','value'=>' ','rows'=>7)); ?>
	   <?php echo form_error('present_address', '<p class="text-red">', '</p>'); ?>
        </div>
	
	<div class="form-group">
           <?php echo form_textarea(array('name'=>'permanent_address','class'=>'form-control','id'=>'permanent_address','placeholder'=>'Permanent Address','value'=>' ','rows'=>7)); ?>
	   <?php echo form_error('permanent_address', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'district','class'=>'form-control','id'=>'district','placeholder'=>'District','value'=>' ')); ?>
	   <?php echo form_error('district', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'state','class'=>'form-control','id'=>'state','placeholder'=>'State','value'=>' ')); ?>
	   <?php echo form_error('state', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'pin_code','class'=>'form-control','id'=>'pin_code','placeholder'=>'Pin Code','value'=>' ')); ?>
	   <?php echo form_error('pin_code', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
           <?php echo form_input(array('name'=>'phone','class'=>'form-control','id'=>'phone','placeholder'=>'Phone','value'=>' ')); ?>
	   <?php echo form_error('phone', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'mobile','class'=>'form-control','id'=>'mobile','placeholder'=>'Mobile','value'=>' ')); ?>
	   <?php echo form_error('mobile', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'email','class'=>'form-control','id'=>'email','placeholder'=>'E-mail ID','value'=>' ')); ?>
	   <?php echo form_error('email', '<p class="text-red">', '</p>'); ?>
        </div>
		</fieldset> </div>
<div class="width-30-percent-with-margin-left-20-Driver-View">
<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Other Details</legend>

	<div class="form-group">
           <?php echo form_input(array('name'=>'date_of_joining','class'=>'fromdatepicker form-control' ,'placeholder'=>'Pick up Date of Joining','value'=>''));?>
	   <?php echo form_error('date_of_joining', '<p class="text-red">', '</p>'); ?>
        </div>	
	<div class="form-group">
           <?php echo form_input(array('name'=>'license_number','class'=>'form-control','id'=>'license_number','placeholder'=>'License Number','value'=>' ')); ?>
	   <?php echo form_error('license_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'license_renewal_date','class'=>'fromdatepicker form-control' ,'placeholder'=>'Pick up Date of Renewal','value'=>''));?>
	   <?php echo form_error('license_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'badge','class'=>'form-control','id'=>'badge','placeholder'=>'Badge','value'=>' ')); ?>
	   <?php echo form_error('badge', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'badge_renewal_date','class'=>'fromdatepicker form-control' ,'placeholder'=>'Pick up Date of Badge Renewal','value'=>''));?>
	   <?php echo form_error('badge_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'mother_tongue','class'=>'form-control','id'=>'mother_tongue','placeholder'=>'Mother Tongue','value'=>' ')); ?>
	   <?php echo form_error('mother_tongue', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'pan_number','class'=>'form-control','id'=>'pan_number','placeholder'=>'Pan Number','value'=>' ')); ?>
	   <?php echo form_error('pan_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'bank_account_number','class'=>'form-control','id'=>'bank_account number','placeholder'=>'Bank Account Number','value'=>' ')); ?>
	   <?php echo form_error('bank_account number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'name_on_bank_pass_book','class'=>'form-control','id'=>'name_on_bank_pass_book','placeholder'=>'Name on Bank PassBook','value'=>' ')); ?>
	   <?php echo form_error('name_on_bank_pass_book', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'bank_name','class'=>'form-control','id'=>'bank_name','placeholder'=>'Bank Name','value'=>' ')); ?>
	   <?php echo form_error('bank_name', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'branch','class'=>'form-control','id'=>'branch','placeholder'=>'Branch','value'=>' ')); ?>
	   <?php echo form_error('branch', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php
		$class="form-control";
		$msg="Select Bank Account";
		$name="bank_account_type_id";
		$selected='';
	echo $this->form_functions->populate_dropdown($name,$bank_account_types,$selected,$class,$id='',$msg); 
	?></div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'ifsc_code','class'=>'form-control','id'=>'ifsc_code','placeholder'=>'IFSC Code','value'=>' ')); ?>
	   <?php echo form_error('ifsc_code', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php
		$class="form-control";
		$msg="Select ID Proof Type";
		$name="id_proof_type_id";
		$selected='';
	echo $this->form_functions->populate_dropdown($name,$id_proof_types,$selected,$class,$id='',$msg); 
	?></div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'id_proof_document_number','class'=>'form-control','id'=>'id_proof_document_number','placeholder'=>'ID Proof Document Number','value'=>' ')); ?>
	   <?php echo form_error('id_proof_document_number', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'name_on_id_proof','class'=>'form-control','id'=>'name_on_id_proof','placeholder'=>'Name on ID Proof','value'=>' ')); ?>
	   <?php echo form_error('name_on_id_proof', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'salary','class'=>'form-control','id'=>'ifsc_code','placeholder'=>'Salary','value'=>' ')); ?>
	   <?php echo form_error('salary', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
           <?php echo form_input(array('name'=>'minimum_working_days','class'=>'form-control','id'=>'minimum_working_days','placeholder'=>'Minimum Working Days','value'=>' ')); ?>
	   <?php echo form_error('minimum_working_days', '<p class="text-red">', '</p>'); ?>
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
