
<!DOCTYPE html>
<html>
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
        <!-- user updation style.css -->
        <link href="<?php echo base_url();?>css/style.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="skin-blue">

	<div class="page-outer">
		<fieldset class="body-border">
			<legend class="body-head">Manage Files</legend>
			
			<?php echo form_open_multipart(base_url()."browse_xl/trips");?>
			<div class="form-group">
				<?php echo form_label('Select Trips File'); ?>
				<input type="file" name="csv" size="20" />

				<?php echo form_submit("submit","submit","class='btn btn-primary'"); ?>  
        		</div>
			<?php echo form_close(); ?>

		</fieldset>
	</div>


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="../../js/bootstrap.min.js" type="text/javascript"></script>        

    </body>
</html>

 
