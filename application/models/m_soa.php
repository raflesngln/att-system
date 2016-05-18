<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_soa extends CI_Model {

//	var $table = 'persons';
//	var $column = array('firstname','lastname','gender','address','dob');
//var $order = array('id' => 'desc');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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

	//-- for 3 choosen ---///////////////////////////////////////////
	function get_datatablesconsol($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->_get_datatables_consol($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_datatables_consol($nm_coloum,$orderby,$where)
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
			$this->db->order_by($column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
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
public function count_consol($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
}
	function count_filteredconsol($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_consol($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
	}
		//-- for 3 choosen ---///////////////////////////////////////////
	function get_datatablecargo($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');

		$this->db->join("ms_airline c",'a.Airline=c.AirLineCode','LEFT');
		$this->db->join("cargo_items d",'a.CargoReleaseCode=d.CargoReleaseCode','LEFT');
		$this->db->join("ms_flight e",'e.FlightID=d.FlightNumber','LEFT');
$this->db->group_by('a.CargoReleaseCode');
		$this->_get_datatables_consol($nm_coloum,$orderby,$where);

        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
}
