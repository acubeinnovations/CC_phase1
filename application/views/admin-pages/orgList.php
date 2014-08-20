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
<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">List Organizations</legend>
		<div class="box-body table-responsive no-padding">
			<table class="table table-hover table-bordered">
				<tbody>
					<tr>
					    <th>Organization Name</th>
					    <th>Address</th>
					    <th>Status</th>
					    <th>Action</th>
					</tr>
					<?php
					$status=array('1'=>'Active','2'=>'Inactive');
					foreach($values as $row):
					?>
					<tr>
					    <td><?php echo $row['name'];?></td>
					    <td><?php echo $row['address'] ;?></td>
					    <td><?php if($row['status_id'] == 1) { ?>
							<span class="label label-success"><?php echo $status[$row['status_id']];?></span> 
						<?php } else {?>
							<span class="label label-danger"> <?php echo $status[$row['status_id']];?></span>
						<?php } ?>
						</td>	
						<td><?php echo anchor(base_url().'admin/organization/'.$row['name'],'Update','class="btn btn-primary"').nbs(3).anchor(base_url().'admin/organization/'.$row['name'].'/password-reset','Change Password','class="btn btn-primary"'); ?></td>
					</tr>
					<?php endforeach;
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
	</fieldset>
</div>

