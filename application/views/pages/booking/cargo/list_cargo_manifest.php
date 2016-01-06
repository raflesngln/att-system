<div class="pull-right col-xs-12">

<div class="col-sm-6 col-xs-12 pull-right">
<div class="row">
<div class="col-sm-11 col-xs-12">Periode Cargo Manifest</div>
<form method="post" action="<?php echo base_url();?>transaction/laporan_cargo_manifest">
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg1" id="tg1" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg2" id="tg2" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-2 col-xs-12"><button class="btn btn-small btn-success" id="btnsort" type="button"><i class="fa fa-search"></i> Sorrt</button></div>
<div class="col-sm-2 col-xs-12"><button class="btn btn-small btn-success" id="btnprint" type="submit"><i class="fa fa-print"></i> Print</button></div>
</form>

<div class="col-sm-11 col-xs-12"><label class="label label-warning">Search by Cargo No</label></div>
<div class="col-sm-9 col-xs-12 text-right"><input type="text" class="form-control" name="txtsearch" id="txtsearch" placeholder="type No Cargo"></div>
<div class="col-sm-3 col-xs-12"><button class="btn btn-small btn-primary" id="btnsearch"><i class="fa fa-search"></i> Search</button></div>

</div>

</div>



</div>

<div class="container">
                <div class="col-lg-11 col-xs-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->

                
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Cargo Manifest</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table width="500" class="table table-striped table-bordered table-hover" id="tblitemss">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Cargo</div></th>
                                                  <th width="54"><div align="center">Tanggal</div></th>
                                                  <th width="46"><div align="center">Tujuan</div></th>
                                                  <th width="58"><div align="center">referensi</div></th>
                                                  <th width="48">Transit</th>
                                                  <th width="48">Keterangan</th>
                                                  <th width="48">Realisasi Berat</th>
                                                  <th width="50">Total Berat</th>
                                                  <th width="53" class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($list_cargo as $items){
	

        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo $items->CargoNo;?></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->tgl_cargo)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->tujuan;?></div></td>
                                                    <td><div align="left"><?php echo $items->referensi;?></div></td>
                                                    <td><div align="left"><?php echo $items->transit;?></div></td>
                                                    <td><div align="left"><?php echo $items->transit;?></div></td>
                                                    <td><?php echo $items->realisasi_berat;?></td>
                                                    <td><?php echo $items->total_berat;?></td>
                                                    <td>
                                                   <a href="<?php echo base_url();?>transaction/cetak_manifest/<?php echo $items->CargoNo;?>" title="Delete item">
                                                  <button class="btn btn-mini btn-warning" type="button"><i class="fa fa-print bigger-120"></i></button>
                                                  </a> 
                                                   <a href="<?php echo base_url();?>transaction/edit_cargo_manifest/<?php echo $items->CargoNo;?>" title="Delete item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_cargo_manifest/<?php echo $items->CargoNo; ?>" onClick="return confirm('Yakin hapus Cargo ini? ini akan menghapus sekaligus items nya');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} ?>
                                                
                                              <td width="74"></td></tbody>
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
                  </div>
          </div>
         </div>
         
         
         
 
<script type="text/javascript">     
		
	 $("#txtsearch").keyup(function(){
            var cargono = $('#txtsearch').val();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_cargo_manifest'); ?>",
                data: "cargono="+cargono,
                success: function(data){
                   $('#table_responsive').html(data);
                }
            });
        });
		
	 $("#btnsearch").click(function(){
            var cargono = $('#txtsearch').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/search_cargo_manifest'); ?>",
                data: "cargono="+cargono,
                success: function(data){
                   $('#table_responsive').html(data);
                }
            });
        });
	 $("#btnsort").click(function(){
            var tgl1 = $('#tg1').val();
			var tgl2 = $('#tg2').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/periode_cargo_manifest');?>",
       data: "tgl1="+tgl1+"&tgl2="+tgl2,
                success: function(data){
                   $('#table_responsive').html(data);
                }
            });
        });
	 $("#btnprint").click(function(){
            var tgl1 = $('#tg1').val();
			var tgl2 = $('#tg2').val();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/periode_cargo_manifest');?>",
       data: "tgl1="+tgl1+"&tgl2="+tgl2,
                success: function(data){
                   $('#table_responsive').html(data);
                }
            });
        });
		
		
</script>