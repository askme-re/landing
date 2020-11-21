<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Pertanyaan extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->model('admin_m');
   }

   public function index()
   {
    $this->load->view('header_admin');
    $this->load->view('navigasi');
    $this->load->view('admin/pertanyaan');
    $this->load->view('footer_admin');
   }

   public function detailQuestion($id)
   {
     // $query = $this->admin_m->jns_wabah();
      $where = array('jenis' => $id, 'opsi_bobot' => "Iya");
      $data['dataQuestion'] = $this->admin_m->detailQues($where,'pertanyaans')->result();
      $this->load->view('header_admin');
      $this->load->view('navigasi');
      $this->load->view('admin/pertanyaan_detail',$data);
      $this->load->view('footer_admin');
   }

   public function get_pertanyaan()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      // $query = $this->admin_m->forms();
      $query = $this->admin_m->jns_wabah();
      $data = [];
      foreach($query->result() as $r) {

           $data[] = array(
                $r->id,
                $r->wabah,
                $r->ket,
                "<a class='btn btn-info btn-lg' href='pertanyaan/detailQuestion/$r->id'> Detail </a>"

           );
      }

      $result = array(
               "draw" => $draw,
                 "recordsTotal" => $query->num_rows(),
                 "recordsFiltered" => $query->num_rows(),
                 "data" => $data
            );
      echo json_encode($result);
      exit();
   }
}
