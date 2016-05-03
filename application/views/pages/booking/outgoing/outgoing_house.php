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
	List of Open House
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-building bigger-110"></i>
		Entry  House
		
											</a></li>
											<li>
												<a data-toggle="tab" href="#boxhouse">
  <i class="green fa fa-building bigger-110"></i>
	List of Closed House
		
											</a></li>
											<li>
												<a data-toggle="tab" href="#boxhouse2">
  <i class="green fa fa-building bigger-110"></i>
										  List House Consol
		
											</a></li>
										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/booking/outgoing/list_outgoing_house');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/booking/outgoing/input_outgoing_house');?></p>
											</div>
<div id="boxhouse" class="tab-pane">
<p><?php $this->load->view('pages/booking/consol/list_house_consol');?></p>
											</div>
<div id="boxhouse2" class="tab-pane">
<p>
  <?php $this->load->view('pages/booking/outgoing/input_outgoing_house');?>
</p>
											</div>
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

