
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
                                        <div class="table-responsive" id="table_address_detail">
 <table class="table table-striped table-bordered tableaddressdetail" id="tableaddressdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="5"> <div align="left"><a class="btn btn-blue btn-addnew tbladdtype" href="#addmodaltype" data-toggle="modal" title="Add" id="tbladd"><i class="icon-plus icons"></i>Add Address</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">Address Type</th>
                                                  <th>Name</th>
                                                  <th>Address</th>
                                                  <th>Description</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                        <?php 
$no=1;
			foreach($type as $data){
				
			?>
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
                        <label class="col-sm-3 control-label">Type contact</label>
                        <div class="col-sm-9">
                          <select name="address" id="address" class="form-control" required="required">
                            <option value="">Choose type</option>
                            <?php foreach ($type as $sv) {
          ?>
                            <option value="<?php echo $sv->AddressTypeCode.'-'.$sv->AddressTypeName;?>"><?php echo $sv->AddressTypeName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">  Name </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="addresstitle" type="text" class="form-control" id="addresstitle" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-9">
                          <textarea name="addressname" cols="30" rows="2" class="form-control" id="addressname" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Description</label>
                        <div class="col-sm-9">
                          <textarea name="addressdesc" cols="30" rows="2" class="form-control" id="addressdesc" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary" type="button" id="btnaddaddress"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    
    
<script type="text/javascript">			
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}


$("#btnaddaddress").click(function(){
	//var t_volume=$('#idtotal').val();
	var address=$('#address').val();   
	var addressname=$('#addressname').val();
	var addresstitle=$('#addresstitle').val();
	var addressdesc=$('#addressdesc').val();		
if (address == '' || addressname == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="address3[]" id="address3[]" size="5" value="'+ address +'">'+ '<label id="l_pcs">'+ address +'</label>' +'</td>'
   
    + '<td align="left">' + '<input type="hidden" name="addresstitle3[]" id="addresstitle3[]" size="5" value="'+ addresstitle +'">'+ '<label id="l_pcs">'+ addresstitle +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="addressname3[]" id="l[]" size="5" value="'+ addressname +'">'+ '<label id="l_pcs">'+ addressname +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="addressdesc3[]" id="l[]" size="5" value="'+ addressdesc +'">'+ '<label id="l_pcs">'+ addressdesc +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + address +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tableaddressdetail tbody').append(text);
		$("#addmodaltype").modal('hide');
		//RESET INPUT
		$('#addressname').val("");
		$('#addresstitle').val("");
		$('#addressdesc').val("");

	}
 });

</script>
 