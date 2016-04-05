 <style>
 .btn-search{ height:32px; margin-left:-10px;}
 #txtsearch{ font-size:12px;}
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
           <h1><i class="fa fa-industry fa-2x"></i> &nbsp; Port  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>   

      <form action="<?php echo base_url();?>city/search_city" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Service<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="CityName / CountryName" />
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
                                                  <th height="21" colspan="6"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add port</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Port Code</th>
                                                  <th>Port Name</th>
                                                  <th>Organitation</th>
                                                  <th>City</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
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
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->PortCode?></td>
                                                    <td><?php echo $data->PortName?></td>
                                                    <td><?php echo $data->OrgName?></td>
                                                    <td><?php echo $data->CityName?></td>
                                                    <td class="text-center">
                                                      <a class="btn-action" href="#modaledit<?php echo $data->PortCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                        <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        <a href="<?php echo base_url();?>ms_port/delete_port/<?php echo $data->PortCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
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
    



<!-- edit data  -->
<?php

    foreach($list as $row){
  

        ?>
<div id="modaledit<?php echo $row->PortCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('city/update_city')?>">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Port Code</label>
    <div class="col-sm-9">
    <input name="PortCode2" type="text" class="form-control" id="PortCode2" value="<?php echo $row->PortCode;?>" readonly="readonly" />
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->PortCode;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">Port Name</label>
    <div class="col-sm-9">
    <input name="CityName2" type="text" class="form-control" id="CityName2" value="<?php echo $row->CityName;?>" />
</div>
                        <div class="clearfix"></div>
                      </div>
  
  
  <div class="form-group">
                        <label class="col-sm-3 control-label">Country</label>
                        <div class="col-sm-9">
                         
                          <select name="tCountry" id="tCountry" required="required" class="form-control">
                            <option value="<?php echo $row->CountryCode;?>"><?php echo $row->CountryName;?></option>
                            
                            <?php
	foreach($country as $ct){
	    ?>
                            <option value="<?php echo $ct->CountryCode;?>"><?php echo $ct->CountryName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">State</label>
                        <div class="col-sm-9">
       <select name="tState" id="tState" required="required" class="form-control">
          <option value="<?php echo $row->StateCode;?>"><?php echo $row->StateName;?></option>
          <?php
	foreach($state as $st){
	    ?>
          <option value="<?php echo $st->StateCode;?>"><?php echo $st->StateName;?></option>
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



<!-- add data -->
<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add port</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('ms_port/save_port')?>">
                    <div class="modal-body">
                      
 <div class="form-group">
                        <label class="col-sm-3 control-label">Port code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="PortCode" type="text" class="form-control"  id="PortCode" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Port Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="PortName" type="text" class="form-control"  id="PortName" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
  
<div class="form-group">
                        <label class="col-sm-3 control-label">Organitation</label>
                        <div class="col-sm-9">
                          
                          <select name="organitation" id="organitation" required="required" class="form-control">
                            <option value="">choose Organitation</option>
                            <?php
	foreach($organitation as $org){
	    ?>
                            <option value="<?php echo $org->OrgCode;?>"><?php echo $org->OrgName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        <div class="clearfix"></div>
                      </div>
        <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-9">
       <select name="city" id="city" class="form-control">
          <option value="">Chosse City</option>
          <?php
	foreach($city as $cty){
	    ?>
          <option value="<?php echo $cty->PortCode;?>"><?php echo $cty->CityName;?></option>
          <?php } ?>
</select></div>
                        <div class="clearfix"></div>
                      </div>
        <div class="form-group">
              <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9"><span class="controls">
 <textarea name="remarks" id="remarks" class="form-control"></textarea>
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
   
<script type="text/javascript">			
	$(window).load(function(){
		$("#loading").fadeOut("slow");
	})
	
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('city/search_city_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
	   
</script>
    
 