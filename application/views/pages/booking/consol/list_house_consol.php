  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var update_methode3; //for save method string
    var housetable;
 
 $(document).ready(function() {    
    
          housetable = $('#housetable').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "bInfo": false, 
			"order":[[6,"asc"],[2,"desc"],[1,"asc"]],
			"serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('consol/list_house_consol')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" ,"orderable":false,"visible":true},
            { "data": "HouseNo" },
			{ "data": "ETD" },
            { "data": "desti" },
            { "data": "CWT","orderable":false,"visible":true },
			{ "data": "CWT","orderable":false,"visible":true },
			{ "data": "status" },
			{ "data": "shipment" },
            ]
          });  
    
$('#housetable tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = housetable.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      update_methode3 = 'add';
      $('#myformfinal')[0].reset(); // reset form on modals
      $('#modal_master_final').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function editFinal(id)
    {
      update_methode3 = 'update';
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

    function reloadhouse()
    {
      housetable.ajax.reload(null,false); //reload datatable ajax 
    }

function updateCWTsmu()
    {
      var url_action;
      if(update_methode3 == 'add') 
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



  <br />
    <br />

    <table id="housetable" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th>No</th>  
          <th>HouseNo</th>
          <th>ETD</th>
          <th>Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th><span class="text-center">Status Consol</span></th>
          <th>Shipment Type</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>HouseNo</th>
          <th>ETD</th>
          <th>Destination</th>
          <th>QTY</th>
          <th>CWT</th>
          <th><span class="text-center">Status Consol</span></th>
          <th>Shipment Type</th>
        </tr>
      </tfoot>
    </table>
 
<div class="modal fade" id="modaldetailsmuinhouse" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
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
    
  <script>
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
                url : "<?php echo base_url('transaction/ajax_detailHouse'); ?>",
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
                url : "<?php echo base_url('transaction/ajax_detailSMU'); ?>",
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