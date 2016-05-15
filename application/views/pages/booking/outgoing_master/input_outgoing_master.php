<!DOCTYPE HTML>
<html lang="en-US"><head>
      <title>outgoing house</title>
        
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

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
#t_freight,#t_quarantine,#other2,#delivery2,#adm2{ text-align:right;}

      </style>
<script type="text/ecmascript">
 
  $(function() {
	$("#etd").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#flightdate1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#flightdate2").datepicker({
		dateFormat:'yy-mm-dd',
		});			
	$("#flightdate3").datepicker({
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


 function count_freight3(input){
	var total=document.getElementById("total_charge").value;
	var lastcharge=document.getElementById("totfreight").value;// ambil nilai sub total charge terakhir untuk membandingkan dengan inputan baru agar grandtota; tidak selalu bertambah

	var price=document.getElementById("pricefreight").value;
	var qty=document.getElementById("qtyfreight").value;
	var subtotal=parseFloat(price) * parseFloat(qty);
	var newcharge=document.getElementById("totfreight").value=subtotal;
	document.getElementById("label_totfreight").innerHTML=toRp(subtotal);

	if(newcharge > lastcharge)
	{
		 var selisih=parseFloat(newcharge) - parseFloat(lastcharge);
		 var nilai=parseFloat(total) + parseFloat(selisih);
	} else if(lastcharge > newcharge) {
		var selisih=parseFloat(lastcharge) - parseFloat(newcharge);
		var nilai=parseFloat(total) - parseFloat(selisih);	
	}
	var diskon=$("#txtdiskon").val();
	var grand=parseFloat(nilai) - parseFloat(diskon);
	
	$("#label_price").html('Rp '+ toRp(price));
	$("#total_charge").val(nilai);
	$("#label_charges").html(toRp(nilai));
	$("#t_total").val(toRp(nilai));
	$("#txttotal").val(toRp(nilai));
	$("#grandtotal").val(toRp(grand));
	$("#txtgrandtotal").val(grand);
	
	
 }
 
 function count_freight2(input){
	var total=document.getElementById("total_charge").value;
	var lastcharge=document.getElementById("totfreight2").value;// ambil nilai sub total charge terakhir untuk membandingkan dengan inputan baru agar grandtota; tidak selalu bertambah
	
	var price=document.getElementById("pricefreight2").value;
	var qty=document.getElementById("qtyfreight2").value;
	var subtotal=parseFloat(price) * parseFloat(qty);
	//var format_sub=toRp(subtotal);
	var newcharge=document.getElementById("totfreight2").value=subtotal;
	document.getElementById("label_totfreight2").innerHTML=toRp(subtotal);

	if(newcharge > lastcharge)
	{
		 var selisih=parseFloat(newcharge) - parseFloat(lastcharge);
		 var nilai=parseFloat(total) + parseFloat(selisih);
	} else if(lastcharge > newcharge) {
		var selisih=parseFloat(lastcharge) - parseFloat(newcharge);
		var nilai=parseFloat(total) - parseFloat(selisih);
	}

	$("#label_price2").html('Rp '+ toRp(price));
	$("#total_charge").val(nilai);
	$("#label_charges").html(toRp(nilai));
	$("#t_total").val(toRp(nilai));
	
	var diskon=$("#txtdiskon").val();
	var grand=parseFloat(nilai) - parseFloat(diskon);
	$("#diskon").val(toRp(diskon));
	$("#txtdiskon").val(diskon);
	$("#grandtotal").val(toRp(grand));
	$("#txtgrandtotal").val(grand);
 }
function count_quarantine(){
  var pcs =document.getElementById("t_pacs").value;
  var quarantine =document.getElementById("quarantine").value;
  var result=parseFloat(pcs) * parseFloat(quarantine);  
  var t_quarantine=toRp(result);
  
 var txtfreight=document.getElementById("txtfreight").value;
 var adm=document.getElementById("adm").value;
 var delivery=document.getElementById("delivery").value;
 var other=document.getElementById("other").value; 
 var total=parseFloat(result)+parseFloat(txtfreight)+parseFloat(adm)+			          parseFloat(delivery)+parseFloat(other);
 var format_total=toRp(total);
   
  document.getElementById("t_quarantine").value=t_quarantine;
  document.getElementById("txtquarantine").value=result;
 document.getElementById("t_total").value=format_total;
 document.getElementById("txttotal").value=total;
 }
function otherRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
 var txtfreight=document.getElementById("txtfreight").value;
 var adm=document.getElementById("adm").value;
 var delivery=document.getElementById("delivery").value;
 var txtquarantine=document.getElementById("txtquarantine").value; 
 var total=parseFloat(angka)+parseFloat(txtfreight)+parseFloat(adm)+			          parseFloat(delivery)+parseFloat(txtquarantine);
 var format_total=toRp(total);

 document.getElementById("other2").value=format; 
 document.getElementById("t_total").value=format_total;
 document.getElementById("txttotal").value=total; 
 
 }
  function admRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
 var txtfreight=document.getElementById("txtfreight").value;
 var other=document.getElementById("other").value;
 var delivery=document.getElementById("delivery").value;
 var txtquarantine=document.getElementById("txtquarantine").value; 
 var total=parseFloat(angka)+parseFloat(txtfreight)+parseFloat(other)+			          parseFloat(delivery)+parseFloat(txtquarantine);
 var format_total=toRp(total);

 document.getElementById("adm2").value=format;  
 document.getElementById("t_total").value=format_total;
 document.getElementById("txttotal").value=total;
 }
 
