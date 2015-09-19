<?php

class Admin_model extends CI_Model{
	
    function __construct(){
        parent::__construct();
    }
	
//=====================login member cek============================
    function cek($username,$password) {

$query=$this->db->query("select*from tbl_admin where username='$username' and password='$password'");
		return $query->result();
    }
//=================== UPdate ===============================

		function update_data($table,$kolom,$id,$data)
	{
		$this->db->where($kolom,$id);
		$this->db->update($table,$data);
	}
//=====================get data selecting============================
    public function select_id($tabel,$kolom,$id)
    {
        $query = $this->db->query("select*from ".$tabel." where ".$kolom."='$id'");
		return $query->result();
    }
   
}