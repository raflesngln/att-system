<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_payment extends CI_Model {

//	var $table = 'persons';
//	var $column = array('firstname','lastname','gender','address','dob');
//var $order = array('id' => 'desc');
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
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
		$this->db->group_by(array("b.House"));
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
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		return $this->db->count_all_results();
}
	function count_filtered($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		return $this->db->count_all_results();
	}

//for income
function get_datatables_income($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		$this->_get_datatables_query_income($nm_coloum,$orderby,$where);
		$this->db->group_by(array("a.JurnalNo"));
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_datatables_query_income($nm_coloum,$orderby,$where)
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
public function count_all_income($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		return $this->db->count_all_results();
}
	function count_filtered_income($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query_income($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		return $this->db->count_all_results();
	}

//======================for report daily cash=========

function get_datatables_daily_cash($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		$this->db->join("ms_user f",'f.id_user=b.CreatedBy','LEFT');
		
		$this->_get_datatables_query_daily_cash($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_datatables_query_daily_cash($nm_coloum,$orderby,$where)
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
public function count_all_daily_cash($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
		return $this->db->count_all_results();
}
	function count_filtered_daily_cash($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_datatables_query_daily_cash($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("ms_customer c",'a.Customer=c.CustCode','LEFT');
		$this->db->join("outgoing_house d",'b.House=d.HouseNo','LEFT');
		$this->db->join("consol e",'b.House=e.HouseNo','LEFT');
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
	//========================INSERT ========================
public function outgoing_master($kode) {
      $query = $this->db->query("SELECT *
	  from outgoing_master a WHERE a.NoSMU='$kode'
	  ");
      return $query->result();
    }
	
	//===========FOR DEPOSITO ======//
	function get_data_topup_deposito($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->_get_topup_deposito_query($nm_coloum,$orderby,$where);
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_topup_deposito_query($nm_coloum,$orderby,$where)
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
public function count_all_topup_deposito($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
}
	function count_filtered_topup_deposito($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_topup_deposito_query($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		return $this->db->count_all_results();
	}
	//===========FOR DEPOSITO ======//
function get_data_jurnal($select,$nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->select($select);
	    $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1.'='.$kolom2,'LEFT');
		$this->db->join("account c",'c.kdac=a.kdac','LEFT');
		$this->_get_jurnal_query($nm_coloum,$orderby,$where);
		$this->db->order_by("a.JurnalId", "desc");
        if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
private function _get_jurnal_query($nm_coloum,$orderby,$where)
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
public function count_all_jurnal($nm_tabel,$nm_coloum,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("account c",'c.kdac=a.kdac','LEFT');
		return $this->db->count_all_results();
}
	function count_filtered_jurnal($nm_tabel,$nm_coloum,$orderby,$where,$nm_tabel2,$kolom1,$kolom2)
	{
		$this->_get_jurnal_query($nm_coloum,$orderby,$where);
        $this->db->from($nm_tabel);
		$this->db->join($nm_tabel2,$kolom1=$kolom2);
		$this->db->join("account c",'c.kdac=a.kdac','LEFT');
		return $this->db->count_all_results();
	}

}
