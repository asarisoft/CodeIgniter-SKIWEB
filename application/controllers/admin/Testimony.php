<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimony extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Testimony_Model','testimony');
	}

    public function index() {
        $data['model_name'] = "testimony";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/testimony_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->testimony->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $testimony) {
            $no++;
            $row = array();
            $row[] = $testimony->text;
            $row[] = '<a class="btn btn-sm btn-info" href="testimony/edit/'.$testimony->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$testimony->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->testimony->count_all(),
            "recordsFiltered" => $this->testimony->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/testimony_view_add');
    }

    function save_data() {  
        $this->form_validation->set_rules('text', 'text', 'required');  
        if($this->form_validation->run() == True) {
            $data['text'] = $this->input->post('text');
            $insert = $this->testimony->save($data);
            redirect('admin/testimony.html');
        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/testimony_view_add');
        }

    }

    function edit($id) {
        $data['testimony'] = $this->testimony->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/testimony_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('text', 'Text', 'required');  
        if($this->form_validation->run() != false){
            $data_update['text'] = $this->input->post('text');
            $this->testimony->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/testimony.html');
        } else {
            $data['testimony'] = $this->testimony->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/testimony_view_edit', $data);
        }
    }


    function delete($id) {  
        $this->testimony->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
