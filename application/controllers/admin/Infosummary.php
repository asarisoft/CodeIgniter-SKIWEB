<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class InfoSummary extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('InfoSummary_Model','infosummary');

        $this->config_upload['upload_path'] = './assets/img/infosummary/';
        $this->load->library('upload', $this->config_upload);

        $this->conf_crop['height'] = 117;
        $this->conf_crop['width'] = 118;
    }

    public function index() {
        $data['model_name'] = "infosummary";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/infosummary_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->infosummary->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $infosummary) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($infosummary->img_url)."' style='background: black;' />";
            $row[] = $infosummary->description;
            $row[] = '<a class="btn btn-sm btn-info" href="infosummary/edit/'.$infosummary->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->infosummary->count_all(),
            "recordsFiltered" => $this->infosummary->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['infosummary'] = $this->infosummary->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/infosummary_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('description', 'Description', 'required');  
        if($this->form_validation->run() != false){
            if($_FILES["image"]["name"] != "" && $_FILES["image"]["name"] != $_POST['file_name']) {
                $path = ".".$_POST['img_url'];
                if (file_exists($path)) {
                    unlink($path);
                }

                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_crop['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_crop);
                    $this->image_lib->crop();

                    $data_update = array(
                        'img_url' => '/assets/img/infosummary/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['description'] = $this->input->post('description');
                $data_update['url'] = $this->input->post('url');
                $this->infosummary->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/info-summary.html');
            } else {
                $data['infosummary'] = $this->infosummary->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/infosummary_view_edit', $data);
            }

        }else{
            $data['infosummary'] = $this->infosummary->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/infosummary_view_edit', $data);
        }
    }
}
