<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deneme extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
	{
		$this->load->view('deneme');
	}

    public function upload() {
        $config['upload_path'] = './assets/uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 2048;
        $config['max_width'] = 1920;
        $config['max_height'] = 1080;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $error = array('error' => $this->upload->display_errors());
            echo json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            $file_url = base_url() . './assets/uploads/' . $data['upload_data']['file_name'];
            echo json_encode(array('fileUrl' => $file_url));
        }
    }
}
