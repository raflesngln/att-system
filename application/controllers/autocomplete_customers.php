<?php
class Autocomplete_customers extends CI_Controller{
    function __construct(){
        parent::__construct();
        if($this->session->userdata('login_status') != TRUE ){
            $this->session->set_flashdata('notif','LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
            redirect('');
        };
        $this->load->model('model_app');
        $this->load->model('mautocomplete');
    }   

function index(){  

$this->load->view('pages/booking/domesctic_outgoing_house');
}
function lookup_om(){ 
     // process posted form data (the requested items)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->mautocomplete->lookup_om($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
			//Add a row to array
              $data['message'][] = array( 
                    'id'=>$row->NoSMU,
                     'value' =>$row->NoSMU,
                     'name' => $row->JobNO,
                     'origin' => $row->Origin,
					 'destination' => $row->Destination,
					 'cwt' => $row->CWT,
                  );  
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
function lookup_sender(){ 
     // process posted form data (the requested items)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
        $query = $this->mautocomplete->lookup_sender($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->CustCode,
                     'value' =>$row->CustName,
					 'nomor' =>$row->CustCode,
                     'name' => $row->CustName,
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
        $query = $this->mautocomplete->lookup_cnote($keyword); //Search DB
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
        $query = $this->mautocomplete->lookup_receivement($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->CustCode,
                     'value' =>$row->CustName,
                     'name' => $row->CustName,
					 'nomor' =>$row->CustCode,
                     'phone' => $row->Phone,
					 'address' => $row->Address,
					 'email' => $row->Email,
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
function lookup_customers(){ 
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
		$kolom='custName';
		$tabel='ms_customer';
		$where='isCnee';$kondisi='1';
		
        $query = $this->mautocomplete->lookup_receive($keyword,$kolom,$tabel,$where,$kondisi); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->custCode,
                     'value' => $row->custName,
                     'name' => $row->custName,
                     'phone' => $row->Phone,
					 'email' => $row->Email,
					 'initial' => $row->custInitial,
					 'remarks' => $row->Remarks,
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('Autocomplete_customers/index',$data); //Load html view of search results
        }
    }
function lookup_address_type(){ 
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
		$kolom='AddressTypeName';
		$tabel='ms_address_type';
		
        $query = $this->mautocomplete->lookupall($keyword,$kolom,$tabel); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->AddressTypeCode,
                     'value' => $row->AddressTypeName,
                     'name' => $row->AddressTypeName,
                     'desc' => $row->AddressTypeDesc,
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('Autocomplete_customers/index',$data); //Load html view of search results
        }
    }
function lookup_contact_type(){ 
        // process posted form data (the requested items like province)
        $keyword = $this->input->post('term');
        $data['response'] = 'false'; //Set default response
		$kolom='ContactTypeName';
		$tabel='ms_contact_type';
		
        $query = $this->mautocomplete->lookupall($keyword,$kolom,$tabel); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create an array
            foreach( $query as $row )
            {
              $data['message'][] = array( 
                    'id'=>$row->ContactTypeCode,
                     'value' => $row->ContactTypeName,
                     'name' => $row->ContactTypeName,
                     'desc' => $row->ContactTypeDesc,
                  );  //Add a row to array
            }
        }
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
            
        }
        else
        {
            $this->load->view('Autocomplete_customers/index',$data); //Load html view of search results
        }
    }



}
