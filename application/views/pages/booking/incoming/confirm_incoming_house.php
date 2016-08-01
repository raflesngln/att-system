
       <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
 
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  
 <script src="<?php echo base_url();?>asset/js/jquery.js"></script>
<script src="<?php echo base_url();?>asset/js/jquery.PrintArea.js"></script>
	<script>
		(function($) {
			// fungsi dijalankan setelah seluruh dokumen ditampilkan
			$(document).ready(function(e) {
				
				// aksi ketika tombol cetak ditekan
				$("#cetak").bind("click", function(event) {
					// cetak data pada area <div id="#data-mahasiswa"></div>
					$('#area-cetak').printArea();
				});
			});
		}) (jQuery);
	</script>


  

   <div class="container" style="border:1px #CCC solid; width:97%; margin-left:-1%; margin-top:10px">
  <form method="post" action="<?php echo base_url();?>Connote_print" target="new">
   
 <h3><i class="fa fa-ok"></i> <i class="fa fa-check bigger180"></i>&nbsp;Detail House</h3>
   
<?php
foreach($house as $row){
?> 
    <div class="col-sm-12">
    <div class="row">
    <!-- LEFT FORM-->
    <div class="col-md-5">
      <div class="form-group">       
        <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           : <?php echo $row->Notrans;?>
         <input type="hidden" name="job" value="<?php echo $row->Notrans;?>" /> </div>
 </div><div class="clearfix"></div>
<div class="form-group">       
          <strong><label class="col-sm-4"> House No</label></strong>
          <div class="col-sm-7">
           : <?php echo $row->HouseNo;?>
           <input name="house" type="hidden" id="house" value="<?php echo $row->HouseNo;?>" />
           <input name="houseno" type="hidden" id="houseno" value="<?php echo $row->HouseNo;?>" />
          </div>
 </div><div class="clearfix"></div>
<div class="form-group"> <strong>
  <label class="col-sm-4"> Payment Type</label>
</strong>
<div class="col-sm-7">: <?php echo $row->PayCode;?>
  <input type="hidden" name="paymentype" value="<?php echo $row->PayCode;?>" />
</div>
 </div><div class="clearfix"></div>
 <div class="form-group"><strong><span class="col-sm-4">Service</span></strong>
   <div class="col-sm-7">: <?php echo $row->Service;?>
     <input name="service" type="hidden" id="service" value="<?php echo $row->Service;?>" />
   </div>
 </div><div class="clearfix"></div>
 <div class="form-group"><strong><span class="col-sm-4">Origin</span></strong>
   <div class="col-sm-7">: <?php echo $row->ori;?>
     <input name="origin" type="hidden" id="origin" value="<?php echo $row->ori;?>" />
   </div>
 </div><div class="clearfix"></div>
<div class="form-group"><strong><span class="col-sm-4">Destination</span></strong>
  <div class="col-sm-7">: <?php echo $row->desti;?>
    <input name="desti" type="hidden" id="desti" value="<?php echo $row->desti;?>" />
  </div>
 </div><div class="clearfix"></div>
 <div class="col-sm-12"><p>&nbsp;</p></div>
 
 <div class="form-group"><strong><span class="col-sm-4">Shipper</span></strong>
   <div class="col-sm-7">: <?php echo $row->pengirim;?>
     <input name="name1" type="hidden" id="name1" value=" <?php echo $row->pengirim;?>" />
   </div>
 </div><div class="clearfix"></div>
 <div class="form-group"><strong><span class="col-sm-4">Phone</span></strong>
   <div class="col-sm-7">: <?php echo $row->ph1;?>
     <input name="phone1" type="hidden" id="phone1" value="<?php echo $row->ph1;?>" />
   </div>
 </div><div class="clearfix"></div>
 <div class="form-group"><strong><span class="col-sm-4">Address</span></strong>
   <div class="col-sm-7">: <?php echo $row->add1;?>
     <input name="address1" type="hidden" id="address1" value="<?php echo $row->add1;?>" />
   </div>
 </div><div class="clearfix"></div>  
    </div>
    
    <!-- RIGHT FORM-->
    <div class="col-md-6">
      <div class="form-group"> 
        <strong><label class="col-sm-4">Booking No</label></strong>
        <div class="col-sm-7">: <?php echo $row->BookingNo;?>
          <input name="booking" type="hidden" id="booking" value="<?php echo $row->BookingNo;?>" />
        </div>
</div><div class="clearfix"></div>
<div class="form-group"> 
          <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">: <?php echo $row->ETD;?>
            <input name="etd" type="hidden" id="etd" value="<?php echo $row->ETD;?>" />
          </div>
</div><div class="clearfix"></div>

 <div class="col-sm-12"><h1>&nbsp;</h1></div>
 <div class="col-sm-12"><h3>&nbsp;</h3></div>

    <div class="form-group"> 
        <strong>
        <label class="col-sm-4">Consignee</label></strong>
        <div class="col-sm-7">: <?php echo $row->penerima;?>
          <input name="name2" type="hidden" id="name2" value="<?php echo $row->penerima;?>" />
        </div>
</div><div class="clearfix"></div>

    <div class="form-group"> 
        <strong>
        <label class="col-sm-4">Phone</label></strong>
        <div class="col-sm-7">: <?php echo $row->ph2;?>
          <input name="phone2" type="hidden" id="name11" value="<?php echo $row->ph2;?>" />
        </div>
</div><div class="clearfix"></div>

    <div class="form-group"> 
        <strong>
        <label class="col-sm-4">Address</label></strong>
        <div class="col-sm-7">: <?php echo $row->add2;?>
          <input name="address2" type="hidden" id="name12" value="<?php echo $row->add2;?>" />
        </div>
</div><div class="clearfix"></div>


    </div>

    
    </div>
    </div>
    
<?php } ?>
      
