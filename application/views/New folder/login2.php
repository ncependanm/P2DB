<?php
if($this->session->userdata('id_users')!='')
{
    redirect('backend/tahunAjaran');
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
	 
	 
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
		<link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url();?>assets/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url();?>asset/css/components.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/plugins.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url();?>asset/css/login.css" rel="stylesheet" type="text/css" />
        <link rel="shortcut icon" href="favicon.ico" /> 
  </head>
  <body class=" login">
        <div class="logo">
            <a href="index.html">
                <img src="<?= base_url();?>asset/img/logo-big.png" alt="" /> </a>
        </div>
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
			    <form class="login-form" action="<?= base_url();?>auth/login" method="post" autocomplete="off">
				<h3 class="form-title">Login to your account</h3>
                <div class="alert alert-danger display-hide">
                    <button class="close" data-close="alert"></button>
                    <span> Enter any username and password. </span>
                </div>
				<div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-user"></i>
						<input type="text" name="username" required="" placeholder="Username ..." autofocus="" class="form-control placeholder-no-fix">
					</div>
                </div>
				<div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-key"></i>
						<input type="password" name="password" placeholder="Password" required="" class="form-control placeholder-no-fix">
					</div>
                </div>
				<div class="form-group">
                    <div class="input-icon">
                        <i class="fa fa-lock"></i>
						<input type="text" name="kode_aman" placeholder="Capcha" required="" class="form-control placeholder-no-fix" style="width: 50% !important; float: left;">
						<div style="float : right; margin-bottom: 15px;">
							<?php echo $image;?>
						</div>
					</div>
                </div>
				<div class="form-actions">
					<button type="submit" name="submit" class="btn btn-danger"> Login </button>
                </div>
				<!--<div class="create-account">
                    <p> Belum mempunyai akun ?&nbsp;
                        <a href="javascript:;" id="register-btn"> Create an account </a>
                    </p>
                </div>-->
          </form>
        </div>
        <div class="copyright"> 2016 &copy; Encep Endan Mochsidar </div>

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url();?>assets/js/1.8.2.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
    	<link rel="stylesheet" href="<?php echo base_url();?>assets/themes/base/jquery.ui.all.css">
	<script src="<?php echo base_url();?>assets/js/jquery-1.9.1.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.core.js"></script>
	<script src="<?php echo base_url();?>assets/ui/jquery.ui.widget.js"></script>
	
	        <script src="<?php echo base_url();?>asset/js/jquery.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url();?>asset/js/js.cookie.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/app.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>asset/js/login.js" type="text/javascript"></script>
  </body>
</html>