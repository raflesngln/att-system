<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>

            @font-face {
                font-family: code39;
				src:url(<?php echo base_url();?>asset/Bar-Code_39/Code39.ttf);
            }
			
			
*{ font-size:10px;}
.bx{margin-top:-5px;}
.bx-sm{margin-top:-2px; position:relative}

table{border:1px #666 solid;}
table tr td{border: 1px solid #B1ACAC;

}
.bx-com{
	border:1px #FFF solid;
}
.bx-com p{
	text-align:center;
	line-height:-5px;
}
.bx-log{
	text-align:center;
}
.bx-log .x{
	font-size:xx-large;	
}
.bx-log .name{margin-top:-22px; color:#F00;}
</style>
</head>

<body>
<table width="200" border="0">
  <tr>
    <td bgcolor="#EFEFEF">
    <div class="bx-log">
  <p style="font-size:20pt; color:#3C0"> XSYS</p>
    <p class="name">E x p r s e s  &nbsp;  N e t w o r k</p>
    </div>
    </td>
    <td bgcolor="#EFEFEF">
    <div class="bx-com">
    <label style="text-align:center">PT.EXPRESINDO SYSTEM NETWORK</label>
    
    <p>Perkantoran Galaxy Blok N,27</p>
    <p>Outer Ring Road Barat</p>
    <p>Cengkareng Jakrata BArat 11720</p>
    <p>Telp :021-55950000</p>
    <p>Fax :021-55955899</p>
    <p>xsysnet.com</p>
    </div>
    </td>
    <td>
    <div class="bx-sm">
    <u><em><label>ORIGINAL/ASAL :</label></em></u>
   <p><?php echo $_POST['origin'];?></p>
   
   <p><HR /></p>
    <u><em>PIECES/JUMLAH SATUAN</em></u>
   <p align="center"><?php echo $_POST['t_item'];?></p>
   </div>
    </td>
    <td>
    <div class="bx-sm">
   <u><em><label>DESTINATION/TUJUAN :</label></em></u>
   <p><?php echo $_POST['desti'];?></p>
   
   <p><HR /></p>
    <u><em>WEIGHT/BERAT</em></u>
   <p align="center"><?php echo $_POST['grossweight'];?></p>
   </div>
    </td>
    
    <td colspan="2">
   <p align="center"><font face="code39" size="6em">||||||||||||||||||||||||||||||</font></p>
    <p align="center">1213452323</p></td>
  </tr>
  <tr>
    <td colspan="2">Account No.</td>
   
    <td colspan="2" rowspan="3" style="border-bottom-color:white">
    <div class="bx">
    <label>By giving us your shipment you agree of all items and condition</label>
   
    <label>By giving us your shipment you agree of all items and condition</label>
    <label>By giving us your shipment you agree of all items and condition</label>
    <label>By giving us your shipment you agree of all items and condition</label>
    </div>
    </td>
    
    <td colspan="2" rowspan="2">DECLARE VALUE/NILAI KIRIMAN</td>
    
  </tr>
  <tr>
    <td height="40">TYPE OF PAYMENT/JENIS PEMABAYARAN</td>
    <td>TYPE OF SHIPMENT/JENIS KIRIMAN</td>
    
    
    
  </tr>
  <tr>
    <td><div align="center">
        <input type="checkbox" name="checkbox1" id="checkbox" />
      CASH
        <input type="checkbox" name="checkbox2" id="checkbox2" />
CREDIT
<input type="checkbox" name="checkbox3" id="checkbox3" />
COD
    </div>      <label for="checkbox"></label></td>
    <td><div align="center">
      <input type="checkbox" name="checkbox4" id="checkbox4" />
      DOC
      <input type="checkbox" name="checkbox5" id="checkbox5" />
      NDX
  <input type="checkbox" name="checkbox6" id="checkbox6" />
      HVS
    </div>      <label for="checkbox4"></label></td>
    
    
     <td width="100">SERVICE/LAYANAN</td>
      <td>CHARGES/HARGA(IDR)</td>
  </tr>
  <tr>
    <td colspan="2">
     <u><em>SHIPPER/PENGIRIM</em></u>
    <p><?php echo $_POST['name1'];?></p>
    
   <u><em> <p>ADDRESSS/ALAMAT</p></em></u>
    <?php echo $_POST['address1'];?>
    <P>&nbsp;</P>
    <P><u><em>PHONE/TELEPHONE/FAX : </em></u><?php echo $_POST['phone1'];?></P>
    </td>
    
    <td colspan="2">
        <u><em>RECEIVER/PENERIMA</em></u>
    <p><?php echo $_POST['name2'];?></p>
    
    <u><em><p>ADDRESSS/ALAMAT</p></em></u>
    <?php echo $_POST['address2'];?>
    <P>&nbsp;</P>
   <P> <u><em>PHONE/TELEPHONE/FAX :</em></u> <?php echo $_POST['phone2'];?></P>
    </td>
    
    <td colspan="2">
    <table  width="100%" border="0" style="border:none; margin-top:-68px; width:300px">
    <?php foreach($tmpcharge as $row){ ?>
  <tr>
    <td width="150"><?php echo $row->ChargeName;?></td>
    <td width="60"><div align="right" style="border:1px #DAD5D5 solid; text-align:right"><?php echo number_format($row->Total,2,'.',',');?></div></td>
  </tr>
  <?php } ?>
</table>

    </td>
    
  </tr>
  <tr>
    <td colspan="4">&nbsp;</td>
    <td>TOTAL/JUMLAH</td>
    <td><label align="center">&nbsp;   &nbsp;Rp.<?php echo number_format($_POST['total_charge'],2,',','.');?></label></td>
  </tr>
  <tr>
    <td colspan="2">
      <div class="detsend">
        SHIPPER SIGNATURE/TANDA TANGAN PENGIRIM :
      </div>
      
    </td>
    <td colspan="2">
    <div class="detsend">
       ATTENTION & DEPT/DITUJUKAN & DEPT:
       
      </div>
    </td>
    <td colspan="2">
      <div class="peringatan">
        <label style="color:#F00">PERNYATAN PENGIRIMAN :</label>
        <p style="color:#F00">Kami memahami dan menyetujiui bahwa kiriman senilai Rp 1.000.000,- atau lebih harus di asuransikan. Jika tidak di asuransikan, </p>
      </div>
    </td>
  </tr>
  <tr>
    <td height="46" colspan="2"><div class="detsend">DESCRIPTION OF SHIPMENT/KETERANGAN ISI : <?php echo $_POST['description'];?></div></td>
    <td colspan="2"><div class="detsend">COLLECTED BY X-SYS/DIAMBIL OLE X-SYS</div></td>
    <td colspan="2" rowspan="3">
      <div class="det" style="margin-top:-22px">
        Receiver Already receive this package in good condition/Penerima telah menerima titipan ini dengan keadaan baik dan benar.
        
        <p>DATE/TANGGAL.....................TIME/JAM...........</p>
        <p>NAME/NAMA :.................</p>
        <p>SIGNATURE & SAMP/TANDA TANGAN DAN STEMPEL : </p>
        
      </div>
    </td>
  </tr>
  <tr>
    <td height="49" colspan="2"><div class="detsend">DIMENTION/DIMENSI BARANG : <?php echo $_POST['grossweight'];?></div></td>
    <td>DATE/TANGGAL : <?php echo date( 'd/m/Y');?></td>
    <td>TME/JAM : <?php echo time();?></td>
  </tr>
  <tr>
    <td colspan="2"><div class="detsend">SPECIAL INTRUCTION//INSTRUKSI KHUSUS : <?php echo $_POST['special'];?></div></td>
    <td colspan="2">
   <P style="font-size:16pt; text-align:center">WE CANNOT DELIVER TO PO.BOX</P>
    <p align="center">Kami tidak dapat mengatntar alamat PO Box</p><br />
    </td>
  </tr>
</table>
<br style="clear:both;">
  

<label>&nbsp;1. Original/Aslu : Shipper/Pengirim</label> &nbsp;
<label>&nbsp;2. Blue/Biru : Operational/Operasional</label> &nbsp;
<label>&nbsp;. Green/Hijau : Accounting/ Accounting</label> &nbsp;
<label>&nbsp;4. Yello/Kuning : Return POD/POD Kembali</label> &nbsp;
<label>&nbsp;5. Red/Merah : Receiver/ Penerima</label> &nbsp;

</body>
</html>