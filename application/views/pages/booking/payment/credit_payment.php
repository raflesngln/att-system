
 
 <link href="<?php echo base_url();?>asset/select2/css/select2.css" rel="stylesheet" />
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
     <div class="col-sm-9 col-xs-8">Credit Payment</div>
</div>
</div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>payment/process_credit_payment" id="creditForm" onsubmit="return konfirmasi2()" class="creditForm"  name="creditForm" target="new">
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
           <select name="customer" id="customer" class="form-control select2" required="required" onchange="return filter_payment2()" style="width:98%">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>
</div>
 <div class="form-group">             
          <label class="col-sm-3"> methode2<sup class="must"> *</sup></label>
          <div class="col-sm-7">
           <select name="methode2" id="methode2" class="form-control select2" required="required" onchange="return filter_payment2()" style="width:98%">
 
          <option value="outgoing_house">Outgoing</option>
          <option value="incoming_house">Incoming</option>
          </select>
          </div>
</div>



<div class="form-group">
 <label class="col-sm-3"> E.T.D Periode<sup class="must"> *</sup></label></strong>
          <div class="col-sm-3">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-30,date("Y")));
?>
           <input name="periode1" type="text" class="form-control"  id="periode1" required readonly value="<?php echo $kurangtanggal ;?>" onchange="return filter_payment2()"/>
          </div>
     <div class="col-sm-1"><p style="margin-top:10px">/</p></div>
    <div class="col-sm-3">
           <input name="periode2" type="text" class="form-control"  id="periode2" readonly value="<?php echo date("Y-m-d") ;?>" onchange="return filter_payment2()"/>
       </div>
</div>
<div class="clearfix"></div> 
 
<div class="form-group"> 
          <label class="col-sm-3"> Total Payment<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <input name="payment" type="text" class="form-control"  id="payment" required="required" onkeyup="return countBalance2()" onkeypress="return isNumberKey(event)" value="0" />
         
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
            <select name="accountheader" id="accountheader" class="form-control select2" required="required" style="width:98%">
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
          <label class="col-sm-3"> remarks2</label>
          <div class="col-sm-7">
            <textarea name="remarks2" rows="5"  class="form-control" id="remarks2"></textarea>
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
                                        <div class="table-responsive" id="credit_payment">
 

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
           <button style="display:none" id="btnProcess2" class="btn btn-primary"><i class="icon-refresh bigger-160 icons">&nbsp;</i> Process Payment</button>
                                        </div>  </div>     
              </div>
          </div>
      </div>
</div>
      </form>
  </div>
   </div>
  



<script type="text/javascript">	
$("#creditForm").submit(function(e) {
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

function filter_payment2(){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
		
            var idcust = $("#customer").val();
			var etd1 = $("#periode1").val();
			var etd2 = $("#periode2").val();
			var methode = $("#methode2").val();
			var payTipe='CRD-CREDIT';
			
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('payment/filter_pay_credit'); ?>",
 			data: "idcust="+idcust+"&etd1="+etd1+"&etd2="+etd2+"&methode="+methode+"&payTipe="+payTipe,

                success: function(data){
					swal.close();
					$("#credit_payment").show();
					$("#btnProcess2").show();
                    $('#credit_payment').html(data);
					countBalance2();
                }
            });
}

function konfirmasi2(){
	 
	//var payment=document.getElementById("payment").value;
    var a=confirm("Are You Sure To Processing Data ?");
	if(a===true){

	var chk= $(".ceklis:checked");
	if(chk.length <=0){
	swal("Warning !","Please Select ( Check ) house and Payment value grather than 0 ","error");
	$("#payment").focus();
	return false;
	} else {
	  swal.close();	
	 $("#credit_payment").hide();
	 $("#btnProcess2").hide();
	 
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

function hitung_bayar2(){
	var payment=$("#payment").val();
	
  var nomorhouse=document.getElementsByName('lastbalance[]').checked=true;
  var balance=document.getElementsByName('balance[]');
        for(i=0; i < nomorhouse.length; i++)  {  

		alert(nomorhouse[i].value+ ' dan sisa adalah  '+ balance[i].value);
		console.log(nomorhouse[i].value+ ' dan sisa adalah  '+ balance[i].value);
	}
}


function countBalance2() {
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