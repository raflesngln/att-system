<!-- silakan desain dengan menggunakan CSS -->
<style type="text/css">
#table{
	width:80%;
	margin-left:10px;
	}
#table tr td{
	border-bottom:1px dashed #666;
	border-left:1px dashed #666;
	border-right:1px dashed #666;
	padding-left:10px;
	padding-right:10px;

	}
#table tr .nama{width:120px}
#table tr .harga{width:90px;}
#table tr .sub{width:115px;}
#table tr .grandtotal{
	padding-left:95px;
	font-size:large;
	}
h3{
	line-height:8px;}
.company{margin-left:-10px;}
</style>
<h2 align="center"><u>INVOICE </u></h2>
<h2 class="company"></h2>
<hr style="border:1px #CCC solid" />
<?php

  foreach($cust as $row){

?>
<table width="724" border="0" id="top">
  <tr>
    <td width="410" height="21">Kepada:</td>
    <td width="133">No Invoice</td>
    <td width="8">:</td>
    <td width="169"><?php echo $no_invoice?></td>
  </tr>
  <tr>
    <td><strong><?php echo $row->custName?></strong></td>
    <td height="21">Tgl Invoice</td>
    <td>:</td>
    <td><?php echo $tgl_invoice?></td>
  </tr>
  <tr>
    <td height="21"><em><?php echo $row->Address?></em></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="21">Phone:<?php echo $row->phone?></td>
    <td>Admin</td>
    <td>&nbsp;</td>
    <td><?php echo $this->session->userdata('user')?></td>
  </tr>
  <tr>
    <td height="21">&nbsp;</td>
    <td>&nbsp;</td>
    <td>:</td>
    <td>&nbsp;</td>
  </tr>
</table>

<?php }?>

<hr style="border:1px #CCC dashed" />
<table width="107%" id="table">
<?php
?>
	<tr bgcolor="lavender" id="judul">
	<td height="24">No</td>
	<td class="nama">Nomor AWB</td>
	<td>Quantity</td>
    <td class="harga">CWT</td>
    <td class="harga">Remarks</td>
    <td class="sub"> Total</td></tr>
<?php
$no=1;
foreach($detail_po as $row) 
{

	$sub=$row->qty*$row->cwt;
	$grand+=$sub;
	$tqty+=$row->qty;
	$tcwt+=$row->cwt;
	?>
<tr>
  <td><?php echo $no++;?></td>
  <td><?php echo $row->awb_no ;?></td>
  <td><?php echo $row->qty;?></td>
  <td><?php echo number_format($row->cwt);?></td>
  <td><?php echo number_format($row->remarks);?></td>
  <td><div align="right"><?php echo number_format($sub,0,',',',');?></div></td>
</tr>
<?php } ?>
<tr bgcolor="#F3F3F3"><td colspan="2"><b>Total</b></td>
<td><?php echo $tqty;?></td>
<td><?php echo $tcwt;?></td>
<td>&nbsp;</td>
<td><div align="right"><b>Rp .<?php echo number_format($grand,0,'.','.');?></b></div></td>
</tr>

<tr><td colspan="4" height="24">&nbsp;</td>
  <td>&nbsp;</td>
<td>&nbsp;</td>
</tr>	

</table>
<table width="366" border="0">
  <tr>
    <td width="168" rowspan="2"><div>lakukan untuk pembayaran</div>
    <pre>&nbsp;</pre></td>
    <td width="344" height="29"><div style="padding-left:250px">Hormat Kami,</div></td>
  </tr>
  <tr>
    <td height="46">&nbsp;</td>
  </tr>
  <tr>
    <td><div align="left"></div></td>
    <td><div align="right"><u>(.................................)</u></div></td>
  </tr>
</table>
