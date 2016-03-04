<!DOCTYPE HTML>
<html lang="en-US"><head>
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
	  .txtrp{text-align:right;}

      </style>
    <script type="text/ecmascript">
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
    var rev     = parseFloat(angka, 10).toString().split('').reverse().join('');
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

 function count_freight(){
  var cwt =document.getElementById("cwt").value;
  var freight =document.getElementById("freight").value;
  var result=parseFloat(cwt) * parseFloat(freight);  
  var t_freight=result;//toRp(result);
  var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)+parseFloat(result);
  var formatgrand=toRp(t_total);
   
  document.getElementById("t_freight").value=t_freight;
  document.getElementById("txtfreight").value=result;
  document.getElementById("t_total").value=formatgrand;
 document.getElementById("txttotal").value=t_total;
 document.getElementById("grandtotal").value=formatgrand;
 document.getElementById("txtgrandtotal").value=t_total;
 }
function count_quarantine(){
  var pcs =document.getElementById("t_pacs").value;
  var quarantine =document.getElementById("quarantine").value;
  var result=parseFloat(pcs) * parseFloat(quarantine);  
  var t_quarantine=toRp(result);
  var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)+parseFloat(result);
  var formatgrand=toRp(t_total);
   
  document.getElementById("t_quarantine").value=t_quarantine;
  document.getElementById("txtquarantine").value=result;
  document.getElementById("t_total").value=formatgrand;
 document.getElementById("txttotal").value=t_total; 
 document.getElementById("grandtotal").value=formatgrand;
document.getElementById("txtgrandtotal").value=t_total;
 }
 function otherRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
  var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)+parseFloat(angka);
  var formatgrand=toRp(t_total);

 document.getElementById("other2").value=format; 
 document.getElementById("t_total").value=formatgrand;
 document.getElementById("txttotal").value=t_total; 
 document.getElementById("grandtotal").value=formatgrand;
document.getElementById("txtgrandtotal").value=t_total; 
 }
  function admRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
    var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)+parseFloat(angka);
  var formatgrand=toRp(t_total);

 document.getElementById("adm2").value=format;  
 document.getElementById("t_total").value=formatgrand;
 document.getElementById("txttotal").value=t_total; 
 document.getElementById("grandtotal").value=formatgrand;
document.getElementById("txtgrandtotal").value=t_total;
 }
  function deliveryRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
  var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)+parseFloat(angka);
  var formatgrand=toRp(t_total);

 document.getElementById("delivery2").value=format; 
 document.getElementById("t_total").value=formatgrand;
 document.getElementById("txttotal").value=t_total;
 document.getElementById("grandtotal").value=formatgrand;
