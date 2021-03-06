<?php
class Transaction extends CI_Controller{
    function __construct(){
        parent::__construct();
		  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','You Must Login First !');
            redirect('');
        };     
        $this->load->model('model_app');
		$this->load->model('mdata');
		$this->load->model('m_outgoing');
		$this->load->model('model_incoming');
        $this->load->helper('currency_format_helper');
		date_default_timezone_set("Asia/Jakarta"); 
    }
	
//   DATA TO SESSION
    function booking_shipment(){
        $data = array(
	  		'title'=>'Booking Shipment',
			'scrumb_name'=>'Booking Shipment',
			'scrumb'=>'transaction/booking_shipment',
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
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
 	to save list item and chargesv c
	 */

    function getChargeOptional(){
      $result=$this->model_app->getdatapaging("Reff_Account,ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='0' AND HouseMethode='OUT'  AND LEFT(ChargeCode,1)='8' AND MID(ChargeCode,2,1)='4'  ORDER BY ChargeName");
	foreach($result as $list){
		$row = array(
				'ChargeCode' =>$list->ChargeCode,
				'ChargeName' =>$list->ChargeName,
				'Reff_Account' =>$list->Reff_Account,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
function getAccountCharge(){
	  
	  $cargecode=$this->input->post('cargecode');
	  $pecah=explode('_',$cargecode);
	  $kode=$pecah[0];
	  
      $result=$this->model_app->getdatapaging("Reff_Account,ChargeCode,ChargeName","ms_charge","WHERE ChargeCode='$kode'");
	foreach($result as $list){
		$row = array(
				'ChargeCode' =>$list->ChargeCode,
				'ChargeName' =>$list->ChargeName,
				'Reff_Account'=>$list->Reff_Account
			);
			$data[] = $row;
		} 
		echo json_encode($data);
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
	"inner join outgoing_house b on a.HouseNo=b.HouseNo
	WHERE a.HouseNo='$nomor'");
		$data['pesan']='data berhasil di load';
        $this->load->view('pages/booking/outgoing/detail_outgoing',$data);
}
 function edit_outgoing_house(){
        $idusr=$this->session->userdata('idusr');
		$houseno=$this->uri->segment(3);
        $data = array(
            'title'=>'domesctic-outgoing-house',
            'link'=>'<a href="'.base_url().'outgoing_house">Outgoing House</a> / Edit data ( '.$houseno.' )',
            'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charge'=>$this->model_app->getdatapaging("*","ms_charge","WHERE DefaultCharge='0'"),			
			'chargeoptional'=>$this->model_app->getdatapaging("*","booking_charge a",
			"INNER JOIN ms_charge b on a.CostID=b.ChargeCode 
			 WHERE b.DefaultCharge='0' AND a.Reff='$houseno'"),
			'airfreight'=>$this->model_app->getdatapaging("*","booking_charge a","INNER JOIN ms_charge b on a.CostID=b.ChargeCode WHERE a.Reff='$houseno' AND b.ChargeCode='1'"),
			'cost_smu'=>$this->model_app->getdatapaging("*","booking_charge a","INNER JOIN ms_charge b on a.CostID=b.ChargeCode WHERE a.Reff='$houseno' AND b.ChargeCode='2'"),

            //'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$houseno' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$houseno' LIMIT 1"),
          'connote'=>$this->model_app->getdatapaging("a.*,b.CustName as sender,b.Address as address1,b.Phone as phone1,c.Phone as phone2,c.Address as address2,c.CustName as receiver,d.PortName as ori,e.PortName as desti",
	 "outgoing_house a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	 WHERE a.HouseNo='$houseno' ORDER BY a.HouseNo DESC"),
	 
			'list_charges'=>$this->model_app->getdatapaging("*","booking_charge","WHERE Reff ='$houseno'"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$houseno'"),
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
            'title'=>'cargo_Release',
            'scrumb_name'=>'cargo_release',
            'scrumb'=>'transaction/cargo_manifest',
            'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
			'outgoing_connote'=>$this->model_app->getdata('outgoing_house',""),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
           'list_cargo'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 GROUP BY a.CargoNo DESC LIMIT $offset,$limit"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            //'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
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
function cargo_manifest2(){
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
            'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
			'outgoing_connote'=>$this->model_app->getdata('outgoing_house',""),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
           'list_cargo'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"left outer JOIN cargo_items b on a.CargoNo=b.CargoNo
	 GROUP BY a.CargoNo DESC LIMIT $offset,$limit"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            //'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
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
	$data['connote']=$this->model_app->getdatapaging("*","outgoing_house",
		"WHERE HouseNo LIKE '$txtsearch%' 
		ORDER BY HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_house",
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
		ORDER BY NoSMU DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_master",
		"WHERE LEFT(ETD,10) BETWEEN '$tgl1' AND '$tgl2' ORDER BY NoSMU DESC");
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
	$data['connote']=$this->model_app->getdatapaging("a.HouseNo,a.ETD,a.PayCode,a.Service,b.CustName as shipper,d.PortName as origin,e.PortName as desti",
			"outgoing_house a",
			"INNER JOIN ms_customer b on a.Shipper=b.CustCode
			 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
			 LEFT JOIN ms_port d on a.Origin=d.PortCode
			 LEFT JOIN ms_port e on a.Destination=e.PortCode
			 WHERE LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2'
			 ORDER BY a.HouseNo DESC LIMIT $offset,$limit");
	$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_house",
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
		"INNER JOIN invoice b on a.NoSMU=b.Reff
		INNER JOIN ms_customer c on c.CustCode=a.Shipper 
		WHERE LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2'
		 AND a.PayCode='CSH-CASH' 
		ORDER BY a.NoSMU DESC");
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
		$data['connote']=$this->model_app->getdata("outgoing_house",
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
	 $kode=$this->model_app->generateNo("tr_cargo_release","CargoReleaseCode","CR-");
	 
	if(isset($_POST['checklish']))
	{	
 	$nosmu=$_POST['smu2'];	
	$flight=$_POST['checklish'];	
	//$search=$this->model_app->getdata('outgoing_master',"WHERE FlightNumbDate1='$flight'");
	foreach($flight as $key => $val)
	{
		$flightno=$_POST['checklish'][$key];
		$search=$this->model_app->getdata('outgoing_master',"WHERE FlightNumbDate1='$flightno' AND StatusProses in (2,3)");
		foreach($search as $row){
	    $smu =$row->NoSMU;
		$cwt =$row->CWT;
		$pcs =$row->PCS;
		$flight2 =$flightno;
		
		$cwt_total+=$cwt;
		$pcs_total+=$pcs;
	$cargo_items=array(
		'CargoReleaseCode' =>$kode,
		'FlightNumber' =>$flight2,
		'smu' =>$smu,
		'CWT' =>$cwt,
		'PCS' =>$pcs,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$updatesmu=array(
		'StatusProses' =>'4',
		);
				
		$save=$this->model_app->insert('cargo_items',$cargo_items);	
		$this->model_app->update('outgoing_master','NoSMU',$smu,$updatesmu);		
			
		}
			
	}
	   	//---insert header manifest
		$insert_cargo=array(
		'CargoReleaseCode' =>$kode,
		'AirLine' =>$this->input->post('airlines'),
		'CargoDetails' =>$this->input->post('details'),
		'ReleaseDate' =>$this->input->post('tgl3'),
		'Created' =>$this->input->post('created'),
		'CarriedBy' =>$this->input->post('carry'),
		'ReceivedBy' =>$this->input->post('receive'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);		
		$save=$this->model_app->insert('tr_cargo_release',$insert_cargo);
		redirect('cargo_release');
  }
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
	RIGHT JOIN outgoing_house c on a.HouseNo=c.HouseNo
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
	RIGHT JOIN outgoing_house c on a.HouseNo=c.HouseNo
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
	$this->model_app->update('outgoing_house','HouseNo',$houseno,$update);
			  
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
	$search=$this->model_app->getdata('outgoing_house',"WHERE HouseNo='$kode'");
	if($search){
			$delete=$this->model_app->delete_data('booking_charge','Reff',$kode);
			$delete=$this->model_app->delete_data('booking_items','Reff',$kode);
			$delete=$this->model_app->delete_data('outgoing_house','HouseNo',$kode);
		}
		redirect('transaction/domestic_outgoing_house');
	}
function delete_outgoing_master(){
	$kode=$this->uri->segment(3);
	$search=$this->model_app->getdata('outgoing_master',"WHERE NoSMU='$kode'");
	if($search){
			$delete=$this->model_app->delete_data('booking_charge','Reff',$kode);
			$delete=$this->model_app->delete_data('booking_items','Reff',$kode);
			$delete=$this->model_app->delete_data('invoice','Reff',$kode);
			$delete=$this->model_app->delete_data('outgoing_master','NoSMU',$kode);
		}
		redirect('transaction/domestic_outgoing_master');
}	
 function delete_cargo_manifest(){
	$kode=$this->uri->segment(3);
	
	
	$search=$this->model_app->getdata('cargo_items a',
			"Left Join cargo_manifest b on a.CargoNo=b.CargoNo
			 LEFT Join outgoing_house c on a.HouseNo=c.HouseNo
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
			$this->model_app->update('outgoing_house','HouseNo',$house,$update);
		}
		redirect('transaction/cargo_manifest');
		}
	}	
   //     consolidation

function filter_consol(){
		$tgl=$this->input->post('tgl');
		$destination=$this->input->post('destination');
		$nosmu=$this->input->post('nosmu');
        $data = array(
            'title'=>'Consol SMU',
'freehouse'=>$this->model_app->getdatapaging("a.HouseNo,a.CodeShipper,a.Commodity,a.PCS,a.ConsoledPCS,a.RemainPCS,a.ConsoledCWT,a.RemainCWT,a.CWT,b.CustName as sender,c.CustName as receiver","outgoing_house a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						WHERE a.HouseStatus ='0' AND a.RemainCWT >0 AND a.Consolidation <=1 AND a.Destination='$destination'"),
						 
'added'=>$this->model_app->getdatapaging("a.MasterNo,c.HouseNo,c.CodeShipper,c.Commodity,a.CWT,a.PCS,c.ConsoledPCS,c.RemainPCS,c.ConsoledCWT,c.RemainCWT,d.CustName as sender,e.CustName as receiver","consol a",
			 "INNER JOIN outgoing_master b ON a.MasterNo=b.NoSMU 
			  INNER JOIN outgoing_house c on a.HouseNo=c.HouseNo
			  LEFT JOIN ms_customer d on d.CustCode=c.Shipper
			  LEFT JOIN ms_customer e on e.CustCode=c.Consigne
			 WHERE a.MasterNo ='$nosmu'"),
        );  
      $this->load->view('pages/booking/consol/consol_replace',$data);	  
}
   //     consolidation
function filter_consolllll(){
		$tgl=$this->input->post('tgl');
		$destination=$this->input->post('destination');
		$nosmu=$this->input->post('nosmu');
        $data = array(
            'title'=>'Consol SMU',
'freehouse'=>$this->model_app->getdatapaging("a.HouseNo,a.CodeShipper,a.Commodity,a.PCS,a.ConsoledPCS,a.RemainPCS,a.ConsoledCWT,a.RemainCWT,a.CWT,b.CustName as sender,c.CustName as receiver","outgoing_house a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						WHERE a.HouseStatus ='0' AND a.RemainCWT >0 AND a.Destination='$destination' AND LEFT(a.ETD,10)='$tgl' a.Consolidation='0'"),
						 
'added'=>$this->model_app->getdatapaging("a.MasterNo,c.HouseNo,c.CodeShipper,c.Commodity,a.CWT,a.PCS,c.ConsoledPCS,c.RemainPCS,c.ConsoledCWT,c.RemainCWT,d.CustName as sender,e.CustName as receiver","consol a",
			 "INNER JOIN outgoing_master b ON a.MasterNo=b.NoSMU 
			  INNER JOIN outgoing_house c on a.HouseNo=c.HouseNo
			  LEFT JOIN ms_customer d on d.CustCode=c.Shipper
			  LEFT JOIN ms_customer e on e.CustCode=c.Consigne
			 WHERE a.MasterNo ='$nosmu'"),
        );  
      $this->load->view('pages/booking/consol/consol_replace',$data);	  
}

   //     consolidation
function filter_desti(){
		$tgl=$this->input->post('tgl');
		$destination=$this->input->post('destination');
		$nosmu=$this->input->post('nosmu');
        $data = array(
            'title'=>'Consol SMU',
'freehouse'=>$this->model_app->getdatapaging("a.HouseNo,a.CodeShipper,a.Commodity,a.PCS,a.ConsoledPCS,a.RemainPCS,a.ConsoledCWT,a.RemainCWT,a.CWT,b.CustName as sender,c.CustName as receiver","outgoing_house a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						WHERE a.HouseStatus ='0' AND a.Consolidation='0' AND a.Destination='$destination' AND LEFT(a.ETD,10)='$tgl'"),
						 
'added'=>$this->model_app->getdatapaging("a.MasterNo,c.Commodity,c.CodeShipper,c.HouseNo,c.CWT,c.PCS,a.ConsoledPCS,a.RemainPCS,c.ConsoledCWT,c.RemainCWT,d.CustName as sender,e.CustName as receiver","consol a",
			 "INNER JOIN outgoing_master b ON a.MasterNo=b.NoSMU 
			  INNER JOIN outgoing_house c on a.HouseNo=c.HouseNo
			  LEFT JOIN ms_customer d on d.CustCode=c.Shipper
			  LEFT JOIN ms_customer e on e.CustCode=c.Consigne
			 WHERE a.MasterNo ='$nosmu'"),
        );  
      $this->load->view('pages/booking/consol/consol_replace',$data);	  
}
   //     consolidation
function filter_date(){
		$tgl=$this->input->post('tgl');
		$destination=$this->input->post('destination');
		
		if($destination==''){
			$status="a.HouseStatus ='0' AND a.Consolidation='0' AND LEFT(a.ETD,10)='$tgl'";
		} else {
			$status="a.HouseStatus ='0' AND a.Consolidation='0' AND LEFT(a.ETD,10)='$tgl' AND a.Destination='$destination'";
		}
		
		
        $data = array(
            'title'=>'Consol SMU',
'freehouse'=>$this->model_app->getdatapaging("a.HouseNo,a.CodeShipper,a.Commodity,a.PCS,a.ConsoledPCS,a.RemainPCS,a.ConsoledCWT,a.RemainCWT,a.CWT,b.CustName as sender,c.CustName as receiver","outgoing_house a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						WHERE ".$status." "),
						 
'added'=>$this->model_app->getdatapaging("a.MasterNo,c.CodeShipper,c.Commodity,c.HouseNo,c.CWT,c.PCS,,c.ConsoledPCS,c.RemainPCS,c.ConsoledCWT,c.RemainCWT,d.CustName as sender,e.CustName as receiver","consol a",
			 "INNER JOIN outgoing_master b ON a.MasterNo=b.NoSMU 
			  INNER JOIN outgoing_house c on a.HouseNo=c.HouseNo
			  LEFT JOIN ms_customer d on d.CustCode=c.Shipper
			  LEFT JOIN ms_customer e on e.CustCode=c.Consigne
			 WHERE a.MasterNo ='$nosmu'"),
        );  
      $this->load->view('pages/booking/consol/consol_replace',$data);	  
}
   //     consolidation
function filter_flight(){
		$airlines=$this->input->post('airlines');
     $data = array(		 
            'smu'=>$this->model_app->getdatapaging("a.ETD,a.Destination,a.Origin,a.FlightNumbDate1,d.FlightID,d.FlightNo,a.NoSMU,sum(a.PCS) as pcs,sum(a.CWT) cwt,b.PortName as ori,c.PortName as desti","outgoing_master a",
			 "INNER JOIN ms_airline e ON a.Airlines=e.AirLineCode
			  LEFT JOIN ms_port b on b.PortCode=a.Origin
			  LEFT JOIN ms_port c on c.PortCode=a.Destination
			  LEFT JOIN ms_flight d on a.FlightNumbDate1=d.FlightID
			  INNER JOIN consol f ON a.NoSMU=f.MasterNo
			  WHERE a.StatusProses IN(2,3) AND a.Airlines ='$airlines' group by d.FlightNo"),
        );  
      $this->load->view('pages/booking/cargo/replace_release',$data);	  
}

function getStatus(){
		$tgl=$this->input->post('tgl');
		$destination=$this->input->post('destination');
		$status_smu=$this->input->post('status_smu');
      $result=$this->model_app->getdata('outgoing_master a',
	  "INNER JOIN ms_port b on a.Destination=b.PortCode  
	  WHERE a.StatusProses='$status_smu' AND LEFT(a.ETD,10)='$tgl' GROUP BY b.PortCode ASC");
	  
	echo'<option value="">Choose Destination</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->Destination.'">'.$data->PortName.' - '.$data->PortCode.'</option>';
		
		}	
	}  
}

function filter_flightNo(){
		$airline=$this->input->post('airline');
		
      $result=$this->model_app->getdata('ms_flight a',
	  "INNER JOIN ms_airline b on a.AirLine=b.AirLineCode  
	  WHERE a.AirLine='$airline'");
	  
	echo'<option value="">Pilih Nomor Flight</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->FlightID.'">'.$data->FlightNo.'</option>';
		
		}	
	}  
}
function getStokSMU(){
		$airline=$this->input->post('airline');
		
      $result=$this->model_app->getdata('stock_smu a',
	  "INNER JOIN ms_airline b on a.AirLineCode=b.AirLineCode  
	  WHERE a.AirLineCode='$airline'");
	  
	//echo'<option value="">Pilih Nomor SMU</option>';
	if($result)
	{
	foreach($result as $data){
	//echo'<option value="'.$data->NoSMU.'">'.$data->NoSMU.'</option>';
	
	$dt=array(
	   'aa'=>$data->NoSMU,
	   'bb'=>$data->AirLineCode
	);
		$mydata[]=$dt;
		}
		
	}  echo json_encode($mydata);
}
function filter_flightNo2(){
	$airline=$this->input->post('airline');
	$origin=$this->input->post('origin');
	$desti=$this->input->post('desti');
		$etd=new DateTime($this->input->post('etd'));
		$hari='a.'.$etd->format('l');
		
      $result=$this->model_app->getdata('ms_flight a',
	  "INNER JOIN ms_airline b on a.AirLine=b.AirLineCode  
	  WHERE $hari='1' AND AirLine='$airline' AND Origin='$origin' AND Destination='$desti'");
	  
	echo'<option value="">Pilih Nomor Flight</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->FlightID.'">'.$data->FlightNo.'</option>';
		
		}	
	}  
}
	
	
function getsubMasterrrrrrrrr(){
	$tgl=$this->input->post('tgl');
	$destination=$this->input->post('destination');
	$status_smu=$this->input->post('status_smu');
	
      $result=$this->model_app->getdata('outgoing_master a',"WHERE Destination='$destination' AND StatusProses='$status_smu' AND LEFT(a.ETD,10)='$tgl' ORDER BY a.NoSMU ASC");
	  
	echo'<option value="">Pilih Nomor SMU</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->NoSMU.'">'.$data->NoSMU.'</option>';
		
		}	
	}
}
function filterSMU(){
	$tgl=$this->input->post('tgl');
	$destination=$this->input->post('destination');
	$status_smu=$this->input->post('status_smu');
	
      $result=$this->model_app->getdata('outgoing_master a',"WHERE a.Destination='$destination' AND LEFT(a.ETD,10)='$tgl' AND StatusProses IN(1,2) ORDER BY a.NoSMU ASC");
	  
	echo'<option value="">Pilih Nomor SMU</option>';
	if($result)
	{
	foreach($result as $data){
	echo'<option value="'.$data->NoSMU.'">'.$data->NoSMU.'</option>';
		
		}	
	}
}
function detail_cargo(){
	$flight=$this->input->post('flight');
	
    $data['header']=$this->model_app->getdatapaging("c.ETD,a.MasterNo,a.HouseNo,a.CWT,a.PCS,b.FlightNo,c.Origin,c.Destination,d.CustName as sender,e.CustName as receiver","consol a",
	"LEFT JOIN ms_flight b on a.FlightNo=b.FlightID
	LEFT JOIN outgoing_house c on a.HouseNo=c.HouseNo
	LEFT JOIN ms_customer d on c.Shipper=d.CustCode
	LEFT JOIN ms_customer e on c.Consigne=e.CustCode
	WHERE a.FlightNo='$flight' ORDER BY a.FlightNo ASC LIMIT 1");
	
    $data['smu']=$this->model_app->getdatapaging("a.MasterNo,a.PCS,a.CWT,c.StatusProses","consol a",
	"LEFT JOIN ms_flight b on a.FlightNo=b.FlightID
	INNER JOIN outgoing_master c on a.MasterNo=c.NoSMU
	WHERE a.FlightNo='$flight' AND c.StatusProses in(2,3) ORDER BY a.FlightNo ASC");
		  
	$this->load->view('pages/booking/cargo/detail_release',$data);
}

function filter_release(){
	$tgl=$this->input->post('etd');
	$flihgtno=$this->input->post('flihgtno');
    $data['smu']=$this->model_app->getdatapaging("a.NoSMU,a.CWT,a.PCS,b.PortName as desti","outgoing_master a",
	"LEFT JOIN ms_port b on a.Destination=b.PortCode
	WHERE LEFT(a.ETD,10)='$tgl' AND a.FlightNumbDate1='$flihgtno' AND a.StatusProses >=2 ORDER BY a.NoSMU ASC");
	  
	$this->load->view('pages/booking/cargo/replace_release',$data);
}
function getDetailMaster(){
	$nosmu=$this->input->post('nosmu');
	$smu=$this->input->post('smu');
       // $list = $this->model_app->getdata('outgoing_master a',"WHERE NoSMU ='$nosmu' AND Consolidation='0'");
        $list = $this->model_app->subsmu($nosmu,$smu);

		$data = array();
		foreach ($list as $datalist){
			
			$row = array(
            'NoSMU' => $datalist->NoSMU,
            'JobNo' => $datalist->JobNo,
            'ETD' =>$datalist->ETD,
			'PCS' =>$datalist->PCS,
			'CWT' =>$datalist->CWT,
			'destination' =>$datalist->destination,
			'origin' =>$datalist->origin,
			'limitcwt' =>$datalist->LimitCWT,
			'flightno' =>$datalist->flightno,
			'FlightID' =>$datalist->FlightID,
			);
			$data[] = $row;		
		}
		echo json_encode($data);
}
function cekprimary(){
	
	$smu=$this->input->post('smu');
       $list = $this->model_app->getdata('outgoing_master',"WHERE NoSMU ='$smu'");
        //$list = $this->model_app->subsmu($nosmu,$smu);

		$data = array();
		foreach ($list as $datalist){
			
			$row = array(
            'NoSMU' => $datalist->NoSMU,
            'confirmerror' => 'SMU duplicated !',
            'confirmsuccess' => 'Data oke!',
			);
			$data[] = $row;		
		}
		echo json_encode($data);
}
function getprefix(){
	$airline=$this->input->post('airline');
        $list =$this->model_app->getdata('ms_airline',"WHERE AirLineCode ='$airline'");

		$data = array();
		foreach ($list as $datalist){
			$row = array(
            'prefixsmu' => $datalist->PrefixSMU,
			'maximal' => $datalist->Maxcwt,
			
			);
			$data[] = $row;		
		}
		echo json_encode($data);
}
function geteta(){
	$flightno=$this->input->post('flightno');
        $list =$this->model_app->getdata('ms_flight',"WHERE FlightID ='$flightno'");

		$data = array();
		foreach ($list as $datalist){
			$row = array(
            'eta' => date('H:i:s',strtotime($datalist->Time)).' / '.date('H:i:s',strtotime($datalist->ETA)),
			'time' => date('H:i:s',strtotime($datalist->Time)),
			);
			$data[] = $row;		
		}
		echo json_encode($data);
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

	
  //     DATA TO SESSION
    function domestic_incoming_master(){
        $data = array(
            'title'=>'domestic_incoming_master',
            'scrumb_name'=>'domestic_incoming_master',
            'scrumb'=>'transaction/domestic_incoming_master',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
            'view'=>'pages/booking/incoming/incoming_house',
        );  
      $this->load->view('home/home',$data);
    }  

//=====================save cargo manifest ==========
 function edit_consol(){	
	 $nosmu=$this->input->post('nosmu');
	 $house=$this->input->post('house');
	 $cwt=$this->input->post('cwt');
	 $pacs=$this->input->post('pcs');
	 
 	 $delete=$this->model_app->delete_data('consol','HouseNo',$house);
	 $cekMaster=$this->model_app->getdata('outgoing_master',"WHERE NoSMU='$nosmu'");
	 if($cekMaster){
		 foreach($cekMaster as $row){
			$oldcwt=$row->CWT; 
			$oldpcs=$row->PCS;
		 }
	 }
	
//----- SAVE OF OUT GOING Master --------------////
	$updatehouse=array(
		'Consolidation' =>'0'
		);		
	$updatesmu=array(
		'CWT' =>$oldcwt-$cwt,
		'PCS' =>$oldpcs-$pacs
		);		
		$this->model_app->update('outgoing_house','HouseNo',$house,$updatehouse);
		$this->model_app->update('outgoing_master','NoSMU',$nosmu,$updatesmu);	
        $data = array(
            'title'=>'Consol SMU',
'freehouse'=>$this->model_app->getdatapaging("a.HouseNo,a.CodeShipper,a.PCS,a.CWT,b.CustName as sender,c.CustName as receiver","outgoing_house a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						 WHERE a.HouseStatus ='0' AND a.Consolidation='0'"),
			 'added'=>$this->model_app->getdatapaging("a.MasterNo,c.HouseNo,c.CodeShipper,c.CWT,c.PCS,d.CustName as sender,e.CustName as receiver","consol a",
			 "INNER JOIN outgoing_master b ON a.MasterNo=b.NoSMU 
			  INNER JOIN outgoing_house c on a.HouseNo=c.HouseNo
			  LEFT JOIN ms_customer d on d.CustCode=c.Shipper
			  LEFT JOIN ms_customer e on e.CustCode=c.Consigne
			 WHERE a.MasterNo ='$nosmu'"),
        );  
      $this->load->view('pages/booking/consol/consol_replace',$data);
	  			  
	}

	
function print_outgoing_master(){
	$kode=$this->uri->segment(3);
	$nohouse=$this->uri->segment(3);
	
	        $data = array(
            'title'=>'domestic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_house","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
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
// Save incoming house
function confirm_incoming_house(){
	  	$kodept=$this->session->userdata('company');
		$house=$this->input->post('house');
		
		$getHouse=$this->model_incoming->getHouseNo();
		$getjob=$this->model_incoming->getJob();
		$smu=$this->input->post('smu');
		$statusconsol=($smu=='0')?'0':3;
		$etd=$this->input->post('etd'); 		
		$kodetrans=$this->model_incoming->getKodeTrans($kodept,'IN','Notrans','incoming_house');	
	//====Save charges and items in every table refer to SMU number ==============//
	$pcs=$_POST['pcs'];	
	foreach($pcs as $key => $val)
	{
   		$pcs =$_POST['pcs'][$key];
        $p  =$_POST['p'][$key];
		$l  =$_POST['l'][$key];	
		$t  =$_POST['t'][$key];	
		$v  =$_POST['v'][$key];	
		$w  =$_POST['w'][$key];	
		$newitem=array(
		'Reff' =>$house,
		'NoPack'=>$pcs, 
		'Length'=>$p,
		'Width'=>$l,
		'Height'=>$t,
		'Volume'=>$v,
		'G_Weight'=>$w,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$newitem);
	}
	
	$idcharge=$_POST['idcharge'];	
	foreach($idcharge as $key => $val)
	{
   		$idcharge2 =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$totalcharges =$_POST['totalcharges'][$key];
		$newcharge=array(
		'JobNo' =>$house,
		'Reff'=>$house,
		'CostID'=>$idcharge2,
		'BusinessCode'=>$this->input->post('idsender'),
		'Currency'=>'Rp',
		'Qty'=>$qty,
		'Price'=>$unit,
		'Total'=>$totalcharges,
		'ChargeDetail'=>$desc,
		'ISPPN'=>'11111',
		'ISPPNValue'=>'12121212'
		);		
		 $this->model_app->insert('booking_charge',$newcharge);
}
		 
	//----- SAVE OF INCOMING HOUSE --------------////
	$OutHouse=array(
		'Notrans' =>$kodetrans,
		'HouseNo' =>$house,
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
		'GrossWeight' =>$this->input->post('t_weight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'Discount' =>$this->input->post('txtdiskon'),
		'PCS' =>$this->input->post('t_pacs'),
		'RemainPCS' =>$this->input->post('t_pacs'),		
		'CWT' =>$this->input->post('ori_cwt'),
		'RemainCWT' =>$this->input->post('ori_cwt'),
		'SpecialIntraction' =>$this->input->post('special'),
		'DeclareValue' =>$this->input->post('declare'),		
		'DescofShipment' =>$this->input->post('description'),
		'Attention' =>$this->input->post('attention'),
		'Discount'=>$this->input->post('txtdiskon'),
		'Consolidation'=>$statusconsol,
		'Amount' =>$this->input->post('txtgrandtotal'),
		'RemainAmount' =>$this->input->post('txtgrandtotal'),
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate'=>date('Y-m-d H:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>''
		);		
		 $this->model_app->insert('incoming_house',$OutHouse);	
		 
	//insert sekalian smu jika service PORT
	/*	if($smu !='0'){
		$insertsmu=array(
		'Notrans' =>$kodesmu,
		'NoSMU' =>$this->input->post('prefixsmu').'-'.$smu,
		'JobNo' =>$getjob,
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'Airlines' =>$this->input->post('airline'),
		'FlightNumbDate1' =>$this->input->post('flightno1'),
		//'FlightNumbDate2' =>$this->input->post('flightno2'),
		//'FlightNumbDate3' =>$this->input->post('flightno3'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('t_weight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'PCS' =>$this->input->post('t_pacs'),
		'Discount' =>$this->input->post('txtdiskon'),
		'LimitCWT' =>$this->input->post('limitcwt'),
		'Amount' =>$this->input->post('txtgrandtotal'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('ori_cwt'),
		'StatusProses' =>'3',
		'status_invoice'=>'2',
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);		
		$updatestoksmu=array(
			'isActive'=>'0',
		);		
		$insertconsol=array(
			'MasterNo' =>$this->input->post('prefixsmu').'-'.$smu,
			'FlightNo' =>$this->input ->post('flightno1'),
			'HouseNo'=>$getHouse, 
			'ConsolDesc'=>'',
			'CWT'=>$this->input->post('ori_cwt'),
			'PCS'=>$this->input->post('t_pacs'),
			);	
			$this->model_app->insert('consol',$insertconsol);
			$this->model_app->insert('outgoing_master',$insertsmu);
			$this->model_app->update('stock_smu','NoSMU',$smu,$updatestoksmu);
		
		}
*/		 
//redirect('transaction/domestic_outgoing_house');
//==============  print view in HTML   =======================//
            $data = array(
            'title'=>'domestic_incoming_house',
            'scrumb_name'=>'domestic_incoming_house',
			'houseno'=>$house,
			'jobno'=>$getjob, 
            'scrumb'=>'transaction/domestic_incoming_house',
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),			
			 'house'=>$this->model_app->getdatapaging("a.*,b.PortName as ori,c.PortName as desti,d.CustName as pengirim,d.Phone as ph1,d.Address as add1,e.CustName as penerima,e.Phone as ph2,e.Address as add2,f.CommName",
			 "incoming_house a",
			 "INNER JOIN ms_port b on a.Origin=b.PortCode
			 INNER JOIN ms_port c on a.Destination=c.PortCode
			 INNER JOIN ms_customer d on a.Shipper=d.CustCode
			 INNER JOIN ms_customer e on a.Consigne=e.CustCode
			 LEFT JOIN ms_commodity f on a.Commodity=f.CommCode
			 WHERE a.HouseNo='$house' ORDER BY a.HouseNo LIMIT 1"),
			
			'connote'=>$this->model_app->getdatapaging("*","incoming_house","where HouseNo='$house' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where Reff='$house' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charge a","inner join ms_charge b on a.CostID=b.ChargeCode where a.Reff='$house' ORDER BY a.Reff ASC"),
            'view'=>'pages/booking/incoming/confirm_incoming_house',
        );  
        ob_start();
   
 			$this->load->view('home/home',$data);
    
    }  
//     DATA TO PDF
 function update_outgoing_master(){
		$notrans=$this->input->post('notrans');
		$etd=$this->input->post('etd');
	//----- SAVE OF OUT GOING Master --------------////
	$update=array(
		'NoSMU' =>$this->input->post('smu'),
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'FlightNumbDate1' =>$this->input->post('flightno1').'/'.$this->input->post('flightdate1'),
		'FlightNumbDate2' =>$this->input->post('flightno2').'/'.$this->input->post('flightdate2'),
		'FlightNumbDate3' =>$this->input->post('flightno3').'/'.$this->input->post('flightdate3'),
		'Airlines' =>$this->input->post('airline'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'Commodity' =>$this->input->post('commodity'),
		'SpecialIntraction' =>$this->input->post('spesial'),
		'CWT' =>$this->input->post('cwt'),
		'GrossWeight' =>$this->input->post('t_weight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'PCS' =>$this->input->post('t_pacs'),
		'Discount' =>$this->input->post('txtdiskon'),
		'LimitCWT' =>$this->input->post('limitcwt'),
		'Amount' =>$this->input->post('txtgrandtotal'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'ModifiedBy' =>$this->session->userdata('idusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);		
		$this->model_app->update('outgoing_master','Notrans',$notrans,$update);
     redirect('transaction/domestic_outgoing_master');
    }
//    INsert Items
 function insert_book_items(){
		$house=$this->input->post('house');
	//----- insert items-------------////
	$insertdata=array(
	    'Reff' =>$this->input->post('house'),
		'NoPack' =>$this->input->post('pcs'),
		'Length' =>$this->input->post('panjang'),
		'Width' =>$this->input->post('lebar'),
		'Height' =>$this->input->post('tinggi'),
		'G_Weight' =>$this->input->post('weight'),
		'Volume' =>$this->input->post('volume'),
		);		
		 $save=$this->model_app->insert('booking_items',$insertdata);
		$data['items']=$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$house'");

 		$this->load->view('pages/booking/outgoing/ajax_items_edit',$data);
    } 
//    INsert Items
 function insert_book_items2(){
		$smu=$this->input->post('smu');
	//----- insert items-------------////
	$insertdata=array(
	    'Reff' =>$this->input->post('smu'),
		'NoPack' =>$this->input->post('pcs'),
		'Length' =>$this->input->post('panjang'),
		'Width' =>$this->input->post('lebar'),
		'Height' =>$this->input->post('tinggi'),
		'G_Weight' =>$this->input->post('weight'),
		'Volume' =>$this->input->post('volume'),
		);		
		 $save=$this->model_app->insert('booking_items',$insertdata);
		$data['items']=$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$smu'");

 		$this->load->view('pages/booking/outgoing_master/ajax_items_edit',$data);
    } 
//     DATA TO PDF
 function delete_book_items(){
		$house=$this->input->post('house');
		$kode=$this->input->post('kode');	
		$delete=$this->model_app->delete_data('booking_items','IdItems',$kode);
		 
		$data['items']=$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$house'");

 		$this->load->view('pages/booking/outgoing/ajax_items_edit',$data);
    } 
//     DATA TO PDF
 function delete_book_items2(){
		$smu=$this->input->post('smu');
		$kode=$this->input->post('kode');	
		$delete=$this->model_app->delete_data('booking_items','IdItems',$kode);
		 
		$data['items']=$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$smu'");

 		$this->load->view('pages/booking/outgoing_master/ajax_items_edit',$data);
    }  
//     DATA TO PDF
 function update_outgoing_house(){
		$houseno=$this->input->post('house');
		$etd=$this->input->post('etd');
		
	$delete=$this->model_app->delete_data('booking_charge','Reff',$houseno);
	$delete2=$this->model_app->delete_data('booking_items','Reff',$houseno);				
	//====insert items ==============//
	
	$pcs=$_POST['pcs'];	
	foreach($pcs as $key => $val)
	{
   		$pcs =$_POST['pcs'][$key];
        $p  =$_POST['p'][$key];
		$l  =$_POST['l'][$key];	
		$t  =$_POST['t'][$key];	
		$v  =$_POST['v'][$key];	
		$w  =$_POST['w'][$key];	
		$newitem=array(
		'Reff' =>$houseno,
		'NoPack'=>$pcs, 
		'Length'=>$p,
		'Width'=>$l,
		'Height'=>$t,
		'Volume'=>$v,
		'G_Weight'=>$w,
		'Date'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('booking_items',$newitem);
	}
	//==== INSSERT CHARGES ==============//	
	$idcharge=$_POST['idcharge'];	
	foreach($idcharge as $key => $val)
	{
   		$idcharge2 =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$totalcharges =$_POST['totalcharges'][$key];
		$newcharge=array(
		'JobNo' =>$houseno,
		'Reff'=>$houseno,
		'CostID'=>$idcharge2,
		'BusinessCode'=>$this->input->post('idsender'),
		'Currency'=>'Rp',
		'Qty'=>$qty,
		'Price'=>$unit,
		'Total'=>$totalcharges,
		'ChargeDetail'=>$desc,
		'ISPPN'=>'11111',
		'ISPPNValue'=>'12121212'
		);		
		 $this->model_app->insert('booking_charge',$newcharge);
	}
	//----- SAVE OF OUT GOING Master --------------////
	$update=array(
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		//'Origin' =>$this->input->post('origin'),
		//'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'CodeShipper' =>$this->input->post('codeship'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('ori_cwt'),
		'RemainCWT' =>$this->input->post('ori_cwt'),
		'GrossWeight' =>$this->input->post('t_weight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'Discount' =>$this->input->post('txtdiskon'),
		'PCS' =>$this->input->post('t_pacs'),
		'RemainPCS' =>$this->input->post('t_pacs'),
		'Amount' =>$this->input->post('txtgrandtotal'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'Attention' =>$this->input->post('attention'),
		'ModifiedBy' =>$this->session->userdata('idusr'),
		'ModifiedDate'=>date('Y-m-d H:i:s')
		);		
		$this->model_app->update('outgoing_house','HouseNo',$houseno,$update);
		redirect('outgoing_house');
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
	
	$kode=$this->input->post('NoSMU');
	$search=$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN invoice c on a.NoSMU=c.Reff
	WHERE a.NoSMU='$kode' ORDER BY a.CreatedDate DESC LIMIT 1");
	foreach($search as $row){
	$PayCode=$row->PayCode;
	
	if($PayCode=="CRD-CREDIT"){
	$view='print_outgoing_credit';
	 } 
	 else 
	 {
	$view='print_outgoing_cash';
	 }
	$data=array(
     'title'=>'Invoice Cash',
     'header'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Shipper=b.CustCode
	 INNER JOIN invoice c on a.NoSMU=c.Reff
	 INNER JOIN ms_port d on a.Origin=d.PortCode
	WHERE a.NoSMU='$kode' ORDER BY a.CreatedDate DESC LIMIT 1"),
	
	'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Consigne=b.CustCode
	WHERE a.NoSMU='$kode' ORDER BY a.CreatedDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"WHERE a.NoSMU='$kode'
	ORDER BY a.CreatedDate DESC"),
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
	$kode=$this->input->post('NoSMU2');
	$kode2=$this->input->post('NoSMU');
	$search=$this->model_app->getdatapaging("*","outgoing_master",
	"WHERE NoSMU='$kode' ORDER BY CreatedDate DESC LIMIT 1");
	foreach($search as $row){
	$PayCode=$row->PayCode;
	
	if($PayCode=="CRD-CREDIT"){
	$view='print_outgoing_credit';
	 } 
	 else 
	 {
	$view='print_outgoing_cash';
	 }
	$data=array(
     'title'=>'laporan jurnal',
     'header'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Shipper=b.CustCode
	WHERE a.NoSMU='$kode' OR a.NoSMU='$kode2' ORDER BY a.CreatedDate DESC LIMIT 1"),
	
	'consigne'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"INNER JOIN ms_customer b on a.Consigne=b.CustCode
	WHERE a.NoSMU='$kode' OR a.NoSMU='$kode2' ORDER BY a.CreatedDate DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","outgoing_master a",
	"WHERE a.NoSMU='$kode' OR a.NoSMU='$kode2'
	ORDER BY a.CreatedDate DESC"),
	'invoice'=>$getInvoice
	);
	$insert_invoice=array(
		'InvoiceNo' =>$getInvoice,
		'Reff' =>$kode,
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate' =>date('Y-m-d H:i:s'),
		'InvoiceStatus' =>'1'
		);
		$updatemaster=array(
		'status_invoice'=>'1'
		);	
		$this->model_app->update('outgoing_master','NoSMU',$kode,$updatemaster);	
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
//==============  Save charges and items inevery table refer to SMU number ======//
	$nohouse=$this->input->post('house');
        $data = array(
            'title'=>'domestic_incoming_master',
			'connote'=>$this->model_app->getdatapaging("*","outgoing_house","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
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
			'connote'=>$this->model_app->getdatapaging("*","outgoing_house","WHERE HouseNo ='$nohouse' LIMIT 1"),
			'shipper'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Shipper WHERE a.HouseNo ='$nohouse' LIMIT 1"),
			'consigne'=>$this->model_app->getdatapaging("*","outgoing_house a","INNER JOIN ms_customer b on b.custCode=a.Consigne WHERE a.HouseNo ='$nohouse' LIMIT 1"),
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
  function SOA(){	
 		$data=array(
		'title'=>' SOA',
		'link'=>'<a href="'.base_url().'transaction/soa">SOA</a>',
		'customer'=>$this->model_app->getdata('ms_customer a',
		"INNER JOIN outgoing_house b on a.CustCode=b.Shipper WHERE b.PayCode='CRD-CREDIT'  GROUP BY a.CustCode"),
		
		'view'=>'pages/booking/soa/input_SOA',
		);
	$this->load->view('home/home',$data);
 }
 function filter_soa(){
        $idcust=$this->input->post('idcust');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		
		$data['list']=$this->model_app->getdatapaging("a.*,b.CustName as sender,b.Address as address1,b.Phone as phone1,c.Phone as phone2,c.Address as address2,c.CustName as receiver,d.PortName as ori,e.PortName as desti,f.MasterNo as NoSMU",
	 "outgoing_house a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	 LEFT JOIN consol f on a.HouseNo=f.HouseNo
	WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust' AND a.PayCode='CRD-CREDIT'
	GROUP BY f.HouseNo
		");	 
/*	WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust' AND a.PayCode='CRD-CREDIT' AND a.PaymentStatus='0' AND a.RemainAmount >'0'
*/	
        $this->load->view('pages/booking/soa/tabel_SOA',$data);
}
//   DATA TO PDF 
function print_SOA(){
	    $idcust=$this->input->post('customers');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		
		$data['title']='SOA';
	    $data['houseno']=$getHouse;
			
		$currency=$this->input->post('currency');
		$data=array(
		'etd1'=>$etd1,
		'etd2'=>$etd2,
	    'list'=>$this->model_app->soadetail($idcust),
	    'cust'=>$this->model_app->getdatapaging("*","outgoing_house a",
	            "INNER JOIN ms_customer b on b.CustCode=a.Shipper
				WHERE a.Shipper='$idcust' LIMIT 1"),
				);
	//WHERE a.RemainAmount > 0 AND a.Shipper='$idcust' LIMIT 1"),
	
/*	$data['view']='pages/booking/soa/report_SOA';
	$this->load->view('pages/booking/soa/report_SOA',$data);*/
	$this->load->view('pages/booking/soa/report_SOA',$data);
}
/*function print_SOAaaaaaa(){
	
	    $idcust=$this->input->post('customers');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		$currency=$this->input->post('currency');
	
		$data=array(
		'list'=>$$this->model_app->getdatapaging("a.*,b.CustName as sender,c.CustName as receiver,d.PortName as ori,e.PortName as desti",
	 "outgoing_house a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust'"),
	
		'cust'=>$this->model_app->getdata("outgoing_house a",
				"INNER JOIN ms_customer b on b.CustCode=a.Shipper
				WHERE a.Shipper='$idcust' LIMIT 1"),
		'idcust'=>$idcust,
		'etd1'=>$etd1,
		'etd2'=>$etd2,
		'currency'=>$currency
		);
		
        ob_start();
        $content = $this->load->view('pages/booking/soa/report_SOA');
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('L', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Report SOA.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }
}  
*/
function getcost(){
	$code = $_GET['plane'];
	
	   $cari=$this->model_app->getdata('ms_airline',"WHERE AirLineCode='$code'");
	   $data=$this->
	   
	     $query = "SELECT kd_barang, nm_barang, harga FROM barang WHERE kd_barang='$kd_barang'";
    	$sql = mysqli_query($conn, $query);
    	$row = mysqli_fetch_assoc($sql);
    	echo json_encode($row);
    	exit;
		
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
public function ajax_detailSMU()
	{
		$kode=$this->input->post('smu');
		$status=$this->input->post('status');
		$status_smu=($status=='consol')?'detail_smu':'detail_smu_direct';
		
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.Origin,a.Destination,a.ETD,a.NoSMU,a.ETD,a.PayCode,a.Service,b.AirLineName,a.FlightNumbDate1,c.CustName as sender,d.CustName as receiver,e.PortName as ori,f.PortName as desti,g.FlightNo",
	"outgoing_master a",
	"LEFT JOIN ms_airline b on a.Airlines=b.AirLineCode
	 LEFT JOIN ms_customer c on a.Shipper=c.CustCode
	 LEFT JOIN ms_customer d on a.Consigne=d.CustCode
	 LEFT JOIN ms_port e on a.Origin=e.PortCode
	 LEFT JOIN ms_port f on a.Destination=f.PortCode
	 LEFT JOIN ms_flight g on a.FlightNumbDate1=g.FlightID
	WHERE a.NoSMU='$kode'"),
	
	'smu'=>$this->model_app->getdatapaging("b.Origin,b.Destination,b.ETD,a.ConsolID,a.CWT,a.PCS,b.HouseNo,b.BookingNo,c.CustName as shipper,d.CustName as consigne,e.PortName as ori,f.PortName as desti","consol a",
	"INNER JOIN outgoing_house b on a.HouseNo=b.HouseNo
	 LEFT JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN ms_customer d on d.CustCode=b.Consigne
	 LEFT JOIN ms_port e on e.PortCode=b.Origin
	 LEFT JOIN ms_port f on f.PortCode=b.Destination
	WHERE a.MasterNo='$kode'")
	);
	$this->load->view('pages/booking/consol/'.$status_smu,$data);	
}
public function remove_house_direct(){
		$house=$this->input->post('house');
		$smu=$this->input->post('smu');
		
		$search=$this->model_app->getdatapaging("a.CWT,a.PCS,b.ConsoledPCS,b.ConsoledCWT,b.RemainCWT,b.RemainPCS,a.HouseNo,c.CWT as smu_CWT,c.PCS smu_PCS","consol a",
	"INNER JOIN outgoing_house b on a.HouseNo=b.HouseNo
	INNER JOIN outgoing_master c on a.MasterNo=c.NoSMU
	WHERE a.HouseNo='$house' AND a.MasterNo='$smu'");
	
		foreach($search as $row){
			$consolpcs=$row->ConsoledPCS;
			$consolcwt=$row->ConsoledCWT;
			$remainpcs=$row->RemainPCS;
			$remaincwt=$row->RemainCWT;
			$pcs=$row->PCS;
			$cwt=$row->CWT;
			if($remaincwt >=1){
			$RealRemainPCS=$remainpcs + $pcs;
			$RealRemainCWT=$remaincwt + $cwt;
			$RealConsolPCS=$consolpcs-$pcs;
			$RealConsolCWT=$consolcwt-$cwt;
			} else {
			$RealRemainPCS=$remainpcs + $pcs;
			$RealRemainCWT=$remaincwt + $cwt;
			$RealConsolPCS=$consolpcs-$pcs;
			$RealConsolCWT=$consolcwt-$cwt;
			}
			$statusconsol=($consolcwt - $cwt <=0)?'0':'1'; //jika consoled cwt dihouse jdi 0 maka status consolidation=0 agar bisa diedit selain itu brrti house masih terkait dgn SMU lain maka house blm bisa di edit selama consoledcwt or pcs blm kososng
			$smu_CWT=$row->smu_CWT;
			$smu_PCS=$row->smu_PCS;	
		}
		
		if($search){
		$updatehouse=array(
		'Consolidation'=>$statusconsol,
		'ConsoledCWT'=>$RealConsolCWT,
		'ConsoledPCS'=>$RealConsolPCS,
		'RemainCWT'=>$RealRemainCWT,
		'RemainPCS'=>$RealRemainPCS,
		);
		$updatesmu=array(
		'StatusProses'=>'1',
		'CWT'=>$smu_CWT-$cwt,
		'PCS'=>$smu_PCS-$pcs
		);
		$update=$this->model_app->update('outgoing_house','HouseNo',$house,$updatehouse);
		        $this->model_app->update('outgoing_master','NoSMU',$smu,$updatesmu);
		if($update){	
		$this->model_app->delete_multi_condition('consol',$kolom=array('HouseNo'=>$house,'MasterNo'=>$smu));
		}
	}
	//redirect('transaction/outgoing_consolidation');
}
	
public function ajax_detailHouse()
	{
		$kode=$this->input->post('numb');
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.Origin,a.Destination,a.BookingNo,a.CWT,a.PCS,a.CodeConsigne,a.CodeShipper,a.HouseNo,a.ETD,a.PayCode,a.Service,c.CustName as sender,d.CustName as receiver,e.PortName as ori,f.PortName as desti",
	"outgoing_house a",
	"LEFT JOIN ms_customer c on a.Shipper=c.CustCode
	 LEFT JOIN ms_customer d on a.Consigne=d.CustCode
	 LEFT JOIN ms_port e on a.Origin=e.PortCode
	 LEFT JOIN ms_port f on a.Destination=f.PortCode
	WHERE a.HouseNo='$kode'"),
	
	'houses'=>$this->model_app->getdatapaging("a.MasterNo,b.BookingNo,a.HouseNo,a.PCS,a.CWT,c.CustName,b.Amount,d.ETD,e.FlightNo","consol a",
	"INNER JOIN outgoing_house b on a.HouseNo=b.HouseNo
	 INNER JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN outgoing_master d on d.NoSMU=a.MasterNo
	 LEFT JOIN ms_flight e on e.FlightID=d.FlightNumbDate1
	WHERE b.HouseNo='$kode'")
	);

	$this->load->view('pages/booking/consol/detail_house',$data);
		
	}
	//save jurnal credit
 function process_payment(){
     $kode=$this->model_app->generateNo("payment_house","JurnalNo","JRN");
 
	$customer=$this->input->post('customer');	
	$jumlah=$this->input->post('payment');	
	$grandtotal=$this->input->post('grandtotal');	
	$debit_amount=$jumlah > $grandtotal?$grandtotal:$jumlah;
	
	$lastbalance=$this->input->post('lastbalance');
	foreach($lastbalance as $key => $val)
	{
		$housecek=$_POST['nomorhouse'][$key];	
		
   $cari=$this->model_app->getdatapaging("HouseNo,CWT,PCS,Amount,RemainAmount","outgoing_house", "WHERE Shipper='$customer' AND HouseNo='$housecek' AND PaymentStatus='0' ORDER BY HouseNo asc");	 
		
	foreach($cari as $row){
    	$house=$row->HouseNo;
	   $amount=$row->RemainAmount;
 	 if ($jumlah >0) { 
	 	if($jumlah >$amount){
			$simpan=0;
			$bayar=$amount;
			$balance=0;
			$paymentstatus='1';
		} else {
			$simpan=$amount-$jumlah;	
			$bayar=$jumlah;
			$balance=$amount-$jumlah;
			$paymentstatus='0';
		}
		$jumlah=$jumlah-$amount;
		//echo $amount.' => '.$simpan.' Buat bayar '.$bayar.'<br>';
	 	$payment_detail=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-400-0-1-00',
		'House' =>$house,
		'Balance' =>$balance,
		'PaymentValue' =>$bayar,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$jurnal_credit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-400-0-1-00',
		'Debit' =>'0',
		'House' =>$house,
		'Credit' =>$bayar,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		$updatehouse=array(
		'RemainAmount'=>$balance,
		'PaymentStatus'=>$paymentstatus
		);
		$save_credit=$this->model_app->insert('jurnal',$jurnal_credit);
		$savedetail=$this->model_app->insert('payment_house_detail',$payment_detail);	
		$update=$this->model_app->update('outgoing_house','HouseNo',$house,$updatehouse);
			} 
		}
	}
	 	$jurnal_debit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>$this->input->post('accountheader'),
		'Debit' =>$debit_amount,
		'Credit' =>'0',
		'House' =>'',
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		$savedetail=$this->model_app->insert('jurnal',$jurnal_debit);
		
		//insert header payment
	 	$insertpayment=array(
		'JurnalNo' =>$kode,
		'PayDate' =>date('Y-m-d H:i:s'),
		'Rate' =>$this->input->post('rate'),
		'Currency' =>$this->input->post('paymentcurrency'),
		'Customer' =>$this->input->post('customer'),
		'TotalPayment' =>$this->input->post('payment'),
		'Remarks' =>$this->input->post('remarks2'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savepayment=$this->model_app->insert('payment_house',$insertpayment);	
				//redirect invoice
		$this->session->set_flashdata('my_flash_data', $kode);
		redirect('payment/invoice_payment');		
	}



}
