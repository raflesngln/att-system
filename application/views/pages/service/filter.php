<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="9"> <div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><button class="btn btn-blue"><i class="icon-plus icons"></i>Add Service</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>SVCode</th>
                                                  <th>Name</th>
                                                  <th>Remarks</th>
                                                  <th>CreateBy</th>
                                                  <th>Create Date</th>
                                                  <th>Modified By</th>
                                                  <th>Modified Date</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->svCode?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td><?php echo $data->Remarks?></td>
                                                    <td><?php echo $data->CreateBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?></td>
                                                    <td class="text-center">
                                                      <div align="center">
<a class="btn-action" href="#modaledit<?php echo $data->svCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        
                                                        <a href="<?php echo base_url();?>service/delete_service/<?php echo $data->svCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                        </a>                            
                                                        
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>