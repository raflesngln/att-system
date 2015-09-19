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
              <h2><i class="fa fa-bank fa-2x"></i> &nbsp; <strong>State</strong> List</h2> 
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="8"> <div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><button class="btn btn-primary"><i class="icon-plus icons"></i>Add State</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>stCode</th>
                                                  <th>stName</th>
                                                  <th>CreateBy</th>
                                                  <th>Create Date</th>
                                                  <th>Modified By</th>
                                                  <th>Modified Date</th>
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
                                                    <td><?php echo $data->stCode?></td>
                                                    <td><?php echo $data->stName?></td>
                                                    <td><?php echo $data->CreateBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?></td>
                                                    <td class="text-center">
                                                      <div align="center">
<a class="btn-action" href="#modaledit<?php echo $data->stCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        
                                                        <a href="<?php echo base_url();?>master/delete_state/<?php echo $data->stCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
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
>




<!-----edit data------->
<?php

    foreach($list as $row){
        ?>
<div id="modaledit<?php echo $row->stCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_state')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">State Code</label>
    <div class="col-sm-9">
    <input name="stcode2" type="text" class="form-control" id="stcode2" value="<?php echo $row->stCode;?>" required/>
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->stCode;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">State Name</label>
    <div class="col-sm-9">
    <input name="stname2" type="text" class="form-control" id="stname2" value="<?php echo $row->stName;?>" required/>
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
                <h3 id="myModalLabel">Add State</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/save_state')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">State Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="stcode" type="text" class="form-control"  id="stcode" required="required" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">State Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="stname" type="text" class="form-control"  id="stname" required="required" />
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
    
    
 