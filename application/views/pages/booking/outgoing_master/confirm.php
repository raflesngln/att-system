<div class="container" style="width:60%; border:1px #999 solid; padding-bottom:50px">
<h2 class="alert alert-warning"><i class="fa fa-check fa-2x"></i> Outgoing Master Berhasil di buat</h2>
<div class="col-sm-10 text-center">

<div class="col-sm-12">
<div class="col-sm-5 text-left"><strong>Nomor outgoing Manifest</strong></div>
<div class="col-sm-6 text-left"><strong>: &nbsp;  <?php echo $no_cargo;?></strong></div>
</div>

<div class="clearfix"><h1>&nbsp;</h1></div>

<div class="col-sm-12">
<div class="col-sm-4"><a href="<?php echo base_url();?>transaction/edit_outgoing_master/<?php echo $no_cargo;?>">
<button class="btn btn-primary btn-small"><i class="fa fa-edit"></i> Ubah Outgoing master</button></a></div>
<div class="col-sm-4"><a href="<?php echo base_url();?>transaction/domestic_outgoing_master"><button class="btn btn-success btn-small"><i class="fa fa-plus"></i>&nbsp; Buat Baru   &nbsp; </button></a></div>
<div class="col-sm-4"><a href="<?php echo base_url();?>transaction/cetak_outgoing_master/<?php echo $no_cargo;?>">
<button class="btn btn-danger btn-small"><i class="fa fa-print"></i> Cetak Invoice</button></a></div>

</div>

</div>

</div>