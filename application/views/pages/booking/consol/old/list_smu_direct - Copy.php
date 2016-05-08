
  
<div class="container" id="konten2">
  <div class="row" id="contentreplace2">
  <div class="col-sm-12 portlets ui-sortable" id="freecontent2" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<h2><span class="label label-inverse label-large">List SMU Direct </span></h2>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tabledirect">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="60">SMU No</th>
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
 foreach ($masterdirect as $free) {
	 $cwt=$free->CWT;
	 $pcs=$free->PCS;
	 
	 $service=($free->Service=='DOOR TO PORT' || $free->Service=='PORT TO PORT')?'<span class="label label-warning white">Direct SMU</span>':'<span class="label label-success white">Consolidation</span>';
	 
	 if($cwt <=1){
		 $status1='<span class="label label-important arrowed-right white"><i class="fa fa-times"></i>NO</span>';
	 } else {
		 $status1='<span class="label label-success arrowed-right white"> <i class="fa fa-check"></i>YES</span>';
	 }
	 
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td>
<a href="#" onclick="detailsmu2(this);"><?php echo $free->NoSMU?>
</a>
</td>
                                                    <td><?php echo date("d-m-Y",strtotime($free->ETD));?></td>
                                                    <td><div align="left"><?php echo substr($free->desti,0,50).'-'.$free->portcode?></div></td>
                                                    <td><div align="center"><?php echo $free->PCS?></div></td>
                                                    <td><div align="center"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center"><?php echo $status1?></div></td>
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


<div id="modaldetaildirect" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="width:99%">
    
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id=""><small>Detail Consol</small> Master </h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">

                   
                        <div id="tabledetaildirect">
                     

                        </div>
                     
                     
              </div>
            
           
          </div>
        </div>
    </div>
    </div>
    
    <script>
function detailsmu2(myid){
	var smu=$(myid).html();
	var status='direct';
	
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/ajax_detailSMU'); ?>",
                data: "smu="+smu+"&status="+status,
                success: function(data){
					$("#modaldetaildirect").modal('show'); 
                   $('#tabledetaildirect').html(data);
                }
            });
}
function removedirect(myid){
	var house=$(myid).val();
     var smu=$("#idmaster").val();
	 var x=confirm('Are you sure Remove house ?');
	 if(x==true){
		 
				$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/remove_house_direct'); ?>",
                data: "house="+house+"&smu="+smu,
                success: function(data){
					$("#modaldetaildirect").modal('hide'); 
                  // $('#tabledetaildirect').html(data);
                }
            });
	 } else {
	 alert('Action Canceled !');
	 }
}

	
	</script>