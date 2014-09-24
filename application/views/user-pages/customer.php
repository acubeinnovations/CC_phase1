<?php 


	$customer_id		=	'-1';
	$name				=	'';	
	$dob				=	'';
	$customer_group_id		= 	'';
	$customer_type_id		= 	'';
	
	$email				= 	'';
	$mobile				= 	'';
	$address			= 	'';

	if($this->mysession->get('post')!=NULL || $values!=false){
	
	if($this->mysession->get('post')!=NULL){
	$data						=	$this->mysession->get('post');//print_r($data);
	if(isset($data['customer_id'])){
	$customer_id = $data['customer_id'];
	}
	
	}else if($values!=false){
	$data =$values;
	$customer_id = $data['id'];
	
	}
	$name				=	$data['name'];	
	$dob				=	$data['dob'];
	$customer_group_id		= 	$data['customer_group_id'];
	$customer_type_id		= 	$data['customer_type_id'];
	$email				= 	$data['email'];
	$mobile				= 	$data['mobile'];
	$address			= 	$data['address'];
	}
	$this->mysession->delete('post');
?>
	
		 <div class="profile-body">
			<fieldset class="body-border">
   			 <legend class="body-head">Customer</legend>
				<?php echo form_open(base_url().'customers/AddUpdate');?>
				
				<div class="form-group">
					<?php echo form_label('Name','namelabel'); ?>
				    <?php echo form_input(array('name'=>'name','class'=>'form-control','placeholder'=>'Enter Name','value'=>$name)); ?>
					<?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
				</div>
			
				<div class="form-group">
					<?php echo form_label('Email','emaillabel'); ?>
				    <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>$email)); 
					if($customer_id!='' && $customer_id>gINVALID) {  ?><div class="hide-me"> <?php echo form_input(array('name'=>'h_email','class'=>'form-control','value'=>$email)); ?></div><?php } ?>
					<?php echo form_error('email', '<p class="text-red">', '</p>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('Date Of Birth ','doblabel'); ?>
				    <?php echo form_input(array('name'=>'dob','class'=>'form-control initialize-date-picker','placeholder'=>'Enter DOB','value'=>$dob)); 
					 echo form_error('dob', '<p class="text-red">', '</p>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('Phone','phonelabel'); ?>
				    <?php echo form_input(array('name'=>'mobile','class'=>'form-control','placeholder'=>'Enter Phone','value'=>$mobile)); 
					if($customer_id!='' && $customer_id>gINVALID) {  ?><div class="hide-me"> <?php echo form_input(array('name'=>'h_phone','value'=>$phone)); ?></div><?php } ?>
					<?php echo form_error('mobile', '<p class="text-red">', '</p>'); ?>
				</div>
				<div class="form-group">
					<?php echo form_label('Customer Type','ctypelabel'); 
				   $class="form-control customer-type";
					echo $this->form_functions->populate_dropdown('customer_type',$customer_types,$customer_type_id,$class,$id='',$msg="Select Customer type");?> 
				</div>
				<div class="form-group">
					<?php echo form_label('Customer Group','cgrouplabel'); ?>
				   <?php echo $this->form_functions->populate_dropdown('customer_group',$customer_groups,$customer_group_id,$class ='form-control',$id='',$msg="Select Groups"); ?>
					
				</div>
				<div class="form-group">
					<?php echo form_label('Address','addresslabel'); ?>
				    <?php echo form_textarea(array('name'=>'address','class'=>'form-control','placeholder'=>'Enter Address','value'=>$address)); ?>
					<?php echo form_error('address', '<p class="text-red">', '</p>'); ?>
				</div>
		   		<div class="box-footer">
				<?php echo form_submit("customer-add-update","Update","class='btn btn-primary'");  ?> 
				<div class="hide-me"> <?php echo form_input(array('name'=>'customer_id','class'=>'form-control','value'=>$customer_id)); 
				?></div>
			 <?php echo form_close(); ?>
			</fieldset>
		</div><!-- body -->
	
