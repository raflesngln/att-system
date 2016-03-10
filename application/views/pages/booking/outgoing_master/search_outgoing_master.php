<table width="500" class="table table-striped table-bordered table-hover" id="tblhouse">
                                              <thead>
                                                <tr align="left" style="background:#EBEBEB">
                                                  <th colspan="2"><div align="left">SMU No</div></th>
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
 if(count($master) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($master as $items){
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><a class="dethouse" href="#modaladding" data-toggle="modal" id="dethouse" title="click for detail"><?php echo $items->NoSMU;?></a></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->ETD)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->PayCode;?></div></td>
                                                    <td><div align="left"><?php echo $items->Service;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->custName;?></div></td>
                                                    <td>
                                                   <form action="<?php echo base_url();?>transaction/print_invoice_OM" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="<?php echo $items->NoSMU;?>" name=" NoSMU" />
                                                  <button class="btn btn-mini btn-warning"><i class="fa fa-print bigger-120"></i></button>
                                                                                                      <a href="<?php echo base_url();?>transaction/edit_outgoing_master/<?php echo $items->NoSMU;?>" title="Edit item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_outgoing_master/<?php echo $items->NoSMU; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $items->NoSMU;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a>  
                                                  </form>

                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} } ?>
                                                
                                              <td width="74"></tbody>
                                            </table>