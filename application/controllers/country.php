<?php
class Country extends CI_Controller{
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
	 
//--VIEW country 
function view_country(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list Country';
		$data['scrumb_name']='Data Country';
		$data['scrumb']='country/view_country';
		$data['list']=$this->model_app->getdata('ms_country',"order by CountryCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country',"order by CountryCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'country/view_country/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/country/v_country';
        $this->load->view('home/home',$data);
     }
 
//--SAVE--------
function save_country()
{	
$this->form_validation->set_rules('CountryCode','CountryCode','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('country/view_country');
	}
		else
	{
		$code=$this->input->post('CountryCode');
		$cari=$this->model_app->getdata('ms_country',"where CountryCode='$code'");
		if($cari){ ?>
			<script type="text/javascript">
			alert('Data with This Code  has already exist !. try another code');
			history.back();
			</script>	
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'CountryCode' =>strtoupper($this->input->post('CountryCode')),
		'CountryName'=>strtoupper($this->input->post('CountryName')),
		'Remarks'=>$this->input->post('Remarks'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_country',$newdata);	
		}

	 redirect('country/view_country');

	 }
 }

//----update------------
function update_country()
{	

$code=$this->input->post('id2');
$this->form_validation->set_rules('CountryCode','CountryCode','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('country/view_country');
	}
		else
	{
	$update=array(
		'CountryCode' =>strtoupper($this->input->post('CountryCode')),
		'CountryName'=>strtoupper($this->input->post('CountryName')),
		'Remarks'=>$this->input->post('Remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);	
		$this->model_app->update('ms_country','CountryCode',$code,$update);
	  redirect('country/view_country');
		}	
}

//------------delete data----------------------------------
function delete_country(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_country','CountryCode',$kode);
			redirect('country/view_country');
	}
	else
	{
		 redirect('login');
    }	
 }


function search_country(){  
	 
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
		
        $data['title']='list country';
		$data['scrumb_name']='Data country';
		$data['scrumb']='country/view_country';
		$data['list']=$this->model_app->getdata('ms_country',"where CountryCode like '%$cari%' OR CountryCode like '%$cari%' order by CountryCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country a',"where CountryCode like '%$cari%' OR CountryCode like '%$cari%' order by CountryCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'country/view_country/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/country/v_country';
        $this->load->view('home/home',$data);
     }

function search_country_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_country',"where CountryCode like '$cari%' OR CountryCode like '$cari%' order by CountryCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country a',"where CountryCode like '$cari%' OR CountryCode like '$cari%' order by CountryCode ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'country/view_country/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/country/filter',$data);
}
	



}


