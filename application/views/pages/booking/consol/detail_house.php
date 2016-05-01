<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-5">House No</div>
    <div class="col-sm-7"><strong>: <?php echo $row->HouseNo?></strong></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">ETD</div>
    <div class="col-sm-7">: <?php echo $row->ETD?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Service</div>
    <div class="col-sm-7">: <?php echo $row->Service?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Booking No</div>
    <div class="col-sm-7">: <?php echo $row->BookingNo?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">CodeShipper</div>
    <div class="col-sm-7">: <?php echo $row->CodeShipper?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">CodeConsigne</div>
    <div class="col-sm-7">: <?php echo $row->CodeConsigne?></div>
	</div>	
</div>

<div class="col-sm-6">
	<div class="form-group">
    <div class="col-sm-5">Shipper</div>
    <div class="col-sm-7">: <?php echo $row->sender?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-5">Consignee</div>
    <div class="col-sm-7">: <?php echo $row->receiver?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-5">Origin</div>
    <div class="col-sm-7">: <?php echo $row->ori?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">Destination</div>
    <div class="col-sm-7">: <?php echo $row->desti?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">PCS</div>
    <div class="col-sm-7">: <?php echo $row->PCS?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">CWT</div>
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
          <th width="25%">Shipper</th>
          <th width="30%">Consigne</th>
          <th width="13%">BookingNo</th>
          <th width="10%"> PCS</th>
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
          <td><?php echo $row->CustName?></td>
          <td><?php echo $row->CustName?></td>
          <td><?php echo $row->BookingNo?></td>
          <td><?php echo $row->PCS?></td>
          <td><?php echo $row->CWT?></td>
        </tr>
		<?php } ?>
        <tr>
          <th colspan="4">TOTAL</th>
          <th><?php echo $totpcs?></th>
          <th><?php echo $totcwt?></th>
        </tr>
		
   
  <tfoot>
      </tfoot>
    </table>