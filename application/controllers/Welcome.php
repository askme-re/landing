<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_model');
		$this->load->library('session');
	}

	function index(){
		$head['title'] = 'Landing';

		$this->load->view('layout/landing/header', $head);
		$this->load->view('layout/landing/nav_header');
		$this->load->view('landing/index');
		$this->load->view('layout/landing/footer');
	}

	function user_check()	{
		$phone = $this->input->post('phone');
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

			$this->session->set_flashdata('message_sukses', 'Anda Sudah pernah skrining. Perubahan Data Berhasil Disimpan');

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


	function biodata()
	{
	$head['title'] = 'Biodata';

	// $data['user'] = $this->landing_model->get_user_detail(array('id' => $id_user));
	$data['prov'] = $this->landing_model->get_provinsi();

	$this->load->view('layout/landing/header', $head);
	$this->load->view('layout/landing/nav_header_logo');
	$this->load->view('landing/biodata', $data);
	$this->load->view('layout/landing/footer');
	}

	function biodata_save()	{

		$tgl = $this->input->post('tgl');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$phone = trim($this->input->post('telp'));
		$status = $this->input->post('dd_status');
		$tujuan = $this->input->post('dd_tujuan');
		$riwayat = $this->input->post('cb_tujuan');
		$nama = trim($this->input->post('nama'));
		$tp_lahir = $this->input->post('tempat_lahir');
		$tgl_lahir = $tahun.'-'.$bulan.'-'.$tgl;

		$id_prov = $this->input->post('prov');
		$id_kab = $this->input->post('kab');
		$id_kec = $this->input->post('kec');
		$id_kel = $this->input->post('kel');
		$alamat = $this->input->post('alamat');
		$email = $this->input->post('email');

		$user = $this->landing_model->is_user_avail($phone);
		if($user == false){
			// save new user return id
			$data['telp'] = $phone;
			$data['nama'] = $nama;
			$data['tp_lahir'] = $tp_lahir;
			$data['tgl_lahir'] = $tgl_lahir;
			$data['id_prov'] = $id_prov;
			$data['id_kab'] = $id_kab;
			$data['id_kec'] = $id_kec;
			$data['id_kel'] = $id_kel;
			$data['alamat'] = $alamat;
			$data['email'] = $email;
			$data['riw_penyakit'] = implode(", ",$riwayat);
			$data['tujuan_rs'] = $tujuan;
			$data['jenis_user'] = $status;
			$this->db->insert('user', $data);
			$id = $this->db->insert_id();
			$this->session->set_flashdata('message_sukses', 'Data Berhasil Disimpan');

			redirect("/welcome/screening/$id");

		} else {
			//overwrite data user
			$id = $user->id;
			$data['riw_penyakit'] = implode(", ",$riwayat);
			$data['tujuan_rs'] = $tujuan;
			$data['jenis_user'] = $status;

			$this->db->where('id', $id);
			$this->db->update('user', $data);
			$this->session->set_flashdata('message_sukses', 'Perubahan Data Berhasil Disimpan');

			redirect("/welcome/screening/$id");
		}
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
    $head['title'] = 'Skrining';

		$data['user_id'] = $id_user;
		$data['jenis'] = $this->landing_model->get_jenis_skrining();

    $this->load->view('layout/landing/header', $head);
    $this->load->view('layout/landing/nav_header_logo');
    $this->load->view('landing/screening',$data);
    $this->load->view('layout/landing/footer');
  }

  public function test()
  {
  	// $head['title'] = 'Biodata';
		// $data['prov'] = $this->landing_model->get_provinsi();
		// $this->load->view('layout/landing/header', $head);
		// $this->load->view('layout/landing/nav_header_logo');
		// $this->load->view('landing/biodata', $data);
		// $this->load->view('layout/landing/footer');

  // 	$this->load->view('header_admin');
  // 	$this->load->view('landing/nda');
  }
  public function register()
  {
  	$this->load->view('header_admin');
  	$this->load->view('landing/nda');
  	// $head['title'] = 'Pernyataan';
  	// $this->load->view('layout/landing/header', $head);
  	// $this->load->view('landing/nda');
   //  $this->load->view('layout/landing/footer');
  }

	function screening_save()
	{
		$id = $this->input->post('id');
		$jenis = $this->input->post('jenis');
		if (is_null($jenis)) {
			redirect("/welcome/screening/$id");
		}
		// break;
		// $get_umur = $this->input->post('tgl_lahir');
		$get_umur = $this->landing_model->get_usia($id);
		$birthdate = new DateTime($get_umur->tgl_lahir);
		$today     = new DateTime();
		$interval  = $today->diff($birthdate);
		$usia = $interval->format('%y');
		$arr_add = '';

		$kodeTrx = $this->landing_model->get_last();
		$urutan = (int) substr($kodeTrx->kodeTerbesar, 3, 5);
		$urutan++;
		$id_tr = sprintf("ME%s%03d", "20", $urutan);

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

			$data['id_trx'] = $id_tr;
			array_push($screening, $data);
		}


		$query = $this->db->insert_batch('screening', $screening);
		if($query){
			// save to header
			$header['hasil'] = $nilai;
			$header['id_wabah'] = $jenis;
			$header['id_user'] = $id;
			$header['kode_skrining'] = $randomString;
			$header['usia'] = $usia;
			$header['id_trxs'] = $id_tr;

			$this->db->insert('trx_skrining', $header);
			// $this->load->hasil_screening($id);
			redirect('welcome/hasil_screening/'.$id);
		}

	}

	function hasil_screening($id){
		$this->load->view('header');
		$data['user'] = $this->landing_model->result_skrining($id);

		 // $this->load->view('layout/landing/header');
	    // $this->load->view('layout/landing/nav_header');
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
				$result .= '<div class="col-sm-12 ">
								<div class="form-group">
								<label class="form-check-label">'.$no.'. '.$v->pertanyaan.'? </label>';

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

	function inde($id){
	   //   $this->load->library('pdf');
	 	$image="favicon.png";
    $pdf = new FPDF('l','mm','A5');
		$pdf->SetCompression(true);
    // membuat halaman baru
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',16);
    // mencetak string
		$pdf->Image('./assets/img/logo_download.png',15,8,15,15);
    $pdf->Cell(140,10,' Kartu Hasil ASK_ME RS dr. Suyoto ',0,5,'C');
    $pdf->SetFont('Arial','B',12);
    // Memberikan space kebawah agar tidak terlalu rapat
    $pdf->Cell(10,10,'',0,1);
    $pdf->SetFont('Arial','B',10);
    $pdf->SetFont('Arial','',10);
    $hasil = $this->db->query("select * from data_hasil_skrining where id_user='$id' order by tgl_skrining desc limit 1 ")->result();
		foreach ($hasil as $row){
		$pdf->SetFont('Arial','B',12);
		$pdf->Cell(190,7,"Nama Peserta : ".$row->nama,0,1,'l');
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(190,7,"Detail:",0,1,'l');
		$pdf->Cell(190,7,"- Jenis Skrining : ".$row->wabah,0,1,'l');
		$pdf->Cell(190,7,"- Tanggal Skrining: ".$row->tgl_skrining,0,1,'l');
		$pdf->Cell(55,6,"- Status Kunjungan: ".$row->jenis_user,0,1);
		$pdf->Cell(55,6,"- Usia : ".$row->usia.' Tahun ',0,1);
		$hasil = $row->hasil;
            if ($hasil >=4) {
              $kesimpulan = "Anda dalam keadaan BERISIKO SEDANG/TINGGI";
							$ket =" Jika Anda berobat ke RS dr Suyoto: SEGERA hubungi Petugas Kesehatan di RS dr Suyoto, agar segera dilakukan pemeriksaan skrining lanjutan; tetap patuhi protokol kesehatan; upayakan tetap dalam ruangan / tempat dengan ventilasi udara yang baik;  dan lakukan 3M (Menggunakan Masker, Menjaga Jarak dan Mencuci tangan)";
            }elseif ($hasil >= 1) {
              $kesimpulan = "Anda dalam keadaan BERISIKO RENDAH";
							$ket=" Jika Anda berobat ke RS dr Suyoto: tetap patuhi protokol kesehatan; upayakan tetap dalam ruangan / tempat dengan ventilasi udara yang baik;  dan lakukan 3M (Menggunakan Masker, Menjaga Jarak dan Mencuci tangan)";
            }elseif ($hasil == "0") {
              $kesimpulan = "Anda dalam keadaan SEHAT";
							$ket =" Jika Anda berobat ke RS dr Suyoto: tetap patuhi protokol kesehatan; upayakan tetap dalam ruangan / tempat dengan ventilasi udara yang baik;  dan lakukan 3M (Menggunakan Masker, Menjaga Jarak dan Mencuci tangan)";
            }
						$pdf->SetFont('Arial','B',10);
            $pdf->Cell(100,6,"Hasil : ".$kesimpulan,1,0);
						$pdf->Cell(10,8,'',0,1);
						$pdf->SetFont('Arial','',10);
            $pdf->MultiCell(190,6,$ket);
						$pdf->SetFont('Arial','B',10);
            $pdf->Cell(40,7,"Kode :".$row->kode_skrining);
        }

				$pdf->Cell(10,10,'',0,1);
				$pdf->SetFont('Arial','I',10);
				$pdf->Cell(190,7,"\n Harap Simpan baik baik dan tunjukkan hasil skrining hanya kepada Tim Skrining dan Petugas di RS dr Suyoto.",0,1,'l');
        // $pdf->Output();
				$pdf->Output("kartu-hasil-ask_me.pdf","I");
    }

}
