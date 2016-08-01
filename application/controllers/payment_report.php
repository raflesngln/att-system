<?php
class Payment_report extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
		$this->load->model('m_payment');
		 $this->load->model('model_app');
    }
	//   data outgoing_report
 function index(){
        $data = array(
            'title'=>'ayment Report',
			'scrumb_name'=>'payment_report ',
			'scrumb'=>'payment_report',
			'user'=>$this->model_app->getdatapaging("*",
			"ms_user a",
			"Group by a.id_user ORDER BY a.UserName"),
            'view'=>'pages/booking/report/cash_report/v_report',
        );  
       $this->load->view('home/home',$data);
    }
public function daily_cash()
	{
		//filter view by 7 days last
		$date1 = date("Y-m-d", mktime(0,0,0,date("m"),date("d")-7,date("Y")));
		$date2=date('Y-m-d');
		
		$nm_tabel='payment_house a';
		$nm_tabel2='payment_house_detail b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		$select='a.JurnalNo,a.PayDate,a.Currency,a.Remarks,a.TotalPayment,b.PaymentValue,a.Rate,b.PaymentDate,c.CustName,d.PCS,d.CWT,d.Origin,d.Destination,d.PayCode,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo,e.HouseNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','a.TotalPayment');
        $orderby= array('b.PaymentDate' => 'desc');
        $where= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);
        $list = $this->m_payment->get_datatables_daily_cash($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'MasterNo' =>$datalist->MasterNo,
            'House' =>$datalist->HouseNo,
            'JurnalNo' => '<a href="#" onclick="detailPayment2(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'PCS' =>$datalist->PCS,
			'CWT' =>$datalist->CWT,
			'PayCode' =>$datalist->PayCode,
			'CustName' =>$datalist->CustName,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'<div align="right">0</div>':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'Amount' =>'<label style="float:right">'.number_format($datalist->Amount,0,'.','.').'</label>',
			'ori_desti' =>$datalist->Origin.' - '.$datalist->Destination,
			'PaymentValue'=>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'TotalPayment' =>'<label style="float:right">'.number_format($datalist->TotalPayment,0,'.','.').'</label>',
			'RemainAmount' =>'<label style="float:right">'.number_format($datalist->RemainAmount,0,'.','.').'</label>',
			
			'status' =>'<div class="text-left">'.$status=($datalist->RemainAmount =='0')?"<label class='label label-info arrowed-right white'>Settled</label>":"<label class='label label-warning arrowed-right white'>Not Settled</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_daily_cash($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_daily_cash($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function filter_daily_cash()
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
		$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);
		
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'c.CustName LIKE '=>$txtsearch.'%');
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'b.CreatedBy'=>$iduser);
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'b.CreatedBy'=>$iduser,'c.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
	$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'d.PayCode'=>$methode,'b.CreatedBy'=>$iduser,'c.CustName LIKE '=>$txtsearch.'%');
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
	$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'d.PayCode'=>$methode);
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
	$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'d.PayCode'=>$methode,'b.CreatedBy'=>$iduser);
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
	$query= array('LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1,'d.PayCode'=>$methode,'c.CustName LIKE '=>$txtsearch.'%');
	}

		$nm_tabel='payment_house a';
		$nm_tabel2='payment_house_detail b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		$select='a.JurnalNo,a.PayDate,a.Currency,a.Remarks,a.TotalPayment,b.PaymentValue,a.Rate,b.PaymentDate,c.CustName,d.PCS,d.CWT,d.Origin,d.Destination,d.PayCode,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo,e.HouseNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','a.TotalPayment');
        $orderby= array('b.PaymentDate' => 'desc');
        $where=  $query;
        $list = $this->m_payment->get_datatables_daily_cash($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'MasterNo' =>$datalist->MasterNo,
            'House' =>$datalist->HouseNo,
            'JurnalNo' => '<a href="#" onclick="detailPayment2(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'PayCode' =>$datalist->PayCode,
			'CustName' =>$datalist->CustName,
			'PCS' =>$datalist->PCS,
			'CWT' =>$datalist->CWT,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'<div align="right">0</div>':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'Amount' =>'<label style="float:right">'.number_format($datalist->Amount,0,'.','.').'</label>',
			'ori_desti' =>$datalist->Origin.' - '.$datalist->Destination,
			'PaymentValue'=>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'TotalPayment' =>'<label style="float:right">'.number_format($datalist->TotalPayment,0,'.','.').'</label>',
			'RemainAmount' =>'<label style="float:right">'.number_format($datalist->RemainAmount,0,'.','.').'</label>',
			
			'status' =>'<div class="text-left">'.$status=($datalist->RemainAmount =='0')?"<label class='label label-info arrowed-right white'>Settled</label>":"<label class='label label-warning arrowed-right white'>Not Settled</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_daily_cash($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_daily_cash($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}



function print_daily_cash(){
	$user=$this->input->post('user');
	$pecah=explode('-',$user);
	$idusers=$pecah[0];
	$nmusers=($user=='')?'All User':$pecah[1];
	
	$tgl1=$this->input->post('start2');
	$tgl2=$this->input->post('end2');
	$txtsearch=$this->input->post('txtshipper');
	$methode=$this->input->post('methode');
	$status=($methode=='')?'Cash & Credit':substr($methode,4);
	
	$realuser=($users =="")?' ':"AND a.CreateBy='$users'";
	$realmethode=($methode=="")?' ':"AND a.PayCode='$methode'";
	$search=($txtsearch=="")?' ':"AND b.CustName LIKE '$txtsearch%'";
	
		if($methode=='' AND $user=='' AND $txtsearch ==''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2'";
	} else if($methode=='' AND $user=='' AND $txtsearch !=''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND c.CustName LIKE '$txtsearch%'";
	} else if($methode=='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreatedBy='$idusers'";
	} else if($methode=='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND a.CreatedBy='$idusers' AND c.CustName LIKE '$txtsearch%'";		
	} else if($methode !='' AND $user !='' AND $txtsearch !=''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND d.PayCode='$methode' AND a.CreatedBy='$idusers' AND c.CustName LIKE '$txtsearch%'";
	} else if($methode !='' AND $user =='' AND $txtsearch ==''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND d.PayCode='$methode'";
	} else if($methode !='' AND $user !='' AND $txtsearch ==''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND d.PayCode='$methode' AND a.CreatedBy='$idusers'";
	} else if($methode !='' AND $user =='' AND $txtsearch !=''){
		$where="LEFT(a.PaymentDate,10) BETWEEN '$tgl1' AND '$tgl2' AND d.PayCode='$methode' AND c.CustName LIKE '$txtsearch%'";
	}
	

			$query=$this->model_app->getdatapaging("a.*,d.*,f.MasterNo,c.CustName as sender,e.UserName",
			"payment_house_detail a",
			"LEFT JOIN payment_house b on a.JurnalNo=b.JurnalNo
			LEFT JOIN ms_customer c on b.Customer=c.CustCode
			LEFT JOIN outgoing_house d on a.House=d.HouseNo
			LEFT JOIN ms_user e on a.CreatedBy=e.id_user
			LEFT JOIN consol f on d.HouseNo=f.HouseNo
			WHERE $where ");
			
	$data = array(
			'periode'=>date('d-m-Y',strtotime($tgl1)).'  s/d  '.date('d-m-Y',strtotime($tgl2)),
			'Methode'=>$status,
			'user'=>$nmusers,
			'tittle'=>'Daily Cash Report ',
			'jobtype'=>'Daily Cash Report',
			'header'=>$this->model_app->getdatapaging("*","outgoing_house","LIMIT 1"),
			'list'=>$query,
        );  
        ob_start();
        $content = $this->load->view('pages/booking/report/cash_report/print_daily_cash',$data);
        $content = ob_get_clean();      
        $this->load->library('html2pdf');
        try
        {
            $html2pdf = new HTML2PDF('P', 'A4', 'fr','100%');
            $html2pdf->pdf->SetDisplayMode('fullpage');
            $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
            $html2pdf->Output('daily_cash_report.pdf');
        }
        catch(HTML2PDF_exception $e) {
            echo $e;
            exit;
        }

}

public function ajax_edit()
	{
	   	$NoSMU     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_payment->get_by_id($NoSMU,$nmtabel,$key);
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
		$insert = $this->m_payment->save($data,$nmtabel);
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
		$this->m_payment->update(array($key => $this->input->post('smuno')), $data,$nmtabel);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete()
	{
	   $id     = $this->input->post('cid');
       $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
       
		$this->m_payment->delete_by_id($id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
	//=========oteher =====================//
public function ajax_detailPayment()
	{
	$kode=$this->input->post('numb');
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.JurnalNo,a.PayDate,b.PaymentDate,a.Currency,a.Rate,sum(b.PaymentValue) as total_pay,a.Remarks,b.House,c.CustName",
	"payment_house a",
	"LEFT JOIN payment_house_detail b on a.JurnalNo=b.JurnalNo
	 LEFT JOIN ms_customer c on a.Customer=c.CustCode
	 WHERE a.JurnalNo='$kode' LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("a.JurnalNo,a.PaymentDate,a.PaymentValue,a.House,d.Amount,d.RemainAmount,d.PaymentStatus",
	"payment_house_detail a",
	"INNER JOIN payment_house b on a.JurnalNo=b.JurnalNo
	 LEFT JOIN ms_customer c on b.Customer=c.CustCode
	 LEFT JOIN outgoing_house d on a.House=d.HouseNo
	WHERE a.JurnalNo='$kode'")
	);
	$this->load->view('pages/booking/payment/details/detail_payment',$data);	
}
//ajax for detail or history of payment House
public function ajax_detailHousePayment()
	{
	$house=$this->input->post('house');
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.*,b.CustName as sender,c.CustName as receive",
	"outgoing_house a",
	"LEFT JOIN ms_customer b on b.CustCode=a.Shipper
	LEFT JOIN ms_customer c on c.CustCode=a.Consigne
	 WHERE a.HouseNo='$house' LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("a.iddetail,a.Balance,a.JurnalNo,a.PaymentDate,a.PaymentValue,a.House,d.Amount,d.RemainAmount,d.PaymentStatus",
	"payment_house_detail a",
	"INNER JOIN payment_house b on a.JurnalNo=b.JurnalNo
	 LEFT JOIN ms_customer c on b.Customer=c.CustCode
	 LEFT JOIN outgoing_house d on a.House=d.HouseNo
	WHERE a.House='$house' ORDER BY a.iddetail asc")
	);
	$this->load->view('pages/booking/payment/details/detail_payment_house',$data);	
}



//     DATA TO paymrnt request
    function payment_request(){
        $data = array(
	  		'title'=>'payment_request',
			'scrumb_name'=>'payment_request',
			'scrumb'=>'payment/payment_request',
            'staff'=>$this->model_app->getdatapaging("empCode,empInitial,empName","ms_staff","ORDER BY empName"),
            'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
			'view'=>'pages/payment/payment_request',
        );	
      //$this->load->view('pages/booking/ship',$data);
       $this->load->view('home/home',$data);
    }

//   data settlement
    function settlement_request(){
        $data = array(
            'title'=>' settlement_request',
            'scrumb_name'=>' settlement_request',
            'scrumb'=>'payment/settlement_request',
            'staff'=>$this->model_app->getdatapaging("empCode,empInitial,empName","ms_staff","ORDER BY empName"),
            'view'=>'pages/payment/settlement_request',
             'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
        );  
       $this->load->view('home/home',$data);
    }




}


