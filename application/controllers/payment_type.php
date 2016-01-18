<?php
class Payment_type extends CI_Controller{
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
	 
function view_payment_type(){  	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list payment_type';
		$data['scrumb_name']='Data payment_type';
		$data['scrumb']='payment_type/view_payment_type';
		$data['list']=$this->model_app->getdata('ms_payment_type',"order by payCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_payment_type a',"order by payCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'payment_type/view_payment_type/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/payment_type/v_payment_type';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
function save_payment_type()
{	
$this->form_validation->set_rules('code','code','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('payment_type/view_payment_type');
	}
		else
	{
		$code=$this->input->post('code');
		$cari=$this->model_app->getdata('ms_payment_type',"WHERE payCode='$code'");
		if($cari){ ?>
		<script type="text/javascript">
		alert('Data with This Code  has already exist  !. try another ');
		history.back();
		</script>
			
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'payCode'=>strtoupper($this->input->post('code')),
		'payName'=>$this->input->post('name'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);	
		$this->model_app->insert('ms_payment_type',$newdata);
	}
		$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list payment_type';
		$data['scrumb_name']='Data payment_type';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['scrumb']='payment_type/view_payment_type';
		$data['list']=$this->model_app->getdata('ms_payment_type',"order by payCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_payment_type a',"order by payCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'payment_type/view_payment_type/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/payment_type/v_payment_type';
        $this->load->view('home/home',$data);

	 }
 }
//----update------------
function update_payment_type()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('payment_type/view_payment_type');
	}
		else
	{
	$update=array(
		'payName'=>$this->input->post('name'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);	
		$this->model_app->update('ms_payment_type','payCode',$code,$update);
	  redirect('payment_type/view_payment_type');
		}	
}

//------------delete data----------------------------------
function delete_payment_type(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_payment_type','payCode',$kode);
			redirect('payment_type/view_payment_type');
	}
	else
	{
		 redirect('login');
    }	
 }


function search_payment_type(){  
	 
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
		
        $data['title']='list payment_type';
		$data['scrumb_name']='Data payment_type';
		$data['scrumb']='payment_type/view_payment_type';
		$data['list']=$this->model_app->getdata('ms_payment_type',"where payName like '%$cari%' OR Section like '%$cari%' order by payCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_payment_type a',"where payName like '%$cari%' OR Section like '%$cari%' order by payCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'payment_type/view_payment_type/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/payment_type/v_payment_type';
        $this->load->view('home/home',$data);
     }

function search_payment_type_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_payment_type',"where payName like '$cari%' OR payCode like '$cari%' order by payCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_payment_type a',"where payName like '$cari%' OR payCode like '$cari%' order by payCode ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'payment_type/view_payment_type/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/payment_type/filter',$data);
}
	



}


