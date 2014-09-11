<div class="tarrif_master_body">
<fieldset class="body-border border-style" >
<legend class="body-head">ADD</legend>
<div class="form-group">
<table>
<tr>
<td>
<?php echo form_open(base_url()."tarrif/add");
		echo form_input(array('name'=>'title','class'=>'form-control','id'=>'title1','placeholder'=>'Title')); ?></td>
		<td><?php  	$class="form-control";
		$msg="Select Trip Model";
		$name="select_trip_model";
		echo $this->form_functions->populate_dropdown($name,$trip_models,$selected='',$class,$msg)?></td>
		
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
		<td><div  class="tarrif-add" ><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div><div class="hide-me"><?php echo form_submit("add","Add","id=tarrif-add-id","class=btn");?></div
	>
	</td>
		</tr>
		<tr>
		<td><?php echo  $this->form_functions->form_error_session('title','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('select_trip_model','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('select_vehicle_makes','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('select_ac_type','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('min_kilo','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('min_hours','<p class="text-red">', '</p>');?></td>
		</tr>
</table>
</div>
</fieldset>
<fieldset class="body-border border-style">
<legend class="body-head">Manage</legend>
<table><tr>
<td><?php echo form_open(base_url()."tarrif"); echo form_input(array('name'=>'title','class'=>'form-control','id'=>'title1','placeholder'=>'Title')); ?></td>
<td><?php  	$class="form-control";
		$msg="Select Trip Model";
		$name="select_trip_model";
		$selected='';
		echo $this->form_functions->populate_dropdown($name,$trip_models,$selected,$class,$msg)?></td>
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
<td><div  class="tarrif-edit" ><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div><div class="hide-me xx"><?php echo form_submit("edit","Edit","id=tarrif-edit-id","class=btn");?></div></td>
<td><div  class="tarrif-delete" ><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me"><?php echo form_submit("delete","Delete","id=tarrif-delete-id","class=btn");?></div></td>

</tr></table>
</fieldset>
</div>