  <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
  <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
  
   <script type="text/javascript">

    var save_method2; //for save method string
    var tablecontact;
 
 $(document).ready(function() {    
    
          tbldet = $('#tbldet').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode
            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('transaction/ajax_detailSMU')?>",
                "type": "POST"
            },
            "columns": [
            { "data": "no" },
            { "data": "HouseNo" },
            { "data": "PCS" },
            { "data": "CWT" },
            { "data": "Amount" }
            ]
          });
    
         $('#tbldet tbody').on('dblclick', 'tr', function () {
            var tr = $(this).closest('tr');
            var row = tbldet.row(tr);
           // alert(row.data().firstName);
         });
});
</script>
  
<div class="container-fluid" id="konten">
  <div class="row" id="contentreplace">
  <div class="col-sm-11 portlets ui-sortable" id="freecontent" style="box-shadow:2px 3px 8px #CCC; border:1px #CCC solid">
                    <div class="panel">
                        <!--<div class="panel-header"></div>-->
                        
                                    <div class="form-group">
                                        <div class="table-responsive" id="table_responsive">
<h2><span class="label label-inverse label-large">List SMU to Consol</span></h2>
                                        <table class="table table-nostriped table-nobordered table-hover" id="tablesmu">
                                              <thead>
                                                
                                                  <tr>
                                                  <th width="24">No.</th>
                                                  <th width="60">SMU No</th>
                                                  <th width="77">Destination</th>
                                                  <th width="43">PCS</th>
                                                  <th width="53">CWT</th>
                                                  <th width="61" class="text-center">Status Consol</th>
                                                  <th width="61" class="text-center">Status Consol</th>
                                                </tr>
                                              </thead>
                                              <tbody>
 <?php 
 $no=1;
 foreach ($master as $free) {
	 $cwt=$free->CWT;
	 $pcs=$free->PCS;
	 if($cwt <=1){
		 $status1='<span class="badge badge-important white"><i class="fa fa-times"></i> NO</span>';
	 } else {
		 $status1='<span class="badge badge-success white"><i class="fa fa-check"></i> YES</span>';
	 }
	 
  ?>
                                                  <tr>
                                                    <td><?php echo $no?></td>
                                                    <td><?php echo $free->NoSMU?></td>
                                                    <td><div align="left"><?php echo substr($free->desti,0,50).'-'.$free->portcode?></div></td>
                                                    <td><div align="center"><?php echo $free->PCS?></div></td>
                                                    <td><div align="center"><?php echo $free->CWT?></div></td>
                                                    <td><div align="center"><?php echo $status1?></div></td>
                                                    <td><button class="btndet" value="<?php echo $free->NoSMU?>" onclick="detailsmu(this);">det</button></td>
                                                  </tr>
                <?php $no++;} ?>  
                                                  
                                                  <tr style="background-color:#F5F5F5">
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                  <td><div align="right"></div></td>
                                                  <td>&nbsp;</td>
                                                  <td>&nbsp;</td>
                                                </tr>
                                              </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    
                    


          </div>
      </div>
                
</div>
</div>


<div id="modaldetailsmu" class="modal fade responsive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="myModalLabel">Add Charges</h3>
            </div>
            <div class="smart-form scroll">

                    <div class="modal-body">
                      
                        <div id="tabledetail">
                        <table id="tbldet" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th>no</th>  
          <th>id</th>
          <th> Name</th>
          <th>Description</th>
          <th style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
        <tr>
          <th>no</th>
          <th>id</th>
          <th> Name</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </tfoot>
    </table>

                        </div>
                     
                      <div class="modal-footer">
                        <button class="btn btn-danger" data-dismiss="modal" aria-hidden="true" id="cancel"><i class="fa fa-close">&nbsp;</i> Close</button>
                        <button class="btn btn-primary" id="savecharges" onClick="savecharges()"> Save</button>
</div>
              </div>
            
           
          </div>
        </div>
    </div>
    </div>
    
    <script>
function detailsmu(myid){
	var input=$(myid).val();
	
	$("#modaldetailsmu").modal('show');
	
}
	
	</script>