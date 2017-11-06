<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction_Model extends CI_Model {
	var $table = 'transaction';
	var $order = array('number' => 'desc'); 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	private function _get_datatables_query($type_)
	{	
		if ($type_=='index') {
			$column_order = array('number','date', 'customer_id', 'category_id', 'subject', 'status', 'confirmed'); 
			$column_search = array('number','date', 'customer_id', 'customer.name', 'category_id', 
									   'category.category', 'subject', 'status', 'confirmed'); 
			$this->db->select(array('transaction.*','customer.name as customer_name','category.category'));
			$this->db->from($this->table);
			$this->db->join('customer', 'customer_id = customer.id', 'left');
			$this->db->join('category', 'category_id = category.id', 'left');
		} else {
			$column_order = array('fixing_date','employee.name', 'number', 'subject', 'problem', 'status', 'status'); 
			$column_search = array('fixing_date','employee.name', 'number', 'subject', 'problem', 'status', 'status'); 
			$this->db->select(array('transaction.*','customer.name as customer_name','employee.name as employee_name'));
			$this->db->from($this->table);
			$this->db->join('customer', 'customer_id = customer.id', 'left');
			$this->db->join('employee', 'employee_id = employee.id', 'left');
		}

		$i = 0;

		// print_r($_POST);
		foreach ($column_search as $item) // loop column 
		{
			if($_POST['search']['value']) // if datatable send POST for search
			{
				
				if($i===0)
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}

			if($_POST['minDate'] != "" && $_POST['maxDate'] != "") // if datatable send POST for search
			{
				$this->db->where('date >= ', date('Y-m-d', strtotime($_POST['minDate'])));
				$this->db->where('date <= ', date('Y-m-d', strtotime($_POST['maxDate'])));
			}

			if($_POST['status'] != "" ) // if datatable send POST for search
			{
				$this->db->where('status = ', $_POST['status']);
			}

			$i++;
		}
		
		if(isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		}
		else if(isset($this->order))
		{	
			$this->db->order_by(key($this->order), $this->order[key($this->order)]);
		} else {
			$this->db->order_by("date", "desc");
		}
	}

	function get_datatables($type_)
	{	
		$this->_get_datatables_query($type_);
		if($_POST['length'] != -1) {
			$this->db->limit($_POST['length'], $_POST['start']);
		}
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered($type_)
	{
		$this->_get_datatables_query($type_);
		$query = $this->db->get();
		return $query->num_rows();
	}

	public function count_all()
	{
		$this->db->from($this->table);
		return $this->db->count_all_results();
	}

	public function get_active_transaction($customer_id)
	{
		$this->db->from($this->table);
		$this->db->where('customer_id',$customer_id);
		$this->db->where('status', 'Open');
		$this->db->or_where('status', 'On Process');
		return $this->db->count_all_results();
	}

	public function get_by_id($id)
	{
		$this->db->from($this->table);
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_by_customer_id($customer_id) {
		$this->db->select(array('transaction.*','employee.name','category.category'));
		$this->db->from($this->table);
		$this->db->join('employee', 'employee_id = employee.id', 'left');
		$this->db->join('category', 'category_id = category.id', 'left');
		$this->db->where('customer_id', $customer_id);
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_by_number($number)
	{
		$this->db->select(array('transaction.*','customer.name','category.category', 'category.parent_category'));
		$this->db->from($this->table);
		$this->db->join('customer', 'customer_id = customer.id', 'left');
		$this->db->join('category', 'category_id = category.id', 'left');
		$this->db->where('number',$number);
		$query = $this->db->get();
		return $query->row();
	}

	public function get_last_row() {
		$this->db->select("number");
		$this->db->from($this->table);
		$this->db->limit(1);
		$this->db->order_by('id',"DESC");
		$query = $this->db->get();
		return $query->row();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function update($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table);
	}


}
