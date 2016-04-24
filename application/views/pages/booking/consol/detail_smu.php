<table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>House</th>  
          <th>Shipper</th>
          <th> PCS</th>
          <th>CWT</th>
          <th style="width:125px;">Amount</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
      
       <?php 
 $no=1;
 foreach ($smu as $row) {

  ?>
        <tr>
          <th><?php echo $row->HouseNo?></th>
          <th><?php echo $row->CustName?></th>
          <th><?php echo $row->PCS?></th>
          <th><?php echo $row->CWT?></th>
          <th style="text-align:right"><?php echo number_format($row->Amount,0,'.','.')?></th>
        </tr>
		<?php } ?>
   
  <tfoot>
      </tfoot>
    </table>