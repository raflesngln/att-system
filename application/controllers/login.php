<?php
class Login extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('model_app');
    }

    function index(){
        $data=array(
            'title'=>'Login Page'
        );
        $this->load->view('pages/v_login',$data);
    }

    function cek_login() {

        $username =mysql_escape_string($this->input->post('username'));
        $password =  mysql_escape_string(md5($this->input->post('password')));
        //query the database
        $result = $this->model_app->login('ms_user',$username, $password);
        if($result) {
            $sess_array = array();
            foreach($result as $row) {
                //create the session
                $sess_array = array(
                    'id' => $row->user_id,
                    'username' => $row->UserName,
                    'pass'=>$row->password,
                    'name'=>$row->FullName,
					'phone'=>$row->phone,
                    'level' => $row->level,
                    'login_status'=>true,
                );
                //set session with value from database
                $this->session->set_userdata($sess_array);
                redirect('dashboard','refresh');
            }
            return TRUE;
        } else {
            //if form validate false
            redirect('dashboard','refresh');
            return FALSE;
        }
    }

    function logout() {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('PASS');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('level');
        $this->session->unset_userdata('login_status');
        $this->session->set_flashdata('notif','THANK YOU FOR LOGIN IN THIS APP');
        redirect('login');
    }
}
