<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_m');
	}

	public function pengguna()
	{
		$data['pengguna'] = $this->admin_m->users();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pengguna',$data);
		$this->load->view('footer_admin');
	}

	public function pertanyaan()
	{
		$data['pertanyaan'] = $this->admin_m->forms();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pertanyaan',$data);
		$this->load->view('footer_admin');
	}
	public function skrinning()
	{
		$data['result'] = $this->admin_m->screening();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('footer_admin');
	}

	function isiscreening()
	{
		$this->load->library('session'); 
		$this->load->helper('url'); 
		$nama_proyek = $this->input->post('nama_proyek');
		$nilai_proyek =$this->input->post('nilai_proyek');
		$kualitas =$this->input->post('kualitas');
		$kualitas =$this->input->post('kualitas');
		$komunikasi =$this->input->post('komunikasi');
		$komunikasi =$this->input->post('komunikasi');
		$stakeholder =$this->input->post('respon');
		$this->admin_m->insert_form($nama_proyek, $nilai_proyek, $kualitas, $komunikasi, $respon, $waktu_proyek, $jenis_proyek);
		$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Success!</strong> Berhasil simpan. </div>");
		
		redirect('calc');
	}

	function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo "$randomString";
    // return $randomString;
	    // break;
	    // break;

	}

	public function callkode()
	{
		$this->generateRandomString();
	}

	public function hasil()
	{
		$data['pengguna'] = $this->Admin_m->users();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pengguna',$data);
		$this->load->view('footer_admin');
	}
}