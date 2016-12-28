<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->model('uploads'); //load model uploads yang berada di folder model
		}

	public function index(){
		$this->load->view('header');
		$this->load->view('home');
		$this->load->view('footer');
	}

	public function blog(){
		$data['record'] = $this->uploads->getBlog();
		$this->load->view('header');
		$this->load->view('blog',$data);
		$this->load->view('footer');
	}

	public function testimoni(){
		$this->load->view('header');
		$this->load->view('testimoni');
		$this->load->view('footer');
	}

	public function about(){
		$this->load->view('header');
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function contact(){
		$this->load->view('header');
		$this->load->view('contact');
		$this->load->view('footer');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
