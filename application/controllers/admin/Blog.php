<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Blog_Model','blog');

        $this->config_upload['upload_path'] = './assets/img/blog/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_resize['width'] = 319;
	}

    public function index() {
        $data['model_name'] = "blog";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/blog_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->blog->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $blog) {
            $no++;
            $row = array();
            $row[] = $blog->title;
            $row[] = $blog->date;
            $row[] = $blog->status;
            $row[] = '<a class="btn btn-sm btn-info" href="blog/edit/'.$blog->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$blog->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->blog->count_all(),
            "recordsFiltered" => $this->blog->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/blog_view_add', $data);
    }

    function save_data() {  
        $data['image_error'] == "";
        $this->form_validation->set_rules('title', 'title', 'required');  
        $this->form_validation->set_rules('image', '', 'callback_file_check');  
        if($this->form_validation->run() == True) {
            if ($_FILES["image"]["name"]) {
                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_resize);
                    $this->image_lib->resize();
                }
            }

            # after clean form and upload then save
            if($data['image_error'] == ""){
                $data = array(
                    'status' => $this->input->post('status'),
                    'img_url' => '/assets/img/blog/'.$upload_data['file_name'],
                    'file_name' => $upload_data['file_name']
                );

                $data['title'] = $this->input->post('title');
                $data['date'] = $this->input->post('date');
                $data['content'] = $this->input->post('content');
                $insert = $this->blog->save($data);
                redirect('admin/blog.html');
            } else {
                $this->load->view('admin/header_and_sidebar');
                $this->load->view('admin/blog_view_add', $data);
            }

        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/blog_view_add', $data);
        }

    }

    function edit($id) {
        $data['image_error'] = "";
        $data['blog'] = $this->blog->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/blog_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('title', 'title', 'required');  
        $this->form_validation->set_rules('status', 'Status', 'required');  
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
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_resize);
                    $this->image_lib->resize();

                    $data_update = array(
                        'img_url' => '/assets/img/blog/'.$upload_data['file_name'],
                        'file_name' => $upload_data['file_name']
                    );
                }
            }

            if($data['image_error'] == ""){
                $data_update['title'] = $this->input->post('title');
                $data_update['date'] = $this->input->post('date');
                $data_update['status'] = $this->input->post('status');
                $data_update['content'] = $this->input->post('content');
                $this->blog->update(array('id' => $this->input->post('id')), $data_update);
                redirect('admin/blog.html');
            } else {
                $data['blog'] = $this->blog->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/blog_view_edit', $data);
            }
        } else {
            $data['blog'] = $this->blog->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/blog_view_edit', $data);
        }

    }

    function delete($id) {  
        $blog = $this->blog->get_by_id($id);
        $path = ".".$blog->img_url;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->blog->delete($id);
        echo json_encode(array("status" => TRUE));
    }


}
