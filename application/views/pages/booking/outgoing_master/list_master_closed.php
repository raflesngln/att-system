  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
  <script type="text/javascript">
  $(function() {
	$(".start").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$(".end").datepicker({
		dateFormat:'yy-mm-dd',
		});
	
  });
    var save_method5; //for save method string
    var table_closed;
 
 $(document).ready(function() {    
    
          table_closed = $('#table_closed').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
			"order":[[1,"desc"],[9,"desc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_master/list_closed')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "NoSMU" },
			{ "data": "ETD" },
            { "data": "sender" },
            { "data": "receiver","orderable":false,"visible":true },
			{ "data": "ori","orderable":false,"visible":true },
			{ "data": "desti" },
			{ "data": "pcs","orderable":false,"visible":true },
			{ "data": "cwt","orderable":false,"visible":true },
			{ "data": "FinalCWT","orderable":false,"visible":true },
            ]
          });  
    
$('#table_closed tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = table_closed.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#form_closed')[0].reset(); // reset form on modals
      $('#modal_closed').modal('show'); // show bootstrap modal
      $('.modal-title5').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function edit_closed(id)
    {
      save_method5 = 'update';
      $('#form_closed')[0].reset(); // reset form on modals
        
      var nmtabel='outgoing_master';
      var keytabel='NoSMU';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('Outgoing_master/ajax_edit/')?>",
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
			
			
            $('#modal_closed').modal('show');
            $('.modal-title5').text('Edit CWT Final');
			document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reloadClosedsmu()
    {
      table_closed.ajax.reload(null,false); //reload datatable ajax 
    }

function update_cwt_closed()
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
            data: $('#form_closed').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_closed').modal('hide');
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
               $('#modal_closed').modal('hide');
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


<div class="row">
<div class="col-sm-6">
<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-th-list"></i></div>
     <div class="col-sm-9 col-xs-8">List of Closed Master</div>
</div>
</div>
</div>


<div class="col-sm-5 pull-right" style="margin-right:40px">
<form class="form">
<div class="row form-inline">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
<input name="start3" type="text" class="start form-control" id="start3" readonly="readonly" value="<?php echo $kurangtanggal;?>" onchange="return getNilai3(this)" />
 &nbsp; S/D &nbsp; 
<input class="end form-control" name="end3" type="text" id="end3" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return getNilai3(this)"/>

</div><div class="clearfix"></div>

<div class="row">
<div class="form-group">
<div class="col-sm-5">Filter by Category</div>
<div class="col-sm-6">
<select name="kategori3" id="kategori3" class="form-control" onchange="return getNilai3(this)">
<option value="b.CustName">Shipper</option>
<option value="c.CustName">Consigne</option>
<option value="a.NoSMU">SMU</option>
<option value="d.PortName">Origin</option>
<option value="e.PortName">Destination</option>
</select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Criteria</div>
<div class="col-sm-6">
<select name="kriteria3" id="kriteria3" class="form-control" onchange="return getNilai3(this)">
<option value="startwith">Start With</option>
<option value="endwith">End With</option>
<option value="equals">Equals</option>
<option value="notequals">Not Equals</option>
<option value="contains">Contains</option>
<option value="notcontains">Not Contains</option>
</select>
</div></div><div class="clearfix"></div>

<div class="form-group">

<label class="col-sm-11"><span class="block input-icon input-icon-right">
<input name="txtsearch3" type="text" class="form-control" id="txtsearch3" placeholder="Type search" onkeyup="return getNilai3(this)">
<i class="icon-search"></i></span></label>

</div>


                                                        
</div>


<div class="clearfix"></div>
</form>
</div></div>
    <br />
    <br />
    <table id="table_closed" class="table table-striped table-bordered" cellspacing="0" width="98%">
      <thead>
        <tr>
          <th>No</th>  
          <th>SMU</th>
          <th>ETD</th>
          <th> Shipper</th>
          <th>Consignee</th>
          <th>Origin</th>
          <th>Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th style="width:50px;">Final CWT</th>
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
          <th><span>QTY</span></th>
          <th><span>CWT</span></th>
          <th> Final CWT</th>
        </tr>
      </tfoot>
    </table>
  
  
   <div class="clearfix"></div>
  <!-- INFO --><br />
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px;font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Closed SMU </strong>
<p>List ini untuk menampilkan SMU yang telah dikonsol dan sudah di<strong> RELEASE</strong> dan juga sudah di <strong>Final CWT</strong></p>
<li>List Closed SMU menampilkan semua SMU yg telah selesai dalam tahap Proses</li>


</div>
 <!-- end info -->   
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_master_closed" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="myformclosed" class="form-horizontal">
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
  <div class="modal fade" id="modaldetailsmuclosed" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailclosed">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div id="modalhouseclosed" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhouseclosed">
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
	
	 $("#txtsearch333").keyup(function(){
            var txtsearch3 = $('#txtsearch3').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_outgoing_house'); ?>",
                data: "txtsearch3="+txtsearch3,
                success: function(data){
                   $('#table_connote').html(data);
                }
            });
        });
