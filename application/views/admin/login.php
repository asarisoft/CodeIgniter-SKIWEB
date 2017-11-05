<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo config_item('title');?></title>

	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>">
   	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/css/styles.css')?>">
	<link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('assets/font-awesome/css/font-awesome.min.css')?>" >
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url('assets/img/icon.ico')?>" />
</head>

<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading"><i class="fa fa-sign-in fa-lg"></i></span><span> Login </span></div>
				<div class="panel-body">
					<form action="<?php echo base_url('admin/login.html')?>" id="form"  method="post">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" autofocus="">
								<span class="help-block"><?php echo form_error('username'); ?></span>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
								<span class="help-block"><?php echo form_error('password'); ?></span>
							</div>
							<span class="help-block"><?php echo $login_error; ?></span>
							<button type="submit" class="btn btn-info"><span class="icon_"><i class="fa fa-sign-in fa-lg"></i></span><span> Login </span></a>
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
