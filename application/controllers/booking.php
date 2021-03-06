<?php
class Booking extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
		date_default_timezone_set("Asia/Jakarta"); 
    }	

function getshipper(){

        $custCode=$this->input->post('custCode');

		$cari=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

		if($cari){
			$data['list']=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");
			$this->load->view('pages/Booking/detail_customer_sender',$data);

		}
	}
function getcnee(){

        $custCode=$this->input->post('custCode');

		$cari=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

		if($cari){
			$data['list']=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

			 $this->load->view('pages/Booking/detail_customer_receivement',$data);

		}
	}
function detail_sender(){

        $custCode=$this->input->post('custCode');

		$cari=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

		if($cari){
			$data['list']=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

			 $this->load->view('pages/Booking/detail_sender_house',$data);

		}
	}
	function detail_cnote(){
		
		$cnote=$this->input->post('idcnote');
        $kode=trim($cnote);
		
		$search=$this->model_app->getdata('outgoing_connote',"WHERE HouseNo='$kode' AND status_proses='0'");
		if($search){
			//$data['connote']=$this->model_app->getdata('outgoing_connote',"WHERE HouseNo='$kode' AND status_proses='0'");
					//add to cart
		foreach($search as $row){
			
		$insert = array(
			'id'      => $kode,
			'name'     =>$kode,
		    'price'   =>$row->grandPCS,
			'qty'    =>$row->grandPCS,
			'date'    =>$row->ETD,
			'origin'    =>$row->Origin,
			'destination'    =>$row->Destination,
			'service'    =>$row->Service,
			'jml'    =>$row->grandPCS,
			'cwt'    =>$row->CWT,
			);
				$this->cart->insert($insert);
		}
		$data=array(
			'message'=>'data berhasil ditambahkan',
			'title'=>'Input cargo manifest'
			);
			$this->load->view('pages/booking/cargo/input_manifest_temp',$data);
		
		} else {
			//$data['conote']='data tidak ditemukan';
			$this->load->view('pages/booking/cargo/input_manifest_temp');
		}
		
}
function insert_edit_cargo(){
		$cnote=$this->input->post('idcnote');
		$cargono=trim($this->input->post('cargono'));
        $kode=trim($cnote);
		$search=$this->model_app->getdata('outgoing_connote',"WHERE HouseNo='$kode' AND status_proses='0'");
		if($search){
			
		foreach($search as $row){
		$items=array(
		'CargoNo' =>$cargono,
		'HouseNo'=>$kode,
		'HouseDate'=>date('Y-m-d H:i:s'),
		'origin'=>$row->Origin,
		'Destination'=>$row->Destination,
		'Service'=>$row->Service,
		'Berat'=>$row->grandPCS,
		'CWT'=>$row->CWT,
		'date_insert'=>date('Y-m-d H:i:s')
		);		
		 $this->model_app->insert('cargo_items',$items);
		}
		$data=array(
			'message'=>'data berhasil ditambahkan',
			'title'=>'Input cargo manifest'
			);			
			$data=array(
			'list'=>$this->model_app->getdatapaging("*","cargo_items a",
			"RIGHT JOIN cargo_manifest b on a.CargoNo=b.CargoNo
			RIGHT JOIN outgoing_connote c on a.HouseNo=c.HouseNo
			WHERE b.CargoNo='$cargono'
			ORDER BY b.CreateDate DESC")
			);
			//update status outgoing connote ke 0
			$update=array('status_proses'=>'1');	
			$this->model_app->update('outgoing_connote','HouseNo',$kode,$update);
			$this->load->view('pages/booking/cargo/tabel_edit',$data);
		}     else    {
			redirect('edit_cargo_manifest');
		
		}		
}
//==================delete house when edit cargo ============================
function delete_item_edit() {
	$house=$this->input->post('idcnote');
	$cargono=trim($this->input->post('cargono'));
	$delete=$this->model_app->delete_data('cargo_items','HouseNo',$house);
			 //update status outgoing connote ke 0
	$update=array(
	'status_proses'=>'0'
	);	
	$this->model_app->update('outgoing_connote','HouseNo',$house,$update);
	$data=array(
			'list'=>$this->model_app->getdatapaging("*","cargo_items a",
			"RIGHT JOIN cargo_manifest b on a.CargoNo=b.CargoNo
			RIGHT JOIN outgoing_connote c on a.HouseNo=c.HouseNo
			WHERE b.CargoNo='$cargono'
			ORDER BY b.CreateDate DESC"),
			'cargono'=>$cargono
			);
	$this->load->view('pages/booking/cargo/tabel_edit',$data);
				//update status outgoing connote ke 0
	$update=array('status_proses'=>'0');	
	$this->model_app->update('outgoing_connote','HouseNo',$house,$update);
	
}
//==================ADD ITEM TO CART============================
	function save_session()
	{
		$idcnote=$this->input->post('idcnote');
		$date=$this->input->post('date');
		$origin=$this->input->post('origin');
		$destination=$this->input->post('destination');
		$service=$this->input->post('service');
		$jml=$this->input->post('jml');
		$cwt=$this->input->post('cwt');
		
		//add to cart
		$insert = array(
			'id'      => $idcnote,
			'name'     =>$idcnote,
		    'price'   =>$jml,
			'qty'    =>$jml,
			'date'    =>$date,
			'origin'    =>$origin,
			'destination'    =>$destination,
			'service'    =>$service,
			'jml'    =>$jml,
			'cwt'    =>$cwt
			);
		$this->cart->insert($insert);
		$data=array(
			'message'=>'data berhasil ditambahkan',
			'title'=>'Input cargo manifest'
			);
		$this->load->view('pages/booking/cargo/input_manifest_temp',$data);
	
}

public function getdetailshipper()
	{
		// tangkap variabel keyword dari URL
$keyword = $this->uri->segment(3);

//$data = $this->db->from('autocomplete')->like('nama',$keyword)->get();		
$data=$this->model_app->getdata('ms_customer',"WHERE custName LIKE '%$keyword%'");

		// format keluaran di dalam array
		foreach($data as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->custName,
				'phone'	=>$row->Phone,
				'email'	=>$row->Email
			);
		}
		echo json_encode($arr);
	}
	public function book2()
	{
		$this->load->view('pages/booking/domesctic_outgoing_house');
	}
	public function search()
	{
		// tangkap variabel keyword dari URL
		$keyword = $this->uri->segment(3);

		// cari di database
		$data = $this->db->from('ms_customer')->like('custName',$keyword)->get();	

		// format keluaran di dalam array
		foreach($data->result() as $row)
		{
			$arr['query'] = $keyword;
			$arr['suggestions'][] = array(
				'value'	=>$row->custName,
				'nim'	=>$row->Email,
				'jurusan'	=>$row->Phone

			);
		}
		// minimal PHP 5.2
		echo json_encode($arr);
	}
function detail_receivement(){

        $custCode=$this->input->post('custCode');

		$cari=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

		if($cari){
			$data['list']=$this->model_app->getdata('ms_customer',"WHERE custCode='$custCode'");

			 $this->load->view('pages/Booking/detail_receivement_house',$data);

		}
	}

	 //===========add customer====================
function save_customer()
{	
$name =$this->input->post('name');
$address =$this->input->post('address');

$page=$this->input->post('page');

$this->form_validation->set_rules('name','name','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{
		redirect('Booking/domesctic_incoming_master');
	}
		else
	{
		$data=array(
		'custInitial' =>$this->input->post('initial'),
		'custName' =>$name,
		'Address'=>$this->input->post('address'),
		'cyCode' =>$this->input->post('city'),
		'Phone' =>$this->input->post('phone'),
		'Fax' =>$this->input->post('fax'),
		'PostalCode' =>$this->input->post('postcode'),
		'isAgent' =>$this->input->post('agen'),
		'isShipper' =>$this->input->post('shipper'),
		'isCnee' =>$this->input->post('cnee'),
		'Email' =>$this->input->post('email'),
		'PIC01' =>$this->input->post('pic01'),
		'PIC02' =>$this->input->post('pic02'),
		'HPPIC01' =>$this->input->post('hppic01'),
		'HPPIC02' =>$this->input->post('hppic02'),
		'CreditLimit' =>$this->input->post('credit'),
		'TermsPayment' =>$this->input->post('payment'),
		'Deposit' =>$this->input->post('deposit'),
		'empCode' =>$this->input->post('empcode'),
		'NPWP' =>$this->input->post('npwp'),
		'NPWPAddress' =>$this->input->post('npwpaddress'),
		'Remarks' =>$this->input->post('remarks'),
		'CreateBy' =>$this->session->userdata('nameusr'),
		'CreateDate' =>date('Y-m-d: h:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>'',	
		);		
		 $this->model_app->insert('ms_customer',$data);	

		 if($page=="incomaster"){
		 	redirect('transaction/domesctic_incoming_master');
		 } elseif ($page=="outmaster") {
		 	redirect('transaction/domesctic_outgoing_master');
		 } elseif ($page=="incomhouse") {
		 	redirect('transaction/domesctic_incoming_house');
		 } elseif ($page=="outhouse") {
		 	redirect('transaction/domesctic_outgoing_house');
		 }
		 
	 }
}
	 //===========add customer====================
function save_customer2()
{	
$no_customer=$this->model_app->generateNo("ms_customer","CustCode","CST");

$initial =$this->input->post('initial');
$name =$this->input->post('namecust');
$address =$this->input->post('address');
$isagent =$this->input->post('isagent');
$isshipper =$this->input->post('isshipper');
$iscnee =$this->input->post('iscnee');
$city=$this->input->post('city');
$phone =$this->input->post('phone');
$postcode=$this->input->post('postcode');
$fax =$this->input->post('fax');
$email =$this->input->post('email');

		$data=array(
		'CustCode'=>$no_customer,
		'CustName' =>$name,
		'CustInitial' =>$initial,
		'Address'=>$address,
		'City' =>$city,
		'Phone' =>$phone,
		'Fax' =>$fax,
		'PostalCode' =>$postcode,
		'IsAgent' =>$isagent,
		'IsShipper' =>$isshipper,
		'IsCnee' =>$iscnee,
		'Email' =>$email,
		'CreatedBy' =>$this->session->userdata('nameusr'),
		'CreatedDate' =>date('Y-m-d: h:i:s'),
		'ModifiedBy' =>'',
		'ModifiedDate' =>'',	
		);		
		 $this->model_app->insert('ms_customer',$data);
}




}


