<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buy_Model extends CI_Model {
	var $table = 'buy';
	var $column_order = array('address', 'subject', 'category'); 
	var $column_search = array('address', 'subject', 'category'); 
	var $order = array('id' => 'desc'); 

	public function __construct() {
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query() {
		$this->db->from($this->table);
		$i = 0;
			foreach ($this->column_search as $item) {
				if($_POST['search']['value']) {
					if($i===0) {
						$this->db->group_start();
						$this->db->like($item, $_POST['search']['value']);
					} else {
						$this->db->or_like($item, $_POST['search']['value']);
					}
					if(count($this->column_search) - 1 == $i)
						$this->db->group_end();
				}
			$i++;
		}
		if(isset($_POST['order'])){
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	// needed 
	public function count_all()	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	// needed
	public function count_filtered() {
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

	// needed 
	public function get_datatables() {
		$this->_get_datatables_query();
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	// needed 
	public function get_by_id($id) {
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	// needed 
	public function save($data) {
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	// needed 
	public function update($where, $data) {
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	// needed 
	public function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}

	public function get_filtered_buy($type, $limit) {
		$this->db->from($this->table);
		$this->db->where('category', $type);
		$this->db->order_by('id', 'desc');
		if ($limit > 0) {
			$this->db->limit($limit);
		}
		$query = $this->db->get();
		return $query->result_array();
	}


	public function fetch_sell_param($limit, $start, $category) {
    	$this->db->from($this->table);
    	$this->db->where('category', $category);
    	$this->db->order_by('id', 'desc');
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			return $query->result_array();
        }
        return false;
    }


}