function deliveryRp(input){
  var angka =$(input).val();
  var format=toRp(angka);
 var txtfreight=document.getElementById("txtfreight").value;
 var other=document.getElementById("other").value;
 var adm=document.getElementById("adm").value;
 var txtquarantine=document.getElementById("txtquarantine").value; 
 var total=parseFloat(angka)+parseFloat(txtfreight)+parseFloat(other)+			          parseFloat(adm)+parseFloat(txtquarantine);
 var format_total=toRp(total);

 document.getElementById("delivery2").value=format; 
 document.getElementById("t_total").value=format_total;
 document.getElementById("txttotal").value=total;
 }
 
 function diskonRp(input){
  var angka =$(input).val();
  
  var t_charge=document.getElementById("total_charge").value;
  var txtdiskon=angka;

 var total=parseFloat(t_charge)- parseFloat(txtdiskon);

 document.getElementById("txtdiskon").value=angka;
 document.getElementById("grandtotal").value=toRp(total);
 document.getElementById("txtgrandtotal").value=total;
 document.getElementById("diskon").value=toRp(angka);

 }

 function hitung(){
	var txtdiskon=document.getElementById("txtdiskon").value;
 	var total=document.getElementById("total_charge").value;
	var t_netto=parseFloat(total)- parseFloat(txtdiskon);
	
	document.getElementById("grandtotal").value=toRp(t_netto);
	document.getElementById("txtgrandtotal").value=t_netto; 
	var nilai=$("#txtgrandtotal").val();
	 if(nilai <=0){
		 alert('discount to much !');
	 } else {
		 
 		alert('yaaa');
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
		       url: "<?php echo base_url();?>index.php/autocomplete_customers/lookup_sender",
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
					$("#idsender").val(ui.item.nomor);
					$("#name1").val(ui.item.name); 
					$("#phone1").val(ui.item.phone);
					$("#address1").val(ui.item.address); 		
         		},		
    		});
$("#idshipper").click(function(){
					$("#idsender").val('');
					$("#idshipper").val('');
					$("#name1").val(''); 
					$("#phone1").val('');
					$("#address1").val(''); 	
});
//for shipper
$("#idconsigne").autocomplete({

      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete_customers/lookup_receivement",
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
					$("#idreceivement").val(ui.item.nomor);
					$("#name2").val(ui.item.name); 
					$("#phone2").val(ui.item.phone);
					$("#address2").val(ui.item.address);		
         		},		
    		});
$("#idconsigne").click(function(){
					$("#idconsigne").val('');
					$("#idreceivement").val('');
					$("#name2").val(''); 
					$("#phone2").val('');
					$("#address2").val('');	
	});
});

	    </script>      

  </head>
  <body>

 <!-- ==========================================================  -->   
  <div class="row-fluid" style="">
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
                <h4><i class="fa fa-plus-square bigger-120"></i> &nbsp;  Outgoing Master:: Entry Data</h4>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/confirm_outgoing_master" autocomplete="off" id="myform" onsubmit="return validasiform()" name="myform">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Sender</span></label> 
