<table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>Flight</th>
                                                  <th><div align="left">No SMU</div></th>
                                                  <th><div align="center">Destination</div></th>
                                                  <th>PCS</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">
                                                    <input type="checkbox" name="checkall" id="checkall" onClick="return Checkall()" value="Check all">
                                                  </div></th>
                                                </tr>
                                          <tbody>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($smu as $row) {
	 
	 $air=explode('/',$row->FlightNumbDate1);
	 $kode=$air[0];
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
	 if($cwt <=0){
		$cwt="<span class='label label-warning'>empty</span>";
	 }
	 
	 $pcs=$row->PCS;
	 $t_pcs+=$pcs;
	 if($pcs <=0){
		$pcs="<span class='label label-warning'>empty</span>";
	 }
	 
  ?>

                                                  <tr align="left" class="gradeX">
                                                    <td><?php echo $kode; ?>
                                                    <input name="flight[]" type="hidden" id="flight[]" value="<?php echo $row->Airlines; ?>" /></td>
                                                    <td><?php echo $row->NoSMU; ?><input type="hidden" name="smu2[]" value="<?php echo $row->NoSMU; ?>"></td>
                                                    <td><?php echo $row->desti; ?>
                                                    <input name="desti2[]" type="hidden" id="desti2[]" value="<?php echo $row->desti; ?>"></td>
                                                    <td><div align="right"><?php echo $pcs; ?>
                                                      <input name="pcs2[]" type="hidden" id="pcs2[]" value="<?php echo $pcs; ?>">
                                                    </div></td>
                                                    <td><div align="right"><?php echo $cwt; ?>
                                                      <input name="cwt2[]" type="hidden" id="cwt2[]" value="<?php echo $cwt; ?>">
                                                    </div></td>
                                                    <td align="center">
                    <button style="display:none" class="delbtn btn btn-mini btn-primary" type="button" value="<?php echo $row->NoSMU.'/'.$row->desti.'/'.$row->PCS.'/'.$row->CWT; ?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
                                                 
                                         
                                                  <input type="checkbox" name="checklish[]" id="checklish[]">
                                                  <label for="checklish[]"></label></td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="3">&nbsp;</td>
                                                  <td align="right"><div align="right"></div></td>
                                                  <td>&nbsp;</td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>