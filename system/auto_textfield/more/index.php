<html>

   <head>
      <title>The jQuery Example</title>
      <script type = "text/javascript" 
         src = "http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    
      <script type = "text/javascript" language = "javascript">
         $(document).ready(function() {
      
            $("#driver").click(function(event){
               $.getJSON('ambil_detail.php',

                function(jd) {
                  $('#stage').html('<p> Name: ' + jd.nm_barang + '</p>');
                  $('#stage').append('<p>Age : ' + jd.harga+ '</p>');
                  $('#stage').append('<p> Sex: ' + jd.stok+ '</p>');
				   $('#hrg').val(jd.nm_barang);
				   $('#nm').val(jd.stok);
               });
            });
        
         });
      </script>
   </head>
  
   <body>
  
      <p>Click on the button to load result.html file:</p>
    
      <div id = "stage" style = "background-color:#cc0;">
         STAGE
         
      </div>
    
      <p>
        <input type = "button" id = "driver" value = "Load Data" />
      </p>
      <table width="200" border="1">
        <tr>
          <td>umur</td>
          <td><input type="text" id="hrg" value=""></td>
        </tr>
        <tr>
          <td>nama</td>
          <td><input name="nm" type="text" id="nm" value=""></td>
        </tr>
      </table>
      <p>&nbsp;</p>
   </body>
  
</html>