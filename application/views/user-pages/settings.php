<?php    if($this->session->userdata('dbSuccess') != '') { ?>
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
	   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
	   <script type="text/javascript">
            $(document).ready(function(){ 
                    $('select').change(function(){ 
                            $id=$('#lstDropDown_A').val();
							$tbl=$(this).attr('tblname');
						base_url="<?php echo base_url(); ?>";
                  $(this).attr('trigger',false);
					  $.post(base_url+"vehicle/getDescription",
						  {
							id:$id,
							tbl:$tbl
						  },function(data){
						  var str=data;
						  var values=str.split(" ",3);
						    $('#id').val(values[0]);
							$('#description').val(values[1]);
							$('#editbox').val(values[2]);
						}
						
							); 
							
						$('#lstDropDown_A').hide();
						$('#editbox').show();
						
						
						
	});
        });
    </script>
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
	$tbl="vehicle_ownership_types";
	echo $this->form_functions->populate_editable_dropdown('select',$vehicle_ownership_types,$class,$tbl)?>
	<?php echo form_input(array('name'=>'select','id'=>'editbox','class'=>'form-control','style'=>'display:none'));?>
	<?php echo form_input(array('name'=>'id_val','id'=>'id','style'=>'display:none'))?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?>
	<?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?>
	<?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-types");?>
	<?php echo form_label('Vehicle Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/ac-types");?>
	<?php echo form_label('AC Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_ac_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/fuel-types");?>
	<?php echo form_label('Fuel Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_fuel_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/seating-capacity");?>
	<?php echo form_label('Seating Capacity');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_seating_capacity,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/beacon-light-options");?>
	<?php echo form_label('Beacon Light Options');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_beacon_light_options,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-makes");?>
	<?php echo form_label('Vehicle Makes');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_makes,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/driver-bata-percentages");?>
	<?php echo form_label('Driver Bata Percentages');echo nbs(5);?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_driver_bata_percentages,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/permit-types");?>
	<?php echo form_label('Permit Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$vehicle_permit_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

</table>
</fieldset>
<?php // vehicle ends?>
<fieldset class="body-border">
<legend class="body-head">Trip</legend>
 <table class='tbl'>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."trip/vehicle-ownership");?>
	<?php echo form_label('Trip Models');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$trip_models,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Trip Statuses');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$trip_statuses,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Booking Sources  ');echo nbs(5);?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$booking_sources,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

<tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."vehicle/vehicle-ownership");?>
	<?php echo form_label('Trip Expense');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$trip_expense_type,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 </table>
</fieldset>
</td>
<td><?php echo nbs(10); // trip ends?></td>

<td>
<fieldset class="body-border">
<legend class="body-head">General</legend>
 <table class="tbl">
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Languages  ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$languages,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>

 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Language Proficiency');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$language_proficiency,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Driver Type ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$driver_type,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Payment Type ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$payment_type,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Customer Types  ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$customer_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Customer Group');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$option_array='',$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Customer Registration Types');echo nbs(5);?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$customer_registration_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Marital Statuses  ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$marital_statuses,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Bank Account Types');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$bank_account_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
 <tr>
<td><div class="form-group">
	<?php echo form_open(base_url()."general/vehicle-ownership");?>
	<?php echo form_label('Id Proof ');?></td>
<td><?php  
	$class="form-control";
	echo $this->form_functions->populate_editable_dropdown('name',$id_proof_types,$class)?></td>
<td><?php echo form_input(array('name'=>'description','class'=>'form-control','id'=>'description','placeholder'=>'Description','value'=>'')); ?></td>

	<td><div  class="settings-add" onclick="TriggerClckAdd();"><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-edit" onclick="TriggerClckEdit();"><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div></td>
    <td><div  class="settings-delete" onclick="TriggerClckDelete();"><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me">
	<div class="hide-me"><?php echo form_submit("add","Add","id=settings-add-id","class=btn");?><?php echo form_submit("edit","Edit","id=settings-edit-id","class=btn");?><?php echo form_submit("delete","Delete","id=settings-delete-id","class=btn");?></div></td>
    <?php echo form_error('name', '<p class="text-red">', '</p>'); ?>
	<?php echo form_close();?>

</tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>
<tr><td></td><td></td><td></td><td></td><td></td></tr>

</table> 
</fieldset>


</td>
</tr>
</table>

</div>