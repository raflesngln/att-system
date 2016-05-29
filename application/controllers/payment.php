<?php
class Payment extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
		$this->load->model('m_payment');
		 $this->load->model('model_app');
    }
public function list_payment()
	{
		$nm_tabel='payment_house a';
		$nm_tabel2='payment_house_detail b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		$select='a.JurnalNo,a.PayDate,a.Currency,sum(b.PaymentValue) as PaymentValue,a.Remarks,b.House,b.PaymentDate,min(b.Balance) as Balance,c.CustName,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','d.Amount','b.PaymentValue','b.Balance','d.PaymentStatus');
        $orderby= array('b.PaymentDate' => 'desc');
        $where=  array();
        $list = $this->m_payment->get_datatables($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'MasterNo' =>$datalist->MasterNo,
            'House' =>'<a href="#" onclick="detailHousePayment(this);">'. $datalist->House.'</a>',
            'JurnalNo' => '<a href="#" onclick="detailPayment(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'CustName' =>$datalist->CustName,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'<div align="right">0</div>':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'Amount' =>'<label style="float:right">'.number_format($datalist->Amount,0,'.','.').'</label>',
			'RemainAmount' =>'<label style="float:right">'.number_format($datalist->RemainAmount,0,'.','.').'</label>',
			
			'status' =>'<div class="text-left">'.$status=($datalist->RemainAmount =='0')?"<label class='label label-info arrowed-right white'>Settled</label>":"<label class='label label-warning arrowed-right white'>Not Settled</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
public function list_income()
	{
		$nm_tabel='payment_house a';
		$nm_tabel2='payment_house_detail b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		$select='a.JurnalNo,a.PayDate,a.Currency,a.Remarks,a.TotalPayment,a.Rate,b.PaymentDate,c.CustName,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','a.TotalPayment');
        $orderby= array('b.PaymentDate' => 'desc');
        $where=  array();
        $list = $this->m_payment->get_datatables_income($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'MasterNo' =>$datalist->MasterNo,
            'House' =>'<a href="#" onclick="detailHousePayment(this);">'. $datalist->House.'</a>',
            'JurnalNo' => '<a href="#" onclick="detailPayment2(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'Rate' =>$datalist->Rate,
			'CustName' =>$datalist->CustName,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'<div align="right">0</div>':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'TotalPayment' =>'<label style="float:right">'.number_format($datalist->TotalPayment,0,'.','.').'</label>',
			'RemainAmount' =>'<label style="float:right">'.number_format($datalist->RemainAmount,0,'.','.').'</label>',
			
			'status' =>'<div class="text-left">'.$status=($datalist->RemainAmount =='0')?"<label class='label label-info arrowed-right white'>Settled</label>":"<label class='label label-warning arrowed-right white'>Not Settled</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_income($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_income($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function filter_payment()
	{
		$inputan=$this->uri->segment(3);
		$pecah=explode("_", $inputan);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];
		
		if($kriteria=='startwith'){
		$kondisi=array($kategori.' LIKE'=>$txtsearch.'%','LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'LEFT(b.PaymentDate,10) <= '=>$date2,'LEFT(b.PaymentDate,10) >='=>$date1);	
		}
		
		$nm_tabel='payment_house a';
		$nm_tabel2='payment_house_detail b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		$select='a.JurnalNo,a.PayDate,a.Currency,sum(b.PaymentValue) as PaymentValue,a.Remarks,b.House,b.PaymentDate,min(b.Balance) as Balance,c.CustName,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','d.Amount','b.PaymentValue','b.Balance','d.PaymentStatus');
        $orderby= array('b.PaymentDate' => 'desc');
       $where=  $kondisi;
        $list = $this->m_payment->get_datatables($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'MasterNo' =>$datalist->MasterNo,
            'House' =>'<a href="#" onclick="detailHousePayment(this);">'. $datalist->House.'</a>',
            'JurnalNo' =>'<a href="#" onclick="detailPayment(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'CustName' =>$datalist->CustName,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'0':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'Amount' =>'<label style="float:right">'.number_format($datalist->Amount,0,'.','.').'</label>',
			'RemainAmount' =>'<label style="float:right">'.number_format($datalist->RemainAmount,0,'.','.').'</label>',
			
			'status' =>'<div class="text-left">'.$status=($datalist->PaymentStatus ==1)?"<label class='label label-info arrowed-right white'>Settled</label>":"<label class='label label-warning arrowed-right white'>Not Settled</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
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


