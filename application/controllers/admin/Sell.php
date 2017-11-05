<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sell extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Sell_Model','sell');
        $this->load->model('CityArea_Model','city');
        $this->load->model('Tagline_Model','tag');
        $this->load->model('SellTagline_Model','selltag');

        $this->config_upload['upload_path'] = './assets/img/sell/';
        $this->load->library('upload', $this->config_upload);
        $this->conf_resize['width'] = 345;
	}

    public function index() {
        $data['model_name'] = "sell";
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/sell_view');
        $this->load->view('admin/footer', $data);
    }

	public function ajax_list() {
        $list = $this->sell->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $sell) {
            $no++;
            $row = array();
            $row[] = $sell->subject;
            $row[] = $sell->area;
            $row[] = number_format($sell->price);
            $row[] = $sell->category;
            $row[] = '
                <a class="btn btn-sm btn-info" href="'. base_url('sell/detail?id='.$sell->id).'" title="Preview" target="_blank"><i class="glyphicon glyphicon-eye-open"></i></a>
                <a class="btn btn-sm btn-info" href="sell/image/'.$sell->id.'" title="Image"><i class="glyphicon glyphicon-picture"></i></a>
                <a class="btn btn-sm btn-info" href="sell/edit/'.$sell->id.'" title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Delete" onclick="delete_('."'".$sell->id."'".')"><i class="glyphicon glyphicon-trash"></i></a>';
            $data[] = $row;
        }
        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->sell->count_all(),
            "recordsFiltered" => $this->sell->count_filtered(),
            "data" => $data,
        );
        echo json_encode($output);
    }

    function add() {
        $data['image_error'] = "";
        $data['city'] = $this->city->get_city();
        $data['area'] = $this->city->get_area();
        $data['tag'] = $this->tag->get_all_tagline();
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/sell_view_add', $data);
    }

    function save_data() {  
        $data['image_error'] = "";
        $data['city'] = $this->city->get_city();
        $data['area'] = $this->city->get_area();
        $data['tag'] = $this->tag->get_all_tagline();
        $this->form_validation->set_rules('image', '', 'callback_file_check');  
        $this->form_validation->set_rules('subject', 'subject', 'required');  
        if($this->form_validation->run() == True) {
            if ($_FILES["image"]["name"]) {
                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_resize);
                    if ($upload_data && $upload_data['image_width'] > 350) {
                        $this->image_lib->resize();
                    }
                }
            }
            # after clean form and upload then save
            if($data['image_error'] == ""){
                $insert = $this->get_post_data();
                $insert['img_url'] = '/assets/img/sell/'.$upload_data['file_name'];
                $insert['file_name'] = $upload_data['file_name'];
                $insert = $this->sell->save($insert);
                redirect('admin/sell.html');
            } else {
                $this->load->view('admin/header_and_sidebar');
                $this->load->view('admin/sell_view_add', $data);
            }

        }else{
            $this->load->view('admin/header_and_sidebar');
            $this->load->view('admin/sell_view_add', $data);
        }
    }

    function edit($id) {
        $data['image_error'] = "";        
        $data['sell'] = $this->sell->get_by_id_joined($id);
        $data['city'] = $this->city->get_city();
        $data['area'] = $this->city->get_area();
        $data['tag'] = $this->tag->get_all_tagline();
        $data['selected_selltag'] =  array();
        $slected_selltag = $this->selltag->get_selected_sell_tagline($id);
        foreach ($slected_selltag as $seltg) {
            array_push($data['selected_selltag'], $seltg['tagline_id']);
        }
        // print_r($data['selected_selltag']);
        $this->load->view('admin/header_and_sidebar');
        $this->load->view('admin/sell_view_edit', $data);
    }

    function update() {  
        $data['image_error'] = "";
        $data_update = $this->get_post_data();
        $this->form_validation->set_rules('subject', 'subject', 'required');  
        if($this->form_validation->run() != false){
            // check image was changed 
            if($_FILES["image"]["name"] != "" && $_FILES["image"]["name"] != $_POST['file_name']) {
                $path = ".".$_POST['img_url'];
                if (file_exists($path)) {
                    unlink($path);
                }

                if (!$this->upload->do_upload('image')) {
                    $data['image_error'] = $this->upload->display_errors();
                } else {
                    $upload_data = $this->upload->data();
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib', $this->conf_resize);
                    if ($upload_data && $upload_data['image_width'] > 350) {
                        $this->image_lib->resize();
                    }

                    $data_update['img_url'] = '/assets/img/sell/'.$upload_data['file_name'];
                    $data_update['file_name'] = $upload_data['file_name'];
                }
            }

            if($data['image_error'] == ""){
                $this->selltag->delete_by_sell_id($this->input->post('id'));
                $insert = $this->sell->update(array('id' => $this->input->post('id')), $data_update);
                $this->save_sell_tagline($this->input->post('id'));
                redirect('admin/sell.html');
            } else {
                $data['sell'] = $this->sell->get_by_id($this->input->post('id'));
                $this->load->view('/admin/header_and_sidebar');
                $this->load->view('/admin/sell_view_edit', $data);
            }
        }
    }

    function delete($id) {  
        $sell_ = $this->sell->get_by_id($id);
        $path = ".".$sell_->img_url;
        if (file_exists($path)) {
            unlink($path);
        }
        $this->selltag->delete_by_sell_id($id);
        $this->sell->delete($id);
        delete_files("./assets/img/sell/".$id, TRUE);
        rmdir("./assets/img/sell/".$id);
        echo json_encode(array("status" => TRUE));
    }

    private function get_post_data() {
        $data['subject'] = $this->input->post('subject');
        $data['place'] = $this->input->post('place');
        $data['address'] = $this->input->post('address');
        $data['price'] = $this->input->post('price');
        $data['category'] = $this->input->post('category');
        $data['sell_button'] = $this->input->post('sell_button');
        $data['_lat'] = $this->input->post('_lat');
        $data['_long'] = $this->input->post('_long');
        $data['description'] = $this->input->post('description');
        $data['price_text'] = $this->input->post('price_text');

        // details 
        $data['size_land'] =  empty($this->input->post('size_land'))? 0 : $this->input->post('size_land');
        $data['bathroom'] = empty($this->input->post('bathroom'))? 0 : $this->input->post('bathroom');
        $data['size_building'] =empty($this->input->post('size_building'))? 0 : $this->input->post('size_building');
        $data['orientation'] = $this->input->post('orientation');
        $data['bedroom'] = empty($this->input->post('bedroom'))? 0 : $this->input->post('bedroom');
        $data['price_level'] = $this->input->post('price_level');
        $data['city'] = $this->input->post('city');
        $data['area'] = $this->input->post('area');
        // Agent 
        $data['agent_id'] = $this->input->post('agent_id');

        return $data;
    }

    private function save_sell_tagline($sell_id) {
        foreach ($_POST['tags'] as $tag) {
            $datatagline = array(
                'sell_id' => $sell_id,
                'tagline_id' => $tag
            );
            $this->selltag->save($datatagline);
        }
    }

    public function image($id) {
       $data['sell_id'] = $id;
       $data['sell'] = $this->sell->get_by_id($id);
       $this->load->view('admin/header_and_sidebar');
       $this->load->view('admin/sell_view_image', $data);
    }

    public function upload(){
        $sell_id = $this->input->post('id');
        if (!is_dir('./assets/img/sell/' . $sell_id)) {
            mkdir('./assets/img/sell/' . $sell_id, 0777, TRUE);
            // mkdir('./assets/img/sell/' . $sell_id . '/thumb', 0777, TRUE);
        }

        if ( ! empty($_FILES)) {   
            $config['upload_path'] = "./assets/img/sell/".$sell_id."/";
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
                    // $this->conf_resize['height'] = 500;
                    $this->conf_resize['width'] = 1061;
                    $this->conf_resize['source_image'] = $upload_data['full_path'];
                    $this->load->library('image_lib');
                    $this->image_lib->initialize($this->conf_resize);
                    if ($upload_data && $upload_data['image_width'] > 2000) {
                        $this->image_lib->resize();
                    }
                }
            }
        } else if ($this->input->post('file_to_remove')) {
            $file_to_remove = $this->input->post('file_to_remove');
            unlink("./assets/img/sell/".$sell_id."/". $file_to_remove);  
        } 
    }

    public function filelist($id) {
        $this->load->helper('file');
        echo json_encode(get_filenames("./assets/img/sell/".$id, FALSE));
    }

}


