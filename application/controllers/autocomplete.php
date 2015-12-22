<?php
class Autocomplete extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->model('Mautocomplete');
    }   

function index(){  

$this->load->view('pages/booking/domesctic_outgoing_house');
}
	
function lookup_sender(){ 
     // process posted form data (the requested items)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->Mautocomplete->lookup_sender($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->custCode,
                     'value' => $row->custCode.'-'.$row->custName,
                     'name' => $row->custName,
                     'phone' => $row->Phone,
					 'address' => $row->Address,
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
    }

function lookup_cnote(){ 
  // process posted form data (the requested items code )
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->Mautocomplete->lookup_cnote($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->Origin,
                     'value' => $row->Origin.'-'.$row->Shipper,
                     'name' => $row->HouseNo,
                     'tanggal' => $row->ETD,
					 'layanan' => $row->Service,
					 'tujuan' => $row->Origin,
					 'jml' => $row->GrossWeight,
					 'berat' => $row->GrossWeight
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
    }


function lookup_receivement(){ 
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->Mautocomplete->lookup_receive($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->custCode,
                     'value' => $row->custCode.'-'.$row->custName,
                     'name' => $row->custName,
                     'phone' => $row->Phone,
					 'address' => $row->Address,
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('autocomplete/index',$data); //Load html view of search results
        }
    }



}
