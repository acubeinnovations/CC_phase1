<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	.username{
	border:1px solid #333;
	}
	.pass{
	border:1px solid #333;
	}
	</style>
</head>
<body>

<div id="container">
	
	<div id="body">
	   <h1>Login</h1>
		<?php if (isset($error) && $error == 'true') { ?>
          <div class="alert alert-error">
            <a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
          </div>
       <?php } ?>
	   <?php echo validation_errors(); ?>
	   <?php echo form_open('system_admin','class=form_login');
	   echo form_label("Username: ");
	   echo form_input("username","","class=username");
	   echo br();
	   echo form_label("Password: ");
	   echo form_password("password","","class=pass");
	   echo br();
	   echo form_submit("","Login");
	   echo form_close();
	   ?>
	</div>

	
</div>

   
 </body>
</html>

