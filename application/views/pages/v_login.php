<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Trace & Tracking&trade;</title>
	<!-- // start:style for must include this page // -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/style.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/base.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>asset/css/font-awesome.min.css">
	<!-- // end:style for must include this page // -->

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>g
    <![endif]-->
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
										LOGIN FORM<br/>
									</div>
								</div>
								<div class="login-left-form">
									<form action="<?php echo base_url();?>login/cek_login" method="post">
										<div class="form-group user-form">
											<div class="input-group input-group-lg">
											  	<span class="input-group-addon" id="sizing-addon1">
											  		<img src="<?php echo base_url();?>asset/images/login/user.png">
											  	</span>
											  	<input type="text" class="form-control" name="username" id="username" placeholder="Username">
											</div>
										</div>
										<div class="form-group key-form">
											<div class="input-group input-group-lg">
											  	<span class="input-group-addon" id="sizing-addon1">
											  		<img src="<?php echo base_url();?>asset/images/login/key.png">
											  	</span>
											  	<input type="password" class="form-control" name="password" id="password" placeholder="Password">
											</div>
										</div>
										<div class="form-group">
											<button type="submit" class="btn-link btn-login">LOG IN <i class="fa fa-angle-right"></i></button>
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
						<p>Copyright &copy; 2015, All right reserved.</p>
					</div>
				</div>
				<!-- end:login copyright -->
			</div>
			<!-- end:login main -->
		</div>
	<!-- // end:wrapper login // -->

	<!-- // start:javascript for must include this page // -->
	<script src="<?php echo base_url()?>asset/js/jquery-1.11.2.min.js"></script>
	<script src="<?php echo base_url()?>asset/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url()?>asset/js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript">
      //<![CDATA[
      $(document).ready(function(){
        $('.carousel').carousel()
      });
      //]]>
    </script>
	<!-- // end:javascript for must include this page // -->

</body>
</html>
<p align="center">
