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
		
		// is user available
		$user = $this->landing_model->get_user_detail($us_mail);
    if($user){
			// overwrite data user
			
			
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
	
  function screening()
  {
    $head['title'] = 'Scrining';

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $user_id = end($link_array);
		
		$data['user_id'] = 1;
		// $data['user_id'] = $user_id;
		$data['jenis'] = $this->landing_model->get_jenis_skrining();
		// print_r($data['jenis']);exit;

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/screening',$data);
    $this->load->view('layout/landing/footer');
  }
	
	
	
	
	function ajax_quiz(){
		$jenis = $this->input->post('jenis');
		
		$query = $this->landing_model->quizes($jenis);
		$result = "";
		$nQuiz = 0;
		$no = 0;
		foreach($query as $v){
			if($nQuiz != $v->id){
				$no++;
				
				if($nQuiz > 0){
					$result .= '
									</div>
								  </div>';
				}
				
				// Write question
				$result .= '<div class="col-sm-10 ">
							  <div>'.$no.'</div>
								<div class="form-group">
								<label class="form-check-label">'.$v->pertanyaan.'</label>';
				
				// Set id of question
				$nQuiz = $v->id;
			}
			
			if(!is_null($v->bobot)){
				$result .= '
                          <div class="radio">
							  <label>
								<input type="radio" name="rb_'.$v->id.'" value="'.$v->id_bobot.'#'.$v->bobot.'" required>
								'.$v->opsi_bobot.'
							  </label>
                          </div>';
			}
			
		}
		echo json_encode($result);
	}

	function ajax_kab(){
		$idprov = $this->input->post('id');
		
		$query = $this->landing_model->get_kabupaten($idprov);
		if($query){
			$result = array(
				'status' => 1,
				'data' => $query
			);
		} else {
			$result = array(
				'status' => 0,
				'data' => [
					'msg' => "We found a problem, please restart your page and try again."
				]
			);
		}
		echo json_encode($result);
	}

	function ajax_kec(){
		$key = $this->input->post('id');
		
		$query = $this->landing_model->get_kecamatan($key);
		if($query){
			$result = array(
				'status' => 1,
				'data' => $query
			);
		} else {
			$result = array(
				'status' => 0,
				'data' => [
					'msg' => "We found a problem, please restart your page and try again."
				]
			);
		}
		echo json_encode($result);
	}

	function ajax_kel(){
		$key = $this->input->post('id');
		
		$query = $this->landing_model->get_kelurahan($key);
		if($query){
			$result = array(
				'status' => 1,
				'data' => $query
			);
		} else {
			$result = array(
				'status' => 0,
				'data' => [
					'msg' => "We found a problem, please restart your page and try again."
				]
			);
		}
		echo json_encode($result);
	}

	
	
	

}
