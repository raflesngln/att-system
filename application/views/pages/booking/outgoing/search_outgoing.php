<table width="500" class="table table-striped table-bordered table-hover" id="tblhouse">
                                              <thead>
                                                <tr align="left" style="background:#EBEBEB">
                                                  <th colspan="2"><div align="left">House No</div></th>
                                                  <th width="54"><div align="center">ETD</div></th>
                                                  <th width="46"><div align="center">Paycode</div></th>
                                                  <th width="58"><div align="center">Service</div></th>
                                                  <th width="48">Origin</th>
                                                  <th width="48">Destination</th>
                                                  <th width="48">Shipper</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Actions</div></th>
                                                </tr>
                                                </thead>
                                          <tbody>
 <?php 
 if(count($connote) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($connote as $items){
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><a class="dethouse" href="#modaladding" data-toggle="modal" id="dethouse" title="click for detail"><?php echo $items->HouseNo;?></a></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->ETD)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->PayCode;?></div></td>
                                                    <td><div align="left"><?php echo $items->Service;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->Shipper;?></div></td>
                                                    <td>
                                                   <form action="<?php echo base_url();?>Connote_print" method="post" target="new">
                                                   <input type="hidden" value="<?php echo $items->HouseNo;?>" name=" houseno" />
                                                  <button class="btn btn-mini btn-warning"><i class="fa fa-print bigger-120"></i></button>
                                                  
                                                  </form>
                                                     <a href="<?php echo base_url();?>transaction/edit_outgoing_house/<?php echo $items->HouseNo;?>" title="Edit item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_outgoing_house/<?php echo $items->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $items->HouseNo;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} } ?>
                                                
                                              <td width="74"></tbody>
                                            </table>