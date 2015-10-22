 <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add currency</button></a></div></th>
                                                </tr>
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Code</th>
                                                  <th>Name</th>
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
                                                    <td><?php echo $data->currCode?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td class="text-center">
                                                      <a href="#modaledit<?php echo $data->currCode?>" data-toggle="modal" title="Edit">
                                                      <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                      <i class="icon-edit icon-1x icon-only"></i>
                                                      </button>                                          
                                                      </a>   
                                                     <a href="<?php echo base_url();?>currency/delete_currency/<?php echo $data->currCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
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