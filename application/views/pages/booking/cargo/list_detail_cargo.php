<div class="container">
 <?php 
 $no=1;
 foreach ($header as $hdr) {
	 ?>
<div class="col-sm-5">
<div class="row">
    <div class="form-group">
    <div class="span4">Code</div>
    <div class="span7">: <?php echo $hdr->CargoReleaseCode; ?></div>
    </div>
<div class="form-group">
    <div class="span4">Release Date</div>
    <div class="span7">: <?php echo date('d-m-Y',strtotime($hdr->ReleaseDate)); ?></div>
    </div>
	<div class="form-group">
    <div class="span4">AirLine</div>
    <div class="span7">: <?php echo $hdr->AirLineName; ?></div>
    </div>
	<div class="form-group">
    <div class="span4">Details</div>
    <div class="span7">: <?php echo $hdr->CargoDetails; ?></div>
    </div>
</div>

</div>


<?php } ?>
</div>

<table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>SMU</th>
                                                  <th>FlightNo</th>
                                                  <th>ETD</th>
                                                  <th>QTY</th>
                                                  <th><div align="center">CWT</div></th>
                                                </tr>
                                          <tbody>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($smu_list as $row) {
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
	 
	 $pcs=$row->PCS;
	 $t_pcs+=$pcs;

	 
  ?>

                                                  <tr align="left" class="gradeX">
           <td><a href="#" onclick="detailsmucargo(this);"><?php echo $row->smu; ?></a></td>
                                                    <td><?php echo $row->FlightNo; ?></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row->ETD)); ?></td>
                                                    <td><div align="right"><?php echo $row->PCS; ?></div></td>
                                                    <td><div align="right"><?php echo $row->CWT; ?></div></td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td>Total</td>
                                                  <td align="right">&nbsp;</td>
                                                  <td align="right">&nbsp;</td>
                                                  <td align="right"><div align="right"><strong><?php echo $t_pcs; ?></strong></div></td>
                                                  <td><strong><?php echo $t_cwt; ?></strong></td>  
                                                </tr>
                                                
                                              </tbody>
                                            </table>