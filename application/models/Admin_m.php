<?php if(!defined('BASEPATH')) exit('no direct script access allowed');

class Admin_m extends CI_Model
{
	
	public function __construct()
	{
		parent::__construct();
	}

	public function users(){
		$this->db->select('*');
		$this->db->from('user');
		$this->db->order_by('name','asc');

		return $this->db->get();
	}
	public function forms(){
		$this->db->select('*');
		$this->db->from('form');
		$this->db->join('bobot','form.id = bobot.id');
		return $this->db->get();
	}
	public function detail($where,$table)
	{	
		return $this->db->get_where($table,$where);
	}
	public function detail_quiz($where,$table)
	{	
		return $this->db->get_where($table,$where);
	}
	public function update_skor($bobot2,$bobot1,$id){
		$hasil = $this->db->query("UPDATE `form` SET `bobot2` = '$bobot2', `bobot1` = '$bobot1' WHERE `form`.`id` = $id");
		return $hasil;
	}

	public function update_quiz($pertanyaan,$pilihan1,$pilihan2,$id){
		$hasil = $this->db->query("UPDATE `form` SET `pilihan` = '$pilihan1', `pilihan2` = '$pilihan2', `pertanyaan` = '$pertanyaan' WHERE `form`.`id` = $id");
		return $hasil;
	}
	public function detail_skrining($where,$table)
	{	
		return $this->db->get_where($table,$where);
	}
	public function insert_form(){
	// $nama_proyek, $dana, $jenis, $daterange, $institusi, $frekuensi, 
	// 		$teknologi,
	// 		$jmlh,
	// 		$jun,
	// 		$mutuprogrammer,
	// 		$low,
	// 		$senior,
	// 		$konfirmasi_user,
	// 		$testing,
	// 		$spesifikasi,
	// 		$waktu_proyek,
	// 		$tanggal,
	// 		$hasil)
	// {
	// 	$hasil = $this->db->query("insert into temptbl (nama_proyek, dana, jenis, waktu, institusi, frekuensi, teknologi, jmhl_pro, 
	// 		jun, mutuprogrammer, low, senior, 
	// 		 konfirmasi_user, testing, spesifikasi, tanggal, hasil, durasi)  
	// 		values ('$nama_proyek', '$dana', '$jenis', '$daterange', '$institusi', '$frekuensi',
	// 		 '$teknologi',
	// 		 '$jmlh',
	// 			,'$waktu_proyek') ");
	// 	return $hasil;
	}



	public function screening(){
		$this->db->select('*');
		$this->db->from('temp_trx');
		// $this->db->order_by('name','asc');

		return $this->db->get();
	}

	public function sets(){
		$this->db->select('*');
		$this->db->from('tsetting');
		$this->db->order_by('id','ASC');

		return $this->db->get();
	}
	public function get_all(){
			return $this->db->get('temp_trx')->result();
			var_dump($this->db->get()->result());
	}
	public function pertanyaan()
	{
		$data['pertanyaan'] = $this->admin_m->forms();
		$this->load->view('header_admin');
		$this->load->view('navigasi');
		$this->load->view('admin/pertanyaan',$data);
		$this->load->view('footer_admin');
	}
	
	
	
}
?>