<div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="theme">
      <div class="logo">
        <a href="<?php echo base_url('Login');?>" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url();?>assets/img/ASK_ME.jpg">
          </div>
        </a>
        <a href="<?php echo base_url('Login');?>" class="simple-text logo-normal" style="font-size:24px;text-decoration:none;color:rgb(5,91,175);padding:30 0 30 0;">
          Admin-ASK
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
            <a href="<?php echo base_url('Admin/Skrinning');?>">
              <i class="nc-icon nc-single-copy-04"></i>
              <p>Skrinning</p>
            </a>
          </li>
          <li class="">
             <a href="<?php echo base_url('pertanyaan');?>">
              <i class="nc-icon nc-tap-01"></i>
              <p>Pertanyaan</p>
            </a>
          </li>
          <li style="margin-top:30px;">
             <a href="<?php echo base_url('index.php/Login/keluar');?>" style="font-size:12px;color:orange;">
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