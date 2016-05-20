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

<?php
foreach($detailCustomer as $row){
?>
<h2><i class="fa fa-plus"></i> New Customers</h2>
<br />

<div class="col-sm-6">
<div class="form-group">
<label class="control-label col-sm-4" for="nama">Name</label>
      <div class="col-sm-7">          
        <input name="nama" type="text" class="form-control" id="nama" value="<?php echo $row->CustName;?>">
<i class="fa fa-spinner fa-pulse fa-2x" style="display:none">..</i></div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Initial</label>
      <div class="col-sm-7">          
        <input name="initial" type="text" class="form-control" id="initial" value="<?php echo $row->CustInitial;?>" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Phone</label>
      <div class="col-sm-7">          
        <input name="phone" type="text" class="form-control" id="phone" value="<?php echo $row->Phone;?>" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Fax</label>
      <div class="col-sm-7">          
        <input name="fax" type="text" class="form-control" id="fax" value="<?php echo $row->Fax;?>" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Mobile Phone</label>
      <div class="col-sm-7">          
        <input name="hp" type="text" class="form-control" id="hp" value="<?php echo $row->MobilePhone;?>" >
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Email</label>
      <div class="col-sm-7">          
        <input name="email" type="text" class="form-control" id="email" value="<?php echo $row->Email;?>">
</div>
</div>





</div>


<div class="col-sm-6">

<div class="form-group">
        <label class="col-sm-4 control-label">Country</label>
           <div class="col-sm-7">               
                          <select name="custCountry" id="custCountry" required="required" class="form-control">
             <option value="<?php echo $row->Country;?>"><?php echo $row->couName;?></option>

                            <?php
	foreach($country as $ct){
	    ?>
                            <option value="<?php echo $ct->CountryCode;?>"><?php echo $ct->CountryName;?></option>
                            <?php } ?>
                          </select>
        </div>
      </div>

<div class="form-group">
        <label class="col-sm-4 control-label">State</label>
                        <div class="col-sm-7">
       <select name="custState" id="custState" required="required" class="form-control">
       <option value="<?php echo $row->State;?>"><?php echo $row->stName;?></option>

          <?php
	foreach($state as $st){
	    ?>
          <option value="<?php echo $st->StateCode;?>"><?php echo $st->StateName;?></option>
          <?php } ?>
</select></div>
      </div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">City</label>
      <div class="col-sm-7">
        <select name="custCity" id="custCity" required="required" class="form-control">
          <option value="<?php echo $row->cyCode;?>"><?php echo $row->cyName;?></option>

          <?php
	foreach($city as $ct){
	    ?>
          <option value="<?php echo $ct->CityCode;?>"><?php echo $ct->CityName;?></option>
          <?php } ?>
        </select>
      </div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Postal Code</label>
      <div class="col-sm-7">          
        <input name="custPostal" type="text" class="form-control" id="custPostal" value="<?php echo $row->PostalCode;?>">
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Full Address</label>
      <div class="col-sm-7">          
        <textarea name="address" class="form-control" id="address" placeholder="address"><?php echo $row->Address;?></textarea>
</div>
</div>

<div class="form-group">
<label class="control-label col-sm-4" for="nama">Remarks</label>
      <div class="col-sm-7">
        <textarea name="remarks" class="form-control" id="remarks" placeholder="remarks"><?php echo $row->Remarks;?></textarea>
        <span class="controls">
        <input name="deposit2" type="text" class="form-control" id="deposit2" value="<?php echo $row->Deposit;?>"  />
        </span></div>
</div>

</div>
<br /><br />


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
											Sales Information</a></li>
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
  <?php  $this->load->view('pages/customer/edit/input_address');?>
 
</p>
											</div>

											<div id="contact" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/edit/input_contact');?>
</p>
											</div>
                                            
  											<div id="sales" class="tab-pane">
<p>
<div class="row-fluid">
<span class="span6">
<div class="form-group">
                        <label class="col-sm-4 control-label">  Sales </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="sales" type="text" class="form-control" id="sales" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Deposit </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="deposit" type="text" class="form-control" id="deposit" value="<?php echo $row->Deposit;?>"  />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Npwp </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="npwp" type="text" class="form-control" id="npwp"  value="<?php echo $row->NPWP;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label"> Npwp Address</label>
                        <div class="col-sm-8">
                          <textarea name="npwpaddress" cols="30" rows="2" class="form-control" id="npwpaddress"><?php echo $row->NPWPAddress;?></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
                      
</span>



<span class="span6">
<div class="form-group">
                        <label class="col-sm-4 control-label">  Credit LImit</label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="creditlimit" type="text" class="form-control" id="creditlimit"  value="<?php echo $row->CreditLimit;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Terms Payment</label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="terms" type="text" class="form-control" id="terms"  value="<?php echo $row->TermsPayment;?>" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Is CNEE</label>
                        <div class="col-sm-8">
                          <input type="checkbox" name="isCnee" id="isCnee" />
                        </div>
                        <div class="clearfix"></div>
  </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Is Shipper</label>
                        <div class="col-sm-8">
                          <input type="checkbox" name="isShipper" id="isShipper" />
                        </div>
                        <div class="clearfix"></div>
  </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Is Agent</label>

  <div class="col-sm-8">
                          <input type="checkbox" name="isAgent" id="isAgent" />
              </div>
                        <div class="clearfix"></div>
  </div>
                      
</span>		
</div>
</p>
											</div>

<div id="linebusiness" class="tab-pane">
<p>
  <div class="row-fluid">
<span class="span6">
<div class="form-group">
                        <label class="col-sm-4 control-label">  Line Business </label>
                        <div class="col-sm-8"><span class="controls">
                        <select name="linebusiness" id="linebusiness" class="form-control">
          <option value="">Chose linebusiness</option>
          <?php
	foreach($linebusiness as $lb){
	    ?>
          <option value="<?php echo $lb->LineBusinessID;?>"><?php echo $lb->LineBusinesName;?></option>
          <?php } ?>
</select>
    </span></div>
                        <div class="clearfix"></div>
  </div>
 
 
  
 
  

</span>



<span class="span6">
<div class="form-group">
<label class="col-sm-4 control-label">  Commodity</label>

  <div class="col-sm-8"><span class="controls">
    <select name="commodity" id="commodity" class="form-control">
      <option value="">Chose commodity</option>
      <?php
	foreach($commodity as $comm){
	    ?>
      <option value="<?php echo $comm->CommCode;?>"><?php echo $comm->CommName;?></option>
      <?php } ?>
    </select>
  </span></div>

                        <div class="clearfix"></div>
  </div>
 
 
  
                       
</span>		
</div>
</p>
											</div>											
<div id="bankaccount" class="tab-pane">
<p>
  <?php $this->load->view('pages/customer/edit/input_bank');?>
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


<?php } ?>
</form>



</div>
<script>
$("#addresstype").click(function(){
	$(this).val('');
	$("#hidden_address_type").val('');
});
</script>