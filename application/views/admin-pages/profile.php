
	 <div class="profile-body">
		<?php echo form_open(base_url().'admin/profile');?>
        <div class="form-group">
			<?php echo form_label('username','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'username','class'=>'form-control','id'=>'username','placeholder'=>'Enter Username')); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Firstname','firstnamelabel'); ?>
            <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'Enter First Name')); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Lastname','lastnamelabel'); ?>
            <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'Enter Last Name')); ?>
        </div>
		<div class="form-group">
			<?php echo form_label('Email','emaillabel'); ?>
            <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'Enter email')); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Phone','phonelabel'); ?>
            <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'Enter Phone')); ?>
        </div>
		<div class="form-group">
			<?php echo form_label('Address','addresslabel'); ?>
            <?php echo form_textarea(array('name'=>'address','class'=>'form-control','placeholder'=>'Enter Address')); ?>
        </div>
   		<div class="box-footer">
		<?php echo form_submit("","Update","class='btn btn-primary'");  ?>  
        </div>
	 <?php echo form_close(); ?>
	</div><!-- body -->

