<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Barcode extends CI_Controller
{
    //put your code here
    function __construct()
    {
        parent::__construct();
        $this->load->library('zend');
    }

    function index()
    {

        $this->load->view("barcodeview");

    }

    function generate($kode)
    {
        // we load zend barcode
        $this->zend->load('Zend/Barcode');
        Zend_Barcode::renderer('code128', 'image', array('text' => $kode), array());

        // we can save it with image
       // $test = Zend_Barcode::draw('code128', 'image', array('text' => '1234565'), array());
        //var_dump($test);
     //   imagejpeg($test, 'barcode.jpg', 100);

        }
}

/* End of File: zendbar.php */