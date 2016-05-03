<body onLoad="focus_barcode()">
<form action="<?php echo base_url();?>transaction/save_chargo_manifest" method="post" enctype="multipart/form-data" autocomplete="off" name="formcargo[0]" id="formcargo">

  <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"><h2><i class="fa fa-plus-square bigger-110"></i> Entry Data</h2></label> 
<div class="clearfx">&nbsp;</div>         
 
 <div class="form-group">
        <label class="col-sm-11"> No Cargo Release</label></strong>
          <div class="col-sm-11">
           <input name="noconote" type="text" class="form-control"  id="name" placeholder="generated by system" readonly style="width:180px"/>
          </div>
</div>
 <div class="form-group">
          <strong><label class="col-sm-11"> Tanggal</label></strong>
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
 
 <div class="form-group">
          <label class="col-sm-11"> Keterangan</label></strong>
          <div class="col-sm-11">
            <textarea name="details" id="details" class="form-control"></textarea>
          </div>
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
                                
           
 
  <div class="container">
                <div class="col-lg-11 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Connote's</strong></span></h2>
                                        <div class="table-responsive" id="divflight">
                                        <table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th>Flight</th>
                                                  <th><div align="left">No SMU</div></th>
                                                  <th><div align="center">Destination</div></th>
                                                  <th>PCS</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">
                                                    <input type="checkbox" name="checkall" id="checkall" onClick="return Checkall()" value="Check all">
                                                  </div></th>
                                                </tr>
                                          <tbody>
                                          <tbody>
 <?php 
 $no=1;
 foreach ($smu as $row) {
	 	 $air=explode('/',$row->FlightNumbDate1);
	 $kode=$air[0];
	 $cwt=$row->CWT;
	 $t_cwt+=$cwt;
	 if($cwt <=0){
		$cwt="<span class='label label-warning'>empty</span>";
	 }
	 
	 $pcs=$row->PCS;
	 $t_pcs+=$pcs;
	 if($pcs <=0){
		$pcs="<span class='label label-warning'>empty</span>";
	 }
	 
  ?>

                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="3">&nbsp;</td>
                                                  <td align="right"><div align="right"></div></td>
                                                  <td>&nbsp;</td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                          </tbody>
                                          </table>
                                      </div>
                                    </div>
  
  <!-- LEFT INPUT  -->
  <!-- END LEFT INPUT -->
  <!-- RIGHT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-md-12"></div>
                                              </div>
                                            </div>
  <!-- END RIGHT INPUT -->
  <div class="clearfix"> </div>

                                    
  
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
    
    <div class="modal-dialog modal-lg" role="document">
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
	var airlines=$("#airlines").val();
		 $.ajax({
         type: "POST",
         url : "<?php echo base_url('transaction/filter_flight'); ?>",
         data: "airlines="+airlines,
		 success: function(data){
		 $('#divflight').html(data);
            }
          
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


function Checkall(){
	var chk=document.getElementsByName('checklish[]');
	for(i=0;i < chk.length;i++){
	chk[i].checked="true";	
	}
}
function unCheckall(){
	var chk=document.getElementsByName('checklish[]');
	for(i=0;i < chk.length;i++){
	chk[i].checked="false";	
	}
}
$("#checkall").change(function(){
	
	if($(this).is(':checked')){
		Checkall();
	} else {
		unCheckall()
	}
	
});
function delete_cargo(myid){
	var id=$(myid).val();
alert(id);	
}

function detailCargo(myid){
	var flight=$(myid).val();	
	
			$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/detail_cargo'); ?>",
				 data: "flight="+flight,
                cache:false,
                success: function(data){
					$("#modalcargo").modal('show');
					
                    $('#tabledetailhouse').html(data);
                    //document.frm.add.disabled=false;
                }
            });
	
}
</script>

</thead>

