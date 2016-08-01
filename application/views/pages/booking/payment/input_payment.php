 <style>
 .select2{
	 padding-bottom:3px;
	 padding-top:2px;
 }
 </style>
 
 <link href="<?php echo base_url();?>asset/select2/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url();?>asset/select2/js/select2.min.js"></script>
        
  <script>
  $(function() {
	$("#periode1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#periode2").datepicker({
		dateFormat:'yy-mm-dd',
		});


  });
  
  </script>

   <div class="container-fluid">
    <div class="row-fluid">
  
<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-bar-chart"></i></div>
     <div class="col-sm-9 col-xs-8">Input Cash / Bank in</div>
</div>
</div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>payment/process_payment" id="myform" onsubmit="return konfirmasi()" class="myform"  name="myform" target="new">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
<div class="form-group"> 
          <label class="col-sm-3"> No Jurnal</label>
          <div class="col-sm-7">
           <input name="jurnalno" type="text" class="form-control"  id="jurnalno" required readonly/>
          </div>
</div>
<div class="form-group"> 
          <label class="col-sm-3"> Date</label>
          <div class="col-sm-7">
           <input name="paymentdate" type="text" class="form-control"  id="paymentdate" required readonly value="<?php echo date("Y-m-d") ;?>"/>
          </div>
</div>
   

 <div class="form-group">             
          <label class="col-sm-3"> Customers<sup class="must"> *</sup></label>
          <div class="col-sm-7">
           <select name="paymentcustomers" id="paymentcustomers" class="form-control select2" required="required" onchange="return filter_payment()">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>
</div>
<div class="form-group">
 <label class="col-sm-3"> E.T.D Periode<sup class="must"> *</sup></label></strong>
          <div class="col-sm-3">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-30,date("Y")));
?>
           <input name="periode1" type="text" class="form-control"  id="periode1" required readonly value="<?php echo $kurangtanggal ;?>" onchange="return filter_payment()"/>
          </div>
     <div class="col-sm-1"><p style="margin-top:10px">/</p></div>
    <div class="col-sm-3">
           <input name="periode2" type="text" class="form-control"  id="periode2" readonly value="<?php echo date("Y-m-d") ;?>" onchange="return filter_payment()"/>
       </div>
</div>
<div class="clearfix"></div> 
 
<div class="form-group"> 
          <label class="col-sm-3"> Total Payment<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <input name="payment" type="text" class="form-control"  id="payment" required="required" onkeyup="return countBalance()" onkeypress="return isNumberKey(event)" value="0" />
         
          </div>
 <label class="col-sm-12 text-center" id="labelpay"></label>
</div>



<div class="clearfix"></div>    

          
      </div>             
      
 
<!-- RIGHT SIDE -->
   <div class="col-sm-6">      

<div class="form-group"> 
          <label class="col-sm-3"> Currency<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <select name="paymentcurrency" id="paymentcurrency" class="form-control">
              <option value="IDR">IDR</option>
              <option value="USD">USD</option>
            </select>
          </div>
</div>
<div class="form-group"> 
          <label class="col-sm-3"> Ex.Rate</label>
          <div class="col-sm-7">
           <input name="rate" type="text" class="form-control"  id="rate" required readonly/>
          </div>
</div>
       
<div class="clearfix"></div> 
 

<div class="form-group"> 
          <label class="col-sm-3"> Account<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <select name="accountheader" id="accountheader" class="form-control select2" required="required">
      <option value="">Select account</option>
          <?php foreach ($account_header as $acc) {
          ?>
          <option value="<?php echo $acc->kdac;?>"><?php echo $acc->nmac.' ('.$acc->kdac.')';?></option>
          <?php } ?>
          </select>
    </select>
        
          </div>
</div>

<div class="form-group"> 
          <label class="col-sm-3"> Remarks</label>
          <div class="col-sm-7">
            <textarea name="remarks" rows="5"  class="form-control" id="remarks"></textarea>
          </div>
</div>


<div class="clearfix"></div>    

          
      </div>                
<!-- END OF RIGHT -->       
   </div>
</div>
<br style="clear:both;margin-bottom:40px;">
            <div class="row">
                <div class="col-sm-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_payment">
 

   <table width="100%" border="1" class="table table-striped table-bordered table-hover">
