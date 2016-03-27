  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method3; //for save method string
    var tablebisnis;
 
 $(document).ready(function() {    
    
          tablebisnis = $('#tablebisnis').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_linebusiness/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "LineBusinessID" },
            { "data": "LineBusinesName" },
            { "data": "LineBusinessDesc" },
			{ "data": "FullName" },
            { "data": "action" }
            ]
          });
    
         $('#tablebisnis tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablebisnis.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person3()
    {
      save_method3 = 'add';
      $('#form3')[0].reset(); // reset form on modals
      $('#modal_form3').modal('show'); // show bootstrap modal
      $('.modal-title3').text('Add Linebusiness'); // Set Title to Bootstrap modal title
    }

function edit_person3(id)
    {
      save_method3 = 'update';
      $('#form3')[0].reset(); // reset form on modals
        
      var nmtabel='ms_linebusiness';
      var keytabel='LineBusinessID';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_linebusiness/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="LineBusinesName"]').val(data.LineBusinesName);
			 $('[name="LineBusinessID"]').val(data.LineBusinessID	);
            $('[name="LineBusinessDesc"]').val(data.LineBusinessDesc);
			
            $('#modal_form3').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title3').text('Edit Linebusiness'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table3()
    {
      tablebisnis.ajax.reload(null,false); //reload datatable ajax 
    }

function save3()
    {
      var url3;
      if(save_method3 == 'add') 
      {
          url3 = "<?php echo site_url('ms_linebusiness/ajax_add')?>";
      }
      else
      {
        url3 = "<?php echo site_url('ms_linebusiness/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url3,
            type: "POST",
            data: $('#form3').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form3').modal('hide');
               reload_table3();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person3(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_linebusiness';
      var keytabel='LineBusinessID';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_linebusiness/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form3').modal('hide');
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






    <button class="btn btn-success" onclick="add_person3()"><i class="glyphicon glyphicon-plus"></i> Add Line Bisnis</button>
    <br />
    <br />
    <table id="tablebisnis" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
  <div class="modal fade" id="modal_form3" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title3">Addrest Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form3" class="form-horizontal">
          <input name="LineBusinessID" type="hidden" id="LineBusinessID" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="LineBusinesName" type="text" class="form-control nama" id="LineBusinesName" placeholder="First Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="LineBusinessDesc" placeholder="Address"class="form-control" id="LineBusinessDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save3()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    