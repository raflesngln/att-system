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
													Customers
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-building bigger-110"></i>
													Address Type
		
												</a>
											</li>
    	<li>
												<a data-toggle="tab" href="#more">
                                                 <i class="green fa fa-book bigger-110"></i>
													Contact Type
		
											</a></li>
<li>
<a data-toggle="tab" href="#linebusiness">
<i class="green fa fa-briefcase bigger-110"></i>
Line Business
</a>
</li>

<li>
<a data-toggle="tab" href="#commo">
<i class="green fa fa-asterisk bigger-110"></i>
Commodity
</a>
</li>

<li>
<a data-toggle="tab" href="#bank">
<i class="green fa fa-industry bigger-110"></i>
Bank
</a>
</li>

										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p><?php $this->load->view('pages/customer/cutomers');?></p>
											</div>

											<div id="profile" class="tab-pane">
<p><?php $this->load->view('pages/customer/ms_address_type/ms_address_type');?></p>
											</div>
  											<div id="more" class="tab-pane">
<p><?php $this->load->view('pages/customer/contact_type/ms_contact_type');?></p>
											</div>

<div id="linebusiness" class="tab-pane">
<p><?php $this->load->view('pages/customer/linebusiness/ms_linebusiness');?></p>
											</div>	
<div id="commo" class="tab-pane">
<p><?php $this->load->view('pages/customer/commodity/ms_commodity');?></p>
											</div>										
<div id="bank" class="tab-pane">
<p><?php $this->load->view('pages/customer/bank/ms_bank');?></p>
											</div>
											
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

