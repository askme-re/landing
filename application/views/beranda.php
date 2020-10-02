<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Beranda | Simulasi Proyek TI  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('./assets/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('./assets/css/paper-dashboard.css?v=2.0.0');?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('./assets/demo/demo.css');?>" rel="stylesheet" />
  <!-- JS -->
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  <style type="text/css">
    .lebelgedhe{
      color: default;
      font-size: 14px;
      font-style: italic;
    }
    .lebelkecil{
      color: orange;
      font-size: 12px;
    }
    .lebelbawah{
      color: default;
      font-style: italic;
      font-size: 12px;
    }
    #pageloader
    {
      background: rgba( 255, 255, 255, 0.8 );
      display: none;
      height: 100%;
      position: fixed;
      width: 100%;
      z-index: 9999;
    }

    #pageloader img
    {
      left: 50%;
      margin-left: -32px;
      margin-top: -32px;
      position: absolute;
      top: 50%;
    }
    fieldset {
      border: .5px solid grey;
      padding: 5px;
    }
/*    legend {
        padding-left: -20px;
    }*/

  </style>
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url('./assets/img/logo-small.png');?>">
          </div>
        </a>
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="<?php echo base_url('setelan');?>">
              <i class="nc-icon nc-settings-gear-65"></i>
              <p>Setelan</p>
            </a>
          </li>
          <li class="">
            <a href="<?php echo base_url('calculate/infoparam');?>">
              <i class="nc-icon nc-alert-circle-i"></i>
              <p>Info Kriteria</p>
            </a>
          </li>
          <li class="active ">
             <a href="<?php echo base_url('calc');?>">
              <i class="nc-icon nc-tile-56"></i>
              <p>Daftar Simulasi</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="<?php echo base_url('profil');?>">
              <i class="nc-icon nc-badge"></i>
              <p>Kredit</p>
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
            <a class="navbar-brand" href="#pablo">BIG Project Simulation</a>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- <div class="card"> -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Daftar Simulasi Proyek </h4>
              </div>
              <div class="card-body">
            <?php if($this->session->flashdata('msg')): ?>
                <p><?php echo $this->session->flashdata('msg'); ?></p>
            <?php endif; ?>
                <div class="card-footer ">
                  <button type="submit" data-toggle="modal" data-target="#exampleModal" class="btn btn-success btn-rose">Tambah Simulasi</button>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        No
                      </th>
                      <th>
                        Nama Proyek
                      </th>
                      <th>
                        Nilai (IDR)
                      </th>
                      <th>
                        Jadwal
                      </th>
                      <th>
                        Teknologi
                      </th>
                      <th>
                        Hasil
                      </th>
                      <th class="text-right">
                        Aksi
                      </th>
                    </thead>

                    <tbody>
                      <?php if($semua_simulasi->num_rows() > 0): ?>
  				            <?php $index = 1; ?>
  				            <?php foreach($semua_simulasi->result() as $simulasi):
                      $id = $simulasi->id; 
                       ?>
				            <tr>
					             <td style="text-align: center;"><?php echo $index++; ?></td>
					             <td><?php echo $simulasi->nama_proyek; ?></td>
					             <td>
                        <?php $number = $simulasi->dana;
                        echo number_format($number);?>
					             </td>
					             <td>
                        <?php echo $simulasi->waktu;
  					         	   // if ($simulasi->waktu == 1) {
  					         		    // echo "Lambat";
  					         	   // }else echo "Cepat";?>
                      </td>
					             <td>
                       <?php echo $simulasi->teknologi;
                          // if ($simulasi->ukuran == 1) {
                          // echo "Besar";
                          // }else echo "Kecil";?>
                        </td>
                        <td>
					         	   <?php echo $simulasi->hasil;?>
                        </td>
						 <!-- <td><?php echo date('j F Y', strtotime($pengguna->tanggal_lahir)); ?></td>
						 <td style="text-align: center;"><?php echo $pengguna->umur; ?></td> -->
						            <td style="text-align: center;">
						              <a href="<?php  echo base_url('calculate/detail/' . $simulasi->id); ?>" class="btn btn-info">Detail</a>
						              <!-- <a data-toggle="modal" data-target="#modalhapus<?php echo $simulasi->id;?>" class="btn btn-danger">Hapus</a> -->
                          <button type="submit" data-toggle="modal" data-target="#hapus<?php echo $id;?>" class="btn btn-success btn-rose">Hapus</button>
                          <!-- <a class="btn btn-danger" data-toggle="modal" data-target="#hapus<?php #echo $simulasi->id;?>"> Hapus</a> -->
						            </td>
			               </tr>
			               <?php endforeach; ?>
			                 <?php else: ?>
				            <tr>
				              <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
				            </tr>
				          <?php endif; ?>
                  </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="https://www.creative-tim.com" target="_blank">Credit Template: Creative Tim</a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="<?php echo base_url('./assets/js/core/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/core/popper.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/core/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS 
  <script src="<?php echo base_url('./assets/js/plugins/chartjs.min.js');?>"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('./assets/js/plugins/bootstrap-notify.js');?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('./assets/js/paper-dashboard.min.js?v=2.0.0');?>" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('./assets/demo/demo.js');?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

</body>

</html>


<!-- Modal tambah -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document" style="width:700px; max-width:900px" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Form Simulasi Proyek Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <!-- </div>   loading -->
      <div id="pageloader">
         <img src="http://cdnjs.cloudflare.com/ajax/libs/semantic-ui/0.16.1/images/loader-large.gif" alt="processing..." />
      </div>
      <!-- <?php echo $this->session->flashdata('item'); ?> -->
        <form method="post" action="<?php echo base_url().'index.php/calculate/hitung' ?>" class="form-horizontal" id="myForm">
          <div class="row">
          <label class="col-sm-3 col-form-label">Nama Proyek</label>
          <div class="col-sm-9">
            <div class="form-group">
              <input type="text" id="nama_proyek" name="nama_proyek" class="form-control" placeholder="Masukan nama proyek ti" required>
            </div>
          </div>
          </div>
          <fieldset>
            <legend class="col-sm-2"> Biaya </legend>
          <div class="row">
          <label class="col-sm-3 col-form-label">Dana Proyek</label>
          <div class="col-sm-9">
            <div class="form-group">
              <input type="text" id="dana" name="dana" class="form-control uang" required>
            </div>
          </div>
          </div>
           <!-- Variabel Waktu proyek -->
          <div class="row">
          <label class="col-sm-3 col-form-label" for="jenis">Jenis Proyek</label>
          <div class="col-sm-9 ">
            <div class="form-group" >
              <select id="jenis" name="jenis" class="form-control">
                <div class="filter-option-inner">
                  <option disabled> Pilih Jenis Proyek</option>
                  <option value="WebApps">Web Apps </option>
                  <option value="WebFrontend/Backend">Web Front/Backend</option>
                  <option value="MobileApps">Mobile Apps</option>
                </div>
              </select>
            </div>
          </div>
          </div>

          <!-- Variabel Ukuran Proyek -->
          <div class="row">
          <label class="col-sm-3 col-form-label">Golongan Klien</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select id="institusi" name="institusi" class="form-control">
                <div class="filter-option-inner">
                  <option disabled> Pilih jenis institusi</option>
                  <option value="0">Organisasi Kecil / Individu</option>
                  <option value="1">Organisasi Besar</option>
                </div>
              </select>
            </div>
          </div>
          </div>
          </fieldset>
        <fieldset>
          <legend class="col-sm-2">
            Waktu
          </legend>
          <div class="row">
          <label class="col-sm-3 col-form-label">Waktu</label>
          <div class="col-sm-9">
            <div class="form-group">
              <input type="text" class="form-control" name="daterange" value="01/01/2019 - 01/15/2019" />
            </div>
          </div>
          </div>
          <div class="row" id="group">
            <label class="col-sm-3 col-form-label">Programmer ke-1</label>
              <div id="div1" class="col-sm-3">
                <div class="form-group">
                <label for="senior2" class="lebelkecil">Pengalaman Teknis</label>
                <select id="teknis1" name="teknis1" class="form-control">
                  <div class="filter-option-inner">
                    <option disabled> -Pilih- </option>
                    <option value="0">Eksplor</option>
                    <option value="1">Cukup</option>
                  </div>
                </select>
        <label for="senior2" class="lebelkecil">Pengalaman Proyek</label>
        <select id="proyek1" name="proyek1" class="form-control">
                  <div class="filter-option-inner">
                    <option disabled> -Pilih- </option>
                    <option value="0">Baru</option>
                    <option value="1"> 1-4 Kali </option>
                    <option value="2"> >=5 Kali</option>
                  </div>
                </select>
                </br>

                  <!-- <input id="input1" type="number" name="programmer" min="2" max="50" class="form-control" required> -->
                  <!-- <span class="bmd-help lebelbawah"><i>Total Programmer yang dilibatkan di proyek </i></span> -->
                    <a id="tambah">Tambah</a> | <a id="hapus">Hapus</a>
                </div>
              </div>
<!--               <label class="col-sm-2 col-form-label" style="text-align:left">Orang</label>

              <div id='group' class="col-sm-3 col-form-label">
                <div id='div1' class="col-sm-7">
                  <label class="col-sm-3 col-form-label"> Programmer ke-1</label>
                  <div class="form-group">
                    <input type="text" id="input1" class="form-control"/>
                  </div>
                </div>
              </div> -->

          </div>
         <!--  <div class="row">
          <label class="col-sm-3 col-form-label" for="exp_koding_new">Ada Programmer Baru</label>
          <div class="col-sm-9">
            <div class="form-group">
            <select id="seeAnotherFieldGroup" name="exp_koding_new" class="form-control">
                <div class="filter-option-inner">
                  <option disabled> Pilih Salah Satu</option>
                  <option value="0">Ada</option>
                  <option value="1">Tidak</option>
                </div>
              </select>
              <span class="bmd-help lebelbawah">komposisi tim?</span>
            </div>
          </div>
          </div> -->
          <!-- cabang form -->
      <!--     <div class="form-group" id="otherFieldGroupDiv">
            <div class="row">
            <label class="col-sm-3 col-form-label lebelgedhe" >Detail Komposisi</label>
              <div class="col-3">
                <label for="otherField1" class="lebelkecil">Jumlah Programmer</label>
                <input type="number" id="otherField1" name="programmer_new" min="1" max="50" class="form-control"required>
              </div>
              <div class="col-3">
                <label for="otherField2" class="lebelkecil">Pengalaman Teknis</label>
                 <select id="otherField2" name="teknis_new" class="form-control">
                  <div class="filter-option-inner">
                    <option disabled> -Pilih- </option>
                    <option value="0">Eksplor</option>
                    <option value="1">Cukup</option>
                  </div>
                </select>
              </div>
              <div class="col-3">
                <label for="otherField3" class="lebelkecil">Pengalaman Proyek</label>
                <select id="otherField3" name="exp_proyek_new" class="form-control">
                  <div class="filter-option-inner">
                    <option disabled> -Pilih- </option>
                    <option value="0">Baru</option>
                    <option value="1">Pernah</option>
                  </div>
                </select> -->
                <!-- <input type="text" class="form-control w-100" id="otherField3"> -->
             <!--  </div>
            </div>
          </div>
          <div class="row">
          <label class="col-sm-3 col-form-label" for="exp_koding_old">Ada Programmer Senior</label>
          <div class="col-sm-9">
            <div class="form-group">
            <select id="seeProgrammerSenior" name="exp_koding_old" class="form-control">
                <div class="filter-option-inner">
                  <option disabled> Pilih Salah Satu</option>
                  <option value="0">Ada</option>
                  <option value="1">Tidak</option>
                </div>
              </select>
              <span class="bmd-help lebelbawah">komposisi tim?</span>
            </div>
          </div>
          </div> -->
           <!-- cabang form -->
       <!--    <div class="form-group" id="seeProgrammerSeniorDiv">
            <div class="row">
            <label class="col-sm-3 col-form-label lebelgedhe">Detail Komposisi</label>
              <div class="col-3">
                <label for="senior1" class="lebelkecil">Jumlah Programmer</label>
                <input type="number" id="senior1" name="programmer_old" min="1" max="50" class="form-control" required >
              </div>
              <div class="col-3">
                <label for="senior2" class="lebelkecil">Pengalaman Teknis</label>
                <select id="senior2" name="teknis_old" class="form-control">
                  <div class="filter-option-inner">
                    <option disabled> -Pilih- </option>
                    <option value="0">Eksplor</option>
                    <option value="1">Cukup</option>
                  </div>
                </select>
              </div>
              <div class="col-3">
                <label for="senior3" class="lebelkecil">Pengalaman Proyek</label>
                <select id="senior3" name="exp_proyek_old" class="form-control">
                  <div class="filter-option-inner">
                    <option value="1">Pernah</option>
                  </div>
                </select>
              </div>
            </div>
          </div> -->
        </fieldset>
          <!-- Variabel Keterlibatan Enduser -->
          <!-- <div class="border">
            
          </div> -->
        <fieldset>
            <legend class="col-sm-2"> Mutu </legend>
          <div class="row">
          <label class="col-sm-3 col-form-label" for="teknologi">Teknologi Pengembangan</label>
          <div class="col-sm-9">
            <div class="form-group">
              <input type="teknologi" name="teknologi" class="form-control" required>
              <span class="bmd-help lebelbawah">Jika lebih dari satu, pisahkan dengan koma [,].</span>
            </div>
          </div>
          </div>
          <div class="row">
          <label class="col-sm-3 col-form-label">Frekuensi Stakeholder</label>
          <div class="col-sm-7">
            <div class="form-group">
              <input type="number" name="frekuensi" class="form-control" required>
              <span class="bmd-help lebelbawah"><i>Jumlah Rencana Interaksi dengan Stakeholder</i></span>
            </div>
          </div>
          <label class="col-sm-2 col-form-label" style="text-align:left">Kali</label>
          </div>
          <div class="row">
          <label class="col-sm-3 col-form-label">Konfirmasi Aplikasi</label>
          <div class="col-sm-9">
            <div class="form-group">
            <select id="konfirmasi_user" name="konfirmasi_user" class="form-control">
                <div class="filter-option-inner">
                  <option value="0">Apakah Enduser diikutsertakan dalam konfirmasi spek? Tidak</option>
                  <option value="1">Apakah Enduser diikutsertakan dalam konfirmasi spek? Ya</option>
                </div>
            </select>
            </div>
          </div>
          </div>
          <div class="row">
          <label class="col-sm-3 col-form-label">Testing Aplikasi</label>
          <div class="col-sm-9">
            <div class="form-group">
            <select id="testing" name="testing" class="form-control">
                <div class="filter-option-inner">
                  <option value="0">End User hanya mengikuti demo</option>
                  <option value="1">End user mengikuti testing aplikasi</option>
                </div>
            </select>
            </div>
          </div>
          </div>
          <div class="row">
          <label class="col-sm-3 col-form-label">Spesifikasi Aplikasi</label>
          <div class="col-sm-9">
            <div class="form-group">
            <select id="spesifikasi" name="spesifikasi" class="form-control">
                <div class="filter-option-inner">
                  <option value="0">Apakah Enduserikut menentukan Spesifikasi? Tidak</option>
                  <option value="1">Apakah Enduser ikut menentukan Spesifikasi? Ya</option>
                </div>
            </select>
            </div>
          </div>
          </div>
        </fieldset>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" id="simulasis" onclick="showDiv()">Simulasi!</button>
        <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
        <?php } ?>
      </div>
      </form>

    </div>
  </div>
