
<table class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th><div align="center">Tanggal</div></th>
                                                  <th><div align="center">Tujuan</div></th>
                                                  <th><div align="center">Layanan</div></th>
                                                  <th>Jenis</th>
                                                  <th>Jumlah</th>
                                                  <th><div align="center">Berat</div></th>
                                                  <th class="text-center"><div align="center">actions</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_volume+=$items['price'];
        ?>

                                                  <tr align="right" class="gradeX">
                                                    <td colspan="2"><strong>
                                                      <input name="nohouse" type="hidden" id="nohouse" value="<?php echo $items['id']; ?>" class="nohouse" />
                                                    </strong><?php echo $items['id']; ?></td>
                                                    <td><?php echo $items['tgl']; ?></td>
                                                    <td><?php echo $items['tujuan']; ?></td>
                                                    <td><?php echo $items['layanan']; ?></td>
                                                    <td><?php echo $items['jenis']; ?></td>
                                                    <td><?php echo $items['qty']; ?></td>
                                                    <td><?php echo $items['price']; ?></td>
                                                    <td>
                                                  <button class="delbtn btn btn-mini btn-danger" type="button" id="delbtn" value="<?php echo $items['rowid']; ?>"><i class="fa fa-times bigger-120"></i></button>
                                                 
                                         
                                                  </td>
                                                  </tr>
                                            <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2">&nbsp;</td>
                                                  <td colspan="3"><strong>
                                                    <input type="hidden" name="t_item" value="<?php echo $t_item;?>" />
                                                  Total</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td align="right"><strong><?php echo $t_item;?>
                                                  </strong>
                                                   <div align="right"></div></td>
                                                  <td><strong><?php echo $t_volume;?>
                                                  <input name="t_volume" type="hidden" id="t_volume" value="<?php echo $t_volume;?>" />
                                                  </strong></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
                                <!--adding form-->
<script type="text/javascript">



 $(".delbtn").click(function(){
	  var nohouse=$(this).val();	
	$.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/delete_session_cargo'); ?>",
                data: "nohouse=" + nohouse,
                success: function(data){
				  $('#table_input').html(data);
                }
            });
});

   

</script>

