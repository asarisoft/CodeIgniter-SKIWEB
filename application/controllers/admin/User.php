<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('User_Model','user');
	}

    public function index() {
        $data['model_name'] = "user";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/user_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->user->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $user) {
            if ($user->name == "testerr") {
                continue;
            }
            $no++;
            $row = array();
            $row[] = $user->name;
            $row[] = $user->email;
            $row[] = '<a class="btn btn-sm btn-info" href="user/edit/'.$user->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$user->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->user->count_all(),
            "recordsFiltered" => $this->user->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/user_view_add', $data);
    }

    function save_data() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('name', 'title', 'required');  
        if($this->form_validation->run() == True){
            $sdata['name'] = $this->input->post('name');
            $sdata['username'] = $this->input->post('username');
            $sdata['email'] = $this->input->post('email');
            $sdata['password'] = sha1($this->input->post('password'));
            $sdata = $this->user->save($sdata);
            redirect('admin/user.html');
        }else{
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/user_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";
        $data['user'] = $this->user->get_by_id($id);
        $data['user']->password = "Tid4kDigantiii";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/user_view_edit', $data);
    }

    function update() {  
        $data['image_error'] = "";
        $upload_data = "";

        $this->form_validation->set_rules('name', 'title', 'required');  
        if($this->form_validation->run() != false){
            $sdata['name'] = $this->input->post('name');
            $sdata['username'] = $this->input->post('username');
            $sdata['email'] = $this->input->post('email');
        
            if ($this->input->post('password') != "Tid4kDigantiii") {
                $sdata['password'] = sha1($this->input->post('password'));
            }
            $this->user->update(array('id' => $this->input->post('id')), $sdata);
            redirect('admin/user.html');
        } else {
            $data['user'] = $this->user->get_by_id($this->input->post('id'));
            $this->load->view('/admin/header_and_sidebar');
            $this->load->view('/admin/user_view_edit', $data);
        }
    }

    function delete($id) {  
        $user = $this->user->get_by_id($id);
        $this->user->delete($id);
        echo json_encode(array("status" => TRUE));
    }

}
