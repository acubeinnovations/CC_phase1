<div class="new-org-body">
		<?php echo form_open(base_url().'admin/organization/new');?>
        <div class="form-group">
		   <?php echo form_label('Organization Name');?>
           <?php echo form_input(array('name'=>'name','class'=>'form-control','id'=>'name','placeholder'=>'Enter Organization Name')); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Address','addresslabel'); ?>
            <?php echo form_textarea(array('name'=>'addr','class'=>'form-control','placeholder'=>'Enter Address')); ?>
        </div>
		<div class="form-group">
		<?php if(isset($msg)) echo $msg; ?>
		</div>
   		<div class="box-footer">
		<?php echo form_submit("submit","Save","class='btn btn-primary'");  ?>  
        </div>
	 <?php echo form_close(); ?>
</div><!-- body -->
