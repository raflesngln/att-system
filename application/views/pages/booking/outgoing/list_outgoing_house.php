  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>

 
 <link rel="stylesheet" href="<?php echo base_url();?>'assets/datatables/css/jquery.dataTables.min.css">
 

  <script type="text/javascript">

    var save_method5; //for save method string
    var tableopened;
 
 $(document).ready(function() {    
    
          tableopened = $('#tableopened').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[9,"desc"],[3,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_house/ajax_list')?>",
                "type": "POST",
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "HouseNo" },
			{ "data": "ETD" },
            { "data": "sender"},
            { "data": "receiver","orderable":false,"visible":true },
			{ "data": "ori","orderable":false,"visible":true },
			{ "data": "desti"},
			{ "data": "pcs","orderable":false,"visible":true},
			{ "data": "cwt","orderable":false,"visible":true},
			{ "data": "PayCode"},
			{ "data": "status"},
            { "data": "action","orderable":false,"visible":true }
            ]
          });  
    
$('#tableopened tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tableopened.row(tr);
           //alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#formOpened')[0].reset(); // reset form on modals
      $('#modal_opened').modal('show'); // show bootstrap modal
      $('.modal-title_open').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function edit_person5(id)
    {
      save_method5 = 'update';
      $('#formOpened')[0].reset(); // reset form on modals
        
      var nmtabel='outgoing_house';
      var keytabel='BankCode';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('outgoing_house/ajax_edit/')?>",
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
            $('.modal-title_open').text('Edit Linebusiness');
			document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_opened()
    {
      tableopened.ajax.reload(null,false); //reload datatable ajax 
    }

function save5()
    {
      var url5;
      if(save_method5 == 'add') 
      {
          url5 = "<?php echo site_url('outgoing_house/ajax_add')?>";
      }
      else
      {
        url5 = "<?php echo site_url('outgoing_house/ajax_update')?>";
      }

       // ajax adding data to database
          $.ajax({
            url : url5,
            type: "POST",
            data: $('#formOpened').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_opened').modal('hide');
               reload_opened();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_opened(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='outgoing_house';
      var keytabel='HouseNo';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('Outgoing_house/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_opened').modal('hide');
               reload_opened();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
      }
    }

  </script>

<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-th-list"></i></div>
     <div class="col-sm-9 col-xs-8">List of Open House</div>
</div>
</div>

    <br />																															
    <table id="tableopened" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="43">No</th>  
          <th width="93">House</th>
          <th width="95">ETD</th>
          <th width="137"> Shipper</th>
          <th width="165">Consigne</th>
          <th width="215">Origin</th>
          <th width="207">Destination</th>
          <th width="64" >QTY</th>
          <th width="52" >CWT</th>
          <th width="53" >Metode</th>
          <th width="96" >Status Consol</th>
          <th width="96" >Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>House</th>
          <th>ETD</th>
          <th> Name</th>
          <th>Consigne</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>QTY</th>
          <th>CWT</th>
          <th>Metode</th>
          <th>Status Consol</th>
          <th style="width:90px;">Action</th>
        </tr>
      </tfoot>
    </table>
 <!-- INFO -->
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px;font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Open House </strong>
<p>List ini untuk menampilkan House-House yang belum di proses atau sedang diproses.</p>
<li>House yg telah/sedang dikonsol tidak bisa diedit lagi sebelum dikeluarkan dari SMU yg dikonsolkan.</li>
<li>Status Consol <label class="label label-inverse arrowed-right white">No</label>&raquo;  Menunjukkan house <strong>BELUM</strong> diproses sama sekali</li>
<li>Status Consol <label class="label label-warning arrowed-right white">Remain</label> &raquo; Menujukan House yg <strong>SEDANG</strong> diproses tp masih belum semua CWT atau QTY habis di Consol</li>

</div>
 <!-- end info -->
 

<!-- MODAL -->
   <!-- Bootstrap modal -->
 <div class="modal fade" id="modaldetailsmuinhouse" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailsmuinhouse">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
      
 
<div id="modalhouse" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhouse">
                        <table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>House</th>  
          <th>Shipper</th>
          <th> QTY</th>
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


<!-- end of MODAL -->
 
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
		if(status >= '1'){
			alert('Cannot Edit house was consoled !');
			return false;
	}
}


function detailhouse(myid){
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
                url : "<?php echo base_url('outgoing_house/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					swal.close();
					$("#modalhouse").modal('show'); 
					$('#labelhouse').html(numb);
                   $('#tabledetailhouse').html(data);
                }
            });
	
}
	function detailsmuinHouse(myid){
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
                url : "<?php echo base_url('outgoing_house/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					swal.close();
					$("#modalhouse").modal('hide'); 
					$("#modaldetailsmuinhouse").modal('show'); 
                   $('#tabledetailsmuinhouse').html(data);
                }
            });
	
}
</script>
    