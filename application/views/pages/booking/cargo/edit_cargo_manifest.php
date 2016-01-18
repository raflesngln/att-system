<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	    <title>Proses Out going</title>
        
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">

  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>

    
  <link href='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.css' rel='stylesheet' />
<script type='text/javascript' src='<?php echo base_url();?>asset/jquery_ui/jquery.autocomplete.js'></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>

		
	    <style>
	    	/* Autocomplete
			----------------------------------*/
			.ui-autocomplete { position: absolute; cursor: default; }	
			.ui-autocomplete-loading { background: white url('http://jquery-ui.googlecode.com/svn/tags/1.8.2/themes/flick/images/ui-anim_basic_16x16.gif') right center no-repeat; }*/

			/* workarounds */
			* html .ui-autocomplete { width:1px; } /* without this, the menu expands to 100% in IE6 */

			/* Menu
			----------------------------------*/
			.ui-menu {
				list-style:none;
				padding: 2px;
				margin: 0;
				display:block;
			}
			.ui-menu .ui-menu {
				margin-top: -3px;
			}
			.ui-menu .ui-menu-item {
				margin:0;
				padding: 0;
				zoom: 1;
				float: left;
				clear: left;
				width: 100%;
				font-size:80%;
			}
			.ui-menu .ui-menu-item a {
				text-decoration:none;
				display:block;
				padding:.2em .4em;
				line-height:1.5;
				zoom:1;
			}
			.ui-menu .ui-menu-item a.ui-state-hover,
			.ui-menu .ui-menu-item a.ui-state-active {
				font-weight: normal;
				margin: -1px;
			}
	    </style>
  <script>
  $(function() {
	$("#tgl").datepicker({
		dateFormat:'yy-mm-dd',
		});
  });

function toRp(angka){
  //var angka =document.getElementById("rp").value;
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
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
 function rupiah(){
  var angka =document.getElementById("grossweight").value;
  var angka2 =document.getElementById("grossweight").value;
  var nilai=angka;
  var hasil=toRp(nilai); 
  //alert('haii ' + hasil);
  document.getElementById("grossweight").value =hasil;
  var gross2=document.getElementById("grossweight2").value =angka;

  document.getElementById("grossweight").style.fontSize="large";
  document.getElementById("grossweight").style.fontWeight="bold";
  document.getElementById("grossweight").style.color="blue";
  
  var volum=document.getElementById("t_volume").value;
  
 if (gross2 >= volum) {
    document.getElementById("cwt").value ='gross 2 lebihh besar';
} else {
    document.getElementById("cwt").value ='volume lebih besar';
} 

 }
</script>	    
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#idshipper").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_sender",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
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
            	/*	$("#result").append(
            			"<li>"+ ui.item.kota + "</li>"
            		);    */
					$("#name1").val(ui.item.name); 
					$("#phone1").val(ui.item.phone);
					$("#address1").val(ui.item.address); 		
         		},		
    		});
			
//for shipper
    		$("#idconsigne").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_receivement",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
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
            	/*	$("#result").append(
            			"<li>"+ ui.item.kota + "</li>"
            		);    */
					$("#name2").val(ui.item.name); 
					$("#phone2").val(ui.item.phone);
					$("#address2").val(ui.item.address); 		
         		},		
    		});

	    });
	    </script>
	    
	</head>
	<body>
		

 <!-- ==========================================================  -->   
  <div class="row-fluid">
    <div class="span12">
                  <?php
      if(isset($eror)){?>
            <label class="alert alert-error col-sm-12">
      <button type="button" class="close" data-dismiss="alert">
      <i class="icon-remove"></i> </button>             
      <?php echo isset($eror)?$eror:'';?>
      <br />
      </label>
            <?php }?>   
      <div class="header col-md-11">
