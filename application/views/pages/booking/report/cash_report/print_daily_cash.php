<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="<?php echo base_url();?>asset/images/favicon.ico">
<title>report daily cash</title>
<style>
*{
	font-size:9px;
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
	   ob_start();

        ?>
<h1 style="text-align:center; margin-top:-44px; text-decoration:underline"><?php echo $tittle;?></h1>

<p>&nbsp;</p><hr style="border:1px #999 dashed" />

<table width="800" border="0" id="tabel">
  <tr>
    <td width="22%">Job Type.........................</td>
    <td width="21%">: <?php echo $jobtype;?></td>
  </tr>
  <tr>
    <td>Date Periode......................</td>
    <td>: <?php echo $periode;?></td>
  </tr>
  <tr>
    <td>Payment Type.....................</td>
    <td>: <?php echo $Methode;?></td>
  </tr>
  <tr>
    <td>User..................</td>
    <td> : <?php echo $user;?></td>
  </tr>
  <tr>
    <td height="48" colspan="2">&nbsp;</td>
  </tr>
</table>



<table border="0" class="mytable" style="width:95%">
  <tr style="background:#EBEBEB" >
    <td height="37"  style="border-top:2px #999 solid; padding-left:9px">No</td>
    <td style="border-top:2px #999 solid; width:60px;">No Jurnal</td>
    <td style="border-top:2px #999 solid; width:60px; height:25px">House No</td>
    <td style="border-top:2px #999 solid; width:40px; ">SMU</td>
     <td style="border-top:2px #999 solid; width:50px; ">Date</td>
    <td  style="border-top:2px #999 solid; width:100px;" >Customer</td>
    <td  style="border-top:2px #999 solid; width:70px; ">Origin/Destination</td>
    <td  style="border-top:2px #999 solid; width:30px; ">QTY</td>
    <td width="50" style="border-top:2px #999 solid; width:20px; ">CWT</td>
    <td  style="border-top:2px #999 solid; width:50px">Transc. type</td>
    <td  style="border-top:2px #999 solid;  width:60px">Amount</td>
    <td  style="border-top:2px #999 solid;  width:60px">Received </td>
  </tr>
   <?php 
 $no=1;
 foreach($list as $items){
$amount=$items->PaymentValue;
$total+=$amount;
       ?>
  <tr>
    <td height="21" ><?php echo $no;?></td>
    <td style="text-align:left"><?php echo $items->JurnalNo  ;?></td>
    <td style="text-align:left"><?php echo $items->HouseNo  ;?></td>
    <td style="text-align:left"><?php echo $items->MasterNo  ;?></td>
    <td style="text-align:left"><?php echo date('d-m-Y',strtotime($items->ETD))  ;?></td>
    <td style="text-align:left"><?php echo $items->sender  ;?></td>
    <td style="text-align:left"><?php echo $items->Origin.' - '. $items->Destination  ;?></td>
    <td style="text-align:center"><?php echo $items->PCS  ;?></td>
    <td style="text-align:right"><?php echo number_format($items->CWT,0,'.','.');?></td>
    <td style="text-align:left"><?php echo substr($items->PayCode,4);?></td>
    <td style="text-align:right"><?php echo number_format($items->Amount,0,'.','.'); ?></td>
    <td style="text-align:right"><?php echo number_format($items->PaymentValue,0,'.','.'); ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="18" colspan="10"><div align="center"><label style="margin-right:20px; margin-top:9px; font-weight:bold">TOTAL &nbsp;</label></div></td>
    <td style="text-align:right">&nbsp;</td>
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



</body>
</html>