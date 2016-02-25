<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:11px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid; border-right:1px #999 solid; width:99%;
}
.header tr td{border-top:1px #9F3 solid;}
h3{font-size:14px; margin-top:-10px}
p{ margin-top:-8px;}
#logo{height:90xp; width:50px; float:left}
#right-header{margin-top:-8px}
</style>
</head>

<body>
<img src="<?php echo base_url();?>asset/images/att.jpg" id="logo" />
<h1 style="font-size:18px"> &nbsp; &nbsp; ATT CARGO</h1>
<p> &nbsp; &nbsp; Pergudangan Domestic IF-6/G-1</p>
<p style="margin-left:60px"> Juanda Airport</p>
<p style="margin-left:60px"> Phone : (031) 8688511 , 72597371</p>
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<h1 style="text-align:center; margin-top:-44px; text-decoration:underline">OUTGOING MASTER CASH</h1>
<h1 style="text-align:center; margin-top:-12px; font-size:18px"><?php echo $row->InvoiceNo;?></h1>
<hr style="border:1px #999 dashed" />

<table width="800" border="0" id="tabel">
  <tr>
    <td width="22%">AWB/SMU.........................</td>
    <td width="21%">: <strong><?php echo $row->HouseNo;?></strong></td>
    <td width="26%" rowspan="9"><p style="color:#FFF">.....................................</p></td>
    <td width="31%" rowspan="9">
    <div id="right-header">
    <?php
	foreach($consigne as $con){
	$flight1=explode("/",$con->FlightNumbDate1);
	$flight2=explode("/",$con->FlightNumbDate2);
	$flight3=explode("/",$con->FlightNumbDate3);
	
	?>
    <p>Consisgne........... : &nbsp;<?php echo $con->custName;?></p>
    <p>Phone................. :  &nbsp;<?php echo $con->Phone;?></p>
    <p>City..................... : &nbsp;<?php echo $con->cyCode;?></p>
    <p>&nbsp;</p>
    <p>Airline.................. : &nbsp;<?php echo $con->Airlines;?></p>
    <p>Flight Numner...... : &nbsp;<?php echo $flight1[0].' / '.$flight2[0].' / '.$flight3[0];?></p>
    <p>CWT.................... : &nbsp;<?php echo $con->CWT;?></p>
    <p>GWT.................... : &nbsp;<?php echo $con->CWT;?></p>
    
    <?php } ?>
    </div>
</td>
  </tr>
  <tr>
    <td>Job No......................</td>
    <td>: <strong><?php echo $row->JobNo;?></strong></td>
  </tr>
  <tr>
    <td>Issue Date.....................</td>
    <td>: <?php echo date("d-m-Y / h:i:s",strtotime($row->CreateDate)); ?></td>
  </tr>
  <tr>
    <td>Dest / Origin..................</td>
    <td> ; <?php echo substr($row->Destination,4,30);?> / <?php echo substr($row->Origin,4,30);?></td>
  </tr>
  <tr>
    <td>Shipper.........................</td>
    <td>: <?php echo $row->custName;?></td>
  </tr>
  <tr>
    <td>Phone............................</td>
    <td>: <?php echo $row->Phone;?></td>
  </tr>
  <tr>
    <td>City..............................</td>
    <td> : <?php echo $row->cyCode;?></td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td height="20">Commodity...................</td>
    <td>: <?php echo $row->Commodity;?></td>
  </tr>
  <tr>
    <td>Pieces...........................</td>
    <td>: <?php echo $row->grandPCS;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Reference...................</td>
    <td>: <?php echo $row->SpecialIntraction;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>


<table border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">No</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"> Charge Item</td>
    <td style="border-top:2px #999 solid; padding:10px 15px">Qty</td>
    <td style="border-top:2px #999 solid; padding:10px 15px">Unit</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:30px">Rate</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:60px">Amount Rp</td>
  </tr>
   <?php 
 $no=1;
 foreach($list as $items){
	 $qty=$items->Qty;
	 $unit=$items->Unit;
	 $amount=$unit*$qty;
	 $total+=$amount;

        ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td style="width:350px"><?php echo $items->ChargeName;?></td>
    <td style="text-align:right"><?php echo number_format($items->Qty,0,'.','.'); ?></td>
    <td style="text-align:right">KG</td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo number_format($items->Unit,0,'.','.'); ?></td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo number_format($amount,0,'.','.'); ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="18" colspan="5"><div align="right"><label style="margin-right:20px; margin-top:9px; font-weight:bold">TOTAL &nbsp;</label></div></td>
    <td style="text-align:right"><label style="font-size:13px; font-weight:bold">Rp. <?php echo number_format($total,0,'.','.'); ?></label></td>
  </tr>
</table>

<table width="786" border="0">
  <tr>
    <td height="35"><h5>REMARK :</h5></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="227"><div align="left"><span class="item"><label style="margin-left:30px; margin-top:-19px">Received from</label></span></div></td>
    <td width="231"><div align="left"><span class="item"><label style="margin-left:50px">Received By</label></span></div></td>
    <td width="193"><div align="left"><span class="item"><label style="margin-left:70px">Approived By</label></span></div></td>
  </tr>
  <tr>
    <td><label style="margin-left:20px; margin-top:40px">................................</label></td>
    <td><label style="margin-left:30px;margin-top:40px; text-align:justify; text-decoration:underline; font-weight:normal"><em><?php echo $this->session->userdata('nameusr');?></em></label></td>
    <td><label style="margin-left:50px;margin-top:40px">.................................</label></td>
  </tr>
</table>

<div id="footer"></div>

</body>
</html>