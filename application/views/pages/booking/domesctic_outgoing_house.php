
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

                <h3><i class="icon icon-fighter-jet bigger-230"></i> &nbsp;Air Domestic Outgoing - House</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="save.php">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Job Data</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> House No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>

          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7">
           <select name="service" id="filter" class="form-control combo">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
          <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7">
           <select name="service" id="filter" class="form-control" required="required">
          <option>Choose Service</option>
          <?php foreach ($service as $sv) {
          ?>
          <option value="<?php echo $sv->svCode;?>"><?php echo $sv->Name;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <select name="origin" id="filter" class="form-control" required="required">
          <option>Choose Origin</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <select name="desti" id="filter" class="form-control" required="required">
          <option>Choose Destination</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control combo">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Phone</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Address</label></strong>
          <div class="col-sm-7">
           <textarea class="form-control select" name="address"></textarea>
          </div>
          <strong><label class="col-sm-4"> Code Shipper</label></strong>
          <div class="col-sm-7">
             <input name="codeshipper" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Commodity</label></strong>
          <div class="col-sm-7">
          <select name="commodity" id="filter" class="form-control">
          <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
           </div>
      </div>             
      </div>
                <!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
<label class="col-sm-12"> <span class="span3 label label-large label-pink arrowed-in-right">Boooking Data</span></label> 
<div class="clearfx">&nbsp;</div>
        <strong><label class="col-sm-4">Booking No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
           <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="tgl" required="required" readonly="readonly" required="required" placeholder="<?php echo date("m/d/Y") ;?>"/>
          </div>


            <strong><label class="col-sm-4"> Consignee</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
              <strong><label class="col-sm-4"> Phone</label></strong>
          <div class="col-sm-7">
            <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Address</label></strong>
          <div class="col-sm-7">
            <textarea name="address2" class="form-control select"></textarea>
          </div>
          <strong><label class="col-sm-4"> Code Consignee</label></strong>
          <div class="col-sm-7">
            <input name="codeconsignee" type="text" class="form-control"  id="tgl" required="required" required="required"/>
          </div>

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
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Item's</strong></span></h2>
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
                                              <div class="col-sm-3"><input type="text" name="gross" id="gross" class="form-control"></div>
                                             </div>
                                                <div class="col-md-12">
                                              <label class="col-sm-2">Remarks &nbsp;</label>
                                              <div class="col-sm-4">
                                                <textarea name="remarks" class="form-control" rows="5"></textarea>
                                              </div>
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
                                            <a class="btn btn-danger btn-addnew" href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
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