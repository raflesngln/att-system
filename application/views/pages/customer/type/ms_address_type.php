
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
      <div class="col-sm-6">
           <h1><i class="fa fa-opencart fa-2x"></i> &nbsp; Addres Type  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>   

      <form action="<?php echo base_url();?>customer/search_customer" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Customer<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="Name / Address" />
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
                                        <div class="table-responsive" id="table_address_type">
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
                                        </div>
                                    </div>
                                </form>
              </div>
          </div>
      </div>
  </div>
           
 
 
 <!-- edit data -->
<?php

    foreach($type as $row){
		
        ?>
<div id="modaledittype<?php echo $row->AddressTypeCode;?>" class="modaledittype modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
 <form name="typeedit" method="post" action="">        
                  <div class="modal-body">
                    <div class="form-group">
                        <label class="col-sm-3 control-label"> Type Name </label>
                      <div class="col-sm-9"><span class="controls">
                        <input name="typename" type="text" class="form-control typename" id="typename" required="required" value="<?php echo $row->AddressTypeName;?>" />
                      </span>
                        <input type="hidden" name="idtype" id="idtype" value="<?php echo $row->AddressTypeCode;?>" />
                      </div>
                        <div class="clearfix"></div>
                      </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                          <textarea name="typedesc" cols="30" rows="2" class="form-control typedesc" id="typedesc" required="required"><?php echo $row->AddressTypeDesc;?></textarea>
                        </div>
                        <div class="clearfix"></div>
                    </div>
</form>

    
<div class="clearfix"></div>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary btn-edit-type" type="submit" id="btn-edit-type"><i class="icon-save bigger-160 icons">&nbsp;</i> Update</button>
</div>
                    
            
            </div>
        </div>
    </div>
    
<?php } ?>

<!--ADD DATA-->
<div id="addtype" class="addtype modal fade responsive" tabindex="1000" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Address Type</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Type Name </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="typename2" type="text" class="form-control" id="typename2" required="required" maxlength="30" />
                        </span></div>
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
                    $("#addtype").modal('hide');
					$("#typedesc2").val('');
					$("#typename2").val('');
                }
            }); 
        });
$(".btn-edit-typeeeeeeeeeeee").click(function(){
         var typename = $(".typename").val();
		 var typedesc = $(".typedesc").val();
		 
alert(typename);
        });

		
function del(dat){
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
    url:"<?php echo base_url('customer/update_type'); ?>",
    success:function(data) {
                    $('#table_address_type').html(data);
                    $(".modaledittype").modal('hide');
    }
  });
});


</script>
 