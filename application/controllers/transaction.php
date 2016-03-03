<?php
class Transaction extends CI_Controller{
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
	
	
	
//     DATA TO SESSION
    function booking_shipment(){
        $data = array(
	  		'title'=>'Booking Shipment',
			'scrumb_name'=>'Booking Shipment',
			'scrumb'=>'transaction/booking_shipment',
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
			'view'=>'pages/booking/booking_shipment',
        );	
      //$this->load->view('pages/booking/ship',$data);
       $this->load->view('home/home',$data);
    }
    //     DATA TO SESSION
    function booking_list(){
        $data = array(
	  		'title'=>'Booking list',
			'scrumb_name'=>'Booking list',
			'scrumb'=>'transaction/booking_list',
            'customer'=>$this->model_app->getdatapaging("custName,custInitial","ms_customer","ORDER BY custName"),
			'view'=>'pages/booking/booking_list',
        );	
      $this->load->view('home/home',$data);
    }
 /* Input for ougoing house 
 	to save list item and charges
	 */

 function domestic_outgoing_house(){
        $idusr=$this->session->userdata('idusr');
		$page=$this->uri->segment(3);
      	$limit=20;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data = array(
            'title'=>'domesctic-outgoing-house',
            'scrumb_name'=>'Domesctic outgoing house',
            'scrumb'=>'transaction/domestic_outgoing_house',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
			'airline'=>$this->model_app->getdata('ms_airline',""),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","ORDER BY HouseNo DESC LIMIT $offset,$limit"),
            'view'=>'pages/booking/outgoing/outgoing_house',
        );  
			$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_connote","ORDER BY HouseNo DESC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/domestic_outgoing_house/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = '&laquo;';
			$config['last_link'] = '&raquo;';
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
		
		//$data['view']='pages/charges/v_charges';
        $this->load->view('home/home',$data);

      //$this->load->view('home/home',$data);
    }
	
  function cek_house_invoice(){
     $nomor=$this->input->post('idhouse');

	$result=$this->model_app->getdata('invoice',"WHERE HouseNo='$nomor'");
	if($result){
	$data['pesan']='Nomor House Sudah ada didalam Invoice';
	$this->load->view('pages/booking/outgoing_master/info',$data);
	}
	else
	{
		$data['pesan']='';
		 $this->load->view('pages/booking/outgoing_master/info',$data); 
	}   
}	
  function detail_outgoing_master(){
     $nomor=$this->input->post('nomor');

	$data['master']=$this->model_app->getdata('booking_items a',
	"inner join outgoing_master b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$nomor'");
	$data['pesan']='data berhasil di load';

      $this->load->view('pages/booking/outgoing_master/detail_master',$data);
}
 function detail_outgoing_house(){
     $nomor=$this->input->post('nomor');

		$data['house']=$this->model_app->getdata('booking_items a',
	"inner join outgoing_connote b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$nomor'");
		$data['pesan']='data berhasil di load';

        $this->load->view('pages/booking/outgoing/detail_outgoing',$data);
}
 function edit_outgoing_master(){
        $idusr=$this->session->userdata('idusr');
		$houseno=$this->uri->segment(3);
        $data = array(
            'title'=>'domesctic-outgoing-master',
            'scrumb_name'=>'Domesctic outgoing master / Edit Master',
            'scrumb'=>'transaction/domestic_outgoing_master',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_master a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$houseno' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$houseno' LIMIT 1"),
            'master'=>$this->model_app->getdatapaging("*","outgoing_master","WHERE HouseNo='$houseno' ORDER BY HouseNo DESC"),
			'list_charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$houseno'"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","WHERE HouseNo ='$houseno'"),
            'view'=>'pages/booking/outgoing_master/edit_outgoing_master',
        );  
      $this->load->view('home/home',$data);
    }
 function edit_outgoing_house(){
        $idusr=$this->session->userdata('idusr');
		$houseno=$this->uri->segment(3);
        $data = array(
            'title'=>'domesctic-outgoing-house',
            'scrumb_name'=>'Domesctic outgoing house / Edit House',
            'scrumb'=>'transaction/domestic_outgoing_house',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$houseno' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$houseno' LIMIT 1"),
            'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","WHERE HouseNo='$houseno' ORDER BY HouseNo DESC"),
			'list_charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$houseno'"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","WHERE HouseNo ='$houseno'"),
            'view'=>'pages/booking/outgoing/edit_outgoing_house',
        );  
      $this->load->view('home/home',$data);
    }

