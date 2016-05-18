<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mcargo extends CI_Model {

//	var $table = 'persons';
//	var $column = array('firstname','lastname','gender','address','dob');
//var $order = array('id' => 'desc');
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


private function _get_datatables_query($nm_coloum,$orderby,$where)
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

	function get_datatables($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select('a.CargoReleaseCode,a.CargoDetails,a.ReleaseDate,b.AirLineName,sum(c.CWT) as jumcwt,sum(c.PCS) as jumpcs');
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("cargo_items c",'a.CargoReleaseCode=c.CargoReleaseCode','LEFT');
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
	}

	public function count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
	}
private function _get_datatables_smu($nm_coloum,$orderby,$where)
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

	function get_datatables_smu($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("ms_port c",'a.Destination=c.PortCode','LEFT');
		$this->db->join("ms_flight d",'a.FlightNumbDate1=d.FlightID','LEFT');
		$this->db->join("ms_airline e",'a.Airlines=e.AirLineCode','LEFT');
		$this->db->join("consol f",'a.NoSMU=f.MasterNo','LEFT');
		//$this->db->group_by('d.FlightNo');
		$this->_get_datatables_smu($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered_smu($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_smu($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2,'LEFT');
		$this->db->join("ms_port c",'a.Destination=c.PortCode','LEFT');
		$this->db->join("ms_flight d",'a.FlightNumbDate1=d.FlightID','LEFT');
		$this->db->join("ms_airline e",'a.Airlines=e.AirLineCode','LEFT');
		$this->db->join("consol f",'a.NoSMU=f.MasterNo','LEFT');
		return $this->db->count_all_results();
	}

	public function count_all_smu($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_port c",'a.Destination=c.PortCode','LEFT');
		$this->db->join("ms_flight d",'a.FlightNumbDate1=d.FlightID','LEFT');
		$this->db->join("ms_airline e",'a.Airlines=e.AirLineCode','LEFT');
		$this->db->join("consol f",'a.NoSMU=f.MasterNo','LEFT');
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
