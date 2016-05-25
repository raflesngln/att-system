<table width="100%" border="1" class="table table-striped table-bordered table-hover">
<thead>
  <tr>
    <td width="3%" height="32">No</td>
    <td width="8%">SMU</td>
    <td width="10%">House</td>
    <td width="11%">ETD</td>
    <td width="9%">Origin-Dest.</td>
    <td width="7%">Qty</td>
    <td width="8%">CWT</td>
    <td width="9%">Amount</td>
    <td width="9%">Balance</td>
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
    <td><div align="right"><?php echo number_format($row->RemainAmount,0,'.','.');?></div>      <label for="pay[]"></label></td>
    </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="7"><div align="right"><label style="color:#06C">TOTAL Rp </label></div></td>
    <td><div align="right">
      <label style="color:#06C"><?php echo number_format($t_amount,0,'.','.');?></label>
    </div></td>
    <td><div align="right">
      <label style="color:#06C"><?php echo number_format($t_RemainAmount,0,'.','.');?></label>
    </div></td>
    </tr>
</table>