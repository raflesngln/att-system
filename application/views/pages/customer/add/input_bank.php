<div class="row-fluid">
<span class="span12">
<div class="form-group">
  <label class="col-sm-12 control-label"> <h3>Payment </h3></label>
                        <label class="col-sm-4 control-label">  Bank Account </label>
<div class="col-sm-8"><span class="controls">
                         
<a class="btn btn-primary btn-mini tbladdtype" title="Add" id="tbladd" onclick="return add_bank()"><i class="icon-plus icons"></i> Create</a>
                        </span></div>
              
  <div class="clearfix"></div>   <br />      
<div class="col-sm-12" id="bankadd">

</div>
                        
                        <div class="clearfix"></div>
</div>
</span>



		
</div>

<br /></br>
<div class="modal fade" id="modal_bank" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 class="modal-title">Input Bank </h3>
      </div>
   <!--     <form action="#" id="form_address_type" class="form-horizontal"> -->
   <div class="modal-body" style="padding:20px 5px;">

<div class="col-sm-11">         

<div class="form-group">
            <span class="col-sm-4">
            <label for="usrname"><span></span> Type</label>
              </span>
              <span class="col-sm-7">
 <span class="input-icon input-icon-right"><span class="controls">
 <select name="bankcode" id="bankcode" class="form-control">
   <option value="">Chose bank</option>
   <?php
	foreach($bank as $bnk){
	    ?>
   <option value="<?php echo $bnk->BankCode.'-'.$bnk->BankName;?>"><?php echo $bnk->BankName;?></option>
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
<button id="addmodaltype" class="addcust btn btn-mini btn-primary" type="button" onclick="return add_bank_type()"><i class="fa fa-plus"></i></button>
</span></div>

<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Rek No </label></span><span class="col-sm-8">
  <input type="text" class="form-control" id="rekno" name="rekno" />
          </span></div>
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Rek. Name </label></span><span class="col-sm-8">
  <input type="text" class="form-control" id="rekname" name="rekname" />
          </span></div>
 <div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Branch </label></span><span class="col-sm-8">
  <input type="text" class="form-control" id="branch" name="branch" />
          </span></div>          
<div class="form-group">
            <span class="col-sm-4">
            <label for="psw"><span></span> Description </label></span><span class="col-sm-8">
              <textarea name="bankdesc" cols="30" rows="2" class="form-control" id="bankdesc"></textarea>
          </span></div>            
 </div>
<div class="clearfix"></div>
          
      </div>
          <div class="modal-footer">

<button class="btn btn-primary" type="button" id="btn_add_bank"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
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
	//var input = $(myid).val();
		 t = $(myid);
		 tr = t.parent().parent();
		 tr.remove();
}



$("#btn_add_bank").click(function(){
	var bankcode=$('#bankcode').val();   
	var bankdesc=$('#bankdesc').val();
	var rekno=$('#rekno').val();
	var rekname=$('#rekname').val();
	var branch=$('#branch').val();

	var pecah=bankcode.split('-');
	var idbank=pecah[0];
	var nmbank=pecah[1];
			
if (bankcode == '' || bankdesc == ''){
	alert('Nama dan type contact tidak boleh kosong');	
	}
	else
	{
	text='<div class="col-sm-3" style="border:1px #DDD solid;height:160px;box-shadow:4px 3px 8px #DDD; margin-left:8px;margin-bottom:8px">'+ '<a href="#" class="contact"><input type="hidden" name="codebank[]" value="'+ idbank +'">'
	+ '<input type="hidden" name="bankdcd[]" value="'+ idbank +'">'
	+ '<input type="hidden" name="bankrek[]" value="'+ rekno +'">'
	+ '<input type="hidden" name="banknm[]" value="'+ rekname +'">'
	+ '<input type="hidden" name="bandkdsc[]" value="'+ bankdesc +'">'
	+ '<input type="hidden" name="bankbranch[]" value="'+ branch +'">'
	+ nmbank 
	+'<p>'+ rekno +'</p><p>'+ rekname + '</p><p>'+ bankdesc + '</p><p></a>' + '<button class="btndel btn-danger btn-mini" value="' + bankcode + '" onclick="hapus3(this)" type="button"><i class="fa fa-times"></i></button></p></div>';
	

		$('#bankadd').append(text);
		$("#modal_bank").modal('hide');
		//RESET INPUT
		//$('#form_add_bank')[0].reset();


	}
 });

function clear_address_type()
    {
      save_method = 'add';
      $('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_bank_type").modal('show');
     
}
function add_bank()
    {
      
      //$('#form_add_bank')[0].reset(); // reset form on modals
      $("#modal_bank").modal('show');
     
	  
}
function add_bank_type()
    {
      save_method = 'add';
      //$('#form_address_type')[0].reset(); // reset form on modals
      $("#modal_bank_type").modal('show');
      
	  
}
function save_bank_type()
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
               $('#modal_bank_type').modal('hide');
			   $('#addresstype').html('<option value="">Rafles</option>');
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

   $('#bankname').change(function(){
    	$.getJSON("<?php echo base_url('customer/getbank'); ?>",
		{
			action:'getcode', plane:$(this).val()}, function(json){
    		if (json == null) {
				$('#bankdesc').text('');
    			} else {
    			$('#bankdesc').text(json.AirLineCode);
    			}
    		});
    });
				
					
</script>
 