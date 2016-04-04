<div class="row-fluid">
<span class="span6">
<div class="form-group">
                        <label class="col-sm-4 control-label">  Line Business </label>
                        <div class="col-sm-8"><span class="controls">
                        <select name="linebusiness" id="linebusiness" class="form-control">
          <option value="">Chose linebusiness</option>
          <?php
	foreach($linebusiness as $lb){
	    ?>
          <option value="<?php echo $lb->LineBusinessID;?>"><?php echo $lb->LineBusinesName;?></option>
          <?php } ?>
</select>
    </span></div>
                        <div class="clearfix"></div>
  </div>
 
 
  
 
  

</span>



<span class="span6">
<div class="form-group">
<label class="col-sm-4 control-label">  Commodity</label>

  <div class="col-sm-8"><span class="controls">
    <select name="commodity" id="commodity" class="form-control">
      <option value="">Chose commodity</option>
      <?php
	foreach($commodity as $comm){
	    ?>
      <option value="<?php echo $comm->CommCode;?>"><?php echo $comm->CommName;?></option>
      <?php } ?>
    </select>
  </span></div>

                        <div class="clearfix"></div>
  </div>
 
 
  
                       
</span>		
</div>