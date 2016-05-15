	  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
      <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
      
      <script type="text/javascript">
    
        var update_methode2; //for save method string
        var tabelcargolist;
     
     $(document).ready(function() {    
        
              tabelcargolist = $('#tabelcargolist').DataTable({ 
                "processing": true, //Feature control the processing indicator.
                "bInfo": false,
                "serverSide": true, //Feature control DataTables' server-side processing mode
                // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('cargo_release/listcargo')?>",
                    "type": "POST"
                },
                "columns": [
                { "data": "no" ,"orderable":false,"visible":true},
                { "data": "CargoReleaseCode" },
                { "data": "FlightNo" },
                { "data": "AirLineName" },
                { "data": "CargoDetails","orderable":false,"visible":true },
                { "data": "PCS","orderable":false,"visible":true },
                { "data": "CWT","orderable":false,"visible":true  },
                { "data": "action","orderable":false,"visible":true  },
    
                ]
              });  
        
    $('#tabelcargolist tbody').on('dblclick', 'tr', function () {
                var tr = $(this).closest('tr');
                var row = tabelcargolist.row(tr);
               // alert(row.data().firstName);
             });
    });
    
    function add_person5()
        {
          update_methode2 = 'add';
          $('#myformcargo')[0].reset(); // reset form on modals
          $('#modal_master_cargo').modal('show'); // show bootstrap modal
          $('.modal-title').text('Add Linebusiness');
          document.getElementById("BankCode2").disabled=false;
        }
    
    function editFinal(id)
        {
          update_methode2 = 'update';
          $('#myformcargo')[0].reset(); // reset form on modals
            
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
                
                
                $('#modal_master_cargo').modal('show');
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
          tabelcargolist.ajax.reload(null,false); //reload datatable ajax 
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
                data: $('#myformcargo').serialize(),
                dataType: "JSON",
                success: function(data)
                {
                   //if success close modal and reload ajax table
                   $('#modal_master_cargo').modal('hide');
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
                   $('#modal_master_cargo').modal('hide');
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
    
        <table id="tabelcargolist" class="table table-striped table-bordered" cellspacing="0" width="97%">
          <thead>
            <tr>
              <th>No</th>  
              <th>Cargo No</th>
              <th>Flight</th>
              <th>Airline</th>
              <th>Detail</th>
              <th>PCS</th>
              <th>CWT</th>
              <th><span style="width:125px;">Action</span></th>
            </tr>
          </thead>
          <tbody>
          </tbody>
    
          <tfoot>
            <tr style="visibility:hidden">
              <th>No</th>
              <th>Cargo No</th>
              <th>Flight</th>
              <th>Airline</th>
              <th>Detail</th>
              <th>PCS</th>
              <th>CWT</th>
              <th><span style="width:125px;">Action</span></th>
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
              <input name="CargoReleaseCode" type="hidden" id="id" value=""/> 
              <div class="form-body">
    
                <div class="form-group">
                  <label class="control-label col-md-3"> CWT</label>
                  <div class="col-md-9">
                    <input name="cwt" type="text" class="form-control nama" id="cwt" placeholder="Name" value="" />
                  </div>
                </div>
    
                <div class="form-group">
                  <label class="control-label col-md-3">Address</label>
                  <div class="col-md-9">
                    <textarea name="CargoDetails" placeholder="decription"class="form-control" id="CargoDetails"></textarea>
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
        
        
        <div class="modal fade" id="modal_cargo" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title5">Detail Cargo</h3>
          </div>
          <div class="modal-body form">
            <div class="detailrelease" id="detailrelease">details</div>
          </div>
              <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div>
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_master_cargo" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="myformcargo" class="form-horizontal">
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
  
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modaldetailsmucargo" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailcargo">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div id="modalhousecargo" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhousecargo">
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
     function listcargo(myid){
        var cargocode=$(myid).html();	
        
                $.ajax({
                    type: "POST",
                    url : "<?php echo base_url('cargo_release/detail_list_cargo'); ?>",
                     data: "cargocode="+cargocode,
                    cache:false,
                    success: function(data){
                        $("#modal_cargo").modal('show');
                        $('#detailrelease').html(data);
                        //document.frm.add.disabled=false;
                    }
                });
        
    }
function detailsmucargo(myid){
	var smu=$(myid).html();
	var status='consol';
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('cargo_release/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					$("#modaldetailsmucargo").modal('show'); 
                   $('#tabledetailcargo').html(data);
                }
            });
	
}
function detailhouseconsol(myid){
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('cargo_release/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					$("#modalhousecargo").modal('show'); 
					$('#labelhousecargo').html(numb);
                   $('#tabledetailhousecargo').html(data);
                }
            });
	
}

     </script>