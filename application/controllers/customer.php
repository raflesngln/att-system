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
		 
		//$data['kd_unik']=$this->model_app->generateNo("ms_customer","CustCode","CUST");
		$data['title']='add_customer';
		$data['scrumb_name']='add Customer';
		$data['scrumb']='customer/add_customer';
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['bank']=$this->model_app->getdata('ms_bank',"");
		$data['linebusiness']=$this->model_app->getdata('ms_linebusiness',"");
		$data['commodity']=$this->model_app->getdata('ms_commodity',"");
		
		$data['address']=$this->model_app->getdatapaging('*',
		'ms_address_type a',"order by a.AddressTypeName");
		$data['contact']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		
		$data['view']='pages/customer/add/v_add_customer';
        $this->load->view('home/home',$data);	  
}
 	 //--VIEW customer CUSTOMERS
function edit_customer(){
		 
		 $kode=$this->uri->segment(3);
		 
		 $data['title']='edit_customer';
		$data['scrumb_name']='edit Customer';
		$data['scrumb']='customer/edit_customer';
		$data['country']=$this->model_app->getdata('ms_country',"");
		$data['state']=$this->model_app->getdata('ms_state',"");
		$data['city']=$this->model_app->getdata('ms_city',"");
		$data['bank']=$this->model_app->getdata('ms_bank',"");
		$data['linebusiness']=$this->model_app->getdata('ms_linebusiness',"");
		$data['commodity']=$this->model_app->getdata('ms_commodity',"");
		
		$data['address']=$this->model_app->getdatapaging('*',
		'ms_address_type a',"order by a.AddressTypeName");
		$data['contact']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		$data['tr_address_detail']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");
		$data['tr_contact_detail']=$this->model_app->getdatapaging('*',
		'ms_contact_type a',"order by a.ContactTypeName");

						
		$data['detailCustomer']=$this->model_app->getdatapaging('*',
		'ms_customer a',
		"INNER JOIN ms_country b on a.Country=b.CountryCode
		INNER JOIN ms_state c on a.State=c.StateCode
		INNER JOIN ms_city d on a.City=d.CityCode
		WHERE a.CustCode='$kode'");
		
		$data['view']='pages/customer/edit/v_edit_customer';
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
		 
		$data['list']=$this->model_app->getdatapaging('a.CustCode,a.Email,a.CreditLimit,a.Deposit,a.custInitial,a.custName,a.Address,
		a.Phone,b.empCode,b.empName,c.CityCode,c.CityName',
		'ms_customer a',"LEFT join ms_staff b on a.empCode=b.empCode
		LEFT join ms_city c on a.City=c.CityCode
		 order by a.CustCode ASC LIMIT $offset,$limit");
		 		 
		$tot_hal = $this->model_app->hitung_isi_tabel('*',
		'ms_customer a',"LEFT join ms_staff b on a.empCode=b.empCode
		LEFT join ms_city c on a.Address=c.CityCode
		 order by a.CustCode");
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
 function save_customer()
{	
	$no_customer=$this->model_app->generateNo("ms_customer","CustCode","CST");
	$data=array(
          	'CustCode'=>$no_customer,
			'custInitial'=>$this->input->post('initial'),
			'custName'=>$this->input->post('nama'),
			'Address'=>$this->input->post('address'),
			'Country'=>$this->input->post('custCountry'),
			'State'=>$this->input->post('custState'),
			'City'=>$this->input->post('custCity'),
			'Phone'=>$this->input->post('phone'),
			'MobilePhone'=>$this->input->post('hp'),
			'Fax'=>$this->input->post('fax'),
			'PostalCode'=>$this->input->post('custPostal'),
			'IsAgent'=>$this->input->post('isAgent'),
			'IsShipper'=>$this->input->post('isShipper'),
			'IsCnee'=>$this->input->post('isCnee'),
			'Email'=>$this->input->post('email'),
			'CreditLimit'=>$this->input->post('creditlimit'),
			'TermsPayment'=>$this->input->post('terms'),
			'Deposit'=>$this->input->post('deposit'),
			'empCode'=>$this->input->post('commodity'),
			'isActive'=>'1',
			'NPWP'=>$this->input->post('npwp'),
			'NPWPAddress'=>$this->input->post('npwpaddress'),
			'Remarks'=>$this->input->post('remarks'),
			 'CreatedBy' =>$this->session->userdata('idusr'),
			 'CreatedDate' =>date('Y-m-d h:i:s'),
            );
			$this->model_app->insert('ms_customer',$data);
				
        $addresstype2=$_POST['addresstype2']; 
		foreach($addresstype2 as $key => $val){
		  $data2=array(
		  'UP' =>$_POST['up2'][$key],
		  'AddressDesc' =>$_POST['completeaddress2'][$key],
		  'PartyCode' =>$no_customer,
		  'AddressTypeCode' =>$_POST['hidden_address_type'][$key],
		  'City' =>$_POST['city3'][$key],
		  'Country' =>$_POST['country2'][$key],
		  'PostalCode' =>$_POST['PostalCode2'][$key],
		  'State' =>$_POST['state2'][$key],
		  'CreatedBy' =>$this->session->userdata('idusr'),
		  'CreatedDate' =>date('Y-m-d h:i:s'),
		  );
		  $this->model_app->insert('tr_address_detail',$data2);   
		}
	$bankdcd=$_POST['bankdcd']; 
		foreach($bankdcd as $key => $val){
		  $bank=array(
		  'BankAccNo' =>$_POST['bankrek'][$key],
		  'BankAccName' =>$_POST['banknm'][$key],
		  'BankCode' =>$_POST['bankdcd'][$key],
		  'BranchName' =>$_POST['bankbranch'][$key],
		  'PartyCode' =>$no_customer,
		  'SwiftCode' =>$_POST['bankrek'][$key],
		  'BankDetail' =>$_POST['bandkdsc'][$key],
		  'isActive' =>'1',
		  'CreatedBy' =>$this->session->userdata('idusr'),
		  'CreatedDate' =>date('Y-m-d h:i:s'),
		  );
		  $this->model_app->insert('tr_bank_detail',$bank);   
		}
		$lineid=$_POST['lineid']; 
		foreach($lineid as $key => $val){
		  $linebusinessname2=array(
		  'LineBusiness' =>$_POST['lineid'][$key],
		  'Remarks' =>$_POST['linedesc'][$key],
		  'PartyCode' =>$no_customer,
		  'CreatedBy' =>$this->session->userdata('idusr'),
		  'CreatedDate' =>date('Y-m-d h:i:s'),
		  );
		  $this->model_app->insert('tr_linebusiness',$linebusinessname2);   
		}
		
		$contacttype2=$_POST['contacttype2']; 
		foreach($contacttype2 as $key => $val){
		  $data3=array(
		  'UP' =>$_POST['up4'][$key],
		  'Phone' =>$_POST['phone3'][$key],
		  'PartyCode' =>$no_customer,
		  'Fax' =>$_POST['fax3'][$key],
		  'Extention' =>$_POST['ext3'][$key],
		  'Handphone' =>$_POST['hp3'][$key],
		  'ContactDesc' =>$_POST['contactdesc2'][$key],
		  'ContactTypeCode' =>$_POST['hidden_contact_type'][$key],
		  'Email' =>$_POST['email3'][$key],
		  'CreatedBy' =>$this->session->userdata('idusr'),
		  'CreatedDate' =>date('Y-m-d h:i:s'),
		  );
		  $this->model_app->insert('tr_contact_detail',$data3);
		}

	redirect('customer/view_customer');
        //$this->load->view('pages/customer/add/save',$data);
}
//--SAVE--------
function save_customerrrrrrrrrrrrrrrrr()
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
		'CityCode'=>$this->input->post('city'),
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
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.custInitial,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		where b.devisi='sales'
		 order by a.CustCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.custInitial,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		where b.devisi='sales'
		 order by a.CustCode");
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
		'CityCode' =>$this->input->post('city'),
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
		$this->model_app->update('ms_customer','CustCode',$code,$update);
	  redirect('customer/view_customer');
		}	
}

//------------delete data----------------------------------
function delete_customer(){
	$kode=$this->uri->segment(3);
	 if($this->session->userdata('login_status') == TRUE )
 	{
		     $this->model_app->delete_data('ms_customer','CustCode',$kode);
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
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		WHERE b.devisi='sales' AND a.custName LIKE '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.CustCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		WHERE b.devisi='sales' AND a.custName LIKE '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.CustCode");
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
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		WHERE b.devisi='sales' AND a.custName like '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.CustCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('a.Fax,a.email,a.isAgent,a.isActive,a.isShipper,a.isCnee,a.PIC01,a.PIC02,a.HPPIC01,a.HPPIC02,a.CreditLimit,
		a.TermsPayment,a.PostalCode,a.CustCode,a.custName,a.Remarks,a.NPWPAddress,
		a.Address,a.Phone,a.Email,a.CreditLimit,a.Deposit,a.NPWP,
		a.ModifiedBy,a.ModifiedDate,b.empCode,b.empName,b.devisi,c.CityCode,c.CityName',
		'ms_customer a',"inner join ms_staff b on a.empCode=b.empCode
		inner join ms_city c on a.City=c.CityCode
		WHERE b.devisi='sales' AND a.custName like '$cari%' OR a.Address LIKE '%$cari%'
		 order by a.CustCode");
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


