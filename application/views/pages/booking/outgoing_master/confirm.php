<div class="container" style="width:60%; border:1px #999 solid; padding-bottom:50px">
<h2 class="alert alert-warning"><i class="fa fa-check fa-2x"></i> Outgoing Master ( <?php echo '<font color="#0033FF">'.$houseno.'</font>';?> ) Berhasil di buat</h2>
<div class="col-sm-10 text-center">

<div class="col-sm-12">
<div class="col-sm-5 text-left"><strong>Nomor outgoing Master</strong></div>
<div class="col-sm-6 text-left"><strong>: &nbsp;  <?php echo $houseno;?></strong></div>
</div>

<div class="clearfix"><h1>&nbsp;</h1></div>

<div class="col-sm-12">
<div class="col-sm-4"><a href="<?php echo base_url();?>transaction/edit_outgoing_master/<?php echo $houseno;?>">
<button class="btn btn-primary btn-large"><i class="fa fa-edit"></i> Edit  master</button></a></div>
<div class="col-sm-4"><a href="<?php echo base_url();?>transaction/domestic_outgoing_master"><button class="btn btn-success btn-large"><i class="fa fa-plus"></i>&nbsp; Buat Baru   &nbsp; </button></a></div>
<div class="col-sm-4">
<form action="<?php echo base_url();?>transaction/print_invoice_OM" method="post" target="new">
<input type="hidden" value="<?php echo $houseno;?>" name=" houseno" />
<button class="btn btn-danger btn-large" type="submit"><i class="fa fa-print"></i> Cetak Invoice</button>
</form>
</div>

</div>

</div>

</div>