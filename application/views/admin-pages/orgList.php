<html>
<head>
<title></title>
</head>
<body>
<table>
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
<?  echo form_close();
	end foreach;
?>
</table>
</body>
</html>