<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8" />
		<title>Domestic System - <?php echo isset($title)?$title:'';?></title>

<meta name="description" content="" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="shortcut icon" href="<?php echo base_url();?>asset/images/favicon.ico">
<!-- font from w3schools -->  
<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=brick-sign">

<!-- font from w3schools -->

		<!--basic styles-->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css" />
  

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" />
	
        <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
 <!-- SWEET ALERT-->
  <link rel="stylesheet" href="sweetalert/example/example.css">
  <script src="<?php echo base_url();?>asset/sweetalert/dist/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="<?php echo base_url();?>asset/sweetalert/dist/sweetalert.css">
    <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
     <!-- sweet alert -->
		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->
		<!--fonts-->
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!--ace styles-->
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ace.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ace-responsive.min.css"/>
<link rel="stylesheet" href="<?php echo base_url();?>asset/css/ace-skins.min.css" />
  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
.select2{
	width:99%;
	line-height:35px;
	margin-top:3px;
	margin-bottom:3px;
}

	.bigger{color:#040AF7;
	}
.must{
	color:red;
	font-size:x-small;
	font-weight:bold;
}
.info-box{
	width:300px;
	height:70px;
	border:none;
	color:#FFF;
	margin-bottom:20px;
}
.info-box .col-sm-3{
	height:100%;
	font-size:36pt;
	text-align:center;
    background:linear-gradient(90deg, rgb(66, 152, 104), #409766);
}
.info-box .col-sm-9{
	background-color:green;
	font-size:large;
	text-align:left;
	padding-top:5%;
	height:100%;
    background: -o-linear-gradient(-30deg, #56AF78, #47A96C);
    background: -moz-linear-gradient(-30deg, #56AF78, #47A96C); 
    background:linear-gradient(-30deg, #56AF78, #47A96C);
}

</style>

<script type="text/javascript">
function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}
</script>

</head>
	<body>
		<div class="navbar">
			<div class="navbar-inner">
			  <div class="container-fluid">
					<a href="#" class="brand">
						<small>
							
		<label class="company-name"><i class="icon-leaf"></i><span class="comp-name"> ATT-GROUP </span> <span class="app-name">Internal Systems Application</span> </label>
						</small>
					</a><!--/.brand-->

				  <ul class="nav ace-nav pull-right">
                        <li class="light-blue">
                          <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                            <img class="nav-user-photo" src="<?php echo base_url();?>asset/avatars/avatar2.png"/>
                            <span class="user-info">
                              <small>Welcome,</small>
                              <?php echo $this->session->userdata('nameusr');?>
                          </span>
                            
                            <i class="icon-caret-down"></i>
                          </a>
                          
                          <ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
                           
                            
                       <li><a href="<?php echo base_url()?>user/profil_user"><i class="icon-user"></i>Profile</a></li>
                            
                       <li class="divider"></li>
                            
                       <li><a href="<?php echo base_url()?>login/logout"><i class="icon-off"></i> Logout </a> </li>
                          </ul>
                        </li>
					</ul>
          	

<li class="btn btn-primary pull-right">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon-bell-alt icon-animated-bell white"> &nbsp;Notification</i>
								<span class="badge badge-light">8</span>
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
												New Booking changed
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Andi edit Shipment...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												Raffles Approve Invoice
											</span>
											<span class="pull-right badge badge-success">+8</span>
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

                    	
                    	<li class="btn btn-primary pull-right">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon icon-bullhorn white">&raquo; Alert !</i>
								<span class="badge badge-light">13</span>
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
												New Booking changed
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Andi edit Shipment...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												Raffles Approve Invoice
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>
		
								<li>
									<a href="#">
										See all Alert
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>
<li class="btn btn-primary pull-right">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="icon icon-envelope white"> &nbsp;  INBOX</i>
								<span class="badge badge-light">4</span>
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
												New Booking changed
											</span>
											<span class="pull-right badge badge-info">+12</span>
										</div>
									</a>
								</li>

								<li>
									<a href="#">
										<i class="btn btn-mini btn-primary icon-user"></i>
										Andi edit Shipment...
									</a>
								</li>

								<li>
									<a href="#">
										<div class="clearfix">
											<span class="pull-left">
												<i class="btn btn-mini no-hover btn-success icon-shopping-cart"></i>
												Raffles Approve Invoice
											</span>
											<span class="pull-right badge badge-success">+8</span>
										</div>
									</a>
								</li>
		
								<li>
									<a href="#">
										See all Alert
										<i class="icon-arrow-right"></i>
									</a>
								</li>
							</ul>
						</li>

          

					<!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>

		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
			  <!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo base_url();?>dashboard">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> Dashboard </span>
						</a>
					</li>
            <li>
              
<li> <label class="label label-large label-purple ">&nbsp; MASTER    &nbsp;</label></li>

					<li> <a href="#" class="dropdown-toggle"> <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <span class="menu-text"> Internal Master </span> <b class="arrow icon-angle-down"></b> </a>
                      <ul class="submenu">
                        <li> <a href="<?php echo base_url();?>master/view_user"> <i class="icon-double-angle-right"></i><i class="fa fa-users"></i> &nbsp; User </a> </li>
                        <li> <a href="<?php echo base_url();?>ms_staff"> <i class="icon-double-angle-right"></i><i class="fa fa-male"></i> &nbsp;&nbsp; Staff </a> </li>
                        <li> <a href="<?php echo base_url();?>master/view_disc"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-star-half-full"></i> &nbsp; Discount</a></li>
                        <li> <a href="<?php echo base_url();?>service/view_service"> <i class="icon-double-angle-right"></i><i class="fa fa-coffee"></i> &nbsp; Service</a></li>
 						<li> <a href="<?php echo base_url();?>commodity/view_commodity"> <i class="icon-double-angle-right"></i><i class="fa fa-diamond"></i> &nbsp; Commodity</a></li>
						<li> <a href="<?php echo base_url();?>charge"> <i class="fa fa-hourglass-start bigger160"></i>&nbsp; Charge</a></li>
 				
						<li> <a href="<?php echo base_url();?>currency/view_currency"> <i class="fa fa-dollar bigger160"></i>&nbsp; Curcrency</a></li>
						<li> <a href="<?php echo base_url();?>payment_type/view_payment_type"> <i class="fa fa-credit-card bigger160"></i>&nbsp; Payment Type</a></li>
                      </ul>
				  </li>
					<li>
						<a href="#" class="dropdown-toggle">
						<span class="glyphicon glyphicon-globe" aria-hidden="true"></span>
							<span class="menu-text"> Region & Country </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">


							<li>
								<a href="<?php echo base_url();?>city/view_city">
		<i class="icon-double-angle-right"></i><i class="fa fa-industry"></i> &nbsp;City
								</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>country/view_country">
									<i class="icon-double-angle-right"></i>
	<i class="fa fa-flag"></i> &nbsp;Country</a>
							</li>
                     <li>
						<a href="<?php echo base_url();?>state/view_state">
						<i class="icon-double-angle-right"></i>
		<i class="fa fa-bank"></i> &nbsp;State</a>                     
                        </li>
               
						</ul>
				  </li>
					<li> <a href="#" class="dropdown-toggle"> <span class="glyphicon glyphicon-link" aria-hidden="true"></span> <span class="menu-text"> Relation Port </span> <b class="arrow icon-angle-down"></b> </a>
                      <ul class="submenu">
                        <li> <a href="<?php echo base_url();?>ms_organitation/view_organitation">
		<i class="fa fa-universal-access"></i> &nbsp; Organitation </a> </li>
                        <li> <a href="<?php echo base_url();?>ms_port/view_port">
		<i class="fa fa-crosshairs"></i> &nbsp; Port </a> </li>
        
                        <li> <a href="<?php echo base_url();?>customer/view_customer">  </i>
		<i class="fa fa-street-view"></i> &nbsp; Customers </a> </li>
                          <li> <a href="<?php echo base_url();?>vendor/view_vendor"> <i class="icon-double-angle-right"></i> </i>
		<i class="fa fa-cubes"></i> &nbsp; Vendor</a></li>
                      </ul>
				  </li>
         <li>


   <li> <label class="label label-large label-purple">&nbsp; OPERATIONAL    &nbsp;</label></li>

      <li> <a href="#" class="dropdown-toggle"> <i class="fa fa-bookmark bigger-140" aria-hidden="true"></i> <span class="menu-text">&nbsp;Booking </span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
         <li><a href="<?php echo base_url();?>transaction/booking_shipment"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-book"></i> &nbsp; Booking Shipment </a> </li>
         <li> <a href="<?php echo base_url();?>transaction/booking_list"> <i class="icon-double-angle-right"></i> </i><i class="icon icon-file-text bigger-120"></i> &nbsp; Booking List</a></li>
		 </ul>
	  </li>
	  <li> <a href="#" class="dropdown-toggle"> <i class="fa fa-download bigger-140" aria-hidden="true"></i> <span class="menu-text">&nbsp;Incoming </span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
         
 		<li> <a href="<?php echo base_url();?>incoming_house"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-calendar-check-o bigger-120"></i> &nbsp;Incoming-House</a></li>
 		<li> <a href="<?php echo base_url();?>transaction/incoming_consolidation"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-clone bigger-120"></i> &nbsp;Consolidation</a></li>
        </ul>
	  </li>
	  <li> <a href="#" class="dropdown-toggle"> <i class="fa fa-upload bigger-140" aria-hidden="true"></i> <span class="menu-text">&nbsp;Outgoing </span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">

<li> <a href="<?php echo base_url();?>outgoing_house"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-calendar-check-o bigger-120"></i> &nbsp;Outgoing-House</a></li>
         <li> <a href="<?php echo base_url();?>outgoing_master"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-file-archive-o bigger-120"></i> &nbsp;Outgoing-Master</a></li>

		<li> <a href="<?php echo base_url();?>consol"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-clone bigger-120"></i> &nbsp;Consolidation</a></li>

<li> <a href="<?php echo base_url();?>cargo_release"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-calendar-check-o bigger-120"></i> &nbsp;Cargo Release</a></li>
 <li> <a href="<?php echo base_url();?>transaction/soa"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-calendar-check-o bigger-120"></i> SOA</a></li>
         <li><a href="<?php echo base_url();?>outgoing_report"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-line-chart bigger-140"></i> Report </a> </li>

		

        
        </ul>
	  </li>
 <li> <label class="label label-large label-purple"> FINANCE</label></li>
       <li> <a href="#" class="dropdown-toggle"> <i class="fa fa-dollar bigger-150" aria-hidden="true"></i> <span class="menu-text">&nbsp;Finance </span> <b class="arrow icon-angle-down"></b> </a>
        <ul class="submenu">
         <li><a id="bankin" href="#" onClick="menuklik(this)"> <i class="fa fa-archive bigger-140"></i> Cash / Bank in </a> </li>
         <li><a href="<?php echo base_url();?>payment/deposito"> <i class="fa fa-money bigger-140"></i> </i> &nbsp; Deposito </a> </li>
         <li><a href="<?php echo base_url();?>payment/journal"> <i class="fa fa-book bigger-140"></i> </i> &nbsp; Journal </a> </li>
         <li><a href="<?php echo base_url();?>payment/payment_request"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-arrow-circle-o-left bigger-140"></i> &nbsp; Payment Request </a> </li>
         <li> <a href="<?php echo base_url();?>payment/settlement_request"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-info-circle  bigger-140"></i> &nbsp; Sentlement Req</a></li>

         <li><a id="klik" href="<?php echo base_url();?>payment_report"> <i class="icon-double-angle-right"></i> </i><i class="fa fa-line-chart bigger-140"></i> Report </a> </li>
		 </ul>
	  </li>
	  
	<!-- CUT MENU FROM HERE  -->

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
<?php echo $link;?>

					</ul><!--.breadcrumb-->

					<div class="nav-search" id="nav-search">
						
					</div><!--#nav-search-->
				</div>

				<div class="container">
					<div class="row" >
						<div class="span12" id="box-content">

							<!--PAGE CONTENT BEGINS-->
							<?php $this->load->view($view);?>
							<!--PAGE CONTENT ENDS-->						
                        
                        </div><!--/.span-->
					</div><!--/.row-fluid-->
				</div><!--/.page-content-->

			
				    </div>

						<div></div>
			  </div>
		  </div><!--/#ace-settings-container-->
	</div><!--/.main-content-->
		</div><!--/.main-container-->

<!--		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>-->

		<!--basic scripts-->

		<!--[if !IE]>-->

		

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?php echo base_url();?>asset/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='asset/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<!--ace scripts-->

		<script src="<?php echo base_url();?>asset/js/ace-elements.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>asset/js/ace.min.js"></script>


		<!--For select/combo search methode-->
        <script>
function menuklik(menu){
 	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
		
            var id = 'dd';
			var nm ='dd';
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('payment/page'); ?>",
 			data: "id="+id+"&nm="+nm,

                success: function(data){
					swal.close();
					$("#box-content").html(data);
                    $("#bankin").css("color","#4CAF50");
				
                }
            });
		}
		//for select input 		
$(".select2").select2();
		</script>
	</body>
</html>
