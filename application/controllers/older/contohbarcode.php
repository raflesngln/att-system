
<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
* Barcode Generator menggunakan Zend Framework library
*
* Ini adalah contoh membuat barcode di CI
* by Dimas Edubuntu Samid
* edudimas1@gmail.com | 0856-8400-407
*
**/

class Contohbarcode extends CI_Controller
{

function __construct()
{
parent::__construct();
}

function index()
{
	
$this->load->library('Bar128');
$a='rererer';
	// $hasil=$this->Bar128->bar128($a);

	echo $a;
//$this->load->view('barcodeview');
}

}


