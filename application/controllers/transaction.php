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
function domesctic_outgoing_house(){
        $idusr=$this->session->userdata('idusr');
        $data = array(
            'title'=>'domesctic-outgoing-house',
            'scrumb_name'=>'Domesctic outgoing house',
            'scrumb'=>'transaction/domesctic_outgoing_house',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/domesctic_outgoing_house',
        );  
      $this->load->view('home/home',$data);
    }
function cargo_manifest(){
        $idusr=$this->session->userdata('idusr');
        $data = array(
            'title'=>'cargo_manifest Entry',
            'scrumb_name'=>'cargo_manifest Entry',
            'scrumb'=>'transaction/cargo_manifest',
            'payment_type'=>$this->model_app->getdatapaging("payCode,payName","ms_payment_type","ORDER BY payCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
			'outgoing_connote'=>$this->model_app->getdata('outgoing_connote',""),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/proses_outgoing_house',
        );  
      $this->load->view('home/home',$data);
    } 
//=====================save cargo manifest ==========
 function save_chargo_manifest(){	
 	
		$tgl=$this->input->post('tgl');
		$ref=$this->input->post('ref');
		$tuju=$this->input->post('tuju');
		$transit=$this->input->post('transit');
		$ket=$this->input->post('ket');
		$realisasi=$this->input->post('realisasi');
		$t_volume=$this->input->post('t_volume');
		$prefixcargo='CMO'.substr($tuju,0,3);
		
		//----- SAVE OF CARGO MANIFEST --------------////
		$kodecargo=$this->model_app->getCargoNo($prefixcargo);
		$insert_cargo=array(
		'CargoNo' =>$kodecargo,
		'tgl_cargo' =>$tgl,
		'referensi' =>$ref,
		'tujuan' =>$tuju,
		'transit' =>$transit,
		'keterangan' =>$ket,
		'realisasi_berat' =>$realisasi,
		'total_berat' =>$t_volume,
		'insert_date'=>date('Y-m-d:h-s-m'),
		'update_time'=>date('Y-m-d:h-s-m'),
		);		
		 $save=$this->model_app->insert('cargo_manifest',$insert_cargo);	
		
	//====Save items cargo ==============//
	$cnote=$_POST['cnote'];	
	foreach($cnote as $key => $val)
	{
   		$nohouse =$_POST['cnote'][$key];
		$HouseDate=$_POST['tgl2'][$key];
        $tujuan  =$_POST['tujuan'][$key];
		$jumlah  =$_POST['jml'][$key];	
		$berat  =$_POST['berat'][$key];	
		$jenis  =$_POST['jenis'][$key];	
		$layanan  =$_POST['layanan'][$key];	
		
		$items=array(
		'CargoNo' =>$kodecargo,
		'HouseNo'=>$nohouse,
		'HouseDate'=>$HouseDate,
		'Tujuan'=>$tuju,
		'Layanan'=>$layanan,
		'Jumlah'=>$jumlah,
		'Berat'=>$berat,
		'Jenis'=>$jenis,
		'date_insert'=>date('Y-m-d:h-s-m')
		);		
		 $this->model_app->insert('cargo_items',$items);
		 
		 //update status outgoing connote
		 $update=array(
		'status_proses'=>'1'
		);	
		$this->model_app->update('outgoing_connote','HouseNo',$nohouse,$update);
		}
		 $data=array(
		 'view'=>'pages/booking/confirm_create_manifest',
		 'no_cargo'=>$kodecargo
		 );
		 $this->load->view('home/home',$data);
		
    }
function edit_cargo_manifest(){
	$kode=$this->uri->segment(3);
	$data=array(
	'header'=>$this->model_app->getdatapaging("*","cargo_manifest a",
	"ORDER BY a.insert_date DESC LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("*","cargo_items a",
	"RIGHT JOIN cargo_manifest b on a.CargoNo=b.CargoNo
	RIGHT JOIN outgoing_connote c on a.HouseNo=c.HouseNo
	WHERE b.CargoNo='$kode'
	ORDER BY b.insert_date DESC"),
	'view'=>'pages/booking/edit_cargo_manifest',
	);
	
	$this->load->view('home/home',$data);
	
}
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
//// incoming house
 function domesctic_incoming_house(){
        $data = array(
            'title'=>'domesctic-incoming-house',
            'scrumb_name'=>'Domesctic incoming house',
            'scrumb'=>'transaction/domesctic_incoming_house',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/domesctic_incoming_house',
        );  
      $this->load->view('home/home',$data);
    }
   //     consolidation
    function outgoing_consolidation(){
        $data = array(
            'title'=>'outgoing_consolidation',
            'scrumb_name'=>'outgoing_consolidation',
            'scrumb'=>'transaction/outgoing_consolidation',
            'view'=>'pages/booking/outgoing_consolidation',
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

     //     DATA TO SESSION
    function domesctic_outgoing_master(){
        $data = array(
            'title'=>'domesctic-outgoing-master',
            'scrumb_name'=>'Domesctic outgoing master',
            'scrumb'=>'transaction/domesctic_outgoing_master',
             'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'view'=>'pages/booking/domesctic_outgoing_master',
        );  
      $this->load->view('home/home',$data);
    }
  //     DATA TO SESSION
    function domesctic_incoming_master(){
        $data = array(
            'title'=>'domesctic_incoming_master',
            'scrumb_name'=>'domesctic_incoming_master',
            'scrumb'=>'transaction/domesctic_incoming_master',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/domesctic_incoming_master',
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


//     DATA TO PDF
 function confirm_outgoing_house(){
		$getHouse=$this->model_app->getHouseNo();
		$getjob=$this->model_app->getJob();
			
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
		'Date'=>date('Y-m-d:h-s-m')
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
		'Date'=>date('Y-m-d:h-s-m')
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
		'ETD' =>date('Y-m-d h:s:m',$this->input->post('etd')),
		'Shipper' =>$this->input->post('idshipper'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idconsigne'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('grossweight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'grandPCS' =>$this->input->post('t_pacs'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>$this->input->post('cwt'),
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'Date'=>date('Y-m-d:h-s-m')
		);		
		 $this->model_app->insert('outgoing_connote',$OutHouse);	
//==============  print view in HTML   =======================//
        $data = array(
            'title'=>'domesctic_outgoing_house',
            'scrumb_name'=>'domesctic_outgoing_house',
			'houseno'=>$getHouse,
			'jobno'=>$getjob,
            'scrumb'=>'transaction/domesctic_outgoing_house',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
           // 'tmpcharge'=>$this->model_app->getdatapaging("*","temp_charges","ORDER BY tempChargeId"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
			'outgoing_connote'=>$this->model_app->getdatapaging("*","outgoing_connote","ORDER BY HouseNo ASC"),
			
			'connote'=>$this->model_app->getdatapaging("*","outgoing_connote","where HouseNo='$getHouse' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where HouseNo='$getHouse' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charges","where HouseNo='$getHouse' ORDER BY IdBooking ASC"),
			
			
            'view'=>'pages/booking/printview/confirm_outgoing_house',
        );  
        ob_start();
   
 			$this->load->view('home/home',$data);
    

    }  
	
//     DATA TO PDF
    function preview_outgoing_house(){
//==============  Save charges and items inevery table refer to SMU number =======================//
	$pcs=$_POST['pcs'];	
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
		'Date'=>date('Y-m-d:h-s-m')
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
		'Date'=>date('Y-m-d:h-s-m')
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
		'Date'=>date('Y-m-d:h-s-m')
		);		
		 $this->model_app->insert('out_going_house',$OutHouse);	
		 */
		/* DONT EXEDCUTE */
//==============  print view in PDF   =======================//
        $data = array(
            'title'=>'domesctic_incoming_master',
            'scrumb_name'=>'domesctic_incoming_master',
            'scrumb'=>'transaction/domesctic_incoming_master',
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("cyCode,cyName","ms_city","ORDER BY cyName"),
            'commodity'=>$this->model_app->getdatapaging("commCode,Name","ms_commodity","ORDER BY Name ASC"),
            'view'=>'pages/booking/printview/printview_outgoing_house',
        );  
        ob_start();
        $content = $this->load->view('pages/booking/printview/printview_outgoing_house',$data);
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


     // $this->load->view('pages/booking/printview/printview_outgoing_house',$data);
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


