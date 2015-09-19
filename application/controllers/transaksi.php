<?php
class Transaksi extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }
	
	
	
//     DATA TO SESSION
    function add_item(){
        $data = array(
	  		'transc_id'=>$this->input->post('id'),
			'awb_no'=>$this->input->post('awb'),
			'qty'=>$this->input->post('qty'),
			'gwt'=>$this->input->post('gwt'),
			'panjang'=>$this->input->post('p'),
			'lebar'=>$this->input->post('l'),
			'tinggi'=>$this->input->post('t'),

			'remarks'=>$this->input->post('remarks'),	
        );
		
      $this->model_app->insert('temp',$data);		
        redirect('transaksi/add_transaksi');
    }
//------------delete data----------------------------------
function hapus_item_temp(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('temp','awb_no',$kode);
	redirect('transaksi/add_transaksi');
    }	
}
	 ///////////////////add_transaksi//////////////////////////////////	
function add_transaksi(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$data=array(
	 'title'=>'Add transaksi',
	 'scrumb_name'=>'Add Transaksi',
	 'scrumb'=>'transaksi/add_transaksi',
	 'cust'=>$this->model_app->getdata('ms_customer',"	"),
	 'temp'=>$this->model_app->getdata('temp',"	"),
	 'kodetrans'=>$this->model_app->kodetrans(),
	 'view'=>'pages/v_add_transaksi',
	 	);
	$this->load->view('home/home',$data);
 }
 else
 {
	redirect('login');  
 }
}

function add_invoice(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$data=array(
	 'title'=>'Add transaksi',
	 'cust'=>$this->model_app->getdata('ms_customer',""),
	 'kodeinvoice'=>$this->model_app->kodeinvoice(),
	 'view'=>'pages/v_add_invoice',
	 	);
	$this->load->view('home/home',$data);
 }
 else
 {
	redirect('login');  
 }
}

 function save_transaksi(){
	 	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->input->post('kdtrans');
		
	$qty=$_POST['qty'];	
	foreach($qty as $key => $val)
	{
       // $name = $_FILES['myfile']['name'][$key];
		$awb =$_POST['awb'][$key];
        $qty  =$_POST['qty'][$key];
		$gwt  =$_POST['gwt'][$key];
		$panjang  =$_POST['panjang'][$key];
		$lebar  =$_POST['lebar'][$key];
		$tinggi  =$_POST['tinggi'][$key];
		$volume  =$_POST['volume'][$key];
		$cwt  =$_POST['cwt'][$key];
		$remarks  =$_POST['remarks'][$key];
			
			$details=array(
			'transc_id'=>$this->input->post('kdtrans'),
			'custCode'=>$this->input->post('id_cust'),
			'date_receive'=>$this->input->post('date'),
			'awb_no'=>$awb,
			'qty'=>$qty,
			'gwt'=>$gwt,
			'panjang'=>$panjang,
			'lebar'=>$lebar,
			'tinggi'=>$tinggi,
			'volume'=>$volume,
			'cwt'=>$cwt,
			'remarks'=>$remarks,			
			);
			$this->model_app->insert('transaction_details',$details);		
	}
	
			$datatrans=array(
			'transc_id'=>$this->input->post('kdtrans'),
			'custCode'=>$this->input->post('id_cust'),
			'date_receive'=>$this->input->post('date'),			
			);
			$this->model_app->insert('transaction',$datatrans);	
    		
			$this->model_app->delete_data('temp','transc_id',$kode);
			
			$data['message']='berhasil simpan';
			redirect('transaksi/add_transaksi',$data);

}
 }
function save_invoice(){
		 if($this->session->userdata('login_status') == TRUE )
 {
	$tgl=$this->input->post('date');
	$id=$this->input->post('transc_id');
	$datainvo=array(
	'invoice_id'=>$this->input->post('invoce_id'),
	'date_invoice'=>date("Y-m-d",strtotime($tgl)),
	'transc_id'=>$this->input->post('transc_id'),
	'custCode'=>$this->input->post('custCode'),
	'currency'=>$this->input->post('currency'),
	'amount_pay'=>$this->input->post('amount_total'),
	);
	
	 $cek=$this->model_app->getdata('invoice',"where transc_id='$id'");
	 if($cek)
	 {
		 foreach($cek as $row){
		$noinvo=$row->invoice_id; 
	 }
		$id= $this->input->post('transc_id');
        $data=array(
            'title'=>'Detail invoice',
			'no_invoice'=>$noinvo,
			'tgl_invoice'=>$this->input->post('date'),
            'cust'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id' LIMIT 1"),
          'detail_po'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id'"),
			
        );
		
		ob_start();
		$content = $this->load->view('pages/cetak_invoice',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('R', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('data invoice.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
	 }
	 else
	 {
	$this->model_app->insert('invoice',$datainvo);
	$id= $this->input->post('transc_id');
        $data=array(
            'title'=>'Detail invoice',
			'no_invoice'=>$this->input->post('invoce_id'),
			'tgl_invoice'=>$this->input->post('date'),
            'cust'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id' LIMIT 1"),
          'detail_po'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id'"),
			
        );
		
		ob_start();
		$content = $this->load->view('pages/cetak_invoice',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('R', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('data invoice.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}	
	 }
	
}
}
function cetak_invoice(){
		 if($this->session->userdata('login_status') == TRUE )
 {
		$id= $this->input->post('transc_id');
        $data=array(
            'title'=>'Detail invoice',
			'no_invoice'=>$this->input->post('invoce_id'),
			'tgl_invoice'=>$this->input->post('date'),
            'cust'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id' LIMIT 1"),
          'detail_po'=>$this->model_app->getdata('ms_customer a',"inner join transaction_details b on a.custCode=b.custCode where b.transc_id='$id'"),
			
        );
		
		ob_start();
		$content = $this->load->view('pages/cetak_invoice',$data);
		$content = ob_get_clean();		
		$this->load->library('html2pdf');
		try
		{
			$html2pdf = new HTML2PDF('R', 'A4', 'fr');
			$html2pdf->pdf->SetDisplayMode('fullpage');
			$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
			$html2pdf->Output('data invoice.pdf');
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
		
	}
}
//////////////////////////////////////////////////	 
 function get_sub(){
	 $custCode=$this->input->post('custCode');
	
     $result=$this->model_app->getdata("transaction","where custCode='$custCode'");
	echo'<option>Pilih Transaksi</option>';
	if($result)
	{
	foreach($result as $data)
	{
	echo'<option value="'.$data->transc_id.'">'.$data->transc_id.'</option>';
	}  
	 
	 }
}

function get_detail_invoice(){
		 if($this->session->userdata('login_status') == TRUE )
 {
        $transc_id=$this->input->post('transc_id');
        $data=array(
    'detail'=>$this->model_app->getdata("transaction a","inner join transaction_details b on a.transc_id=b.transc_id where a.transc_id='$transc_id'"),
        );
        $this->load->view('pages/v_detail_invoice',$data);
    }	
}
	
//------------delete data----------------------------------
function delete_transaksi(){
	 if($this->session->userdata('login_status') == TRUE )
 {
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('transaksi','id_transaksi',$kode);
	$this->model_app->delete_data('det_transaksi','id_transaksi',$kode);
	redirect('transaksi/lap_transaksi');
    }	
 }
 else
 {
	redirect('login'); 
 }
}









}


