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
          <th width="14%">No</th>
          <th width="25%">ChargeName</th>
          <th width="30%">Price</th>
          <th width="10%">QTY</th>
          <th width="8%">total</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
      
       <?php 
 $no=1;
 foreach ($houses as $row) {
	 //$totcwt+=$row->Qty;
	 //$total+=$row->Total;
  ?>
        <tr>
          <td><?php echo $no?></td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<?php $no++;} ?>
        <tr>
          <th colspan="3">TOTAL</th>
          <th><strong><?php echo ''?></strong></th>
          <th><strong><?php echo ''?></strong></th>
        </tr>
		
   
  <tfoot>
      </tfoot>
    </table>