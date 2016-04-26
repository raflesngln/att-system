
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
  $("#tgl").datepicker({
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
<form method="post" action="<?php echo base_url()?>transaction/insert_consol">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<div class="form-group">                     
          <strong><label class="col-sm-4">Date</label></strong>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required="required" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return filterDate()"/>
          </div>
 </div>
<div class="form-group">                     
          <strong><label class="col-sm-4">Destination</label></strong>
          <div class="col-sm-7">
           <select name="destination" class="form-control" required="required" id="destination" onchange="return filterDestination()">
           <option value="">Select Destination </option>
      <?php foreach($desti as $data){
		  ?>
          <option value="<?php echo $data->portcode;?>"><?php echo $data->desti.' - '.$data->portcode;?></option>
          <?php } ?>
          </select>
          </div>
 </div>
 <div class="form-group">                     
          <strong><label class="col-sm-4">Status SMU</label></strong>
          <div class="col-sm-7">
           <select name="status_smu" class="form-control" required="required" id="status_smu">
           <option value="">Select Status </option>
           
          <option value="1">Empty SMU</option>
		  <option value="2">Has House</option>
          </select>
          </div>
 </div>
  <div class="form-group">                     
          <strong><label class="col-sm-4"> SMU No</label></strong>
          <div class="col-sm-7">
           <select name="nosmu" class="form-control" required="required" id="nosmu" onchange="return getDetailSMU(this);">
			<option value=""></option>
          </select>
          </div>
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
           <input name="cwt" type="text" class="form-control" readonly="readonly" required="required" id="cwt"/>
          </div>

           <strong><label class="col-sm-4">Limit  CWT</label></strong>
          <div class="col-sm-7">
           <input name="limitcwt" type="text" class="form-control" readonly="readonly" required="required" id="limitcwt"/>
          </div>
          
          </div>
                       
            
      </div>
   </div>
</div>
<br style="clear:both;margin-bottom:40px;">
   
   
   <div class="container-fluid" id="konten">
  <div class="row" id="contentreplace">
  <div class="col-sm-6 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">

                                        <table class="freetable table table-nostriped table-nobordered table-hover" id="freetable">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="6"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Free House</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>PCS</th>
                                                  <th>CWT</th>
                                                  <th>Consoled CWT</th>
                                                  <th>Remain CWT</th>
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
                                                    <td><?php echo $free->HouseNo?></td>
                                                    <td><?php echo $free->PCS?></td>
                                                    <td><?php echo $free->CWT?></td>
                                                    <td><?php echo $free->ConsoledCWT?></td>
                                                    <td><?php echo $free->RemainCWT?></td>
                                                    <td>
<button class="move_consol btn btn-mini btn-primary" type="button" value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS.'/'.$free->ConsoledCWT.'/'.$free->RemainCWT;?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
 </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                   </tbody>
               								 <tfoot>
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"><label id="pcsfree"><?php //echo $t_cwt?></label></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                             </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                <div class="col-sm-6 portlets ui-sortable" id="added">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
   <div class="form-group">
   <div class="table-responsive" id="table_responsive">
                                          

                  <table class=" tablehas table table-striped table-bordered table-hover addedtable" id="tablehas" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="6"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Remain House in SMU</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
                                                  <th class="text-center">Consoled</th>
                                                  <th class="text-center">Remain</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($added as $row) {
	 $cwt2=$row->CWT;
	 $t_cwt2+=$cwt2;
  ?>
                                                  <tr class="addedtable-tr">
                                                    <td><?php echo $row->HouseNo?>
                                                    <input type="text" name="house[]" id="house[]" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="text" name="cwt2[]" id="cwt2[]" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="text" name="pcs[]" id="pcs[]" /></td>
                                                    <td>&nbsp;</td>
                                                    <td>&nbsp;</td>
                                                    <td>
                                                    <button value="<?php echo $row->HouseNo.'/'.$row->CWT.'/'.$row->PCS.'/'.$row->ConsoledCWT.'/'.$row->RemainCWT;?>" id="ceklish" class="ceklish btn btn-mini btn-success" type="button" onclick="return reconsol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>
                                                    

                                                    </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  

                                              </tbody>
 <tfoot>
 <tr style="background-color:#F5F5F5" class="addedtable-tr">
                                                  <td>&nbsp;</td>
                                                  <td><input type="text" class="totcwt" value="0" name="totcwt" style="width:50px" />                                                    <?php echo $t_cwt2?></td>
                              <td><input type="text" class="totpcs" value="0" name="totpcs" style="width:50px" />                                <?php echo $t_cwt2?></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                      </tr>
</tfoot>   
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
                          <input type="text" name="id" id="id" value="<?php echo $row->discCode;?>" />
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
<div id="customcwt" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h2 align="center">CWT out space !</h2>
     
            </div>
            <div class="smart-form scroll">
    
                    <div class="modal-body">
                     
 <h4 style="color:#999">CWT is too large or SMU is full,please input the available space in SMU</h4>   
  <div class="clearfix"></div>       

<div class="form-group">  
  <span class="span2">House</span>  
  <span class="span3"><input name="txthouse" type="text" class="form-control" placeholder="" id="txthouse" max="" min="1"/>
  </span>

 </div> <div class="clearfix"></div>
 
 
 
 <div class="clearfix"></div>
 <div class="form-group">  
  <span class="span2">CWT</span>  
  <span class="span3"><input name="txtcwt" type="text" class="form-control" placeholder="" id="txtcwt" max="" min="1"/>
  </span>
<label class="span3" id="labelremain">Of remain cwt </label>

<span class="span2">Available cwt</span>
 <span class="span2">
 <input name="remaintxtcwt" type="text" class="form-control" placeholder="" id="remaintxtcwt" readonly="readonly" /></span>
 </div>
                      
   <div class="clearfix"></div>
<div class="form-group">
<label class="span2">PCS </label>
   <div class="col-sm-5"><span class="controls">
 <input name="leftpcs[]" type="text" class="form-control" placeholder="" id="txtpcs" />
</span></div>
 
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
<label class="span2">Consoled </label>
   <div class="col-sm-5"><span class="span8">
     <input name="leftconsoled[]" type="text" class="form-control" placeholder="" id="txtconsol"/>
   </span></div>
 
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
<label class="span2">Remain </label>
   <div class="col-sm-5"><span class="controls">
 <input name="leftremain[]" type="text" class="form-control" placeholder="" id="txtremain" />
</span></div>
 
                        <div class="clearfix"></div>
                      </div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
      <button class="btn btn-primary" id="btninsert" onclick="return move_consol2()"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
                    </div>
            
            </div>
        </div>
    </div>
    </div>
    
<script type="text/javascript">			 
$("#status_smu").change(function(){
    var tgl = $("#tgl").val();
	var destination = $("#destination").val();
	var status_smu = $("#status_smu").val();
     $.ajax({
	url: "<?php echo base_url('transaction/getsubMaster');?>",
			//dataType: "json",
			type: "POST",
			data: "tgl="+tgl+"&destination="+destination+"&status_smu="+status_smu,
			success: function(data) {
				$('#nosmu').html(data);
				
				$('#origin').val('');
				$('#desti').val('');
				$('#etd').val('');
				$('#qty').val('');
				$('#cwt').val('');
				$('#limitcwt').val('');
				$('.addedtable-tr').remove();	
			}
		});
 });
function filterDate(){
	var tgl = $("#tgl").val();
	var destination = $("#destination").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_date'); ?>",
				data: "tgl="+tgl+"&destination="+destination,
                cache:false,
                success: function(data){
                    $('#konten').html(data);
                    //document.frm.add.disabled=false;
                }
            });
}
function filterDestination(){
	var tgl = $("#tgl").val();
	var destination = $("#destination").val();
	var nosmu = $("#nosmu").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_desti'); ?>",
				data: "tgl="+tgl+"&destination="+destination+"&nosmu="+nosmu,
                cache:false,
                success: function(data){
                    $('#konten').html(data);
                    //document.frm.add.disabled=false;
                }
            });
}

