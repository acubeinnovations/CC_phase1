
<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title><?php echo $title;?></title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="../../css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="../../css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="../../css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="bg-black">

        <div class="form-box" id="login-box">
            <div class="header">Sign In</div>
            <?php echo form_open(base_url().'syslogin','class=form_login');?>
                <div class="body bg-gray">
                    <div class="form-group">
						<?php echo form_input(array('name' => 'username','class'=>'username form-control','placeholder'=>'User ID')); ?>
                    </div>
                    <div class="form-group">
						<?php echo form_password(array('name'=>'password','class'=>'pass form-control','placeholder'=>'Password')); ?>
                    </div>          
                   <?php if ($error == true) { ?>
					 <div class="form-group">
						<a class="close" data-dismiss="alert" href="#">×</a>Incorrect Username or Password!
					  </div>
    		   <?php } ?>
                </div>
                <div class="footer">  
					<?php echo form_submit("","Login","class='btn bg-olive btn-block'");  ?>                                                       
                                      
                 </div>
        	 <?php echo form_close(); ?>

            <div class="margin text-center">
                

            </div>
        </div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>

 
