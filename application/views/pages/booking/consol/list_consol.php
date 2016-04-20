<div class="container-fluid" id="konten">
  <div class="row" id="contentreplace">
  <div class="col-sm-10 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<span class="span3 label label-large label-warning ">Free House</span>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tabelfree">
                                              <thead>
                                                
                                                  <tr>
                                                  <th>No.</th>
                                                  <th>House No</th>
                                                  <th>Shipper-Consigne</th>
                                                  <th>PCS</th>
                                                  <th>CWT</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($freehouse as $free) {
	 $cwt=$free->CWT;
	 $t_cwt+=$cwt;
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $free->HouseNo?></td>
                                                    <td><div align="left"><?php echo substr($free->sender,0,10).'-'.substr($free->receiver,0,10)?></div></td>
                                                    <td><div align="right"><?php echo $free->PCS?></div></td>
                                                    <td><div align="right"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center">
 
 
 <button value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-primary" type="button" onclick="return consol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>
 
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>Total</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"><?php echo $t_cwt?></div></td>
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