<p class="text-center konfirm" id="konfirm">&nbsp;</p>
                <h3><i class="fa fa-plus-square bigger-130"></i> &nbsp;Cargo Manifest :: Edit Cargo Manifest</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/update_chargo_manifest" autocomplete="off">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-8">      
      <div class="col-sm-11">
       <?php 
 $no=1;
 foreach($header as $row){

        ?>
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Detail Input</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> No Chargo Manifest</label></strong>
          <div class="col-sm-7">
           <input name="noconote" type="text" class="form-control"  id="name" readonly style="width:180px" value="<?php echo $row->CargoNo;?>"/>
          </div>



          <strong><label class="col-sm-4"> Tanggal</label></strong>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required value="<?php echo date("Y-m-d") ;?>" readonly style="width:180px;"/>
          </div>
          <strong><label class="col-sm-4"> Referensi</label></strong>
          <div class="col-sm-7">
            <input name="ref" type="text" class="form-control"  id="name3" value="<?php echo $row->referensi;?>"/>
          </div>
          <strong>
          <label class="col-sm-4"> Cabang Tujuan</label></strong>
          <div class="col-sm-7">
            <input name="tuju" type="text" class="form-control"  id="name2" value="<?php echo $row->tujuan;?>" readonly/>
          </div>
          <strong>
          <label class="col-sm-4"> Cabang Transit</label></strong>
          <div class="col-sm-7">
            <input name="transit" type="text" class="form-control"  id="name4" value="<?php echo $row->transit;?>" readonly/>
          </div>
          <strong>
          <label class="col-sm-4"> Keterangan</label></strong>
          <div class="col-sm-7">
            <textarea name="ket" id="ket" class="form-control"><?php echo $row->keterangan;?></textarea>
          </div>
          <strong>
          <label class="col-sm-4"> Realisasi Berat</label></strong>
          <div class="col-sm-7">
            <input name="realisasi" type="text" class="form-control"  id="realisasi" style="width:120px" value="<?php echo $row->realisasi_berat;?>"/>
          </div>
          <strong>
          
          
     <?php } ?>
          <label class="col-sm-4"> Cnote untuk di Proses</label></strong>
          <div class="col-sm-6">
            <input name="inputcnote" type="text" class="form-control"  id="inputcnote" placeholder="input connote here"/>
            </div>
          <div class="col-sm-2 text-left">
             <a class="btn-action" href="#modaledit<?php echo '123';?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i><button type="button" class="btn btn-primary btn-small" id="btncnote"><i class="fa fa-plus"></i> Add</button>
</a>
          </div>

<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>
          

<!-- end of sender -->

