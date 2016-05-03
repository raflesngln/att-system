<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cargo_release extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdata');
		$this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list cargo_release';
		$data['scrumb_name']='Data cargo_release';
		$data['scrumb']='cargo_release';
		$data['airline']=$this->model_app->getdatapaging("*","ms_airline","ORDER BY AirLineName");
		$data['flight']=$this->model_app->getdatapaging("FlightNumbDate1","outgoing_master","WHERE StatusProses <=2 GROUP BY FlightNumbDate1");
		$data['smu']=$this->model_app->getdatapaging("a.FlightNumbDate1,a.ETD,d.FlightID,d.FlightNo,a.NoSMU,a.PCS,a.CWT,b.PortName as ori,c.PortName as desti","outgoing_master a",
			            "LEFT JOIN ms_port b on b.PortCode=a.Origin
						 LEFT JOIN ms_port c on c.PortCode=a.Destination
						 LEFT JOIN ms_flight d on a.FlightNumbDate1=d.FlightID
						 WHERE a.StatusProses IN(2,3) group by d.FlightNo");
		$data['view']='pages/booking/cargo/cargo_release';
        $this->load->view('home/home',$data);
		
	}

public function ajax_list()
	{
		$nm_tabel='tr_cargo_release a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('a.CargoReleaseCode','a.CargoReleaseCode','a.CargoDetails','a.ReleaseDate','a.CWT','b.FullName');
        $orderby= array('a.CargoReleaseCode' => 'desc');
        $where=  array();
        $list = $this->Mdata->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CargoReleaseCode' => $datalist->CargoReleaseCode,
            'CargoDetails' => $datalist->CargoDetails,
            'ReleaseDate' =>$datalist->ReleaseDate,
			'FullName' =>$datalist->FullName,
			'CWT' =>$datalist->CWT,
			'CWT' =>$datalist->CWT,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_data('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-edit bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_data('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-trash bigger-150"></i></a>
<a class="green" href="javascript:void()" title="Edit" onclick="edit_data2('."'".$datalist->CargoReleaseCode."'".')"><i class="icon-edit bigger-150"></i></a>					'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Mdata->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Mdata->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
		$data = $this->Mdata->get_by_id($CargoReleaseCode,$nmtabel,$key);
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
		$insert = $this->Mdata->save($data,$nmtabel);
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
		$this->Mdata->update(array($key => $this->input->post('CargoReleaseCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel'); $nmtabel2='cargo_items';
       $key    = $this->input->post('ckeytabel');
       
		$this->Mdata->delete_by_id($id,$nmtabel,$key);
		$this->Mdata->delete_by_id($id,$nmtabel2,$key);
		
		echo json_encode(array("status" => TRUE));
	}
	
//============================== NO DATATABLES===============================================//
	
	
}
