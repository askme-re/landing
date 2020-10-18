<?php 
if(!defined('BASEPATH')) exit('no direct script access allowed');

class Landing_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

  function get_user_detail($where=NULL)
  {
     if (isset($where) or $where != NULL) {
				$this->db->where($where);
		}
		
		$query = $this->db->get('user');
		if ($query->num_rows() > 0) {
				if (isset($where) or $where != NULL) {
						return $query->row();
				} else {
						return $query->result();
				}
		}
		return FALSE;
  }
	
  function get_jenis_skrining($where=NULL)
  {
    if (isset($where) or $where != NULL) {
				$this->db->where($where);
		}
		
		$query = $this->db->get('jns_wabah');
		if ($query->num_rows() > 0) {
				if (isset($where) or $where != NULL) {
						return $query->row();
				} else {
						return $query->result();
				}
		}
		return FALSE;
	}
	
	function save_user($data){
		$this->db->insert('user', $data);
		$insert_id = $this->db->insert_id();

		return  $insert_id;
	}
	
	function quizes($jenis){
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
	
	function insert_screening($data){
		$insert = $this->db->insert_batch('screening', $data); 
		
		return ($insert) ? true : false ;
	}
	
	public function tanya($jenis){
		$qry = $this->db->query('select * from form where jenis="'.$jenis.'"');
		if ($qry->num_rows() > 0){
			return $qry->result();
		}
		return null;
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