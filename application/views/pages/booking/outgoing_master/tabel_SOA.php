<table width="200" border="1" class="table table-striped table-bordered table-hover">
  <tr>
    <td>No</td>
    <td>Job</td>
    <td>Invoice</td>
    <td>Date</td>
    <td>SMU</td>
    <td>Origin-Desti</td>
    <td>Weight</td>
    <td>Qty</td>
    <td>Amount</td>
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
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo substr($row->Origin,4,15).' - ';?><?php echo substr($row->Destination,4,15);?></td>
    <td><?php echo $row->GrossWeight;?></td>
    <td><?php echo $row->grandPCS;?></td>
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