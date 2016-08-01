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
    var list_tabel;
 
 $(document).ready(function() {    
    
          list_tabel = $('#list_tabel').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
	
			"order":[[9,"asc"],[9,"asc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('payment/list_payment')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "JurnalNo","orderable":false,"visible":false },
			{ "data": "MasterNo" },
			{ "data": "House" },
            { "data": "PayDate" },
            { "data": "CustName"},
			{ "data": "Currency"},
			{ "data": "Amount"},
			{ "data": "PaymentValue" },
			{ "data": "Balance"},
			{ "data": "status" },
			{ "data": "print" },
            ]
          });  
    
$('#list_tabel tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = list_tabel.row(tr);
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
        
      var nmtabel='payment_house';
      var keytabel='NoSMU';
        
      //Ajax Load data from ajax
      $.ajax({
        url : "<?php echo site_url('payment/ajax_edit/')?>",
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

    function reloadPayment()
    {
      list_tabel.ajax.reload(null,false); //reload datatable ajax 
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
               reloadPayment();
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
      var nmtabel='payment_house';
      var keytabel='NoSMU';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('payment/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_closed').modal('hide');
               reloadPayment();
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
     <div class="col-sm-9 col-xs-8">Payment by House</div>
</div>
</div>
</div>


<div class="col-sm-5 pull-right" style="margin-right:5px">
<form class="form">
<div class="row form-inline">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-30,date("Y")));
?>
<input name="start3" type="text" class="start form-control" id="start3" readonly="readonly" value="<?php echo $kurangtanggal;?>" onchange="return getFilter(this)" />
 &nbsp; S/D &nbsp; 
<input class="end form-control" name="end3" type="text" id="end3" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return getFilter(this)"/>

</div><div class="clearfix"></div>

<div class="row">
<div class="form-group">
<div class="col-sm-5">Filter by Category</div>
<div class="col-sm-6">
<select name="kategori" id="kategori" class="form-control" onchange="return getFilter(this)">
<option value="c.CustName">Customer</option>
<option value="b.House">House</option>
<option value="e.MasterNo">Master </option>
<option value="a.JurnalNo">JurnalNo</option>
</select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Criteria</div>
<div class="col-sm-6">
<select name="kriteria" id="kriteria" class="form-control" onchange="return getFilter(this)">
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
<input name="txtsearch" type="text" class="form-control" id="txtsearch" placeholder="Type search" onkeyup="return getFilter(this)">
<i class="icon-search"></i></span></label>

</div>


                                                        
</div>


<div class="clearfix"></div>
</form>
</div>
</div>

    <br />
  <div class="clearfix"></div>

    <table id="list_tabel" class="table table-responsive table-striped table-bordered" cellspacing="0" width="98%">
      <thead>
        <tr>
          <th width="2%" >No</th>
          <th width="11%" >No. Jurnal</th>
          <th width="11%" >MasterNo</th>  
          <th width="11%" >House</th>
          <th width="11%" >Date</th>
          <th width="39%" >Customers</th>
          <th width="9%" >Currency</th>
          <th width="9%" >Amount</th>
          <th width="9%" >Pay</th>
          <th width="14%">Balance</th>
          <th width="14%">Status</th>
          <th width="14%">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>No. Jurnal</th>
          <th>MasterNo</th>
          <th>House</th>
          <th>Date</th>
          <th>Customers</th>
          <th>Currency</th>
          <th>Amount</th>
          <th>Pay</th>
          <th>Balance</th>
          <th>Status</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>

   <div class="clearfix"></div>
  <!-- INFO --><br />
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px;font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Payment </strong>
<p>List untuk menampilkan Jurnal pembayaran terhadap House</p>


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
  <div class="modal fade" id="modaldetailpayment" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"> Detail Payment</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailpayment">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div class="modal fade" id="modalpaymenthouse" role="dialog" >
  <div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header" >
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"> Detail Payment Transaction</h3>
      </div>
      <div class="modal-body form">
      <div id="tablepaymenthouse" style="overflow:scroll; height:520px">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- /.modal --> 
  
  
  <script type="text/javascript">
	
function detailHousePayment(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		html:true
		});
	var house=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('payment/ajax_detailHousePayment'); ?>",
                data: "house="+house,
                success: function(data){
					swal.close();
					$("#modalpaymenthouse").modal('show'); 
                   $('#tablepaymenthouse').html(data);
                }
            });
}
function detailPayment(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		html:true
		});
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('payment/ajax_detailPayment'); ?>",
                data: "numb="+numb,
                success: function(data){
					swal.close();
					$("#modaldetailpayment").modal('show'); 
					$("#modalpaymenthouse").css("z-index","1");
					$("#modaldetailpayment").css("z-index","100");
                   $('#tabledetailpayment').html(data);
                }
            });
}
function getFilter(inputan){
	var tg1=$("#start3").val();
	var tg2=$("#end3").val();
	var pisah1=tg1.split('-');
	var pisah2=tg2.split('-');
	var obj_tgl=new Date();
	
	var tgl1_leave=obj_tgl.setFullYear(pisah1[0],pisah1[1],pisah1[2]);
	var tgl2_leave=obj_tgl.setFullYear(pisah2[0],pisah2[1],pisah2[2]);
	var hasil=(tgl2_leave-tgl1_leave)/(60*60*24*1000);
	
	if(hasil >=32 || hasil < 0){
		
		alert('Jumlah Rentang waktu Pencarian Maksimal 30 Hari !');
		return false;
	} else {
		
	var start3=$("#start3").val();
	var end3=$("#end3").val();
	var kategori=$("#kategori").val();
	var kriteria=$("#kriteria").val();
	var txtsearch=$("#txtsearch").val();
	
	var inputan=start3+"_"+end3+"_"+kategori+"_"+kriteria+"_"+txtsearch;
	
	if(txtsearch !=''){
list_tabel.ajax.url('<?php echo site_url()?>payment/filter_payment/'+inputan).load();
	} else {
list_tabel.ajax.url('<?php echo site_url()?>payment/list_payment').load();		
	}
}

	
}
</script>
    