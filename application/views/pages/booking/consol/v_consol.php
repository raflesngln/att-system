 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 </style>
  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>

<div class="row-fluid">
								<div class="span10">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green fa fa-users bigger-110"></i>
													Create Consol
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-building bigger-110"></i>
										  List SMU/Master
		
											</a></li>

										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/booking/consol/outgoing_consolidation');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/booking/consol/list_consol');?></p>
											</div>
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

