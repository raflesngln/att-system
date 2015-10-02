<?php
class Search extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
function search_staff(){  
	 
	 	$page=$this->uri->segment(3);
	 	$cari=$this->input->post('txtsearch');
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list Staff';
		$data['scrumb_name']='Data Staff';
		$data['scrumb']='staff/view_staff';
		$data['list']=$this->model_app->getdata('ms_staff',"where empInitial like '%$cari%' OR empName like '%$cari%' order by empCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff a',"where empInitial like '%$cari%' OR empName like '%$cari%' order by empCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'staff/view_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/staff/v_staff';
        $this->load->view('home/home',$data);
     }
function filter_staff(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		$data['title']='list Staff';
		$data['scrumb_name']='Data Staff';
		$data['scrumb']='staff/view_staff';
		$data['list']=$this->model_app->getdata('ms_staff',"ORDER BY Address ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff',"ORDER BY Address ASC");
	//create for pagination		
			$config['base_url'] = base_url() . 'staff/filter_staff/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		//$data['view']='pages/staff/filter';
		//$data['jumlah']=$data['list'];
       $this->load->view('pages/staff/filter',$data);
}
function search_staff_ajax(){

        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$data['list']=$this->model_app->getdata('ms_staff',"where empInitial like '$cari%' OR empName like '$cari%' order by empCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_staff a',"where empInitial like '$cari%' OR empName like '$cari%' order by empCode ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'staff/search_staff_ajax/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/staff/filter',$data);
}
function search_discount(){  
	 	$cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
		
        $data['title']='list discount';
		$data['scrumb_name']='Data discount';
		$data['scrumb']='master/view_disc';
$data['list']=$this->model_app->getdatapaging('a.discCode,a.Ori,a.Dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","
		inner join ms_customer b on a.custCode=b.custCode
		inner join ms_service c on a.svCode=c.svCode
		left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode
		WHERE b.custName LIKE '$cari%' OR c.Name LIKE '%$cari%' OR e.venName LIKE '%$cari%'
		order by a.discCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('a.discCode,a.Ori,a.Dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","inner join ms_customer b on a.custCode=b.custCode inner join ms_service c on a.svCode=c.svCode left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode 
		WHERE b.custName LIKE '$cari%' OR c.Name LIKE '%$cari%' OR e.venName LIKE '%$cari%'
		order by a.discCode");
		        					//create for pagination		
			$config['base_url'] = base_url() . 'search_master/search_discount/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/disc/v_disc';
        $this->load->view('home/home',$data);
     }
 function search_discount_ajax(){
        $cari=$this->input->post('txtsearch');
		$filter=$this->input->post('filter');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

$data['list']=$this->model_app->getdatapaging('a.discCode,a.ori,a.dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","
		inner join ms_customer b on a.custCode=b.custCode
		inner join ms_service c on a.svCode=c.svCode
		left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode
		WHERE b.custName LIKE '$cari%' OR c.Name LIKE '%$cari%' OR e.venName LIKE '%$cari%'
		order by a.discCode ASC LIMIT $offset,$limit");
		
$tot_hal = $this->model_app->hitung_isi_tabel('a.discCode,a.Ori,a.Dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","inner join ms_customer b on a.custCode=b.custCode inner join ms_service c on a.svCode=c.svCode left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode 
		WHERE b.custName LIKE '$cari%' OR c.Name LIKE '%$cari%' OR e.venName LIKE '%$cari%'
		order by a.discCode");
	//create for pagination		
			$config['base_url'] = base_url() . 'search_master/search_discount_ajax/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/disc/filter',$data);
}
	
function search_service(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list Service';
		$data['scrumb_name']='Data Service';
		$data['scrumb']='master/view_service';
		$data['list']=$this->model_app->getdata('ms_service',"WHERE Name like '%$cari%' order by svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"WHERE Name like '%$cari%' order by svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'search/search_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/service/v_service';
        $this->load->view('home/home',$data);
     }

 function search_service_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

$data['list']=$this->model_app->getdata('ms_service',"WHERE Name like '%$cari%' order by svCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"WHERE Name like '%$cari%' order by svCode ASC");
        
	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_service/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
			
        $this->load->view('pages/service/filter',$data);
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
		a.isSeaport,a.CreateBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR c.stName LIKE '$cari%'
		order by a.cyCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreateBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR c.stName LIKE '$cari%'");
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
		a.isSeaport,a.CreateBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR c.stName LIKE '$cari%'
		order by a.cyCode ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreateBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode
		WHERE a.cyName LIKE '$cari%' OR b.couName LIKE '$cari%' OR c.stName LIKE '$cari%'");

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
function search_country(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
	    $data['title']='list Country';
		$data['scrumb_name']='Data Country';
		$data['scrumb']='master/view_country';
		$data['list']=$this->model_app->getdata('ms_country',"WHERE couName LIKE '$cari%' order by couName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country',"WHERE couName LIKE '$cari%' order by couName ASC");
		    					//create for pagination		
			$config['base_url'] = base_url() . 'search/search_country/';
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
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
$data['list']=$this->model_app->getdata('ms_country',"WHERE couName LIKE '$cari%' order by couName ASC LIMIT $offset,$limit");
$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_country',"WHERE couName LIKE '$cari%' order by couName ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_country/';
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
function search_state(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
        $data['title']='list State';
		$data['scrumb_name']='Data State';
		$data['scrumb']='master/view_state';
		$data['list']=$this->model_app->getdata('ms_state',"WHERE stName LIKE '$cari%' order by stName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"WHERE stName LIKE '$cari%' order by stName ASC");
		    					//create for pagination		
			$config['base_url'] = base_url() . 'search/search_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/state/v_state';
        $this->load->view('home/home',$data);
     }
 function search_state_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['list']=$this->model_app->getdata('ms_state',"WHERE stName LIKE '$cari%' order by stName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"WHERE stName LIKE '$cari%' order by stName ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_state/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();			
        $this->load->view('pages/state/filter',$data);
}
function search_customer(){  
	    $cari=$this->input->post('txtsearch');
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;	
       $data=array(
			'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
			'city'=>$this->model_app->getdata('ms_city',""),
        );
        $data['title']='list_customer';
		$data['scrumb_name']='Data Customers';
		$data['scrumb']='master/view_customer';
		$data['list']=$this->model_app->getdatapaging('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		WHERE b.devisi='sales' AND a.custName LIKE '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.custCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		WHERE b.devisi='sales' AND a.custName LIKE '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.custCode");
 		    //create for pagination		
			$config['base_url'] = base_url() . 'search/search_customer/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/customer/v_customer';
        $this->load->view('home/home',$data);
     }

 function search_customer_ajax(){
        $cari=$this->input->post('txtsearch');
		 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		$data['list']=$this->model_app->getdatapaging('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		WHERE b.devisi='sales' AND a.custName like '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.custCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		WHERE b.devisi='sales' AND a.custName like '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.custCode");
		 	//create for pagination		
			$config['base_url'] = base_url() . 'search/search_customer/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();			
        $this->load->view('pages/customer/filter',$data);
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
		$data['scrumb_name']='Data vendor';
		$data['scrumb']='master/view_vendor';
		$data['city']=$this->model_app->getdata('ms_city',"");
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


