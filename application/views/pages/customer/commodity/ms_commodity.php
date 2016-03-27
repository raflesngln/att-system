  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method4; //for save method string
    var tablecommodity;
 
 $(document).ready(function() {    
    
          tablecommodity = $('#tablecommodity').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_commodity/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "CommCode" },
            { "data": "CommName" },
            { "data": "CommDesc" },
			{ "data": "FullName" },
            { "data": "action" }
            ]
          });
    
         $('#tablecommodity tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablecommodity.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person3()
    {
      save_method4 = 'add';
      $('#form4')[0].reset(); // reset form on modals
      $('#modal_form4').modal('show'); // show bootstrap modal
      $('.modal-title4').text('Add Commodity'); // Set Title to Bootstrap modal title
    }

function edit_person4(id)
    {
      save_method4 = 'update';
      $('#form4')[0].reset(); // reset form on modals
        
      var nmtabel='ms_commodity';
      var keytabel='CommCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_commodity/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="CommName"]').val(data.CommName);
			 $('[name="CommCode"]').val(data.CommCode	);
            $('[name="CommDesc"]').val(data.CommDesc);
			
            $('#modal_form4').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title4').text('Edit Comodity'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table4()
    {
      tablecommodity.ajax.reload(null,false); //reload datatable ajax 
    }

function save4()
    {
      var url4;
      if(save_method4 == 'add') 
      {
          url4 = "<?php echo site_url('ms_commodity/ajax_add')?>";
      }
      else
      {
        url4 = "<?php echo site_url('ms_commodity/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url4,
            type: "POST",
            data: $('#form4').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form4').modal('hide');
               reload_table4();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person4(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_commodity';
      var keytabel='CommCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_commodity/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form4').modal('hide');
               reload_table4();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>






    <button class="btn btn-success" onclick="add_person3()"><i class="glyphicon glyphicon-plus"></i> Add Commodity</button>
    <br />
    <br />
    <table id="tablecommodity" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>no</th>  
          <th>id</th>
          <th> Name</th>
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
          <th>Description</th>
          <th>Createdby</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form4" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title4">Addrest Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form4" class="form-horizontal">
          <input name="CommCode" type="hidden" id="CommCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="CommName" type="text" class="form-control nama" id="CommName" placeholder="First Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="CommDesc" placeholder="Address"class="form-control" id="CommDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save4()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    