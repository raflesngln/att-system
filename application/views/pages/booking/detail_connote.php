<div class="smart-form scroll">
<?php
foreach($connote as $row){
	
?>
        <!-- <form method="post" action="<?php //echo site_url('temp/save_item')?>">   -->
                    <div class="modal-bodyyyy">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Tanggal</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tgl2" type="text" class="form-control"  id="tgl2" value="<?php echo $row->ETD;?>"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Tujuan</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="tujuan" type="text" class="form-control"  id="tujuan" value="<?php echo $row->Origin;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Layanan</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="layanan" type="text" class="form-control"  id="layanan" value="<?php echo $row->Service;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
 <div class="form-group">
                        <label class="col-sm-3 control-label">Jumlah</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jml" type="text" class="form-control" onkeypress="return isNumberKey(event)" id="jml" value="<?php echo $row->GrossWeight;?>" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
            <label class="col-sm-3 control-label">Berat</label>
            <div class="col-sm-9"><span class="controls">
                <input name="berat" type="text" class="form-control" onkeypress="return isNumberKey(event)" value="<?php echo $row->GrossWeight;?>" id="berat" />
</span></div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">Jenis</label>
                        <div class="col-sm-9"><span class="controls">
                          <input name="jenis" type="text" class="form-control" id="jenis" value="<?php echo $row->Service;?>"/>
</span></div>
                        <div class="clearfix"></div>
                      </div>                    

  <div class="modal-footer"></div>
                    </div>
            <?php } ?>
               <!-- </form>  -->
            </div>
 
