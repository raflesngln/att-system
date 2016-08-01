<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-5"><u>JurnalNo</u></div>
    <div class="col-sm-7"><strong>: <?php echo $row->JurnalNo?></strong></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">PayDate</div>
    <div class="col-sm-7">: <?php echo $row->PayDate?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Customer</div>
    <div class="col-sm-7">: <?php echo $row->CustName?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-5">Currency</div>
    <div class="col-sm-7">: <?php echo $row->Currency?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Rate</div>
    <div class="col-sm-7">: <?php echo $row->Rate?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Total Payment Receive</div>
    <div class="col-sm-7">: <?php echo number_format($row->total_pay,0,'.','.')?></div>
	</div>
	
</div>


<div class="col-sm-6">
	<div class="form-group">
    <div class="col-sm-12"><strong>Remarks :</strong></div>
    
    <div class="col-sm-12"><textarea name="remark" rows="4" readonly="readonly" class="form-control"><?php echo $row->Remarks;?></textarea></div>
	</div>

</div>
<?php }  ?>
</div>
<br />

<label class="label label-inverse label-lg">List House of Payment</label>
<table id="tbldet" class="table table-responsive table-striped table-bordered" cellspacing="0" width="90%">
      <thead>
        <tr>
          <th width="7%"><div align="center">No</div></th>
          <th width="25%">House</th>
          <th width="16%"><div align="center">Amount</div></th>
          <th width="15%"><div align="center">Pay</div></th>
          <th width="20%"><div align="center">Status</div></th>
        </tr>
      </thead>
      <tbody>
      
       <?php 
 $no=1;
 foreach ($list as $row) {
	 $totpay+=$row->PaymentValue;
	 $status=($row->PaymentStatus ==1)?'<label class="label label-info arrowed-right">Settled</label>':'<label class="label label-warning arrowed-right">Not Settled</label>';

  ?>
        <tr>
          <td><?php echo $no?></td>
          <td><?php echo $row->House?></td>
          <td><div align="right"><?php echo number_format($row->Amount,0,'.','.')?></div></td>
          <td>
          <div align="right"><?php echo number_format($row->PaymentValue,0,'.','.')?></div></td>
          <td>
          <div align="center"><?php echo $status?></div></td>
        </tr>
		<?php $no++; } ?>
        
        <tr>
          <th colspan="3">&nbsp;</th>
          <th><div align="right"><?php echo number_format($totpay,0,'.','.')?></div></th>
          <th>&nbsp;</th>
        </tr>
		
         </tbody>

     
    </table>