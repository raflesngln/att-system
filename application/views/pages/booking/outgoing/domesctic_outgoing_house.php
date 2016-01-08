<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	    <title>Codeigniter Autocomplete</title>
        
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
	    </style>
  <script>
  $(function() {
	$("#tgl").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
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
  
 //if (gross2 >= volum) {
    document.getElementById("cwt").value ='gross 2 lebihh besar';
//} else {
    document.getElementById("cwt").value ='volume lebih besar';
//} 

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
		

 <!-- ==========================================================  -->   
  <div class="row-fluid">
    <div class="span12">
                  <?php
      if(isset($eror)){?>
            <label class="alert alert-error col-sm-12">
      <button type="button" class="close" data-dismiss="alert">
      <i class="icon-remove"></i> </button>             
      <?php echo isset($eror)?$eror:'';?>
      <br />
      </label>
            <?php }?>   
      <div class="header col-md-11">
<p class="text-center konfirm" id="konfirm">&nbsp;</p>
                <h4><i class="fa fa-calendar-check-o bigger-120"></i> &nbsp; Domestic Outgoing - House:: Entry Data</h4>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/confirm_outgoing_house" autocomplete="off">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Sender</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <input name="job" type="text" class="form-control"  id="name" placeholder="generated by system" readonly/>
          </div>


          <strong><label class="col-sm-4"> House/Connote No</label></strong>
          <div class="col-sm-7">
           <input name="house" type="text" class="form-control"  id="name" placeholder="generated by system" readonly />
          </div>

          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7">
          <select name="paymentype" class="form-control" required="required" id="paymentype">
          <option value="">Select Payment  Type</option>
                   <?php
                   foreach ($payment_type as $pay) {
                   ?>
                     <option value="<?php echo $pay->payCode.'-'.$pay->payName;?>"><?php echo $pay->payName;?></option>
                     <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7">
           <select name="service" id="service" class="form-control" required="required">
          <option value="">Choose Service</option>
          <?php foreach ($service as $sv) {
          ?>
          <option value="<?php echo $sv->svCode.'-'.$sv->Name;?>"><?php echo $sv->Name;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <select name="origin" id="origin" class="form-control" required="required">
          <option value="">Choose Origin</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode.'-'.$ct->cyName;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <select name="desti" id="desti" class="form-control" required="required">
          <option value="">Choose Destination</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode.'-'.$ct->cyName;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
<div class="col-sm-12"><hr></div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
            <input type="text" name="idshipper" id="idshipper" class="form-control" placeholder="types customer name" autocomplete="off" required/>
          <input name="name1" type="hidden" class="form-control"  id="name1" required value="<?php echo $row->custName;?>"/></div>
<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Phone</label></div>
    <div class="col-sm-7"> <input type="text" name="phone1" id="phone1" class="autocomplete form-control" readonly/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address1" class="autocomplete form-control" id="address1" readonly></textarea>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Codeship</label></div>
    <div class="col-sm-7"> <input type="text" name="codeship" id="codeship" class="autocomplete form-control" />
    </div>
</div>

<div class="col-sm-13" id="contenshipper"><!-- CONTENT AJAX VIEW HERE --></div>

<!-- detail for sender -->    

<!-- end of sender -->

<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
      </div>
                <!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
<label class="col-sm-12"> <span class="span3 label label-large label-pink arrowed-in-right">Receivement</span></label> 
<div class="clearfx">&nbsp;</div>
        <strong><label class="col-sm-4">Booking No</label></strong>
          <div class="col-sm-7">
           <input name="booking" type="text" class="form-control"  id="booking"  />
          </div>

           <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
           <input name="etd" type="text" class="form-control"  id="tgl" required value="<?php echo date("Y-m-d") ;?>" readonly/>
          </div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h6>&nbsp;</h6></div>
<div class="col-sm-12"><hr></div>

          <strong><label class="col-sm-4"> Consignee</label>
          </strong>
            <div class="col-sm-7">
            <input name="idconsigne" type="text" class="form-control"  id="idconsigne" placeholder="types customer name" autocomplete="off" required/>
            <input name="name2" type="hidden" class="form-control"  id="name2" required />
          </div> 
<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>
<div class="form-group">      
  <div class="col-sm-4">
      <label for="codeship">Phone</label></div>
    <div class="col-sm-7">
      <input name="phone2" type="text" class="form-control" readonly  id="phone2"/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address2" class="autocomplete form-control" id="address2" readonly></textarea>
    </div>
</div>


<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">CodeSigne</label></div>
    <div class="col-sm-7">
      <input name="codesigne" type="text" class="form-control"  id="codesigne"/>
    </div>
</div>


<div class="col-sm-13" id="contencnee"><!-- CONTENT AJAX VIEW HERE --></div>
   </div>
</div>



<br style="clear:both;margin-bottom:40px;">
            <div class="container">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Item's</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="6"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th colspan="2"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th><div align="center">Volume</div></th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                               
                                                
                                                
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
 // $t_item+=$items['qty'];
 // $t_volume+=$items['v'];
        ?>
                                                  <tr align="right" class="gradeX">
                                                  <td colspan="2"><?php echo $items['qty']; ?></td>
                                                  <td><?php echo $items['p']; ?></td>
                                                  <td><?php echo $items['l']; ?></td>
                                                  <td><?php echo $items['t']; ?></td>
                                                  <td><?php echo number_format($items['v'],2,'.',',');?></td>
                                                  <td>
                                                  <div align="center">
                                                   
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                <thead>
                                                 <tr align="right">
                                                  <td colspan="2"><label id="label_pacs">0</label>
                                                   <input name="t_pacs" type="hidden" id="t_pacs" value="0" /></td>
                                                  <td colspan="3">Total</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="0" />      
                                                    <label id="label_volume">0</label>                                           
                                                  </td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
  
  <!-- LEFT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">

                                              <div class="col-md-12">
                                              <label class="col-sm-4">Commodity &nbsp;</label>
                                              <div class="col-sm-7">
      <select data-placeholder="Choose Commodity..." class="chosen-select form-control" tabindex="2" required="required" name="commodity">
           <option value="">Choose Commodity</option>
          <?php foreach ($commodity as $cm) {
          ?>
            <option value="<?php echo $cm->commCode;?>"><?php echo $cm->Name;?></option>
          <?php } ?>
      </select>
                                                 </div>
                                                </div>
<div class="col-md-12">
<label class="col-sm-4">Gross Weight</label> 
  <div class="col-sm-7">
  <input type="text" name="grossweight" id="grossweight" class="form-control" onkeypress="return isNumberKey(event)" onchange="rupiah();" required>
  <input type="hidden" name="grossweight2" value="" id="grossweight2" />
  </div>
</div>
                                              <div class="col-md-12">
                                              <label class="col-sm-4">Special Instructions &nbsp;</label>
                                              <div class="col-sm-7"><input type="text" name="special" id="special" class="form-control"></div>
                                             </div>
  
                                              </div>
                                            </div>
  <!-- END LEFT INPUT -->
  <!-- RIGHT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-md-12">
                                              <label class="col-sm-3">CWT &nbsp;</label>
                                              <div class="col-sm-8">
                                              <input type="text" name="cwt" id="cwt" class="form-control" onkeypress="return isNumberKey(event)">
                                              </div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Declare Value &nbsp;</label>
                                              <div class="col-sm-8"><input type="text" name="declare" id="declare" class="form-control"></div>
                                             </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Description of Shipment &nbsp;</label>
                                              <div class="col-sm-8">
                                              <textarea name="description" id="declare" class="form-control"></textarea>
                                              </div>
                                             </div>
                                              </div>
                                            </div>
  <!-- END RIGHT INPUT -->
  <div class="clearfix"> </div>
<h2><span class="label label-large label-pink arrowed-in-right"><strong>Charges</strong></span></h2>
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tblcharges" style="width:95%">
                                              <thead><tr>
                                                <td colspan="6"></td>
                                                <td><div align="center"><a class="btn  btn-primary btn-round" href="#modaladdCharge" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a></div></td>
                                                </tr>
                                                  <th width="71">&nbsp;</th>
                                                  <th width="158">Charges</th>
                                                  <th width="382">Desc</th>
                                                  <th width="158">Unit</th>
                                                  <th width="114">Qty</th>
                                                  <th width="222">Total</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                               
                                              
                                              <tbody>
   <?php 
$i=1;
foreach($tmpcharge as $chr){
$grandt+=$chr->Total;
 //$t_volume+=$itm['v'];
        ?>
                                                  <tr>
                                                  <td><?=$i;?></td>
                                                  <td><?php echo $chr->ChargeName;?></td>
                                                  <td><?php echo $chr->Description;?></td>
                                                  <td><div align="right"><?php echo number_format($chr->Unit,2,',','.');?>                                                  </div></td>
                                                  <td><div align="right"><?php echo $chr->Qty;?></div></td>
                                                  <td><div align="right"><?php echo number_format($chr->Total,2,'.',',');?></div></td>
                                                  <td>
                                                  <div align="center">
                                               <a href="<?php echo base_url();?>temp/delete_charge/<?php echo $chr->tempChargeId?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button"><i class="fa fa-times bigger-120"></i></button>
                                                  </a>                                                  </div>                                                  </td>
                                                </tr>
<?php $no++; } ?>
                                                <thead>
                                                 <tr>

                                                  <td colspan="3"><b>Total</b></td>
                                                  <td colspan="3"><div align="right"><strong>
                                                  <input name="total_charge" type="hidden" id="total_charge" value="0" />
  <label id="label_charges">0</label>                                                                                           
                                                  
                                                  </strong></div></td>
                                                  <td width="129">&nbsp;</td>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
  
                                    </div>
  
                                    
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger " href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
                                        </div>  </div>     
              </div>
          </div>
         </div>

      </form>
  </div>
            </div>
              


<!--adding form-->
<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Itemss</h3>
            </div>
            <div class="smart-form scroll">
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No of Pcs </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="pack" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="pack" />
</span></div>
            <div class="clearfix"></div>
            </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="panjang" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="panjang" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="lebar" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="lebar" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tinggi" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="tinggi" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iditems"> Save</button>
               <!-- </form>  -->
    </div>
                    </div>
            
            </div>
        </div>
    </div>
    </div>
<!--adding form-->
<div id="modaladdCharge" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Charges</h3>
            </div>
            <div class="smart-form scroll">
<!-- <form method="post" action="<?php //echo site_url('temp/save_temp_charge')?>">  -->
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">Charges </label>
                        <div class="col-sm-9"><span class="controls">
              <select name="charge" class="form-control" required="required" id="charge">
                <option value="">Select One</option>
<?php foreach ($charges as $crg) {
  ?>
                <option value="<?php echo $crg->Description;?>"><?php echo $crg->Description;?></option>
<?php } ?>

              </select> 
                          </span>
                          </div>
                        <div class="clearfix"></div>
  </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Description &nbsp;</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="desc" type="text" class="form-control" id="desc" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Unit &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="txtunit" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtunit" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Qty &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="qty" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtqty" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges"> Save</button>
    </div>
                    </div>
            
            <!--    </form>  -->
            </div>
        </div>
    </div>
    </div>

    

<!--ADDING NEW CUSTOMERS MODAL-->
<div id="modaladdcust" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add New Customer </h3>
            </div>
            <div class="smart-form scroll">
                <!-- <form method="post" action="<?php //echo site_url('booking/save_customer')?>">  -->
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Initial <input type="hidden" name="page" id="page" value="incomaster"></label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="initial" type="text" class="form-control" placeholder="initial" id="initial" />
                          
                        </span></div><label class="col-sm-1 label-confir" id="label-confir"></label>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="namecust" type="text" class="form-control" required id="namecust" />
                        </span></div>
                        <label class="col-sm-1 label-confir" id="label-confir2"></label
                        ><div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="address" cols="30" rows="2" class="form-control" id="address"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-9"><span class="controls">
      <select name="city" id="city" required="required" class="form-control">
          <option value="">Chosse City</option>
          <?php
  foreach($city as $ct){
      ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
</select>
      </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="phone" type="text" class="form-control" required id="phone" onkeypress="return isNumberKey(event)" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="fax" type="text" class="form-control" required id="fax" onkeypress="return isNumberKey(event)" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Postal Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="postcode" type="text" class="form-control" id="postcode" onkeypress="return isNumberKey(event)" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
   <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="email" type="email" class="form-control" placeholder="Email" id="email" />
              </span></div>
                        <div class="clearfix"></div>
                    </div>
 <div class="form-group">
            <label class="col-sm-3 control-label">Remarks</label>
                        <span class="col-sm-9">
                        <textarea name="remarks2" cols="30" rows="2" class="form-control" id="remarks2" required></textarea>
                        </span>
                        <div class="col-sm-9"></div>
                        <div class="clearfix"></div>
                      </div>
<hr /> 

<div class="form-group">
     <em><label class="col-sm-4 control-label">&nbsp;</label> 
    <label class="col-sm-6 control-label">&nbsp;</label></em>

<div class="col-sm-2"></div>

 <div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; Agent</span>
      <select name="isagent" id="isagent" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; SHipper</span>
      <select name="isshipper" id="isshipper" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; CNEE</span>
      <select name="iscnee" id="iscnee" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>
    
<div class="clearfix"></div>
                      </div>
<div class="modal-footer">
<button class="btn btn-danger " data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary addcust" id="addcust"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            
              <!--  </form>  -->
            </div>
        </div>
    </div>
    </div>

<script type="text/javascript">
$("#grossweight").change(function(){

             var volum=document.getElementById("t_volume").value;
			 var grs=document.getElementById("grossweight2").value;
			 
			 var a=parseInt(volum);
			 var b=parseInt(grs);
			 if(a > b){
				 document.getElementById("cwt").value =volum;
			 }
			 else
			 {
				document.getElementById("cwt").value =grs;
			 }
	 
        });     
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/search_discount_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
   $("#idshipperrrrrrrrr").change(function(){
            var custCode = $("#idshipper").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_sender'); ?>",
                data: "custCode="+custCode,
                success: function(data){
                    $('#contenshipper').html(data);
                }
            });

        });
     $("#idconsigneeeee").change(function(){
            var custCode = $("#idconsigne").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_receivement'); ?>",
                data: "custCode="+custCode,
                success: function(data){
                    $('#contencnee').html(data);
                }
            });

        });
  $("#addcust").click(function(){
		var initial=$("#initial").val();
		var namecust=$("#namecust").val();
		var address=$("#address").val();
		var city=$("#city").val();
		var phone=$("#phone").val();
		var fax=$("#fax").val();
		var postcode=$("#postcode").val();
		var email=$("#email").val();
		var remarks2=$("#remarks2").val();
		var isagent=$("#isagent").val();
		var isshipper=$("#isshipper").val();
		var iscnee=$("#iscnee").val();
	if (initial == '')
        { 
		alert('Mohon isi data dengan lengkap');
		$("#initial").css("border-color","red");
		$("#label-confir").css({"background-color": "white", "color": "red"});
		$("#label-confir").html('<i class="fa fa-times"></i>');
        }
	else if (namecust == '')
        { 
		alert('Mohon isi data dengan lengkap');
		$("#namecust").css("border-color","red");
		$("#label-confir2").css({"background-color": "white", "color": "red"});
		$("#label-confir2").html('<i class="fa fa-times"></i>');
        } 
    else
        {	
	          $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/save_customer2'); ?>",
 data: "namecust="+namecust+"&initial="+initial+"&address="+address+"&city="+city+"&phone="+phone+"&fax="+fax+"&postcode="+postcode+"&email="+email+"&remarks2="+remarks2+"&isagent="+isagent+"&isshipper="+isshipper+"&iscnee="+iscnee,
                success: function(data){
                 	alert('Customer with name ' +namecust +' Success Saved');
                }
            });	
			$("#initial").css("border-color","#D9DFE2");
			$("#label-confir").html('');
			$("#modaladdcust").modal('hide');
		}
			
   });
	
     $("#iditemsssssssss").click(function(){
	var pcs=$('#origin').val();
	var panjang=$('#desti').val();
	var lebar=$('#paymentype').val();
	var tinggi=$('#booking').val();
	var idshipper=$('#idshipper').val();
	
     alert(pcs + '/' + panjang +'/' + lebar + '/'+ tinggi + '/'+ idshipper);

        });
		
