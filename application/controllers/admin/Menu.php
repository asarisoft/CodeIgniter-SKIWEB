<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Menu_Model','menu');
	}

    public function index() {
        $data['model_name'] = "menu";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/menu_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->menu->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $menu) {
            $no++;
            $row = array();
            $row[] = $menu->name;
            $row[] = $menu->queue;
            $row[] = $menu->language;
            $row[] = $menu->url;
            $row[] = '<a class="btn btn-sm btn-info" href="menu/edit/'.$menu->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->menu->count_all(),
            "recordsFiltered" => $this->menu->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['menu'] = $this->menu->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/menu_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('name', 'Name', 'required');  
        if($this->form_validation->run() != false){
            $data_update['name'] = $this->input->post('name');
            $data_update['url'] = $this->input->post('url');
            $data_update['language'] = $this->input->post('language');
            $data_update['queue'] = $this->input->post('queue');
            $this->menu->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/menu.html');
        } else {
            $data['menu'] = $this->menu->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/menu_view_edit', $data);
        }
    }


}

