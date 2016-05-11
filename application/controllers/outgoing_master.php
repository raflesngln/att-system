<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outgoing_master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mhouse');
		 $this->load->model('model_app');
	}

	public function index()
	{  
       $data['title']='list Master';
		$data['scrumb_name']='Data master';
		$data['scrumb']='cdatamaster';
		
		$data['view']='pages/customer/bank/ms_bank';
        $this->load->view('home/home',$data);
	}

public function ajax_list()
	{
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.CWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=  array('a.StatusProses <= '=>'3');
        $list = $this->mhouse->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => $datalist->NoSMU,
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
			'StatusProses' =>$datalist->StatusProses,

			'status'=>'<div class="text-left">'.$status=($datalist->CWT <= "1")?"<label class='label label-inverse arrowed-right white'>No</label>":"<label class='label label-warning arrowed-right white'>Remain</label>".'</div>',
		
            'action'=> '<div class="form-inline text-center"> <a onclick="return EditConfirm('.$datalist->StatusProses.')" href="'.base_url().'transaction/edit_outgoing_master/'.$datalist->NoSMU.'" title="Edit item"><button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
 </a>
				    <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="deleteOpenMaster('."'".$datalist->NoSMU."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>			
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function list_final()
	{
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.CWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=  array('a.StatusProses = '=>'4');
        $list = $this->mhouse->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => $datalist->NoSMU,
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
		
            'action'=> '<div class="form-inline">&nbsp;&nbsp;
<a class="green" href="javascript:void()" title="Edit" onclick="editFinal('."'".$datalist->NoSMU."'".')"><i class="icon-pencil bigger-150"></i></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function list_closed()
	{
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
       $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.CWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=  array('a.StatusProses = '=>'5');
        $list = $this->mhouse->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => $datalist->NoSMU,
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'FinalCWT' =>$datalist->FinalCWT,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
		
            'action'=> '<div class="form-inline">&nbsp;&nbsp;
<a style="display:none" class="green" href="javascript:void()" title="Edit" onclick="ajax_edit('."'".$datalist->NoSMU."'".')"><i class="icon-pencil bigger-150"></i></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->mhouse->count_all2($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->mhouse->count_filtered2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function ajax_edit()
	{
	   	$NoSMU     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->mhouse->get_by_id($NoSMU,$nmtabel,$key);
		echo json_encode($data);
	}

	public function ajax_add()
	{   
	    $nmtabel='outgoing_master';
		$data = array(
				'BankName' => $this->input->post('BankName'),
				'BankCode' => $this->input->post('BankCode2'),
				'BankDesc' => $this->input->post('BankDesc'), 
				'CreatedBy' => $this->session->userdata('idusr'),
			);
		$insert = $this->mhouse->save($data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function updateCWT()
	{
	    $nmtabel='outgoing_master';
        $key='NoSMU';
		$data = array(
				'Remarks' => $this->input->post('remarks'),
				'FinalCWT' => $this->input->post('finalcwt'),
				'StatusProses' =>'5',
				'ModifiedBy' => $this->session->userdata('idusr'),
				'ModifiedDate' =>date('Y-m-d'),
			);
		$this->mhouse->update(array($key => $this->input->post('smuno')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->mhouse->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
	//=========oteher =====================//
function getStatus(){
		$filter=$this->input->post('filter');
		if($filter=='shipper'){
			$result=$this->model_app->getdatapaging("a.CustCode,a.CustName","ms_customer a","INNER JOIN outgoing_master b on a.CustCode=b.Shipper GROUP BY a.CustCode");
			echo'<option value="all">Choose Shipper</option>';
			foreach($result as $data){
			echo'<option value="'.$data->CustCode.'">'.$data->CustName.'</option>';
					}	
	
		} else if($filter=='destination') {
			$result=$this->model_app->getdatapaging("a.PortCode,a.PortName","ms_port a","INNER JOIN outgoing_master b on a.PortCode=b.Destination GROUP BY a.PortCode");
			echo'<option value="all">Choose Destination</option>';
			foreach($result as $data){
			echo'<option value="'.$data->PortCode.'">'.$data->PortName.'</option>';
					}
		} 
	}
function filter_final(){
		$status=$this->input->post('status');
		$status2=$this->input->post('status2');
		$start=$this->input->post('start');
		$end=$this->input->post('end');
		
		if($status=="all" || $status2=="all"){
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.StatusProses='4' ORDER BY a.ETD DESC";
		} else {
			if($status=='shipper')
			{
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.Shipper='$status2' AND a.StatusProses='4' ORDER BY a.ETD DESC";
			} else {
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.Destination='$status2' AND a.StatusProses='4' ORDER BY a.ETD DESC";	
			}
		}
		$data = array(
'smufinal'=>$this->model_app->getdatapaging("a.NoSMU,a.ETD,a.PCS,a.CWT,a.StatusProses,a.Origin,a.Destination,b.CustName as sender,c.CustName as receiver,d.PortName as ori,e.PortName as desti","outgoing_master a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						LEFT JOIN ms_port d on d.PortCode=a.Origin
						LEFT JOIN ms_port e on e.PortCode=a.Destination
						WHERE $where"),
        );  
      $this->load->view('pages/booking/outgoing_master/filter_master_final',$data);	  
}	

function filter_closed(){
		$status=$this->input->post('status');
		$status2=$this->input->post('status2');
		$start=$this->input->post('start');
		$end=$this->input->post('end');
		
		if($status=="all" || $status2=="all"){
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.StatusProses='5' ORDER BY a.ETD ASC";
		} else {
			if($status=='shipper')
			{
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.Shipper='$status2' AND a.StatusProses='5' ORDER BY a.ETD ASC";
			} else {
			$where="LEFT(a.ETD,10) BETWEEN '$start' AND '$end' AND a.Destination='$status2' AND a.StatusProses='5' ORDER BY a.ETD ASC";	
			}
		}
		$data = array(
'smufinal'=>$this->model_app->getdatapaging("a.FinalCWT,a.NoSMU,a.ETD,a.PCS,a.CWT,a.StatusProses,a.Origin,a.Destination,b.CustName as sender,c.CustName as receiver,d.PortName as ori,e.PortName as desti","outgoing_master a",
			            "LEFT JOIN ms_customer b on b.CustCode=a.Shipper
						LEFT JOIN ms_customer c on c.CustCode=a.Consigne
						LEFT JOIN ms_port d on d.PortCode=a.Origin
						LEFT JOIN ms_port e on e.PortCode=a.Destination
						WHERE $where"),
        );  
      $this->load->view('pages/booking/outgoing_master/filter_master_closed',$data);	  
}	



	
	
}
