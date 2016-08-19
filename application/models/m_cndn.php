<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_cndn extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
function get_datatables($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
		//$this->db->group_by(array("b.House"));
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
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
public function count_all($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
}
public function count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
	}
	
	
	
	
}
