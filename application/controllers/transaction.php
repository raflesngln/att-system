<?php
class Transaction extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }
	
	
	
//     DATA TO SESSION
    function booking_shipment(){
        $data = array(
	  		'title'=>'Booking Shipment',
			'scrumb_name'=>'Booking Shipment',
			'scrumb'=>'transaction/booking_shipment',
			'view'=>'pages/booking/booking_shipment',
        );	
      //$this->load->view('pages/booking/ship',$data);
       $this->load->view('home/home',$data);
    }
    //     DATA TO SESSION
    function booking_list(){
        $data = array(
	  		'title'=>'Booking list',
			'scrumb_name'=>'Booking list',
			'scrumb'=>'transaction/booking_list',
			'view'=>'pages/booking/booking_list',
        );	
      $this->load->view('home/home',$data);
    }
     //     DATA TO SESSION
    function domesctic_outgoing(){
        $data = array(
            'title'=>'Domestic_outgoing',
            'scrumb_name'=>'domestic_outgoing',
            'scrumb'=>'transaction/domesctic_outgoing',
            'view'=>'pages/booking/domesctic_outgoing',
        );  
      $this->load->view('home/home',$data);
    }

    
//------------delete data----------------------------------
function hapus_item_temp(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('temp','awb_no',$kode);
	redirect('transaksi/add_transaksi');
    }	
}








}


