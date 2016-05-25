<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-4"><strong>House No</strong></div>
    <div class="col-sm-7"><strong>: <?php echo $row->HouseNo?></strong></div>
	</div>
<div class="form-group">
    <div class="col-sm-4">Service</div>
    <div class="col-sm-7">: <?php echo $row->Service?></div>
	</div>
<div class="form-group">
    <div class="col-sm-4">ETD</div>
    <div class="col-sm-7">: <?php echo date('d-m-Y',strtotime($row->ETD))?></div>
	</div>

	<div class="form-group">
    <div class="col-sm-4">Shipper</div>
    <div class="col-sm-7">: <?php echo $row->sender?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-4">Consignee</div>
    <div class="col-sm-7">: <?php echo $row->receiver?></div>
	</div>

</div>

<div class="col-sm-6">

	<div class="form-group">
    <div class="col-sm-4">Origin</div>
    <div class="col-sm-7">: <?php echo $row->Origin.'-'.$row->ori?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-4">Destination</div>
    <div class="col-sm-7">: <?php echo $row->Destination.'-'.$row->desti?></div>
	</div>
<div class="form-group">
    <div class="col-sm-4">CodeShipper</div>
    <div class="col-sm-7">: <?php echo $row->CodeShipper?></div>
	</div>
<div class="form-group">
    <div class="col-sm-4">CodeConsigne</div>
    <div class="col-sm-7">: <?php echo $row->CodeConsigne?></div>
	</div>	
    <div class="form-group">
    <div class="col-sm-4">QTY</div>
    <div class="col-sm-7">: <?php echo $row->PCS?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-4">CWT</div>
    <div class="col-sm-7">: <?php echo $row->CWT?></div>
	</div>
</div>

<?php } ?>
</div>
<label class="label label-inverse label-lg">List SMU</label>

<table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="14%">SMU</th>
          <th width="25%">ETD</th>
          <th width="30%">Flight No</th>
          <th width="10%">QTY</th>
          <th width="8%">CWT</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
      
       <?php 
 $no=1;
 foreach ($houses as $row) {
	 $totcwt+=$row->CWT;
	 $totpcs+=$row->PCS;
  ?>
        <tr>
          <td><?php echo $row->MasterNo?></td>
          <td><?php echo date('d-m-Y',strtotime($row->ETD));?></td>
          <td><?php echo $row->FlightNo?></td>
          <td><?php echo $row->PCS?></td>
          <td><?php echo $row->CWT?></td>
        </tr>
		<?php } ?>
        <tr>
          <th colspan="3">TOTAL</th>
          <th><strong><?php echo $totpcs?></strong></th>
          <th><strong><?php echo $totcwt?></strong></th>
        </tr>
		
   
  <tfoot>
      </tfoot>
    </table>