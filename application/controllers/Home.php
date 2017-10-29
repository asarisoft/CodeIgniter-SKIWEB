<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()	{
		$data['active_menu'] = "index";
		$this->load->view('header_view', $data);
		$this->load->view('index_view');
		$this->load->view('footer_view');
	}

	public function about()	{
		$data['active_menu'] = "about";
		$this->load->view('header_view', $data);
		$this->load->view('about_view');
		$this->load->view('footer_view');	
	}

	public function recycle(){
		$data['active_menu'] = "recycle";
		$id = ($this->input->get('id')) ? $this->input->get('id') : '';
		$this->load->view('header_view', $data);
		$this->load->view('recycle_view'.$id);
		$this->load->view('footer_view');	
	}

	public function business(){
		$data['active_menu'] = "business";
		$id = ($this->input->get('id')) ? $this->input->get('id') : '';
		$this->load->view('header_view', $data);
		$this->load->view('business_view'.$id);
		$this->load->view('footer_view');	
	}

	public function gallery(){
		$data['active_menu'] = "gallery";
		$this->load->view('header_view', $data);
		$this->load->view('gallery_view');
		$this->load->view('footer_view');	
	}

	public function contact()	{
		$data['active_menu'] = "contact";
		$this->load->view('header_view', $data);
		$this->load->view('contact_view');
		$this->load->view('footer_view');	
	}
}

