<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php echo form_open(base_url().'admin/organization/new');?>
<table width="258" border="0">
  <tr>
    <td width="106"><?php echo form_label('Organization Name');?></td>
    <td width="142"><?php echo form_input(array(
              'name'        => 'name',
              'id'          => 'name',
              'maxlength'   => '50',
              'size'        => '35',
             
            ));?></td>
  </tr>
  <tr>
    <td><?php echo form_label('Address');?></td>
    <td><?php echo form_textarea(array(
              'name'        => 'addr',
              'id'          => 'addr',
	      'size'        => '35',
              'maxlength'   => '50',
              
            ));?></td>
  </tr>
  <tr>
    <td><?php if(isset($msg)) echo $msg; ?></td>
    <td><?php echo form_submit('submit','Save') ;?></td>
  </tr>
</table>
<?php echo form_close(); ?>
</body>
</html>