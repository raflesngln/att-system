<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outgoing_house extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','You Must Login First !');
            redirect('');
        };
		$this->load->model('mhouse');
	}

public function index()
	{  
       $idusr=$this->session->userdata('idusr');
		$page=$this->uri->segment(3);
      	$limit=20;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data = array(
            'title'=>'outgoing_house',
            'link'=>'<a href="'.base_url().'outgoing_house">outgoing house</a>',
           'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
			'airline'=>$this->model_app->getdata('ms_airline',""),
			'citycust'=>$this->model_app->getdata('ms_city',""),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE IsShipper ='1' ORDER BY CustCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE IsCnee ='1' ORDER BY CustCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortCode"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
			'chargeoptional'=>$this->model_app->getdatapaging("ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='0' ORDER BY ChargeName"),
			'chargedefault'=>$this->model_app->getdatapaging("ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='1' ORDER BY ChargeName"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
            'connote'=>$this->model_app->getdatapaging("a.HouseNo,a.ETD,a.Consolidation,a.PayCode,a.Service,b.CustName as shipper,d.PortName as origin,e.PortName as desti",
			"outgoing_house a",
			"INNER JOIN ms_customer b on a.Shipper=b.CustCode
			 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
			 LEFT JOIN ms_port d on a.Origin=d.PortCode
			 LEFT JOIN ms_port e on a.Destination=e.PortCode
			 WHERE a.Consolidation in(0,1) 
			 ORDER BY a.HouseNo DESC LIMIT $offset,$limit"),
            'view'=>'pages/booking/outgoing/outgoing_house',
        );  
			$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_house","ORDER BY HouseNo DESC");
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

        $this->load->view('home/home',$data);

	}

public function ajax_list()
	{
		$nm_tabel='outgoing_house a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.Consolidation,a.HouseNo','a.HouseNo','a.ETD','b.CustName','a.Consigne','a.Origin','e.PortName','a.PCS','a.CWT','a.ConsoledCWT');
        $orderby= array('HouseNo' => 'DESC');
        $where=  array('a.Consolidation <= '=>'1');
        $list = $this->mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' =>'<a href="#" onclick="detailhouse(this);">'.$datalist->HouseNo.'</a>',
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'Service' =>$datalist->Service,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
			
			'status'=>'<div class="text-left">'.$status=($datalist->ConsoledCWT >=1)?"<label class='label label-warning arrowed-right white'>Remain</label>":"<label class='label label-inverse arrowed-right white'>No</label>".'</div>',
            
			'action'=> '<div class="form-inline text-center"> 
	 <span class="form-inline"> 
	 <form action="'.base_url().'connote_print" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="'.$datalist->HouseNo.'" name=" houseno" />
                                                  <button class="btn btn-mini btn-success " type="submit"><i class="fa fa-print bigger-120"></i></button>
<a onclick="return EditConfirm('.$datalist->ConsoledCWT.')" href="'.base_url().'transaction/edit_outgoing_house/'.$datalist->HouseNo.'" title="Edit item"><button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
 </a>
					<a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="delete_opened('."'".$datalist->HouseNo."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>
												  </form>
												  </span>
				
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function list_closed()
	{
		$nm_tabel='outgoing_house a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.HouseNo','a.HouseNo','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT');
        $orderby= array('a.HouseNo' => 'ASC');
        $where=  array('a.Consolidation >= '=>'2');
        $list = $this->mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' =>'<a href="#" onclick="detailhouseclosed(this);">'.$datalist->HouseNo.'</a>',
            'ori' =>$datalist->ori,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			 
            'action'=> '<div class="form-inline">
	<form action="'.base_url().'connote_print" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="'.$datalist->HouseNo.'" name=" houseno" />
                                                  <button class="btn btn-mini btn-success " type="submit"><i class="fa fa-print bigger-120"></i></button>
				
		 <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="delete_person5('."'".$datalist->HouseNo."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function filter_list_closed()
	{
		$ab=$this->uri->segment(3);
		$pecah=explode("_", $ab);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];

		if($kriteria=='startwith'){
		$kondisi=array($kategori.' LIKE'=>$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.Consolidation >= '=>'2');	
		}
		$nm_tabel='outgoing_house a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
		$nm_coloum= array('a.HouseNo','a.HouseNo','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT');
        $orderby= array('a.HouseNo' => 'ASC');
       $where=  $kondisi;
        $list = $this->mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' =>'<a href="#" onclick="detailhouseclosed(this);">'.$datalist->HouseNo.'</a>',
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
		
            'action'=> '<div class="form-inline">
	<form action="'.base_url().'connote_print" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="'.$datalist->HouseNo.'" name=" houseno" />
                                                  <button class="btn btn-mini btn-success " type="submit"><i class="fa fa-print bigger-120"></i></button>
				
		 <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="delete_person5('."'".$datalist->HouseNo."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function ajax_edit()
	{
	   	$BankCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->mhouse->get_by_id($BankCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='ms_bank';
		$data = array(
				'BankName' => $this->input->post('BankName'),
				'BankCode' => $this->input->post('BankCode2'),
				'BankDesc' => $this->input->post('BankDesc'), 
				'CreatedBy' => $this->session->userdata('idusr'),
			);
		$insert = $this->mhouse->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='ms_bank';
        $key='BankCode';
		$data = array(
				'BankName' => $this->input->post('BankName'),
				'BankDesc' => $this->input->post('BankDesc'),
			);
		$this->mhouse->update(array($key => $this->input->post('BankCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->mhouse->delete_by_id($id,$nmtabel,$key);
		$this->mhouse->delete_by_id($id,"booking_items","Reff");
		$this->mhouse->delete_by_id($id,"booking_charge","Reff");
		echo json_encode(array("status" => TRUE));
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

	$this->load->view('pages/booking/outgoing/details/detail_house',$data);
		
	}
public function ajax_detailSMU()
	{
		$kode=$this->input->post('smu');
		$status=$this->input->post('status');
		
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
	$this->load->view('pages/booking/outgoing/details/detail_smu',$data);	
}

// Save outgoing house
function confirm_outgoing_house(){
	  $kodejurnal=$this->model_app->generateNo("payment_house","JurnalNo","JRN");
	  	$kodept=$this->session->userdata('company');
		$getHouse=$this->model_app->getHouseNo();
		$getjob=$this->model_app->getJob();
		$smu=$this->input->post('smu');
		$statusconsol=($smu=='0')?'0':3;
		$etd=$this->input->post('etd'); 		
		$kodesmu=$this->model_app->getKodeTrans($kodept,'OM','Notrans','outgoing_master');
		$kodetrans=$this->model_app->getKodeTrans($kodept,'OH','Notrans','outgoing_house');
				
	//====Looping pcs for save in items booking ==============//
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
		'Reff' =>$getHouse,
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
	//====Looping charge for save in bookinng charges n jurnal ==============//	
	$idcharge=$_POST['idcharge'];	
	foreach($idcharge as $key => $val)
	{
   		$idcharge2 =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$subcharges =$_POST['totalcharges'][$key];
		$kd_account=$_POST['Reff_Account'][$key];
		
		$newcharge=array(
		'JobNo' =>$getHouse,
		'Reff'=>$getHouse,
		'CostID'=>$idcharge2,
		'BusinessCode'=>$this->input->post('idsender'),
		'Currency'=>'Rp',
		'Qty'=>$qty,
		'Price'=>$unit,
		'Total'=>$subcharges,
		'ChargeDetail'=>$desc,
		'ISPPN'=>'11111',
		'ISPPNValue'=>'12121212'
		);		
		$jurnal_kredit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kodejurnal,
		'kdac' =>$kd_account,
		'house' =>$getHouse,
		'Debit' =>'0',
		'Credit' =>$subcharges,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		 $this->model_app->insert('booking_charge',$newcharge);
		 $kredit=$this->model_app->insert('jurnal',$jurnal_kredit);
}
		$jurnal_debit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kodejurnal,
		'kdac' =>'1-01-101-0-1-00',
		'Debit' =>$this->input->post('txtgrandtotal'),
		'Credit' =>'0',
		'house' =>$getHouse,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		$debit=$this->model_app->insert('jurnal',$jurnal_debit);
		 
	//----- SAVE OF OUT GOING HOUSE --------------////
	$OutHouse=array(
		'Notrans' =>$kodetrans,
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
		 $this->model_app->insert('outgoing_house',$OutHouse);	
		 
		//insert header payment
	 	$insert_pay_house=array(
		'JurnalNo' =>$kodejurnal,
		'kdac' =>'1-01-101-0-1-00',
		'PayDate' =>date('Y-m-d H:i:s'),
		'Rate' =>'',
		'Currency' =>'',
		'Customer' =>$this->input->post('idsender'),
		'TotalPayment' =>$this->input->post('grandtotal'),
		'Remarks' =>$this->input->post('description'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savehousepay=$this->model_app->insert('payment_house',$insert_pay_house);

	//insert sekalian smu jika service PORT
		if($smu !='0'){
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
		 //redirect('transaction/domestic_outgoing_house');
//==============  print view in HTML   =======================//
            $data = array(
            'title'=>'domestic_outgoing_house',
            'scrumb_name'=>'domestic_outgoing_house',
			'houseno'=>$getHouse,
			'jobno'=>$getjob, 
            'scrumb'=>'transaction/domestic_outgoing_house',
			'link'=>'<a href="'.base_url().'outgoing_house">Outgoing House</a>',
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),			
			 'house'=>$this->model_app->getdatapaging("a.*,b.PortName as ori,c.PortName as desti,d.CustName as pengirim,d.Phone as ph1,d.Address as add1,e.CustName as penerima,e.Phone as ph2,e.Address as add2,f.CommName",
			 "outgoing_house a",
			 "INNER JOIN ms_port b on a.Origin=b.PortCode
			 INNER JOIN ms_port c on a.Destination=c.PortCode
			 INNER JOIN ms_customer d on a.Shipper=d.CustCode
			 INNER JOIN ms_customer e on a.Consigne=e.CustCode
			 LEFT JOIN ms_commodity f on a.Commodity=f.CommCode
			 WHERE a.HouseNo='$getHouse' ORDER BY a.HouseNo LIMIT 1"),
			 
			'connote'=>$this->model_app->getdatapaging("*","outgoing_house","where HouseNo='$getHouse' ORDER BY HouseNo ASC"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","where Reff='$getHouse' ORDER BY IdItems ASC"),
			'charges'=>$this->model_app->getdatapaging("*","booking_charge a","inner join ms_charge b on a.CostID=b.ChargeCode where a.Reff='$getHouse' ORDER BY a.Reff ASC"),
            'view'=>'pages/booking/outgoing/confirm_outgoing_house',
        );  
        ob_start();
   
 			$this->load->view('home/home',$data);
			
		
    
    }  






}
