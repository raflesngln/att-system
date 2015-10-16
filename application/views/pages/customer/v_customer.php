 <style>
 .btn-search{ height:32px; margin-left:-10px;}
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
           <h1><i class="fa fa-opencart fa-2x"></i> &nbsp; Customer  List</h1> 
           <p>&nbsp;</p>
            </div>
     
      <div class="top-hdr col-sm-6">              
      <div class="col-sm-5"> </div>   

      <form action="<?php echo base_url();?>search/search_customer" method="post"> 
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
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th colspan="9"> <div align="left"><a class="btn btn-blue btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add Customer</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>customer Name</th>
                                                  <th>Address</th>
                                                  <th>Phone</th>
                                                  <th>Email</th>
                                                  <th>Credit Limit</th>
                                                  <th>Deposit</th>
                                                  <th>NPWP</th>
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
                                                    <td><?php echo $data->custName?></td>
                                                    <td><?php echo $data->Address?></td>
                                                    <td><?php echo $data->Phone?></td>
                                                    <td><?php echo $data->Email?></td>
                                                    <td><?php echo $data->CreditLimit?></td>
                                                    <td><?php echo $data->Deposit?></td>
                                                    <td><?php echo $data->NPWP?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledit<?php echo $data->custCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
                                                      <a href="<?php echo base_url();?>master/delete_customer/<?php echo $data->custCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                        <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                      </a>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              <tr class="gradeX pagin">
                                                  <th colspan="12" scope="row">
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
  

