<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buycategory extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('BuyCategory_Model','buycategory');
	}

    public function index() {
        $data['model_name'] = "buycategory";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/buycategory_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->buycategory->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $buycategory) {
            $no++;
            $row = array();
            $row[] = $buycategory->name;
            $row[] = $buycategory->sequence;
            $row[] = '<a class="btn btn-sm btn-info" href="buycategory/edit/'.$buycategory->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->buycategory->count_all(),
            "recordsFiltered" => $this->buycategory->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function edit($id) {
        $data['buycategory'] = $this->buycategory->get_by_id($id);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/buycategory_view_edit', $data);
    }

    function update() {  
        $this->form_validation->set_rules('name', 'Name', 'required'); 
        $this->form_validation->set_rules('sequence', 'Sequence', 'required'); 
        if($this->form_validation->run() != false){
            $data_update['name'] = $this->input->post('name');
            $data_update['sequence'] = $this->input->post('sequence');
            $this->buycategory->update(array('id' => $this->input->post('id')), $data_update);
            redirect('admin/buy-category.html');
        } else {
            $data['buycategory'] = $this->buycategory->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/buycategory_view_edit', $data);
        }
    }


}
