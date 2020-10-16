<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Kontroller untuk proses login pengguna saja


*/
class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_m');
	}

	public function index()
	{
		$this->load->view('header_admin');
		$this->load->view('admin/login_v');
		$this->load->view('footer_admin');
	}
	public function masuk()
	{
		$email =$this->input->post('email');
		$password =$this->input->post('password');
		if ($email=="admin@mail.com" && $password =="cinta") {
			$this->skrinning();
		}else{
			redirect('Login');
		}
	}

	public function skrinning()
	{
		$data['result'] = $this->admin_m->get_all();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('footer_admin');
	}
	
}
