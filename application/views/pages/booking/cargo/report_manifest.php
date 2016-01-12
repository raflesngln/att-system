<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:10px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid;
}
.header tr td{border-top:1px #9F3 solid;}
h2{font-size:18px;}
h3{text-align:center; font-size:12px; margin-top:-10px; font-weight:normal}
p{ margin-top:-8px}
</style>
</head>

<body>
<h2 style="text-align:center">Laporan Periode Cargo Manifest</h2>
<h3>PT. Expresindo System Network</h3>
<h3>Periode :  <?php echo $periode;?></h3>

<p>Cabang	&nbsp;  :</p>
<p>Kantor	&nbsp;  :</p>
<p>Tujuan	&nbsp;  :</p>
<p>Pengguna	&nbsp;  :</p>

       <?php 
 $no=1;
 foreach($header as $row){

        ?>

<?php } ?>


<table width="200" border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">No Cargo</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Tanggal</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Tujuan</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Referensi</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Transit</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Keterangan</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Realisasi berat</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Total Berat</td>
  </tr>
 <?php 
 $no=1;
 foreach($list_cargo as $items){
	 $total_berat+=$items->total_berat;
	 $total_realisasi+=$items->realisasi_berat;
        ?>
  <tr>
    <td ><?php echo $items->CargoNo;?></td>
    <td ><?php echo date("d-m-Y",strtotime($items->tgl_cargo)); ?></td>
    <td ><?php echo $items->tujuan;?></td>
    <td ><?php echo $items->referensi;?></td>
    <td ><?php echo $items->transit;?></td>
    <td><?php echo $items->transit;?></td>
    <td>&nbsp; &nbsp; &nbsp;<?php echo number_format($items->realisasi_berat,0,'.','.');?></td>
    <td>&nbsp; &nbsp; &nbsp;<?php echo number_format($items->total_berat,0,'.','.');?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="7">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td colspan="6"><div align="right"><strong>Total :&nbsp; </strong></div></td>
    <td><strong>&nbsp; &nbsp; &nbsp;<?php echo number_format($total_realisasi,0,'.','.');?></strong></td>
    <td><strong>&nbsp; &nbsp; &nbsp;<?php echo number_format($total_berat,0,'.','.');?></strong></td>
  </tr>
</table>

</body>
</html>