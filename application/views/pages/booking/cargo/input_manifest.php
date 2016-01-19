<form method="post" action="<?php echo base_url();?>transaction/save_chargo_manifest" autocomplete="off">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-8">      
      <div class="col-sm-11">
<label class="col-sm-12"><h2><i class="icon icon-beaker bigger-110"></i> Entry Data</h2></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> No Chargo Manifest</label></strong>
          <div class="col-sm-7">
           <input name="noconote" type="text" class="form-control"  id="name" placeholder="generated by system" readonly style="width:180px"/>
          </div>



          <strong><label class="col-sm-4"> Tanggal</label></strong>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required value="<?php echo date("Y-m-d") ;?>" readonly style="width:180px;"/>
          </div>
          <strong><label class="col-sm-4"> Referensi</label></strong>
          <div class="col-sm-7">
            <input name="ref" type="text" class="form-control"  id="name3"/>
          </div>
          <strong>
          <label class="col-sm-4"> Cabang Tujuan</label></strong>
          <div class="col-sm-7">
           <select name="tuju" id="tuju" class="form-control" required="required">
          <option value="">Choose Destination</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode.'-'.$ct->cyName;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong>
          <label class="col-sm-4"> Cabang Transit</label></strong>
          <div class="col-sm-7">
           <select name="transit" id="transit" class="form-control" required="required">
          <option value="">Choose transit</option>
          <?php foreach ($city as $ct) {
          ?>
          <option value="<?php echo $ct->cyCode.'-'.$ct->cyName;?>"><?php echo $ct->cyName;?></option>
          <?php } ?>
          </select>
          </div>
          <strong>
          <label class="col-sm-4"> Keterangan</label></strong>
          <div class="col-sm-7">
            <textarea name="ket" id="ket" class="form-control"></textarea>
          </div>
          <strong>
          <label class="col-sm-4"> Realisasi Berat</label></strong>
          <div class="col-sm-7">
            <input name="realisasi" type="text" class="form-control"  id="realisasi" style="width:120px" />
          </div>
          <strong>
          <label class="col-sm-4"> Cnote untuk di Proses</label></strong>
          <div class="col-sm-6">
          
            <input name="inputcnote" type="text" class="form-control"  id="inputcnote" placeholder="input connote here"/>
            </div>
          <div class="col-sm-2 text-left">
             <a class="btn-action" href="#modaledit<?php echo '123';?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i><button type="button" class="btn btn-primary btn-small" id="btncnote"><i class="fa fa-search"></i> Cari</button>
</a>
          </div>

<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>
          

<!-- end of sender -->

<div class="col-sm-12" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
      </div>
                <!--RIGHT INPUT--><br style="clear:both;margin-bottom:40px;">
            <div class="container">
                <div class="col-lg-11 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Connote's</strong></span></h2>
                                        <div class="table-responsive" id="table_input">
                                        <table class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th><div align="center">Date</div></th>
                                                  <th><div align="center">Origin</div></th>
                                                  <th><div align="center">Destination</div></th>
                                                  <th>Service</th>
                                                  <th>Volume</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">actions</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_cwt+=$items['cwt'];
        ?>

                                                  <tr align="left" class="gradeX">
                                                    <td colspan="2"><strong>
                                                      <input name="nohouse" type="hidden" id="nohouse" value="<?php echo $items['id']; ?>" class="nohouse" />
                                                    </strong><?php echo $items['id']; ?></td>
                                                    <td><?php echo $items['date']; ?></td>
                                                    <td><?php echo $items['origin']; ?></td>
                                                    <td><?php echo $items['destination']; ?></td>
                                                    <td><?php echo $items['service']; ?></td>
                                                    <td><div align="right"><?php echo $items['qty']; ?></div></td>
                                                    <td><div align="right"><?php echo $items['cwt']; ?></div></td>
                                                    <td>
                                                  <button class="delbtn btn btn-mini btn-danger" type="button" id="delbtn" value="<?php echo $items['rowid']; ?>"><i class="fa fa-times bigger-120"></i></button>
                                                 
                                         
                                                  </td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2">&nbsp;</td>
                                                  <td colspan="3"><strong>
                                                    <input type="hidden" name="t_item" value="<?php echo $t_item;?>" />
                                                  Total</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td align="right"><strong><?php echo $t_item;?>
                                                  </strong>
                                                   <div align="right"></div></td>
                                                  <td><strong><?php echo $t_cwt;?>
                                                  <input name="t_cwt" type="hidden" id="t_cwt" value="<?php echo $t_cwt;?>" />
                                                  </strong></td>  
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
                                             <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
                                        </div>  </div>     
              </div>
          </div>
         </div>

      </form>
      
      
    <!--adding form-->
<?php

  //  foreach($list as $row){
        ?>
<div id="modaledit<?php echo '123';?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Insert Data</h3>
            </div>
            <div class="smart-form">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">No Cnote</label>
                        <div class="col-sm-6"><span class="controls">
                        <input name="idcnote2" type="text" class="form-control"  id="idcnote2" />
</span></div>

<div class="col-sm-3"><span class="controls">
  <button class="btn btn-search btn-small btn-primary btnsearch" style=" display:none" id="btnsearch2" type="button">Search</button>
  <button class="btn btn-primary" type="button" id="btniditems"><i class="fa fa-hourglass bigger-120 icons">&nbsp;</i> Insert</button>

