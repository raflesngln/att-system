
  
<div class="container-fluid" id="konten3">
  <div class="row" id="contentreplace3">
  <div class="col-sm-11 portlets ui-sortable" id="freecontent3" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<h2><span class="label label-inverse label-large">List House Consol</span></h2>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tablehouse">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="60">House  No</th>
                                                  <th width="77">ETD</th>
                                                  <th width="77">Destination</th>
                                                  <th width="43">PCS</th>
                                                  <th width="53">CWT</th>
                                                  <th width="61" class="text-center">Status Consol</th>
                                                  <th width="61" class="text-center"><div align="left">Shipment Type</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($houseconsol as $row) {
	 $consol=$row->Consolidation;
		 $service=($row->Service=='DOOR TO PORT' || $row->Service=='PORT TO PORT')?'<span class="label label-warning white">Direct House</span>':'<span class="label label-success white">Consolidation</span>';
		 
	 if($consol==1){
		 		 $status2='<span class="label label-success arrowed-right white"><i class="fa fa-check"></i>YES</span>';

	 } else {
		 $status2='<span class="label label-important arrowed-right white"><i class="fa fa-times"></i>NO</span>';
	 }
	 
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td>
<a href="#" onclick="detailhouse(this);"><?php echo $row->HouseNo?>
</a>
</td>
                                                    <td><?php echo date("d-m-Y",strtotime($row->ETD));?></td>
                                                    <td><div align="left"><?php echo substr($row->desti,0,50).'-'.$row->portcode?></div></td>
                                                    <td><div align="center"><?php echo $row->PCS?></div></td>
                                                    <td><div align="center"><?php echo $row->CWT?></div></td>
                                                    <td><div align="center"><?php echo $status2?></div></td>
                                                    <td><?php echo $service?></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"></div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                
</div>
</div>


<div id="modalhouse" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> House            </h3>
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
    
    <script>
function detailhouse(myid){
	var numb=$(myid).html();
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/ajax_detailHouse'); ?>",
                data: "numb="+numb,
                success: function(data){
					$("#modalhouse").modal('show'); 
					$('#labelhouse').html(numb);
                   $('#tabledetailhouse').html(data);
                }
            });
	
}
	
	</script>