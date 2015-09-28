<!DOCTYPE html>
<html lang="en"><head>
		<meta charset="utf-8" />
		<title>Track & Trace Sistem -<?php echo isset($title)?$title:'';?></title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!--basic styles-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>assets/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="<?php echo base_url();?>assets/css/font-awesome.min.css" />
  
        <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->
		<!--fonts-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-responsive.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!--inline styles related to this page-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

	<body>
		<div class="navbar">
			<div class="navbar-inner">
			  <div class="container-fluid">
					<a href="#" class="brand">
						<small>
							
		<label class="company-name"><i class="icon-leaf"></i><font color="#00FF80"> ATT-GROUP </font>Internal <em>Systems</em></label>
						</small>
					</a><!--/.brand-->

				  <ul class="nav ace-nav pull-right">
                        <li class="light-blue">
                          <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?php echo base_url();?>assets/avatars/user.jpg" alt="Jason's Photo" />
                            <span class="user-info">
                              <small>Welcome,</small>
                              <?php echo $this->session->userdata('username');?>
                          </span>
                            
                            <i class="icon-caret-down"></i>
                          </a>
                          
                          <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                            <li>
                              <a href="#">
                                <i class="icon-cog"></i>
                                Settings
                              </a>
                            </li>
                            
                            <li>
                              <a href="#">
                                <i class="icon-user"></i>
                                Profile
                              </a>
                            </li>
                            
                            <li class="divider"></li>
                            
                            <li>
                              <a href="<?php echo base_url()?>login/logout">
                                <i class="icon-off"></i>
                                Logout
                              </a>
                            </li>
                          </ul>
                        </li>
					</ul>
                    	<ul class="nav ace-nav pull-right"><li class="purple"><li class="purple">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell"></i>
								<span class="badge badge-important">8 Notification</span>
							</a>

							<ul class="pull-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-closer">
								<li class="nav-header">
									<i class="icon-warning-sign"></i>
									8 Notifications Incoming
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-pink icon-comment"></i>
												New Order
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Bob just Change user data...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												Transaction
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-info icon-twitter"></i>
												Followers
											</span>
											<span class="pull-right badge badge-info">+11</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										See all notifications
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
 </li>
</ul>
					<!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
			  <div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<a href="<?php echo base_url();?>master/gallery"><button class="btn btn-small btn-danger">
                        <i class="icon-envelope"></i>
                   
						</button></a>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li>
						<a href="<?php echo base_url();?>dashboard">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
            <li>
              <label>&nbsp; MASTER &raquo;   </label></li>

					<li> <a href="#" class="dropdown-toggle"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="menu-text"> Internal Master </span> <b class="arrow icon-angle-down"></b> </a>
                      <ul class="submenu">
                        <li> <a href="<?php echo base_url();?>master/view_user"> <i class="icon-double-angle-right"></i><i class="fa fa-users"></i> &nbsp; User </a> </li>
                        <li> <a href="<?php echo base_url();?>staff/view_staff"> <i class="icon-double-angle-right"></i><i class="fa fa-male"></i> &nbsp;&nbsp; Staff </a> </li>
                        <li> <a href="<?php echo base_url();?>master/view_disc"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-star-half-full"></i> &nbsp; Discount</a></li>
                        <li> <a href="<?php echo base_url();?>master/view_service"> <i class="icon-double-angle-right"></i><i class="fa fa-coffee"></i> &nbsp; Service</a></li>

                      </ul>
				  </li>
					<li>
						<a href="#" class="dropdown-toggle">
						<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
							<span class="menu-text"> Region Master </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">


							<li>
								<a href="<?php echo base_url();?>master/view_city">
		<i class="icon-double-angle-right"></i><i class="fa fa-industry"></i> &nbsp;City
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>master/view_country">
									<i class="icon-double-angle-right"></i>
	<i class="fa fa-flag"></i> &nbsp;Country</a>
							</li>
                     <li>
						<a href="<?php echo base_url();?>master/view_state">
						<i class="icon-double-angle-right"></i>
		<i class="fa fa-bank"></i> &nbsp;State</a>                     
                        </li>
               
						</ul>
				  </li>
					<li> <a href="#" class="dropdown-toggle"> <span class="glyphicon glyphicon-link" aria-hidden="true"></span> <span class="menu-text"> Relation Master </span> <b class="arrow icon-angle-down"></b> </a>
                      <ul class="submenu">
                        <li> <a href="<?php echo base_url();?>master/view_customer"> <i class="icon-double-angle-right"></i> </i>
		<i class="fa fa-opencart"></i> &nbsp; Customers </a> </li>
                          <li> <a href="<?php echo base_url();?>master/view_vendor"> <i class="icon-double-angle-right"></i> </i>
		<i class="fa fa-cubes"></i> &nbsp; Vendor</a></li>
                      </ul>
				  </li>
         <li>


           <label>&nbsp; TRANSACTION    &raquo;</label>

           <li> <a href="#" class="dropdown-toggle"> <i class="icon icon-strikethrough bigger-270" aria-hidden="true"></i> <span class="menu-text"> Booking </span> <b class="arrow icon-angle-down"></b> </a>
              <ul class="submenu">
             <li><a href="<?php echo base_url();?>transaction/booking_shipment"> <i class="icon-double-angle-right"></i> </i>
		<i class="fa fa-book"></i> &nbsp; Booking Shipment </a> </li>
            <li> <a href="<?php echo base_url();?>transaction/booking_list"> <i class="icon-double-angle-right"></i> </i>
		<i class="icon icon-file-text bigger-120"></i> &nbsp; Booking List</a></li>
		 <li> <a href="<?php echo base_url();?>transaction/domesctic_outgoing"> <i class="icon-double-angle-right"></i> </i>
		<i class="icon icon-fighter-jet bigger-120"></i> &nbsp;Air Dom. Outgoing</a></li>
                      </ul>
				  </li>
         
					<li>
						<a href="<?php echo base_url('transaksi/add_transaksi')?>">
							<i class="icon-exchange"></i>
							<span class="menu-text"> Add Trans </span>
						</a>
					</li>
                   
                 					<li>
						<a href="<?php echo base_url();?>transaksi/add_invoice">
							<i class="icon-list"></i>
							<span class="menu-text"> Invoice </span>
					</a></li>
                               					<li>
						<a href="<?php echo base_url();?>trace">
							<i class="icon-fighter-jet"></i>
							<span class="menu-text"> Trace </span>
					</a></li>
			  </ul><!--/.nav-list-->

<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
			  </div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
					<ul class="breadcrumb">
						<li>
							<i class="icon-home home-icon"></i>
							<a href="<?php echo base_url();?>dashboard">Home</a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						</li>

						
							<a href="<?php echo base_url();?><?php echo $scrumb;?>"><?php echo isset($scrumb_name)?$scrumb_name:'';?></a>

							<span class="divider">
								<i class="icon-angle-right arrow-icon"></i>
							</span>
						
						<?php echo isset($scrumb_name)?$scrumb_name:'';?>
					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						
					</div><!--#nav-search-->
				</div>

				<div class="page-content">
					<div class="row-fluid">
						<div class="span12">
							<!--PAGE CONTENT BEGINS-->

							<!--PAGE CONTENT ENDS-->
						<?php $this->load->view($view);?>
                        
                        </div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			
				    </div>

						<div></div>
			  </div>
		  </div><!--/#ace-settings-container-->
	</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url();?>assets/js/ace-elements.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/js/ace.min.js"></script>

		<!--inline scripts related to this page-->
	</body>
</html>
