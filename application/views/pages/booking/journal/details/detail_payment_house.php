<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-5"><u>House No</u></div>
    <div class="col-sm-7"><strong>: <?php echo $row->HouseNo?></strong></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">ETD</div>
    <div class="col-sm-7">: <strong><?php echo date('d-m-Y',strtotime($row->ETD));?></strong></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Shipper</div>
    <div class="col-sm-7">: <strong><?php echo $row->sender?></strong></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Consignee</div>
    <div class="col-sm-7">: <strong><?php echo $row->receive?></strong></div>
	</div>
	
</div>


<div class="col-sm-6">
<div class="form-group">
    <div class="col-sm-5">Origin / Destination</div>
    <div class="col-sm-7">: <?php echo $row->Origin.' / '.$row->Destination?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">QTY</div>
    <div class="col-sm-7">: <?php echo $row->PCS?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">CWT</div>
    <div class="col-sm-7">: <?php echo $row->CWT?></div>
	</div>
    

    
</div>
<?php }  ?>
</div>
<br />
<label class="label label-inverse label-lg">History of Payment</label>
<table id="tbldet" class="table table-responsive table-striped table-bordered" cellspacing="0" width="90%" >
      <thead>
        <tr>
          <th width="5%">No</th>
          <th width="21%">Date</th>
          <th width="13%"> Jurnal</th>
          <th width="19%">Amount</th>
          <th width="14%">Payment</th>
          <th width="14%">Balance</th>
          <th width="13%">Status</th>
        </tr>
      </thead>
      <tbody>
      
       <?php 
 $no=1;
 foreach ($list as $row) {
	 $totpay+=$row->PaymentValue;
	 
	 $status=($row->Balance =='0' || $row->Balance==$row->Amount)?'<label class="label label-info arrowed-right">Settled</label>':'<label class="label label-warning arrowed-right">Not Settled</label>';;

$amoun=$row->PaymentValue+$row->Balance;
  ?>
        <tr>
          <td><?php echo $no?></td>
          <td><?php echo date('d-m-Y / h:i:s',strtotime($row->PaymentDate));?></td>
          <td><a href="#" onclick="detailPayment(this);"><?php echo $row->JurnalNo;?></a></td>
          <td><div align="right"><?php echo number_format($amoun,0,'.','.')?></div></td>
          <td>
          <div align="right"><?php echo number_format($row->PaymentValue,0,'.','.')?></div></td>
          <td>
          <div align="right"><?php echo number_format($row->Balance,0,'.','.')?></div></td>
          <td>
          <div align="center"><?php echo $status?></div></td>
        </tr>
		<?php $no++; } ?>
        
        <tr>
          <th colspan="4">&nbsp;</th>
          <th>
          <div align="right"><strong><?php echo number_format($totpay,0,'.','.')?></strong></div></th>
          <th><div align="right"></div></th>
          <th>&nbsp;</th>
        </tr>
		
         </tbody>

     
    </table>