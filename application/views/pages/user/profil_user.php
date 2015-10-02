

   <div class="row-fluid">
    <div class="span12">
                  <?php
      if(isset($eror)){?>
            <label class="alert alert-error col-sm-12">
      <button type="button" class="close" data-dismiss="alert">
      <i class="icon-remove"></i> </button>             
      <?php echo isset($eror)?$eror:'';?>
      <br />
      </label>
            <?php }?>   
      <div class="header col-md-11">

                <h2> <img class="nav-user-photo" src="<?php echo base_url();?>asset/images/user.png" height="150" width="150"/> &nbsp; User Profil</h2>
      </div>
      

<br style="clear:both">

<form method="post" action="<?php echo base_url();?>trasaction/save_shipment">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6">      
      <div class="col-sm-11">
                       
          <strong><label class="col-sm-4"> Booking No</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly" />
          </div>
          <strong><label class="col-sm-4"> Customer Acc</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
                    <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
                    <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>
          <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7">
           <input name="etd" placeholder="<?php echo date("m/d/Y") ;?>" type="text" class="form-control"  id="tgl" required="required" readonly="readonly"/>
          </div>

      </div>

                           
      </div>
                <!--RIGHT INPUT-->
      <div class="col-sm-6">
        <div class="col-sm-11">
        <strong><label class="col-sm-4">Date Of Issue</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" readonly="readonly"/>
          </div>

          <strong><label class="col-sm-4"> &nbsp;</label></strong>
          <div class="col-sm-7">
           <p><hr></p>

          </div>

          <strong><label class="col-sm-4"> Consignee</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
          <strong><label class="col-sm-4"> Name</label></strong>
          <div class="col-sm-7">
           <input name="name" type="text" class="form-control"  id="name" required="required" />
          </div>
              <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7">
           <select name="filter" id="filter" class="form-control">
            <option value="empName">Name</option>
          <option value="Address">Address</option>
          </select>
          </div>

          </div>
                       
            
      </div>
   </div>
<br style="clear:both;margin-bottom:40px;">

          