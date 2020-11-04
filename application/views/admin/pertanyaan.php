<div class="content" style="font-size:14px;">
  <div class="row ">
<div class="col-md-12">

  <div class="card">
      <div class="card-header">
        <div class="card-title">
          Daftar Jenis Penyakit Menular
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped table-bordered" style="width:100%;margin-top:20px;" id="tabelPertanyaan">
          <thead class="text-primary" >
            <th> No </th>
            <th width="300px"> Jenis Penyakit Menular </th>
            <th width="300px"> Keterangan </th>
            <th> Aksi </th>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>






  <!-- <div class="row">
    <div class="col-md-12">
      <div class="card">
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Jenis Penyakit Menular</h4>
        </div>
      <div class="card-body">

        <div class="table-responsive">

        </div>
      </div>
      </div>
    </div>
  </div> -->
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script>
 $('#tabelPertanyaan').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>pertanyaan/get_pertanyaan",
            type : 'POST'
        },
    });
</script>
