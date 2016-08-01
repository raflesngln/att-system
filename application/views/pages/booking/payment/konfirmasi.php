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
<div class="container" style="border:1px #999 solid; background-color:#FFF; position:relative; width:50%; margin-top:8px" id="box">
 
<h1 style=" text-align:center;font-size:12px">PT. ATT CARGO</h1>
<p style="text-align:center;margin-top:-11px;font-size:10px">Domestic and International Freight Forwarding</p>
<p style="text-align:center;margin-top:-11px;font-size:10px">PERGUDANGAN DOMESTIK IF 6/G-1</p>
<p style="text-align:center; margin-top:-11px;font-size:10px">Cargo Area Bandara Juanda Surabaya </p>
<p style="text-align:center;margin-top:-11px;font-size:10px">Telp :031-8688511, 082894057864 ,082894057865</p>
<p style="text-align:center;margin-top:-11px;font-size:10px">Fax. : 031-8688512</p>
<hr style="border:1px #666 dashed; width:55%; margin-left:24%" />

<div class="col-sm-9" id="header2">
<?php
foreach($header as $row){
	
?>
<table width="98%" border="0">
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Jurnal</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo $row->JurnalNo?></span></td>
  </tr>
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Date</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo $row->PayDate?></span></td>
  </tr>
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Custolmers</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo $row->CustName?></span></td>
  </tr>
  <tr>
    <td width="25%" style="font-size:10px"><span class="col-sm-5">Currency</span></td>
    <td width="2%" style="font-size:10px">:</td>
    <td width="73%" style="font-size:10px"><span class="col-sm-7"><?php echo $row->Currency?></span></td>
  </tr>
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Rate</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo $row->Rate?></span></td>
  </tr>
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Total Receive</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo number_format($row->total_pay,0,'.','.')?></span></td>
  </tr>
  <tr>
    <td style="font-size:10px"><span class="col-sm-5">Note</span></td>
    <td style="font-size:10px">:</td>
    <td style="font-size:10px"><span class="col-sm-7"><?php echo $row->Remarks;?></span></td>
  </tr>
</table>
<?php } ?>

</div>

<div class="clearfix"></div>
<hr style="border:1px #FFF dashed"/>

<div class="col-sm-12" id="header2">
<table width="100%" border="0">
  <tr bgcolor="#E9E9E9">
    <td width="13%" height="33" style="font-size:10px">No</td>
    <td width="55%" style="font-size:10px">House</td>
    <td width="32%" style="font-size:10px"><div align="center">Paid</div></td>
  </tr>
        <?php 
 $no=1;
 foreach ($list as $row) {
	 $totpay+=$row->PaymentValue;
	 $status=($row->PaymentStatus ==1)?'<label class="label label-info arrowed-right">Settled</label>':'<label class="label label-warning arrowed-right">Not Settled</label>';

  ?>
  <tr>
    <td height="20" ><?php echo $no?></td>
    <td s><?php echo $row->House?></td>
    <td ><div align="right"; style="margin-right:10px"><?php echo number_format($row->PaymentValue,0,'.','.')?></div></td>
  </tr>
<?php $no++; } ?>
  <tr>
    <td colspan="3"><hr style="border:1px #CCC dashed; width:99%" />
</td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td >TOTAL</td>
    <td ><div align="right" style="margin-right:10px"><?php echo number_format($totpay,0,'.','.')?></div></td>
  </tr>
</table>
</div>
<div class="clearfix"></div>
<hr style="border:1px #CCC dashed; width:99%" />


<p>Thank you for paying</p>


</div>

<div class="col-sm-12 text center" style="margin-top:10px; text-align:center">
<a href="javascript:printDiv('box');"><button class="btn btn-primary btn-app"><i class="fa fa-print "></i> Print Payment</button></a>
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