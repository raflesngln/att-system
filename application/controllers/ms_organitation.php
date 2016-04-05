<?php
class Ms_organitation extends CI_Controller{
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
	 
function view_organitation(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['title']='list organitation';
		$data['scrumb_name']='Data organitation';
		$data['scrumb']='ms_organitation/view_organitation';
		$data['list']=$this->model_app->getdatapaging("*",
		"ms_organitation a",
		"order by a.OrgCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("*",
		"ms_organitation a",
		"order by a.OrgCode ASC");

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
		
		$data['view']='pages/organitation/v_organitation';
        $this->load->view('home/home',$data);
     }
 
function save_organitation()
{	
		$OrgCode=$this->input->post('OrgCode');
		$air=$this->input->post('CheckboxGroup1');
		$sea=$this->input->post('CheckboxGroup2');
		$land=$this->input->post('CheckboxGroup3');
		$rail=$this->input->post('CheckboxGroup4');

		$this->form_validation->set_rules('OrgName','OrgName','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_organitation');
	}
		else
	{
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'OrgCode' =>$this->input->post('OrgCode'),
		'OrgName'=>strtoupper($this->input->post('OrgName')),
		'OrgDesc'=>$this->input->post('OrgDesc'),
		'IsAir'=>$air,
		'IsSea'=>$sea,
		'IsLand'=>$land,
		'IsRail'=>$rail,
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);		
		 $this->model_app->insert('ms_organitation',$newdata);	
		redirect('ms_organitation/view_organitation');
	 
	}
 }
//----update------------
function update_city()
{	

$code=$this->input->post('OrgCode2');
$this->form_validation->set_rules('OrgName2','OrgName2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
	$update=array(
		'OrgName'=>strtoupper($this->input->post('OrgName2')),
		'Country'=>$this->input->post('tCountry'),
		'State'=>$this->input->post('tState'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);	
		$this->model_app->update('ms_organitation','OrgCode',$code,$update);
	  redirect('city/view_city');
		}	
}

//------------delete data----------------------------------
function delete_organitation(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_organitation','OrgCode',$kode);
			redirect('ms_organitation/view_organitation');
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
$data['list']=$this->model_app->getdatapaging("a.OrgCode,a.OrgName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_organitation a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.OrgName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.OrgCode LIKE '$cari%'
		order by a.OrgCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.OrgCode,a.OrgName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_organitation a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.OrgName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.OrgCode LIKE '$cari%'");
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
$data['list']=$this->model_app->getdatapaging("a.OrgCode,a.OrgName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_organitation a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.OrgName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.OrgCode LIKE '$cari%'
		order by a.OrgCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.OrgCode,a.OrgName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_organitation a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.OrgName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.OrgCode LIKE '$cari%'");

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


