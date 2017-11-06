<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell_Model extends CI_Model {
	var $table = 'sell';
	var $column_order = array('subject', 'place', 'category'); 
	var $column_search = array('subject', 'place', 'category'); 
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

	// custom 
	public function get_by_id_joined($id) {
		$this->db->select(array('sell.*','user.name as agent_name', 'user.email', 'user.phone', 'user.img_url as agent_img_url'));
		$this->db->from($this->table);
		$this->db->join('user', 'agent_id = user.id', 'left');
		// $this->db->join('city_area', 'city_id = category.id', 'left');
		$this->db->where('sell.id', $id);
		$query = $this->db->get();
		return $query->row();
	}
   
    public function count_param($param){
    	$this->db->from($this->table);
    	if ($param['s_city']) {
    		$this->db->where('city', $param['s_city']);
    	}
    	if ($param['s_area']) {
    		$this->db->where('area', $param['s_area']);
    	}
    	if ($param['s_category']) {
    		$this->db->where('category', $param['s_category']);
    	}
    	if ($param['s_bedroom']) {
    		if ($param['s_bedroom'] == "4") {
    			$this->db->where('bedroom > 3');
    		} else {
	    		$this->db->where('bedroom', $param['s_bedroom']);
    		}
    	}
    	if ($param['s_price']) {
    		if ($param['s_price'] == "1") { 
    			$this->db->where('price <', 1000000000);
    		} else if ($param['s_price'] == "2") {
    			$this->db->where('price >=', 1000000000);
    			$this->db->where('price <=', 2000000000);
    		} else if ($param['s_price'] == "3") {
    			$this->db->where('price >=', 2000000000);
    			$this->db->where('price <=', 3000000000);
    		} else if ($param['s_price'] == "4") {
    			$this->db->where('price >', 3000000000);
    		}	
    	}
 	    return $this->db->count_all_results();
	}

    public function fetch_sell_param($limit, $start, $param) {
    	$this->db->from($this->table);
    	if ($param['s_city']) {
    		$this->db->where('city', $param['s_city']);
    	}
    	if ($param['s_area']) {
    		$this->db->where('area', $param['s_area']);
    	}
    	if ($param['s_category']) {
    		$this->db->where('category', $param['s_category']);
    	}
    	if ($param['s_bedroom']) {
    		if ($param['s_bedroom'] == "4") {
    			$this->db->where('bedroom > 3');
    		} else {
	    		$this->db->where('bedroom', $param['s_bedroom']);
    		}
    	}
    	if ($param['s_price']) {
    		if ($param['s_price'] == "1") { 
    			$this->db->where('price <', 1000000000);
    		} else if ($param['s_price'] == "2") {
    			$this->db->where('price >=', 1000000000);
    			$this->db->where('price <=', 2000000000);
    		} else if ($param['s_price'] == "3") {
    			$this->db->where('price >=', 2000000000);
    			$this->db->where('price <=', 3000000000);
    		} else if ($param['s_price'] == "4") {
    			$this->db->where('price >', 3000000000);
    		}	
    	}
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
			return $query->result_array();
        }
        return false;
    }

    public function get_filtered($category, $id) {
		$this->db->from($this->table);
		$this->db->where('category', $category);
		$this->db->where('id !=', $id);
		$this->db->limit('3');
		$query = $this->db->get();
		return $query->result_array();
	}

}
