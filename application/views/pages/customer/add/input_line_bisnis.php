  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<style type="text/css">
#dropdown_list_line_bisnis{
border:1px #999 solid; position:fixed; width:23%; margin-top:-8px; background-color:#CCC; z-index:1096; display:none;
	list-style:none;
	line-height:20px;
}

#dropdown_list_line_bisnis li{
	padding-left:9px;
}
#dropdown_list_line_bisnis li:hover{
	background-color:#09F;
}
</style>
            <div class="row-fluid">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_line_bisnis_detail">
 <table class="table table-striped table-bordered tableline_bisnisdetail" id="tableline_bisnisdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="9"> <div align="left"><a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_line_bisnis()"><i class="icon-plus icons"></i> line_bisnis</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">line_bisnis Type</th>
                                                  <th>Name</th>
                                                  <th>line_bisnis</th>
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
<div id="modal_line_bisnis" class="addmodalline_bisnis modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header" style="background-color:#333">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add line_bisnis</h3>
            </div>
            <div class="smart-form scroll">
<form name="addtype" id="form_add_line_bisnis">
                    <div class="modal-body">
<span class="span6">
<div class="form-group form-inline">
                        <label class="col-sm-4 control-label">line_bisnis Type </label>
                        <div class="col-sm-8">
 <span class="input-icon input-icon-right">
 <input name="line_bisnistype" type="text" class="form-control" id="line_bisnistype"/>
<div id="dropdown_list_line_bisnis">
<li>satu</li>
<li>dua</li>
</div>
<i class="icon-caret-down bigger-220" id="iconcaret" onclick="return dropdown_line_bisnis()"></i>
</span>              
                          <button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_line_bisnis_type()"><i class="fa fa-plus"></i></button>
 <input type="hidden" name="hidden_line_bisnis_type" id="hidden_line_bisnis_type" />
              </div>
</div>
<div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-4 control-label">   line_bisnis Name </label>
<div class="col-sm-8">
<input type="text" id="line_bisnisname" class="form-control" name="line_bisnisname"/>
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
                        <label class="col-sm-4 control-label">Complete line_bisnis</label>
                        <div class="col-sm-8">
                          <textarea name="completeline_bisnis" cols="30" rows="2" class="form-control" id="completeline_bisnis" required="required"></textarea>
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
                          <textarea name="line_bisnisDetailNotes" cols="30" rows="2" class="form-control" id="line_bisnisDetailNotes" required="required"></textarea>
              </div>
                        <div class="clearfix"></div>
                      </div>
                      
</span>
<div class="clearfix"></div>
<div class="modal-footer">
<button class="btn btn-primary" type="button" id="btn_add_line_bisnis"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
</div>
<div class="clearfx">&nbsp;</div>
                    </div>
            </form>
                
            </div>
        </div>
    </div>
    </div>
    



<div class="modal fade" id="modal_line_bisnis_type" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">line_bisnis Type Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_line_bisnis_type" class="form-horizontal">
          <input name="line_bisnisTypeCode" type="hidden" id="line_bisnisTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="line_bisnisTypeName" type="text" class="form-control nama" id="line_bisnisTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">line_bisnis</label>
              <div class="col-md-9">
                <textarea name="line_bisnisTypeDesc" placeholder="decription"class="form-control" id="line_bisnisTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave_line_bisnis_type" onclick="save_line_bisnis_type()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    
<script type="text/javascript">
$(document).focusin(function(e) {
    $("#dropdown_list_line_bisnis").hide('slow');
});
var save_method;

function dropdown_line_bisnisss(){
	//$("#dropdown_list_line_bisnis").toggle('slow');
}
$("#iconcaret").click(function(e) {
    $("#dropdown_list_line_bisnis").toggle('slow');
});
$("#iconcaret").focusout(function(e) {
    $("#dropdown_list_line_bisnis").hide('slow');
});
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btn_add_line_bisnis").click(function(){
	var line_bisnistype=$('#line_bisnistype').val();   
	var hidden_line_bisnis_type=$('#hidden_line_bisnis_type').val();
	var line_bisnisname=$('#line_bisnisname').val();
	var up=$('#up').val();		
	var completeline_bisnis=$('#completeline_bisnis').val(); 
	var city=$('#city').val(); 
	var state=$('#state').val(); 
	var country=$('#country').val(); 
	var line_bisnisDetailNotes=$('#line_bisnisDetailNotes').val(); 
			
if (line_bisnistype == '' || hidden_line_bisnis_type == '' || line_bisnisname == ''){
	alert('Nama dan type line_bisnis tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="line_bisnistype2[]" id="line_bisnistype2[]" size="5" value="'+ line_bisnistype +'">'+ '<label id="l_pcs">'+ line_bisnistype +'</label>' +'</td>'
   
    + '<td align="left">' + '<input type="hidden" name="line_bisnisname2[]" id="line_bisnisname2[]" size="5" value="'+ line_bisnisname +'">'+ '<label id="l_pcs">'+ line_bisnisname +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="up2[]" id="up2[]" size="5" value="'+ up +'">'+ '<label id="l_pcs">'+ up +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="completeline_bisnis2[]" id="completeline_bisnis2[]" size="5" value="'+ completeline_bisnis +'">'+ '<label id="l_pcs">'+ completeline_bisnis +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="city[]" id="city2[]" size="5" value="'+ city +'">'+ '<label id="l_pcs">'+ city +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="state2[]" id="state2[]" size="5" value="'+ state +'">'+ '<label id="l_pcs">'+ state +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="country2[]" id="country2[]" size="5" value="'+ country +'">'+ '<label id="l_pcs">'+ country +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="line_bisnisDetailNotes2[]" id="line_bisnisDetailNotes2[]" size="5" value="'+ line_bisnisDetailNotes +'">'+ '<label id="l_pcs">'+ line_bisnisDetailNotes +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + hidden_line_bisnis_type +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#table_line_bisnis_detail tbody').append(text);
		$("#modal_line_bisnis").modal('hide');
		//RESET INPUT
		$('#form_add_line_bisnis')[0].reset();


	}
 });

function clear_line_bisnis_type()
    {
      save_method = 'add';
      $('#form_line_bisnis_type')[0].reset(); // reset form on modals
      $("#modal_line_bisnis_type").modal('show');
      $('.modal-title').text('Add addres Type');
}
function add_line_bisnis()
    {
      
      $('#form_add_line_bisnis')[0].reset(); // reset form on modals
      $("#modal_line_bisnis").modal('show');
      $('.modal-title').text('Add line_bisnis');
	  
}
function add_line_bisnis_type()
    {
      save_method = 'add';
      $('#form_line_bisnis_type')[0].reset(); // reset form on modals
      $("#modal_line_bisnis_type").modal('show');
      $('.modal-title').text('Add line_bisnis Type');
	  
}
function save_line_bisnis_type()
    {
      var url;
      if(save_method == 'add') 
      {
          url = "<?php echo site_url('ms_line_bisnis_type/ajax_add')?>";
      }
      else
      {
        url = "<?php echo site_url('ms_line_bisnis_type/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url,
            type: "POST",
            data: $('#form_line_bisnis_type').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_line_bisnis_type').modal('hide');
			   $('#line_bisnistype').html('<option value="">Rafles</option>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
	
</script>
 