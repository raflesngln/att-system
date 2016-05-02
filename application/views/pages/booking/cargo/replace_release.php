<table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>Flight</th>
                                                  <th>ETD</th>
                                                  <th><div align="left">No SMU</div></th>
                                                  <th><div align="center">Ori/Desti</div></th>
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
                                                    <td>
													
<a href="#" onclick="detailCargo()" id="detcargo"><?php echo $row->FlightNo; ?></a>
                                                    <input name="flight2[]" type="hidden" id="flight2[]" value="<?php echo $row->FlightID; ?>" /></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row->ETD)); ?>                                                      <input name="etd2[]" type="hidden" id="etd2[]" value="<?php echo $row->ETD; ?>" /></td>
                                                    <td><?php echo $row->NoSMU; ?><input type="hidden" name="smu2[]" value="<?php echo $row->NoSMU; ?>"></td>
                                                    <td><?php echo $row->ori; ?>
                                                      <input name="ori2[]" type="hidden" id="ori2[]" value="<?php echo $row->Origin; ?>" />
                                                      /<?php echo $row->desti; ?>
                                                      <input name="desti2[]" type="hidden" id="desti2[]" value="<?php echo $row->Destination; ?>"></td>
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
                                                  <td colspan="4">&nbsp;</td>
                                                  <td align="right"><div align="right"></div></td>
                                                  <td>&nbsp;</td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>