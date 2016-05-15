<table id="table_closed" class="table_closed table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="44">No</th>  
          <th width="128">SMU</th>
          <th width="109">ETD</th>
          <th width="144"> Shipper</th>
          <th width="167">Consignee</th>
          <th width="119">Origin</th>
          <th width="221">Destination</th>
          <th width="125" style="width:80px;">QTY</th>
          <th width="132" style="width:80px;">CWT</th>
          <th width="132" style="width:80px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
       <?php
	   $no=1;
	  foreach($smufinal as $row){
		  $status=$row->StatusProses;
	  if($status=='4'){
		  $show='visible';
	  } else {
		  $show='hidden';
	  }
	  ?>
        <tr>
       
          <td><?=$no;?></td>
          <td><a href="#" onclick="detailsmufinal(this);"><?php echo $row->NoSMU;?></a></td>
          <td><?php echo date('d-m-Y',strtotime($row->ETD));?></td>
          <td><?php echo $row->sender;?></td>
          <td><?php echo $row->receiver;?></td>
          <td><?php echo $row->Origin.' - '.$row->ori;?></td>
          <td><?php echo $row->Destination.' - '.$row->desti;?></td>
          <td><?php echo $row->PCS;?></td>
          <td><?php echo $row->CWT;?></td>
          <td><a style="visibility:<?php echo $show;?>" href="#" class="green" title="Edit" onclick="editFinal('<?php echo $row->NoSMU;?>');"><i class="icon-pencil bigger-150"></i></a></td>
        </tr>
        <?php $no++; } ?>
      </tfoot>
    </table>