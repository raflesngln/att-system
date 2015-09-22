<table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-primary"><i class="icon-plus icons"></i>Add Staff</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Code</th>
                                                  <th>Initial</th>
                                                  <th>Name</th>
                                                  <th>Address</th>
                                                  <th>Phone</th>
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
$status=$data->isActive;

if($status=='1'){ $statusname='<font color="#0033FF">Aktif</font>';} else{$statusname='<font color="#FF0000">Nonaktif</font>';}

				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->empCode?></td>
                                                    <td><?php echo $data->empInitial?></td>
                                                    <td><?php echo $data->empName?></td>
                                                    <td><?php echo $data->Address?></td>
                                                    <td><?php echo $data->Phone?></td>
                                                    <td><?php echo $data->CreateBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?></td>
                                                    <td class="text-center">
                                                      <a href="#modaledit<?php echo $data->empCode?>" data-toggle="modal" title="Edit">
                                                      <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                      <i class="icon-edit icon-1x icon-only"></i>
                                                      </button>                                          
                                                      </a>                                              
                                                    </td>
             <td>
    <a href="<?php echo base_url();?>staff/delete_staff/<?php echo $data->empCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
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