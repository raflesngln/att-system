<?php
class Barcode extends CI_Controller
{
function gambar($kode)
	{
		$height =60;//tinggi barcode	
		$width = 2; //ketebalan barcode
		$this->load->library('zend');
        $this->zend->load('Zend/Barcode');
 		$barcodeOPT = array(
		    'text' => $kode, 
		    'barHeight'=> $height, 
		    'factor'=>$width,
		);
				
	$renderOPT = array();
	$render = Zend_Barcode::factory(
'code128', 'image', $barcodeOPT, $renderOPT
)->render();
	}
function index()
{
	$this->load->view('barcodeview');
}
}
