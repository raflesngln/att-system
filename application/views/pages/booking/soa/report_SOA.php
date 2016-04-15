	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css" />
  

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" />
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

<div class="container">
 
<h1>PT. ATT CARGO</h1>
<p style="text-align:center">Domestic and International Freight Forwarding</p>
<p style="text-align:center">PERGUDANGAN DOMESTIK IF 6/G-1</p>
<p style="text-align:center">Cargo Area Bandara Juanda Surabaya </p>
<p style="text-align:center">Telp :031-8688511, 082894057864 ,082894057865</p>
<p style="text-align:center">Fax. : 031-8688512</p>


<div class="col-sm-6">
  <?php
   foreach($cust as $cust){	  
   ?>
 <div class="form-group">
 <div class="col-sm-4">SOA No</div>
 <div class="col-sm-7"><?php echo $cust->CustName;?></div>
 </div>
 
  <div class="form-group">
 <div class="col-sm-4">SOA No</div>
 <div class="col-sm-7"><?php echo $cust->CustName;?></div>
 </div>
 
  <div class="form-group">
 <div class="col-sm-4">Customers</div>
 <div class="col-sm-7"><?php echo $cust->CustName;?></div>
 </div>
 
  <div class="form-group">
 <div class="col-sm-4">SOA Date</div>
 <div class="col-sm-7"><?php echo date('d-m-Y');?></div>
 </div>
 
  <div class="form-group">
 <div class="col-sm-4">Periode</div>
 <div class="col-sm-7"><?php echo date("d/m/Y",strtotime($etd1)).' - '; ?><?php echo date("d/m/Y",strtotime($etd2)); ?></div>
 </div>


<?php } ?>
</div>
<div class="clearfix"></div>

<div class="col-sm-11">
<table width="98%" border="0" class="table table-striped table-bordered" id="mytable">
  <tr style="background-color:#D0E8E8">
    <td width="41">No</td>
    <td width="94" style="width:30px">Date Job</td>
    <td width="113" style="width:70px">SMU</td>
    <td width="113" style="width:70px">Job</td>
    <td width="208" style="width:130px">Note</td>
    <td width="208" style="width:130px">Origin-Desti</td>
    <td width="46" style="width:20px">Collie</td>
    <td width="45" style="width:20px">CWT</td>
    <td width="56" style="width:20px">Air Freight</td>
    <td width="45" style="width:20px">Adm SMU</td>
    <td width="86" style="width:20px">Quarantine</td>
    <td width="73" style="width:20px">Dellivery</td>
    <td width="54" style="width:20px">Others</td>
    <td width="51" style="width:20px">Total</td>
    </tr>
   <?php
   $no=1;
   foreach($list as $row){
	$airfreight=$row->airfreight;
	$quarantine=$row->quarantine;
	$smu=$row->smu;
	$delivery=$row->delivery;
	$other=$row->other;
	
	$subtotal=$airfreight+$quarantine+$smu+$delivery+$other;   
   ?>
  <tr>
    <td><?php echo $no;?></td>
    <td><?php echo date("d-m-Y",strtotime($row->ETD)); ?></td>
    <td><?php echo $row->HouseNo;?></td>
    <td><?php echo $row->JobNo;?></td>
    <td><?php echo $row->DescofShipment;?></td>
    <td><?php echo substr($row->Origin,0,15).' - ';?><?php echo substr($row->Destination,0,15);?></td>
    <td><span style="text-align:right"><?php echo number_format($row->PCS,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->CWT,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo $row->airfreight;?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->smu,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->quarantine,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->delivery,0,'.','.');?></span></td>
    <td><span style="text-align:right"><?php echo number_format($row->delivery,0,'.','.');?></span></td>
    <td><?php echo number_format($subtotal,0,'.',',');?></td>
    </tr>
    
    <?php $no++; } ?>
  <tr style="background-color:#F3F3F3">
    <td colspan="14" style="text-align:right"><label style="color:#03F">TOTAL</label></td>
    </tr>
</table>

</div>

<div class="clearfix"></div>
<h4>Pembayaran Secara Full Amount ke Rekenign Dibawah ini :</h4>

<p>Currency         : IDR</p>
<p>Bank Name        : Bank Central Asia (BCA)</p>
<p>Branch           : Indrapura-Surabaya</p>
<p>Beneficiary      : Syamungningsih</p>
<p>Account          : 468-5606-900</p>


</div>

<div class="col-sm-5 text center">hhj</div>