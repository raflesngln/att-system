
 <style>
 .btn-search{ height:32px; margin-left:-10px;}

  input{
  border:1px #B5B5B5 solid;
  margin-bottom:5px;
  margin-top: 3px;
 }
   .select,.combo{
  border:1px #B5B5B5 solid;
  margin-bottom:5px;
  margin-top: 3px;
 }
 
 </style>
       <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <script type="text/javascript">
  $(function() {
    $("#tgl").datepicker();
    $("#tgl2").datepicker();

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
  var aa=angka;
  var hasil=toRp(aa);
  //alert('haii ' + hasil);
  document.getElementById("grossweight").value =hasil;
  document.getElementById("grossweight").style.fontSize="large";
   document.getElementById("grossweight").style.fontWeight="bold";
   document.getElementById("grossweight").style.color="blue";
 }

  </script>

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

                <h3><i class="fa fa-calendar-check-o bigger-230"></i> &nbsp;Air Domestic Outgoing - House</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/preview_outgoing_house" target="_blank">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Sender</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <input name="job" type="text" class="form-control"  id="name" required="required"/>
          </div>
          <strong><label class="col-sm-4"> House No</label></strong>
          <div class="col-sm-7">
           <input name="house" type="text" class="form-control"  id="name" required="required" />
          </div>

          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7">
          <select name="paymentype" class="form-control" required=required>
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
           <select name="service" id="filter" class="form-control" required="required">
          <option value="">Choose Service</option>
          <?php foreach ($service as $sv) {
          ?>
          <option value="<?php echo $sv->svCode.'-'.$sv->Name;?>"><?php echo $sv->Name;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <select name="origin" id="filter" class="form-control" required="required">
          <option value="">Choose Origin</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode.'-'.$ct->cyName;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <select name="desti" id="filter" class="form-control" required="required">
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
           <select name="idshipper" id="idshipper" class="form-control combo" required="required">
            <option value="">Select Shipper</option>
         <?php
          foreach($shipper as $sv){
           ?>
          <option value="<?php echo $sv->custCode;?>"><?php echo $sv->custInitial;?></option>
          <?php } ?>
          </select>
          </div>
<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>

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
           <input name="bookno" type="text" class="form-control"  id="bookno" required="required" />
          </div>

           <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
           <input name="etd" type="text" class="form-control"  id="tgl"  readonly="readonly" required="required" placeholder="<?php echo date("m/d/Y") ;?>"/>
          </div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12"><h6>&nbsp;</h6></div>
<div class="col-sm-12"><hr></div>

            <strong><label class="col-sm-4"> Consigne</label></strong>
          <div class="col-sm-7">
           <select name="idconsigne" id="idconsigne" class="form-control" required="required">
            <option value="">Select Cnee</option>
         <?php
          foreach($cnee as $sv){
           ?>
          <option value="<?php echo $sv->custCode;?>"><?php echo $sv->custName;?></option>
          <?php } ?>
          </select>
          </div> 
<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>

<div class="col-sm-13" id="contencnee"><!-- CONTENT AJAX VIEW HERE --></div>
   </div>
</div>



<br style="clear:both;margin-bottom:40px;">
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Item's</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>No Of Pcs</th>
                                                  <th>Length ( P )</th>
                                                  <th>Width ( L )</th>
                                                  <th>Height ( T )</th>
                                                  <th>Volume</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                <th colspan="6"></th>
                                                <th><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add items</a>
                                           </div></th>
                                                <tr>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_volume+=$items['v'];
        ?>
                                                  <tr align="right">
                                                  <td><div align="center"><?=$no;?></div></td>
                                                  <td><?php echo $items['qty']; ?></td>
                                                  <td><?php echo $items['p']; ?></td>
                                                  <td><?php echo $items['l']; ?></td>
                                                  <td><?php echo $items['t']; ?></td>
                                                  <td><?php echo number_format($items['v'],2,'.',',');?></td>
                                                  <td>
                                                  <div align="center">
                                                   <a href="<?php echo base_url(); ?>temp/delete_item/<?php echo $items['rowid']; ?>" onclick="return confirm('Yakin Hapus ?');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button"><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                <thead>
                                                 <tr align="right">
                                                  <td><b>Total</b></td>
                                                  <td><?php echo $t_item;?><input type="hidden" name="t_item" value="<?php echo $t_item;?>"></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><?php echo number_format($t_volume,2,'.',',');?></td>  
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
  <input type="text" name="grossweight" id="grossweight" class="form-control" onkeypress="return isNumberKey(event)" onchange="rupiah();" required="required">
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
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                  <th>No.</th>
                                                  <th>Charges</th>
                                                  <th>Desc</th>
                                                  <th>Unit</th>
                                                  <th>Qty</th>
                                                  <th>Total</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                <tr>
                                                <td colspan="6"></td>
                                                <td><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdCharge" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add Charges</a></div></td>
                                                </tr>
                                                </thead>
                                              </thead>
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
                                                  <td><div align="right"><?php echo number_format($chr->Unit,2,',','.');?></div></td>
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
                                                  <?php echo "Rp ". number_format($grandt,2,'.',',');?>
												  <input type="hidden" name="total_charge" value="<?php echo $grandt;?>" />
                                                  </strong></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
  
                                    </div>
  

  
<h2><span class="label label-large label-pink arrowed-in-right"><strong>Consol to Master/ SMU</strong></span></h2>
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>SMU No</th>
                                                  <th>Origin</th>
                                                  <th>Dest</th>
                                                  <th>Qty</th>
                                                  <th>CWT</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                  <tr>
                                                  <td>1</td>
                                                  <td>xxx</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>
                                                  <div align="center">
                                                  <a class="btn btn-success btn-addnew btn-mini" href="#modaladd2" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a>
                                                  <a href="<?php echo base_url();?>master/delete_disc/<?php echo $data->id?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger"><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                                  </div>
                                                  </td>
                                                </tr>
                                                 <tr>
                                                  <td colspan="7">&nbsp;</td>
                                                </tr>
                                                <thead>
                                            
                                                </thead>
                                              </tbody>
                                            </table>
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
  

<!--edit form-->
<?php

    foreach($list as $row){
    $isagen=$row->isAgent;
    $isaktif=$row->isAktive;
    $isCnee=$row->isCnee;
    $isShipper=$row->isShipper;
    if($isagen==1){ $status1='YES';}else{$status1='NO';}
    if($isShipper==1){ $status2='YES';}else{$status2='NO';}
    if($isCnee==1){ $status3='YES';}else{$status3='NO';}
    if($isaktif==1){ $status4='YES';}else{$status4='NO';}
        ?>
<div id="modaledit<?php echo $row->discCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_disc')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Customer </label>
                        <div class="col-sm-9"><span class="controls">
<select name="cust" id="cust" required="required" class="form-control">
                            <option value="<?php echo $row->custCode;?>"><?php echo $row->custName;?></option>
                            <?php
  foreach($cust as $ct){
      ?>
                            <option value="<?php echo $ct->custCode;?>"><?php echo $ct->custName;?></option>
                            <?php } ?>
                          </select>
                        </span>
                          <input type="hidden" name="id" id="id" value="<?php echo $row->discCode;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Service</label>
                        <div class="col-sm-9"><span class="controls">
<select name="service" id="service" required="required" class="form-control">
                            <option value="<?php echo $row->svCode;?>"><?php echo $row->Name;?></option>
                            <?php
  foreach($service as $sv){
      ?>
                            <option value="<?php echo $sv->svCode;?>"><?php echo $sv->Name;?></option>
                            <?php } ?>
                          </select>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Origin</label>
                        <div class="col-sm-9"><span class="controls">
<select name="ori" id="ori" required="required" class="form-control">
                            <option value="<?php echo $row->Ori;?>"><?php echo $row->Ori;?></option>
                            <?php
  foreach($city as $cty){
      ?>
                            <option value="<?php echo $cty->cyName;?>"><?php echo $cty->cyName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Destination</label>
                        <div class="col-sm-9"><span class="controls">
<select name="dest" id="dest" required="required" class="form-control">
                            <option value="<?php echo $row->Dest;?>"><?php echo $row->Dest;?></option>
                            <?php
  foreach($city as $cty){
      ?>
                            <option value="<?php echo $cty->cyName;?>"><?php echo $cty->cyName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
              <label class="col-sm-3 control-label">Vendor</label>
                        <div class="col-sm-9"><span class="controls">
<select name="vendor" id="vendor" required="required" class="form-control">
                            <option value="<?php echo $row->venCode;?>"><?php echo $row->venName;?></option>
                            <?php
  foreach($vendor as $vd){
      ?>
                            <option value="<?php echo $vd->venCode;?>"><?php echo $vd->venName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Disc %</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" value="<?php echo $row->DiscPersen;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Disc Rp</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="rp" type="text" class="form-control" placeholder="" id="rp" value="<?php echo $row->DiscRupiah;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
  
  <div class="form-group">
<label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required="required"><?php echo $row->Remarks;?></textarea>
</div>
                        <div class="clearfix"></div>
                    </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<!--adding form-->
<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Item</h3>
            </div>
            <div class="smart-form scroll">
                <form method="post" action="<?php echo site_url('temp/save_item')?>">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No of Pcs </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="pcs" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="panjang" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="lebar" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tinggi" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
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
                <form method="post" action="<?php echo site_url('temp/save_temp_charge')?>">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">Charges </label>
                        <div class="col-sm-9"><span class="controls">
              <select name="charge" class="form-control" required=required>
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
                          <input name="desc" type="text" class="form-control" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Unit &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="unit" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Qty &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="qty" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<!--adding form 2-->
<div id="modaladd2" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add consol master/SMU</h3>
            </div>
            <div class="smart-form scroll">
                <form method="post" action="<?php echo site_url('master/save_disc')?>">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">SMU No </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Origin</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Destination</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">QTY</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    
 <div class="form-group">
                        <label class="col-sm-3 control-label">CWT</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="rp" type="text" class="form-control" placeholder="" id="rp" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
                </form>
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
                <form method="post" action="<?php echo site_url('booking/save_customer')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Initial <input type="hidden" name="page" id="page" value="incomaster"></label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="initial" type="text" class="form-control" placeholder="initial" id="initial" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control" required="required" id="name" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="address" cols="30" rows="2" class="form-control" id="address" required="required"></textarea>
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
                          <input name="phone" type="text" class="form-control" required="required" id="phone" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="fax" type="text" class="form-control" required="required" id="fax" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Postal Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="postcode" type="text" class="form-control" id="postcode" />
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
    <label class="col-sm-3 control-label">Credit Limit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="credit" type="text" class="form-control" id="credit" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Terms Payment</label>
                        <div class="col-sm-4"><span class="controls">
                          <input name="payment" type="text" class="form-control" required="required" value="0" id="payment" />
              </span></div>
            <h4 class="cols-sm-4">day's</h4>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Deposit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="deposit" type="text" class="form-control" required="required" value="0" id="deposit" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Sales</label>
                        <div class="col-sm-9"><span class="controls">
                          <select name="empcode" id="empcode" required="required" class="form-control">
                            <option value="">Chosse Sales</option>
                            <?php
  foreach($sales as $ct){
      ?>
                            <option value="<?php echo $ct->empCode;?>"><?php echo $ct->empName;?></option>
                            <?php } ?>
                          </select>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
    <label class="col-sm-3 control-label">NPWP</label>
                        <div class="col-sm-9">
                          <textarea name="npwp" cols="30" rows="2" class="form-control" id="npwp" required="required"></textarea>
</div>
                        <div class="clearfix"></div>
                      </div> 
<div class="form-group">
                        <label class="col-sm-3 control-label">NPWP Address</label>
                        <div class="col-sm-9">
                          <textarea name="npwpaddress" cols="30" rows="2" class="form-control" id="npwpaddress" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div> 
 <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
 <hr /> 
<div class="form-group">
                       <em>
                        <label class="col-sm-4 control-label">&nbsp;</label> 
                        <label class="col-sm-6 control-label">PIC & HPPIC</label>
              </em>
                        <div class="col-sm-2"></div>
                        
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 01</span>
                            <input name="pic01" type="text" class="form-control" placeholder="" id="pic01"  />
                            
</label>
    </span></div>
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 02</span>
                            <input name="pic02" type="text" class="form-control" placeholder="" id="pic02" />
                            
</label>
    </span></div>
   <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 01</span>
                            <input name="hppic01" type="text" class="form-control" placeholder="" id="hppic01"  />
                            
</label>
    </span></div>
 <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 02</span>
                          <input name="hppic02" type="text" class="form-control" placeholder="" id="hppic02"  />
                            
</label>
    </span></div>

</div>
<hr /> 

<div class="form-group">
     <em><label class="col-sm-4 control-label">&nbsp;</label> 
    <label class="col-sm-6 control-label">&nbsp;</label></em>

<div class="col-sm-2"></div>

 <div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; Agent</span>
      <select name="agen" id="agen" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; SHipper</span>
      <select name="shipper" id="agen" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp; CNEE</span>
      <select name="cnee" id="cnee" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>
    
<div class="clearfix"></div>
                      </div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>

    



<script type="text/javascript">     
  $(window).load(function(){
    $("#loading").fadeOut("slow");
  })
  
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
   $("#idshipper").change(function(){
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
     $("#idconsigne").change(function(){
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

</script>