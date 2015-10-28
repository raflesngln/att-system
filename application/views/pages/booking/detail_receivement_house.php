         <?php
         foreach ($list as $row) {
         
         ?>

          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name2" type="text" class="form-control"  id="name2" required="required" value="<?php echo $row->custName;?>" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> Phone</label></strong>
          <div class="col-sm-7">
           <input name="phone2" type="text" class="form-control"  id="phone2" required="required" value="<?php echo $row->Phone;?>" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Address</label></strong>
          <div class="col-sm-7">
           <textarea class="form-control select" name="address2" id="address2" readonly="readonly"><?php echo $row->Address;?></textarea>
          </div>
          <strong><label class="col-sm-4"> Code Consigne</label></strong>
          <div class="col-sm-7">
           <input name="codesigne" type="text" class="form-control"  id="codeship" required="required"/>
          </div>
 

          <?php } ?>