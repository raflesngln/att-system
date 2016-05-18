  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var save_method5; //for save method string
    var tableopenmaster;
 
 $(document).ready(function() {    
    
          tableopenmaster = $('#tableopenmaster').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[9,"desc"],[3,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_master/ajax_list')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "NoSMU","orderable":"false"},
			{ "data": "ETD" },
            { "data": "sender" },
            { "data": "receiver","orderable":false,"visible":true },
			{ "data": "ori","orderable":false,"visible":true },
			{ "data": "desti" },
			{ "data": "pcs","orderable":false,"visible":true },
			{ "data": "cwt","orderable":false,"visible":true },
			{ "data": "status" },
            { "data": "action","orderable":false,"visible":true }
            ]
          });  
    
$('#tableopenmaster tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tableopenmaster.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#formopen')[0].reset(); // reset form on modals
      $('#modal_opened').modal('show'); // show bootstrap modal
      $('.modal-titleopen').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function edit_person5(id)
    {
      save_method5 = 'update';
      $('#formopen')[0].reset(); // reset form on modals
        
      var nmtabel='ms_bank';
      var keytabel='BankCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('ms_bank/ajax_edit/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="BankName"]').val(data.BankName);
			 $('[name="BankCode"]').val(data.BankCode);
			$('[name="BankCode2"]').val(data.BankCode);
            $('[name="BankDesc"]').val(data.BankDesc); 
			
            $('#modal_opened').modal('show');
            $('.modal-titleopen').text('Edit Linebusiness');
			document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reloadOpenMaster()
    {
      tableopenmaster.ajax.reload(null,false); //reload datatable ajax 
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
            data: $('#formopen').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_opened').modal('hide');
               reloadOpenMaster();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function deleteOpenMaster(id)
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
               $('#modal_opened').modal('hide');
               reloadOpenMaster();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>






    <br />
    <br />
    <table id="tableopenmaster" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>  
          <th>SMU</th>
          <th>ETD</th>
          <th> Shipper</th>
          <th>Consignee</th>
          <th>Origin</th>
          <th>Destination</th>
          <th style="width:50px;"><span style="width:125px;">QTY</span></th>
          <th style="width:50px;">CWT</th>
          <th style="width:90px;">Status Consol</th>
          <th style="width:50px;">Action</th>
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
          <th>QTY</th>
          <th>CWT</th>
          <th>Status Consol</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  <!-- INFO -->
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px;font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Open SMU </strong>
<p>List ini untuk menampilkan SMU yang belum di <strong>Proses</strong> atau <strong>Sedang diProses</strong> tapi belum di <strong>RELEASE</strong>.Tahap selanjutnya setelah dikonsol maka SMU akan di RELEASE</p>
<li>SMU yg telah/sedang dikonsol tidak bisa diedit  sebelum semua HOUSE yg telah masuk kedlam SMU  dikeluarkan terlebih dulu.</li>
<li>Status Consol <label class="label label-inverse arrowed-right white">No</label>
&raquo;  Menunjukkan SMU <strong>BELUM</strong> diproses sama sekali</li>
<li>Status Consol <label class="label label-warning arrowed-right white">Remain</label> 
&raquo; Menunjukan SMU yg <strong>SEDANG</strong> diproses tp belum di RELESE</li>

</div>
 <!-- end info -->           
 
   <!-- Bootstrap modal -->
  <div class="modal fade" id="modaldetailsmuopen" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailopen">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div id="modalhouseopen" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhouseopen">
                        <table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>House</th>  
          <th>Shipper</th>
          <th>QTY</th>
          <th>CWT</th>
          <th style="width:125px;">Amount</th>
        </tr>
      </thead>



    </table>

                        </div>
                     
                     
              </div>
            
           
          </div>
        </div>
    </div>
    </div>
  <!-- /.modal -->
  
  
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

function EditConfirm(myid){
		var status=myid;
		if(status >= '2'){
		swal({
		title:'SMU was consoled !',
		text:'<p>Please Reconsol to Edit again</p>',
		showConfirmButton:true,
		type:"error",
		html:true
		});
			//alert('Cannot Edit SMU was consoled !');
			return false;
	}
}
function detailsmuopen(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var smu=$(myid).html();
	var status='consol';
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('outgoing_master/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					$("#modaldetailsmuopen").modal('show'); 
                   $('#tabledetailopen').html(data);
				   swal.close();
                }
            });
	
}
function detailhouseopen(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('outgoing_master/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					$("#modalhouseopen").modal('show'); 
					$('#labelhouseopen').html(numb);
                   $('#tabledetailhouseopen').html(data);
				   swal.close();
                }
            });
	
}

</script>
    