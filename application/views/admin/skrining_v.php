<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/Logo_4_icon.ico"/>
  <link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Dasbor Hasil Skrining </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css"/>
  <link href="<?php echo base_url();?>assets/css/paper-dashboard.css?v=2.0.0'" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo base_url();?>assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
</head>
<body>
  <div class="wrapper ">
      <div class="sidebar" data-color="white" data-active-color="theme">
        <div class="logo">
          <a href="<?php echo base_url('Login');?>" class="simple-text logo-mini">
            <div class="logo-image-small">
              <img src="<?php echo base_url();?>assets/img/favicon.png">
            </div>
          </a>
          <a href="<?php echo base_url('Login');?>" class="simple-text logo-normal" style="font-size:24px;text-decoration:none;color:rgb(5,91,175);padding:30 0 30 0;">
            Admin ASK_ME
          </a>
        </div>
        <div class="sidebar-wrapper">
          <ul class="nav">
            <li class="">
              <a href="<?php echo base_url('user');?>">
                <i class="nc-icon nc-badge"></i>
                <p>Pengguna</p>
              </a>
            </li>
            <li class="">
              <a href="<?php echo base_url('skrining');?>">
                <i class="nc-icon nc-single-copy-04"></i>
                <p>Skrining</p>
              </a>
            </li>
            <li class="">
               <a href="<?php echo base_url('pertanyaan');?>">
                <i class="nc-icon nc-tap-01"></i>
                <p>Pertanyaan</p>
              </a>
            </li>
            <li style="margin-top:30px;">
               <a href="<?php echo base_url('Login/keluar');?>" style="font-size:12px;color:orange;">
                <p>Keluar</p>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <div class="main-panel">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
          <div class="container-fluid">
            <div class="navbar-wrapper">
              <div class="navbar-toggle">
                <button type="button" class="navbar-toggler">
                  <span class="navbar-toggler-bar bar1"></span>
                  <span class="navbar-toggler-bar bar2"></span>
                  <span class="navbar-toggler-bar bar3"></span>
                </button>
              </div>
              <!-- #pablo -->
              <a class="navbar-brand" href="<?php echo base_url('Login');?>">Manajemen</a>
            </div>
          </div>
        </nav>

