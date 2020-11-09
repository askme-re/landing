<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skrining extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->model('admin_m');
   }

   public function index()
   {
    $this->load->view('header_admin');
    $this->load->view('navigasi');
    $this->load->view('admin/skrining_v');
    $this->load->view('footer_admin');
   }

   public function get_hasil_skrining()
   {
      $draw = intval($this->input->get("draw"));
      $start = intval($this->input->get("start"));
      $length = intval($this->input->get("length"));
      $id='';
      $query = $this->admin_m->dataSkrining($id);
      // $query = $this->admin_m->result_skrining();
      $i=1;
      $data = [];
      foreach($query->result() as $r) {

        $resul = $r->hasil;
        if ($resul==0) {
          $hasil = "SEHAT";
        }elseif ($resul>= 1) {
          $hasil = "RENDAH";
        }elseif ($resul>4) {
          $hasil = "SEDANG/TINGGI";
        }elseif (is_null($resul)) {
          $hasil = "BUKAN COVID";
        }

           $data[] = array(
                $i++,
                $r->tgl,
                "<a href='skrining/detailTrx/$r->kode_skrining'>".$r->kode_skrining."</a>",
                $r->nama,
              // "<a href='skrining/detailTrx/$r->id'>".
              #$r->riw_penyakit,
              // ."</a>",
                $r->telp,
                $hasil,
                $r->tgl_lahir,
                $r->usia.' Tahun',
                $r->jenis_user,
                $r->riw_penyakit,
                $r->tujuan_rs,
                $r->q1,
                $r->q2,
                $r->q3,
                $r->q4,
                $r->q5,
                $r->q6,
                $r->q7,
                $r->q8,
                $r->q9,
                $r->q10,
                $r->q11,
                $r->q12,
                $r->q13

           );
      }

      $result = array(
               "draw" => $draw,
                 "recordsTotal" => $query->num_rows(),
                 "recordsFiltered" => $query->num_rows(),
                 "data" => $data
            );
      echo json_encode($result);
      exit();
   }

   function detailTrx($id){
      $data['dataJawaban'] = $this->admin_m->dataSkrining($id)->result();
      $where = array('kode_skrining' => $id);
      $data['dataJawabans'] = $this->admin_m->detail($where,'hasil_skringin')->result();
   		$this->load->view('header_admin');
   		// $this->load->view('navigasi');
   		$this->load->view('admin/skrining_detail',$data);
   		$this->load->view('footer_admin');
   }

   public function exp_skrining()
   {
      $this->excel->setActiveSheetIndex(0);
      //name the worksheet
      $this->excel->getActiveSheet()->setTitle('HasilSkrining');
      //set cell A1 content with some text
      $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Skrining COVID-19');

      $this->excel->getActiveSheet()->setCellValue('A3', 'Waktu');
      $this->excel->getActiveSheet()->setCellValue('B3', 'Nama');
      $this->excel->getActiveSheet()->setCellValue('C3', 'Jenis User');
      $this->excel->getActiveSheet()->setCellValue('D3', 'No. Ponsel');
      $this->excel->getActiveSheet()->setCellValue('E3', 'Tanggal Lahir');
      $this->excel->getActiveSheet()->setCellValue('F3', 'Tujuan ke RS');
      $this->excel->getActiveSheet()->setCellValue('G3', 'Kode');
      $this->excel->getActiveSheet()->setCellValue('H3', 'Usia (Tahun)');
      $this->excel->getActiveSheet()->setCellValue('I3', 'Hasil');
      #pertanyaan
      $this->excel->getActiveSheet()->setCellValue('J3', 'Q1');
      $this->excel->getActiveSheet()->setCellValue('K3', 'Q2');
      $this->excel->getActiveSheet()->setCellValue('L3', 'Q3');
      $this->excel->getActiveSheet()->setCellValue('M3', 'Q4');
      $this->excel->getActiveSheet()->setCellValue('N3', 'Q5');
      $this->excel->getActiveSheet()->setCellValue('O3', 'Q6');
      $this->excel->getActiveSheet()->setCellValue('P3', 'Q7');
      $this->excel->getActiveSheet()->setCellValue('Q3', 'Q8');
      $this->excel->getActiveSheet()->setCellValue('R3', 'Q9');
      $this->excel->getActiveSheet()->setCellValue('S3', 'Q10');
      $this->excel->getActiveSheet()->setCellValue('T3', 'Q11');
      $this->excel->getActiveSheet()->setCellValue('U3', 'Q12');
      $this->excel->getActiveSheet()->setCellValue('V3', 'Q13');
      //merge cell title
      $this->excel->getActiveSheet()->mergeCells('A1:h1');
      //set aligment to center for that merged cell
      $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      //make the font become bold
      $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
      $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
      $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setRGB('#333');
      for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
       //change the font size
      $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
      $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      }
      $id='';
      $rs = $this->admin_m->dataSkrining($id);
      $exceldata=[];
      // foreach ($rs->result_array() as $row){
      //         $exceldata[] = $row;
      // }
      foreach ($rs->result() as $r){
        $resul = $r->hasil;
        if ($resul==0) {
          $hasil = "SEHAT";
        }elseif ($resul>= 1) {
          $hasil = "RENDAH";
        }elseif ($resul>4) {
          $hasil = "SEDANG/TINGGI";
        }elseif (is_null($resul)) {
          $hasil = "BUKAN COVID";
        }
       // $exceldata[] = $row;
       $exceldata[] = array(
        $r->tgl,
        $r->nama,
        $r->jenis_user,
        $r->telp,
        $r->tgl_lahir,
        $r->tujuan_rs,
        $r->kode_skrining,
        $r->usia,
        $hasil,


        #pertanyaan
        $r->q1,
        $r->q2,
        $r->q3,
        $r->q4,
        $r->q5,
        $r->q6,
        $r->q7,
        $r->q8,
        $r->q9,
        $r->q10,
        $r->q11,
        $r->q12,
        $r->q3

      );
      }
      //Fill data
      $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');
      $this->excel->getActiveSheet()->getStyle('A4:A100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('H4:H100')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('I4:I1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('I3:I100')->getFill()
        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
        ->getStartColor()
        ->setRGB('62a9f0');
      //
      // if ($war =0) {
      //     $this->excel->getActiveSheet()->getStyle('I4:I100')->getFill()
      //       ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      //       ->getStartColor()
      //       ->setRGB('#62a9f0');
      // }

      $this->excel->getActiveSheet()->getStyle('J4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('K4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('L4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('M4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('N4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('O4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('P4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('Q4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('R4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('S4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('T4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('U4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $this->excel->getActiveSheet()->getStyle('V4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      $filename='Skringin.xls'; //save our workbook as this file name
      header('Content-Type: application/vnd.ms-excel'); //mime type
      header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
      header('Cache-Control: max-age=0'); //no cache
      //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
      //if want to save it as .XLSX Excel 2007 format
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //force user to download the Excel file without writing it to server's HD
      $objWriter->save('php://output');
    }

}
