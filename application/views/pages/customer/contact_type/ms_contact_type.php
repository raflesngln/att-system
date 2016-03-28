  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method2; //for save method string
    var tablecontact;
 
 $(document).ready(function() {    
    
          tablecontact = $('#tablecontact').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_contact_type/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "ContactTypeCode" },
            { "data": "ContactTypeName" },
            { "data": "ContactTypeDesc" },
            { "data": "action" }
            ]
          });
    
         $('#tablecontact tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablecontact.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person2()
    {
      save_method2 = 'add';
      $('#form2')[0].reset(); // reset form on modals
      $('#modal_form2').modal('show'); // show bootstrap modal
      $('.modal-title2').text('Add Contact'); // Set Title to Bootstrap modal title
    }

function edit_person2(id)
    {
      save_method2 = 'update';
      $('#form2')[0].reset(); // reset form on modals
        
      var nmtabel='ms_contact_type';
      var keytabel='ContactTypeCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_contact_type/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="ContactTypeName"]').val(data.ContactTypeName);
			 $('[name="ContactTypeCode"]').val(data.ContactTypeCode	);
            $('[name="ContactTypeDesc"]').val(data.ContactTypeDesc);
			
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title2').text('Edit COntact'); // Set title to Bootstrap modal title
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table2()
    {
      tablecontact.ajax.reload(null,false); //reload datatable ajax 
    }

function save2()
    {
      var url2;
      if(save_method2 == 'add') 
      {
          url2 = "<?php echo site_url('ms_contact_type/ajax_add')?>";
      }
      else
      {
        url2 = "<?php echo site_url('ms_contact_type/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url2,
            type: "POST",
            data: $('#form2').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form2').modal('hide');
               reload_table2();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person2(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_contact_type';
      var keytabel='ContactTypeCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_contact_type/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form2').modal('hide');
               reload_table2();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>






    <button class="btn btn-success" onclick="add_person2()"><i class="glyphicon glyphicon-plus"></i> Add Type Contact</button>
    <br />
    <br />
    <table id="tablecontact" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>no</th>  
          <th>id</th>
          <th> Name</th>
          <th>Description</th>
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
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form2" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title2">Addrest Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form2" class="form-horizontal">
          <input name="ContactTypeCode" type="hidden" id="ContactTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="ContactTypeName" type="text" class="form-control nama" id="ContactTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="ContactTypeDesc" placeholder="decription"class="form-control" id="ContactTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save2()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    