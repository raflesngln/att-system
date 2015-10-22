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




}


