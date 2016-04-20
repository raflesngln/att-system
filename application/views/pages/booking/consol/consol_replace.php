<div class="row" id="contentreplace">
                <div class="col-sm-6 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<span class="span3 label label-large label-warning">Free House</span>
                                        <table class="freetable table table-nostriped table-nobordered table-hover" id="freetable">
                                              <thead>
                                                
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>Shipper-Consigne</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
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
                                                    <td><?php echo $free->HouseNo?></td>
                                                    <td><?php echo substr($free->sender,0,10).'-'.substr($free->receiver,0,10)?></td>
                                                    <td><?php echo $free->CWT?></td>
                                                    <td><?php echo $free->PCS?></td>
                                                    <td>
 
 
 <button style="display:none" value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-primary" type="button" onclick="return consol_house(this)"><i class="icon icon-share-alt icon-on-right white"></i></button>

<button class="move_consol btn btn-mini btn-primary" type="button" value="<?php echo $free->HouseNo.'/'.$free->sender.'/'.$free->CWT.'/'.$free->PCS;?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
 </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                   </tbody>
               								 <tfoot>
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"><label id="pcsfree"><?php //echo $t_cwt?></label></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                             </tfoot>
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
                                        <table class=" tablehas table table-striped table-bordered table-hover addedtable" id="tablehas" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                  <th>House No</th>
                                                  <th>Shipper-COnsigne</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $jum=count($added);
if($jum<=0){
$totcwt='0';
$totpcs='0';	
} else{
 $no=1;
 foreach ($added as $row) {
	 
	 
	 
	 
	 $cwt2=$row->CWT;
	 $t_cwt2+=$cwt2;
	 $pcs2=$row->PCS;
	 $t_pcs2+=$pcs2;
	 
	 $totcwt=$t_cwt2;
	 $totpcs=$t_pcs2;
  ?>
                                                  <tr class="addedtable-tr">
                                                    <td><?php echo $row->HouseNo?>
                                                    <input type="hidden" name="house[]" id="house[]" value="<?php echo $row->HouseNo?>" /></td>
                                                    <td><?php echo substr($row->sender,0,10).'-'.substr($row->receiver,0,10)?>
                                                    <input type="hidden" name="shipper[]" id="shipper[]" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="hidden" name="cwt2[]" id="cwt2[]" /></td>
                                                    <td><?php echo $row->PCS?>
                                                    <input type="hidden" name="pcs[]" id="pcs[]" /></td>
                                                    <td>
                                                    <button value="<?php echo $row->HouseNo.'/'.$row->sender.'/'.$row->CWT.'/'.$row->PCS;?>" id="ceklish" class="ceklish btn btn-mini btn-danger" type="button" onclick="return replace_consol(this)"><i class="fa fa-times"></i></button>
                                                    

                                                    </td>
                                                  </tr>
                <?php $no++;} } ?>  
                                                  
                                                  

                                              </tbody>
 <tfoot>
 <tr style="background-color:#F5F5F5" class="addedtable-tr">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><input type="text" class="totcwt" value="<?php echo $totcwt?>" name="totcwt" style="width:50px" /></td>
                                                  <td><div align="right">
                                                    <input type="text" class="totpcs" value="<?php echo $totpcs?>" name="totpcs" style="width:50px" />
                </div></td>
                                                  <td>&nbsp;</td>
              </tr>
</tfoot>   
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
</div>

