<?php
class Service extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 
//--VIEW service 
function view_service(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list Service';
		$data['scrumb_name']='Data Service';
		$data['scrumb']='service/view_service';
		$data['list']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"order by svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'service/view_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/service/v_service';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_service()
{	
$this->form_validation->set_rules('code','code','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('service/view_service');
	}
		else
	{
		$code=$this->input->post('code');
		$cari=$this->model_app->getdata('ms_service',"where svCode='$code'");
		if($cari){
			$message="Data with code ( ".$code." ) has Exist, Try another Code!";
			$clas='error';
		} else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'svCode' =>strtoupper($this->input->post('code')),
		'Name'=>strtoupper($this->input->post('name')),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_service',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list Service';
		$data['scrumb_name']='Data Service';
		$data['scrumb']='service/view_service';
		$data['scrumb']='service/view_service';
		$data['message']=$message;
		$data['clas']=$clas;
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"order by svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'service/view_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/service/v_service';
        $this->load->view('home/home',$data);

	 }
 }

//----update------------
function update_service()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('service/view_service');
	}
		else
	{
		$update=array(
		'svCode'=>strtoupper($this->input->post('code')),
		'Name'=>strtoupper($this->input->post('name')),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d'),
		);
		$this->model_app->update('ms_service','svCode',$code,$update);
		redirect('service/view_service');
		}	
}

//------------delete data----------------------------------
function delete_service(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
    $this->model_app->delete_data('ms_service','svCode',$kode);
	redirect('service/view_service');
	}
	else
	{
		 redirect('login');
    }	
 }

function search_service(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list Service';
		$data['scrumb_name']='Data Service';
		$data['scrumb']='master/view_service';
		$data['list']=$this->model_app->getdata('ms_service',"WHERE Name like '%$cari%' OR svCode='$cari' ORDER BY svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"WHERE Name like '%$cari%' OR svCode='$cari' ORDER BY svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'service/search_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/service/v_service';
        $this->load->view('home/home',$data);
     }

 function search_service_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
	$data['list']=$this->model_app->getdata('ms_service',"WHERE Name like '%$cari%' OR svCode='$cari' ORDER BY svCode ASC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"WHERE Name like '%$cari%' OR svCode='$cari' order by svCode ASC");
	        
	//create for pagination		
			$config['base_url'] = base_url() . 'service/search_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/service/filter',$data);
}
	



}