<div class="clearfx">&nbsp;</div>         
           <label class="col-sm-4"> JOB No</label> 
          <div class="col-sm-7">
           <input name="job" type="text" class="form-control"  id="name" placeholder="generated by system" readonly/>
          </div>



           <label class="col-sm-4"> Payment </label> 
          <div class="col-sm-7">
          <select name="paymentype" class="form-control" required="required" id="paymentype">
          <option value="">Select Payment  Type</option>
                   <?php
                   foreach ($payment_type as $pay) {
                   ?>
                     <option value="<?php echo $pay->PayCode.'-'.$pay->PayName;?>"><?php echo $pay->PayName;?></option>
                     <?php } ?>
          </select>
          </div>
         
           <label class="col-sm-4"> Origin</label> 
          <div class="col-sm-7">
            <select name="origin" id="origin" class="form-control" required="required" onChange="return getflight()">
              <option value="">Choose Origin</option>
              <?php foreach ($city as $ct) {
          ?>
              <option value="<?php echo $ct->PortCode;?>"><?php echo $ct->PortCode.' - '.$ct->PortName;?></option>
              <?php } ?>
            </select>
          </div>
           <label class="col-sm-4"> Destination</label> 
          <div class="col-sm-7">
            <select name="desti" id="desti" class="form-control" required="required" onChange="return getflight()">
              <option value="">Choose Destination</option>
              <?php foreach ($city as $ct) {
          ?>
              <option value="<?php echo $ct->PortCode;?>"><?php echo $ct->PortCode.' - '.$ct->PortName;?></option>
              <?php } ?>
            </select>
          </div>
<div class="form-group">
             <label class="col-sm-4"> Departure Date</label> 
          <div class="col-sm-7">
            <input name="etd" type="text" class="form-control"  id="etd" required value="<?php echo date("Y-m-d") ;?>" onChange="return getflight()" readonly/>
          </div>
       </div>
<div class="form-group"> 
           <label class="col-sm-4"> Service</label> 
          <div class="col-sm-7">
            <select name="service" id="service" class="form-control" required="required">
              <option value="">Service</option>
              <?php foreach ($service as $sv) {
          ?>
              <option value="<?php echo $sv->Name;?>"><?php echo $sv->Name;?></option>
              <?php } ?>
            </select>
          </div>
 </div>

<!-- HIDDEN MENU -->
<div style=" display:block " id="divsmu">  
<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div> 
<div class="form-group">
           <label class="col-sm-4">Air Line</label> 
          <div class="col-sm-7">
          <select name="airline" class="form-control"  id="airline" onChange="return getprefix(this)">
          <option value="">Select AirLine</option>
                   <?php
                   foreach ($airline as $air) {
                   ?>
                     <option value="<?php echo $air->AirLineCode;?>"><?php echo $air->AirLineName;?></option>
                     <?php } ?>
          </select>
          </div>
</div>      
 
 <div class="form-group form-inline">
          <label class="col-sm-4">SMU No</label> 
          <div class="col-sm-2">
        <input name="prefixsmu" type="text" class="form-control"  id="prefixsmu" readonly />
        <input type="hidden" name="smuconfirm" id="smuconfirm">
          </div>
          <div class="col-sm-4">
        <input name="smu" type="text" class="form-control"  id="smu" placeholder="No SMU" style="width:170px" onBlur="return cekprimary()"/>
  
          </div>
 </div>
 <div class="form-group" style="display:none" id="divalert">
 <div class="col-sm-12 text-center">
 <h3 id="cekid" class="label label-important"></h3>
 </div>
 </div><div class="clearfix"></div>
 
 </br>
 
 <div class="form-group">
<label class="col-sm-4">Flight Number</label>
<div class="col-sm-7">
		<div class="row">
        <div class="col-sm-10" style="margin-left:12px;">
     <select name="flightno1" class="form-control" id="flightno1" onChange="return geteta(this);">
          </select>
        </div>
         </div>
 </div>
</div>
<div class="form-group">
<label class="col-sm-4">ETD / ETA </label>
<div class="col-sm-7">
<input name="eta" type="text" class="form-control"  id="eta" readonly  />	
 </div>
</div>

</div>   
   


<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->
<i class="fa fa-spinner fa-pulse fa-2x" style="display:none"></i>
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
        <div class="col-sm-12">
<label class="col-sm-12"> <span class="span3 label label-large label-pink arrowed-in-right">Receivement</span></label> 
<div class="clearfx">&nbsp;</div>
         <label class="col-sm-4">Booking No</label> 
          <div class="col-sm-7">
           <input name="booking" type="text" class="form-control"  id="booking"  />
          </div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Limit CWT</label></div>
    <div class="col-sm-7"> <input type="text" name="limitcwt" id="limitcwt" class="autocomplete form-control" onkeypress="return isNumberKey(event)" required />
    </div>
</div>

