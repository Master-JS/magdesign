<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('upload'); // Bu satırın ekli olduğundan emin olun
    }

    public function index()
    {
        $this->load->model('date_model');
        $this->load->library('pagination');

        // Pagination ayarları
        $config['base_url'] = base_url('kategori/index');
        $config['total_rows'] = $this->db->count_all('blogs');
        $config['per_page'] = 3; // Sayfa başına gösterilecek blog sayısı
        $config['uri_segment'] = 3;

        $this->pagination->initialize($config);

        // Sayfalama için limit ve offset değerleri
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $this->db->limit($config['per_page'], $page);

        $list = $this->db->get("blogs")->result();
        $data['blogs'] = $list;

        $this->load->view('kategori', $data);
    }

	public function detay($id)
	{
		$this->load->model('date_model');

		$list = $this->db->where("blog_id", $id)->get("blogs")->row();
        $dataView["blog"] = $list;

		$list = $this->db->where("yazar_id", $list->yazar_id)->get("yazarlar")->row();
        $dataView["yazar"] = $list;

		$this->load->view('makale',$dataView);
	}


	public function create_makale()
	{
		$yazarlar = $this->db->get("yazarlar")->result();
		$dataView["yazarlar"] = $yazarlar;

		$kategoriler = $this->db->get("katagoriler")->result();
		$dataView["kategoriler"] = $kategoriler;

		$this->load->view("create_makale.php", $dataView);
	}

	public function makale_insert() 
    {
        // iframe kodu çalışması için
        $metin = str_replace("&lt;", "<", $this->input->post('content'));
        $metin = str_replace("&gt;", ">", $metin);

        // Formdan gelen diğer veriler
        $data = array(
            'title'     => $this->input->post('title'),
            'spot'      => $this->input->post('spot'),
            'makale'    => $metin,
            'yazar_id'  => $this->input->post('yazar'),
            'kategori'  => implode(', ', $this->input->post('kategori')),
        );


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
            $data['image'] = $upload_data['file_name']; // Yüklenen dosyanın adı

            $insert = $this->db->insert("blogs", $data);
            if ($insert) {
                redirect(base_url("kategori"));
            }else{
                print("Olmadı");
            }
        }
    }

    public function edit_makale($id)
	{

        $blog = $this->db->where("blog_id", $id)->get("blogs")->row();
        $array = explode(", ", $blog->kategori);
        $blog->kategori = array_map('intval', $array);
        $dataView["blog"] = $blog;
        
		$yazarlar = $this->db->get("yazarlar")->result();
		$dataView["yazarlar"] = $yazarlar;
        
		$kategoriler = $this->db->get("katagoriler")->result();
		$dataView["kategoriler"] = $kategoriler;
        
		$this->load->view("edit_makale", $dataView);
	}

    public function makale_update($id) 
    {
        // iframe kodu çalışması için
        $metin = str_replace("&lt;", "<", $this->input->post('content'));
        $metin = str_replace("&gt;", ">", $metin);

        // Formdan gelen diğer veriler
        $data = array(
            'title'     => $this->input->post('title'),
            'spot'      => $this->input->post('spot'),
            'makale'    => $metin,
            'yazar_id'  => $this->input->post('yazar'),
            'kategori'  => implode(', ', $this->input->post('kategori')),
        );

        $update = $this->db->where("blog_id", $id)->update("blogs", $data);
        if ($update) {
            $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
            redirect(base_url("kategori/edit_makale/$id"));
        }else{
            print("Olmadı");
        }
    }

    public function makale_update_kapak($id) {
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
            $data['image'] = $upload_data['file_name']; // Yüklenen dosyanın adı
    
            $update = $this->db->where("blog_id", $id)->update("blogs", $data);
            if ($update) {
                $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
                redirect(base_url("kategori/edit_makale/$id"));
            }else{
                print("Olmadı");
            }
        }
    }

    public function delete_makale($id) {
        $delete = $this->db->where('blog_id', $id)->delete('blogs');
        if ($delete) {
            $this->session->set_flashdata("success", "Profiliniz Başarıyla Güncellendi!");
            redirect(base_url("Af45sdieD"));
        }else{
            print("Olmadı");
        }
    }

    public function mail() {
        $data = array('mail' => $this->input->post('mail'));   
        $insert = $this->db->insert("bulten", $data);

        if ($insert) {
            $referer = $this->input->server('HTTP_REFERER');
            redirect($referer);
        }else{
            print("Olmadı");
        }
    }
}
