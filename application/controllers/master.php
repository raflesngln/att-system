<?php
class Master extends CI_Controller{
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

function gallery(){  


		$data['view']='pages/gallery/gallery';
        $this->load->view('home/home',$data);
}
	 //--VIEW MASTER USER
function view_user(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list User';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$data['user']=$this->model_app->getdatapaging('*','ms_user',"");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
     } 
	

 //--VIEW MASTER 
function view_disc(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list Disc';
		$data['scrumb_name']='Data Disc';
		$data['scrumb']='master/view_disc';
		$data['cust']=$this->model_app->getdata('ms_customer',"");
		$data['service']=$this->model_app->getdata('ms_service',"");
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['vendor']=$this->model_app->getdata('ms_vendor',"");	
		
		$data['list']=$this->model_app->getdatapaging('a.discCode,a.ori,a.dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","
		inner join ms_customer b on a.custCode=b.custCode
		inner join ms_service c on a.svCode=c.svCode
		left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode
		order by a.discCode ASC LIMIT $offset,$limit");
		
		$tot_hal = $this->model_app->hitung_isi_tabel('a.discCode,a.Ori,a.Dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","inner join ms_customer b on a.custCode=b.custCode inner join ms_service c on a.svCode=c.svCode left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode order by a.discCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_disc/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/disc/v_disc';
        $this->load->view('home/home',$data);
     }


	 
function save_user()
{	
$user =$this->input->post('us');
$cek=$this->model_app->getdata('ms_user',"where UserName='$user'");
if($cek)
{
$data['eror']='Username dengan '.$user.' sudah ada.coba dengan Username yang lain';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list_customer';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
		
}
else
{
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_user');
	}
		else
	{
		$data=array(
		'UserName' =>$this->input->post('us'),
		'FullName'=>$this->input->post('name'),
		'password'=>md5($this->input->post('ps')),
		);		
		 $this->model_app->insert('ms_user',$data);	
		 redirect('master/view_user');
	 }
 }
} 

 //--SAVE---------
function save_disc()
{	
$code =$this->input->post('coucode');
$cek=$this->model_app->getdata('ms_disc',"where discCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another Code !';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list disc';
		$data['scrumb_name']='Data disc';
		$data['scrumb']='master/view_disc';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_disc',"order by Name ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_disc',"order by Name ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_disc/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/disc/v_disc';
        $this->load->view('home/home',$data);
		
}
else
{
$this->form_validation->set_rules('cust','cust','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_disc');
	}
		else
	{
		$data=array(
		'custCode'=>$this->input->post('cust'),
		'svCode'=>$this->input->post('service'),
		'cyCode'=>$this->input->post('city'),
		'ori'=>$this->input->post('ori'),
		'dest'=>$this->input->post('dest'),
		'venCode'=>$this->input->post('vendor'),
		'DiscPersen'=>$this->input->post('persen'),
		'DiscRupiah'=>$this->input->post('rp'),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_disc',$data);	
		 redirect('master/view_disc');
	 }
 }
} 
 

//----update------------
function update_disc()
{	
$code=$this->input->post('id');
$this->form_validation->set_rules('cust','cust','required|trim|xss_clean');
$this->form_validation->set_rules('service','service','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_disc');
		}
		else
		{
		$update=array(
		'custCode'=>$this->input->post('cust'),
		'svCode'=>$this->input->post('service'),
		'Ori'=>$this->input->post('ori'),
		'Dest'=>$this->input->post('dest'),
		'venCode'=>$this->input->post('vendor'),
		'DiscPersen'=>$this->input->post('persen'),
		'DiscRupiah'=>$this->input->post('rp'),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);
		$this->model_app->update('ms_disc','discCode',$code,$update);
	  redirect('master/view_disc');
	}
}


//----update------------
function update_user()
{	
$code=$this->input->post('id2');
$us2 =$this->input->post('us2');
if($code==$us2)
{
$id=$this->input->post('id2');
 $this->form_validation->set_rules('us2','us2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			echo "<script> alert('Complete your Input !');</script>";
			
		redirect('master/view_user');
		}
		else
		{
		$dataubah=array(
		'UserName'=>$this->input->post('us2'),
		'Password'=>md5($this->input->post('ps2')),
		'FullName'=>$this->input->post('name2'),
		);
		
		$this->model_app->update('ms_user','UserName',$id,$dataubah);
	  redirect('master/view_user');
 	}
}
 else
 { 
$cek=$this->model_app->getdata('ms_user',"where UserName='$id'");
if($cek)
{
$data['eror']='Username dengan ' .$us2. ' sudah ada.coba dengan Username yang lain';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list_customer';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
		
		} 
 }
}

//------------delete data----------------------------------
function delete_user(){
	 $kode=$this->uri->segment(3);
    $this->model_app->delete_data('ms_user','UserName',$kode);
	redirect('master/view_user');
}
//------------delete data----------------------------------
function delete_disc(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_disc','discCode',$kode);
	redirect('master/view_disc');
}


