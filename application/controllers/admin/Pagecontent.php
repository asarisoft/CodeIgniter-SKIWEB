<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagecontent extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pagecontent_Model','pagecontent');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/pagecontent/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_crop['height'] = 358;
        $this->conf_crop['width'] = 1290;
    }

    public function index() {
        $data['model_name'] = "pagecontent";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/pagecontent_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->pagecontent->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pagecontent) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($pagecontent->img_url)."'/>";
            $row[] = $pagecontent->number;
            $row[] = $pagecontent->page;
            $row[] = $pagecontent->title;
            $row[] = $pagecontent->language;
            $row[] = '
                <a class="btn btn-sm btn-info" href="pagecontent/edit/'.$pagecontent->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pagecontent->count_all(),
            "recordsFiltered" => $this->pagecontent->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/pagecontent_view_add', $data);
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['pagecontent'] = $this->pagecontent->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/pagecontent_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('id', 'ID', 'required');  
        if($this->form_validation->run() != false){
            // check image was changed 
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
                        'img_url' => '/assets/img/pagecontent/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['page'] = $this->input->post('page');
                $data_update['number'] = $this->input->post('number');
                $data_update['title'] = $this->input->post('title');
                $data_update['language'] = $this->input->post('language');
                $data_update['description'] = $this->input->post('description');
                $this->pagecontent->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/page-content.html');
            } else {
                $data['pagecontent'] = $this->pagecontent->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/pagecontent_view_edit', $data);
            }

        } else {
            $data['pagecontent'] = $this->pagecontent->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/pagecontent_view_edit', $data);
        }
    }

    function delete($id) {  
        $pagecontent_ = $this->pagecontent->get_by_id($id);
        $path = ".".$pagecontent_->img_url;
        if (($pagecontent_->img_url != "") && (file_exists($path))) {
            unlink($path);
        }
        $this->pagecontent->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
