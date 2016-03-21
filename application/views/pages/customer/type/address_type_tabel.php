<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th colspan="4"> <div align="left"><a class="btn btn-blue btn-addnew" href="#addtype" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add Address Type</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Type  Name</th>
                                                  <th>Type Description</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                        <?php 
$no=1;
			foreach($type as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->AddressTypeName?></td>
                                                    <td><?php echo $data->AddressTypeDesc?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledittype<?php echo $data->AddressTypeCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
  <button value="<?php echo $data->AddressTypeCode?>" name="deltype" id="deltype" class="deltype fa fa-times btn btn-danger btn-mini" onclick="return del(this)"></button>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              <tr class="gradeX pagin">
                                                  <th colspan="7" scope="row">
                          <div align="right"> <?php echo $paginator;?></div></th>
                                                </tr> 
                                              </tbody>
                                            </table>