<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
      </div>
                <!--RIGHT INPUT--><br style="clear:both;margin-bottom:40px;">
            <div class="container">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Connote's</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table width="500" class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th width="54"><div align="center">Tanggal</div></th>
                                                  <th width="46"><div align="center">Tujuan</div></th>
                                                  <th width="58"><div align="center">Layanan</div></th>
                                                  <th width="48">Jenis</th>
                                                  <th width="48">Jumlah</th>
                                                  <th width="50">Berat</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Action</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($list as $items){
	 $berat=$items->Berat;
	 $t_berat+=$berat;
	 $jumlah=$items->Jumlah;
	 $t_jumlah+=$jumlah;

        ?>
                                                  <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo $items->HouseNo;?>
                                                      <input name="connote_2" type="hidden" id="connote_2" value="<?php echo $items->HouseNo;?>">
                                                    </div></td>
                                                    <td><div align="left"><?php echo $items->date_insert;?></div></td>
                                                    <td><div align="left"><?php echo $items->Tujuan;?></div></td>
                                                    <td><div align="left"><?php echo $items->Layanan;?></div></td>
                                                    <td><div align="left"><?php echo $items->Jenis;?></div></td>
                                                    <td><div align="right"><?php echo $items->Jumlah;?></div></td>
                                                    <td><div align="right"><?php echo $items->Berat;?></div></td>
                                                    <td>
                                                      <div align="center"><a href="<?php echo base_url(); ?>transaction/delete_cargo_connote/<?php echo $items->CargoNo; ?>/<?php echo $items->id; ?>/<?php echo $items->HouseNo; ?>" onClick="return confirm('Are You Sure delete item !?');" title="Delete item">
                                                      <button class="btn btn-mini btn-danger" type="button" onClick="hapus3(this);"><i class="fa fa-times bigger-120"></i></button>
                                                      </a> 
                                                        
                                                    </div></td>
                                                  </tr>
  <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2"><strong><?php echo $t_item;?>
                                                  <input type="hidden" name="t_item" value="<?php echo $t_item;?>">
                                                  </strong></td>
                                                  <td colspan="3"><strong>Total</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong><?php echo $t_jumlah;?></strong></td>
                                                  <td align="left">
                                                   <div align="right"><input type="hidden" name="tot_berat" value="<?php echo $t_berat;?>"><strong><?php echo $t_berat;?></strong></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                               
                                              <td width="74"></tbody>
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
                                             <button class="btn btn-primary"><i class="icon-refresh bigger-160 icons">&nbsp;</i> Update</button>
                                        </div>  </div>     
              </div>
          </div>
         </div>

      </form>
  </div>
            </div>
              


<!--adding form-->
<?php

  //  foreach($list as $row){
        ?>
<div id="modaledit<?php echo '123';?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
<form method="post" action="<?php echo base_url();?>transaction/save_edit_cargo_manifest" name="frm">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Connote to Cargo</h3>
            </div>
            <div class="smart-form">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">No Cnote</label>
                        <div class="col-sm-6"><span class="controls">
                        <input name="idcnote2" type="text" class="form-control"  id="idcnote2" />
</span><input type="hidden" name="cargono" id="cargono" value="<?php echo $cargono;?>">
                        </div>

<div class="col-sm-3"><span class="controls">
  <button class="btn btn-search btn-small btn-primary btnsearch" id="btnsearch2" style="visibility:hidden" type="button">Search</button>
</span></div>
            <div class="clearfix"></div>
            </div>
                
            
<div id="detailconnote2">        

    </div>                
                      <div class="modal-footer">
                      <button class="btn btn-primary" type="submit" id="btniditems" name="btniditems"><i class="fa fa-hourglass bigger-110 icons">&nbsp;</i> Insert</button>
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>

                            </div>
                    </div>
            
              
            </div> </form>
        </div>
    </div>
    </div>
    <?php // } ?>

<!--adding form-->


    

<!--ADDING NEW CUSTOMERS MODAL-->


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
					//alert(data);
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
				   //$("#modaledit123").modal('hide');
                },
			error: function(data){
                   document.getElementById("btniditems").disabled = true;
                }
            });
	}
  });


	
$("#iditemsssss,#btniditemsssss").click(function(){
	//var t_volume=$('#idtotal').val();   
	var idcnote=$('#idcnote2').val();
	var tgl2=$('#tgl2').val();
	var tujuan=$('#tujuan').val();
	var layanan=$('#layanan').val();
 	var jml=$('#jml').val();
	var berat=$('#berat').val();
	var jenis=$('#jenis').val();
 	
	var t_volume=$('#t_volume').val();
	var ttl = parseInt(t_volume) + parseInt(berat);
 
if (tujuan == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{				
	text='<tr class="gradeX" align="left">'
	+ '<td width="1"></td>'
    + '<td>' + '<input type="hidden" name="cnote[]" id="cnote[]" size="5" value="'+ idcnote +'">'+ '<label id="l_pcs">'+ idcnote +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="tgl2[]" id="tgl2[]" size="5" value="'+ tgl2 +'">'+ '<label id="l_pcs">'+ tgl2 +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="tujuan[]" id="tujuan[]" size="5" value="'+ tujuan +'">'+ '<label id="l_pcs">'+ tujuan +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="layanan[]" id="layanan[]" size="5" value="'+ layanan +'">'+ '<label id="l_pcs">'+ layanan +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="jml[]" id="jml[]" size="5" value="'+ jml +'">'+ '<label id="l_pcs">'+ jml +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="berat[]" id="berat[]" size="5" value="'+ berat +'">'+ '<label id="l_pcs">'+ berat +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="jenis[]" id="jenis[]" size="5" value="'+ jenis +'">'+ '<label id="l_pcs">'+ jenis +'</label>' +'</td>'	


	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + berat +'" onclick="hapus2(this)" type="button"  ><i class="fa fa-times"></i></button></td>'
    + '</tr>';
	
		$('#tblitems tbody').append(text);
		$("#t_volume").val(ttl);
		$("#label_volume").html(ttl);
		$("#modaladd").modal('hide');
		$("#modaledit123").modal('hide');
		
	}
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


</script>

 
  <!-- ============================================================== -->   

	</body>
</html>
