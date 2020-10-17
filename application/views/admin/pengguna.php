<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Pengguna</h4>
        </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table" id="tabelPengguna">
            <thead class=" text-primary">
              <th> No </th>
              <th> Nama </th>
              <th> Jenis Pengguna </th>
              <th> Telp/HP </th>
              <th> Riwayat Penyakit</th>
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
 $('#tabelPengguna').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>index.php/user/get_pengguna",
            type : 'GET'
        },
    });
</script>