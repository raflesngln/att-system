<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outgoing_house extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mhouse');
	}

	public function index()
	{  
       $data['title']='list House';
		$data['scrumb_name']='Data House';
		$data['scrumb']='domestic_outgoing_house';
		
		$data['view']='pages/booking/outgoing/list_outgoing_house';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='outgoing_house a';
		
        $nm_coloum= array('a.HouseNo','a.BookingNo','a.PayCode','a.Service','a.Origin');
        $orderby= array('a.HouseNo' => 'desc');
        $where=  array();
        $list = $this->Mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' => $datalist->HouseNo,
            'BookingNo' => $datalist->BookingNo,
            'PayCode' =>$datalist->PayCode,
			'Origin' =>$datalist->Origin,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_person5('."'".$datalist->HouseNo."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_person5('."'".$datalist->HouseNo."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->Mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->Mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
		$data = $this->Mhouse->get_by_id($BankCode,$nmtabel,$key);
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
		$insert = $this->Mhouse->save($data,$nmtabel);
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
		$this->Mhouse->update(array($key => $this->input->post('BankCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->Mhouse->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
}
