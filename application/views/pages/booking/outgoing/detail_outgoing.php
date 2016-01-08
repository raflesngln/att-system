<h5 class="txtdetail"></h5>
<table width="500" class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr align="left" style="background:#EBEBEB">
                                                  <th colspan="2"><div align="left">date</div></th>
                                                  <th width="108">No Pack</th>
                                                  <th width="56"><div align="center">Length</div></th>
                                                  <th width="53"><div align="center">Width</div></th>
                                                  <th width="57"><div align="center">Height</div></th>
                                                  <th width="51">Volume</th>
                                                  <th width="70" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Actions</div></th>
                                                </tr>
                                                </thead>
                                          <tbody>
 <?php 
 if(count($house) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($house as $items){
	 $total+=$items->Volume;
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo date("d-m-Y",strtotime($items->Date)); ?></div></td>
                                                    <td><div align="center"><?php echo $items->NoPack;?></div></td>
                                                    <td><div align="center"><?php echo $items->Length;?></div></td>
                                                    <td><div align="center"><?php echo $items->Width;?></div></td>
                                                    <td><div align="center"><?php echo $items->Height;?></div></td>
                                                    <td><div align="center"><?php echo $items->Volume;?></div></td>
                                                    <td>
                                                   
                                                     <a href="<?php echo base_url();?>transaction/edit_outgoing_house/<?php echo $items->IdItems;?>" title="Edit item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_outgoing_house/<?php echo $items->IdItems; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $items->HouseNo;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </td>
                                                  </tr>
                                                <?php $no++;} } ?>   
                                           <tr align="right" class="gradeX">
                                                    <td colspan="6"><div align="center">Total</div>
                                                    <div align="center"></div>                                                      <div align="center"></div>                                                      <div align="center"></div>                                                      <div align="center"></div></td>
                                                    <td><div align="center"><?php echo $total;?></div></td>
                                                    <td>&nbsp;</td>
                                                  </tr>
 
                                                
                                              <td width="72"></tbody>
                                            </table>