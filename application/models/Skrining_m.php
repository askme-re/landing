<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Untuk percobaan saja
 */
class Skrining_m extends CI_Model
{
  var $table = 'detailjwb';
  var $order_column = array(null,'kode_skrining', 'u.id', 'hasil', 'nama','tp_lahir', 'mp.name nama_prop', 'mkab.name nama_kab', 'mdesa.name nama_desa', 'mkec.name nama_kec', 'email', 'tgl_lahir', 'usia', 'telp','jenis_user', 'tujuan_rs','riw_penyakit','alamat', 'tgl','ts.id_trxs as id_trx', 'q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13');
  var $select_column = array('kode_skrining', 'u.id', 'hasil', 'nama','tp_lahir', 'mp.name nama_prop', 'mkab.name nama_kab', 'mdesa.name nama_desa', 'mkec.name nama_kec','email', 'tgl_lahir', 'usia', 'telp', 'jenis_user', 'ts.id_trxs as id_trx', 'tujuan_rs','riw_penyakit','alamat','tgl','q1','q2','q3','q4','q5','q6','q7','q8','q9','q10','q11','q12','q13');
  var $order = array('tgl' => 'desc'); // default order
  public function __construct()
  {
    parent::__construct();
  //       $this->load->database();
  }
  function make_query()
     {
       // if($this->input->post('id'))
       //  {
       //      $this->db->where('id', $this->input->post('id'));
       //  }
       if($this->input->post('jenis_user'))
        {
            $this->db->like('jenis_user', $this->input->post('jenis_user'));
        }
       if($this->input->post('tujuan'))
        {
            $this->db->like('tujuan_rs', $this->input->post('tujuan'));
        }
        $koom = $this->input->post('hasil');

          if ($koom==0) {
            $this->db->like('hasil', $koom);
          }
          if ($koom==1) {
            $this->db->where('hasil >=', 1);
          }
        $sd = $this->input->post('tgl_awal');
        $endd = $this->input->post('tgl_akhir');
        if($sd)
        {
            $this->db->where('tgl >=', $sd);
        }
        if ($endd) {
          $this->db->where('tgl <=', $endd);
        }
        if($this->input->post('cari'))
        {
            $this->db->like('kode_skrining', $this->input->post('cari'));
            $this->db->or_like('nama', $this->input->post('cari'));
        }
        $i=0;
          $this->db->select($this->select_column);
          $this->db->from($this->table);
          $this->db->join('user u', 'detailjwb.id_user = u.id','left');
      		$this->db->join('provinces mp','mp.id=u.id_prov','left');
      		$this->db->join('regencies mkab','mkab.id=u.id_kab','left');
      		$this->db->join('districts mkec','mkec.id=u.id_kec','left');
      		$this->db->join('villages mdesa','mdesa.id=u.id_kel','left');
      		$this->db->join('trx_skrining ts', 'ts.id_trxs = detailjwb.id_trx','left');

        foreach ($this->select_column as $item) // loop column
        {
            if($_POST['search']['value']) // if datatable send POST for search
            {

                if($i===0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                }
                else
                {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if(count($this->select_column) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if(isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }
        else if(isset($this->order))
        {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
     }

     function make_dt(){
          $this->make_query();
          if($_POST["length"] != -1)
          {
               $this->db->limit($_POST['length'], $_POST['start']);
          }
          $query = $this->db->get();
          return $query->result();
     }
     function get_filtered_data(){
          $this->make_query();
          $query = $this->db->get();
          return $query->num_rows();
     }
     function get_all_data()
     {
          $this->db->select("*");
          $this->db->from($this->table);
          return $this->db->count_all_results();
     }

}

 ?>
