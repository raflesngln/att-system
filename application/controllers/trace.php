<?php
class Trace extends CI_Controller{

	
	
	
//    INSERT DATA TO SESSION
    function index(){
        $data = array(
		'scrumb_name'=>'Goods Tracking',
		'scrumb'=>'trace',
	  		'title'=>'Tracking Goods',
			'view'=>'pages/trace/v_add_search'
	
        );
		$this->load->view('home/home',$data);
    }
//------------delete data----------------------------------
function check_trace(){

	  $code=$this->input->post('code');
      $pecah=explode(",",$code);
     $code0=$pecah[0];$code1=$pecah[1];$code2=$pecah[2];$code3=$pecah[3];
	 $code4=$pecah[4];$code5=$pecah[5];$code6=$pecah[6];$code7=$pecah[7];
	 $code8=$pecah[8];$code9=$pecah[9];
	$data=array(
	 'title'=>'Add transaksi',
	 'scrumb_name'=>'Goods Tracking',
	 'scrumb'=>'trace',
	 'history'=>$this->model_app->getrace("jobhistory","where AWB in('$code0','$code1','$code2','$code3','$code4','$code5','$code6','$code7','$code8','$code9') group by AWB"),
	 'detail'=>$this->model_app->getdata('jobhistory',"where AWB in('$code0','$code1','$code2','$code3','$code4','$code5','$code6','$code7','$code8','$code9') group by AWB"),
	 'view'=>'pages/trace/v_result',
	 	);
	$this->load->view('home/home',$data);

		  
	
}


function trace_details(){

	$code=$this->uri->segment(3);
	$data=array(
	 'title'=>'Detail Tracing',
	 'scrumb_name'=>'Goods Tracking',
	 'scrumb'=>'trace',
	 'header'=>$this->model_app->getdata('jobhistory',"where BookingNo='$code' LIMIT 1"),
	 'details'=>$this->model_app->getdata('jobhistory',"where BookingNo='$code' order by StatusCode Desc"),
	 'view'=>'pages/trace/trace_details',
	 	);
	$this->load->view('home/home',$data);
 }







}


