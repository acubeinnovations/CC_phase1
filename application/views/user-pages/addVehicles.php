<div class="page-outer">
	   <fieldset class="body-border">
		<legend class="body-head">Manage Vehicles</legend>
		<?php  echo form_open(base_url()."vehicle/");?>
		<div class="nav-tabs-custom">
    <ul class="nav nav-tabs">
	<?php 
	if(isset($insurance_tab)){
	$ins_class=$insurance_tab;
	$i_tab="tab-pane active";
	}
	else{
	$ins_class='';
	$i_tab="tab-pane ";
	}
	if(isset($vehicle_tab)){
	$vehicle_class=$vehicle_tab;
	$v_tab="tab-pane active";
	}
	else{
	$vehicle_class='';
	$v_tab="tab-pane";
	}
	if(isset($loan_tab)){
	$loan_class=$loan_tab;
	$l_tab="tab-pane active";
	}
	else{
	$loan_class='';
	$l_tab="tab-pane ";
	}
	if(isset($owner_tab)){
	$owner_class=$owner_tab;
	$o_tab="tab-pane active";
	}
	else{
	$owner_class='';
	$o_tab="tab-pane ";
	}
	
	?>
	
        <li class="<?php echo $vehicle_class;?>"><a href="#tab_1" data-toggle="tab">Vehicle </a></li>
        <li class="<?php echo $ins_class;?>"><a href="#tab_2" data-toggle="tab">Insurance </a></li>
         <li class="<?php echo $loan_class;?>"><a href="#tab_3" data-toggle="tab">Loan </a></li>
		  <li class="<?php echo $owner_class;?>"><a href="#tab_4" data-toggle="tab">Owner </a></li>
		  <?php if(isset($mode)&& $mode!='' ){?>
        <li class="<?php echo $owner_class;?>"><a href="#tab_5" data-toggle="tab">Trip </a></li>
		 <li class="<?php echo $owner_class;?>"><a href="#tab_6" data-toggle="tab">Payments </a></li>
		  <li class="<?php echo $owner_class;?>"><a href="#tab_7" data-toggle="tab">Accounts</a></li>
		  <?php }?>
    </ul>
    <div class="tab-content">

        <div class="<?php echo $v_tab;?>" id="tab_1">
	<?php 
			$vehicle_id=gINVALID;
			$ownership ="";
			$vehicle_type="";
			$make="";
			$model="";
			$year="";
			$ac="";
			$fuel="";
			$seat="";
			$driver_id="";
			$from_date="";
			$device_id="";
			$from_date_device="";
			$reg_number="";
			$reg_date="";
			$eng_num="";
			$chases_num="";
			$permit="";
			$permit_date="";
			$permit_amount="";
			$tax_amount="";
			$tax_date="";
		if($this->mysession->get('post_all')!=null && $this->mysession->get('post_driver')!=null && $this->mysession->get('post_device')!=null){
			$data=$this->mysession->get('post_all');
			$driver_data=$this->mysession->get('post_driver');
			$device_data=$this->mysession->get('post_device');
			$vehicle_id=$this->mysession->get('v_id');
			$ownership =$data['vehicle_ownership_types_id'];
			$vehicle_type=$data['vehicle_type_id'];
			$make=$data['vehicle_make_id'];
			$model=$data['vehicle_model_id'];
			$year=$data['vehicle_manufacturing_year'];
			$ac=$data['vehicle_ac_type_id'];
			$fuel=$data['vehicle_fuel_type_id'];
			$seat=$data['vehicle_seating_capacity_id'];
			$driver_id=$driver_data['driver_id'];
			$from_date_device=$driver_data['from_date'];
			$device_id=$device_data['device_id'];
			$from_date_device=$device_data['from_date_device'];
			$reg_number=$data['registration_number'];
			$reg_date=$data['registration_date'];
			$eng_num=$data['engine_number'];
			$chases_num=$data['engine_number'];
			$permit=$data['vehicle_permit_type_id']; 
			$permit_date=$data['vehicle_permit_renewal_date'];
			$permit_amount=$data['vehicle_permit_renewal_amount'];
			$tax_amount=$data['tax_renewal_amount'];
			$tax_date=$data['tax_renewal_date'];	
		$this->mysession->delete('post_all');
		$this->mysession->delete('post_driver');
		}
		 else if(isset($driver)&&isset($vehicle)&& $driver!=null&& $vehicle!=null){ 
			$vehicle_id=$vehicle['id'];
		    $ownership =$vehicle['vehicle_ownership_types_id'];
			$vehicle_type=$vehicle['vehicle_type_id'];
			$make=$vehicle['vehicle_make_id'];
			$model=$vehicle['vehicle_model_id'];
			$year=$vehicle['vehicle_manufacturing_year'];
			$ac=$vehicle['vehicle_ac_type_id'];
			$fuel=$vehicle['vehicle_fuel_type_id'];
			$seat=$vehicle['vehicle_seating_capacity_id'];
			$driver_id=$driver['driver_id'];
			$from_date=$driver['from_date'];
			$device_id=$device['device_id'];
			$from_date_device=$device['from_date'];
			$reg_number=$vehicle['registration_number'];
			$reg_date=$vehicle['registration_date'];
			$eng_num=$vehicle['engine_number'];
			$chases_num=$vehicle['chases_number'];
			$permit=$vehicle['vehicle_permit_type_id'];
			$permit_date=$vehicle['vehicle_permit_renewal_date'];
			$permit_amount=$vehicle['vehicle_permit_renewal_amount'];
			$tax_amount=$vehicle['tax_renewal_amount'];
			$tax_date=$vehicle['tax_renewal_date'];
		 }
		 
	
  

