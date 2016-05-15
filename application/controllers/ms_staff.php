<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		  if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','You Must Login First !');
            redirect('');
        };
		$this->load->model('m_master_internal');
	}

	public function index()
	{  
       $data['title']='list Staff';
		$data['scrumb_name']='Data ms_staff';
	   $data['scrumb']='ms_staff';
		
		$data['view']='pages/staff/v_staff';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='ms_staff a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('a.empCode','a.empCode','a.empInitial','a.empName','a.Address','a.Phone','a.isActive','a.Remarks','','');
        $orderby= array('a.empCode' => 'desc');
        $where=  array();
        $list = $this->m_master_internal->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'empCode' => $datalist->empCode,
            'empName' => $datalist->empName,
            'Address' =>$datalist->Address,
			'empInitial' =>$datalist->empInitial,
			'Phone' =>$datalist->Phone,
			'isActive' =>$datalist->isActive,
			'Remarks' =>substr($datalist->Remarks,0,200),
			'status'=>'<div class="text-left">'.$status=($datalist->isActive >=1)?"<label class='label label-success arrowed-right white'>Yes</label>":"<label class='label label-important arrowed-right white'>No</label>".'</div>',
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_staff('."'".$datalist->empCode."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_staff('."'".$datalist->empCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_master_internal->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_internal->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function ajax_edit()
	{
	   	$empCode     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_master_internal->get_by_id($empCode,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='ms_staff';
		$data = array(
				'empName' => $this->input->post('empName'),
				'Address' => $this->input->post('Address'), 
				'empInitial' =>$this->input->post('empInitial'), 
				'Phone' =>$this->input->post('Phone'), 
				'isActive' =>$this->input->post('isActive'),
				'Remarks' =>$this->input->post('Remarks'), 
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_master_internal->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='ms_staff';
        $key='empCode';
		$data = array(
				'empName' => $this->input->post('empName'),
				'Address' => $this->input->post('Address'),
				'empInitial' =>$this->input->post('empInitial'), 
				'Phone' =>$this->input->post('Phone'), 
				'Remarks' =>$this->input->post('Remarks'), 
				'isActive' =>$this->input->post('isActive'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_master_internal->update(array($key => $this->input->post('empCode')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_master_internal->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
}
