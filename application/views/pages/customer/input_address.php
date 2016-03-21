
    <div class="container">
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
        <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>
        </div>
</div>

            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_address_type">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th colspan="5"> <div align="left"><a class="btn btn-blue btn-addnew tbladdtype" href="#addmodaltype" data-toggle="modal" title="Add" id="tbladd"><i class="icon-plus icons"></i>Add Address</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Adress Name</th>
                                                  <th>UP</th>
                                                  <th>Address Detail</th>
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
                                                    <td><?php echo $data->AddressTypeDesc?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledittype<?php echo $data->AddressTypeCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
  <button value="<?php echo $data->AddressTypeCode?>" name="deltype" id="deltype" class="deltype fa fa-times btn btn-danger btn-mini" onclick="return del2(this)"></button>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              <tr class="gradeX pagin">
                                                  <th colspan="8" scope="row">
                          <div align="right"> <?php echo $paginator;?></div></th>
                                                </tr> 
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
   <div class="clearfix clearfx"></div>
  <div class="col-sm-10 text-right">
<a data-toggle="tab" href="#contact" class="next2 btn btn-warning btn-large">
  <i class="red fa fa-buildingg bigger-110"></i>Next</a>
   </div>
              </div>
          </div>
      </div>
  </div>
           
 
 
 <!-- edit data -->
<?php

    foreach($type as $row){
		
        ?>
<div id="modaledittype<?php echo $data->AddressTypeCode?>" class="modaledittype modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">      
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">  Name </label>
                      <div class="col-sm-9"><span class="controls">
                        <input name="typename" type="text" class="form-control typename" id="typename" required="required" value="<?php echo $row->AddressTypeName;?>" />
                      </span>
                        <input type="hidden" name="idtype" id="idtype" value="<?php echo $row->AddressTypeCode;?>" />
                      </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="typedesc2" cols="30" rows="2" class="form-control" id="typedesc2" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                          <textarea name="typedesc" cols="30" rows="2" class="form-control typedesc" id="typedesc" required="required"><?php echo $row->AddressTypeDesc;?></textarea>
                        </div>
                        
                    </div>

    
<div class="clearfix"></div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary btn-edit-type" type="submit" id="btn-edit-type"><i class="icon-save bigger-160 icons">&nbsp;</i> Update</button>
</div>
                    
            
            </div>
  </div></div></div>
    
<?php } ?>

<!--ADD DATA-->
<div id="addmodaltype" class="addmodaltype modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Address</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">  Name </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="typename2" type="text" class="form-control" id="typename2" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="typedesc2" cols="30" rows="2" class="form-control" id="typedesc2" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                          <textarea name="typedesc2" cols="30" rows="2" class="form-control" id="typedesc2" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary" type="button" id="btn-save-type"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    
    
<script type="text/javascript">			
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('customer/search_customer_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
$("#btn-save-type").click(function(){
         var typename2 = $("#typename2").val();
		 var typedesc2 = $("#typedesc2").val();
		 
  				$.ajax({
                type: "POST",
              url : "<?php echo base_url('customer/save_address_type');?>",
                data: "typename2="+typename2+"&typedesc2="+typedesc2,
                cache:false,
                success: function(data){
                    $('#table_address_type').html(data);
                    $("#addmodaltype").modal('hide');
					$("#typedesc2").val('');
					$("#typename2").val('');
                }
            }); 
			$("#addmodaltype").modal('hide');
        });
		
function del2(dat){
			 var kode =$(dat).val();
			$.ajax({
                type: "POST",
                url : "<?php echo base_url('customer/confirm_delete_type'); ?>",
                data: "kode="+kode,
                cache:false,
                success: function(data){
                    $('#table_address_type').html(data);
                    $("#addcustom").modal('hide');
                }
            }); 
			 
		}


$("#btn-edit-type").click(function(e) {
  e.preventDefault();
  var typename = $("#typename").val(); 
  var idtype = $("#idtype").val(); 
  
  var typedesc = $("#typedesc").val();
  
  var dataString = 'typename='+typename+'&typedesc='+typedesc+'&idtype='+idtype;
  $.ajax({
    type:'POST',
    data:dataString,
    url:"<?php echo base_url('customer/update_address_type'); ?>",
    success:function(data) {
                    $('#table_address_type').html(data);
                    $(".modaledittype").modal('hide');
    }
  });
   $(".modaledittype").modal('hide');
});


</script>
 