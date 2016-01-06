<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	    <title>Proses Out going</title>
        
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>

    
  <link href='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript' src='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>

		
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
		
	    </style>
  <script>
  $(function() {
	$("#tgl").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tg1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tg2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	

  });

function toRp(angka){
  //var angka =document.getElementById("rp").value;
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
   // return 'Rp' + rev2.split('').reverse().join('') + ',00';
    return rev2.split('').reverse().join('');
}
 function rupiah(){
  var angka =document.getElementById("grossweight").value;
  var angka2 =document.getElementById("grossweight").value;
  var nilai=angka;
  var hasil=toRp(nilai); 
  //alert('haii ' + hasil);
  document.getElementById("grossweight").value =hasil;
  var gross2=document.getElementById("grossweight2").value =angka;

  document.getElementById("grossweight").style.fontSize="large";
  document.getElementById("grossweight").style.fontWeight="bold";
  document.getElementById("grossweight").style.color="blue";
  
  var volum=document.getElementById("t_volume").value;
  
 if (gross2 >= volum) {
    document.getElementById("cwt").value ='gross 2 lebihh besar';
} else {
    document.getElementById("cwt").value ='volume lebih besar';
} 

 }
</script>	    
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#idshipper").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_sender",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
							
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            	/*	$("#result").append(
            			"<li>"+ ui.item.kota + "</li>"
            		);    */
					$("#name1").val(ui.item.name); 
					$("#phone1").val(ui.item.phone);
					$("#address1").val(ui.item.address); 		
         		},		
    		});
			
//for shipper
    		$("#idconsigne").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_receivement",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
							
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
            	/*	$("#result").append(
            			"<li>"+ ui.item.kota + "</li>"
            		);    */
					$("#name2").val(ui.item.name); 
					$("#phone2").val(ui.item.phone);
					$("#address2").val(ui.item.address); 		
         		},		
    		});

	    });
	    </script>
	    
	</head>
	<body>
<div class="container-fluid" style="margin-left:-23px">
		<div class="span12 widget-container-span">
		  <div class="widget-box">
										<div class="widget-header">
											<h5 class="smaller">&nbsp;  CARGO MANIFEST</h5>

											<div class="widget-toolbar no-border">
												<ul class="nav nav-tabs" id="myTab">
													<li class="active">
														<a data-toggle="tab" href="#home"><i class="fa fa-list"></i> List  Manifest</a>
													</li>

													<li>
													<a data-toggle="tab" href="#profile"><i class="fa fa-plus"></i> Entry  Manifest</a></li>
												</ul>
											</div>
										</div>

										<div class="widget-body">
											<div class="widget-main padding-6">
												<div class="tab-content">
													<div id="home" class="tab-pane in active">
	<?php $this->load->view('pages/booking/cargo/list_cargo_manifest');?>
													</div>

													<div id="profile" class="tab-pane">
	<?php $this->load->view('pages/booking/cargo/input_manifest');?>
													</div>

													<div id="info" class="tab-pane">
&nbsp;&nbsp;
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
</div>		

 <!-- ==========================================================  -->   
  <div class="row-fluid"><!--/span-->

    <div class="vspace-6"></div>
  </div>
  <!-- enf of tabs -->   

<br style="clear:both">

  
              




<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Cnote / House</h3>
            </div>
            <div class="smart-form scroll">
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No Cnote ? House No</label>
                        <div class="col-sm-6"><span class="controls">
                        <input name="idcnote" type="text" class="form-control"  id="idcnote" />
</span></div>

<div class="col-sm-3"><span class="controls">
  <button class="btn btn-search btn-small btn-primary btnsearch" id="btnsearch" type="button">Search</button>
</span></div>
            <div class="clearfix"></div>
            </div>
            <br>
            
<div id="detailconnote">        

    </div>                  
                      
<div class="modal-footer">
  
                        <button class="btn btn-primary" id="iditems"> Insert</button>
                        
                       
  </div>
                    </div>
            
               <!-- </form>  -->
            </div>
  
        </div>
    </div>
    </div>    

<!--ADDING NEW CUSTOMERS MODAL-->
 
  <!-- ============================================================== -->   

	</body>
</html>
