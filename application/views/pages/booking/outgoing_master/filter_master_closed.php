<table id="table_final" class="table table-striped table-bordered" cellspacing="0" width="100%">
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
          <th width="132" style="width:80px;"><span style="width:125px;">Final CWT</span></th>
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
          <td><a href="#" onclick="detailsmuclosed(this);"><?php echo $row->NoSMU;?></a></td>
          <td><?php echo date('d-m-Y',strtotime($row->ETD));?></td>
          <td><?php echo $row->sender;?></td>
          <td><?php echo $row->receiver;?></td>
          <td><?php echo $row->Origin.' - '.$row->ori;?></td>
          <td><?php echo $row->Destination.' - '.$row->desti;?></td>
          <td><?php echo $row->PCS;?></td>
          <td><?php echo $row->CWT;?></td>
          <td><?php echo $final=($row->FinalCWT > $row->CWT)?'<label class="badge badge-important white">'.$row->FinalCWT.'</label>':'<label class="badge badge-success white">'.$row->FinalCWT.'</label>';?></td>
        </tr>
        <?php $no++; } ?>
      </tfoot>
    </table>