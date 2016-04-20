
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
          <strong><label class="col-sm-4">Status SMU</label></strong>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required="required" readonly="readonly" value="<?php echo date('Y-m-d');?>"/>
          </div>
 </div>
<div class="form-group">                     
          <strong><label class="col-sm-4">Destination</label></strong>
          <div class="col-sm-7">
           <select name="destination" class="form-control" required="required" id="destination">
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
<span class="span3 label label-large label-warning ">Free House</span>
                                        <table class="freetable table table-nostriped table-nobordered table-hover" id="freetable">
                                              <thead>
                                                
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>Shipper-Consigne</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
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
                                                    <td><?php echo substr($free->sender,0,10).'-'.substr($free->receiver,0,10)?></td>
                                                    <td><?php echo $free->CWT?></td>
                                                    <td><?php echo $free->PCS?></td>
                                                    <td>
 
 
 <button style="display:none" value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-primary" type="button" onclick="return consol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>

<button class="move_consol btn btn-mini btn-primary" type="button" value="<?php echo $free->HouseNo.'/'.$free->sender.'/'.$free->CWT.'/'.$free->PCS;?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
 </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                   </tbody>
               								 <tfoot>
                                                  <tr style="background-color:#F5F5F5">
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
                                          
<span class="span4 label label-large label-warning">Remain House in Master</span>
                  <table class=" tablehas table table-striped table-bordered table-hover addedtable" id="tablehas" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>Shipper-COnsigne</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
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
                                                    <input type="hidden" name="house[]" id="house[]" /></td>
                                                    <td><?php echo substr($row->sender,0,10).'-'.substr($row->receiver,0,10)?>
                                                    <input type="hidden" name="shipper[]" id="shipper[]" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="hidden" name="cwt2[]" id="cwt2[]" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="hidden" name="pcs[]" id="pcs[]" /></td>
                                                    <td>
                                                    <button value="<?php echo $row->HouseNo.'/'.$row->CWT.'/'.$row->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-success" type="button" onclick="return reconsol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>
                                                    

                                                    </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  

                                              </tbody>
 <tfoot>
 <tr style="background-color:#F5F5F5" class="addedtable-tr">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><input type="text" class="totcwt" value="0" name="totcwt" style="width:50px" />                                                    <?php echo $t_cwt2?></td>
                              <td><input type="text" class="totpcs" value="0" name="totpcs" style="width:50px" />                                <?php echo $t_cwt2?></td>
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
		var shipper=pecah[1];
		var cwt=pecah[2];
		var pcs=pecah[3];
		
		var new_cwt=parseFloat(totcwt)+ parseFloat(cwt);
		var limit=$("#limitcwt").val();
		
if(nosmu ==''){
	alert('SMU is not selected,Please Select First !');
} else {
	
	if(new_cwt > limit){
			alert('Limit SMU is reached. Please another SMU to consol');
		} else {
			
		text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="house[]" id="idcharge[]" value="'+ house +'">'+ '<label id="l_pcs">'+ house +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="shipper[]" id="l[]" value="'+ shipper +'">'+ '<label id="l_pcs">'+ shipper +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="cwt2[]" id="t[]" value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="pcs[]" id="p[]"  value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + input +'" onclick="replace_consol(this)" type="button">X</button></td>'

    + '</tr>';
	
	
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

function replace_consol(myid){
var input = $(myid).val();
var totcwt=$(".totcwt").val();
var totpcs=$(".totpcs").val();

		var pecah=input.split('/');
		var house=pecah[0];
		var shipper=pecah[1];
		var cwt=pecah[2];
		var pcs=pecah[3];

	text='<tr class="gradeX">'

    + '<td>' + '<input type="hidden" name="house2[]" id="idcharge[]" value="'+ house +'">'+ '<label id="l_pcs">'+ house +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="shipper2[]" id="l[]" value="'+ shipper +'">'+ '<label id="l_pcs">'+ shipper +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="cwt3[]" id="t[]" value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="pcs2[]" id="p[]"  value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'

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