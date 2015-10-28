<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Track & Trace Sistem -<?php echo isset($title)?$title:'';?></title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


<style type="text/css">
	*{
		font-size: 9px;

	}
	.container{
		width: 80%;
		margin: 0px auto;
		border-left:1px black solid;
		border-bottom:1px black solid;
	}
	.col{ float: left; height: 150px; border:1px black solid;}
.logo{
	width: 10%;
}
.pt{ width: 20%;

}
.desc{ width: 40%;

}
.rinci{ width: 29%;

}
.col-sm{
	border: 1px black solid;
	float: left;
	height:75px;
	width: 49%;
}
.col-md{
	border:1px black solid;
	float: left;
}
.col-left{
	width: 30%;
}
.col-middle{
	width: 40%;
}
.col-right{
	width: 28%;
}
table tr td,table tr th{
border:1px #D2CDCD solid;
border-bottom-color:white;
border-right-color:#0E0D0D;
border-top-color:#0E0D0D;
border-left-color:white;
padding-left:3px;
padding-top:-5px;
}
p{line-height:10px;}
.caps{
text-transform:uppercase;
}
</style>

</head>
  <body>
    
 <div class="container">

<table width="100%" height="431" border="0">

 <tr>
              <th width="17%" rowspan="2">
              <h1>XSYS</h1>
      <p>EXpresindo Network</p>              </th>
              <th width="21%" rowspan="2">
              <h4>PT.EXPRESINDO SYSTEM NETWORK</h4>
              <p>Perkantoran galaxy Blok N.27</p>
              <p>Outer Ringroad Barat</p>
			   <p>Cengkareng -Jakarta Barat 11730</p>
				<p>Telp :021-55950000</p>
				<p>fax :021-55955899
				<p>www.xsysnet.com</p>
      <p>&nbsp;</p></th>
              <td width="19%">
              ORIGINAL/ASAL
      <P><?php echo $_POST['origin'];?></P>              </td>
              <td width="13%">
              DESTINATION/TUJUAN:
      <P><?php echo $_POST['desti'];?></P>              </td>
              <th colspan="2" rowspan="2">
              <P>|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||</P>              
			  <p>121231</p></th>
    </tr>
 <tr>
        <td>
        PIECES/JUMLAH SATUAN
         <P><?php echo $_POST['t_item'];?></P>        </td>
        <td>
        WEIGHT/BERAT
        <P><?php echo $_POST['grossweight'];?></P>        </td>
  </tr>

 <tr>
   <td height="29">Type Of Pyament/Jenis Pembayaran</td>
   <td>Type of Shipment </td>
   <td colspan="2" rowspan="2">By giving us yoyr shipemnt .ou agree with all items and condition of negoitable connote/ dengan menyerahaka kiriman,anda setuju dengan kondisi dan ketentuan pada nota pprnrgiriman ini dengan tanpa bersyarat </td>
   <td colspan="2">Declare Value /Nilai Kiriman </td>
   </tr>
 <tr>

 <td height="29"><label>
   <input type="checkbox" name="checkbox" value="checkbox">
   CASH
   <input type="checkbox" name="checkbox2" value="checkbox">
Credit
<input type="checkbox" name="checkbox3" value="checkbox"> 
COD
</label></td>
  <td><input type="checkbox" name="checkbox4" value="checkbox">
DOC
  <input type="checkbox" name="checkbox5" value="checkbox">
NDX
<input type="checkbox" name="checkbox6" value="checkbox"> 
HVS</td>
   <td width="13%">SERVICE/LAYANAN</td>
     <td width="17%">CHARGES/HARGA(IDR)</td>
 </tr>
 <tr>
   <td height="136" colspan="2"><p><em><u>SHIPPER/PENGIRIM : </u></em></p>
     <p class="caps"><?php echo $_POST['name1'];?></p>
     <p><em><u>ADDRESS/ALAMAT :</u></em></p>
     <p class="caps"><?php echo $_POST['address1'];?></p>
     <p>&nbsp;</p>
     <p>&nbsp;</p>
     <p>PHONE/FAX/TELEPHONE :  <?php echo $_POST['phone1'];?></p>	 </td>
   <td colspan="2" height="136">
   <p><em><u>SHIPPER/PENGIRIM : </u></em></p>
   
   <p class="caps"><?php echo $_POST['name2'];?></p>
   <p><em><u>ADDRESS/ALAMAT  :</u></em></p>
   <p class="caps"><?php echo $_POST['address2'];?></p>
   <p>&nbsp;</p>
   <p>&nbsp;</p>
   <p>PHONE/FAX/TELEPHONE : <?php echo $_POST['phone1'];?></p></td>
   <td><?php 
$i=1;
foreach($tmpcharge as $chr){
        ?>
     <p><?php echo $chr->ChargeName; ?></p>
     <?php $i++; } ?></td>
   <td>xxxxxxxxx</td>
 </tr>
 <tr>
   <td height="42" colspan="2"><p>SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM </p>
     <p>&nbsp;</p></td>
   <td colspan="2"><p>ATTENTION &amp; DEPT/DITUNJUKKAN &amp; DEPT </p>
     <p>&nbsp;</p></td>
   <td>TOTAL/JUMLAH</td>
   <td>&nbsp;</td>
 </tr>
 <tr>
   <td colspan="2"><p>DESCRIPTION OF SHIPMENT/KETERANGAN ISI </p>
     <p>&nbsp; </p></td>
   <td colspan="2"><p>COLECTED BY AXYS/DIAMBIL OLEH X-SYS</p>
     <p>&nbsp; </p></td>
   <td colspan="2"><p>PERNATAAN PENGIRIM:</p>
     <p>Kami memahami dan menyetujui bahwa kiriman RP 1.000.000,- atau lebih harus di asuransikan.Jika tidak diasuransikan maka X-SYS hanya akan memberikan ganti rugi maksimal 10(sepuluh) kali biaya kirim </p></td>
   </tr>
 
 <tr>
   <td colspan="2"><p>DIMENTION/DIMENSI BARANG </p>
     <p>&nbsp; </p></td>
   <td><p>DATE/TANGGA : </p>
     <p><?php echo date( 'd/m/Y');?></p></td>
   <td><p>TIME/JAM</p>
     <p><?php echo time();?></p></td>
   <td colspan="2" rowspan="2"><p>Receiver already receve this package in good condition/penerima telah menerima titipan ini dalam keadaan abaik dan benar.</p>
     <p>DATE/TANGGAL :..........................TIME//JAM:......................</p>
     <p>NAME/NAMA .....................................................................</p>
     <p>&nbsp;</p>     <p>SIGNATURE &amp; SAMP / TANDA TANGAN &amp; STEMPEL   </p></td>
   </tr>
 <tr>
   <td colspan="2"><p>SPECIAL INSTRUCTION/INSTRUKSI KHUSUS </p>
     <p>&nbsp;</p></td>
   <td colspan="2"><p align="center"><b>WE CANNOT DELIVER TO P.O.BOX</b></p>
     <p align="center">Kami tidak dapat mengantar alamt PO Box  </p>
     <p>&nbsp;</p></td>
   </tr>
</table>


<br style="clear:both;">
  </div>        
  </body>
</html>
