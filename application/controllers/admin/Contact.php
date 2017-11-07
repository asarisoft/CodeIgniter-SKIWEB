<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Contact_Model','contact');
	}

    public function index() {
        $data['model_name'] = "contact";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/contact_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->contact->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $contact) {
            $no++;
            $row = array();
            $row[] = $contact->email;
            $row[] = $contact->phone;
            $row[] = $contact->fax;
            $row[] = $contact->email_receiver;
            $row[] = '<a class="btn btn-sm btn-info" href="contact/edit/'.$contact->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->contact->count_all(),
            "recordsFiltered" => $this->contact->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['contact'] = $this->contact->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/contact_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('email', 'email', 'required');  
        if($this->form_validation->run() != false){
            $data_update['email'] = $this->input->post('email');
            $data_update['phone'] = $this->input->post('phone');
            $data_update['address'] = $this->input->post('address');
            $data_update['fax'] = $this->input->post('fax');
            $data_update['email_receiver'] = $this->input->post('email_receiver');
            $this->contact->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/contact.html');
        } else {
            $data['contact'] = $this->contact->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/contact_view_edit', $data);
        }
    }

    function delete($id) {  
        $this->contact->delete($id);
        echo json_encode(array("status" => TRUE));
    }


}
