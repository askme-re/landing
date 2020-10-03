<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_m');
		$this->load->library('session'); 
		$this->load->helper('url'); 
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

	public function detailquiz($id)
	{
		$where = array('id' => $id);
		
		$data['datapertanyaan'] = $this->admin_m->detail_quiz($where,'form')->result();
		
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/quiz_detail',$data);
		$this->load->view('footer_admin');
	}

	public function detailpertanyaan($id)
	{
		$where = array('id' => $id);
		
		$data['datapertanyaan'] = $this->admin_m->detail($where,'form')->result();
		
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pertanyaan_detail',$data);
		$this->load->view('footer_admin');
	}
	function updateskor()
	{
		$bobot1 = $this->input->post('bobot1');
		$bobot2 =$this->input->post('bobot2');
		$id =$this->input->post('id');
		$this->admin_m->update_skor($bobot2,$bobot1,$id);
		$this->pertanyaan();
	}
		function updatequiz()
	{
		$pertanyaan = $this->input->post('pertanyaan');
		$pilihan1 = $this->input->post('pilihan');
		$pilihan2 =$this->input->post('pilihan2');
		$id =$this->input->post('id');
		$this->admin_m->update_quiz($pertanyaan,$pilihan1,$pilihan2,$id);
		$this->pertanyaan();
	}
	public function skrinning()
	{
		$data['result'] = $this->admin_m->get_all();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/dashboard',$data);
		$this->load->view('footer_admin');
	}

	function isiscreening()
	{
		// $nama_proyek = $this->input->post('nama_proyek');
		// $nilai_proyek =$this->input->post('nilai_proyek');
		// $kualitas =$this->input->post('kualitas');
		// $kualitas =$this->input->post('kualitas');
		// $komunikasi =$this->input->post('komunikasi');
		// $komunikasi =$this->input->post('komunikasi');
		// $kode =$this->generateRandomString();
		$this->admin_m->insert_form($nama_proyek, $nilai_proyek, $kualitas, $komunikasi, $respon, $waktu_proyek, $jenis_proyek);
		$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Success!</strong> Berhasil simpan. </div>");
		
		redirect('calc');
	}
	function detailSkrining($id)
	{
		$where = array('id' => $id);
		
		$data['datascreening'] = $this->admin_m->detail_skrining($where,'temp_trx')->result();
		
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/skrining_detail',$data);
		$this->load->view('footer_admin');
	}

	function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo "$randomString";

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