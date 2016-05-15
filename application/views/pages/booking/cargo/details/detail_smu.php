<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-5">SMU</div>
    <div class="col-sm-7"><strong>: <?php echo $row->NoSMU?></strong></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">Service</div>
    <div class="col-sm-7">: <?php echo $row->Service?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">ETD</div>
    <div class="col-sm-7">: <?php echo $row->ETD?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-5">Shipper</div>
    <div class="col-sm-7">: <?php echo $row->sender?></div>
	</div>
	<div class="form-group">
    <div class="col-sm-5">Consignee</div>
    <div class="col-sm-7">: <?php echo $row->receiver?></div>
	</div>

	
</div>

<div class="col-sm-6">

	<div class="form-group">
    <div class="col-sm-5">Origin</div>
    <div class="col-sm-7">: <?php echo $row->Origin.'-'.$row->ori?></div>
	</div>
    <div class="form-group">
    <div class="col-sm-5">Destination</div>
    <div class="col-sm-7">: <?php echo $row->Destination.'-'.$row->desti?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Airline</div>
    <div class="col-sm-7">: <?php echo $row->AirLineName?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Flight</div>
    <div class="col-sm-7">: <?php echo $row->FlightNo;?></div>
	</div>
</div>

<?php } ?>
</div>
<label class="label label-inverse label-lg">List House</label>
<table id="tbldet" class="table table-responsive table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="14%">House</th>
          <th width="22%">ETD</th>
          <th width="22%">Shipper</th>
          <th width="27%">Consigne</th>
          <th width="10%">QTY</th>
          <th width="11%">CWT</th>
        </tr>
      </thead>
      <tbody>
      
       <?php 
 $no=1;
 foreach ($smu as $row) {
	 $totcwt+=$row->CWT;
	 $totpcs+=$row->PCS;

  ?>
        <tr>
          <td><a href="#" onclick="detailhouseconsol(this);"><?php echo $row->HouseNo?>
</a></td>
          <td><?php echo date('d-m-Y',strtotime($row->ETD))?></td>
          <td><?php echo $row->shipper?></td>
          <td><?php echo $row->consigne?></td>
          <td>
          <div align="right"><?php echo $row->PCS?></div></td>
          <td>
          <div align="right"><?php echo $row->CWT?></div></td>
        </tr>
		<?php } ?>
        
        <tr>
          <th colspan="4">TOTAL</th>
          <th>
          <div align="right"><?php echo $totpcs?></div></th>
          <th><div align="right"><?php echo $totcwt?></div></th>
        </tr>
		
         </tbody>

     
    </table>