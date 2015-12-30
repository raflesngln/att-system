<?php
class Mautocomplete extends CI_Model{

	function __construct(){
		 parent::__construct();
	}
	
	function lookup_sender($keyword){
       $this->db->select('*')->from('ms_customer');
        $this->db->like('custName',$keyword,'after');
		$this->db->where('isShipper','1');
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookup_cnote($keyword){
       $this->db->select('*')->from('outgoing_connote');
       $this->db->like('Origin',$keyword,'after');
		//$this->db->where('HouseNo',$keyword);
		//$this->db->where('isShipper','1');
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookup_receive($keyword){
       $this->db->select('*')->from('ms_customer');
        $this->db->like('custName',$keyword,'after');
		$this->db->where('isCnee','1');
        $query = $this->db->get();    
        
        return $query->result();
    }
}
