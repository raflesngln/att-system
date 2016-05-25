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