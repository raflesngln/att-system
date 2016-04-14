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