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
#t_freight,#t_quarantine,#other2,#delivery2,#adm2{ text-align:right;}

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

function count_freight(input){
  var cwt =document.getElementById("cwt").value;
  var freight =document.getElementById("freight").value;
  var result=parseFloat(cwt) * parseFloat(freight);  
  var t_freight=toRp(result);
  
 var txtquarantine=document.getElementById("txtquarantine").value;
 var adm=document.getElementById("adm").value;
 var delivery=document.getElementById("delivery").value;
 var other=document.getElementById("other").value; 
 var total=parseFloat(result)+parseFloat(txtquarantine)+parseFloat(adm)+			          parseFloat(delivery)+parseFloat(other);
 var format_total=toRp(total);

  document.getElementById("t_freight").value=t_freight;
  document.getElementById("txtfreight").value=result;
 document.getElementById("t_total").value=format_total;
 document.getElementById("txttotal").value=total;
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
var txtdiskon=document.getElementById("txtdiskon").value;
	  
 var delivery=document.getElementById("delivery").value;
 var txtfreight=document.getElementById("txtfreight").value;
 var other=document.getElementById("other").value;
 var adm=document.getElementById("adm").value;
 var txtquarantine=document.getElementById("txtquarantine").value; 
 var total=parseFloat(delivery)+parseFloat(txtfreight)+parseFloat(other)+			          parseFloat(adm)+parseFloat(txtquarantine);
 var t_netto=parseFloat(total)- parseFloat(txtdiskon);
 var format_total=toRp(t_netto);

 document.getElementById("grandtotal").value=format_total;
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
                <h4><i class="fa fa-edit bigger-120"></i> &nbsp;  Outgoing House:: EDIT HOUSE</h4>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/update_outgoing_house" autocomplete="off">
<div class="container">
<?php
foreach($connote as $row){
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
            <input name="house" type="text" class="form-control"  id="name5" value="<?php echo $row->HouseNo;?>" readonly/>
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
            <input type="text" name="idshipper" id="idshipper" class="form-control" value="<?php echo $ship->custName;?>" autocomplete="off" required readonly/>
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
      <input type="text" name="codeship" id="codeship" class="autocomplete form-control" value="<?php echo $row->CodeShipper;?>" readonly  />
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
              <input name="idconsigne" type="text" class="form-control"  id="idconsigne" value="<?php echo $con->custName;?>" readonly required/>
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
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="9"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th>&nbsp;</th>
                                                  <th colspan="3"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th>Volume</th>
                                                  <th>G.Weight</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                              <tbody>
    <?php 
	$no=1;
	foreach($items as $itm){
		$pack+=$itm->NoPack;
		$volume+=$itm->Volume;
		$total_volume=$unit*$qty;
		$grantotal+=$total_volume;
		
		$weight=$itm->Weight;
		$tot_weight+=$weight;
		 ?>
                                                  <tr align="right" class="gradeX">
                                                    <td><?php echo $no; ?></td>
                                                  <td colspan="3"><?php echo $itm->NoPack; ?></td>
                                                  <td><?php echo $itm->Length; ?></td>
                                                  <td><?php echo $itm->Width; ?></td>
                                                  <td><?php echo $itm->Height; ?></td>
                                                  <td><?php echo $itm->Volume; ?></td>
                                                  <td><?php echo $itm->Weight; ?></td>
                                                  <td>
                                                  <div align="center">
                 <a href="<?php echo base_url(); ?>transaction/delete_om_items/<?php echo $itm->IdItems; ?>/<?php echo $itm->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $itm->IdItems;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a>                                   
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                
                                                 <tr align="right">
                                                   <td>Total</td>
                                                  <td colspan="3"><label id="label_pacs"><?php echo $pack; ?></label>
                                                   <input name="t_pacs" type="hidden" id="t_pacs" value="<?php echo $pack; ?>" /></td>
                                                  <td colspan="3">&nbsp;</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="<?php echo $volume; ?>" />                                                    <?php echo $volume; ?></td>
                                                  <td><input name="t_weight" type="hidden" id="t_weight" value="<?php echo $tot_weight; ?>" />
                                                   <?php echo $tot_weight; ?></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
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
          
           <option value="<?php echo $row->Commodity;?>"><?php echo $row->Commodity;?></option>
          <?php foreach ($commodity as $cm) {
          ?>
            <option value="<?php echo $cm->Name;?>"><?php echo $cm->Name;?></option>
          <?php } ?>
      </select>
                                                </div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-4">Special Instructions &nbsp;</label>
                                              <div class="col-sm-7"><input type="text" name="special" value="<?php echo $row->SpecialIntraction;?>" id="special" class="form-control"></div>
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
                                              <input type="text" name="cwt" id="cwt" value="<?php echo $row->CWT;?>" class="form-control" onkeypress="return isNumberKey(event)">
                                              <input type="hidden" name="ori_cwt" id="ori_cwt" value="0">
                                              </div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Declare Value &nbsp;</label>
                                              <div class="col-sm-8"><input type="text" name="declare" id="declare" class="form-control" value="<?php echo $row->DeclareValue;?>"></div>
                                             </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Description of Shipment &nbsp;</label>
                                              <div class="col-sm-8">
                                              <textarea name="description" id="declare" class="form-control"><?php echo $row->DescofShipment;?></textarea>
                                              </div>
                                             </div>
                                              </div>
                                            </div>
  <!-- END RIGHT INPUT -->
  <div class="clearfix"> </div>

                                    
  
                                    </div>
  
                                    
              <h2><span class="label label-large label-pink arrowed-in-right"><strong>COST / CHARGES</strong></span></h2>

<div class="col-md-5">
      <div class="row">
        <div class="col-md-12">
  <label class="col-sm-4">Air Freight</label> 
  <div class="col-sm-7">
  <input type="text" name="freight" id="freight" class="form-control" onkeypress="return isNumberKey(event)" onchange="return count_freight(this);"  required>
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
  <input type="text" name="adm" id="adm" class="form-control" onkeypress="return isNumberKey(event)" onChange="return admRp(this)" required value="0">
  </div>
</div>

<div class="col-md-12">
<label class="col-sm-4">Delivery</label> 
  <div class="col-sm-7">
  <input type="text" name="delivery" id="delivery" class="form-control" onkeypress="return isNumberKey(event)" onChange="return deliveryRp(this)" required value="0">
  </div>
</div>
<div class="col-md-12">
<label class="col-sm-4">Other Cost &nbsp;</label>
<div class="col-sm-7"><input type="text" name="other" id="other" class="form-control" onkeypress="return isNumberKey(event)" onChange="return otherRp(this)" value="0"></div>
</div>
  
    </div>
      </div>
 <!-- right input -->
 <div class="col-md-6">
      <div class="row">
          <div class="col-md-12">
  <label class="col-sm-7 text-right">Rp</label> 
    <div class="col-sm-4">
      <input type="text" name="t_freight" id="t_freight" class="form-control txtrp" onkeypress="return isNumberKey(event)" required readonly>
    <input type="hidden" name="txtfreight" id="txtfreight" value="0">
    </div>
</div>

<div class="col-md-12">
<label class="col-sm-7 text-right">Rp</label> 
  <div class="col-sm-4">
    <input type="text" name="t_quarantine" id="t_quarantine" class="form-control txtrp" onkeypress="return isNumberKey(event)" required readonly>
    <input type="hidden" name="txtquarantine" id="txtquarantine" value="0">
  </div>
</div>
<div class="col-md-12">
 <label class="col-sm-7 text-right">Rp</label>
<div class="col-sm-4">
  <input type="text" name="adm2" id="adm2" class="form-control txtrp" onkeypress="return isNumberKey(event)" readonly required>
</div>

</div>
<div class="col-md-12">
 <label class="col-sm-7 text-right">Rp</label> 
  <div class="col-sm-4">
  <input type="text" name="delivery2" id="delivery2" class="form-control txtrp" onkeypress="return isNumberKey(event)" readonly required>
  </div>
</div>
<div class="col-md-12">
<label class="col-sm-7 text-right">Rp</label>
<div class="col-sm-4"><input type="text" name="other2" id="other2" class="form-control txtrp" onkeypress="return isNumberKey(event)" value="" readonly></div>
</div>

``</div>
</div>
<!-- discoount iinput -->
<div class="col-sm-12 line" id="line">
<hr>

<div class="col-sm-8"><p class="text-right">TOTAL </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="t_total" id="t_total" class="form-control txtrp" readonly>
<input type="hidden" name="txttotal" id="txttotal" value="0">
</p>
</div>

<div class="col-sm-8"><p class="text-right">DISKON </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="diskon" id="diskon" class="form-control txtrp" onchange="return diskonRp(this);">
<input type="hidden" name="txtdiskon" id="txtdiskon" class="form-control" value="0">
</p></div>

<div class="col-sm-8"><p class="text-right">GRAND TOTAL </p></div>
<div class="col-sm-2"><p class="text-left"><input type="text" name="grandtotal" id="grandtotal" class="form-control txtrp"  readonl="readonly" readonly>
<input type="hidden" name="txtgrandtotal" id="txtgrandtotal" class="form-control" value="0">
</p></div>

<div class="col-sm-1">
<button type="button" id="btn_hitung" onClick="return hitung()" class="btn btn-small btn-danger">Hitung</button>
</div>
</p>
</div>




  
   </div><!--  INPUT COST -->
                                    
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
        <form method="post" action="<?php echo site_url('transaction/add_update_booking_items')?>">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No of Pcs </label>
            <div class="col-sm-9"><span class="controls">
                        <input name="pack" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="pack" required />
</span><span class="col-sm-7">
<input name="house2" type="hidden" class="form-control"  id="name3" value="<?php echo $row->HouseNo;?>" readonly/>
</span></div>
            <div class="clearfix"></div>
          </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="panjang" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="panjang" required/>
</span></div>
                        <div class="clearfix"></div>
          </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="lebar" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="lebar" required/>
</span></div>
                        <div class="clearfix"></div>
          </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tinggi" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="tinggi" required/>
</span></div>
                        <div class="clearfix"></div>
          </div>                    
<div class="form-group">
                        <label class="col-sm-3 control-label">Weight</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="weight" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="weight" required/>
</span></div>
                        <div class="clearfix"></div>
          </div>
          
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iditems"> Save</button>
              </form> 
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
<form method="post" action="<?php echo site_url('transaction/add_update_booking_charges')?>"> 
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
                          <span class="col-sm-7">
                          <input name="house3" type="hidden" class="form-control"  id="name4" value="<?php echo $row->HouseNo;?>" readonly/>
                          </span></div>
                        <div class="clearfix"></div>
  </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Description &nbsp;</label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="desc" type="text" class="form-control" id="desc" required />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Unit &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="txtunit" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtunit" required />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Qty &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="qty" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtqty" required />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges"> Save</button>
    </div>
                    </div>
            
             </form>  
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
		</script>
	</body>
</html>
