
       <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  

   <div class="row-fluid">
    <div class="container">
    <div class="col-sm-12">
    <div class="row">
    <div class="col-sm-6">
    lorem ipsum dolor sit amet
    <div class="form-group">       
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <?php echo $_POST['job'].'JUGBHJUIBGJUIBVGUJBUUUUUUUUUUUUUUUUUUUUUUUUUUUU';?></div><div class="clearfix"></div>
          </div>
 
    </div>
     <div class="col-sm-6">
    lorem ipsum dolor sit amet
    </div>
    
    </div>
    </div>
    
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

                <h3><i class="fa fa-ok"></i> &nbsp;Confirm Outgoing - House</h3>
            </div>
      

<br style="clear:both">
<form method="post" action="<?php echo base_url();?>transaction/confirm_outgoing_house" target="_blank">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-6"> 
       
<div class="col-sm-12">
<label class="col-sm-12"> <span class=" span3 label label-large label-pink arrowed-in-right">Sender</span></label> 
</div>
<div class="clearfx">&nbsp;</div>

<div class="form-group">       
          <strong><label class="col-sm-4"> JOB No</label></strong>
          <div class="col-sm-7">
           <?php echo $_POST['job'].'JUGBHJUIBGJUIBVGUJBUUUUUUUUUUUUUUUUUUUUUUUUUUUU';?>
          </div>
 </div><div class="clearfix"></div>
 <div class="form-group">       
          <strong><label class="col-sm-4"> House No</label></strong>
          <div class="col-sm-7">
           <?php echo $_POST['house'];?>
          </div>
 </div><div class="clearfix"></div>
 <div class="form-group"> 
          <strong><label class="col-sm-4"> Payment Type</label></strong>
          <div class="col-sm-7"><?php echo $_POST['paymentype'];?>
          </div>
</div><div class="clearfix"></div>
<div class="form-group">   
          <strong><label class="col-sm-4"> Service</label></strong>
          <div class="col-sm-7"><?php echo $_POST['service'];?></div>
</div><div class="clearfix"></div>
<div class="form-group">           
          <strong><label class="col-sm-4"> Origin</label></strong>
          <div class="col-sm-7"><?php echo $_POST['origin'];?></div>
</div><div class="clearfix"></div><div class="clearfix">  
 <div class="form-group">       
    	  <strong><label class="col-sm-4"> Destination</label></strong>
          <div class="col-sm-7"><?php echo $_POST['desti'];?></div>
</div><div class="clearfix"></div>

<div class="form-group"> 
          <strong><label class="col-sm-4"> Shipper</label></strong>
          <div class="col-sm-7"><?php echo $_POST['desti'];?></div>
</div><div class="clearfix"></div>
<div class="form-group">
        <div class="col-sm-12" id="contenshipper">
        <!-- CONTENT AJAX VIEW HERE -->
        </div>
</div><!-- end of left form -->
                <!--RIGHT INPUT-->
<div class="col-sm-6">
    <div class="col-sm-12">
    <label class="col-sm-12"><span class="span3 label label-large label-pink arrowed-in-right">Receivement</span></label> 
    </div>
<div class="clearfx">&nbsp;</div>

<div class="form-group"> 
        <strong><label class="col-sm-4">Booking No</label></strong>
        <div class="col-sm-7"><?php echo $_POST['booking'];?></div>
</div><div class="clearfix"></div>
<div class="form-group"> 
          <strong><label class="col-sm-4"> ETD</label></strong>
          <div class="col-sm-7"><?php echo $_POST['etd'];?></div>
</div><div class="clearfix"></div>
<div class="form-group">
<div class="col-sm-12"><h1>&nbsp;</h1></div>

</div><div class="clearfix"></div>
<div class="form-group">
           <strong><label class="col-sm-4"> Consigne</label></strong>
           <div class="col-sm-7"><?php echo $_POST['idconsigne'];?></div> 
</div><div class="clearfix"></div>
<div class="form-group">
          <div class="col-sm-12" id="contencnee"><!-- CONTENT AJAX VIEW HERE --></div>
</div>
	</div>
		</div>
<!-- END OF SENDER N RECEIVER FORM VIEW -->


