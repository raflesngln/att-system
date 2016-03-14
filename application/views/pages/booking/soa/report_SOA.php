<style>
*{
	font-size:12px;
}
.mytable tr td{ 
border-bottom:1px #999 solid;
border-left:1px solid #999;
padding:3px 2px;
}
.header tr td{border-top:1px #9F3 solid;}
h1{font-size:18px; text-align:center; font-weight:normal}
h2{font-size:14px; text-align:center; margin-top:-10px}
h3{text-align:center; margin-top:-10px; font-size:14px; font-weight:normal}
p{ margin-top:-8px}
.head p{margin-top:-20px;}
</style>
  <?php
   foreach($cust as $cust){
	  
   ?>
<h1>PT. ATT CARGO</h1>
<p style="text-align:center">Domestic and International Freight Forwarding</p>
<p style="text-align:center">PERGUDANGAN DOMESTIK IF 6/G-1</p>
<p style="text-align:center">Cargo Area Bandara Juanda Surabaya </p>
<p style="text-align:center">Telp :031-8688511, 082894057864 ,082894057865</p>
<p style="text-align:center">Fax. : 031-8688512</p>

<h4 style="text-decoration:underline">Doc   :  Statement Of Account</h4>
<pre class="head">
<p>SOA No        : <?php echo $cust->custName;?></p>
<p>SOA Date      : <?php echo date('d-m-Y');?></p>
<p style="text-transform:uppercase">Customer      : <?php echo $cust->custName;?></p>
<p>E.T.D Periode : <?php echo date("d/m/Y",strtotime($etd1)).' - '; ?><?php echo date("d/m/Y",strtotime($etd2)); ?></p>
<p>Currency      : <?php echo $currency;?></p>
</pre>

<?php } ?>

<table width="200" border="0" class="mytable" id="mytable">
  <tr style="background-color:#D0E8E8">
    <td>No</td>
    <td style="width:30px">Date</td>
    <td style="width:80px">Invoice</td>
    <td style="width:70px">SMU</td>
    <td style="width:70px">Job</td>
    <td style="width:130px">Origin-Desti</td>
    <td style="width:20px">Collie</td>
    <td style="width:20px">CWT</td>
    <td style="width:20px">Air Freight</td>
    <td style="width:20px">Adm SMU</td>
    <td style="width:20px">Quarantine</td>
    <td style="width:20px">Dellivery</td>
    <td style="width:20px">Others</td>
    <td style="width:20px">Weight</td>
    <td style="width:20px">Qty</td>
    <td style="width:70px">Amount</td>
    </tr>
   <?php
   $no=1;
   foreach($list as $row){
	$amount=$row->Amount;
	$t_amount+=$amount;   
   ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo date("d-m-Y",strtotime($row->ETD)); ?></td>
    <td><?php echo $row->InvoiceNo;?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo $row->JobNo;?></td>
    <td><?php echo substr($row->Origin,4,15).' - ';?><?php echo substr($row->Destination,4,15);?></td>
    <td><span style="text-align:right"><?php echo number_format($row->grandPCS,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->CWT,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo $row->AirFreight;?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->Amount,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->Amount,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->Amount,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->Amount,0,'.','.');?></span></td>
    <td><?php echo $row->GrossWeight;?></td>
    <td><?php echo $row->grandPCS;?></td>
    <td style="text-align:right"><?php echo number_format($row->Amount,0,'.','.');?></td>
    </tr>
    
    <?php $no++; } ?>
  <tr style="background-color:#F3F3F3">
    <td colspan="15" style="text-align:right"><label style="color:#03F">TOTAL</label></td>
    <td style="text-align:right"><label style="color:#03F"><?php echo 'Rp '.number_format($t_amount,0,'.','.');?></label></td>
    </tr>
</table>

<h4>Pembayaran Secara Full Amount ke Rekenign Dibawah ini :</h4>
<pre class="head">
<p>Currency         : IDR</p>
<p>Bank Name        : Bank Central Asia (BCA)</p>
<p>Branch           : Indrapura-Surabaya</p>
<p>Beneficiary      : Syamungningsih</p>
<p>Account          : 468-5606-900</p>
</pre>