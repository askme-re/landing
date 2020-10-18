<div class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Hasil Skrining</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table" id="tabelHSkrining">
              <thead class=" text-primary">
                <th>
                  id
                </th>
                <th>
                  Waktu Skrining
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
                  Hasil
                </th>
                <th>
                  Jenis Skrining
                </th>
                <th>
                  Usia
                </th>
                <th>
                  Jenis User
                </th>
                <th>
                  Tujuan
                </th>
                <!-- <th class="text-right">
                  Aksi
                </th> -->
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
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script>
 $('#tabelHSkrining').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>index.php/skrining/get_hasil_skrining",
            type : 'GET'
        },
    });
</script>