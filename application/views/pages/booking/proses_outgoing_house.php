<!DOCTYPE HTML>
<html lang="en-US">
	<head>
	    <title>Codeigniter Autocomplete</title>
        
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
    $("#tgl").datepicker();
    $("#tgl2").datepicker();

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
  document.getElementById("grossweight").value =angka;
  
  document.getElementById("grossweight").style.fontSize="large";
  document.getElementById("grossweight").style.fontWeight="bold";
  document.getElementById("grossweight").style.color="blue";
  
  var gross2=document.getElementById("grossweight2").value =hasil;
  var volum=document.getElementById("t_volume").value;
  
 if (angka >= volum) {
    document.getElementById("cwt").value ='angka2 gross lebihh besar';
} else {
    document.getElementById("cwt").value ='volume lebih besar';
} 

 }
</script>	    
<!-- for autocomplete -->
	    <script type="text/javascript">
	    $(this).ready( function() {
    		$("#idcnoteeeee").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_cnote",
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
					$("#cnote").val(ui.item.name); 
					$("#tgl2").val(ui.item.tanggal);
					$("#tujuan").val(ui.item.tujuan);
					$("#layanan").val(ui.item.layanan);
					$("#jml").val(ui.item.jml);
					$("#berat").val(ui.item.berat);
					//$("#jenis").val(ui.item.jenis); 		
         		},		
    		});
			

	    });
	    </script>
	    
	</head>
	<body>
		

 <!-- =================================================================================  -->   
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
                <h3><i class="fa fa-plus-square bigger-130"></i> &nbsp;Cargo Manifest :: Entry</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/confirm_outgoing_house" autocomplete="off">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-8">      
      <div class="col-sm-11">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Detail Input</span></label> 
<div class="clearfx">&nbsp;</div>         
          <strong><label class="col-sm-4"> No Chargo Manifest</label></strong>
          <div class="col-sm-7">
           <input name="noconote" type="text" class="form-control"  id="name" placeholder="generated by system" readonly style="width:180px"/>
          </div>



          <strong><label class="col-sm-4"> Tanggal</label></strong>
          <div class="col-sm-7">
            <input name="tgl" type="text" class="form-control"  id="tgl" required value="<?php echo date("m/d/Y") ;?>" readonly style="width:180px;"/>
          </div>
          <strong><label class="col-sm-4"> Referensi</label></strong>
          <div class="col-sm-7">
            <input name="ref" type="text" class="form-control"  id="name3"/>
          </div>
          <strong>
          <label class="col-sm-4"> Cabang Tujuan</label></strong>
          <div class="col-sm-7">
           <select name="tuju" id="tuju" class="form-control" required="required">
          <option value="">Choose Origin</option>
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
          <option value="">Choose Destination</option>
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
          <div class="col-sm-7">
            <input name="name5" type="text" class="form-control"  id="name6" />
          </div>

<div class="col-sm-12"><hr style="border:1px #CCC dashed"></div>
          

<!-- end of sender -->

<div class="col-sm-13" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
      </div>
                <!--RIGHT INPUT-->
      



<br style="clear:both;margin-bottom:40px;">
            <div class="container">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Connote's</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th><div align="center">Tanggal</div></th>
                                                  <th><div align="center">Tujuan</div></th>
                                                  <th><div align="center">Layanan</div></th>
                                                  <th>Jumlah</th>
                                                  <th>Berat</th>
                                                  <th><div align="center">Jenis</div></th>
                                                  <th class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add items</a></div></th>
                                                </tr>
                                                <th colspan="8"></th>
                                                <th><div align="center">
                                           </div></th>
                                                
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_volume+=$items['v'];
        ?>
                                                  <tr align="right" class="gradeX">
                                                  <td colspan="2"><?php echo $items['qty']; ?></td>
                                                  <td><?php echo $items['p']; ?></td>
                                                  <td><?php echo $items['l']; ?></td>
                                                  <td><?php echo $items['t']; ?></td>
                                                  <td><?php echo number_format($items['v'],2,'.',',');?></td>
                                                  <td><?php echo number_format($items['v'],2,'.',',');?></td>
                                                  <td><?php echo number_format($items['v'],2,'.',',');?></td>
                                                  <td>
                                                  <div align="center">
                                                   <a href="<?php echo base_url(); ?>temp/delete_item/<?php echo $items['rowid']; ?>" onclick="return confirm('Yakin Hapus ?');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button"><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                <thead>
                                                 <tr align="right">
                                                  <td colspan="2"><?php echo $t_item;?><input type="hidden" name="t_item" value="<?php echo $t_item;?>"></td>
                                                  <td colspan="3">Total</td>
                                                  <td>&nbsp;</td>
                                                  <td align="left"><input name="t_volume" type="hidden" id="t_volume" value="0" /><label id="label_volume">0</label></td>
                                                  <td>                                           
                                                  </td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                </thead>
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
  </div>
            </div>
              
 <!--edit form-->
