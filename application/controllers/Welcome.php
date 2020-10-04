<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_m');
	}

	public function index()
	{
		$this->load->view('header_admin');
		$this->load->view('welcome_message');
	}

	public function quwa()
	{
		$nama = $this->input->post('name');
		$tempat_lhr =$this->input->post('pob');
		// $tanggal_lhr =$this->input->post('dob');
		$tanggal_lhr ='2000-02-02';
		
		$jenis = 1;
		// get 
		// $data['questions'] = $this->landing_m->pertanyaan();
		// print_r($this->landing_m->quizes($jenis));
		
		$quizes = $this->landing_m->quizes($jenis);
		foreach($quizes as $v){
			if(!is_null($v->bobot)){
				$val = 'cov'.$v->id;
				$rb = 'rb_'.$v->id;
				
				
				$data[$val] = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
			}
		}
		
// 		$this->landing_m->insert_form($nama, $tempat_lhr, $tanggal_lhr);
		$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Success!</strong> Berhasil simpan. </div>");
// 		$this->load->library('../controllers/GeneratePDFController');
		$this->inde();
// 		$this->load->GeneratePDFController();
// 		redirect('index.php/GeneratePDFController');
		// $this->load->view('survey');
	}
	
	 function inde(){
	   //   $this->load->library('pdf');
        $pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'ASK ME',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Rangkuman Data Skrining Penyakit Menular',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA Kamu',1,0);
        $pdf->Cell(27,6,'NO HP',1,0);
        $pdf->Cell(25,6,'TGL LHR',1,1);
        $pdf->SetFont('Arial','',10);
        $hasil = $this->db->get('bobot')->result();
        foreach ($hasil as $row){
            $pdf->Cell(20,6,$row->jawaban,1,0);
            $pdf->Cell(85,6,$row->bobot,1,0);
            $pdf->Cell(27,6,$row->id_pertanyaan,1,0);
            $pdf->Cell(25,6,$row->bobot,1,1);
        }
        $pdf->Output("D","skrining.pdf");
    }

	public function register()
	{
		$data['prov'] = $this->landing_m->get_provinsi();
		$data['questions'] = $this->landing_m->pertanyaan();
		// $this->load->view('header');
		$this->load->view('survey',$data);
		$this->load->view('footer');
	}
	
	public function register_save(){
		$data['nama'] = $this->input->post('nama');
		$data['jenis'] = $this->input->post('jenis');
		$data['tgl'] = date('Y-m-d');
		
		$jenis = 1;
		// get 
		// $data['questions'] = $this->landing_m->pertanyaan();
		// print_r($this->landing_m->quizes($jenis));
		
		$quizes = $this->landing_m->quizes($jenis);
		foreach($quizes as $v){
			if(!is_null($v->bobot)){
				$val = 'cov'.$v->id;
				$rb = 'rb_'.$v->id;
				
				
				$data[$val] = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
			}
		}
		
		// insert into trx
		$insert = $this->landing_m->save_trx($data);
		
		if($insert) redirect('/index.php/welcome/register', 'refresh');
		// print_r($data);
	}

	public function jwb()
	{
		$data['questions'] = $this->landing_m->jawb();
		// $this->load->view('header_admin');
		$this->load->view('survey',$data);
		// $this->load->view('footer');
	}
	
	function generateRandomString($length = 5) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    echo "$randomString";
	}
	
	function ajax_quiz(){
		$jenis = $this->input->post('jenis');
		
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
			
			if(!is_null($v->bobot)){
				$result .= '
                          <div class="radio">
							  <label>
								<input type="radio" name="rb_'.$v->id.'" value="'.$v->bobot.'">
								'.$v->opsi_bobot.'
							  </label>
                          </div>';
			}
			
		}
		echo json_encode($result);
	}

	function ajax_kab(){
		$idprov = $this->input->post('id');
		
		$query = $this->landing_m->get_kabupaten($idprov);
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
		
		$query = $this->landing_m->get_kecamatan($key);
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
		
		$query = $this->landing_m->get_kelurahan($key);
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
