<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Gallery_Model','gallery');

        $this->config_upload['upload_path'] = './assets/img/gallery/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_resize['width'] = 319;
	}

    public function index() {
        $data['model_name'] = "gallery";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/gallery_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->gallery->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $gallery) {
            $no++;
            $row = array();
            $row[] = $gallery->title_en;
            $row[] = $gallery->title_id;
            $row[] = '
                <a class="btn btn-sm btn-info" href="gallery/image/'.$gallery->id.'" title="Image"><i class="glyphicon glyphicon-picture"></i></a>
                <a class="btn btn-sm btn-info" href="gallery/edit/'.$gallery->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$gallery->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->gallery->count_all(),
            "recordsFiltered" => $this->gallery->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/gallery_view_add', $data);
    }

    function save_data() {  
        $data="";
        $this->form_validation->set_rules('title_en', 'title', 'required');  
        if($this->form_validation->run() == True) {
            $data['title_en'] = $this->input->post('title_en');
            $data['title_id'] = $this->input->post('title_id');
            $insert = $this->gallery->save($data);
            redirect('admin/gallery.html');
        } else {
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/gallery_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['gallery'] = $this->gallery->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/gallery_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('title_en', 'title', 'required');  
        if($this->form_validation->run() != false){
            $data_update['title_en'] = $this->input->post('title_en');
            $data_update['title_id'] = $this->input->post('title_id');
            $this->gallery->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/gallery.html');
        } else {
            $data['gallery'] = $this->gallery->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/gallery_view_edit', $data);
        }

    }

    function delete($id) {  
        $this->gallery->delete($id);
        delete_files("./assets/img/gallery/".$id, TRUE);
        rmdir("./assets/img/gallery/".$id);
        echo json_encode(array("status" => TRUE));
    }


    public function image($id) {
       $data['gallery_id'] = $id;
       $data['gallery'] = $this->gallery->get_by_id($id);
       $this->load->view('admin/header_and_sidebar');
       $this->load->view('admin/gallery_view_image', $data);
    }

    public function upload(){
        $gallery_id = $this->input->post('id');
        if (!is_dir('./assets/img/gallery/' . $gallery_id)) {
            mkdir('./assets/img/gallery/' . $gallery_id, 0777, TRUE);
        }

        if ( ! empty($_FILES)) {   
            $config['upload_path'] = "./assets/img/gallery/".$gallery_id."/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['file_name'] = md5(date("Y-m-d H:i:s"));
            $config['maintain_ratio'] = TRUE;
            $this->load->library('upload');
            $files = $_FILES;
            $number_upload_files = count($_FILES['file']['name']);
            $errors = 0;
            for ($i=0; $i < $number_upload_files; $i++) {
                $_FILES['file']['name'] = $files['file']['name'][$i];
                $_FILES['file']['type'] = $files['file']['type'][$i];
                $_FILES['file']['tmp_name'] = $files['file']['tmp_name'][$i];
                $_FILES['file']['error'] = $files['file']['error'][$i];
                $_FILES['file']['size'] = $files['file']['size'][$i];
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('file')) {
                    $this->output->set_status_header('400'); 
                    echo $this->upload->display_errors();
                    return FALSE;
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_resize['width'] = 960;
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($this->conf_resize);
                    if ($upload_data && $upload_data['image_width'] > 1500) {
                        $this->image_lib->resize();
                    }
                }
            }
        } else if ($this->input->post('file_to_remove')) {
            $file_to_remove = $this->input->post('file_to_remove');
            unlink("./assets/img/gallery/".$gallery_id."/". $file_to_remove);  
        } 
    }

    public function filelist($id) {
        $this->load->helper('file');
        echo json_encode(get_filenames("./assets/img/gallery/".$id, FALSE));
    }

}
