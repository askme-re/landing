<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class GeneratePdfController extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }
    
    function index(){
        
        $pdf = new FPDF('l','mm','A4');
        
        
        $pdf->AddPage();
        
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'ASK ME',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'Rangkuman Data Skrining Penyakit Menular',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(20,6,'NIM',1,0);
        $pdf->Cell(85,6,'NAMA Pengunjung',1,0);
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

}
?>