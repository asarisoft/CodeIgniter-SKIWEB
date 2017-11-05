<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class buy extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Buy_Model','buy');
	}

    public function index() {
        $data['model_name'] = "buy";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/buy_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->buy->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $buy) {
            $no++;
            $row = array();
            $row[] = $buy->subject;
            $row[] = $buy->place;
            $row[] = $buy->address;
            $row[] = $buy->price;
            $row[] = $buy->category;
            $row[] = '<a class="btn btn-sm btn-info" href="buy/edit/'.$buy->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$buy->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->buy->count_all(),
            "recordsFiltered" => $this->buy->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/buy_view_add');
    }

    function save_data() {  
        $this->form_validation->set_rules('subject', 'subject', 'required');  
        if($this->form_validation->run() == True){
            $data['subject'] = $this->input->post('subject');
            $data['place'] = $this->input->post('place');
            $data['address'] = $this->input->post('address');
            $data['price'] = $this->input->post('price');
            $data['phone'] = $this->input->post('phone');
            $data['category'] = $this->input->post('category');
            $data['description'] = $this->input->post('description');
            $insert = $this->buy->save($data);
            redirect('admin/buy.html');
        }else{
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/buy_view_add');
        }
    }


    function edit($id) {
        $data['buy'] = $this->buy->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/buy_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('subject', 'subject', 'required');  
        if($this->form_validation->run() != false){
            $data_update['subject'] = $this->input->post('subject');
            $data_update['place'] = $this->input->post('place');
            $data_update['address'] = $this->input->post('address');
            $data_update['price'] = $this->input->post('price');
            $data_update['phone'] = $this->input->post('phone');
            $data_update['category'] = $this->input->post('category');
            $data_update['description'] = $this->input->post('description');
            $this->buy->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/buy.html');
        } else {
            $data['buy'] = $this->buy->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/buy_view_edit', $data);
        }
    }

    function delete($id) {  
        $this->buy->delete($id);
        echo json_encode(array("status" => TRUE));
    }


}
