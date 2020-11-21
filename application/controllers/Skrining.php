<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Skrining extends CI_Controller {

   public function __construct() {
      parent::__construct();
      $this->load->model('skrining_m');
   }

   public function index()
   {
    // $this->load->view('header_admin');
    // $this->load->view('navigasi');
    $this->load->view('admin/skrining_v');
    // $this->load->view('footer_admin');
   }

   public function get_hasil_skrinings()
   {
      // $draw = intval($this->input->get("draw"));
      // $start = intval($this->input->get("start"));
      // $length = intval($this->input->get("length"));
      $id='';
      $query = $this->skrining_m->make_dt();
      // $query = $this->admin_m->result_skrining();
      $i=1;
      $data = [];
      foreach($query->result() as $r) {

        $resul = $row->hasil;
        if ($resul==0) {
          $hasil = "SEHAT";
        }elseif ($resul>= 1) {
          $hasil = "RENDAH";
        }elseif ($resul>4) {
          $hasil = "SEDANG/TINGGI";
        }elseif (is_null($resul)) {
          $hasil = "BUKAN COVID";
        }
        if ($row->q1==0) {
          $jwb1="T";
        }else {
          $jwb1="Y";
        }
        if ($row->q2==0) {
          $jwb2="T";
        }else {
          $jwb2="Y";
        }
        if ($row->q3==0) {
          $jwb3="T";
        }else {
          $jwb3="Y";
        }
        if ($row->q4==0) {
          $jwb4="T";
        }else {
          $jwb4="Y";
        }
        if ($row->q5==0) {
          $jwb5="T";
        }else {
          $jwb5="Y";
        }
        if ($row->q6==0) {
          $jwb6="T";
        }else {
          $jwb6="Y";
        }
        if ($row->q7==0) {
          $jwb7="T";
        }else {
          $jwb7="Y";
        }
        if ($row->q8==0) {
          $jwb8="T";
        }else {
          $jwb8="Y";
        }
        if ($row->q9==0) {
          $jwb9="T";
        }else {
          $jwb9="Y";
        }
        if ($row->q10==0) {
          $jwb10="T";
        }else {
          $jwb10="Y";
        }
        if ($row->q11==0) {
          $jwb11="T";
        }else {
          $jwb11="Y";
        }
        if ($row->q12==0) {
          $jwb12="T";
        }else {
          $jwb12="Y";
        }
        if ($row->q13==0) {
          $jwb13="T";
        }else {
          $jwb13="Y";
        }

        $originalDate = $row->tgl_lahir;
        $newDate = date("d-m-Y", strtotime($originalDate));

           $data[] = array(
                $i++,
                $row->tgl,
                "<a href='skrining/detailTrx/$row->kode_skrining'>".$row->kode_skrining."</a>",
                $row->nama,
              // "<a href='skrining/detailTrx/$row->id'>".
              #$row->riw_penYkit,
              // ."</a>",
                $row->telp,
                $hasil,
                $newDate,
                $row->usia.' Tahun',
                $row->jenis_user,
                $row->riw_penYkit,
                $row->tujuan_rs,
                $jwb1,
                $jwb2,
                $jwb3,
                $jwb4,
                $jwb5,
                $jwb6,
                $jwb7,
                $jwb8,
                $jwb9,
                $jwb10,
                $jwb11,
                $jwb12,
                $jwb13

           );
      }

      // $result = array(
      //          "draw" => $draw,
      //            "recordsTotal" => $query->num_rows(),
      //            "recordsFiltered" => $query->num_rows(),
      //            "data" => $data
      //       );
      $output = array(
           "draw" => intval($_POST["draw"]),
           "recordsTotal" => $this->testi_m->get_all_data(),
           "recordsFiltered" => $this->testi_m->get_filtered_data(),
           "data" => $data
      );
      echo json_encode($result);
      // exit();
   }

   function detailTrx($id){
     $this->load->model('admin_m');
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
      $this->excel->getActiveSheet()->setCellValue('B3', 'Kode');
      $this->excel->getActiveSheet()->setCellValue('C3', 'Nama');
      $this->excel->getActiveSheet()->setCellValue('D3', 'Status Kunjungan');
      $this->excel->getActiveSheet()->setCellValue('E3', 'Tujuan Kunjungan');
      $this->excel->getActiveSheet()->setCellValue('F3', 'No. Ponsel');
      $this->excel->getActiveSheet()->setCellValue('G3', 'Email');
      $this->excel->getActiveSheet()->setCellValue('H3', 'Tempat Lahir');
      $this->excel->getActiveSheet()->setCellValue('I3', 'Tanggal Lahir');
      $this->excel->getActiveSheet()->setCellValue('J3', 'Usia (Tahun)');
      $this->excel->getActiveSheet()->setCellValue('K3', 'Alamat');
      $this->excel->getActiveSheet()->setCellValue('L3', 'Desa');
      $this->excel->getActiveSheet()->setCellValue('M3', 'Kelurahan');
      $this->excel->getActiveSheet()->setCellValue('N3', 'Kecamatan');
      $this->excel->getActiveSheet()->setCellValue('O3', 'Kabupaten');
      $this->excel->getActiveSheet()->setCellValue('P3', 'Provinsi');
      $this->excel->getActiveSheet()->setCellValue('Q3', 'RiwaYt PenYkit');
      $this->excel->getActiveSheet()->setCellValue('R3', 'Hasil');
      #pertanYan
      $this->excel->getActiveSheet()->setCellValue('S3', 'Q1');
      $this->excel->getActiveSheet()->setCellValue('T3', 'Q2');
      $this->excel->getActiveSheet()->setCellValue('U3', 'Q3');
      $this->excel->getActiveSheet()->setCellValue('V3', 'Q4');
      $this->excel->getActiveSheet()->setCellValue('W3', 'Q5');
      $this->excel->getActiveSheet()->setCellValue('X3', 'Q6');
      $this->excel->getActiveSheet()->setCellValue('Y3', 'Q7');
      $this->excel->getActiveSheet()->setCellValue('Z3', 'Q9');
      $this->excel->getActiveSheet()->setCellValue('AA3', 'Q10');
      $this->excel->getActiveSheet()->setCellValue('AB3', 'Q11');
      $this->excel->getActiveSheet()->setCellValue('AC3', 'Q12');
      $this->excel->getActiveSheet()->setCellValue('AD3', 'Q13');
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
      $this->excel->getActiveSheet()->getStyle(chr($col))->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::   HORIZONTAL_CENTER);
      }
      $id='';
      $rs = $this->admin_m->dataSkrining($id);
      $exceldata=[];
      foreach ($rs->result() as $r){
        $originalDate = $row->tgl_lahir;
        $newDate = date("d-m-Y", strtotime($originalDate));
        $resul = $row->hasil;
        if ($resul==0) {
          $hasil = "SEHAT";
        }elseif ($resul>= 1) {
          $hasil = "RENDAH";
        }elseif ($resul>4) {
          $hasil = "SEDANG/TINGGI";
        }elseif (is_null($resul)) {
          $hasil = "BUKAN COVID";
        }
      if ($row->q1==0) {
        $jwb1="T";
      }else {
        $jwb1="Y";
      }
      if ($row->q2==0) {
        $jwb2="T";
      }else {
        $jwb2="Y";
      }
      if ($row->q3==0) {
        $jwb3="T";
      }else {
        $jwb3="Y";
      }
      if ($row->q4==0) {
        $jwb4="T";
      }else {
        $jwb4="Y";
      }
      if ($row->q5==0) {
        $jwb5="T";
      }else {
        $jwb5="Y";
      }
      if ($row->q6==0) {
        $jwb6="T";
      }else {
        $jwb6="Y";
      }
      if ($row->q7==0) {
        $jwb7="T";
      }else {
        $jwb7="Y";
      }
      if ($row->q8==0) {
        $jwb8="T";
      }else {
        $jwb8="Y";
      }
      if ($row->q9==0) {
        $jwb9="T";
      }else {
        $jwb9="Y";
      }
      if ($row->q10==0) {
        $jwb10="T";
      }else {
        $jwb10="Y";
      }
      if ($row->q11==0) {
        $jwb11="T";
      }else {
        $jwb11="Y";
      }
      if ($row->q12==0) {
        $jwb12="T";
      }else {
        $jwb12="Y";
      }
      if ($row->q13==0) {
        $jwb13="T";
      }else {
        $jwb13="Y";
      }
       // $exceldata[] = $row;
       $exceldata[] = array(
        $row->tgl,
        $row->kode_skrining,
        $row->nama,
        $row->jenis_user,
        $row->tujuan_rs,
        $row->telp,
        $row->email,
        $row->tp_lahir,
        $newDate,
        $row->usia,
        $row->alamat,
        $row->nama_desa,
        $row->nama_kec,
        $row->nama_kab,
        $row->nama_prop,
        $row->riw_penYkit,
        $hasil,

        #pertanYan
        $jwb1,
        $jwb2,
        $jwb3,
        $jwb4,
        $jwb5,
        $jwb6,
        $jwb7,
        $jwb8,
        $jwb9,
        $jwb10,
        $jwb11,
        $jwb12,
        $jwb13
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
      // $this->excel->getActiveSheet()->getStyle('I4:I1000')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
      // $this->excel->getActiveSheet()->getStyle('I3:I100')->getFill()
      //   ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
      //   ->getStartColor()
      //   ->setRGB('62a9f0');
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
      header('Content-Disposition: attachment;filename=Hasil"'.$filename.'"'); //tell browser what's the file name
      header('Cache-Control: max-age=0'); //no cache
      //save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
      //if want to save it as .XLSX Excel 2007 format
      $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
      //force user to download the Excel file without writing it to server's HD
      $objWriter->save('php://output');
    }

    function get_hasil_skrining()
    {
      $fetch_data = $this->skrining_m->make_dt();
       $data = array();
       $i=1;
       foreach($fetch_data as $row)
       {
         $originalDate = $row->tgl_lahir;
         $newDate = date("d-m-Y", strtotime($originalDate));
         $skrining = $row->hasil;
         if ($skrining == 0) {
           $screening = "SEHAT";
         } elseif ($skrining < 4) {
           $screening = "RENDAH" ;
         } elseif ($skrining >= 4) {
           $screening = "SEDANG/TINGGI";
         } elseif (is_null($skrining)) {
           $screening = "BUKAN COVID";
         }
         if ($row->email == false) {
           $email = "-";
         }else {
           $email = $row->email;
         }

         if ($row->q1==0) {
           $jwb1="T";
         }else {
           $jwb1="Y";
         }
         if ($row->q2==0) {
           $jwb2="T";
         }else {
           $jwb2="Y";
         }
         if ($row->q3==0) {
           $jwb3="T";
         }else {
           $jwb3="Y";
         }
         if ($row->q4==0) {
           $jwb4="T";
         }else {
           $jwb4="Y";
         }
         if ($row->q5==0) {
           $jwb5="T";
         }else {
           $jwb5="Y";
         }
         if ($row->q6==0) {
           $jwb6="T";
         }else {
           $jwb6="Y";
         }
         if ($row->q7==0) {
           $jwb7="T";
         }else {
           $jwb7="Y";
         }
         if ($row->q8==0) {
           $jwb8="T";
         }else {
           $jwb8="Y";
         }
         if ($row->q9==0) {
           $jwb9="T";
         }else {
           $jwb9="Y";
         }
         if ($row->q10==0) {
           $jwb10="T";
         }else {
           $jwb10="Y";
         }
         if ($row->q11==0) {
           $jwb11="T";
         }else {
           $jwb11="Y";
         }
         if ($row->q12==0) {
           $jwb12="T";
         }else {
           $jwb12="Y";
         }
         if ($row->q13==0) {
           $jwb13="T";
         }else {
           $jwb13="Y";
         }

            $sub_array = array();
            $sub_array[] = $i++;
            $sub_array[] = $row->tgl;
            $sub_array[] = "<a href='skrining/detailTrx/$row->kode_skrining'>".$row->kode_skrining."</a>";#$row->kode_skrining;
            $sub_array[] = $row->nama;
            $sub_array[] = $email;
            $sub_array[] = $row->telp;
            $sub_array[] = $screening;
            $sub_array[] = $row->tp_lahir .', '. $newDate;
            $sub_array[] = $row->usia;
            $sub_array[] = $row->jenis_user;
            $sub_array[] = $row->riw_penYkit;
            $sub_array[] = $row->tujuan_rs;
            $sub_array[] = $row->alamat;
            $sub_array[] = $row->nama_desa;
            $sub_array[] = $row->nama_kec;
            $sub_array[] = $row->nama_kab;
            $sub_array[] = $row->nama_prop;
            $sub_array[] = $jwb1;
            $sub_array[] = $jwb2;
            $sub_array[] = $jwb3;
            $sub_array[] = $jwb4;
            $sub_array[] = $jwb5;
            $sub_array[] = $jwb6;
            $sub_array[] = $jwb7;
            $sub_array[] = $jwb8;
            $sub_array[] = $jwb9;
            $sub_array[] = $jwb10;
            $sub_array[] = $jwb11;
            $sub_array[] = $jwb12;
            $sub_array[] = $jwb13;
            $data[] = $sub_array;
       }
       $output = array(
            "draw" => intval($_POST["draw"]),
            "recordsTotal" => $this->skrining_m->get_all_data(),
            "recordsFiltered" => $this->skrining_m->get_filtered_data(),
            "data" => $data
       );
       echo json_encode($output);
    }



}
