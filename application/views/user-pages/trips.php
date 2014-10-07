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
if(!isset($trip_pick_date)){
$trip_pick_date='';
}
if(!isset($trip_drop_date)){
$trip_drop_date='';
}
if(!isset($customer)){
$customer='';
}
if(!isset($driver)){
$driver='';
}
if(!isset($vehicle)){
$vehicle='';
}
if(!isset($trip_status_id)){
$trip_status_id='';
}
$page=$this->uri->segment(4);
if($page==''){
$trip_sl_no=1;
}else{
$trip_sl_no=$page;
}
?>

<div class="trips">

<div class="box">
    <div class="box-body1">
<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">Trips</legend>
		<div class="box-body table-responsive no-padding">
			
			<?php echo form_open(base_url()."organization/front-desk/trips"); ?>
			<table class="table list-trip-table no-border">
				<tbody>
					<tr>
						<!--<td><?php echo form_input(array('name'=>'customer','class'=>'customer form-control' ,'placeholder'=>'Customer name','value'=>$customer)); ?></td>-->
					    <td><?php echo form_input(array('name'=>'trip_pick_date','class'=>'pickupdatepicker initialize-date-picker form-control' ,'placeholder'=>'Pick up Date','value'=>$trip_pick_date)); ?></td>
					    <td><?php  echo form_input(array('name'=>'trip_drop_date','class'=>'dropdatepicker initialize-date-picker form-control' ,'placeholder'=>'Drop Date','value'=>$trip_drop_date)); ?></td>
						 <td><?php $class="form-control";
							  $id='vehicles';
						echo $this->form_functions->populate_dropdown('vehicles',$vehicles,$vehicle,$class,$id,$msg="Select Vehicle");?></td>
						 <td><?php $class="form-control";
							  $id='drivers';
						echo $this->form_functions->populate_dropdown('drivers',$drivers,$driver,$class,$id,$msg="Select Driver");?></td>
						<td><?php $class="form-control";
							  $id='trip-status';
						echo $this->form_functions->populate_dropdown('trip_status_id',$trip_statuses,$trip_status_id,$class,$id,$msg="Select Trip Status");?></td>
					    <td><?php echo form_submit("trip_search","Search","class='btn btn-primary'");
echo form_close();?></td>
						
					</tr>
				</tbody>
			</table>
		</div>
	
	
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>	
						 <th>Sl No</th>
					    <th>Trip ID</th>
					    <th>Customer</th>
					    <th>Pickup Date</th>
					    <th>Pickup Loc</th>	
						<th>Drop Loc</th>	
						 <th>Status</th>
						<th>Vehicle</th>
						<th>Driver</th>
						 <th>Action</th>
					</tr>
					<?php
					
					for($trip_index=0;$trip_index<count($trips);$trip_index++){
					?>
					<tr>
						<td><?php echo $trip_sl_no;?></td>
						<td><?php echo $trips[$trip_index]['id'];?></td>
					    <td><?php echo $customers[$trips[$trip_index]['customer_id']];?></td>
					    <td><?php echo $trips[$trip_index]['pick_up_date'].' '.$trips[$trip_index]['pick_up_time']; ?></td>
						 <td><?php echo $trips[$trip_index]['pick_up_city'];?></td>
						 <td><?php echo $trips[$trip_index]['drop_city'];?></td>
					    <td>
							<span class="label <?php echo $status_class[$trips[$trip_index]['trip_status_id']]; ?>"><?php echo $trip_statuses[$trips[$trip_index]['trip_status_id']];?></span> 
						
						</td>	
						<td><?php if($trips[$trip_index]['vehicle_id']==gINVALID){ echo 'Vehicle not allocated';}else{echo $vehicles[$trips[$trip_index]['vehicle_id']]; }?></td>
						 <td><?php if($trips[$trip_index]['driver_id']==gINVALID){ echo 'Driver not allocated';}else{echo $drivers[$trips[$trip_index]['driver_id']]; }?></td>
						<td><?php if($trips[$trip_index]['trip_status_id']==TRIP_STATUS_CONFIRMED || $trips[$trip_index]['trip_status_id']==TRIP_STATUS_PENDING ) { echo anchor(base_url().'organization/front-desk/trip-booking/'.$trips[$trip_index]['id'],'EDIT','class="btn btn-primary"').nbs(5)."<a href=".base_url().'trip/complete/'.$trips[$trip_index]['id']." class='btn btn-primary'>COMPLETE</a>"; }else if($trips[$trip_index]['trip_status_id']==TRIP_STATUS_TRIP_COMPLETED){ echo "<a href=".base_url().'trip/view/'.$trips[$trip_index]['id']." class='btn btn-primary' target='_blank'>PRINT</a>".nbs(5)."<button class='btn btn-primary voucher' trip_id='".$trips[$trip_index]['id']."' driver_id='".$trips[$trip_index]['driver_id']."' tarrif_id='".$trips[$trip_index]['tariff_id']."' type='button'>VOUCHER</button>"; }else if($trips[$trip_index]['trip_status_id']==TRIP_STATUS_TRIP_BILLED){ echo "<button class='btn btn-primary voucher' trip_id='".$trips[$trip_index]['id']."' driver_id='".$trips[$trip_index]['driver_id']."' tarrif_id='".$trips[$trip_index]['tariff_id']."' type='button'>VOUCHER</button>"; } ?></td>
					</tr>
					<?php 
						$trip_sl_no++;
						}
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
	</fieldset>
