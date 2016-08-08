<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Outgoing_master extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
		$this->load->model('m_master_outgoing');
		 $this->load->model('model_app');
	}

	public function index()
	{  
 $idusr=$this->session->userdata('idusr');
		$page=$this->uri->segment(3);
      	$limit=20;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
        $data = array(
            'title'=>'outgoing_master',
            'link'=>'<a href="'.base_url().'outgoing_master">outgoing master</a>',
            'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'shipper'=>$this->model_app->getdata('ms_customer',"WHERE isShipper ='1' ORDER BY custCode Desc"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE isCnee ='1' ORDER BY custCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortCode"),
			'citycust'=>$this->model_app->getdata('ms_city',""),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
			'airline'=>$this->model_app->getdatapaging("*","ms_airline","ORDER BY AirLineName"),
           // 'charges'=>$this->model_app->getdatapaging("chargeCode,Description","ms_charges","ORDER BY chargeCode"),
		'chargeoptional'=>$this->model_app->getdatapaging("ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='0' ORDER BY ChargeName"),
		'chargedefault'=>$this->model_app->getdatapaging("ChargeCode,ChargeName,ChargeDetails","ms_charge","WHERE DefaultCharge='1' ORDER BY ChargeName"),
     'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
        'master'=>$this->model_app->getdatapaging("a.NoSMU,a.StatusProses,a.FlightNumbDate1,a.PCS,a.CWT,a.ETD,a.Service,c.PortName as ori,d.PortName as desti,e.CustName as sender,f.CustName as receiver,a.PayCode","outgoing_master a",
			"LEFT join invoice b on a.NoSMU=b.Reff
			LEFT join ms_port c on a.Origin=c.PortCode
			LEFT join ms_port d on a.Destination=d.PortCode
			LEFT join ms_customer e on a.Shipper=e.CustCode
			LEFT join ms_customer f on a.Consigne=f.CustCode
			WHERE a.StatusProses IN(1,2,3)
			ORDER BY a.NoSMU DESC LIMIT $offset,$limit"),
            'view'=>'pages/booking/outgoing_master/outgoing_master',
        );  
			$tot_hal = $this->model_app->hitung_isi_tabel("*","outgoing_master","ORDER BY NoSMU DESC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'transaction/domestic_outgoing_master/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = '&laquo;';
			$config['last_link'] = '&raquo;';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
	        //STYLE PAGIN FOR BOOTSTRAP
		$config['full_tag_open'] = "<ul class='pagination'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
      	$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
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
        $list = $this->m_master_outgoing->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' =>'<a href="#" onclick="detailsmuopen(this);">'. $datalist->NoSMU.'</a>',
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
		
            'action'=> '<div class="form-inline text-center"> <a onclick="return EditConfirm('.$datalist->StatusProses.')" href="'.base_url().'outgoing_master/edit_outgoing_master/'.$datalist->NoSMU.'" title="Edit item"><button class="btn btn-mini btn-primary" type="button"><i class="fa fa-edit bigger-120"></i></button>
 </a>
				    <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="deleteOpenMaster('."'".$datalist->NoSMU."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>			
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_master_outgoing->count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_outgoing->count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
        $list = $this->m_master_outgoing->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => '<a href="#" onclick="detailsmufinal(this);">'. $datalist->NoSMU.'</a>',
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
						"recordsTotal" => $this->m_master_outgoing->count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_outgoing->count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
		
       $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.FinalCWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=  array('a.StatusProses = '=>'5');
        $list = $this->m_master_outgoing->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => '<a href="#" onclick="detailsmuclosed(this);">'. $datalist->NoSMU.'</a>',
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'FinalCWT' =>'<div class="text-left">'.$status=($datalist->FinalCWT > $datalist->CWT)?"<label class='badge badge-important white'>".$datalist->FinalCWT."</label>":"<label class='badge badge-success white'>".$datalist->FinalCWT."</label>".'</div>',
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
            'action'=> '<div class="form-inline">
<a style="display:none" class="green" href="javascript:void()" title="Edit" onclick="ajax_edit('."'".$datalist->NoSMU."'".')"><i class="icon-pencil bigger-150"></i></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_master_outgoing->count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_outgoing->count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function filterfinalsmu()
	{
		$inputan=$this->uri->segment(3);
		$pecah=explode("_", $inputan);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];
		
		if($kriteria=='startwith'){
		$kondisi=array($kategori.' LIKE'=>$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'4');	
		}
		
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
       $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.FinalCWT');
        $orderby= array('a.NoSMU' => 'desc');
       // $where=  array('a.StatusProses <= '=>$status,'a.PCS >= '=>$final,'c.CustName LIKE'=>$txtsearch.'%');
        $where=  $kondisi;
        $list = $this->m_master_outgoing->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => '<a href="#" onclick="detailsmufinal(this);">'. $datalist->NoSMU.'</a>',
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'FinalCWT' =>'<div class="text-left">'.$status=($datalist->FinalCWT > $datalist->CWT)?"<label class='badge badge-important white'>".$datalist->FinalCWT."</label>":"<label class='badge badge-success white'>".$datalist->FinalCWT."</label>".'</div>',
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
             'action'=> '<div class="form-inline">
<a class="green" href="javascript:void()" title="Edit" onclick="editFinal('."'".$datalist->NoSMU."'".')"><i class="icon-pencil bigger-150"></i></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_master_outgoing->count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_outgoing->count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function filterclosedsmu()
	{
		$inputan=$this->uri->segment(3);
		$pecah=explode("_", $inputan);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];
		
		if($kriteria=='startwith'){
		$kondisi=array($kategori.' LIKE'=>$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'a.ETD <= '=>$date2,'a.ETD >='=>$date1,'a.StatusProses = '=>'5');	
		}
		
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
       $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.FinalCWT');
        $orderby= array('a.NoSMU' => 'desc');
        //$where=  array('a.StatusProses = '=>'5');
        $where=  $kondisi;
        $list = $this->m_master_outgoing->get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'NoSMU' => '<a href="#" onclick="detailsmuclosed(this);">'. $datalist->NoSMU.'</a>',
            'ori' =>$datalist->ori,
			'desti' =>$datalist->desti,
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'FinalCWT' =>'<div class="text-left">'.$status=($datalist->FinalCWT > $datalist->CWT)?"<label class='badge badge-important white'>".$datalist->FinalCWT."</label>":"<label class='badge badge-success white'>".$datalist->FinalCWT."</label>".'</div>',
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
            'action'=> '<div class="form-inline">
<a style="display:none" class="green" href="javascript:void()" title="Edit" onclick="ajax_edit('."'".$datalist->NoSMU."'".')"><i class="icon-pencil bigger-150"></i></a>
			</div>
			'
			
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_master_outgoing->count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_master_outgoing->count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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
		$data = $this->m_master_outgoing->get_by_id($NoSMU,$nmtabel,$key);
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
		$insert = $this->m_master_outgoing->save($data,$nmtabel);
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
		$this->m_master_outgoing->update(array($key => $this->input->post('smuno')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}
	public function updateCWTfinal()
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
		$this->m_master_outgoing->update(array($key => $this->input->post('smuno')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}
	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_master_outgoing->delete_by_id($id,$nmtabel,$key);
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

public function ajax_detailSMU()
	{
		$kode=$this->input->post('smu');
		$status=$this->input->post('status');
		
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.Origin,a.Destination,a.ETD,a.StatusProses,a.NoSMU,a.ETD,a.PayCode,a.Service,b.AirLineName,a.FlightNumbDate1,a.FinalCWT,a.Remarks,c.CustName as sender,d.CustName as receiver,e.PortName as ori,f.PortName as desti,g.FlightNo",
	"outgoing_master a",
	"LEFT JOIN ms_airline b on a.Airlines=b.AirLineCode
	 LEFT JOIN ms_customer c on a.Shipper=c.CustCode
	 LEFT JOIN ms_customer d on a.Consigne=d.CustCode
	 LEFT JOIN ms_port e on a.Origin=e.PortCode
	 LEFT JOIN ms_port f on a.Destination=f.PortCode
	 LEFT JOIN ms_flight g on a.FlightNumbDate1=g.FlightID
	WHERE a.NoSMU='$kode'"),
	
	'smu'=>$this->model_app->getdatapaging("b.Origin,b.Destination,b.ETD,a.ConsolID,a.CWT,a.PCS,b.HouseNo,b.BookingNo,c.CustName as shipper,d.CustName as consigne,e.PortName as ori,f.PortName as desti","consol a",
	"INNER JOIN outgoing_house b on a.HouseNo=b.HouseNo
	 LEFT JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN ms_customer d on d.CustCode=b.Consigne
	 LEFT JOIN ms_port e on e.PortCode=b.Origin
	 LEFT JOIN ms_port f on f.PortCode=b.Destination
	WHERE a.MasterNo='$kode'")
	);
	$this->load->view('pages/booking/outgoing_master/details/detail_smu',$data);	
}
public function ajax_detailHouse()
	{
		$kode=$this->input->post('numb');
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.Origin,a.Destination,a.BookingNo,a.CWT,a.PCS,a.CodeConsigne,a.CodeShipper,a.HouseNo,a.ETD,a.PayCode,a.Service,c.CustName as sender,d.CustName as receiver,e.PortName as ori,f.PortName as desti",
	"outgoing_house a",
	"LEFT JOIN ms_customer c on a.Shipper=c.CustCode
	 LEFT JOIN ms_customer d on a.Consigne=d.CustCode
	 LEFT JOIN ms_port e on a.Origin=e.PortCode
	 LEFT JOIN ms_port f on a.Destination=f.PortCode
	WHERE a.HouseNo='$kode'"),
	
	'houses'=>$this->model_app->getdatapaging("a.MasterNo,b.BookingNo,a.HouseNo,a.PCS,a.CWT,c.CustName,b.Amount,d.ETD,e.FlightNo","consol a",
	"INNER JOIN outgoing_house b on a.HouseNo=b.HouseNo
	 INNER JOIN ms_customer c on c.CustCode=b.Shipper
	 LEFT JOIN outgoing_master d on d.NoSMU=a.MasterNo
	 LEFT JOIN ms_flight e on e.FlightID=d.FlightNumbDate1
	WHERE b.HouseNo='$kode'")
	);
	$this->load->view('pages/booking/outgoing_master/details/detail_house',$data);
	}
	
//=====================save cargo manifest ==========
 function confirm_outgoing_master(){	
 		$kodept=$this->session->userdata('company');
		$getjob=$this->model_app->getJobMaster();
		$getInvoice=$this->model_app->getInvoice();
		$kodetrans=$this->model_app->getKodeTrans($kodept,'OM','Notrans','outgoing_master');
		$NoSMU=$this->input ->post('prefixsmu').'-'.$this->input ->post('smu');
		$etd=$this->input->post('etd');
		
	//----- SAVE OF OUT GOING Master --------------////
	$insert=array(
		'Notrans' =>$kodetrans,
		'NoSMU' =>$NoSMU,
		'JobNo' =>$getjob,
		'BookingNo' =>$this->input->post('booking'),
		'PayCode' =>$this->input->post('paymentype'),
		'Service' =>$this->input->post('service'),
		'Origin' =>$this->input->post('origin'),
		'Destination' =>$this->input->post('desti'),
		'ETD' =>date($etd),
		'Shipper' =>$this->input->post('idsender'),
		'Airlines' =>$this->input->post('airline'),
		'FlightNumbDate1' =>$this->input->post('flightno1'),
		'FlightNumbDate2' =>$this->input->post('flightno1'),
		'FlightNumbDate3' =>$this->input->post('flightno1'),
		'CodeShipper' =>$this->input->post('codeship'),
		'Consigne' =>$this->input->post('idreceivement'),
		'CodeConsigne' =>$this->input->post('codesigne'),
		'Commodity' =>$this->input->post('commodity'),
		'GrossWeight' =>$this->input->post('t_weight'),
		'grandVolume' =>$this->input->post('t_volume'),
		'PCS' =>$this->input->post('t_pacs'),
		'Discount' =>$this->input->post('txtdiskon'),
		'LimitCWT' =>$this->input->post('limitcwt'),
		'Amount' =>$this->input->post('txtgrandtotal'),
		'SpecialIntraction' =>$this->input->post('special'),
		'CWT' =>'1',
		'StatusProses' =>'1',
		'status_invoice'=>'1',
		'DeclareValue' =>$this->input->post('declare'),
		'DescofShipment' =>$this->input->post('description'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);		
		$insert_invoice=array(
		'InvoiceNo' =>$getInvoice,
		'Reff' =>$NoSMU,
		'CreateBy' =>$this->session->userdata('idusr'),
		'CreateDate' =>date('Y-m-d H:i:s'),
		'InvoiceStatus' =>'1'
		);
		$save=$this->model_app->insert('invoice',$insert_invoice);
		 $this->model_app->insert('outgoing_master',$insert);	
		//=======  print view in HTML   ============//
        redirect('outgoing_master');		
}
 function edit_outgoing_master(){
        $idusr=$this->session->userdata('idusr');
		$houseno=$this->uri->segment(3);
        $data = array(
            'title'=>'domesctic-outgoing-master',
            'link'=>'<a href="'.base_url().'outgoing_master">Outgoing Master</a> / Edit master ( '.$houseno.' )',
            'payment_type'=>$this->model_app->getdatapaging("PayCode,PayName","ms_payment_type","ORDER BY PayCode ASC"),
            'sales'=>$this->model_app->getdata('ms_staff',"where devisi='sales'"),
            'cnee'=>$this->model_app->getdata('ms_customer',"WHERE IsCnee ='1' ORDER BY CustCode Desc"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
			'charge'=>$this->model_app->getdatapaging("*","ms_charge","WHERE DefaultCharge='0'"),
			'airline'=>$this->model_app->getdatapaging("*","ms_airline","ORDER BY AirLineName"),
			'chargeoptional'=>$this->model_app->getdatapaging("*","booking_charge a",
			"INNER JOIN ms_charge b on a.CostID=b.ChargeCode 
			 WHERE b.DefaultCharge='0' AND a.Reff='$houseno'"),
			'airfreight'=>$this->model_app->getdatapaging("*","booking_charge a","INNER JOIN ms_charge b on a.CostID=b.ChargeCode WHERE a.Reff='$houseno' AND b.ChargeCode='1'"),
			'cost_smu'=>$this->model_app->getdatapaging("*","booking_charge a","INNER JOIN ms_charge b on a.CostID=b.ChargeCode WHERE a.Reff='$houseno' AND b.ChargeCode='2'"),
     'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
     
	 'master'=>$this->model_app->getdatapaging("a.*,b.CustName as sender,b.Address as address1,b.Phone as phone1,c.Phone as phone2,c.Address as address2,c.CustName as receiver,d.PortName as ori,e.PortName as desti,f.AirLineName",
	 "outgoing_master a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	 LEFT JOIN ms_airline f on a.Airlines=f.AirlineCode
	 WHERE a.NoSMU='$houseno' ORDER BY a.NoSMU DESC"),
			//'list_charges'=>$this->model_app->getdatapaging("*","booking_charges","WHERE HouseNo ='$houseno'"),
			'items'=>$this->model_app->getdatapaging("*","booking_items","WHERE Reff ='$houseno'"),
            'view'=>'pages/booking/outgoing_master/edit_outgoing_master',
        );  
      $this->load->view('home/home',$data);
    }
	
	
	
	
}
