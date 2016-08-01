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
		date_default_timezone_set("Asia/Jakarta"); 
		
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
		$data['link']='<a href="'.base_url().'commodity/view_commodity">Data commodity</a>';
		$data['list']=$this->model_app->getdata('ms_commodity',"order by CommCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"order by CommCode ASC");
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
$this->form_validation->set_rules('code','code','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('commodity/view_commodity');
	}
		else
	{
		$code=$this->input->post('code');
		$cari=$this->model_app->getdata('ms_commodity',"where CommCode='$code'");
		if($cari){ ?>
		<script type="text/javascript">
		alert('Data with This Code  has already exist !. try another service');
		history.back();
		</script>	
		<?php } else {
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'CommCode'=>strtoupper($this->input->post('code')),
		'CommName'=>$this->input->post('name'),
		'CommDesc'=>$this->input->post('remarks'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_commodity',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list commodity';
		$data['link']='<a href="'.base_url().'commodity/view_commodity">Data commodity</a>';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['list']=$this->model_app->getdata('ms_commodity',"order by CommCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"order by CommCode ASC");
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
		'CommCode'=>strtoupper($this->input->post('code')),
		'CommName'=>$this->input->post('name'),
		'CommDesc'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);	
		$this->model_app->update('ms_commodity','CommCode',$code,$update);
	  redirect('commodity/view_commodity');
		}	
}

//------------delete data----------------------------------
function delete_commodity(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_commodity','CommCode',$kode);
			redirect('commodity/view_commodity');
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
		$data['link']='<a href="'.base_url().'commodity/view_commodity">Data commodity</a>';
		$data['list']=$this->model_app->getdata('ms_commodity',"where Name like '%$cari%' OR CommCode like '%$cari%' order by CommCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"where Name like '%$cari%' OR CommCode like '%$cari%' order by CommCode ASC");
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
		
		$data['list']=$this->model_app->getdata('ms_commodity',"where Name like '$cari%' OR CommCode like '$cari%' order by CommCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_commodity a',"where Name like '$cari%' OR CommCode like '$cari%' order by CommCode ASC");
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


