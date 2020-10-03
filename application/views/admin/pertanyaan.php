<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Pertanyaan</h4>
        </div>
      <div class="card-body">
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
        
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th> No </th>
              <th> Pertanyaan </th>
              <th> Jenis </th>
              <th> Skor YA </th>
              <th> Skor Tidak </th>
              <th> Aksi</th>
            </thead>
            <tbody>
              <tr>
              <?php if($pertanyaan->num_rows() > 0): ?>
                      <?php $index = 1; ?>
                <?php foreach($pertanyaan->result() as $tanya):
                      $id = $tanya->id; 
                       ?>
                <td> <?php echo $index++; ?></td>
                <td><?php echo "$tanya->pertanyaan";?></td>
                <td><?php 
                           if($tanya->jenis){
                            echo "Covid";
                           };
                          ?>
                </td>
                <td><?php echo "$tanya->bobot1";?></td>
                <td><?php echo "$tanya->bobot2";?></td>
                <td>
                    <a href="<?php  echo base_url('Admin/detailpertanyaan/' . $tanya->id); ?>" class="btn btn-info btn-sm">Ubah Skor</a>
                    <a href="<?php  echo base_url('Admin/detailquiz/' . $tanya->id); ?>" class="btn btn-info btn-sm" >Ubah Pertanyaan</a>
                </td>
                </tr>
                <?php endforeach; ?>
                       <?php else: ?>
                    <tr>
                      <td colspan="6" style="text-align: center;">Data tidak tersedia</td>
                    </tr>
                  <?php endif; ?>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
