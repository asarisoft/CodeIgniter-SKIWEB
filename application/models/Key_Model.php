<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Key_Model extends CI_Model {

	var $table = 'token_keys';
	var $order = array('id' => 'desc'); 

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function get_datatables()
	{
		$this->db->from($this->table);
		$query = $this->db->get();
		return $query->result();
	}


	function _generate_key()
    {
        do
        {
            // Generate a random salt
            $salt = base_convert(bin2hex($this->security->get_random_bytes(64)), 16, 36);

            // If an error occurred, then fall back to the previous method
            if ($salt === FALSE)
            {
                $salt = hash('sha256', time() . mt_rand());
            }

            $new_key = substr($salt, 0, config_item('rest_key_length'));
        }
        while ($this->_key_exists($new_key));

        return $new_key;
    }

    function _key_exists($key)
    {	
    	$this->db->from($this->table);
        $this->db->where(config_item('rest_key_column'), $key);
        return $this->db->count_all_results() > 0;
    }


	// function count_filtered()
	// {
	// 	$this->_get_datatables_query();
	// 	$query = $this->db->get();
	// 	return $query->num_rows();
	// }

	// public function count_all()
	// {
	// 	$this->db->from($this->table);
	// 	return $this->db->count_all_results();
	// }

	// public function get_by_id($id)
	// {
	// 	$this->db->from($this->table);
	// 	$this->db->where('id',$id);
	// 	$query = $this->db->get();

	// 	return $query->row();
	// }

	public function save($data)
	{
		$this->db->insert($this->table, $data);
		return $this->db->insert_id();
	}

	// public function update($where, $data)
	// {
	// 	$this->db->update($this->table, $data, $where);
	// 	return $this->db->affected_rows();
	// }

	public function delete_key($user_id, $key)
	{
		$this->db->where('user_id', $user_id);
		$this->db->where('key', $key);
		$this->db->delete($this->table);
	}


}
