<?php
foreach($connote as $row){
	
?>
                    <div class="modal-bodyyyy">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Date</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="date" type="text" class="form-control"  id="date" value="<?php echo $row->ETD;?>" readonly="readonly"/>
</span></div>
                        
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Origin</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="origin" type="text" class="form-control"  id="origin" value="<?php echo $row->Origin;?>" readonly="readonly" />
</span></div>
                        
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Destination</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="destination" type="text" class="form-control"  id="destination" value="<?php echo $row->Destination;?>" readonly="readonly" />
</span></div>
                        
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Service</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="service" type="text" class="form-control"  id="service" value="<?php echo $row->Service;?>" readonly="readonly" />
</span></div>
                        
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jml" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="jml" value="<?php echo $row->grandPCS;?>" readonly="readonly" />
</span></div>
                       
                      </div>
<div class="form-group">
            <label class="col-sm-3 control-label">CWT</label>
            <div class="col-sm-9"><span class="controls">
                <input name="cwt" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo $row->CWT;?>" id="cwt" readonly="readonly" />
</span></div>
                        
                      </div>
<div class="modal-footer"></div>
                    </div>
            <?php } ?>
            
 
