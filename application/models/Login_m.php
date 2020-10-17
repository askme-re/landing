<?php if(!defined('BASEPATH')) exit('no direct script access allowed');

class Login_m extends CI_Model
{
	
	function cek_login($table,$where){		
		return $this->db->get_where($table,$where);
	}	

}
?>