 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 .page-content{margin-left:-43px;}
 </style>
  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>

<div class="row-fluid">
<div class="col-sm-12">
  <h1 align="center">
<i class="blue fa fa-plus-square bigger-110"></i>
Add Customer</h1></div>
								<div class="span6">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home" id="1">
													<i class="red fa fa-userr bigger-110"></i>
													Basic Info
											  </a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile" id="2">
  <i class="red fa fa-buildingg bigger-110"></i>
													Address 
		
												</a>
											</li>
    	<li>
												<a data-toggle="tab" href="#contact" id="3">
                                                 <i class="red fa fa-bookk bigger-110"></i>
													Contact 
		
											</a></li>
										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p>
  <?php $this->load->view('pages/customer/input_basic_info');?>
 
</p>
											</div>

											<div id="profile" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/input_address');?>
</p>
											</div>
  											<div id="contact" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/input_contact');?>
</p>
											</div>

											

											
									  </div>
                                      

									</div>
								</div><!--/span-->

							
</div>



    
<script type="text/javascript">			
$(document).ready(function(){
	$( "#2,#3" ).prop( "disabled", true );
	 $("#2,#3").css({"background-color": "#DFDFDF", "cursor": "not-allowed"});


$(".next1").click(function(){
	$( "#2" ).prop( "disabled", false );
		 $("#2").css({"background-color": "white", "cursor": "pointer"});

	var custcode=$("#custcode").val();

 });
 
 $(".next2").click(function(){
	$( "#3" ).prop( "disabled", false );
		 $("#3").css({"background-color": "white", "cursor": "pointer"});

	var custcode=$("#custcode").val();

 });
		
		
});
</script>
 

