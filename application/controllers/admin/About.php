<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('About_Model','about');

        # Merge with parrent
        $this->config_upload['upload_path'] = './assets/img/about/';
        $this->load->library('upload', $this->config_upload);

        $this->conf_crop1['height'] = 200;
        $this->conf_crop1['width'] = 900;

        $this->conf_crop2['height'] = 282;
        $this->conf_crop2['width'] = 463;

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
            $row[] = "<img class='banner_image' src='".base_url($about->top_img_url)."'/>";
            $row[] = "<img class='banner_image' src='".base_url($about->second_img_url)."'/>";
            $row[] = "<img class='banner_image' src='".base_url($about->third_img_url)."'/>";
            $row[] = '
                <a class="btn btn-sm btn-info" href="'. base_url('about').'" title="Preview" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>
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

    function edit($id) {
        $data['image_error1'] = "";
        $data['image_error2'] = "";
        $data['image_error3'] = "";
        $data['about'] = $this->about->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/about_view_edit',$data);
    }

    function update() {  
        $data['image_error1'] = "";
        $data['image_error2'] = "";
        $data['image_error3'] = "";
        $upload_data1 = "";
        $upload_data2 = "";
        $upload_data3 = "";
        $data['about'] = $this->about->get_by_id($this->input->post('id'));

        $this->form_validation->set_rules('top_text', 'Top Text', 'required');  
        if($this->form_validation->run() != false){
            // check image was changed 
            if($_FILES["top_img"]["name"] != "" && $_FILES["top_img"]["name"] != $_POST['top_file_name']) {
                $path = ".".$_POST['top_img_url'];
                if (file_exists($path)) {
                    unlink($path);
                }

                if (!$this->upload->do_upload('top_img')) {
                    $data['image_error1'] = $this->upload->display_errors();
                } else {
                    $upload_data1 = $this->upload->data();
                    $this->conf_crop1['source_image'] = $upload_data1['full_path'];
                    $this->load->library('image_lib', $this->conf_crop1);
                    $this->image_lib->crop();

                    $data_update = array(
                        'top_img_url' => '/assets/img/about/'.$upload_data1['file_name'],
                        'top_file_name' => $upload_data1['file_name']
                    );
                }
            }

            if($_FILES["second_img"]["name"] != "" && $_FILES["second_img"]["name"] != $_POST['second_file_name']) {
                $path = ".".$_POST['second_img_url'];
                if (file_exists($path)) {
                    unlink($path);
                }
                if (!$this->upload->do_upload('second_img')) {
                    $data['image_error2'] = $this->upload->display_errors();
                } else {
                    $upload_data2 = $this->upload->data();
                    $this->conf_crop2['source_image'] = $upload_data2['full_path'];
                    $this->load->library('image_lib', $this->conf_crop2);
                    $this->image_lib->crop();

                    $data_update = array(
                        'second_img_url' => '/assets/img/about/'.$upload_data2['file_name'],
                        'second_file_name' => $upload_data2['file_name']
                    );
                }
            }

            if($_FILES["third_img"]["name"] != "" && $_FILES["third_img"]["name"] != $_POST['third_file_name']) {
                $path = ".".$_POST['third_img_url'];
                if (file_exists($path)) {
                    unlink($path);
                }
                if (!$this->upload->do_upload('third_img')) {
                    $data['image_error3'] = $this->upload->display_errors();
                } else {
                    $upload_data3 = $this->upload->data();
                    $this->conf_crop2['source_image'] = $upload_data3['full_path'];
                    $this->load->library('image_lib', $this->conf_crop2);
                    $this->image_lib->crop();

                    $data_update = array(
                        'third_img_url' => '/assets/img/about/'.$upload_data3['file_name'],
                        'third_file_name' => $upload_data3['file_name']
                    );
                }
            }

            if($data['image_error1'] == "" && $data['image_error2'] == "" && $data['image_error3'] == ""){
                $data_update['top_text'] = $this->input->post('top_text');
                $data_update['second_text'] = $this->input->post('second_text');
                $data_update['third_text'] = $this->input->post('third_text');
                $data_update['advice_australia'] = $this->input->post('advice_australia');
                $this->about->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/about.html');
            } else {
                $data['about'] = $this->about->get_by_id($this->input->post('id'));
                print_r($data['about']);
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/about_view_edit', $data);
            }

        } else {
            $data['about'] = $this->about->get_by_id($this->input->post('id'));
            print_r($data['about']);
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/about_view_edit', $data);
        }
    }

    function delete($id) {  
        $about_ = $this->about->get_by_id($id);
        $path = ".".$about_->img_url;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->about->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
