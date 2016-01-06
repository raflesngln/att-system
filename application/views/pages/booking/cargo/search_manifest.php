<table width="500" class="table table-striped table-bordered table-hover" id="tblitemss">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Cargo</div></th>
                                                  <th width="54"><div align="center">Tanggal</div></th>
                                                  <th width="46"><div align="center">Tujuan</div></th>
                                                  <th width="58"><div align="center">referensi</div></th>
                                                  <th width="48">Transit</th>
                                                  <th width="48">Keterangan</th>
                                                  <th width="48">Realisasi Berat</th>
                                                  <th width="50">Total Berat</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Actions</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 if(count($list_cargo) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($list_cargo as $items){
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo $items->CargoNo;?></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->tgl_cargo)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->tujuan;?></div></td>
                                                    <td><div align="left"><?php echo $items->referensi;?></div></td>
                                                    <td><div align="left"><?php echo $items->transit;?></div></td>
                                                    <td><div align="left"><?php echo $items->transit;?></div></td>
                                                    <td><?php echo $items->realisasi_berat;?></td>
                                                    <td><?php echo $items->total_berat;?></td>
                                                    <td>
                                                   <a href="<?php echo base_url();?>transaction/cetak_manifest/<?php echo $items->CargoNo;?>" title="Delete item">
                                                  <button class="btn btn-mini btn-warning" type="button"><i class="fa fa-print bigger-120"></i></button>
                                                  </a> 
                                                     <a href="<?php echo base_url();?>transaction/edit_cargo_manifest/<?php echo $items->CargoNo;?>" title="Delete item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_cargo_manifest/<?php echo $items->CargoNo; ?>" onClick="return confirm('Yakin hapus Cargo ini? ini akan menghapus sekaligus items nya');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} } ?>
                                                
                                              <td width="74"></tbody>
                                            </table>