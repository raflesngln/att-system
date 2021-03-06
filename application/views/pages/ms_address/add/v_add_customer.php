<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>

    
  <link href='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript' src='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
		
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default }	
			.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

			/* workarounds */
			* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

			/* Menu
			----------------------------------*/
			.ui-menu {
				list-style:none;
				padding: 2px;
				margin: 0;
				display:block;
			}
			.ui-menu{
				margin-top: -3px;
				border:1px #CCC solid;
				box-shadow:2px 3px 7px #666;
				padding-left:6px;
				padding-bottom:20px;
				width:22%;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:100%;
			}
.ui-menu .ui-menu-item:hover {
	color:#FFF;
	background-color:#B0B0D9;
	border:none;
	
}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
				
			}
			
.form-horizontal .control-label{
	text-align:left;
}
#nama{
	font-size:large;
	font-weight:bold;
	color:#06F;
	height:40px;
}
</style>

<script type="text/javascript">
	    $(document).ready( function() {
$("#nama").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/Autocomplete_customers/lookup_customers",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
					beforeSend: function(){
					 $(".fa-pulse").show();
         			 },
					complete: function(){
					 $(".fa-pulse").hide();
         			 },
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
								//$('#contenshipper').html('');
								 $(".fa-pulse").hide();
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
 					//$("#infocust").show();
					//$("#id2").val(ui.item.id);
					$("#initial").val(ui.item.initial);
					$("#phone").val(ui.item.phone); 
					$("#email").val(ui.item.email);
					$("#remarks").val(ui.item.remarks);	
					
					$("#initial").css("color","red");
					$("#phone").css("color","red");
					$("#email").css("color","red");
					$("#remarks").css("color","red");	
         		},		

    		});
$("#addresstype").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/Autocomplete_customers/lookup_address_type",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
					beforeSend: function(){
					 $(".fa-pulse").show();
         			 },
					complete: function(){
					 $(".fa-pulse").hide();
         			 },
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
								//$('#contenshipper').html('');
								 $(".fa-pulse").hide();
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
 					//$("#infocust").show();
					$("#hidden_address_type").val(ui.item.id);
					//$("#initial").val(ui.item.initial);
					//$("#phone").val(ui.item.phone); 
					//$("#email").val(ui.item.email);
					//$("#remarks").val(ui.item.remarks);	
		
         		},		

    		});
$("#contacttype").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/Autocomplete_customers/lookup_contact_type",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
					beforeSend: function(){
					 $(".fa-pulse").show();
         			 },
					complete: function(){
					 $(".fa-pulse").hide();
         			 },
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
								//$('#contenshipper').html('');
								 $(".fa-pulse").hide();
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
 					//$("#infocust").show();
					$("#hidden_contact_type").val(ui.item.id);
					//$("#initial").val(ui.item.initial);
					//$("#phone").val(ui.item.phone); 
					//$("#email").val(ui.item.email);
					//$("#remarks").val(ui.item.remarks);	
		
         		},		

    		});

$("#nama").mousedown(function(){
					$("#nama").val('');
					$("#initial").val('');
					$("#phone").val(''); 
					$("#email").val('');
					$("#remarks").val('');	

					$("#initial").css("color","black");
					$("#phone").css("color","black");
					$("#email").css("color","black");
					$("#remarks").css("color","black");
	});
	
	
});

	    </script>  

<div class="container-fluid" style=" border:1px #CCC solid;box-shadow:2px 6px 29px #CCC; padding-bottom:20px">

<form method="post" action="<?php echo base_url();?>customer/save_customer">
<h2><i class="fa fa-plus"></i> New Customers</h2>
<br />

<div class="col-sm-6">
<div class="form-group">
<label class="control-label col-sm-4" for="nama">Name</label>
      <div class="col-sm-7">          
        <input name="nama" type="text" class="form-control" id="nama" placeholder="Input Name">
<i class="fa fa-spinner fa-pulse fa-2x" style="display:none">..</i>
<input type="hidden" name="idcustomer" value="" />
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Initial</label>
      <div class="col-sm-7">          
        <input name="initial" type="text" class="form-control" id="initial" placeholder="initial">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Address</label>
      <div class="col-sm-7">          
        <textarea name="address" class="form-control" id="address" placeholder="address"></textarea>
</div>
</div>



</div>


<div class="col-sm-6">

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Email</label>
      <div class="col-sm-7">          
        <input name="email" type="text" class="form-control" id="email" placeholder="email">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="nama">City</label>
      <div class="col-sm-7">          
        <input name="city" type="text" class="form-control" id="city" placeholder="city">
</div>
</div>
<div class="form-group">
<label class="control-label col-sm-4" for="nama">Remarks</label>
      <div class="col-sm-7">
        <textarea name="remarks" class="form-control" id="remarks" placeholder="remarks"></textarea>
      </div>
</div>

</div>
<br />


<div class="container">
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
												<a data-toggle="tab" href="#linebusiness" id="3">
                                                 <i class="red fa fa-bookk bigger-110"></i>Line Business</a></li>
    	<li>
												<a data-toggle="tab" href="#bankaccount" id="4">
                                                 <i class="red fa fa-bookk bigger-110"></i>Bank Account
		
											</a></li>
        
										</ul>

										<div class="tab-content container-fluid">
											<div id="home" class="tab-pane in active">
<p>
  <?php  $this->load->view('pages/customer/add/input_address');?>
 
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
<div id="bankaccount" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/add/input_bank');?>
</p>
											</div>
											
									  </div>
                                      

									</div>
								</div>
</div>



<div class="clearfix">&nbsp;</div>

<div class="col-sm-11" style="border:1px #CCC solid; padding:10px 9px; box-shadow:1px 2px 20px #ccc; margin-left:15px; width:96%">
<button class="btn btn-danger" type="button"><i class="fa fa-times"></i> Discard</button>
<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Save Data</button>

</div>

</form>



</div>
<script>
$("#addresstype").click(function(){
	$(this).val('');
	$("#hidden_address_type").val('');
});
</script>