<!-- <div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h6>&nbsp;</h6></div>
-->
<div class="form-group">           
          <label class="col-sm-4"> Shipper</label> 
          <div class="col-sm-7">
            <input type="text" name="idshipper" id="idshipper" class="form-control" placeholder="types customer name" autocomplete="off" required />
          <input name="name1" type="hidden" class="form-control"  id="name1"  value="<?php echo $row->custName;?>"/>
          <input name="idsender" type="hidden" class="form-control"  id="idsender"  value="<?php echo $row->custName;?>"/>
          </div>

</div> 

<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Phone</label></div>
    <div class="col-sm-7"> <input type="text" name="phone1" id="phone1" class="autocomplete form-control" readonly/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address1" class="autocomplete form-control" id="address1" readonly></textarea>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Code shipper</label></div>
    <div class="col-sm-7"> <input type="text" name="codeship" id="codeship" class="autocomplete form-control" />
    </div>
</div>
<div class="col-sm-12">
<hr style="border:1px #CCC dashed"></div>
<div class="form-group form-inline">
           <label class="col-sm-4"> Consignee</label>
            <div class="col-sm-7">
            <input name="idconsigne" type="text" class="form-control"  id="idconsigne" placeholder="types customer name" autocomplete="off" required />
            <input name="name2" type="hidden" class="form-control"  id="name2"  />
            <input name="idreceivement" type="hidden" class="form-control"  id="idreceivement"  value="<?php echo $row->custName;?>"/>
          </div>
 </div>
          

<div class="form-group">      
  <div class="col-sm-4">
      <label for="limitcwt">Phone</label></div>
    <div class="col-sm-7">
      <input name="phone2" type="text" class="form-control" readonly  id="phone2"/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address2" class="autocomplete form-control" id="address2" readonly></textarea>
    </div>
</div>


<div class="form-group">      
    <div class="col-sm-4">
      <label for="limitcwt">Code Consignee</label></div>
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
<h2><span class="label label-large label-pink arrowed-in-right"> List Item's </span></h2>
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
                            <th class="text-center"><div align="center">
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
<label id="label_volume">0</label>
                                                  </td>
                                                  <td><input name="t_weight" type="hidden" id="t_weight" value="0" />
                                                  <label id="label_weight">0</label>
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
                                                <label for="commodity"></label>
                                                <textarea name="commodity" id="commodity" class="form-control"></textarea>
                                              </div>
                                                </div>

                                              <div class="col-md-12">
                                              <label class="col-sm-4">Special Instructions &nbsp;</label>
                                              <div class="col-sm-7">
                                                <textarea name="spesial" id="spesial" class="form-control"></textarea>
                                              </div>
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
                                              <input type="text" name="cwt" id="cwt" class="form-control" onkeypress="return isNumberKey(event)" value="0"><input type="hidden" name="ori_cwt" id="ori_cwt" value="0">
                                              </div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Declare Value &nbsp;</label>
                                              <div class="col-sm-8"><input type="text" name="declare" id="declare" class="form-control" onkeypress="return isNumberKey(event)"></div>
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
  
                                   
<div class="form-group" style="display:none">
    <div class="table-responsive" id="table_responsive">
<h2><span class="label label-large label-pink arrowed-in-right"> COST / CHARGES </span></h2>
    <table class="table table-hover" id="tblcharges" style="width:95%;">
                                              <thead>
                                                
                                                <tr>
                                                  <th>Charges</th>
                                                  <th>Price</th>
                                                  <th width="83">Qty</th>
                                                  <th style="width:28%">Desc</th>
                                                  <th>Total</th>
                                                  <th class="text-center"><a class="btn  btn-primary btn-round" href="#modaladdCharge" data-toggle="modal" title="Add item" id="addchrg"><i class="icon-plus icons"></i> Add Cost</a></th>
                                                </tr>
 </thead>  <tbody>
                                                <tr>
  <th height="26"><span class="col-sm-4">AirFreight
 <input type="hidden" name="idcharge[]" id="idcharge[]" value="1">
   </span></th>
 
 <th><input type="text" name="unit[]" id="pricefreight" onChange="return count_freight3(this);" class="form-control" style=" text-align:right" value="0" onkeypress="return isNumberKey(event)"><label id="label_price" style="text-align:right;color:#1963aa;font-style:italic">0</label></th>
                                                  <th><input type="text" name="qty[]" id="qtyfreight" style="width:50px;text-align:right" value="1" class="form-control" onChange="return count_freight3(this);" onkeypress="return isNumberKey(event)"></th>
                                                  <th>

      <input type="text" name="desc[]" id="descfreight" style="width:100%" class="form-control">                                            
                                                  </th>
                                                  <th><input type="hidden" name="totalcharges[]" id="totfreight" style="width:98%;text-align:right" value="0"  readonly class="form-control">
