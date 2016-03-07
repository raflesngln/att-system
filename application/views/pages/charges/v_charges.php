
 <script type="text/javascript" src="<?php echo base_url();?>asset/js/jquery.js"></script>
  
    <script src="<?php echo base_url();?>asset/js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>asset/js/jquery.multiple.select.js"></script>
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/multiple-select.css"/>



    <script>
      $(document).ready(function(){
        $('#multi').multipleSelect();
      });
    </script>
<style type="text/css">
  #multi[type="checkbox"]{
    margin-left: 150px;
  }
.lbl-multi{
  margin-left: 200px;
}
</style>

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
           <h1><i class="fa fa-hourglass-start bigger220"></i> &nbsp; Charges  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
               <div class="col-sm-5">               
   
              </div>   
      <form action="<?php echo base_url();?>charges/search_charges" method="post"> 
           <div class="col-sm-7">
           <div class="row">
          <div class="col-sm-9">Search Charges<span class="controls">
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
                                                  <th height="21" colspan="12"><div align="left"><a class="btn-addnew" href="#modaladd" data-toggle="modal" title="Add">
                                                    <button class="btn btn-blue"><i class="icon-plus icons"></i>Add charges</button></a></div></th>
                                                </tr>
                                                <tr height="50">
                                                  <th>No.</th>
                                                  <th>Charge Code</th>
                                                  <th>Description</th>
                                                  <th>isCost</th>
                                                  <th>isSales</th>
                                                  <th>isCode</th>
                                                  <th>AccDebet</th>
                                                  <th>AccCredit</th>
                                               
                                                  <th colspan="2" class="text-center">Actions</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
$no=1;
foreach($list as $data){
      $isCost=$data->isCost;
      $isSales=$data->isSales;
      $isActive=$data->isActive;

      if($isCost=='1'){ $status1="<font color='blue'>Yes</font>";}else{$status1="<font color='red'>No</font>";}
      if($isSales=='1'){ $status2="<font color='blue'>Yes</font>";}else{$status2="<font color='red'>No</font>";} 
				
			?>
                                                <tr class="gradeX">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $data->ChargeCode?></td>
                                                    <td><?php echo $data->Description?></td>
                                                    <td><?php echo $status1?></td>
                                                    <td><?php echo $status2?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td><?php echo $data->AccDebet; ?></td>
                                                    <td><?php echo $data->AccCredit?></td>
                                                   
                                                    <td class="text-center">
                                                      <a href="#modaledit<?php echo $data->idCharges?>" data-toggle="modal" title="Edit">
                                                      <button class="btn btn-primary btn-small tooltip-info" title="Edit data">
                                                      <i class="icon-edit icon-1x icon-only"></i>
                                                      </button>                                          
                                                      </a>                                              
                                                    </td>
                                                           <td>
                                                  <a href="<?php echo base_url();?>charges/delete_charges/<?php echo $data->idCharges?>" onClick="return confirm('Yakin Hapus  Data !!');">
                                               <button class="btn btn-danger btn-small" title="Delete Data">
                                              	<i class="icon-trash icon-1x icon-only"></i>
                                              	</button>
                                                  </a>
                                       
                                                    </td>
                                                </tr>
        <?php $no++; } ;?>
                                                <tr class="gradeX pagin">
                          <th colspan="12" scope="row">
<div align="right"> <?php echo $paginator;?></div>
						    </th>
                          
                                                </tr>                                
                                                
                                              </tbody>
                                            </table>
<!-- PAGINATION --></div>
							</div><!--PAGE CONTENT ENDS-->
<!-- END OF PAGINATION -->
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
      $isCost=$row->isCost;
      $isSales=$row->isSales;
      $isActive=$row->isActive;

      if($isCost=='1'){ $status1="Yes";}else{$status1="No";}
      if($isSales=='1'){ $status2="Yes";}else{$status2="No";}	
       if($isActive=='1'){ $status3="Yes";}else{$status3="No";}  	
        ?> 
<div id="modaledit<?php echo $row->idCharges;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('charges/update_charges')?>">
                        <div class="modal-body">
