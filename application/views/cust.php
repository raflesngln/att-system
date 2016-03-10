  <html>
    	<head>
    		<title>Contoh Manipulasi Combobox-Textbox dengan Ajax-JQuery</title>
    		<script type="text/javascript" src="jquery.min.js"></script>
   <style>
   #kode{color:#CE0067;
   }
   
   </style>
    	</head>
    	<body>
    		
    			
  <br>
    			
   			  <table width="505" border="0">
   			    <tr>
   			      <td width="41">Pilih nama</td>
   			      <td width="250">
                  <select name="kode" id="kode">
   			        <option value="">Pilih Nama</option>
   			        <?php
					foreach($customer as $row){
					?>
		<option value="<?php echo $row->custCode;?>"><?php echo $row->custName;?></option>
    		<?php } ?>
		          </select></td>
		        </tr>
  <tr>
    <td height="37">Kode</td>
    <td><span id="skode"></span><br></td>
  </tr>
  <tr>
    <td height="50">Nama</td>
    <td><input type="text" name="nama" id="nama" placeholder="Nama Barang"/></td>
    </tr>
  <tr>
    <td height="42">Alamat</td>
    <td><input type="text" name="alamat" id="alamat" placeholder="Harga"/></td>
    </tr>
</table>    
       

    		<script type="text/javascript">
   $('#kode').change(function(){
    					$.getJSON('<?php echo base_url();?>cust/search_cust',
						{
							action:'getData', kode:$(this).val()}, 
							function(json){
    						if (json == null) {
    							$('#skode').text('');
    							$('#nama').val('');
    							$('#alamat').val('');
    						} else {
    							$('#skode').text(json.custCode);
    							$('#nama').val(json.custName);
    							$('#alamat').val(json.Address);
    						}
    					});
    				});
    			
    		</script>
            
    	</body>
    </html>

