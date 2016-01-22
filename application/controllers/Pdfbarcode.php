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
    
    public function index() {
		
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
	 function printhouse() {
		
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