</div>

</div><!-- /.box-body -->
   
	<div class='overlay-container'>
   		<div class="overlay modal"></div>
		<div class="loading-img"></div>
		<div class="modal-body border-2-px box-shadow">
			<div class="profile-body width-80-percent-and-margin-auto ">
			<fieldset class="body-border">
   			 <legend class="body-head">Trip Voucher</legend>
				<div class="div-with-50-percent-width-with-margin-10">
					<div class="form-group">
					   <?php echo form_label('Start KM Reading','startkm'); ?>
					   <?php echo form_input(array('name'=>'startkm','class'=>'form-control startkm','id'=>'startkm','placeholder'=>'Enter Start K M')); ?>			
						<span class="start-km-error text-red"></span>
					</div>
					<div class="form-group">
						<?php echo form_label('End Km Reading','endkm'); ?>
						<?php echo form_input(array('name'=>'endkm','class'=>'form-control endkm','placeholder'=>'Enter End KM')); ?>
						<span class="end-km-error text-red"></span>
					</div>
					<div class="form-group">
						<?php echo form_label('Gariage Clossing KM Reading','gariageclosingkm'); ?>
						<?php echo form_input(array('name'=>'garageclosingkm','class'=>'form-control garageclosingkm','placeholder'=>'Enter Gariage closing km')); ?>
						<span class="garage-km-error text-red"></span>
					</div>
					<div class="form-group">
						<?php echo form_label('Gariage Closing Time','gariageclosingtime'); ?>
						<?php echo form_input(array('name'=>'garageclosingtime','class'=>'form-control garageclosingtime initialize-time-picker','placeholder'=>'Enter Gariage Closing Time')); 
						?>
						<span class="garage-time-error text-red"></span>
					</div>
			
			
					<div class="form-group">
						<?php echo form_label('Releasing Place','releasingplace'); ?>
						<?php echo form_input(array('name'=>'releasingplace','class'=>'form-control releasingplace','placeholder'=>'Enter Releasing Place')); 
						?>
					</div>
				</div>
				<div class="div-with-50-percent-width-with-margin-10">
					<div class="form-group">
						<?php echo form_label('Parking Fee','parking'); ?>
						<?php echo form_input(array('name'=>'parkingfee','class'=>'form-control parkingfee','placeholder'=>'Enter Parking Fee')); ?>
					
					</div>
					<div class="form-group">
						<?php echo form_label('Toll Fee','tollfee'); ?>
						<?php echo form_input(array('name'=>'tollfee','class'=>'form-control tollfee','placeholder'=>'Enter Toll Fee')); ?>
					
					</div>
					<div class="form-group">
						<?php echo form_label('State Tax','statetax'); ?>
						<?php echo form_input(array('name'=>'statetax','class'=>'form-control statetax','placeholder'=>'Enter State Tax')); 
						?>
					</div>
			
			
					<div class="form-group">
						<?php echo form_label('Night Halt','nighthalt'); ?>
						<?php echo form_input(array('name'=>'nighthalt','class'=>'form-control nighthalt','placeholder'=>'Enter Night Halt')); 
						?>
					</div>
					<div class="form-group">
						<?php echo form_label('Extra Fuel Charge','extrafuel'); ?>
						<?php echo form_input(array('name'=>'extrafuel','class'=>'form-control extrafuel','placeholder'=>'Enter Extra Fuel Charge')); ?>
					
					</div>
			   		<div class="box-footer">
					<?php echo form_submit("trip-voucher-save","SAVE","class='btn btn-success trip-voucher-save'").nbs(5);  ?><button class='btn btn-danger modal-close' type='button'>CLOSE</button>  
					</div>
				</div>
			</div>
			</fieldset>
		</div><!-- body -->

		</div>
	</div>
    <!-- end loading -->
</div>	
</div>

