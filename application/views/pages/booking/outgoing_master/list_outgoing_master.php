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
<script type="text/javascript">
	    $(this).ready( function() {

	
$("#addinvoice").click(function(){
	//document.getElementById("idhouse").value ='trtrtrtrt';
	$("#idhouse").val('');
	$("#idorigin").val('');
	$("#iddestination").val('');
	$("#idcwt").val('');
 });     

$("#idhouse").autocomplete({
      			minLength: 1,
      			source: 
        		function(req, add){
          			$.ajax({
		        		url: "<?php echo base_url(); ?>index.php/autocomplete/lookup_om",
		          		dataType: 'json',
		          		type: 'POST',
		          		data: req,
				beforeSend: function(){
					 $(".fa-pulse").show();
         			 },
		        success:    
		            	function(data){
		              		if(data.response =="true"){
		                 		add(data.message);
								//$('#contenshipper').html('');
								 $(".fa-pulse").hide();
		              		}
		            	},
              		});
         		},
         	select: 
         		function(event, ui) {
					$("#idorigin").val(ui.item.origin);
					$("#iddestination").val(ui.item.destination); 
					$("#idcwt").val(ui.item.cwt);		
         		},		
    		});
		});
</script>
<div class="pull-right col-xs-12">

<div class="col-sm-6 col-xs-12 pull-right">
<div class="row">
<div class="col-sm-11 col-xs-12">
  <label class="label label-grey">Periode House No</label></div>
<div class="col-sm-5 col-xs-12">First date</div>
<div class="col-sm-5 col-xs-12">End date</div>

<form method="post" class="in-line inline" action="<?php echo base_url();?>transaction/laporan_outgoing_master" target="new">
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg1" id="tg1" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-4 col-xs-12"><input type="text" class="form-control" name="tg2" id="tg2" readonly="readonly" value="<?php echo date('Y-m-d');?>"></div>
<div class="col-sm-2 col-xs-12">
  <button class="btn btn-small btn-blue" id="btnsort" type="button"><i class="fa fa-search"></i> Sort</button></div>
<div class="col-sm-2 col-xs-12">
  <button class="btn btn-small btn-blue" id="btnprint" type="submit"><i class="fa fa-print"></i> Print View</button></div>
</form>

<div class="col-sm-11 col-xs-12">
  <label class="label label-grey">Search by SAMU/Master No</label></div>
<div class="col-sm-9 col-xs-12 text-right"><input type="text" class="form-control" name="txtsearch" id="txtsearch" placeholder="type SMU/Master Number"></div>
<div class="col-sm-3 col-xs-12"><button class="btn btn-small btn-blue" id="btnsearch"><i class="fa fa-search"></i> Search</button></div>

</div>

</div>



</div>

<div class="row">
                <div class="col-lg-12 col-xs-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->

                
                                    <div class="form-group">
<div class="row">

<div class="col-sm-8">
<div class="col-sm-5" style="margin-left:30px"><a class="btn btn-primary btn-addnew btn-rounded" id="addinvoice" href="#modalInvoice" data-toggle="modal" title="Add item"><i class="fa fa-envelope-o"></i>&nbsp; Add Invoice</a></div>
<div class="col-sm-5 text-left" style="margin-left:-150px"><a class="btn btn-primary btn-addnew btn-rounded" id="addinvoice" href="<?php echo base_url();?>transaction/add_soa"><i class="fa fa-share-square-o"></i>&nbsp; Add SOA</a></div>
</div>


<div class="col-sm-4" style="margin-left:30px"><h2><span class="label label-large label-pink arrowed-in-right"><strong>List Outgoing Master / SMU</strong></span></h2></div>

