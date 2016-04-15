<!DOCTYPE HTML>
<html lang="en-US"><head>
      <title>outgoing house</title>
        
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
#t_freight,#t_quarantine,#other2,#delivery2,#adm2{ text-align:right;}

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


 function count_freight3(input){
	var total=document.getElementById("total_charge").value;
	var lastcharge=document.getElementById("totfreight").value;// ambil nilai sub total charge terakhir untuk membandingkan dengan inputan baru agar grandtota; tidak selalu bertambah

	var price=document.getElementById("pricefreight").value;
	var qty=document.getElementById("qtyfreight").value;
	var subtotal=parseFloat(price) * parseFloat(qty);
	//var format_sub=toRp(subtotal);
	var newcharge=document.getElementById("totfreight").value=subtotal;

	if(newcharge > lastcharge)
	{
		 var selisih=parseFloat(newcharge) - parseFloat(lastcharge);
		 var nilai=parseFloat(total) + parseFloat(selisih);
	} else if(lastcharge > newcharge) {
		var selisih=parseFloat(lastcharge) - parseFloat(newcharge);
		var nilai=parseFloat(total) - parseFloat(selisih);	
	}
	var format_nilai=toRp(nilai);
	document.getElementById("total_charge").value=nilai;
	document.getElementById("label_charges").innerHTML=format_nilai;
	document.getElementById("t_total").value=format_nilai;
	document.getElementById("txttotal").value=nilai;
	$('#grandtotal').val(toRp(nilai));
	$("#txtgrandtotal").val(nilai);
 }
 function count_freight2(input){
	var total=document.getElementById("total_charge").value;
	var lastcharge=document.getElementById("totfreight2").value;// ambil nilai sub total charge terakhir untuk membandingkan dengan inputan baru agar grandtota; tidak selalu bertambah
	
	var price=document.getElementById("pricefreight2").value;
	var qty=document.getElementById("qtyfreight2").value;
	var subtotal=parseFloat(price) * parseFloat(qty);
	//var format_sub=toRp(subtotal);
	var newcharge=document.getElementById("totfreight2").value=subtotal;

	if(newcharge > lastcharge)
	{
		 var selisih=parseFloat(newcharge) - parseFloat(lastcharge);
		 var nilai=parseFloat(total) + parseFloat(selisih);
	} else if(lastcharge > newcharge) {
		var selisih=parseFloat(lastcharge) - parseFloat(newcharge);
		var nilai=parseFloat(total) - parseFloat(selisih);
	}
	var format_nilai=toRp(nilai);
	document.getElementById("total_charge").value=nilai;
	document.getElementById("label_charges").innerHTML=format_nilai;
	document.getElementById("t_total").value=format_nilai;
	document.getElementById("txttotal").value=nilai;
	$('#grandtotal').val(toRp(nilai));
	$("#txtgrandtotal").val(nilai);
 }
 
 function count_others(input){
	 var aa=$(this).val();
	 alert(aa);
 }
 $(".others").click(function(e) {
    alert('haii');
});
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
  var format=toRp(angka);
  var txtdiskon=document.getElementById("txtdiskon").value=angka;
  document.getElementById("diskon").format=format; 
  
  var delivery=document.getElementById("delivery").value;
 var txtfreight=document.getElementById("txtfreight").value;
 var other=document.getElementById("other").value;
 var adm=document.getElementById("adm").value;
 var txtquarantine=document.getElementById("txtquarantine").value; 
 var t_charge=parseFloat(delivery)+parseFloat(txtfreight)+parseFloat(other)+			          parseFloat(adm)+parseFloat(txtquarantine);
 var total=parseFloat(t_charge)- parseFloat(txtdiskon);
 var format_total=toRp(total);

 document.getElementById("txtdiskon").value=angka;
 document.getElementById("grandtotal").value=format_total;
 document.getElementById("txtgrandtotal").value=total;
 }

 function hitung(){
	var txtdiskon=document.getElementById("diskon").value;
	  
 	var total=document.getElementById("total_charge").value;

	 var t_netto=parseFloat(total)- parseFloat(txtdiskon);
	

 document.getElementById("grandtotal").value=toRp(t_netto);
 document.getElementById("txtgrandtotal").value=t_netto;
 }

</script>	    

