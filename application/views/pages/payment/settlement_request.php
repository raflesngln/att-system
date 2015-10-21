
 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 input[type=text],input[type=select]{
  border:1px #B5B5B5 solid;
  margin-bottom:3px;
  margin-top: 3px;
 }
 table tr:nth-child(odd) td { background-color: #FFFF99; }
 </style>
     <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#datepr").datepicker();

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

                <h2><i class="fa fa-arrow-circle-o-left fa-2x"></i> &nbsp; Settlement Payment Request (Tutup Bon )</h2>

      </div>
      

<br style="clear:both">

<form method="post" action="<?php echo base_url();?>payment/save_payment_request">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
  <label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Job Detail</strong></span></label>                       
    <div class="col-sm-12">&nbsp;</div>                     
          <strong><label class="col-sm-4"> Job No</label></strong>
          <div class="col-sm-7">
           <input name="bookno" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> House No</label></strong>
          <div class="col-sm-7">
           <input name="custacc" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>

          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <input name="shipper" type="text" class="form-control"  id="name" required="required" readonly="readonlly"/>
          </div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
           <input name="name1" type="text" class="form-control"  id="name" required="required" readonly="readonlly"/>
          </div>
  

      </div>

                           
      </div>
<!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
  <label class="col-sm-12">&nbsp;</label>
    <div class="col-sm-12">&nbsp;</div>  
        <strong><label class="col-sm-4">Service</label></strong>
          <div class="col-sm-7">
           <input name="issue" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <input name2="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>

          <strong><label class="col-sm-4"> Consignee</label></strong>
          <div class="col-sm-7">
           <input name="consignee" type="text" class="form-control"  id="name" required="required" readonly="readonlly" />
          </div>

          </div>
                       
            
      </div>
   </div>
<br style="clear:both;margin-bottom:40px;">
            <div class="row">
             <label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Outstanding Payment Request</strong></span></label>                       
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                               
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Payment Request No</th>
                                                  <th>Receiver</th>
                                                  <th>Date PR</th>
                                                  <th><div align="center">IDR</div></th>
                                                  <th><div align="center">USD</div></th>
                                                  
                                                </tr>
                                              </thead>
                                              <tbody>  
                                             <tr>
                                                  <th>1</th>
                                                  <th>S</th>
                                                  <th>Sstring</th>
                                                  <th>99</th>
                                                  <th><div align="right"><?php echo number_format('999999',0,'.','.');?></div></th>
                                                  <th><div align="right"><?php echo number_format('999',0,'.','.');?></div></th>
                                                                   
                                                </tr>
                                             <thead>
                                             <tr>
                                                  <th colspan="3">Total</th>
                                                  <th></th>
                                                  <th><div align="right"><?php echo 'Rp. '. number_format('999999',0,'.','.');?></div></th>
                                                  <th><div align="right"><?php echo number_format('999',0,'.','.').' USD';?></div></th>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
          <strong><label class="col-sm-5"> Settlement Number</label></strong>
          <div class="col-sm-7">
           <input name="pr" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-5"> By</label></strong>
          <div class="col-sm-6">
            <input name="amount" type="text" class="form-control"  id="name" required="required" />
          </div>

          <strong><label class="col-sm-5"> Currency</label></strong>
          <div class="col-sm-7">
           <select name="currency" class="form-control">
             <option value="chosee">Chosse</option>
           </select>
          </div>
 
      </div>
                           
 </div>
<!--RIGHT INPUT-->
<div class="col-sm-6">
  <div class="col-sm-11">
  <label class="col-sm-12">&nbsp;</label>
    <div class="col-sm-12">&nbsp;</div>  
        <strong><label class="col-sm-3">Date of PR</label></strong>
          <div class="col-sm-8">
           <input name="datepr" type="text" class="form-control"  id="datepr" required="required" value="<?php echo date('m/d/Y');?>" readonly="readonly"/>
          </div>
    
          </div>             
            
      </div>
   </div>
   </div>
             <h4 style="background-color:#D6487E; width:10%; border-radius: 0px 100px  100px 0px  ;padding:8px 10px;color:white">Items Add</h4>

                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                               
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Charges</th>
                                                  <th>Desc</th>
                                                  <th>Value</th>
                                                  <th>Qty</th>
                                                  <th>Total</th>
                                                  <th>Vendor</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>  
                                             <tr>
                                                  <th>1</th>
                                                  <th>99</th>
                                                  <th>99</th>
                                                  <th>99</th>
                                                  <th>99</th>
                                                  <th>99</th>
                                                  <th>99</th>
                                                  <th>
                                                  <div align="center">
                                                  <a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add Item"><i class="icon-plus icons"></i></a>
                                                  <a href="<?php echo base_url();?>master/delete_disc/<?php echo $data->id?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger"><i class="fa fa-times bigger-120"></i></button>
                                                  </a>                                                                         
                                                                           
                                                </tr>
                                             <thead>
                                             <tr>
                                                  <th colspan="5">Total</th>
                                                  <th>xxx</th>
                                                  <th>XXX</th>
                                                  <th></th>
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-12">
          
          <strong><label class="col-sm-4"> Remarks</label></strong>
          <div class="col-sm-8">
            <textarea name="rermarks" class="form-control" rows="4"></textarea>
          </div>
 
      </div>
                           
 </div>
<!--RIGHT INPUT-->

   </div>
   </div>
                                        <div style="margin-bottom:50px;"></div>
                                          <div class="col-md-4"></div>
                                          <div class="col-md-2">
                                         <a href="<?php echo base_url();?>transaction/booking_shipment"><button type="button" class="btn btn-danger btn-large"><i class="icon-reply bigger-160 icons"></i>&nbsp;Cancel</button></a>
                                          </div>
                                          <div class="col-md-2">
                                         <button type="submit" class="btn btn-primary btn-large"><i class="icon-save bigger-160 icons"></i>&nbsp;Save</button>
                                          </div>

                                </form>
              </div>
          </div>
      </div>
  </div>

</div>

</form>
            </div>
  

<!--  -edit data   -->
<?php

    foreach($list as $row){

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

<!-- ADD NEW ITEMS -->
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
                        <label class="col-sm-3 control-label">No of Pcs </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="pcs" type="text" class="form-control" placeholder="" id="pcs" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Length &nbsp; ( P )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="l" type="text" class="form-control" placeholder="" id="p" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Width &nbsp; ( L )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="w" type="text" class="form-control" placeholder="" id="l" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Height &nbsp; ( T )</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="h" type="text" class="form-control" placeholder="" id="t" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>                    
 <div class="form-group">
                        <label class="col-sm-3 control-label">Volume</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="v" type="text" class="form-control" placeholder="" id="v" Readonly="readonly" />
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
	 $("#filter").change(function(){
            var filter = $("#filter").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/filter_discount'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                }
            });

        });
</script>