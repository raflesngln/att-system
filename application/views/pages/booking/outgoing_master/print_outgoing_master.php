<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:12px;
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

<h1 style="text-align:center; margin-top:-44px; text-decoration:underline">OUTGOING MASTER CASH</h1>

<hr style="border:1px #999 dashed" />
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<table width="800" border="0" id="tabel">
  <tr>
    <td width="22%">Invoice.........................</td>
    <td width="21%">: <strong><?php echo $row->HouseNo;?></strong></td>
    <td width="26%" rowspan="9"><p style="color:#FFF">.....................................</p></td>
    <td width="31%" rowspan="9">
    <div id="right-header">
    <p>Consisgne........... : &nbsp;<?php echo $row->custName;?></p>
     <p>Phone................. :  &nbsp;<?php echo $row->Phone;?></p>
    <p>City..................... : &nbsp;<?php echo $row->cyCode;?></p>
    <p>&nbsp;</p>
    <p>Airline.................. : &nbsp;<?php echo $row->Airlines;?></p>
    <p>Flight Numner...... : &nbsp;<?php echo $row->FlightNumber;?></p>
    <p>CWT.................... : &nbsp;<?php echo $row->CWT;?></p>
    <p>GWT.................... : &nbsp;<?php echo $row->CWT;?></p>
    <p>AWB (SMU)......... : &nbsp;<?php echo $row->CWT;?></p>
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
    <td> ; <?php echo $row->Destination;?> / <?php echo $row->Origin;?></td>
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
    <td>Pisecs...........................</td>
    <td>: <?php echo $row->CWT;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Reference...................</td>
    <td>: <?php echo $row->CWT;?></td>
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
	 $berat=$items->Berat;
	 $t_berat+=$berat;
	 $cwt=$items->CWT;
	 $t_cwt+=$cwt;

        ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td style="width:350px"><?php echo $items->ChargeName;?></td>
    <td style="text-align:right"><?php echo $items->Qty; ?></td>
    <td style="text-align:right"><?php echo $items->Unit; ?></td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo $items->Unit; ?></td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo $items->Unit; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="18" colspan="4"><div align="left"><strong>Total &nbsp; </strong></div></td>
    <td style="text-align:right">&nbsp;</td>
    <td style="text-align:right">&nbsp;</td>
  </tr>
</table>


<table width="673" border="0">
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td width="227"><div align="left"><span class="item">&nbsp;  Received from</span></div></td>
    <td width="231"><div align="left"><span class="item">&nbsp; Received By</span></div></td>
    <td width="193"><div align="center"><span class="item">Approived By</span></div></td>
  </tr>
  <tr>
    <td height="95">(.....................................................)</td>
    <td>(................................................)</td>
    <td>(..................................................)</td>
  </tr>
</table>

<div id="footer"></div>

</body>
</html>