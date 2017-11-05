<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Banner_Model','banner');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/banner/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_crop['height'] = 500;
        $this->conf_crop['width'] = 1280;
    }

    public function index() {
        $data['model_name'] = "banner";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/banner_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->banner->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $banner) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($banner->img_url)."'/>";
            $row[] = $banner->status;
            $row[] = '<a class="btn btn-sm btn-info" href="banner/edit/'.$banner->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="delete" onclick="delete_('."'".$banner->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->banner->count_all(),
            "recordsFiltered" => $this->banner->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/banner_view_add', $data);
    }

    function save_data() {   
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('image', '', 'callback_file_check');  
        if($this->form_validation->run() == True) {
            if ($_FILES["image"]["name"]) {
                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_crop['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_crop);
                    $this->image_lib->crop();
                }
            }

            # after clean form and upload then save
            if($data['image_error'] == ""){
                $data = array(
                    'status' => $this->input->post('status'),
                    'img_url' => '/assets/img/banner/'.$upload_data['file_name'],
                    'file_name' => $upload_data['file_name']
                );
                $insert = $this->banner->save($data);
                redirect('admin/banner.html');
            } else {
                $this->load->view('admin/header_and_sidebar');
                $this->load->view('admin/banner_view_add', $data);
            }

        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/banner_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['banner'] = $this->banner->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/banner_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('status', 'Status', 'required');  
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
                        'img_url' => '/assets/img/banner/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['status'] = $this->input->post('status');
                $this->banner->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/banner.html');
            } else {
                $data['banner'] = $this->banner->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/banner_view_edit', $data);
            }

        } else {
            $data['banner'] = $this->banner->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/banner_view_edit', $data);
        }
    }

    function delete($id) {  
        $banner_ = $this->banner->get_by_id($id);
        $path = ".".$banner_->img_url;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->banner->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
