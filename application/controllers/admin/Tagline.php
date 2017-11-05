<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tagline extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tagline_Model','tagline');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/tagline/';
        $this->load->library('upload', $this->config_upload);
    }

    public function index() {
        $data['model_name'] = "tagline";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/tagline_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->tagline->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $tagline) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($tagline->img_url)."'/>";
            $row[] = $tagline->name;
            $row[] = $tagline->position;
            $row[] = '<a class="btn btn-sm btn-info" href="tagline/edit/'.$tagline->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="delete" onclick="delete_('."'".$tagline->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->tagline->count_all(),
            "recordsFiltered" => $this->tagline->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/tagline_view_add', $data);
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
                    // $this->conf_crop['source_image'] = $upload_data['full_path'];
                    // $this->load->library('image_lib', $this->conf_crop);
                    // $this->image_lib->crop();
                }
            }

            # after clean form and upload then save
            if($data['image_error'] == ""){
                $data = array(
                    'name' => $this->input->post('name'),
                    'position' => $this->input->post('position'),
                    'img_url' => '/assets/img/tagline/'.$upload_data['file_name'],
                    'file_name' => $upload_data['file_name']
                );
                $insert = $this->tagline->save($data);
                redirect('admin/tagline.html');
            } else {
                $this->load->view('admin/header_and_sidebar');
                $this->load->view('admin/tagline_view_add', $data);
            }

        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/tagline_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['tagline'] = $this->tagline->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/tagline_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('name', 'name', 'required');  
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
                    // $this->conf_crop['source_image'] = $upload_data['full_path'];
                    // $this->load->library('image_lib', $this->conf_crop);
                    // $this->image_lib->crop();

                    $data_update = array(
                        'img_url' => '/assets/img/tagline/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['position'] = $this->input->post('position');
                $data_update['name'] = $this->input->post('name');
                $this->tagline->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/tagline.html');
            } else {
                $data['tagline'] = $this->tagline->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/tagline_view_edit', $data);
            }

        } else {
            $data['tagline'] = $this->tagline->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/tagline_view_edit', $data);
        }
    }

    function delete($id) {  
        $tagline_ = $this->tagline->get_by_id($id);
        $path = ".".$tagline_->img_url;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->tagline->delete($id);
        echo json_encode(array("name" => TRUE));
    }

}
