 <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add charges</button></a></div></th>
                                                </tr>
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Charge Code</th>
                                                  <th>Description</th>
                                                  <th>isCost</th>
                                                  <th>isSales</th>
                                                  <th>isCode</th>
                                                  <th>AccDebet</th>
                                                  <th>AccCredit</th>
                                                  <th>isActive</th>
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
                                                    <td><?php echo $data->ChargeCode?></td>
                                                    <td><?php echo $data->Description?></td>
                                                    <td><?php echo $data->isCost?></td>
                                                    <td><?php echo $data->isSales?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td><?php echo $data->AccDebet; ?></td>
                                                    <td><?php echo $data->AccCredit?></td>
                                                    <td><?php echo $data->isActive; ?></td>
                                                    <td class="text-center">
                                                      <a href="#modaledit<?php echo $data->ChargeCode?>" data-toggle="modal" title="Edit">
                                                      <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                      <i class="icon-edit icon-1x icon-only"></i>
                                                      </button>                                          
                                                      </a>                                              
                                                    </td>
                                                           <td>
                                                  <a href="<?php echo base_url();?>charges/delete_charges/<?php echo $data->ChargeCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
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