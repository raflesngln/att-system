<?php
class Model_app extends CI_Model{
    function __construct(){
        parent::__construct();
    }
//  kode job
    public function getInvoice()
    {
		$bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(InvoiceNo,5)) as kd_max from invoice WHERE MID(InvoiceNo,8,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "INV".date('Ym').$kd;
    }

//    kode house
    public function getJob($status)
    {
		$bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(JobNo,5)) as kd_max from outgoing_connote WHERE MID(JobNo,8,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "JOB".date('Ym').$kd;
    }
	
//  kode job
    public function getHouseNo()
    {
		$bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(HouseNo,4)) as kd_max from outgoing_connote WHERE MID(HouseNo,7,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "08".date('Ym').$kd;
    }
	//    kode house
    public function getJobMaster($status)
    {
		$bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(JobNo,5)) as kd_max from outgoing_master WHERE MID(JobNo,8,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "JOT".date('Ym').$kd;
    }
	
//    kode job
    public function getHouseMasterNo()
    {
		$bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(HouseNo,5)) as kd_max from outgoing_master WHERE MID(HouseNo,9,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "OM08".date('Ym').$kd;
    }

//    kode job
    public function getConnote()
    {
        $bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(HouseNo,4)) as kd_max from booking_items WHERE MID(NoConnote,8,2)='$bulan'");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }
        else
        {
            $kd = "00001";
        }
        return "CON".date('Ym').$kd;
    }
//    kode job
    public function getCargoNo($kode)
    {
        $bulan=date('m');
        $query = $this->db->query("select MAX(RIGHT(CargoNo,8)) as kd_max from cargo_manifest");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%08s", $tmp);
            }
        }
        else
        {
            $kd = "00000001";
        }
        return $kode.$kd;
    }
//=====================login member cek============================
    function login($table,$username,$password) {
		
	$query=$this->db->query("select*from ".$table." where UserName='$username' and Password='$password'");		
	return $query->result();
    }

	
//=================== DELETEA ===============================

		function delete_data($table,$kolom,$id)
	{
		$this->db->where($kolom,$id);
		$this->db->delete($table);
	}	
//=================== select1 ===============================

		function select1($table,$kolom,$id)
	{
		 $query = $this->db->query("select*from $table where $kolom='$id'");
		return $query->result();
	}	
//========================INSERT ========================
public function insert($table,$data) {
	 $this->db->insert($table,$data);
    }
//=====================get data all============================
    public function selectall($tabel)
    {
        $query = $this->db->query("select*from ".$tabel."");
		return $query->result();
    }
	//=====================get data all============================
    public function getdata($tabel,$where)
    {
        $query = $this->db->query("select * from ".$tabel." $where");
		return $query->result();
    }
			//=====================get data all============================
    public function getrace($tabel,$where)
    {
        $query = $this->db->query("SELECT BookingNo,MasterJob,AWB,StatusName,Origin_code,StatusUpdate,Destination_Code,max(StatusCode) as max from ".$tabel." $where");
		return $query->result();
    }
		
		//=====================get data all============================
    public function getdatapaging($kolom,$tabel,$where)
    {
        $query = $this->db->query("select ".$kolom." from ".$tabel." $where");
		return $query->result();
    }
	//===============VIEW kwitansi WITH PAGING=============================
		function getdatapaginggggg($limit,$offset,$where)
	{
		$q = $this->db->query("SELECT * from surat_tugas a 
		inner join lhs b on a.id_surat_tugas=b.id_surat_tugas 
		inner join surveyor c on a.id_pegawai=c.id_pegawai
		inner join asuransi d on a.id_asuransi=d.id_asuransi
		$where
		order by b.id_lhs DESC LIMIT $offset,$limit");
		return $q->result();
	}
	
//=====================get data all============================
    public function select_id($tabel,$kolom,$id)
    {
        $query = $this->db->query("select*from ".$tabel." a 
		inner join transaction_details b on a.transc_id=b.transc_id
		inner join customer c on a.custCode=c.custCode
		where a.transc_id='$id'
		");
		return $query->result();
    }



//====================UPDATE data=====================================	 
	    function update($table,$kolom,$id,$data)
	    {
	      $this->db->where($kolom,$id);
	       $ubah= $this->db->update($table,$data);
			return $ubah;
	    }

//=============== Hitung isi tabel===============================
		function hitung_isi_tabel($kolom,$tabel,$seleksi)
	{
		$q = $this->db->query("SELECT ".$kolom." from ".$tabel." $seleksi");
		return $q;
	}

	//=====================get data all============================
    public function selectedid($tabel,$where)
    {
        $query = $this->db->query("select*from ".$tabel." a
		right join asuransi c on a.id_asuransi=c.id_asuransi
		 $where ");
		return $query->result();
    }
		
	//    KODE jurnal
    public function usercode()
    {
        $query = $this->db->query("select MAX(RIGHT(user_id,3)) as kd_max from user");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd ='USR-'. sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = 'USR-'."001";
        }
        return $kd;
    }	
	//    KODE jurnal
    public function kodetrans()
    {
        $query = $this->db->query("select MAX(RIGHT(transc_id,3)) as kd_max from transaction");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd ='CSS-'. sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = 'CSS-'."001";
        }
        return $kd;
    }

		//    KODE kodeinvoice
    public function kodeinvoice()
    {
        $query = $this->db->query("select MAX(RIGHT(invoice_id,3)) as kd_max from invoice");
        $kd = "";
        if($query->num_rows()>0)
        {
            foreach($query->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd ='INV-'. sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = 'INV-'."001";
        }
        return $kd;
    }
	
	//========================INSERT ========================
public function backup($folder,$table) {
      $query = $this->db->query("SELECT * INTO OUTFILE ".$folder." FROM $table");
      return $query->result();
    }
	

			
}