<div class="form-group">
<input type="hidden" name="id" id="id" value="<?php echo $row->idCharges;?>" />
                        <label class="col-sm-3 control-label"> Charge code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="code" type="text" class="form-control"  id="code" required="required" value="<?php echo $row->ChargeCode;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label"> Description</label>
                        <div class="col-sm-9"><span class="controls">
                        <textarea name="description" class="form-control" rows="2" ><?php echo $row->Description;?></textarea>
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">isCost</label>
                        <div class="col-sm-9"><span class="controls">
                      <select name="iscost" class="form-control">
                   
                      <option value="<?php echo $row->isCost;?>"><?php echo $status1;?></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label"> isSales</label>
                        <div class="col-sm-9"><span class="controls">
                        <select name="issales" class="form-control">
                    <option value="<?php echo $row->isSales;?>"><?php echo $status2;?></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label"> Service</label>
                        <div class="col-sm-9"><span class="controls">
                        <select name="service" class="form-control" required="required">
                          <option value="<?php echo $row->svCode;?>"><?php echo $row->Name;?></option>
                      <?php
                      foreach ($service as $rw) {
                      ?>
                        <option value="<?php echo $rw->svCode;?>"><?php echo $rw->Name;?></option>
                       <?php } ?>

                         </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">ACc debit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="debit" type="text" class="form-control"  id="debit" required="required" value="<?php echo $row->AccDebet;?>" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Acc Kredit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="credit" type="text" class="form-control"  id="credoit" required="required" value="<?php echo $row->AccCredit;?>" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
                        <div class="form-group">
                        <label class="col-sm-3 control-label"> Unit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="unit" type="text" class="form-control"  id="credoit" required="required" value="<?php echo $row->Unit;?>" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="price" type="text" class="form-control"  id="credoit" required="required" value="<?php echo $row->Unit_Price;?>"/>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
                      
  <div class="form-group">
                        <label class="col-sm-3 control-label">Active Status</label>
                        <div class="col-sm-9"><span class="controls">
                        <select name="status" class="form-control">
                  <option value="<?php echo $row->isActive;?>"><?php echo $status3;?></option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
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
<?php } ?>


<!-- ADD DATA -->
<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add charges</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('charges/save_charges')?>">
                    <div class="modal-body">
<div class="form-group">
                        <label class="col-sm-3 control-label"> Charcode</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="code" type="text" class="form-control"  id="code" required="required" value="<?php $this->input->post('code');?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label"> Description</label>
                        <div class="col-sm-9"><span class="controls">
                        <textarea name="description" class="form-control" rows="2"></textarea>
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">isCost</label>
                        <div class="col-sm-9"><span class="controls">
                      <select name="iscost" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label"> isSales</label>
                        <div class="col-sm-9"><span class="controls">
                        <select name="issales" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>

 <div class="form-group">
                        <label class="col-sm-3 control-label"> Service</label>
                        <div class="col-sm-9"><span class="controls">
      <select id="service" name="service" placeholder="Choose Service" class="form-control">
  <?php
        foreach ($service as $rw) {
    ?>
      <option value="<?php echo $rw->svCode;?>"><?php echo $rw->Name;?></option>
      <?php } ?>
    </select>
</span></div>
                        
</div>
<div class="col-sm-12">&nbsp;</div>


 <div class="form-group">
                        <label class="col-sm-3 control-label">ACc debit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="debit" type="text" class="form-control"  id="debit" required="required" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Acc Kredit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="credit" type="text" class="form-control"  id="credoit" required="required" />
            </span></div>
                        <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Unit</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="unit" type="text" class="form-control"  id="credoit" required="required" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Price</label>
                        <div class="col-sm-9"><span class="controls">
                <input name="price" type="text" class="form-control"  id="credoit" required="required" />
            </span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Active Status</label>
                        <div class="col-sm-9"><span class="controls">
                        <select name="status" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                         </select>
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
                url : "<?php echo base_url('charges/search_commodity_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });

		
$(".opn").click(function(){
	var nilai=$(this).attr("html");
alert('haii' + nilai);
        });
	   
	 $("#filter").change(function(){
            var filter = $("#filter").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('charges/filter_staff'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                
                }
            });

        });
</script>
 