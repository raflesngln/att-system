<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Track & Trace Sistem -<?php echo isset($title)?$title:'';?></title>

    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />


<style type="text/css">
	*{
		font-size: 10px;

	}
	.container{
		width: 80%;
		margin: 0px auto;
	}
	

table tr td,table tr th{
border:1px #D2CDCD solid;
border-bottom-color:white;
border-right-color:#0E0D0D;
border-top-color:#0E0D0D;
border-left-color:white;
padding-left:3px;
padding-top:-25px;
}
p{line-height:10px; padding-top:-25px;}
.caps{
text-transform:uppercase;
}
.txtlogo,.x{font-size:x-large;color:#009966 }
.x{ font-size:xx-large; color:#FF0000; font-family:"Courier New", Courier, monospace}
.industryname{color:#FF0000;}
.charge,.charge-r{line-height:20px; border-right-color:#FFFFFF; border-bottom:1px #666666 solid;}
.ket li{list-style:none; float:left; margin-left:23px; margin-top:2px; margin-bottom:9px;}

</style>

</head>
<body>

<div class="container"><?php 
$content = ob_get_clean();

?>
<table width="100%" height="953" border="0">

 <tr>
              <td width="17%" rowspan="2" bgcolor="#F4F4F4" style=" border-left:1px black solid;">
			 <div class="industry" style=" margin-top:-45px; text-align:center">
			               <p class="txtlogo"><label class="x">X</label>SYS</p>
      <p class="industryname">E x p r e s s &nbsp;  N e t w o r k</p>  
			 </div>
    </td>
              <td width="21%" rowspan="2" bgcolor="#F4F4F4">
<div class="industry" style=" margin-top:-45px; text-align:center">
  			<p>&nbsp;PT.EXPRESINDO SYSTEM NETWORK</p>
                <p>Perkantoran galaxy Blok N.27</p>
              <p>Outer Ringroad Barat</p>
			   <p>Cengkareng -Jakarta Barat 11730</p>
				<p>Telp :021-55950000</p>
				<p>fax :021-55955899
				<p>www.xsysnet.com</p>
   </div>
              

      </td>
    <td width="19%">
	<div class="ori" style="float:left; margin-top:-25px">
   ORIGINAL/ASAL :
   <p><?php echo $_POST['origin'];?></p>  
   </div>
              
    </td>
              <td width="13%">
			 	<div class="ori" style="float:left; margin-top:-25px">
    DESTINATION/TUJUAN :
   <P><?php echo $_POST['desti'];?></P>   
   </div>
             
    </td>
              <td colspan="2" rowspan="2">
			  <div class="ori" style="margin-top:-25px; text-align:center">
			    <P>|||||||||||||||||||||||||||||||</P>              
			  <p>121231</p>
			  </div>
            
			  </td>
  </tr>
 <tr>
    <td width="19%">
	<div class="ori" style="float:left; margin-top:-25px">
   ORIGINAL/ASAL :
   <p><?php echo $_POST['origin'];?></p>  
   </div>
              
    </td>
    <td width="19%">
	<div class="ori" style="float:left; margin-top:-45px">
   ORIGINAL/ASAL :
   <p><?php echo $_POST['origin'];?></p>  
   </div>
              
    </td>
  </tr>

 <tr>
   <td height="15" colspan="2" style=" border-left:1px black solid;">Account No. </td>
   <td colspan="2" rowspan="3"><p align="justify">By giving us your shipent .You agree of all items and condition of negoitable Connote / dengan menyerahaka kiriman,anda setuju dengan kondisi dan ketentuan pada nota pengiriman ini dengan tanpa bersyarat . Termasuk ketentuan dan kondisi yang tertera Pada bagian Belakang. Menyerahkan kiriman,Anda setuju dengan ketentuan dan kondisi dengan Nota ini. </p>
     <p>&nbsp;</p>
     <p>&nbsp; </p></td>
   <td colspan="2" rowspan="2">Declare Value /Nilai Kiriman </td>
 </tr>
 <tr>
   <td height="29" style=" border-left:1px black solid;">Type Of Pyament/Jenis Pembayaran</td>
   <td>Type of Shipment </td>
   </tr>
 <tr>

 <td height="29" style=" border-left:1px black solid;"><label>
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
   <td height="136" colspan="2" style=" border-left:1px black solid;"><p><em><u>SHIPPER/PENGIRIM : </u></em></p>
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
   <td colspan="2">
   <div class="kotak" style="top:0px; padding-top:-22px; margin-top:-72px;">
   <?php foreach($tmpcharge as $row){ ?>
   <div class="charge" style="float:left; width:42%;">
   <?=$row->ChargeName;?>
   </div>
   <div class="charge-r" style="float:left; width:56%">
   <div style="float:right"><?=number_format($row->Total,2,'.',',');?></div>
   </div>
   <?php } ?>
   <br style="clear:both">
   </div>   </td>
 </tr>
 <tr>
   <td height="42" colspan="2" style=" border-left:1px black solid;"><p>SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM </p>
     <p>.....................</p>
     <p>&nbsp;</p></td>
   <td colspan="2" rowspan="2">

<div class="ori" style="margin-top:-120px; float:left; text-align:center">
<p>ATTENTION &amp; DEPT/DITUNJUKKAN &amp; DEPT </p>
</div> 
	 </td>
   <td>TOTAL/JUMLAH</td>
   <td><div align="right"><strong>
     <?="Rp " .number_format($_POST['total_charge'],2,'.',',');?>
&nbsp;&nbsp;</strong></div></td>
 </tr>
 <tr>
   <td colspan="2" style=" border-left:1px black solid;">
   <div class="ori" style="float:left; margin-top:-85px">
   <p>DESCRIPTION OF SHIPMENT/KETERANGAN ISI </p>
     <p><?=$_POST['description'];?></p>
   </div>
   </td>
   <td colspan="2"><p style="color:#FF0000">PERNYATAAN PENGIRIM:</p>
     <p style="color:#FF0000">Kami memahami dan menyetujui bahwa kiriman Rp 1.000.000,- atau lebih harus di asuransikan.Jika tidak diasuransikan maka X-SYS hanya akan memberikan ganti rugi maksimal 10(sepuluh) kali biaya kirim </p></td>
   </tr>
 
 <tr>
   <td colspan="2" rowspan="2" style=" border-left:1px black solid;"><p>DIMENTION/DIMENSI BARANG </p>
     <p>
       <?=$_POST['special'];?>
    </p>     <p>&nbsp; </p></td>
   <td colspan="2">COLECTED BY AXYS/DIAMBIL OLEH X-SYS</td>
   <td colspan="2" rowspan="3" style="border-bottom-color:#666666"><p>Receiver already receve this package in good condition/penerima telah menerima titipan ini dalam keadaan baik dan benar.</p>
      <p>DATE/TANGGAL :.................TIME//JAM:...........................</p>
      <p>NAME/NAMA .....................................................................</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
      <p>&nbsp;</p>
     <p>SIGNATURE &amp; SAMP / TANDA TANGAN &amp; STEMPEL   </p></td>
 </tr>
 <tr>
   <td>DATE/TANGGAL : <?php echo date( 'd/m/Y');?></td>
   <td>TIME/JAM : <?php echo time();?></td>
 </tr>
 
 <tr>
   <td height="118" colspan="2" style=" border-left:1px black solid; border-bottom:1px black solid;"><p>SPECIAL INSTRUCTION/INSTRUKSI KHUSUS </p>
     <p>
       <?=$_POST['special'];?>
     </p>
     <p>&nbsp;</p>
   <td colspan="2" style="border-bottom-color:#666666"><p align="center"><b>WE CANNOT DELIVER TO P.O.BOX</b></p>
     <p align="center">Kami tidak dapat mengantar alamt PO Box  </p>
     <p>&nbsp;</p></td>
   </tr>
</table>


<br style="clear:both;">
 </div>   
<ul class="ket">
<li>1. Original/Aslu : Shipper/Pengirim</li> 
<li>2. Blue/Biru : Operational/Operasional</li> 
<li>3. Green/Hijau : Accounting/ Accounting</li> 
<li>4. Yello/Kuning : Return POD/POD Kembali</li> 
<li>5. Red/Merah : Receiver/ Penerima</li> 


       
  </body>
</html>