<script type="text/javascript">
	    $(this).ready( function() {
$("#idshipper").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		       url: "<?php echo base_url();?>index.php/Autocomplete_customers/lookup_sender",
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
		        		url: "<?php echo base_url(); ?>index.php/Autocomplete_customers/lookup_receivement",
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
                <h4><i class="fa fa-edit bigger-120"></i> &nbsp;  Outgoing House:: EDIT HOUSE</h4>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/update_outgoing_house" autocomplete="off">

<?php
foreach($connote as $row){
	$cwt=$row->CWT;
?>
  <div class="row">
               <!--LEFT INPUT-->
    <?php
	foreach($shipper as $ship){
	?>
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Sender</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4">House/Connote</label></strong>
          <div class="col-sm-7">
            <input name="house" type="text" class="form-control"  id="house" value="<?php echo $row->HouseNo;?>"/>
          </div>


          <strong><label class="col-sm-4"> Job No</label></strong>
          <div class="col-sm-7">
            <input name="job" type="text" class="form-control"  id="name" value="<?php echo $row->JobNo;?>" readonly />
          </div>

          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7">
            <input name="paymentype" type="text" class="form-control"  id="paymentype" value="<?php echo $row->PayCode;?>" readonly />
          </div>
          <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7">
            <input name="service" type="text" class="form-control"  id="service" value="<?php echo $row->Service;?>" readonly />
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
            <input name="origin" type="text" class="form-control"  id="origin" value="<?php echo $row->Origin;?>" readonly />
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
            <input name="desti" type="text" class="form-control"  id="desti" value="<?php echo $row->Destination;?>" readonly />
          </div>
<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
            <input type="text" name="idshipper" id="idshipper" class="form-control" value="<?php echo $row->sender;?>" autocomplete="off" required readonly/>
            <input name="name1" type="hidden" class="form-control"  id="name1" required value="<?php echo $row->custName;?>"/>
          <input name="idsender" type="hidden" class="form-control"  id="idsender" required value="<?php echo $ship->custCode;?>"/>
          </div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Phone</label></div>
    <div class="col-sm-7">
      <input type="text" name="phone1" id="phone1" class="autocomplete form-control" value="<?php echo $ship->Phone;?>" readonly/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address1" class="autocomplete form-control" id="address1" readonly><?php echo $ship->Address;?></textarea>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Code Shipper</label></div>
    <div class="col-sm-7">
      <input type="text" name="codeship" id="codeship" class="autocomplete form-control" value="<?php echo $row->receiver;?>" readonly  />
    </div>
</div>

<div class="col-sm-13" id="contenshipper"><!-- CONTENT AJAX VIEW HERE --></div>
   

<!-- end of sender -->

<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
      </div>
      
      <?php } ?>
      <!--RIGHT INPUT-->
          <?php
	foreach($consigne as $con){
	?>
      <div class="col-sm-6">
        <div class="col-sm-11">
<label class="col-sm-12"> <span class="span3 label label-large label-pink arrowed-in-right">Receivement</span></label> 
<div class="clearfx">&nbsp;</div>
        <strong><label class="col-sm-4">Booking No</label></strong>
          <div class="col-sm-7">
            <input name="booking" type="text" class="form-control"  id="booking" value="<?php echo $row->BookingNo;?>" readonly />
          </div>

           <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
            <input name="etd" type="text" class="form-control"  id="tgl" required value="<?php echo substr($row->ETD,0,10) ;?>" readonly/>
          </div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h6>&nbsp;</h6></div>
<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>

          <strong><label class="col-sm-4"> Consignee</label>
          </strong>
            <div class="col-sm-7">
              <input name="idconsigne" type="text" class="form-control"  id="idconsigne" value="<?php echo $row->receiver;?>" readonly required/>
              <input name="name2" type="hidden" class="form-control"  id="name2" required />
            <input name="idreceivement" type="hidden" class="form-control"  id="idreceivement" required value="<?php echo $con->custCode;?>"/>
          </div> 
<div class="form-group">      
  <div class="col-sm-4">
      <label for="codeship">Phone</label></div>
    <div class="col-sm-7">
      <input name="phone2" type="text" class="form-control" readonly  id="phone2" value="<?php echo $con->Phone;?>"/>
    </div>
</div>

<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Address</label></div>
    <div class="col-sm-7">
      <textarea name="address2" class="autocomplete form-control" id="address2" readonly><?php echo $con->Address;?></textarea>
    </div>
</div>


<div class="form-group">      
    <div class="col-sm-4">
      <label for="codeship">Code Consignee</label></div>
    <div class="col-sm-7">
      <input name="codesigne" type="text" class="form-control" value="<?php echo $con->CodeConsigne;?>"  id="codesigne" readonly/>
    </div>
</div>


<div class="col-sm-13" id="contencnee"><!-- CONTENT AJAX VIEW HERE --></div>
   </div>
   
   <?php } }?>
</div>


<br style="clear:both;margin-bottom:40px;">
            <div class="container">
                <div class="col-lg-12 portlets ui-sortable">
                  <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Item's</strong></span></h2>
                      <div class="table-responsive" id="table_items">
                        <table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="8"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th colspan="3"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th>Volume</th>
                                                  <th><div align="center">weight</div></th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                              <tbody>
    <?php 
	$no=1;
	foreach($items as $itm){
		$pack+=$itm->NoPack;
		$volume+=$itm->Volume;
		$gross+=$itm->G_Weight;
		
		$total_volume=$unit*$qty;
		$grantotal+=$total_volume;
		 ?>
                                                  <tr align="right" class="gradeX">
                                                    <td colspan="3"><input name="pcs[]" type="hidden" id="pcs[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->NoPack; ?></td>
                                                    <td><input name="p[]" type="hidden" id="p[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->Length; ?></td>
                                                    <td><input name="l[]" type="hidden" id="l[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->Width; ?></td>
                                                    <td><input name="t[]" type="hidden" id="t[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->Height; ?></td>
                                                    <td><input name="v[]" type="hidden" id="v[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->Volume; ?></td>
                                                    <td><input name="w[]" type="hidden" id="w[]" value="<?php echo $pack; ?>" />                                                      <?php echo $itm->G_Weight; ?></td>
                                                    <td>
 <button id="del_items" class="del_items btn btn-mini btn-danger" value="<?php echo $itm->IdItems.'/'.$itm->NoPack.'/'.$itm->Volume.'/'.$itm->G_Weight;?>"  type="button">x</button>                                   
                                         
                                                  </td>
                                                  </tr>
 
    <?php $no++;} ?>
                                          

  
                                                
                                              </tbody>
    

                                          
                                            </table>
                      </div><table width="95%" border="0">
  <tr>
    <td width="14%"  align="center"><input name="t_pcs" type="hidden" id="t_pcs" value="<?php echo $pack; ?>" /><label id="label_pcs"> <?php echo $pack; ?></label></td>
    <td width="46%">&nbsp;</td>
    <td width="14%" align="center"><label id="label_volume"><?php echo $volume;?></label>                                                    <input name="t_volume" type="hidden" id="t_volume" value="<?php echo $volume; ?>" /></td>
    <td><label id="label_weight"><?php echo $gross; ?></label>                                                    <input name="t_weight" type="hidden" id="t_weight" value="<?php echo $gross; ?>" /></td>
    </tr>
  </table>
 
                                    </div>
 
 
 
  <!-- LEFT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">

                                              <div class="col-md-12">
                                              <label class="col-sm-4">Commodity &nbsp;</label>
                                              <div class="col-sm-7">
      <select data-placeholder="Choose Commodity..." class="chosen-select form-control" tabindex="2" required="required" name="commodity">
           <option value="<?php echo $row->Commodity;?>"><?php echo $row->Commodity;?></option>
          <?php foreach ($commodity as $cm) {
          ?>
            <option value="<?php echo $cm->CommCode;?>"><?php echo $cm->CommName;?></option>
          <?php } ?>
      </select>
                                                </div>
                                                </div>

                                              <div class="col-md-12">
                                              <label class="col-sm-4">Special Instructions &nbsp;</label>
                                              <div class="col-sm-7"><input type="text" name="special" id="special" class="form-control" value="<?php echo $row->SpecialIntraction;?>"></div>
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
                                              <input type="text" name="cwt" id="cwt" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo $cwt; ?>"><input type="hidden" name="ori_cwt" id="ori_cwt" value="<?php echo $cwt; ?>">
                                              </div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Declare Value &nbsp;</label>
                                              <div class="col-sm-8"><input type="text" name="declare" id="declare" class="form-control" value="<?php echo $row->DeclareValue;?>"></div>
                                             </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Description of Shipment &nbsp;</label>
                                              <div class="col-sm-8">
                                                <textarea name="description" id="description" class="form-control"><?php echo $row->DescofShipment;?></textarea>
                                              </div>
                                             </div>
                                              </div>
                                            </div>
  <!-- END RIGHT INPUT -->
  <div class="clearfix"> </div>
                                    
    </div>
  
                                   
<div class="form-group">
    <div class="table-responsive" id="table_responsive">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>COST / CHARGES</strong></span></h2>
    <table class="table table-striped table-bordered table-hover" id="tblcharges" style="width:95%">
                                              <thead>
                                                <tr>
                                                  <th>Charges</th>
                                                  <th>Price</th>
                                                  <th>Qty</th>
                                                  <th style="width:28%">Desc</th>
                                                  <th>Total</th>
                                                  <th class="text-center"><a class="btn  btn-primary btn-round" href="#modaladdCharge" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add Cost</a></th>
                                                </tr> </thead>
                                                
 <?php 
 foreach($airfreight as $fr)
 {
	  $total1=$fr->Total;
	  
 ?>
       <tbody>
                                                <tr>
  <td height="26"><span class="col-sm-4">AirFreight
 <input type="hidden" name="idcharge[]" id="idcharge[]" value="1">
   </span></td>
 
 <td><input type="text" name="unit[]" id="pricefreight" onChange="return count_freight3(this);" required class="form-control" style=" text-align:right" value="<?php echo $fr->Price; ?>"></td>
                                                  <td><input type="text" name="qty[]" id="qtyfreight" style="width:98%;text-align:right" value="<?php echo $cwt; ?>" class="form-control" readonly></td>
                                                  <td>

      <input type="text" name="desc[]" id="descfreight" style="width:100%" class="form-control" value="<?php echo $fr->ChargeDetail; ?>">                                            
                                                  </td>
                                                  <td><input type="text" name="totalcharges[]" id="totfreight" style="width:98%;text-align:right" value="<?php echo $total1; ?>" required readonly class="form-control">
                                                  <td class="text-center">&nbsp;</td>
                                                </tr>
 <?php } ?>                                               
  <?php 
 foreach($cost_smu as $c_smu)
 {
	 $total2=$c_smu->Total;
 ?>
                                                <tr>
                                                  <th><span class="col-sm-4">SMU
                                                    <input type="hidden" name="idcharge[]" id="idcharge[]2" value="2">
                                                  </span></th>
                                                  <th><input type="text" name="unit[]" id="pricefreight2" style="width:98%; text-align:right" onChange="return count_freight2(this)" required class="form-control"  value="<?php echo $c_smu->Price; ?>"></th>
                                                  <th><input type="text" name="qty[]" id="qtyfreight2" style="width:98%;text-align:right" class="form-control" value="<?php echo $c_smu->Qty; ?>"></th>
                                                  <th><input type="text" name="desc[]" id="descfreight2" style="width:100%" class="form-control" value="<?php echo $c_smu->ChargeDetail; ?>"></th>
                                                  <th><input type="text" name="totalcharges[]" id="totfreight2" style="width:98%;text-align:right" readonly required class="form-control" value="<?php echo $total2; ?>"></th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
 <?php } ?>
   <?php 
 foreach($chargeoptional as $opsi)
 {
	 $total3+=$opsi->Total;
 ?>
                                                <tr>
                                                  <td width="158"><?php echo $opsi->ChargeName; ?>
                                                    <input type="hidden" name="idcharge[]" id="idcharge3" value="<?php echo $opsi->ChargeCode; ?>">
                                                  </td>
                                                  <td width="158" align="right"><input type="hidden" name="unit[]" id="idcharge4" value="<?php echo $opsi->Price; ?>">                                                    <?php echo $opsi->Price; ?>
   
 </td>
                                                  <td width="158" align="right"><input type="hidden" name="qty[]" id="idcharge5" value="<?php echo $opsi->Qty; ?>">                                                    <?php echo $opsi->Qty; ?></td>
                                                  <td width="114" align="left"><?php echo $opsi->ChargeDetail; ?>
                                                  <input type="hidden" name="desc[]" id="idcharge" value="<?php echo $opsi->ChargeDetail; ?>"></td>
                                                  <td width="222" align="right"><input type="hidden" name="totalcharges[]" id="idcharge2" value="<?php echo $opsi->Total; ?>">                                                    <?php echo $opsi->Total; ?></td>
                                                  <td class="text-center"><button value="<?php echo $opsi->Total; ?>" id="del_charge" class="del_charge btn btn-mini btn-danger" onClick="hapuscharge(this)" type="button">x</button></td>
                                                </tr>
    <?php } ?>
                                                
                                                
                                               
                                        
                                            
                                              </tbody>

                                               <tfoot> 
                                                 <tr>

                                                  <td><b>Total</b></td>
                                                  <td colspan="4"><div align="right">
   <?php
   $totalcharge=$total1+$total2+$total3;
   
   ?>
                                                  <input name="total_charge" type="hidden" id="total_charge" value="<?php echo $totalcharge;?>" />
  <label id="label_charges"><?php echo number_format($totalcharge,0,'.','.');?></label>                                                                                           
                                                  
                                                  </strong></div></td>
                                                  <td width="129">&nbsp;</td>
                                                </tr></tfoot>
                                                
                                            </table>
              </div>
                  </div>
                                     
 



<div class="col-md-6">
 
</div>
<!-- FOR DEFAULT COST-->
    
 <!-- right input -->
 
 
 
<!-- discoount iinput -->
<div class="col-sm-12 line" id="line">


<div class="col-sm-8"><p class="text-right">TOTAL </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="t_total" id="t_total" class="form-control txtrp" readonly value="<?php echo $totalcharge;?>">
<input type="hidden" name="txttotal" id="txttotal" value="0">
</p>
</div>

<div class="col-sm-8"><p class="text-right">DISKON </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="diskon" id="diskon" class="form-control txtrp" onchange="return hitung()">
<input type="hidden" name="txtdiskon" id="txtdiskon" class="form-control" value="0">
</p></div>

<div class="col-sm-8"><p class="text-right">GRAND TOTAL </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="grandtotal" id="grandtotal" class="form-control txtrp"  readonl="readonly" readonly value="<?php echo $totalcharge;?>">
<input type="hidden" name="txtgrandtotal" id="txtgrandtotal" class="form-control" value="<?php echo $totalcharge;?>">
</p></div>

<div class="col-sm-1">

</div>
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
                        <label class="col-sm-3 control-label">Weight &nbsp; ( T )</label>
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
                <h3 id="myModalLabel">Add Charges</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">Charges </label>
                        <div class="col-sm-9"><span class="controls">
              <select name="charge" class="form-control" required="required" id="charge">
          <option value="">Choose Charges</option>
          <?php foreach ($charge as $crg) {
          ?>
            <option value="<?php echo $crg->ChargeCode.'/'.$crg->ChargeName;?>"><?php echo $crg->ChargeName;?></option>
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
                          <input name="qty" type="number" value="1" class="form-control" onkeypress="return isNumberKey(event)" id="txtqty" />
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
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges"> Save</button>
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
 	var hitung =parseFloat(pcs) * parseFloat(panjang) * parseFloat(lebar) * parseFloat(tinggi)/6000;
	var kali=hitung.toFixed(2); //membuat desimal 2 angka belakang koma
 	var t_volume=$('#t_volume').val();
	var volume=parseFloat(kali)+ parseFloat(t_volume);
	var format_volume=volume.toFixed(2); //membuat desimal 2 angka belakang koma
	
	var t_pacs=$('#t_pacs').val();
	var total_pacs=parseFloat(t_pacs) + parseFloat(pcs);
	var t_weight=$('#t_weight').val();
	var total_weight=parseFloat(t_weight) + parseFloat(weight);
	var format_weight=total_weight.toFixed(2);
	
if (panjang == '' || lebar == '' || pcs == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{				
	text='<tr class="gradeX" align="right">'

    + '<td colspan="3">' + '<input type="hidden" name="pcs[]" id="pcs[]" size="5" value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'
	
    + '<td>' + '<input type="hidden" name="p[]" id="p[]" size="5" value="'+ panjang +'">'+ '<label id="l_pcs">'+ panjang +'</label>' +'</td>'
    
	+ '<td>' +  '<input type="hidden" name="l[]" id="l[]" size="5" value="'+ lebar +'">'+ '<label id="l_pcs">'+ lebar +'</label>' +'</td>'
    
	+ '<td>' +  '<input type="hidden" name="t[]" id="t[]" size="5" value="'+ tinggi +'">'+ '<label id="l_pcs">'+ tinggi +'</label>' +'</td>'
    
	+ '<td>' + '<input type="hidden" name="v[]" id="v[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ kali +'</label>' +'</td>'
    
	+ '<td>' + '<input type="hidden" name="w[]" id="w[]" size="5" value="'+ weight +'">'+ '<label id="l_pcs">'+ weight +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali + '/'+ pcs + '/' + weight + '" onclick="hapus2(this)" type="button" ><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tblitems tbody').append(text);
		$("#t_volume").val(volume);
		$("#label_volume").html(format_volume);
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
		
		if(volume > total_weight)
		{
			$("#cwt").val(volume);
			
		} else {
			
			$("#cwt").val(total_weight);
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
			var qty=$('#qtyfreight').val(maks);
			$('#ori_cwt').val(maks);
		}
		var new_price=$("#pricefreight").val();
		var new_qty=$('#qtyfreight').val();
		var old_sub=$("#totfreight").val();
		var new_sub=parseFloat(new_price)*parseFloat(new_qty);
		var selisih_sub=parseFloat(new_sub)-parseFloat(old_sub);
		$("#totfreight").val(new_sub);
		var old_total=$("#total_charge").val();
		var new_total=parseFloat(old_total) + parseFloat(selisih_sub);
		$("#total_charge").val(new_total);
		$("#label_charges").html(toRp(new_total));
		$("#t_total").val(toRp(new_total));
		$("#grandtotal").val(toRp(new_total));
		$("#txtgrandtotal").val(new_total);
		$("#diskon").val('');
	}
 });

$(".del_items").click(function(){
var allcode=$(this).val();
var house=$('#house').val(); 

var pecah=allcode.split('/');
var pcs=pecah[1];
var vol=pecah[2];
var weight=pecah[3];
 
 	var old_pcs=$('#t_pcs').val();
	var new_pcs=parseFloat(old_pcs)-parseFloat(pcs);
	$('#t_pcs').val(new_pcs);
	$('#label_pcs').html(new_pcs);
	
 	var old_volume=$('#t_volume').val();
	var new_volume=parseFloat(old_volume)-parseFloat(vol);
	var hasil=new_volume.toFixed(2);
	$('#t_volume').val(hasil);
	$('#label_volume').html(hasil);
	
	var old_weight=$('#t_weight').val();
	var new_weight=parseFloat(old_weight)-parseFloat(weight);
	$('#t_weight').val(new_weight);
	$('#label_weight').html(new_weight);
	  
	var total_volum=$('#t_volume').val();
	var total_weight=$('#t_weight').val();
	
	if(total_volum >= total_weight)
	{
		$('#cwt').val(total_volum);
	} 
	else
	 {
		$('#cwt').val(total_weight);
	}
	    var input=$("#cwt").val();
		var ubah=input.split('.');
		var bulat=ubah[0];
		var koma=ubah[1];
		if(koma > 49){
			var maks=parseFloat(bulat) + 1;
            $('#qtyfreight').val(maks);
			$('#ori_cwt').val(maks);
			
		} else {
			var maks=parseFloat(bulat);
			var qty=$('#qtyfreight').val(maks);
			$('#ori_cwt').val(maks);
		}
			var new_price=$("#pricefreight").val();
		var new_qty=$('#qtyfreight').val();
		var old_sub=$("#totfreight").val();
		var new_sub=parseFloat(new_price)*parseFloat(new_qty);
		var selisih_sub=parseFloat(old_sub)-parseFloat(new_sub);
		$("#totfreight").val(new_sub);
		var old_total=$("#total_charge").val();
		var new_total=parseFloat(old_total)- parseFloat(selisih_sub);
		$("#total_charge").val(new_total);
		$("#label_charges").html(toRp(new_total));
		$("#t_total").val(toRp(new_total));
		$("#grandtotal").val(toRp(new_total));
		$("#txtgrandtotal").val(new_total);
		$("#diskon").val('');	

     t = $(this);
     tr = t.parent().parent();
     tr.remove();
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


$("#savecharges").click(function(){
	//var t_volume=$('#idtotal').val();   
	var charge=$('#charge').val();
	var desc=$('#desc').val();
	var txtunit=$('#txtunit').val();
	var txtqty=$('#txtqty').val();
 	var kali = parseFloat(txtunit) * parseFloat(txtqty);
 	var total_charge=$('#total_charge').val();
	var jumlah=parseFloat(total_charge) + parseFloat(kali);	
	
	var pecah=charge.split('/');
	var idcharge=pecah[0];
	var nmcharge=pecah[1];
			
if (txtunit == '' || txtqty == '' || charge == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ idcharge +'">'+ '<label id="l_pcs">'+ nmcharge +'</label>' +'</td>'
    + '<td align="right">' +  '<input type="hidden" name="unit[]" id="l[]" value="'+ txtunit +'">'+ '<label id="l_pcs">'+ txtunit +'</label>' +'</td>'
    + '<td align="right">' +  '<input type="hidden" name="qty[]" id="t[]" size="5" value="'+ txtqty +'">'+ '<label id="l_pcs">'+ txtqty +'</label>' +'</td>'
    
    + '<td>' + '<input type="hidden" name="desc[]" id="p[]" size="5" value="'+ desc +'">'+ '<label id="l_pcs">'+ desc +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="totalcharges[]" id="totalcharges[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ kali +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali +'" onclick="hapuscharge(this)" type="button"><i class="fa fa-times"></i></button></td>'

    + '</tr>';
	
		$('#tblcharges tbody').append(text);
		$("#total_charge").val(jumlah);
		$("#label_charges").html(jumlah);
	
	document.getElementById("t_total").value=jumlah;
	document.getElementById("txttotal").value=jumlah;
	$('#txttotal').val(jumlah);	
	$('#total_charge').val(jumlah);
	$("#label_charges").val(toRp(jumlah));
	$('#t_total').val(toRp(jumlah));
	$('#grandtotal').val(toRp(jumlah));
	$("#txtgrandtotal").val(jumlah);

//RESET INPUT
$('#txtunit').val("");
$('#txtqty').val("");
$('#desc').val("");
		$("#modaladdCharge").modal('hide');
	}
 });


function hapuscharge(myid){
	var input = $(myid).val();
	
	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(input);


$('#txttotal').val(hasil);	
$('#total_charge').val(hasil);
$("#label_charges").val(toRp(hasil));
$('#t_total').val(toRp(hasil));
$('#grandtotal').val(toRp(hasil));
$("#txtgrandtotal").val(hasil);

  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}

function editcharge(myid){
	var input = $(myid).val();

		var pecah=input.split('/');
		var id=pecah[0];
		var nama=pecah[1];
		var harga=pecah[2];
		var koma=pecah[3];
		var qty=pecah[4];
		var subtotal=pecah[5];
							
	/* var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(input);
	document.getElementById("t_total").value=hasil;
	document.getElementById("txttotal").value=hasil;
	$('#total_charge').val(hasil);
	$("#label_charges").html(hasil); */


	 
	text='<tr class="gradeX">'
	 +'<td><input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ pecah +'">'+ nama +'</td>'
	 +'<td><input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ pecah +'">'+ nama +'</td>'
	 +'<td><input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ pecah +'">'+ nama +'</td>'
	 +'<td><input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ pecah +'">'+ nama +'</td>'
	 +'<td><input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ pecah +'">'+ nama +'</td>'
	 +'<td><button class="btndel btn-danger btn-mini" value="' + nama +'" onclick="hapuscharge(this)" type="button"><i class="fa fa-times"></i></button>'
	
	+ ' <button class="btneditcharge btn-primary btn-mini" value="' + harga +'/'+ harga +'/'+ harga +'/'+ harga +'/'+ harga +'/'+ harga +'" onclick="editcharge(this)" type="button"><i class="fa fa-edit"></i></button></td>'
	 +'</tr>'
	 
	$('#tblcharges tbody').append(text);
	  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
	 
	$("#modaladdCharge").modal('show');

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
</body>
</html>