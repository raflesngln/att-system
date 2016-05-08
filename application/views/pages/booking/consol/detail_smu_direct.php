<div class="row">
<?php
foreach($header as $row){
	
?>
<div class="col-sm-6" >
	<div class="form-group">
    <div class="col-sm-5">SMU</div>
    <div class="col-sm-7"><strong>: <?php echo $row->NoSMU?></strong>
      <input type="hidden" name="idmaster" id="idmaster" value="<?php echo $row->NoSMU?>" />
    </div>
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
    <div class="col-sm-5">Airline</div>
    <div class="col-sm-7">: <?php echo $row->AirLineName?></div>
	</div>
<div class="form-group">
    <div class="col-sm-5">Flight</div>
    <div class="col-sm-7">: <?php echo $row->FlightNo;?></div>
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
</div>

<?php } ?>
</div>
<label class="label label-pink label-lg">List House</label>
<table id="tbldet" class="table table-responsive table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="14%">House</th>
          <th width="22%">Shipper</th>
          <th width="27%">Consigne</th>
          <th width="16%">BookingNo</th>
          <th width="10%"> PCS</th>
          <th width="11%">CWT</th>
          <th width="11%">Action</th>
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
          <td><?php echo $row->HouseNo?></td>
          <td><?php echo $row->shipper?></td>
          <td><?php echo $row->consigne?></td>
          <td><?php echo $row->BookingNo?></td>
          <td>
          <div align="right"><?php echo $row->PCS?></div></td>
          <td>
          <div align="right"><?php echo $row->CWT?></div></td>
          <td><button value="<?php echo $row->HouseNo?>" class="btn btn-mini btn-danger" onclick="removedirect(this);"><i class="icon icon-trash"></i></button>
          
          </td>
        </tr>
		<?php } ?>
        
        <tr>
          <th colspan="4">TOTAL</th>
          <th>
          <div align="right"><?php echo $totpcs?></div></th>
          <th><div align="right"><?php echo $totcwt?></div></th>
          <th>&nbsp;</th>
        </tr>
		
         </tbody>

     
    </table>