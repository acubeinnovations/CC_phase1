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
       <?php    } 
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
}?>
<div class="tarrif_body">
<fieldset class="body-border border-style" >
<legend class="body-head">ADD TARIFF</legend>
<table class="tbl_tarrif">
<tr><td><div class="form-group">
<?php echo form_open(base_url()."tarrif/add_tarrif");
		$class="form-control";
		$msg="Select Tariff Master";
		$name="select_tariff";
		$selected='';
echo $this->form_functions->populate_dropdown($name,$masters,$tariff_master_id,$class,$msg); 
?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('select_tariff','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'fromdatepicker','class'=>'form-control' ,'id'=>'fromdatepicker','placeholder'=>'Pick up From Date','value'=>$from_date)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('fromdatepicker','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'rate','class'=>'form-control','id'=>'rate','placeholder'=>'Rate','value'=>$rate)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('rate','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'additional_kilometer_rate','class'=>'form-control','id'=>'additional_kilometer_rate','placeholder'=>'Additional Kilometer Rate','value'=>$additional_kilometer_rate)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('additional_kilometer_rate','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'additional_hour_rate','class'=>'form-control','id'=>'additional_hour_rate','placeholder'=>'Additional Hour Rate','value'=>$additional_hour_rate)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('additional_hour_rate','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'driver_bata','class'=>'form-control','id'=>'driver_bata','placeholder'=>'Driver Bata','value'=>$driver_bata)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('driver_bata','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="form-group"><?php echo form_input(array('name'=>'night_halt','class'=>'form-control','id'=>'night_halt','placeholder'=>'Night Halt','value'=>$night_halt)); ?></div></td>
<td><?php  echo  $this->form_functions->form_error_session('night_halt','<p class="text-red">', '</p>'); ?></td></tr>
<tr><td><div class="box-footer"><?php echo form_submit("tarrif-add","Save","class='btn btn-primary'"); ?></div><td></tr>
</table>
<?php echo form_close();?>
</fieldset>
</div>