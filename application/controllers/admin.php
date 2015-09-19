<?php
class Admin extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
$this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('login');
        };
        $this->load->model('admin_model');
		session_start();
    }

     //===========FORM PROFIL===================
	function profil_admin()
{
	  if($this->session->userdata('login_status') != TRUE ){
		redirect('login');
	  }
	else
	{
		$data['view']='pages/profil_admin';
	$this->load->view('home/home',$data);
	}
} 
//===========ubah PROFIL===================
	function update_password()
{
		$username =$this->input->post('username');
		$password =$this->input->post('password');
		$password=MD5($password);
		$baru =$this->input->post('baru');
		$ulang =$this->input->post('ulang');
		
        $result = $this->admin_model->cek($username,$password);
        if($result)
		 {
			if($baru==$ulang)
			{
				$id=$this->session->userdata('id');
				$data_admin=array(
				'password' =>md5($this->input->post('baru')),
				'nama' =>$this->input->post('nama'),
				'username' =>$this->input->post('username')
				);
				
	$this->admin_model->update_data('tbl_admin','id_admin',$id,$data_admin);
	
$data['message']='<font color="#00B000">'.'Anda berhasil ganti password !'.'</font>';
				
				$data['view']='pages/profil_admin';
               $this->load->view('home/home',$data);
            }
			else
			{
				$data['message']='<font color="#FF0000">'.'Pasword baru tidak cocok,Mohon di ulangi password baru anda !'.'</font>';
				$data['view']='pages/profil_admin';
               $this->load->view('home/home',$data);
			}
           
        } 
		else
		 {
            //if form validate false
				$data['message']='<font color="#FF0000">'.'Username dan Password lama salah  !'.'</font>';
				$data['view']='pages/profil_admin';
               $this->load->view('home/home',$data);
           // return FALSE;
        }

} 
//===========GFORM Password===================
	function ubah_pass()

	{
	$kode=$this->session->userdata('id');
	$profil['data']=$this->model_admin->profil_user($kode);
	if($profil)
	{
	show('ubah_pass',$profil);
	}
	else
	{
	redirect('login');
	}
	}


}
