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
		<legend class="body-head">List Drivers</legend>
		<div class="box-body table-responsive no-padding">
			<?php echo form_open(base_url().'organization/front-desk/list-driver');?>
			<table class="table list-org-table">
				<tbody>
					<tr>
					    <td><?php echo form_input(array('name'=>'driver_name','class'=>'form-control','id'=>'driver_name','placeholder'=>'By Name','size'=>30));?> </td>
				
					    <td><?php echo form_submit("search","Search","class='btn btn-primary'");?></td>
					    <?php echo form_close();?>
						<td><?php echo nbs(55); ?></td>
						<td><?php echo nbs(35); ?></td>
						<td><?php echo form_open( base_url().'organization/front-desk/driver');
								  echo form_submit("add","Add","class='btn btn-primary'");
								  echo form_close(); ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
					    <th>Driver Name</th>
					    <th>Contact Info</th>
					    
					</tr>
					<?php
					if(isset($values)){
					foreach ($values as $det):
					?>
					<tr>
					    <td><?php echo anchor(base_url().'organization/front-desk/driver-profile/'.$det['id'],$det['name']).nbs(3);?></td>
					    <td><?php echo $det['phone'].",".$det['mobile']?></td>	
						
					</tr>
					<?php endforeach;
					}
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
	</fieldset>
</div>

