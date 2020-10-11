<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function __construct() 
  {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_model');
		$this->load->library('session');
  }
  
  function index()
  {
    $head['title'] = 'Landing';

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header');
    $this->load->view('landing/index');
    $this->load->view('layout/landing/footer');
  }

  function cek_user_email()
  {
    $us_mail = $this->input->post('email');

    // is user available
    $user = $this->landing_model->get_user_detail($us_mail);
    if($user){
      $param = base64_encode(date('Ymd').'#'.$user->id_user.'#'.$user->email);
			$result = array(
        'status' => 1,
        'url' => 'index.php/landing/screening/'.$param
			);
		} else {
			$result = array(
        'status' => 0,
        'url' => 'index.php/landing/biodata'
			);
		}
    echo json_encode($result);
  }

  function biodata()
  {
    $head['title'] = 'Biodata';
    
    // $data;

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/biodata');
    $this->load->view('layout/landing/footer');
  }

  function screening()
  {
    $head['title'] = 'Scrining';

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $data['uri'] = end($link_array);

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/biodata');
    $this->load->view('layout/landing/footer');
  }

  function test()
  {
    $this->load->view('publik/index');
  }
}
