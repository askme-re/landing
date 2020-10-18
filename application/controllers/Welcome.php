<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct() {
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
	
	function user_check()
	{
		$phone = $this->input->post('phone');
		$status = $this->input->post('status');
		$riwayat = $this->input->post('riwayat');
		$tujuan = $this->input->post('tujuan');
		
<<<<<<< .merge_file_a04076
		// is user available
		$user = $this->landing_model->get_user_detail($us_mail);
    if($user){
			// overwrite data user
||||||| .merge_file_a13540
		$query = $this->landing_m->quizes($jenis);
		$result = "";
		$nQuiz = 0;
		foreach($query as $v){
			if($nQuiz != $v->id){
				if($nQuiz > 0){
					$result .= '
									</div>
								  </div>';
				}
				
				// Write question
				$result .= '<div class="col-sm-10 ">
							  <div class="form-group">
								<label class="form-check-label">'.$v->pertanyaan.'</label>';
				
				// Set id of question
				$nQuiz = $v->id;
			}
=======
		$query = $this->landing_m->quizes($jenis);
		$result = "";
		$nQuiz = 0;
		foreach($query as $v){
			if($nQuiz != $v->id){
				if($nQuiz > 0){
					$result .= '
									</div>
								  </div>';
				}
				
				// Write question
				$result .= '<div class="col-sm-10 ">
							  <div class="form-group">
							  <label class="form-check-label">'.$nQuiz.'</label>	
								<label class="form-check-label">'.$v->pertanyaan.'</label>';
				
				// Set id of question
				$nQuiz = $v->id;
			}
>>>>>>> .merge_file_a11880
			
			
		} else {
			// save new user return id
			
			
		}
    // echo json_encode($id_user);
	}

  function biodata()
  {
    $head['title'] = 'Biodata';
    
		$data['prov'] = $this->landing_model->get_provinsi();

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/biodata', $data);
    $this->load->view('layout/landing/footer');
  }
	
	
	
	
	
	
	

}
