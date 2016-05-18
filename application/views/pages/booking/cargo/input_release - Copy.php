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
    var tableaddrelease;
 
 $(document).ready(function() {    
    
          tableaddrelease = $('#tableaddrelease').DataTable({ 
            "processing": true, //Feature control the processing indicator.
			"bInfo": false,
			"bFilter":false,
			"order":[[0,"desc"],[1,"asc"]],
		     
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('cargo_release/get_smu')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no","orderable":false,"visible":true },
            { "data": "FlightNo" },
            { "data": "ETD" },
            { "data": "ori" },
			{ "data": "desti" },
			{ "data": "PCS" },
			{ "data": "CWT"},
            { "data": "action","orderable":false,"visible":true }
            ],
          });  
    
$('#tableaddrelease tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tableaddrelease.row(tr);
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
      tableaddrelease.ajax.reload(null,false); //reload datatable ajax 
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
    
<form action="<?php echo base_url();?>transaction/save_chargo_manifest" method="post" enctype="multipart/form-data" autocomplete="off" name="formcargo[0]" id="formcargo" onSubmit="return cek_checked();">

  <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12">
<h2><i class="fa fa-plus bigger-110"></i> Create Rffelease</h2></label> 
<div class="clearfx">&nbsp;</div>         
 
 <div class="form-group">
        <label class="col-sm-11"> No Cargo Release</label></strong>
          <div class="col-sm-11">
           <input name="noconote" type="text" class="form-control"  id="name" placeholder="generated by system" readonly style="width:180px"/>
          </div>
</div>
 <div class="form-group">
          <strong><label class="col-sm-11"> Date</label></strong>
          <div class="col-sm-11">
            <input name="tgl3" type="text" class="form-control"  id="tgl3" required value="<?php echo date("Y-m-d") ;?>" readonly style="width:180px;"/>
          </div>
</div>
<div class="form-group">
          <label class="col-sm-11">Air Lines</label></strong>
          <div class="col-sm-11"><span class="col-sm-7">
            <select name="airlines" id="airlines" class="form-control" required="required">
            <option value="">Select Airlines</option>
        <?php 
		foreach($airline as $air){
		?>
          <option value="<?php echo $air->AirLineCode;?>"><?php echo $air->AirLineName;?></option>    
	<?php } ?>
            </select>
          </span></div>
</div>
 
 

          

<!-- end of sender -->

<div class="col-sm-12" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
  </div>
<!--RIGHT INPUT-->
 <div class="col-sm-5" style="border:1px #CCC solid;box-shadow:2px 3px 8px #CCC; margin-right:5px; display:none">
 
<table width="200" border="0" class="table table-stripped" id="tblcargo">
  <tr>
    <td colspan="5"><h3>List SMU</h3></td>
    </tr>
  <tr style="background:#eee; color:#2283C5">
    <td>Smu</td>
    <td>Destination</td>
    <td>PCS</td>
    <td>CWT</td>
    <td>Action</td>
  </tr>
  
<tbody>


</tbody>
</table>

 
 </div>  
   
<!--RIGHT INPUT-->  
  <!--RIGHT INPUT--><br style="clear:both;margin-bottom:40px;">
                                

<table id="tableaddrelease" class="table table-striped table-" cellspacing="0" width="95%">
      <thead>
        <tr>
          <th>No</th>  
          <th>Flight</th>
          <th>ETD</th>
          <th>Origin</th>
          <th>Destination</th>
          <th style="width:50px;">QTY</th>
          <th style="width:50px;">CWT</th>
          <th style="width:50px;"><input type="checkbox" name="checkall" id="checkall" onClick="return Checkall()" value="Check all" style="margin-top:-17px"></th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr style="visibility:hidden">
          <th>No</th>
          <th>Flight</th>
          <th>ETD</th>
          <th>Origin</th>
          <th>Destination</th>
          <th>QTY</th>
          <th>CWT</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>

  <!-- END RIGHT INPUT -->
<div class="row">
 <div class="col-sm-8">
         <div class="form-group">
         <div class="col-sm-4">Submitted By</div>
          <div class="col-sm-7">
            <input name="created" type="text" class="form-control" id="created" size="" value="<?php echo $this->session->userdata('nameusr');?>" readonly>
          </div>
         </div>
         <div class="form-group">
         <div class="col-sm-4">Carried By</div>
          <div class="col-sm-7">
            <input name="carry" type="text" class="form-control" id="carry" required>
          </div>
         </div>
         <div class="form-group">
         <div class="col-sm-4">Received By</div>
          <div class="col-sm-7">
            <input name="receive" type="text" class="form-control" id="receive"  required>
          </div>
         </div>
  <div class="form-group">
          <label class="col-sm-4"> Remarks</label>
          <div class="col-sm-7">
            <textarea name="details" id="details" class="form-control"></textarea>
          </div>
</div>
 </div>  
</div>

                                    
  
                  </div>
  
                                    
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>

  
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger " href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary" type="submit"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
                                        </div>  </div>     
              </div>
          </div>
  </div>

</form>
      
      
    <!--adding form-->

<div id="modalcargo" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail </small> Flight</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="tabledetailhouse">
                        <table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>House</th>  
          <th>Shipper</th>
          <th> PCS</th>
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
<!--adding form-->
<div id="modalhouse" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail </small> House</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                   
                        <div id="divhouse">
                        <table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>House</th>  
          <th>Shipper</th>
          <th> PCS</th>
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

$("#flightnumber").change(function(){
	var etd=$("#tgl3").val();
	var flihgtno=$("#flightnumber").val();
		 $.ajax({
         type: "POST",
         url : "<?php echo base_url('transaction/filter_release'); ?>",
         data: "etd="+etd+"&flihgtno="+flihgtno,
		 success: function(data){
		 $('#contenrelease').html(data);
            }
          
	   });
	
});
$("#airlines").change(function(){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var airlines=$("#airlines").val();
		 $.ajax({
         type: "POST",
         url : "<?php echo base_url('transaction/filter_flight'); ?>",
         data: "airlines="+airlines,
		 success: function(data){
		 console.log(data);
		 $('#divflight').html(data);
            }
	   }).done(function(data){
   			swal.close();
  		});

});

<!-- hapus item dan kurangi total items pack
function move_consol(myid){
var input = $(myid).val();

		var pecah=input.split('/');
		var smu=pecah[0];
		var desti=pecah[1];
		var pcs=pecah[2];
		var cwt=pecah[3];
		
	if(cwt<=0){
	alert('SMU is Empty, Please Consol house to SMU/Master before !');	
	} else {

	text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="smu[]" id="idcharge[]" value="'+ smu +'">'+ '<label id="l_pcs">'+ smu +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="desti[]" id="l[]" value="'+ desti +'">'+ '<label id="l_pcs">'+ desti +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="pcs[]" id="t[]" value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="cwt[]" id="p[]"  value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + input +'" onclick="replace_consol(this)" type="button">X</button></td>'

    + '</tr>';
	
		$('#tblcargo').append(text);
		
//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
	}
}

function replace_consol(myid){
var input = $(myid).val();

		var pecah=input.split('/');
		var smu=pecah[0];
		var desti=pecah[1];
		var pcs=pecah[2];
		var cwt=pecah[3];

	text='<tr class="gradeX">'
    + '<td>' + '<input type="hidden" name="smu2[]" id="idcharge[]" value="'+ smu +'">'+ '<label id="l_pcs">'+ smu +'</label>' +'</td>'
	
    + '<td align="left">' +  '<input type="hidden" name="desti2[]" id="l[]" value="'+ desti +'">'+ '<label id="l_pcs">'+ desti +'</label>' +'</td>'
	
    + '<td align="right">' +  '<input type="hidden" name="pcs2]" id="t[]" value="'+ pcs +'">'+ '<label id="l_pcs">'+ pcs +'</label>' +'</td>'
    
    + '<td align="right">' + '<input type="hidden" name="cwt2[]" id="p[]"  value="'+ cwt +'">'+ '<label id="l_pcs">'+ cwt +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-primary btn-mini" value="' + input +'" onclick="move_consol(this)" type="button"><i class="fa fa-check"></i></button></td>'

    + '</tr>';
	
		$('#tbllist').append(text);
		
//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}



function delete_cargo(myid){
	var id=$(myid).val();
alert(id);	
}

function detailCargo(myid){
	swal({
		title:'<div><i class="fa fa-spinner fa-spin fa-4x blue"></i></div>',
		text:'<p>Loading Content.......</p>',
		showConfirmButton:false,
		//type:"success",
		html:true
		});
	var flight=$(myid).val();	
	
			$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/detail_cargo'); ?>",
				 data: "flight="+flight,
                cache:false,
                success: function(data){
					swal.close();
					$("#modalcargo").modal('show');
                    $('#tabledetailhouse').html(data);
                    //document.frm.add.disabled=false;
                }
            });
	
}

function getNilai(inputan){
	var airlines=$("#airlines").val();
	
	if(airlines==''){
		alert('silahkan pilih airline !');
		return false;
	} else {

	if(airlines !=''){
tableaddrelease.ajax.url('<?php echo site_url()?>outgoing_house/filter_list_closed/'+inputan).load();
	} else {
tableaddrelease.ajax.url('<?php echo site_url()?>outgoing_house/list_closed').load();		
	}
}	
}
$("#checkall").click(function(e) {
    $(".ceklis").prop('checked',this.checked);
});
function cek_checked(){
	var chk= $(".ceklis:checked");
	if(chk.length <=0){
	alert('Please Select The Flight Number, Cannot be Empty !');
	return false;
	}
	
}
</script>

</thead>

