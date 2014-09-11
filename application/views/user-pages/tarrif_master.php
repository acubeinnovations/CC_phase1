<?php
if($this->session->userdata('post')==null){
$title1='';
$trip_model_id='';
$vehicle_make_id='';
$vehicle_ac_type_id='';
$minimum_kilometers='';
$minimum_hours='';
}
else
{
$data=$this->session->userdata('post');
$title1=$data['title'];
$trip_model_id=$data['trip_model_id'];
$vehicle_make_id=$data['vehicle_make_id'];
$vehicle_ac_type_id=$data['vehicle_ac_type_id'];
$minimum_kilometers=$data['minimum_kilometers'];
$minimum_hours=$data['minimum_hours'];
$this->session->set_userdata('post','');
}
?>
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
<div class="tarrif_master_body">
<fieldset class="body-border border-style" >
<legend class="body-head">ADD</legend>
<div class="form-group">
<table>
<tr>
<td>
<?php echo form_open(base_url()."tarrif/tarrif_manage");
		echo form_input(array('name'=>'title','class'=>'form-control','id'=>'title1','placeholder'=>'Title','value'=>$title1)); ?></td>
		<td><?php  	$class="form-control";
		$msg="Select Trip Model";
		$name="select_trip_model";
		echo $this->form_functions->populate_dropdown($name,$trip_models,$trip_model_id,$class,$msg)?></td>
		
		<td><?php  	$class="form-control";
		$msg="Select Vehicle Make";
		$name="select_vehicle_makes";
		echo $this->form_functions->populate_dropdown($name,$vehicle_makes,$vehicle_make_id,$class,$msg)?></td>
		<td><?php  	$class="form-control";
		$msg="Select AC Type";
		$name="select_ac_type";
		echo $this->form_functions->populate_dropdown($name,$vehicle_ac_types,$vehicle_ac_type_id,$class,$msg)?></td>
		<td><?php echo form_input(array('name'=>'min_kilo','class'=>'form-control','id'=>'min_kilo','placeholder'=>'Minimum Kilometers','value'=>$minimum_kilometers)); ?></td>
		<td><?php echo form_input(array('name'=>'min_hours','class'=>'form-control','id'=>'min_hours','placeholder'=>'Minimum Hours','value'=>$minimum_hours)); ?></td>
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
<?php 
foreach ($allDetails as $det):
?>
<table><tr>
<td><?php echo form_open(base_url()."tarrif/tarrif_manage"); echo form_input(array('name'=>'manage_title','class'=>'form-control','id'=>'manage_title','placeholder'=>'Title','value'=> $det['title'] )); ?></td>
<td><?php  	$class="form-control";
		$msg="Select Trip Model";
		$name="manage_select_trip_model";
		$selected='';
		echo $this->form_functions->populate_dropdown($name,$trip_models,$det['trip_model_id'],$class,$msg)?></td>
<td><?php  	$class="form-control";
		$msg="Select Vehicle Make";
		$name="manage_select_vehicle_makes";
		echo $this->form_functions->populate_dropdown($name,$vehicle_makes,$det['vehicle_make_id'],$class,$msg)?></td>
<td><?php  	$class="form-control";
		$msg="Select AC Type";
		$name="manage_select_ac_type";
		echo $this->form_functions->populate_dropdown($name,$vehicle_ac_types,$det['vehicle_ac_type_id'],$class,$msg)?></td>
<td><?php echo form_input(array('name'=>'manage_min_kilo','class'=>'form-control','id'=>'manage_min_kilo','placeholder'=>'Minimum Kilometers','value'=> $det['minimum_kilometers'])); ?></td>
<td><?php echo form_input(array('name'=>'manage_min_hours','class'=>'form-control','id'=>'min_hours','placeholder'=>'Minimum Hours','value'=> $det['minimum_hours'] )); ?></td>
<td><div  class="tarrif-edit" ><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div><div class="hide-me xx"><?php echo form_submit("edit","Edit","id=tarrif-edit-id","class=btn");?></div></td>
<td><div  class="tarrif-delete" ><?php echo nbs(5);?><i class="fa fa-trash-o"></i><?php echo nbs(5);?></div><div class="hide-me"><?php echo form_submit("delete","Delete","id=tarrif-delete-id","class=btn");?></div></td>
<?php echo form_close();?>
</tr></table>
<?php endforeach; ?>
</fieldset>
</div>