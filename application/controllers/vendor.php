<?php
class Vendor extends CI_Controller{
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
	//--VIEW vendor 
function view_vendor(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list vendor';
		$data['link']='<a href="'.base_url().'vendor/view_vendor">Data vendor</a>';
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['list']=$this->model_app->getdatapaging('*',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode order by b.CityCode ASC LIMIT $offset,$limit");
		
		$tot_hal = $this->model_app->hitung_isi_tabel('*',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode order by b.CityCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'vendor/view_vendor/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/vendor/v_vendor';
        $this->load->view('home/home',$data);
     }
//--SAVE--------
function save_vendor()
{	
$this->form_validation->set_rules('initial','initial','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('vendor/view_vendor');
	}
		else
	{
		$code=$this->input->post('initial');
		$cari=$this->model_app->getdata('ms_vendor',"where venInitial='$code'");
		if($cari){ ?>
			<script type="text/javascript">
			alert('Data with This Code  has already exist !. try another code');
			history.back();
			</script>			
		<?php } else {
		$message="New Data has been Saved with initial ( ".$code." )";
		$clas='success';
		$newdata=array(
		'venInitial' =>strtoupper($this->input->post('initial')),
		'venName'=>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'CityCode'=>$this->input->post('city'),
		'Phone'=>$this->input->post('phone'),
		'Fax'=>$this->input->post('fax'),
		'PostalCode'=>$this->input->post('postcode'),
		'isAgent'=>$this->input->post('agen'),
		'isAirlines'=>$this->input->post('air'),
		'isShippingLines'=>$this->input->post('shipping'),
		'isTrucking'=>$this->input->post('trucking'),
		'isWarehouse'=>$this->input->post('warehouse'),
		'Email'=>$this->input->post('email'),
		'PIC01'=>$this->input->post('pic01'),
		'PIC02'=>$this->input->post('pic02'),
		'HPPIC01'=>$this->input->post('hppic01'),
		'HPPIC02'=>$this->input->post('hppic02'),
		'TermsPayment'=>$this->input->post('payment'),
		'NPWP'=>$this->input->post('npwp'),
		'NPWPAddress'=>$this->input->post('npwpaddress'),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_vendor',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list vendor';
		$data['link']='<a href="'.base_url().'vendor/view_vendor">Data vendor</a>';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['list']=$this->model_app->getdatapaging('a.venCode,a.venInitial,a.venName,a.Address,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode order by b.CityCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.venCode,a.venInitial,a.venName,a.Address,a.CityCode,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode order by b.CityCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'vendor/view_vendor/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/vendor/v_vendor';
        $this->load->view('home/home',$data);

	 }
 }

//----update------------
function update_vendor()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('initial','initial','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('vendor/view_vendor');
	}
		else
	{
	$update=array(
		'venInitial' =>strtoupper($this->input->post('initial')),
		'venName'=>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'CityCode'=>$this->input->post('city'),
		'Phone'=>$this->input->post('phone'),
		'Fax'=>$this->input->post('fax'),
		'PostalCode'=>$this->input->post('postcode'),
		'isAgent'=>$this->input->post('agen'),
		'isAirlines'=>$this->input->post('air'),
		'isShippingLines'=>$this->input->post('shipping'),
		'isTrucking'=>$this->input->post('trucking'),
		'isWarehouse'=>$this->input->post('warehouse'),
		'Email'=>$this->input->post('email'),
		'PIC01'=>$this->input->post('pic01'),
		'PIC02'=>$this->input->post('pic02'),
		'HPPIC01'=>$this->input->post('hppic01'),
		'HPPIC02'=>$this->input->post('hppic02'),
		'TermsPayment'=>$this->input->post('payment'),
		'NPWP'=>$this->input->post('npwp'),
		'NPWPAddress'=>$this->input->post('npwpaddress'),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s'),
		);
		$this->model_app->update('ms_vendor','venCode',$code,$update);
	  redirect('vendor/view_vendor');
		}	
}

//------------delete data----------------------------------
function delete_vendor(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_vendor','venCode',$kode);
			redirect('vendor/view_vendor');
	}
	else
	{
		 redirect('login');
    }	
 }
function search_vendor(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
        $data['title']='list vendor';
		$data['link']='<a href="'.base_url().'master/view_vendor">Data vendor</a>';
		$data['city']=$this->model_app->getdata('ms_city',"");
$data['list']=$this->model_app->getdatapaging('a.venCode,a.venInitial,a.venName,a.Address,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode 
		WHERE a.venName LIKE '$cari%'
		order by b.CityCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('a.venCode,a.venInitial,a.venName,a.Address,a.CityCode,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode 
		WHERE a.venName LIKE '$cari%'
		order by b.CityCode");
		    		//create for pagination		
			$config['base_url'] = base_url() . 'search/search_vendor/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/vendor/v_vendor';
        $this->load->view('home/home',$data);
     }

 function search_vendor_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
$data['list']=$this->model_app->getdatapaging('a.venCode,a.venInitial,a.venName,a.Address,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode 
		WHERE a.venName LIKE '$cari%'
		order by b.CityCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('a.venCode,a.venInitial,a.venName,a.Address,a.CityCode,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.CityCode,b.CityCode',
		"ms_vendor a","inner join ms_city b on a.CityCode=b.CityCode 
		WHERE a.venName LIKE '$cari%'
		order by b.CityCode");

	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_vendor/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();			
        $this->load->view('pages/vendor/filter',$data);
}



}


