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
                <h3><i class="fa fa-edit bigger-130"></i> &nbsp;Cargo Manifest :: Edit Cargo Manifest</h3>
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
           <input name="noconote" type="text" class="form-control"  id="cargono" readonly style="width:180px" value="<?php echo $row->CargoNo;?>"/>
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
          <div class="col-sm-7 text-left">
     <a class="btn-action" href="#modaledit<?php echo '123';?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i><button type="button" class="btn btn-primary btn-medium" id="btncnote"><i class="fa fa-plus-square"></i> Insert data</button>
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
                                                  <th width="54"><div align="center">Date</div></th>
                                                  <th width="46"><div align="center">Origin</div></th>
                                                  <th width="58"><div align="center">Destination</div></th>
                                                  <th width="48">Service</th>
                                                  <th width="48">Volume</th>
                                                  <th width="50">CWT</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Action</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($list as $items){
	 $cwt=$items->CWT;
	 $t_cwt+=$cwt;
	 $berat=$items->Berat;
	 $t_berat+=$berat;

        ?>
                                                  <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo $items->HouseNo;?>
                                                      <input name="connote_2" type="hidden" id="connote_2" value="<?php echo $items->HouseNo;?>">
                                                    </div></td>
                                                    <td><div align="left"><?php echo $items->date_insert;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->Service;?></div></td>
                                                    <td><div align="right"><?php echo $items->Berat;?></div></td>
                                                    <td><div align="right"><?php echo $items->CWT;?></div></td>
                                                    <td>
                                                      <div align="center"> 
                                                      <button id="delbutton" class="btn btn-danger btn-small delbutton" type="button" value="<?php echo $items->HouseNo;?>"><i class="fa fa-times"></i></button>  
                                                    </div></td>
                                                  </tr>
  <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2"><strong>
                                                  <input type="hidden" name="t_item" value="<?php echo $t_berat;?>">
                                                  </strong></td>
                                                  <td colspan="3"><strong>Total</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong>
                                                    <input name="t_volume" type="hidden" id="t_volume" value="<?php echo $t_berat;?>">
                                                  <?php echo $t_berat;?></strong></td>
                                                  <td align="left">
                                                   <div align="right"><input type="hidden" name="tot_cwt" value="<?php echo $t_cwt;?>"><strong><?php echo $t_cwt;?></strong></div></td>
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
<div id="modaledit<?php echo '123';?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Scan Barcode / Insert data</h3>
            </div>
            <div class="smart-form">
                    <div class="modal-body">
                      <div class="clearfix"></div>
                      <div class="form-group">
                        <label class="col-sm-12 control-label">Connote/House Number</label>
                        <div class="col-sm-12"><span class="controls">
                        <textarea name="idcnote2" id="idcnote2" class="form-control" placeholder="scann barcode here" style="height:40px"></textarea>
</span></div>

<div class="col-sm-12">
<span class="controls">
  <button class="btn btn-search btn-small btn-inverse" id="btn-manual" type="button" style="margin-bottom:5px">Manual</button>
</span> 
</div>
            
            </div>
<div class="form-group" id="form-manual" style=" display:none; float:left">
                        <div class="col-sm-12">
                        <div class="col-sm-9">
  <input name="idcnote3" type="text" class="form-control"   style=" width:300px" id="idcnote3" placeholder="input connote here !"/>
                        </div>
  <div class="col-sm-3">
  <button class="btn btn-primary btn-small" type="button" id="btniditems"><i class="fa fa-download bigger-120 icons">&nbsp;</i> Insert</button>
                       </div>
                        </div>


            
            </div>
            
<div id="detailconnote2">        

    </div>                
                      <div class="modal-footer">
<h1>&nbsp;</h1>
                      </div>
                    </div>
            
               
            </div>
        </div>
    </div>
    </div>
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
					//alert(data);
                }
            });
   });
$("#btncnote").click(function(){
	  $("#idcnote2").focus();
	   $("#form-manual").hide();
});	
  $("#btn-manual").click(function(){
	 $("#form-manual").slideToggle("slow");	 
 });
 
$("#idcnote2").keyup(function(){
            var idcnote = $('#idcnote2').val();
			var cargono= $('#cargono').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/insert_edit_cargo'); ?>",
                data: "idcnote="+idcnote+"&cargono="+cargono,
			    success: function(data){
					 $('#idcnote2').val('');
                    $('#table_responsive').html(data);
				   $('#idcnote2').focus();
                }
				
            });
    });
$("#idcnote3").keyup(function(){
	document.getElementById("btniditems").disabled = false;
});
$("#btniditems").click(function(){
      var idcnote = $('#idcnote3').val();
	  var cargono= $('#cargono').val();
	  $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/insert_edit_cargo'); ?>",
                data: "idcnote="+idcnote+"&cargono="+cargono,
			    success: function(data){
					 $('#idcnote3').val('');
                    $('#table_responsive').html(data);
				   $('#idcnote3').focus();
                }
				
            });
}); 		
 $(".delbutton").click(function(){
	 var idcnote=$(this).val();
	 var cargono= $('#cargono').val();
		  $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/delete_item_edit'); ?>",
                data: "idcnote="+idcnote+"&cargono="+cargono,
			    success: function(data){
                    $('#table_responsive').html(data);
                }
            });	 
 });
		
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


</script>

 
  <!-- ============================================================== -->   

	</body>
</html>
