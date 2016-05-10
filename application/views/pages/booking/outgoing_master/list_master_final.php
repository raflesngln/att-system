  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var update_methode; //for save method string
    var tablefinalsmu;
 
 $(document).ready(function() {    
    
          tablefinalsmu = $('#tablefinalsmu').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_master/list_final')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "NoSMU" },
			{ "data": "ETD" },
            { "data": "sender" },
            { "data": "receiver" },
			{ "data": "ori" },
			{ "data": "desti" },
			{ "data": "pcs" },
			{ "data": "cwt" },
            { "data": "action" }
            ]
          });  
    
$('#tablefinalsmu tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tablefinalsmu.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      update_methode = 'add';
      $('#myformfinal')[0].reset(); // reset form on modals
      $('#modal_master_final').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function editFinal(id)
    {
      update_methode = 'update';
      $('#myformfinal')[0].reset(); // reset form on modals
        
      var nmtabel='outgoing_master';
      var keytabel='NoSMU';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('outgoing_master/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="smuno"]').val(data.NoSMU);
			 $('[name="smu"]').val(data.NoSMU);
			$('[name="cwt"]').val(data.CWT);
            $('[name="remarks"]').val(data.Remarks); 
			$('[name="finalcwt"]').val(data.FinalCWT); 
			
			
            $('#modal_master_final').modal('show');
            $('.modal-title').text('Edit CWT Final');
			document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reloadFinal()
    {
      tablefinalsmu.ajax.reload(null,false); //reload datatable ajax 
    }

function updateCWTsmu()
    {
      var url_action;
      if(update_methode == 'add') 
      {
          url_action = "<?php echo site_url('outgoing_master/ajax_add')?>";
      }
      else
      {
        url_action = "<?php echo site_url('outgoing_master/updateCWT')?>";
      }
       // ajax adding data to database
          $.ajax({
            url : url_action,
            type: "POST",
            data: $('#myformfinal').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_master_final').modal('hide');
               reloadFinal();
			   reloadClosedsmu();
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
      var nmtabel='outgoing_master';
      var keytabel='NoSMU';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('outgoing_master/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_master_final').modal('hide');
               reloadFinal();
			   reloadClosedsmu();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>

<div class="row pull-right" style="margin-right:30px">

<form class="form">
<div class="row">
<div class="col-sm-5">
<select name="status3" id="status3" class="form-control" onchange="return getStatus(this);">
<option value="all">All</option>
<option value="destination">Filter by Destination</option>
<option value="shipper">Filter by Shipper</option>
</select>
</div>
<div class="col-sm-5">
<select name="status4" id="status4" class="form-control">
<option value="all">All</option>

</select>
</div><div class="clearfix"></div>

<div class="col-sm-4"><span>&nbsp;</span><input name="start2" type="text" class="start form-control" id="start2" readonly="readonly" value="<?php echo date('Y-m-d');?>" /></div>

<div class="col-sm-4"><span>&nbsp;</span><input class="end form-control" name="end2" type="text" id="end2" readonly="readonly" value="<?php echo date('Y-m-d');?>" /></div>

<div class="col-sm-1">
  <button type="button" onclick="return FilterMasterFinal()" id="btnfilter" class="btn btn-primary btn-"><i class="fa fa-search"> Filter</i></button></div>
</div>
</form>
</div>

  <br />
    <br />
 <div class="col-sm-12 portlets ui-sortable">
<div class="table-responsive" id="divclosed">
    <table id="tablefinalsmu" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>  
          <th>SMU</th>
          <th>ETD</th>
          <th> Shipper</th>
          <th>Consignee</th>
          <th>Origin</th>
          <th>Destination</th>
          <th style="width:125px;">PCS</th>
          <th style="width:125px;">CWT</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>SMU</th>
          <th>ETD</th>
          <th>Shipper</th>
          <th>Consignee</th>
          <th>Origin</th>
          <th>Destination</th>
          <th><span style="width:125px;">PCS</span></th>
          <th><span style="width:125px;">CWT</span></th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  </div>
  </div>          
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_master_final" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="myformfinal" class="form-horizontal">
          <input name="smuno" type="hidden" id="smuno" value=""/> 
          <div class="form-body">
<div class="form-group">
              <label class="control-label col-md-3 text-left">SMU</label>
              <div class="col-md-9">
                <input name="smu" type="text" class="form-control nama" id="smu" placeholder="Name" value="" readonly="readonly" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3"> CWT</label>
              <div class="col-md-9">
                <input name="cwt" type="text" class="form-control nama" id="cwt" placeholder="Name" value="" readonly="readonly" />
              </div>
            </div>
<div class="form-group">
              <label class="control-label col-md-3">Final CWT</label>
              <div class="col-md-9">
                <input name="finalcwt" type="text" class="form-control nama" id="finalcwt" placeholder="Name" value="" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3">Remarks</label>
              <div class="col-md-9">
                <textarea name="remarks" placeholder="decription"class="form-control" id="remarks"></textarea>
              </div>
            </div>
            
          </div>
        </form>
      </div>
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            <button type="button" id="btnSave" onclick="updateCWTsmu()" class="btn btn-primary">Update</button>
            
          </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
  
  <script type="text/javascript">
	
	 $(".dethouse").click(function(){
          var nomor=$(this).html();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/detail_outgoing_house'); ?>",
                data: "nomor="+nomor,
                success: function(data){
                   $('.detail_outgoing').html(data);
				   $('.txtdetail').html('<strong> No. House : ' + nomor + '</strong>');
                }
            });
        });
	
	 $("#txtsearch").keyup(function(){
            var txtsearch = $('#txtsearch').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_outgoing_house'); ?>",
                data: "txtsearch="+txtsearch,
                success: function(data){
                   $('#table_connote').html(data);
                }
            });
        });
		
	 $("#btnsearch").click(function(){
            var txtsearch = $('#txtsearch').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_outgoing_house'); ?>",
                data: "txtsearch="+txtsearch,
                success: function(data){
                   $('#table_connote').html(data);
                }
            });
        });
	 $("#btnsort").click(function(){
            var tgl1 = $('#tg1').val();
			var tgl2 = $('#tg2').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/periode_outgoing_house');?>",
       data: "tgl1="+tgl1+"&tgl2="+tgl2,
                success: function(data){
                   $('#table_connote').html(data);
                }
            });
        });


//$("#btnfilter").click(function(e) {
function FilterMasterFinal(){
    var status=$("#status3").val();
	var status2=$("#status4").val();
	var start=$("#start2").val();
	var end=$("#end2").val();
	$.ajax({
    type: "POST",
    url : "<?php echo base_url('outgoing_master/filter_final'); ?>",
    data: "status="+status+"&status2="+status2+"&start="+start+"&end="+end,
     success: function(data){
     $('#divclosed').html(data);
         }
    });
}
$("#status3").change(function(e) {
    var filter=$("#status3").val();
	if(filter=='all'){
		//$("#status2 option").remove();
		document.getElementById("status3").selectedIndex = "0";
	} else {
			$.ajax({
            type: "POST",
            url : "<?php echo base_url('outgoing_master/getStatus'); ?>",
           data: "filter="+filter,
           success: function(data){
           $('#status4').html(data);
            }
       });
	}
});

</script>
    