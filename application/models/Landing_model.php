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

	function is_user_avail($telp){
		$str = "SELECT * FROM user WHERE telp='".$telp."'";
		$qry = $this->db->query($str);

		if ($qry->num_rows() > 0){
			return $qry->row();
		}
		return null;
	}
	function get_usia($id){
		$str = "SELECT * FROM user WHERE id='$id'";
		$qry = $this->db->query($str);

		if ($qry->num_rows() > 0){
			return $qry->row();
		}
		return null;
	}
	function get_last(){
		$str = "SELECT max(id_trx) kodeTerbesar FROM screening";
		$qry = $this->db->query($str);
		return $qry->row();
	}

  function get_jenis_skrining($where=NULL){
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
					,CASE WHEN b.jawaban=1 THEN 'Ya'
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
		$this->db->select('id AS k, name AS v');
        $this->db->from('provinces');
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();

		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}

	function get_kabupaten($id_prov){
		$this->db->select('id AS k, name AS v');
		$this->db->from('regencies');
		$this->db->where('province_id', $id_prov);
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();

		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}

	function get_kecamatan($id_kab){
		$this->db->select('id AS k, name AS v');
		$this->db->from('districts');
		$this->db->where('regency_id', $id_kab);
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();

		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}

	function get_kelurahan($id_kec){
		$this->db->select('id AS k, name AS v');
		$this->db->from('villages');
		$this->db->where('district_id', $id_kec);
		$this->db->order_by('name', 'ASC');
        $query = $this->db->get();

		if ($query->num_rows() > 0){
			return $query->result();
		}
		return null;
	}

	function result_skrining($id){
		$this->db->select('*');
		$this->db->from('data_hasil_skrining');
		$this->db->where('id_user', $id);
		$this->db->order_by('tgl_skrining', 'desc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->result();
	}
}
?>
