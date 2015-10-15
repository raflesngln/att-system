         <?php
         foreach ($list as $row) {
         
         ?>

          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name1" type="text" class="form-control"  id="name1" required="required" value="<?php echo $row->custName;?>" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> Phone</label></strong>
          <div class="col-sm-7">
           <input name="phone1" type="text" class="form-control"  id="phone1" required="required" value="<?php echo $row->Phone;?>" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Address</label></strong>
          <div class="col-sm-7">
           <textarea class="form-control select" name="address1" id="address1" readonly="readonly"><?php echo $row->Address;?></textarea>
          </div>
          <strong><label class="col-sm-4"> Code Shipper</label></strong>
          <div class="col-sm-7">
           <input name="codeship" type="text" class="form-control"  id="codeship" required="required"/>
          </div>
          <strong><label class="col-sm-4"> Commodity</label></strong>
          <div class="col-sm-7">
           <select name="commodity" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>

          <?php } ?>