<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_address_type extends CI_Controller {

    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('m_customer');
        $this->load->helper('currency_format_helper');
		date_default_timezone_set("Asia/Jakarta"); 
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
		$nm_tabel='ms_address_type a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('a.AddressTypeCode','a.AddressTypeCode','a.AddressTypeName','a.AddressTypeDesc','b.FullName');
        $orderby= array('a.AddressTypeCode' => 'desc');
        $where=  array();
        $list = $this->m_customer->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'AddressTypeCode' => $datalist->AddressTypeCode,
            'AddressTypeName' => $datalist->AddressTypeName,
            'AddressTypeDesc' =>$datalist->AddressTypeDesc,
			'FullName' =>$datalist->FullName,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_person('."'".$datalist->AddressTypeCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_person('."'".$datalist->AddressTypeCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_customer->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_customer->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
		$data = $this->m_customer->get_by_id($AddressTypeCode,$nmtabel,$key);
		echo json_encode($data);
	}

public function ajax_add()
	{   
	    $nmtabel='ms_address_type';
		$data = array(
				'AddressTypeName' => $this->input->post('AddressTypeName'),
				'AddressTypeDesc' => $this->input->post('AddressTypeDesc'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_customer->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));

		
}

public function ajax_update()
	{
	    $nmtabel='ms_address_type';
        $key='AddressTypeCode';
		$data = array(
				'AddressTypeName' => $this->input->post('AddressTypeName'),
				'AddressTypeDesc' => $this->input->post('AddressTypeDesc'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_customer->update(array($key => $this->input->post('AddressTypeCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_customer->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
}
