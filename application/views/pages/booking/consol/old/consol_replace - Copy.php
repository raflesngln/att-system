<div class="row" id="contentreplace">
                <div class="col-sm-6 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">

                                        <table class="freetable table table-nostriped table-nobordered table-hover" id="freetable" width="99%">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="6"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Free Housee</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th width="150">House No</th>
                                                  <th width="111">CWT</th>
                                                  <th width="68">PCS</th>
                                                  <th width="88">Consoled Cwt</th>
                                                  <th width="110">Remain Cwt</th>
                                                  <th width="87" class="text-center"><div align="center">Action</div></th>
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
                                                    <td>
                                                    <input type="text" name="lefthouse[]" id="lefthouse[]" value="<?php echo $free->HouseNo?>" style="width:150px"/></td>
                                                    <td>
                                                      <div align="right">
                                                        <input type="text" name="leftcwt[]" id="leftcwt[]" value="<?php echo $free->CWT?>" style="width:50px" />
                                                      </div></td>
                                                    <td>
                                                      <div align="right">
                                                        <input type="text" name="leftpcs[]" id="leftpcs[]" value="<?php echo $free->PCS?>" style="width:50px" />
                                                      </div></td>
                                                    <td>
                                                      <div align="right">
                                                        <input type="text" name="leftconsoled[]" id="leftconsoled[]" value="<?php echo $free->ConsoledCWT?>" style="width:50px"/>
                                                    </div></td>
                                                    <td>
                                                      <div align="right">
                                                        <input type="text" name="leftremain[]" id="leftremain[]" value="<?php echo $free->RemainCWT?>" style="width:50px"/>
                                                    </div></td>
                                                    <td align="center">
<button class="move_consol btn btn-mini btn-primary" type="button" value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS.'/'.$free->ConsoledCWT.'/'.$free->RemainCWT;?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
 </td>
                                                  </tr>
                <?php $no++;} ?>  
                                                   </tbody>
               								 <tfoot class="foot">
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
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
                                          

                                        <table class=" tablehas table table-striped table-bordered table-hover addedtable" id="tablehas" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="4"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Remain House in SMU</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th>House No</th>
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
                                                    <input type="hidden" name="righthouse[]" id="righthouse[]" value="<?php echo $row->HouseNo?>" /></td>
                                                    <td><?php echo $row->CWT?>
                                                    <input type="hidden" name="rightcwt[]" id="rightcwt[]" value="<?php echo $row->HouseNo?>" /></td>
                                                    <td><?php echo $row->PCS?>
                                                    <input type="hidden" name="rightpcs[]" id="rightpcs[]" value="<?php echo $row->PCS?>" /></td>
                                                    <td align="center">
                                                    
    <button value="<?php echo $row->HouseNo.'/'.$row->CWT.'/'.$row->PCS.'/'.$row->ConsoledCWT.'/'.$row->RemainCWT;?>" id="ceklish" class="ceklish btn btn-mini btn-danger" type="button" onclick="return replaceHouse(this)"><i class="fa fa-times"></i></button>
                                                    

                                                    </td>
                                                  </tr>
                <?php $no++;} } ?>  
                                                  
                                                  

                                              </tbody>
 <tfoot>
 <tr style="background-color:#F5F5F5" class="addedtable-tr">
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

