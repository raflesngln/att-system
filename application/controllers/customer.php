<?php
class Customer extends CI_Controller{
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
	 //--VIEW customer CUSTOMERS
function add_customer(){
		 
		 $data['title']='add_customer';
		$data['scrumb_name']='add Customer';
		$data['scrumb']='customer/add_customer';
		
		$data['type']=$this->model_app->getdatapaging('*',
		'ms_address_type a',"order by a.AddressTypeName");
		$data['contact']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		
		$data['view']='pages/customer/v_add_customer';
        $this->load->view('home/home',$data);	  
}
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
		$data['scrumb']='customer/view_customer';
		$data['type']=$this->model_app->getdatapaging('*',
		'ms_address_type a',"order by a.AddressTypeName");
		$data['contact']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		 
		$data['list']=$this->model_app->getdatapaging('*',
		'ms_customer a',"LEFT join ms_staff b on a.empCode=b.empCode
		LEFT join ms_city c on a.cyCode=c.cyCode
		 order by a.custCode ASC LIMIT $offset,$limit");
		 		 
		$tot_hal = $this->model_app->hitung_isi_tabel('*',
		'ms_customer a',"LEFT join ms_staff b on a.empCode=b.empCode
		LEFT join ms_city c on a.AddressNo=c.cyCode
		 order by a.custCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'customer/view_customer/';
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
		
		$data['view']='pages/customer/v_customer';
        $this->load->view('home/home',$data);
     } 
 
//--SAVE--------
function save_customer()
{	
$this->form_validation->set_rules('initial','initial','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('customer/view_customer');
	}
		else
	{
		$code=$this->input->post('initial');
		$cari=$this->model_app->getdata('ms_customer',"where custInitial='$code'");
		if($cari){
			$message="Data with code ( ".$code." ) has Exist, Try another Code!";
			$clas='error';
		} else {
		$message="New Data has been Saved with initial ( ".$code." )";
		$clas='success';
		$newdata=array(
		'custInitial' =>$this->input->post('initial'),
		'custName' =>$this->input->post('name'),
		'AddressNo'=>$this->input->post('address'),
		'cyCode'=>$this->input->post('city'),
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
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate' =>date('Y-m-d h:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>'',	
		);		
		 $this->model_app->insert('ms_customer',$newdata);	
		}

		$page=$this->uri->segment(3);
      	$limit=25;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data['title']='list customer';
		$data['scrumb_name']='Data customer';
		$data['scrumb']='customer/view_customer';
		$data['message']=$message;
		$data['clas']=$clas;
		$data['list']=$this->model_app->getdatapaging('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.AddressNo,a.custInitial,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		where b.devisi='sales'
		 order by a.custCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.custInitial,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.custCode,a.custName,a.Remarks,a.NPWPAddress,
		a.AddressNo,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.cyCode,c.cyName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.cyCode=c.cyCode
		where b.devisi='sales'
		 order by a.custCode");
        					//create for pagination		
			$config['base_url'] = base_url() . 'customer/view_customer/';
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
 }

//----update------------
function update_customer()
{	

$code=$this->input->post('id');
$this->form_validation->set_rules('initial','initial','required|trim|xss_clean');
	 if ($this->form_validation->run() == FALSE)
	{
		redirect('customer/view_customer');
	}
		else
	{
	$update=array(
		'custInitial' =>$this->input->post('initial'),
		'custName' =>$this->input->post('name'),
		'AddressNo'=>$this->input->post('address'),
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
		'ModifiedDate' =>date('Y-m-d h:i:s')	
		);
		$this->model_app->update('ms_customer','custCode',$code,$update);
	  redirect('customer/view_customer');
		}	
}

//------------delete data----------------------------------
function delete_customer(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_customer','custCode',$kode);
			redirect('customer/view_customer');
	}
	else
	{
		 redirect('login');
    }	
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
      	$limit=25;
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
        $this->load->view('pages/customer/filter',$data);
}

 function save_address_type(){
	   $insert=array(
     	'AddressTypeName'=>$this->input->post('typename2'),
		'AddressTypeDesc'=>$this->input->post('typedesc2'),
		'CreatedBy'=>$this->session->userdata('idusr'),
		'CreatedDate' =>date('Y-m-d h:i:s'),
		);
		$this->model_app->insert('ms_address_type',$insert);
		
		$data['type']=$this->model_app->getdatapaging('*','ms_address_type a',"order by a.AddressTypeName");
		$this->load->view('pages/customer/type/address_type_tabel',$data);		
}
function save_contact_type(){
	   $insertdata=array(
     	'ContactTypeName'=>$this->input->post('name'),
		'ContactTypeDesc'=>$this->input->post('description'),
		'CreatedBy'=>$this->session->userdata('idusr'),
		'CreatedDate' =>date('Y-m-d h:i:s'),
		);
		$this->model_app->insert('ms_contact_type',$insertdata);
		$data['contact']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		
		$this->load->view('pages/customer/contact/contact_type_tabel',$data);	
			
}	

 function update_address_type(){
	 
	  $kode=$this->input->post('idtype');
	   $update=array(
     	'AddressTypeName'=>$this->input->post('typename'),
		'AddressTypeDesc'=>$this->input->post('typedesc'),
		'CreatedBy'=>$this->session->userdata('idusr'),
		'CreatedDate' =>date('Y-m-d h:i:s'),
		);
		$this->model_app->update('ms_address_type','AddressTypeCode',$kode,$update);
		
		$data['type']=$this->model_app->getdatapaging('*','ms_address_type a',"order by a.AddressTypeName");
		$this->load->view('pages/customer/type/address_type_tabel',$data);		
}


 function update_contact_type(){
	 
	  $kode=$this->input->post('idtype');
	   $update=array(
     	'ContactTypeName'=>$this->input->post('name'),
		'ContactTypeDesc'=>$this->input->post('desc'),
		'CreatedBy'=>$this->session->userdata('idusr'),
		'CreatedDate' =>date('Y-m-d h:i:s'),
		);
		$this->model_app->update('ms_contact_type','ContactTypeCode',$kode,$update);
		
		$data['contact']=$this->model_app->getdatapaging('*','ms_contact_type a',"order by a.ContactTypeName");
		$this->load->view('pages/customer/contact/contact_type_tabel',$data);		
}


 function confirm_delete_contact_type(){
	 $kode=$this->input->post('kode');
	  $this->model_app->delete_data('ms_contact_type','ContactTypeCode',$kode);
		
		$data['contact']=$this->model_app->getdatapaging('*','ms_contact_type a',"order by a.ContactTypeName");
		$this->load->view('pages/customer/contact/contact_type_tabel',$data);		
}

 function confirm_delete_type(){
	 $kode=$this->input->post('kode');
	  $this->model_app->delete_data('ms_address_type','AddressTypeCode',$kode);
		
		$data['type']=$this->model_app->getdatapaging('*','ms_address_type a',"order by a.AddressTypeName");
		$this->load->view('pages/customer/type/address_type_tabel',$data);		
}

}


