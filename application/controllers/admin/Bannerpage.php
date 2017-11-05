<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bannerpage extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Bannerpage_Model','bannerpage');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/bannerpage/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_crop['height'] = 250;
        $this->conf_crop['width'] = 1280;
    }

    public function index() {
        $data['model_name'] = "bannerpage";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/bannerpage_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->bannerpage->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bannerpage) {
            $no++;
            $row = array();
            $row[] = "<img class='banner_image' src='".base_url($bannerpage->img_url)."'/>";
            // $row[] = $bannerpage->status;
            $row[] = $bannerpage->page;
            $row[] = '
                <a class="btn btn-sm btn-info" href="'. base_url($bannerpage->page) .'" title="Preview" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a class="btn btn-sm btn-info" href="bannerpage/edit/'.$bannerpage->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
                // <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="delete" onclick="delete_('."'".$bannerpage->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bannerpage->count_all(),
            "recordsFiltered" => $this->bannerpage->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/bannerpage_view_add', $data);
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
                    // 'status' => $this->input->post('status'),
                    'page' => $this->input->post('page'),
                    'img_url' => '/assets/img/bannerpage/'.$upload_data['file_name'],
                    'file_name' => $upload_data['file_name']
                );
                $insert = $this->bannerpage->save($data);
                redirect('admin/banner-page.html');
            } else {
                $this->load->view('admin/header_and_sidebar');
                $this->load->view('admin/bannerpage_view_add', $data);
            }

        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/bannerpage_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['bannerpage'] = $this->bannerpage->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/bannerpage_view_edit',$data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('page', 'Page', 'required');  
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
                        'img_url' => '/assets/img/bannerpage/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                // $data_update['status'] = $this->input->post('status');
                $data_update['page'] = $this->input->post('page');
                $this->bannerpage->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/banner-page.html');
            } else {
                $data['bannerpage'] = $this->bannerpage->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/bannerpage_view_edit', $data);
            }

        } else {
            $data['bannerpage'] = $this->bannerpage->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/bannerpage_view_edit', $data);
        }
    }

    function delete($id) {  
        $bannerpage_ = $this->bannerpage->get_by_id($id);
        $path = ".".$bannerpage_->img_url;
        if (($bannerpage_->img_url != "") && (file_exists($path))) {
            unlink($path);
        }
        $this->bannerpage->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
