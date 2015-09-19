<div class="table-responsive">
  <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="6">Details Invoice</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>AWB No</th>
                                                  <th>QTY</th>
                                                  <th>CWT</th>
                                                  <th>Remarks</th>
                                                  <th>Amount To Pay</th>
                                                </tr>
                                              </thead>
                                              <tbody>
  <?php
$i=1;
foreach($detail as $row)
{	
	$cwt+=$row->cwt;
	$total=10000*$cwt;
	
	$totcwt+=$row->cwt;
	$totqty+=$row->qty;
	$grandtotal+=$total;
	
?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $i ;?></th>
                                                    <td><a href="<?php echo base_url();?>transaksi/det_transaksi/<?php echo $data->custCode;?>"><?php echo $row->awb_no ;?></a></td>
                                                  <td><?php echo $row->qty ;?></td>
                                                    <td><?php echo $row->cwt ;?></td>
                                                    <td><?php echo $data->Address?></td>
                                                    <td><?php echo number_format($total,0,'.','.'); ?></td>
                                                </tr>
                                                <?php $no++; } ;?>
                                                <tr class="gradeX">
                                                  <th scope="row">&nbsp;</th>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                                <tr class="gradeX">
                                                  <th colspan="2" scope="row"><strong>TOTAL</strong></th>
                                                  <td><strong><?php echo substr($totqty,0,5) ?></strong></td>
                                                  <td><strong><?php echo substr($totcwt,0,5) ?></strong></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong><?php echo number_format($grandtotal,0,'.','.'); ?>
                                                  <input type="hidden" name="amount_total2" id="amount_total2" value="<?php echo $grandtotal; ?>" />
                                                  </strong></td>
                                                </tr>                                
                                                
                                              </tbody>
  </table>
                                          </div>
</div>
<div class="clearfix"></div>
<div class="col-md-6">
<button type="submit" name="button" id="button" class="btn btn-primary btn-large"><i class="icon-check icons"></i>Save Invoice</button>

</div>
