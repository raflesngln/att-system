<div class="container">
 <?php 
 $no=1;
 foreach ($header as $hdr) {
	 ?>
<div class="col-sm-5">
<div class="row">
    <div class="form-group">
    <div class="span4">Flight No</div>
    <div class="span7">: <?php echo $hdr->FlightNo; ?></div>
    </div>
	<div class="form-group">
    <div class="span4">Origin</div>
    <div class="span7">: <?php echo $hdr->Origin; ?></div>
    </div>
	<div class="form-group">
    <div class="span4">Destination</div>
    <div class="span7">: <?php echo $hdr->Destination; ?></div>
    </div>
</div>

</div>

<div class="col-sm-5">
<div class="row">
    <div class="form-group">
    <div class="span4">Shipper</div>
    <div class="span7">: <?php echo $hdr->sender; ?></div>
    </div>

	<div class="form-group">
    <div class="span4">Consigne</div>
    <div class="span7">: <?php echo $hdr->receiver; ?></div>
    </div>
</div>

</div>
<?php } ?>
</div>

<table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>SMU</th>
                                                  <th>House</th>
                                                  <th>PCS</th>
                                                  <th><div align="center">CWT</div></th>
                                                </tr>
                                          <tbody>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($house as $row) {
	 
	 $air=explode('/',$row->FlightNumbDate1);
	 $kode=$air[0];
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
	 
	 $pcs=$row->PCS;
	 $t_pcs+=$pcs;

	 
  ?>

                                                  <tr align="left" class="gradeX">
                                                    <td><?php echo $row->MasterNo; ?></td>
                                                    <td><?php echo $row->HouseNo; ?></td>
                                                    <td><div align="right"><?php echo $row->PCS; ?></div></td>
                                                    <td><div align="right"><?php echo $row->CWT; ?></div></td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2">Total</td>
                                                  <td align="right"><div align="right"><strong><?php echo $t_pcs; ?></strong></div></td>
                                                  <td><strong><?php echo $t_cwt; ?></strong></td>  
                                                </tr>
                                                
                                              </tbody>
                                            </table>