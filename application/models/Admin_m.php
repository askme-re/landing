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
		$this->db->where('role','<>','1');
		$this->db->order_by('nama','asc');

		return $this->db->get();
	}

	public function forms(){
		$this->db->select('*');
		$this->db->from('pertanyaan');
		return $this->db->get();
	}

	public function jns_wabah(){
		$this->db->select('*');
		$this->db->from('jns_wabah');
		return $this->db->get();
	}
	public function result_skrining(){
		$this->db->select('*');
		$this->db->from('data_hasil_skrining');
		return $this->db->get();
	}

	public function detail($where,$table)
	{
		$this->db->join('trx_skrining', 'timestamp(trx_skrining.created_at)=timestamp(hasil_skringin.tgl)','right');
		return $this->db->get_where($table,$where);
	}
	public function detailQues($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	public function detail_userskrin($re,$table)
	{
		return $this->db->get_where($table,$re);
	}
	public function update_skor($bobot2,$bobot1,$id){
		$hasil = $this->db->query("UPDATE `form` SET `bobot2` = '$bobot2', `bobot1` = '$bobot1' WHERE `form`.`id` = $id");
		return $hasil;
	}
	public function quizes(){
		$str = "SELECT f.id, f.pertanyaan,f.jenis,b.id AS id_bobot,b.bobot,b.jawaban,b.id_pertanyaan
					,CASE WHEN b.jawaban=1 THEN 'Iya'
						WHEN b.jawaban = 0 THEN 'Tidak' END AS opsi_bobot
					FROM form f
					LEFT JOIN bobot b ON b.id_pertanyaan=f.id
					group by f.pertanyaan ORDER BY f.id";
		$qry = $this->db->query($str);
		if ($qry->num_rows() > 0){
			return $qry->result();
		}
		return null;
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

}
?>
