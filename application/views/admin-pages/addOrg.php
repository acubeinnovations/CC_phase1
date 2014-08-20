<div class="new-org-body">
		<?php echo form_open(base_url().'admin/organization/new');?>
        <div class="form-group">
		   <?php echo form_label('Organization Name');?>
           <?php echo form_input(array('name'=>'name','class'=>'form-control','id'=>'name','placeholder'=>'Enter Organization Name','value'=>$name)); ?>
	   <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
		   <?php echo form_label('First Name');?>
           <?php echo form_input(array('name'=>'fname','class'=>'form-control','id'=>'fname','placeholder'=>'Enter First Name','value'=>$fname)); ?>
	   <?php echo form_error('fname', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
		   <?php echo form_label('Last Name');?>
           <?php echo form_input(array('name'=>'lname','class'=>'form-control','id'=>'lname','placeholder'=>'Enter Last Name','value'=>$lname)); ?>
	   <?php echo form_error('lname', '<p class="text-red">', '</p>'); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Address','addresslabel'); ?>
            <?php echo form_textarea(array('name'=>'addr','class'=>'form-control','placeholder'=>'Enter Address','rows' => '4','value'=>$addr)); ?>
	    <?php echo form_error('addr', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
			<?php echo form_label('Username'); ?>
             <?php echo form_input(array('name'=>'uname','class'=>'form-control','id'=>'uname','placeholder'=>'Enter Username','value'=>$uname)); ?>
	     <?php echo form_error('uname', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
			<?php echo form_label('Password'); ?>
            <?php echo form_password(array('name'=>'pwd','class'=>'form-control','id'=>'pwd','placeholder'=>'Enter Password','value'=>$pwd)); ?>
	    <?php echo form_error('pwd', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
			<?php echo form_label('Confirm Password'); ?>
            <?php echo form_password(array('name'=>'cpwd','class'=>'form-control','id'=>'cpwd','placeholder'=>'Confirm Password','value'=>$cpwd)); ?>
	    <?php echo form_error('cpwd', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
			<?php echo form_label('Email-ID'); ?>
            <?php echo form_input(array('name'=>'mail','class'=>'form-control','id'=>'mail','placeholder'=>'Enter E-mail ID','value'=>$mail)); ?>
	    <?php echo form_error('mail', '<p class="text-red">', '</p>'); ?>
        </div>
	<div class="form-group">
			<?php echo form_label('Phone Number'); ?>
            <?php echo form_input(array('name'=>'phn','class'=>'form-control','id'=>'phn','placeholder'=>'Enter Phone Number','value'=>$phn)); ?>
	    <?php echo form_error('phn', '<p class="text-red">', '</p>'); ?>
        </div>
	
		<div class="form-group">
		<?php if(isset($msg)) echo $msg; ?>
		</div>
   		<div class="box-footer">
		<?php // echo validation_errors();?>
		<?php echo form_submit("submit","Save","class='btn btn-primary'");  ?>  
        </div>
	 <?php echo form_close(); ?>
</div><!-- body -->