?>

		<?php if($this->mysession->get('dbSuccess') != '') { ?>
        <div class="success-message">
			
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php 
                echo $this->mysession->get('dbSuccess');
                $this->mysession->set('dbSuccess','');
                ?>
           </div>
       </div>
       <?php    } ?>
			<?php if($this->mysession->get('Err_permit_amt') != ''||$this->mysession->get('Err_tax_amt') != ''||$this->mysession->get('ownership') != ''||$this->mysession->get('vehicle_type') != ''||$this->mysession->get('make') != ''||$this->mysession->get('fuel') != ''||$this->mysession->get('seat') != ''||$this->mysession->get('permit') != ''||$this->mysession->get('Driver') != ''||$this->mysession->get('ac') != ''||$this->mysession->get('date_err') != ''||$this->mysession->get('Device') != ''||$this->mysession->get('Err_driver_fdate') != ''||$this->mysession->get('Err_device_fdate') != ''||$this->mysession->get('Err_reg_date') != ''||$this->mysession->get('Err_tax_date') != ''){ ?>
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
													echo $this->mysession->get('Driver').br();
													echo $this->mysession->get('Device').br();
													echo $this->mysession->get('date_err').br();
													echo $this->mysession->get('Err_driver_fdate').br();
													echo $this->mysession->get('Err_device_fdate').br();
													echo $this->mysession->get('Err_reg_date').br();
													echo $this->mysession->get('Err_tax_date').br();
														$this->mysession->delete('Err_permit_amt');
														$this->mysession->delete('Err_tax_amt');
														$this->mysession->delete('ownership');
														$this->mysession->delete('vehicle_type');
														$this->mysession->delete('ac');
														$this->mysession->delete('make');
														$this->mysession->delete('fuel');
														$this->mysession->delete('seat');
														$this->mysession->delete('permit');
														$this->mysession->delete('Driver');
														$this->mysession->delete('Device');
														$this->mysession->delete('date_err');
														$this->mysession->delete('Err_driver_fdate');
														$this->mysession->delete('Err_device_fdate');
														$this->mysession->delete('Err_reg_date');
														$this->mysession->delete('Err_tax_date');
														
										?>
                                    </div>
<?php  } ?>
           <div class="width-30-percent-with-margin-left-20-Driver-View">

<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Vehicle Details</legend>
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
	   
        </div>
		<div class="form-group">
	<?php echo form_label('Vehicle Model','usernamelabel'); 
	 $class="form-control";
		$msg="Select Vehicle Model";
		$name="model";
		if($model!=null){
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_models'],$model,$class,$id='',$msg);
	}else{
	echo $this->form_functions->populate_dropdown($name,$select['vehicle_models'],$model='',$class,$id='',$msg);
	}?>
	   
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
		
	
		</fieldset> </div>
		
		<div class="width-30-percent-with-margin-left-20-Driver-View">
