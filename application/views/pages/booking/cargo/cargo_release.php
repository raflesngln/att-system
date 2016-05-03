<div class="row-fluid" style="border:1px #CCC solid;box-shadow:2px 6px 29px #CCC; padding-bottom:20px">
								<div class="span10">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green fa fa-users bigger-110"></i>
		List Cargo
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-building bigger-110"></i>
		Entry Cargo
		
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