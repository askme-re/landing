<div class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Hasil Skrining</h4>
        </div>
        <div class="card-body">
        <?php $this->load->view('admin/pencarian_modal') ?>
          <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%;font-size:13px;" id="tabelHSkrining">
              <thead class=" text-primary" align="center">
                <th>
                  id
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
                  Telp
                </th>
                <th>
                  Skor
                </th>
                <th>
                  Tgl Lahir
                </th>
                <th>
                  Usia
                </th>
                <th>
                  Jenis User
                </th>
                <th>
                  Riwayat Penyakit
                </th>
                <th>
                  Tujuan Ke
                </th>
                <th>
                  Soal 1
                </th>
                <th>
                  Soal 2
                </th>
                <th>
                  Soal 3
                </th>
                <th>
                  Soal 4
                </th>
                <th>
                  Soal 5
                </th>
                <th>
                  Soal 6
                </th>
                <th>
                  Soal 7
                </th>
                <th>
                  Soal 8
                </th>
                <th>
                  Soal 9
                </th>
                <th>
                  Soal 10
                </th>
                <th>
                  Soal 11
                </th>
                <th>
                  Soal 12
                </th>
                <th>
                  Soal 13
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script>
 $('#tabelHSkrining').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>skrining/get_hasil_skrining",
            type : 'GET'
        },
    });
</script>
