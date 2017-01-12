<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
  public function __construct() {
        parent::__construct();
        $this->load->model('uploads'); //load model uploads yang berada di folder model
        if (!$this->session->userdata('logged_in')) {
            redirect('admin/login');
					}
				}

  public function index(){
    $this->load->view('admin/header');
    $this->load->view('admin/home');
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
        $this->load->view('admin/tambah_blog');

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

    public function editblog($id){
      $data['record'] = $this->uploads->getSinglegambar($id)->row_array();
      $this->load->view('admin/header');
      $this->load->view('admin/edit_blog', $data);
      $this->load->view('admin/footer');
    }

    public function update_blog(){
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

              $this->uploads->update_blog($data, $this->input->post('id')); //akses model untuk menyimpan ke database
              redirect('admin/welcome/blog'); //jika berhasil maka akan ditampilkan view gambar
              }
          }
          $data = array(
          'judul_blog' =>$this->input->post('judul'),
          'isi_blog' =>$this->input->post('isi'),
          'gambar' =>$this->input->post('gambar2')
          );

          $this->uploads->update_blog($data, $this->input->post('id')); //akses model untuk menyimpan ke database
          redirect('admin/welcome/blog'); //jika berhasil maka akan ditampilkan view gambar
    }

    //melakukan hapus gambar
    function do_hapus_blog($id) {
        $this->uploads->do_hapus_blog($id);
        redirect('admin/welcome/blog');
    }

    function logout(){
      $this->session->unset_userdata('logged_in');
      redirect('admin/login');
    }
}
