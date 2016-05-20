  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script> 
 <link rel="stylesheet" href="<?php echo base_url();?>'assets/datatables/css/jquery.dataTables.min.css">
 

  <script type="text/javascript">

    var save_method5; //for save method string
    var tablecity;
 
 $(document).ready(function() {    
    load_country();
          tablecity = $('#tablecity').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[1,"desc"],[1,"desc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('c_region/c_city')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "CityCode" },
			{ "data": "CityName" },
            { "data": "StateName"},
			{ "data": "CountryName"},
            { "data": "action","orderable":false,"visible":true }
            ]
          });  

});

function city_add()
    {
      save_method5 = 'add';
	  load_country();
      $('#form_city')[0].reset(); // reset form on modals
      $('#modal_city').modal('show'); // show bootstrap modal
      $('.modal-title_city').text('Add State');
	  document.getElementById("CityCode2").disabled=false;
    }

function city_edit(id)
    {
      save_method5 = 'update';
      $('#form_city')[0].reset(); // reset form on modals
        
      var nmtabel='ms_city';
      var keytabel='CityCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('C_region/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
			load_country();
			$("#Country").empty();
            $('[name="CityName"]').val(data.CityName);
			$('[name="CityCode2"]').val(data.CityCode);
            $('[name="Remarks"]').val(data.Remarks); 
			$('[name="Country"]').val(data.Country); 
			$('[name="State"]').val(data.State); 
            $('#modal_city').modal('show');
            $('.modal-title_city').text('Edit State');
			
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_city()
    {
      tablecity.ajax.reload(null,false); //reload datatable ajax 
    }

function city_save()
    {
      var url5;
	  var State=$("#State").val();
	  var Country=$("#Country").val();
	  var CityName=$("#CityName").val();
	  
	  if(State =="" || Country =="" || CityName ==""){
		  swal("Warning !"," Isi Data dengan lengkap","error");
	  } else {
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('C_region/city_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('C_region/city_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#form_city').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               swal("Succes Saved !"," Success simpan data","success");
               $('#modal_city').modal('hide');
               reload_city();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	  }
    }

function city_delete(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='ms_city';
      var keytabel='CityCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('C_region/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               swal("Succes deleted !"," Success deleted data","warning");
               $('#modal_city').modal('hide');
               reload_city();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>

<h1 class="page-header"><i class="fa fa-flag green"></i> Master City</h1>
   <button class="btn-normal" onclick="city_add()"><i class="fa fa-plus fa-2x"></i> </button>
   
    <br />	<br />																															
    <table id="tablecity" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th style="width:2%">No</th>  
          <th style="width:15%">CityCode</th>
          <th style="width:20%">CityName</th>
          <th style="width:20%">State Name</th>
          <th style="width:20%">CountryName</th>
          <th style="width:8%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>CityCode</th>
          <th>CityName</th>
          <th><span style="width:20%">State Name</span></th>
          <th><span style="width:20%">CountryName</span></th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
 <!-- INFO -->
 <!-- end info -->
 

 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_city" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title_city">Add City</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_city" class="form-horizontal">
          <input name="CityCode2" type="hidden" id="CityCode2" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Country</label>
              <div class="col-md-9">
                <select name="Country" id="Country" class="form-control" onchange="return load_state()">
                
                </select>
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> State</label>
              <div class="col-md-9">
                <select name="State" id="State" class="form-control">
               
                </select>
              </div>
            </div>

<div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="CityName" type="text" class="form-control nama" id="CityName" placeholder="Name" value="" />
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
            <button type="button" id="btnSave" onclick="city_save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
<script type="text/javascript">
function load_country(){
       $.ajax({
           url : "<?php echo site_url('c_region/getCountry')?>",
           dataType: "json",
           success: function(data){
               $("#Country").empty();
               //$("#Country").append("<option value=''>Select Country.....</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].CountryCode+"'>"+data[i].CountryName+"</option>";
                          $("#Country").append(option);
						  //load_state();
                       }
  
               }
       }); 
    }
function load_state(){
	var country=$("#Country").val();
       $.ajax({
		   type: "POST",
           url : "<?php echo site_url('c_region/getState')?>",
		   data: "country="+country,
           dataType: "json",
           success: function(data){
                    $("#State").empty();
                   // $($id).append("<option value=''>no value.....</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].StateCode+"'>"+data[i].StateName+"</option>";
                          $("#State").append(option);
                       }
  
               }
       }); 
    }

</script>