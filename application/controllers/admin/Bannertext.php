<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BannerText extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('BannerText_Model','bannertext');
	}

    public function index() {
        $data['model_name'] = "bannertext";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/bannertext_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->bannertext->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $bannertext) {
            $no++;
            $row = array();
            $row[] = $bannertext->text;
            $row[] = '<a class="btn btn-sm btn-info" href="bannertext/edit/'.$bannertext->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->bannertext->count_all(),
            "recordsFiltered" => $this->bannertext->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['bannertext'] = $this->bannertext->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/bannertext_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('text', 'Text', 'required');  
        if($this->form_validation->run() != false){
            $data_update['text'] = $this->input->post('text');
            $this->bannertext->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/banner-text.html');
        } else {
            $data['bannertext'] = $this->bannertext->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/bannertext_view_edit', $data);
        }
    }


}
