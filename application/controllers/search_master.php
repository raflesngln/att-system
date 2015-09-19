<?php
class Search_master extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	

 //--VIEW MASTER 
function view_country(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
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
		
        $data['title']='list Country';
		$data['scrumb_name']='Data Country';
		$data['scrumb']='master/view_country';
		$data['list']=$this->model_app->getdata('ms_country',"order by couName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country',"order by couName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_country/';
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
//--VIEW MASTER 
function view_vendor(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
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
		
        $data['title']='list vendor';
		$data['scrumb_name']='Data vendor';
		$data['scrumb']='master/view_vendor';
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['list']=$this->model_app->getdatapaging('a.venCode,a.venInitial,a.venName,a.Address,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.cyCode,b.cyName',
		"ms_vendor a","inner join ms_city b on a.cyCode=b.cyCode order by b.cyName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.venCode,a.venInitial,a.venName,a.Address,a.cyCode,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.cyCode,b.cyName',
		"ms_vendor a","inner join ms_city b on a.cyCode=b.cyCode order by b.cyName");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_vendor/';
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


