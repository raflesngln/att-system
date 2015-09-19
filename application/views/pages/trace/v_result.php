<script src="<?php echo base_url();?>asset/js/jquery.js" type="text/javascript"></script>

<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.core.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.widget.js"></script>
<script src="<?php echo base_url();?>asset/jquery_ui/ui/jquery.ui.datepicker.js"></script>
<script>
	$("document").ready(function(){
		$("#date").datepicker();
		$("#tgl2").datepicker();
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
<link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">

<style>
#tabelinput input[type=text]{
height:30px; width:90px; border:2px #CCC solid;	}

</style>
<section class="page-content" style=" margin-left:10px">
    <div class="col-xs-12">
        <div class="page-content">
            <div class="header">
                <h2><strong>Search</strong> Result</h2>
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
                              <form action="" method="post" name="formku">   
                                              
                                <div class="clearfix"></div>


<div class="table-responsive">
  <table class="table table-striped">
                                              <thead>
                                                <tr>
                                                  <th>No.</th>
                                                  <th>Booking No</th>
                                                  <th>Master AWB</th>
                                                  <th>OriginCode</th>
                                                  <th>Destination Code</th>
                                                  <th>Last Status</th>
                                                  <th>Status Update</th>
                                                  <th>Time</th>
                                                  <th>Acttion</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                           <?php 
$i=1;
			foreach($history as $data){
				mysql_connect("localhost","root","");
				mysql_select_db("tracking");

				//if($maks=='03'){$stat='Pending';} else {$stat='Sukses';}		
				
			?>
                                                <tr class="gradeX">
                                                    <th scope="row"><?php echo $i;?></th>
                                                    <td><a href="<?php echo base_url();?>trace/trace_details/<?php echo $data->BookingNo;?>"><?php echo $data->BookingNo?></a></td>
                                                    <td><?php echo $data->AWB; ?></td>
                                                    <td><?php echo $data->Origin_code?></td>
                                                    <td><?php echo $data->Destination_Code?></td>
		
                                                    <td><?php	
													$maks=$data->max;
													$query=mysql_query("select*from jobhistory where StatusCode='$maks' order by StatusCode DESC limit 1");
			while($dt=mysql_fetch_array($query)){ ?><?php echo $dt['StatusName'];?><?php } ?></td>
                                                    
                                                   
                                                    <td><?php echo date("d-m-Y",strtotime($data->StatusUpdate)); ?></td>
                                                    <td><?php echo date("d-m-Y / h:m:s",strtotime($data->StatusUpdate)); ?></td>
                                                    <td><a href="<?php echo base_url();?>trace/trace_details/<?php echo $data->BookingNo;?>"><button type="button" class="btn btn-mini btn-info"><i class="icon-eye-open bigger-120"></i></button></td>
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
        </div>
    </div>
</section>


<!-----edit data------->
<?php

    foreach($detail as $row){
        ?>
<div id="modaledit<?php echo $row->BookingNo;?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
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
                            <input name="name" type="text" placeholder="account name" class="form-control" id="name" value="<?php echo $row->BookingNo;?>" />
                        </div>
                        <div class="clearfix"></div>
                      </div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
    <div class="col-sm-9">
                            <input name="address" type="text" placeholder="account name" class="form-control" id="address" value="<?php echo $row->BookingNo;?>" />
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