$("#btnsearch").click(function(){
            var txtsearch3 = $('#txtsearch3').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_outgoing_house'); ?>",
                data: "txtsearch3="+txtsearch3,
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
function FilterMasterClosed(){
    var status=$("#status").val();
	var status2=$("#status2").val();
	var start=$("#start").val();
	var end=$("#end").val();
	$.ajax({
    type: "POST",
    url : "<?php echo base_url('outgoing_master/filter_closed'); ?>",
    data: "status="+status+"&status2="+status2+"&start="+start+"&end="+end,
     success: function(data){
     $('#divfinal').html(data);
         }
    });
}
$("#status").change(function(e) {
    var filter=$("#status").val();
	if(filter=='all'){
		//$("#status2 option").remove();
		document.getElementById("status2").selectedIndex = "0";
	} else {
			$.ajax({
            type: "POST",
            url : "<?php echo base_url('outgoing_master/getStatus'); ?>",
           data: "filter="+filter,
           success: function(data){
           $('#status2').html(data);
            }
       });
	}
});	
function detailsmuclosed(myid){
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
					$("#modaldetailsmuclosed").modal('show'); 
                   $('#tabledetailclosed').html(data);
				   swal.close();
                }
            });
	
}
function detailhouseclosed(myid){
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('outgoing_master/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					$("#modalhouseclosed").modal('show'); 
					$('#labelhouseclosed').html(numb);
                   $('#tabledetailhouseclosed').html(data);
                }
            });
	
}
function getNilai3(inputan){
	var tg1=$("#start3").val();
	var tg2=$("#end3").val();
	var pisah1=tg1.split('-');
	var pisah2=tg2.split('-');
	var obj_tgl=new Date();
	
	var tgl1_leave=obj_tgl.setFullYear(pisah1[0],pisah1[1],pisah1[2]);
	var tgl2_leave=obj_tgl.setFullYear(pisah2[0],pisah2[1],pisah2[2]);
	var hasil=(tgl2_leave-tgl1_leave)/(60*60*24*1000);
	
	if(hasil >=8 || hasil < 0){
		
		alert('Jumlah Rentang waktu Pencarian Maksimal 7 Hari !');
		return false;
	} else {
		
	var start3=$("#start3").val();
	var end3=$("#end3").val();
	var kategori3=$("#kategori3").val();
	var kriteria3=$("#kriteria3").val();
	var txtsearch3=$("#txtsearch3").val();
	
	var inputan=start3+"_"+end3+"_"+kategori3+"_"+kriteria3+"_"+txtsearch3;

	if(txtsearch3 !=''){
table_closed.ajax.url('<?php echo site_url()?>outgoing_master/filterclosedsmu/'+inputan).load();
	} else {
table_closed.ajax.url('<?php echo site_url()?>outgoing_master/list_closed').load();		
	}
}

	
}
</script>
    