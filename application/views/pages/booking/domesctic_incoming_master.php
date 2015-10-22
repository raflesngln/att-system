    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap-min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/css/bootstrap-dialog-min.css">

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
 #flightno{margin-left: 15px;}
 #flightdate1,#flightdate2,#flightdate3{margin-left: 10px;}
 </style>
  <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#tgl").datepicker();
    $("#tgl2").datepicker();
    $("#tgl3").datepicker();
    $("#flightdate1").datepicker();
    $("#flightdate2").datepicker();
    $("#flightdate3").datepicker();
      
  });
  </script>

   <div class="row-fluid">
    <div class="span12">
                  <?php
			if(isset($eror)){?>
            <label class="alert alert-error col-sm-12">
			<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>	</button>							
			<?php echo isset($eror)?$eror:'';?>
			<br />
			</label>
            <?php }?>   
      <div class="header col-md-11">

                <h3><i class="fa fa-file-archive-o bigger-230"></i> &nbsp;Air Domestic Incoming - Master</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="save.php">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Sender</strong></span></label>                       
 <div class="col-sm-12">&nbsp;</div>              
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <input name="job" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
           <strong><label class="col-sm-4"> SMU No</label></strong>
          <div class="col-sm-7">
           <input name="smu" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <select name="origin" id="filter" class="form-control" required="required">
          <option>Choose City</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <select name="origin" id="filter" class="form-control" required="required">
          <option>Choose Destination</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4">Flight No / Date (1)</label></strong>
          <div class="col-sm-7">
                  <div class="row">
                       <div class="col-sm-5">
                       <input type="text" class="form-control" id="flightno" name="flightno1" placeholder="flight no">
                      </div>
                       <div class="col-sm-1">/</div>
                      <div class="col-sm-5">
                       <input id="flightdate1" type="text" class="form-control" readonly="readonly" name="flightdate1" value="<?php echo date('m/d/Y');?>">
                      </div>
                  </div>
          </div>
          <strong><label class="col-sm-4">Flight No / Date (2)</label></strong>
          <div class="col-sm-7">
                  <div class="row">
                       <div class="col-sm-5">
                       <input type="text" class="form-control" id="flightno" name="flightno2" placeholder="flight no">
                      </div>
                      <div class="col-sm-1">/</div>
                      <div class="col-sm-5">
                       <input id="flightdate2" type="text" class="form-control" readonly="readonly" name="flightdate2" value="<?php echo date('m/d/Y');?>">
                      </div>
                  </div>
          </div>
          <strong><label class="col-sm-4">Flight No / Date (3)</label></strong>
          <div class="col-sm-7">
                  <div class="row">
                       <div class="col-sm-5">
                       <input type="text" class="form-control" id="flightno" name="flightno3" placeholder="flight no">
                      </div>
                       <div class="col-sm-1">/</div>
                      <div class="col-sm-5">
                       <input id="flightdate3" type="text" class="form-control" readonly="readonly" name="flightdate3" value="<?php echo date('m/d/Y');?>">
                      </div>
                  </div>
          </div>
<div class="col-sm-12"><hr></div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
           <select name="idshipper" id="idshipper" class="form-control combo">
            <option>Select Shipper</option>
         <?php
          foreach($shipper as $sv){
           ?>
          <option value="<?php echo $sv->custCode;?>"><?php echo $sv->custInitial;?></option>
          <?php } ?>
          </select>
          </div>

<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>

<div class="col-sm-13" id="contenshipper"><!-- CONTENT AJAX VIEW HERE --></div>
<strong><label class="col-sm-4"> Commodity</label></strong>
<div class="col-sm-7">
      <select data-placeholder="Choose Commodity..." class="chosen-select form-control" tabindex="2" name="commodity">
           <option value="">Choose Commodity</option>
          <?php foreach ($commodity as $cm) {
          ?>
            <option value="<?php echo $cm->commCode;?>"><?php echo $cm->Name;?></option>
          <?php } ?>
      </select>
          </div>

  </div>             
