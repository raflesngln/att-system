
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
 #etd1,#etd2{font-size:12px;}
 
 </style>
       <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#soadate").datepicker({
		dateFormat:'yy-mm-dd',
		});
$("#etd1").datepicker({
		dateFormat:'yy-mm-dd',
		});
$("#etd2").datepicker({
		dateFormat:'yy-mm-dd',
		});

  });
  </script>

   <div class="container-fluid">
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

                <h3><i class="icon icon-credit-card bigger-150"></i> &nbsp;Statementdd Of Account</h3>
      </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/print_SOA" target="new">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
                       
          <strong><label class="col-sm-4"> SOA No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> SOA Date</label></strong>
          <div class="col-sm-7">
           <input name="soadate" type="text" class="form-control"  id="soadate" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>"/>
          </div>
           
           
              
          <strong><label class="col-sm-4"> Customers</label></strong>
          <div class="col-sm-7">
           <select name="customers" id="customers" class="form-control" required="required">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>
<strong>
<label class="col-sm-4"> E.T.D Periode</label></strong>
          <div class="col-sm-3">
           <input name="etd1" type="text" class="form-control"  id="etd1" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>"/>
          </div>
     <div class="col-sm-1"><p style="margin-top:10px">/</p></div>
    <div class="col-sm-3">
           <input name="etd2" type="text" class="form-control"  id="etd2" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>" />
       </div>
          
 <strong><label class="col-sm-4"> Currency</label></strong>
          <div class="col-sm-7">
            <select name="currency" id="currency" class="form-control">
              <option value="IDR">IDR</option>
              <option value="USD">USD</option>
            </select>
          </div>

          
      </div>             
      
                       
            
      </div>
   </div>
</div>
<br style="clear:both;margin-bottom:40px;">
            <div class="row">
                <div class="col-sm-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_soa">
   <table width="100%" border="1" class="table table-striped table-bordered table-hover">
  <tr>
    <td>No</td>
    <td>Job</td>
    <td>House</td>
    <td>Date</td>
    <td>Origin-Desti</td>
    <td>Weight</td>
    <td>Qty</td>
    <td><div align="center">Amount</div></td>
    <td>Action</td>
    </tr>
   <?php
   foreach($list as $row){
	$amount=$row->Amount;
	$t_amount+=$amount;   
   ?>
  <tr>
    <td>1</td>
    <td><?php echo $row->JobNo;?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo $row->CreateDate;?></td>
    <td><?php echo substr($row->ori,0,15).' - ';?><?php echo substr($row->desti,0,15);?></td>
    <td><?php echo $row->GrossWeight;?></td>
    <td><?php echo $row->PCS;?></td>
    <td><div align="right"><?php echo number_format($row->Amount,0,'.','.');?></div></td>
    <td>&nbsp;</td>
    </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="6"><div align="right"><label style="color:#06C">TOTAL</label></div></td>
    <td>&nbsp;</td>
    <td><div align="right"><label style="color:#06C">Rp. <?php echo number_format($t_amount,0,'.','.');?></label></div></td>
    <td>&nbsp;</td>
    </tr>
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
                                             <button class="btn btn-primary"><i class="icon-refresh bigger-160 icons">&nbsp;</i> Process SOA</button>
                                        </div>  </div>     
              </div>
          </div>
      </div>
</div>
      </form>
  </div>
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
<!--adding form-->

<script type="text/javascript">			
	$(window).load(function(){
		$("#loading").fadeOut("slow");
	})
	
$("#customers").change(function(){
            var idcust = $("#customers").val();
			var etd1 = $("#etd1").val();
			var etd2 = $("#etd2").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_soa'); ?>",
 				data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2,

                success: function(data){
                    $('#table_soa').html(data);
                }
            });
        });
	 $("#etd1").change(function(){
            var idcust = $("#customers").val();
			var etd1 = $("#etd1").val();
			var etd2 = $("#etd2").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_soa'); ?>",
 				data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2,

                success: function(data){
                    $('#table_soa').html(data);
                }
            });
        });
	 $("#etd2").change(function(){
            var idcust = $("#customers").val();
			var etd1 = $("#etd1").val();
			var etd2 = $("#etd2").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_soa'); ?>",
 				data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2,

                success: function(data){
                    $('#table_soa').html(data);
                }
            });
        });
</script>