<!-- edit data -->
<?php

    foreach($list as $row){
		$isagen=$row->isAgent;
		$isaktif=$row->isAktive;
		$isCnee=$row->isCnee;
		$isShipper=$row->isShipper;

		if($isagen==1){ $status1='YES';}else{$status1='NO';}
		if($isShipper==1){ $status2='YES';}else{$status2='NO';}
		if($isCnee==1){ $status3='YES';}else{$status3='NO';}
		if($isaktif==1){ $status4='YES';}else{$status4='NO';}
        ?>
<div id="modaledit<?php echo $row->custCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_customer')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Initial </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="initial" type="text" class="form-control" id="initial" value="<?php echo $row->custInitial;?>" required="required"/>
                        </span>
                          <input type="hidden" name="id" id="id" value="<?php echo $row->custCode;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control" placeholder="name" id="name" value="<?php echo $row->custName;?>" required="required"/>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="address" cols="30" rows="2" class="form-control" id="address" required="required"><?php echo $row->Address;?></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-9"><span class="controls">
      <select name="city" id="city" required="required" class="form-control">
      <option value="<?php echo $row->cyCode;?>"><?php echo $row->cyCode;?></option>
          <?php
	foreach($city as $ct){
	    ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
</select>
      </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="phone" type="text" class="form-control" required="required" id="phone" value="<?php echo $row->Phone;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="fax" type="text" class="form-control" required="required" id="fax" value="<?php echo $row->Fax;?>"/>
              </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Postal Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="postcode" type="text" class="form-control" placeholder="" id="postcode" value="<?php echo $row->PostalCode;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
 
 <div class="form-group">
<label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="email" type="email" class="form-control" placeholder="Email" id="email" value="<?php echo $row->Email;?> "/>
              </span></div>
                        <div class="clearfix"></div>
                  </div>
 <div class="form-group">
    <label class="col-sm-3 control-label">Credit Limit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="credit" type="text" class="form-control" placeholder="" id="credit" value="<?php echo $row->CreditLimit;?>"/>
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Terms Payment</label>
                        <div class="col-sm-5"><span class="controls">
                          <input name="payment" type="text" class="form-control" id="payment" value="<?php echo $row->TermsPayment;?>"/>
              </span></div>
                 <h5 class="col-sm-4 control-label">day's</h5>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Deposit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="deposit" type="text" class="form-control" id="deposit" value="<?php echo $row->Deposit;?>" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Sales</label>
                        <div class="col-sm-9"><span class="controls">
                          <select name="empcode" id="empcode" required="required" class="form-control">
                            <option value="<?php echo $row->empCode;?>"><?php echo $row->empName;?></option>
                            <?php
	foreach($sales as $ct){
	    ?>
                            <option value="<?php echo $ct->empCode;?>"><?php echo $ct->empName;?></option>
                            <?php } ?>
                          </select>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
    <label class="col-sm-3 control-label">NPWP</label>
                        <div class="col-sm-9">
                          <textarea name="npwp" cols="30" rows="2" class="form-control" id="npwp" required="required"><?php echo $row->NPWP;?></textarea>
</div>
                        <div class="clearfix"></div>
                      </div> 
<div class="form-group">
                        <label class="col-sm-3 control-label">NPWP Address</label>
                        <div class="col-sm-9">
                          <textarea name="npwpaddress" cols="30" rows="2" class="form-control" id="npwpaddress" required="required"><?php echo $row->NPWPAddress;?></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div> 
 <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required="required"><?php echo $row->Remarks;?></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div> 
 <HR />
<div class="form-group">
                       <em>
                        <label class="col-sm-4 control-label">&nbsp;</label> 
                        <label class="col-sm-6 control-label">PIC & HPPIC</label>
              </em>
                        <div class="col-sm-2"></div>
                        
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 01</span>
                            <input name="pic01" type="text" class="form-control" placeholder="" id="pic01" value="<?php echo $row->PIC01;?>" />
                            
</label>
    </span></div>
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 02</span>
                            <input name="pic02" type="text" class="form-control" placeholder="" id="pic02" value="<?php echo $row->PIC02;?>" />
                            
</label>
    </span></div>
   <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 01</span>
                            <input name="hppic01" type="text" class="form-control" placeholder="" id="hppic01" value="<?php echo $row->HPPIC01;?>" />
                            
</label>
    </span></div>
 <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 02</span>
                            <input name="hppic02" type="text" class="form-control" placeholder="" id="hppic02" value="<?php echo $row->HPPIC02;?>" />
                            
</label>
    </span></div>

</div>
    
<div class="clearfix"></div>
                      </div>
<HR />
<div class="form-group">
                       <em>
                        <label class="col-sm-4 control-label">&nbsp;</label> 
                        <label class="col-sm-6 control-label">Status Active</label>
              </em>
                        <div class="col-sm-2"></div>
                        
 <div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;Agent</span>
      <select name="agen" id="agen" class="form-control">
      <option value="<?php echo $isagen;?>">&nbsp;<?php echo $status1;?>&nbsp;</option>
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>  
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;Shipper</span>
      <select name="shipper" id="agen" class="form-control">
      <option value="<?php echo $isShipper;?>">&nbsp;<?php echo $status2;?>&nbsp;</option>

        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;CNee</span>
      <select name="cnee" id="cnee" class="form-control">
      <option value="<?php echo $isCnee;?>">&nbsp;<?php echo $status3;?>&nbsp;</option>

        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
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
<?php } ?>

<!--ADD DATA-->
<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add New Customer</h3>
            </div>
            <div class="smart-form scroll">
                <form method="post" action="<?php echo site_url('master/save_customer')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Initial </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="initial" type="text" class="form-control" id="initial" required="required"/>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="name" type="text" class="form-control" id="name" required="required"/>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="address" cols="30" rows="2" class="form-control" id="address" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                      <label class="col-sm-3 control-label">City</label>
    <div class="col-sm-9"><span class="controls">
      <select name="city" id="city" required="required" class="form-control">
          <option value="">Chosse City</option>
          <?php
	foreach($city as $ct){
	    ?>
          <option value="<?php echo $ct->cyCode;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
</select>
      </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
              <label class="col-sm-3 control-label">Phone</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="phone" type="text" class="form-control" placeholder="" id="phone" required="required"/>
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Fax</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="fax" type="text" class="form-control" required="required" id="fax" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Postal Code</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="postcode" type="text" class="form-control" id="postcode" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
   <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="email" type="email" class="form-control" placeholder="Email" id="email" />
              </span></div>
                        <div class="clearfix"></div>
                    </div>
 <div class="form-group">
    <label class="col-sm-3 control-label">Credit Limit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="credit" type="text" class="form-control" id="credit" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Terms Payment</label>
                        <div class="col-sm-4"><span class="controls">
                          <input name="payment" type="text" class="form-control" id="payment" value="0" />
              </span></div>
              <h4 class="col-sm-4">day's</h4>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Deposit</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="deposit" type="text" class="form-control" id="deposit" value="0" />
              </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Sales</label>
                        <div class="col-sm-9"><span class="controls">
                          <select name="empcode" id="empcode" required="required" class="form-control">
                            <option value="">Choose Sales</option>
                            <?php
	foreach($sales as $ct){
	    ?>
                            <option value="<?php echo $ct->empCode;?>"><?php echo $ct->empName;?></option>
                            <?php } ?>
                          </select>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
    <label class="col-sm-3 control-label">NPWP</label>
                        <div class="col-sm-9">
                          <textarea name="npwp" cols="30" rows="2" class="form-control" id="npwp" required="required"></textarea>
</div>
                        <div class="clearfix"></div>
                      </div> 
<div class="form-group">
                        <label class="col-sm-3 control-label">NPWP Address</label>
                        <div class="col-sm-9">
                          <textarea name="npwpaddress" cols="30" rows="2" class="form-control" id="npwpaddress" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div> 
 <div class="form-group">
                        <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
 <hr /> 
<div class="form-group">
                       <em>
                        <label class="col-sm-4 control-label">&nbsp;</label> 
                        <label class="col-sm-6 control-label">PIC & HPPIC</label>
              </em>
                        <div class="col-sm-2"></div>
                        
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 01</span>
                            <input name="pic01" type="text" class="form-control" placeholder="" id="pic01"  />
                            
</label>
    </span></div>
<div class="col-sm-3"><span class="controls">
                          <label><span> PIC 02</span>
                            <input name="pic02" type="text" class="form-control" placeholder="" id="pic02" />
                            
</label>
    </span></div>
   <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 01</span>
                            <input name="hppic01" type="text" class="form-control" placeholder="" id="hppic01"  />
                            
</label>
    </span></div>
 <div class="col-sm-3"><span class="controls">
                          <label><span>  Mobile 02</span>
                          <input name="hppic02" type="text" class="form-control" placeholder="" id="hppic02"  />
                            
</label>
    </span></div>

</div>
<hr /> 

<div class="form-group">
     <em><label class="col-sm-4 control-label">&nbsp;</label> 
    <label class="col-sm-6 control-label">&nbsp;</label></em>

<div class="col-sm-2"></div>

 <div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;Agent</span>
      <select name="agen" id="agen" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;SHipper</span>
      <select name="shipper" id="agen" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>

<div class="col-sm-4"><span class="controls">
   <label><span> &nbsp;CNEE</span>
      <select name="cnee" id="cnee" class="form-control">
        <option value="1">&nbsp;Yes&nbsp;</option>
        <option value="0">&nbsp;No&nbsp;</option>
      </select>                      
      </label>
    </span>
</div>
    
<div class="clearfix"></div>
                      </div>
<div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
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
                url : "<?php echo base_url('search/search_customer_ajax'); ?>",
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
                url : "<?php echo base_url('search/filter_customer'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                }
            });

        });
</script>
 