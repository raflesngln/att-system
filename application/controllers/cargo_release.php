<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_release extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','You Must Login First !');
            redirect('');
        };
		$this->load->model('mhouse');
		$this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list cargo_release';
		$data['scrumb_name']='Data cargo_release';
		$data['scrumb']='cargo_release';
		$data['airline']=$this->model_app->getdatapaging("*","ms_airline","ORDER BY AirLineName");
		$data['listcargo']=$this->model_app->getdatapaging("a.CargoReleaseCode,a.CargoDetails,a.ReleaseDate,b.AirLineName,d.FlightNo,sum(c.CWT) as jumcwt,sum(c.PCS) as jumpcs",
		"tr_cargo_release a",
			            "LEFT JOIN ms_airline b on b.AirLineCode=a.Airline
						 LEFT JOIN cargo_items c on c.CargoReleaseCode=a.CargoReleaseCode
						 LEFT JOIN ms_flight d on d.FlightID=c.FlightNumber
						 GROUP by c.CargoReleaseCode ORDER BY a.CargoReleaseCode DESC,b.AirLineName DESC");
		
		$data['flight']=$this->model_app->getdatapaging("FlightNumbDate1","outgoing_master","WHERE StatusProses <=2 GROUP BY FlightNumbDate1");
		$data['smu']=$this->model_app->getdatapaging("a.FlightNumbDate1,a.ETD,d.FlightID,d.FlightNo,a.NoSMU,a.PCS,a.CWT,b.PortName as ori,c.PortName as desti","outgoing_master a",
			            "LEFT JOIN ms_port b on b.PortCode=a.Origin
						 LEFT JOIN ms_port c on c.PortCode=a.Destination
						 LEFT JOIN ms_flight d on a.FlightNumbDate1=d.FlightID
						 WHERE a.StatusProses IN(2,3) group by d.FlightNo");
		$data['view']='pages/booking/cargo/cargo_release';
        $this->load->view('home/home',$data);
		
	}

public function listcargo()
	{
		$nm_tabel='tr_cargo_release a';
		$nm_tabel2='ms_airline b';
		$kolom1='a.Airline';
		$kolom2='b.AirLineCode';
		$select='a.CargoReleaseCode,a.CargoDetails,a.ReleaseDate,b.AirLineName,e.FlightNo,sum(d.CWT) as jumcwt,sum(d.PCS) as jumpcs';
		
        $nm_coloum= array('a.CargoReleaseCode','a.CargoReleaseCode','e.FlightNo','b.AirLineName','a.CargoDetails','d.CWT','d.PCS');
        $orderby= array('a.CargoReleaseCode' => 'ASC');
        $where=  array('a.CreatedBy'=>'2');
        $list = $this->mhouse->get_datatablecargo($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CargoReleaseCode' =>'<a href="#" onclick="listcargo(this);" class="text-pink">'. $datalist->CargoReleaseCode.'</a>',
            'CargoDetails' => $datalist->CargoDetails,
            'CWT' =>$datalist->jumcwt,
			'PCS' =>$datalist->jumpcs,
			'FlightNo' =>$datalist->FlightNo,
			'AirLineName' =>$datalist->AirLineName,
			
            'action'=> '<div class="text-center"><a target="new" href="'.base_url().'cargo_release/print_release/'.$datalist->CargoReleaseCode.'" title="Edit item"><i class="fa fa-print fa-2x"></i>
 </a>	
			</div>
					'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_consol($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filteredconsol($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function cargolist()
	{
		$nm_tabel='tr_cargo_release a';
		$nm_tabel2='ms_airline b';
		$kolom1='a.Airline';
		$kolom2='b.AirLineCode';
		$select='a.CargoReleaseCode,a.CargoReleaseCode,b.AirLineName,a.CargoDetails,a.PCS,a.CWT';

        $nm_coloum= array('a.CargoReleaseCode','a.CargoReleaseCode','a.AirLineName','b.CargoDetails','a.PCS','a.CWT');
        $orderby= array('a.CargoReleaseCode' => 'ASC');
        $where=  array('a.CreatedBy'=>'2');
        $list = $this->mhouse->get_datatablesconsol($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CargoReleaseCode' => $datalist->CargoReleaseCode,
            'CargoDetails' => $datalist->CargoDetails,
            'AirLineName' =>$datalist->AirLineName,
			'CWT' =>$datalist->jumcwt,
			'PCS' =>$datalist->jumpcs,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_data('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-edit bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_data('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-trash bigger-150"></i></a>
<a class="green" href="javascript:void()" title="Edit" onclick="edit_data2('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-edit bigger-150"></i></a>					'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_consol($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filteredconsol($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function ajax_edit()
	{
	   	$CargoReleaseCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->Mcargo->get_by_id($CargoReleaseCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='tr_cargo_release';
		$kode=$this->model_app->generateNo($nmtabel,"CargoReleaseCode","CR-");
		$data = array(
				'CargoDetails' => $this->input->post('CargoDetails'),
				'CargoReleaseCode' => $kode,
				'ReleaseDate' => $this->input->post('ReleaseDate'), 
				'CreatedBy' => $this->session->userdata('idusr'),
			);
		$insert = $this->Mcargo->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='tr_cargo_release';
        $key='CargoReleaseCode';
		$data = array(
				'CargoDetails' => $this->input->post('CargoDetails'),
				'CWT' => $this->input->post('cwt'),
			);
		$this->Mcargo->update(array($key => $this->input->post('CargoReleaseCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel'); $nmtabel2='cargo_items';
       $key    = $this->input->post('ckeytabel');
       
		$this->Mcargo->delete_by_id($id,$nmtabel,$key);
		$this->Mcargo->delete_by_id($id,$nmtabel2,$key);
		
		echo json_encode(array("status" => TRUE));
	}
	
//============================== NO DATATABLES===============================================//
function detail_list_cargo(){
	$cargocode=$this->input->post('cargocode');
	
    $data['header']=$this->model_app->getdatapaging("*","tr_cargo_release a",
	"LEFT JOIN ms_airline b on a.AirLine=b.AirLineCode
	WHERE a.CargoReleaseCode='$cargocode' ORDER BY a.CargoReleaseCode ASC LIMIT 1");
	
    $data['smu_list']=$this->model_app->getdatapaging("a.CWT,a.PCS,b.ETD,a.smu,c.FlightNo","cargo_items a",
	"LEFT JOIN outgoing_master b on a.smu=b.NoSMU
	 LEFT JOIN ms_flight c on b.FlightNumbDate1=c.FlightID
	WHERE a.CargoReleaseCode='$cargocode' ORDER BY a.smu ASC");
		  
	$this->load->view('pages/booking/cargo/list_detail_cargo',$data);
}

function print_release(){
	$cargocode=$this->uri->segment(3);
	//$nohouse=$this->uri->segment(3);
	
	        $data = array(
            'title'=>'release',
			'header'=>$this->model_app->getdatapaging("*","tr_cargo_release a",
	"LEFT JOIN ms_airline b on a.AirLine=b.AirLineCode
	WHERE a.CargoReleaseCode='$cargocode' ORDER BY a.CargoReleaseCode ASC LIMIT 1"),
	
			'smu_list'=>$this->model_app->getdatapaging("a.CWT,a.PCS,b.ETD,a.smu,c.FlightNo","cargo_items a",
	"LEFT JOIN outgoing_master b on a.smu=b.NoSMU
	 LEFT JOIN ms_flight c on b.FlightNumbDate1=c.FlightID
	WHERE a.CargoReleaseCode='$cargocode' ORDER BY a.smu ASC"),
        ); 
		ob_start();
		$content = $this->load->view('pages/booking/cargo/print_release',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('P', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('print_cargo_release.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}	
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
	$this->load->view('pages/booking/cargo/details/detail_smu',$data);	
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

	$this->load->view('pages/booking/cargo/details/detail_house',$data);
		
	}
	
}