$("#nosmu").change(function(){
	var tgl = $("#tgl").val();
	var destination = $("#destination").val();
    var nosmu = $("#nosmu").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_consol'); ?>",
				data: "tgl="+tgl+"&destination="+destination+"&nosmu="+nosmu,
                cache:false,
                success: function(data){
                    $('#konten').html(data);
                    //document.frm.add.disabled=false;
                }
            });
 });
function getDetailSMU(myid){
    var nosmu = $(myid).val();
	var smu=$("#nosmu").val();
       $.ajax({
		url: "<?php echo base_url('transaction/getDetailMaster'); ?>",
			dataType: "json",
			type: "POST",
			data: "nosmu="+nosmu+"&smu="+smu,
			success: function(data) {
			 for (var i =0; i<data.length; i++){
				 
				$('#origin').val(data[i].destination);
				$('#desti').val(data[i].origin);
				$('#etd').val(data[i].ETD);
				$('#qty').val(data[i].PCS);
				$('#cwt').val(data[i].CWT);
				$('#limitcwt').val(data[i].limitcwt);
			 }
			  //$('#test').append(data_table); 
			}
		});
}
function consol_house(myid){
		var input=$(myid).val();
		var pecah=input.split('/');
		
	var house= pecah[0];
	var cwt= pecah[1];
	var pcs= pecah[2];
	var nosmu= $("#nosmu").val();
	if(nosmu == ''){
	
	alert('Choose Master Number first to consol house !');
		$('#origin').val('');
		$('#desti').val('');
		$('#etd').val('');
		$('#qty').val('');
		$('#cwt').val('');	
	}
	else {
		
	 $.ajax({
         type: "POST",
         url : "<?php echo base_url('transaction/insert_consol'); ?>",
         data: "house="+house+"&nosmu="+nosmu+"&cwt="+cwt+"&pcs="+pcs,
         success: function(data){
         $('#konten').html(data);
		 getDetailSMU(myid);
          }
       });
	}
	
}

