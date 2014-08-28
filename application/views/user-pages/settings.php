<div class="new-org-body">
<table class="tbl">
<tr>
<td>
<fieldset class="body-border">
<legend class="body-head">Vehicle</legend>
  <div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<table class="tbl">
	<tr>
	<td ><?php echo form_label('Vehicle Ownership');?></td>
	<td >editable select</td>
	<td> <?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>
	<td><?php echo form_submit("add","Add","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("edit","Edit","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("delete","Delete","class='btn btn-primary'");?></td>
	</tr>
	</table>
	<?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>   
  </div>
</fieldset>

</td>
<td>
<fieldset class="body-border">
<legend class="body-head">General</legend>
  <div class="form-group">
	<?php echo form_open(base_url()."general/languages");?>
	<table width="700">
	<tr>
	<td ><?php echo form_label('Languages');?></td>
	<td >editable select</td>
	<td> <?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>
	<td><?php echo form_submit("add","Add","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("edit","Edit","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("delete","Delete","class='btn btn-primary'");?></td>
	</tr>
	</table>
	<?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>   
  </div>
</fieldset>

<fieldset class="body-border">
<legend class="body-head">Trip</legend>
  <div class="form-group">
	<?php echo form_open(base_url()."trip/trip-models");?>
	<table width="700">
	<tr>
	<td ><?php echo form_label('Trip Models');?></td>
	<td >editable select</td>
	<td> <?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>
	<td><?php echo form_submit("add","Add","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("edit","Edit","class='btn btn-primary'");?></td>
	<td><?php echo form_submit("delete","Delete","class='btn btn-primary'");?></td>
	</tr>
	</table>
	<?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>   
  </div>
</fieldset>
</td>
</tr>
</table>




</div>