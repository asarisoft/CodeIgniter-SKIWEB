<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Footer extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Footer_Model','footer');
        $this->config_upload['upload_path'] = './assets/img/footer/';
        $this->load->library('upload', $this->config_upload);

    }

    public function index() {
        $data['model_name'] = "footer";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/footer_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->footer->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $footer) {
            $no++;
            $row = array();
            $row[] = $footer->description;
            $row[] = '<a class="btn btn-sm btn-info" href="footer/edit/'.$footer->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->footer->count_all(),
            "recordsFiltered" => $this->footer->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['footer'] = $this->footer->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/footer_view_edit',$data);
    }

    function update() {  
        $this->form_validation->set_rules('description', 'Description', 'required');  
        if($this->form_validation->run() != false){
            $data_update['description'] = $this->input->post('description');
            $data_update['description2'] = $this->input->post('description2');
            $data_update['description3'] = $this->input->post('description3');
            $this->footer->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/footer.html');
         }else{
            $data['footer'] = $this->footer->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/footer_view_edit', $data);
        }
    }
}
