<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Incoming_house extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','You Must Login First !');
            redirect('');
        };
		$this->load->model('mhouse');
	}
//// incoming house
 function index(){
        $data = array(
            'title'=>'domesctic incoming house',
            'link'=>'<a href="'.base_url().'incoming_house">incoming house</a>',
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
						
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
            'view'=>'pages/booking/incoming/incoming_house',
        );  
      $this->load->view('home/home',$data);
    }

public function ajax_list()
	{
		$nm_tabel='incoming_house a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.Consolidation,a.HouseNo','a.HouseNo','a.ETD','b.CustName','a.Consigne','a.Origin','e.PortName','a.PCS','a.CWT','a.ConsoledCWT');
        $orderby= array('HouseNo' => 'DESC');
        $where=  array('a.Consolidation <= '=>'3');
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
<a onclick="return EditConfirm('.$datalist->ConsoledCWT.')" href="'.base_url().'transaction/edit_incoming_house/'.$datalist->HouseNo.'" title="Edit item"><button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
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
public function filter_list()
	{
		$ab=$this->uri->segment(3);
		$pecah=explode("_", $ab);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];

		if($kriteria=='startwith'){
		$kondisi=array($kategori.' LIKE'=>$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1);	
		}
		$nm_tabel='incoming_house a';
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
	"incoming_house a",
	"LEFT JOIN ms_customer c on a.Shipper=c.CustCode
	 LEFT JOIN ms_customer d on a.Consigne=d.CustCode
	 LEFT JOIN ms_port e on a.Origin=e.PortCode
	 LEFT JOIN ms_port f on a.Destination=f.PortCode
	WHERE a.HouseNo='$kode'"),
	
	'houses'=>$this->model_app->getdatapaging("a.MasterNo,b.BookingNo,a.HouseNo,a.PCS,a.CWT,c.CustName,b.Amount,d.ETD,e.FlightNo","consol a",
	"INNER JOIN incoming_house b on a.HouseNo=b.HouseNo
	 INNER JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN outgoing_master d on d.NoSMU=a.MasterNo
	 LEFT JOIN ms_flight e on e.FlightID=d.FlightNumbDate1
	WHERE b.HouseNo='$kode'"),
	
	
	'carge'=>$this->model_app->getdatapaging("*","booking_charge a",
	"INNER JOIN incoming_house b on a.HouseNo=b.Reff
	INNER JOIN ms_charge c on a.CostID=c.ChargeCode
	WHERE b.HouseNo='$kode'")

	);
	$this->load->view('pages/booking/incoming/details/detail_house',$data);
		
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
	"INNER JOIN incoming_house b on a.HouseNo=b.HouseNo
	 LEFT JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN ms_customer d on d.CustCode=b.Consigne
	 LEFT JOIN ms_port e on e.PortCode=b.Origin
	 LEFT JOIN ms_port f on f.PortCode=b.Destination
	WHERE a.MasterNo='$kode'")
	);
	$this->load->view('pages/booking/outgoing/details/detail_smu',$data);	
}
function getChargeOptional(){
      $result=$this->model_app->getdatapaging("ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='1' AND HouseMethode='IN' ORDER BY ChargeName");
	foreach($result as $list){
		$row = array(
				'ChargeCode' =>$list->ChargeCode,
				'ChargeName' =>$list->ChargeName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}

	
	
	
	
	
}
