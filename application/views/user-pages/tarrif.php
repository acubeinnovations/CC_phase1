<?php
if($this->session->userdata('post')==null){
$tariff_master_id='';
$from_date='';
$rate='';
$additional_kilometer_rate='';
$additional_hour_rate='';
$driver_bata='';
$night_halt='';
}
else
{
$data=$this->session->userdata('post');
$tariff_master_id=$data['tariff_master_id'];
$from_date=$data['from_date'];
$rate=$data['rate'];
$additional_kilometer_rate=$data['additional_kilometer_rate'];
$additional_hour_rate=$data['additional_hour_rate'];
$driver_bata=$data['driver_bata'];
$night_halt=$data['night_halt'];
$this->session->set_userdata('post','');
}

if($this->session->userdata('select_tariff') != ''||$this->session->userdata('dbvalTarrif_Err') != ''||$this->session->userdata('Err_rate') != ''||$this->session->userdata('Err_add_kilo') != ''||$this->session->userdata('Err_add_hrs') != ''||$this->session->userdata('Err_bata') != ''||$this->session->userdata('Err_halt') != ''||$this->session->userdata('Required') != ''||$this->mysession->get('Err_date') != ''||$this->mysession->get('Err_from_date') != ''||$this->mysession->get('Err_to_date') != ''){ ?>
	<div class="alert alert-danger alert-dismissable">
                                        <i class="fa fa-ban"></i>
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <b>Alert!</b><br><?php
													echo $this->session->userdata('dbvalTarrif_Err').nbs();
													echo $this->session->userdata('select_tariff').nbs();
													echo $this->session->userdata('Err_rate').nbs();
													echo $this->session->userdata('Err_add_kilo').nbs();
													echo $this->session->userdata('Err_add_hrs').nbs();
													echo $this->session->userdata('Err_bata').nbs();
													echo $this->session->userdata('Err_halt').nbs();
													echo $this->session->userdata('Required').nbs();
													echo $this->mysession->get('Err_date').nbs();
													echo $this->mysession->get('Err_from_date').nbs();
													echo $this->mysession->get('Err_to_date').nbs();
														$this->session->set_userdata(array('dbvalTarrif_Err'=>''));
														$this->session->set_userdata(array('select_tariff'=>''));
														$this->session->set_userdata(array('Err_rate'=>''));
														$this->session->set_userdata(array('Err_add_kilo'=>''));
														$this->session->set_userdata(array('Err_add_hrs'=>''));
														$this->session->set_userdata(array('Err_bata'=>''));
														$this->session->set_userdata(array('Err_halt'=>''));
														$this->session->set_userdata(array('Required'=>''));
														$this->mysession->delete('Err_date');
														$this->mysession->delete('Err_from_date');
														$this->mysession->delete('Err_to_date');
										?>
                                    </div>
<?php  }  if($this->session->userdata('dbSuccess') != '') { ?>
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
<legend class="body-head">Search</legend>
<table>
<tr>
<td><?php echo form_open(base_url()."organization/front-desk/tarrif"); 
 echo form_input(array('name'=>'search_from_date','class'=>'fromdatepicker form-control' ,'placeholder'=>' From Date')); ?>
</td>
<td><?php  echo form_input(array('name'=>'search_to_date','class'=>'fromdatepicker form-control' ,'placeholder'=>' To Date')); ?></td>
<td><?php echo form_submit("search","Search","class='btn btn-primary'");
echo form_close();?></td>
</tr>
</table>
</fieldset>
<fieldset class="body-border border-style" >
<legend class="body-head">ADD TARIFF</legend>
<div class="form-group">
<table>
<tr>
<td>
<div class="form-group">
<?php echo form_open(base_url()."tarrif/tarrif_manage");
		$class="form-control";
		$msg="Select Tariff Master";
		$name="select_tariff";
		$selected='';
echo $this->form_functions->populate_dropdown($name,$masters,$tariff_master_id,$class,$id='',$msg); 
?></div></td>
		
		<td><div class="form-group"><?php echo form_input(array('name'=>'fromdatepicker','class'=>'fromdatepicker form-control' ,'placeholder'=>' From Date','value'=>$from_date)); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'rate','class'=>'form-control','id'=>'rate','placeholder'=>'Rate','value'=>$rate)); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'additional_kilometer_rate','class'=>'form-control','id'=>'additional_kilometer_rate','placeholder'=>'Additional Kilometer Rate','value'=>$additional_kilometer_rate)); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'additional_hour_rate','class'=>'form-control','id'=>'additional_hour_rate','placeholder'=>'Additional Hour Rate','value'=>$additional_hour_rate)); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'driver_bata','class'=>'form-control','id'=>'driver_bata','placeholder'=>'Driver Bata','value'=>$driver_bata)); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'night_halt','class'=>'form-control','id'=>'night_halt','placeholder'=>'Night Halt','value'=>$night_halt)); ?></div></td>
		<td><div  class="tarrif-add" ><?php echo nbs(5);?><i class="fa fa-plus-circle"></i><?php echo nbs(5);?></div><div class="hide-me"><?php echo form_submit("tarrif-add","Add","id=tarrif-add-id","class=btn");?></div
	>
	</td>
		</tr>
		<tr>
		<td><?php  echo  $this->form_functions->form_error_session('select_tariff','<p class="text-red">', '</p>'); ?></td>
		<td><?php echo  $this->form_functions->form_error_session('fromdatepicker','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('rate','<p class="text-red">', '</p>');?></td>
		<td><?php  echo  $this->form_functions->form_error_session('additional_kilometer_rate','<p class="text-red">', '</p>'); ?></td>
		<td><?php echo  $this->form_functions->form_error_session('additional_hour_rate','<p class="text-red">', '</p>'); ?></td>
		<td><?php echo  $this->form_functions->form_error_session('driver_bata','<p class="text-red">', '</p>');?></td>
		<td><?php echo  $this->form_functions->form_error_session('night_halt','<p class="text-red">', '</p>'); ?></td>
		</tr>
</table>
</div>
</fieldset>
<fieldset class="body-border border-style">
<legend class="body-head">Manage Tarrif</legend>
<?php echo br();?>
<table>
<tr>
<td><?php echo form_label('Tariff Master ','tariff_Master'); ?></td>
<td><?php echo form_label('From Date','from_Date'); ?></td>
<td><?php echo form_label('Rate','rate'); ?></td>
<td><?php echo form_label('Additional Kilometer Rate','additional_Kilometer_Rate'); ?></td>
<td><?php echo form_label('Additional Hour Rate','additional_Hour_Rate'); ?></td>
<td><?php echo form_label('Driver Bata','driver_Bata'); ?></td>
<td><?php echo form_label('Night Halt','night_Halt'); ?></td>
<td></td>
<td></td>
</tr>
<?php 
foreach ($values as $det):
?>
<tr>
<td><div class="form-group"><?php echo form_open(base_url()."tarrif/tarrif_manage"); $class="form-control";
		$msg="Select Tariff Master";
		$name="manage_tariff";
		
echo $this->form_functions->populate_dropdown($name,$masters,$det['tariff_master_id'],$class,$id='',$msg); ?></div></td>
<td>
<div class="form-group"><?php echo form_input(array('name'=>'manage_datepicker','class'=>'fromdatepicker form-control' ,'placeholder'=>'Pick up From Date','value'=> $det['from_date'])); ?></div></td>
<td><div class="form-group"><?php echo form_input(array('name'=>'manage_rate','class'=>'form-control','id'=>'rate','placeholder'=>'Rate','value'=> $det['rate'])); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'manage_additional_kilometer_rate','class'=>'form-control','id'=>'additional_kilometer_rate','placeholder'=>'Additional Kilometer Rate','value'=> $det['additional_kilometer_rate'])); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'manage_additional_hour_rate','class'=>'form-control','id'=>'additional_hour_rate','placeholder'=>'Additional Hour Rate','value'=> $det['additional_hour_rate'])); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'manage_driver_bata','class'=>'form-control','id'=>'driver_bata','placeholder'=>'Driver Bata','value'=> $det['driver_bata'])); ?></div></td>
		<td><div class="form-group"><?php echo form_input(array('name'=>'manage_night_halt','class'=>'form-control','id'=>'night_halt','placeholder'=>'Night Halt','value'=> $det['night_halt'])); ?>
            <div class="hide-me"><?php echo form_input(array('name'=>'manage_id','class'=>'form-control','id'=>'manage_id','value'=> $det['id'],'trigger'=>'true' ));?></div></td>
<td><div  class="tarrif-edit" ><?php echo nbs(5);?><i class="fa fa-edit"></i><?php echo nbs(5);?></div><div class="hide-me xx"><?php echo form_submit("edit","Edit","id=tarrif-edit-id","class=btn");?></div></td>
<td><div  class="tarrif-delete" ><?php echo nbs(5);?><i class="fa fa-trash-o delete"></i><?php echo nbs(5);?></div><div class="hide-me"><?php echo form_submit("delete","Delete","id=tarrif-delete-id","class=btn ");?></div></td>
<?php echo form_close();?>
</tr>
<?php endforeach; ?>
</table>
<?php echo $page_links;?>
</fieldset>
</div>