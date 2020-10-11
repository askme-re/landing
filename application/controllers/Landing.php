<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

  public function __construct() 
  {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_m');
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

  }

  function biodata()
  {
    $head['title'] = 'Biodata';

    // $data;

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/index');
    $this->load->view('layout/landing/footer');
  }

  function screening()
  {
    $head['title'] = 'Scrining';

    // $data;

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