</div>

<?php if($semua_simulasi->num_rows() > 0): ?>
  <?php $index = 1; ?>
  <?php foreach($semua_simulasi->result() as $simulasi):
  $id = $simulasi->id; 
  ?>
  
<!-- Modal Hapus-->
<div class="modal fade" id="hapus<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="hapus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Hapus Simulasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="<?php echo base_url().'index.php/calculate/hapus' ?>" class="form-horizontal">
          <div class="modal-body">
            <p>Apakah anda yakin untuk menghapus simulasi  <b> <?php echo $simulasi->nama_proyek ?> </b> ?</p>
          </div>
          <div class="col-sm-9">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control" value="<?php echo $id ?>" >
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-danger">Ya</button>
          <?php if ($this->session->flashdata('category_success')) { ?>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
        <?php } ?>
      </div>
        </form>
    </div>
  </div>
</div>
 <?php endforeach; ?>
   <?php else: ?>
    Data tidak tersedia
                  <?php endif; ?>

<script>

$(function() {
  $('input[name="daterange"]').daterangepicker({
    opens: 'left'
  }, function(start, end, label) {
    console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
  });

});

$(document).ready(function(){
    // Format mata uang.
    $( '.uang' ).mask('0,000,000,000', {reverse: true});

    var i = 2;
    $("#tambah").click(function(){
      if(i>10){
        alert("Maksimal 10 Input.");
        return false;
      }
      var label = $(document.createElement('label')).attr("class",'col-sm-3 col-form-label');
      label.after().html(
        'Programmer ke-'+i+'<label/>'+'<p></p>');
      label.appendTo("#group");
      
      // var div = $(document.createElement('div')).attr("id",'div'+i, "class",'col-sm-7');
      var div = $(document.createElement('div')).attr({"id":'div'+i, "class":'col-sm-3'});
      // div.html('<label class="col-sm-3 col-form-label" >'+ 'Programmer ke-'+i+'</label>');
      div.after().html(
        // '<div class="col-3"'+
        '<label for="senior" class="lebelkecil">Pengalaman Teknis</label>'+
                '<select id="teknis'+i+'" name="teknis'+i+'" class="form-control">'+
                  '<div class="filter-option-inner">'+
                    '<option disabled> -Pilih- </option>'+
                    '<option value="0">Eksplor</option>'+
                    '<option value="1">Cukup</option>'+
                  '</div>'+
                '</select>'+
        '<label for="senior2" class="lebelkecil">Pengalaman Proyek</label>'+
        '<select id="proyek'+i+'" name="proyek'+i+'" class="form-control">'+
                  '<div class="filter-option-inner">'+
                    '<option disabled> -Pilih- </option>'+
                    '<option value="0">Baru</option>'+
                    '<option value="1"> 1-4 Kali</option>'+
                    '<option value="2"> >=5 Kali</option>'+
                  '</div>'+
                '</select>'+
      // div.after().html(
      //   '<label for="senior2" class="lebelkecil">Pengalaman Teknis</label>
      //           <select id="senior'+i+'name="teknis_old" class="form-control">
      //             <div class="filter-option-inner">
      //               <option disabled> -Pilih- </option>
      //               <option value="0">Eksplor</option>
      //               <option value="1">Cukup</option>
      //             </div>
      //           </select>'+
        '<input class="form-control" type="hidden" id="totalprog" name="totalprog" value="'+i+' " />');

      div.appendTo("#group");
      i++;

    });
    $("#hapus").click(function(){
      if (i==1) {
        alert("Input tidak bisa dihapus lagi.");
        return false;
      }
      i--;
      $("#div"+i).remove();
    });



});


