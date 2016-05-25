<table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>Flight</th>
                                                  <th>ETD</th>
                                                  <th><div align="center">Ori/Desti</div></th>
                                                  <th>PCS</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">
                                                    <input type="checkbox" name="checkall" id="checkall" onClick="return Checkall()" value="Check all"> &nbsp;
                                                  </div></th>
                                                </tr>
                                          <tbody>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($smu as $row) {
	 
	 $air=explode('/',$row->FlightNumbDate1);
	 $kode=$air[0];
	 $cwt=$row->cwt;
	 $t_cwt+=$cwt;
	 if($cwt <=0){
		$cwt="<span class='label label-warning'>empty</span>";
	 }
	 
	 $pcs=$row->pcs;
	 $t_pcs+=$pcs;
	 if($pcs <=0){
		$pcs="<span class='label label-warning'>empty</span>";
	 }
	 
  ?>

                                                  <tr align="left" class="gradeX">
                                                    <td>
													

<button class="label label-inverse" type="button" value="<?php echo $row->FlightID; ?>" onclick="return detailCargo(this)"><?php echo $row->FlightNo; ?></button>
                                                    <input name="flight2[]" type="hidden" id="flight2[]" value="<?php echo $row->FlightID; ?>" /></td>
                                                    <td><?php echo date('d-m-Y',strtotime($row->ETD)); ?>                                                      <input type="hidden" name="smu2[]" value="<?php echo $row->NoSMU; ?>" />                                                      <input name="etd2[]" type="hidden" id="etd2[]" value="<?php echo $row->ETD; ?>" /></td>
                                                    <td><?php echo $row->ori; ?>
                                                      <input name="ori2[]" type="hidden" id="ori2[]" value="<?php echo $row->Origin; ?>" />
                                                      /<?php echo $row->desti; ?><?php echo $pcs; ?>
<input name="desti2[]" type="hidden" id="desti2[]" value="<?php echo $row->Destination; ?>"></td>
                                                    <td><div align="right">
                                                      <input name="pcs2[]" type="hidden" id="pcs2[]" value="<?php echo $pcs; ?>">
                                                    </div></td>
                                                    <td><div align="right"><?php echo $cwt; ?>
                                                      <input name="cwt2[]" type="hidden" id="cwt2[]" value="<?php echo $cwt; ?>">
                                                    </div></td>
                                                    <td align="center">
                    <button style="display:none" class="delbtn btn btn-mini btn-primary" type="button" value="<?php echo $row->NoSMU.'/'.$row->desti.'/'.$row->PCS.'/'.$row->CWT; ?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
                                                 
                                         
                                                <div id="cek"><input type="checkbox" name="checklish[]" id="checklish[]" class="ceklis" value="<?php echo $row->FlightID; ?>"></div>
                                                  <label for="checklish[]"></label></td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="3">&nbsp;</td>
                                                  <td align="right"></td>
                                                  <td></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
                   
                   
<script type="text/javascript">
$("#checkall").click(function(e) {
    $(".ceklis").prop('checked',this.checked);
});
function cek_checked(){
	var chk= $(".ceklis:checked");
	if(chk.length <=0){
	swal("Warning !","Please Select ( Check ) The Flight Number, Cannot be Empty !","error");
	return false;
	}
	
}
</script>