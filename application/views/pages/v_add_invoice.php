<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-1.9.1.js"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<script>
	$("document").ready(function(){
		$("#date").datepicker();

	});
	</script>
<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function tambah_baris()
{
    html='<tr>'
    + '</td>'
    + '<td>:</td>'
    + '<td><input type="text" name="awb[]"></td>'
	+ '<td><input type="text" name="qty[]"></td>'
	+ '<td><input type="text" name="gwt[]"></td>'
	+ '<td><input type="text" name="panjang[]"></td>'
	+ '<td><input type="text" name="lebar[]"></td>'
	+ '<td><input type="text" name="tinggi[]"></td>'
	+ '<td><input type="text" name="volume[]"></td>'
	+ '<td><input type="text" name="cwt[]"></td>'
	+ '<td><input type="text" name="remarks[]"></td>'

    + '</tr>'
	
	+'<tr>'
    +'<td colspan="3"><hr style="border:1px #CCC dashed" /></td>'
    + '<td>:</td>'
  	+ '</tr>';
    $('#tabelinput').append(html);
}
</script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">


<section class="row" style=" margin-left:10px">
    <div class="col-xs-12">
        <div class="page-content">
            <div class="header">
                <h2><strong>Invoice </strong>Add</h2>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                       
                                <form action="<?php echo base_url();?>transaksi/save_invoice" method="post">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            
                                                <div class="form-group">
             <p align="center"><?php echo isset($message)?$message:'';?> </p>
                                                    <label for="invoce_id" class="col-sm-2 control-label">Invoice No</label>
<div class="col-sm-10">
    <input name="invoce_id" type="text" class="" id="invoce_id" value="<?php echo $kodeinvoice;?>" readonly="readonly">
                                             <?php echo form_error('nama');?> </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          
     <div class="form-group">
                                          <label for="invoce_id" class="col-sm-2 control-label">Date</label>
                                                    <div class="col-sm-10">
                                                      <input name="date" type="text" class=" txt-date datte" id="date" value="<?php echo date('m/d/Y');?>"  placeholder="date">
                                                 <?php echo form_error('nama');?> </div>
                                                    <div class="clearfix"></div>
                                          </div>                                     
                                          <div class="form-group">
                                            <label for="invoce_id" class="col-sm-2 control-label">Customer Name</label>
                                            <div class="col-sm-10"><span class="controls">
                                    <select id="custCode" tabindex="5"  name="custCode" data-placeholder="Account type" required="required">
                                                      <option value="">Pilih Customers</option>
                                                      <?php
                            if(isset($cust)){
                                foreach($cust as $row){
                                    ?>
                                                      <option value="<?php echo $row->custCode?>"><?php echo $row->custName?></option>
                                                      <?php
                                }
                            }
                            ?>
                                            </select>
                                            </span></div>
                                                    <div class="clearfix"></div>
                                                </div>
          <div class="form-group">
                                            <label for="invoce_id" class="col-sm-2 control-label">CSC No</label>
                                            <div class="col-sm-10"><span class="controls">
                                              <select id="transc_id" tabindex="5" class="" name="transc_id" required="required">
            
            </select>
                      </span></div>
                                                    <div class="clearfix"></div>
                                          </div>                                      
          <div class="form-group">
                                            <label for="invoce_id" class="col-sm-2 control-label">Currency</label>
                                            <div class="col-sm-10"><span class="controls">
                                              <select id="currency" tabindex="5"  name="currency" data-placeholder="Account type" required="required">
                                                <option value="rp"> &nbsp; IDR</option>
                                                <option value="usd"> &nbsp; USD</option>
                       
                                              </select>
                                            </span></div>
                                                    <div class="clearfix"></div>
                                          </div>
                                                                                      
                                                <div class="form-group">
<div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                                </div>                                         
                                                
                                                <div class="form-group">
                                                  <div class="col-sm-10">
                                                    <hr style="border:1px #CCC dashed" />
                                        </div>
                                                    <div class="clearfix"></div>
                                          </div>

  <div class="col-sm-10" id="detail">
    
                                      
 
                                          <div class="form-group">
<div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                        </div>                                     
                                          
                                          
                                        <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-md-2 pull-right"></div>
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

<script type="text/javascript">			
$("#custCode").change(function(){
            var custCode = $("#custCode").val();
            $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_sub'); ?>",
                data: "custCode="+custCode,
                cache:false,
                success: function(data){
                    $('#transc_id').html(data);
                    //document.frm.add.disabled=false;
                }
            });
        });
       
	   
	   
	 $("#transc_id").change(function(){
            var transc_id = $("#transc_id").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_detail_invoice'); ?>",
                data: "transc_id="+transc_id,
                success: function(data){
                    $('#detail').html(data);
                }
            });
        });
</script>