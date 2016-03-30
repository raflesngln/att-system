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
                                                  <th colspan="9"> <div align="left"><button class="btn btn-primary btn-mini" onclick="add_contact()"><i class="glyphicon glyphicon-plus"></i>Contact</button></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">contact Type</th>
                                                  <th>Name</th>
                                                  <th>Phone</th>
                                                  <th>Ext</th>
                                                  <th>Fax</th>
                                                  <th>HP</th>
                                                  <th>Email</th>
                                                  <th>Notes</th>
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

           
 
 
 <div id="modal_contact" class="modal_contact modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#333">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Address</h3>
            </div>
            <div class="smart-form scroll">
<div id="modal_address" class="addmodalcontact modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
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
 <input type="text" name="hidden_contact_type" id="hidden_contact_type" />
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
                          <input name="up2" type="text" class="form-control" id="up2" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
 
                      <div class="form-group">
                        <label class="col-sm-4 control-label"> Phone</label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="phone2" type="text" class="form-control" id="phone2" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Ext </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="ext" type="text" class="form-control" id="ext" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
</span>
<span class="span6">

<div class="form-group">
                        <label class="col-sm-4 control-label">  Fax </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="fax" type="text" class="form-control" id="fax" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Handphone </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="hp" type="text" class="form-control" id="hp" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label">  Email </label>
                        <div class="col-sm-8"><span class="controls">
                          <input name="email2" type="text" class="form-control" id="email2" required="required" maxlength="30" />
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-4 control-label"> Notes</label>
                        <div class="col-sm-8">
                          <textarea name="notes2" cols="30" rows="2" class="form-control" id="notes2" required="required"></textarea>
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
      </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
    </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    
<script type="text/javascript">
$(document).focusin(function(e) {
    $("#dropdown_list_contact").hide('slow');
});
var save_method2;

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
	var up2=$('#up2').val();		
	var phone2=$('#phone2').val(); 
	var ext=$('#ext').val(); 
	var hp=$('#hp').val(); 
	var email2=$('#email2').val(); 
	var notes2=$('#notes2').val(); 
			
if (contacttype == '' || hidden_contact_type == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="contacttype2[]" id="contacttype2[]" size="5" value="'+ contacttype +'">'+ '<label id="l_pcs">'+ contacttype +'</label>' +'</td>'
   
    + '<td align="left">' + '<input type="hidden" name="contactname2[]" id="contactname2[]" size="5" value="'+ contactname +'">'+ '<label id="l_pcs">'+ contactname +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="up3[]" id="up3[]" size="5" value="'+ up2 +'">'+ '<label id="l_pcs">'+ up2 +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="phone3[]" id="phone3[]" size="5" value="'+ phone2 +'">'+ '<label id="l_pcs">'+ phone2 +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="ext2[]" id="ext2[]" size="5" value="'+ ext +'">'+ '<label id="l_pcs">'+ ext +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="hp2[]" id="hp2[]" size="5" value="'+ hp +'">'+ '<label id="l_pcs">'+ hp +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="email3[]" id="email3[]" size="5" value="'+ email2 +'">'+ '<label id="l_pcs">'+ email2 +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="notes3[]" id="notes3[]" size="5" value="'+ notes2 +'">'+ '<label id="l_pcs">'+ notes2 +'</label>' +'</td>'

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
      $('.modal-title2').text('Add contact Type');
}
function add_contact()
    {
      
      $('#form_add_contact')[0].reset(); // reset form on modals
      $("#modal_contact").modal('show');
      $('.modal-title2').text('Add contact');
	  
}

function add_contact_type()
    {
      save_method2 = 'add';
      $('#form_contact_type')[0].reset(); // reset form on modals
      $("#modal_contact_type").modal('show');
      $('.modal-title').text('Add contact Type');
	  
}
function save2()
    {
      var url2;
      if(save_method2 == 'add') 
      {
          url2 = "<?php echo site_url('ms_contact_type/ajax_add')?>";
      }
      else
      {
        url2 = "<?php echo site_url('ms_contact_type/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url2,
            type: "POST",
            data: $('#form_contact_type').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_contact_type').modal('hide');
               reload_table2();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
	
</script>
 