function reconsol_house(myid){
		var input=$(myid).val();
		var pecah=input.split('/');
		
	var house= pecah[0];
	var cwt= pecah[1];
	var pcs= pecah[2];
	var nosmu= $("#nosmu").val();
	if(nosmu == ''){
	
	alert('Choose Master Number first to consol house !');
		$('#origin').val('');
		$('#desti').val('');
		$('#etd').val('');
		$('#qty').val('');
		$('#cwt').val('');	
	}
	else {
		
	 $.ajax({
         type: "POST",
         url : "<?php echo base_url('transaction/edit_consol'); ?>",
         data: "house="+house+"&nosmu="+nosmu+"&cwt="+cwt+"&pcs="+pcs,
         success: function(data){
         $('#konten').html(data);
		 getDetailSMU(myid);
                }
            });
	}	
}
<!-- hapus item dan kurangi total items pack
function move_consol(myid){
		var nosmu = $("#nosmu").val();	
		var input = $(myid).val();
		var totcwt=$(".totcwt").val();
		var totpcs=$(".totpcs").val();

		var pecah=input.split('/');
		var house=pecah[0];
		var cwt=pecah[1];
		var pcs=pecah[2];
		var consoled=pecah[3];
		var remain=pecah[4];
		
		var new_cwt=parseFloat(totcwt)+ parseFloat(cwt);
		var limit=$("#limitcwt").val();
		var selisih=parseFloat(limit)- parseFloat(totcwt);
		var sisacwt=parseFloat(cwt)- parseFloat(selisih);
		
		var new_pcs=parseFloat(totpcs)+ parseFloat(pcs);
		
if(nosmu ==''){
	alert('SMU is not selected,Please Select First !');
} else {
	
	if(new_cwt > limit){
			$("#customcwt").modal('show');
			
			$("#remaintxtcwt").val(selisih);
			$("#txtcwt").val(selisih);
			$("#labelremain").html('Of <label class="badge badge-warning badge-large white"> '+ cwt+ '</label>');
			$("#txtpcs").val(pcs);
			$("#txthouse").val(house);
			$("#txtconsol").val(consoled);
			$("#txtremain").val(remain);
			
			
		} else {
			
		var zsts=2	
	     var righthouse=document.getElementsByName('righthouse[]');
        var rightcwt=document.getElementsByName('rightcwt[]');
		var rightpcs=document.getElementsByName('rightpcs[]');
		var rightconsoled=document.getElementsByName('rightconsoled[]');
		var rightremain=document.getElementsByName('rightremain[]');
        for(i=0; i < righthouse.length; i++)  {  
		  
            if(righthouse[i].value==house){
				var zsts=1;
                rightcwt[i].value=parseFloat(rightcwt[i].value) + parseFloat(cwt);
				rightpcs[i].value=parseFloat(rightpcs[i].value) + parseFloat(pcs);
				rightconsoled[i].value=parseFloat(rightconsoled[i].value) - parseFloat(cwt);
				rightremain[i].value=parseFloat(rightremain[i].value) + parseFloat(cwt);
				i=lefthouse.length+1;
            } else{
				var zsts=2
				}
			
			} 

			if(zsts==2){
					text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="righthouse[]" id="idcharge[]" value="'+ house +'">'+ '<label id="l_pcs">'+ house +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="rightcwt[]" id="t[]" value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="rightpcs[]" id="p[]"  value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + input +'" onclick="replaceHouse(this)" type="button">X</button></td>'

    + '</tr>';
			
			}
	
		$('.tablehas').append(text);
		var grand=parseFloat(totcwt) + parseFloat(cwt);
		$(".totcwt").val(grand); 
		var grand2=parseFloat(totpcs) + parseFloat(pcs);
		$(".totpcs").val(grand2);
		//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
		}
	}
}

