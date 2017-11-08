<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');


class MY_Controller extends CI_Controller {
    public $config_upload;
    public $conf_crop;

    public function __construct() {
        parent::__construct();
        $this->session_cek();

        $this->config_upload = array(
            'overwrite'       => TRUE,
            'max_size'        => 6000,
            'max_height'      => 5000,
            'max_width'       => 5000,
            'allowed_types'   => '*',
            'file_name'       => md5(date("Y-m-d H:i:s"))
        );

        $this->conf_crop = array(
            'image_library' => 'gd2',
            'maintain_ratio' => FALSE,
            'x_axis' => 0,
            'y_axis' => 0,
            'quality' => 100
        );

    }

    function session_cek()
    {
        $user = $this->session->userdata('id');
        $name = $this->session->userdata('name');
        $role = $this->session->userdata('role');

        if ($user == "") {
            redirect('admin/logout.html');
        } 
    }

    # this check file
    public function file_check($str){
        $allowed_mime_type_arr = array('image/gif','image/jpeg','image/jpeg','image/png','image/x-png');
        $mime = get_mime_by_extension($_FILES['image']['name']);
        if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
            if(in_array($mime, $allowed_mime_type_arr)){
                return true;
            }else{
                $this->form_validation->set_message('file_check', 'Please select only pdf/gif/jpg/png image.');
                return false;
            }
        }else{
            $this->form_validation->set_message('file_check', 'Please choose a image to upload.');
            return false;
        }
    }

}


Class Front_end extends CI_Controller {
    public $data_menu = [];

    function __construct() {
        parent::__construct();
        $this->load_lang();
        $this->load->model('Menu_Model','menu');
        $this->data_menu = $this->menu->get_all();
    }

    protected function load_lang() {
        if ($this->uri->segment(1) == 'en' || $this->uri->segment(1) == 'id') {
            $this->session->set_userdata("lang", $this->uri->segment(1));
        }

        if ($this->session->userdata('lang') == "id") {
            $lang = "indonesia";
            $this->config->set_item('language', $lang);
            $this->session->set_userdata("lang", 'id');
        } else {
            $lang = "english";
            $this->config->set_item('language',$lang);
            $this->session->set_userdata("lang",'en');
        }
    }   
}
