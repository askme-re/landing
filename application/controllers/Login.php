<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('login_m');
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
		$where = array(
			'email' => $email,
			'password' => md5($password)
			);
		$cek = $this->login_m->cek_login("user",$where)->num_rows();
		if($cek > 0){
 
			$data_session = array(
				'email' => $email,
				'status' => "login"
				);
 
			$this->session->set_userdata($data_session);
 
			$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Sukses!</strong>Login Berhasil !</div>");
			redirect(base_url("index.php/user"));
 
		}else{
			$this->session->set_flashdata('msg', "<div class='alert alert-warning' role='alert'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Gagal!</strong> Email atau password salah !</div>");
			redirect('Login');
		}
	}

	function keluar(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}

}
