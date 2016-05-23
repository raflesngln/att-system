<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css" />
  

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" />
<style>
*{
	font-size:12px;
}
.mytable tr td{ 
border-bottom:1px #999 solid;
border-left:1px solid #999;
padding:3px 2px;
}
.header tr td{border-top:1px #9F3 solid;}
h1{font-size:18px; text-align:center; font-weight:normal}
h2{font-size:14px; text-align:center; margin-top:-10px}
h3{text-align:center; margin-top:-10px; font-size:14px; font-weight:normal}
p{ margin-top:-8px}
.head p{margin-top:-20px;}

</style>
</head>

<body>
<div class="container" style="border:1px #CCC solid; box-shadow:2px 2px 8px #CCC; background-color:#; width:100%" id="box">
 
<h1 style=" text-align:center;font-size:12px">PT. ATT CARGO</h1>
<p style="text-align:center;margin-top:-11px;font-size:10px">Domestic and International Freight Forwarding</p>
<p style="text-align:center;margin-top:-11px;font-size:10px">PERGUDANGAN DOMESTIK IF 6/G-1</p>
<p style="text-align:center; margin-top:-11px;font-size:10px">Cargo Area Bandara Juanda Surabaya </p>
<p style="text-align:center;margin-top:-11px;font-size:10px">Telp :031-8688511, 082894057864 ,082894057865</p>
<p style="text-align:center;margin-top:-11px;font-size:10px">Fax. : 031-8688512</p>


<div class="col-sm-9" id="header2">
  <?php
   foreach($cust as $cust){	  
   ?>
<table width="98%" border="0">
  <tr>
    <td width="34%" style="font-size:10px">Customers</td>
    <td width="66%" style="font-size:10px"><?php echo $cust->CustName;?></td>
  </tr>
  <tr>
    <td style="font-size:10px">Date</td>
    <td style="font-size:10px"><?php echo date('d-m-Y');?></td>
  </tr>
  <tr>
    <td style="font-size:10px">Periode</td>
    <td style="font-size:10px"><?php echo date("d/m/Y",strtotime($etd1)).' - '; ?><?php echo date("d/m/Y",strtotime($etd2)); ?></td>
  </tr>
</table>


<?php } ?>
</div>
<div class="clearfix"></div>


<div class="col-sm-12">
<table width="99%" border="0" class="table table-striped table-bordered" id="mytable">
  <tr style="background-color:#f2f2f2;">
    <td width="41">No</td>
    <td width="94" style="width:30px;font-size:10px">Date Job</td>
    <td width="113" style="width:70px;font-size:10px">SMU</td>
    <td width="113" style="width:70px;font-size:10px">Job</td>
    <td width="208" style="width:130px;font-size:10px">Note</td>
    <td width="208" style="width:130px;font-size:10px">Origin-Desti</td>
    <td width="46" style="width:20px;font-size:10px">QTY</td>
    <td width="45" style="width:20px;font-size:10px">CWT</td>
    <td width="56" style="width:20px;font-size:10px">Air Freight</td>
    <td width="45" style="width:20px;font-size:10px">Adm SMU</td>
    <td width="86" style="width:20px;font-size:10px">Quarantine</td>
    <td width="73" style="width:20px;font-size:10px">Dellivery</td>
    <td width="54" style="width:20px;font-size:10px">Others</td>
    <td width="51" style="width:20px;font-size:10px">Total</td>
    </tr>
   <?php
   $no=1;
   foreach($list as $row){
	$airfreight=$row->airfreight;
	$quarantine=$row->quarantine;
	$smu=$row->smu;
	$delivery=$row->delivery;
	$other=$row->other;
	
	$subtotal=$airfreight+$quarantine+$smu+$delivery+$other;   
   ?>
  <tr>
    <td style="font-size:10px"><?php echo $no;?></td>
    <td style="font-size:10px"><?php echo date("d-m-Y",strtotime($row->ETD)); ?></td>
    <td style="font-size:10px"><?php echo $row->HouseNo;?></td>
    <td style="font-size:10px"><?php echo $row->JobNo;?></td>
    <td style="font-size:10px"><?php echo $row->DescofShipment;?></td>
    <td style="font-size:10px"><?php echo substr($row->Origin,0,15).' - ';?><?php echo substr($row->Destination,0,15);?></td>
    <td style="font-size:10px"><?php echo number_format($row->PCS,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo number_format($row->CWT,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo $row->airfreight;?></td>
    <td style="font-size:10px"><?php echo number_format($row->smu,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo number_format($row->quarantine,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo number_format($row->delivery,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo number_format($row->delivery,0,'.','.');?></td>
    <td style="font-size:10px"><?php echo number_format($subtotal,0,'.',',');?></td>
    </tr>
    <?php $no++; } ?>
  <tr>
    <td colspan="6" style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
    <td style="font-size:10px">&nbsp;</td>
  </tr>
    

  </table>

</div>

<div class="clearfix"></div>
<h6>Pembayaran Secara Full Amount ke Rekenign Dibawah ini :</h6>

<p style="font-size:9px">Currency         : IDR</p>
<p style="font-size:9px">Bank Name        : Bank Central Asia (BCA)</p>
<p style="font-size:9px">Branch           : Indrapura-Surabaya</p>
<p style="font-size:9px">Beneficiary      : Syamungningsih</p>
<p style="font-size:9px">Account          : 468-5606-900</p>


</div>

<div class="col-sm-12 text center" style="margin-top:10px">
<a href="javascript:printDiv('box');"><button class="btn btn-primary btn-mini"><i class="fa fa-print"></i> Print</button></a>
</div>

<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">

function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>

</body>
</html>