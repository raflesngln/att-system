<table width="100%" border="1" class="table table-striped table-bordered table-hover">
  <tr>
    <td width="6%">No</td>
    <td width="6%">Job</td>
    <td width="11%">SMU</td>
    <td width="8%">House</td>
    <td width="11%">Date</td>
    <td width="16%">Origin-Desti</td>
    <td width="7%">Qty</td>
    <td width="10%">CWT</td>
    <td width="13%"><div align="center">Amount</div></td>
    <td width="12%">Action</td>
    </tr>
   <?php
   foreach($list as $row){
	$amount=$row->Amount;
	$t_amount+=$amount;   
   ?>
  <tr>
    <td>1</td>
    <td><?php echo $row->JobNo;?></td>
    <td><?php echo $row->NoSMU;?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo date('d-m-Y',strtotime($row->CreateDate));?></td>
    <td><?php echo substr($row->ori,0,15).' - ';?><?php echo substr($row->desti,0,15);?></td>
    <td><?php echo $row->PCS;?></td>
    <td><?php echo $row->CWT;?></td>
    <td><div align="right"><?php echo number_format($row->Amount,0,'.','.');?></div></td>
    <td>&nbsp;</td>
  </tr>
    
    <?php } ?>
  <tr style="background-color:#EBEBEB">
    <td colspan="7"><div align="right"><label style="color:#06C">TOTAL</label></div></td>
    <td>&nbsp;</td>
    <td><div align="right"><label style="color:#06C">Rp. <?php echo number_format($t_amount,0,'.','.');?></label></div></td>
    <td>&nbsp;</td>
    </tr>
</table>