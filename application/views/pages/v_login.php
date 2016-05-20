<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Domestic System</title>
	<!-- // start:style for must include this page // -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/responsive.css">
   
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/font-awesome.min.css">
<style type="text/css">
	.img{height:45%; width:35%; opacity: 1;}
	IMG{opacity: 0.3;}
	body{
		background: #043100;
		opacity: 0.9;
background: -webkit-gradient(linear, left bottom, right top, color-stop(0%, #04385D), color-stop(50%, #7D90A7), color-stop(100%, #062338));
background: -moz-linear-gradient(left bottom 45deg, #04385D 0%, #7D90A7 50%, #062338 100%);}

</style>
</head>
<body id="wrapper-login">
	<!-- // start:wrapper login // -->
		<div class="container">
			<!-- start:login main -->
			<div class="login-main">
				<!-- start:login main top -->
				<div class="login-main-top">
					<div class="row">
						<!-- start:login left -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 login-form-main">
							<div class="login-left">
								<div class="login-left-header">
									<div class="text-center">
									<span><img src="<?php echo base_url();?>asset/images/login.jpg" class="img"></span><h3>LOGIN FORM</h3>
								
									</div>
								</div>
								<div class="login-left-form">
									<form action="<?php echo base_url();?>login/cek_login" method="post">
										<div class="form-group user-form">
											<div class="input-group input-group-lg">
											  	<span class="input-group-addon" id="sizing-addon1">
											  		<img src="<?php echo base_url();?>asset/images/user.png">
											  	</span>
											  	<input type="text" class="form-control" name="username" id="username" placeholder="Username">
											</div>
										</div>
										<div class="form-group key-form">
											<div class="input-group input-group-lg">
											  	<span class="input-group-addon" id="sizing-addon1">
											  		<img src="<?php echo base_url();?>asset/images/pass.jpg">
											  	</span>
											  	<input type="password" class="form-control" name="password" id="password" placeholder="Password">
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn-link btn-login">LOGIN<i class="fa fa-angle-right"></i></button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<!-- end:login left -->
					</div>
				</div>
				<!-- end:login main top -->
				<!-- start:login copyright -->
				<div class="login-main-bottom">
					<div class="text-center">
						<p>Copyright &copy; 2015, All right reserved - ATT-Group.</p>
					</div>
				</div>
				<!-- end:login copyright -->
			</div>
			<!-- end:login main -->
		</div>

	<script src="<?php echo base_url()?>asset/js/jquery.js"></script>
	<script src="<?php echo base_url()?>asset/js/bootstrap.js"></script>
    <script type="text/javascript">


</body>
</html>
<p align="center">
