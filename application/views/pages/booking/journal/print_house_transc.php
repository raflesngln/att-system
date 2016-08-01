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

#mytable tr td{ 
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
<div class="container" style="border:1px #999 solid; background-color:#FFF; position:relative; width:70%; margin-top:8px" id="box">
 
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
    <td ><span class="col-sm-5">House</span></td>
    <td >:</td>
    <td ><strong><?php echo $row->HouseNo;?></strong></td>
  </tr>
  <tr>
    <td ><span class="col-sm-5">ETD</span></td>
    <td >:</td>
    <td ><strong><?php echo date('d-m-Y',strtotime($row->ETD));?></strong></td>
  </tr>
  <tr>
    <td ><span class="col-sm-5">Shiper</span></td>
    <td >:</td>
    <td ><strong><?php echo $row->sender;?></strong></td>
  </tr>
  <tr>
    <td ><span class="col-sm-5">Consigne</span></td>
    <td >&nbsp;</td>
    <td ><strong><?php echo $row->receive;?></strong></td>
  </tr>
  <tr>
    <td ><span class="col-sm-5">Origin/Dest</span></td>
    <td >&nbsp;</td>
    <td ><strong><?php echo $row->Origin.' / '.$row->Destination;?></strong></td>
  </tr>
  <tr>
    <td width="25%" ><span class="col-sm-5">Qty</span></td>
    <td width="4%" >:</td>
    <td width="71%" ><strong><?php echo $row->PCS;?></strong></td>
  </tr>
  <tr>
    <td ><span class="col-sm-5">CWT</span></td>
    <td >:</td>
    <td ><strong><?php echo $row->CWT;?></strong></td>
  </tr>
  </table>
<?php } ?>

</div>

<div class="clearfix"></div>
<hr style="border:1px #FFF solid" />

<div class="col-sm-12" id="header2">
<table width="100%" border="1" id="mytable">
  <tr bgcolor="#E9E9E9">
    <td width="5%" height="33" ><div align="center">No</div></td>
    <td width="15%" ><div align="center">Date</div></td>
    <td width="22%" ><div align="center">Jurnal</div></td>
    <td width="24%"><div align="center">Amount</div></td>
    <td width="18%"><div align="center">Paymnet</div></td>
    <td width="16%" ><div align="center">balance</div></td>
    </tr>
      
       <?php 
 $no=1;
 foreach ($list as $row) {
	 $totpay+=$row->PaymentValue;
	 
	 $status=($row->Balance =='0' || $row->Balance==$row->Amount)?'<label class="label label-info arrowed-right">Settled</label>':'<label class="label label-warning arrowed-right">Not Settled</label>';;

$amoun=$row->PaymentValue+$row->Balance;
  ?>
  <tr>
    <td height="20" ><?php echo $no;?></td>
    <td ><?php echo date('d-m-Y ',strtotime($row->PaymentDate));?></td>
    <td ><?php echo $row->JurnalNo;?></td>
    <td><div align="right"><?php echo number_format($amoun,0,'.','.')?></div></td>
    <td ><div align="right"><?php echo number_format($row->PaymentValue,0,'.','.')?></div></td>
    <td ><div align="right"><?php echo number_format($row->Balance,0,'.','.')?></div></td>
    </tr>
<?php $no++; } ?>
  <tr>
    <td colspan="4"><div align="center">TOTAL</div></td>
    <td ><div align="right"><strong><?php echo number_format($totpay,0,'.','.')?></strong></div></td>
    <td >&nbsp;</td>
    </tr>
</table>
</div>
<div class="clearfix"></div>
<br />


<p><?php echo '&nbsp;        Printed by : '.$this->session->userdata('nameusr');?></p>


</div>

<div class="col-sm-12 text center" style="margin-top:10px; margin-bottom:20px; text-align:center">
<a href="javascript:printDiv('box');"><button class="btn btn-primary btn-app"><i class="fa fa-print "></i> PRINT Payment</button></a>
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