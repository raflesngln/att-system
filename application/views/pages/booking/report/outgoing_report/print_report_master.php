<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:10px;
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
 $no=1;
 foreach($header as $row){

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
<?php } ?>


<table border="0" class="mytable" style="width:90%">
  <tr style="background:#EBEBEB" >
    <td  style="border-top:2px #999 solid;width:18px">No</td>
    <td style="border-top:2px #999 solid; width:80px; ">House No</td>
    <td  style="border-top:2px #999 solid; width:110px; height:25px" >Customer</td>
    <td  style="border-top:2px #999 solid; width:100px; ">Origin/Destination</td>
    <td  style="border-top:2px #999 solid; width:50px; ">PCS</td>
    <td width="50" style="border-top:2px #999 solid; width:50px; ">CWT</td>
    <td  style="border-top:2px #999 solid; width:70px">Payment</td>
    <td  style="border-top:2px #999 solid; width:70px">Rate</td>
    <td  style="border-top:2px #999 solid; width:60px">Created</td>
    <td  style="border-top:2px #999 solid;  width:60px">Amount Rp</td>
  </tr>
   <?php 
 $no=1;
 foreach($list as $items){
$amount=$items->Amount;
$total+=$amount;
       ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td style="text-align:left"><?php echo $items->NoSMU  ;?></td>
    <td style="text-align:left"><?php echo $items->CustName  ;?></td>
    <td style="text-align:left"><?php echo $items->Origin.' - '. $items->Destination  ;?></td>
    <td style="text-align:center"><?php echo $items->PCS  ;?></td>
    <td style="text-align:center"><?php echo $items->CWT  ;?></td>
    <td style="text-align:left"><?php echo substr($items->PayCode,4);?></td>
    <td style="text-align:right"><?php echo $items->Rate  ;?></td>
    <td style="text-align:left"><?php echo $items->UserName  ;?></td>
    <td style="text-align:right"><?php echo number_format($items->Amount,0,'.','.'); ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td height="18" colspan="9"><div align="center"><label style="margin-right:20px; margin-top:9px; font-weight:bold">TOTAL &nbsp;</label></div></td>
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