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
		  $this->load->model('m_payment');
    }
  function index(){	
 		$data=array(
		'title'=>' Payment',
		'link'=>'<a href="'.base_url().'payment">Cash / Bank in</a>',
		'customer'=>$this->model_app->getdata('ms_customer a',
		             " ORDER BY a.CustName"),
		'user'=>$this->model_app->getdata('ms_user a',
		             "INNER JOIN outgoing_house b on a.id_user=b.CreateBy WHERE b.PaymentStatus='0' GROUP BY a.id_user"),
		'account_header'=>$this->model_app->getdata('account a',
		             "WHERE a.level='4' AND a.induk IN('1-01-100-0-1-00','1-01-200-0-1-00') ORDER BY a.nmac"),
		'account_detail'=>$this->model_app->getdata('account a',
		             "WHERE a.level='4' ORDER BY a.nmac"),					 		
		'view'=>'pages/booking/payment/v_payment',
		);
	$this->load->view('home/home',$data);
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
			'print' => '<a href="'.base_url().'payment/print_house_transc/'.$datalist->House.'" target="_new" style="margin-left:22%"><i class="fa fa-print"></i></a>',
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
            'JurnalNo' => '<a href="#" onclick="detailPayment2(this);">'. $datalist->JurnalNo.'</a>',
			'PayDate' =>date('d-m-Y',strtotime($datalist->PayDate)),
			'Currency' =>$datalist->Currency,
			'Rate' =>$datalist->Rate,
			'CustName' =>$datalist->CustName,
			'Balance' =>$balance=($datalist->Balance==$datalist->Amount)?'<div align="right">0</div>':'<div align="right">'.number_format($datalist->Balance,0,'.','.').'</div>',
			'PaymentValue' =>'<label style="float:right">'.number_format($datalist->PaymentValue,0,'.','.').'</label>',
			'Remarks' =>$datalist->Remarks,
			'print' => '<a href="'.base_url().'payment/invoice_payment/'.$datalist->JurnalNo.'" target="_new" style="margin-left:22%"><i class="fa fa-print"></i></a>',
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
public function filter_income()
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
		$select='a.JurnalNo,a.PayDate,a.Currency,a.Remarks,a.TotalPayment,a.Rate,b.PaymentDate,c.CustName,d.Amount,d.RemainAmount,d.PaymentStatus,e.MasterNo';
		
       $nm_coloum= array('a.JurnalNo','a.JurnalNo','e.MasterNo','b.House','b.PaymentDate','c.CustName','a.Currency','a.TotalPayment');
        $orderby= array('b.PaymentDate' => 'desc');
        $where=  $kondisi;
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
			'link'=>'<a href="'.base_url().'payment/payment_request">payment_request</a>',
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
			'link'=>'<a href="'.base_url().'payment/settlement_request">settlement_request</a>',
            'staff'=>$this->model_app->getdatapaging("empCode,empInitial,empName","ms_staff","ORDER BY empName"),
            'view'=>'pages/payment/settlement_request',
             'currency'=>$this->model_app->getdatapaging("currCode,Name","ms_currency","ORDER BY currCode"),
        );  
       $this->load->view('home/home',$data);
    }
	//-----Confirmasi payment
 function print_house_transc(){
	
	$house= $this->uri->segment('3');
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
	$this->load->view('pages/booking/payment/print_house_transc',$data);	
 }
 

 	//-----Confirmasi payment
 function invoice_payment(){
	 
	 $kode = $this->session->flashdata('my_flash_data');
	 $kode2 = $this->uri->segment('3');
	 
	$data=array(
	'header'=>$this->model_app->getdatapaging("a.JurnalNo,a.PayDate,b.PaymentDate,a.Currency,a.Rate,sum(b.PaymentValue) as total_pay,a.Remarks,b.House,c.CustName,d.FullName",
	"payment_house a",
	"LEFT JOIN payment_house_detail b on a.JurnalNo=b.JurnalNo
	 LEFT JOIN ms_customer c on a.Customer=c.CustCode
	 LEFT JOIN ms_user d on a.CreatedBy=d.id_user
	 WHERE a.JurnalNo='$kode' OR a.JurnalNo='$kode2' LIMIT 1"),
	
	'list'=>$this->model_app->getdatapaging("a.JurnalNo,a.PaymentDate,a.PaymentValue,a.House,d.Amount,d.RemainAmount,d.PaymentStatus",
	"payment_house_detail a",
	"INNER JOIN payment_house b on a.JurnalNo=b.JurnalNo
	 LEFT JOIN ms_customer c on b.Customer=c.CustCode
	 LEFT JOIN outgoing_house d on a.House=d.HouseNo
	WHERE a.JurnalNo='$kode' OR a.JurnalNo='$kode2'")
	);
	$this->load->view('pages/booking/payment/konfirmasi',$data);
 }
	//-----save processing payment input
 function process_cash_payment(){
   $kode=$this->model_app->generateNo("payment_house","JurnalNo","JRN");
	$iduser=$this->input->post('iduser');
	$table_house=$this->input->post('methode');
	$jumlah=$this->input->post('grandtotal');	
	$nomorhouse=$this->input->post('nomorhouse');		
	
	$lastbalance=$this->input->post('lastbalance');
	//$accountdetail=$this->input->post('accountdetail');
	
	foreach($nomorhouse as $key => $val)
	{
		$housecek=$_POST['nomorhouse'][$key];	
		$payamount=$_POST['payamount'][$key];
		//$acc_detail=$_POST['accountdetail'][$key];
		
   $cari=$this->model_app->getdatapaging("HouseNo,CWT,PCS,Amount,RemainAmount","".$table_house." a", "WHERE a.CreateBy='$iduser' AND a.HouseNo='$housecek' AND a.PaymentStatus='0' ORDER BY HouseNo asc");	 
		
	foreach($cari as $row){
    	$house=$row->HouseNo;
	   $amount=$row->RemainAmount;

 	 if ($jumlah >0) { 
	 	if($jumlah >$amount){
			$simpan=0;
			$bayar=$amount;
			$balance=0;
			$paymentstatus='1';
		} else {
			$simpan=$amount-$jumlah;	
			$bayar=$jumlah;
			$balance=$amount-$jumlah;
			$paymentstatus='0';
		}
		$jumlah=$jumlah-$amount;
		//echo $amount.' => '.$simpan.' Buat bayar '.$bayar.'<br>';
	 	$insertpayment_detail=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-101-0-1-00',
		'House' =>$house,
		'Balance' =>$balance,
		'PaymentValue' =>$bayar,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$jurnal_credit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-101-0-1-00',
		'Debit' =>'0',
		'House' =>$house,
		'Credit' =>$payamount,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$updatehouse=array(
		'RemainAmount'=>$balance,
		'PaymentStatus'=>$paymentstatus
		);
		$savedetail=$this->model_app->insert('payment_house_detail',$insertpayment_detail);
		$save_credit=$this->model_app->insert('jurnal',$jurnal_credit);
		$update=$this->model_app->update($table_house,'HouseNo',$house,$updatehouse);
		} 
	}
}
	 	$jurnal_debit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>$this->input->post('accountheader'),
		'Debit' =>$this->input->post('grandtotal'),
		'Credit' =>'0',
		'House' =>'',
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		$savedetail=$this->model_app->insert('jurnal',$jurnal_debit);
		
		//insert header payment
	 	$insertpayment=array(
		'JurnalNo' =>$kode,
		'kdac' =>$this->input->post('accountheader'),
		'PayDate' =>date('Y-m-d H:i:s'),
		'Rate' =>$this->input->post('rate'),
		'Currency' =>$this->input->post('paymentcurrency'),
		'Customer' =>$this->input->post('iduser'),
		'TotalPayment' =>$this->input->post('grandtotal'),
		'Remarks' =>$this->input->post('remarks'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savepayment=$this->model_app->insert('payment_house',$insertpayment);	
		//redirect invoice
		$this->session->set_flashdata('my_flash_data', $kode);
		redirect('payment/invoice_payment');	
}


	//-----save processing payment input
 function process_credit_payment(){
   $kode=$this->model_app->generateNo("payment_house","JurnalNo","JRN");
	$customer=$this->input->post('paymentcustomers');
	$table_house=$this->input->post('methode2');
	
	$jumlah=$this->input->post('grandtotal');	
	$nomorhouse=$this->input->post('nomorhouse');		
	
	$lastbalance=$this->input->post('lastbalance');
	//$accountdetail=$this->input->post('accountdetail');
	
	foreach($nomorhouse as $key => $val)
	{
		$housecek=$_POST['nomorhouse'][$key];	
		$payamount=$_POST['payamount'][$key];
		
   $cari=$this->model_app->getdatapaging("HouseNo,CWT,PCS,Amount,RemainAmount","".$table_house." a", "WHERE Shipper='$customer' AND HouseNo='$housecek' AND PaymentStatus='0' ORDER BY HouseNo asc");	 
		
	foreach($cari as $row){
    	$house=$row->HouseNo;
	   $amount=$row->RemainAmount;

 	 if ($jumlah >0) { 
	 	if($jumlah >$amount){
			$simpan=0;
			$bayar=$amount;
			$balance=0;
			$paymentstatus='1';
		} else {
			$simpan=$amount-$jumlah;	
			$bayar=$jumlah;
			$balance=$amount-$jumlah;
			$paymentstatus='0';
		}
		$jumlah=$jumlah-$amount;
		//echo $amount.' => '.$simpan.' Buat bayar '.$bayar.'<br>';
	 	$insertpayment_detail=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-101-0-1-00',
		'House' =>$house,
		'Balance' =>$balance,
		'PaymentValue' =>$bayar,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$jurnal_credit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-101-0-1-00',
		'Debit' =>'0',
		'Credit' =>$this->input->post('grandtotal'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$updatehouse=array(
		'RemainAmount'=>$balance,
		'PaymentStatus'=>$paymentstatus
		);
		$save_credit=$this->model_app->insert('jurnal',$jurnal_credit);
		$savedetail=$this->model_app->insert('payment_house_detail',$insertpayment_detail);
		$update=$this->model_app->update($table_house,'HouseNo',$house,$updatehouse);
		} 
	}
}
	 	$jurnal_debit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>$this->input->post('accountheader'),
		'Debit' =>$this->input->post('grandtotal'),
		'Credit' =>'0',
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savedetail=$this->model_app->insert('jurnal',$jurnal_debit);
		
		//insert header payment
	 	$insertpayment=array(
		'JurnalNo' =>$kode,
		'kdac' =>$this->input->post('accountheader'),
		'PayDate' =>date('Y-m-d H:i:s'),
		'Rate' =>$this->input->post('rate'),
		'Currency' =>$this->input->post('paymentcurrency'),
		'Customer' =>$this->input->post('paymentcustomers'),
		'TotalPayment' =>$this->input->post('grandtotal'),
		'Remarks' =>$this->input->post('remarks'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savepayment=$this->model_app->insert('payment_house',$insertpayment);	
	    //redirect('payment/invoice_payment',$jumlah);
	$this->session->set_flashdata('my_flash_data', $kode);
	redirect('payment/invoice_payment');	
	
}

//   DATA TO SESSION
    function deposito(){
        $data = array(
	  		'title'=>'deposito',
			'link'=>'<a href="'.base_url().'Payment/deposito">deposito</a>',

			'customer'=>$this->model_app->getdata('ms_customer a',
						"order BY a.CustName"),
		
            'service'=>$this->model_app->getdatapaging("svCode,Name","ms_service","ORDER BY Name"),
            'city'=>$this->model_app->getdatapaging("PortCode,PortName","ms_port","GROUP BY PortName"),
            'commodity'=>$this->model_app->getdatapaging("CommCode,CommName","ms_commodity","ORDER BY CommName ASC"),
			'view'=>'pages/booking/deposito/v_deposito',
        );	
       $this->load->view('home/home',$data);
    }

public function save_deposito()
	{  
	$kode=$this->model_app->generateNo("payment_house","JurnalNo","JRN");
	 $nmtabel='topup_deposito';
	 $custcode=$this->input->post('customers');
	 $amount=$this->input->post('amount');	
	      $cari=$this->model_app->getdatapaging("*","ms_customer", "where CustCode='$custcode'");
		  if($cari){
		  	foreach($cari as $row){
	        	$custcodeDB=$row->CustCode;
				$Deposit=$row->Deposit;
				$depoIncrease=$Deposit+$amount;
			}
			$updatedeposito=array(
			'Deposit'=>$depoIncrease
			);
			$update=$this->model_app->update('ms_customer','CustCode',$custcode,$updatedeposito);
			
		$data = array(
				'TopupDate' => $this->input->post('tgl'),
				'CustCode' => $this->input->post('customers'),
				'TopupAmount' => $this->input->post('amount'), 
				'Remarks' =>$this->input->post('remarks'),
				'CreatedBy' =>$this->session->userdata('idusr'),
		        'CreatedDate'=>date('Y-m-d H:i:s'),
				'TopupDate'=>date('Y-m-d H:i:s'),
			);
	 	$jurnal_debit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'1-01-100-0-1-00',
		'Debit' =>$this->input->post('amount'),
		'Credit' =>'0',
		'House' =>'',
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
	 	$jurnal_kredit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kode,
		'kdac' =>'2-01-530-0-1-00',
		'Debit' =>'0',
		'Credit' =>$this->input->post('amount'),
		'House' =>'',
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);
		$savedetail=$this->model_app->insert('jurnal',$jurnal_kredit);
		$savedetail=$this->model_app->insert('jurnal',$jurnal_debit);
		$insert = $this->m_payment->save($data,$nmtabel);
				//insert header payment
	 	$insertpayment=array(
		'JurnalNo' =>$kode,
		'kdac' =>'',
		'PayDate' =>date('Y-m-d H:i:s'),
		'Currency' =>'',
		'Customer' =>$this->input->post('customers'),
		'TotalPayment' =>$this->input->post('amount'),
		'Remarks' =>$this->input->post('remarks'),
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);	
		$savepayment=$this->model_app->insert('payment_house',$insertpayment);
		
		echo json_encode(array("status" => TRUE));
	     }  
}

function getCustomers(){
      $result=$this->model_app->getdatapaging("*","ms_customer", "ORDER BY CustName");
	foreach($result as $list){
		$row = array(
				'CustCode' =>$list->CustCode,
				'CustName' =>$list->CustName,
			);
			$data[] = $row;
		} 
		echo json_encode($data);
	}	
		
public function list_trans_deposito()
	{
		$nm_tabel='topup_deposito a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.CustCode';
		$kolom2='b.CustCode';
		
		$select='a.TopupId,b.CustCode,b.CustName,a.TopupDate,a.Remarks,a.TopupAmount';
        $nm_coloum= array('b.CustCode','a.TopupDate','b.CustName','a.Remarks','a.TopupAmount');
        $orderby= array();
        $where=  array();
        $list = $this->m_payment->get_data_topup_deposito($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		
		
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CustCode' =>'<a href="#" onclick="detailhouse(this);">'.$datalist->CustCode.'</a>',
            'CustName' =>$datalist->CustName,
			'TopupDate' =>$datalist->TopupDate,
			'TopupAmount' =>number_format($datalist->TopupAmount,0,'.','.'),
			'Remarks' =>$datalist->Remarks,
			'TopupId' =>$datalist->TopupId,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_deposito('."'".$datalist->TopupId."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_deposito('."'".$datalist->TopupId.'_'.$datalist->CustCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_topup_deposito($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_topup_deposito($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}
  function journal(){	
 		$data=array(
		'title'=>' Journal',
		'link'=>'<a href="'.base_url().'payment/Journal">Journal</a>',					 		
		'view'=>'pages/booking/journal/v_journal',
		);
	$this->load->view('home/home',$data);
 }
 	
public function filter_list_trans_deposito()
	{
		$ab=$this->uri->segment(3);
		$pecah=explode("_", $ab);
		$date1=$pecah[0];
		$date2=$pecah[1];
		$kategori=$pecah[2];
		$kriteria=$pecah[3];
		$txtsearch=$pecah[4];

		if($kriteria=='startwith'){
		$kondisi=array('b.CustName LIKE'=>$txtsearch.'%','a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		} else if($kriteria=='endwith'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch,'a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		} else if($kriteria=='contains'){
		$kondisi=array($kategori.' LIKE'=>'%'.$txtsearch.'%','a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		} else if($kriteria=='notcontains'){
		$kondisi=array($kategori.' NOT LIKE'=>'%'.$txtsearch.'%','a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		} else if($kriteria=='equals'){
		$kondisi=array($kategori =>$txtsearch,'a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		} else if($kriteria=='notequals'){
		$kondisi=array($kategori.' <> ' =>$txtsearch,'a.TopupDate <= '=>$date2,'a.TopupDate >='=>$date1);	
		}
		$nm_tabel='topup_deposito a';
		$nm_tabel2='ms_customer b';
		$kolom1='a.CustCode';
		$kolom2='b.CustCode';
  
		$select='a.TopupId,b.CustCode,b.CustName,a.TopupDate,a.Remarks,a.TopupAmount';
        $nm_coloum= array('b.CustCode','b.CustCode','a.CustName','a.Remarks','a.TopupAmount');
        $orderby= array();
       $where=  $kondisi;
        $list = $this->m_payment->get_data_topup_deposito($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'CustCode' =>'<a href="#" onclick="detailhouse(this);">'.$datalist->CustCode.'</a>',
            'CustName' =>$datalist->CustName,
			'TopupDate' =>$datalist->TopupDate,
			'TopupAmount' =>number_format($datalist->TopupAmount,0,'.','.'),
			'Remarks' =>$datalist->Remarks,
			'TopupId' =>$datalist->TopupId,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_deposito('."'".$datalist->TopupId."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_deposito('."'".$datalist->TopupId.'_'.$datalist->CustCode."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_topup_deposito($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_topup_deposito($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

public function edit_deposito()
	{
	   	$TopupId     = $this->input->post('cid');
        $nmtabel= $this->input->post('cnmtabel');
        $key    = $this->input->post('ckeytabel');
		$data = $this->m_payment->get_by_id($TopupId,$nmtabel,$key);
		echo json_encode($data);
	}

public function delete_deposito()
	{
	   $id= $this->input->post('cid');
	   $pecah=explode('_',$id);
	   $topup_id=$pecah[0];
	   $custcode=$pecah[1];
	   $nmtabel= $this->input->post('cnmtabel');
       $key    = $this->input->post('ckeytabel');
	   
	    $cari=$this->model_app->getdatapaging("*","ms_customer a", " inner join topup_deposito b on a.CustCode=b.CustCode where b.CustCode='$custcode' AND b.TopupId='$topup_id'");
		  if($cari){
		  	foreach($cari as $row){
				$TopupId=$row->TopupId;
				$amount_topup=$row->TopupAmount;
	        	$custcodeDB=$row->CustCode;
				$Deposit=$row->Deposit;
				$depoDecrease=$Deposit - $amount_topup;
			}
			$updatedeposito=array(
			'Deposit'=>$depoDecrease
			);
			
		$update=$this->model_app->update('ms_customer','CustCode',$custcode,$updatedeposito);
		$this->m_payment->delete_by_id($topup_id,$nmtabel,$key);
		echo json_encode(array("status" => TRUE));
	}
}
public function list_journal()
	{
		$nm_tabel='jurnal a';
		$nm_tabel2='payment_house b';
		$kolom1='a.JurnalNo';
		$kolom2='b.JurnalNo';
		
		$select='a.House,a.JurnalId,c.nmac,c.kdac,a.PaymentDate,a.JurnalNo,a.Debit,a.Credit,b.Currency,b.Remarks';
        $nm_coloum= array('c.kdac','a.PaymentDate','c.nmac','a.JurnalNo','a.Debit','a.Credit');
        $orderby= array();
        $where=  array();
        $list = $this->m_payment->get_data_jurnal($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
		
		
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
            'kdac' =>'<a href="#" onclick="detailhouse(this);">'.$datalist->kdac.'</a>',
            'nmac' =>$status=($datalist->Debit > 0)?$datalist->nmac: '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-style: italic;color:#607D8B;font-size:small">'.$datalist->nmac.'</span>',
			'PaymentDate' =>date('d-m-Y',strtotime($datalist->PaymentDate)),
			'Currency' =>$datalist->Currency,
			'format_Debit' =>'<div align="right">'.number_format($datalist->Debit,0,'.','.').'</div>',
			'format_Credit' =>'<div align="right">'.number_format($datalist->Credit,0,'.','.').'</div>',
			'Debit'=>$datalist->Debit,
			'Credit'=>$datalist->Credit,
			'House'=>$datalist->House,
			'Remarks' =>$datalist->Remarks,
			'JurnalNo' =>$datalist->JurnalNo,
			'JurnalId' =>$datalist->JurnalId,
			
            'action'=> '<a class="green" href="javascript:void()" title="Edit" onclick="edit_deposito('."'".$datalist->JurnalId."'".')"><i class="icon-pencil bigger-150"></i></a>&nbsp;&nbsp;
				    <a class="red" href="javascript:void()" title="Hapus" onclick="delete_deposito('."'".$datalist->JurnalId.'_'.$datalist->JurnalId."'".')"><i class="icon-trash bigger-150"></i></a>'
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->m_payment->count_all_jurnal($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->m_payment->count_filtered_jurnal($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}

 function filter_pay_cash(){
        $iduser=$this->input->post('iduser');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		$methode=$this->input->post('methode');
		$payTipe=$this->input->post('payTipe');
		
		$data=array(
		'list'=>$this->model_app->getdatapaging("a.*,b.CustName as sender,b.Address as address1,b.Phone as phone1,c.Phone as phone2,c.Address as address2,c.CustName as receiver,d.PortName as ori,e.PortName as desti,f.MasterNo as NoSMU",
	 " ".$methode." a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	 LEFT JOIN consol f on a.HouseNo=f.HouseNo
	WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.CreateBy='$iduser' AND a.PaymentStatus='0' AND a.PayCode='$payTipe' AND a.RemainAmount >'0' 
	ORDER BY f.HouseNo asc
		"),
'account_detail'=>$this->model_app->getdata('account a', "WHERE a.level='4' ORDER BY a.nmac")	
		); 
        $this->load->view('pages/booking/payment/replace_payment',$data);
}	
 function filter_pay_credit(){
        $idcust=$this->input->post('idcust');
		$etd1=$this->input->post('etd1');
		$etd2=$this->input->post('etd2');
		$methode=$this->input->post('methode');
		$payTipe=$this->input->post('payTipe');
		
		$data=array(
		'list'=>$this->model_app->getdatapaging("a.*,b.CustName as sender,b.Address as address1,b.Phone as phone1,c.Phone as phone2,c.Address as address2,c.CustName as receiver,d.PortName as ori,e.PortName as desti,f.MasterNo as NoSMU",
	 " ".$methode." a", 
	 "LEFT JOIN ms_customer b on a.Shipper=b.CustCode
	 LEFT JOIN ms_customer c on a.Consigne=c.CustCode
	 LEFT JOIN ms_port d on a.Origin=d.PortCode
	 LEFT JOIN ms_port e on a.Destination=e.PortCode
	 LEFT JOIN consol f on a.HouseNo=f.HouseNo
	WHERE LEFT(a.ETD,10) BETWEEN '$etd1' AND '$etd2' AND a.Shipper='$idcust' AND a.PaymentStatus='0' AND a.PayCode='$payTipe' AND a.RemainAmount >'0' 
	ORDER BY f.HouseNo asc
		"),
'account_detail'=>$this->model_app->getdata('account a', "WHERE a.level='4' ORDER BY a.nmac")	
		); 
        $this->load->view('pages/booking/payment/replace_payment',$data);
}








}


