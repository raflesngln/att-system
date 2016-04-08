<table class="table table-striped table-bordered table-hover" id="tblitems" style="width:95%">
                                              <thead>
                     <th colspan="9"></th>
                                              <th><div align="center"><a class="btn btn-primary btn-addnew btn-rounded" href="#modaladd" data-toggle="modal" title="Add item"><i class="icon-plus icons"></i> Add New</a>
                                           </div></th>
                                                <tr align="">
                                                  <th>&nbsp;</th>
                                                  <th colspan="3"><div align="center">No Of Pcs</div></th>
                                                  <th><div align="center">Length ( P )</div></th>
                                                  <th><div align="center">Width ( L )</div></th>
                                                  <th><div align="center">Height ( T )</div></th>
                                                  <th>Volume</th>
                                                  <th>G.Weight</th>
                                                  <th class="text-center"><div align="center">Action</div></th>
                                                </tr>
                                                
                                              <tbody>
    <?php 
	$no=1;
	foreach($items as $itm){
		$pack+=$itm->NoPack;
		$volume+=$itm->Volume;
		$total_volume=$unit*$qty;
		$grantotal+=$total_volume;
		
		$weight=$itm->G_Weight;
		$tot_weight+=$weight;
		 ?>
                                                  <tr align="right" class="gradeX">
                                                    <td><?php echo $no; ?></td>
                                                  <td colspan="3"><?php echo $itm->NoPack; ?></td>
                                                  <td><?php echo $itm->Length; ?></td>
                                                  <td><?php echo $itm->Width; ?></td>
                                                  <td><?php echo $itm->Height; ?></td>
                                                  <td><?php echo $itm->Volume; ?></td>
                                                  <td><?php echo $itm->G_Weight; ?></td>
                                                  <td>
                                                  <div align="center">
                 <button id="del_items2" class="del_items2 btn btn-mini btn-danger" value="<?php echo $itm->IdItems;?>" type="button">x</button>                                   
                                         
                                                  </div>
                                                  </td>
                                                </tr>
  <?php $no++;} ?>
                                                
                                                 <tr align="right">
                                                   <td>Total</td>
                                                  <td colspan="3"><label id="label_pacs"><?php echo $pack; ?></label>
                                                   <input name="t_pacs" type="hidden" id="t_pacs" value="<?php echo $pack; ?>" /></td>
                                                  <td colspan="3">&nbsp;</td>
                                                  <td><input name="t_volume" type="hidden" id="t_volume" value="<?php echo $volume; ?>" />                                                    <?php echo $volume; ?></td>
                                                  <td><input name="t_weight" type="hidden" id="t_weight" value="<?php echo $tot_weight; ?>" />
                                                   <?php echo $tot_weight; ?></td>  
                                                  <td>&nbsp;</td>
                                                </tr>
                                                
                                              </tbody>
                                            </table>
                                            
   <script>
   
   $(".del_items2").click(function(){
var kode=$(this).val();
var NoHouse=$('#NoHouse').val(); 
        $.ajax({
                type: "POST",
                url : "<?php echo base_url('transaction/delete_book_items'); ?>",
  data: "kode="+kode+"&NoHouse="+NoHouse,
                success: function(data){
			 $('#table_items').html(data);
  
                }
        });
});
	
   
   </script>