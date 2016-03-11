<?php
class Dashboard extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
    }

    function index(){
       	  $data['view']='home/welcome';
	  $this->load->view('home/home',$data);
	}

    function welcome(){
      
	  $data['view']='home/welcome';
	  $this->load->view('home/home',$data);
	}
	
	

}
