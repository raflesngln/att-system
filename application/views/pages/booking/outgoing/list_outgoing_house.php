<div class="pull-right col-xs-12">

<div class="col-sm-6 col-xs-12 pull-right">
<div class="row">
<div class="col-sm-11 col-xs-12">
  <label class="label label-pink">Periode House No</label></div>
<div class="col-sm-5 col-xs-12">First date</div>
<div class="col-sm-5 col-xs-12">End date</div>

<form method="post" class="in-line inline" action="<?php echo base_url();?>transaction/laporan_outgoing_house">
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg1" id="tg1" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg2" id="tg2" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-2 col-xs-12"><button class="btn btn-small btn-success" id="btnsort" type="button"><i class="fa fa-search"></i> Sorrt</button></div>
<div class="col-sm-2 col-xs-12"><button class="btn btn-small btn-warning" id="btnprint" type="submit"><i class="fa fa-print"></i> Print</button></div>
</form>

<div class="col-sm-11 col-xs-12">
  <label class="label label-pink">Search by House No</label></div>
<div class="col-sm-9 col-xs-12 text-right"><input type="text" class="form-control" name="txtsearch" id="txtsearch" placeholder="type house Number"></div>
<div class="col-sm-3 col-xs-12"><button class="btn btn-small btn-primary" id="btnsearch"><i class="fa fa-search"></i> Search</button></div>

</div>

</div>



</div>

<div class="container">
                <div class="col-lg-12 col-xs-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->

                
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Outgoing House / Connote</strong></span></h2>
                                        <div class="table-responsive" id="table_connote">
                                        <table width="500" class="table table-striped table-bordered table-hover" id="tblhouse">
                                              <thead>
                                                <tr align="left" style="background:#EBEBEB">
                                                  <th colspan="2"><div align="left">House No</div></th>
                                                  <th width="54"><div align="center">ETD</div></th>
                                                  <th width="46"><div align="center">Paycode</div></th>
                                                  <th width="58"><div align="center">Service</div></th>
                                                  <th width="48">Origin</th>
                                                  <th width="48">Destination</th>
                                                  <th width="48">Shipper</th>
                                                  <th width="50">Consigene</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Actions</div></th>
                                                </tr>
                                                </thead>
                                          <tbody>
 <?php 
 if(count($connote) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($connote as $items){
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><a class="dethouse" href="#modaladding" data-toggle="modal" id="dethouse" title="click for detail"><?php echo $items->HouseNo;?></a></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->ETD)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->PayCode;?></div></td>
                                                    <td><div align="left"><?php echo $items->Sservice;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->Shipper;?></div></td>
                                                    <td><div align="left"><?php echo $items->Consigne;?></div></td>
                                                    <td>
                                                   <a href="<?php echo base_url();?>transaction/cetak_outgoing_house/<?php echo $items->HouseNo;?>/<?php echo $items->HouseNo;?>" title="Print item">
                                                  <button class="btn btn-mini btn-warning" type="button"><i class="fa fa-print bigger-120"></i></button>
                                                  </a> 
                                                     <a href="<?php echo base_url();?>transaction/edit_outgoing_house/<?php echo $items->HouseNo;?>" title="Edit item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_outgoing_house/<?php echo $items->HouseNo; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $items->HouseNo;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a> 
                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} } ?>
                                                
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
                  </div>
          </div>
         </div>
         
         
 <!-- ading form -->
 <div id="modaladding" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1000; position:absolute">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Outgoing House</h3>
            </div>
            <div class="smart-form scroll">
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-body">
                     
                   



<div id="detail_outgoing" class="detail_outgoing">detail</div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="iddetail"> Save</button>
               <!-- </form>  -->
</div>
                    </div>
            
            </div>
        </div>
    </div>
    </div>
         
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
				   $('.txtdetail').html(' No. House : ' + nomor);
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

		
		
</script>