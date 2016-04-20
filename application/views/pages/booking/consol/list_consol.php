<div class="container-fluid" id="konten">
  <div class="row" id="contentreplace">
  <div class="col-sm-11 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<h3>List SMU to Consol</h3>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tabelfree">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="60">SMU No</th>
                                                  <th width="77">Destination</th>
                                                  <th width="43">PCS</th>
                                                  <th width="53">CWT</th>
                                                  <th width="61" class="text-center">Status Consol</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($master as $free) {
	 $cwt=$free->CWT;
	 $pcs=$free->PCS;
	 if($cwt <=1){
		 $status1='<label class="label label-important arrowed-in-right arrowed">NO</label>';
	 } else {
		 $status1='<span class="label label-info arrowed-in-right arrowed">YES</span>';
	 }
	 
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $free->NoSMU?></td>
                                                    <td><div align="left"><?php echo substr($free->desti,0,50).'-'.$free->portcode?></div></td>
                                                    <td><div align="center"><?php echo $free->PCS?></div></td>
                                                    <td><div align="center"><?php echo $free->CWT?></div></td>
                                                    <td>
                                                    <div align="center"><?php echo $status1?></div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"></div></td>
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