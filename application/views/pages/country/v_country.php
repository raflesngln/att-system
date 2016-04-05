 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 </style>
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
           <h1><i class="fa fa-flag fa-2x"></i> &nbsp; Country  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>                
      
      <form action="<?php echo base_url();?>search/search_country" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Country<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="Country Name" />
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
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th height="21" colspan="5"> <div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><button class="btn btn-blue"><i class="icon-plus icons"></i>Add Country</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>CountryCode</th>
                                                  <th>CountryName</th>
                                                  <th>Remarks</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->CountryCode?></td>
                                                    <td><?php echo $data->CountryName?></td>
                                                    <td><?php echo $data->Remarks?></td>
                                                    <td class="text-center">
                                                      <div align="center">
<a class="btn-action" href="#modaledit<?php echo $data->CountryCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        
                                                        <a href="<?php echo base_url();?>country/delete_country/<?php echo $data->CountryCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
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
   




<!-- edit data -->
<?php

    foreach($list as $row){
        ?>
<div id="modaledit<?php echo $row->CountryCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('country/update_country')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Country Code</label>
    <div class="col-sm-9">
    <input name="CountryCode" type="text" class="form-control" id="CountryCode" value="<?php echo $row->CountryCode;?>" readonly="readonly"/>
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->CountryCode;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Country Name</label>
    <div class="col-sm-9">
    <input name="CountryName" type="text" class="form-control" id="CountryName" value="<?php echo $row->CountryName;?>" />
        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label"> Remarks</label>
    <div class="col-sm-9">
    <textarea name="Remarks" class="form-control" id="Remarks"><?php echo $row->Remarks;?></textarea>
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


 <!-- add data -->
<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add country</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('country/save_country')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Country Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="CountryCode" type="text" class="form-control"  id="CountryCode" required="required" maxlength="2" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Country Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="CountryName" type="text" class="form-control"  id="CountryName" required="required" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label"> Remarks</label>
    <div class="col-sm-9">
    <textarea name="Remarks" class="form-control" id="Remarks"></textarea>
        </div>
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
    
<script type="text/javascript">			
	$(window).load(function(){
		$("#loading").fadeOut("slow");
	})
	
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('country/search_country_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
</script>
 