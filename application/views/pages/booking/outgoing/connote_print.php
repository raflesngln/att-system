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
<title>&nbsp;</title>
<style type="text/css">
a[href]:after {
   content: initial;
}
*{font-size:8px;}
P{ margin-top:-6px;}

#mytable{
	width:100%;
	margin-top:0px;
	border:0.5px #666 solid;
}
#mytable tr td{
	border-left:1px #666 solid;
	border-bottom:1px #666 solid;
	padding-left:3px;
	padding-top:2px;
}
footer{display:none;}
.note{ margin-top:-18px;}
.special{margin-top:-33px;}
.lbl{font-size:8px;}
.lbl-footer{font-size:7px;}
</style>
</head>

<body>

<div class="container">

<div id="nama">
    <?php foreach($connote as $data){
		$kode=$data->HouseNo;

		 ?>
<table width="97%" border="0" id="mytable">
  <tr>
    <td width="135" rowspan="2" style="background-color:#E6FFE6"><p style="font-size:20pt; color:#800040; text-align:center">XSYS</p>
      <p align="center" style="font-family:'Comic Sans MS', cursive">Express Network</p></td>
    <td width="187" rowspan="2" style="text-align:center; background-color:#E6FFE6">
    <p style="margin-top:2px"><strong>PT.Expresindo System Network</strong></p>
      <p>perkantoran Galaxy Blok N-27</p>
      <p>Outer Ring Road Barat</p>
      <p>Cengkareng-Jakarta Barat 11730</p>
          <p>Telp :021-55950000</p>
    <p>Fax :021-55955899</p>
    <p>xsysnet.com</p>
      </td>
    <td width="217">
    <div style="margin-top:-26px;">
    <p>ORIGINAL/ASAL</p>
    <p><?php echo $data->Origin;?></p>
    </div>
      </td>
    <td width="440">
     <div style="margin-top:-26px;">
    <p>DESTINATION/TUJUAN</p>
      <p><?php echo $data->Destination;?></p>
      </div>
      </td>
    <td colspan="2" rowspan="2" style="text-align:center"><img src="index.php/barcode/gambar/<?php echo $kode;?>" height="70" width="200">

      <p>&nbsp;</p></td>
    </tr>
  <tr>
    <td height="62"><p>PIECES/JUMLAH SATUAN</p>
      <p align="center"><?php echo $data->grandPCS;?></p></td>
    <td><p>WEIGHT/BERAT</p>
      <p align="center"><?php echo $data->GrossWeight;?></p></td>
  </tr>
  <tr>
    <td colspan="2">Account No.</td>
    <td colspan="2" rowspan="3"><div class="note">By giving us shipment you agree of all itemsof conditions of nonNegoitable Connote /Dengan menyerahkan kiriman anda setuju dengan ketentuan dan kondisi pada nota pengiriman ini tanpa syarat, termasuk kondisi dan ketentuan yang tertera pada bagian belakang.menyerahkan kiriman anda setuju dengan kondisi dan ketentuan pada nota ini.</div></td>
    <td colspan="2">DECLARE VALUE/NILAI KIRIMAN</td>
    </tr>
  <tr>
   <?php
	$paycode=$data->PayCode;
	if($paycode=='CSH-CASH'?$cek1='checked="checked"':$cek1='');
	if($paycode=='CRD-CREDIT'?$cek2='checked="checked"':$cek2='');
	?>
    <td><span class="lbl" style="font-size:7px">TYPE OF PAYMENT/JENIS PEMABAYARAN</span></td>
    <td><span class="lbl" style="font-size:7px">TYPE OF SHIPMENT/JENIS KIRIMAN</span></td>
    <td colspan="2" rowspan="3">
    <table  width="100%" border="0" style="border:none; margin-top:-44px; width:100%; margin-left:-4PX">
      <tr>
        <td width="150" height="75">SERVICE/LAYANAN</td>
        <td width="60">CHARGES/HARGA(IDR)</td>
        </tr>
      <?php foreach($charges as $row){
		$unit=$row->Unit;
		$qty=$row->Qty;
		$total=$unit*$qty;
		$grantotal+=$total;
		 ?>
      <tr>
        <td width="150"><?php echo $row->ChargeName;?></td>
        <td width="60" style="text-align:right"><?php echo number_format($total,0,'.',',');?></td>
        </tr>
      <?php } ?>
</table></td>
    </tr>
  <tr>
    <td>
   <span class="lbl"> <input type="checkbox" <?php echo $cek1;?>/>Cash</span>
  <label for="select12"></label>
 <span class="lbl"> <input type="checkbox" <?php echo $cek2;?>/>Credit</span>
<label for="select13"></label>
<span class="lbl">
<input type="checkbox" />COD </span>
</td>
    <td>
    <span class="lbl"><input type="checkbox" />DOC</span>
      <label for="select14"></label>
      <span class="lbl"><input type="checkbox" />NDX</span>
      <label for="select15"></label>
     <span class="lbl"> <input type="checkbox" />HVS</span>
     
     </td>
    </tr>
  <tr>
    <td colspan="2">
     <?php
	foreach($shipper as $ship){
	?>
    <p style="margin-top:3px">SHIPMENT/PENGIRIM</p>
    <p><?php echo $ship->custName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $ship->Address;?></p>
      <p>PHONE/TELEPHONE/FAX  :<?php echo $ship->Phone;?></p>      
     
    <?PHP } ?>
    </td>
    <td colspan="2">
  <?php
	foreach($consigne as $con){
	?>
      <p style="margin-top:3px">RECEIVE/PENERIMA</p>
      <p><?php echo $con->custName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $con->Address;?></p>
      <p> PHONE/TELEPHONE/FAX : <?php echo $con->Phone;?></p>
      
      <?PHP } ?> 
    </td>
    </tr>
  <tr>
    <td colspan="2"><p class="detsend" style="margin-top:-2px;"> SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM :</p>
      <p class="detsend">&nbsp; </p></td>
    <td colspan="2"><div style="margin-top:-12px;"> ATTENTION & DEPT/DITUJUKAN & DEPT:</div></td>
    <td width="170">TOTAL/JUMLAH</td>
    <td width="143" style="text-align:right"><strong><?php echo 'Rp   '. number_format($grantotal,0,',','.').',-';?></strong>&nbsp;
      </td>
  </tr>
  <tr>
    <td colspan="2"><p class="detsend">DESCRIPTION OF SHIPMENT/KETERANGAN ISI : </p>
      <p class="detsend"><?php echo $data->DescofShipment;?></p></td>
    <td colspan="2" rowspan="2"><div style="margin-top:-38px;">COLLECTED BY X-SYS/DIAMBIL OLE X-SYS</div></td>
    <td colspan="2">   <label style="color:#F00">PERNYATAN PENGIRIMAN :</label>
        <p style="color:#F00">Kami memahami dan menyetujiui bahwa kiriman senilai Rp 1.000.000,- atau lebih harus di asuransikan. Jika tidak di asuransikan, </p>
      </td>
    </tr>
  <tr>
    <td colspan="2"><p class="detsend" style="margin-top:2px;">DIMENTION/DIMENSI BARANG : </p>
      <p class="detsend"><?php echo $data->grandVolume;?></p>
      </td>
    <td colspan="2" rowspan="3"><div class="det" style="margin-top:-4px">
      <p> Receiver Already receive this package in good condition/Penerima telah menerima titipan ini dengan keadaan baik dan benar.</p>
      
      <p>DATE/TANGGAL.....................TIME/JAM...........</p>
      <p>NAME/NAMA :.................</p>
      <p>SIGNATURE & STAMP/TANDA TANGAN DAN STEMPEL : </p>
      
    </div></td>
    </tr>
  <tr>
    <td colspan="2" rowspan="2"><div class="special">
      <p>SPECIAL INTRUCTION//INSTRUKSI KHUSUS : </p>
      <?php echo $data->SpecialIntraction;?></div></td>
    <td>DATE/TANGGAL :<?php echo date("d-m-Y",strtotime($data->CreateDate)); ?></td>
    <td>TIME/JAM :<?php echo date("h:i:s",strtotime($data->CreateDate)); ?></td>
    </tr>
  <tr>
    <td height="48" colspan="2"><p style="font-size:12pt; text-align:center">WE CANNOT DELIVER TO PO.BOX</p>
      <p style="font-size:16pt; text-align:center"><span class="detsend">Kami tidak dapat mengantar PO BOX</span></p></td>
  </tr>
  </table>
<?php } ?>

  
<div class="lbl-footer">
<label><em>1. Original/Aslu : Shipper/Pengirim</em></label> 
<em>
<label>2. Blue/Biru : Operational/Operasional</label> 
<label>3. Green/Hijau : Accounting/ Accounting</label> 
<label>4. Yello/Kuning : Return POD/POD Kembali</label> 
<label>5. Red/Merah : Receiver/ Penerima</label> 
</em>
</div>
</div>



<div class="row text-center">
<div class="col-sm-12"><p>&nbsp;</p></div>

<button class="btn btn-primary btn-large btn-lg" onclick="printContent('nama')"><i class="fa fa-print fa-1x"></i> Print Connote</button>
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