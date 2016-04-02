<?php
class City extends CI_Controller{
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
	 
function view_city(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['title']='list City';
		$data['scrumb_name']='Data City';
		$data['scrumb']='city/view_city';
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
		$data['list']=$this->model_app->getdatapaging("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreatedDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a",
		"LEFT join ms_country b on a.couCode=b.couCode 
		LEFT join ms_state c on a.stCode=c.stCode
		order by a.cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreatedDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a",
		"LEFT join ms_country b on a.couCode=b.couCode 
		LEFT join ms_state c on a.stCode=c.stCode
		order by a.cyCode ASC");

        	//create for pagination		
			$config['base_url'] = base_url() . 'city/view_city/';
			$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	//STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/city/v_city';
        $this->load->view('home/home',$data);
     }
 
//--SAVE--------
function save_cityyyyyyy()
{	
$this->form_validation->set_rules('cycode','cycode','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
		$code=$this->input->post('cycode');
		$cari=$this->model_app->getdata('ms_city',"where cyCode='$code'");
		if($cari){
			$message="Data with code ( ".$code." ) has Exist, Try another Code!";
			$clas='error';
		} else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'cyCode' =>strtoupper($this->input->post('cycode')),
		'cyName'=>strtoupper($this->input->post('cyname')),
		'couCode'=>$this->input->post('tcoucode'),
		'stCode'=>$this->input->post('tstcode'),
		'isAirport'=>$this->input->post('airport'),
		'isSeaport'=>$this->input->post('seaport'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_city',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list city';
		$data['scrumb_name']='Data city';
		$data['scrumb']='city/view_city';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");

		$data['list']=$this->model_app->getdatapaging("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		order by a.cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode");
        	//create for pagination		
			$config['base_url'] = base_url() . 'city/view_city/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/city/v_city';
        $this->load->view('home/home',$data);

	 }
 }
//--SAVE--------
function save_city()
{	
$this->form_validation->set_rules('cycode','cycode','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
		$code=$this->input->post('cycode');
		$cari=$this->model_app->getdata('ms_city',"where cyCode='$code'");
		if($cari){ ?>
			<script type="text/javascript">
			alert('Data with This Code  has already exist !. try another service');
			history.back();
			</script>			
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'cyCode' =>strtoupper($this->input->post('cycode')),
		'cyName'=>strtoupper($this->input->post('cyname')),
		'couCode'=>$this->input->post('tcoucode'),
		'stCode'=>$this->input->post('tstcode'),
		'isAirport'=>$this->input->post('airport'),
		'isSeaport'=>$this->input->post('seaport'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_city',$newdata);	
		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['title']='list City';
		$data['scrumb_name']='Data City';
		$data['scrumb']='city/view_city';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
		$data['list']=$this->model_app->getdatapaging("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a",
		"LEFT join ms_country b on a.couCode=b.couCode 
		LEFT join ms_state c on a.stCode=c.stCode
		order by a.cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a",
		"LEFT join ms_country b on a.couCode=b.couCode 
		LEFT join ms_state c on a.stCode=c.stCode
		order by a.cyCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'city/view_city/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/city/v_city';
        $this->load->view('home/home',$data);

	 }
	}
 }
//----update------------
function update_city()
{	

$code=$this->input->post('cycode2');
$this->form_validation->set_rules('cyname2','cyname2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
	$update=array(
		'cyName'=>strtoupper($this->input->post('cyname2')),
		'couCode'=>$this->input->post('tcoucode'),
		'stCode'=>$this->input->post('tstcode'),
		'isAirport'=>$this->input->post('airport'),
		'isSeaport'=>$this->input->post('seaport'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);	
		$this->model_app->update('ms_city','cyCode',$code,$update);
	  redirect('city/view_city');
		}	
}

//------------delete data----------------------------------
function delete_city(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_city','cyCode',$kode);
			redirect('city/view_city');
	}
	else
	{
		 redirect('login');
    }	
 }

function search_city(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
	    $data['title']='list City';
		$data['scrumb_name']='Data City';
		$data['scrumb']='master/view_city';
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
$data['list']=$this->model_app->getdatapaging("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR a.cyCode LIKE '$cari%'
		order by a.cyCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR a.cyCode LIKE '$cari%'");
    					//create for pagination		
			$config['base_url'] = base_url() . 'search/search_city/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/city/v_city';
        $this->load->view('home/home',$data);
     }

 function search_city_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
$data['list']=$this->model_app->getdatapaging("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR a.cyCode LIKE '$cari%'
		order by a.cyCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreatedBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR a.cyCode LIKE '$cari%'");

	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_city/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();			
        $this->load->view('pages/city/filter',$data);
}	



}


