<html>
<head>
<title></title>
</head>
<body>
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
</body>
</html>