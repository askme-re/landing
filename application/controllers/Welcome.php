<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_model');
		// $this->load->model('admin_m');
		$this->load->library('session');
	}
	
	function index(){
		$head['title'] = 'Landing';

		$this->load->view('layout/landing/header', $head);
		$this->load->view('layout/landing/nav_header');
		$this->load->view('landing/index');
		$this->load->view('layout/landing/footer');
	}
	
	function user_check()
	{
		$phone = $this->input->post('phone');
		// $setuju = $this->input->post('setuju');
		$status = $this->input->post('dd_status');
		$tujuan = $this->input->post('dd_tujuan');
		$riwayat = $this->input->post('cb_tujuan');
		
		// is user available
		$user = $this->landing_model->get_user_detail(array('telp' => $phone));
		
		if($user){
			// overwrite data user
			$id = $user->id;
			
			$data['telp'] = $phone;
			$data['riw_penyakit'] = $riwayat;
			$data['tujuan_rs'] = $tujuan;
			$data['jenis_user'] = $status;
			
			$this->db->where('id', $id);
			$this->db->update('user', $data);

			$this->session->set_flashdata('message_sukses', 'Perubahan Data Berhasil Disimpan');

			redirect("/welcome/screening/$id");
			
		} else {
			// save new user return id
			$data['telp'] = $phone;
			$data['riw_penyakit'] = $riwayat;
			$data['tujuan_rs'] = $tujuan;
			$data['jenis_user'] = $status;
			
			$this->db->insert('user', $data);
			$id = $this->db->insert_id();

			$this->session->set_flashdata('message_sukses', 'Data Berhasil Disimpan');

			redirect("/welcome/biodata/$id");
		}
	}


	function biodata($id_user)
	{
	$head['title'] = 'Biodata';
		
	$data['user'] = $this->landing_model->get_user_detail(array('id' => $id_user));
	$data['prov'] = $this->landing_model->get_provinsi();

	$this->load->view('layout/landing/header', $head);
	$this->load->view('layout/landing/nav_header_logo');
	$this->load->view('landing/biodata', $data);
	$this->load->view('layout/landing/footer');
	}
	
	function biodata_save()	{
		$id = $this->input->post('id');
		$user['nama'] = $this->input->post('nama');
		$user['tp_lahir'] = $this->input->post('tempat_lahir');
		$user['tgl_lahir'] = $this->input->post('tgl_lahir');
		$user['id_prov'] = $this->input->post('prov');
		$user['id_kab'] = $this->input->post('kab');
		$user['id_kec'] = $this->input->post('kec');
		$user['id_kel'] = $this->input->post('kel');
		$user['alamat'] = $this->input->post('alamat');
		$user['email'] = $this->input->post('email');
			
			// overwrite data user				
		$this->db->where('id', $id);
		$this->db->update('user', $user);

		$this->session->set_flashdata('message_sukses', 'Perubahan Data Berhasil Disimpan');

		redirect("/welcome/screening/$id");
	}

	
function screening($id_user)
  {
    $head['title'] = 'Scrining';
		
		$data['user_id'] = $id_user;
		$data['jenis'] = $this->landing_model->get_jenis_skrining();

		// print_r($data);exit;
		
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
		
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i <5; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		// save hasil screening by key jenis & user_id
		$screening = array();
		$nilai = 0;
		$quizes = $this->landing_model->tanya($jenis);
		
		foreach($quizes as $v){
			$rb = 'rb_'.$v->id;
			$str_bobot = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
			
			$data['id_user'] = $id;
			$data['id_pertanyaan'] = $v->id;
			
			if($str_bobot != null )
			{
				$arr_bobot = explode("#",$str_bobot);
				$nilai = $nilai + $arr_bobot[1];
				
				$data['id_bobot'] = $arr_bobot[0];
			}
			
			array_push($screening, $data);
		}
		
		$query = $this->db->insert_batch('screening', $screening);
		if($query){
			// save to header 
			$header['hasil'] = $nilai;
			$header['id_wabah'] = $jenis;
			$header['id_user'] = $id;
			$header['kode_skrining'] = $randomString;
			
			$this->db->insert('trx_skrining', $header);
			
			redirect('/welcome/hasil_screening/'.$id);
		}


	}

	function hasil_screening($id){
		$this->load->view('header');
		$data['user'] = $this->landing_model->result_skrining($id);
		$this->load->view('publik/redirecthasil',$data);
		$this->load->view('footer');
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
								<div class="form-group">
								<label class="form-check-label">'.$no.'. '.$v->pertanyaan.'</label>';
				
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
	
	public function test(){
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i <5; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		
		print_r($randomString);
	}

	function inde($id){
	   //   $this->load->library('pdf');
	 	$image="ASK_ME.jpg";
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'ASK ME',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        // $pdf->Cell(20,6,'NIM',1,0);
        // $pdf->Cell(85,6,'NAMA Kamu',1,0);
        // $pdf->Cell(27,6,'NO HP',1,0);
        // $pdf->Cell(25,6,'TGL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        // $hasil = $this->db->get('temp_trx')->result();
        // $hasil = $this->db->query("select * from data_hasil_skrining where kode ='$kode' ")->result();
        $hasil = $this->db->query("select * from data_hasil_skrining where id_user='$id' ")->result();
        foreach ($hasil as $row){
        	$pdf->Cell(190,7,"Rangkuman Data Skrining Penyakit Menular : ".$row->nama,0,1,'l');
        	$pdf->Cell(190,7,"Tanggal Lahir: ".$row->tgl_skrining,0,1,'l');
            $pdf->Cell(55,6,"Tanggal Screening ".$row->tgl_skrining,0,1);
            if ($row->hasil >5) {
            	$kesimpulan = "Merah, Anda harus melakukan rujukan";
            }else{
            	$kesimpulan = "Hijau";
            }
            $pdf->Cell(55,6,"Hasil : ".$kesimpulan,0,1);
            $pdf->Cell(55,6,"Tempat Lahir : ".$row->hasil,0,1);
            $pdf->Cell(55,6,"Jenis Skrining: ".$row->jenis_user,0,1);
            $pdf->Cell(55,6,"Kode ".$row->kode_skrining,1,0);
        }
        $pdf->Image('./assets/img/'.$image,100,15,35,35);
        $pdf->Output("D","skrining.pdf");
    }

}
