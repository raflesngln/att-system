 <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add commodity</button></a></div></th>
                                                </tr>
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Code</th>
                                                  <th>Name</th>
                                                  <th>Section</th>
                                                  <th>Remarks</th>
                                                  <th>CreateBy</th>
                                                  <th>Create Date</th>
                                                  <th>Modif by.</th>
                                                  <th>Modif Date</th>
                                                  <th colspan="2" class="text-center">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
        
      ?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->commCode?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td><?php echo $data->Section?></td>
                                                    <td><?php echo $data->Remarks?></td>
                                                    <td><?php echo $data->CreateBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?></td>
                                                    <td class="text-center">
                                                      <a href="#modaledit<?php echo $data->commCode?>" data-toggle="modal" title="Edit">
                                                      <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                      <i class="icon-edit icon-1x icon-only"></i>
                                                      </button>                                          
                                                      </a>                                              
                                                    </td>
                                                           <td>
                                                  <a href="<?php echo base_url();?>commodity/delete_commodity/<?php echo $data->commCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
                                               <button class="btn btn-danger btn-small" title="Delete Data">
                                                <i class="icon-trash icon-1x icon-only"></i>
                                                </button>
                                                  </a>
                                       
                                                    </td>
                                                </tr>
        <?php $no++; } ;?>
                                                <tr class="gradeX pagin">
                                                  <th colspan="12" scope="row">
                          <?php echo $paginator;?></th>
                                                </tr>                                
                                                
                                              </tbody>
                                            </table>