function move_consol2(){
		var nosmu = $("#nosmu").val();	
		var totcwt=$(".totcwt").val();
		var totpcs=$(".totpcs").val();

		var house=$("#txthouse").val();
		var remaincwt=$("#remaintxtcwt").val();
		var cwt=$("#txtcwt").val();
		var pcs=$("#txtpcs").val();
		var consoled=$("#txtconsol").val();
		var remain=$("#txtremain").val();
		
	var input=house+'/'+cwt+'/'+pcs+'/'+consoled+'/'+remain;
		
		var new_cwt=parseFloat(totcwt)+ parseFloat(cwt);
		var limit=$("#limitcwt").val();
		var selisih=parseFloat(limit)- parseFloat(totcwt);
		var sisacwt=parseFloat(cwt)- parseFloat(selisih);
		
		var new_pcs=parseFloat(totpcs)+ parseFloat(pcs);

if(remaincwt <=0){
	alert('SMU is Full, Choose another SMU !');
	return false;
	}
if(nosmu ==''){
	alert('SMU is not selected,Please Select First !');
} else {
	
		var lefthouse=document.getElementsByName('lefthouse[]');
        var leftcwt=document.getElementsByName('leftcwt[]');
		var leftpcs=document.getElementsByName('leftpcs[]');
		var leftconsoled=document.getElementsByName('leftconsoled[]');
		var leftremain=document.getElementsByName('leftremain[]');
		
        for(i=0; i < lefthouse.length; i++)  {
		    
            if(lefthouse[i].value==house){
				
                leftcwt[i].value=parseFloat(leftcwt[i].value) - parseFloat(cwt);
				leftpcs[i].value=parseFloat(leftpcs[i].value) - parseFloat(pcs);
				leftconsoled[i].value=parseFloat(leftconsoled[i].value) + parseFloat(cwt);
				leftremain[i].value=parseFloat(leftremain[i].value) - parseFloat(cwt);
            }
		}
	
	
	var zsts=2	
	     var righthouse=document.getElementsByName('righthouse[]');
        var rightcwt=document.getElementsByName('rightcwt[]');
		var rightpcs=document.getElementsByName('rightpcs[]');
		//var rightconsoled=document.getElementsByName('rightconsoled[]');
		//var rightremain=document.getElementsByName('rightremain[]');
		
        for(a=0; a < righthouse.length; a++)  { 
		//alert('jika '+righthouse[a].value+'='+house); 
            if(righthouse[a].value==house){
				var zsts=1;
                rightcwt[a].value=parseFloat(rightcwt[a].value) + parseFloat(cwt) ;
				rightpcs[a].value=parseFloat(rightpcs[a].value) + parseFloat(pcs);
				//rightconsoled[i].value=parseFloat(rightconsoled[i].value) - parseFloat(cwt);
				//rightremain[i].value=parseFloat(rightremain[i].value) + parseFloat(cwt);
				a=lefthouse.length+1;
            } else{
				var zsts=2;
				}
			
			} 

			if(zsts==2){
					text='<tr class="gradeX">'
    + '<td>' + '<input type="text" name="righthouse[]" id="idcharge[]" value="'+ house +'"></td>'
	
    + '<td align="right">' +  '<input type="text" name="rightcwt[]" id="t[]" value="'+ cwt +'" style=" width:80px"></td>'
    
    + '<td align="right">' + '<input type="text" name="rightpcs[]" id="p[]"  value="'+ pcs +'" style=" width:80px"></td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + input +'" onclick="replaceHouse(this)" type="button">X</button></td>'

    + '</tr>';
			$('.tablehas').append(text);
			}
				

		var grand=parseFloat(totcwt) + parseFloat(cwt);
		$(".totcwt").val(grand); 
		var grand2=parseFloat(totpcs) + parseFloat(pcs);
		$(".totpcs").val(grand2);
		$("#customcwt").modal('hide');

		
	}
}

