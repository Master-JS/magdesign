<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Af45sdieD extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload'); // Bu satırın ekli olduğundan emin olun
    }

    public function index() {
        $this->load->model('date_model');
        $this->load->library('pagination');

        // Pagination ayarları
        $config['base_url'] = base_url('Af45sdieD/index');
        $config['total_rows'] = $this->db->count_all('blogs');
        $config['per_page'] = 5; // Sayfa başına gösterilecek blog sayısı
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        // Sayfalama için limit ve offset değerleri
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->limit($config['per_page'], $page);

        $list = $this->db->get("blogs")->result();
        $data['blogs'] = $list;

        $this->load->view("makale_list", $data);
    }

    public function kategori_list() {
        $this->load->model('date_model');
        $this->load->library('pagination');

        // Pagination ayarları
        $config['base_url'] = base_url('Af45sdieD/kategori_list');
        $config['total_rows'] = $this->db->count_all('katagoriler');
        $config['per_page'] = 5; // Sayfa başına gösterilecek blog sayısı
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        // Sayfalama için limit ve offset değerleri
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->limit($config['per_page'], $page);

        $list = $this->db->get("katagoriler")->result();
        $data['kategoriler'] = $list;

        $this->load->view("kategori_list", $data);
    }

    public function kategori_insert() {
        $data = array('kategori_name' => $this->input->post('title'));   
        $insert = $this->db->insert("katagoriler", $data);

        if ($insert) {
            redirect(base_url("Af45sdieD/kategori_list"));
        }else{
            print("Olmadı");
        }
    }

    public function kategori_delete($id) {
        $delete = $this->db->where('kategori_id', $id)->delete('katagoriler');
        if ($delete) {
            $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
            redirect(base_url("Af45sdieD/kategori_list"));
        }else{
            print("Olmadı");
        }
    }

    public function kategori_update($id) {
        $data = array('kategori_name' => $this->input->post('title'));
        $update = $this->db->where("kategori_id", $id)->update("katagoriler", $data);

        if ($update) {
            $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
            redirect(base_url("Af45sdieD/kategori_list"));
        }else{
            print("Olmadı");
        }
    }

    public function yazar_list() {
        $this->load->model('date_model');
        $this->load->library('pagination');

        // Pagination ayarları
        $config['base_url'] = base_url('Af45sdieD/yazar_list');
        $config['total_rows'] = $this->db->count_all('yazarlar');
        $config['per_page'] = 5; // Sayfa başına gösterilecek blog sayısı
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        // Sayfalama için limit ve offset değerleri
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->limit($config['per_page'], $page);

        $list = $this->db->get("yazarlar")->result();
        $data['yazarlar'] = $list;

        $this->load->view("yazar_list", $data);
    }

    public function yazar_insert() {
        $data = array('isim' => $this->input->post('title'));

        // Yükleme yapılandırması
        $config['upload_path'] = './assets/images/'; // Fotoğrafı kaydedeceğimiz dizin
        $config['allowed_types'] = 'jpeg|jpg|png'; // İzin verilen dosya türleri
        // $config['max_size'] = 2048; // Maksimum dosya boyutu (KB)
        $config['encrypt_name'] = TRUE; // Dosya adını rasgele oluştur

        $this->upload->initialize($config);

        // Dosya yükleme işlemi
        if (!$this->upload->do_upload('image')) {
            // Yükleme başarısız oldu
            $error = array('error' => $this->upload->display_errors());
            print_r($error);
        } else {
            // Yükleme başarılı
            $upload_data = $this->upload->data();
            $data['yazar_image'] = $upload_data['file_name']; // Yüklenen dosyanın adı

            $insert = $this->db->insert("yazarlar", $data);
            if ($insert) {
                redirect(base_url("Af45sdieD/yazar_list"));
            }else{
                print("Olmadı");
            }
        }
    }

    public function yazar_delete($id) {
        $delete = $this->db->where('yazar_id', $id)->delete('yazarlar');
        if ($delete) {
            $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
            redirect(base_url("Af45sdieD/yazar_list"));
        }else{
            print("Olmadı");
        }
    }

    public function edit_yazar($id) {
		$yazar = $this->db->where("yazar_id", $id)->get("yazarlar")->row();
		$dataView["yazar"] = $yazar;

		$this->load->view("edit_yazar", $dataView);
	}

    public function yazar_update($id) {
        $data = array('isim' => $this->input->post('title'));

        // Yükleme yapılandırması
        $config['upload_path'] = './assets/images/'; // Fotoğrafı kaydedeceğimiz dizin
        $config['allowed_types'] = 'jpeg|jpg|png'; // İzin verilen dosya türleri
        // $config['max_size'] = 2048; // Maksimum dosya boyutu (KB)
        $config['encrypt_name'] = TRUE; // Dosya adını rasgele oluştur

        $this->upload->initialize($config);

        // Dosya yükleme işlemi
        if (!$this->upload->do_upload('image')) {
            $update = $this->db->where("yazar_id", $id)->update("yazarlar", $data);
            if ($update) { redirect(base_url("Af45sdieD/edit_yazar/$id")); }else{ print("Olmadı"); }
        } else {
            // Yükleme başarılı
            $upload_data = $this->upload->data();
            $data['yazar_image'] = $upload_data['file_name'];

            $update = $this->db->where("yazar_id", $id)->update("yazarlar", $data);
            if ($update) { redirect(base_url("Af45sdieD/edit_yazar/$id")); }else{ print("Olmadı"); }
        }
    }
}
?>