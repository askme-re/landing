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

      $query = $this->admin_m->result_skrining();
      $data = [];
      foreach($query->result() as $r) {
           $data[] = array(
                $r->id,
                $r->tgl_skrining,
                "<a href='skrining/detailTrx/$r->id'>".$r->kode_skrining."</a>",
                $r->nama,
              // "<a href='skrining/detailTrx/$r->id'>".$r->nama."</a>",
                $r->telp,
                $r->hasil,
                $r->wabah,
                $r->usia,
                $r->jenis_user,
                $r->tujuan_rs

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
      $where = array('id_user' => $id);
      $data['dataJawaban'] = $this->admin_m->detail($where,'hasil_skringin')->result();
   		$this->load->view('header_admin');
   		$this->load->view('navigasi');
   		$this->load->view('admin/skrining_detail',$data);
   		$this->load->view('footer_admin');
   }

   public function exp_skrining()
   {
      $this->excel->setActiveSheetIndex(0);
                //name the worksheet
      $this->excel->getActiveSheet()->setTitle('HasilSkrining');
                //set cell A1 content with some text
      $this->excel->getActiveSheet()->setCellValue('A1', 'Daftar Skrining');
      $this->excel->getActiveSheet()->setCellValue('A4', 'ID');
      $this->excel->getActiveSheet()->setCellValue('B4', 'Nama');
      $this->excel->getActiveSheet()->setCellValue('H4', 'Jenis User');
      $this->excel->getActiveSheet()->setCellValue('G4', 'No. Ponsel');
      $this->excel->getActiveSheet()->setCellValue('C4', 'Skrining');
      $this->excel->getActiveSheet()->setCellValue('D4', 'Tujuan ke RS');
      $this->excel->getActiveSheet()->setCellValue('E4', 'Kode');
      $this->excel->getActiveSheet()->setCellValue('F4', 'Usia');
                //merge cell A1 until C1
                $this->excel->getActiveSheet()->mergeCells('A1:G1');
                //set aligment to center for that merged cell (A1 to C1)
                $this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                //make the font become bold
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(true);
                $this->excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(16);
                $this->excel->getActiveSheet()->getStyle('A1')->getFill()->getStartColor()->setARGB('#333');
       for($col = ord('A'); $col <= ord('C'); $col++){ //set column dimension $this->excel->getActiveSheet()->getColumnDimension(chr($col))->setAutoSize(true);
                 //change the font size
                $this->excel->getActiveSheet()->getStyle(chr($col))->getFont()->setSize(12);
                $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        }
                //retrive contries table data
                $rs = $this->db->get('data_hasil_skrining');
                $exceldata=[];
        // foreach ($rs->result_array() as $row){
        //         $exceldata[] = $row;
        // }
        foreach ($rs->result() as $r){
                 // $exceldata[] = $row;
                 $exceldata[] = array(
                  $r->id,
                  $r->nama,
                  $r->jenis_user,
                  $r->telp,
                  $r->wabah,
                  $r->tujuan_rs,
                  $r->kode_skrining,
                  $r->usia

           );
        }
                //Fill data
                $this->excel->getActiveSheet()->fromArray($exceldata, null, 'A4');
                $this->excel->getActiveSheet()->getStyle('A4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('B4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('C4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('F4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('G4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('D4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $this->excel->getActiveSheet()->getStyle('E4')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
                $filename='Skringin.xls'; //save our workbook as this file name
                header('Content-Type: application/vnd.ms-excel'); //mime type
                header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
                header('Cache-Control: max-age=0'); //no cache
                //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
                //if you want to save it as .XLSX Excel 2007 format
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                //force user to download the Excel file without writing it to server's HD
                $objWriter->save('php://output');
    }

}
