
 <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
   <div class="row-fluid">
    <div class="span12">
                  <?php
      if(isset($message)){?>
            <label class="alert alert-<?php echo $clas;?> col-sm-12">
      <button type="button" class="close" data-dismiss="alert">
      <i class="icon-remove"></i> </button>             
      <?php echo isset($message)?$message:'';?>
      <br />
      </label>
            <?php }?> 

  <div class="row">  
      <div class="col-sm-6">
           <h1><i class="fa fa-diamond fa-2x"></i> &nbsp; Commodity  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
               <div class="col-sm-5">               
   
              </div>   
      <form action="<?php echo base_url();?>commodity/search_commodity" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search commodity<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="Name" />
            </span>
          </div>
         <div class="col-md-2">
         &nbsp;<input type="submit" name="button" id="button" value="Search" class="btn btn-mini btn-search btn-primary" />
         </div>
           </div>
        </div>              
      </form> 
   </div>
</div>

            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel" id="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="6"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add commodity</button></a></div></th>
                                                </tr>
                                                <tr height="50">
                                                  <th width="24">No.</th>
                                                  <th width="124">Code</th>
                                                  <th width="152">Name</th>
                                                  <th width="261">Remarks</th>
                                                  <th width="51" class="text-center">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->CommCode?></td>
                                                    <td><?php echo $data->CommName?></td>
                                                    <td><?php echo $data->CommDesc?></td>
                                                    <td>
                                                      <a href="#modaledit<?php echo $data->CommCode?>" data-toggle="modal" title="Edit">
                                                        <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                        <i class="icon-edit icon-1x icon-only"></i>
                                                        </button>                                          
                                                      </a>
                                                      <a href="<?php echo base_url();?>commodity/delete_commodity/<?php echo $data->CommCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
                                                      <button class="btn btn-danger btn-small" title="Delete Data">
                                                       <i class="icon-trash icon-1x icon-only"></i>
                                                      </button>
                                                      </a>
                                                      
                                                    </td>
                                                </tr>
        <?php $no++; } ;?>
                                                <tr class="gradeX pagin">
                                                  <th colspan="6" scope="row">
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





<!--   EDIT DATA   -->
<?php

    foreach($list as $row){
       		
        ?>
<div id="modaledit<?php echo $row->CommCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('commodity/update_commodity')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Code</label>
    <div class="col-sm-9">
    <input name="code" type="text" class="form-control" id="code" value="<?php echo $row->CommCode;?>" maxlength="10" readonly="readonly"/>
    <span class="controls">
    <input type="hidden" name="id" id="id" value="<?php echo $row->CommCode;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label"> Name</label>
    <div class="col-sm-9">
    <input name="name" type="text" class="form-control" id="name" value="<?php echo $row->CommName;?>" />
    </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
              <label class="col-sm-3 control-label">Remarks</label>
    <div class="col-sm-9">
      <textarea name="remarks" cols="30" rows="3" class="form-control" id="remarks" required="required"><?php echo $row->CommDesc;?></textarea>
    </div>
                        <div class="clearfix"></div>
                      </div> 
<div class="form-group">
                   
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


<!-- ADD DATA -->
<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add commodity</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('commodity/save_commodity')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="code" type="text" class="form-control"  id="code" required="required" maxlength="10" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label"> Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control"  id="name" required="required" />
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
	
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('commodity/search_commodity_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
</script>
 