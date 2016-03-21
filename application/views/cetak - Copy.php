<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JQuery Print Area</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="bootstrap.min.css" rel="stylesheet" media="screen">
	
	<!-- css yang digunakan ketika dalam mode screen -->
	
	<!-- ss yang digunakan tampilkan ketika dalam mode print -->
	<link href="print.css" rel="stylesheet" media="print">
	
	<script src="<?php echo base_url();?>asset/js/bootstrap.min.js"></script>
    	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <script src="<?php echo base_url();?>asset/printarea/jquery.PrintArea.js"></script>
	<script>
		(function($) {
			// fungsi dijalankan setelah seluruh dokumen ditampilkan
			$(document).ready(function(e) {
				// aksi ketika tombol cetak ditekan
				$("#cetak").bind("click", function(event) {
					// cetak data pada area <div id="#data-mahasiswa"></div>
					$('#data-mahasiswa').printArea();
				});
			});
		}) (jQuery);
	</script>
    <style>

/* menyembunyikan tombol aksi */
.action {
	display: none;
}

/* memberikan border pada tabel */
.table { border-right: 1px solid black; border-bottom: 1px solid black; }
.table th, .table td { border-left: 1px solid black; border-top: 1px solid black; padding: 3px; font-size: 12px}
.title {
	display: none;
}	
	</style>
</head>

<body>

<div class="navbar navbar-static-top">
	<div class="navbar-inner">
		<div class="container">LIST STAFF</div>
	</div>
</div>

<div class="container">
	<div class="row">


		
	  <div id="data-mahasiswa">
		
		<!-- tampilkan ketika dalam mode print -->
		<div class="title">
			<center>
				DAFTAR STAFF
			</center>
		</div>
		
		<table border="1" cellpadding="0" cellspacing="0" class="table table-condensed table-bordered table-hover">
			<thead>
			<tr bgcolor="#CCCCCC">
				<th width="2%" height="38">#</th>
				<th width="20%">Nama</th>
				<th>Alamat</th>
				<th width="12%">Phone</th>
				<th width="12%">Status</th>
				<th width="9%" class="action"></th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1. </td>
				<td>Ridwan</td>
				<td>Jakarta barat</td>
				<td>089787878787</td>
				<td>Aktif</td>
				<!-- sembunyikan ketika dalam mode print -->
				<td class="action">
					<a href="#" class="btn btn-mini">Ubah</a>
					<a href="#" class="btn btn-mini">Hapus</a>
				</td>
			</tr>
			<tr>
				<td>1. </td>
				<td>Budi</td>
				<td>Jakarta barat</td>
				<td>089787878787</td>
				<td>Aktif</td>
				<!-- sembunyikan ketika dalam mode print -->
				<td class="action">
					<a href="#" class="btn btn-mini">Ubah</a>
					<a href="#" class="btn btn-mini">Hapus</a>
				</td>
			</tr>
		</tbody>
		</table>		
		
		</div>
	</div>
    		<h3>
    		  <button id="cetak" class="btn pull-right btn-primary">Cetak</button>
  </h3>
</div>

</body>
</html>
