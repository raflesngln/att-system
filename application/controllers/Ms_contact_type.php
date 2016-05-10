<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_contact_type extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdata');
	}

	public function index()
	{  
       $data['title']='list ContactTypeCode';
		$data['scrumb_name']='Data ContactTypeCode';
		$data['scrumb']='cdatamaster';
		
		$data['view']='pages/customer/contact_type/ms_contact_type';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='ms_contact_type';
        $nm_coloum= array('ContactTypeCode','ContactTypeCode','ContactTypeName','ContactTypeDesc');
        $orderby= array('ContactTypeCode' => 'desc');
        $where=  array();
        $list = $this->Mdata->get_datatables($nm_tabel,$nm_coloum,$orderby,$where);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'ContactTypeCode' => $datalist->ContactTypeCode,
            'ContactTypeName' => $datalist->ContactTypeName,
            'ContactTypeDesc' =>$datalist->ContactTypeDesc,
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_person2('."'".$datalist->ContactTypeCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_person2('."'".$datalist->ContactTypeCode."'".')"><i class="icon-trash bigger-150"></i></a>'
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
	   	$ContactTypeCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->Mdata->get_by_id($ContactTypeCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='ms_contact_type';
		$data = array(
				'ContactTypeName' => $this->input->post('ContactTypeName'),
				'ContactTypeDesc' => $this->input->post('ContactTypeDesc'),
			);
		$insert = $this->Mdata->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='ms_contact_type';
        $key='ContactTypeCode';
		$data = array(
				'ContactTypeName' => $this->input->post('ContactTypeName'),
				'ContactTypeDesc' => $this->input->post('ContactTypeDesc'),
			);
		$this->Mdata->update(array($key => $this->input->post('ContactTypeCode')), $data,$nmtabel);
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
