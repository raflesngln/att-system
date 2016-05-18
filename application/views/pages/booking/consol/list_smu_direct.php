  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">

    var update_methode2; //for save method string
    var smutabeldirect;
 
 $(document).ready(function() {    
    
          smutabeldirect = $('#smutabeldirect').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"order":[[6,"desc"],[2,"desc"],[1,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('consol/list_smu_direct')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" ,"orderable":false,"visible":true},
            { "data": "NoSMU" },
			{ "data": "ETD" },
            { "data": "desti" },
            { "data": "CWT","orderable":false,"visible":true },
			{ "data": "CWT","orderable":false,"visible":true },
			{ "data": "status" },

            ]
          });  
    
$('#smutabeldirect tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = smutabeldirect.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      update_methode2 = 'add';
      $('#myformfinal')[0].reset(); // reset form on modals
      $('#modal_master_final').modal('show'); // show bootstrap modal
      $('.modal-title').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function editFinal(id)
    {
      update_methode2 = 'update';
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

    function reloadsmudirect()
    {
      smutabeldirect.ajax.reload(null,false); //reload datatable ajax 
    }

function updateCWTsmu()
    {
      var url_action;
      if(update_methode2 == 'add') 
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

    <table id="smutabeldirect" class="table table-striped table-bordered" cellspacing="0" width="97%">
      <thead>
        <tr>
          <th>No</th>  
          <th>SMU</th>
          <th>ETD</th>
          <th>Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th><span class="text-center">Status Consol</span></th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>SMU</th>
          <th>ETD</th>
          <th>Destination</th>
          <th>QTY</th>
          <th>CWT</th>
          <th><span class="text-center">Status Consol</span></th>
        </tr>
      </tfoot>
    </table>
       
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modaldetaildirect" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetaildirect">
                     detail

        </div>
        
      </div>
          
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div id="modalhousedirect" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhousedirect">
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
  <script type="text/javascript">
function detailsmu2(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var smu=$(myid).html();
	var status='direct';
	
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					swal.close();
					$("#modaldetaildirect").modal('show'); 
                   $('#tabledetaildirect').html(data);
                }
            });
}
function removedirect(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var house=$(myid).val();
     var smu=$("#idmaster").val();
	 var x=confirm('Are you sure Remove house ?');
	 if(x==true){
		 
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/remove_house_direct'); ?>",
                data: "house="+house+"&smu="+smu,
                success: function(data){
					swal.close();
					reloadsmudirect();
					$("#modaldetaildirect").modal('hide'); 
                  // $('#tabledetaildirect').html(data);
                }
            });
	 } else {
	 alert('Action Canceled !');
	 }
}
function detailhousedirect(myid){
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
					$("#modalhousedirect").modal('show'); 
					$('#labelhousedirect').html(numb);
                   $('#tabledetailhousedirect').html(data);
                }
            });
	
}
</script>
    