<?php
class Cust extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
    }	
	 
function view_cust(){  
	 
		$data['customer']=$this->model_app->getdata('ms_customer',"order by custCode");
		
		$data['view']='cust';
        $this->load->view('home/home',$data);
     }
function search_cust(){
	$kode = $_GET['kode'];
	
	$data['customer']=$this->model_app->getdata('ms_customer',"WHERE custCode='$kode'");
	
	foreach($customer as $row){
		$data['json'][] = array( 
                    'id'=>$row->custCode,
                     'value' =>$row->custName,
                     'custCode' => $row->custCode,
                     'custName' => $row->custName,
                  );  //Add a row to array

	}
	    echo json_encode($data);
    	//exit;
	//}	
}




}


