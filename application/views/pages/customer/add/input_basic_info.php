

            <div class="row-fluid">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_address_detail">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablecontactdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="5"> <div align="left"><a class="btn btn-blue btn-addnew tbladdtype" href="#addmodalcontact" data-toggle="modal" title="Add" id="tbladd"><i class="icon-plus icons"></i>Add Contact</a></div></th>
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
  
              </div>
          </div>
      </div>

           
 
 


<!--ADD DATA-->
<div id="addmodalcontact" class="addmodalcontact modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Contact</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype">
                    <div class="modal-body">
<div class="form-group">
                        <label class="col-sm-3 control-label">Type contact</label>
                        <div class="col-sm-9">
                          <select name="contacttype" id="contacttype" class="form-control" required="required">
                            <option value="">Choose type</option>
                            <?php foreach ($contact as $con) {
          ?>
                            <option value="<?php echo $con->ContactTypeCode.'-'.$con->ContactTypeName;?>"><?php echo $con->ContactTypeName;?></option>
                            <?php } ?>
                          </select>
              </div>
                        
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">  Contact Name </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="contactname" type="text" class="form-control" id="contactname" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Contact Number</label>
                        <div class="col-sm-9">
                          <textarea name="contactnumber" cols="30" rows="2" class="form-control" id="contactnumber" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Contact Description</label>
                        <div class="col-sm-9">
                          <textarea name="contactdesc" cols="30" rows="2" class="form-control" id="contactdesc" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
<button class="btn btn-primary" type="button" id="btnaddcontact"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    



<div id="modaldone" class="modaldone modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="smart-form scroll">
<form name="addtype">
                    <div class="modal-body">
                      <div class="form-group">
<h3>Save Customer ?  </h3>
                        <div class="clearfix"></div>
                      </div>
<div class="modal-footer">

<button class="btn btn-primary" type="button" id="btnaddcontact"><i class="icon-save bigger-160 icons">&nbsp;</i> Done</button>
</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    
    
<script type="text/javascript">
$("#done").click(function(){
	$("#modaldone").modal('show');

  });
  
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btnaddcontact").click(function(){
	//var t_volume=$('#idtotal').val();
	var contacttype=$('#contacttype').val();   
	var contactname=$('#contactname').val();
	var contactnumber=$('#contactnumber').val();
	var contactdesc=$('#contactdesc').val();		
if (contactname == '' || contactnumber == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="contacttype3[]" id="contacttype3[]" size="5" value="'+ contacttype +'">'+ '<label id="l_pcs">'+ contacttype +'</label>' +'</td>'
   
    + '<td align="left">' + '<input type="hidden" name="contactname3[]" id="contactname3[]" size="5" value="'+ contactname +'">'+ '<label id="l_pcs">'+ contactname +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="contactnumber3[]" id="contactnumber3[]" size="5" value="'+ contactnumber +'">'+ '<label id="l_pcs">'+ contactnumber +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="contactdesc3[]" id="contactdesc3[]" size="5" value="'+ contactdesc +'">'+ '<label id="l_pcs">'+ contactdesc +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + contact +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tablecontactdetail tbody').append(text);
		$("#addmodalcontact").modal('hide');
		//RESET INPUT
		$('#contactname').val("");
		$('#contactnumber').val("");
		$('#contactdesc').val("");

	}
 });

</script>
 