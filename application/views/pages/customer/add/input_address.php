  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

            <div class="row-fluid">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_address_detail">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablecontactdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="5"> <div align="left"><a class="btn btn-blue btn-addnew tbladdtype" title="Add" id="tbladd" onclick="return add_address()"><i class="icon-plus icons"></i>Add Address</a></div></th>
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
<div id="modal_address" class="addmodalcontact modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#333">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Address</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype" id="form_add_address">
                    <div class="modal-body">
<span class="span6">
<div class="form-group form-inline">
                        <label class="col-sm-3 control-label">Type contact</label>
                        <div class="col-sm-9">
 <input name="addresstype" type="text" class="form-control" id="addresstype"/>
 
 <button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_address_type()"><i class="fa fa-plus"></i></button>
 <input type="text" name="hidden_address_type" id="hidden_address_type" />
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
                        <label class="col-sm-3 control-label"> UP </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="up" type="text" class="form-control" id="up" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Complete Address</label>
                        <div class="col-sm-9">
                          <textarea name="completeaddress" cols="30" rows="2" class="form-control" id="completeaddress" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
</span>
<span class="span6">
<div class="form-group">
                        <label class="col-sm-3 control-label">  City </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="city" type="text" class="form-control" id="city" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">  State </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="state" type="text" class="form-control" id="state" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">  Country </label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="country" type="text" class="form-control" id="country" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label"> Notes</label>
                        <div class="col-sm-9">
                          <textarea name="AddressDetailNotes" cols="30" rows="2" class="form-control" id="AddressDetailNotes" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
                      
</span>
<div class="clearfix"></div>
<div class="modal-footer">
<button class="btn btn-primary" type="button" id="btn_add_address"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    



<div class="modal fade" id="modal_address_type" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Address Type Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_address_type" class="form-horizontal">
          <input name="AddressTypeCode" type="hidden" id="AddressTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="AddressTypeName" type="text" class="form-control nama" id="AddressTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="AddressTypeDesc" placeholder="decription"class="form-control" id="AddressTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave_address_type" onclick="save_address_type()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    
<script type="text/javascript">
var save_method;
  
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btn_add_address").click(function(){
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

function clear_address_type()
    {
      save_method = 'add';
      $('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_address_type").modal('show');
      $('.modal-title').text('Add addres Type');
	  
}

function add_address()
    {
      
      $('#form_add_address')[0].reset(); // reset form on modals
      $("#modal_address").modal('show');
      $('.modal-title').text('Add addres');
	  
}
function add_address_type()
    {
      save_method = 'add';
      $('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_address_type").modal('show');
      $('.modal-title').text('Add addres Type');
	  
}
function save_address_type()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('ms_address_type/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('ms_address_type/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_address_type').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_address_type').modal('hide');
			   $('#addresstype').html('<option value="">Rafles</option>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
	
</script>
 