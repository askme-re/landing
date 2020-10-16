<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
			$result = array(
				'status' => 1,
				'url' => 'index.php/landing/screening/'.$user->id_user
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
    
		$data['prov'] = $this->landing_model->get_provinsi();

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/biodata', $data);
    $this->load->view('layout/landing/footer');
  }

  function biodata_save()
  {
    $user['nama'] = $this->input->post('nama');
		$user['tp_lahir'] = $this->input->post('tempat_lahir');
		$user['tgl_lahir'] = $this->input->post('tgl_lahir');
		$user['id_prov'] = $this->input->post('prov');
		$user['id_kab'] = $this->input->post('kab');
		$user['id_kec'] = $this->input->post('kec');
		$user['id_kel'] = $this->input->post('kel');
		$user['alamat'] = $this->input->post('alamat');
		$user['telp'] = $this->input->post('telp');
		$user['email'] = $this->input->post('email');
		
		// save user data return id
		$id_user = $this->landing_model->save_user($user);
		// $param = base64_encode(date('Ymd').'#'.$id_user.'#'.$user['email']);
		
		redirect('index.php/landing/screening/'.$id_user);
  }

  function screening()
  {
    $head['title'] = 'Scrining';

    $link = $_SERVER['PHP_SELF'];
    $link_array = explode('/',$link);
    $user_id = end($link_array);
		
		$data['user_id'] = $user_id;
		// $data['jenis'] = $this->landing_model->jenis_penyakit();
		// print_r($data['questions']);exit;

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/screening',$data);
    $this->load->view('layout/landing/footer');
  }
	
	function screening_save()
	{
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		$arr_add = '';
		
		// save hasil screening by key jenis & user_id
		$nilai = 0;
		$quizes = $this->landing_model->tanya($jenis);
		
		$data['tgl'] = date('Y-m-d');
		$data['id_user'] = $id;
		
		foreach($quizes as $v){
			$rb = 'rb_'.$v->id;
			$str_bobot = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
			
			$data['id_pertanyaan'] = $v->id;
			$data['id_bobot'] = '';
			$data['hasil'] = '';
			
			if($str_bobot != null )
			{
				$arr_bobot = explode("#",$str_bobot);
				$nilai = $nilai + $arr_bobot[1];
				
				// $data[$val] = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
				$data['id_bobot'] = $arr_bobot[0];
				$data['hasil'] = $nilai;
			}
			
			print_r($data);exit;
			// array_push($screening, $data);
		}
		
		
		print_r("Scrining save");exit;
	}

  function test()
  {
    $this->load->view('publik/index');
  }
	

  
	function ajax_quiz(){
		$jenis = $this->input->post('jenis');
		
		$query = $this->landing_model->quizes($jenis);
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
			
			if(!is_null($v->bobot)){
				$result .= '
                          <div class="radio">
							  <label>
								<input type="radio" name="rb_'.$v->id.'" value="'.$v->bobot.'" required>
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
