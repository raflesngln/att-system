<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
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
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<h1 style="text-align:center; margin-top:-44px; text-decoration:underline">OUTGOING MASTER CREDIT</h1>
<h1 style="text-align:center; margin-top:-12px; font-size:18px"><?php echo $row->InvoiceNo;?></h1>
<hr style="border:1px #999 dashed" />

<table width="800" border="0" id="mytabel">
  <tr>
    <td width="22%">AWB/SMU.........................</td>
    <td width="21%">: <strong><?php echo $row->NoSMU;?></strong></td>
    <td width="26%" rowspan="9"><p style="color:#FFF">.....................................</p></td>
    <td width="31%" rowspan="9">
    <div id="right-header">
    <?php
	foreach($consigne as $con){
	$flight1=explode("/",$con->FlightNumbDate1);
	$flight2=explode("/",$con->FlightNumbDate2);
	$flight3=explode("/",$con->FlightNumbDate3);
	
	?>
    <p>Consisgne........... : &nbsp;<?php echo $con->CustName;?></p>
    <p>Phone................. :  &nbsp;<?php echo $con->Phone;?></p>
    <p>Destination........... : &nbsp;<?php echo substr($row->PortName,0,30);?></p>
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
    <td>Origin..................</td>
    <td> ; <?php echo substr($row->PortName,0,30);?></td>
  </tr>
  <tr>
    <td>Shipper.........................</td>
    <td>: <?php echo $row->CustName;?></td>
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
    <td>Piesces...........................</td>
    <td>: <?php echo $row->PCS;?></td>
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
    <td style="border-top:2px #999 solid; padding:10px 15px">Commodity</td>
    <td style="border-top:2px #999 solid; padding:10px 15px">Ref</td>
    <td style="border-top:2px #999 solid; padding:10px 15px">Flight</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:30px">AWB/SMU</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:30px">PCS</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:30px">GWT</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:30px">CWT</td>
  </tr>
   <?php 
 $no=1;
 foreach($list as $items){
	 $cwt=$items->CWT;
	 $total+=$cwt;

        ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td style="width:160px"><?php echo $items->Commodity;?></td>
    <td style="text-align:right"><span style="width:190px"><?php echo $flight1[0].'/'.$flight2[0];?></span></td>
    <td style="text-align:right"><span style="width:190px"><?php echo $items->Airlines;?></span></td>
    <td style="text-align:right"><?php echo $items->NoSMU;?></td>
    <td style="text-align:center"><?php echo number_format($items->grandPCS,0,'.','.'); ?></td>
    <td style="text-align:center"><?php echo number_format($items->CWT,0,'.','.'); ?></td>
    <td style="text-align:center"><?php echo number_format($items->CWT,0,'.','.'); ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="18" colspan="4"><div align="left"><strong>Total &nbsp; </strong></div></td>
    <td style="text-align:right">&nbsp;</td>
    <td style="text-align:right">&nbsp;</td>
    <td style="text-align:center"><strong><?php echo number_format($total,0,'.','.'); ?></strong></td>
    <td style="text-align:center"><strong><?php echo number_format($total,0,'.','.'); ?></strong></td>
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