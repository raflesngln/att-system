<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">
<script>
	$("document").ready(function(){
		$("#date").datepicker();
		$("#tgl").datepicker();
		$("#tgl3").datepicker();
		$("#tgl4").datepicker();
		$("#tgl5").datepicker();
	});
	</script>
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


<style>
#tabelinput input[type=text]{
height:30px; width:90px; border:2px #CCC solid;	}

</style>
   <div class="row-fluid">
    <div class="span12">
    <div class="col-xs-12">
        <div class="page-content">
            <div class="header">
                <h2><strong>Transaction </strong>Add</h2>
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
</div>
                                                    <div class="clearfix"></div>
                                          </div>
                                          
     <div class="form-group">
                                          <label for="kdtrans" class="col-sm-2 control-label">Date</label>
                                                    <div class="col-sm-10">
                                                      <input name="date" type="text"  id="tgl" value="<?php echo date('m/d/Y');?>"  placeholder="date">
                                                 </div>
                                                    <div class="clearfix"></div>
                                          </div>                                     
                                          <div class="form-group">
                                            <label for="kdtrans" class="col-sm-2 control-label">Customer Name</label>
                                            <div class="col-sm-10"><span class="controls">
                                    <select id="id_cust" tabindex="5" name="id_cust" data-placeholder="Account type" required="required">
                                                      <option value=""></option>
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
                                            </span>
                                              <label for="textfield"></label>
                                            <label for="select"></label>
                                            <span class="controls">
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
 
<div class="clearfix"></div>


<div class="table-responsive">
  <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th colspan="2"> <div align="left"><a class="btn btn-success btn-addnew" href="#modaladd" data-toggle="modal" title="Add"><i class="icon-plus icons"></i>Add Items</a></div></th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th>&nbsp;</th>
                                                  <th class="text-center">&nbsp;</th>
                                                </tr>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>No AWB</th>
                                                  <th>QTY</th>
                                                  <th>GWT</th>
                                                  <th>Panjang</th>
                                                  <th>Lebar</th>
                                                  <th>Tinggi</th>
                                                  <th>Volume</th>
                                                  <th>CWT</th>
                                                  <th>Remarks</th>
                                                  <th class="text-center">Action</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                <?php $i=1;
			foreach($temp as $tmp)
			{
				$qty=$tmp->qty;
				$p=$tmp->panjang;
				$l=$tmp->lebar;
				$t=$tmp->tinggi;
				$gwt=$tmp->gwt;
				
				$volum=$p*$l*$t/6000;
				if($gwt > $volum){$cwt=$gwt;}
				else{$cwt=$volum;}
				
				$totqty+=$qty;
				$totgwt+=$gwt;
				$totcwt+=$cwt;
				$grand+=$total;
				?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $i;?></th>
                                                    <td><?php echo $tmp->awb_no; ?>
                                                    <input type="hidden" name="awb[]" id="awb[]" value="<?php echo $tmp->awb_no; ?>" /></td>
                                                    <td><?php echo $tmp->qty; ?>
                                                    <input type="hidden" name="qty[]" id="qty[]" value="<?php echo $tmp->qty; ?>" /></td>
                                                    <td><?php echo $tmp->gwt; ?>
                                                  <input type="hidden" name="gwt[]" id="gwt[]" value="<?php echo $tmp->gwt; ?>" /></td>
                                                    <td><?php echo $tmp->panjang; ?>
                                                    <input type="hidden" name="panjang[]" id="panjang[]" value="<?php echo $tmp->panjang; ?>" /></td>
                                                    <td><?php echo $tmp->lebar; ?>
                                                    <input type="hidden" name="lebar[]" id="lebar[]" value="<?php echo $tmp->lebar; ?>" /></td>
                                                    <td><?php echo $tmp->tinggi; ?>
                                                    <input type="hidden" name="tinggi[]" id="tinggi[]" value="<?php echo $tmp->tinggi; ?>" /></td>
                                                    <td><?php echo substr($volum,0,5); ?>
                                                    <input type="hidden" name="volume[]" id="volume[]" value="<?php echo substr($volum,0,5); ?>" /></td>
                                                    <td><?php echo substr($cwt,0,5) ?>
                                                    <input type="hidden" name="cwt[]" id="cwt[]" value="<?php echo substr($cwt,0,5) ?>" /></td>
                                                    <td><?php echo $tmp->remarks; ?>
                                                    <input type="hidden" name="remarks[]" id="remarks[]" value="<?php echo $tmp->remarks; ?>" /></td>
                                                    <td class="text-center">
                                                    <a class="btn-action" href="#modaledit<?php //echo $data->custCode?>" data-toggle="modal" title="Edit"><i class="icon-note icons"></i></a>
                                                    <a class="btn-action" href="<?php echo base_url();?>transaksi/hapus_item_temp/<?php echo $tmp->awb_no;?>" onclick="return confirm('Yakin Hapus  Akun ?');" title="Delete"><i class="icon-trash bigger-120"></i></a>   


                                                      </a>       
                                                    </td>
                                                </tr>                                
                                                <?php $no++; } ;?>
                                              </tbody>
                                            </table>
                                            
                                            <div>
     </form>
  

                                          <div class="form-group">
