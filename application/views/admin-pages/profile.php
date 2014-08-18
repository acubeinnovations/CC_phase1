<?php if(isset($values)){
	$username=	$values[0]->username;
	$Firstname= $values[0]->first_name; 
	$Lasttname= $values[0]->last_name; 
	$email= 	$values[0]->email; 
	$phone= 	$values[0]->phone; 
	$address= 	$values[0]->address; 
}else{
	$username=	'';
	$Firstname= ''; 
	$Lasttname= ''; 
	$email= 	''; 
	$phone= 	''; 
	$address= 	''; 

}
?>
	 <div class="profile-body">
		<?php echo form_open(base_url().'admin/profile');?>
        <div class="form-group">
		   <?php echo form_label('Username','usernamelabel'); ?>
           <?php echo form_input(array('name'=>'username','class'=>'form-control','id'=>'username','placeholder'=>'Enter Username','value'=>$username)); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('First Name','firstnamelabel'); ?>
            <?php echo form_input(array('name'=>'firstname','class'=>'form-control','placeholder'=>'Enter First Name','value'=>$Firstname)); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Last Name','lastnamelabel'); ?>
            <?php echo form_input(array('name'=>'lastname','class'=>'form-control','placeholder'=>'Enter Last Name','value'=>$Lasttname)); ?>
        </div>
		<div class="form-group">
			<?php echo form_label('Email','emaillabel'); ?>
            <?php echo form_input(array('name'=>'email','class'=>'form-control','placeholder'=>'Enter email','value'=>$email)); ?>
        </div>
        <div class="form-group">
			<?php echo form_label('Phone','phonelabel'); ?>
            <?php echo form_input(array('name'=>'phone','class'=>'form-control','placeholder'=>'Enter Phone','value'=>$phone)); ?>
        </div>
		<div class="form-group">
			<?php echo form_label('Address','addresslabel'); ?>
            <?php echo form_textarea(array('name'=>'address','class'=>'form-control','placeholder'=>'Enter Address','value'=>$address)); ?>
        </div>
   		<div class="box-footer">
		<?php echo form_submit("admin-profile-update","Update","class='btn btn-primary'");  ?>  
        </div>
	 <?php echo form_close(); ?>
	</div><!-- body -->

