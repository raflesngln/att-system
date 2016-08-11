<?php
class Outgoing_report extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
		$this->load->model('mhouse');
		$this->load->model('m_report_outgoing');
    }	

//   data outgoing_report
 function index(){
        $data = array(
            'title'=>'Outgoing Report',
			'link'=>'<a href="'.base_url().'outgoing_report">outgoing_report</a>',
			'user'=>$this->model_app->getdatapaging("*",
			"ms_user a",
			"Group by a.id_user ORDER BY a.UserName"),
            'view'=>'pages/booking/report/outgoing_report/v_report',
        );  
       $this->load->view('home/home',$data);
    }

public function report_house()
	{
		//filter view by 7 days last
		$date1 = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
		$date2=date('Y-m-d');
		
		$nm_tabel='outgoing_house a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.HouseNo','a.HouseNo','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT');
        $orderby= array('a.HouseNo' => 'ASC');
        $where=  array('a.Consolidation >= '=>'2','LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1);
        $list = $this->mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' =>'<a href="#" onclick="detailhouseclosed(this);">'.$datalist->HouseNo.'</a>',
            'ori_desti' =>$datalist->Origin.' - '.$datalist->Destination,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'paycode' => substr($datalist->PayCode,4),
			'Amount' =>'<div style="text-align:right">'.number_format($datalist->Amount,0,'.','.').'</div>',
			 
            'action'=> '<div class="form-inline">
	<form action="'.base_url().'connote_print" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="'.$datalist->HouseNo.'" name=" houseno" />
                                                  <button class="btn btn-mini btn-success " type="submit"><i class="fa fa-print bigger-120"></i></button>
				
		 <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="delete_person5('."'".$datalist->HouseNo."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>
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
public function report_master()
	{
				//filter view by 7 days last
		$date1 = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
		$date2=date('Y-m-d');
		
		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.CWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=  array('a.StatusProses <= '=>'3','LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1);
        $list = $this->m_report_outgoing->get_datatables_master($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
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
						"recordsTotal" => $this->m_report_outgoing->count_all_master($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_report_outgoing->count_filtered_master($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function filter_report_house()
	{
		$inputan=$this->uri->segment(3);
		$pecah=explode(":", $inputan);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$methode=$pecah[2];
		$user=$pecah[3];
			$iduser=explode("-",$user);
		$txtsearch=$pecah[4];
		$nmtabel=$pecah[5];
		

	if($methode=='' AND $user=='' AND $txtsearch ==''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1);
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.CreateBy'=>$iduser[0]);
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.CreateBy'=>$iduser[0],'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'a.CreateBy'=>$iduser[0],'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode);
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'a.CreateBy'=>$iduser[0]);
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'b.CustName LIKE '=>$txtsearch.'%');
	}
		
		$nm_tabel=$nmtabel.' a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.HouseNo','a.HouseNo','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT');
        $orderby= array('a.HouseNo' => 'ASC');
        $where=$query;
        $list = $this->mhouse->get_datatables2($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'HouseNo' =>'<a href="#" onclick="detailhouseclosed(this);">'.$datalist->HouseNo.'</a>',
            'ori_desti' =>$datalist->Origin.' - '.$datalist->Destination,
			'ETD' =>date('d-m-Y',strtotime($datalist->ETD)),
			'Service' =>$datalist->Service,
			'sender' =>$datalist->sender,
			'receiver' =>$datalist->receiver,
			'paycode' => substr($datalist->PayCode,4),
			'cwt' =>$datalist->CWT,
			'pcs' =>$datalist->PCS,
			'Amount' =>'<div style="text-align:right">'.number_format($datalist->Amount,0,'.','.').'</div>',
			 
            'action'=> '<div class="form-inline">
	<form action="'.base_url().'connote_print" method="post" target="new" class="text-left">
                                                   <input type="hidden" value="'.$datalist->HouseNo.'" name=" houseno" />
                                                  <button class="btn btn-mini btn-success " type="submit"><i class="fa fa-print bigger-120"></i></button>
				
		 <a style="display:none" class="red" href="javascript:void()" title="Hapus" onclick="delete_person5('."'".$datalist->HouseNo."'".')"><button class="btn btn-mini btn-danger" type="button"><i class="icon-trash bigger-150"></i></button></a>
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
public function filter_report_master()
	{
		$ab=$this->uri->segment(3);
		$pecah=explode("_", $ab);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$methode=$pecah[2];
		$user=$pecah[3];
		$txtsearch=$pecah[4];
		
		$pecahuser=explode('-',$user);
		$iduser=$pecahuser[0]; 
		$nmuser=$pecahuser[1];
		
	if($methode=='' AND $user=='' AND $txtsearch ==''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1);
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.CreatedBy'=>$iduser);
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.CreatedBy'=>$iduser,'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'a.CreatedBy'=>$iduser,'b.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode);
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'a.CreatedBy'=>$iduser);
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
	$query= array('LEFT(a.ETD,10) <= '=>$date2,'LEFT(a.ETD,10) >='=>$date1,'a.PayCode'=>$methode,'b.CustName LIKE '=>$txtsearch.'%');
	}

		$nm_tabel='outgoing_master a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.Shipper';
		$kolom2='b.CustCode';
		
        $nm_coloum= array('a.NoSMU','a.NoSMU','a.ETD','b.CustName','c.CustName','d.PortName','e.PortName','a.PCS','a.CWT','a.CWT');
        $orderby= array('a.NoSMU' => 'desc');
        $where=$query; 
        $list = $this->m_report_outgoing->get_datatables_master($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
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
						"recordsTotal" => $this->m_report_outgoing->count_all_master($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_report_outgoing->count_filtered_master($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

function print_report_house(){
	$user=$this->input->post('user');
	$pecah=explode('-',$user);
	$idusers=$pecah[0];
	$nmusers=($user=='')?'All User':$pecah[1];
	
	$nmtabel=$this->input->post('nmtabel');
	          $header_tittle=($nmtabel=='outgoing_house')?'OUTGOING HOUSE':'INCOMING HOUSE';
	$tgl1=$this->input->post('start2');
	$tgl2=$this->input->post('end2');
	$txtsearch=$this->input->post('txtshipper');
	$methode=$this->input->post('methode');
	$status=($methode=='')?'Cash & Credit':substr($methode,4);
	
	$realuser=($users =="")?' ':"AND a.CreateBy='$users'";
	$realmethode=($methode=="")?' ':"AND a.PayCode='$methode'";
	$search=($txtsearch=="")?' ':"AND b.CustName LIKE '$txtsearch%'";
	
		if($methode=='' AND $user=='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2'";
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND b.CustName LIKE '$txtsearch%'";
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreateBy='$idusers'";
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreateBy='$idusers' AND b.CustName LIKE '$txtsearch%'";		
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND a.CreateBy='$idusers' AND b.CustName LIKE '$txtsearch%'";
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode'";
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND a.CreateBy='$idusers'";
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND b.CustName LIKE '$txtsearch%'";
	}
	

			$outgoing=$this->model_app->getdatapaging("a.*,b.CustName as sender,c.CustName as receiver,d.UserName",
			"$nmtabel a",
			"LEFT JOIN ms_customer b on a.Shipper=b.CustCode
			LEFT JOIN ms_customer c on a.Consigne=c.CustCode
			LEFT JOIN ms_user d on a.CreateBy=d.id_user
			WHERE $where ");
			
	$data = array(
			'periode'=>date('d-m-Y',strtotime($tgl1)).'  s/d  '.date('d-m-Y',strtotime($tgl2)),
			'Methode'=>$status,
			'user'=>$nmusers,
			'tittle'=>$header_tittle,
			'jobtype'=>$header_tittle,
			'header'=>$this->model_app->getdatapaging("*","outgoing_house","LIMIT 1"),
			'list'=>$outgoing,
        );  
		
        ob_start();
        $content = $this->load->view('pages/booking/report/outgoing_report/print_report_house',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('house_report.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

}

function print_report_master(){
	$user=$this->input->post('user3');
	$pecah=explode('-',$user);
	$idusers=$pecah[0];
	$nmusers=($user=='')?'All User':$pecah[1];
	
	$tgl1=$this->input->post('start3');
	$tgl2=$this->input->post('end3');
	$txtsearch=$this->input->post('txtshipper3');
	$methode=$this->input->post('methode3');
	$status=($methode=='')?'Cash & Credit':substr($methode,4);
	
	$realuser=($users =="")?' ':"AND a.CreateBy='$users'";
	$realmethode=($methode=="")?' ':"AND a.PayCode='$methode'";
	$search=($txtsearch=="")?' ':"AND b.CustName LIKE '$txtsearch%'";
	
		if($methode=='' AND $user=='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2'";
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND b.CustName LIKE '$txtsearch%'";
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreatedBy='$idusers'";
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreatedBy='$idusers' AND b.CustName LIKE '$txtsearch%'";		
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND a.CreatedBy='$idusers' AND b.CustName LIKE '$txtsearch%'";
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode'";
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND a.CreatedBy='$idusers'";
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
		$where="LEFT(a.ETD,10) BETWEEN '$tgl1' AND '$tgl2' AND a.PayCode='$methode' AND b.CustName LIKE '$txtsearch%'";
	}
	

			$query=$this->model_app->getdatapaging("a.*,b.CustName,d.UserName",
			"outgoing_master a",
			"LEFT JOIN ms_customer b on a.Shipper=b.CustCode
			LEFT JOIN ms_user d on a.CreatedBy=d.id_user
			WHERE $where ");
			
	$data = array(
			'periode'=>date('d-m-Y',strtotime($tgl1)).'  s/d  '.date('d-m-Y',strtotime($tgl2)),
			'Methode'=>$status,
			'user'=>$nmusers,
			'tittle'=>'OUTGOING MASTER ',
			'jobtype'=>'Outgoing',
			'header'=>$this->model_app->getdatapaging("*","outgoing_master","LIMIT 1"),
			'list'=>$query,
        );  
        ob_start();
        $content = $this->load->view('pages/booking/report/outgoing_report/print_report_master',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('Master_report.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

}



}


