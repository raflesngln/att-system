<div class="col-md-12">
        <div class="page-content">
            <div class="header">
                <h2><strong>Details </strong>Tracking</h2>
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
                                            <?php
											
											foreach($header as $row)
											{
											
											?>
                              <div class="form-group">
             <p align="center"><?php echo isset($message)?$message:'';?> </p>
             <div class="clearfix"></div>
                                          </div>
                                          <div class="form-group">
                                            <label for="kdtrans" class="col-sm-2 control-label">Master (AWB)  :</label>
                                            <div class="col-sm-8">
                                            <div class="clearfix"></div>
                                            <?php echo $row->AWB;?></div>
                                            
                                            
                                             <div class="clearfix"></div>
									<div class="clearfix"></div>
                              </div>
        <div class="form-group">
                <label for="kdtrans" class="col-sm-2 control-label">Destination   &ensp;:</label>
<div class="col-sm-8">
                                            <div class="clearfix"></div>
                                            <?php echo $row->Destination_Code; ?></div>
                                            
                                            
                                             <div class="clearfix"></div>
									<div class="clearfix"></div>
                              </div>
            <div class="form-group">
                <label for="kdtrans" class="col-sm-2 control-label">Booking No   &ensp;:</label>
<div class="col-sm-8">
                                            <div class="clearfix"></div>
                                            <?php echo $row->BookingNo; ?></div>
                                            
                                            
                                             <div class="clearfix"></div>
									<div class="clearfix"></div>
                              </div>
                              <?php } ?>
                              <form action="" method="post" name="formku">   
                                
                                <div class="clearfix"></div>


<div class="table-responsive">
  <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Booking No</th>
                                                  <th>Status</th>
                                                  <th>Destination </th>
                                                  <th>Origin</th>
                                                  <th>Update On</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                <?php 
				$i=1;
			foreach($details as $det)
			{
	
				?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $i;?></th>
                                                    <td><?php echo $det->BookingNo; ?></td>
                                                    <td><?php echo $det->StatusName; ?></td>   
                                                    <td><?php echo $det->Destination_Code; ?></td>
                                                    <td><?php echo $det->Origin_Code; ?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($det->StatusUpdate)); ?></td>
                                                </tr>                                
                                                <?php $i++; } ;?>
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
                                                <div class="col-md-2"></div>
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