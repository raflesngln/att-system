 <link href="<?php echo base_url();?>asset/select2/css/select2.min.css" rel="stylesheet" />
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-1.8.2.min.js"></script>
<script src="<?php echo base_url();?>asset/select2/js/select2.min.js"></script>

 <style>
 .select2{
	 padding-bottom:3px;
	 padding-top:2px;
 }
 
 .btn-search{ height:32px; margin-left:-10px;}
 input[type=text],input[type=select]{
  border:1px #B5B5B5 solid;
  margin-bottom:3px;
  margin-top: 3px;
 }
.boxinput{
	box-shadow: 1px 2px 8px 2px rgba(158, 158, 158, 0.4);
    padding: 10px 0px 20px 5px;
}

 </style>
     <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>asset/jquery_ui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>asset/jquery_ui/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#tgl").datepicker();
    $("#tgl2").datepicker();

  });

  </script>


   <div class="row-fluid" >
    <div class="span11 boxinput" >

      
<div class="container">
<div class="info-box">
     <div class="col-sm-3 col-xs-4"><i class="fa fa-book"></i></div>
     <div class="col-sm-9 col-xs-8"><i class="fa fa-plus"></i> Add Deposito</div>
</div>
</div>

<br style="clear:both">

<form method="post" action="javascript:void(0);" id="inputform" name="inputform">
<div class="container">
  <div class="row">
               <!--LEFT INPUT-->
  <div class="col-sm-9">      
      <div class="col-sm-11">
                   
          <strong><label class="col-sm-3">Date</label></strong>
          <div class="col-sm-8">
            <input name="tgl" placeholder="<?php echo date("m/d/Y") ;?>" type="text" class="form-control"  id="tgl" required="required" readonly="readonly" style="width:33%"/>
          </div>
          <strong>
          <label class="col-sm-3"> Customer </label></strong>
          <div class="col-sm-8">
            <select name="customers" id="customers" class="combo select2" required="required" onchange="return filter_soa()">
          <option value="">Choose Customer</option>
          <?php foreach ($customer as $cust) {
          ?>
          <option value="<?php echo $cust->CustCode;?>"><?php echo $cust->CustName;?></option>
          <?php } ?>
          </select>
          </div>          <strong><label class="col-sm-3"> Amount Rp. </label></strong>
          <div class="col-sm-8">
           <input name="amount" type="text" class="form-control"  id="amount" required="required" onkeypress="return isNumberKey(event)"/>
          </div>
          <strong><label class="col-sm-3"> Note</label></strong>
          <div class="col-sm-8">
            <textarea name="remarks" rows="5" class="form-control" id="remarks"></textarea>
          </div>
 


      </div>

                           
      </div>
                <!--RIGHT INPUT-->
 
   </div>
<br style="clear:both;margin-bottom:40px;">

            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                   
                                            

      <div style="margin-bottom:20px;"></div>
                                          <div class="col-md-4"></div>
                                        
                                          <div class="col-md-2">
                                         <button type="submit" id="btnsave" class="btn btn-primary btn-large"><i class="icon-save bigger-160 icons"></i>&nbsp;Save</button>
                                          </div>
      <div style="margin-bottom:20px;"></div>

      </form>
     </div>
   </div>
      </div>
  </div>

</div>

</form>
            </div>
  



<!-- ADD NEW ITEMS -->
<script type="text/javascript">			


	<!-- Save Transaction -->
$("#inputform").submit(function(e) {
	var conf=confirm("Anda Yakin simpan data ? ");
	if(conf==true){
       $.ajax({
                type: "POST",
				dataType: "JSON",
                url : "<?php echo base_url('payment/save_deposito'); ?>",
                data: $('#inputform').serialize(),
                success: function(data){
                    //$('#table_responsive').html(data);
					swal("Data Tersimpan","Simpan data","success");
					load_combo();
					reload_list();
                }
            });
	} else {
		swal("Confirmation !","Save data was Canceled","warning");
		return false;
	}
});

		
	 $("#filter").change(function(){
            var filter = $("#filter").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('search/filter_discount'); ?>",
                data: "filter="+filter,
                success: function(data){
                    $('#table_responsive').html(data);
                }
            });

        });
		
function load_combo(){
       $.ajax({
           url : "<?php echo site_url('payment/getCustomers')?>",
           dataType: "json",
           success: function(data){
               $("#customers").empty();
			   $("#amount").val('');
			   $("#remarks").val('');
              $("#customers").append("<option value=''>Select Customers</option>");
                     for (var i =0; i<data.length; i++){
                   var option = "<option value='"+data[i].CustCode+"'>"+data[i].CustName+"</option>";
                          $("#customers").append(option);
						  //load_state();
                       }
  
               }
       }); 
    }



</script>