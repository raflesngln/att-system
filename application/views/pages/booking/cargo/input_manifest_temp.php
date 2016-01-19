
<table class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th><div align="center">Date</div></th>
                                                  <th><div align="center">Origin</div></th>
                                                  <th><div align="center">Destination</div></th>
                                                  <th>Service</th>
                                                  <th>Volume</th>
                                                  <th><div align="center">CWT</div></th>
                                                  <th class="text-center"><div align="center">actions</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($this->cart->contents() as $items){
  $t_item+=$items['qty'];
  $t_cwt+=$items['cwt'];
        ?>

                                                  <tr align="left" class="gradeX">
                                                    <td colspan="2"><strong>
                                                      <input name="nohouse" type="hidden" id="nohouse" value="<?php echo $items['id']; ?>" class="nohouse" />
                                                    </strong><?php echo $items['id']; ?></td>
                                                    <td><?php echo $items['date']; ?></td>
                                                    <td><?php echo $items['origin']; ?></td>
                                                    <td><?php echo $items['destination']; ?></td>
                                                    <td><?php echo $items['service']; ?></td>
                                                    <td><div align="right"><?php echo $items['qty']; ?></div></td>
                                                    <td><div align="right"><?php echo $items['cwt']; ?></div></td>
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
                                                  <td><strong><?php echo $t_cwt;?>
                                                  <input name="t_cwt" type="hidden" id="t_cwt" value="<?php echo $t_cwt;?>" />
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

