<?php 
if(!defined('BASEPATH')) exit('no direct script access allowed');

class Landing_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

  function get_user_detail($email)
  {
    $this->db->select('*');
    $this->db->from('user');
    $this->db->where('email',$email);
    $qry = $this->db->get();

    if ($qry->num_rows() > 0){
			return $qry->row();
		}
		return null;
  }
	
}
?>