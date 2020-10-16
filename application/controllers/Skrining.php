<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Kontroller untuk proses login pengguna saja


*/
class Skrining extends CI_Controller {

	public function __construct(){
		parent:: __construct();
		$this->load->model('admin_m');
	}

}