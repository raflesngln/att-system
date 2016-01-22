<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
	<link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>asset/fontawesome/css/font-awesome.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo base_url();?>asset/css/font-awesome.min.css" />
  

		<link href="<?php echo base_url();?>asset/css/my_style.css" rel="stylesheet" />
        <link href="<?php echo base_url();?>asset/css/bootstrap.min.css" rel="stylesheet" />
		<link href="<?php echo base_url();?>asset/css/bootstrap-responsive.min.css" rel="stylesheet" />
	
        <link rel="stylesheet" href="<?php echo base_url();?>asset/jquery_ui/themes/base/jquery.ui.all.css">

		<!--[if IE 7]>
		  <link rel="stylesheet" href="assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!--page specific plugin styles-->
		<!--fonts-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.</title>
<style>
P{ margin-top:-4PX;}

table{
	width:80%;
	margin-top:9px;
}
footer{display:none;}
</style>
</head>

<body>

<div class="container">

<div id="nama">
    <?php foreach($connote as $data){

		 ?>
<table width="" border="1">
  <tr>
    <td width="56"><p>XSYS</p>
      <p>EXpress Network</p></td>
    <td width="42"><p>PT.Expresindo System Network</p>
      <p>perkantoran Galaxy Blok N-27</p>
      <p>Outer Ring Road Barat</p>
      <p>Cengkareng-Jakarta Barat 11730</p></td>
    <td width="45"><p>ORIGINAL/ASAL</p>
      <p><?php echo $data->Origin;?></p></td>
    <td width="159"><p>DESTINATION/TUJUAN</p>
      <p><?php echo $data->Destination;?></p></td>
    <td width="159"><p>|||||||||||||||||||||</p>
      <p>&nbsp;</p>      <?php echo $data->HouseNo;?></td>
  </tr>
  <tr>
    <td>Account No.</td>
    <td>dfgdgd</td>
    <td>gdgdgd</td>
    <td>fdggf</td>
    <td>dsfdsf</td>
  </tr>
  <tr>
    <td>fdgdg</td>
    <td>dfgdg</td>
    <td>dfg</td>
    <td>dfgdgdfgg</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>dfgd</td>
    <td>dfgdg</td>
    <td>dfggdg</td>
    <td>dfgd</td>
    <td>&nbsp;</td>
  </tr>
</table>
<?php } ?>
</div>

<div class="row">
<div class="col-sm-3">jakarta barat</div>
<div class="col-sm-3">jakarta barat</div>
<div class="col-sm-3">jakarta barat</div>
</div>


<button onclick="printContent('nama')">Print</button>
</div>



<script>
function printContent(el){
	var restorepage = document.body.innerHTML;
	var printcontent = document.getElementById(el).innerHTML;
	document.body.innerHTML = printcontent;
	window.print();
	document.body.innerHTML = restorepage;
}
</script>
</body>
</html>