<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:9px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid;
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
<h2>Domestic Daily Report Outgoing Master</h2>
<h3>Periode :  <?php echo $periode;?></h3>

       <?php 
 $no=1;
 foreach($header as $row){

        ?>

<?php } ?>


<table width="200" border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">Invoice</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Customer</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">ORI-DEST</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">AWB/SMU</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">PCS</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">CWT</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Rate</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Amount</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Created</td>
  </tr>
 <?php 
 $no=1;
 foreach($master as $items){
        ?>
  <tr>
    <td ><?php echo $items->InvoiceNo;?></td>
    <td style="width:130px"><?php echo $items->custName;?></td>
    <td style="width:120px"><?php echo substr($items->Origin,4,30);?>-<?php echo substr($items->Destination,4,30);?></td>
    <td style="width:90px"><?php echo $items->HouseNo;?></td>
    <td style="width:10px"><?php echo $items->grandPCS;?>
    <div align="center"></div></td>
    <td style="width:10px"><?php echo $items->grandPCS;?></td>
    <td style="width:10px"><?php echo $items->grandPCS;?></td>
    <td style="width:10px">&nbsp;<?php echo $items->Shipper;?></td>
    <td style="width:10px">&nbsp;<?php echo $items->CreateBy;?></td>
  </tr>
  <?php $no++; } ?>
</table>

</body>
</html>