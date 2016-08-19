<?php
class Cndn extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
		
		 $this->load->model('model_app');
		  $this->load->model('M_cndn');
    }

  function index(){	
 		$data=array(
		'title'=>' CN / DN',
		'link'=>'<a href="'.base_url().'Cndn">CN / DN</a>',
		'job'=>$this->model_app->getdata('outgoing_house a',
		             "INNER JOIN ms_customer b on a.Shipper=b.CustCode GROUP BY a.Shipper"),
		'user'=>$this->model_app->getdata('ms_user a',
		             "INNER JOIN outgoing_house b on a.id_user=b.CreateBy WHERE b.PaymentStatus='0' GROUP BY a.id_user"),
		'account_header'=>$this->model_app->getdata('account a',
		             "WHERE a.level='4' AND a.induk IN('1-01-100-0-1-00','1-01-200-0-1-00') ORDER BY a.nmac"),
		'account_detail'=>$this->model_app->getdata('account a',
		             "WHERE a.level='4' ORDER BY a.nmac"),					 		
		'view'=>'pages/booking/cndn/v_cndn',
		);
	$this->load->view('home/home',$data);
 }
 public function simpan_cndn(){
	 $jobno=$this->input->post('jobno');
	 $idcharge=$_POST['idcharge'];	
	foreach($idcharge as $key => $val)
	{
   		$idcharge2 =$_POST['idcharge'][$key];
        $unit =$_POST['unit'][$key];
		$qty  =$_POST['qty'][$key];
		$desc =$_POST['desc'][$key];
		$subcharges =$_POST['totalcharges'][$key];
		
		$noteData=array(
		'NoteJob'=>$jobno,
		'CostID'=>$idcharge2,
		'Qty'=>$qty,
		'Price'=>$unit,
		'Subtotal'=>$subcharges,
		'NoteDate'=>date('Y-m-d'),
		'NoteType'=>$this->input->post('jobtype'),
		'Remarks'=>$desc,
		);		
		
/*		$jurnal_kredit=array(
		'PaymentDate' =>date('Y-m-d H:i:s'),
		'JurnalNo' =>$kodejurnal,
		'kdac' =>$kd_account,
		'house' =>$getHouse,
		'Debit' =>'0',
		'Credit' =>$subcharges,
		'CreatedBy' =>$this->session->userdata('idusr'),
		'CreatedDate'=>date('Y-m-d H:i:s'),
		);*/
		 $this->model_app->insert('arnote',$noteData);
	}
	redirect('cndn');
	 
 }
 ///////////////////////////////////////
public function list_cndn()
	{
		$nm_tabel='arnote a';
		$nm_tabel2='ms_charge b';
		$kolom1='a.CostID';
		$kolom2='b.ChargeCode';
		$select='a.NoteID,a.NoteJob,a.CostID,a.Qty,a.Price,a.Subtotal,a.NoteDate,a.NoteType,b.ChargeName';
       $nm_coloum= array('a.NoteDate','a.NoteJob','e.ChargeName','b.Qty','b.Price','c.Subtotal');
        $orderby= array('b.NoteID' => 'desc');
        $where=  array();
        $list = $this->M_cndn->get_datatables($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2);
        
		$data = array();
		$no = $_POST['start'];
		
		foreach ($list as $datalist){
			$no++;
			$row = array(
            'no' => $no,
			'NoteID' =>$datalist->MasterNo,
            'NoteJob' =>'<a href="#" onclick="detailHousePayment(this);">'. $datalist->NoteJob.'</a>',
            'ChargeName' =>$datalist->ChargeName,
			'NoteDate' =>date('d-m-Y',strtotime($datalist->NoteDate)),
			'Qty' =>$datalist->Qty,
			'Price' =>'<label style="float:right">'.number_format($datalist->Price,0,'.','.').'</label>',
			'Subtotal' =>'<label style="float:right">'.number_format($datalist->Subtotal,0,'.','.').'</label>',
			'NoteType' =>$datalist->NoteType,
			
			'status' =>'<div class="text-left">'.$status=($datalist->NoteType =='dn')?"<label class='label label-info arrowed-right white'>DN</label>":"<label class='label label-warning arrowed-right white'>CN</label></div>",
            );
			$data[] = $row;
		}

		$output = array(
						"draw" => $_POST['draw'],
						"recordsTotal" => $this->M_cndn->count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2),
						"recordsFiltered" => $this->M_cndn->count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2),
						"data" => $data,
				);
		//output to json format
		echo json_encode($output);
}








}


