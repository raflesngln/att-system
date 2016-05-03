        
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">



    
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
	    
<div class="row-fluid">
								<div class="span10">
									<div class="tabbable">
										<ul class="nav nav-tabs" id="myTab">
											<li class="active">
												<a data-toggle="tab" href="#home">
													<i class="green fa fa-users bigger-110"></i>
		List Outgoing Master
												</a>
											</li>

											<li>
												<a data-toggle="tab" href="#profile">
  <i class="green fa fa-building bigger-110"></i>
		Entry Outgoing Master
		
												</a>
											</li>

										<li>
												<a data-toggle="tab" href="#closed">
  <i class="green fa fa-building bigger-110"></i>
		List Closed SMU
		
												</a>
											</li>

										</ul>

										<div class="tab-content container">
											<div id="home" class="tab-pane in active">
<p>
  <?php $this->load->view('pages/booking/outgoing_master/list_outgoing_master');?>
</p>
											</div>

											<div id="profile" class="tab-pane">
<p>
  <?php $this->load->view('pages/booking/outgoing_master/input_outgoing_master');?>
</p>
											</div>
<div id="closed" class="tab-pane">
<p>
  <?php $this->load->view('pages/booking/consol/list_house_consol');?>
</p>
											</div>
										</div>
									</div>
								</div><!--/span-->

							
</div>

   

