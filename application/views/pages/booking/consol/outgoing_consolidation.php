
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
  $("#etd").datepicker({
    dateFormat:'yy-mm-dd',
    });
    
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

                <h3><i class="fa fa-clone bigger-230"></i> &nbsp;Outgoing-Consolidation</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="save.php">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
                       
          <strong><label class="col-sm-4"> SMU No</label></strong>
          <div class="col-sm-7">
           <select name="nosmu" class="form-control" required="required" id="nosmu">
          <option value="">Select SMU</option>
                   <?php
                   foreach ($master as $ms) {
                   ?>
                     <option value="<?php echo $ms->NoSMU;?>"><?php echo $ms->NoSMU;?></option>
                     <?php } ?>
          </select>
          </div>
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <input name="origin" type="text" class="form-control"  id="origin" required="required" readonly="readonly"/>
          </div>
           <strong><label class="col-sm-4"> Destinatioln</label></strong>
          <div class="col-sm-7">
           <input name="desti" type="text" class="form-control"  id="desti" required="required" readonly="readonly" />
          </div>
              
        
          <div class="col-sm-4"></div>
          <div class="col-sm-7">
          <button class="btn btn-blue" id="btns" type="button">Search</button>
          </div>
      </div>             
      </div>
                <!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
        <strong><label class="col-sm-4">ETD</label></strong>
          <div class="col-sm-7">
           <input name="etd" type="text" class="form-control"  id="etd" required="required" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> QTY</label></strong>
          <div class="col-sm-7">
        <input name="qty" type="text" class="form-control"  readonly="readonly" required="required" id="qty"/>
          </div>

           <strong><label class="col-sm-4">  CWT</label></strong>
          <div class="col-sm-7">
           <input name="cwt" type="text" class="form-control" r readonly="readonly" required="required" id="cwt"/>
          </div>


          </div>
                       
            
      </div>
   </div>
</div>
<br style="clear:both;margin-bottom:40px;">
   
   
   <div class="row" id="konten">
  <div class="row" id="contentreplace">
                <div class="col-lg-5 portlets ui-sortable" id="freecontent">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<span class="span3 label label-large label-pink arrowed-in-right">Free House</span>
                                        <table class="table table-striped table-bordered table-hover" id="tabelfree">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>House No</th>
                                                  <th>Shipper</th>
                                                  <th>QTY</th>
                                                  <th>CWT</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($freehouse as $free) {
	 $cwt=$free->CWT;
	 $t_cwt+=$cwt;
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $free->HouseNo?></td>
                                                    <td><?php echo $free->custName?></td>
                                                    <td><?php echo $free->grandPCS?></td>
                                                    <td><div align="right"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center">
 
 
 <button value="<?php echo $free->HouseNo?>" id="ceklish" class="ceklish btn btn-mini btn-success" type="button" onclick="return consol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>
 
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td colspan="3">Total</td>
                                                  <td><div align="right"><?php echo $t_cwt?></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                <div class="col-lg-6 portlets ui-sortable" id="added">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
   <div class="form-group">
   <div class="table-responsive" id="table_responsive">
                                          
<span class="span4 label label-large label-pink arrowed-in-right">Consolidation House added</span>
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>House No</th>
                                                  <th>Shipper</th>
                                                  <th>QTY</th>
                                                  <th>CWT</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($added as $row) {
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $row->HouseNo?></td>
                                                    <td><?php echo $row->custName?></td>
                                                    <td><?php echo $row->grandPCS?></td>
                                                    <td><div align="right"><?php echo $row->CWT?></div></td>
                                                    <td><div align="center">
                                                      <input type="checkbox" name="ck2" class="ace-checkbox-2" />
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td colspan="3">Total</td>
                                                  <td><div align="right"><?php echo $t_cwt?></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
</div>
</div>
      <div class="clearfix clearfx"></div>
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger btn-addnew" href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Process Consol</button>
                                        </div>  </div>     
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
    
<script type="text/javascript">			
	$(window).load(function(){
		$("#loading").fadeOut("slow");
	})

$("#nosmu").change(function(){
            var nosmu = $("#nosmu").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_consol'); ?>",
                data: "nosmu="+nosmu,
                cache:false,
                success: function(data){
                    $('#konten').html(data);
                    //document.frm.add.disabled=false;
                }
            });
 });
$("#nosmu").change(function(){
    var nosmu = $("#nosmu").val();
       $.ajax({
		url: "<?php echo base_url('transaction/getDetailMaster'); ?>",
			dataType: "json",
			type: "POST",
			data: "nosmu="+nosmu,
			success: function(data) {
			 for (var i =0; i<data.length; i++){
				 
				$('#origin').val(data[i].destination);
				$('#desti').val(data[i].origin);
				$('#etd').val(data[i].ETD);
				$('#qty').val(data[i].PCS);
				$('#cwt').val(data[i].CWT);
			 }
			  //$('#test').append(data_table);
			  
			}
		});
 });


   $("#origin").click(function(){
            var filter ='120'// $("#filter").val();
          $.ajax({
            type: "POST",
            url : "<?php echo base_url('transaction/filter_consol'); ?>",
            data: "filter="+filter,
            success: function(data){
               $('#konten').html(data);
             }
         });

        });
function consol_house(myid){
	var house= $(myid).val();
	var smu= $("#nosmu").val();
	if(smu == ''){
		
	alert('Choose Master Number first to consol house !');	
	}
	else {
		
	alert('smu' + smu + 'house' + house);	
	}
	
}


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