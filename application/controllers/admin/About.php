<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('About_Model','about');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/about/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_crop['height'] = 358;
        $this->conf_crop['width'] = 1290;
    }

    public function index() {
        $data['model_name'] = "about";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/about_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->about->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $about) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($about->img_url)."'/>";
            $row[] = $about->language;
            $row[] = '
                <a class="btn btn-sm btn-info" href="about/edit/'.$about->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->about->count_all(),
            "recordsFiltered" => $this->about->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/about_view_add', $data);
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['about'] = $this->about->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/about_view_edit',$data);
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
                        'img_url' => '/assets/img/about/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['language'] = $this->input->post('language');
                $data_update['description'] = $this->input->post('description');
                $data_update['vission'] = $this->input->post('vission');
                $data_update['mission'] = $this->input->post('mission');
                $data_update['title'] = $this->input->post('title');
                $data_update['visi_title'] = $this->input->post('visi_title');
                $data_update['misi_title'] = $this->input->post('misi_title');

                $this->about->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/about.html');
            } else {
                $data['about'] = $this->about->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/about_view_edit', $data);
            }

        } else {
            $data['about'] = $this->about->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/about_view_edit', $data);
        }
    }

    function delete($id) {  
        $about_ = $this->about->get_by_id($id);
        $path = ".".$about_->img_url;
        if (($about_->img_url != "") && (file_exists($path))) {
            unlink($path);
        }
        $this->about->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
