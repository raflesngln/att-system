
<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th colspan="9"> <div align="left"><a class="btn btn-blue btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add Disc</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>customer Name</th>
                                                  <th>Service</th>
                                                  <th>Origin</th>
                                                  <th>Destination</th>
                                                  <th>Vendor</th>
                                                  <th>Disc %</th>
                                                  <th>Disc Rp</th>
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
                                                    <td><?php echo $data->custName?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td><?php echo $data->ori?></td>
                                                    <td><?php echo $data->dest?></td>
                                                    <td><?php echo $data->venName?></td>
                                                    <td><?php echo $data->DiscPersen?></td>
                                                    <td><?php echo $data->DiscRupiah?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledit<?php echo $data->discCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
                                                      <a href="<?php echo base_url();?>master/delete_disc/<?php echo $data->discCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                        <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                      </a>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>