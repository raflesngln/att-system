<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/jquery-1.9.1.js"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<script>
	$("document").ready(function(){
		$("#tgl").datepicker();
		$("#tgl2").datepicker();
		$("#tgl3").datepicker();
		$("#tgl4").datepicker();
		$("#tgl5").datepicker();
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

<style>
#tabelinput input[type=text]{
height:30px; width:100px; border:2px #CCC solid;	}

</style>
<section class="main-content">
    <div class="container">
        <div class="page-content">
            <div class="header">
                <h2><strong>Add</strong>Transaction</h2>
                <div class="breadcrumb-wrapper">
                  <ol class="breadcrumb">
                    <li><a href="<?php echo base_url();?>">Home</a>
                    </li>
                    <li class="active">Add Transaction</li>
                  </ol>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 portlets ui-sortable">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        <div class="panel-content">
                            <div class="smart-form">
                       
                                <form action="<?php echo base_url();?>transaksi/save_transaksi" method="post" name="myform">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                            
                                                <div class="form-group">
             <p align="center"><?php echo isset($message)?$message:'';?> </p>
                                                    <label for="kdtrans" class="col-sm-2 control-label">CSS No</label>
<div class="col-sm-10">
                                                      <input name="kdtrans" type="text" class="" id="kdtrans" value="<?php echo $kodetrans;?>" readonly="readonly">
                                                 <?php echo form_error('nama');?> </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          
     <div class="form-group">
                                          <label for="kdtrans" class="col-sm-2 control-label">Date</label>
                                                    <div class="col-sm-10">
                                                      <input name="date" type="text" class=" txt-date datte" id="date" value="<?php echo date('m/d/Y');?>"  placeholder="date">
                                                 <?php echo form_error('nama');?> </div>
                                                    <div class="clearfix"></div>
                                          </div>                                     
                                          <div class="form-group">
                                            <label for="kdtrans" class="col-sm-2 control-label">Customer Name</label>
                                            <div class="col-sm-10"><?php echo form_error('nama');?> <span class="controls">
                                            <select id="id_cust" tabindex="5" class="chzn-select" name="id_cust" data-placeholder="Account type" required="required">
                                                      <option value=""></option>
                                                      <?php
                            if(isset($cust)){
                                foreach($cust as $row){
                                    ?>
                                                      <option value="<?php echo $row->cust_id?>"><?php echo $row->cust_name?></option>
                                                      <?php
                                }
                            }
                            ?>
                                            </select>
                                            </span></div>
                                                    <div class="clearfix"></div>
                                                </div><div class="form-group">
<div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                                </div>                                         
                                                
                                                <div class="form-group">
                                                  <div class="col-sm-10">
                                                    <hr style="border:1px #CCC dashed" />
                                        </div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          
     <form action="" method="post" name="formku">                                     
 <table width="" border="0" id="tabelinput">
    <tr>
    <td height="47" colspan="11"><div align="left">
      <h3>Detail Package</h3></div></td>
    </tr>
    <tr>
      <td width="11%">Nomor</td>
      <td width="24%">AWB NO:</td>
      <td width="24%">QTY</td>
      <td width="24%">GWT</td>
      <td width="17%">PaJang</td>
      <td width="17%">Lebar</td>
      <td width="17%">Tinggi</td>
      <td width="17%">Volume</td>
      <td width="17%">CWT</td>
      <td width="17%">Remarks</td>
      <td width="17%">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="11"><hr style="border:2px #CCC medium" /></td>
      </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td colspan="3"><label for="fileField"></label>&nbsp;<button id="tambah" type="button" onclick="tambah_baris();" style="height:30px; margin-bottom:10px;"><i class="fa fa-plus-square"></i>Tambah Input</button></td>
      </tr>
    <tr>
    <td>1</td>
    <td><input type="text" name="awb[]" id="awb[]" /></td>
    <td><input type="text" name="qty[]" id="nama4" /></td>
    <td><input type="text" name="gwt[]" id="nama7" /></td>
    <td><input type="text" name="panjang[]" id="nama10" /></td>
    <td><input type="text" name="lebar[]" id="nama11" /></td>
    <td><input type="text" name="tinggi[]" id="nama12" /></td>
    <td><input type="text" name="volume[]" id="nama13" /></td>
    <td><input type="text" name="cwt[]" id="nama14" /></td>
    <td><input type="text" name="remarks[]" id="nama15" /></td>
    <td><input type="button" name="button3" id="button3" value="hitung" onclick="tambah()" /></td>
    </tr>
  <tr>
    <td colspan="11"><hr style="border:1px #CCC dashed" /></td>
    </tr>
  <tr>
    <td>2</td>
    <td><input type="text" name="awb[]" id="awb[]" /></td>
    <td><input type="text" name="qty[]" id="nama4" /></td>
    <td><input type="text" name="gwt[]" id="nama7" /></td>
    <td><input type="text" name="panjang[]" id="nama10" /></td>
    <td><input type="text" name="lebar[]" id="nama11" /></td>
    <td><input type="text" name="tinggi[]" id="nama12" /></td>
    <td><input type="text" name="volume[]" id="nama13" /></td>
    <td><input type="text" name="cwt[]" id="nama14" /></td>
    <td><input type="text" name="remarks[]" id="nama15" /></td>
    <td><input type="button" name="button2" id="button2" value="hitung" onclick="tambah()" /></td>
  </tr>
  <tr>
    <td colspan="11"><hr style="border:1px #CCC dashed" /></td>
    </tr>
  <tr>
    <td>3</td>
    <td><input type="text" name="awb[]" id="awb[]" /></td>
    <td><input type="text" name="qty[]" id="nama4" /></td>
    <td><input type="text" name="gwt[]" id="nama7" /></td>
    <td><input type="text" name="panjang[]" id="nama10" /></td>
    <td><input type="text" name="lebar[]" id="nama11" /></td>
    <td><input type="text" name="tinggi[]" id="nama12" /></td>
    <td><input type="text" name="volume[]" id="nama13" /></td>
    <td><input type="text" name="cwt[]" id="nama14" /></td>
    <td><input type="text" name="remarks[]" id="nama15" /></td>
    <td><input type="button" name="button4" id="button4" value="hitung" onclick="tambah()" /></td>
  </tr>
  <tr>
    <td colspan="11"><hr style="border:1px #CCC dashed" /></td>
    </tr>
  </table>
</form>
  

                                          <div class="form-group">
<div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                        </div>                                     
                                          
                                          
                                        <div class="clearfix"></div>
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
<script type="text/javascript">
  function tambah(){
	  
	var formku=document.formku;
	var x=eval(formku.panjang.value);
	var y=eval(formku.lebar.value);
	
	var hasil= x+y;
	formku.valume.value=hasil;
  }
  </script>
  
<script type="text/javascript">		
		 $("#id_parent").change(function(){
			  $('#detail').html('');
            var id_parent = $("#id_parent").val();
          $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaksi/get_kategori'); ?>",
                data: "id_parent="+id_parent,
                success: function(data){
                    $('#kategori').html(data);
                }
            });
        });
		       
</script>