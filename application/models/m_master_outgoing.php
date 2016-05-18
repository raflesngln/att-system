<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_master_outgoing extends CI_Model {

//	var $table = 'persons';
//	var $column = array('firstname','lastname','gender','address','dob');
//var $order = array('id' => 'desc');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_datatables3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select('a.NoSMU,a.ETD,a.Origin,a.Destination,a.Shipper,a.Consigne,a.PCS,a.CWT,a.FinalCWT,a.Consolidation,a.StatusProses,b.CustName as sender,c.CustName as receiver,d.PortName as ori,e.PortName as desti', FALSE);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("ms_customer c",'a.Shipper=c.CustCode','LEFT');
		$this->db->join("ms_port d",'a.Origin=d.PortCode','LEFT');
		$this->db->join("ms_port e",'a.Destination=e.PortCode','LEFT');
		$this->_get_datatables_query3($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_datatables_query3($nm_coloum,$orderby,$where)
	{	
		$i = 0;
		foreach ($nm_coloum as $item) 
		{
			if($_POST['search']['value'])
				($i===0) ? $this->db->like($item, $_POST['search']['value']) : $this->db->or_like($item, $_POST['search']['value']);
			$column[$i] = $item;
			$i++;
		}
		
		if(isset($_POST['order']))
		{
							$n=0;
            $sort=$_POST['order'];
            foreach($sort as $i =>$val){
             $this->db->order_by($column[$_POST['order'][$n]['column']], $_POST['order'][$n]['dir']);   
             $n++;
            }
			//$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($orderby))
		{
			$order = $orderby;
			$this->db->order_by(key($order), $order[key($order)]);
		}
		
		if($where != ''){
        $this->db->where($where); 
		}
}
public function count_all3($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Consigne=c.CustCode','LEFT');
		$this->db->join("ms_port d",'a.Origin=d.PortCode','LEFT');
		$this->db->join("ms_port e",'a.Destination=e.PortCode','LEFT');
		return $this->db->count_all_results();
}
	function count_filtered3($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query3($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Consigne=c.CustCode','LEFT');
		$this->db->join("ms_port d",'a.Origin=d.PortCode','LEFT');
		$this->db->join("ms_port e",'a.Destination=e.PortCode','LEFT');
		return $this->db->count_all_results();
	}
	public function get_by_id($id,$nmtabel,$key)
	{
		$this->db->from($nmtabel);
		$this->db->where($key,$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function save($data,$nmtabel)
	{
		$this->db->insert($nmtabel, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data, $nmtabel)
	{
		$this->db->update($nmtabel, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id,$nmtabel,$key)
	{
		$this->db->where($key, $id);
		$this->db->delete($nmtabel);
	}


}
