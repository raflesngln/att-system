
  
<div class="container-fluid" id="konten2">
  <div class="row" id="contentreplace2">
  <div class="col-sm-11 portlets ui-sortable" id="freecontent2" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<h2><span class="label label-inverse label-large">List SMU  Consol</span></h2>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tablesmu">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="60">SMU No</th>
                                                  <th width="77">Destination</th>
                                                  <th width="43">PCS</th>
                                                  <th width="53">CWT</th>
                                                  <th width="61" class="text-center">Status Consol</th>
                                                  <th width="61" class="text-center">Detail</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($masterconsol as $free) {
	 $cwt=$free->CWT;
	 $pcs=$free->PCS;
	 if($cwt <=1){
		 $status1='<span class="badge badge-important white"><i class="fa fa-times"></i> NO</span>';
	 } else {
		 $status1='<span class="badge badge-success white"><i class="fa fa-check"></i> YES</span>';
	 }
	 
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $free->NoSMU?></td>
                                                    <td><div align="left"><?php echo substr($free->desti,0,50).'-'.$free->portcode?></div></td>
                                                    <td><div align="center"><?php echo $free->PCS?></div></td>
                                                    <td><div align="center"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center"><?php echo $status1?></div></td>
                                                    <td><button class="btn btn-mini btn-primary btndet" value="<?php echo $free->NoSMU?>" onclick="detailsmu(this);"><i class="fa fa-eye"></i> Details</button></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
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


<div id="modaldetailsmu" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> Master </h3><span id="labelsmu" class="label label-info arrowed-in-right arrowed text-uppercase"></span>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                  <h5>List House Consol </h5>    
                        <div id="tabledetail">
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
                     
                      <div class="modal-footer"></div>
              </div>
            
           
          </div>
        </div>
    </div>
    </div>
    
    <script>
function detailsmu(myid){
	var smu=$(myid).val();

             // alert('hai' + idcnote);
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/ajax_detailSMU'); ?>",
                data: "smu="+smu,
                success: function(data){
					$("#modaldetailsmu").modal('show'); 
					$('#labelsmu').html(smu);
                   $('#tabledetail').html(data);
                }
            });
	
}
	
	</script>