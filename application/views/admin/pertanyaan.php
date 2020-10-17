<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Pertanyaan</h4>
        </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table" id="tabelPertanyaan">
            <thead class=" text-primary">
              <th> No </th>
              <th> Pertanyaan </th>
              <th> Jenis Wabah </th>
              <th> Jawaban</th>
              <th> Bobot </th>
            </thead>
            <tbody>
              <!-- <tr>
              <?php if(isset($pertanyaan)): ?>
                      <?php $index = 1; ?>
                <?php foreach($pertanyaan as $tanya):
                      $id = $tanya->id; 
                       ?>
                <td> <?php echo $index++; ?></td>
                <td><?php echo "$tanya->pertanyaan";?></td>
                <td><?php 
                           if($tanya->jenis == 1){
                            echo "Covid";
                           }elseif ($tanya->jenis == 2) {
                            echo "Malaria";
                           };
                          ?>
                </td>
                <td><?php echo "$tanya->opsi_bobot";?></td>
                <td><?php echo "$tanya->bobot";?></td>
                <td>
                    <a href="<?php  echo base_url('Admin/detailpertanyaan/' . $tanya->id); ?>" class="btn btn-info btn-sm">Ubah Skor</a>
                    <a href="<?php  echo base_url('Admin/detailquiz/' . $tanya->id); ?>" class="btn btn-info btn-sm" >Ubah Pertanyaan</a>
                </td>
                </tr>
                <?php endforeach; ?>
                       <?php  else: ?>
                    <tr>
                      <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
                    </tr>
                  <?php endif; ?>
              </tr> -->
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
 $('#tabelPertanyaan').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>index.php/pertanyaan/get_pertanyaan",
            type : 'GET'
        },
    });
</script>