	//===========tambah_akun====================
function update_akun()
{	
$idsubparent=$this->input->post('idsubparent');

 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_parent2','id_parent2','required|trim|xss_clean');
	 $this->form_validation->set_rules('nm_akun','nm_akun','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			
		  redirect('master/view_account');
		}
		else
		{
		$dataubah=array(
		'id_sub_parent'=>$this->input->post('id_parent2'),
		'nm_akun'=>$this->input->post('nm_akun'),
		'detail'=>$this->input->post('detail2'),
		);
		
		$this->model_app->update('akun','id_parent',$idsubparent,$dataubah);
	  redirect('master/view_account');
 }
 }
 else
 {
 redirect('login');
 }
}

public function backup()
  {
     $this->load->dbutil(); 
     $this->load->helper('file');
      $this->load->helper('download');
     $prefs = array(
         'tables'      => array('ms_currency','ms_state','ms_charges','ms_city','ms_commodity','ms_country','ms_customer','ms_disc','ms_service','ms_staff','ms_user',
         					'ms_vendor',),  
         'ignore'      => array(),           
         'format'      => 'txt',             
         'filename'    => 'mybackup.sql',    
         'add_drop'    => TRUE,              
         'add_insert'  => TRUE,              
         'newline'     => "\n"               
     );
     // Backup your entire database and assign it to a variable
     $backup =& $this->dbutil->backup($prefs);
 
     // Load the file helper and write the file to your server
    
     $file_name = date('dmY:hi').'-backup_data.sql';
     write_file('/'.$file_name, $backup);
     // Load the download helper and send the file to your desktop
     force_download($file_name, $backup);
 }
 function restoreDB(){
 	    $data=array(
 	    'title'=>'Restore Database',
		'scrumb_name'=>'Restore Database',
		'scrumb'=>'master/restoreDB',
		'view'=>'pages/backup/restore'
		);
        $this->load->view('home/home',$data);
 }
function restore(){
		//upload dulu filenya
		$fupload = $_FILES['fileku'];
		 $nama = $_FILES['fileku']['name'];
	
		//if(isset($fupload)){
		$lokasi_file = $fupload['tmp_name'];
		$direktori="./asset/backup/$nama";
		move_uploaded_file($lokasi_file,"$direktori");

		//$isi_file=file_get_contents('./asset/backup/20102015-102426-backup_data.sql');
		$isi_file=file_get_contents($direktori);
		$string_query=rtrim($isi_file,"\n;");
		$array_query=explode(";",$string_query);
		foreach($array_query as $query){
		$result=$this->db->query($query);
	}
		if($result){
			$message='Restoring database Success !';
			$status='success';
			} else {
				$message='Failed to restore database !';
				$status='error';
			}
		   $data=array(
	 	    'title'=>'Restore Database',
			'scrumb_name'=>'Restore Database',
			'scrumb'=>'master/restoreDB',
			'message'=>$message,
			'status'=>$status,
			'view'=>'pages/backup/restore',
			);
      		$this->load->view('home/home',$data);			
		

	}






}


