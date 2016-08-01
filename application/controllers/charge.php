<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Charge extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_region');
		$this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list charge';
		$data['link']='<a href="'.base_url().'charge">Data charge</a>';
		$data['view']='pages/charge/v_charge';
        $this->load->view('home/home',$data);
	}

public function view_charge()
	{
		$nm_tabel='ms_charge a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('ChargeCode','ChargeName','DefaultCharge','HouseMethode','HouseMethode','');
        $orderby= array('ChargeCode' => 'desc');
        $where=  array();
        $list = $this->m_region->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'ChargeCode' => $datalist->ChargeCode,
            'ChargeName' => $datalist->ChargeName,
            'DefaultCharge' =>$status=($datalist->DefaultCharge=='0')?'NO':'YES',
			'HouseMethode' =>$status=($datalist->HouseMethode=='IN')?'INCOMING':'OUTGOING',
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_charge('."'".$datalist->ChargeCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_charge('."'".$datalist->ChargeCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_region->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_region->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit()
	{
	   	$ChargeCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_region->get_by_id($ChargeCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function charge_add()
	{   
	    $nmtabel='ms_charge';
		$data = array(
				'ChargeName' => $this->input->post('ChargeName'),
				'ChargeDetails' => $this->input->post('ChargeDetails'),
				'DefaultCharge' => $this->input->post('DefaultCharge'),
				'HouseMethode' => $this->input->post('HouseMethode'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_region->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function charge_update()
	{
	    $nmtabel='ms_charge';
        $key='ChargeCode';
		$data = array(
				'ChargeName' => $this->input->post('ChargeName'),
				'ChargeDetails' => $this->input->post('ChargeDetails'),
				'DefaultCharge' => $this->input->post('DefaultCharge'),
				'HouseMethode' => $this->input->post('HouseMethode'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_region->update(array($key => $this->input->post('ChargeCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function charge_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
		$this->m_region->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
function getCountry(){

      $result=$this->model_app->getdata('ms_country',"");
	foreach($result as $list){
		$row = array(
				'ChargeCode' =>$list->ChargeCode,
				'CountryName' =>$list->CountryName,
				
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
function getcharge(){
	$country=$this->input->post('country');

      $result=$this->model_app->getdata('ms_charge',"where Country='$country'");
	foreach($result as $list){
		$row = array(
				'chargeCode' =>$list->chargeCode,
				'chargeName' =>$list->chargeName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
	function getCity(){
	$country=$this->input->post('country');
	$charge=$this->input->post('charge');

      $result=$this->model_app->getdata('ms_city',"where Country='$country' AND charge='$charge'");
	foreach($result as $list){
		$row = array(
				'CityCode' =>$list->CityCode,
				'CityName' =>$list->CityName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}




}
