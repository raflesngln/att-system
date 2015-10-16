<?php
class Staff extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 
function view_staff(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list Staff';
		$data['scrumb_name']='Data Staff';
		$data['scrumb']='staff/view_staff';
		$data['list']=$this->model_app->getdata('ms_staff',"order by empCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff a',"order by empCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'staff/view_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/staff/v_staff';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_staff()
{	
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('staff/view_staff');
	}
		else
	{
		$data=array(
		'empCode' =>'',
		'empInitial'=>strtoupper($this->input->post('initial')),
		'empName'=>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'Phone'=>$this->input->post('phone'),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_staff',$data);	
		 redirect('staff/view_staff');
	 }
 }
 


//----update------------
function update_staff()
{	

$code=$this->input->post('id2');
$this->form_validation->set_rules('name2','name2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('staff/view_staff');
	}
		else
	{
	$update=array(
		'empInitial'=>strtoupper($this->input->post('initial2')),
		'empName'=>$this->input->post('name2'),
		'Address'=>$this->input->post('address2'),
		'Phone'=>$this->input->post('phone2'),
		'isActive'=>$this->input->post('status2'),
		'Remarks'=>$this->input->post('remarks2'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d:h-s-m'),
		);	
		$this->model_app->update('ms_staff','empCode',$code,$update);
	  redirect('staff/view_staff');
		}	
}

//------------delete data----------------------------------
function delete_staff(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('ms_staff','empCode',$kode);
	redirect('staff/view_staff');
    }	
 }
 else
 {
	redirect('login'); 
 }
}
function search_staff(){  
	 
	 	$page=$this->uri->segment(3);
	 	$cari=$this->input->post('txtsearch');
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
        $data['title']='list Staff';
		$data['scrumb_name']='Data Staff';
		$data['scrumb']='staff/view_staff';
		$data['list']=$this->model_app->getdata('ms_staff',"where empInitial like '%$cari%' OR empName like '%$cari%' order by empCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff a',"where empInitial like '%$cari%' OR empName like '%$cari%' order by empCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'staff/view_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/staff/v_staff';
        $this->load->view('home/home',$data);
     }

function filter_staff(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['title']='list Staff';
		$data['scrumb_name']='Data Staff';
		$data['scrumb']='staff/view_staff';
		$data['list']=$this->model_app->getdata('ms_staff',"ORDER BY Address ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff',"ORDER BY Address ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'staff/filter_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		//$data['view']='pages/staff/filter';
		//$data['jumlah']=$data['list'];
       $this->load->view('pages/staff/filter',$data);
}
function search_staff_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_staff',"where empInitial like '$cari%' OR empName like '$cari%' order by empCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff a',"where empInitial like '$cari%' OR empName like '$cari%' order by empCode ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'staff/view_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/staff/filter',$data);
}
	


}


