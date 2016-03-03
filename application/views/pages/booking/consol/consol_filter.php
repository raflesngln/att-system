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
                                                  <tr>
                                                  <td>1</td>
                                                  <td>xxx</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>
                                                  <div align="center">
                                                <input type="checkbox" name="ck" class="ace-checkbox-2"> 
                                                 
                                                  </div>
                                                  </td>
                                                </tr>
                                        <?php 
$no=1;
      foreach($list as $data){
        
      ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->custName?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledit<?php echo $data->discCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
                                                      <a href="<?php echo base_url();?>master/delete_disc/<?php echo $data->discCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                        <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                      </a>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                                 <tr>
                                                  <td colspan="9">&nbsp;</td>
                                                </tr>
                                                <thead>
                                                 <tr>
                                                  <td><b>Total</b></td>
                                                  <td></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong>xxx</strong></td>
                                                  <td><strong>xxx</strong></td>
                                                  <td></td>  
                                                
                                                </tr>
                                                </thead>
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
                                                  <tr>
                                                  <td>1</td>
                                                  <td>xxx</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>999</td>
                                                  <td>
                                                  <div align="center">
                                                <input type="checkbox" name="ck" class="ace-checkbox-2"> 
                                                 
                                                  </div>
                                                  </td>
                                                </tr>
                                        <?php 
$no=1;
      foreach($list as $data){
        
      ?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $no?></th>
                                                    <td><?php echo $data->custName?></td>
                                                    <td><?php echo $data->Name?></td>
                                                    <td class="text-center"><div align="center"><a class="btn-action" href="#modaledit<?php echo $data->discCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i>
                                                      <button class="btn btn-mini btn-info"><i class="icon-edit bigger-120"></i></button>
                                                      </a>
                                                      
                                                      <a href="<?php echo base_url();?>master/delete_disc/<?php echo $data->discCode?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete">
                                                        <button class="btn btn-mini btn-danger"><i class="icon-trash bigger-120"></i></button>
                                                      </a>          
                                                    </div></td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                                 <tr>
                                                  <td colspan="9">&nbsp;</td>
                                                </tr>
                                                <thead>
                                                 <tr>
                                                  <td><b>Total</b></td>
                                                  <td></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong>xxx</strong></td>
                                                  <td><strong>xxx</strong></td>
                                                  <td></td>  
                                                
                                                </tr>
                                                </thead>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>

      <div class="clearfix clearfx"></div>
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger btn-addnew" href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Process Consol</button>
                                        </div>  </div>     
                                      </div>
      </form>
  </div>
            </div>