<div class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Hasil Skrining</h4>
        </div>
        <div class="card-body">
<!-- search -->
<form action="<?php echo base_url('index.php/Admin/search')?>" method="GET">
        <div class="form-group">
          <input type="text" class="form-control" id="search" name="keyword" placeholder="cari">
        </div>
        <input class="btn btn-primary" type="submit" value="search">
      </form>

        <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
        <?php endif; ?>
          <div class="table-responsive">
            <table class="table">
              <thead class=" text-primary">
                <th>
                  Tanggal
                </th>
                <th>
                  Nama Pengunjung
                </th>
                <th>
                  Usia
                </th>
                <th>
                  Jenis Tes
                </th>
                <th>
                  Hasil
                </th>
                <th>
                  Kode
                </th>
                <th class="text-right">
                  Aksi
                </th>
              </thead>

                    <tbody>
                      <?php #if($result->rows() > 0): ?>
                      <?php $index = 1; ?>
                      <?php foreach($result as $hasil):
                      $id = $hasil->id; 
                       ?>
                    <tr>
                       <td style="text-align: center;"><?php echo $index++; ?></td>
                       <td>
                       <?php echo $hasil->nama;?>
                       </td>
                       <td>
                       <?php echo $hasil->pertanyaan;?>
                       </td>
                       <td>
                       <?php echo $hasil->nilai;?>
                      </td>
                       <td>
                       <?php echo $hasil->tgl;?>
                        </td>
                        <td>
                       <?php echo $hasil->kode;?>
                        </td>
                        <td style="text-align: center;">
                          <a href="<?php  echo base_url('Admin/detailSkrining/' . $hasil->id); ?>" class="btn btn-info">Detail</a>
                          <!-- <button type="submit" data-toggle="modal" data-target="#hapus<?php echo $id;?>" class="btn btn-success btn-rose">Hapus</button> -->
                        </td>
                     </tr>
                     <?php endforeach; ?>
                       <?php #else: ?>
                    <tr>
                      <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
                    </tr>
                  <?php #endif; ?>
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
  <script src="<?php echo base_url()?>assets/js/core/jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/core/popper.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/core/bootstrap.min.jS"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <script src="<?php echo base_url()?>assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="<?php echo base_url('/assets/js/plugins/bootstrap-notify.js');?>"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="<?php echo base_url('/assets/js/paper-dashboard.min.js?v=2.0.0');?>" type="text/javascript"></script>
  <!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="<?php echo base_url('/assets/demo/demo.js');?>"></script>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.rawgit.com/igorescobar/jQuery-Mask-Plugin/1ef022ab/dist/jquery.mask.min.js"></script>

</body>

</html>