<div class="new-org-body">
<fieldset class="body-border">
<legend class="body-head">Vehicle</legend>
	<div class="form-group">
		   <?php echo form_open(base_url().$url);?>
		   <?php echo form_label('Organization Name');?>
           <?php echo form_input(array('name'=>'name','class'=>'form-control','id'=>'name','placeholder'=>'Enter Organization Name','value'=>$name)); ?>
			<?php if(isset($org_id) && isset($user_id)) {  echo form_hidden('hname',$hname); } ?>
	   <?php echo form_error('name', '<p class="text-red">', '</p>'); 
	         echo form_submit("submit","Save","class='btn btn-primary'");
			 echo form_close();
	   ?>
        </div>
</fieldset>
</div>