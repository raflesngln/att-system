<?php
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
		date_default_timezone_set("Asia/Jakarta"); 
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
 function change_profil(){
 	$iduser=$this->input->post('iduser');
 	$old=$this->input->post('old');
 	$pass=md5($this->input->post('old'));
 	$new=$this->input->post('new');
 	$retype=$this->input->post('retype');
 	$username=$this->input->post('username');

 	if($old==""){

 		$update=array(
		'FullName'=>$this->input->post('fullname'),
		'Email'=>$this->input->post('email'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);
		$this->model_app->update('ms_user','id_user',$iduser,$update);
		redirect('user/profil_user');
 	}
 	else  {
 		
 			$cek=$this->model_app->getdata('ms_user',"WHERE Password='$pass'");
 			if($cek){
 				
 				if($new==$retype AND !empty($new)){

 		$update=array(
		'FullName'=>$this->input->post('fullname'),
		'Email'=>$this->input->post('email'),
		'Password'=>md5($new),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);
		$this->model_app->update('ms_user','id_user',$iduser,$update);
		redirect('user/profil_user');

 				} else {
 					?>
 				<script>
 				alert('Password Baru Anda tidak sama atau masih kosong.Mohon ulangi !');
 				document.location='<?php echo base_url();?>user/profil_user';
 				</script>;
 			<?php
 				}
 			} else {

 				?>

 				<script>
 				alert('Password Lama Anda Salah !');
 				document.location='<?php echo base_url();?>user/profil_user';
 				</script>;
		<?php	
 			}
 		}

}










}


