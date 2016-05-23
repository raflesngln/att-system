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
                                        <div class="table-responsive" id="table_address_detail">
 <table class="table table-striped table-bordered tablecontactdetail" id="tablecontactdetail">
                                              <thead>
                                                <tr>
                                                  <th colspan="8"> <div align="left"><a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_address()"><i class="icon-plus icons"></i> Address</a></div></th>
                                                </tr>
                                                <tr>
                                                  <th height="33">Address Type</th>
                                                  <th>Up</th>
                                                  <th>Address</th>
                                                  <th>City</th>
                                                  <th>State</th>
                                                  <th>Country</th>
                                                  <th>P.Code</th>
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

           
 
 

<div class="modal fade" id="modal_address" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Address  Form</h3>
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
 <input name="addresstype" type="text" class="form-control" id="addresstype"/>
<div id="dropdown_list_address">
<li>satu</li>
<li>dua</li>
</div>
<i class="icon-caret-down bigger-220" id="iconcaret" onclick="return dropdown_address()"></i>
</span> 
              </span>
 <span class="col-sm-">
<button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_address_type()"><i class="fa fa-plus"></i></button>
</span>
              <input type="hidden" name="hidden_address_type" id="hidden_address_type" />
            </div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> UP</label></span><span class="col-sm-8">
              <input type="text" id="up" class="form-control" name="up"/>
              </span></div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Full Address </label></span><span class="col-sm-8">
              <textarea name="completeaddress" cols="30" rows="2" class="form-control" id="completeaddress"></textarea>
              </span></div>            
 </div>   
 
 
<div class="col-sm-6">         
            
        
 <div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Country</label></span>
              <span class="col-sm-8">
<select name="country" id="country"  class="form-control">
                            <option value="">choose country</option>
                            <?php
	foreach($country as $ct){
	    ?>
                            <option value="<?php echo $ct->CountryCode.'-'.$ct->CountryName;?>"><?php echo $ct->CountryName;?></option>
                            <?php } ?>
                          </select></span>
            </div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> State</label></span>
              <span class="col-sm-8">
              <select name="state" id="state"  class="form-control">
          <option value="">Chosse state</option>
          <?php
	foreach($state as $st){
	    ?>
          <option value="<?php echo $st->StateCode.'-'.$st->StateName;?>"><?php echo $st->StateName;?></option>
          <?php } ?>
</select></span>
            </div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="usrname"><span></span> City</label>
              </span>
              <span class="col-sm-8">
              <select name="city2" id="city2"  class="form-control">
          <option value="">Chosse city</option>
          <?php
	foreach($city as $ct){
	    ?>
          <option value="<?php echo $ct->CityCode.'-'.$ct->CityName;?>"><?php echo $ct->CityName;?></option>
          <?php } ?>
        </select>
              </span>
            </div>

<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Postal Cose</label></span>
              <span class="col-sm-8">
              <input name="PostalCode" type="text" class="form-control" id="PostalCode" /></span>
            </div>

 </div>        
              <div class="clearfix"></div>
          
      </div>
          <div class="modal-footer">

<button class="btn btn-primary" type="button" id="btn_add_address"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>

          </div>
    </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
<!--ADD DATA-->

<div class="modal fade" id="modal_address_type" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Address Type Form</h3>
      </div>
      <div class="modal-body form">
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->

<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Name</label></span>
          <span class="col-sm-8">
              <input name="AddressTypeName" type="text" class="form-control nama" id="AddressTypeName" placeholder="Name" value="" /></span>
              <span class="col-md-9">
              <input name="AddressTypeCode" type="hidden" id="AddressTypeCode" value=""/>
              </span></div>
            
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Address</label></span>
          <span class="col-sm-8">
              <textarea name="AddressTypeDesc" placeholder="decription"class="form-control" id="AddressTypeDesc"></textarea></span></div>   
            
            
  <div class="clearfix"></div>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave_address_type" onclick="save_address_type()" class="btn btn-primary">Save</button>
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



$("#btn_add_address").click(function(){
	var addresstype=$('#addresstype').val();   
	var hidden_address_type=$('#hidden_address_type').val();
	var up=$('#up').val();		
	var completeaddress=$('#completeaddress').val(); 
	var city2=$('#city2').val(); 
	var state=$('#state').val(); 
	var country=$('#country').val(); 
	var PostalCode=$('#PostalCode').val();
	
	var pecah=country.split('-');
	var idCountry=pecah[0];
	var nmCountry=pecah[1]; 
	
	var pecah2=state.split('-');
	var idState=pecah2[0];
	var nmState=pecah2[1]; 
	
	var pecah3=city2.split('-');
	var idCity=pecah3[0];
	var nmCity=pecah3[1]; 
			
if (addresstype == '' || hidden_address_type == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<tr class="gradeX" align="right">'
    + '<td align="left">' + '<input type="hidden" name="addresstype2[]" id="addresstype2[]" size="5" value="'+ hidden_address_type +'">'+ '<label id="l_pcs">'+ addresstype +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="up2[]" id="up2[]" size="5" value="'+ up +'">'+ '<label id="l_pcs">'+ up +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="completeaddress2[]" id="completeaddress2[]" size="5" value="'+ completeaddress +'">'+ '<label id="l_pcs">'+ completeaddress +'</label>' +'</td>'

    + '<td align="left">' +  '<input type="hidden" name="city3[]" id="city3[]" size="5" value="'+ idCity +'">'+ '<label id="l_pcs">'+ nmCity +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="state2[]" id="state2[]" size="5" value="'+ idState +'">'+ '<label id="l_pcs">'+ nmState +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="country2[]" id="country2[]" size="5" value="'+ idCountry +'">'+ '<label id="l_pcs">'+ nmCountry +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="PostalCode2[]" id="PostalCode2[]" size="5" value="'+ PostalCode +'">'+ '<label id="l_pcs">'+ PostalCode +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + hidden_address_type +'" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#table_address_detail tbody').append(text);
		$("#modal_address").modal('hide');
		//RESET INPUT
		$('#form_add_address')[0].reset();


	}
 });

function clear_address_type()
    {
      save_method = 'add';
      $('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_address_type").modal('show');
     
}
function add_address()
    {
      
      //$('#form_add_address')[0].reset(); // reset form on modals
      $("#modal_address").modal('show');
     
	  
}
function add_address_type()
    {
      save_method = 'add';
      //$('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_address_type").modal('show');
      
	  
}
function save_address_type()
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
 