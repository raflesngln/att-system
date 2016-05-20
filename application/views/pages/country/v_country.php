  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script> 
 <link rel="stylesheet" href="<?php echo base_url();?>'assets/datatables/css/jquery.dataTables.min.css">
 

  <script type="text/javascript">

    var save_method5; //for save method string
    var tablecountry;
 
 $(document).ready(function() {    
    
          tablecountry = $('#tablecountry').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[1,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('C_region/c_country')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "CountryCode" },
			{ "data": "CountryName" },
            { "data": "Remarks"},
            { "data": "action","orderable":false,"visible":true }
            ]
          });  

});

function add_country()
    {
      save_method5 = 'add';
      $('#form_country')[0].reset(); // reset form on modals
      $('#modal_country').modal('show'); // show bootstrap modal
      $('.modal-title_country').text('Add Country');
	  document.getElementById("CountryCode2").disabled=false;
    }

function edit_country(id)
    {
      save_method5 = 'update';
      $('#form_country')[0].reset(); // reset form on modals
        
      var nmtabel='ms_country';
      var keytabel='CountryCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('C_region/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="CountryName"]').val(data.CountryName);
			 $('[name="CountryCode"]').val(data.CountryCode);
			$('[name="CountryCode2"]').val(data.CountryCode);
            $('[name="Remarks"]').val(data.Remarks); 
			
            $('#modal_country').modal('show');
            $('.modal-title_country').text('Edit Country');
			document.getElementById("CountryCode2").disabled=true;
            
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

function save_country()
    {
      var url5;
	  var CountryCode=$("#CountryCode").val();
	  var CountryName=$("#CountryName").val();
	  if(CountryCode =="" || CountryName ==""){
		  swal("Warning !"," State code dan Name tidak boleh kosong","error");
	  } else {
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('C_region/country_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('C_region/country_update')?>";
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
	  }
    }
function delete_country(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='ms_country';
      var keytabel='CountryCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('C_region/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               swal("Data has Deleted !"," deleted data ( "+ id + " ) was succesfull","warning");
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

<h1 class="page-header"><i class="fa fa-flag green"></i> Master Country</h1>
   <button class="btn-normal" onclick="add_country()"><i class="fa fa-plus fa-2x"></i> </button>
    <br />	<br />																															
    <table id="tablecountry" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th style="width:2%">No</th>  
          <th style="width:15%">CountryCode</th>
          <th style="width:30%">CountryName</th>
          <th style="width:40%">Remarks</th>
          <th style="width:8%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>CountryCode</th>
          <th>CountryName</th>
          <th>Remarks</th>
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
        <h3 class="modal-title_country">Add Country</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_country" class="form-horizontal">
          <input name="CountryCode2" type="hidden" id="CountryCode2" value=""/> 
          <div class="form-body">
<div class="form-group">
              <label class="control-label col-md-3"> CountryCode</label>
              <div class="col-md-9">
                <input name="CountryCode" type="text" class="form-control nama" id="CountryCode" placeholder="Name" required="required"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="CountryName" type="text" class="form-control nama" id="CountryName" placeholder="Name"  required="required"/>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="Remarks" placeholder="decription"class="form-control" id="Remarks"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_country()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    