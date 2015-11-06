<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barcode extends CI_Controller
{
	//$CI =& get_instance();
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->library('mylib');
    }

    function index()
    {
    	echo $this->mylib->hello('Raflesia Nainggolan Jakarta barat')."<br>";

    	echo  $this->mylib->rupiah(123920000);

    	//$this->load->view("barcodeview",$data);

    }
}

/* End of File: zendbar.php */