</div>
                <!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
<label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Receivement</strong></span></label>                       
 <div class="col-sm-12">&nbsp;</div>  
        <strong><label class="col-sm-4">ETA</label></strong>
          <div class="col-sm-7">
           <input name="eta" type="text" class="form-control"  id="tgl3" required="required" readonly="readonly" value="<?php echo date("m/d/Y") ;?>"/>
          </div>
          <strong><label class="col-sm-4"> Pre Alert Date</label></strong>
          <div class="col-sm-7">
           <input name="pad" type="text" class="form-control"  id="tgl" required="required" readonly="readonly" required="required" value="<?php echo date("m/d/Y") ;?>"/>
          </div>

          <div class="col-sm-12"><hr/></div>
          
<strong><label class="col-sm-4"> Consigne</label></strong>
          <div class="col-sm-7">
           <select name="idconsigne" id="idconsigne" class="form-control">
            <option>Select Cnee</option>
         <?php
          foreach($cnee as $sv){
           ?>
          <option value="<?php echo $sv->custCode;?>"><?php echo $sv->custName;?></option>
          <?php } ?>
          </select>
          </div> 

<div class="col-sm-1"><a class="btn btn-success btn-addnew btn-mini" href="#modaladdcust" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a></div>

<div class="col-sm-13" id="contencnee"><!-- CONTENT AJAX VIEW HERE --></div>
<strong><label class="col-sm-4"> Commodity</label></strong>
<div class="col-sm-7">
      <select data-placeholder="Choose Commodity..." class="chosen-select form-control" tabindex="2" name="commodity">
           <option value="">Choose Commodity</option>
          <?php foreach ($commodity as $cm) {
          ?>
            <option value="<?php echo $cm->commCode;?>"><?php echo $cm->Name;?></option>
          <?php } ?>
      </select>
          </div>
          </div>              
      </div>


   </div>
</div>
<br style="clear:both;margin-bottom:40px;">
<label class="col-sm-5"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Item's Booking</strong></span></label> 
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>No Of Pcs</th>
                                                  <th>Length ( P )</th>
                                                  <th>Width ( L )</th>
                                                  <th>Height ( T )</th>
                                                  <th>Volume</th>
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
                                                  <a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i></a>
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
                                                 <tr>
                                                  <td><b>Total</b></td>
                                                  <td><strong>xxx</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><strong>xxx</strong></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                                            <div class="col-md-12">
                                              <div class="row">
                                                <div class="col-md-12">
                                              <label class="col-sm-2">Gross Weight &nbsp;</label>
                                              <div class="col-sm-3"><input type="text" name="gross" id="gross" class="form-control"></div>
                                                </div>
                                                <div class="col-md-12">
                                              <label class="col-sm-2">CWT &nbsp;</label>
                                              <div class="col-sm-3"><input type="text" name="cwt" id="gross" class="form-control"></div>
                                             </div>
                                                <div class="col-md-12">
                                              <label class="col-sm-2">Remarks &nbsp;</label>
                                              <div class="col-sm-4">
                                                <textarea name="remarks" class="form-control" rows="5"></textarea>
                                              </div>
                                             </div>
                                              </div>
                                            </div>

                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger btn-addnew" href="<?php echo base_url();?>transaction/domesctic_outgoing_master" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
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

<!-- edit data -->
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

<!--a ADDING FORM ITEM -->
<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Item</h3>
            </div>
            <div class="smart-form scroll">
                <form method="post" action="<?php echo site_url('master/save_disc')?>">
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No of Packs </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    
 <div class="form-group">
                        <label class="col-sm-3 control-label">Volume</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="rp" type="text" class="form-control" placeholder="" id="rp" readonly="readonly" />
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
                url : "<?php echo base_url('booking/getshipper'); ?>",
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
                url : "<?php echo base_url('booking/getcnee'); ?>",
                data: "custCode="+custCode,
                success: function(data){
                    $('#contencnee').html(data);
                }
            });

        });

</script>