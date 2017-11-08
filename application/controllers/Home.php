<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Front_end {

	public function index()	{
		$data['active_menu'] = "index";
		$data['menu'] = $this->data_menu;
		$this->load->view('header_view', $data);
		$this->load->view('index_view');
		$this->load->view('footer_view');
	}

	public function about()	{
		$data['active_menu'] = "about";
		$data['menu'] = $this->data_menu;
		$this->load->view('header_view', $data);
		$this->load->view('about_view');
		$this->load->view('footer_view');	
	}

	public function recycle(){
		$data['active_menu'] = "recycle";
		$data['menu'] = $this->data_menu;
		$id = ($this->input->get('id')) ? $this->input->get('id') : '';
		$this->load->view('header_view', $data);
		$this->load->view('recycle_view'.$id);
		$this->load->view('footer_view');	
	}

	public function business(){
		$data['active_menu'] = "business";
		$data['menu'] = $this->data_menu;
		$id = ($this->input->get('id')) ? $this->input->get('id') : '';
		$this->load->view('header_view', $data);
		$this->load->view('business_view'.$id);
		$this->load->view('footer_view');	
	}

	public function gallery(){
		$data['active_menu'] = "gallery";
		$data['menu'] = $this->data_menu;
		$this->load->view('header_view', $data);
		$this->load->view('gallery_view');
		$this->load->view('footer_view');	
	}

	public function contact()	{
		$data['active_menu'] = "contact";
		$data['menu'] = $this->data_menu;
		$this->load->view('header_view', $data);
		$this->load->view('contact_view');
		$this->load->view('footer_view');	
	}
}

