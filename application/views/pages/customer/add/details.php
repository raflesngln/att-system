<div class="span11">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home" id="1">
													<i class="red fa fa-userr bigger-110"></i>
													Address Info
											  </a>
											</li>

											<li>
												<a data-toggle="tab" href="#contact" id="2">
  <i class="red fa fa-buildingg bigger-110"></i>
													Contact Info
		
												</a>
											</li>
    	<li>
												<a data-toggle="tab" href="#sales" id="3">
                                                 <i class="red fa fa-bookk bigger-110"></i>
													Sales & Purchasing  
		
											</a></li>
    	<li>
												<a data-toggle="tab" href="#linebusiness" id="4">
                                                 <i class="red fa fa-bookk bigger-110"></i>
							LineBisnis & Commodity  
		
											</a></li>
										</ul>

										<div class="tab-content container-fluid">
											<div id="home" class="tab-pane in active">
<p>
  <?php $this->load->view('pages/customer/add/input_address');?>
 
</p>
											</div>

											<div id="contact" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/add/input_contact');?>
</p>
											</div>
                                            
  											<div id="sales" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/add/sales&purchasing');?>
</p>
											</div>

<div id="linebusiness" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/add/input_line_bisnis');?>
</p>
											</div>											

											
									  </div>
                                      

									</div>
								</div>