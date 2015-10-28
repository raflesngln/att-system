<?php
class Payment extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }
	
	
	
//     DATA TO paymrnt request
    function payment_request(){
        $data = array(
	  		'title'=>'payment_request',
			'scrumb_name'=>'payment_request',
			'scrumb'=>'payment/payment_request',
            'staff'=>$this->model_app->getdatapaging("empCode,empInitial,empName","ms_staff","ORDER BY empName"),
            'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
			'view'=>'pages/payment/payment_request',
        );	
      //$this->load->view('pages/booking/ship',$data);
       $this->load->view('home/home',$data);
    }

//   data settlement
    function settlement_request(){
        $data = array(
            'title'=>' settlement_request',
            'scrumb_name'=>' settlement_request',
            'scrumb'=>'payment/settlement_request',
            'staff'=>$this->model_app->getdatapaging("empCode,empInitial,empName","ms_staff","ORDER BY empName"),
            'view'=>'pages/payment/settlement_request',
             'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
        );  
       $this->load->view('home/home',$data);
    }




}


