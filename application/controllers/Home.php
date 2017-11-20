<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require('helper.php');

class Home extends Front_end {
    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $data['active_menu'] = "";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");

        $this->load->model('Banner_Model','banner');
        $data["slide_banner"] = $this->banner->get_published_banner();
        $this->load->view('header_view', $data);
        $this->load->view('index_view', $data);
        $this->load->view('footer_view');
    }

    public function about() {
        $data['active_menu'] = "about";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");

        $this->load->model('About_Model','about');
        $data["about"] = $this->about->get_last();
        
        $this->load->view('header_view', $data);
        $this->load->view('about_view');
        $this->load->view('footer_view');   
    }

    public function recycle(){
        $data['active_menu'] = "recycle";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");
        $number = ($this->input->get('number')) ? $this->input->get('number') : '';

        $this->load->model('Pagecontent_Model','pagecontent');
        $data["datas"] = $this->pagecontent->get_all_filtered('recycle');

        $this->load->model('Bannerpage_Model','banner_page');
        $data["banner"] = $this->banner_page->get_by_page('recycle');
        
        $this->load->view('header_view', $data);
        if (!$number) {
            $this->load->view('page_view', $data);
        } else {
            if ($data['lang'] == 'en') {
                $data['title_bottom'] = 'RECYCLE';
            } else {
                $data['title_bottom'] = 'DAUR ULANG';
            }
            $data['active'] = $this->pagecontent->get_by_number($number);
            $this->load->view('page_view_detail', $data);
        }
        $this->load->view('footer_view');   
    }


    public function business(){
        $data['active_menu'] = "business";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");
        $number = ($this->input->get('number')) ? $this->input->get('number') : '';

        $this->load->model('Pagecontent_Model','pagecontent');
        $data["datas"] = $this->pagecontent->get_all_filtered('business');

        $this->load->model('Bannerpage_Model','banner_page');
        $data["banner"] = $this->banner_page->get_by_page('business');
        
        $this->load->view('header_view', $data);
        if (!$number) {
            $this->load->view('page_view', $data);
        } else {
            if ($data['lang'] == 'en') {
                $data['title_bottom'] = 'BUSINESS';
            } else {
                $data['title_bottom'] = 'BISNIS';
            }

            $data['active'] = $this->pagecontent->get_by_number($number);
            $this->load->view('page_view_detail', $data);
        }
        $this->load->view('footer_view');   
    }

    public function gallery(){
        $data['active_menu'] = "gallery";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");

        $this->load->model('Gallery_Model','gallery');
        $data["gallery"] = $this->gallery->get_all();

        foreach ($data["gallery"] as $key => $value) {
            $data['gallery'][$key]['photos'] = get_filenames("./assets/img/gallery/".$value['id'], FALSE);
        }

        $this->load->view('header_view', $data);
        $this->load->view('gallery_view');
        $this->load->view('footer_view');   
    }

    public function contact(){
        $data['active_menu'] = "contact";
        $data['menu'] = $this->data_menu;
        $data["footer"] = $this->data_footer;
        $data['lang'] = $this->session->userdata("lang");

        $this->load->model('Contact_Model','contact');
        $data["contact"] = $this->contact->get_last();
        $data['lang'] = $this->session->userdata("lang");

        if ($this->input->post('name') && $this->input->post('email')) {
            $from = ["contact-us@sugawarakadii.co.id", $this->input->post('name')];
            $subject = $this->input->post('subject'); 
            $message = "Sender Information : <br> Name : ". $this->input->post('name') . "<br> Email : " . $this->input->post('email') . "<br> Company : " . $this->input->post('company') . "<br> " . $this->input->post('message');
            sendEmail($from, $data['contact']->email_receiver, $this->input->post('name'), $subject, $message);
            if($data['lang'] == 'en') {
                $this->session->set_flashdata('success', 'Message has been send, thank you');
            } else {
                $this->session->set_flashdata('success', 'Pesan telah dikirim, terimakasih');
            }
            redirect(site_url($data['lang'].'/home/contact'));
        }

        $this->load->view('header_view', $data);
        $this->load->view('contact_view_'.$data['lang']);
        $this->load->view('footer_view');   
    }
}


?>