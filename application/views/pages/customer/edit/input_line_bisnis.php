  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
<style type="text/css">
#dropdown_list_address{
border:1px #999 solid; position:fixed; width:23%; margin-top:-8px; background-color:#CCC; z-index:1096; display:none;
	list-style:none;
	line-height:20px;
}

#dropdown_list_address li{
	padding-left:9px;
}
#dropdown_list_address li:hover{
	background-color:#09F;
}
</style>
            <div class="row-fluid">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="divlinebusiness">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablelinebusiness">
                                              <thead>
                                                <tr>
                                                  <th colspan="3"> <div align="left"><a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_linebusiness()"><i class="icon-plus icons"></i> Create</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">Line Name</th>
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
                                                  <th colspan="6" scope="row">
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

           
 
 

<div class="modal fade" id="modal_linebusiness" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Linebusiness  Form</h3>
      </div>
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->
   <div class="modal-body" style="padding:20px 5px;">

<div class="col-sm-6">         

<div class="form-group">
            <span class="col-sm-4">
            <label for="usrname"><span></span> Type</label>
              </span>
              <span class="col-sm-7">
 <span class="input-icon input-icon-right"><span class="controls">
 <select name="linebusinessname" id="linebusinessname" class="form-control">
   <option value="">Chose linebusiness</option>
   <?php
	foreach($linebusiness as $lb){
	    ?>
   <option value="<?php echo $lb->LineBusinessID.'-'.$lb->LineBusinesName;?>"><?php echo $lb->LineBusinesName;?></option>
   <?php } ?>
 </select>
 </span>
 <div id="dropdown_list_address">
<li>satu</li>
<li>dua</li>
</div>
<i class="icon-caret-down bigger-220" id="iconcaret" onclick="return dropdown_address()"></i>
</span> 
              </span>
 <span class="col-sm-">
<button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_linebusiness_type()"><i class="fa fa-plus"></i></button>
</span></div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Description </label></span><span class="col-sm-8">
              <textarea name="linebusinessdesc" cols="30" rows="2" class="form-control" id="linebusinessdesc"></textarea>
          </span></div>            
 </div>
<div class="clearfix"></div>
          
      </div>
          <div class="modal-footer">

<button class="btn btn-primary" type="button" id="btn_add_linebusiness"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

          </div>
    </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!--ADD DATA-->

<div class="modal fade" id="modal_linebusiness_type" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Add Llinebusiness  </h3>
      </div>
      <div class="modal-body form">
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->

<div class="form-group">
          <span class="col-sm-4">
          <label for="psw"><span></span> Name</label></span>
          <span class="col-sm-8">
              <input name="linebusinessname2" type="text" class="form-control nama" id="linebusinessname2" placeholder="Name" value="" /></span>
              <span class="col-md-9">
              <input name="AddressTypeCode" type="hidden" id="AddressTypeCode" value=""/>
              </span></div>
            
<div class="form-group">
          <span class="col-sm-4">
          <label for="psw"><span></span> Address</label></span>
          <span class="col-sm-8">
              <textarea name="linebusinessdesc2" placeholder="decription"class="form-control" id="linebusinessdesc2"></textarea></span></div>   
            
            
  <div class="clearfix"></div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnsave_linebusiness_type" onclick="save_linebusiness_type()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
    
<script type="text/javascript">
$(document).focusin(function(e) {
    $("#dropdown_list_address").hide('slow');
});
var save_method;

function dropdown_addressss(){
	//$("#dropdown_list_address").toggle('slow');
}
$("#iconcaret").click(function(e) {
    $("#dropdown_list_address").toggle('slow');
});
$("#iconcaret").focusout(function(e) {
    $("#dropdown_list_address").hide('slow');
});
function hapus3(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btn_add_linebusiness").click(function(){
	var linebusinessname=$('#linebusinessname').val();   
	var linebusinessdesc=$('#linebusinessdesc').val();

	var pecah=linebusinessname.split('-');
	var lineid=pecah[0];
	var lineName=pecah[1];
			
if (linebusinessname == '' || linebusinessdesc == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="lineid[]" id="lineid[]" size="5" value="'+ lineid +'">'+ '<label id="l_pcs">'+ lineName +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="linedesc[]" id="linedesc[]" size="5" value="'+ linebusinessdesc +'">'+ '<label id="l_pcs">'+ linebusinessdesc +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + linebusinessname +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tablelinebusiness tbody').append(text);
		$("#modal_linebusiness").modal('hide');
		//RESET INPUT
		$('#form_add_linebusiness')[0].reset();


	}
 });

function clear_address_type()
    {
      save_method = 'add';
      $('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_linebusiness_type").modal('show');
     
}
function add_linebusiness()
    {
      
      //$('#form_add_linebusiness')[0].reset(); // reset form on modals
      $("#modal_linebusiness").modal('show');
     
	  
}
function add_linebusiness_type()
    {
      save_method = 'add';
      //$('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_linebusiness_type").modal('show');
      
	  
}
function save_linebusiness_type()
    {
      var url;
	  var AddressTypeName=$("#AddressTypeName").val();
	  var AddressTypeDesc=$("#AddressTypeDesc").val();
	  
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
	data: "AddressTypeName="+AddressTypeName+"&AddressTypeDesc="+AddressTypeDesc,
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_linebusiness_type').modal('hide');
			   $('#addresstype').html('<option value="">Rafles</option>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

   $('#linebusinessname').change(function(){
    	$.getJSON("<?php echo base_url('customer/getlinebusiness'); ?>",
		{
			action:'getcode', plane:$(this).val()}, function(json){
    		if (json == null) {
				$('#linebusinessdesc').text('');
    			} else {
    			$('#linebusinessdesc').text(json.AirLineCode);
    			}
    		});
    });
				
					
</script>
 