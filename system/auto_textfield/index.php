
<html>
<head>
<title>Contoh Manipulasi Combobox-Textbox dengan Ajax-JQuery</title>
<script type="text/javascript" src="jquery.js"></script>

</head>
<body>
<form>
Pilih Barang
<select name="kode_brg" id="kode_brg">
    <option value="">Pilih</option>
    <?php
	$conn = mysqli_connect("localhost", "root", "", "ajaxku");
    #ambil barang untuk combobox
    $query = "SELECT kode_brg,stok,jenis,diskon,nm_barang FROM barang ORDER BY nm_barang";
    $sql = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($sql)) 
    {
    echo "<option value='$row[kode_brg]'>$row[nm_barang]</option>";
    }
    ?>
</select>
<br />

<br /><table width="356" border="0">
  <tr>
    <td colspan="2">detail</td>
    </tr>
  <tr>
    <td>kode</td>
    <td><input type="text" name="kode" id="kode" placeholder="kd Barang" value=""/></td>
  </tr>
  <tr>
    <td width="140">nama barang</td>
    <td width="200"><input type="text" name="nm_barang" id="nm_barang" placeholder="Nama Barang" value=""/></td>
  </tr>
  <tr>
    <td>harga</td>
    <td><input type="text" name="harga" id="harga" placeholder="Harga"/></td>
  </tr>
  <tr>
    <td>stok</td>
    <td><input type="text" name="stok" id="stok" placeholder="stok" value=""/></td>
  </tr>
  <tr>
    <td>jenis</td>
    <td><input type="text" name="jenis" id="jenis" placeholder="jenis" value=""/></td>
  </tr>
  <tr>
    <td>diskon</td>
    <td><input type="text" name="diskon" id="diskon" placeholder="diskon" value=""/></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table><br />
</form>
<script type="text/javascript">
    $(document).ready(function(){
    $('#kode_brg').change(function(){
   		 $.getJSON('ambil_detail.php',
		 {
			 action:'getDetail',
			 kode_brg:$(this).val()}, 
			 function(json)
			 {
   			 if (json == null) 
			 {
			$('#kode').val('');
			$('#nm_barang').val('');
			$('#harga').val('');
			$('#stok').val('');
			$('#jenis').val('');
			$('#diskon').val('');
			}
			 else 
			 {
			$('#kode').val(json.kode_brg);
			$('#nm_barang').val(json.nm_barang);
			$('#harga').val(json.harga);
			$('#stok').val(json.stok);
			$('#jenis').val(json.jenis);
			$('#diskon').val(json.diskon);
   			 }
   		 });
    });
    });
</script>

</body>
</html>