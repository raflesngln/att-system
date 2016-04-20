<body onLoad="focus_barcode()">
<form action="<?php echo base_url();?>transaction/save_chargo_manifest" method="post" enctype="multipart/form-data" autocomplete="off" name="formcargo" id="formcargo">

  <!--LEFT INPUT-->
  <?php
  foreach($cargo_release as $row){
  ?>
  <div class="col-sm-6">      
      <div class="col-sm-11">
<label class="col-sm-12"><h2><i class="fa fa-plus-square bigger-110"></i> Entry Data</h2></label> 
<div class="clearfx">&nbsp;</div>         
 
 <div class="form-group">
        <label class="col-sm-11"> No Chargo Release</label></strong>
          <div class="col-sm-11">
           <input name="noconote" type="text" class="form-control"  id="name" value="<?php echo $row->CargoReleaseCode;?>" readonly style="width:180px"/>
          </div>
</div>
 <div class="form-group">
          <strong><label class="col-sm-11"> Tanggal</label></strong>
          <div class="col-sm-11">
            <input name="tgl3" type="text" class="form-control"  id="tgl3" required value="<?php echo $row->ReleaseDate;?>" readonly style="width:180px;"/>
          </div>
</div>
 <div class="form-group">
          <label class="col-sm-11"> Flight No</label></strong>
          <div class="col-sm-11">
            <input name="flightno" type="text" class="form-control"  id="name2" style="width:180px" required value="<?php echo $row->FlightNumber;?>"/>
          </div>
</div>
 <div class="form-group">
          <label class="col-sm-11"> Keterangan</label></strong>
          <div class="col-sm-11">
            <textarea name="details" id="details" class="form-control"><?php echo $row->CargoDetails;?></textarea>
          </div>
</div>

          

<!-- end of sender -->

<div class="col-sm-12" id="contenshipper">
<!-- CONTENT AJAX VIEW HERE -->

</div>
      </div>             
  </div>
  
  <?php } ?>
<!--RIGHT INPUT-->
 <div class="col-sm-5" style="border:1px #CCC solid;box-shadow:2px 3px 8px #CCC; margin-right:5px">
 
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
                                        <div class="table-responsive" id="table_input">
                                        <table class="table table-striped table-bordered table-hover" id="tbllist">
                                              <thead>
                                                <tr align="left">
                                                  <th><div align="left">No SMU</div></th>
                                                  <th><div align="center">Destination</div></th>
                                                  <th>Qty</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">actions</div></th>
                                                </tr>
                                          <tbody>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($smu as $row) {
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

                                                  <tr align="left" class="gradeX">
                                                    <td><?php echo $row->NoSMU; ?><input type="hidden" name="smu2[]" value="<?php echo $row->NoSMU; ?>"></td>
                                                    <td><?php echo $row->desti; ?>
                                                    <input name="desti2[]" type="hidden" id="desti2[]" value="<?php echo $row->desti; ?>"></td>
                                                    <td><div align="right"><?php echo $pcs; ?>
                                                      <input name="pcs2[]" type="hidden" id="pcs2[]" value="<?php echo $pcs; ?>">
                                                    </div></td>
                                                    <td><div align="right"><?php echo $cwt; ?>
                                                      <input name="cwt2[]" type="hidden" id="cwt2[]" value="<?php echo $cwt; ?>">
                                                    </div></td>
                                                    <td align="center">
                                                  <button class="delbtn btn btn-mini btn-primary" type="button" value="<?php echo $row->NoSMU.'/'.$row->desti.'/'.$row->PCS.'/'.$row->CWT; ?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
                                                 
                                         
                                                  </td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2">&nbsp;</td>
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
    <?php // } ?>

<!--adding form-->
<script type="text/javascript">  
<!-- hapus item dan kurangi total items pack
function move_consol(myid){
var input = $(myid).val();

		var pecah=input.split('/');
		var smu=pecah[0];
		var desti=pecah[1];
		var pcs=pecah[2];
		var cwt=pecah[3];

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

</script>

</thead>