$("#iditems").click(function(){
	//var t_volume=$('#idtotal').val();   
	var pcs=$('#pack').val();
	var panjang=$('#panjang').val();
	var lebar=$('#lebar').val();
	var tinggi=$('#tinggi').val();
 	var kali = parseInt(panjang) * parseInt(lebar) * parseInt(tinggi);
 	var t_volume=$('#t_volume').val();
	var total_volume=parseInt(kali)+ parseInt(t_volume);
	
	var t_pacs=$('#t_pacs').val();
	var total_pacs=parseInt(t_pacs) + parseInt(pcs);
	//var total_pacs=parseInt(t_pacs)+ parseInt(pcs);
	
if (panjang == '' || lebar == '' || pcs == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{				
	text='<tr class="gradeX" align="right">'
	+ '<td></td>'
    + '<td>' + '<input type="hidden" name="pcs[]" id="pcs[]" size="5" value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="p[]" id="p[]" size="5" value="'+ panjang +'">'+ '<label id="l_pcs">'+ panjang +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="l[]" id="l[]" size="5" value="'+ lebar +'">'+ '<label id="l_pcs">'+ lebar +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="t[]" id="t[]" size="5" value="'+ tinggi +'">'+ '<label id="l_pcs">'+ tinggi +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="v[]" id="v[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ kali +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali + '/'+ pcs +'" onclick="hapus2(this)" type="button" ><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tblitems tbody').append(text);
		$("#t_volume").val(total_volume);
		$("#label_volume").html(total_volume);
		$("#t_pacs").val(total_pacs);
		$("#label_pacs").html(total_pacs);
		//RESET INPUTAN
		$("#panjang").val("");
		$("#lebar").val("");
		$("#tinggi").val("");
		$("#pack").val("");
		$("#modaladd").modal('hide');
	}
 });

 $("#btndel").on("click", function(){
        alert('The paragraph was clicked');
 });
		
function hapus(th) {
      var tt=$("#tt").val();;
	  var t_volume=$('#t_volume').val();
	  var kurangi=parseInt(t_volume)- parseInt(tt);
	  			 
	 $("#t_volume").val(kurangi);
					 
     t = $(th);
     tr = t.parent().parent();
     tr.hide();
 }

<!-- hapus item dan kurangi total items pack
function hapus2(myid){
var input = $(myid).val();
var input2 = $(myid).val();
var pecah2=input2.split('/');
var hasil_pecah=pecah2[1];
//document.write('kata yang pertama adalah ' +hasil[0]);

	var t_volume=$('#t_volume').val();
	var hasil=parseInt(t_volume)-parseInt(input);
		var t_pacs=$('#t_pacs').val();
		var hasil2=parseInt(t_pacs)-parseInt(hasil_pecah);

	
	$('#t_volume').val(hasil);
	$('#label_volume').html(hasil);
		$('#t_pacs').val(hasil2);
		$('#label_pacs').html(hasil2);

//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}


$("#savecharges").click(function(){
	//var t_volume=$('#idtotal').val();   
	var charge=$('#charge').val();
	var desc=$('#desc').val();
	var txtunit=$('#txtunit').val();
	var txtqty=$('#txtqty').val();
 	var kali = parseInt(txtunit) * parseInt(txtqty);
 	var total_charge=$('#total_charge').val();
	var jumlah=parseInt(total_charge) + parseInt(kali);			
if (txtunit == '' || txtqty == '' || charge == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX" align="left">'
	+ '<td></td>'
    + '<td>' + '<input type="hidden" name="idcharge[]" id="pcs[]" size="5" value="'+ charge +'">'+ '<label id="l_pcs">'+ charge +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="desc[]" id="p[]" size="5" value="'+ desc +'">'+ '<label id="l_pcs">'+ desc +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="unit[]" id="l[]" size="5" value="'+ txtunit +'">'+ '<label id="l_pcs">'+ txtunit +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="qty[]" id="t[]" size="5" value="'+ txtqty +'">'+ '<label id="l_pcs">'+ txtqty +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="total[]" id="v[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ kali +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tblcharges tbody').append(text);
		$("#total_charge").val(jumlah);
		$("#label_charges").html(jumlah);
//RESET INPUT
$('#txtunit').val("");
$('#txtqty').val("");
$('#desc').val("");
		$("#modaladdCharge").modal('hide');
	}
 });


function hapus3(myid){
var input = $(myid).val();

var total_charge=$('#total_charge').val();
var hasil=parseInt(total_charge)-parseInt(input);

$('#total_charge').val(hasil);
$("#label_charges").html(hasil);

     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}

</script>

 
  <!-- ============================================================== -->   

	</body>
</html>
