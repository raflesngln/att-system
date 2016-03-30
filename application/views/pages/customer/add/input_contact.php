  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<style type="text/css">
#dropdown_list_contact{
border:1px #999 solid; position:fixed; width:23%; margin-top:-8px; background-color:#CCC; z-index:1096; display:none;
	list-style:none;
	line-height:20px;
}

#dropdown_list_contact li{
	padding-left:9px;
}
#dropdown_list_contact li:hover{
	background-color:#09F;
}
</style>
            <div class="row-fluid">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_contact_detail">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablecontactdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="9"> <div align="left"><a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_contact()"><i class="icon-plus icons"></i> contact</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">contact Type</th>
                                                  <th>Name</th>
                                                  <th>contact</th>
                                                  <th>fsfsdfd</th>
                                                  <th>afafsf</th>
                                                  <th>afaf</th>
                                                  <th>dfsdfsd</th>
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
                                                  <th colspan="12" scope="row">
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
<div id="modal_contact" class="addmodalcontact modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#333">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add contact</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype" id="form_add_contact">
                    <div class="modal-body">
<span class="span6">
<div class="form-group form-inline">
                        <label class="col-sm-4 control-label">Contact Type </label>
                        <div class="col-sm-8">
 <span class="input-icon input-icon-right">
 <input name="contacttype" type="text" class="form-control" id="contacttype"/>
<div id="dropdown_list_contact">
<li>satu</li>
<li>dua</li>
</div>
<i class="icon-caret-down bigger-220" id="iconcaret" onclick="return dropdown_contact()"></i>
</span>              
                          <button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_contact_type()"><i class="fa fa-plus"></i></button>
 <input type="hidden" name="hidden_contact_type" id="hidden_contact_type" />
              </div>
</div>
<div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">   Contact Name </label>
<div class="col-sm-8">
<input type="text" id="contactname" class="form-control" name="contactname"/>
</div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label"> UP </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="up" type="text" class="form-control" id="up" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-sm-4 control-label">Complete contact</label>
                        <div class="col-sm-8">
                          <textarea name="completecontact" cols="30" rows="2" class="form-control" id="completecontact" required="required"></textarea>
                        </div>
                        <div class="clearfix"></div>
                      </div>
</span>
<span class="span6">
<div class="form-group">
                        <label class="col-sm-4 control-label">  City </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="city" type="text" class="form-control" id="city" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  State </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="state" type="text" class="form-control" id="state" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Country </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="country" type="text" class="form-control" id="country" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label"> Notes</label>
                        <div class="col-sm-8">
                          <textarea name="contactDetailNotes" cols="30" rows="2" class="form-control" id="contactDetailNotes" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
                      
</span>
<div class="clearfix"></div>
<div class="modal-footer">
<button class="btn btn-primary" type="button" id="btn_add_contact"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    



<div class="modal fade" id="modal_contact_type" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">contact Type Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_contact_type" class="form-horizontal">
          <input name="contactTypeCode" type="hidden" id="contactTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="contactTypeName" type="text" class="form-control nama" id="contactTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">contact</label>
              <div class="col-md-9">
                <textarea name="contactTypeDesc" placeholder="decription"class="form-control" id="contactTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave_contact_type" onclick="save_contact_type()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    
<script type="text/javascript">
$(document).focusin(function(e) {
    $("#dropdown_list_contact").hide('slow');
});
var save_method;

function dropdown_contactss(){
	//$("#dropdown_list_contact").toggle('slow');
}
$("#iconcaret").click(function(e) {
    $("#dropdown_list_contact").toggle('slow');
});
$("#iconcaret").focusout(function(e) {
    $("#dropdown_list_contact").hide('slow');
});
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btn_add_contact").click(function(){
	var contacttype=$('#contacttype').val();   
	var hidden_contact_type=$('#hidden_contact_type').val();
	var contactname=$('#contactname').val();
	var up=$('#up').val();		
	var completecontact=$('#completecontact').val(); 
	var city=$('#city').val(); 
	var state=$('#state').val(); 
	var country=$('#country').val(); 
	var contactDetailNotes=$('#contactDetailNotes').val(); 
			
if (contacttype == '' || hidden_contact_type == '' || contactname == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="contacttype2[]" id="contacttype2[]" size="5" value="'+ contacttype +'">'+ '<label id="l_pcs">'+ contacttype +'</label>' +'</td>'
   
    + '<td align="left">' + '<input type="hidden" name="contactname2[]" id="contactname2[]" size="5" value="'+ contactname +'">'+ '<label id="l_pcs">'+ contactname +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="up2[]" id="up2[]" size="5" value="'+ up +'">'+ '<label id="l_pcs">'+ up +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="completecontact2[]" id="completecontact2[]" size="5" value="'+ completecontact +'">'+ '<label id="l_pcs">'+ completecontact +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="city[]" id="city2[]" size="5" value="'+ city +'">'+ '<label id="l_pcs">'+ city +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="state2[]" id="state2[]" size="5" value="'+ state +'">'+ '<label id="l_pcs">'+ state +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="country2[]" id="country2[]" size="5" value="'+ country +'">'+ '<label id="l_pcs">'+ country +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="contactDetailNotes2[]" id="contactDetailNotes2[]" size="5" value="'+ contactDetailNotes +'">'+ '<label id="l_pcs">'+ contactDetailNotes +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + hidden_contact_type +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#table_contact_detail tbody').append(text);
		$("#modal_contact").modal('hide');
		//RESET INPUT
		$('#form_add_contact')[0].reset();


	}
 });

function clear_contact_type()
    {
      save_method = 'add';
      $('#form_contact_type')[0].reset(); // reset form on modals
      $("#modal_contact_type").modal('show');
      $('.modal-title').text('Add addres Type');
}
function add_contact()
    {
      
      $('#form_add_contact')[0].reset(); // reset form on modals
      $("#modal_contact").modal('show');
      $('.modal-title').text('Add contact');
	  
}
function add_contact_type()
    {
      save_method = 'add';
      $('#form_contact_type')[0].reset(); // reset form on modals
      $("#modal_contact_type").modal('show');
      $('.modal-title').text('Add contact Type');
	  
}
function save_contact_type()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('ms_contact_type/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('ms_contact_type/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_contact_type').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_contact_type').modal('hide');
			   $('#contacttype').html('<option value="">Rafles</option>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
	
</script>
 