document.getElementById("txtgrandtotal").value=t_total; 
 }
  function diskonRp(){
  var angka =document.getElementById("diskon").value;
  var format=toRp(angka);
  var total=document.getElementById("txttotal").value; 
  var t_total=parseFloat(total)-parseFloat(angka);
  var formatgrand=toRp(t_total);

 document.getElementById("diskon").value=format;
 document.getElementById("txtdiskon").value=angka;
document.getElementById("grandtotal").value=formatgrand;
document.getElementById("txtgrandtotal").value=t_total; 
  
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
					beforeSend: function(){
            		 //$('#contenshipper').html(' data loading loading loanding');
					 $(".fa-pulse").show();
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
            	/*	$("#result").append(
            			"<li>"+ ui.item.kota + "</li>"
            		);    */
					$("#idsender").val(ui.item.id);
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
					$("#idreceivement").val(ui.item.id);
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
                <h4><i class="fa fa-calendar-check-o bigger-120"></i> &nbsp; Domestic Outgoing House:: Entry Data</h4>
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


          <strong>
          <label class="col-sm-4"> House/Connote</label></strong>
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
<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
            <input type="text" name="idshipper" id="idshipper" class="form-control" placeholder="types customer name" autocomplete="off" required/>
          <input name="name1" type="hidden" class="form-control"  id="name1" required value="<?php echo $row->custName;?>"/>
          <input name="idsender" type="hidden" class="form-control"  id="idsender" required value="<?php echo $row->custName;?>"/>
          </div>
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
      <label for="codeship">Code shipper</label></div>
    <div class="col-sm-7"> <input type="text" name="codeship" id="codeship" class="autocomplete form-control" />
    </div>
</div>

<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->
sdkjhsjf shfjdshfj  <i class="fa fa-spinner fa-pulse fa-2x" style="display:none"></i>
</div>

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
<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>

          <strong><label class="col-sm-4"> Consignee</label>
          </strong>
            <div class="col-sm-7">
            <input name="idconsigne" type="text" class="form-control"  id="idconsigne" placeholder="types customer name" autocomplete="off" required/>
            <input name="name2" type="hidden" class="form-control"  id="name2" required />
            <input name="idreceivement" type="hidden" class="form-control"  id="idreceivement" required value="<?php echo $row->custName;?>"/>
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
      <label for="codeship">Code Consignee</label></div>
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
                     <thead>
                          <tr align="">
                            <th colspan="2"><div align="center">No Of Pcs</div></th>
                            <th><div align="center">Length ( P )</div></th>
                            <th><div align="center">Width ( L )</div></th>
                            <th><div align="center">Height ( T )</div></th>
                            <th>Volume</th>
                            <th><div align="center">G.Weight</div></th>
                            <th class="text-center"><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                            </div></th>
                          </tr>
                          </thead>
                                                
                                               
                                                
                                                
                                              </thead>
                                              <tbody>

                                                <thead>
                                                 <tr align="right">
                                                  <td colspan="2"><label id="label_pacs">0</label>
                                                   <input name="t_pacs" type="hidden" id="t_pacs" value="0" /></td>
                                                  <td colspan="3">Total</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="0" />
                                                   <label id="label_volume">0</label></td>
                                                  <td><input name="t_weight" type="hidden" id="t_weight" value="0" />      
                                                   <label id="label_weight">0</label></td>  
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
                                              <input type="text" name="cwt" id="cwt" class="form-control" onkeypress="return isNumberKey(event)" value="0">
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

                    </div>
<!--  INPUT COST -->
<h2><span class="label label-large label-pink arrowed-in-right"><strong>COST / CHARGES</strong></span></h2>

<div class="col-md-5">
      <div class="row">
        <div class="col-md-12">
  <label class="col-sm-4">Air Freight</label> 
  <div class="col-sm-7">
  <input type="text" name="freight" id="freight" class="form-control" onkeypress="return isNumberKey(event)" onchange="return count_freight();"  required>
  </div>
</div>
<div class="col-md-12">
<label class="col-sm-4">Quarantine</label>
<div class="col-sm-7">
  <input type="text" name="quarantine" id="quarantine" class="form-control" onkeypress="return isNumberKey(event)" onChange="count_quarantine()"  required>
  </div>

</div>
<div class="col-md-12">
<label class="col-sm-4">Adm SMU</label> 
  <div class="col-sm-7">
  <input type="text" name="adm" id="adm" class="form-control" onkeypress="return isNumberKey(event)" onChange="return admRp(this)" required>
  </div>
</div>

<div class="col-md-12">
<label class="col-sm-4">Delivery</label> 
  <div class="col-sm-7">
  <input type="text" name="delivery" id="delivery" class="form-control" onkeypress="return isNumberKey(event)" onChange="return deliveryRp(this)" required>
  </div>
</div>
<div class="col-md-12">
<label class="col-sm-4">Other Cost &nbsp;</label>
<div class="col-sm-7"><input type="text" name="other" id="other" class="form-control" onkeypress="return isNumberKey(event)" onChange="return otherRp(this)"></div>
</div>
  
    </div>
      </div>
<!-- Right input -->
<div class="col-md-6">
      <div class="row">
          <div class="col-md-12">
  <label class="col-sm-7 text-right">Rp</label> 
    <div class="col-sm-4">
      <input type="text" name="t_freight" id="t_freight" class="form-control txtrp" onkeypress="return isNumberKey(event)" required readonly>
    <input type="hidden" name="txtfreight" id="txtfreight">
    </div>
</div>

<div class="col-md-12">
<label class="col-sm-7 text-right">Rp</label> 
  <div class="col-sm-4">
    <input type="text" name="t_quarantine" id="t_quarantine" class="form-control txtrp" onkeypress="return isNumberKey(event)" required readonly>
    <input type="hidden" name="txtquarantine" id="txtquarantine">
  </div>
</div>
<div class="col-md-12">
 <label class="col-sm-7 text-right">Rp</label>
<div class="col-sm-4">
  <input type="text" name="adm2" id="adm2" class="form-control txtrp" onkeypress="return isNumberKey(event)" required>
</div>

</div>
<div class="col-md-12">
 <label class="col-sm-7 text-right">Rp</label> 
  <div class="col-sm-4">
  <input type="text" name="delivery2" id="delivery2" class="form-control txtrp" onkeypress="return isNumberKey(event)"  required>
  </div>
</div>
<div class="col-md-12">
<label class="col-sm-7 text-right">Rp</label>
<div class="col-sm-4"><input type="text" name="other2" id="other2" class="form-control txtrp" onkeypress="return isNumberKey(event)"></div>
</div>

``</div>
</div>

<!-- diskon input -->
<div class="col-sm-12 line" id="line">
<hr>

<div class="col-sm-8"><p class="text-right">TOTAL </p></div>
<div class="col-sm-3"><p class="text-left"><input type="text" name="t_total" id="t_total" class="form-control txtrp" readonly="readonly">
<input type="hidden" name="txttotal" id="txttotal" value="0">
</p>
</div>

<div class="col-sm-8"><p class="text-right">DISKON </p></div>
<div class="col-sm-3"><p class="text-left"><input type="text" name="diskon" id="diskon" class="form-control txtrp" onchange="diskonRp();">
<input type="hidden" name="txtdiskon" id="txtdiskon" class="form-control" value="0">
</p></div>

<div class="col-sm-8"><p class="text-right">GRAND TOTAL </p></div>
<div class="col-sm-3"><p class="text-left"><input type="text" name="grandtotal" id="grandtotal" class="form-control txtrp" onchange="grandtotalRp();" readonl="readonly">
<input type="hidden" name="txtgrandtotal" id="txtgrandtotal" class="form-control" value="0">
</p></div>


</div>
<!-- END COST -->  
              <div class="clearfix clearfx"></div>
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
                <h3 id="myModalLabel">Add Items</h3>
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
<div class="form-group">
                        <label class="col-sm-3 control-label">Weight &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="weight" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="weight" />
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
                        <label class="col-sm-3 control-label">Unit &nbsp; Price</label>
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
   
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/search_discount_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
				beforeSend: function(){
            		 $('#loading').show();
         			 },
                success: function(data){
                    $('#table_responsive').html(data);
					 $('#loading').show();
                    //document.frm.add.disabled=false;
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
	if (initial == '' || namecust =='')
        { 
		alert('Mohon isi data dengan lengkap');
		$("#initial").css("border-color","red");
		$("#label-confir").css({"background-color": "white", "color": "red"});
		$("#label-confir").html('<i class="fa fa-times"></i>');
        }
    else
        {	
	  $.ajax({
        type: "POST",
        url : "<?php echo base_url('booking/save_customer2'); ?>",
 data: "namecust="+namecust+"&initial="+initial+"&address="+address+"&city="+city+"&phone="+phone+"&fax="+fax+"&postcode="+postcode+"&email="+email+"&remarks2="+remarks2+"&isagent="+isagent+"&isshipper="+isshipper+"&iscnee="+iscnee,
         success: function(data){
            alert('Customer with name ' +namecust +' Success Saved');
			// clear input if success
			$("#initial").val('');
			$("#namecust").val('');
			$("#address").val('');
			$("#phone").val('');
			$("#fax").val('');
			$("#postcode").val('');
			$("#email").val('');
			$("#remarks2").val('');
			}
        });	
			$("#initial").css("border-color","#D9DFE2");
			$("#label-confir").html('');
			$("#modaladdcust").modal('hide');
		}
			
   });
	
		
$("#iditems").click(function(){
	//var t_volume=$('#idtotal').val();   
	var pcs=$('#pack').val();
	var panjang=$('#panjang').val();
	var lebar=$('#lebar').val();
	var tinggi=$('#tinggi').val();
	var weight=$('#weight').val();
 	var hitung = parseFloat(panjang) * parseFloat(lebar) * parseFloat(tinggi)/6000;
	var kali=hitung.toFixed(2); //membuat desimal 2 angka belakang koma
 	var t_volume=$('#t_volume').val();
	var volume=parseFloat(kali)+ parseFloat(t_volume);
	var total_volume=volume.toFixed(2); //membuat desimal 2 angka belakang koma
	
	var t_pacs=$('#t_pacs').val();
	var total_pacs=parseFloat(t_pacs) + parseFloat(pcs);
	var t_weight=$('#t_weight').val();
	var total_weight=parseFloat(t_weight) + parseFloat(weight);
	//var total_pacs=parseFloat(t_pacs)+ parseFloat(pcs);
	
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
    + '<td>' + '<input type="hidden" name="v[]" id="v[]" size="5" value="'+ weight +'">'+ '<label id="l_pcs">'+ weight +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali + '/'+ pcs + '/' + weight + '" onclick="hapus2(this)" type="button" ><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tblitems tbody').append(text);
		$("#t_volume").val(total_volume);
		$("#label_volume").html(total_volume);
		$("#t_weight").val(total_weight);
		$("#label_weight").html(total_weight);
		$("#t_pacs").val(total_pacs);
		$("#label_pacs").html(total_pacs);
		
		//RESET INPUTAN
		$("#panjang").val("");
		$("#lebar").val("");
		$("#tinggi").val("");
		$("#pack").val("");
		$("#weight").val("");
		$("#modaladd").modal('hide');
		
		if(total_volume > total_weight)
		{
			$("#cwt").val(total_volume);
			
		} else {
			
			$("#cwt").val(total_weight);
		}
		
	}
 });

 
	
