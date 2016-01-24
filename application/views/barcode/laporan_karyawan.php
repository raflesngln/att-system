<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css" />
  

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" />
	
        <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->
		<!--fonts-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.</title>
<style>
*{font-size:10px;}
P{ margin-top:-4PX;}

#mytable{
	width:99%;
	margin-top:9px;
	border:1px #666 solid;
}
#mytable tr td{
	border-left:1px #666 solid;
	border-bottom:1px #666 solid;
	padding-left:4px;
	padding-top:3px;
}
footer{display:none;}

</style>
</head>

<body>

<div class="container">

<div id="nama">
    <?php foreach($connote as $data){
		$kode=$data->HouseNo;

		 ?>
<table width="86%" border="0" id="mytable">
  <tr>
    <td width="134" rowspan="2"><p style="font-size:20pt; color:#3C0; text-align:center">XSYS</p>
      <p align="center">EXpress Network</p></td>
    <td width="135" rowspan="2"><p>PT.Expresindo System Network</p>
      <p>perkantoran Galaxy Blok N-27</p>
      <p>Outer Ring Road Barat</p>
      <p>Cengkareng-Jakarta Barat 11730</p></td>
    <td width="154"><p>ORIGINAL/ASAL</p>
      <p><?php echo $data->Origin;?></p></td>
    <td width="200"><p>DESTINATION/TUJUAN</p>
      <p><?php echo $data->Destination;?></p></td>
    <td colspan="2" rowspan="2"><img src="Pdfbarcode/barcode_generate/<?php echo $kode;?>">

      <p>&nbsp;</p>      <?php echo $data->HouseNo;?></td>
    </tr>
  <tr>
    <td><p>PIECES/JUMLAH SATUAN</p>
      <p><?php echo $data->grandPCS;?></p></td>
    <td><p>WEIGHT/BERAT</p>
      <p><?php echo $data->GrossWeight;?></p></td>
  </tr>
  <tr>
    <td colspan="2">Account No.</td>
    <td colspan="2" rowspan="3">LBy giving us shipment you agree of all itemsof conditions of nonNegoitable Connote /Dengan menyerahkan kiriman anda setuju dengan ketentuan dan kondisi pada nota pengiriman ini tanpa syarat, termasuk kondisi dan ketentuan yang tertera pada bagian belakang.menyerahkan kiriman anda setuju dengan kondisi dan ketentuan pada nota ini.</td>
    <td colspan="2">DECLARE VALUE/NILAI KIRIMAN</td>
    </tr>
  <tr>
   <?php
	$paycode=$data->PayCode;
	if($paycode=='CSH-CASH'?$cek1='checked':$cek1='');
	if($paycode=='CRD-CREDIT'?$cek2='checked':$cek2='');
	?>
    <td>TYPE OF PAYMENT/JENIS PEMABAYARAN</td>
    <td>TYPE OF SHIPMENT/JENIS KIRIMAN</td>
    <td width="102" rowspan="2">SERVICE/LAYANAN</td>
    <td width="17" rowspan="2">CHARGES/HARGA (IDR)</td>
  </tr>
  <tr>
    <td><input type="checkbox" checked="<?php echo $cek1;?>" />
CASH
  <label for="select12"></label>
  <input type="checkbox" checked="<?php echo $cek2;?>"  />
CREDIT
<label for="select13"></label>
<input type="checkbox" />
COD </td>
    <td><input type="checkbox" />
      DOC
      <label for="select14"></label>
      <input type="checkbox" />
      NDX
      <label for="select15"></label>
      <input type="checkbox" />
      HVS</td>
    </tr>
  <tr>
    <td colspan="2">
     <?php
	foreach($shipper as $ship){
	?>
    <p>SHIPMENT/PENGIRIM</p>
    <p><?php echo $ship->custName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $ship->Address;?></p>      
      <label for="select7"><br />
    </label>
    <?PHP } ?>
    </td>
    <td colspan="2">
<?php
	foreach($consigne as $con){
	?>
    <p>RECEIVE/PENERIMA</p>
    <p><?php echo $con->custName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $con->Address;?></p>
      <p>&nbsp;</p>
 <?PHP } ?> 
      </td>
    <td colspan="2"><table  width="100%" border="0" style="border:none; margin-top:-68px; width:300px">
    <?php foreach($charges as $row){
		$unit=$row->Unit;
		$qty=$row->Qty;
		$total=$unit*$qty;
		$grantotal+=$total;
		 ?>
  <tr>
    <td width="150"><?php echo $row->ChargeName;?></td>
    <td width="60"><div align="right" style="border:1px #DAD5D5 solid; text-align:right; float:right"><label style="color:#FFF">........</label><?php echo number_format($total,0,'.',',');?></div></td>
  </tr>
  <?php } ?>
</table></td>
    </tr>
  <tr>
    <td colspan="2"><span class="detsend"> SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM : </span></td>
    <td colspan="2"><span class="detsend"> ATTENTION &amp; DEPT/DITUJUKAN &amp; DEPT: </span></td>
    <td>TOTAL/JUMLAH</td>
    <td><label style="color:#FFF">...</label>
      &nbsp;Rp.<?php echo number_format($grantotal,0,',','.');?>
      </label></td>
  </tr>
  <tr>
    <td colspan="2"><span class="detsend">DESCRIPTION OF SHIPMENT/KETERANGAN ISI : <?php echo $data->DescofShipment;?></span></td>
    <td colspan="2"><span class="detsend">COLLECTED BY X-SYS/DIAMBIL OLE X-SYS</span></td>
    <td colspan="2">   <label style="color:#F00">PERNYATAN PENGIRIMAN :</label>
        <p style="color:#F00">Kami memahami dan menyetujiui bahwa kiriman senilai Rp 1.000.000,- atau lebih harus di asuransikan. Jika tidak di asuransikan, </p>
      </td>
    </tr>
  <tr>
    <td colspan="2"><span class="detsend">DIMENTION/DIMENSI BARANG : <?php echo $data->grandVolume;?></span></td>
    <td colspan="2"><span class="detsend">COLLECTED BY X-SYS/DIAMBIL OLE X-SYS</span></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2"><span class="detsend">SPECIAL INTRUCTION//INSTRUKSI KHUSUS : <?php echo $data->SpecialIntraction;?></span></td>
    <td>DATE/TANGGAL :<?php echo date("d-m-Y",strtotime($data->ETD)); ?></td>
    <td>TIME/JAM :<?php echo date("h:i:s",strtotime($data->ETD)); ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td colspan="2"><p style="font-size:16pt; text-align:center">WE CANNOT DELIVER TO PO.BOX</p>
      <p style="font-size:16pt; text-align:center"><span class="detsend">Kami tidak dapat mengantar PO BOX</span></p></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">dfgddfgdg</td>
    <td>dfggdg</td>
    <td>dfgd</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>
</div>



<div class="row text-center">
<div class="col-sm-12"><h1>&nbsp;</h1></div>

<button class="btn btn-primary btn-large btn-lg" onclick="printContent('nama')"><i class="fa fa-print fa-2x"></i> Print Connote</button>
</div>

</div>



<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</body>
</html>