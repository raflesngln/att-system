<?php
class Backup extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 

function profil_user(){  
	$id_user=$this->session->userdata('idusr');
	$data=array(
		'title'=>'profil_user ',
		'scrumb_name'=>'profil_user',
		'scrumb'=>'user/profil_user',
		'userprofil'=>$this->model_app->getdata('ms_user',"WHERE id_user='$id_user'"),
        'view'=>'pages/user/profil_user',
        );
        $this->load->view('home/home',$data);
 
}


/////////////////////










}


