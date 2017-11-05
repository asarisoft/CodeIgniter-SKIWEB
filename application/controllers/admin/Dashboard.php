<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	public function index()
	{	
		$this->load->view('header_and_sidebar');
		$this->load->view('dashboard');
	}
}
