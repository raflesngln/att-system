
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
    $("#tgl").datepicker();
    $("#tgl2").datepicker();

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

                <h2><i class="fa fa-book fa-2x"></i> &nbsp; Boooking Shipment</h2>

      </div>
      

<br style="clear:both">

<form method="post" action="<?php echo base_url();?>trasaction/save_shipment">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
  <label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right"><strong>Sender</strong></span></label>                       
    <div class="col-sm-12">&nbsp;</div>                     
          <strong><label class="col-sm-4"> Booking No</label></strong>
          <div class="col-sm-7">
           <input name="bookno" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> Customer Acc#</label></strong>
          <div class="col-sm-7">
           <input name="custacc" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
                    <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7">
           <select name="service" id="filter" class="form-control" required="required">
           <option>Choose Service</option>
          <?php foreach ($service as $srv) {
          ?>
          <option value="<?php echo $srv->svCode;?>"><?php echo $srv->Name;?></option>
          <?php } ?>
          </select>
          
          </div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
           <input name="shipper" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name1" type="text" class="form-control"  id="name" required="required" />
          </div>
  <strong><label class="col-sm-4"> Origin</label></strong>
  <div class="col-sm-7">
  <select data-placeholder="Choose an Address..." class="chosen-select form-control" tabindex="2" name="origin">
           <option>Choose Origin</option>
          <?php foreach ($city as $cy) {
          ?>
            <option value="<?php echo $cy->cyCode;?>"><?php echo $cy->cyName;?></option>
          <?php } ?>
          </select>
  </div>
          <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
           <input name="etd" placeholder="<?php echo date("m/d/Y") ;?>" type="text" class="form-control"  id="tgl" required="required" readonly="readonly"/>
          </div>
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
        <strong><label class="col-sm-4">Date Of Issue</label></strong>
          <div class="col-sm-7">
           <input name="issue" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name2="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>

          <strong><label class="col-sm-4"> &nbsp;</label></strong>
          <div class="col-sm-7">
           <p><hr></p>

          </div>

          <strong><label class="col-sm-4"> Consignee</label></strong>
          <div class="col-sm-7">
           <input name="consignee" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name3" type="text" class="form-control"  id="name" required="required" />
          </div>
              <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
          <select name="desti" id="filter" class="form-control" required="required">
          <option>Choose Destination</option>
          <?php foreach ($city as $cy) {
          ?>
            <option value="<?php echo $cy->cyCode;?>"><?php echo $cy->cyName;?></option>
          <?php } ?>
          </select>
          </select>
          </div>

          </div>
                       
            
      </div>
   </div>
<br style="clear:both;margin-bottom:40px;">

            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                               
                                                <tr height="50">
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
                                                  <th>1</th>
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
                                                  <th>Total</th>
                                                  <th>XXX</th>
                                                  <th></th>
                                                  <th></th>
                                                  <th></th>
                                                  <th>XXX</th>
                                                  <th></th>
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
                                              <div class="col-sm-3">
                                              <input type="text" name="gross" id="gross" class="form-control" onkeypress="return isNumberKey(event)">
                                              </div>
                                                </div>

                                                <div class="col-md-12">
                                              <label class="col-sm-2">CWT &nbsp;</label>
                                              <div class="col-sm-3">
                                              <input type="text" name="cwt" id="gross" class="form-control" onkeypress="return isNumberKey(event)">
                                              </div>
                                             </div>
                                              </div>
                                            </div>

                                        <div style="margin-bottom:150px;"></div>
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
  

<!-----edit data------->
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