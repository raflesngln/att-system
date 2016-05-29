 
<table width="100%" border="1" class="table table-striped table-bordered table-hover">
<thead>
  <tr>
    <td width="3%" height="32">No</td>
    <td width="19%">
    
    <div align="left">
      <input type="checkbox" name="checkall" id="checkall" onclick="return Checkall()" checked="checked" value="Check all" /> 
      
  &nbsp; </div><span style="margin-top:5px;">Check All</span></td>
    <td width="18%">Account</td>
    <td width="14%">SMU</td>
    <td width="12%">House</td>
    <td width="9%">ETD</td>
    <td width="9%">Origin-Dest.</td>
    <td width="6%">Qty</td>
    <td width="7%">CWT</td>
    <td width="9%">Amount</td>
    <td width="9%">Balance</td>
    <td width="9%">Paid</td>
    <td width="4%">New Balance</td>
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
      <select name="account[]" id="account[]">
      <option value="">Select account</option>
      <option value="">Cash in Bank BCA</option>
      <option value="">Cash in Bank Mandiri</option>
    </select></td>
    <td><?php echo $row->NoSMU;?></td>
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
      <input name="lastbalanceview[]" type="text" id="lastbalanceview[]" value="<?php echo $row->RemainAmount;?>" style="width:100px" />
    </div></td>
    <td><input type="text" name="paid[]" id="paid[]" style="width:100px" />
    </td>
    <td><div id="cek" style="text-align:center">
      <input type="text" name="newbalance[]" id="newbalance[]" style="width:100px"/>
    </div></td>
    </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="9"><div align="right"><label style="color:#06C">TOTAL Rp </label></div></td>
    <td>&nbsp;</td>
    <td><div align="right">
      <label style="color:#06C"><?php echo number_format($t_amount,0,'.','.');?></label>
    </div></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
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


</script>