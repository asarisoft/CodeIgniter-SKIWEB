<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

	var $data = array();

	public function __construct()
	{
		parent::__construct();
		$this->data['login_error'] = "";
	}

	public function login_process() {

		$user = $this->session->userdata('id');
		
		if ($user != "") {
			redirect('admin/user.html');
		}

		$this->form_validation->set_rules('username','Username','required');
		$this->form_validation->set_rules('password','Password','required');
		
		if($this->form_validation->run() == True){
			$username 	= $this->input->post('username');
			$password	= sha1($this->input->post('password'));

			$this->load->model('User_Model', 'user');
			$login_validation = $this->user->login_validaton($username, $password);
			if($login_validation->num_rows() > 0)
			{
				$employee = $login_validation->row();
				$session = array(
					'id' => $employee->id,
					'name' => $employee->name,
				);

				$this->session->set_userdata($session);	
				redirect('admin/user.html');
			}
			else
			{
				$this->data['login_error'] = "Incorrect username and password";
				$this->load->view('admin/login', $this->data);
			}
		}
		else
		{
			$this->load->view('admin/login', $this->data);
		}
	}

	function logout()
	{
		$this->session->unset_userdata('id');
		$this->session->unset_userdata('name');
		redirect('admin/login.html');
	}

	function confirm_email($id) {
		$this->load->database();
		$this->db->where('identifier', $id);
		if ($this->db->get('customer')->num_rows() == 0){
			show_404();
		} else {
			$this->db->update('customer', array('is_validated'=>'True'), array('identifier' => $id));
			$this->load->view('activated_view');
		}
	}

	public function unique_together($role) {
		if($this->session->userdata('role') != "Admin" && $role == "Admin") {
	        $this->form_validation->set_message('_set_role', "You can't set user as admin");
	        return false;
	    }
	    return True;
	}

}
