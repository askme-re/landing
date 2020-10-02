
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Simulasi Proyek TI  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="<?php echo base_url('./assets/css/bootstrap.min.css');?>" rel="stylesheet" />
  <link href="<?php echo base_url('./assets/css/paper-dashboard.css?v=2.0.0');?>" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?php echo base_url('./assets/demo/demo.css');?>" rel="stylesheet" />
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
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active">
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
          <li>
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

<!-- content -->
	  <div class="content">
        <div class="row">
          <div class="col-md-12">
            <!-- <div class="card"> -->
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Setting Umum Waktu Proyek </h4>
              </div>
              <div class="card-body">
              	    <?php if($this->session->flashdata('msg')): ?>
					    <p><?php echo $this->session->flashdata('msg'); ?></p>
					<?php endif; ?>

					<?php if($semua_setelan->num_rows() > 0):
					foreach($semua_setelan->result() as $setelan): 
						?>
				<form method="post" action="<?php echo base_url().'index.php/calculate/editsetelan' ?>" class="form-horizontal">
	          		<div class="row">
	          		<div class="col-sm-1"></div>
	          		<p class="col-sm-4"><?php echo $setelan->nama_setting;  ?> </p>
	          		<div class="col-sm-2">
	          		  <div class="form-group">
	          		    <input type="hidden" name="id" class="form-control" value="<?php echo $setelan->id;?>">
	          		    <input type="text" name="b_wa" class="form-control" value="<?php echo $setelan->value;?>">
	          		  </div>
	          		</div>
	          		<div style="color:grey;">
	          			<!-- <label class="form-group"> -->
	          			Bulan
	          			<!-- </label> -->
	          		</div>
	          		<div class="col-sm-1">
	          			<button type="submit" class="btn btn-default btn-sm" style="vertical-align:super;">Ubah</button>
	          		</div>
	          		</div>
				</form>
			 <?php
					 endforeach;
					 else: 
					 	echo "string tidak tersedia";
					endif; ?>
	              
           	  </div>
			</div>
		  </div>
		</div>
	  </div>

      
    </div>

  </div><!--  div wrapper-->
<!--   Core JS Files   -->
  <script src="<?php echo base_url('./assets/js/core/jquery.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/core/popper.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/core/bootstrap.min.js');?>"></script>
  <script src="<?php echo base_url('./assets/js/plugins/perfect-scrollbar.jquery.min.js');?>"></script>
  <!--  Google Maps Plugin    
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
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
</body>


<script> 
window.setTimeout(function() { $(".alert-success").fadeTo(500, 0).slideUp(500, function(){ $(this).remove(); }); }, 3000); 
</script>
</html>