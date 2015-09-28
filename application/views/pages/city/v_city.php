 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 #txtsearch{ font-size:12px;}
 </style>
  <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>

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

      <div class="row">  
      <div class="col-sm-6">
           <h1><i class="fa fa-industry fa-2x"></i> &nbsp; City  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>   

      <form action="<?php echo base_url();?>search/search_city" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Service<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="cyName,couName" />
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
                                                  <th height="21" colspan="13"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-primary"><i class="icon-plus icons"></i>Add City</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>cyCode</th>
                                                  <th>cyName</th>
                                                  <th>couName</th>
                                                  <th>stName</th>
                                                  <th>isAirport</th>
                                                  <th>isSeaport</th>
                                                  <th>CreateBy</th>
                                                  <th>Create Date</th>
                                                  <th>Modified By</th>
                                                  <th>Modified Date</th>
                                                  <th colspan="2" class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
$air=$data->isAirport;
$sea=$data->isSeaport;

if($air=='1'){ $isair='<font color="#0000FF">Yes</font>';} else{$isair='<font color="#FF0000">No</font>';}
if($sea=='1'){ $issea='<font color="#0000FF">Yes</font>';} else{$issea='<font color="#FF0000">No</font>';}
				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->cyCode?></td>
                                                    <td><?php echo $data->cyName?></td>
                                                    <td><?php echo $data->couName?></td>
                                                    <td><?php echo $data->stName?></td>
                                                    <td><?php echo $isair;?></td>
                                                    <td><?php echo $issea?></td>
                                                    <td><?php echo $data->CreateBy;?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->CreateDate)); ?></td>
                                                    <td><?php echo $data->ModifiedBy;?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->ModifiedDate)); ?>
                                                    
                                                    </td>
                                                    <td class="text-center">
   <a class="btn-action" href="#modaledit<?php echo $data->cyCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                    </td>
                                                    <td class="text-center">
                                                      

                                                        
                                                        <a href="<?php echo base_url();?>master/delete_city/<?php echo $data->cyCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                        </a>                            
                                                        
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ;?>
  <tr class="gradeX pagin">
                                                  <th colspan="13" scope="row">
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
  		$isAirport=$row->isAirport;
		$isSeaport=$row->isSeaport;

		if($isAirport==1){ $status1='YES';}else{$status1='NO';}
		if($isSeaport==1){ $status2='YES';}else{$status2='NO';}

        ?>
<div id="modaledit<?php echo $row->cyCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_city')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">City Code</label>
    <div class="col-sm-9">
    <input name="cycode2" type="text" class="form-control" id="cycode2" value="<?php echo $row->cyCode;?>" required/>
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->cyCode;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">City Name</label>
    <div class="col-sm-9">
    <input name="cyname2" type="text" class="form-control" id="cyname2" value="<?php echo $row->cyName;?>" required/>
</div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Is Air port</label>
                        <div class="col-sm-9">
                         
                          <select name="airport" id="select2" class="form-control">						 <option value="<?php echo $row->isAirport;?>"><?php echo $status1;?></option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">is Sea port</label>
                        <div class="col-sm-9">
                          <select name="seaport" id="select" class="form-control">
   <option value="<?php echo $row->isSeaport;?>"><?php echo $status2;?></option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                         
                          <select name="tcoucode" id="tcoucode" required="required" class="form-control">
                            <option value="<?php echo $row->couCode;?>"><?php echo $row->couName;?></option>
                            
                            <?php
	foreach($country as $ct){
	    ?>
                            <option value="<?php echo $ct->couCode;?>"><?php echo $ct->couName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
       <select name="tstcode" id="tstcode" required="required" class="form-control">
          <option value="<?php echo $row->stCode;?>"><?php echo $row->stName;?></option>
          <?php
	foreach($state as $st){
	    ?>
          <option value="<?php echo $st->stCode;?>"><?php echo $st->stName;?></option>
          <?php } ?>
</select></div>
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
                <h3 id="myModalLabel">Add City</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/save_city')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">City Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="cycode" type="text" class="form-control"  id="cycode" required="required" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">City Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="cyname" type="text" class="form-control"  id="cyname" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Is Air port</label>
                        <div class="col-sm-9">
                          
                          <select name="airport" id="select2" class="form-control">
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">is Sea port</label>
                        <div class="col-sm-9">
                          <select name="seaport" id="select" class="form-control">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                          
                          <select name="tcoucode" id="tcoucode" required="required" class="form-control">
                            <option value="">choose country</option>
                            <?php
	foreach($country as $ct){
	    ?>
                            <option value="<?php echo $ct->couCode;?>"><?php echo $ct->couName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
        <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
       <select name="tstcode" id="tstcode" required="required" class="form-control">
          <option value="">Chosse state</option>
          <?php
	foreach($state as $st){
	    ?>
          <option value="<?php echo $st->stCode;?>"><?php echo $st->stName;?></option>
          <?php } ?>
</select></div>
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
                url : "<?php echo base_url('search/search_city_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
	   
	   
	 $("#filter").change(function(){
            var filter = $("#filter").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/filter_city'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                }
            });

        });
</script>
    
 