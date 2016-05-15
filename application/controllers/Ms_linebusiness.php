<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ms_linebusiness extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
		$this->load->model('m_customer');
	}

	public function index()
	{  
       $data['title']='list ms_linebusiness';
		$data['scrumb_name']='Data ms_linebusinesse';
		$data['scrumb']='cdatamaster';
		
		$data['view']='pages/customer/linebusiness/ms_linebusiness';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='ms_linebusiness a';
		$nm_tabel2='ms_user b';
		$kolom1='a.CreatedBy';
		$kolom2='b.id_user';
		
        $nm_coloum= array('a.LineBusinessID','a.LineBusinessID','a.LineBusinesName','a.LineBusinessDesc','b.FullName');
        $orderby= array('a.LineBusinessID' => 'desc');
        $where=  array();
        $list = $this->m_customer->get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'LineBusinessID' => $datalist->LineBusinessID,
            'LineBusinesName' => $datalist->LineBusinesName,
            'LineBusinessDesc' =>$datalist->LineBusinessDesc,
			'FullName' =>$datalist->FullName,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_business('."'".$datalist->LineBusinessID."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_business('."'".$datalist->LineBusinessID."'".')"><i class="icon-trash bigger-150"></i></a>'
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
	   	$LineBusinessID     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_customer->get_by_id($LineBusinessID,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='ms_linebusiness';
		$data = array(
				'LineBusinesName' => $this->input->post('LineBusinesName'),
				'LineBusinessDesc' => $this->input->post('LineBusinessDesc'),
				'CreatedBy' => $this->session->userdata('idusr'),
				'CreatedDate'=>date('Y-m-d H:i:s'),
			);
		$insert = $this->m_customer->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update()
	{
	    $nmtabel='ms_linebusiness';
        $key='LineBusinessID';
		$data = array(
				'LineBusinesName' => $this->input->post('LineBusinesName'),
				'LineBusinessDesc' => $this->input->post('LineBusinessDesc'),
				'ModifiedBy'=>$this->session->userdata('idusr'),
				'ModifiedDate'=>date('Y-m-d H:i:s'),
			);
		$this->m_customer->update(array($key => $this->input->post('LineBusinessID')), $data,$nmtabel);
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
