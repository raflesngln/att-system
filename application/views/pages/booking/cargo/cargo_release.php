  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
  
<div class="row-fluid">
								<div class="span10">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green fa fa-th bigger-110"></i>
		List Cargo
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-plus bigger-110"></i>
		Create Cargo Release
		
												</a>
											</li>
											


										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p>
 <?php $this->load->view('pages/booking/cargo/list_cargo_release');?>
</p>
											</div>

										  <div id="profile" class="tab-pane">
<p>
  <?php $this->load->view('pages/booking/cargo/input_release');?>
</p>
											</div>
										</div>
									</div>
								</div>
  </div>