function cargo_manifest(){
        $idusr=$this->session->userdata('idusr');
			$page=$this->uri->segment(3);
      	$limit=20;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data = array(
            'title'=>'cargo_manifest',
            'scrumb_name'=>'cargo_manifest',
            'scrumb'=>'transaction/cargo_manifest',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
			'outgoing_connote'=>$this->model_app->getdata('outgoing_connote',""),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
           'list_cargo'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 GROUP BY a.CargoNo DESC LIMIT $offset,$limit"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/cargo/cargo_manifest',
        );  
	$tot_hal = $this->model_app->hitung_isi_tabel("*","cargo_manifest a",
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 GROUP BY a.CargoNo DESC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/cargo_manifest/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = '&laquo;';
			$config['last_link'] = '&raquo;';
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

      $this->load->view('home/home',$data);
    } 
function search_outgoing_master(){
		$idusr=$this->session->userdata('idusr'); 
        $txtsearch=$this->input->post('txtsearch');

		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

	$data['master']=$this->model_app->getdatapaging("*","outgoing_master",
		"WHERE HouseNo LIKE '$txtsearch%' 
		ORDER BY HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_master",
		 "WHERE HouseNo LIKE '$txtsearch%' ORDER BY HouseNo DESC");
	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/search_outgoing_master/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/outgoing_master/search_outgoing_master',$data);
}
function search_outgoing_house(){
		$idusr=$this->session->userdata('idusr'); 

        $txtsearch=$this->input->post('txtsearch');

		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

	$data['connote']=$this->model_app->getdatapaging("*","outgoing_connote",
		"WHERE HouseNo LIKE '$txtsearch%' 
		ORDER BY HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_connote",
		 "WHERE HouseNo LIKE '$txtsearch%' ORDER BY HouseNo DESC");
	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/search_outgoing_house/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/outgoing/search_outgoing',$data);
}

 function delete_om_items(){
	$item=$this->uri->segment(3);
	$houseno=$this->uri->segment(4);
	
	$delete=$this->model_app->delete_data('booking_items','IdItems',$item);
	redirect('transaction/edit_outgoing_master/'.$houseno);
}
 function delete_om_charges(){
	$item=$this->uri->segment(3);
	$houseno=$this->uri->segment(4);
	
	$delete=$this->model_app->delete_data('booking_charges','idCharges',$item);
	redirect('transaction/edit_outgoing_master/'.$houseno);
}
 function delete_booking_items(){
	$item=$this->uri->segment(3);
	$houseno=$this->uri->segment(4);
	
	$delete=$this->model_app->delete_data('booking_items','IdItems',$item);
	redirect('transaction/edit_outgoing_house/'.$houseno);
}
 function delete_charges_items(){
	$item=$this->uri->segment(3);
	$houseno=$this->uri->segment(4);
	
	$delete=$this->model_app->delete_data('booking_charges','idCharges',$item);
	redirect('transaction/edit_outgoing_house/'.$houseno);
}
function search_cargo_manifest(){

        $cari=$this->input->post('cargono');
		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

		$data['list_cargo']=$this->model_app->getdata('cargo_manifest a',
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 WHERE a.CargoNo='$cari' GROUP BY a.CargoNo ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','cargo_manifest a',"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 WHERE a.CargoNo='$cari' GROUP BY a.CargoNo ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/search_cargo_manifest/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/cargo/search_manifest',$data);
}
function periode_outgoing_master(){

        $tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');

		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
	$idusr=$this->session->userdata('idusr');      

	$data['master']=$this->model_app->getdatapaging("*","outgoing_master",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' 
		ORDER BY HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_master",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' ORDER BY HouseNo DESC");

	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/periode_outgoing_master/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/outgoing_master/search_outgoing_master',$data);
}
function periode_outgoing_house(){

        $tgl1=$this->input->post('tgl1');
		$tgl2=$this->input->post('tgl2');

		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
	$idusr=$this->session->userdata('idusr');      

	$data['connote']=$this->model_app->getdatapaging("*","outgoing_connote",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' 
		ORDER BY HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_connote",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' ORDER BY HouseNo DESC");

	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/periode_outgoing_house/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/outgoing/search_outgoing',$data);
}
function periode_cargo_manifest(){

        $tgl1=$this->input->post('tgl1');
		
		$tgl2=$this->input->post('tgl2');

		$page=$this->uri->segment(3);
      	$limit=30;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;

	$data['list_cargo']=$this->model_app->getdata('cargo_manifest a',
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 WHERE LEFT(a.tgl_cargo,10) BETWEEN '$tgl1' AND '$tgl2' GROUP BY a.CargoNo ASC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel('*','cargo_manifest a',"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 WHERE LEFT(a.tgl_cargo,10) BETWEEN '$tgl1' AND '$tgl2' GROUP BY a.CargoNo ASC");

	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/periode_cargo_manifest/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
        $this->load->view('pages/booking/cargo/search_manifest',$data);
}
function laporan_outgoing_master(){

        $tgl1=$this->input->post('tg1');
		$tgl2=$this->input->post('tg2');
		$format1=date("d M Y",strtotime($tgl1));
		$format2=date("d M Y",strtotime($tgl2));

		$data['master']=$this->model_app->getdata("outgoing_master a",
		"INNER JOIN invoice b on a.HouseNo=b.HouseNo
		INNER JOIN ms_customer c on c.custCode=a.Shipper 
		WHERE LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2'
		 AND a.PayCode='CSH-CASH' 
		ORDER BY a.HouseNo DESC");
		$data['periode']=$format1.' s/d '.$format2;


	ob_start();
		$content = $this->load->view('pages/booking/outgoing_master/report_outgoing_master',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Report Outgoing master.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
}
function laporan_outgoing_house(){

        $tgl1=$this->input->post('tg1');
		$tgl2=$this->input->post('tg2');
		$format1=date("d M Y",strtotime($tgl1));
		$format2=date("d M Y",strtotime($tgl2));

		$data['connote']=$this->model_app->getdata("outgoing_connote",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' 
		ORDER BY HouseNo DESC");
		$data['periode']=$format1.' s/d '.$format2;


	ob_start();
		$content = $this->load->view('pages/booking/outgoing/report_outgoing',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Report Outgoing House.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
}

function laporan_cargo_manifest(){

        $tgl1=$this->input->post('tg1');
		$tgl2=$this->input->post('tg2');
		$format1=date("d M Y",strtotime($tgl1));
		$format2=date("d M Y",strtotime($tgl2));

	$data['list_cargo']=$this->model_app->getdata('cargo_manifest a',
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 WHERE LEFT(a.tgl_cargo,10) BETWEEN '$tgl1' AND '$tgl2' GROUP BY a.CargoNo ASC");
	$data['periode']=$format1.' s/d '.$format2;

	ob_start();
		$content = $this->load->view('pages/booking/cargo/report_manifest',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('Report_cargo_manifest.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
}

function list_cargo_manifest(){
	$kode=$this->uri->segment(3);
	$data=array(
	'title'=>'cargo_manifest',
    'scrumb_name'=>'List cargo_manifest',
    'scrumb'=>'transaction/list_cargo_manifest',
	 'list_cargo'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	" left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 GROUP BY a.CargoNo ASC"),
	
	'view'=>'pages/booking/cargo/list_cargo_manifest',
	'cargono'=>$kode
	);
	
	$this->load->view('home/home',$data);
	
}
//========================DELETE CART==============================================
	function hapus_item_cargo($rowid)
	{
		$id='';		
		if ($this->uri->segment(3) === FALSE)
		{
    			$id='';
		}
		else
		{
    			$id = $this->uri->segment(3);
		}
		$data = array(
			'rowid' => $rowid,
			'qty'   => 0
			);
			$this->cart->update($data);
		$this->load->view('pages/booking/cargo/input_manifest_temp');
	}

function cek_cnote(){
	/*
	$input=$this->input->post('input');
	var cnote=$this->input->post('cnote');
		
	$cnote=$_POST['cnote']; 
		foreach($cnote as $key => $val)
		{
		  $note =$_POST['cnote'][$key];

	$data=array(
	'input'=>$input,
    'cnote'=>$note,
	);
}
	
	$this->load->view('pages/booking/cargo/data',$data);
*/	
}

//=====================save cargo manifest ==========
 function save_chargo_manifest(){	
 	
		$tgl=$this->input->post('tgl');
		$ref=$this->input->post('ref');
		$tuju=$this->input->post('tuju');
		$transit=$this->input->post('transit');
		$ket=$this->input->post('ket');
		$realisasi=$this->input->post('realisasi');
		$t_cwt=$this->input->post('t_cwt');
		$t_item=$this->input->post('t_item');
		
		$prefixcargo='CMO'.substr($tuju,0,3);
		$kodecargo=$this->model_app->getCargoNo($prefixcargo);
		//----- SAVE OF CARGO MANIFEST --------------////
		$insert_cargo=array(
		'CargoNo' =>$kodecargo,
		'tgl_cargo' =>date($tgl),
		'referensi' =>$ref,
		'tujuan' =>$tuju,
		'transit' =>$transit,
		'keterangan' =>$ket,
		'realisasi_berat' =>$realisasi,
		'total_berat' =>$t_item,
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		);		
		$save=$this->model_app->insert('cargo_manifest',$insert_cargo);	


	//====Save items cargo ==============//
     foreach($this->cart->contents() as $items){
     	$nohouse=$items['id'];
		$items=array(
		'CargoNo' =>$kodecargo,
		'HouseNo'=>$items['id'],
		'HouseDate'=>$items['date'],
		'Origin'=>$items['origin'],
		'Destination'=>$items['destination'],
		'Service'=>$items['service'],
		'Berat'=>$items['price'],
		'CWT'=>$items['cwt'],
		'date_insert'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('cargo_items',$items);

		 //update status outgoing connote
		 $update=array(
		'status_proses'=>'1'
		);	
		$this->model_app->update('outgoing_connote','HouseNo',$nohouse,$update);
		}
		$this->cart->destroy();

		 $data=array(
           'title'=>'cargo_manifest',
          'scrumb_name'=>'cargo_manifest',
          'scrumb'=>'transaction/cargo_manifest',
		 'view'=>'pages/booking/cargo/confirm_create_manifest',
		 'no_cargo'=>$kodecargo
		 );
		 $this->load->view('home/home',$data);
		
  }
     //=====================save cargo manifest ==========
 function add_update_om_items(){	
 		$house=$this->input->post('house2');
		$panjang=$this->input->post('panjang');
		$lebar=$this->input->post('lebar');
		$tinggi=$this->input->post('tinggi');
		$volume=$panjang*$lebar*$tinggi;
		
		$items=array(
		'HouseNo' =>$house,
		'NoPack'=>$this->input->post('pack'),
		'Length'=>$this->input->post('panjang'),
		'Width'=>$this->input->post('lebar'),
		'Height'=>$this->input->post('tinggi'),
		'Volume'=>$volume,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$items);
		 
	redirect('transaction/edit_outgoing_master/'.$house);
    }
	
     //=====================save cargo manifest ==========
 function add_update_om_charges(){	
 		$house=$this->input->post('house3');
		
		$items=array(
		'HouseNo' =>$house,
		'ChargeName'=>$this->input->post('charge'),
		'Unit'=>$this->input->post('txtunit'),
		'Qty'=>$this->input->post('qty'),
		'Description'=>$this->input->post('desc'),
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_charges',$items);
		 
	redirect('transaction/edit_outgoing_master/'.$house);
    }
     //=====================save cargo manifest ==========
 function add_update_booking_items(){	
 		$house=$this->input->post('house2');
		$panjang=$this->input->post('panjang');
		$lebar=$this->input->post('lebar');
		$tinggi=$this->input->post('tinggi');
		$volume=$panjang*$lebar*$tinggi;
		
		$items=array(
		'HouseNo' =>$house,
		'NoPack'=>$this->input->post('pack'),
		'Length'=>$this->input->post('panjang'),
		'Width'=>$this->input->post('lebar'),
		'Height'=>$this->input->post('tinggi'),
		'Volume'=>$volume,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$items);
		 
	redirect('transaction/edit_outgoing_house/'.$house);
    }
     //=====================save cargo manifest ==========
 function add_update_booking_charges(){	
 		$house=$this->input->post('house3');
		
		$items=array(
		'HouseNo' =>$house,
		'ChargeName'=>$this->input->post('charge'),
		'Unit'=>$this->input->post('txtunit'),
		'Qty'=>$this->input->post('qty'),
		'Description'=>$this->input->post('desc'),
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_charges',$items);
		 
	redirect('transaction/edit_outgoing_house/'.$house);
    }

function edit_cargo_manifest(){
	$kode=$this->uri->segment(3);
	$data=array(
	'title'=>'cargo_manifest',
    'scrumb_name'=>' cargo_manifest',
    'scrumb'=>'transaction/cargo_manifest',
	'header'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"WHERE CargoNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","cargo_items a",
	"RIGHT JOIN cargo_manifest b on a.CargoNo=b.CargoNo
	RIGHT JOIN outgoing_connote c on a.HouseNo=c.HouseNo
	WHERE b.CargoNo='$kode'
	ORDER BY b.CreateDate DESC"),
	'view'=>'pages/booking/cargo/edit_cargo_manifest',
	'cargono'=>$kode
	);
	
	$this->load->view('home/home',$data);
	
}

//=====================save cargo manifest ==========
 function update_chargo_manifest(){	
 		
 		$noconote=$this->input->post('noconote');
		$tgl=$this->input->post('tgl');
		$ref=$this->input->post('ref');
		$tuju=$this->input->post('tuju');
		$transit=$this->input->post('transit');
		$ket=$this->input->post('ket');
		$realisasi=$this->input->post('realisasi');
		$tot_berat=$this->input->post('tot_berat');
		$t_volume=$this->input->post('t_volume');
		
		//----- SAVE OF CARGO MANIFEST --------------////
		$update=array(
		'CargoNo' =>$noconote,
		'tgl_cargo' =>date($tgl),
		'referensi' =>$ref,
		'tujuan' =>$tuju,
		'transit' =>$transit,
		'keterangan' =>$ket,
		'realisasi_berat' =>$realisasi,
		'total_berat' =>$t_volume,
		'ModifiedBy' =>$this->session->userdata('idusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);		
		$this->model_app->update('cargo_manifest','CargoNo',$noconote,$update);	

		 $data=array(
		'title'=>'cargo_manifest',
	    'scrumb_name'=>' cargo_manifest',
	    'scrumb'=>'transaction/cargo_manifest',
		 'view'=>'pages/booking/cargo/confirm_create_manifest',
		 'no_cargo'=>$noconote
		 );
		 $this->load->view('home/home',$data);
		
    }
////////////////////////////////////////
    //-----TAMPIL MENURUT PERIODE -------------------
function cetak_manifest(){

	$kode=$this->uri->segment(3);

	$data=array(
     'title'=>'laporan jurnal',
     'header'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"WHERE CargoNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","cargo_items a",
	"RIGHT JOIN cargo_manifest b on a.CargoNo=b.CargoNo
	RIGHT JOIN outgoing_connote c on a.HouseNo=c.HouseNo
	WHERE b.CargoNo='$kode'
	ORDER BY b.CreateDate DESC"),
	);

		ob_start();
		$content = $this->load->view('pages/booking/cargo/print_cargo_manifest',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_cargo_manifest.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
}
	//===========Pencarian kwitansi====================

 function delete_cargo_connote(){
	$cargono=$this->uri->segment(3);
	$kode=$this->uri->segment(4);
	$houseno=$this->uri->segment(5);
	
	$delete=$this->model_app->delete_data('cargo_items','id',$kode);
			 //update status outgoing connote ke 0
	$update=array(
	'status_proses'=>'0'
	);	
	$this->model_app->update('outgoing_connote','HouseNo',$houseno,$update);
			  
	redirect('transaction/edit_cargo_manifest/'.$cargono.'/'.$kode);
	
}
//========================DELETE CART==============================================
	function delete_session_cargo()
	{
		
    $id = $this->input->post('nohouse');

		$del = array(
			'rowid' => $id,
			'qty'   => 0
			);
	$this->cart->update($del);

	$data=array(
	'message'=>'data berhasil ditambahkan',
	'title'=>'Input cargo manifest'
	);
		$this->load->view('pages/booking/cargo/input_manifest_temp',$data);
	}

 function delete_outgoing_house(){
	$kode=$this->uri->segment(3);
	$search=$this->model_app->getdata('outgoing_connote',"WHERE HouseNo='$kode'");
	if($search){

			$delete=$this->model_app->delete_data('booking_charges','HouseNo',$kode);
			$delete=$this->model_app->delete_data('booking_items','HouseNo',$kode);
			$delete=$this->model_app->delete_data('outgoing_connote','HouseNo',$kode);
		}

		redirect('transaction/domestic_outgoing_house');
	}

function delete_outgoing_master(){
	$kode=$this->uri->segment(3);
	$search=$this->model_app->getdata('outgoing_master',"WHERE HouseNo='$kode'");
	if($search){

			$delete=$this->model_app->delete_data('booking_charges','HouseNo',$kode);
			$delete=$this->model_app->delete_data('booking_items','HouseNo',$kode);
			$delete=$this->model_app->delete_data('outgoing_master','HouseNo',$kode);
		}

		redirect('transaction/domestic_outgoing_master');
}	
 function delete_cargo_manifest(){
	$kode=$this->uri->segment(3);
	
	
	$search=$this->model_app->getdata('cargo_items a',
			"Left Join cargo_manifest b on a.CargoNo=b.CargoNo
			 LEFT Join outgoing_connote c on a.HouseNo=c.HouseNo
			 WHERE b.CargoNo='$kode'");
	if($search){

		foreach($search as $row){

			$delete=$this->model_app->delete_data('cargo_items','CargoNo',$kode);
			$delete=$this->model_app->delete_data('cargo_manifest','CargoNo',$kode);

				//update status outgoing connote ke status 0
				$house=$row->HouseNo;
				$update=array(
				'status_proses'=>'0'
				);

			$this->model_app->update('outgoing_connote','HouseNo',$house,$update);
		}
		redirect('transaction/cargo_manifest');

		}
	}	

//// incoming house
 function domestic_incoming_house(){
        $data = array(
            'title'=>'domesctic-incoming-house',
            'scrumb_name'=>'Domesctic incoming house',
            'scrumb'=>'transaction/domestic_incoming_house',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/domestic_incoming_house',
        );  
      $this->load->view('home/home',$data);
    }
   //     consolidation
    function outgoing_consolidation(){
        $data = array(
            'title'=>'outgoing_consolidation',
            'scrumb_name'=>'outgoing_consolidation',
            'scrumb'=>'transaction/outgoing_consolidation',
            'view'=>'pages/booking/consol/outgoing_consolidation',
        );  
      $this->load->view('home/home',$data);
    }
     //     consolidation
    function incoming_consolidation(){
        $data = array(
            'title'=>'incoming_consolidation',
            'scrumb_name'=>'incoming_consolidation',
            'scrumb'=>'transaction/incoming_consolidation',
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'view'=>'pages/booking/incoming_consolidation',
        );  
      $this->load->view('home/home',$data);
    }

     //===DATA TO SESSION
function domestic_outgoing_master(){
	 $idusr=$this->session->userdata('idusr');
		$page=$this->uri->segment(3);
      	$limit=20;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data = array(
            'title'=>'domesctic-outgoing-master',
            'scrumb_name'=>'Domesctic outgoing master',
            'scrumb'=>'transaction/domestic_outgoing_master',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'master'=>$this->model_app->getdatapaging("a.HouseNo,a.ETD,a.Service,a.Origin,a.Destination,a.Shipper,a.Consigne,a.PayCode","outgoing_master a",
			"LEFT join invoice b on a.HouseNo=b.HouseNo
			ORDER BY a.HouseNo DESC LIMIT $offset,$limit"),
            'view'=>'pages/booking/outgoing_master/outgoing_master',
        );  
			$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_master","ORDER BY HouseNo DESC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/domestic_outgoing_master/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = '&laquo;';
			$config['last_link'] = '&raquo;';
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
       $this->load->view('home/home',$data);
    }
	
  //     DATA TO SESSION
    function domestic_incoming_master(){
        $data = array(
            'title'=>'domestic_incoming_master',
            'scrumb_name'=>'domestic_incoming_master',
            'scrumb'=>'transaction/domestic_incoming_master',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/domestic_incoming_master',
        );  
      $this->load->view('home/home',$data);
    }  
//------------delete data----------------------------------
function hapus_item_temp(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('temp','awb_no',$kode);
	redirect('transaksi/add_transaksi');
    }	
}

//=====================save cargo manifest ==========
 function confirm_outgoing_master(){	
		$getjob=$this->model_app->getJobMaster();
		//$getHouse=$this->model_app->getHouseMasterNo();
		
		$getHouse=$this->input ->post('house');
		$etd=$this->input->post(
		'etd');
			
	//====Save charges and items in every table refer to SMU number =====//
	$pcs=$_POST['pcs'];	
	foreach($pcs as $key => $val)
	{
   		$pcs =$_POST['pcs'][$key];
        $p  =$_POST['p'][$key];
		$l  =$_POST['l'][$key];	
		$t  =$_POST['t'][$key];	
		$v  =$_POST['v'][$key];	
		$newitem=array(
		'HouseNo' =>$getHouse,
		'NoPack'=>$pcs, 
		'Length'=>$p,
		'Width'=>$l,
		'Height'=>$t,
		'Volume'=>$v,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$newitem);
	}
	$qty=$_POST['qty'];	
	foreach($qty as $key => $val)
	{
   		$charge =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$newcharge=array(
		'HouseNo' =>$getHouse,
		'ChargeName'=>$charge,
		'Unit'=>$unit,
		'Qty'=>$qty,
		'Description'=>$desc,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_charges',$newcharge);
	}
	//----- SAVE OF OUT GOING Master --------------////
	$insert=array(
		'HouseNo' =>$getHouse,
		'JobNo' =>$getjob,
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'Airlines' =>$this->input->post('airlines'),
		'FlightNumbDate1' =>$this->input->post('flightno1').'/'.$this->input->post('flightdate1'),
		'FlightNumbDate2' =>$this->input->post('flightno2').'/'.$this->input->post('flightdate2'),
		'FlightNumbDate3' =>$this->input->post('flightno3').'/'.$this->input->post('flightdate3'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight2'),
		'grandVolume' =>$this->input->post('t_volume'),
		'grandPCS' =>$this->input->post('t_pacs'),
		'Amount' =>$this->input->post('total_charge'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>''
		);		
		 $this->model_app->insert('outgoing_master',$insert);	
		//=======  print view in HTML   ============//
        $data = array(
            'title'=>'domestic_outgoing_master',
            'scrumb_name'=>'domestic_outgoing_master',
			'houseno'=>$getHouse,
			'jobno'=>$getjob,
            'scrumb'=>'transaction/domestic_outgoing_master',
            'view'=>'pages/booking/outgoing_master/confirm',
        );  
 		$this->load->view('home/home',$data);		
    }
	
function print_outgoing_master(){
	$kode=$this->uri->segment(3);
	$nohouse=$this->uri->segment(3);
	
	        $data = array(
            'title'=>'domestic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$nohouse'"),
			'kode'=>$this->input->post('houseno'),
			'kode2'=>$nohouse
        ); 

		ob_start();
		$content = $this->load->view('pages/booking/outgoing_master/print_master',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_cargo_manifest.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}	
}
//     DATA TO PDF
 function confirm_outgoing_house(){
		$getHouse=$this->model_app->getHouseNo();
		$getjob=$this->model_app->getJob();
		$etd=$this->input->post('etd');
			
	//====Save charges and items inevery table refer to SMU number ==============//
	$pcs=$_POST['pcs'];	
	foreach($pcs as $key => $val)
	{
   		$pcs =$_POST['pcs'][$key];
        $p  =$_POST['p'][$key];
		$l  =$_POST['l'][$key];	
		$t  =$_POST['t'][$key];	
		$v  =$_POST['v'][$key];	
		$newitem=array(
		'HouseNo' =>$getHouse,
		'NoPack'=>$pcs, 
		'Length'=>$p,
		'Width'=>$l,
		'Height'=>$t,
		'Volume'=>$v,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$newitem);
	}
	$qty=$_POST['qty'];	
	foreach($qty as $key => $val)
	{
   		$charge =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$newcharge=array(
		'HouseNo' =>$getHouse,
		'ChargeName'=>$charge,
		'Unit'=>$unit,
		'Qty'=>$qty,
		'Description'=>$desc,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_charges',$newcharge);
	}
	//----- SAVE OF OUT GOING HOUSE --------------////
	$OutHouse=array(
		'HouseNo' =>$getHouse,
		'JobNo' =>$getjob,
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight2'),
		'grandVolume' =>$this->input->post('t_volume'),
		'grandPCS' =>$this->input->post('t_pacs'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>''
		);		
		 $this->model_app->insert('outgoing_connote',$OutHouse);	
//==============  print view in HTML   =======================//
        $data = array(
            'title'=>'domestic_outgoing_house',
            'scrumb_name'=>'domestic_outgoing_house',
			'houseno'=>$getHouse,
			'jobno'=>$getjob,
            'scrumb'=>'transaction/domestic_outgoing_house',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
           // 'tmpcharge'=>$this->model_app->getdatapaging("*","temp_charges","ORDER BY tempChargeId"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
			'outgoing_connote'=>$this->model_app->getdatapaging("*","outgoing_connote","ORDER BY HouseNo ASC"),
			
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","where HouseNo='$getHouse' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where HouseNo='$getHouse' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","where HouseNo='$getHouse' ORDER BY idCharges ASC"),
			
			
            'view'=>'pages/booking/outgoing/confirm_outgoing_house',
        );  
        ob_start();
   
 			$this->load->view('home/home',$data);
    

    }  
//     DATA TO PDF
 function update_outgoing_master(){
		$houseno=$this->input->post('house');
	
		$etd=$this->input->post('etd');
		
	//----- SAVE OF OUTGOING HOUSE --------------////
	$update=array(
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight2'),
		'grandVolume' =>$this->input->post('t_volume'),
		'grandPCS' =>$this->input->post('t_pacs'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'ModifiedBy' =>$this->session->userdata('idusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->update('outgoing_master','HouseNo',$houseno,$update);	
//==============  print view in HTML   =======================//
        $data = array(
            'title'=>'domestic_outgoing_master',
            'scrumb_name'=>'domestic_outgoing_master',
			'houseno'=>$houseno,
			'jobno'=>$getjob,
            'scrumb'=>'transaction/domestic_outgoing_master',
			'outgoing_connote'=>$this->model_app->getdatapaging("*","outgoing_connote","ORDER BY HouseNo ASC"),
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","where HouseNo='$houseno' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where HouseNo='$houseno' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","where HouseNo='$houseno' ORDER BY idCharges ASC"),
            'view'=>'pages/booking/outgoing_master/confirm',
        );  
   		$this->load->view('home/home',$data);
    }
//     DATA TO PDF
 function update_outgoing_house(){
		$houseno=$this->input->post('house');
	
		$etd=$this->input->post('etd');
		
	//----- SAVE OF OUTGOING HOUSE --------------////
	$update=array(
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight2'),
		'grandVolume' =>$this->input->post('t_volume'),
		'grandPCS' =>$this->input->post('t_pacs'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'ModifiedBy' =>$this->session->userdata('idusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->update('outgoing_connote','HouseNo',$houseno,$update);	
//==============  print view in HTML   =======================//
        $data = array(
            'title'=>'domestic_outgoing_house',
            'scrumb_name'=>'domestic_outgoing_house',
			'houseno'=>$getHouse,
			'jobno'=>$getjob,
            'scrumb'=>'transaction/domestic_outgoing_house',
			'outgoing_connote'=>$this->model_app->getdatapaging("*","outgoing_connote","ORDER BY HouseNo ASC"),
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","where HouseNo='$houseno' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where HouseNo='$houseno' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","where HouseNo='$houseno' ORDER BY idCharges ASC"),
			
			
            'view'=>'pages/booking/outgoing/confirm_print_house',
        );  
        ob_start();
   
 			$this->load->view('home/home',$data);
    }  
function add_invoice(){

	$kode=$this->input->post('houseno');
	$data=array(
     'title'=>'laporan jurnal',
     'header'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Shipper=b.custCode
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Consigne=b.custCode
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN booking_charges b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$kode'
	ORDER BY a.CreateDate DESC"),
	);

		ob_start();
		$content = $this->load->view('pages/booking/outgoing_master/print_outgoing_cash',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_outgoing_cash.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
}
function print_invoice_OM(){
	
	$kode=$this->input->post('houseno');
	$search=$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN invoice c on a.HouseNO=c.HouseNo
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1");
	foreach($search as $row){
	$paycode=$row->PayCode;
	
	if($paycode=="CRD-CREDIT"){
	$view='print_outgoing_credit';
	 } 
	 else 
	 {
	$view='print_outgoing_cash';
	 }
	$data=array(
     'title'=>'Invoice Cash',
     'header'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Shipper=b.custCode
	 INNER JOIN invoice c on a.HouseNO=c.HouseNo
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Consigne=b.custCode
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN booking_charges b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$kode'
	ORDER BY a.CreateDate DESC"),
	);

		ob_start();
		$content = $this->load->view('pages/booking/outgoing_master/'.$view,$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_outgoing_cash.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	 }

}

function print_save_invoice_OM(){
	$getInvoice=$this->model_app->getInvoice();
		$kode=$this->input->post('houseno');
	$search=$this->model_app->getdatapaging("*","outgoing_master",
	"WHERE HouseNo='$kode' ORDER BY CreateDate DESC LIMIT 1");
	foreach($search as $row){
	$paycode=$row->PayCode;
	
	if($paycode=="CRD-CREDIT"){
	$view='print_outgoing_credit';
	 } 
	 else 
	 {
	$view='print_outgoing_cash';
	 }

	$data=array(
     'title'=>'laporan jurnal',
     'header'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Shipper=b.custCode
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Consigne=b.custCode
	WHERE a.HouseNo='$kode' ORDER BY a.CreateDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN booking_charges b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$kode'
	ORDER BY a.CreateDate DESC"),
	'invoice'=>$getInvoice
	);
	$insert_invoice=array(
		'InvoiceNo' =>$getInvoice,
		'HouseNo' =>$kode,
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate' =>date('Y-m-d H:i:s'),
		'InvoiceStatus' =>'1'
		);
		$updatemaster=array(
		'status_proses'=>'1'
		);	
		$this->model_app->update('outgoing_master','HouseNo',$kode,$updatemaster);	
		$save=$this->model_app->insert('invoice',$insert_invoice);

		ob_start();
		$content = $this->load->view('pages/booking/outgoing_master/'.$view,$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_outgoing_cash.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	}
}

//     DATA TO PDF 
  function print_outgoing_house(){
//==============  Save charges and items inevery table refer to SMU number =======================//
	$nohouse=$this->input->post('house');

        $data = array(
            'title'=>'domestic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$nohouse'"),
        );  
        ob_start();
        $content = $this->load->view('pages/booking/outgoing/printview_outgoing_house',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('data Booking.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }  
//     DATA TO PDF 
  function print_outgoing_house2(){
//==============  Save charges and items inevery table refer to SMU number =======================//
	$nohouse=$this->uri->segment(3);
	
	/*
	// DONT EXECUTE THIS CODE 
	foreach($pcs as $key => $val)
	{
   		$pcs =$_POST['pcs'][$key];
        $p  =$_POST['p'][$key];
		$l  =$_POST['l'][$key];	
		$t  =$_POST['t'][$key];	
		$v  =$_POST['v'][$key];	
	$newitem=array(
		'HouseNo' =>$this->input->post('house'),
		'NoPack'=>$pcs,
		'Length'=>$p,
		'Width'=>$l,
		'Height'=>$t,
		'Volume'=>$v,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$newitem);
	}
	$charge=$_POST['charge'];	
	foreach($charge as $key => $val)
	{
   		$charge =$_POST['charge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
	$newcharge=array(
		'HouseNo' =>$this->input->post('house'),
		'ChargeName'=>$charge,
		'Unit'=>$unit,
		'Qty'=>$qty,
		'Desc'=>$desc,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_charges',$newcharge);
	}
	//----- SAVE OF OUT GOING HOUSE --------------////
$OutHouse=array(
		'HouseNo' =>$this->input->post('house'),
		'JobNo' =>$this->input->post('job'),
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date('Y-m-d:h-s-m',$this->input->post('etd')),
		'Shipper' =>$this->input->post('idshipper'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idconsigne'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('out_going_house',$OutHouse);	
		 */
		/* DONT EXEDCUTE */
//==============  print view in PDF   =======================//
        $data = array(
            'title'=>'domestic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_connote a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$nohouse'"),
        );  
        ob_start();
        $content = $this->load->view('pages/booking/outgoing/printview_outgoing_house',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('data Booking.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
    }  
 function add_soa(){	
 		$data=array(
		'title'=>'Adding SOA',
		'scrumb_name'=>'Adding SOA',
		'scrumb'=>'transaction/add_soa',
		'customer'=>$this->model_app->getdata('ms_customer a',
		"INNER JOIN outgoing_master b on a.custCode=b.Shipper WHERE b.payCode='CRD-CREDIT' GROUP BY a.custCode"),
		
		'view'=>'pages/booking/outgoing_master/add_SOA',
		);
	$this->load->view('home/home',$data);
 }
 function filter_soa(){
        $idcust=$this->input->post('idcust');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		
		$data['list']=$this->model_app->getdata('outgoing_master a',
		"INNER JOIN ms_customer b on b.custCode=a.Shipper
		WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust'
		");
        $this->load->view('pages/booking/outgoing_master/tabel_SOA',$data);
}
function filter_consol(){
        $idcust=$this->input->post('filter');
		
		
		$data['list']=$this->model_app->getdata('outgoing_master',
		"WHERE Shipper < '$idcust'
		");
        $this->load->view('pages/booking/consol/consol_filter',$data);
}	
//   DATA TO PDF 
function print_SOA(){
	    $idcust=$this->input->post('customers');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		$currency=$this->input->post('currency');
	
		$data=array(
		'list'=>$this->model_app->getdata("outgoing_master a",
				"INNER JOIN ms_customer b on b.custCode=a.Shipper
				WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust'"),
		'cust'=>$this->model_app->getdata("outgoing_master a",
				"INNER JOIN ms_customer b on b.custCode=a.Shipper
				WHERE a.Shipper='$idcust' LIMIT 1"),
		'idcust'=>$idcust,
		'etd1'=>$etd1,
		'etd2'=>$etd2,
		'currency'=>$currency
		);
		
        ob_start();
        $content = $this->load->view('pages/booking/outgoing_master/report_SOA',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Report SOA.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
}  
function getcost(){
	$code = $_GET['plane'];
	
	   $data=$this->model_app->getdata('ms_airline',"WHERE AirLineCode='$code'");
	   $this->load->view('pages/booking/data_barang',$data);
   }
function barang(){
	   $data=$this->model_app->getdata('barang',"");
	   $this->load->view('pages/booking/data_barang',$data);
   }

function ambil_detail(){	
	//if(isset($_GET['action']) && $_GET['action'] == "getDetail") {
	//$kode_brg = $_GET['kode_brg'];
	$kode_brg = $_GET['kode'];
	//$kode_brg =$this->uri->segment(3);
	$cari=$this->model_app->getdata('barang',"");
	
if($cari){
	 $arr=array();
	 foreach($cari as $rw){
		 
		 $dt=array(
		 'nama'=>$rw->nm_barang,
		 'harga'=>$rw->harga,
		 'jenis'=>$rw->jenis
		 
		 );
		//$data[]=$dt; 
		array_push($arr, $dt);
	 }
} 
 $data=json_encode($arr);
echo "{\"list_event\":" . $data . "}";

exit;

}
	
	


}