<label id="label_totfreight" style="float:right;color:#1963aa;font-style:italic">0</label>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th width="84"><span class="col-sm-4">SMU
                                                    <input type="hidden" name="idcharge[]" id="idcharge[]" value="2">
                                                  </span></th>
                                                  <th width="208"><input type="text" name="unit[]" id="pricefreight2" style="width:98%; text-align:right" onChange="return count_freight2(this)" class="form-control" value="0" onkeypress="return isNumberKey(event)">
<label id="label_price2" style="text-align:right;color:#1963aa;font-style:italic">0</label>
                                                  </th>
                                                  <th width="83">                                       <input type="text" name="qty[]" id="qtyfreight2" style="width:50px;text-align:right" value="1" class="form-control" onChange="return count_freight2(this)" onkeypress="return isNumberKey(event)">
 </th>
                                                  <th width="190"><div align="center">
                                                    
  <input type="text" name="desc[]" id="descfreight" style="width:100%" class="form-control">
                                                  </div></th>
                                                  <th width="62"><div align="center">
                                                    <input type="hidden" name="totalcharges[]" id="totfreight2" style="width:98%;text-align:right" readonly  class="form-control" value="0">
<label id="label_totfreight2" style="float:right;color:#1963aa;font-style:italic">0</label>         
                                                  </div></th>
                                                  <th class="text-center"><div align="center"></div></th>
                                                </tr>
                                                
                                                
   
    </tbody>                                           
                                              
                                              

                                                <tfoot>
                                                 <tr>

                                                  <td><b>Total</b></td>
                                                  <td colspan="4"><div align="right">
                                                  <input name="total_charge" type="hidden" id="total_charge" value="0" />
  <label id="label_charges">0</label>                                                                                           
                                                  
                                                   </div></td>
                                                  <td width="42">&nbsp;</td>
                                                </tr>
                                                </tfoot>
                                            </table>
              </div>
                  </div>
                                     
 



<div class="col-md-6">
 
</div>
<!-- FOR DEFAULT COST-->
    
 <!-- right input -->
 
 
 
<!-- discoount iinput -->
<div class="col-sm-12 line" id="line" style="display:none">


<div class="col-sm-8"><p class="text-right">TOTAL </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="t_total" id="t_total" class="form-control txtrp" readonly value="0">
<input type="hidden" name="txttotal" id="txttotal" value="0">
</p>
</div>

<div class="col-sm-8"><p class="text-right">DISKON </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="diskon" id="diskon" class="form-control txtrp" onchange="return diskonRp(this);" value="0" onkeypress="return isNumberKey(event)">
</p></div>

<div class="col-sm-8"><p class="text-right">GRAND TOTAL <span class="text-left">
  <input type="hidden" name="txtdiskon" id="txtdiskon" class="form-control" value="0">
</span></p>
</div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="grandtotal" id="grandtotal" class="form-control txtrp"  readonl="readonly" readonly value="0">
<input type="hidden" name="txtgrandtotal" id="txtgrandtotal" class="form-control" value="0">
</p></div>


</p>
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



<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Items</h3>
            </div>
            <div class="smart-form scroll">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No of Pcs </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="pack" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="pack" value="" />
</span></div>
            <div class="clearfix"></div>
            </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="panjang" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="panjang" value=""/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="lebar" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="lebar" value=""/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tinggi" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="tinggi" value="" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    
<div class="form-group">
                        <label class="col-sm-3 control-label">Weight &nbsp; ( w )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="weight" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="weight" value=""/>
