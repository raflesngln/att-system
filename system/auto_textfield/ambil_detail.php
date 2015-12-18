<?php

$conn = mysqli_connect("localhost", "root", "", "ajaxku");
if(isset($_GET['action']) && $_GET['action'] == "getDetail") {
$kode_brg = $_GET['kode_brg'];

$query = "SELECT kode_brg,stok,jenis,diskon,nm_barang,harga FROM barang WHERE kode_brg='$kode_brg'";
$sql = mysqli_query($conn, $query);
while($row = mysqli_fetch_object($sql)){
		
			$dt=array(
			'kode_brg'=>$row->kode_brg,
			'nm_barang'=>$row->nm_barang,
			'harga'=>$row->harga,
			'stok'=>$row->stok,
			'jenis'=>$row->jenis,
			'diskon'=>$row->diskon,
			);
echo json_encode($dt);
exit;
}
}
?>
