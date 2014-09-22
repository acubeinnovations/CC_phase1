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
	  <?php
	  //search?>

<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">Trips</legend>
		<div class="box-body table-responsive no-padding">
			
			<table class="table list-trip-table">
				<tbody>
					<tr>
					    <td> </td>
					    <td></td>
					    <td></td>
					   
						<td></td>
						<td></td>
						<td></td>
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