function replaceHouse(myid){
		//var zsts=2;
		var input = $(myid).val();
		
		var pecah=input.split('/');
		var house=pecah[0];
		var cwt=pecah[1];
		var pcs=pecah[2];
		var consoled=pecah[3];
		var remain=pecah[4];
		
		var totcwt=$(".totcwt").val();
		var totpcs=$(".totpcs").val();
		var kurangcwt=parseFloat(totcwt) - parseFloat(cwt);
		var kurangpcs=parseFloat(totpcs) - parseFloat(pcs);
		
        var lefthouse=document.getElementsByName('lefthouse[]');
        var leftcwt=document.getElementsByName('leftcwt[]');
		var leftpcs=document.getElementsByName('leftpcs[]');
		var leftconsoled=document.getElementsByName('leftconsoled[]');
		var leftremain=document.getElementsByName('leftremain[]');
        for(i=0; i < lefthouse.length; i++)  {  
		
	//	alert(lefthouse[i].value+'='+house)
		  
            if(lefthouse[i].value==house){
				var zsts=1;
                leftcwt[i].value=parseFloat(leftcwt[i].value) + parseFloat(cwt);
				leftpcs[i].value=parseFloat(leftpcs[i].value) + parseFloat(pcs);
				leftconsoled[i].value=parseFloat(leftconsoled[i].value) - parseFloat(cwt);
				leftremain[i].value=parseFloat(leftremain[i].value) + parseFloat(cwt);
				i=lefthouse.length+1;
            } else{
				var zsts=2
				}
			
			} 
			
			if(zsts==2){	
		text='<tr class="gradeX">'
			+ '<td><input type="text" name="lefthouse[]" style=" width:150px"  value="'+ house +'"></td>'
			
		+ '<td align="right"><input type="text" name="leftcwt[]" style=" width:50px" value="'+ cwt +'"></td>'
		
		+ '<td align="right"><input type="text" name="leftpcs[]" style=" width:50px" value="'+ pcs +'"></td>'
			
		+ '<td align="right"><input type="text" name="leftconsoled[]" style=" width:50px" value="'+ consoled +'"></td>'
			
			+ '<td align="right"><input type="text" name="leftremain[]" style=" width:50px" value="'+ remain +'"></td>'
		
			+'<td align="center">' + '<button class="btndel btn-primary btn-mini" value="' + input +'" onclick="move_consol(this)" type="button"><i class="fa fa-check"></i></button></td>'
		
			+ '</tr>';
				$('.freetable').append(text)
			}				 
				 $(".totcwt").val(kurangcwt);
				 $(".totpcs").val(kurangpcs);
				 t = $(myid);
				 tr = t.parent().parent();
				 tr.remove();
        
    }
	
function replace_consol(myid){
		var input = $(myid).val();	
		var totcwt=$(".totcwt").val();
		var totpcs=$(".totpcs").val();
		
		var pecah=input.split('/');
		var house=pecah[0];
		var cwt=pecah[1];
		var pcs=pecah[2];
		var consoled=pecah[3];
		var remain=pecah[4];	

	text='<tr class="gradeX">'
    + '<td>' + '<input type="text" name="lefthouse[]" id="idcharge[]" value="'+ house +'">'+ '<label id="l_pcs">'+ house +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="text" name="leftcwt[]" id="t[]" value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="text" name="leftpcs[]" id="p[]"  value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'
	
    + '<td align="right">' + '<input type="text" name="leftconsoled[]" id="p[]"  value="'+ consoled +'">'+ '<label id="l_pcs">'+ consoled +'</label>' +'</td>'
	
    + '<td align="right">' + '<input type="text" name="leftremain[]" id="p[]"  value="'+ remain +'">'+ '<label id="l_pcs">'+ remain +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-primary btn-mini" value="' + input +'" onclick="move_consol(this)" type="button"><i class="fa fa-check"></i></button></td>'

    + '</tr>';
	
		$('.freetable').append(text);
		var grand=parseFloat(totcwt) - parseFloat(cwt);
		$(".totcwt").val(grand); 
		var grand2=parseFloat(totpcs) - parseFloat(pcs);
		$(".totpcs").val(grand2);
		
//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}


</script>