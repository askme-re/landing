<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper(array('url','form'));
		$this->load->model('landing_m');
		$this->load->library('session');
	}

	public function index()
	{
		$this->load->view('header_admin');
		$this->load->view('welcome_message');
	}
	public function brief()
	{
		$this->load->view('header_admin');
		$this->load->view('publik/index');
	}

	public function quwa()
	{
		$data['kokom'] = $this->session->flashdata('item');
		print_r($data);
		$insert = $this->landing_m->save_trx($data);
		// print_r($insert_id);
		var_export($insert_id);
// 		$this->landing_m->insert_form($nama, $tempat_lhr, $tanggal_lhr);
		$this->session->set_flashdata('msg', "<div class='alert alert-success' role='alert'>
		<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>×</span></button> <strong>Success!</strong> Berhasil simpan. </div>");
// 		$this->load->library('../controllers/GeneratePDFController');
		// $this->inde();

	}
	
	 function inde($kode){
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
        $hasil = $this->db->query("select * from temp_trx where kode ='$kode' ")->result();
        foreach ($hasil as $row){
        	$pdf->Cell(190,7,"Rangkuman Data Skrining Penyakit Menular : ".$row->nama,0,1,'l');
        	$pdf->Cell(190,7,"Tanggal Lahir: ".$row->tgl_lhr,0,1,'l');
            $pdf->Cell(55,6,"Tanggal Screening ".$row->tgl,0,1);
            if ($row->nilai >5) {
            	$kesimpulan = "Merah, Anda harus melakukan rujukan";
            }else{
            	$kesimpulan = "Hijau";
            }
            $pdf->Cell(55,6,"Hasil : ".$kesimpulan,0,1);
            $pdf->Cell(55,6,"Tempat Lahir : ".$row->tempat_lhr,0,1);
            $pdf->Cell(55,6,"Jenis Skrining: ".$row->jenis,0,1);
            $pdf->Cell(55,6,"Kode ".$row->kode,1,0);
        }
        $pdf->Image('./assets/img/'.$image,100,15,35,35);
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
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i <5; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
		$data['nama'] = $this->input->post('nama');
		$data['kode'] = $randomString;
		$data['jenis'] = $this->input->post('jenis');
		$data['prov'] = $this->input->post('prov');
		$data['kab'] = $this->input->post('kab');
		$data['kel'] = $this->input->post('kel');
		// $data['telp'] = $this->input->post('telp');
		$data['tempat_lhr'] = $this->input->post('tempat_lahir');
		$data['tgl_lhr'] = $this->input->post('tgl_lahir');

		$jenis = $data['jenis'];
		$quizes = $this->landing_m->quizes($jenis);
		foreach($quizes as $v){
			if(!is_null($v->bobot)){
				$val = 'cov'.$v->id;
				$rb = 'rb_'.$v->id;
				
				
				$data[$val] = (!is_null($this->input->post($rb))) ? $this->input->post($rb) : null;
			}
		}
		
		$this->session->set_flashdata('item', $data);
		$this->sent();
		// if($insert) redirect('/index.php/welcome/sent', 'refresh');
	}

	public function jwb()
	{
		$data['questions'] = $this->landing_m->jawb();
		// $this->load->view('header_admin');
		$this->load->view('survey',$data);
		// $this->load->view('footer');
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

	function sent()
	{
		
		$this->load->view('header');
		$data['kokom'] = $this->session->flashdata('item');
		$insert_id = $this->landing_m->save_trx($data);
		$hasil = $this->landing_m->getnilai($insert_id);


// $data = $this->session->flashdata('item');  
  
$data['hasil'] = $hasil;  
  
$data['kokom'] = $this->session->flashdata('item', $data); 


		// print_r($hasil);
		// $data['kokom'] = $this->session->flashdata('skor',$hasil);
		// $data['kokom']=$this->session->set_flashdata('item', $hasil);
		$this->load->view('publik/redirecthasil',$data);
		// $this->load->view('publik/redirecthasil',$hasil);
		// $this->quwa();
		$this->load->view('footer');
	}
}
