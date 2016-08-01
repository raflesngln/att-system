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
													<i class="green fa fa-plus bigger-110"></i>
	Entry  Incoming
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-folder-open bigger-110"></i>
		List of Incoming House
		
											</a></li>
										
											
										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/booking/incoming/input_incoming');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/booking/incoming/list_incoming');?></p>
											</div>
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