<thead>
  <tr>
    <td width="3%" height="32">No</td>
    <td width="8%">Account</td>
    <td width="8%">SMU</td>
    <td width="10%">House</td>
    <td width="11%">ETD</td>
    <td width="9%">Origin-Dest.</td>
    <td width="7%">Qty</td>
    <td width="8%">CWT</td>
    <td width="9%">Amount</td>
    <td width="9%">Balance</td>
    <td width="9%">&nbsp;</td>
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
    <td>Account</td>
    <td><?php echo $row->NoSMU;?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo date('d-m-Y',strtotime($row->ETD));?></td>
    <td><?php echo substr($row->Origin,0,15).' - ';?><?php echo substr($row->Destination,0,15);?></td>
    <td>
    <div align="right"><?php echo $row->PCS;?></div></td>
    <td>
      <div align="right"><?php echo $row->CWT;?></div>
    <div align="right"></div></td>
    <td><div align="right"><?php echo number_format($row->Amount,0,'.','.');?></div></td>
    <td><div align="right"><?php echo number_format($row->RemainAmount,0,'.','.');?></div>      <label for="pay[]"></label></td>
    <td>&nbsp;</td>
    </tr>
    
    <?php } ?>
  </table>

                                        </div>
                                    </div>
                     
<div class="cpl-sm-12">
                                
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                       
                                         <div class="col-md-2">
           <button style="display:none" id="btnProcess" class="btn btn-primary"><i class="icon-refresh bigger-160 icons">&nbsp;</i> Process Payment</button>
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
$("#myform").submit(function(e) {
    reloadIncome();
	 reloadPayment();
});


function toRp(angka){
  //var angka =document.getElementById("rp").value;
    var rev     = parseFloat(angka, 10).toString().split('').reverse().join('');
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

function ubahRP(myid){
	var payment=$("#payment").val();
	if(payment==''){	
	$("#labelpay").html('Rp. 0');
	} else {
	$("#labelpay").html('Rp. '+toRp(payment));
	}
	
}

function filter_payment(){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
		
            var idcust = $("#paymentcustomers").val();
			var etd1 = $("#periode1").val();
			var etd2 = $("#periode2").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/filter_payment'); ?>",
 				data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2,

                success: function(data){
					swal.close();
					$("#table_payment").show();
					$("#btnProcess").show();
                    $('#table_payment').html(data);
					countBalance();
                }
            });
}

function konfirmasi(){
	 
	var payment=document.getElementById("payment").value;
    var a=confirm("Are You Sure To Processing Data ?");
	if(a===true){

	var chk= $(".ceklis:checked");
	if(chk.length <=0 || payment <=0){
	swal("Warning !","Please Select ( Check ) house and Payment value grather than 0 ","error");
	$("#payment").focus();
	return false;
	} else {
	  swal.close();	
	 $("#table_payment").hide();
	 $("#btnProcess").hide();
	 
	}
		} else {
	
	swal("Warning !","Confirmation was Canceled","warning");	
	return false;
	}
	
}

$("#paymentcurrency").change(function() {
    var currency=$("#paymentcurrency").val();
	if(currency=="IDR"){
		document.getElementById("rate").readOnly=true;
	} else {
		document.getElementById("rate").readOnly=false;
		$("#rate").focus();
	}
});

function hitung_bayar(){
	var payment=$("#payment").val();
	
  var nomorhouse=document.getElementsByName('lastbalance[]').checked=true;
  var balance=document.getElementsByName('balance[]');
        for(i=0; i < nomorhouse.length; i++)  {  

		alert(nomorhouse[i].value+ ' dan sisa adalah  '+ balance[i].value);
		console.log(nomorhouse[i].value+ ' dan sisa adalah  '+ balance[i].value);
	}
}


function countBalance() {
    var payment=document.getElementById("payment").value;
    var lastbalance =document.getElementsByName('lastbalance[]');
     var paid =document.getElementsByName('paid[]');
    var newbalance =document.getElementsByName('newbalance[]');
   
 var i;
    for (i = 0; i < lastbalance.length; i++) {
   paid[i].value='';
    newbalance[i].value='';
     
    if (lastbalance[i].checked) {
		
        if(parseFloat(payment) >0) {

           if(parseFloat(payment) > parseFloat(lastbalance[i].value)){
                var simpan=0;
                var bayar=parseFloat(lastbalance[i].value);
                var sisa=0;
                var status='1';
             } else {
                var simpan=parseFloat(lastbalance[i].value)-parseFloat(payment);
                var bayar=parseFloat(payment);
                var sisa=parseFloat(lastbalance[i].value)-parseFloat(payment);
                var status='0';
              }
              var payment=parseFloat(payment)-parseFloat(lastbalance[i].value);

              //alert(' lastbalance db ='+lastbalance[i].value+' / buat simpan udate= '+simpan+' / jumlah bayar= '+bayar);
               
               paid[i].value=toRp(bayar);
               newbalance[i].value=simpan;
              
              //console.log(lastbalance[i].value+'\n');
         }
            

        }
        
    }
  ubahRP();
   
}

//for select input 		
$(".select2").select2();
	
</script>