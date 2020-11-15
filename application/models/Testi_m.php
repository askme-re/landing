<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Untuk percobaan saja
 */
class Testi_m extends CI_Model
{
  var $table = 'form';
  var $order_column = array(null,'id','pertanyaan','description');
  var $select_column = array('id','pertanyaan','description');
  var $order = array('id' => 'asc'); // default order
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
       if($this->input->post('pertanyaan'))
        {
            $this->db->like('pertanyaan', $this->input->post('pertanyaan'));
        }
        if($this->input->post('description'))
        {
            $this->db->like('description', $this->input->post('description'));
        }
        $i=0;
          // $this->db->select($this->select_column);
          $this->db->from($this->table);

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
