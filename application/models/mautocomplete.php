<?php
class Mautocomplete extends CI_Model{

	function __construct(){
		 parent::__construct();
	}
	function lookup_om($keyword){
       $this->db->select('*')->from('outgoing_master');
        $this->db->like('NoSMU',$keyword,'after');
		$this->db->where('status_invoice','0');
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookup_sender($keyword){
       $this->db->select('*')->from('ms_customer');
        $this->db->like('CustName',$keyword,'after');
		$this->db->where('IsShipper','1');
        $query = $this->db->get();    
        return $query->result();
    }
	function lookup_stok_smu($keyword,$airline){
       $this->db->select('*')->from('stock_smu');
        $this->db->like('NoSMU',$keyword,'after');
		$this->db->where('isActive','1');
		$this->db->where('AirLineCode',$airline);
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
	function lookup_receive($keyword,$kolom,$tabel,$where,$kondisi){
       $this->db->select('*')->from($tabel);
        $this->db->like($kolom,$keyword,'after');
		$this->db->where($where,$kondisi);
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookup_receivement($keyword){
       $this->db->select('*')->from('ms_customer');
        $this->db->like('custName',$keyword,'after');
		$this->db->where('isCnee','1');
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookupall($keyword,$kolom,$tabel){
       $this->db->select('*')->from($tabel);
        $this->db->like($kolom,$keyword,'after');
        $query = $this->db->get();    
        
        return $query->result();
    }
	function lookup_cust($keyword){
       $this->db->select('*')->from('ms_customer');
        $this->db->like('custName',$keyword,'after');
		$this->db->where('isActive','1');
        $query = $this->db->get();    
        
        return $query->result();
    }
}

