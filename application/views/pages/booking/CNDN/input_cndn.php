
 
 <link href="<?php echo base_url();?>asset/select2/css/select2.css" rel="stylesheet" />
<script src="<?php echo base_url();?>asset/select2/js/select2.min.js"></script>
        
  

   <div class="container-fluid">
    <div class="row-fluid">
  
<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-money"></i></div>
     <div class="col-sm-9 col-xs-8">Credit  / Debit Note</div>
</div>
</div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>cndn/simpan_cndn" id="myform" onsubmit="konfirmasi()" class="myform"  name="myform" >
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
<div class="form-group"> 
          <label class="col-sm-3"> Job No</label>
          <div class="col-sm-7">
           <select name="jobno" id="jobno" class="form-control select2" required="required">
          <option value="">Job No</option>
          <?php foreach ($job as $row) {
          ?>
          <option value="<?php echo $row->HouseNo;?>"><?php echo $row->HouseNo.' - '.$row->CustName;?></option>
          <?php } ?>
          </select>
          </div>
</div>

   
<div class="form-group">             
          <label class="col-sm-3"> Type<sup class="must"> *</sup></label>
          <div class="col-sm-7">
           <select name="jobtype" id="jobtype" class="form-control select2" required="required">
          <option value="dn">Debit Note</option>
          <option value="cn">Credit Note</option>
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
 




<div class="clearfix"></div>    

          
      </div>             
      
 
<!-- RIGHT SIDE -->
   <div class="col-sm-6">      



       
<div class="clearfix"></div> 
 

<div class="form-group"> 
          <label class="col-sm-3"> Reff<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <input name="jurnalno" type="text" class="form-control"  id="jurnalno" />
  
        
          </div>
</div>

<div class="form-group"> 
          <label class="col-sm-3"> Date<sup class="must"> *</sup></label>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required readonly/>
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
                                        <div class="table-responsive" id="cash_payment">
 
<h2>Charges Items</h2>	
   <table class="table table-hover" id="tblcharges" style="width:95%">
                                              
                                                <thead>
                                                <tr>
                                                  <th colspan="3"><a  id="addchrg" class="btn  btn-success btn-mini" href="#modaladdCharge" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add Charges</a></th>
                                                  <th style="width:28%">&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center"></th>
                                                  <th class="text-center"></th>
                                                </tr>
                                                <tr>
                                                  <th>Charges</th>
                                                  <th>Price</th>
                                                  <th>Qty</th>
                                                  <th style="width:28%">Desc</th>
                                                  <th>Total</th>
                                                  <th class="text-center"></th>
                                                  <th class="text-center"></th>
                                                </tr>
 </thead>
 <tbody>
                                                
                                                
    
                                              </tbody>
 <tfoot>
 <tr>

                                                  <td>&nbsp;</td>
                                                  <td colspan="4"><div align="right">
                                                    <label id="label_charges"></label>                                                                                           
                                                  
                                                   </div></td>
                                                  <td width="39">&nbsp;</td>
                                                  <td width="39">&nbsp;</td>
                    </tr>
 </tfoot>

                                                 
                                                
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

<div class="col-sm-3" style=" margin-left:22%">
<button class="btn btn-blue btn-block"><i class="fa fa-save"></i>  Save</button>
</div>
      </form>
  </div>
   </div>
  


<!-- modal -->
<div id="modaladdCharge" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="titlecharges">Add Charges</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">Charges<sup class="must"> *</sup> </label>
                        <div class="col-sm-9"><span class="controls">
              <select name="charge" class="form-control select2" style="width:99%" required="required" id="charge" onchange="return load_account()">
          
              </select> 
                          </span>
                          <span class="controls">
                          <input name="txtaccount" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtaccount" />
                          </span></div>
                        <div class="clearfix"></div>
  </div>

  <div class="form-group">
                        <label class="col-sm-3 control-label">&nbsp;Price<sup class="must"> *</sup></label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="txtunit" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="txtunit" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Qty<sup class="must"> *</sup></label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="qty" type="number" class="form-control" onkeypress="return isNumberKey(event)" id="txtqty" value="1" />
</span></div>
                        <div class="clearfix"></div>
                      </div>                    
<div class="form-group">
                        <label class="col-sm-3 control-label">Description &nbsp;</label>
                        <div class="col-sm-9"><span class="controls">
                <textarea name="desc" id="desc" class="form-control"></textarea>
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancel"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges" onClick="savecharges()"> Save</button>
    </div>
                    </div>
            
           
            </div>
        </div>
    </div>
    </div>
<!-- modal -->


<script type="text/javascript">	
$(document).ready(function(e) {
    load_combo_charge();
});
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

function filter_payment(){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
		
            var jobno = $("#jobno").val();
			var etd1 = $("#periode1").val();
			var etd2 = $("#periode2").val();
			var methode = $("#methode").val();
			var payTipe='CSH-CASH';
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('payment/filter_pay_cash'); ?>",
 			data: "jobno="+jobno+"&etd1="+etd1+"&etd2="+etd2+"&methode="+methode+"&payTipe="+payTipe,

                success: function(data){
					swal.close();
					$("#cash_payment").show();
					$("#btnProcess").show();
                    $('#cash_payment').html(data);
				
                }
            });
}