</span></div>
                        <div class="clearfix"></div>
               </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iditems"> Save</button>
              
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
                <h3 id="titlecharges">Add Charges</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">Charges </label>
                        <div class="col-sm-9"><span class="controls">
              <select name="charge" class="form-control" required="required" id="charge">
          <option value="">Choose Charges</option>
          <?php foreach ($chargeoptional as $crg) {
          ?>
            <option value="<?php echo $crg->ChargeCode.'-'.$crg->ChargeName;?>"><?php echo $crg->ChargeName;?></option>
          <?php } ?>
              </select> 
                          </span>
                          </div>
                        <div class="clearfix"></div>
  </div>

  <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;Price</label>
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
<div class="form-group">
                        <label class="col-sm-3 control-label">Description &nbsp;</label>
                        <div class="col-sm-9"><span class="controls">
                <textarea name="desc" id="desc" class="form-control"></textarea>
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancel"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges" onClick="savecharges()"> Save</button>
    </div>
                    </div>
            
           
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
	var smu=$('#smu').val();   
	var pcs=$('#pack').val();
	var panjang=$('#panjang').val();
	var lebar=$('#lebar').val();
	var tinggi=$('#tinggi').val();
	var weight=$('#weight').val();
 	var volume = parseFloat(panjang) * parseFloat(lebar) * parseFloat(tinggi)/6000;
	var format_volume=volume.toFixed(2); //membuat desimal 2 angka belakang koma
 	
	var t_pcs=$('#t_pcs').val();
	var total_pcs=parseFloat(t_pcs) + parseFloat(pcs);
	$('#t_pcs').val(total_pcs);
	$('#label_pcs').html(total_pcs);
		
	var last_volume=$('#t_volume').val();
	var new_volume=parseFloat(last_volume)+ parseFloat(format_volume);
	var format_total_volume=new_volume.toFixed(2); //desimal 2 belakang koma
	$('#t_volume').val(format_total_volume);
	$('#label_volume').html(format_total_volume);
	

	var last_weight=$('#t_weight').val();
	var new_weight=parseFloat(last_weight) + parseFloat(weight);
	$('#t_weight').val(new_weight);
	$('#label_weight').html(new_weight);
	
if (panjang == '' || lebar == '' || pcs == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{	
        $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/insert_book_items2'); ?>",
  data: "pcs="+pcs+"&panjang="+panjang+"&lebar="+lebar+"&tinggi="+tinggi+"&weight="+weight+"&volume="+format_volume+"&smu="+smu,
                success: function(data){
			 $('#table_items').html(data);
             $('#modaladd').hide();
            if(format_total_volume > new_weight){
				
				$('#cwt').val(format_total_volume);
				$('#ori_cwt').val(format_total_volume);
				$('#qtyfreight').val(format_total_volume);
			} else {
				
				$('#cwt').val(new_weight);
				$('#ori_cwt').val(new_weight);
				$('#qtyfreight').val(new_weight);
			}
     }
  });

}
 });
 
$(".del_items").click(function(){
var allcode=$(this).val();
var smu=$('#smu').val(); 

var pecah=allcode.split('/');
var kode=pecah[0];
var pcs=pecah[1];
var vol=pecah[2];
var weight=pecah[3];


	var t_pcs=$('#t_pcs').val();
	var total_pcs=parseFloat(t_pcs) - parseFloat(pcs);
	$('#t_pcs').val(total_pcs);
	$('#label_pcs').html(total_pcs);
		
	var last_volume=$('#t_volume').val();
	var new_volume=parseFloat(last_volume) - parseFloat(vol);
	var format_total_volume=new_volume.toFixed(2); //desimal 2 belakang koma
	$('#t_volume').val(format_total_volume);
	$('#label_volume').html(format_total_volume);
	

	var last_weight=$('#t_weight').val();
	var new_weight=parseFloat(last_weight) - parseFloat(weight);
	$('#t_weight').val(new_weight);
	$('#label_weight').html(new_weight);
	
        $.ajax({
      type: "POST",
     url : "<?php echo base_url('transaction/delete_book_items2'); ?>",
     data: "kode="+kode+"&smu="+smu,
     success: function(data){
		$('#table_items').html(data);
	      if(format_total_volume > new_weight)
		  {
				$('#cwt').val(format_total_volume);
				$('#ori_cwt').val(format_total_volume);
				$('#qtyfreight').val(format_total_volume);
			} else {
				
				$('#cwt').val(new_weight);
				$('#ori_cwt').val(format_total_volume);
				$('#qtyfreight').val(new_weight);
			}

  		}
   });
   
});	
function hapuscharge(myid){
	var input = $(myid).val();
	
	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(input);
	var txtdiskon=$('#txtdiskon').val();
	var grand=parseFloat(hasil)-parseFloat(txtdiskon);

$('#txttotal').val(hasil);	
$('#total_charge').val(hasil);
$("#label_charges").html(toRp(hasil));
$('#t_total').val(toRp(hasil));
$('#grandtotal').val(toRp(grand));
$("#txtgrandtotal").val(grand);

  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}
$("#addchrg").click(function(e) {
 	 $("#savecharges").html('Save');
	 $("#titlecharges").html('Add charge');
	$("#cancel").show(); 
	$(".close").show();  
});


