  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>


  <script type="text/javascript">

  $(function() {
	$("#tgl1").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#tgl2").datepicker({
		dateFormat:'yy-mm-dd',
		});

  });


    var save_method; //for save method string
    var table;
 
 $(document).ready(function() {    
    
          table = $('#table').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('ms_address_type/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "AddressTypeCode" },
            { "data": "AddressTypeName" },
            { "data": "AddressTypeDesc" },
			 { "data": "FullName" },
            { "data": "action" }
            ]
          });
    
         $('#table tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person()
    {
      save_method = 'add';
      $('#form')[0].reset(); // reset form on modals
      $('#modal_form').modal('show'); // show bootstrap modal
    }

function edit_person(id)
    {
      save_method = 'update';
      $('#form')[0].reset(); // reset form on modals
        
      var nmtabel='ms_address_type';
      var keytabel='AddressTypeCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_address_type/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="AddressTypeName"]').val(data.AddressTypeName);
			$('[name="AddressTypeCode"]').val(data.AddressTypeCode);
            $('[name="AddressTypeDesc"]').val(data.AddressTypeDesc);
			
            $('#modal_form').modal('show');//show modal when complete loa        
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_table()
    {
      table.ajax.reload(null,false); //reload datatable ajax 
    }

function save()
    {
      var url;
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
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person(id)
    {
      if(confirm('Are you sure delete this data?'))
      var nmtabel='ms_address_type';
      var keytabel='AddressTypeCode';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('ms_address_type/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_form').modal('hide');
               reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>






    <button class="btn-normal" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Create</button>
    <br />
    <br />
    <form method="post" class="form-inline pull-right" style="margin-right:10px">
    <h5>Sorting Periode</h5>
    <input type="text" id="tgl1" name="tgl1" class="form-control" value="<?php echo date('Y-m-d');?>" readonly="readonly" />
    S/D
    <input type="text" id="tgl2" name="tgl2" class="form-control" value="<?php echo date('Y-m-d');?>" readonly="readonly"/>
    <button type="submit" name="btn-periode" class="btn btn-mini btn-primary"><i class="icon icon-exchange"></i> SORT</button>
    </form>
   
    
    <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>no</th>  
          <th>id</th>
          <th> Name</th>
          <th>Description</th>
          <th style="width:125px;">CreatedBy</th>
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
          <th><span style="width:125px;">CreatedBy</span></th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Addres Type Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form" class="form-horizontal">
          <input name="AddressTypeCode" type="hidden" id="AddressTypeCode" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> Name</label>
              <div class="col-md-9">
                <input name="AddressTypeName" type="text" class="form-control nama" id="AddressTypeName" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="AddressTypeDesc" placeholder="decription"class="form-control" id="AddressTypeDesc"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    