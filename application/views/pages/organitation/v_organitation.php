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
           <h1><i class="fa fa-industry fa-2x"></i> &nbsp; Organitation  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>   

      <form action="<?php echo base_url();?>city/search_city" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Service<span class="controls">
           <input name="txtsearch" type="text" class="form-control"  id="txtsearch" required="required" placeholder="OrgName / CountryName" />
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
                                                  <th height="21" colspan="8"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add organitation</button></a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Code</th>
                                                  <th style="width:35%">Name</th>
                                                  <th>IsAir</th>
                                                  <th>Is Sea</th>
                                                  <th>Is Land</th>
                                                  <th>Is Rail</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
$air=$data->IsAir;
$sea=$data->IsSea;
$land=$data->IsLand;
$rail=$data->IsRail;

if($air=='1'){ $isair='<font color="#0000FF">Yes</font>';} else{$isair='<font color="#FF0000">No</font>';}
if($sea=='1'){ $issea='<font color="#0000FF">Yes</font>';} else{$issea='<font color="#FF0000">No</font>';}
if($land=='1'){ $island='<font color="#0000FF">Yes</font>';} else{$island='<font color="#FF0000">No</font>';}
if($rail=='1'){ $israil='<font color="#0000FF">Yes</font>';} else{$israil='<font color="#FF0000">No</font>';}
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->OrgCode?></td>
                                                    <td><?php echo $data->OrgName?></td>
                                                    <td><?php echo $isair?></td>
                                                    <td><?php echo $issea?></td>
                                                    <td><?php echo $island?></td>
                                                    <td><?php echo $israil?></td>
                                                    <td class="text-center">
                                                      <a class="btn-action" href="#modaledit<?php echo $data->OrgCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                        <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                        <a href="<?php echo base_url();?>ms_organitation/delete_organitation/<?php echo $data->OrgCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                          <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                        </a>
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ;?>
  <tr class="gradeX pagin">
                                                  <th colspan="8" scope="row">
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
  		$isAirport=$row->isAirport;
		$isSeaport=$row->isSeaport;

		if($isAirport==1){ $status1='YES';}else{$status1='NO';}
		if($isSeaport==1){ $status2='YES';}else{$status2='NO';}

        ?>
<div id="modaledit<?php echo $row->OrgCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
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
                        <label class="col-sm-3 control-label">City Code</label>
    <div class="col-sm-9">
    <input name="OrgCode2" type="text" class="form-control" id="OrgCode2" value="<?php echo $row->OrgCode;?>" readonly="readonly" />
              <span class="controls">
              <input type="hidden" name="id2" id="id2" value="<?php echo $row->OrgCode;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                <div class="form-group">
                        <label class="col-sm-3 control-label">City Name</label>
    <div class="col-sm-9">
    <input name="OrgName2" type="text" class="form-control" id="OrgName2" value="<?php echo $row->OrgName;?>" />
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
                <h3 id="myModalLabel">Organitation </h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('ms_organitation/save_organitation')?>">
                    <div class="modal-body">
                      
 <div class="form-group">
                        <label class="col-sm-3 control-label">Org Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="OrgCode" type="text" class="form-control"  id="OrgCode" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
              <label class="col-sm-3 control-label">Org Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="OrgName" type="text" class="form-control"  id="OrgName" required="required" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Transport</label>
                        <div class="col-sm-9">
                          <p>
                            <label>
                              <input type="checkbox" name="CheckboxGroup1" value="1" id="CheckboxGroup1_0" />
                            Is Air</label>
                            <br />
                            <label>
                              <input type="checkbox" name="CheckboxGroup2" value="1" id="CheckboxGroup1_1" />
                              Is Sea</label>
                            <br />
                             <label>
                              <input type="checkbox" name="CheckboxGroup3" value="1" id="CheckboxGroup1_1" />
Is Land </label>
                            <br />                           
                             <label>
                              <input type="checkbox" name="CheckboxGroup4" value="1" id="CheckboxGroup1_1" />
Is Rail </label>
                            <br />                           
                          </p>
              </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
              <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9"><span class="controls">
 <textarea name="OrgDesc" id="OrgDesc" class="form-control"></textarea>
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
    
 