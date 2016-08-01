  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  

  <script type="text/javascript">
 function toRp(angka){
  //var angka =document.getElementById("rp").value;
   var rev     = parseFloat(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
   // return 'Rp' + rev2.split('').reverse().join('') + ',00';
    return rev2.split('').reverse().join('');
}

  $(function() {
	$(".start").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$(".end").datepicker({
		dateFormat:'yy-mm-dd',
		});
	
  });
  
    var save_method5; //for save method string
    var list_transaksi;
 $(document).ready(function() {    
    
          list_transaksi = $('#list_transaksi').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
	
			"order":[[1,"desc"],[1,"desc"]],
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('payment/list_journal')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "JurnalNo" },
            { "data": "PaymentDate" },
			{ "data": "nmac"},
			{ "data": "Remarks"},
			{ "data": "Debit","visible":false },
			{ "data": "Credit","visible":false },
			{ "data": "format_Debit" },
			{ "data": "format_Credit" },

            ],
 "footerCallback": function ( row, data, start, end, display ) {
            var api = this.api(), data;
 
            // Remove the formatting to get integer data for summation
            var intVal = function ( i ) {
                return typeof i === 'string' ?
                    i.replace(/[\$,]/g, '')*1 :
                    typeof i === 'number' ?
                        i : 0;
            };
 
            // Total over all pages
            total = api
                .column( 5 )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			            // Total over all pages
            total2 = api
				.column( 6 )
                .data()
                .reduce( function (c, d) {
                    return intVal(c) + intVal(d);
                }, 0 );
 
            // Total over this page
            pageTotal = api
				.column( 5, { page: 'current'} )
                .data()
                .reduce( function (a, b) {
                    return intVal(a) + intVal(b);
                }, 0 );
			            // Total over this page
            pageTotal2 = api
				.column( 6, { page: 'current'} )
                .data()
                .reduce( function (c, d) {
                    return intVal(c) + intVal(d);
                }, 0 );
 
            // Update footer
            $( api.column( 7 ).footer() ).html(
                'Rp '+toRp(pageTotal)+''
            );
			            // Update footer
            $( api.column( 8 ).footer() ).html(
                'Rp '+toRp(pageTotal2) +''
            );
        }
          });  

$('#list_transaksi tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = list_transaksi.row(tr);
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

    function reloadIncome()
    {
      list_transaksi.ajax.reload(null,false); //reload datatable ajax 
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
               reloadIncome();
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
               reloadIncome();
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
     <div class="col-sm-3 col-xs-4"><i class="fa fa-book"></i></div>
     <div class="col-sm-9 col-xs-8">General Journal</div>
</div>
</div>
</div>


<div class="col-sm-5 pull-right" style="margin-right:5px">
<form class="form">
<div class="row form-inline">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-30,date("Y")));
?>
<input name="start4" type="text" class="start form-control" id="start4" readonly="readonly" value="<?php echo $kurangtanggal;?>" onchange="return getFilter2(this)" />
 &nbsp; S/D &nbsp; 
<input class="end form-control" name="end4" type="text" id="end4" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return getFilter2(this)"/>

</div><div class="clearfix"></div>

<div class="row">
<div class="form-group">
<div class="col-sm-5">Filter by Category</div>
<div class="col-sm-6">
<select name="kategori2" id="kategori2" class="form-control" onchange="return getFilter2(this)">
<option value="c.CustName">Customer</option>
<option value="a.JurnalNo">JurnalNo</option>
</select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Criteria</div>
<div class="col-sm-6">
<select name="kriteria2" id="kriteria2" class="form-control" onchange="return getFilter2(this)">
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
<input name="txtsearch22" type="text" class="form-control" id="txtsearch2" placeholder="Type search" onkeyup="return getFilter2(this)">
<i class="icon-search"></i></span></label>

</div>


                                                        
</div>


<div class="clearfix"></div>
</form>
</div>
</div>

    <br />
  <div class="clearfix"></div>

    <table id="list_transaksi" class="table table-responsive table-striped table-bordered" cellspacing="0" width="98%">
      <thead>
        <tr>
          <th width="5%" >No</th>
          <th width="9%" >No. Jurnal</th>
          <th width="10%" >Date</th>
          <th width="22%" >Account</th>
          <th width="27%" >Remarks</th>
          <th width="2%" >&nbsp;</th>
          <th width="2%" >&nbsp;</th>
          <th width="14%" >Debit</th>
          <th width="9%" >Credit</th>
        </tr>
      </thead>
      <tbody>

      </tbody>

      <tfoot>
        <tr>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>&nbsp;</th>
          <th>Debit</th>
          <th>Credit</th>
        </tr>
      </tfoot>
    </table>

   <div class="clearfix"></div>
  <!-- INFO --><br />
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px;font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> List of Payment </strong>
<p>List untuk menampilkan history   Transaksi pembayaran oleh customers ( INCOME )</p>


</div>
 <!-- end info -->   
 <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_transaksi" role="dialog">
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
  <div class="modal fade" id="modaldetailtransaksi" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"> Detail Payment</h3>
      </div>
      <div class="modal-body form">
      <div id="tabledetailincome">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
  
 <div class="modal fade" id="modaldetailtrans" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 class="modal-title"> Detail Payment House</h3>
      </div>
      <div class="modal-body form">
      <div id="tablepaymenthouse">
                     Detail

        </div>
        
      </div>
        
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div>
  <!-- /.modal --> 
  
  
  <script type="text/javascript">
	
function detailHousePayment2(myid){
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
					$("#modaldetailtrans").modal('show'); 
                   $('#tablepaymenthouse').html(data);
                }
            });
}
function detailPayment2(myid){
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
					$("#modaldetailtransaksi").modal('show'); 
					//$("#modaldetailtrans").css("z-index","1");
					//$("#modaldetailtransaksi").css("z-index","100");
                   $('#tabledetailincome').html(data);
                }
       });
}
function getFilter2(inputan){
	var tg1=$("#start4").val();
	var tg2=$("#end4").val();
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
		
	var start4=$("#start4").val();
	var end4=$("#end4").val();
	var kategori2=$("#kategori2").val();
	var kriteria2=$("#kriteria2").val();
	var txtsearch2=$("#txtsearch2").val();
	
	var inputan=start4+"_"+end4+"_"+kategori2+"_"+kriteria2+"_"+txtsearch2;
	
	if(txtsearch2 !=''){
list_transaksi.ajax.url('<?php echo site_url()?>payment/filter_income/'+inputan).load();
	} else {
list_transaksi.ajax.url('<?php echo site_url()?>payment/list_income').load();		
	}
}

	
}
</script>
    