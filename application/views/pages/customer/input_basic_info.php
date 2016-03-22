<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>

    
  <link href='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript' src='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>

<!-- <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
-->
		
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default; }	
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
			.ui-menu .ui-menu {
				margin-top: -3px;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:80%;
			}
			.ui-menu .ui-menu-item a {
				text-decoration:none;
				display:block;
				padding:.2em .4em;
				line-height:1.5;
				zoom:1;
			}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
			}
#t_freight,#t_quarantine,#other2,#delivery2,#adm2{ text-align:right;}
	    </style>
<script type="text/javascript">
	    $(this).ready( function() {
$("#custcode").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_customers",
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
 					$("#infocust").show();
					$("#id2").val(ui.item.id);
					$("#nama2").val(ui.item.name);
					$("#phone2").val(ui.item.phone); 
					$("#email2").val(ui.item.email);
					$("#initial2").val(ui.item.initial);	
         		},		

    		});
$("#custcode").mousedown(function(){
	$("#infocust").hide();	
	});
	
	
});

	    </script>  

<div class="col-sm-11">
        <div class="col-sm-11">

<div class="clearfx">&nbsp;</div>
        <strong><label class="col-sm-11">Cust code</label></strong>
          <div class="col-sm-7">
           <input name="custcode" type="text" class="form-control"  id="custcode"  />
          </div>

           <strong><label class="col-sm-11"> Name</label></strong>
          <div class="col-sm-7">
            <input name="custname" type="text" class="form-control"  id="custname"  />
          </div>
           <strong><label class="col-sm-11"> Initial</label></strong>
          <div class="col-sm-7">
            <input name="initial" type="text" class="form-control"  id="initial"  />
          </div>
          <div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>

         
             

<div class="form-group infocust col-sm-12" id="infocust" style=" box-shadow:6px 11px 14px #CCC; border:1px #CCC solid; transition:all 1s">
<h5>Customer Details</h5>

</span><span class="col-sm-5">
  <label class="col-sm-5"> Initial</label>
<input name="initial2" type="text" class="form-control"  id="initial2" readonly="readonly"  />
</span>

<span class="col-sm-5">
  <label class="col-sm-5"> Name</label>
  <input name="nama2" type="text" class="form-control"  id="nama2" readonly="readonly"  />

</span><span class="col-sm-5">
  <label class="col-sm-5"> Phone</label>
<input name="phone2" type="text" class="form-control"  id="phone2" readonly="readonly" />

</span><span class="col-sm-5">
  <label class="col-sm-5"> Email</label>
<input name="email2" type="text" class="form-control"  id="email2" readonly="readonly"  />
</span>

<input name="id2" id="id2" type="hidden" />
<i class="fa fa-spinner fa-pulse fa-2x" style="display:none"></i>
</div>



  </div>
</div>

 <div class="clearfix clearfx"></div>
  <div class="col-sm-10 text-right">
<a data-toggle="tab" href="#profile" class="next1 btn btn-warning btn-large">
  <i class="red fa fa-buildingg bigger-110"></i>Next</a>
   </div>