</div>
                                        <div class="table-responsive" id="table_connote">
                                        <table width="500" class="table table-striped table-bordered table-hover" id="tblhouse">
                                              <thead>
                                                <tr align="left" style="background:#EBEBEB">
                                                  <th colspan="2"><div align="left">SMU No</div></th>
                                                  <th width="54"><div align="center">ETD</div></th>
                                                  <th width="46"><div align="center">Paycode</div></th>
                                                  <th width="58"><div align="center">Service</div></th>
                                                  <th width="48">Origin</th>
                                                  <th width="48">Destination</th>
                                                  <th width="48">Shipper</th>
                                                  <th width="50">Consigne</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Actions</div></th>
                                                </tr>
                                                </thead>
                                          <tbody>
 <?php 
 if(count($master) <=0){
	 echo '
	 <tr align="center" class="gradeX">
	 <td colspan="10"><font color="red">Record Not found !</font></td>
	 </tr>';
 }
 else
 {
 $no=1;
 foreach($master as $items){
        ?>
            
                                            <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><a class="dethouse" href="#modaladding" data-toggle="modal" id="dethouse" title="click for detail"><?php echo $items->NoSMU;?></a></div></td>
                                                    <td><div align="left"><?php echo date("d-m-Y",strtotime($items->ETD)); ?></div></td>
                                                    <td><div align="left"><?php echo $items->PayCode;?></div></td>
                                                    <td><div align="left"><?php echo $items->Service;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->Shipper;?></div></td>
                                                    <td><div align="left"><?php echo $items->Consigne;?></div></td>
                                                    <td>
                                                   <form action="<?php echo base_url();?>transaction/print_invoice_OM" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="<?php echo $items->NoSMU;?>" name=" NoSMU" />
                                                  <button class="btn btn-mini btn-warning"><i class="fa fa-print bigger-120"></i></button>
                                                                                                      <a href="<?php echo base_url();?>transaction/edit_outgoing_master/<?php echo $items->NoSMU;?>" title="Edit item">
                                                  <button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
                                                  </a>                                                   
                                                  <a href="<?php echo base_url(); ?>transaction/delete_outgoing_master/<?php echo $items->NoSMU; ?>" onClick="return confirm('Yakin Hapus No. House ( <?php echo $items->NoSMU;?> ) ?? . Ini akan menghapus sekaligus items nya !');" title="Delete item">
                                                  <button class="btn btn-mini btn-danger" type="button" ><i class="fa fa-times bigger-120"></i></button>
                                                  </a>  
                                                  </form>

                                         
                                                  </td>
                                                  </tr>
  <?php $no++;} } ?>
                                                
                                              <td width="74"></tbody>
                                            </table>
 <div align="right"> <?php echo $paginator;?></div>
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
         
 <div id="modalInvoice" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1000; position:;">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Invoice</h3>
            </div>
            <div class="smart-form scroll">
<form method="post" action="<?php echo site_url('transaction/print_save_invoice_OM')?>" target="new"> 
                  
                    <div class="modal-body">
                     
                   
<div class="form-group">
                        <label class="col-sm-3 control-label">NoSMU/SMU </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="NoSMU" type="text" class="form-control" id="idhouse" required="required" />
                        </span></div>
                        <div class="clearfix"></div>
  </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Origin &nbsp;</label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="idorigin" type="text" class="form-control" id="idorigin" required readonly="readonly"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Destination &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="iddestination" type="text" class="form-control" id="iddestination" required readonly="readonly"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">CWT &nbsp; </label>
                        <div class="col-sm-9"><span class="controls">
                        <input name="idcwt" type="text" class="form-control" id="idcwt" required readonly="readonly"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>  
<div id="detail_outgoing" class="detail_outgoing"></div>                  
  <div class="modal-footer">
<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="btn-invoice"> Generate INV</button>
    </div>
                    </div>
            
             </form> 
            </div>
        </div>
    </div>
    </div>
    
            
 <!-- ading form -->
 <div id="modaladding" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="z-index:1000; position:absolute">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Detail Master Number</h3>
            </div>
            <div class="smart-form scroll">
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-body">
                     
<div id="detail_outgoing" class="detail_outgoing">detail</div>
<div class="modal-footer">
  <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close">&nbsp;</i> Close</button>
               <!-- </form>  -->
</div>
                    </div>
            
            </div>
        </div>
    </div>
    </div>


         
<script type="text/javascript">
$("#idhouse").click(function(){
	$("#idorigin").val('');
	$("#iddestination").val('');
	$("#idcwt").val('');
	
});

 $("#btn-invoice").click(function(){
	var NoSMU=$("#NoSMU").val();
	var idorigin=$("#idorigin").val();
			$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/cek_house_invoice'); ?>",
                data: "NoSMU="+NoSMU,
                success: function(data){
				   $('.detail_outgoing').html(data);
				   	$("#idorigin").val('');
	$("#iddestination").val('');
	$("#idcwt").val('');
                }
            });
			
if(idorigin==""){
	alert('Data Tidak boleh kosong');
	return false;
}

	
 });
	 $(".dethouse").click(function(){
          var nomor=$(this).html();
             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/detail_outgoing_master'); ?>",
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
                url : "<?php echo base_url('transaction/search_outgoing_master'); ?>",
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
                url : "<?php echo base_url('transaction/search_outgoing_master'); ?>",
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
                url : "<?php echo base_url('transaction/periode_outgoing_master');?>",
       data: "tgl1="+tgl1+"&tgl2="+tgl2,
                success: function(data){
                   $('#table_connote').html(data);
                }
            });
        });

		
		
</script>