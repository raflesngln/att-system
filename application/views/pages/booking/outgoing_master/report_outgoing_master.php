<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Report Outgoing Master</title>
<style>
*{
	font-size:9px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid;
border-left:1px solid #999;
}
.header tr td{border-top:1px #9F3 solid;}
h1{font-size:18px; text-align:center; font-weight:normal}
h2{font-size:14px; text-align:center; margin-top:-10px}
h3{text-align:center; margin-top:-10px; font-size:14px; font-weight:normal}
p{ margin-top:-8px}
</style>
</head>

<body>
<h1>PT. Expresindo System Network</h1>
<h2>Domestic Daily Report Outgoing Master(Cash)</h2>
<h3>Periode :  <?php echo $periode;?></h3>

       <?php 
 $no=1;
 foreach($header as $row){

        ?>

<?php } ?>


<table width="100%" border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:5px 8px">Invoice</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">Customer/Pengirim</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">AWB/SMU</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">ORI - DEST</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">PCS</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">CWT</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">Amount</td>
    <td style="border-top:2px #999 solid; padding:5px 8px"">Created</td>
  </tr>
 <?php 
 $no=1;
 foreach($master as $items){
	 $amount=$items->Amount;
	 $t_amount+=$amount;
        ?>
  <tr>
    <td style="width:70px"><?php echo $items->InvoiceNo;?></td>
    <td style="width:130px"><?php echo $items->custName;?></td>
    <td style="width:90px"><?php echo $items->NoSMU;?></td>
    <td style="width:120px"><?php echo substr($items->Origin,4,30);?>-<?php echo substr($items->Destination,4,30);?></td>
    <td style="width:10px">&nbsp; <?php echo $items->grandVolume;?></td>
    <td style="width:8px"> &nbsp; <?php echo number_format($items->CWT,0,'.','.');?></td>
    <td style="width:70px"><div align="right"><span style="width:8px"><?php echo number_format($items->Amount,0,'.','.');?></span></div></td>
    <td style="width:70px">&nbsp;<?php echo substr($items->CreateBy,0,13);?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="6" style="width:70px"><div align="right"><strong>TOTAL</strong></div></td>
    <td style="width:70px"><div align="right"><span style="width:8px; font-weight:bold"><?php echo number_format($t_amount,0,'.','.');?></span></div></td>
    <td style="width:70px">&nbsp;</td>
  </tr>
  
</table>

</body>
</html>