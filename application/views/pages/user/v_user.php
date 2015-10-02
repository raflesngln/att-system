   <div class="row-fluid">
    <div class="span12">
            <div class="header">
             <?php
			if(isset($eror)){?>
            <div class="alert alert-error">
			<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>	</button>							
			<?php echo isset($eror)?$eror:'';?>
			<br />
			</div>
            <?php }?>
                <h2><i class="fa fa-users fa-2x"></i> &nbsp; <strong>User</strong> List</h2> 
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="2"> <div align="left"><a class="btn-addnew btn-blue" href="#modaladd" data-toggle="modal" title="Add"><button class="btn btn-blue"><i class="icon-plus icons"></i>Add User</button></a></div></th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Name</th>
                                                  <th>Username</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></th>
                                                    <td><a href="<?php echo base_url();?>transaksi/det_transaksi/<?php echo $data->cust_id;?>"><?php echo $data->FullName?></a></td>
                                                    <td><?php echo $data->UserName?></td>
                                                    <td class="text-center">
                                                      <div align="center">
<a class="btn-action" href="#modaledit<?php echo $data->UserName?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        
                                                        <a href="<?php echo base_url();?>master/delete_user/<?php echo $data->UserName?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                        </a>                            
                                                        
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
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

    foreach($user as $row){
        ?>
<div id="modaledit<?php echo $row->UserName;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_user')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
    <div class="col-sm-9">
    <input name="name2" type="text" class="form-control" id="name2" value="<?php echo $row->FullName;?>" required/>
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->UserName;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
    <div class="col-sm-9">
    <input name="us2" type="text" class="form-control" id="us2" value="<?php echo $row->UserName;?>" required/>
    </div>
                        <div class="clearfix"></div>
                      </div>
    <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
    <div class="col-sm-9">
    <input name="ps2" type="password" class="form-control" id="ps2" value="" required="required"/>
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
                <h3 id="myModalLabel">Add User</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/save_user')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control"  id="name" required="required" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="us" type="text" class="form-control"  id="us" required="required" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="ps" type="text" class="form-control" id="ps" required="required"/>
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
    </div>
    
    
 