<fieldset class="body-border-Driver-View border-style-Driver-view" >
<legend class="body-head">Other Details</legend>
	<div class="form-group">
		<?php echo form_label('Select Driver','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Driver";
		$name="driver";
		if($driver_id!=null){
	echo $this->form_functions->populate_dropdown($name,$select['drivers'],$driver_id,$class,$id='',$msg); 
}else{
echo $this->form_functions->populate_dropdown($name,$select['drivers'],$driver_id='',$class,$id='',$msg); 
}	?>
	   
        </div>
		<div class="form-group">
		<?php echo form_label('From Date','usernamelabel');?>
           <?php echo form_input(array('name'=>'from_date','class'=>'fromdatepicker form-control' ,'value'=>$from_date));?>
	   <?php echo $this->form_functions->form_error_session('from_date', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Select Device','usernamelabel'); ?>
           <?php $class="form-control";
		$msg="Select Device";
		$name="device";
		if($device_id!=null){
	echo $this->form_functions->populate_dropdown($name,$select['devices'],$device_id,$class,$id='',$msg); 
}else{
echo $this->form_functions->populate_dropdown($name,$select['devices'],$device_id='',$class,$id='',$msg); 
}	?>
	   
        </div>
		<div class="form-group">
		<?php echo form_label('From Date for Device','usernamelabel');?>
           <?php echo form_input(array('name'=>'from_date_device','class'=>'fromdatepicker form-control' ,'value'=>$from_date_device));?>
	   <?php echo $this->form_functions->form_error_session('from_date_device', '<p class="text-red">', '</p>'); ?>
        </div>
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
	<?php echo form_label('Tax Renewal Amount ','usernamelabel'); ?>
           <?php  echo form_input(array('name'=>'tax_amount','class'=>'form-control','id'=>'tax_amount','value'=>$tax_amount));?>
	   <?php echo $this->form_functions->form_error_session('tax_amount', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
	<?php echo form_label('Tax Renewal Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'tax_date','class'=>'fromdatepicker form-control' ,'value'=>$tax_date)); ?>
	   <?php echo $this->form_functions->form_error_session('tax_date', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class='hide-me'><?php  echo $vehicle_id;
		echo form_input(array('name'=>'hidden_id','class'=>'form-control','value'=>$vehicle_id));?></div>
	
   		<div class="box-footer"><?php echo br();
			if($vehicle_id==gINVALID){
			$btn_name='Save';
		 }else {
			$btn_name='Update';
			}
			echo form_submit("vehicle-submit",$btn_name,"class='btn btn-primary'"); 
			?>
        </div>

	</fieldset>


</div>
        </div>
        <div class="<?php echo $i_tab;?>" id="tab_2">
		
	<?php

			$insurance_id=gINVALID;
			$ins_number ="";
			$ins_date="";
			$ins_renewal_date="";
			$ins_prem_amt="";
			$ins_amt="";
			$ins_agency="";
			$ins_address="";
			$ins_phn="";
			$ins_mail="";
			$ins_web="";
	if($this->mysession->get('ins_post_all')!=null ){ 
	$data=$this->mysession->get('ins_post_all');
			$insurance_id=$this->mysession->get('insurance_id');
            $ins_number =$data['insurance_number'];
			$ins_date=$data['insurance_date'];
			$ins_renewal_date=$data['insurance_renewal_date'];
			$ins_prem_amt=$data['insurance_premium_amount'];
			$ins_amt=$data['insurance_amount'];
			$ins_agency=$data['Insurance_agency'];
			$ins_address=$data['Insurance_agency_address'];
			$ins_phn=$data['Insurance_agency_phone'];
			$ins_mail=$data['Insurance_agency_email'];
			$ins_web=$data['Insurance_agency_web'];
			$this->mysession->delete('ins_post_all');
		}else if(isset($get_insurance)&& $get_insurance!=null){ 
			$insurance_id=$get_insurance['id'];
		    $ins_number =$get_insurance['insurance_number'];
			$ins_date=$get_insurance['insurance_date'];
			$ins_renewal_date=$get_insurance['insurance_renewal_date'];
			$ins_prem_amt=$get_insurance['insurance_premium_amount'];
			$ins_amt=$get_insurance['insurance_amount'];
			$ins_agency=$get_insurance['Insurance_agency'];
			$ins_address=$get_insurance['Insurance_agency_address'];
			$ins_phn=$get_insurance['Insurance_agency_phone'];
			$ins_mail=$get_insurance['Insurance_agency_email'];
			$ins_web=$get_insurance['Insurance_agency_web'];
			}
			
?>

				<?php if($this->mysession->get('ins_Success') != '') { ?>
        <div class="success-message">
			
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php 
                echo $this->mysession->get('ins_Success');
                $this->mysession->set('ins_Success','');
                ?>
           </div>
       </div>
       <?php    } ?>
	   
	  			<?php if($this->mysession->get('Err_insurance_amt') != ''||$this->mysession->get('Err_insurance_pre_amt') != ''||$this->mysession->get('Err_invalid_insurance_add') != ''||$this->mysession->get('Err_ins_date') != ''||$this->mysession->get('Err_ins_renewal') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->mysession->get('Err_insurance_amt').br();
													echo $this->mysession->get('Err_insurance_pre_amt').br();
													echo $this->mysession->get('Err_invalid_insurance_add').br();
													echo $this->mysession->get('Err_ins_date').br();
													echo $this->mysession->get('Err_ins_renewal').br();
														$this->mysession->delete('Err_insurance_amt');
														$this->mysession->delete('Err_insurance_pre_amt');
														$this->mysession->delete('Err_invalid_insurance_add');
														$this->mysession->delete('Err_ins_date');
														$this->mysession->delete('Err_ins_renewal');
														
										?>
                                    </div>
<?php  } ?>
             <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Insurance Details</legend>
			
		
			<div class="form-group">
		<?php echo form_label('Insurance Number','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_number','class'=>'form-control','id'=>'insurance_number','value'=>$ins_number));?>
	   <?php echo $this->form_functions->form_error_session('insurance_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Insurance Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_date','class'=>'fromdatepicker form-control' ,'value'=>$ins_date)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_date', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('Insurance Renewal Date','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_renewal_date','class'=>'fromdatepicker form-control' ,'value'=>$ins_renewal_date)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_renewal_date', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Premium Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_pre-amount','class'=>'form-control','id'=>'insurance_pre-amount','value'=>$ins_prem_amt)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_pre-amount', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance  Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_amount','class'=>'form-control','id'=>'insurance_amount','value'=>$ins_amt)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_amount', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance  Agency','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency','class'=>'form-control','id'=>'insurance_agency','value'=>$ins_agency)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'insurance_agency_address','class'=>'form-control','id'=>'insurance_agency_address','value'=>$ins_address,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Phone','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_phn','class'=>'form-control','id'=>'insurance_agency_phn','value'=>$ins_phn,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_phn', '<p class="text-red">', '</p>'); ?>
        <div class="hide-me"><?php echo form_input(array('name'=>'hphone','value'=>$ins_phn));?></div>
		</div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_mail','class'=>'form-control','id'=>'insurance_agency_mail','value'=>$ins_mail,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_mail', '<p class="text-red">', '</p>'); ?>
        <div class="hide-me"><?php echo form_input(array('name'=>'hmail','value'=>$ins_mail));?></div>
		</div>
		<div class="form-group">
		<?php echo form_label('Insurance Agency Web','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'insurance_agency_web','class'=>'form-control','id'=>'insurance_agency_web','value'=>$ins_web,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('insurance_agency_web', '<p class="text-red">', '</p>');?>
        </div>
		<div class='hide-me'><?php 
		echo form_input(array('name'=>'hidden_ins_id','class'=>'form-control','value'=>$insurance_id));?></div>
			<div class="box-footer"><?php 
			if($insurance_id==gINVALID){
			$btn_name='Save';
		 }else {
			$btn_name='Update';
			}
			echo form_submit("insurance-submit",$btn_name,"class='btn btn-primary'"); 
			?></div>
			</fieldset>
			
			</div>
        </div>
        <div class="<?php echo $l_tab;?>" id="tab_3">
				<?php
		
				
			$loan_id=gINVALID;
			$l_amt ="";
			$l_emi_no="";
			$l_emi_amt="";
			$l_no_paid_emi="";
			$l_payment_date="";
			$l_agency="";
			$l_addrs="";
			$l_phn="";
			$l_mail="";
			$l_web="";
if($this->mysession->get('loan_post_all')!=null ){
		$data=$this->mysession->get('loan_post_all');
			$loan_id=$this->mysession->get('loan_id');
			$l_addrs=$data['loan_agency_address'];
            $l_amt =$data['total_amount'];
			$l_emi_no=$data['number_of_emi'];
			$l_emi_amt=$data['emi_amount'];
			$l_no_paid_emi=$data['number_of_paid_emi'];
			$l_payment_date=$data['emi_payment_date'];
			$l_agency=$data['loan_agency'];
			//$l_address=$data['loan_agency_address'];
			$l_phn=$data['loan_agency_phone'];
			$l_mail=$data['loan_agency_email'];
			$l_web=$data['loan_agency_web'];
		$this->mysession->delete('loan_post_all');
		}else if(isset($get_loan)&& $get_loan!=null){
	
			$loan_id=$get_loan['id'];
			$l_addrs=$get_loan['loan_agency_address'];
            $l_amt =$get_loan['total_amount'];
			$l_emi_no=$get_loan['number_of_emi'];
			$l_emi_amt=$get_loan['emi_amount'];
			$l_no_paid_emi=$get_loan['number_of_paid_emi'];
			$l_payment_date=$get_loan['emi_payment_date'];
			$l_agency=$get_loan['loan_agency'];
			//$l_address=$data['loan_agency_address'];
			$l_phn=$get_loan['loan_agency_phone'];
			$l_mail=$get_loan['loan_agency_email'];
			$l_web=$get_loan['loan_agency_web'];
		}

?>

				<?php if($this->mysession->get('loan_Success') != '') { ?>
        <div class="success-message">
			
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php 
                echo $this->mysession->get('loan_Success');
                $this->mysession->set('loan_Success','');
                ?>
           </div>
       </div>
       <?php    } ?>
	   
	  			<?php if($this->mysession->get('Err_loan_amt') != ''||$this->mysession->get('Err_loan_emi_amt') != ''||$this->mysession->get('Err_invalid_loan_add') != ''||$this->mysession->get('Err_emi_date') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->mysession->get('Err_loan_amt').br();
													echo $this->mysession->get('Err_loan_emi_amt').br();
													echo $this->mysession->get('Err_invalid_loan_add').br();
													echo $this->mysession->get('Err_emi_date').br();
														$this->mysession->delete('Err_loan_amt');
														$this->mysession->delete('Err_loan_emi_amt');
														$this->mysession->delete('Err_invalid_loan_add');
														$this->mysession->delete('Err_emi_date');
														
										?>
                                    </div>
<?php  } ?>
                      <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Loan Details</legend>
				<div class="form-group">
		<?php echo form_label('Total Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'total_amt','class'=>'form-control','id'=>'total_amt','value'=>$l_amt)); ?>
	   <?php echo $this->form_functions->form_error_session('total_amt', '<p class="text-red">', '</p>'); ?>
        </div>
		
			<div class="form-group">
		<?php echo form_label('Number of EMI','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'emi_number','class'=>'form-control','id'=>'emi_number','value'=>$l_emi_no)); ?>
	   <?php echo $this->form_functions->form_error_session('emi_number', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('EMI Amount','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'emi_amt','class'=>'form-control','id'=>'emi_amt','value'=>$l_emi_amt)); ?>
	   <?php echo $this->form_functions->form_error_session('emi_amt', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Number of Paid EMI','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'no_paid_emi','class'=>'form-control','id'=>'no_paid_emi','value'=>$l_no_paid_emi)); ?>
	   <?php echo $this->form_functions->form_error_session('no_paid_emi', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
	<?php echo form_label('EMI Payment Date','usernamelabel'); ?>
	 <?php echo form_input(array('name'=>'emi_date','class'=>'fromdatepicker form-control' ,'value'=>$l_payment_date)); ?>
	   <?php echo $this->form_functions->form_error_session('emi_date', '<p class="text-red">', '</p>'); ?>
        </div>
		
		<div class="form-group">
		<?php echo form_label('Loan Agency','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency','class'=>'form-control','id'=>'loan_agency','value'=>$l_agency)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'loan_agency_address','class'=>'form-control','id'=>'loan_agency_address','value'=>$l_addrs,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Phone','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_phn','class'=>'form-control','id'=>'loan_agency_phn','value'=>$l_phn,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_phn', '<p class="text-red">', '</p>'); 
	   ?><div class="hide-me"><?php echo form_input(array('name'=>'hphone_ins','value'=>$l_phn));?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_mail','class'=>'form-control','id'=>'loan_agency_mail','value'=>$l_mail,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_mail', '<p class="text-red">', '</p>'); ?>
        </div><div class="hide-me"><?php echo form_input(array('name'=>'hmail_ins','value'=>$l_mail));?>
        </div>
		<div class="form-group">
		<?php echo form_label('Loan Agency Web','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'loan_agency_web','class'=>'form-control','id'=>'loan_agency_web','value'=>$l_web,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('loan_agency_web', '<p class="text-red">', '</p>');?>
        </div>
		<div class='hide-me'><?php 
		echo form_input(array('name'=>'hidden_loan_id','class'=>'form-control','value'=>$loan_id));?></div>
		<div class="box-footer">
		<?php 
			if($loan_id==gINVALID){
			$btn_name='Save';
		 }else {
			$btn_name='Update';
			}
			echo form_submit("loan-submit",$btn_name,"class='btn btn-primary'"); 
			?>
		</div>
			</fieldset>
			
			</div>
        </div>
		<div class="<?php echo $o_tab;?>" id="tab_4">
	
		<?php 
			$owner_id=gINVALID;
			$own_name='';
			$own_address='';
			$own_mob='';
			$own_mail='';
			$own_dob='';
if($this->mysession->get('owner_post_all')!=null ){
		$data=$this->mysession->get('owner_post_all');
			$owner_id=$this->mysession->get('owner_id');
			$own_name=$data['name'];
			$own_address=$data['address'];
			$own_mob=$data['mobile'];
			$own_mail=$data['email'];
			$own_dob=$data['dob'];
		$this->mysession->delete('owner_post_all');

}else if(isset($get_owner)&& $get_owner!=null){
			$owner_id=$get_owner['id'];
			$own_name=$get_owner['name'];
			$own_address=$get_owner['address'];
			$own_mob=$get_owner['mobile'];
			$own_mail=$get_owner['email'];
			$own_dob=$get_owner['dob'];
	
	}

?>

				<?php if($this->mysession->get('owner_Success') != '') { ?>
        <div class="success-message">
			
            <div class="alert alert-success alert-dismissable">
                <i class="fa fa-check"></i>
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php 
                echo $this->mysession->get('owner_Success');
                $this->mysession->set('owner_Success','');
                ?>
           </div>
       </div>
       <?php    } ?>
	   <?php if($this->mysession->get('Err_invalid_owner_add') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->mysession->get('Err_invalid_owner_add').br();
													$this->mysession->delete('Err_invalid_owner_add');
														
												?>
                                    </div>
<?php  } ?>
	   

		                    <div class="width-30-percent-with-margin-left-20-Driver-View insurance ">
			<fieldset class="body-border-Driver-View border-style-Driver-view" >
			<legend class="body-head">Owner Details</legend>
				<div class="form-group">
		<?php echo form_label('Name','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'owner_name','class'=>'form-control','id'=>'total_amt','value'=>$own_name)); ?>
	   <?php echo $this->form_functions->form_error_session('owner_name', '<p class="text-red">', '</p>'); ?>
        </div>

		<div class="form-group">
		<?php echo form_label(' Address','usernamelabel'); ?>
           <?php echo form_textarea(array('name'=>'address','class'=>'form-control','id'=>'address','value'=>$own_address,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('address', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class="form-group">
		<?php echo form_label('Mobile','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mobile','class'=>'form-control','id'=>'mobile','value'=>$own_mob,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('mobile', '<p class="text-red">', '</p>'); ?>
        </div><div class="hide-me"><?php echo form_input(array('name'=>'hphone_own','value'=>$own_mob));?>
        </div>
		<div class="form-group">
		<?php echo form_label(' Email','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'mail','class'=>'form-control','id'=>'mail','value'=>$own_mail,'rows'=>4)); ?>
	   <?php echo $this->form_functions->form_error_session('mail', '<p class="text-red">', '</p>'); ?>
        </div><div class="hide-me"><?php echo form_input(array('name'=>'hmail_own','value'=>$own_mail));?>
        </div>
		<div class="form-group">
	<?php echo form_label('Date of Birth','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'dob','class'=>'fromdatepicker form-control' ,'value'=>$own_dob)); ?>
	   <?php echo $this->form_functions->form_error_session('dob', '<p class="text-red">', '</p>'); ?>
        </div>
		<div class='hide-me'><?php 
		echo form_input(array('name'=>'hidden_owner_id','class'=>'form-control','value'=>$owner_id));?></div>
		<div class="box-footer">
		<?php if($owner_id==gINVALID){
			$btn_name='Save';
		 }else {
			$btn_name='Update';
			}
			echo form_submit("owner-submit",$btn_name,"class='btn btn-primary'"); ?>
		</div>
			</fieldset>
			
			
			</div>
		</div>
				
				<div class="tab-pane" id="tab_5">
					<?php //trip in vehicles ?>
						            <div class="page-outer">
	   <fieldset class="body-border">
		<legend class="body-head">Trip</legend><div class="form-group">
	<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
						<th>SlNo</th>
					    <th>Date</th>
					    <th>Route</th>
						<th>Kilometers</th>
						<th>No Of Days</th>
						<!--<th>Releasing Place</th>-->
						<th>Trip Amount</th>
					    
					</tr>
					<?php	
						$full_tot_km=$total_trip_amount=0;
					if(isset($trips) && $trips!=false){
						for($trip_index=0;$trip_index<count($trips);$trip_index++){
						$tot_km=$trips[$trip_index]['end_km_reading']-$trips[$trip_index]['start_km_reading'];
						$full_tot_km=$full_tot_km+$tot_km;
						$total_trip_amount=$total_trip_amount+$trips[$trip_index]['total_trip_amount'];
						
						
						$date1 = date_create($trips[$trip_index]['pick_up_date'].' '.$trips[$trip_index]['pick_up_time']);
						$date2 = date_create($trips[$trip_index]['drop_date'].' '.$trips[$trip_index]['drop_time']);
						
						$diff= date_diff($date1, $date2);
						$no_of_days=$diff->d;
						if($no_of_days==0){
							$no_of_days='1 Day';
							
						}else{
							$no_of_days.=' Days';
							
						}

						?>
						<tr>
							<td><?php echo $trip_index+1; ?></td>
							<td><?php echo $trips[$trip_index]['pick_up_date']; ?></td>
							<td><?php echo $trips[$trip_index]['pick_up_city'].' to '.$trips[$trip_index]['drop_city']; ?></td>
							<td><?php echo $tot_km; ?></td>
							<td><?php echo $no_of_days; ?></td>
							<!--<td><?php //echo $trips[$trip_index]['releasing_place'];?></td>-->
							<td><?php echo $trips[$trip_index]['total_trip_amount']; ?></td>
						
						</tr>
						<?php } 
						}					
					?>
					<tr>
					<td>Total</td>
					<td></td>
					<td></td>
					<td><?php echo $full_tot_km; ?></td>
					<td></td>
					<td><?php echo $total_trip_amount; ?></td>
					</tr>
					<?php //endforeach;
					//}
					?>
				</tbody>
			</table><?php //echo $page_links;?>
		</div>
</div>
</fieldset>
</div>
				</div>
			        
				<div class="tab-pane" id="tab_6">
						<div class="page-outer">
						<iframe src="<?php echo base_url().'account/front_desk/SupplierPayment/VW'.$owner_id.'/true';?>" height="600px" width="100%">
						<p>Browser not Support</p>
						</iframe>
						</div>
				</div>
			
				<div class="tab-pane" id="tab_7">
						<div class="page-outer">
						<iframe src="<?php echo base_url().'account/front_desk/OwnerPaymentInquiry/VW'.$owner_id.'/true';?>" height="600px" width="100%">
						<p>Browser not Support</p>
						</iframe>
						</div>
				</div>
    </div>
</div>	
	
	
    </div>
</div>
		

<?php echo form_close();?>
</fieldset>
</div>