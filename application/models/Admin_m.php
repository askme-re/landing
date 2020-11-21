<?php if(!defined('BASEPATH')) exit('no direct script access allowed');

class Admin_m extends CI_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function users(){
		$this->db->select('user.id id, user.nama nama, email, alamat, telp, jenis_user, tp_lahir, tgl_lahir, tujuan_rs, mp.name nama_prop, mkab.name nama_kab, mdesa.name nama_desa, mkec.name nama_kec,riw_penyakit');
		$this->db->from('user');
		$this->db->where('role','<>','1');
		$this->db->join('provinces mp','mp.id=user.id_prov','left');
		$this->db->join('regencies mkab','mkab.id=user.id_kab','left');
		$this->db->join('districts mkec','mkec.id=user.id_kec','left');
		$this->db->join('villages mdesa','mdesa.id=user.id_kel','left');
		$this->db->order_by('lasttime','desc');

		return $this->db->get();
	}

	public function forms(){
		$this->db->select('*');
		$this->db->from('pertanyaans');
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
		$this->db->join('trx_skrining ts', 'ts.id_trxs = hasil_skringin.id_trx','left');
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

	public function dataSkrining($id){
		$this->db->select('kode_skrining, u.id, hasil, nama,tp_lahir, mp.name nama_prop, mkab.name nama_kab, mdesa.name nama_desa, mkec.name nama_kec,
		email, tgl_lahir, usia, telp, jenis_user,id_trx, id_trxs, tujuan_rs,riw_penyakit,alamat, tgl, q1,q2,q3,q4,q5,q6,q7,q8,q9,q10,q11,q12,q13');
		$this->db->from('detailjwb');
		$this->db->join('user u', 'detailjwb.id_user = u.id','left');
		$this->db->join('provinces mp','mp.id=u.id_prov','left');
		$this->db->join('regencies mkab','mkab.id=u.id_kab','left');
		$this->db->join('districts mkec','mkec.id=u.id_kec','left');
		$this->db->join('villages mdesa','mdesa.id=u.id_kel','left');
		$this->db->join('trx_skrining ts', 'ts.id_trxs = detailjwb.id_trx','left');
		if (!empty($id)) {
			$this->db->where('kode_skrining',$id);
			return $this->db->get();
		}
		return $this->db->get();

	}


	public function detail_skrining($where,$table)
	{
		return $this->db->get_where($table,$where);
	}
	function hapus($where,$table)
	{
		// return $this->db->get_where($table,$where);
		$this->db->where('id_trxs', $where);
		$this->db->delete($table);
		$this->db->where('id_trx', $where);
		$this->db->delete('screening');
	}
	public function screening(){
		$this->db->select('*');
		$this->db->from('temp_trx');
		// $this->db->order_by('name','asc');

		return $this->db->get();
	}

}
?>
