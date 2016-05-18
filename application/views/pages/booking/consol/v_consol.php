 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 </style>
  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
  <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
<div class="row-fluid">
								<div class="span10">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green fa fa-plus bigger-110"></i>
													Create Consol
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-th bigger-110"></i>
										  List SMU Consol
		
											</a></li>											<li>
												<a data-toggle="tab" href="#boxdirect">
  <i class="green fa fa-th bigger-110"></i>
										  List SMU Direct
		
											</a></li>
											<li>
												<a data-toggle="tab" href="#boxhouse">
  <i class="green fa fa-th bigger-110"></i>
										  List House Consol
		
											</a></li>

										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/booking/consol/outgoing_consolidation');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/booking/consol/list_smu_consol');?></p>
											</div>
                                            <div id="boxdirect" class="tab-pane">
<p><?php $this->load->view('pages/booking/consol/list_smu_direct');?></p>
											</div>
<div id="boxhouse" class="tab-pane">
<p><?php $this->load->view('pages/booking/consol/list_house_consol');?></p>
											</div>

										</div>
									</div>
								</div><!--/span-->

							
</div>

   