function konfirmasi(){
    var a=confirm("Are You Sure To Processing Data ?");
	if(a===true)
	{
	swal("Success !","Succes saved create Note","success");
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

function load_account(){
	var cargecode=$("#charge").val();
	
       $.ajax({
           url : "<?php echo site_url('transaction/getAccountCharge')?>",
           dataType: "json",
		   type: "POST",
     	   data: "cargecode="+cargecode,
           success: function(data){
               $("#txtaccount").empty();
                     for (var i =0; i<data.length; i++){
                          $("#txtaccount").val(data[i].Reff_Account);
						
                       }
  
               }
       }); 
    }

function load_combo_charge(){
       $.ajax({
           url : "<?php echo site_url('transaction/getChargeOptional')?>",
           dataType: "json",
           success: function(data){
               $("#charge").empty();
               $("#charge").append("<option value=''>Select charge</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].ChargeCode+"_"+data[i].ChargeName+"_"+data[i].Reff_Account+"'>"+data[i].ChargeName+"</option>";
                          $("#charge").append(option);
				
						  //load_state();
                       }
  
               }
       }); 
    }
function savecharges(){
	//var t_volume=$('#idtotal').val();   
	var charge=$('#charge').val();
	var desc=$('#desc').val();
	var txtunit=$('#txtunit').val();
	var txtqty=$('#txtqty').val();
 	var kali = parseFloat(txtunit) * parseFloat(txtqty);
 	//var total_charge=$('#total_charge').val();
	//var jumlah=parseFloat(total_charge) + parseFloat(kali);	
	
	var pecah=charge.split('_');
	var idcharge=pecah[0];
	var nmcharge=pecah[1];
	var account=pecah[2];
			
if (charge == '' || txtunit == '' || txtqty == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="idcharge[]" id="idcharge[]" value="'+ idcharge +'">'+ '<label id="l_pcs">'+ nmcharge +'</label>' +'</td>'
		  
		
    + '<td align="right">' +  '<input type="hidden" name="unit[]" id="l[]" value="'+ txtunit +'"><input type="hidden" name="Reff_Account[]" id="Reff_Account[]" value="'+ account +'">'+ '<label id="l_pcs">'+ toRp(txtunit) +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="qty[]" id="t[]" size="5" value="'+ txtqty +'">'+ '<label id="l_pcs">'+ txtqty +'</label>' +'</td>'
    
    + '<td>' + '<input type="hidden" name="desc[]" id="p[]" size="5" value="'+ desc +'">'+ '<label id="l_pcs">'+ desc +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="totalcharges[]" id="totalcharges[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ toRp(kali) +'</label></td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali +'" onclick="hapuscharge(this)" type="button"><i class="fa fa-times"></i></button></td>'
	+'<td><button class="btndel btn-primary btn-mini" value="' + idcharge+'/'+nmcharge+'/'+txtunit+'/'+txtqty+'/'+desc+'/'+kali +'" onclick="editcharge(this)" type="button"><i class="fa fa-edit"></i></button>'
	+'</td>'
    + '</tr>';

	
		$('#tblcharges tbody').append(text);
		//$("#total_charge").val(jumlah);
//		$("#label_charges").html(toRp(jumlah));
//		$("#t_total").val(toRp(jumlah));
//		$("#txttotal").val(jumlah);
		
		//var diskon=$("#txtdiskon").val();
		//var grand=parseFloat(jumlah)-parseFloat(diskon);
		//$("#grandtotal").val(toRp(grand));
		//$("#txtgrandtotal").val(grand);

	//RESET INPUT
//	$('#txtunit').val("");
//	$('#txtqty').val("");
//	$('#desc').val("");
		$("#modaladdCharge").modal('hide');
	}
}
function editcharge(myid){
	var input = $(myid).val();
	
	var pecah=input.split('/');
	var code=pecah[0];
	var name=pecah[1];
	var price=pecah[2];
	var qty=pecah[3];
	var deskripsi=pecah[4];
	var total=pecah[5];
	
	$("#modaladdCharge").modal('show');	
//	text='<option value="'+ code +'">'+ name +'</option>';
//	//$('#charge').empty();
//	$('#charge').append(text);
	
	$('#txtqty').val(qty);
	$('#txtunit').val(price);
	$('#desc').val(deskripsi);

	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(total);
	var txtdiskon=$('#txtdiskon').val();
	var grand=parseFloat(hasil)-parseFloat(txtdiskon);
	
	$('#txttotal').val(hasil);	
	$('#total_charge').val(hasil);
	//$("#label_charges").html(toRp(hasil));
	$('#t_total').val(toRp(hasil));
	$('#grandtotal').val(toRp(grand));
	$("#txtgrandtotal").val(grand);

  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();	
	 $("#savecharges").html('Update');
	 $("#titlecharges").html('Edit charge');
	 $("#cancel").hide();
	$(".close").hide();
}
function hapuscharge(myid){
	var input = $(myid).val();
	
	var total_charge=$('#total_charge').val();
	var hasil=parseFloat(total_charge)-parseFloat(input);
	var txtdiskon=$('#txtdiskon').val();
	var grand=parseFloat(hasil)-parseFloat(txtdiskon);

$('#txttotal').val(hasil);	
$('#total_charge').val(hasil);
//$("#label_charges").html(toRp(hasil));
$('#t_total').val(toRp(hasil));
$('#grandtotal').val(toRp(grand));
$("#txtgrandtotal").val(grand);

  <!-- delete rows -->
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}
//for select input 		
$(".select2").select2();
	
</script>