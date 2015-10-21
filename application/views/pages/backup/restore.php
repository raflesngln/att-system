
   <div class="row-fluid">
    <div class="span12">
    <?php  if(isset($message)){?>
    <h2><label class="alert alert-<?php echo $status;?> col-sm-12"><?php echo isset($message)?$message:'';?><button type="button" class="close" data-dismiss="alert"><i class="icon-remove"></i> </button> </label></h2>
					<?php } ?>   				
	
      <div class="header col-md-11">
                <h3><i class="fa fa-history bigger-230"></i> &nbsp; <strong></strong> Restore Database</h3>
            </div>
      

<br style="clear:both">

<form method="post" action="<?php echo base_url();?>master/restore" enctype="multipart/form-data">
<div class="container" style="">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-3">      
      <div class="col-sm-12">
          <h4>&nbsp;</h4>     
          <strong><label class="col-sm-10">Chose File SQL</label></strong>
       
      </div>
  </div>

  <!--MIDLE SEPARATE-->
   <div class="col-sm-8">
   <h1>&nbsp;SQL File</h1>
   
    <label><input type="file" name="fileku" class="form-control"></label>
   </div>
 

   </div>


</div>
<div class="cols-sm-12">&nbsp;</div>
<div class="row"> 
 <div class="col-sm-3"></div>
<input type="submit" value="Restore Data" class="btn btn-primary">
</div>
</form>


      </div>
  </div>
            
  
