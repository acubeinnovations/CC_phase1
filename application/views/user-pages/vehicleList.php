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
						 <td><?php echo form_input(array('name'=>'owner','class'=>'form-control','id'=>'owner','placeholder'=>'By Owner Name','size'=>30));?> </td>
						<td><?php $class="form-control";
						echo $this->form_functions->populate_dropdown('v_type',$vehicle_types,$selected='',$class,$id='',$msg='Select Vehicle Type')?></td>
						<td><?php $class="form-control";
						echo $this->form_functions->populate_dropdown('v_model',$vehicle_models,$selected='',$class,$id='',$msg='Select Vehicle Model')?></td>
						
					    <td><?php echo form_submit("search","Search","class='btn btn-primary'");?></td>
					    <?php echo form_close();?>
						<td><?php echo nbs(55); ?></td>
						<td><?php echo nbs(35); ?></td>
						<td><?php echo form_submit("add","Add","class='btn btn-primary'");?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
					    <th>Registration Number </th>
					    <th>Vehicle Type</th>
						<th>Vehicle Owner</th>
						<th>Vehicle Model</th>
					    
					</tr>
					<?php
					if(isset($values)){ print_r($values);
					foreach ($values as $det):
					?>
					<tr>
					    <td><?php echo $det['registration_number'];?></td>
						<td><?php echo $det['vehicle_owner_id'];?></td>
						<td><?php echo $det['vehicle_type_id'];?></td>
						<td><?php echo $det['vehicle_model_id'];?></td>
						<td><?php echo anchor(base_url().'organization/front-desk/vehicle/'.$det['id'], 'Edit', 'title="News title"','class="btn btn-primary"');?></td>
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
