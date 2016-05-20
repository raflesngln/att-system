

  <script type="text/javascript">
    var save_method5; //for save method string
    var tablecountry;
 
 $(document).ready(function() {    
    load_combo();
          tablecountry = $('#tablecountry').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[1,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('C_region/c_state')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "StateCode" },
			{ "data": "StateName" },
            { "data": "CountryName"},
            { "data": "action","orderable":false,"visible":true }
            ]
          });  

});

function add_country()
    {
      save_method5 = 'add';
	  load_combo();
      $('#form_country')[0].reset(); // reset form on modals
      $('#modal_country').modal('show'); // show bootstrap modal
      $('.modal-title_country').text('Add State');
	  document.getElementById("StateCode2").disabled=false;
    }

function edit_state(id)
    {
      save_method5 = 'update';
      $('#form_country')[0].reset(); // reset form on modals
        
      var nmtabel='ms_state';
      var keytabel='StateCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('C_region/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
			//load_combo();
            $('[name="StateName"]').val(data.StateName);
			 $('[name="StateCode"]').val(data.StateCode);
			$('[name="StateCode2"]').val(data.StateCode);
            $('[name="Remarks"]').val(data.Remarks); 
			$('[name="Country"]').val(data.Country); 
            $('#modal_country').modal('show');
            $('.modal-title_country').text('Edit State');
			document.getElementById("StateCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_country()
    {
      tablecountry.ajax.reload(null,false); //reload datatable ajax 
    }

function save_state()
    {
      var url5;
	  var StateCode=$("#StateCode").val();
	  var StateName=$("#StateName").val();
	  if(StateCode !='' || StateName !=''){
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('C_region/state_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('C_region/state_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#form_country').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
			swal("Update successfull"," Succes Save/Update data","success");
               $('#modal_country').modal('hide');
               reload_country();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	  } else {
		  swal("Warning !"," State code dan Name tidak boleh kosong","error");
	  }
    }

function delete_state(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='ms_state';
      var keytabel='StateCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('C_region/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
			 swal("Deleted data"," Succes delete data","warning");
               $('#modal_country').modal('hide');
               reload_country();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>

<h1 class="page-header"><i class="fa fa-flag green"></i> Master State</h1>
   <button class="btn-normal" onclick="add_country()"><i class="fa fa-plus fa-2x"></i> </button>
   
    <br />	<br />																															
    <table id="tablecountry" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th style="width:2%">No</th>  
          <th style="width:15%">StateCode</th>
          <th style="width:30%">StateName</th>
          <th style="width:40%">CountryName</th>
          <th style="width:8%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>StateCode</th>
          <th>StateName</th>
          <th>CountryName</th>
          <th style="width:90px;">Action</th>
        </tr>
      </tfoot>
    </table>
 <!-- INFO -->
 <!-- end info -->
 

 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_country" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title_country">Add State</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_country" class="form-horizontal">
          <input name="StateCode" type="hidden" id="StateCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Country</label>
              <div class="col-md-9">
                <select name="Country" id="Country" class="form-control">
                <option value="">Select Country</option>
                </select>
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> State Code</label>
              <div class="col-md-9">
                <input name="StateCode" type="text" class="form-control nama" id="StateCode" placeholder="Name" value="" />
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="StateName" type="text" class="form-control nama" id="StateName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Remarks</label>
              <div class="col-md-9">
                <textarea name="Remarks" placeholder="decription"class="form-control" id="Remarks"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_state()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
<script type="text/javascript">
     function load_combo(){
       $.ajax({
           url : "<?php echo site_url('c_region/getCountry')?>",
           dataType: "json",
           success: function(data){
                    $("#Country").empty();
                   // $($id).append("<option value=''>no value.....</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].CountryCode+"'>"+data[i].CountryName+"</option>";
                          $("#Country").append(option);
                       }
  
               }
       }); 
    }

</script>