function hapus(th) {
      var tt=$("#tt").val();;
	  var t_volume=$('#t_volume').val();
	  var kurangi=parseFloat(t_volume)- parseFloat(tt);
	  			 
	 $("#t_volume").val(kurangi);
					 
     t = $(th);
     tr = t.parent().parent();
     tr.hide();
 }

<!-- hapus item dan kurangi total items pack
function hapus2(myid){
var input = $(myid).val();
//var input2 = $(myid).val();
var pecah=input.split('/');
var pcs=pecah[1];
var weight=pecah[2];

	var t_volume=$('#t_volume').val();
	var kurang=parseFloat(t_volume)-parseFloat(input);
	var hasil=kurang.toFixed(2);
	$('#t_volume').val(hasil);
	$('#label_volume').html(hasil);
	
	var t_pacs=$('#t_pacs').val();
	var kurang2=parseFloat(t_pacs)-parseFloat(pcs);
	var hasil2=kurang2.toFixed(2);
	$('#t_pacs').val(hasil2);
	$('#label_pacs').html(hasil2);
	
	var t_weight=$('#t_weight').val();
	var kurang3=parseFloat(t_weight)-parseFloat(weight);
	var hasil3=kurang3.toFixed(2);
	$('#t_weight').val(hasil3);
	$('#label_weight').html(hasil3);
	
	if(hasil > hasil3){
		$('#cwt').val(hasil);
	} else {
		$('#cwt').val(hasil3);
	}
	
	
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
 	var kali = parseFloat(txtunit) * parseFloat(txtqty);
 	var total_charge=$('#total_charge').val();
	var jumlah=parseFloat(total_charge) + parseFloat(kali);			
if (txtunit == '' || txtqty == '' || charge == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
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
var hasil=parseFloat(total_charge)-parseFloat(input);

$('#total_charge').val(hasil);
$("#label_charges").html(hasil);

     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}

   $('#plane').change(function(){
    	$.getJSON("<?php echo base_url('transaction/getcost'); ?>",
		{
			action:'getcode', plane:$(this).val()}, function(json){
    		if (json == null) {
    			$('#goodcost').text('');
    			$('#freight').val('');
    			} else {
    			$('#goodcost').text(json.AirLineCode);
    			$('#freight').val(json.AirLineName);
    			}
    		});
    });
					
</script>

 
  <!-- ============================================================== -->   

  </body>
</html>