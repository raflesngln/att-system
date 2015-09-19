<?php //session_start();?>
<?php if($this->session->userdata('login_status')==TRUE) { ?>

<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>My</strong>Profile</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li class="active">My Profile</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                                <form action="<?php echo base_url()?>admin/update_password" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" id="id" value="<?php echo $this->session->userdata('id');?>" />
                                    
                         <p align="center"><?php echo isset($message)? $message:'';?></p>
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            <form action="<?php echo base_url();?>proyek/save_proyek" method="post">
                                                <div class="form-group">
                                                    <label for="nama" class="col-sm-2 control-label">Name</label>
                                                    <div class="col-sm-10">
                                                      <input name="nama" class="form-control" type="text" id="nama" value="<?php echo $this->session->userdata('name');?>" placeholder="Name" />  
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="col-sm-2 control-label">Username</label>
                                                    <div class="col-sm-10">
                                                        <input name="username" type="text" class="form-control" id="username" value="" placeholder="Type Username" />
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nama" class="col-sm-2 control-label">Password</label>
                                                    <div class="col-sm-10">
                                                      <input type="password" name="password" id="password" class="form-control" required="required" placeholder="Old Password" /></td>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
     <div class="form-group">
                                                    <label for="nama" class="col-sm-2 control-label">New Password</label>
                                                    <div class="col-sm-10">
                                                      <input type="password" name="baru" id="baru" class="form-control" required="required" placeholder="New Password" /></td>
                                                    </div>
                                                    <div class="clearfix"></div>
                                              </div>
                                                <div class="form-group">
                                                    <label for="nama" class="col-sm-2 control-label">Confirm  Password</label>
                                                    <div class="col-sm-10">
                                                      <input type="password" name="ulang" id="ulang" class="form-control" required="required" placeholder="Confirm New Password"/></td>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            <div class="form-group">
                                                <div class="col-md-2 pull-right"><button type="submit" name="button" id="button" class="btn btn-primary btn-large"><i class="icon-check icons">&nbsp;</i> Save</button></div>
                                                <div class="clearfix"></div>
                                            </div>    
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



</form>

<?php } 
else
{
echo'<a href="login">Login User</a>';	
}
?>