<div class="row" id="contentreplace">
                <div class="col-sm-7 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">

                                        <table class="freetable table table-nostriped table-nobordered table-hover" id="freetable" width="99%">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="9"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Free Housee</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th width="150">House</th>
                                                  <th width="111">CSHIP</th>
                                                  <th width="111">CWT</th>
                                                  <th width="68">PCS</th>
                                                  <th width="88"> (C)CWT</th>
                                                  <th width="110">(R)CWT</th>
                                                  <th width="87" class="text-center">(C)PCS</th>
                                                  <th width="87" class="text-center">(R)PCS</th>
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
                                                    <input type="text" name="lefthouse[]" id="lefthouse[]" value="<?php echo $free->HouseNo?>" style="width:100px"/>
                                                    <input type="hidden" name="leftcommodity[]" id="leftcommodity[]" value="<?php echo $free->Commodity?>" style="width:50px"/></td>
                                                    <td><input type="text" name="leftshipper[]" id="leftshipper[]" value="<?php echo $free->CodeShipper?>" style="width:50px" /></td>
                                                    <td>
                                              
                                                        <input type="text" name="leftcwt[]" id="leftcwt[]" value="<?php echo $free->CWT?>" style="width:40px" />
                                                     </td>
                                                    <td>
                                                  
                                                        <input type="text" name="leftpcs[]" id="leftpcs[]" value="<?php echo $free->PCS?>" style="width:40px" />
                                                     </td>
                                                    <td>
                                                    
                                                        <input type="text" name="leftconsoled[]" id="leftconsoled[]" value="<?php echo $free->ConsoledCWT?>" style="width:40px"/>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="leftremain[]" id="leftremain[]" value="<?php echo $free->RemainCWT?>" style="width:40px"/></td>
                                                    <td><input type="text" name="leftconsoledpcs[]" id="leftconsoledpcs[]" value="<?php echo $free->ConsoledPCS?>" style="width:40px"/></td>
                                                    <td><input type="text" name="leftremainpcs[]" id="leftremainpcs[]" value="<?php echo $free->RemainPCS?>" style="width:40px"/>
                                                    <input type="hidden" name="leftcommodity[]" id="leftcommodity[]" value="<?php echo $free->Commodity?>" style="width:40px"/></td>
                                                    <td align="center">
  <button name="leftbutton[]" class="move_consol btn btn-mini btn-primary" type="button" value="<?php echo $free->HouseNo.'/'.$free->CWT.'/'.$free->PCS.'/'.$free->ConsoledCWT.'/'.$free->RemainCWT.'/'.$free->Commodity.'/'.$free->CodeShipper.'/'.$free->ConsoledPCS.'/'.$free->RemainPCS;?>" onClick="move_consol(this)"><i class="fa fa-check"></i></button>
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
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"><label id="pcsfree"><?php //echo $t_cwt?></label></div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                             </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                <div class="col-sm-5 portlets ui-sortable" id="added">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
   <div class="form-group">
   <div class="table-responsive" id="table_responsive">
                                          

                                        <table class=" tablehas table table-striped table-bordered table-hover addedtable" id="tablehas" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                                              <thead>
                                                
                                                  <tr>
                                                    <th colspan="6"><span class="span4 label label-large label-inverse" style="text-align:left;padding-top:7px">Remain House in SMU</span></th>
                                                  </tr>
                                                  <tr>
                                                  <th>House</th>
                                                  <th>CSHIP</th>
                                                  <th>CWT</th>
                                                  <th>PCS</th>
                                                  <th class="text-center">..</th>
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
                                                    <td><input type="text" name="righthouse[]" id="righthouse[]" value="<?php echo $row->HouseNo?>" style="width:70px"/></td>
                                                    <td><input type="text" name="rightshipper[]" id="rightshipper[]" value="<?php echo $row->CodeShipper?>" style="width:40px"/></td>
                                                    <td><input type="text" name="rightcwt[]" id="rightcwt[]" value="<?php echo $row->CWT?>" style="width:40px"/></td>
                                                    <td><input type="text" name="rightpcs[]" id="rightpcs[]" value="<?php echo $row->PCS?>" style="width:40px"/></td>
                                                    <td align="center"><input type="hidden" name="rightconsoled[]" id="rightconsoled[]" value="<?php echo $row->ConsoledCWT?>" style="width:40px"/>
                                                    <input type="hidden" name="remainconsoled[]" id="remainconsoled[]" value="<?php echo $row->RemainCWT?>" style="width:40px"/>
                                                    <input type="hidden" name="rightconsoledpcs[]" id="rightconsoledpcs[]" value="<?php echo $row->ConsoledPCS?>" style="width:40px"/>
                                                    <input type="hidden" name="rightremainpcs[]" id="rightremainpcs[]" value="<?php echo $row->RemainPCS?>" style="width:40px"/>
                                                    <input type="hidden" name="rightcommodity[]" id="rightcommodity[]" value="<?php echo $row->Commodity?>" style="width:40px"/></td>
                                                    <td align="center">
                                                      
                                                      <button name="rightbutton[]" value="<?php echo $row->HouseNo.'/'.$row->CWT.'/'.$row->PCS.'/'.$row->ConsoledCWT.'/'.$row->RemainCWT.'/'.$row->Commodity.'/'.$row->CodeShipper.'/'.$row->ConsoledPCS.'/'.$row->RemainPCS;?>" id="ceklish" class="ceklish btn btn-mini btn-danger" type="button" onclick="return replaceHouse2(this)"><i class="fa fa-times"></i></button>
                                                      
                                                      
                                                    </td>
                                                  </tr>
                <?php $no++;} } ?>  
                                                  
                                                  

                                              </tbody>
 <tfoot>
 <tr style="background-color:#F5F5F5" class="addedtable-tr">
                                                  <td>&nbsp;</td>
                                                  <td align="right">&nbsp;</td>
                                                  <td align="right"><input type="text" class="totcwt" value="<?php echo $totcwt?>" name="totcwt" style="width:40px" /></td>
                                                  <td><div align="right">
                                                    <input type="text" class="totpcs" value="<?php echo $totpcs?>" name="totpcs" style="width:40px" />
                </div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
              </tr>
</tfoot>   
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
</div>

