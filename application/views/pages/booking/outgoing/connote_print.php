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
*{font-size:7px;}
P{ margin-top:-6px;}

#mytable{
	width:98%;
	margin-top:0px;
	border:none;
}
#mytable tr td{
	padding-left:2px;
	padding-top:1px;
	border:1px #CCC solid;
}
footer{display:none;}
.note{ margin-top:-2px;}
.special{margin-top:-18px;}
.special p{margin-top:-4px;}
.lbl{font-size:5px; float:left}
.lbl-footer{font-size:5px; font-style:italic; font-weight:normal}
</style>
</head>

<body>

<div class="container">

<div id="konten">
    <?php foreach($connote as $data){
		$kode=$data->HouseNo;

		 ?>
<table width=""  id="mytable" style="border:1px #CCC solid">
  <tr>
    <td colspan="2" rowspan="2" style="background-color:#E6FFE6"><p style="font-size:15pt; color:#800040; text-align:center">XSYS</p>
      <p align="center" style="font-family:'Comic Sans MS', cursive">Express Network</p>
    </td>
    <td width="122">
      <div style="margin-top:5px;">
        <p>ORIGIN/ASAL</p>
        <p><?php echo $data->Origin;?></p>
        </div>
    </td>
    <td width="144">
     <div style="margin-top:5px;">
    <p>DESTINATION/TUJUAN</p>
      <p><?php echo $data->Destination;?></p>
      </div>
      </td>
    <td colspan="2" rowspan="2" style="text-align:center"><img src="index.php/barcode/gambar/<?php echo $kode;?>" height="35" width="150">

      <p>&nbsp;</p></td>
    </tr>
  <tr>
    <td height="22">PCS/JUMLAH : <?php echo $data->PCS;?>
      </td>
    <td>WEIGHT/BERAT : <?php echo $data->CWT;?>
      </td>
  </tr>
  <tr>
    <td colspan="2">Account No.</td>
    <td colspan="2" rowspan="3">
    <div class="note">By giving us shipment you agree of all itemsof conditions of non Negoitable Connote /Dengan menyerahkan kiriman anda setuju dengan ketentuan dan kondisi pada nota pengiriman ini tanpa syarat, termasuk kondisi dan ketentuan yang tertera pada bagian belakang.menyerahkan kiriman anda setuju dengan kondisi dan ketentuan pada nota ini.</div>
    </td>
    <td colspan="2" style="border-bottom:1px #FFF solid">&nbsp;</td>
    </tr>
  <tr>
   <?php
	$paycode=$data->PayCode;
	if($paycode=='CSH-CASH'?$cek1='checked="checked"':$cek1='');
	if($paycode=='CRD-CREDIT'?$cek2='checked="checked"':$cek2='');
	?>
    <td width="91"><span class="lbl" style="font-size:5px">TYPE OF PAYMENT/JENIS PEMBAYARAN</span></td>
    <td width="100"><span class="lbl" style="font-size:5px">TYPE OF SHIPMENT/JENIS KIRIMAN</span></td>
    <td colspan="2" rowspan="3">
    <table  width="95%" border="0" style="border:none; margin-top:-6px; width:100%; margin-left:-1PX">
      <tr>
        <td height="34" colspan="2" style="border-left:none; border-top:none; border-right:none">
        <label>DECLARE VALUE/NILAI KIRIMAN :<?php echo $data->DeclareValue;?></label><br />
        <label>SERVICE/LAYANAN : <?php echo $data->Service;?></p>
          <label id="charge-header">CHARGES/HARGA(IDR)</label></td>
        </tr>
      <?php foreach($charges as $row){
		$unit=$row->Unit;
		$total=$row->Total;
		$grantotal+=$total;
		 ?>
      <tr>
        <td width="150" style="border-left:none"><?php echo $row->ChargeName;?></td>
        <td width="60" style="text-align:right; border-right:none"><?php echo number_format($row->Total,0,'.',',');?> &nbsp;</td>
        </tr>
      <?php } ?>

  <tr>
  
  </tr>
</table></td>
    </tr>
  <tr>
    <td>
   <span class="lbl"> <input style="height:6px" type="checkbox" <?php echo $cek1;?>/>Cash</span>
  <label for="select12"></label>
 <span class="lbl"> <input style="height:6px" type="checkbox" <?php echo $cek2;?>/>Credit</span>
<label for="select13"></label>
<span class="lbl">
<input style="height:6px" type="checkbox"/>COD </span>
</td>
    <td>
    <span class="lbl"><input style="height:6px" type="checkbox" />DOC</span>
      <label for="select14"></label>
      <span class="lbl"><input style="height:6px" type="checkbox" />NDX</span>
      <label for="select15"></label>
     <span class="lbl"> <input style="height:6px" type="checkbox" />HVS</span>
     
     </td>
    </tr>
  <tr>
    <td colspan="2">
     <?php
	foreach($shipper as $ship){
	?>
    <p style="margin-top:3px">SHIPPER/PENGIRIM</p>
    <p><?php echo $ship->CustName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $ship->Address;?></p>
      <p>PHONE/TELEPHONE/FAX  :<?php echo $ship->Phone;?></p>      
     
    <?PHP } ?>
    </td>
    <td colspan="2">
  <?php
	foreach($consigne as $con){
	?>
      <p style="margin-top:3px">CONSIGNEE/PENERIMA</p>
      <p><?php echo $con->CustName;?></p>
      <p>ADDRESS/ALAMAT</p>
      <p><?php echo $con->Address;?> </p>
      <p> PHONE/TELEPHONE/FAX : <?php echo $con->Phone;?></p>
      
      <?PHP } ?> 
    </td>
    </tr>
  <tr>
    <td colspan="2" style="height:7px"><p class="detsend" style="margin-top:0px;"> SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM :</p>
      </td>
    <td colspan="2"><div style="margin-top:-12px;"> ATTENTION & DEPT/DITUJUKAN & DEPT:</div></td>
    <td width="93" style="border-right:none;">
    <label style="border-bottom:1px #CCC dashed; width:100%">Diskon</label>
    <br style="clear:both" />
    <label>TOTAL/JUMLAH</label>
    
    </td>
    
    <td width="115" style="text-align:right; border-left:none">
    <label style="border-bottom:1px #CCC dashed; width:100%; text-align:right"><?php echo 'Rp   '. number_format($data->Discount,0,',','.').',-';?></label>
    <br style="clear:both" />
     <?php echo 'Rp   '. number_format($data->Amount,0,',','.').',-';?>  &nbsp;
      </td>
  </tr>
  <tr>
    <td colspan="2"><p style="margin-top:3px">DESCRIPTION OF SHIPMENT/KETERANGAN ISI : </p>
      <p class="detsend"><?php echo $data->DescofShipment;?></p></td>
    <td colspan="2" rowspan="2"><div style="margin-top:-38px;">COLLECTED BY X-SYS/DIAMBIL OLEH X-SYS</div></td>
    <td colspan="2">   <label style="color:#F00">PERNYATAN PENGIRIMAN :</label>
        <p style="color:#F00; font-style:italic">Kami memahami dan menyetujiui bahwa kiriman senilai Rp 1.000.000,- atau lebih harus di asuransikan. Jika tidak di asuransikan, </p>
      </td>
    </tr>
  <tr>
    <td colspan="2"><p class="detsend" style="margin-top:2px;">DIMENSION/DIMENSI BARANG : </p>
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
      <p style="margin-top:-9px"><?php echo $data->SpecialIntraction;?></p>
      </div></td>
    <td>DATE/TANGGAL :
    <br />
	<?php echo date("d-m-Y",strtotime($data->CreateDate)); ?></td>
    <td>TIME/JAM : <br />
	<?php echo date("h:i:s",strtotime($data->CreateDate)); ?></td>
    </tr>
  <tr>
    <td height="48" colspan="2"><p style="font-size:9pt; margin-top:1px; text-align:center">WE CANNOT DELIVER TO PO.BOX</p>
      <p style="font-size:16pt; text-align:center"><span class="detsend">Kami tidak dapat mengantar PO BOX</span></p></td>
  </tr>
  </table>
<?php } ?>

  
<div class="lbl-footer">
<label><em>1. Original/Aslu : Shipper/Pengirim</em></label> 
<em>
<label>2. Blue/Biru:Operational/Operasional</label> 
<label>3. Green/Hijau:Accounting/ Accounting</label> 
<label>4. Yello/Kuning:Return POD/POD Kembali</label> 
<label>5. Red/Merah:Receiver/ Penerima</label> 
</em>

<div class="lbl-footer">
    <label> PT.Expresindo System Network </label>
    <label>&nbsp; perkantoran Galaxy Blok N-27</label>
    <label>&nbsp; Outer Ring Road Barat</label>
    <label>&nbsp; Cengkareng-Jakarta Barat 11730</label>
    <label>&nbsp; Telp :021-55950000</label>
    <label>&nbsp; Fax :021-55955899</label>
    <label>&nbsp; xsysnet.com</label>
    </div>
    
</div>
</div>



<div class="row text-center">
<div class="col-sm-12"><p>&nbsp;</p></div>

<button class="btn btn-primary btn-small btn-mini" onclick="printContent('konten')"><i class="fa fa-print fa-1x"></i> Print Connote</button>


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