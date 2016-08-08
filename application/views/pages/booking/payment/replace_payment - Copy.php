
<table width="100%" border="1" class="table table-striped table-bordered table-hover" style="margin-left:-5px">
<thead>
  <tr>
    <td width="3%" height="32">No</td>
    <td width="4%">
    
    <div align="left">
      <input type="checkbox" name="checkall" id="checkall" onclick="return Checkall()" checked="checked" value="Check all" /> 
      
  &nbsp; </div></td>
    <td width="18%">Account</td>
    <td width="14%">SMU</td>
    <td width="12%">House</td>
    <td width="10%">ETD</td>
    <td width="9%">Origin-Dest.</td>
    <td width="6%">Qty</td>
    <td width="7%">CWT</td>
    <td width="9%">Amount</td>
    <td width="9%">Balance</td>
    <td width="9%" >Paid</td>
    <td width="4%" style=" display:none">New Balance</td>
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
    <td><div align="left">
    <input type="checkbox" name="lastbalance[]" id="lastbalance[]" checked="checked" class="ceklis" value="<?php echo $row->RemainAmount; ?>" onclick="countBalance()" />
      </div></td>
    <td><label for="account[]"></label>
      <span class="col-sm-7">
      <select name="accountdetail[]" id="accountdetail[]" required="required" style="width:280px; font-size:9px" class="form-control select2">
        <option value="">Select account</option>
        <?php foreach ($account_detail as $accDet) {
			$kdac='('.$accDet->kdac.')';
          ?>
        <option value="<?php echo $accDet->kdac;?>"><?php echo $accDet->nmac.'  '.$kdac;?></option>
        <?php } ?>
      </select>
    </span></td>
    <td><?php echo $row->NoSMU;?>
    <input name="nomormaster[]" type="hidden" id="nomormaster[]" value="<?php echo $row->NoSMU;?>" /></td>
    <td><?php echo $row->HouseNo;?><input name="nomorhouse[]" type="hidden" id="nomorhouse[]" value="<?php echo $row->HouseNo;?>" /></td>
    <td><?php echo date('d-m-Y',strtotime($row->ETD));?></td>
    <td><?php echo substr($row->Origin,0,15).' - ';?><?php echo substr($row->Destination,0,15);?></td>
    <td>
    <div align="right"><?php echo $row->PCS;?></div></td>
    <td>
      <div align="right"><?php echo $row->CWT;?></div>
    <div align="right"></div></td>
    <td><div align="right"><?php echo number_format($row->Amount,0,'.','.');?></div></td>
    <td><div align="right">
      <?php echo number_format($row->RemainAmount,0,'.','.');?>
      <input name="lastbalanceview[]" type="hidden" id="lastbalanceview[]" value="<?php echo $row->RemainAmount;?>" style="width:100px" />
    </div></td>
    <td><input type="text" name="paid[]" id="paid[]" style="width:100px; text-align:right; border:none; height:30px; padding-right:5px;background-color:hsl(231, 3%, 82%); color:#000" readonly="readonly" />
    </td>
    <td style="display:none"><div id="cek" style="text-align:left">
      <input type="text" name="newbalance[]" id="newbalance[]" style="width:100px" readonly="readonly"/>
    </div></td>
    </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="9"><div align="center"><label style="color:#06C">TOTAL Rp </label></div></td>
    <td>&nbsp;</td>
    <td><div align="right">
      <label style="color:#06C"><?php echo number_format($t_RemainAmount,0,'.','.');?></label>
    </div></td>
    <td>&nbsp;</td>
    <td style="display:none">&nbsp;</td>
    </tr>
</table>

<script type="text/javascript">
$("#checkall").click(function(e) {
    $(".ceklis").prop('checked',this.checked);
	countBalance();
});
function cek_checked(){
	var chk= $(".ceklis:checked");
	if(chk.length <=0){
	swal("Warning !","Please Select ( Check ) The Flight Number, Cannot be Empty !","error");
	return false;
	}
	
}

//for select input 		
$(".select2").select2();
</script>