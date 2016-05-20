<?php
class State extends CI_Controller{
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
	 
//--VIEW state 
function view_state(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list state';
		$data['scrumb_name']='Data state';
		$data['scrumb']='state/view_state';
		$data['list']=$this->model_app->getdata('ms_state',"order by StateCode ASC LIMIT $offset,$limit");
		$data['country']=$this->model_app->getdata('ms_country',"order by CountryName");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"order by StateCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'state/view_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/state/v_state';
        $this->load->view('home/home',$data);
     }
 
//--SAVE--------
function save_state()
{	
$this->form_validation->set_rules('StateCode','StateCode','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('state/view_state');
	}
		else
	{
		$code=$this->input->post('StateCode');
		$cari=$this->model_app->getdata('ms_state',"where StateCode='$code'");
		if($cari){ ?>
			<script type="text/javascript">
			alert('Data with This Code  has already exist !. try another code');
			history.back();
			</script>
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'StateCode' =>strtoupper($this->input->post('StateCode')),
		'StateName'=>strtoupper($this->input->post('StateName')),
		'Country'=>$this->input->post('tCountry'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_state',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list state';
		$data['scrumb_name']='Data state';
		$data['scrumb']='state/view_state';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['list']=$this->model_app->getdata('ms_state',"order by StateCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"order by StateCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'state/view_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/state/v_state';
        $this->load->view('home/home',$data);

	 }
 }

//----update------------
function update_state()
{	

$code=$this->input->post('StateCode2');
$this->form_validation->set_rules('StateCode2','StateCode2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('state/view_state');
	}
		else
	{
	$update=array(
		'StateCode'=>strtoupper($this->input->post('StateCode2')),
		'StateName'=>strtoupper($this->input->post('StateName2')),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);	
		$this->model_app->update('ms_state','StateCode',$code,$update);
	  redirect('state/view_state');
		}	
}

//------------delete data----------------------------------
function delete_state(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_state','StateCode',$kode);
			redirect('state/view_state');
	}
	else
	{
		 redirect('login');
    }	
 }

function search_state(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
        $data['title']='list State';
		$data['scrumb_name']='Data State';
		$data['scrumb']='state/view_state';
		$data['list']=$this->model_app->getdata('ms_state',"WHERE StateName LIKE '$cari%' order by StateName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"WHERE StateName LIKE '$cari%' order by StateName ASC");
		    					//create for pagination		
			$config['base_url'] = base_url() . 'search/search_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/state/v_state';
        $this->load->view('home/home',$data);
     }
 function search_state_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['list']=$this->model_app->getdata('ms_state',"WHERE StateName LIKE '$cari%' order by StateName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"WHERE StateName LIKE '$cari%' order by StateName ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();			
        $this->load->view('pages/state/filter',$data);
}	



}


