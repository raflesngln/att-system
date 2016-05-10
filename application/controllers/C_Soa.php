<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_Soa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mdata');
		$this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list SOA';
		$data['scrumb_name']='Data SOA';
		$data['scrumb']='SOA';
		/* $data['smu']=$this->model_app->getdatapaging("a.NoSMU,a.PCS,a.CWT,b.PortName as ori,c.PortName as desti","outgoing_master a",
			            "LEFT JOIN ms_port b on b.PortCode=a.Origin
						LEFT JOIN ms_port c on c.PortCode=a.Destination
						 WHERE a.StatusProses ='2'");
						 */
		$data['view']='pages/booking/soa/soa';
		
        $this->load->view('home/home',$data);
		
	}

public function ajax_list()
	{
		$nm_tabel='tr_soa a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('a.SoaNo','a.SoaNo','a.SoaDesc','a.Customer','b.FullName');
        $orderby= array('a.SoaNo' => 'desc');
        $where=  array();
        $list = $this->mdata->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'SoaNo' => $datalist->SoaNo,
            'SoaDesc' => $datalist->SoaDesc,
            'Customer' =>$datalist->Customer,
			'FullName' =>$datalist->FullName,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_data('."'".$datalist->SoaNo."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_data('."'".$datalist->SoaNo."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mdata->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mdata->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function ajax_edit()
	{
	   	$SoaNo     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->mdata->get_by_id($SoaNo,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='tr_soa';
		$kode=$this->model_app->generateNo($nmtabel,"SoaNo","CR-");
		$data = array(
				'SoaDesc' => $this->input->post('SoaDesc'),
				'SoaNo' => $kode,
				'Customer' => $this->input->post('Customer'), 
				'CreatedBy' => $this->session->userdata('idusr'),
			);
		$insert = $this->mdata->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='tr_soa';
        $key='SoaNo';
		$data = array(
				'SoaDesc' => $this->input->post('SoaDesc'),
				'Customer' => $this->input->post('Customer'),
			);
		$this->mdata->update(array($key => $this->input->post('SoaNo')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->mdata->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
	
//============================== NO DATATABLES===============================================//
	
	
}
