 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 </style>
  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>

<div class="row-fluid">
								<div class="span6">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="red fa fa-users bigger-110"></i>
													Customers
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="red fa fa-building bigger-110"></i>
													Address Type
		
												</a>
											</li>
    	<li>
												<a data-toggle="tab" href="#more">
                                                 <i class="red fa fa-book bigger-110"></i>
													Contact Type
		
											</a></li>
										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/customer/cutomers');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/customer/type/ms_address_type');?></p>
											</div>
  											<div id="more" class="tab-pane">
<p><?php $this->load->view('pages/customer/contact/ms_contact_type');?></p>
											</div>

											<div id="dropdown1" class="tab-pane">
												<p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade.</p>
											</div>

											<div id="dropdown2" class="tab-pane">
												<p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin.</p>
											</div>
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

