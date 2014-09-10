<div class="tarrif_master_body">
<fieldset class="body-border border-style" >
<legend class="body-head">ADD</legend>
<div class="form-group">
<table>
<tr>
<td>
<?php echo form_open(base_url()."tarrif/add");
		echo form_input(array('name'=>'title','class'=>'form-control','id'=>'title1','placeholder'=>'Title')); ?><?php echo  form_error('title','<p class="text-red">', '</p>');?></td>
		<td><?php  	$class="form-control";
		$msg="Select Trip Model";
		$name="select_trip_model";
		echo $this->form_functions->populate_dropdown($name,$trip_models,$selected='',$class,$msg)?></td>
		<td><?php echo form_input(array('name'=>'id_val','id'=>'id','style'=>'display:none'))?></td>
		<td><?php  	$class="form-control";
		$msg="Select Vehicle Make";
		$name="select_vehicle_makes";
		echo $this->form_functions->populate_dropdown($name,$vehicle_makes,$selected='',$class,$msg)?></td>
		<td><?php  	$class="form-control";
		$msg="Select AC Type";
		$name="select_ac_type";
		echo $this->form_functions->populate_dropdown($name,$vehicle_ac_types,$selected='',$class,$msg)?></td>
		<td><?php echo form_input(array('name'=>'min_kilo','class'=>'form-control','id'=>'min_kilo','placeholder'=>'Minimum Kilometers','value'=>'')); ?></td>
		<td><?php echo form_input(array('name'=>'min_hours','class'=>'form-control','id'=>'min_hours','placeholder'=>'Minimum Hours','value'=>'')); ?></td>
		<td><?php echo form_submit("add","Add","id=tarrif-add-id","class=btn");?>
	</td>
		</tr>
</table>
</div>
</fieldset>
<fieldset class="body-border border-style">
<legend class="body-head">Manage</legend>
</fieldset>
</div>