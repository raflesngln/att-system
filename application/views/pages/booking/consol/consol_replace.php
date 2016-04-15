<div class="row" id="contentreplace">
                <div class="col-sm-6 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<span class="span3 label label-large label-warning">Free House</span>
                                        <table border="0" class="table table-nostriped table-nobordered table-hover" id="tabelfree">
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
                                                    <td><?php echo substr($free->sender,0,10).'-'.substr($free->receiver,0,10)?></td>
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
                                        <?php 
$no=1;
			foreach($list as $data){
				
			?>
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                <div class="col-sm-6 portlets ui-sortable" id="added">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
   <div class="form-group">
   <div class="table-responsive" id="table_responsive">
                                          
<span class="span4 label label-large label-warning">Remain House in Master</span>
                                        <table class="table table-nostriped table-nobordered table-hover addedtable" id="addedtable" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="63">House No</th>
                                                  <th width="40">Shipper-Consigne</th>
                                                  <th width="40">PCS</th>
                                                  <th width="40">CWT</th>
                                                  <th width="43" class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($added as $row) {
	 $cwt2=$row->CWT;
	 $t_cwt2+=$cwt2;
  ?>
                                                  <tr class="addedtable-tr">
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $row->HouseNo?></td>
                                                    <td><?php echo substr($row->sender,0,10).'-'.substr($row->receiver,0,10)?></td>
                                                    <td><div align="right"><?php echo $row->PCS?></div></td>
                                                    <td><div align="right"><?php echo $row->CWT?></div></td>
                                                    <td><div align="center">
                                                    <button value="<?php echo $row->HouseNo.'/'.$row->CWT.'/'.$row->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-danger" type="button" onclick="return reconsol_house(this)"><i class="icon icon-undo white"></i></button>
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5" class="addedtable-tr">
                                                  <td>&nbsp;</td>
                                                  <td>Total</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"><?php echo $t_cwt2?></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>

                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
</div>
