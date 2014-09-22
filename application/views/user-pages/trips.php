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
?>

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
					    <th>Trip ID</th>
					    <th>Customer</th>
					    <th>Pickup Date</th>
					    <th>Pickup Loc</th>	
						 <th>Status</th>
						 <th>Action</th>
					</tr>
					<?php
					
					
					for($trip_index=0;$trip_index<count($trips);$trip_index++){
					?>
					<tr>
						<td><?php echo $trips[$trip_index]['id'];?></td>
					    <td><?php echo $customers[$trips[$trip_index]['customer_id']];?></td>
					    <td><?php echo $trips[$trip_index]['pick_up_date']; ?></td>
						 <td><?php echo $trips[$trip_index]['pick_up_city'];?></td>
					    <td>
							<span class="label <?php echo $status_class[$trips[$trip_index]['trip_status_id']]; ?>"><?php echo $trip_statuses[$trips[$trip_index]['trip_status_id']];?></span> 
						
						</td>	
						<td><?php echo anchor(base_url().'organization/front-desk/trip-booking/'.$trips[$trip_index]['id'],'Edit','class="btn btn-primary"'); ?></td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
	</fieldset>
</div>

