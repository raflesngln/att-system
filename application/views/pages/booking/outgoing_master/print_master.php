<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>
*{
	font-size:12px;
}
.tabelll{
	width:900px;
}
.mytable tr td{ border-bottom:1px #999 solid;
}
.header tr td{border-top:1px #9F3 solid;}
h3{text-align:center; font-size:14px; margin-top:-10px}
</style>
</head>

<body>
<h2 style="text-align:center">Cargo Manifest</h2>
<h3>PT. Expresindo System Network</h3>
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<table width="800" border="0" id="tabel">
  <tr>
    <td width="29%">No Cargo</td>
    <td width="26%">: <strong><?php echo $row->CargoNo;?></strong></td>
    <td width="33%"><p style="color:#FFF">.....................................................................</p></td>
    <td width="33%">Dibuat Oleh</td>
    <td width="12%">: <?php echo $this->session->userdata('usnm');?></td>
  </tr>
  <tr>
    <td>Tanggal</td>
    <td>: <?php echo $row->total_berat;?></td>
    <td></td>
    <td>Tanggal Dibuat</td>
    <td> : <?php echo date("d-m-Y / h:i:s",strtotime($row->CreateDate)); ?></td>
  </tr>
  <tr>
    <td>Referensi</td>
    <td>: <?php echo $row->referensi;?></td>
    <td>&nbsp;</td>
    <td>Dicetak Oleh</td>
    <td>: <?php echo $this->session->userdata('usnm');?></td>
  </tr>
  <tr>
    <td>Tujuan</td>
    <td>: <?php echo $row->tujuan;?></td>
    <td>&nbsp;</td>
    <td>Tggl Cetak</td>
    <td>: <?php echo date("d-m-Y / h:i:s",strtotime(now)); ?></td>
  </tr>
  <tr>
    <td>Trasnit</td>
    <td> : <?php echo $row->transit;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Keterangan</td>
    <td>: <?php echo $row->keterangan;?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Berat</td>
    <td>: <?php echo $row->total_berat;?> kgs</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>


<table width="200" border="0" class="mytable">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">No</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">No Cnote</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Date</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Origin</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Destination</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Service</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">Volume</td>
    <td style="border-top:2px #999 solid; padding:10px 15px"">CWT</td>
  </tr>
   <?php 
 $no=1;
 foreach($list as $items){
	 $berat=$items->Berat;
	 $t_berat+=$berat;
	 $cwt=$items->CWT;
	 $t_cwt+=$cwt;

        ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td ><?php echo $items->HouseNo;?></td>
    <td ><?php echo date("d-m-Y",strtotime($items->date_insert)); ?></td>
    <td ><?php echo $items->Origin;?></td>
    <td ><?php echo $items->Destination;?></td>
    <td><?php echo $items->Service;?></td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo $items->Berat;?></td>
    <td style="text-align:right">&nbsp; &nbsp; &nbsp;<?php echo $items->CWT;?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="6"><div align="left"><strong>Total &nbsp; </strong></div></td>
    <td style="text-align:right"><strong><?php echo $t_berat;?></strong></td>
    <td style="text-align:right"><strong><?php echo $t_cwt;?></strong></td>
  </tr>
</table>

</body>
</html>