

  <script type="text/javascript">
    var save_method5; //for save method string
    var tablecharge;
 
 $(document).ready(function() {    
    load_combo();
          tablecharge = $('#tablecharge').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[1,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('charge/view_charge')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
			{ "data": "ChargeName" },
            { "data": "DefaultCharge"},
			{ "data": "HouseMethode"},
            { "data": "action","orderable":false,"visible":true }
            ]
          });  

});

function add_charge()
    {
      save_method5 = 'add';
	  load_combo();
      $('#form_charge')[0].reset(); // reset form on modals
      $('#modal_charge').modal('show'); // show bootstrap modal
      $('.modal-title_charge').text('Add charge');
	  document.getElementById("ChargeCode").disabled=false;
    }

function edit_charge(id)
    {
      save_method5 = 'update';
      $('#form_charge')[0].reset(); // reset form on modals
        
      var nmtabel='ms_charge';
      var keytabel='ChargeCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('C_region/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
			//load_combo();
            $('[name="ChargeName"]').val(data.ChargeName);
			 $('[name="ChargeCode"]').val(data.ChargeCode);
            $('[name="ChargeDetails"]').val(data.ChargeDetails); 
			$('[name="DefaultCharge"]').val(data.DefaultCharge); 
			$('[name="HouseMethode"]').val(data.HouseMethode); 
            $('#modal_charge').modal('show');
            $('.modal-title_charge').text('Edit charge');
			document.getElementById("ChargeCode").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_charge()
    {
      tablecharge.ajax.reload(null,false); //reload datatable ajax 
    }

function save_charge()
    {
      var url5;
	  var ChargeCode=$("#ChargeCode").val();
	  var ChargeName=$("#ChargeName").val();
	  if(ChargeName ==""){
		  swal("Warning !"," charge code dan Name tidak boleh kosong","error");
	  } else {
	  
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('charge/charge_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('charge/charge_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#form_charge').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
			swal("Update successfull"," Succes Save/Update data","success");
               $('#modal_charge').modal('hide');
               reload_charge();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
	  }
    }

function delete_charge(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='ms_charge';
      var keytabel='ChargeCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('charge/charge_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
			 swal("Deleted data"," Succes delete data","warning");
               $('#modal_charge').modal('hide');
               reload_charge();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>

<h1 class="page-header"><i class="fa fa-flag green"></i> Master Charges</h1>
   <button class="btn-normal" onclick="add_charge()"><i class="fa fa-plus fa-2x"></i> </button>
   
    <br />	<br />																															
    <table id="tablecharge" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th width="20" style="width:2%">No</th>  
          <th width="172" style="width:45%">ChargeName</th>
          <th width="92" style="width:25%">Charge Default</th>
          <th width="161" style="width:30%">House Metode</th>
          <th width="88" style="width:8%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>ChargeName</th>
          <th><span style="width:40%">Charge Default</span></th>
          <th><span style="width:40%">House Metode</span></th>
          <th style="width:90px;">Action</th>
        </tr>
      </tfoot>
    </table>
 <!-- INFO -->
 <!-- end info -->
 

 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_charge" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title_charge">Add charge</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_charge" class="form-horizontal">
          <input name="ChargeCode" type="hidden" id="ChargeCode" value=""/> 
          <div class="form-body">
            

<div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="ChargeName" type="text" class="form-control nama" id="ChargeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Remarks</label>
              <div class="col-md-9">
                <textarea name="ChargeDetails" placeholder="decription"class="form-control" id="ChargeDetails"></textarea>
              </div>
            </div>
 <div class="form-group">
              <label class="control-label col-md-3"> Country</label>
              <div class="col-md-9">
                <select name="DefaultCharge" id="DefaultCharge" class="form-control">
                <option value="">Default Charges </option>
                <option value="1">YES</option>
                <option value="0">No</option>
                </select>
              </div>
            </div>   
<div class="form-group">
              <label class="control-label col-md-3"> Methode</label>
              <div class="col-md-9">
                <select name="HouseMethode" id="HouseMethode" class="form-control">
                <option value="">Metode </option>
                <option value="IN">Incoming</option>
                <option value="OUT">Outgoing</option>
                </select>
              </div>
            </div>        
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_charge()" class="btn btn-primary">Save</button>
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