 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 </style>
   <div class="row-fluid">
    <div class="span12">
                  <?php
			if(isset($eror)){?>
            <label class="alert alert-error col-sm-12">
			<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>	</button>							
			<?php echo isset($eror)?$eror:'';?>
			<br />
			</label>
            <?php }?>   
      <div class="header col-md-3">

           <h2><i class="fa fa-male fa-1.5x"></i> &nbsp; <strong>Staff</strong> List</h2> 
            </div>
      <div class="headerrr col-md-4 pull-right">
      
            
            <div class="form-group">
                        
                        <div class="col-sm-5">
                        <p></p>
                        <strong><label> Filter by</label></strong>
                              <select name="filter" id="select" class="form-control">
                                <option value="name">Name</option>
                                <option value="0">Devisi</option>
                              </select>
              </div>
                       
              </div>
<form action="<?php echo base_url();?>search_master/search_staff" method="post"> 
           <div class="col-sm-7">
           <div class="row">
           
 <div class="col-md-10">Search Staff<span class="controls">
   <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="Search name" />
   </span></div>
            <div class="col-md-2">&nbsp;<input type="submit" name="button" id="button" value="Search" class="btn btn-mini btn-search btn-primary" /></div>
           </div>
             </div>          
                      

      </form>
  </div>

            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table-responsive">
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
                                        </div>
                                    </div>
                                </form>
              </div>
          </div>
      </div>
  </div>
  
            </div>





<!-----edit data------->
<?php

    foreach($list as $row){
       		
		$isaktif=$row->isActive;

		if($isaktif==1){ $status='Aktif';}else{$status='Nonaktif';}
        ?>
<div id="modaledit<?php echo $row->empCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('staff/update_staff')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Staff Name</label>
    <div class="col-sm-9">
    <input name="name2" type="text" class="form-control" id="name2" value="<?php echo $row->empName;?>" required/>
    <span class="controls">
    <input type="hidden" name="id2" id="id2" value="<?php echo $row->empCode;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Initial</label>
    <div class="col-sm-9">
    <input name="initial2" type="text" class="form-control" id="initial2" value="<?php echo $row->empInitial;?>" required/>
    </div>
                        <div class="clearfix"></div>
                      </div>
   <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
    <div class="col-sm-9">
    <input name="phone2" type="text" class="form-control" id="phone2" value="<?php echo $row->Phone;?>" required/>
    </div>
                        <div class="clearfix"></div>
                      </div>
   <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
      <textarea name="address2" cols="30" rows="3" class="form-control" id="address2" required="required"><?php echo $row->Address;?></textarea>
    </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-9">
      <textarea name="remarks2" cols="30" rows="3" class="form-control" id="remarks2" required="required"><?php echo $row->Remarks;?></textarea>
    </div>
                        <div class="clearfix"></div>
                      </div> 
<div class="form-group">
                        <label class="col-sm-3 control-label">Status Aktive</label>
                        <div class="col-sm-9">
                          <select name="status2" id="select2" class="form-control">						<option value="<?php echo $row->isActive;?>"><?php echo $status;?></option>
                          <option value="1">Aktif</option>
                          <option value="0">Nonaktif</option>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
<div class="clearfix"></div>
                      <div class="clearfix"></div>
                      <div class="clearfix"></div>              
                      <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>



<!-----add data------->
<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Staff</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('staff/save_staff')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Staff Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control"  id="name" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Staff Initial</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="initial" type="text" class="form-control"  id="initial" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9"><span class="controls">
                          <textarea name="address" cols="30" rows="3" class="form-control" id="address" required="required"></textarea>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
   <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="phone" type="text" class="form-control"  id="phone" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9"><span class="controls">
                        <textarea name="remarks" cols="30" rows="3" class="form-control" id="remarks" required="required"></textarea>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
  
 <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                  </div>
            
                </form>
            </div>
        </div>
    
    </div>
    
 
 
<script type="text/javascript">			
$("#custCode").change(function(){
            var custCode = $("#custCode").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_sub'); ?>",
                data: "custCode="+custCode,
                cache:false,
                success: function(data){
                    $('#transc_id').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
	   
	   
	 $("#transc_id").change(function(){
            var transc_id = $("#transc_id").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_detail_invoice'); ?>",
                data: "transc_id="+transc_id,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });
</script>
 