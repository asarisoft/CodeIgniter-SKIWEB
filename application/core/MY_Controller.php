<?php

(defined('BASEPATH')) OR exit('No direct script access allowed');


Class Front_end extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load_lang();
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