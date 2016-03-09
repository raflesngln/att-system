<div class="row" id="konten">
                <div class="col-lg-5 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<span class="span3 label label-large label-pink arrowed-in-right">Free House</span>
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>House No</th>
                                                  <th>Shipper</th>
                                                  <th>QTY</th>
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
                                                    <td><?php echo $free->custName?></td>
                                                    <td><?php echo $free->grandPCS?></td>
                                                    <td><div align="right"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center">
                                                      <input type="checkbox" name="ck2" class="ace-checkbox-2" />
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td colspan="3">Total</td>
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
                <div class="col-lg-6 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
   <div class="form-group">
   <div class="table-responsive" id="table_responsive">
                                          
<span class="span4 label label-large label-pink arrowed-in-right">Consolidation House added</span>
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                
                                                  <th>No.</th>
                                                  <th>House No</th>
                                                  <th>Shipper</th>
                                                  <th>QTY</th>
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
                                                    <td><?php echo $free->custName?></td>
                                                    <td><?php echo $free->grandPCS?></td>
                                                    <td><div align="right"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center">
                                                      <input type="checkbox" name="ck2" class="ace-checkbox-2" />
                                                    </div></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td colspan="3">Total</td>
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
</div>