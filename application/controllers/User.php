<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->model('admin_m');
   }

   public function index()
   {
    $this->load->view('header_admin');
    $this->load->view('navigasi');
    $this->load->view('admin/pengguna');
    $this->load->view('footer_admin');
   }

   public function get_pengguna()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->admin_m->users();
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->id_user,
                $r->nama,
                $r->jenis_user,
                $r->telp,
                $r->riw_penyakit

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