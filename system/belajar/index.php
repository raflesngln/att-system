<?php
#koneksi
$conn = mysqli_connect("localhost", "root", "", "ajaxku");
#akhir-koneksi
#action get barang
if(isset($_GET['action']) && $_GET['action'] == "getBarang") {
$kode_brg = $_GET['kode_brg'];
//ambil data barang
$query = "SELECT kode_brg,qty,jenis,diskon,nm_barang,harga FROM barang WHERE kode_brg='$kode_brg'";
$sql = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($sql);
echo json_encode($row);
exit;
}
?>
<html>
<head>
<title>Contoh Manipulasi Combobox-Textbox dengan Ajax-JQuery</title>
<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">
    $(document).ready(function(){
    $('#kode_brg').change(function(){
   		 $.getJSON('index.php',
		 {
			 action:'getBarang',
			 kode_brg:$(this).val()}, 
			 function(json)
			 {
   			 if (json == null) 
			 {
			$('#skode').text('');
			$('#nm_barang').val('');
			$('#harga').val('');
			$('#qty').val('');
			$('#jenis').val('');
			$('#diskon').val('');
			}
			 else 
			 {
			$('#skode').text(json.kode_brg);
			$('#nm_barang').val(json.nm_barang);
			$('#harga').val(json.harga);
			$('#qty').val(json.qty);
			$('#jenis').val(json.jenis);
			$('#diskon').val(json.diskon);
   			 }
   		 });
    });
    });
</script>
</head>
<body>
<form>
Pilih Barang
<select name="kode_brg" id="kode_brg">
    <option value="">Pilih</option>
    <?php
    #ambil barang untuk combobox
    $query = "SELECT kode_brg,qty,jenis,diskon,nm_barang FROM barang ORDER BY nm_barang";
    $sql = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($sql)) 
    {
    echo "<option value='$row[kode_brg]'>$row[nm_barang]</option>";
    }
    ?>
</select>
<br />
<span id="skode"></span>
<br />
<input type="text" name="nm_barang" id="nm_barang" placeholder="Nama Barang" value=""/><br />
<input type="text" name="harga" id="harga" placeholder="Harga"/><br />
<input type="text" name="qty" id="qty" placeholder="qty" value=""/><br />
<input type="text" name="jenis" id="jenis" placeholder="jenis" value=""/><br />
<input type="text" name="diskon" id="diskon" placeholder="diskon" value=""/><br />
</form>
<a href="index.php">input</a>
</body>
</html>