window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000); 
window.setTimeout(function() { $(".alert-warning").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000); 

$("#seeAnotherFieldGroup").change(function() {
  if ($(this).val() == "0") {
    $('#otherFieldGroupDiv').show();
    $('#otherField1').attr('required', '');
    $('#otherField1').attr('data-error', 'This field is required.');
    $('#otherField2').attr('required', '');
    $('#otherField2').attr('data-error', 'This field is required.');
    $('#otherField3').attr('required', '');
    $('#otherField3').attr('data-error', 'This field is required.');
  } else {
    $('#otherFieldGroupDiv').hide();
    $('#otherField1').removeAttr('required');
    $('#otherField1').removeAttr('data-error');
    $('#otherField2').removeAttr('required');
    $('#otherField2').removeAttr('data-error');
    $('#otherField3').removeAttr('required');
    $('#otherField3').removeAttr('data-error');
  }
});
$("#seeAnotherFieldGroup").trigger("change");

$("#seeProgrammerSenior").change(function() {
  if ($(this).val() == "0") {
    $('#seeProgrammerSeniorDiv').show();
    $('#senior1').attr('required', '');
    $('#senior1').attr('data-error', 'This field is required.');
    $('#senior2').attr('required', '');
    $('#senior2').attr('data-error', 'This field is required.');
    $('#senior3').attr('required', '');
    $('#senior3').attr('data-error', 'This field is required.');
  } else {
    $('#seeProgrammerSeniorDiv').hide();
    $('#senior1').removeAttr('required');
    $('#senior1').removeAttr('data-error');
    $('#senior2').removeAttr('required');
    $('#senior2').removeAttr('data-error');
    $('#senior3').removeAttr('required');
    $('#senior3').removeAttr('data-error');
  }
});
$("#seeProgrammerSenior").trigger("change");
function showDiv(){
  document.getElementById('simulasis').style.display = "none";
  // document.getElementById('loadingGif').style.display = "block";
  setTimeout(function(){
      // document.getElementById('loadingGif').style.display = "none";
      document.getElementById('simulasis').style.display = "block";
  },2000);

}

function sConsole(event) {
  event.preventDefault();
  var data = document.getElementById("nama_proyek");
  console.log(data.value);
  // var dana = document.getElementById("dana");
  // console.log(dana.value);
  // var djenis = document.getElementById("jenis");
  // console.log(djenis.value);
  
}


</script>
