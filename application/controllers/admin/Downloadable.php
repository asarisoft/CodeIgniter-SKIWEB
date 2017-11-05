<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Downloadable extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Downloadable_Model','downloadable');

        $this->config_upload['upload_path'] = './assets/file/downloadable/';
        $this->load->library('upload', $this->config_upload);
    }

    public function index() {
        $data['model_name'] = "downloadable";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/downloadable_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->downloadable->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $downloadable) {
            $no++;
            $row = array();
            $row[] = $downloadable->name;
            $row[] = $downloadable->file_name;
            $row[] = '<a class="btn btn-sm btn-info" href="downloadable/edit/'.$downloadable->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->downloadable->count_all(),
            "recordsFiltered" => $this->downloadable->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['downloadable'] = $this->downloadable->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/downloadable_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('name', 'Name', 'required');  
        if($this->form_validation->run() != false){
            if($_FILES["image"]["name"] != "" && $_FILES["image"]["name"] != $_POST['file_name']) {
                $path = ".".$_POST['file_url'];
                if (file_exists($path)) {
                    unlink($path);
                }

                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $data_update = array(
                        'file_url' => '/assets/file/downloadable/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['name'] = $this->input->post('name');
                $this->downloadable->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/downloadable.html');
            } else {
                $data['downloadable'] = $this->downloadable->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/downloadable_view_edit', $data);
            }

        }else{
            $data['downloadable'] = $this->downloadable->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/downloadable_view_edit', $data);
        }
    }
}
