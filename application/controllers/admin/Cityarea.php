<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cityarea extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('CityArea_Model','cityarea');
	}

	public function index()	{
		$data['model_name'] = "cityarea";
		$this->load->view('admin/header_and_sidebar');
		$this->load->view('admin/cityarea_view');
		$this->load->view('admin/footer', $data);
	}

	public function ajax_list()	{
		$list = $this->cityarea->get_datatables();
		$data = array();
		$no = $_POST['start'];
		foreach ($list as $cityarea) {
			$no++;
			$row = array();
			$row[] = $cityarea->city;
			$row[] = $cityarea->area;
			$row[] = '<a class="btn btn-sm btn-info" href="cityarea/edit/'.$cityarea->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
				<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$cityarea->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
			$data[] = $row;
		}

		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->cityarea->count_all(),
			"recordsFiltered" => $this->cityarea->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	function add() {
		$this->load->view('admin/header_and_sidebar');
		$this->load->view('admin/cityarea_view_add');
	}

	public function json_search_parent_city() {
		$query = $this->cityarea->get_city_list();;
        $data = array();
        foreach ($query as $key => $value) {
            $data[] = array('id' => $value->id, 'name' => $value->city);
        }
        echo json_encode($data);
	}

	function save_data() {	
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		if($this->form_validation->run() != false) {
			$data = array(
				'city' => $this->input->post('city'),
				'area' => $this->input->post('area'),
			);
			$insert = $this->cityarea->save($data);
			redirect('admin/city-area.html');
		} else {
			$this->load->view('admin/header_and_sidebar');
			$this->load->view('admin/cityarea_view_add');
		}
	}

	function edit($id) {
		$data['cityarea'] = $this->cityarea->get_by_id($id);
		$this->load->view('admin/header_and_sidebar');
		$this->load->view('admin/cityarea_view_edit', $data);
	}

	function update() {	
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		if($this->form_validation->run() != false){
			$data = array(
					'city' => $this->input->post('city'),
					'area' => $this->input->post('area'),
				);
			$this->cityarea->update(array('id' => $this->input->post('id')), $data);
			redirect('admin/city-area.html');
		}else{
			$data['cityarea'] = $this->cityarea->get_by_id($this->input->post('id'));
			$this->load->view('admin/header_and_sidebar');
			$this->load->view('admin/cityarea_view_edit', $data);
		}

	}

	function delete($id) {	
		$this->cityarea->delete($id);
		echo json_encode(array("status" => TRUE));
	}

}
