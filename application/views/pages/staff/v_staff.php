  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method5; //for save method string
    var tablebank;
 
 $(document).ready(function() {    
    
          tablebank = $('#tablebank').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_staff/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "empInitial" },
            { "data": "empName" },
            { "data": "Address" },
			{ "data": "Phone","orderable":false,"visible":true },
			{ "data": "Remarks","orderable":false,"visible":true },
			{ "data": "status" },
            { "data": "action","orderable":false,"visible":true }
            ]
          });  
    
$('#tablebank tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablebank.row(tr);
           // alert(row.data().firstName);
         });
});

function add_staff()
    {
      save_method5 = 'add';
      $('#form_staff')[0].reset(); // reset form on modals
      $('#modal_form_staff').modal('show'); // show bootstrap modal
      $('.modal-title5').text('Add staf');
	  document.getElementById("empCode2").disabled=false;
    }

function edit_staff(id)
    {
      save_method5 = 'update';
      $('#form_staff')[0].reset(); // reset form on modals
        
      var nmtabel='ms_staff';
      var keytabel='empCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_staff/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="empName"]').val(data.empName);
			$('[name="empCode"]').val(data.empCode);
			$('[name="Address"]').val(data.Address);
			$('[name="empInitial"]').val(data.empInitial);
			$('[name="empCode2"]').val(data.empCode);
            $('[name="Phone"]').val(data.Phone); 
			$('[name="isActive"]').val(data.isActive); 
			$('[name="Remarks"]').val(data.Remarks); 
			
            $('#modal_form_staff').modal('show');
            $('.modal-title5').text('Edit staf');
			document.getElementById("empCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table3()
    {
      tablebank.ajax.reload(null,false); //reload datatable ajax 
    }

function save_staff()
    {
      var url5;
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('ms_staff/ajax_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('ms_staff/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#form_staff').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form_staff').modal('hide');
               reload_table3();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_staff(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_staff';
      var keytabel='empCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_staff/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form_staff').modal('hide');
               reload_table3();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>






    <button class="btn-normal" onclick="add_staff()"><i class="fa fa-plus"></i>  </button>
    <br />
    <br />
    <table id="tablebank" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>  
          <th> Initial</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Remarks</th>
          <th>is Active</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr>
          <th>No</th>
          <th>Initial</th>
          <th>Name</th>
          <th>Address</th>
          <th>Phone</th>
          <th>Remarks</th>
          <th>is Active</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form_staff" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">x</button>
        <h3 class="modal-title5">Staff Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_staff" class="form-horizontal">
          <input name="empCode" type="hidden" id="empCode" value=""/> 
          <div class="form-body">
<div class="form-group" style="display:none">
              <label class="control-label col-md-3"> Emp Code</label>
              <div class="col-md-9">
                <input name="empCode2" type="text" class="form-control nama" id="empCode2" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3"> Initial</label>
              <div class="col-md-9">
                <input name="empInitial" type="text" class="form-control nama" id="empInitial" placeholder="initial" value="" />
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="empName" type="text" class="form-control nama" id="empName" placeholder="Name" value="" />
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> Phone</label>
              <div class="col-md-9">
                <input name="Phone" type="text" class="form-control nama" id="Phone" placeholder="phone" value="" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="Address" placeholder="addres"class="form-control" id="Address"></textarea>
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> Remarks</label>
              <div class="col-md-9">
                <textarea name="Remarks" class="form-control nama" id="Remarks" placeholder="remarks"></textarea>
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> is Active</label>
              <div class="col-md-9">
                <select required name="isActive" id="isActive" class="form-control">
                <option value="">Select Optionn</option>
            <option value="0">NO</option>
            <option value="1">Yes</option>
                </select>
              </div>
            </div>            
          </div>
        </form>
      </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save_staff()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
    