function editcharge(myid){
	var input = $(myid).val();
	
	var pecah=input.split('/');
	var code=pecah[0];
	var name=pecah[1];
	var price=pecah[2];
	var qty=pecah[3];
	var deskripsi=pecah[4];
	var total=pecah[5];
	
	$("#modaladdCharge").modal('show');	
	text='<option value="'+ code +'">'+ name +'</option>';

	$('#charge').append(text);
	$('#txtqty').val(qty);
	$('#txtunit').val(price);
	$('#desc').val(deskripsi);

	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(total);
	var txtdiskon=$('#txtdiskon').val();
	var grand=parseFloat(hasil)-parseFloat(txtdiskon);

$('#txttotal').val(hasil);	
$('#total_charge').val(hasil);
$("#label_charges").html(toRp(hasil));
$('#t_total').val(toRp(hasil));
$('#grandtotal').val(toRp(grand));
$("#txtgrandtotal").val(grand);

  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();	
	 $("#savecharges").html('Update');
	 $("#titlecharges").html('Edit charge');
	 $("#cancel").hide();
	$(".close").hide();
}

function hapus(th) {
      var tt=$("#tt").val();;
	  var t_volume=$('#t_volume').val();
	  var kurangi=parseFloat(t_volume)- parseFloat(tt);
	  			 
	 $("#t_volume").val(kurangi);
					 
     t = $(th);
     tr = t.parent().parent();
     tr.hide();
 }

function hapus2(myid){
var input = $(myid).val();
//var input2 = $(myid).val();
var pecah=input.split('/');
var vol=pecah[0];
var pcs=pecah[1];
var weight=pecah[2];

	var t_volume=$('#t_volume').val();
	var kurang=parseFloat(t_volume)-parseFloat(vol);
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
	
	var total_volum=$('#t_volume').val();
	var total_weight=$('#t_weight').val();
	
	if(total_volum >= total_weight)
	{
		$('#cwt').val(total_volum);
	} 
	else if(total_weight >= total_volum)
	 {
		$('#cwt').val(total_weight);
	}

		var input=$("#cwt").val();
		var pecah=input.split('.');
		var bulat=pecah[0];
		var koma=pecah[1];
		if(koma > 49){
			var maks=parseFloat(bulat) + 1;
            $('#qtyfreight').val(maks);
			$('#ori_cwt').val(maks);
			
		} else {
			var maks=parseFloat(bulat);
			$('#qtyfreight').val(maks);
			$('#ori_cwt').val(maks);
		}


     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}


function savecharges(){
	//var t_volume=$('#idtotal').val();   
	var charge=$('#charge').val();
	var desc=$('#desc').val();
	var txtunit=$('#txtunit').val();
	var txtqty=$('#txtqty').val();
 	var kali = parseFloat(txtunit) * parseFloat(txtqty);
 	var total_charge=$('#total_charge').val();
	var jumlah=parseFloat(total_charge) + parseFloat(kali);	
	
	var pecah=charge.split('-');
	var idcharge=pecah[0];
	var nmcharge=pecah[1];
			
if (txtunit == '' || txtqty == '' || charge == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ idcharge +'">'+ '<label id="l_pcs">'+ nmcharge +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="unit[]" id="l[]" value="'+ txtunit +'">'+ '<label id="l_pcs">'+ toRp(txtunit) +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="qty[]" id="t[]" size="5" value="'+ txtqty +'">'+ '<label id="l_pcs">'+ txtqty +'</label>' +'</td>'
    
    + '<td>' + '<input type="hidden" name="desc[]" id="p[]" size="5" value="'+ desc +'">'+ '<label id="l_pcs">'+ desc +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="totalcharges[]" id="totalcharges[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ toRp(kali) +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali +'" onclick="hapuscharge(this)" type="button"><i class="fa fa-times"></i></button>'
	+'<button class="btndel btn-primary btn-mini" value="' + idcharge+'/'+nmcharge+'/'+txtunit+'/'+txtqty+'/'+desc+'/'+kali +'" onclick="editcharge(this)" type="button"><i class="fa fa-edit"></i></button>'
	+'</td>'
    + '</tr>';

	
		$('#tblcharges tbody').append(text);
		$("#total_charge").val(jumlah);
		$("#label_charges").html(toRp(jumlah));
		$("#t_total").val(toRp(jumlah));
		$("#txttotal").val(jumlah);
		
		var diskon=$("#txtdiskon").val();
		var grand=parseFloat(jumlah)-parseFloat(diskon);
		$("#grandtotal").val(toRp(grand));
		$("#txtgrandtotal").val(grand);

	//RESET INPUT
	$('#txtunit').val("");
	$('#txtqty').val("");
	$('#desc').val("");
		$("#modaladdCharge").modal('hide');
	}
}



