<?php
 
if(!function_exists('modul')){
	

function show($view,$data=array(),$template='template'){
	$ci=&get_instance();
	$data['view']=$view;
	$data=$ci->load->view('template/' .$template, $data);
	
}
	
	
}