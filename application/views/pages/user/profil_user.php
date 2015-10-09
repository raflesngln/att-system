
   <div class="row-fluid">

   <?php
   foreach ($userprofil as $row) {
    
  
   ?>
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
      <div class="header col-md-5">

<div class="profile-contact-links align-left">
<h2> <img class="nav-user-photo" src="<?php echo base_url();?>asset/images/user.png" height="150" width="150"/> </h2>

<label class="col-sm-12"><span class="span5 label label-large label-info arrowed-in arrowed-in-right">&nbsp; <?php echo $row->FullName;?>&nbsp;</span></label>

 <ul class="unstyled spaced">
  <li><i class="icon-caret-right green"></i>Username  : <?php echo $row->UserName;?></li>
  <li><i class="icon-caret-right green"></i></i>Username  : <?php echo $row->Email;?></li>
 <li><i class="icon-caret-right green"></i></i>Level  : <?php echo $row->Level;?></li>

       </ul>
  </div>

</div>
      
<br style="clear:both">

<form method="post" action="<?php echo base_url();?>user/change_profil">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-9">      
      <div class="col-sm-11">
                 <input type="hidden" name="iduser" value="<?php echo $row->id_user;?>">      
          <strong><label class="col-sm-4">Full Name</label></strong>
          <div class="col-sm-7">
           <input name="fullname" type="text" class="form-control"  id="name" required="required" value="<?php echo $row->FullName;?>"  />
          </div>
          <strong><label class="col-sm-4">UserName</label></strong>
          <div class="col-sm-7">
           <input name="username" type="text" class="form-control"  id="name" required="required" value="<?php echo $row->UserName;?>" Readonly="readonly" />
          </div>
             
          <strong><label class="col-sm-4"> Email</label></strong>
          <div class="col-sm-7">
           <input name="email" type="email" class="form-control"  id="name" required="required" value="<?php echo $row->Email;?>" />
          </div>
<div class="col-sm-12">&nbsp;</div>
          <strong><label class="col-sm-4"> Old Password</label></strong>
          <div class="col-sm-5">
           <input name="old" type="password" class="form-control"  id="name" Placeholder="old password"/>
          </div>
            <label class="col-sm-3" style="font-size:12px">
           Biarkan password kosong jika tidak ingin diubah
          </label>

          <strong><label class="col-sm-4"> New Password</label></strong>
          <div class="col-sm-5">
           <input name="new" placeholder="new password" type="password" class="form-control"/>
           <div class="clearfx"></div>
          </div>
          <strong><label class="col-sm-4"> Retype New Password</label></strong>
          <div class="col-sm-5">
           <input name="retype" placeholder="Re-type new password" type="password" class="form-control"/>
          </div>
          <div class="clearfx"></div>

      </div>

                           
      </div>
       
      <div class="col-sm-12"><h1>&nbsp;</h1></div>
<div class="col-sm-12">
  <div class="row">
    <div class="col-sm-4"></div>
    <div class="col-sm-4"><button class="btn btn-primary btn-md"><i class="icon icon-save"></i>&nbsp;Save Changes</button></div>
  </div>

</div>
    </div>
</div>
</form>
</div>
<?php } ?>
<br style="clear:both;margin-bottom:40px;">

          