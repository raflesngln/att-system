<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_address_type extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mdata');
	}

	public function index()
	{  
       $data['title']='list ms_address_type';
		$data['scrumb_name']='Data ms_address_type';
		$data['scrumb']='cdatamaster';
		
		$data['view']='pages/customer/ms_address_type/ms_address_type';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='ms_address_type';
        $nm_coloum= array('AddressTypeCode','AddressTypeCode','AddressTypeName','AddressTypeDesc');
        $orderby= array('AddressTypeCode' => 'desc');
        $where=  array();
        $list = $this->Mdata->get_datatables($nm_tabel,$nm_coloum,$orderby,$where);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'AddressTypeCode' => $datalist->AddressTypeCode,
            'AddressTypeName' => $datalist->AddressTypeName,
            'AddressTypeDesc' =>$datalist->AddressTypeDesc,
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_person('."'".$datalist->AddressTypeCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$datalist->AddressTypeCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Mdata->count_all($nm_tabel,$nm_coloum,$orderby),
						"recordsFiltered" => $this->Mdata->count_filtered($nm_tabel,$nm_coloum,$orderby,$where),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_edit()
	{
	   	$AddressTypeCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->Mdata->get_by_id($AddressTypeCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='ms_address_type';
		$data = array(
				'AddressTypeName' => $this->input->post('AddressTypeName'),
				'AddressTypeDesc' => $this->input->post('AddressTypeDesc'),
			);
		$insert = $this->Mdata->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='ms_address_type';
        $key='AddressTypeCode';
		$data = array(
				'AddressTypeName' => $this->input->post('AddressTypeName'),
				'AddressTypeDesc' => $this->input->post('AddressTypeDesc'),
			);
		$this->Mdata->update(array($key => $this->input->post('AddressTypeCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->Mdata->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
}
