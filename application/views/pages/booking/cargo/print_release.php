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
<h2 style="text-align:center">Cargo Release</h2>
<h3>PT. ATT Cargo</h3>
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<table width="800" border="0" id="tabel">
  <tr>
    <td width="21%"><strong>No Release</strong></td>
    <td width="19%">:<span class="span7"><strong><?php echo ' '.$row->CargoReleaseCode; ?></strong></span></td>
    <td width="38%"><p style="color:#FFF">.....................................................................</p></td>
    <td width="20%">Created Date</td>
    <td width="11%">: <?php echo date("d-m-Y / h:i:s",strtotime($row->CreatedDate)); ?></td>
  </tr>
  <tr>
    <td>Date</td>
    <td>: <span class="span7"><?php echo date('d-m-Y',strtotime($row->ReleaseDate)); ?></span></td>
    <td></td>
    <td>Printed Date</td>
    <td> : <?php echo date("d-m-Y / h:i:s"); ?></td>
  </tr>
  <tr>
    <td>Airline</td>
    <td>: <span class="span7"><?php echo $row->AirLineName; ?></span></td>
    <td>&nbsp;</td>
    <td>Printed By</td>
    <td>: <?php echo $this->session->userdata('nameusr');?></td>
  </tr>
  <tr>
    <td>Details</td>
    <td>: <span class="span7"><?php echo $row->CargoDetails; ?></span></td>
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


<table width="" border="0" class="mytable" style="width:98%">
  <tr style="background:#EBEBEB">
    <td style="border-top:2px #999 solid; padding:10px 15px">No</td>
    <td style="border-top:2px #999 solid; padding:10px 15px; width:100px">SMU</td>
    <td style="border-top:2px #999 solid; padding:10px 15px;width:100px">Flight No</td>
    <td style="border-top:2px #999 solid; padding:10px 15px;width:100px">ETD</td>
    <td style="border-top:2px #999 solid; padding:10px 15px;width:30px">PCS</td>
    <td style="border-top:2px #999 solid; padding:10px 15px;width:30px">CWT</td>
  </tr>
   <?php 
 $no=1;
 foreach($smu_list as $row){
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
	 
	 $pcs=$row->PCS;
	 $t_pcs+=$pcs;

        ?>
  <tr>
    <td height="26" ><?php echo $no;?></td>
    <td ><?php echo $row->smu; ?></td>
    <td ><?php echo $row->FlightNo; ?></td>
    <td ><?php echo date('d-m-Y',strtotime($row->ETD)); ?></td>
    <td style="text-align:right; padding-right:5px"><?php echo $row->PCS; ?></td>
    <td style="text-align:right; padding-right:5px"><?php echo $row->CWT; ?></td>
  </tr>
  <?php $no++; } ?>
  <tr>
    <td colspan="4"><div align="left"><strong>Total &nbsp; </strong></div></td>
    <td style="text-align:right"><strong><?php echo $t_pcs; ?></strong></td>
    <td style="text-align:right"><strong><?php echo $t_cwt; ?></strong></td>
  </tr>
</table>

<br />
<table width="100%" border="0" id="foottabel">
  <tr>
    <td style="width:150px"><div align="center">Created By</div></td>
    <td style="width:270px; margin-left:30px"><div align="center">Carried By</div></td>
    <td style="width:270px; margin-left:30px"><div align="center">Received  By</div></td>
  </tr>
        <?php 
 $no=1;
 foreach($header as $row){

        ?>
  <tr>
    <td><p align="center">&nbsp;</p>
    <p align="center"><u><?php echo $this->session->userdata('nameusr');?></u></p></td>
    <td><p align="center">&nbsp;</p>
    <p align="center"><u><?php echo $row->CarriedBy; ?></u></p></td>
    <td><p align="center">&nbsp;</p>
    <p align="center"><u><?php echo $row->ReceivedBy; ?></u></p></td>
  </tr>
  <?php } ?>
</table>
</body>
</html>