<div class="content">
  <div class="row">
    <div class="col-md-12" style="background-color:white;">
      <!-- <div class="card"> -->
      <div class="">
        <div class="card-header">
          <h4 class="card-title">Daftar Hasil Skrining</h4>
        </div>
        <div class="">
          <form id="form-filter" class="">
              <div class="col-sm-10">
                <label class="col-form-label">Status Kunjungan:</label>
                <select class="form-control" id="jenis_user" name="jenis_user">
                  <option value="" selected="selected" disabled >Pilih Salah Satu</option>
                  <option value="Pasien">Pasien</option>
                  <option value="Pengunjung">Pengunjung</option>
                  <option value="Pegawai RS">Pegawai RS</option>
                </select>
              </div>
              <div class="col-sm-10">
                <label class="col-form-label">Tujuan Kunjungan:</label>
                <select class="form-control" id="tujuan" name="tujuan">
                  <option value="" selected="selected" disabled >Pilih Salah Satu</option>
                  <option value="Rawat Jalan (Poliklinik dan MCU)">Rawat Jalan (Poliklinik dan MCU)</option>
                  <option value="Rawat Inap">Rawat Inap</option>
                  <option value="IGD">IGD</option>
                  <option value="Laboratorium">Laboratorium</option>
                  <option value="Farmasi">Farmasi</option>
                  <option value="Radiologi">Radiologi</option>
                  <option value="Kamar Operasi">Kamar Operasi</option>
                  <option value="Administrasi RS (Admin Ranap, BPJS, dll)">Administrasi RS (Admin Ranap, BPJS, dll)</option>
                  <option value="Manajemen RS (Jajaran pimpinan, pengadaan dll)">Manajemen RS (Jajaran pimpinan, pengadaan dll)</option>
                  <option value="Rehab Medik (Poli Rehab dan Terapi)">Rehab Medik (Poli Rehab dan Terapi)</option>
                </select>
              </div>
              <div class="col-sm-10">
                <label class="col-form-label">Hasil Skrining:</label>
                <select class="form-control" id="hasil" name="hasil">
                  <option value="" selected="selected" disabled >Pilih Salah Satu</option>
                  <option value="0">SEHAT</option>
                  <option value="1">BERISIKO</option>
                  <!-- <option value=">=4">SEDANG-TINGGI</option> -->
                </select>
              </div>
              <div class="col-sm-10">
                <label>Cari Kode atau Nama</label>
                <input name="cari" id="cari" type="text" class="form-control" placeholder="Masukan kata kunci"/>
              </div>
              <div class="col-sm-10">
                <label>Tanggal </label>
                <input name="tgl" id="tgl" type="date" class="form-control" placeholder="DD/MM/YYYY"/>
              </div>
              <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
              <button type="button" id="btn-reset" class="btn btn-default">Reset</button>
        </form>
          <div class="table-responsive form-group col-sm-12" style="background-color:white;padding-top:20px;">
            <table class="table table-striped table-bordered" style="width:100%;font-size:13px;" id="tabelHSkrining">
              <thead class=" text-primary" align="center">
                <th>
                  No
                </th>
                <th>
                  Waktu
                </th>
                <th>
                  Kode
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Email
                </th>
                <th>
                  Telp
                </th>
                <th>
                  Hasil
                </th>
                <th>
                  TTL
                </th>
                <th>
                  Usia (Tahun)
                </th>
                <th>
                  Status
                </th>
                <th>
                  Riwayat Penyakit
                </th>
                <th>
                  Tujuan Kunjungan
                </th>
                <th>
                  Alamat
                </th>
                <th>
                  Desa
                </th>
                <th>
                  Kecamatan
                </th>
                <th>
                  Kab/Kota
                </th>
                <th>
                  Provinsi
                </th>
                <th>
                  Q1
                </th>
                <th>
                  Q2
                </th>
                <th>
                  Q3
                </th>
                <th>
                  Q4
                </th>
                <th>
                  Q5
                </th>
                <th>
                  Q6
                </th>
                <th>
                  Q7
                </th>
                <th>
                  Q8
                </th>
                <th>
                  Q9
                </th>
                <th>
                  Q10
                </th>
                <th>
                  Q11
                </th>
                <th>
                  Q12
                </th>
                <th>
                  Q13
                </th>
                <th>
                  Aksi
                </th>

              </thead>
              <tbody>

              </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



      <script src="https://code.jquery.com/jquery-2.2.3.min.js" ></script>
      <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
      <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
      <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>

<script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
<script src="<?php echo base_url()?>assets/js/core/bootstrap.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="<?php echo base_url('assets/js/plugins/bootstrap-notify.js');?>"></script>
<script src="<?php echo base_url('assets/js/paper-dashboard.min.js?v=2.0.0');?>" type="text/javascript"></script>


  <script type="text/javascript">

  var table;

  $(document).ready(function() {

      //datatables
      table = $('#tabelHSkrining').DataTable({
          "dom": "B<'clear'>flrtip",
          "pageLength": 20,
          "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
          "buttons": [
          'csv', 'excel'//, 'pdf', 'print'
        ],
          "searching":false,
          "processing": true, //Feature control the processing indicator.
          "serverSide": true, //Feature control DataTables' server-side processing mode.
          "order": [], //Initial no order.
          // Load data for the table's content from an Ajax source
          "ajax": {
              "url" : "<?php echo base_url() ?>skrining/get_hasil_skrining",
              "type": "POST",
              "data": function( data ){
                data.jenis_user = $('#jenis_user').val();
                data.tujuan = $('#tujuan').val();
                data.hasil = $('#hasil').val();
                data.tgl = $('#tgl').val();
                data.cari = $('#cari').val();
              }
          },
          //Set column definition initialisation properties.
          "columnDefs": [
          {
              "targets": [ 0 ], //first column / numbering column
              "orderable": false, //set not orderable
          },
          ],

      });
      // console.log(data[hasil]);
      $('#btn-filter').click(function(){ //button filter event click
          table.ajax.reload();  //just reload table
      });

      $('#btn-reset').click(function(){ //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload();  //just reload table
      });

  });
  </script>
</body>
</html>










      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script>
 $('#tabelHSkrining').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>skrining/get_hasil_skrining",
            type : 'GET'
        },
    });
 </script> -->
