<?php
class Commodity extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 
function view_commodity(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list commodity';
		$data['scrumb_name']='Data commodity';
		$data['scrumb']='commodity/view_commodity';
		$data['list']=$this->model_app->getdata('ms_commodity',"order by commCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"order by commCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'commodity/view_commodity/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/commodity/v_commodity';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_commodity()
{	
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('commodity/view_commodity');
	}
		else
	{
		$data=array(
		'commCode'=>strtoupper($this->input->post('code')),
		'Name'=>$this->input->post('name'),
		'Section'=>$this->input->post('section'),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_commodity',$data);	
		 redirect('commodity/view_commodity');
	 }
 }
 


//----update------------
function update_commodity()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('commodity/view_commodity');
	}
		else
	{
	$update=array(
		'commCode'=>strtoupper($this->input->post('code')),
		'Name'=>$this->input->post('name'),
		'Section'=>$this->input->post('section'),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d:h-s-m'),
		);	
		$this->model_app->update('ms_commodity','commCode',$code,$update);
	  redirect('commodity/view_commodity');
		}	
}

//------------delete data----------------------------------
function delete_commodity(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('ms_commodity','commCode',$kode);
	redirect('commodity/view_commodity');
    }	
 }
 else
 {
	redirect('login'); 
 }
}
function search_commodity(){  
	 
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
		
        $data['title']='list commodity';
		$data['scrumb_name']='Data commodity';
		$data['scrumb']='commodity/view_commodity';
		$data['list']=$this->model_app->getdata('ms_commodity',"where Name like '%$cari%' OR Section like '%$cari%' order by commCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"where Name like '%$cari%' OR Section like '%$cari%' order by commCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'commodity/view_commodity/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/commodity/v_commodity';
        $this->load->view('home/home',$data);
     }

function search_commodity_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_commodity',"where Name like '$cari%' OR Section like '$cari%' order by commCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"where Name like '$cari%' OR Section like '$cari%' order by commCode ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'commodity/view_commodity/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/commodity/filter',$data);
}
	



}


