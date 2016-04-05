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
                                        <div class="table-responsive" id="table_contact_detail">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablecontactdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="8"> <div align="left"><a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_contact()"><i class="icon-plus icons"></i> contact</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">Address Type</th>
                                                  <th>Up</th>
                                                  <th>Address</th>
                                                  <th>City</th>
                                                  <th>State</th>
                                                  <th>Country</th>
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
                                                  <th colspan="11" scope="row">
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

           
 
 

<div class="modal fade" id="modal_contact" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Contact  Form</h3>
      </div>
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->
   <div class="modal-body" style="padding:20px 5px;">

<div class="col-sm-6">         

<div class="form-group">
            <span class="col-sm-4">
              <label for="usrname"><span></span> Type</label>
              </span>
              <span class="col-sm-7">
 <span class="input-icon input-icon-right">
 <input name="contacttype" type="text" class="form-control" id="contacttype"/>
<div id="dropdown_list_address">
<li>satu</li>
<li>dua</li>
</div>
<i class="icon-caret-down bigger-220" id="iconcaret" onclick="return dropdown_address()"></i>
</span> 
              </span>
 <span class="col-sm-">
<button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_contact_type()"><i class="fa fa-plus"></i></button>
</span>
              <input type="hidden" name="hidden_contact_type" id="hidden_contact_type" />
            </div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> UP</label></span><span class="col-sm-8">
              <input name="up3" type="text" class="form-control" id="up3"/>
              </span></div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Phone</label></span><span class="col-sm-8">
              <input name="phone2" type="text" class="form-control" id="phone2" />
              </span></div>  
              
<div class="form-group">
            <span class="col-sm-4">
              <label for="usrname"><span></span> Ext</label>
              </span>
              <span class="col-sm-8">
              <input name="ext2" type="text" class="form-control" id="ext2"  />
              </span>
            </div>          
 </div>   
 
 
<div class="col-sm-6">         
            
        <div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Fax</label></span>
              <span class="col-sm-8">
              <input name="fax2" type="text" class="form-control" id="fax2"/></span>
            </div>
 <div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Mobile Phone</label></span>
              <span class="col-sm-8">
              <input name="hp2" type="text" class="form-control" id="hp2"  /></span>
            </div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Email</label></span>
              <span class="col-sm-8">
              <input name="email2" type="text" class="form-control" id="email2"  /></span>
            </div>
<div class="form-group">
            <span class="col-sm-4">
              <label for="psw"><span></span> Desc</label></span>
              <span class="col-sm-8">
              <textarea name="contactdesc" cols="30" rows="2" class="form-control" id="contactdesc"></textarea></span>
            </div>
 </div>        
              <div class="clearfix"></div>
          
      </div>
          <div class="modal-footer">


<button class="btn btn-primary" type="button" id="btn_add_contact"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

          </div>
    </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!--ADD DATA-->

<div class="modal fade" id="modal_form2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Contact Type Form</h3>
      </div>
      <div class="modal-body form">
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->
          <input name="ContactTypeCode" type="hidden" id="ContactTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="ContactTypeName" type="text" class="form-control nama" id="ContactTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="ContactTypeDesc" placeholder="decription"class="form-control" id="ContactTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
 <div class="clearfix"></div>
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


function hapus(myid){
	var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}

$("#btn_add_contact").click(function(){
	var contacttype=$('#contacttype').val();   
	var hidden_contact_type=$('#hidden_contact_type').val();
	var up3=$('#up3').val();		
	var phone2=$('#phone2').val(); 
	var ext2=$('#ext2').val(); 
	var fax2=$('#fax2').val(); 
	var hp2=$('#hp2').val(); 
	var email2=$('#email2').val(); 
	var contactdesc=$('#contactdesc').val(); 
			
if (contacttype == '' || hidden_contact_type == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="contacttype2[]" id="contacttype2[]" size="5" value="'+ hidden_contact_type +'">'+ '<label id="l_pcs">'+ contacttype +'</label>' +'</td>'
   
	
    + '<td align="left">' +  '<input type="hidden" name="up4[]" id="up4[]" size="5" value="'+ up3 +'">'+ '<label id="l_pcs">'+ up3 +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="phone3[]" id="phone3[]" size="5" value="'+ phone2 +'">'+ '<label id="l_pcs">'+ phone2 +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="ext3[]" id="ext3[]" size="5" value="'+ ext2 +'">'+ '<label id="l_pcs">'+ ext2 +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="fax3[]" id="fax3[]" size="5" value="'+ fax2 +'">'+ '<label id="l_pcs">'+ fax2 +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="hp3[]" id="hp3[]" size="5" value="'+ hp2 +'">'+ '<label id="l_pcs">'+ hp2 +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="email3[]" id="email3[]" size="5" value="'+ email2 +'">'+ '<label id="l_pcs">'+ email2 +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="contactdesc2[]" id="contactdesc2[]" size="5" value="'+ contactdesc +'">'+ '<label id="l_pcs">'+ contactdesc +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + hidden_contact_type +'" onclick="hapus(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#table_contact_detail tbody').append(text);
		$("#modal_contact").modal('hide');
		//RESET INPUT
		//$('#form_add_contact')[0].reset();


	}
 });
function add_contact()
    {
      
      //$('#form_add_contact')[0].reset(); // reset form on modals
      $("#modal_contact").modal('show');
    
	  
}
function clear_contact_type()
    {
      save_method2 = 'add';
      //$('#form_contact_type')[0].reset(); // reset form on modals
      $("#modal_contact_type").modal('show');
      
}

function add_contact_type()
    {
      save_method2 = 'add';
      //$('#form2')[0].reset(); // reset form on modals
      $("#modal_form2").modal('show');
    
	  
}
function save2()
    {
      var url2;
	  var ContactTypeName=$("#ContactTypeName").val();
	  var ContactTypeDesc=$("#ContactTypeDesc").val();
	  
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
	data: "ContactTypeName="+ContactTypeName+"&ContactTypeDesc="+ContactTypeDesc,
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form2').modal('hide');
               reload_table2();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }
	
</script>
 