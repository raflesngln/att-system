<?php
class Master extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
        $nm="rafles nainggolan";
    }	

function gallery(){  


		$data['view']='pages/gallery/gallery';
        $this->load->view('home/home',$data);
}
	 //--VIEW MASTER USER
function view_user(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list User';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$data['user']=$this->model_app->getdatapaging('*','ms_user',"");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
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
	
 //--VIEW MASTER 
function view_disc(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list Disc';
		$data['scrumb_name']='Data Disc';
		$data['scrumb']='master/view_disc';
		$data['cust']=$this->model_app->getdata('ms_customer',"");
		$data['service']=$this->model_app->getdata('ms_service',"");
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['vendor']=$this->model_app->getdata('ms_vendor',"");	
		
		$data['list']=$this->model_app->getdatapaging('a.discCode,a.ori,a.dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","
		inner join ms_customer b on a.custCode=b.custCode
		inner join ms_service c on a.svCode=c.svCode
		left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode
		order by a.discCode ASC LIMIT $offset,$limit");
		
		$tot_hal = $this->model_app->hitung_isi_tabel('a.discCode,a.Ori,a.Dest,a.DiscPersen,a.DiscRupiah,
		a.isACtive,a.Remarks,a.createBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.custCode,b.custName,c.svCode,c.Name,d.cyCode,d.cyName,
		e.venCode,e.venName',"ms_disc a","inner join ms_customer b on a.custCode=b.custCode inner join ms_service c on a.svCode=c.svCode left join ms_city d on a.cyCode=d.cyCode
		inner join ms_vendor e on a.venCode=e.venCode order by a.discCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_disc/';
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

//--VIEW MASTER 
function view_service(){  
	 
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
		$data['list']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_service',"order by svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_service/';
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
//--VIEW MASTER USER
function view_city(){  
	 
	 	$page=$this->uri->segment(3);
      	$limit=10;
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
		order by a.cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel("a.cyCode,a.cyName,a.stCode,a.isAirport,
		a.isSeaport,a.CreateBy,a.CreateDate,a.ModifiedBy,a.ModifiedDate,b.couCode,b.couName,c.stCode,c.stName",
		"ms_city a","inner join ms_country b on a.couCode=b.couCode 
		inner join ms_state c on a.stCode=c.stCode");
		
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_city/';
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
//--VIEW MASTER STATE
function view_state(){  
	 
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
		$data['list']=$this->model_app->getdata('ms_state',"order by stName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_state',"order by stName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_state/';
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
	 //--VIEW MASTER CUSTOMERS
 function view_customer(){
	 
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
		a.Address,a.custInitial,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		where b.devisi='sales'
		 order by a.custCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.custInitial,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		where b.devisi='sales'
		 order by a.custCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_customer/';
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
	 //--add USER---------
function save_user()
{	
$user =$this->input->post('us');
$cek=$this->model_app->getdata('ms_user',"where UserName='$user'");
if($cek)
{
$data['eror']='Username dengan '.$user.' sudah ada.coba dengan Username yang lain';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list_customer';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
		
}
else
{
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_user');
	}
		else
	{
		$data=array(
		'UserName' =>$this->input->post('us'),
		'FullName'=>$this->input->post('name'),
		'password'=>md5($this->input->post('ps')),
		);		
		 $this->model_app->insert('ms_user',$data);	
		 redirect('master/view_user');
	 }
 }
} 
 //--SAVE---------
function save_country()
{	
$code =$this->input->post('coucode');
$cek=$this->model_app->getdata('ms_country',"where couCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
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
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_country',"order by couName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_country',"order by couName ASC");
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
else
{
$this->form_validation->set_rules('coucode','coucode','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_country');
	}
		else
	{
		$data=array(
		'couCode' =>strtoupper($this->input->post('coucode')),
		'couName'=>strtoupper($this->input->post('couname')),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_country',$data);	
		 redirect('master/view_country');
	 }
 }
} 
 //--SAVE---------
function save_disc()
{	
$code =$this->input->post('coucode');
$cek=$this->model_app->getdata('ms_disc',"where discCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another Code !';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list disc';
		$data['scrumb_name']='Data disc';
		$data['scrumb']='master/view_disc';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_disc',"order by Name ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_disc',"order by Name ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_disc/';
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
else
{
$this->form_validation->set_rules('cust','cust','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_disc');
	}
		else
	{
		$data=array(
		'custCode'=>$this->input->post('cust'),
		'svCode'=>$this->input->post('service'),
		'cyCode'=>$this->input->post('city'),
		'ori'=>$this->input->post('ori'),
		'dest'=>$this->input->post('dest'),
		'venCode'=>$this->input->post('vendor'),
		'DiscPersen'=>$this->input->post('persen'),
		'DiscRupiah'=>$this->input->post('rp'),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_disc',$data);	
		 redirect('master/view_disc');
	 }
 }
} 

//--SAVE---------
function save_service()
{	
	
$code =$this->input->post('code');
$cek=$this->model_app->getdata('ms_service',"where svCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another code !';
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
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_service',"order by Name ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_service',"order by Name ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_service/';
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
else
{
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_service');
	}
		else
	{
		$data=array(
		'svCode' =>strtoupper($this->input->post('code')),
		'Name'=>strtoupper($this->input->post('name')),
		'Remarks'=>$this->input->post('remarks'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_service',$data);	
		 redirect('master/view_service');
	 }
 }
} 
//--add USER---------
function save_state()
{	
$code =$this->input->post('stcode');
$cek=$this->model_app->getdata('ms_state',"where stCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
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
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_state',"order by stCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_state',"order by stCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_state/';
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
else
{
$this->form_validation->set_rules('stcode','stcode','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_state');
	}
		else
	{
		$data=array(
		'stCode' =>strtoupper($this->input->post('stcode')),
		'stName'=>strtoupper($this->input->post('stname')),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_state',$data);	
		 redirect('master/view_state');
	 }
 }
} 
//--SAve master---------
function save_city()
{	
$code =$this->input->post('cycode');
$cek=$this->model_app->getdata('ms_city',"where cyCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
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
		$data['list']=$this->model_app->getdata('ms_city',"order by cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_city',"order by cyCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_city/';
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
else
{
$this->form_validation->set_rules('cycode','cycode','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_city');
	}
		else
	{
		$data=array(
		'cyCode' =>strtoupper($this->input->post('cycode')),
		'cyName'=>strtoupper($this->input->post('cyname')),
		'couCode'=>$this->input->post('tcoucode'),
		'stCode'=>$this->input->post('tstcode'),
		'isAirport'=>$this->input->post('airport'),
		'isSeaport'=>$this->input->post('seaport'),
		'CreateBy'=>$this->session->userdata('nameusr'),
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_city',$data);	
		 redirect('master/view_city');
	 }
 }
} 
//--SAve master---------
function save_vendor()
{	
	/* isset($_POST['agen'])?$isagen=1:$isagen=0;
	isset($_POST['air'])?$isair=1:$isair=0;
	isset($_POST['shipping'])?$isshipping=1:$isshipping=0;
	isset($_POST['trucking'])?$istrucking=1:$istrucking=0;
	isset($_POST['warehouse'])?$iswarehouse=1:$iswarehouse=0;
	*/
$this->form_validation->set_rules('initial','initial','required|trim|xss_clean');
$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_vendor');
	}
		else
	{
		$data=array(
		'venInitial' =>strtoupper($this->input->post('initial')),
		'venName'=>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'cyCode'=>$this->input->post('city'),
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
		'CreateDate'=>date('Y-m-d:h-s-m'),
		'ModifiedBy'=>'',
		'ModifiedDate'=>'',
		);		
		 $this->model_app->insert('ms_vendor',$data);	
		 redirect('master/view_vendor');
	 }
} 

	 //===========add customer====================
function save_customer()
{	
$name =$this->input->post('name');
$address =$this->input->post('address');

/*isset($_POST['agen'])?$isagen=1:$isagen=0;
isset($_POST['shipper'])?$isshipper=1:$isshipper=0;
isset($_POST['cnee'])?$iscnee=1:$iscnee=0;
*/

 if($this->session->userdata('login_status') == TRUE )
 {
	
$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('master/view_customer');
	}
		else
	{
		$data=array(
		'custInitial' =>$this->input->post('initial'),
		'custName' =>$name,
		'Address'=>$this->input->post('address'),
		'cyCode' =>$this->input->post('city'),
		'Phone' =>$this->input->post('phone'),
		'Fax' =>$this->input->post('fax'),
		'PostalCode' =>$this->input->post('postcode'),
		'isAgent' =>$this->input->post('agen'),
		'isShipper' =>$this->input->post('shipper'),
		'isCnee' =>$this->input->post('cnee'),
		'Email' =>$this->input->post('email'),
		'PIC01' =>$this->input->post('pic01'),
		'PIC02' =>$this->input->post('pic02'),
		'HPPIC01' =>$this->input->post('hppic01'),
		'HPPIC02' =>$this->input->post('hppic02'),
		'CreditLimit' =>$this->input->post('credit'),
		'TermsPayment' =>$this->input->post('payment'),
		'Deposit' =>$this->input->post('deposit'),
		'empCode' =>$this->input->post('empcode'),
		'NPWP' =>$this->input->post('npwp'),
		'NPWPAddress' =>$this->input->post('npwpaddress'),
		'Remarks' =>$this->input->post('remarks'),
		'CreateBy' =>$this->session->userdata('nameusr'),
		'CreateDate' =>date('Y-m-d: h:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>'',	
		);		
		 $this->model_app->insert('ms_customer',$data);	
		 redirect('master/view_customer');
	 }
 }
 else
 {
	 
	redirect('login'); 
 }
}
//----update------------
function update_country()
{	
$code=$this->input->post('id2');
$code2 =$this->input->post('coucode2');
if($code==$code2)
{
 $this->form_validation->set_rules('couname2','couname2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_country');
		}
		else
		{
		$update=array(
		'couCode'=>strtoupper($this->input->post('coucode2')),
		'couName'=>strtoupper($this->input->post('couname2')),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d : h-m-s')
		);
		$this->model_app->update('ms_country','couCode',$code,$update);
	  redirect('master/view_country');
	}
}
	else
	{
		$cek=$this->model_app->getdata('ms_country',"where couCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
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
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_country',"order by couName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_country',"order by couName ASC");
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
}
}
//----update------------
function update_disc()
{	
$code=$this->input->post('id');
$this->form_validation->set_rules('cust','cust','required|trim|xss_clean');
$this->form_validation->set_rules('service','service','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_disc');
		}
		else
		{
		$update=array(
		'custCode'=>$this->input->post('cust'),
		'svCode'=>$this->input->post('service'),
		'Ori'=>$this->input->post('ori'),
		'Dest'=>$this->input->post('dest'),
		'venCode'=>$this->input->post('vendor'),
		'DiscPersen'=>$this->input->post('persen'),
		'DiscRupiah'=>$this->input->post('rp'),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d:h-s-m'),
		);
		$this->model_app->update('ms_disc','discCode',$code,$update);
	  redirect('master/view_disc');
	}
}
//----update------------
function update_vendor()
{
	/*isset($_POST['agen'])?$isagen=1:$isagen=0;
	isset($_POST['air'])?$isair=1:$isair=0;
	isset($_POST['shipping'])?$isshipping=1:$isshipping=0;
	isset($_POST['trucking'])?$istrucking=1:$istrucking=0;
	isset($_POST['warehouse'])?$iswarehouse=1:$iswarehouse=0;
	*/

	$code=$this->input->post('id');
 	$this->form_validation->set_rules('name','name','required|trim|xss_clean');
 	$this->form_validation->set_rules('address','address','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_vendor');
		}
		else
		{
		$update=array(
		'venInitial' =>strtoupper($this->input->post('initial')),
		'venName'=>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'cyCode'=>$this->input->post('city'),
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
		'ModifiedDate'=>date('Y-m-d:h-s-m'),
		);	
		$this->model_app->update('ms_vendor','venCode',$code,$update);
	  redirect('master/view_vendor');
	}
}

//----update------------
function update_state()
{	
date_default_timezone_set('Asia/Jakarta');
//$tanggal = date("d F Y");

$code=$this->input->post('id2');
$code2 =$this->input->post('stcode2');
if($code==$code2)
{
	$this->form_validation->set_rules('stname2','stname2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_state');
		}
		else
		{
		$update=array(
		'stCode'=>strtoupper($this->input->post('stcode2')),
		'stName'=>strtoupper($this->input->post('stname2')),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d'),
		);
		
		$this->model_app->update('ms_state','stCode',$code,$update);
	  redirect('master/view_state');
		}
}
	else
	{
$cek=$this->model_app->getdata('ms_state',"where stCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
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
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_state',"order by stCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_state',"order by stCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_state/';
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

	}
}
//----update------------
function update_service()
{	
date_default_timezone_set('Asia/Jakarta');
//$tanggal = date("d F Y");

$code=$this->input->post('id');
$code2 =$this->input->post('code');
if($code==$code2)
{
	$this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run()== FALSE)
		{
		redirect('master/view_service');
		}
		else
		{
		$update=array(
		'svCode'=>strtoupper($this->input->post('code')),
		'Name'=>strtoupper($this->input->post('name')),
		'Remarks'=>$this->input->post('remarks'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d'),
		);
		
		$this->model_app->update('ms_service','svCode',$code,$update);
	  redirect('master/view_service');
		}
}
	else
	{
$cek=$this->model_app->getdata('ms_service',"where svCode='$code'");
if($cek)
{
$data['eror']='Code has Exist.Try another couCode !';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list service';
		$data['scrumb_name']='Data service';
		$data['scrumb']='master/view_service';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_service',"order by svCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_service/';
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

	}
}

//----update------------
function update_customer()
{	
$idcustomer=$this->input->post('id');
/*
isset($_POST['agen'])?$isagen=1:$isagen=0;
isset($_POST['shipper'])?$isshipper=1:$isshipper=0;
isset($_POST['cnee'])?$iscnee=1:$iscnee=0;
*/
 if($this->session->userdata('login_status') == TRUE ){
 $this->form_validation->set_rules('name','name','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE) {	
		redirect('master/view_customer');
		}  else  {
	$dataubah=array(
		'custInitial' =>$this->input->post('initial'),
		'custName' =>$this->input->post('name'),
		'Address'=>$this->input->post('address'),
		'cyCode' =>$this->input->post('city'),
		'Phone' =>$this->input->post('phone'),
		'Fax' =>$this->input->post('fax'),
		'PostalCode' =>$this->input->post('postcode'),
		'isAgent' =>$this->input->post('agen'),
		'isShipper' =>$this->input->post('shipper'),
		'isCnee' =>$this->input->post('cnee'),
		'Email' =>$this->input->post('email'),
		'PIC01' =>$this->input->post('pic01'),
		'PIC02' =>$this->input->post('pic02'),
		'HPPIC01' =>$this->input->post('hppic01'),
		'HPPIC02' =>$this->input->post('hppic02'),
		'CreditLimit' =>$this->input->post('credit'),
		'TermsPayment' =>$this->input->post('payment'),
		'Deposit' =>$this->input->post('deposit'),
		'empCode' =>$this->input->post('empcode'),
		'NPWP' =>$this->input->post('npwp'),
		'NPWPAddress' =>$this->input->post('npwpaddress'),
		'Remarks' =>$this->input->post('remarks'),
		'ModifiedBy' =>$this->session->userdata('nameusr'),
		'ModifiedDate' =>date('Y-m-d: h:i:s')	
		);
		
		$this->model_app->update('ms_customer','custCode',$idcustomer,$dataubah);
	  redirect('master/view_customer');
 }
 }
 else
 {
 redirect('login');
 }
}
//----update------------
function update_city()
{	
$code=$this->input->post('id2');
$code2 =$this->input->post('cycode2');
if($code==$code2)
{
 $this->form_validation->set_rules('cycode2','cycode2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
		redirect('master/view_city');
		}
		else
		{
		$update=array(
		'cyCode'=>strtoupper($this->input->post('cycode2')),
		'cyName'=>strtoupper($this->input->post('cyname2')),
		'couCode'=>$this->input->post('tcoucode'),
		'stCode'=>$this->input->post('tstcode'),
		'isAirport'=>$this->input->post('airport'),
		'isSeaport'=>$this->input->post('seaport'),
		'ModifiedBy'=>$this->session->userdata('nameusr'),
		'ModifiedDate'=>date('Y-m-d : h-m-s')
		);
		$this->model_app->update('ms_city','cyCode',$code,$update);
	  redirect('master/view_city');
		}
	}
		else
		{
	$cek=$this->model_app->getdata('ms_city',"where cyCode='$code'");
	if($cek)
	{
	$data['eror']='Code has Exist.Try another couCode !';
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
		$data['list']=$this->model_app->getdata('ms_city',"order by cyCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_city',"order by cyCode ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_city/';
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
function update_user()
{	
$code=$this->input->post('id2');
$us2 =$this->input->post('us2');
if($code==$us2)
{
$id=$this->input->post('id2');
 $this->form_validation->set_rules('us2','us2','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			echo "<script> alert('Complete your Input !');</script>";
			
		redirect('master/view_user');
		}
		else
		{
		$dataubah=array(
		'UserName'=>$this->input->post('us2'),
		'Password'=>md5($this->input->post('ps2')),
		'FullName'=>$this->input->post('name2'),
		);
		
		$this->model_app->update('ms_user','UserName',$id,$dataubah);
	  redirect('master/view_user');
 	}
}
 else
 { 
$cek=$this->model_app->getdata('ms_user',"where UserName='$id'");
if($cek)
{
$data['eror']='Username dengan ' .$us2. ' sudah ada.coba dengan Username yang lain';
$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
endif;
        $data['title']='list_customer';
		$data['scrumb_name']='Data User';
		$data['scrumb']='master/view_user';
		//$data['usercode']=$this->model_app->usercode();
		$data['list']=$this->model_app->getdata('ms_user',"order by UserName ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('ms_user',"order by UserName ASC");
        					//create for pagination		
			$config['base_url'] = base_url() . 'master/view_user/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		$data['view']='pages/user/v_user';
        $this->load->view('home/home',$data);
		
		} 
 }
}

//------------delete data----------------------------------
function delete_user(){
	 $kode=$this->uri->segment(3);
    $this->model_app->delete_data('ms_user','UserName',$kode);
	redirect('master/view_user');
}
//------------delete data----------------------------------
function delete_country(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_country','couCode',$kode);
	redirect('master/view_country');
}
//------------delete data----------------------------------
function delete_vendor(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_vendor','venCode',$kode);
	redirect('master/view_vendor');
}
//------------delete data----------------------------------
function delete_disc(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_disc','discCode',$kode);
	redirect('master/view_disc');
}
//------------delete data----------------------------------
function delete_service(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_service','svCode',$kode);
	redirect('master/view_service');
}
//------------delete data----------------------------------
function delete_city(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_city','cyCode',$kode);
	redirect('master/view_city');
}
//------------delete data----------------------------------
function delete_state(){
	
	$kode=$this->uri->segment(3);
	
    $this->model_app->delete_data('ms_state','stCode',$kode);
	redirect('master/view_state');
}
//------------delete data----------------------------------
function delete_customer(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->uri->segment(3);
	if(isset($kode)){
    $this->model_app->delete_data('ms_customer','custCode',$kode);
	redirect('master/view_customer');
    }	
 }
 else
 {
	redirect('login'); 
 }
}


	//===========tambah_akun====================
function update_akun()
{	
$idsubparent=$this->input->post('idsubparent');

 if($this->session->userdata('login_status') == TRUE ){
	 $id=$this->input->post('st');	
	 $this->form_validation->set_rules('id_parent2','id_parent2','required|trim|xss_clean');
	 $this->form_validation->set_rules('nm_akun','nm_akun','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
		{
			
		  redirect('master/view_account');
		}
		else
		{
		$dataubah=array(
		'id_sub_parent'=>$this->input->post('id_parent2'),
		'nm_akun'=>$this->input->post('nm_akun'),
		'detail'=>$this->input->post('detail2'),
		);
		
		$this->model_app->update('akun','id_parent',$idsubparent,$dataubah);
	  redirect('master/view_account');
 }
 }
 else
 {
 redirect('login');
 }
}





}


