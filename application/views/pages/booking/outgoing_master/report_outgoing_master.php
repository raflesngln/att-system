<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:10px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid;
}
.header tr td{border-top:1px #9F3 solid;}
h2{font-size:18px;}
h3{text-align:center; font-size:12px; margin-top:-10px; font-weight:normal}
p{ margin-top:-8px}
</style>
</head>

<body>

<h2 style="text-align:center">Laporan Outgoing Master</h2>
<h3>PT. Expresindo System Network</h3>
<h3>Periode :  <?php echo $periode;?></h3>

       <?php 
 $no=1;
 foreach($header as $row){

        ?>

<?php } ?>


<table width="200" border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">No House</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Tanggal</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Paycode</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Service</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Origin</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Destination</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Shipper</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Consignee</td>
  </tr>
 <?php 
 $no=1;
 foreach($master as $items){
        ?>
  <tr>
    <td ><?php echo $items->HouseNo;?></td>
    <td ><?php echo date("d-m-Y",strtotime($items->ETD)); ?></td>
    <td ><?php echo $items->PayCode;?></td>
    <td ><?php echo $items->Service;?></td>
    <td ><?php echo $items->Origin;?></td>
    <td><?php echo $items->Destination;?></td>
    <td>&nbsp; &nbsp; &nbsp;<?php echo $items->Shipper;?></td>
    <td>&nbsp; &nbsp; &nbsp;<?php echo $items->Consigne;?></td>
  </tr>
  <?php $no++; } ?>
</table>

</body>
</html>