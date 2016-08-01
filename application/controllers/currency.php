<?php
class Currency extends CI_Controller{
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
	 
function view_currency(){  	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list currency';
		$data['link']='<a href="'.base_url().'currency/view_currency">Data currency</a>';
		$data['list']=$this->model_app->getdata('ms_currency',"order by currCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_currency a',"order by currCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'currency/view_currency/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/currency/v_currency';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_currency()
{	
$this->form_validation->set_rules('code','code','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('currency/view_currency');
	}
		else
	{
		$code=$this->input->post('code');
		$cari=$this->model_app->getdata('ms_currency',"WHERE currCode='$code'");
		if($cari){ ?>
		<script type="text/javascript">
		alert('Data with This Code  has already exist  !. try another service');
		history.back();
		</script>
			
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'currCode'=>strtoupper($this->input->post('code')),
		'Name'=>$this->input->post('name'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);	
		$this->model_app->insert('ms_currency',$newdata);
	}
		$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list currency';
		$data['link']='<a href="'.base_url().'currency/view_currency">Data currency</a>';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['list']=$this->model_app->getdata('ms_currency',"order by currCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_currency a',"order by currCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'currency/view_currency/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/currency/v_currency';
        $this->load->view('home/home',$data);

	 }
 }
//----update------------
function update_currency()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('currency/view_currency');
	}
		else
	{
	$update=array(
		'Name'=>$this->input->post('name'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);	
		$this->model_app->update('ms_currency','currCode',$code,$update);
	  redirect('currency/view_currency');
		}	
}

//------------delete data----------------------------------
function delete_currency(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_currency','currCode',$kode);
			redirect('currency/view_currency');
	}
	else
	{
		 redirect('login');
    }	
 }


function search_currency(){  
	 
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
		
        $data['title']='list currency';
		$data['scrumb_name']='Data currency';
		$data['scrumb']='currency/view_currency';
		$data['list']=$this->model_app->getdata('ms_currency',"where Name like '%$cari%' OR Section like '%$cari%' order by currCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_currency a',"where Name like '%$cari%' OR Section like '%$cari%' order by currCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'currency/view_currency/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/currency/v_currency';
        $this->load->view('home/home',$data);
     }

function search_currency_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_currency',"where Name like '$cari%' OR currCode like '$cari%' order by currCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_currency a',"where Name like '$cari%' OR currCode like '$cari%' order by currCode ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'currency/view_currency/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/currency/filter',$data);
}
	



}


