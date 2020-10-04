<?php if(!defined('BASEPATH')) exit('no direct script access allowed');

class Landing_m extends CI_Model
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

		return $this->db->get();
	}

	public function insert_form($nama, $tempat_lhr, $tanggal_lhr){
		$hasil = $this->db->query("insert into user (name, pob, dob, role)  
			values ('$nama', '$tempat_lhr', '$tanggal_lhr', '0') ");
		return $hasil;
	
	}
	function hasilask(){
		$hasi=$this->db->query("select  nama, (SELECT sum(nilai) FROM `temp_trx` group by tgl) total , tgl from temp_trx GROUP BY nama");
		return $hasi;
	}



	public function pertanyaan(){
		$hasil = $this->db->query("select * from form where jenis=1");
		return $hasil;
	}
		public function jawb(){
		$hasil = $this->db->query("select * from form where jenis=1");
		return $hasil;
	}

	public function sets(){
		$this->db->select('*');
		$this->db->from('tsetting');
		$this->db->order_by('id','ASC');

		return $this->db->get();
	}
	public function quizes($jenis){
		$str = "SELECT f.id, f.pertanyaan,f.jenis,b.id AS id_bobot,b.bobot,b.jawaban,b.id_pertanyaan
					,CASE WHEN b.jawaban=1 THEN 'Iya'
						WHEN b.jawaban = 0 THEN 'Tidak' END AS opsi_bobot
					FROM form f 
					LEFT JOIN bobot b ON b.id_pertanyaan=f.id
					WHERE f.jenis='".$jenis."' ORDER BY f.id";
		$qry = $this->db->query($str);
		if ($qry->num_rows() > 0){
			return $qry->result();
		}
		return null;
	}
	
	public function save_trx($data){
		$query = $this->db->insert('temp_trx', $data);
		
		return ($query) ? true : false;
	}
	
	function get_provinsi(){
		$this->db->select('id_prop AS k, nama_prop AS v');
        $this->db->from('ms_provinsi'); 
        $query = $this->db->get();
									
		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}
	
	function get_kabupaten($id_prov){
		$this->db->select('id_kab AS k, nama_kab AS v');
		$this->db->from('ms_kabupaten');
		$this->db->where('id_prop', $id_prov);
        $query = $this->db->get();
									
		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}
	
	function get_kecamatan($id_kab){
		$this->db->select('id_kec AS k, nama_kec AS v');
		$this->db->from('ms_kecamatan');
		$this->db->where('id_kab', $id_kab);
        $query = $this->db->get();
									
		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}
	
	function get_kelurahan($id_kec){
		$this->db->select('id_desa AS k, nama_desa AS v');
		$this->db->from('ms_desa');
		$this->db->where('id_kec', $id_kec);
        $query = $this->db->get();
									
		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}
}
 ?>