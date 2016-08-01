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
		$data['link']='<a href="'.base_url().'city/view_city">Data City</a>';
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
		$data['list']=$this->model_app->getdatapaging("a.CityCode,a.CityIATACode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a",
		"LEFT join ms_country b on a.Country=b.CountryCode 
		LEFT join ms_state c on a.State=c.StateCode
		order by a.CityCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("a.CityCode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a",
		"LEFT join ms_country b on a.Country=b.CountryCode 
		LEFT join ms_state c on a.State=c.StateCode
		order by a.CityCode ASC");

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
/*function update_city2()
{	
	$query=$this->db->query("SELECT * FROM `ms_port` a INNER JOIN `ms_city` b ON a.PortCode=b.CityIATACode");
	foreach($query->result_array() as $row){
		$pc= $row['PortCode'];
		$cc= $row['CityCode'];
		
		$update=array('City'=>$cc);		
		$this->model_app->update('ms_port','PortCode',$pc,$update);
	}
	
 }*/
//--SAVE--------
function save_city()
{	
		$country=$this->input->post('tCountry');
		$nomor=$this->model_app->generateCity("ms_city","CityCode",$country);
		
		$this->form_validation->set_rules('CityName','CityName','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
		$message="New Data has been Saved with code ( ".$code." )";
		$clas='success';
		$newdata=array(
		'CityCode' =>$nomor,
		'CityName'=>strtoupper($this->input->post('CityName')),
		'Country'=>$this->input->post('tCountry'),
		'State'=>$this->input->post('tState'),
		'CityIATACode'=>$this->input->post('CityIATACode'),
		'CityFIATACode'=>$this->input->post('CityFIATACode'),
		'CityICAOCode'=>$this->input->post('CityICAOCode'),
		'Remarks'=>$this->input->post('Remarks'),
		'CreatedBy'=>$this->session->userdata('nameusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);		
		 $this->model_app->insert('ms_city',$newdata);	
		redirect('city/view_city');
	 
	}
 }
//----update------------
function update_city()
{	

$code=$this->input->post('CityCode2');
$this->form_validation->set_rules('CityName2','CityName2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('city/view_city');
	}
		else
	{
	$update=array(
		'CityName'=>strtoupper($this->input->post('CityName2')),
		'Country'=>$this->input->post('tCountry'),
		'State'=>$this->input->post('tState'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);	
		$this->model_app->update('ms_city','CityCode',$code,$update);
	  redirect('city/view_city');
		}	
}

//------------delete data----------------------------------
function delete_city(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_city','CityCode',$kode);
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
$data['list']=$this->model_app->getdatapaging("a.CityCode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.CityName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.CityCode LIKE '$cari%'
		order by a.CityCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.CityCode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.CityName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.CityCode LIKE '$cari%'");
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
$data['list']=$this->model_app->getdatapaging("a.CityCode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.CityName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.CityCode LIKE '$cari%'
		order by a.CityCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.CityCode,a.CityName,a.State,b.CountryCode,b.CountryName,c.StateCode,c.StateName",
		"ms_city a","inner join ms_country b on a.Country=b.CountryCode 
		inner join ms_state c on a.State=c.StateCode
		WHERE a.CityName LIKE '$cari%' OR b.CountryName LIKE '$cari%' OR a.CityCode LIKE '$cari%'");

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


