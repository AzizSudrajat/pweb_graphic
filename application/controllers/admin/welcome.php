<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->model('uploads'); //load model uploads yang berada di folder model
        // $this->load->helper(array('url')); //load helper url
				}

  public function index(){
    $this->load->view('admin/header');
    $this->load->view('admin/blog');
    $this->load->view('admin/footer');
  }

  public function blog(){
    $data['record'] = $this->uploads->getBlog();
    $this->load->view('admin/header');
    $this->load->view('admin/blog', $data);
    $this->load->view('admin/footer');
  }

  public function tambahblog(){
    $this->load->view('admin/header');
    $this->load->view('admin/tambah_blog');
    $this->load->view('admin/footer');
  }

  public function insert_blog(){
		$this->load->library('upload');
		$nmfile = "file_".time(); //nama file saya beri nama langsung dan diikuti fungsi time
    $config['upload_path'] = './uploads/blog/'; //path folder
  	$config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
    $config['max_size'] = '200488'; //maksimum besar file 20M
    $config['file_name'] = $nmfile; //nama yang terupload nantinya
		$this->upload->initialize($config);

		if($_FILES['gambar']['name'])
		{
			if (!$this->upload->do_upload('gambar'))
			{
				// $error = array('error' => $this->upload->display_errors());
        $this->load->view('admin/tambah_blog');
				//redirect('admin/welcome/tambahgambar'); //jika gagal maka akan ditampilkan form tambahgambar

        	}else{

          	$gbr = $this->upload->data();
            $data = array(
            'judul_blog' =>$this->input->post('judul'),
            'isi_blog' =>$this->input->post('isi'),
            'gambar' =>$gbr['file_name']
            );

            $this->uploads->insert_blog($data); //akses model untuk menyimpan ke database
            redirect('admin/welcome/blog'); //jika berhasil maka akan ditampilkan view gambar

            }
        }
    }
}