<br style="clear:both;margin-bottom:40px;">
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
<h2><span class="label label-large label-pink arrowed-in-right"><strong>List Item's</strong></span></h2>
                                        <div class="table-responsive" id="table_responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                              <thead>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>No Of Pcs</th>
                                                  <th>Length ( P )</th>
                                                  <th>Width ( L )</th>
                                                  <th>Height ( T )</th>
                                                  <th>Volume</th>
                                                </tr>
                                          <th colspan="6"></th>
                                                
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_volume+=$items['v'];
        ?>
                                                  <tr align="right">
                                                  <td><div align="center"><?=$no;?></div></td>
                                                  <td><input name="pcs[]" type="hidden" id="pcs[]" value="<?php echo $items['qty']; ?>" />                                                    <?php echo $items['qty']; ?></td>
                                                  <td><input name="p[]" type="hidden" id="p[]" value="<?php echo $items['p']; ?>" />                                                    <?php echo $items['p']; ?></td>
                                                  <td><input name="l[]" type="hidden" id="l[]" value="<?php echo $items['l']; ?>" />                                                    <?php echo $items['l']; ?></td>
                                                  <td><input name="t[]" type="hidden" id="t[]" value="<?php echo $items['t']; ?>" />                                                    <?php echo $items['t']; ?></td>
                                                  <td><input name="v[]" type="hidden" id="v[]" value="<?php echo $items['v']; ?>" />                                                    <?php echo number_format($items['v'],2,'.',',');?></td>
                                                </tr>
  <?php $no++;} ?>
                                          <thead>
                                                 <tr align="right">
                                                  <td><b>Total</b></td>
                                                  <td><?php echo $t_item;?><input type="hidden" name="t_item" value="<?php echo $t_item;?>"></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="<?php echo $t_volume;?>" />                                                    <?php echo number_format($t_volume,2,'.',',');?></td>  
                                            </tr>
                                          </thead>
                                              </tbody>
                                          </table>
                                        </div>
                                    </div>
  
  <!-- LEFT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">

                                              <div class="col-md-12">
                                              <label class="col-sm-4">Commodity &nbsp;</label>
                                              <div class="col-sm-7"><?php echo $_POST['commodity'];?></div>
                                                </div>
<div class="col-md-12">
<label class="col-sm-4">Gross Weight</label>
  <div class="col-sm-7"><?php echo $_POST['grossweight'];?></div>
</div>
                                              <div class="col-md-12">
                                              <label class="col-sm-4">Special Instructions &nbsp;</label>
                                              <div class="col-sm-7"><?php echo $_POST['special'];?></div>
                                             </div>
  
                                              </div>
                                            </div>
  <!-- END LEFT INPUT -->
  <!-- RIGHT INPUT  -->
                                            <div class="col-md-6">
                                              <div class="row">
                                                <div class="col-md-12">
                                              <label class="col-sm-3">CWT &nbsp;</label>
                                              <div class="col-sm-8"><span class="col-sm-7"><?php echo $_POST['cwt'];?></span></div>
                                                </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Declare Value &nbsp;</label>
                                              <div class="col-sm-8"><span class="col-sm-7"><?php echo $_POST['declare'];?></span></div>
                                             </div>
                                              <div class="col-md-12">
                                              <label class="col-sm-3">Description of Shipment &nbsp;</label>
                                              <div class="col-sm-8"><span class="col-sm-7"><?php echo $_POST['description'];?></span></div>
                                             </div>
                                              </div>
                                            </div>
  <!-- END RIGHT INPUT -->
  <div class="clearfix"> </div>
<h2><span class="label label-large label-pink arrowed-in-right"><strong>Charges</strong></span></h2>
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive"></div>
                                    </div>
  
                  </div>
  
                                    
                                  <div class="cpl-sm-12"><h2>&nbsp;</h2>
                                  <div class="row">
                                      <div class="col-md-4"></div>
                                        <div class="col-md-2">
                                            <a class="btn btn-danger " href="<?php echo base_url();?>transaction/domesctic_outgoing_house" data-toggle="modal" title="Add"><i class="icon-reply bigger-120 icons"></i>Cancel </a>
                                        </div>
                                         <div class="col-md-2">
                                             <button class="btn btn-primary"><i class="icon-save bigger-160 icons">&nbsp;</i> Save</button>
                                        </div>  </div>     
              </div>
          </div>
      </div>

   </form>
  </div>
            </div>
  


