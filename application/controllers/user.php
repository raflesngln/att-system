<?php
class User extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 

function profil_user(){  
		        $data['title']='profil_user ';
		$data['scrumb_name']='profil_user';
		$data['scrumb']='user/profil_user';
        	$data['view']='pages/user/profil_user';
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
		a.createBy,a.CreateDate,a.ModifiedDate,b.cyCode,b.cyName',
		"ms_vendor a","inner join ms_city b on a.cyCode=b.cyCode 
		WHERE a.venName LIKE '$cari%'
		order by b.cyName ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('a.venCode,a.venInitial,a.venName,a.Address,a.cyCode,a.Phone,
		a.Fax,a.PostalCode,a.isAgent,a.isAirlines,a.isShippingLines,a.isTrucking,a.isWarehouse,a.Email,
		a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,a.TermsPayment,a.isActive,a.NPWP,a.NPWPAddress,a.Remarks,
		a.createBy,a.CreateDate,a.ModifiedDate,b.cyCode,b.cyName',
		"ms_vendor a","inner join ms_city b on a.cyCode=b.cyCode 
		WHERE a.venName LIKE '$cari%'
		order by b.cyName");

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