</span></div>
            
            </div>
                <br>
            
<div id="detailconnote2" style=" display:none">        

    </div>                
                      <div class="modal-footer">
<h1>.</h1>
                      </div>
                    </div>
            
               
            </div>
        </div>
    </div>
    </div>
    <?php // } ?>

<!--adding form-->
<script type="text/javascript">  

 
		   
 $("#idcnote").keyup(function(){
            var idcnote = $('#idcnote').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_cnote'); ?>",
                data: "idcnote="+idcnote,
                success: function(data){
                   $('#detailconnote').html(data);
					document.getElementById("btniditems").disabled = false;
                }
            });
        });
		
	 $("#btnsearch").click(function(){
            var idcnote = $('#idcnote').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_cnote'); ?>",
                data: "idcnote="+idcnote,
                success: function(data){
                   $('#detailconnote').html(data);
					document.getElementById("btniditems").disabled = false;
                }
            });
        });
	 $("#btnsearch2").click(function(){
            var idcnote = $('#idcnote2').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_cnote'); ?>",
                data: "idcnote="+idcnote,
                success: function(data){
                   $('#detailconnote2').html(data);
					document.getElementById("btniditems").disabled = false;
                }
            });
        });
 $("#idcnote2").keyup(function(){
            var idcnote = $('#idcnote2').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_cnote'); ?>",
                data: "idcnote="+idcnote,
                success: function(data){
                   $('#detailconnote2').html(data);
					document.getElementById("btniditems").disabled = false;
                }
            });
        });
		
  $("#btncnote").click(function(){
	  //var inputcnote=$("#inputcnote").val();
	  var idcnote = $('#inputcnote').val();
	  $("#idcnote2").val(idcnote);
	if(idcnote=='')
	{
		alert('Empty !! Please input connote inside textbox to add data !');
		return false;
	}
	else
	{
	 var idcnote = $('#idcnote2').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/detail_cnote'); ?>",
                data: "idcnote="+idcnote,
                success: function(data){
                   $('#detailconnote2').html(data);
				   document.getElementById("btniditems").disabled = false;
				   //$("#modaledit123").modal('hide');
                },
			error: function(data){
                   document.getElementById("btniditems").disabled = true;
                }
            });
	}
 });
$("#iditems,#btniditems").click(function(){
	//var t_volume=$('#idtotal').val();   
	var idcnote=$('#idcnote2').val();
	var date=$('#date').val();  
	var origin=$('#origin').val();
	var destination=$('#destination').val();
	var service=$('#service').val();
 	var jml=$('#jml').val();
	var cwt=$('#cwt').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/save_session'); ?>",
                data: "idcnote=" + idcnote + "&date=" + date + "&origin=" + origin + "&destination=" + destination + "&service=" + service + "&jml=" + jml + "&cwt=" + cwt,
                success: function(data){
                   //$('#table_responsive').html(data);
				  
				   $('#table_input').html(data);
						//$("#modaledit123").modal('hide');
						$("#inputcnote").val('');
						$("#date").val('');
						$("#origin").val('');
						$("#destination").val('');
						$("#service").val('');
						$("#jml").val('');
						$("#cwt").val('');
						$("#idcnote2").val('');
						document.getElementById("btniditems").disabled = true;
                }
            });	
});


 $(".delbutton").click(function(){
	  var nohouse=$(this).val();

		$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/delete_session_cargo'); ?>",
                data: "nohouse=" + nohouse,
                success: function(data){
				  $('#table_input').html(data);
                }
            });
});

		
function hapus(th) {
      var tt=$("#tt").val();;
	  var t_volume=$('#t_volume').val();
	  var kurangi=parseInt(t_volume)- parseInt(tt);
	  			 
	 $("#t_volume").val(kurangi);
					 
     t = $(th);
     tr = t.parent().parent();
     tr.hide();
 }

<!-- hapus item dan kurangi total items pack
function hapus2(myid){
var input = $(myid).val();
//document.write('kata yang pertama adalah ' +hasil[0]);

	var t_volume=$('#t_volume').val();
	var hasil=parseInt(t_volume)-parseInt(input);

	
	$('#t_volume').val(hasil);
	$('#label_volume').html(hasil);
//alert(hasil_pecah);
     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}


$("#btnadddata").click(function(){
	
	var inps = document.getElementsByName('cnote[]');
for (var i = 0; i <inps.length; i++) {
var inp=inps[i];
var kode = document.getElementById('idcnote2').value;
  // alert("inputan["+i+"].value="+inp.value + kode);

	if(inp.value==kode){
		alert('itu sama');
	}
	else{
		
	alert('ga sama');	
	}
}
	
});

$("#btnadddata").click(function(){
	
	var inps = document.getElementsByName('cnote[]');
	var kode = document.getElementById('idcnote2').value;

for (var i = 0; i <inps.length; i++) {
var inp=inps[i];
  // alert("inputan["+i+"].value="+inp.value + kode);

	if(inp.value==kode){
		alert('itu sama');
	}
	else{
		
	alert('ga sama');	
	}
}
	
});

$("#btt").click(function(){
	var cnote = document.getElementsByName('cnote[]');
	var input = document.getElementById('idcnote2').value;

				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/cek_cnote'); ?>",
                 data: "input="+input+"&cnote="+cnote,
                success: function(data){
                   $('#detailconnote2').html(data);
					
                }
            });

        });

</script>

