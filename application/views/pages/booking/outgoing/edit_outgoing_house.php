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
      <label for="codeship">Codeship</label></div>
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
      <label for="codeship">CodeSigne</label></div>
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
                     <th colspan="8"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th>sdfds</th>
                                                  <th colspan="3"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th><div align="center">Volume</div></th>
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
		 ?>
                                                  <tr align="right" class="gradeX">
                                                    <td><?php echo $no; ?></td>
                                                  <td colspan="3"><?php echo $itm->NoPack; ?></td>
                                                  <td><?php echo $itm->Length; ?></td>
                                                  <td><?php echo $itm->Width; ?></td>
                                                  <td><?php echo $itm->Height; ?></td>
                                                  <td><?php echo $itm->Volume; ?></td>
                                                  <td>
                                                  <div align="center">
                 <a href="<?php echo base_url(); ?>transaction/delete_booking_items/<?php echo $itm->IdItems; ?>/<?php echo $itm->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $itm->IdItems;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
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
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="<?php echo $volume; ?>" />      
                                                    <label id="label_volume"><?php echo $volume; ?></label>                                           
                                                  </td>  
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
<label class="col-sm-4">Gross Weight</label> 
  <div class="col-sm-7">
  <input type="text" name="grossweight" value="<?php echo $row->GrossWeight;?>" id="grossweight" class="form-control" onkeypress="return isNumberKey(event)" onchange="rupiah();" required>
  <input type="hidden" name="grossweight2" value="<?php echo $row->GrossWeight;?>" id="grossweight2" />
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
<h2><span class="label label-large label-pink arrowed-in-right"><strong>Charges</strong></span></h2>
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="8"></th>
                                              <th><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladdCharge" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>                                           </th>
                                                <tr align="">
                                                  <th>sdfds</th>
                                                  <th colspan="3"><div align="center">Charges</div></th>
                                                  <th><div align="center">Desc</div></th>
                                                  <th><div align="center">Unit</div></th>
                                                  <th><div align="center">Qty</div></th>
                                                  <th><div align="center">Total</div></th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                              <tbody>
    <?php 
	$no=1;
	foreach($list_charges as $chr){
		$unit=$chr->Unit;
		$qty=$chr->Qty;
		$total=$qty*$unit;
		$grantotal+=$total;
		
		 ?>
                                                  <tr class="gradeX">
                                                    <td><?php echo $no; ?></td>
                                                  <td colspan="3"><?php echo $chr->ChargeName; ?></td>
                                                  <td><?php echo $chr->Description; ?></td>
                                                  <td><div align="right"><?php echo $chr->Unit; ?></div></td>
                                                  <td><div align="right"><?php echo $chr->Qty; ?></div></td>
                                                  <td><div align="right"><?php echo $total; ?></div></td>
                                                  <td>
                                                  <div align="center">
                 <a href="<?php echo base_url(); ?>transaction/delete_charges_items/<?php echo $chr->idCharges; ?>/<?php echo $chr->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $itm->IdItems;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a>                                   
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                
                                                 <tr align="right">
                                                   <td>Total</td>
                                                  <td colspan="3">&nbsp;</td>
                                                  <td colspan="3">&nbsp;</td>
                                                  <td><span class="col-sm-7">
                                                    <input type="hidden" name="grand" value="" id="grand" />
                                                  </span><?php echo $grantotal; ?></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
  
                                    </div>
  
                                    
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                    <a class="btn btn-danger btn-large" href="<?php echo base_url();?>transaction/domesctic_outgoing_house" title="cancel"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary btn-large"><i class="icon-refresh bigger-160 icons">&nbsp;</i> Update Changes</button>
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

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iditems"> Save</button>
              </form> 
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
