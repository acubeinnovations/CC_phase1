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
       
<div class="new-org-body">
<div class="form-group">
<table border="1">
<tr><td>Organization Name</td><td>Address</td><td>Status</td><td>Action</td></tr>
<?php 
$status=array('1'=>'Active','2'=>'Inactive');
foreach($values as $row):
echo form_open(base_url().'admin/Update');?>
<tr>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['address'] ;?></td>
<td><?php echo $status[$row['status_id']];?></td>
<td><?php echo form_submit('submit','Update') ;?></td>
</tr>
<?php echo form_close();
	endforeach;
?>
</table>
</div>
</div>


