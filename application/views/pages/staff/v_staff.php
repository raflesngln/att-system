
 <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
 
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>asset/js/jquery_ui/jquery-ui-1.8.1.custom.css" />
<script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery_ui/jquery-ui-1.8.1.custom.min.js"></script>
<script type="text/javascript">
$(function() {
   $(".delete").click(function(){
    var request = $(this).attr("href");
      var record = $(this).parents("tr");
      
      $("#dialog").dialog({
         resizable: false,
         modal: true,
         draggable: true,
         width: 500,
         height: 210,
         buttons: {
            "Ya Hapus": function(){                
                $.ajax({
          url: request,
          success: function(){
            $(record).remove();
            $("#dialog").dialog("close");
          }
                });
            },
            "Tidak Batalkan": function(){
               $(this).dialog("close");
            }
         }
      });
      return false;
   });
});
</script>


   <div class="row-fluid">
    <div class="span12">
                  <?php
			if(isset($message)){?>
      <label class="alert alert-<?php echo $clas;?> col-sm-12">
			<button type="button" class="close" data-dismiss="alert">
			<i class="icon-remove"></i>	</button>							
			<i class="fa fa-check bigger-150"></i><?php echo isset($message)?$message:'';?>
			<br />
			</label>
            <?php }?> 

  <div class="row">  
      <div class="col-sm-6">
           <h1><i class="fa fa-male fa-2x"></i> &nbsp; Staff  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
               <div class="col-sm-5">               
              <div class="row">
          <div class="col-sm-12">Filter By<span class="controls">
          <select name="filter" id="filter" class="form-control">
                <option value="empName">Name</option>
                <option value="Address">Address</option>
                </select> 
            </span>
          </div>
           </div>
              </div>   
      <form action="<?php echo base_url();?>staff/search_staff" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Staff<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="Name / Initial" />
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
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add Staff</button></a></div></th>
                                                </tr>
                                                <tr height="50">
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
                                                    <td><?php echo $no?></td>
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
<i class="icon-pencil bigger-130 green"></i>                                          
                                                      </a>                                              
                                                    </td>
             <td>
    <a href="<?php echo base_url();?>staff/delete_staff/<?php echo $data->empCode?>" onClick="return confirm('Yakin Hapus  Data !!');">
	<i class="icon-trash bigger-130 red"></i>
    </a>
    

                                                                                                
                                                    
                                       
                                                    </td>
                                                </tr>
        <?php $no++; } ;?>
                                                <tr class="gradeX pagin">
                                                  <th colspan="12" scope="row">
												  <div align="right"> <?php echo $paginator;?></div></th>
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





<!-- edit data  -->
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
                      <label class="col-sm-3 control-label">Initial</label>
                      <div class="col-sm-9">
                      <input name="initial2" type="text" class="form-control" id="initial2" value="<?php echo $row->empInitial;?>" maxlength="10"/>
                      </div>
                      <div class="clearfix"></div>
    </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Staff Name</label>
                        <div class="col-sm-9">
                        <input name="name2" type="text" class="form-control" id="name2" value="<?php echo $row->empName;?>"/>
                        <span class="controls">
                        <input type="hidden" name="id2" id="id2" value="<?php echo $row->empCode;?>" />
                        </span></div>
                        <div class="clearfix"></div>
    </div>

   <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
    <div class="col-sm-9">
    <input name="phone2" type="text" class="form-control" id="phone2" value="<?php echo $row->Phone;?>" maxlength="15" onkeypress="return isNumberKey(event)"/>
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
<!-- edit data  -->


<!-- ADD DATA -->
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
                        <label class="col-sm-3 control-label"> Initial</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="initial" type="text" class="form-control"  id="initial" required="required" maxlength="10" />
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
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9"><span class="controls">
                          <textarea name="address" cols="30" rows="3" class="form-control" id="address" required="required"></textarea>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
   <div class="form-group">
                        <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="phone" type="text" class="form-control"  id="phone" required="required" maxlength="15" onkeypress="return isNumberKey(event)" />
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



<div id="dialog" title="Konfirmasi" style="display:none;">
  <p>Anda yakin ingin menghapus data tersebut?</p>
</div>


  
<script type="text/javascript">			
	$(window).load(function(){
		$("#loading").fadeOut("slow");
	})
	
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('staff/search_staff_ajax'); ?>",
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
                url : "<?php echo base_url('staff/filter_staff'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                    $('#raf').html('Raflesia Naingogolan');
                }
            });

        });
</script>
 