<br style="clear:both" />
<div class="col-sm-11">         
  <div class="row">
  
 <div class="col-sm-10">
    <h3><span class="label label-large label-pink arrowed-in-right"><strong>List Items</strong></span></h3>
    <div class="table-responsive" id="table_responsive">
    <table class="table table-striped table-bordered table-hover" id="area-cetak">
                                              <thead>
                                                <tr>
                                                  <th><div align="center">No.</div></th>
                                                  <th><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th><div align="center">Volume</div></th>
                                                </tr>
                                          
                                                
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach($items as $items){
  $t_item+=$items->NoPack;
  $t_volume+=$items->Volume;
        ?>
                                                  <tr align="right">
                                                  <td><div align="center">
                                                    <?=$no;?>
                                                  </div></td>
                                                  <td><input name="pcs[]" type="hidden" id="pcs[]" value="<?php echo $items->NoPack; ?>" />                                                    <?php echo $items->NoPack; ?></td>
                                                  <td><input name="p[]" type="hidden" id="p[]" value="<?php echo $items->Length; ?>" />                                                    <?php echo $items->Length; ?></td>
                                                  <td><input name="l[]" type="hidden" id="l[]" value="<?php echo $items->Width; ?>" />                                                    <?php echo $items->Width; ?></td>
                                                  <td><input name="t[]" type="hidden" id="t[]" value="<?php echo $items->Height ?>" />                                                    <?php echo $items->Height; ?></td>
                                                  <td><input name="v[]" type="hidden" id="v[]" value="<?php echo $items->Volume; ?>" />                                                    <?php echo number_format($items->Volume,2,'.',',');?></td>
                                                  
                                                  
                          
                                                </tr>
  <?php $no++;} ?>
                                          <thead>
                                                 <tr align="right">
                                                  <td><strong>Total</strong></td>
                                                  <td><strong><?php echo $t_item;?>
                                                  <input type="hidden" name="t_item" value="<?php echo $t_item;?>">
                                                  </strong></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><strong>
                                                  <input name="t_volume" type="hidden" id="t_volume" value="<?php echo $t_volume;?>" />                                                    
                                                  <?php echo number_format($t_volume,2,'.',',');?></strong></td>  
                                            </tr>
                                          </thead>
                                              </tbody>
                                          </table>
</div>
</div>
 <div class="col-md-6">

   <div class="form-group">       
     <strong><label class="col-sm-5">Commodity</label></strong>
          <div class="col-sm-7">
          : <?php echo $row->CommName;?>
          <input name="commodity" type="hidden" id="name3" value="<?php echo $row->CommName;?>" />
          </div>
 </div><div class="clearfix"></div>
<div class="form-group">       
          <strong><label class="col-sm-5">Gross Weight</label></strong>
          <div class="col-sm-7">
          : <?php echo $row->GrossWeight;?>
          <input name="grossweight" type="hidden" id="name4" value="<?php echo $row->GrossWeight;?>" />
          </div>
 </div><div class="clearfix"></div>
<div class="form-group"> <strong>
  <label class="col-sm-5">pecial Instructions </label>
</strong>
<div class="col-sm-7">: <?php echo $row->SpecialIntraction;?>
  <input name="special" type="hidden" id="name5" value="<?php echo $row->SpecialIntraction;?>" />
