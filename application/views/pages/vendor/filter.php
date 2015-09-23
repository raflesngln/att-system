<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th colspan="9"> <div align="left"><a class="btn btn-primary btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add Vendor</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>customer Name</th>
                                                  <th>Address</th>
                                                  <th>Phone</th>
                                                  <th>Postal Code</th>
                                                  <th>Email</th>
                                                  <th>Terms Payment</th>
                                                  <th>NPWP</th>
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
                                                    <td><?php echo $data->venName?></td>
                                                    <td><?php echo $data->Address?></td>
                                                    <td><?php echo $data->Phone?></td>
                                                    <td><?php echo $data->PostalCode?></td>
                                                    <td><?php echo $data->Email?></td>
                                                    <td><?php echo $data->TermsPayment?></td>
                                                    <td><?php echo $data->NPWP?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledit<?php echo $data->venCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
                                                      <a href="<?php echo base_url();?>master/delete_vendor/<?php echo $data->venCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                        <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                      </a>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>