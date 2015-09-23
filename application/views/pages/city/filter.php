<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="13"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-primary"><i class="icon-plus icons"></i>Add City</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>cyCode</th>
                                                  <th>cyName</th>
                                                  <th>couName</th>
                                                  <th>stName</th>
                                                  <th>isAirport</th>
                                                  <th>isSeaport</th>
                                                  <th>CreateBy</th>
                                                  <th>Create Date</th>
                                                  <th>Modified By</th>
                                                  <th>Modified Date</th>
                                                  <th colspan="2" class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
$air=$data->isAirport;
$sea=$data->isSeaport;

if($air=='1'){ $isair='<font color="#0000FF">Yes</font>';} else{$isair='<font color="#FF0000">No</font>';}
if($sea=='1'){ $issea='<font color="#0000FF">Yes</font>';} else{$issea='<font color="#FF0000">No</font>';}
				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->cyCode?></td>
                                                    <td><?php echo $data->cyName?></td>
                                                    <td><?php echo $data->couName?></td>
                                                    <td><?php echo $data->stName?></td>
                                                    <td><?php echo $isair;?></td>
                                                    <td><?php echo $issea?></td>
                                                    <td><?php echo $data->CreateBy;?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy;?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?>
                                                    
                                                    </td>
                                                    <td class="text-center">
   <a class="btn-action" href="#modaledit<?php echo $data->cyCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                    </td>
                                                    <td class="text-center">
                                                      

                                                        
                                                        <a href="<?php echo base_url();?>master/delete_city/<?php echo $data->cyCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                        </a>                            
                                                        
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ;?>
  <tr class="gradeX pagin">
                                                  <th colspan="13" scope="row">
												  <?php echo $paginator;?></th>
                                                </tr>
                                              </tbody>
                                            </table>