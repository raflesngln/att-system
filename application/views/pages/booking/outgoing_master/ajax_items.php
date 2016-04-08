<table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="8"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th>&nbsp;</th>
                                                  <th colspan="3"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th><div align="center">Volume</div></th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                              <tbody>
    <?php 
	$no=1;
	foreach($items as $itm){
		$pack+=$itm->NoPack;
		$volume+=$itm->Volume;
		$total_volume=$unit*$qty;
		$grantotal+=$total_volume;
		 ?>
                                                  <tr align="right" class="gradeX">
                                                    <td><?php echo $no; ?></td>
                                                  <td colspan="3"><?php echo $itm->NoPack; ?></td>
                                                  <td><?php echo $itm->Length; ?></td>
                                                  <td><?php echo $itm->Width; ?></td>
                                                  <td><?php echo $itm->Height; ?></td>
                                                  <td><?php echo $itm->Volume; ?></td>
                                                  <td>
                                                  <div align="center">
                 <a href="<?php echo base_url(); ?>transaction/delete_om_items/<?php echo $itm->IdItems; ?>/<?php echo $itm->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $itm->IdItems;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a>                                   
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                
                                                 <tr align="right">
                                                   <td>Total</td>
                                                  <td colspan="3"><label id="label_pacs"><?php echo $pack; ?></label>
                                                   <input name="t_pacs" type="hidden" id="t_pacs" value="<?php echo $pack; ?>" /></td>
                                                  <td colspan="3">&nbsp;</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="<?php echo $volume; ?>" />      
                                                    <label id="label_volume"><?php echo $volume; ?></label>                                           
                                                  </td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>