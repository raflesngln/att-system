  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
  

  <script type="text/javascript">
  $(function() {
	$("#start2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	$("#end2").datepicker({
		dateFormat:'yy-mm-dd',
		});
	
  });
    var save_method5; //for save method string
    var tableclosed;
 
 $(document).ready(function() {    
    
          tableclosed = $('#tableclosed').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
			"order":[[0,"desc"],[1,"asc"]],
		     
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_house/list_closed')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "HouseNo" },
            { "data": "sender" },
            { "data": "receiver" },
			{ "data": "ori" },
			{ "data": "desti" },
			{ "data": "pcs"},
			{ "data": "cwt"},
            { "data": "action","orderable":false,"visible":true }
            ],
          });  
    
$('#tableclosed tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tableclosed.row(tr);
           // alert(row.data().firstName);
         });
});

function add_person5()
    {
      save_method5 = 'add';
      $('#form_house_closed')[0].reset(); // reset form on modals
      $('#modal_house_closed').modal('show'); // show bootstrap modal
      $('.modal-title5').text('Add Linebusiness');
	  document.getElementById("BankCode2").disabled=false;
    }

function edit_person5(id)
    {
      save_method5 = 'update';
      $('#form_house_closed')[0].reset(); // reset form on modals
        
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
			
            $('#modal_house_closed').modal('show');
            $('.modal-title5').text('Edit Linebusiness');
			document.getElementById("BankCode2").disabled=true;
            
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
    }

    function reload_closed()
    {
      tableclosed.ajax.reload(null,false); //reload datatable ajax 
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
            data: $('#form_house_closed').serialize(),
            dataType: "JSON",
            success: function(data)
            {
               //if success close modal and reload ajax table
               $('#modal_house_closed').modal('hide');
               reload_closed();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
            }
        });
    }

function delete_person5(id)
    {
      if(confirm('Are you sure delete this data? '+ id))
      var nmtabel='outgoing_house';
      var keytabel='HouseNo';
      {
        // ajax delete data to database
          $.ajax({
            url : "<?php echo site_url('outgoing_house/ajax_delete')?>",
            type: "POST",
            data:({cid:id,cnmtabel:nmtabel,ckeytabel:keytabel}),
            dataType: "JSON",
            success: function(data)
            {
               //if success reload ajax table
               $('#modal_house_closed').modal('hide');
               reload_closed();
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
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
                       
          <strong><label class="col-sm-4"> SOA No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> SOA Date</label></strong>
          <div class="col-sm-7">
           <input name="soadate" type="text" class="form-control"  id="soadate" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>"/>
          </div>
           
           
              
          <strong><label class="col-sm-4"> Customers</label></strong>
          <div class="col-sm-7">
           <select name="customers" id="customers" class="form-control" required="required">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>
<strong>
<label class="col-sm-4"> E.T.D Periode</label></strong>
          <div class="col-sm-3">
           <input name="etd1" type="text" class="form-control"  id="etd1" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>"/>
          </div>
     <div class="col-sm-1"><p style="margin-top:10px">/</p></div>
    <div class="col-sm-3">
           <input name="etd2" type="text" class="form-control"  id="etd2" required="required" readonly="readonly" value="<?php echo date("Y-m-d") ;?>" />
       </div>

<div class="clearfix"></div>          
 <strong><label class="col-sm-4"> Currency</label></strong>
          <div class="col-sm-7">
            <select name="currency" id="currency" class="form-control">
              <option value="IDR">IDR</option>
              <option value="USD">USD</option>
            </select>
          </div>

          
      </div>             
      
                       
            
      </div>
   </div>
    <br />
    <br />
    <table id="tableclosed" class="table table-striped table-" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>No</th>  
          <th>House</th>
          <th> Shipper</th>
          <th>Consigne</th>
          <th>Origin</th>
          <th>Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th style="width:50px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>House</th>
          <th>Shipper</th>
          <th>Consigne</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>QTY</th>
          <th>CWT</th>
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


function detailhouseclosed(myid){
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('outgoing_house/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					$("#modalhouseclosed").modal('show'); 
					$('#labelhouseclosed').html(numb);
                   $('#tabledetailhouseclosed').html(data);
                }
            });
	
}
function detailsmuclosed(myid){
	var smu=$(myid).html();
	var status='consol';
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('outgoing_house/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
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
tableclosed.ajax.url('<?php echo site_url()?>outgoing_house/filter_list_closed/'+inputan).load();
	} else {
tableclosed.ajax.url('<?php echo site_url()?>outgoing_house/list_closed').load();		
	}
}

	
}
	
</script>
    