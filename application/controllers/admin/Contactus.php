<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contactus extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ContactUs_Model','contactus');
    }

    public function index() {
        $data['model_name'] = "contactus";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/contactus_view');
        $this->load->view('admin/footer', $data);
    }

    public function ajax_list() {
        $list = $this->contactus->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $contactus) {
            $no++;
            $row = array();
            $row[] = $contactus->description;
            $row[] = '<a class="btn btn-sm btn-info" href="contactus/edit/'.$contactus->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->contactus->count_all(),
            "recordsFiltered" => $this->contactus->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['contactus'] = $this->contactus->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/contactus_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('description', 'description', 'required');  
        if($this->form_validation->run() != false){
            $data_update['description'] = $this->input->post('description');
            $data_update['phone'] = $this->input->post('phone');
            $data_update['email'] = $this->input->post('email');
            $this->contactus->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/contact-us.html');
        } else {
            $data['contactus'] = $this->contactus->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/contactus_view_edit', $data);
        }
    }

}
