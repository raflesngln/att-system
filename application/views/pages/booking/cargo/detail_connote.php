<?php
foreach($connote as $row){
	
?>
                    <div class="modal-bodyyyy">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tgl2" type="text" class="form-control"  id="tgl2" value="<?php echo $row->ETD;?>" readonly="readonly"/>
</span></div>
                        
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Tujuan</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tujuan" type="text" class="form-control"  id="tujuan" value="<?php echo $row->Origin;?>" readonly="readonly" />
</span></div>
                        
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Layanan</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="layanan" type="text" class="form-control"  id="layanan" value="<?php echo $row->Service;?>" readonly="readonly" />
</span></div>
                        
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jml" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="jml" value="<?php echo $row->grandPCS;?>" readonly="readonly" />
</span></div>
                       
                      </div>
<div class="form-group">
            <label class="col-sm-3 control-label">Berat</label>
            <div class="col-sm-9"><span class="controls">
                <input name="berat" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo $row->grandVolume;?>" id="berat" readonly="readonly" />
</span></div>
                        
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Jenis</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jenis" type="text" class="form-control" id="jenis" value="<?php echo $row->Service;?>" readonly="readonly"/>
</span></div>
                        
                      </div>                    

  <div class="modal-footer"></div>
                    </div>
            <?php } ?>
            
 
