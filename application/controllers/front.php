<?php
class Front extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }
	
		 ///////////////////add_transaksi//////////////////////////////////	
function home(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$data=array(
	 'title'=>'Add transaksi',
	 'view'=>'data_customer'
	 	);
	$this->load->view('home/home',$data);
 }
 else
 {
	redirect('login');  
 }
}


}
