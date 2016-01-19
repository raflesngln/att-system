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
    } 
    
    public function index() {
        $res['data'] = $this->model_app->getdata("ms_customer",'');
        $this->load->view('barcode/laporan_karyawan',$res);
    }
}