function hapus3(myid){
	var input = $(myid).val();
	
	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(input);


	document.getElementById("t_total").value=hasil;
	document.getElementById("txttotal").value=hasil;
	
$('#total_charge').val(hasil);
$("#label_charges").html(hasil);

  <!-- delete rows -->
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

$('#service').change(function(){
		var service=$("#service").val();
		var pecah=service.split('-');
		var srv=pecah[1];
		
	//	if(service=="PORT TO PORT" || service=="DOOR TO PORT"){
			$("#smu").removeAttr("disabled"); 
			$("#smu").val('');
			$("#prefixsmu").val('');
			$("#divsmu").css("display","block");
			$("#airline").attr("required","required");
			$("#prefixsmu").attr("required","required");
			$("#smu").attr("required","required");
			$("#flightno1").attr("required","required");
			$("#airline").focus();
			
		/*	
		} else {
			$("#smu").attr("disabled", "disabled"); 
			$("#smu").val('0');
			$("#flightno1").val('');
			$("#prefixsmu").val('');
			$("#airline").val('');
			$("#flightno1").val('');
			$("#airline").removeAttr("required","required");
			$("#prefixsmu").removeAttr("required","required");
			$("#smu").removeAttr("required","required");
			$("#flightno1").removeAttr("required","required");
			$("#divsmu").css("display","none");
		}
		  */
    });


	$('#airline').change(function(){
		 var airline = $("#airline").val();
		$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_flightNo'); ?>",
				data: "airline="+airline,
                cache:false,
                success: function(data){
                    $('#flightno1').html(data);
                    //document.frm.add.disabled=false;
                }
            });
	});
function getprefix(myid){
    var airline = $(myid).val();
       $.ajax({
		url: "<?php echo base_url('transaction/getprefix'); ?>",
			dataType: "json",
			type: "POST",
			data: "airline="+airline,
			success: function(data) {
			 for (var i =0; i<data.length; i++){
				$('#prefixsmu').val(data[i].prefixsmu);
				$('#limitcwt').val(data[i].maximal);
				$("#smu").focus();
				getflight();
			 }
			}
		});
}	
function geteta(myid){
    var flightno = $(myid).val();
       $.ajax({
		url: "<?php echo base_url('transaction/geteta'); ?>",
			dataType: "json",
			type: "POST",
			data: "flightno="+flightno,
			success: function(data) {
			 for (var i =0; i<data.length; i++){
				$('#eta').val(data[i].eta);
				
			 }
			}
		});
}	
//$('#etd').change(function(){
function getflight(){
		var etd=$('#etd').val();
		var airline=$('#airline').val();
		var origin=$('#origin').val();
		var desti=$('#desti').val();
		$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_flightNo2'); ?>",
				 data: "etd="+etd+"&airline="+airline+"&origin="+origin+"&desti="+desti,
                cache:false,
                success: function(data){
                    $('#flightno1').html(data);
                    //document.frm.add.disabled=false;
                }
            });
};
	//});

function cekprimary(){
    var lastsmu=$('#smu').val();
    var prefixsmu=$('#prefixsmu').val();
    var smu=prefixsmu +'-'+lastsmu;
       $.ajax({
    url: "<?php echo base_url('transaction/cekprimary'); ?>",
      dataType: "json",
      type: "POST",
      data: "smu="+smu,
      success: function(data) {
       for (var i =0; i<data.length; i++){
        
        var cek=data[i].NoSMU; 
        if(cek==smu){
        //$("#divalert").css("display", "block");
       // $('#cekid').html(data[i].confirmerror);
        $('#smuconfirm').val(data[i].NoSMU);
       // alert('error');
        return false;
        } else{
          $('#booking').val('noooo');
        }
        //console.log(data);
       }
      }
    });
}				
function validasiform(){
    var lastsmu=$('#smu').val();
    var prefixsmu=$('#prefixsmu').val();
    var smu=prefixsmu +'-'+lastsmu;
    var smuconfirm=$('#smuconfirm').val();
    if (smu==smuconfirm) {

      alert('SMU Number Duplicated,Try another !');
      return false;
    }
 
}   
</script>
</body>
</html>