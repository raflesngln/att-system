  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method5; //for save method string
    var tablebank;
 
 $(document).ready(function() {    
    
          tablebank = $('#tablebank').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_bank/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "BankAccNo" },
            { "data": "BankAccName" },
			{ "data": "BusinessCode" },
            { "data": "BankDesc" },
			{ "data": "FullName" },
            { "data": "action" }
            ]
          });  
    
         $('#tablebank tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablebank.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#form5')[0].reset(); // reset form on modals
      $('#modal_form5').modal('show'); // show bootstrap modal
      $('.modal-title5').text('Add Linebusiness'); // Set Title to Bootstrap modal title
    }

function edit_person5(id)
    {
      save_method5 = 'update';
      $('#form5')[0].reset(); // reset form on modals
        
      var nmtabel='ms_bank';
      var keytabel='BankAccNo';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_bank/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="BankAccName"]').val(data.BankAccName);
			 $('[name="BankAccNo"]').val(data.BankAccNo	);
			 $('[name="BusinessCode"]').val(data.BusinessCode);
            $('[name="BankDesc"]').val(data.BankDesc); 
			
            $('#modal_form5').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title5').text('Edit Linebusiness'); // Set title to Bootstrap modal title
            
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

function save5()
    {
      var url5;
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('ms_bank/ajax_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('ms_bank/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#form5').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form5').modal('hide');
               reload_table3();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person5(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_bank';
      var keytabel='BankAccNo';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_bank/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form5').modal('hide');
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






    <button class="btn btn-success" onclick="add_person5()"><i class="glyphicon glyphicon-plus"></i> Add Bakk Acc</button>
    <br />
    <br />
    <table id="tablebank" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>no</th>  
          <th>id</th>
          <th> Name</th>
          <th>Businescode</th>
          <th>Description</th>
          <th>Createdby</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr>
          <th>no</th>
          <th>id</th>
          <th> Name</th>
          <th>Businescode</th>
          <th>Description</th>
          <th>Createdby</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form5" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title5">Addrest Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form5" class="form-horizontal">
          <input name="BankAccNo" type="hidden" id="BankAccNo" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="BankAccName" type="text" class="form-control nama" id="BankAccName" placeholder="Name" value="" />
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3"> BusinessCode</label>
              <div class="col-md-9">
                <input name="BusinessCode" type="text" class="form-control nama" id="BusinessCode" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="BankDesc" placeholder="decription"class="form-control" id="BankDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save5()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    