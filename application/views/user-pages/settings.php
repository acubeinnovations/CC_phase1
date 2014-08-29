<div class="settings-body">
<table class="tbl-settings">
<tr>
<td>
<fieldset class="body-border">
<legend class="body-head">Vehicle</legend>
<table class="tbl">
<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Vehicle Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('AC Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Fuel Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Seating Capacity');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Beacon Light Options');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Vehicle Makes');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Driver Bata Percentages');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Permit Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

</table>
</fieldset>
</td>
<td><?php echo nbs(10); ?></td>
<td>
<fieldset class="body-border">
<legend class="body-head">General</legend>
 <table class="tbl">
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Vehicle Ownership');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-edit"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div class="settings-delete"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<?php echo form_submit("add","Add","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("edit","Edit","class='btn btn-primary fa fa-edit'");?>
	<?php echo form_submit("delete","Delete","class='btn btn-primary'");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
</table> 
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