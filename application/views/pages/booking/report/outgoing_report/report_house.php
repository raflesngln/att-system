  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  <link href="<?php echo base_url();?>assets/datatables/css/dataTables.bootstrap.css" rel="stylesheet" />
  
  <link href='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript' src='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>

<script src="<?php echo base_url();?>asset/validation_js/jquery.validate.min.js"></script>

 <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.6/themes/base/jquery-ui.css" type="text/css" media="all" />
 
 
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
 $("#txtshipper").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		       url: "<?php echo base_url();?>index.php/autocomplete_customers/lookup_sender",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
					beforeSend: function(){
          //$('#contenshipper').html(' data loading loading loanding');
					// $(".fa-pulse").show();
         			 },
		          		success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
								
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
					$("#txtshipper").val(ui.item.name); 
				 filterList();
         		},		
    		});
 
          tableclosed = $('#tableclosed').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
			"order":[[0,"desc"],[1,"asc"]],
		     
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('outgoing_report/report_house')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "HouseNo" },
            { "data": "ETD" },
			{ "data": "sender" },
			{ "data": "receiver" },
			{ "data": "ori_desti" },
			{ "data": "pcs"},
			{ "data": "cwt"},
			{ "data": "paycode"},
            { "data": "Amount","orderable":false,"visible":true }
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
<div class="col-sm-6">
<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-bar-chart"></i></div>
     <div class="col-sm-9 col-xs-8"> House Report</div>
</div>
</div>
</div>


<div class="col-sm-5 pull-right" style="margin-right:40px">
<form class="form" method="post" action="<?php echo base_url();?>outgoing_report/print_report_house" target="new">
<div class="row form-inline">
<?php
$kurangtanggal = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
?>
<input name="start2" type="text" class="start form-control" id="start2" readonly="readonly" value="<?php echo $kurangtanggal;?>" onchange="return filterList()" style="width:32%" />
 &nbsp; S/D &nbsp; 
<input class="end form-control" name="end2" type="text" id="end2" readonly="readonly" value="<?php echo date('Y-m-d');?>" onchange="return filterList()"/>

</div><div class="clearfix"></div>

<div class="row">
<div class="form-group">
<div class="col-sm-5">Payment Type</div>
<div class="col-sm-6">
  <select name="methode" id="methode" class="form-control" onchange="return filterList()">
    <option value="">All</option>
    <option value="CSH-CASH">Cash</option>
    <option value="CRD-CREDIT">Credit</option>
  </select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Methode</div>
<div class="col-sm-6">
  <select name="nmtabel" id="nmtabel" class="form-control" onchange="return filterList()">
    <option value="outgoing_house">Outgoing</option>
    <option value="incoming_house">Incoming</option>
  </select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">User</div>
<div class="col-sm-6">
  <select name="user" id="user" class="form-control" onchange="return filterList()">
    <option value="">All</option>
    <?php
foreach($user as $row){
?>
    <option value="<?php echo $row->id_user.'-'.$row->UserName;?>"><?php echo $row->UserName;?></option>
    <?php } ?>
  </select>
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-5">Shipper</div>
<div class="col-sm-6">
  <input name="txtshipper" type="text" class="form-control" id="txtshipper" placeholder="Type search" onkeyup="return filterList()"  onchange="return filterList()">
</div></div><div class="clearfix"></div>

<div class="form-group">
<div class="col-sm-11 text-right"><button type="submit" class="btn btn-purple btn-md"><i class="fa fa-print"></i> Print</button> </div>
</div>


                                                        
</div>


<div class="clearfix"></div>
</form>
</div></div>
    <br />
    <br />
    <table id="tableclosed" class="table table-striped table-" cellspacing="0" width="98%">
      <thead>
        <tr>
          <th>No</th>  
          <th>House</th>
          <th>ETD</th>
          <th> Shipper</th>
          <th>Consigne</th>
          <th>Origin-Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th style="width:50px;">Payment</th>
          <th style="width:50px;">Amount</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>House</th>
          <th>ETD</th>
          <th>Shipper</th>
          <th>Consigne</th>
          <th>Origin-Destination</th>
          <th>QTY</th>
          <th>CWT</th>
          <th><span style="width:50px;">Payment</span></th>
          <th><span style="width:50px;">Amount</span></th>
        </tr>
      </tfoot>
    </table>
  <!-- INFO -->
 <div class="col-sm-12 alert alert-warning green" style="margin-left:-23px; font-style:italic">
<i class="icon-bullhorn green bigger-150">&raquo;</i>
<strong> Report House </strong>
<p>List untuk  menampilkan report house Cash dan credit</li>


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
                url : "<?php echo base_url('outgoing_house/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					swal.close();
					$("#modalhouseclosed").modal('hide'); 
					$("#modaldetailsmuclosed").modal('show'); 
                   $('#tabledetailsmuclosed').html(data);
                }
            });
	
}

function filterList(){
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
	var methode=$("#methode").val();
	var user=$("#user").val();
	var txtsearch=$("#txtshipper").val();
	var nmtabel=$("#nmtabel").val();
	
	var inputan=start2+":"+end2+":"+methode+":"+user+":"+txtsearch+":"+nmtabel;
	
tableclosed.ajax.url('<?php echo site_url()?>outgoing_report/filter_report_house/'+inputan).load();
	
}

	
}
	
</script>
    