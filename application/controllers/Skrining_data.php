<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skrining_data extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->database();
       $this->load->model('testi_m', '', TRUE);
   }

     public function kokom(){
     $this->load->view('detailproyek');
   }
   function get_skrining()
   {
     $fetch_data = $this->testi_m->make_dt();
      $data = array();
      foreach($fetch_data as $row)
      {
           $sub_array = array();
           // $sub_array[] = $row->id;
           $sub_array[] = $row->pertanyaan;
           $sub_array[] = $row->description;
           $sub_array[] = '<button type="button" name="update" id="'.$row->id.'" class="btn btn-info btn-xs update">Update</button>';
           $sub_array[] = '<button type="button" name="delete" id="'.$row->id.'" class="btn btn-danger btn-xs delete">Delete</button>';
           $data[] = $sub_array;
      }
      $output = array(
           "draw" => intval($_POST["draw"]),
           "recordsTotal" => $this->testi_m->get_all_data(),
           "recordsFiltered" => $this->testi_m->get_filtered_data(),
           "data" => $data
      );
      echo json_encode($output);
 }
}

?>