<?php

    foreach($list as $row){
    $isagen=$row->isAgent;
    $isaktif=$row->isAktive;
    $isCnee=$row->isCnee;
    $isShipper=$row->isShipper;
    if($isagen==1){ $status1='YES';}else{$status1='NO';}
    if($isShipper==1){ $status2='YES';}else{$status2='NO';}
    if($isCnee==1){ $status3='YES';}else{$status3='NO';}
    if($isaktif==1){ $status4='YES';}else{$status4='NO';}
        ?>
        
  <div id="modaledit<?php echo $row->discCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_disc')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Customer </label>
                        <div class="col-sm-9"><span class="controls">
<select name="cust" id="cust" required="required" class="form-control">
                            <option value="<?php echo $row->custCode;?>"><?php echo $row->custName;?></option>
                            <?php
  foreach($cust as $ct){
      ?>
                            <option value="<?php echo $ct->custCode;?>"><?php echo $ct->custName;?></option>
                            <?php } ?>
                          </select>
                        </span>
                          <input type="hidden" name="id" id="id" value="<?php echo $row->discCode;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Service</label>
                        <div class="col-sm-9"><span class="controls">
<select name="service" id="service" required="required" class="form-control">
                            <option value="<?php echo $row->svCode;?>"><?php echo $row->Name;?></option>
                            <?php
  foreach($service as $sv){
      ?>
                            <option value="<?php echo $sv->svCode;?>"><?php echo $sv->Name;?></option>
                            <?php } ?>
                          </select>
                        </span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Origin</label>
                        <div class="col-sm-9"><span class="controls">
<select name="ori" id="ori" required="required" class="form-control">
                            <option value="<?php echo $row->Ori;?>"><?php echo $row->Ori;?></option>
                            <?php
  foreach($city as $cty){
      ?>
                            <option value="<?php echo $cty->cyName;?>"><?php echo $cty->cyName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Destination</label>
                        <div class="col-sm-9"><span class="controls">
<select name="dest" id="dest" required="required" class="form-control">
                            <option value="<?php echo $row->Dest;?>"><?php echo $row->Dest;?></option>
                            <?php
  foreach($city as $cty){
      ?>
                            <option value="<?php echo $cty->cyName;?>"><?php echo $cty->cyName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
              <label class="col-sm-3 control-label">Vendor</label>
                        <div class="col-sm-9"><span class="controls">
<select name="vendor" id="vendor" required="required" class="form-control">
                            <option value="<?php echo $row->venCode;?>"><?php echo $row->venName;?></option>
                            <?php
  foreach($vendor as $vd){
      ?>
                            <option value="<?php echo $vd->venCode;?>"><?php echo $vd->venName;?></option>
                            <?php } ?>
                          </select>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Disc %</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="persen" type="text" class="form-control" placeholder="" id="persen" value="<?php echo $row->DiscPersen;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Disc Rp</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="rp" type="text" class="form-control" placeholder="" id="rp" value="<?php echo $row->DiscRupiah;?>" />
    </span></div>
                        <div class="clearfix"></div>
                      </div>
  
  <div class="form-group">
<label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9">
                          <textarea name="remarks" cols="30" rows="2" class="form-control" id="remarks" required><?php echo $row->Remarks;?></textarea>
</div>
                        <div class="clearfix"></div>
                    </div>
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
        </div>
<?php } ?>

<!--adding form-->

<!--adding form--><!--ADDING NEW CUSTOMERS MODAL-->
<div id="modaladd" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Cnote</h3>
            </div>
            <div class="smart-form scroll">
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">No Cnote</label>
                        <div class="col-sm-6"><span class="controls">
                        <input name="idcnote" type="text" class="form-control"  id="idcnote" />
</span></div>

<div class="col-sm-3"><span class="controls">
  <button class="btn btn-search btn-small btn-primary btnsearch" id="btnsearch" type="button">Search</button>
</span></div>
            <div class="clearfix"></div>
            </div>
            <br>
            
<div id="detailconnote">        

    </div>                  
                      
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iditems"> Save</button>
  </div>
                    </div>
            
               <!-- </form>  -->
            </div>
  
        </div>
    </div>
    </div>

<script type="text/javascript">     
$("#txtsearch").keyup(function(){

            var txtsearch = $("#txtsearch").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/search_discount_ajax'); ?>",
                data: "txtsearch="+txtsearch,
                cache:false,
                success: function(data){
                    $('#table_responsive').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
		
		
   $("#idcnote").keyup(function(){
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
		

  $("#addcust").click(function(){
		var initial=$("#initial").val();
		var namecust=$("#namecust").val();
		var address=$("#address").val();
		var city=$("#city").val();
		var phone=$("#phone").val();
		var fax=$("#fax").val();
		var postcode=$("#postcode").val();
		var email=$("#email").val();
		var remarks2=$("#remarks2").val();
		var isagent=$("#isagent").val();
		var isshipper=$("#isshipper").val();
		var iscnee=$("#iscnee").val();
	if (initial == '')
        { 
		alert('Mohon isi data dengan lengkap');
		$("#initial").css("border-color","red");
		$("#label-confir").css({"background-color": "white", "color": "red"});
		$("#label-confir").html('<i class="fa fa-times"></i>');
        }
	else if (namecust == '')
        { 
		alert('Mohon isi data dengan lengkap');
		$("#namecust").css("border-color","red");
		$("#label-confir2").css({"background-color": "white", "color": "red"});
		$("#label-confir2").html('<i class="fa fa-times"></i>');
        } 
    else
        {	
	          $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/save_customer2'); ?>",
 data: "namecust="+namecust+"&initial="+initial+"&address="+address+"&city="+city+"&phone="+phone+"&fax="+fax+"&postcode="+postcode+"&email="+email+"&remarks2="+remarks2+"&isagent="+isagent+"&isshipper="+isshipper+"&iscnee="+iscnee,
                success: function(data){
                 	alert('Customer with name ' +namecust +' Success Saved');
                }
            });	
			$("#initial").css("border-color","#D9DFE2");
			$("#label-confir").html('');
			$("#modaladdcust").modal('hide');
		}
			
   });
	
     
		
$("#iditems").click(function(){
	//var t_volume=$('#idtotal').val();   
	var idcnote=$('#idcnote').val();
	var tgl2=$('#tgl2').val();
	var tujuan=$('#tujuan').val();
	var layanan=$('#layanan').val();
 	var jml=$('#jml').val();
	var berat=$('#berat').val();
	var jenis=$('#jenis').val();
 	
	var t_volume=$('#t_volume').val();
	var ttl = parseInt(t_volume) + parseInt(berat);
 
if (idcnote == '' || tujuan == '' || jml == ''){
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
    + '</tr>'; fa -time sbdajdb
	
		$('#tblitems tbody').append(text);
		$("#t_volume").val(ttl);
		$("#label_volume").html(ttl);
		$("#modaladd").modal('hide');
	}
 });

 $("#btndel").on("click", function(){
        alert('The paragraph was clicked');
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

function hapus2(myid){
var input = $(myid).val();

var t_volume=$('#t_volume').val();
var hasil=parseInt(t_volume)-parseInt(input);

$('#t_volume').val(hasil);
$('#label_volume').html(hasil);

     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}

$("#savecharges").click(function(){
	//var t_volume=$('#idtotal').val();   
	var charge=$('#charge').val();
	var desc=$('#desc').val();
	var txtunit=$('#txtunit').val();
	var txtqty=$('#txtqty').val();
 	var kali = parseInt(txtunit) * parseInt(txtqty);
 	var total_charge=$('#total_charge').val();
	var jumlah=parseInt(total_charge) + parseInt(kali);			
if (txtunit == '' || txtqty == '' || charge == ''){
	alert('Mohon isi data dengan lengkap');	
	}
	else
	{
	text='<tr class="gradeX" align="left">'
	+ '<td></td>'
    + '<td>' + '<input type="hidden" name="idcharge[]" id="pcs[]" size="5" value="'+ charge +'">'+ '<label id="l_pcs">'+ charge +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="desc[]" id="p[]" size="5" value="'+ desc +'">'+ '<label id="l_pcs">'+ desc +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="unit[]" id="l[]" size="5" value="'+ txtunit +'">'+ '<label id="l_pcs">'+ txtunit +'</label>' +'</td>'
    + '<td>' +  '<input type="hidden" name="qty[]" id="t[]" size="5" value="'+ txtqty +'">'+ '<label id="l_pcs">'+ txtqty +'</label>' +'</td>'
    + '<td>' + '<input type="hidden" name="total[]" id="v[]" size="5" value="'+ kali +'">'+ '<label id="l_pcs">'+ kali +'</label>' +'</td>'

	+'<td align="center">' + '<button class="btndel btn-danger btn-mini" value="' + kali +'" onclick="hapus3(this)" type="button">hapus</button></td>'
    + '</tr>';
	
		$('#tblcharges tbody').append(text);
		$("#total_charge").val(jumlah);
		$("#label_charges").html(jumlah);
		$("#modaladdCharge").modal('hide');
	}
 });


function hapus3(myid){
var input = $(myid).val();

var total_charge=$('#total_charge').val();
var hasil=parseInt(total_charge)-parseInt(input);

$('#total_charge').val(hasil);
$("#label_charges").html(hasil);

     t = $(myid);
     tr = t.parent().parent();
     tr.remove();
}

</script>

 
  <!-- =================================================================================  -->   

	</body>
</html>
