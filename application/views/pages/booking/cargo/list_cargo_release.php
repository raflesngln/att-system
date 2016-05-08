
  
    <br />
    <br />
    
    <table id="tablebank" class="table table-striped table-bordered" cellspacing="0" width="100%">
      <thead>
        <tr>
          <th width="95">No</th>  
          <th width="152">Cargo No</th>
          <th width="382">Airline</th>
          <th width="231">Detail</th>
          <th width="155">PCS</th>
          <th width="175">CWT</th>
          <th width="128" style="width:125px;">Action</th>
        </tr>
      </thead>
      <tbody>
      </tbody>

      <tfoot>
      listcargo
 <?php 
 $no=1;
 foreach ($listcargo as $row) {
	 ?>
        <tr>
          <th><?php echo  $no;?></th>
          <th><a href="#"  onclick="return listcargo(this)"><?php echo $row->CargoReleaseCode; ?></a></th>
          <th><?php echo substr($row->AirLineName,0,200); ?></th>
          <th><?php echo $row->CargoDetails; ?></th>
          <th><?php echo $row->jumpcs; ?></th>
          <th><?php echo $row->jumcwt; ?></th>
          <th><a target="new" href="<?php echo base_url();?>cargo_release/print_release/<?php echo $row->CargoReleaseCode; ?>"><button type="button" class="btn btn-mini btn-warning"><i class="fa fa-print fa-2x"></i></button></a></th>
        </tr>
     <?php $no++;} ?> 
      </tfoot>
    </table>
            
  <!-- Bootstrap modal -->
  <div class="modal fade" id="modal_form5" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title5">Addrest Form</h3>
      </div>
      <div class="modal-body form">
        <form action="#" id="form5" class="form-horizontal">
          <input name="CargoReleaseCode" type="hidden" id="id" value=""/> 
          <div class="form-body">

            <div class="form-group">
              <label class="control-label col-md-3"> CWT</label>
              <div class="col-md-9">
                <input name="cwt" type="text" class="form-control nama" id="cwt" placeholder="Name" value="" />
              </div>
            </div>

            <div class="form-group">
              <label class="control-label col-md-3">Address</label>
              <div class="col-md-9">
                <textarea name="CargoDetails" placeholder="decription"class="form-control" id="CargoDetails"></textarea>
              </div>
            </div>
            
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" id="btnSave" onclick="save5()" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    
    
    <div class="modal fade" id="modal_cargo" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title5">Detail Cargo</h3>
      </div>
      <div class="modal-body form">
        <div class="detailrelease" id="detailrelease">details</div>
          </div>
          <div class="modal-footer"></div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div>
    
 <script type="text/javascript">
 function listcargo(myid){
	var cargocode=$(myid).html();	
	
			$.ajax({
                type: "POST",
                url : "<?php echo base_url('cargo_release/detail_list_cargo'); ?>",
				 data: "cargocode="+cargocode,
                cache:false,
                success: function(data){
					$("#modal_cargo").modal('show');
                    $('#detailrelease').html(data);
                    //document.frm.add.disabled=false;
                }
            });
	
}
 </script>