</div>
 </div><div class="clearfix"></div>

    </div>
    <!-- end of RIGHT FORM -->
   <!-- SSTART RIGHT INGPUT -->
   <div class="col-md-6">
     <div class="form-group">       
       <strong><label class="col-sm-5">CWT</label></strong>
          <div class="col-sm-7">
           : <?php echo $row->CWT;?>
           <input name="cwt" type="hidden" id="name6" value="<?php echo $row->CWT;?>" />
          </div>
 </div><div class="clearfix"></div>
<div class="form-group">       
          <strong><label class="col-sm-5"> Declare Value</label></strong>
          <div class="col-sm-7">
           : <?php echo $row->DeclareValue;?>
           <input name="declare" type="hidden" id="name7" value="<?php echo $row->DeclareValue;?>" />
          </div>
 </div><div class="clearfix"></div>
<div class="form-group"> <strong>
  <label class="col-sm-5"> Description of Shipment</label>
</strong>
<div class="col-sm-7">: <?php echo $row->DescofShipment;?>
  <input name="description" type="hidden" id="name8" value="<?php echo $row->DescofShipment;?>" />
</div>
 </div><div class="clearfix"></div>

    </div>
   <!-- END OF RIGHT FORM -->
       
    </div>
	
    </div>
   
<br style="clear:both">
<div class="col-sm-11">         
  <div class="row">
  
 <div class="col-sm-10">
    <h3><span class="label label-large label-pink arrowed-in-right"><strong>Charges</strong></span></h3>
    <div class="table-responsive" id="table_responsive">
    <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                              <tr>
                                                  <th width="24">No.</th>
                                                  <th width="56">Charges</th>
                                                  <th width="61">Desc</th>
                                                  <th width="49">Price</th>
                                                  <th width="44">Qty</th>
                                                  <th width="62">Total</th>
                                                  </tr>
                                                </thead>
                                              
                                              <tbody>
   <?php 
$i=1;
foreach($charges as $chr){
$unit=$chr->Price;
$qty=$chr->Qty;
$kali=$unit*$qty;

$total_charges+=$kali;
 //$t_volume+=$itm['v'];
        ?>
                                                  <tr>
                                                  <td><?=$i;?></td>
                                                  <td><?php echo $chr->ChargeName;?>
                                                    <input name="idcharge[]" type="hidden" id="idcharge[]" value="<?php echo $chr->ChargeName;?>" /></td>
                                                  <td><?php echo $chr->ChargeDetail;?>
                                                    <input name="desc[]" type="hidden" id="desc[]" value="<?php echo $chr->ChargeDetail;?>" /></td>
                                                  <td><div align="right">
                                                    <input name="unit[]" type="hidden" id="unit[]" value="<?php echo $chr->Price;?>" />
                                                    <?php echo number_format($chr->Price,2,',','.');?>                                                  </div></td>
                                                  <td><div align="right">
                                                    <input name="qty[]" type="hidden" id="qty[]" value="<?php echo $chr->Qty;?>" />
                                                    <?php echo $chr->Qty;?></div></td>
                                                  <td><div align="right">
                                                    <input name="total[]" type="hidden" id="total[]" value="<?php echo $kali;?>" />
<?php echo number_format($kali,2,'.',',');?></div></td>
                                                </tr>
<?php $no++; } ?>
                                                
                                                 <tr>
                                                  <td colspan="3"><b>Total</b></td>
                                                  <td colspan="3"><div align="right"><strong>
                                                  <?php echo "Rp ". number_format($total_charges,2,'.',',');?>
												  <input type="hidden" name="total_charge" value="<?php echo $total_charges;?>" />
                                                  </strong></div></td>
                                                  </tr>
                                               
                                              </tbody>
                                            </table>
</div>
</div>
 <!-- end of RIGHT FORM -->
   <!-- SSTART RIGHT INGPUT -->
 <div class="col-md-11">
<div class="form-group">
<div class="col-sm-4"><h3>&nbsp;</h3></div>
<div class="col-sm-5">
<button class="btn btn-primary" type="submit"><i class="icon icon-print bigger130"></i>Print view & print !</button>
<a href="<?php echo base_url();?>incoming_house"><button class="btn btn-danger" type="button"><i class="icon icon-ok bigger130"></i>Finish !</button></a>
</div>

 </div><div class="clearfix"></div>

    </div>
   <!-- END OF RIGHT FORM -->
       
    </div>
    </div>
    
    
   </form>
  
  </div>


