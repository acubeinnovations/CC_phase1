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

if(!isset($customer)){
$customer='';
}
if(!isset($customer_type_id)){
$customer_type_id='';
}
if(!isset($mobile)){
$mobile='';
}
?>

<div class="page-outer">    
	<fieldset class="body-border">
		<legend class="body-head">Customers</legend>
		
		<div class="box-body table-responsive no-padding">
			
			<?php echo form_open(base_url()."organization/front-desk/customers"); ?>
			<table class="table list-trip-table no-border">
				<tbody>
					<tr>
						<!--<td><?php echo form_input(array('name'=>'customer','class'=>'customer form-control' ,'placeholder'=>'Customer name','value'=>$customer)); ?></td>-->
					    <td><?php echo form_input(array('name'=>'customer','class'=>'customer form-control' ,'placeholder'=>'Customer Name','value'=>$customer)); ?></td>
					<td><?php echo form_input(array('name'=>'mobile','class'=>'mobile form-control' ,'placeholder'=>'Mobile Number','value'=>$mobile)); ?></td>
						<td><?php $class="form-control";
							  $id='vehicles';
						echo $this->form_functions->populate_dropdown('customer_type_id',$customer_types,$customer_type_id,$class,$id='',$msg="Select Customer type");?> </td>
						 
					    <td><?php echo form_submit("customer_search","Search","class='btn btn-primary'");
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
					     <th>Name</th>
					    <th>DOB</th>
					    <th>Email</th>	
						<th>Phone</th>	
						<th>Customer Type</th>
						<th>Action</th>
					</tr>
					<?php
					
					for($customer_index=0;$customer_index<count($customers);$customer_index++){
					?>
					<tr>
						<td><?php echo $customers[$customer_index]['id'];?></td>
						<td><?php echo $customers[$customer_index]['name'];?></td>
					    <td><?php echo $customers[$customer_index]['dob'];?></td>
					    <td><?php echo $customers[$customer_index]['email']; ?></td>
						 <td><?php echo $customers[$customer_index]['mobile'];?></td>	
						 <td><?php if($customers[$customer_index]['customer_type_id']==gINVALID || $customers[$customer_index]['customer_type_id']==0){ echo "Not set";}else{echo $customer_types[$customers[$customer_index]['customer_type_id']];}?></td>
						<td><?php echo anchor(base_url().'organization/front-desk/customer/'.$customers[$customer_index]['id'],'Edit','class="btn btn-primary"'); ?></td>
					</tr>
					<?php 
						}
					?>
				</tbody>
			</table><?php echo $page_links;?>
		</div>
		
	</fieldset>
</div>

