<?php    if($this->session->userdata('dbSuccess') != '') { 
?>

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
		<legend class="body-head">List Vehicles</legend>
		<div class="box-body table-responsive no-padding">
			<?php echo form_open(base_url().'organization/front-desk/list-vehicle');?>
			<table class="table list-org-table">
				<tbody>
					<tr>
					    <td><?php echo form_input(array('name'=>'reg_num','class'=>'form-control','id'=>'reg_num','placeholder'=>'By Registration Number','size'=>30));?> </td>
						 <td><?php $class="form-control";
						echo $this->form_functions->populate_dropdown('owner',$vehicle_owners,$selected='',$class,$id='',$msg='Select Vehicle Owner')?> </td>
						<td><?php $class="form-control";
						echo $this->form_functions->populate_dropdown('v_type',$vehicle_types,$selected='',$class,$id='',$msg='Select Vehicle Type')?></td>
						<td><?php $class="form-control";
						echo $this->form_functions->populate_dropdown('v_model',$vehicle_models,$selected='',$class,$id='',$msg='Select Vehicle Model')?></td>
						
					    <td><?php echo form_submit("search","Search","class='btn btn-primary'");?></td>
					    <?php echo form_close();?>
						<td><?php echo nbs(55); ?></td>
						<td><?php echo nbs(35); echo form_close(); ?></td>
						<td><?php echo form_open( base_url().'organization/front-desk/vehicle');
								  echo form_submit("add","Add","class='btn btn-primary'");
								  echo form_close(); 
						?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
					    <th>Registration Number </th>
						<th>Vehicle Owner</th>
						<th>Owner's Contact Info</th>
						<th>Owner's Location</th>
						<th>Vehicle Model</th>
					    
					</tr>
					<?php
					if(isset($values)){  //print_r($values);exit;
					foreach ($values as $det): 
				
					?>
					<tr> 
					    <td><?php  echo anchor(base_url().'organization/front-desk/vehicle/'.$det['id'],$det['registration_number']).nbs(3);?></td>
						<td><?php if($det['vehicle_owner_id']<=0){ echo '';}else{echo $vehicle_owners[$det['vehicle_owner_id']];}?></td>
						<td><?php if($det['vehicle_owner_id']<=0){ echo '';}else{echo $owner_details[$det['vehicle_owner_id']]['mobile'];} ?></td>
						<td><?php if($det['vehicle_owner_id']<=0){ echo '';}else{echo $owner_details[$det['vehicle_owner_id']]['address'];} ?></td>
						<td><?php if($det['vehicle_model_id']<=0){ echo '';}else{echo $vehicle_models[$det['vehicle_model_id']];}?></td>
						
						<td><?php ?></td>
					
					    	
						
					</tr>
					<?php endforeach;
					}
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
	</fieldset>
	<?php echo form_close(); ?>
</div>
