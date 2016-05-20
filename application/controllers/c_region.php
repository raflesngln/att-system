<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_region extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_region');
		$this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list Region';
		$data['scrumb_name']='Data Region';
		$data['scrumb']='cdatamaster';
		
		$data['view']='pages/country/v_country';
        $this->load->view('home/home',$data);
	}

public function c_country()
	{
		$nm_tabel='ms_country a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('CountryCode','CountryCode','CountryName','Remarks','Remarks');
        $orderby= array('CountryCode' => 'desc');
        $where=  array();
        $list = $this->m_region->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CountryCode' => $datalist->CountryCode,
            'CountryName' => $datalist->CountryName,
            'Remarks' =>$datalist->Remarks,
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_country('."'".$datalist->CountryCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_country('."'".$datalist->CountryCode."'".')"><i class="icon-trash bigger-150"></i></a>'
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
	   	$CountryCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_region->get_by_id($CountryCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function country_add()
	{   
	    $nmtabel='ms_country';
		$data = array(
				'CountryName' => $this->input->post('CountryName'),
				'CountryCode' => $this->input->post('CountryCode'),
				'Remarks' => $this->input->post('Remarks'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_region->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function country_update()
	{
	    $nmtabel='ms_country';
        $key='CountryCode';
		$data = array(
				'CountryName' => $this->input->post('CountryName'),
				'Remarks' => $this->input->post('Remarks'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_region->update(array($key => $this->input->post('CountryCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_region->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
public function c_state()
	{
		$nm_tabel='ms_state a';
		$nm_tabel2='ms_country b';
		$kolom1='a.Country';
		$kolom2='b.CountryCode';
		
        $nm_coloum= array('a.StateCode','a.StateCode','a.StateName','b.CountryName','a.Remarks');
        $orderby= array('a.StateCode' => 'desc');
        $where=  array();
        $list = $this->m_region->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'StateCode' => $datalist->StateCode,
			'StateName' => $datalist->StateName,
            'CountryName' => $datalist->CountryName,
            'Remarks' =>$datalist->Remarks,
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_state('."'".$datalist->StateCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_state('."'".$datalist->StateCode."'".')"><i class="icon-trash bigger-150"></i></a>'
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

	public function state_edit()
	{
	   	$StateCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_region->get_by_id($StateCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function state_add()
	{   
	    $nmtabel='ms_state';
		$data = array(
				'StateName' => $this->input->post('StateName'),
				'StateCode' => $this->input->post('StateCode'),
				'Country' => $this->input->post('Country'),
				'Remarks' => $this->input->post('Remarks'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_region->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function state_update()
	{
	    $nmtabel='ms_state';
        $key='StateCode';
		$data = array(
				'StateName' => $this->input->post('StateName'),
				'Country' => $this->input->post('Country'),
				'Remarks' => $this->input->post('Remarks'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_region->update(array($key => $this->input->post('StateCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function state_delete()
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
				'CountryCode' =>$list->CountryCode,
				'CountryName' =>$list->CountryName,
				
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
function getState(){
	$country=$this->input->post('country');

      $result=$this->model_app->getdata('ms_state',"where Country='$country'");
	foreach($result as $list){
		$row = array(
				'StateCode' =>$list->StateCode,
				'StateName' =>$list->StateName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
	function getCity(){
	$country=$this->input->post('country');
	$state=$this->input->post('state');

      $result=$this->model_app->getdata('ms_city',"where Country='$country' AND State='$State'");
	foreach($result as $list){
		$row = array(
				'CityCode' =>$list->CityCode,
				'CityName' =>$list->CityName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}
public function c_city()
	{
		$nm_tabel='ms_city a';
		$nm_tabel2='ms_country b';
		$kolom1='a.Country';
		$kolom2='b.CountryCode';
		
        $nm_coloum= array('a.CityCode','a.CityCode','a.CityName','c.StateName','b.CountryName','b.CountryName');
        $orderby= array('a.CityCode' => 'desc');
        $where=  array();
        $list = $this->m_region->get_datatables_city($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		 
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CityCode' => $datalist->CityCode,
			'CityName' => $datalist->CityName,
            'CountryName' => $datalist->CountryName,
            'Remarks' =>$datalist->Remarks,
            'StateName' =>$datalist->StateName,
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="city_edit('."'".$datalist->CityCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="city_delete('."'".$datalist->CityCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_region->count_all_city($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_region->count_filtered_city($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function city_edit()
	{
	   	$StateCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_region->get_by_id($StateCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function city_add()
	{   
		$country=$this->input->post('Country');
		$nomor=$this->model_app->generateCity("ms_city","CityCode",$country);
	    $nmtabel='ms_city';
		$data = array(
				'CityCode' => $nomor,
				'CityName' => $this->input->post('CityName'),
				'State' => $this->input->post('State'),
				'Country' => $this->input->post('Country'),
				'Remarks' => $this->input->post('Remarks'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_region->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function city_update()
	{
	    $nmtabel='ms_city';
        $key='CityCode';
		$data = array(
				'CityName' => $this->input->post('CityName'),
				'State' => $this->input->post('State'),
				'Country' => $this->input->post('Country'),
				'Remarks' => $this->input->post('Remarks'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_region->update(array($key => $this->input->post('CityCode2')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function city_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_region->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}





}
