<!doctype html>
<html lang="us">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Example Page</title>
  <link rel="stylesheet" href="jquery-ui.theme.min.css">
  <script src="<?php echo base_url();?>jqueryui/external/jquery/jquery.js"></script>
  <script src="<?php echo base_url();?>jqueryui/jquery-ui.js"></script>
  <script>
  $(function() {
    $("#tgl").datepicker();
  });
  </script>

</head>
<body>
<h1>YOUR COMPONENTS:</h1>

<!-- Datepicker -->
<input type="text" id="tgl" name="tgl">
<br style="margin-bottom:150px">

<h2 class="demoHeaders">Datepicker</h2>
<div id="datepicker"></div>


<script>



$( "#datepicker" ).datepicker({
  inline: true
});




$( "#spinner" ).spinner();



</script>
</body>
</html>
