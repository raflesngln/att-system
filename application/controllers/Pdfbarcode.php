<?php

/*

 */
class Pdfbarcode extends CI_Controller {
    //put your code here
    public function __construct()
    {
        parent::__construct();
        $this->load->library('pdf_barcode/fpdf');
        $this->load->library('pdf_barcode/PDF_Code128');
		$this->load->model('model_app');
		date_default_timezone_set("Asia/Jakarta");
    } 
  
function barcode_generate($kode)
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
	$render = Zend_Barcode::factory('code128', 'image', $barcodeOPT, $renderOPT)->render();
}

    public function index() {
		
	$data['kodess']="JOB-200520016000006";
	$this->load->view('barcodeview',$data);
    }
	 function pritnttt() {
		
		$nohouse=$this->uri->segment(3);
        $data = array(
            'title'=>'domesctic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$nohouse'"),
        ); 
		
        $this->load->view('barcode/laporan_karyawan',$data);
    }
	
	
	
}
