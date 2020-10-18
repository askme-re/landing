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

   public function get_pertanyaan()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));

      $query = $this->admin_m->forms();
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->id,
                $r->pertanyaan,
                $r->penyakit,
                $r->opsi_bobot,
                $r->bobot

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