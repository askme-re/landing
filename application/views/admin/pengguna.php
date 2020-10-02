<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Pengguna</h4>
        </div>
      <div class="card-body">
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
        
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th> No </th>
              <th> Nama </th>
              <th> Usia </th>
              <th> Hasil </th>
              <th> Kode </th>
              <th> Aksi </th>
            </thead>
            <tbody>
              <tr>
              <?php if($pengguna->num_rows() > 0): ?>
                      <?php $index = 1; ?>
                <?php foreach($pengguna->result() as $orang):
                      // $id = $orang->id; 
                       ?>
                <td> <?php echo $index++; ?></td>
                <td><?php echo "$orang->name";?></td>
                <td><?php 
                          echo $c= "$orang->dob";
                          ?>
                </td>
                <td><?php echo "$orang->name";?></td>
                <td><a href="<?php  echo base_url('calculate/detail/' . $orang->id_user); ?>" class="btn btn-info">Detail</a></td>
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
