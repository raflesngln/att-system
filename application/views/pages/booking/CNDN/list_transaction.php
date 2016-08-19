  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
  

  <script type="text/javascript">

    var save_method5; //for save method string
    var table_list;
 
 $(document).ready(function() {    
    
          table_list = $('#table_list').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
			"order":[[0,"desc"],[1,"asc"]],
		     
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('cndn/list_cndn')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "NoteDate" },
            { "data": "NoteJob" },
            { "data": "ChargeName" },
			{ "data": "Qty" },
			{ "data": "Price" },
			{ "data": "Subtotal" },
            { "data": "status","orderable":false,"visible":true }
            ],
          });  
    
$('#table_list tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = table_list.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#form_list')[0].reset(); // reset form on modals
      $('#modal_house_closed').modal('show'); // show bootstrap modal
      $('.modal-title5').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function edit_deposito(id)
    {
      save_method5 = 'update';
      $('#form_edit')[0].reset(); // reset form on modals
        
      var nmtabel='topup_deposito';
      var keytabel='TopupId';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('payment/edit_deposito/')?>",
        type: "POST",
        data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
        dataType: "JSON",
        success: function(data)
        {
            $('[name="TopupId"]').val(data.TopupId);
			 $('[name="CustCode"]').val(data.CustCode);
			$('[name="TopupAmount"]').val(data.TopupAmount);
            $('[name="Remarks"]').val(data.Remarks); 
			
            $('#modal_edit').modal('show');
			//document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_list()
    {
      table_list.ajax.reload(null,false); //reload datatable ajax 
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
            data: $('#form_list').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_house_closed').modal('hide');
               reload_list();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_deposito(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='topup_deposito';
      var keytabel='TopupId';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('payment/delete_deposito')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_house_closed').modal('hide');
               reload_list();
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
     <div class="col-sm-3 col-xs-4"><i class="fa fa-rss"></i></div>
     <div class="col-sm-9 col-xs-8">History CN / DN </div>
</div>
</div>
</div>


<div class="col-sm-5 pull-right" style="margin-right:40px">
<form class="form">
<div class="row form-inline">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
<input name="start2" type="text" class="start form-control" id="start2" readonly="readonly" value="<?php echo $kurangtanggal;?>" onchange="return getNilai(this)" style="width:32%" />
 &nbsp; S/D &nbsp; 
<input class="end form-control" name="end2" type="text" id="end2" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return getNilai(this)"/>

</div><div class="clearfix"></div>

<div class="row">
<div class="form-group">
<div class="col-sm-5">Filter by Category</div>
<div class="col-sm-6">
<select name="kategori" id="kategori" class="form-control" onchange="return getNilai(this)">
<option value="b.CustName">Customer</option>
</select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Criteria</div>
<div class="col-sm-6">
<select name="kriteria" id="kriteria" class="form-control" onchange="return getNilai(this)">
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
<input name="txtsearch" type="text" class="form-control" id="txtsearch" placeholder="Type search" onkeyup="return getNilai(this)">
<i class="icon-search"></i></span></label>

</div>


                                                        
</div>


<div class="clearfix"></div>
</form>
</div></div>
    <br />
    <br />
    <table id="table_list" class="table table-striped table-" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="20">No</th>  
          <th width="72">Date</th>
          <th width="120">House</th>
          <th width="185">CostName</th>
          <th width="53"> Qty</th>
          <th width="49" style="width:50px;">Price</th>
          <th width="60" style="width:50px;">SubTotal</th>
          <th width="52" style="width:50px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>Date</th>
          <th>House</th>
          <th>CostName</th>
          <th>Qty</th>
          <th><span style="width:50px;">Price</span></th>
          <th><span style="width:50px;">SubTotal</span></th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>
  <!-- INFO -->
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px; font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Closed House </strong>
<p>List ini untuk menampilkan House-House yang Telah selesai diproses atau di konsol.</p>
<li>List house yg belum masuk kedalam daftar <strong>RELEASE</strong> masih bisa consol ulang dengan mengeluarkanya atau hapus dari daftar SMU yg dikonsolkan</li>


</div>
 <!-- end info -->
            
 <!-- MODAL -->
   <!-- Bootstrap modal -->
 <div class="modal fade" id="modaldetailsmuclosed" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title">Form Detail SMU</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailsmuclosed">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
      
 
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


<!-- modal edit -->
<div class="modal fade" id="modal_edit" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title2">Edit Transaction</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form_edit" class="form-horizontal">
          <input name="TopupId" type="hidden" id="TopupId" value=""/> 
          <div class="form-body">
            <div class="form-group">
              <label class="control-label col-md-3"> CustCode</label>
              <div class="col-md-9">
                <input name="CustCode" type="text" class="form-control nama" id="CustCode" placeholder="Name" value="" />
              </div>
            </div>
 <div class="form-group">
              <label class="control-label col-md-3"> TopupAmount</label>
              <div class="col-md-9">
                <input name="TopupAmount" type="text" class="form-control nama" id="TopupAmount" placeholder="Name" value="" />
              </div>
            </div>
 <div class="form-group">
              <label class="control-label col-md-3">Remarks</label>
              <div class="col-md-9">
                <textarea name="Remarks" placeholder="decription"class="form-control" id="Remarks"></textarea>
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
    </div>

<!-- end of MODAL -->
  
  
  <script type="text/javascript">
	
	 $(".dethouse").click(function(){
          var nomor=$(this).html();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/detail_incoming_house'); ?>",
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
                url : "<?php echo base_url('transaction/search_incoming_house'); ?>",
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
                url : "<?php echo base_url('transaction/search_incoming_house'); ?>",
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
                url : "<?php echo base_url('transaction/periode_incoming_house');?>",
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


function detailhouseclosed(myid){
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
                url : "<?php echo base_url('incoming_house/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					swal.close();
					$("#modalhouseclosed").modal('show'); 
					$('#labelhouseclosed').html(numb);
                   $('#tabledetailhouseclosed').html(data);
                }
            });
	
}
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
                url : "<?php echo base_url('incoming_house/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					swal.close();
					$("#modalhouseclosed").modal('hide'); 
					$("#modaldetailsmuclosed").modal('show'); 
                   $('#tabledetailsmuclosed').html(data);
                }
            });
	
}

function getNilai(inputan){
	var tg1=$("#start2").val();
	var tg2=$("#end2").val();
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
		
	var start2=$("#start2").val();
	var end2=$("#end2").val();
	var kategori=$("#kategori").val();
	var kriteria=$("#kriteria").val();
	var txtsearch=$("#txtsearch").val();
	
	var inputan=start2+"_"+end2+"_"+kategori+"_"+kriteria+"_"+txtsearch;

	if(txtsearch !=''){
table_list.ajax.url('<?php echo site_url()?>payment/filter_list_trans_deposito/'+inputan).load();
	} else {
table_list.ajax.url('<?php echo site_url()?>payment/list_trans_deposito').load();		
	}
}

	
}
	
</script>
    