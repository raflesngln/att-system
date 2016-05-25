  <script>
  $(function() {
	$("#etd1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#etd2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl3").datepicker({
		dateFormat:'yy-mm-dd',
		});
	

  });
  
  </script>

   <div class="container-fluid">
    <div class="row-fluid">
  
      <div class="header col-md-11">

     <h3><i class="icon icon-credit-card bigger-150"></i> Statement Of Account</h3>
      </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/print_SOA" target="new">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
                       
<!--          <strong><label class="col-sm-4"> SOA No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>-->
          
          <strong><label class="col-sm-3"> SOA Date</label></strong>
          <div class="col-sm-7">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
           <input name="soadate" type="text" class="form-control"  id="soadate" required readonly value="<?php echo $kurangtanggal ;?>"/>
          </div>
           
           
              
          <strong><label class="col-sm-3"> Customers</label></strong>
          <div class="col-sm-7">
           <select name="customers" id="customers" class="form-control" required="required" onchange="return filter_soa()">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>

<div class="form-group">
<label class="col-sm-3"> E.T.D Periode</label>
          <div class="col-sm-4">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-30,date("Y")));
?>
           <input name="etd1" type="text" class="form-control"  id="etd1" required readonly value="<?php echo $kurangtanggal ;?>" onchange="return filter_soa()" />
          </div>
    <span class="col-sm-1">/</span>
    <div class="col-sm-4">
           <input name="etd2" type="text" class="form-control"  id="etd2" required readonly value="<?php echo date("Y-m-d") ;?>" onchange="return filter_soa()"/>
       </div>
</div>

<div class="clearfix"></div>          
 <strong><label class="col-sm-3"> Currency</label></strong>
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
 <thead>
  <tr>
    <td width="6%">No</td>
    <td width="8%">Date</td>
    <td width="8%">SMU</td>
    <td width="8%">House</td>
    <td width="16%">Origin-Desti</td>
    <td width="5%">Qty</td>
    <td width="5%">CWT</td>
    <td width="10%"><div align="center">Amount</div></td>
    <td width="10%">Balance</td>
    </tr>
    </thead>
   <?php
   foreach($list as $row){
	$amount=$row->Amount;
	$t_amount+=$amount;  
	$RemainAmount=$row->RemainAmount;
	$t_RemainAmount+=$RemainAmount;   
   ?>
  <tr>
    <td>1</td>
    <td><?php echo date('d-m-Y',strtotime($row->CreateDate));?></td>
    <td><?php echo $row->NoSMU;?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo substr($row->ori,0,15).' - ';?><?php echo substr($row->desti,0,15);?></td>
    <td><div align="right"><?php echo $row->PCS;?></div></td>
    <td><div align="right"><?php echo $row->CWT;?></div></td>
    <td><div align="right"><?php echo number_format($row->Amount,0,'.','.');?></div></td>
    <td><div align="right"><?php echo number_format($row->RemainAmount,0,'.','.');?></div></td>
  </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="6"><div align="right"><label style="color:#06C">TOTAL</label></div></td>
    <td>&nbsp;</td>
    <td><div align="right"><label style="color:#06C">Rp. <?php echo number_format($t_amount,0,'.','.');?></label></div></td>
    <td><div align="right"><label style="color:#06C">Rp. <?php echo number_format($t_RemainAmount,0,'.','.');?></label></div></td>
    </tr>
</table>

                                        </div>
                                    </div>
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        
                                         <div class="col-md-4">
                                             <button class="btn btn-primary"><i class="icon-print bigger-160 icons">&nbsp;</i> Print SOA</button>
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
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required><?php echo $row->Remarks;?></textarea>
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
	
function filter_soa(){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
		
            var idcust = $("#customers").val();
			var etd1 = $("#etd1").val();
			var etd2 = $("#etd2").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_soa'); ?>",
 				data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2,

                success: function(data){
					swal.close();
                    $('#table_soa').html(data);
                }
            });
}



</script>