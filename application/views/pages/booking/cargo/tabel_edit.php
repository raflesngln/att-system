  <script type='text/javascript' src='<?php echo base_url();?>asset/js/jquery.min.js'></script>

<table width="500" class="table table-striped table-bordered table-hover" id="tblitems">
                                              <thead>
                                                <tr align="left">
                                                  <th colspan="2"><div align="left">No Connote</div></th>
                                                  <th width="54"><div align="center">Date</div></th>
                                                  <th width="46"><div align="center">Origin</div></th>
                                                  <th width="58"><div align="center">Destination</div></th>
                                                  <th width="48">Service</th>
                                                  <th width="48">Volume</th>
                                                  <th width="50">CWT</th>
                                                  <th width="53" class="text-center"><div align="center"><a class="btn btn-success btn-addnew btn-mini" href="#modaladd" data-toggle="modal" title="Add item" style="visibility:hidden"><i class="icon-plus icons"></i> Add items</a>Action</div></th>
                                                </tr>
                                          <tbody>
 <?php 
 $no=1;
 foreach($list as $items){
	 $cwt=$items->CWT;
	 $t_cwt+=$cwt;
	 $berat=$items->Berat;
	 $t_berat+=$berat;

        ?>
                                                  <tr align="right" class="gradeX">
                                                    <td colspan="2"><div align="left"><?php echo $items->HouseNo;?>
                                                      <input name="connote_2" type="hidden" id="connote_2" value="<?php echo $items->HouseNo;?>">
                                                    </div></td>
                                                    <td><div align="left"><?php echo $items->date_insert;?></div></td>
                                                    <td><div align="left"><?php echo $items->Origin;?></div></td>
                                                    <td><div align="left"><?php echo $items->Destination;?></div></td>
                                                    <td><div align="left"><?php echo $items->Service;?></div></td>
                                                    <td><div align="right"><?php echo $items->Berat;?></div></td>
                                                    <td><div align="right"><?php echo $items->CWT;?></div></td>
                                                    <td>
                                                      <div align="center">
                                 <button id="delbutton" class="btn btn-danger btn-small delbutton" type="button" value="<?php echo $items->HouseNo;?>"><i class="fa fa-times"></i></button> 
                                                    </div></td>
                                                  </tr>
  <?php $no++;} ?>
                                               
                                                 <tr align="right">
                                                  <td colspan="2"><strong>
                                                  <input type="hidden" name="t_item" value="<?php echo $t_berat;?>">
                                                  </strong></td>
                                                  <td colspan="3"><strong>Total</strong></td>
                                                  <td>&nbsp;</td>
                                                  <td><strong><?php echo $t_berat;?></strong></td>
                                                  <td align="left">
                                                   <div align="right"><input type="hidden" name="tot_cwt" value="<?php echo $t_cwt;?>"><strong><?php echo $t_cwt;?></strong></div></td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                               
                                              <td width="74"></tbody>
                                            </table>
<script type="text/javascript"> 
                                            
     $(".delbutton").click(function(){
	 var idcnote=$(this).val();
	 var cargono= $('#cargono').val();
		  $.ajax({
                type: "POST",
                url : "<?php echo base_url('booking/delete_item_edit'); ?>",
                data: "idcnote="+idcnote+"&cargono="+cargono,
			    success: function(data){
                    $('#table_responsive').html(data);
                }
            });	 
 });
 
 </script>