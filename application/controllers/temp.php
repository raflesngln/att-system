<?php
class Temp extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->helper('currency_format_helper');
    }	
	 
function view_charges(){  
	 	$page=$this->uri->segment(3);
      	$limit=10;
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
        $data['title']='list charges';
		$data['scrumb_name']='Data charges';
		$data['scrumb']='charges/view_charges';
		$data['service']=$this->model_app->getdata('ms_service',"order by svCode ASC LIMIT $offset,$limit");
		$data['list']=$this->model_app->getdata('ms_charges a',"inner join ms_service b on a.svCode=b.svCode order by a.ChargeCode ASC LIMIT $offset,$limit");
		$tot_hal = $this->model_app->hitung_isi_tabel('*','ms_charges a',"inner join ms_service b on a.svCode=b.svCode order by a.ChargeCode ASC");
        	//create for pagination		
			$config['base_url'] = base_url() . 'charges/view_charges/';
        	$config['total_rows'] = $tot_hal->num_rows();
        	$config['per_page'] = $limit;
			$config['uri_segment'] = 3;
	    	$config['first_link'] = 'First';
			$config['last_link'] = 'last';
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
       		$this->pagination->initialize($config);
			$data["paginator"] =$this->pagination->create_links();
		
		$data['view']='pages/charges/v_charges';
        $this->load->view('home/home',$data);
     }

//--SAVE--------
     function cart(){

     	$data['view']='pages/cart/filter';
     	 $this->load->view('home/home',$data);

     }
  public function delete_item(){
        $data = array(
                'rowid' => $this->uri->segment(3),
                'qty'   => 0);
                $this->cart->update($data);
       redirect('transaction/domesctic_outgoing_house');
    }
 public function delete_charge(){
	$kode=$this->uri->segment(3);
	if($this->session->userdata('login_status') != TRUE )
	   {
		  redirect('login');
	}
	else
	{
    $this->model_app->delete_data('temp_charges','tempChargeId',$kode);
	redirect('transaction/domesctic_outgoing_house');
    }	

 }



function save_item()
{	
$this->form_validation->set_rules('pcs','pcs','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	     {
		redirect('transaction/domesctic_outgoing_house');
	     }
		else
	     {
	     	$pcs=$this->input->post('pcs');
	     	$p=$this->input->post('panjang');
	     	$l=$this->input->post('lebar');
	     	$t=$this->input->post('tinggi');
	     	$kali=$p*$l*$t;
	     	$v=$kali/6000;
	     	foreach($this->cart->contents() as $items):
	     	$id=$items[id];
	     	endforeach;

	     $id+=1;
        $data = array(
            'id'      =>$id ,
            'qty'     =>$this->input->post('pcs'),
            'price'   =>$this->input->post('pcs'),
            'name'    =>$this->session->userdata('nameusr'),
            'p'    => $this->input->post('panjang'),
            'l'    => $this->input->post('lebar'),
            't'    => $this->input->post('tinggi'),
            'v'    => $v,
             );
        	 $this->cart->insert($data);

	/*	$newdata=array(
		'pcs'=>$this->input->post('pcs'),
		'p'=>$this->input->post('p'),
		'l'=>$this->input->post('l'),
		't'=>$this->input->post('t'),
		'v'=>$vol,
		'status'=>"items",
		);		
		 $this->model_app->insert('temporary',$newdata);
	*/	
		 }
			redirect('transaction/domesctic_outgoing_house');
 }
 //--SAVE--------
function save_temp_charge()
{	
$this->form_validation->set_rules('charge','charge','required|trim|xss_clean');

	 if ($this->form_validation->run() == FALSE)
	{ ?>
		<script type="text/javascript">
		alert('Please Complet input !');
		history.back();
		</script>

	<?php }

		else
	{
		    $data = array(
            'ChargeName'      =>$this->input->post('charge'),
            'Description'     =>$this->input->post('desc'),
            'Unit'   		  =>$this->input->post('unit'),
            'Qty'   		  =>$this->input->post('qty'),
            'Total'  		  => $this->input->post('unit') * $this->input->post('qty'),
            'Session'  		  =>"charges",
             );
		      $this->model_app->insert('temp_charges',$data);
		      redirect('transaction/domesctic_outgoing_house');
	}
}






}


