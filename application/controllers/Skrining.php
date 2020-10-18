<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skrining extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->model('admin_m');
   }

   public function index()
   {
    $this->load->view('header_admin');
    $this->load->view('navigasi');
    $this->load->view('admin/skrining_v');
    $this->load->view('footer_admin');
   }

   public function get_hasil_skrining()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->admin_m->result_skrining();
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->id,
                $r->tgl_skrining,
                $r->kode_skrining,
                $r->nama,
                $r->telp,
                $r->hasil,
                $r->wabah,
                $r->usia,
                $r->jenis_user,
                $r->tujuan_rs

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