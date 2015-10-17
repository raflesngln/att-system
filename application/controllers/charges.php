<?php
class Charges extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 
function view_charges(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list charges';
		$data['scrumb_name']='Data charges';
		$data['scrumb']='charges/view_charges';
		$data['service']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$data['list']=$this->model_app->getdata('ms_charges a',"inner join ms_service b on a.svCode=b.svCode order by a.ChargeCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_charges a',"inner join ms_service b on a.svCode=b.svCode order by a.ChargeCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'charges/view_charges/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/charges/v_charges';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_charges()
{	
$this->form_validation->set_rules('description','descriptiondescription','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('charges/view_charges');
	}
		else
	{
		$data=array(
		'ChargeCode'=>strtoupper($this->input->post('code')),
		'Description'=>$this->input->post('description'),
		'isCost'=>$this->input->post('iscost'),
		'isSales'=>$this->input->post('issales'),
		'svCode'=>$this->input->post('service'),
		'AccDebet'=>$this->input->post('debit'),
		'AccCredit'=>$this->input->post('credit'),
		'isActive'=>$this->input->post('status'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_charges',$data);	
		 redirect('charges/view_charges');
	 }
 }
 


//----update------------
function update_charges()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('description','description','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('charges/view_charges');
	}
		else
	{
	$update=array(
		'ChargeCode'=>strtoupper($this->input->post('code')),
		'Description'=>$this->input->post('description'),
		'isCost'=>$this->input->post('iscost'),
		'isSales'=>$this->input->post('issales'),
		'svCode'=>$this->input->post('service'),
		'AccDebet'=>$this->input->post('debit'),
		'AccCredit'=>$this->input->post('credit'),
		'isActive'=>$this->input->post('status'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d:h-s-m'),
		);	
		$this->model_app->update('ms_charges','ChargeCode',$code,$update);
	  redirect('charges/view_charges');
		}	
}

//------------delete data----------------------------------
function delete_charges(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('ms_charges','ChargeCode',$kode);
	redirect('charges/view_charges');
    }	
 }
 else
 {
	redirect('login'); 
 }
}
function search_charges(){  
	 
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
		
        $data['title']='list charges';
		$data['scrumb_name']='Data charges';
		$data['scrumb']='charges/view_charges';
				

		$data['list']=$this->model_app->getdata('ms_charges a',"inner join ms_service b on a.svCode=b.svCode where a.ChargeCode='$cari' OR a.Description like '%$cari%' order by a.ChargeCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_charges a',"inner join ms_service b on a.svCode=b.svCode where a.ChargeCode='$cari' OR a.Description like '%$cari%' order by a.ChargeCode ASC");
  	//create for pagination		
  			$config['base_url'] = base_url() . 'charges/view_charges/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/charges/v_charges';
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
		
		$data['list']=$this->model_app->getdata('ms_charges a',"inner join ms_service b on a.svCode=b.svCode where a.ChargeCode='$cari' OR a.Description like '%$cari%' order by a.ChargeCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_charges a',"inner join ms_service b on a.svCode=b.svCode where a.ChargeCode='$cari' OR a.Description like '%$cari%' order by a.ChargeCode ASC");
  //create for pagination		
			$config['base_url'] = base_url() . 'charges/view_charges/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/charges/filter',$data);
}
	



}