<div class="col-sm-10"></div>
                                                    <div class="clearfix"></div>
                                        </div>                                     
                                          
                                          
                                        <div class="clearfix"></div>
                                            <div class="form-group">
                                                <div class="col-md-2"><button type="submit" name="button" id="button" class="btn btn-primary btn-large"><i class="icon-check icons">&nbsp;</i> Save</button></div>
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

<div id="modaladd" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Tambah Item </h3>
            </div>
            <?php echo isset($message)? $message:'';?>
            <div class="smart-form">
          <form method="post" action="<?php echo site_url('transaksi/add_item')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">AWB</label>
                        
                        <div class="col-sm-9">
                          <input name="awb" type="text" placeholder="" class="form-control" id="awb"   />
                          <input type="hidden" name="id" id="id" value="<?php echo $kodetrans;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">QTY</label>
                        <div class="col-sm-9">
                          <input name="qty" type="text" placeholder="" class="form-control" id="qty"   />
                        </div>
                        <div class="clearfix"></div>
                      </div>
<div class="form-group">
                        <label class="col-sm-3 control-label">GWT</label>
                        <div class="col-sm-9">
                          <input name="gwt" type="text" placeholder="" class="form-control" id="gwt"   />
              </div>
                        <div class="clearfix"></div>
                      </div>
 	<div class="form-group">
                        <label class="col-sm-3 control-label">Panjang</label>
                        <div class="col-sm-9">
                          <input name="p" type="text" placeholder="" class="form-control" id="p"   />
                        </div>
                        <div class="clearfix"></div>
                      </div>
  <div class="form-group">
                        <label class="col-sm-3 control-label">Lebar</label>
                        <div class="col-sm-9">
                          <input name="l" type="text" placeholder="" class="form-control" id="l"   />
                        </div>
                        <div class="clearfix"></div>
                      </div>
    <div class="form-group">
                        <label class="col-sm-3 control-label">Tinggi</label>
                        <div class="col-sm-9">
                          <input name="t" type="text" placeholder="" class="form-control" id="t"   />
                        </div>
                        <div class="clearfix"></div>
                      </div>
    <div class="form-group">
              <label class="col-sm-3 control-label">Remarks</label>
                        <div class="col-sm-9"><span class="control-group">
                          <textarea name="remarks" cols="45" rows="4" class="form-control" id="remarks"></textarea>
              </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="modal-footer">
              <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="icon-close icons">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-check icons">&nbsp;</i> Save</button>
                    </div>
                    </div>
            
                </form>
          </div>
        </div>
    </div>
    </div>



<!-----edit data------->
<?php

    foreach($customer as $row){
        ?>
<div id="modaledit<?php echo $row->custCode;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Edit Data</h3>
            </div>
            <div class="smart-form">
                <form method="post" action="<?php echo site_url('master/update_customer')?>">
                    <div class="modal-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label"> Name</label>
                        <div class="col-sm-9">
                            <input name="name" type="text" placeholder="" class="form-control" id="name"   />
                            <span class="controls">
                            <input type="hidden" name="idcustomer" id="idcustomer" value="<?php echo $row->custCode;?>" />
                            </span></div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
                            <input name="address" type="text" placeholder="" class="form-control" id="address" value="<?php echo $row->Address;?>" />
              </div>
                        <div class="clearfix"></div>
                      </div>                    
                      <div class="modal-footer">
                        <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true"><i class="icon-close icons">&nbsp;</i> Close</button>
                        <button class="btn btn-primary"><i class="icon-check icons">&nbsp;</i> Save</button>
                    </div>
                    </div>
            
                </form>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

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
	
	        $(".delbutton").click(function(){
            var element = $(this);
            var del_id = element.attr("id");
            var info = del_id;
            if(confirm("Anda yakin akan menghapus?"))
            {
                $.ajax({
                    url: "<?php echo base_url(); ?>penjualan/hapus_penjualan",
                    data: "kode="+info,
                    cache: false,
                    success: function(){
                    }
                });
                $(this).parents(".gradeX").animate({ opacity: "hide" }, "slow");
            }
            return false;
        });

    })       
</script>