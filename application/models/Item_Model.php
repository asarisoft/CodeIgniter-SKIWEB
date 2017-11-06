<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item_Model extends CI_Model {

	var $table = 'transaction_item';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	public function delete_by_transaction_id($transaction_id)
	{
		$this->db->where('transaction_id', $transaction_id);
		$this->db->delete($this->table);
	}

	public function get_by_transaction_id($transaction_id)
	{
		$this->db->from($this->table);
		$this->db->where('transaction_id', $transaction_id);
		return $this->db->get()->result_array();
	}

}
