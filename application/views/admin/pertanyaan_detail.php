<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>
            Detail Pertanyaan : <?php
            foreach ($dataQuestion as $key) {
              $kokom = $key->penyakit;
            }
            if (empty($kokom)) {
              echo "-";
            }else{
              echo $kokom;
            }
            ?>
          </h3>
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-10">

            <table class="table">
              <thead>
                <td>No</td>
                <td>Pertanyaan</td>
                <td>Bobot</td>
              </thead>
              <tbody>
                <?php  $i=1;
                foreach ($dataQuestion as $j) {?>
                  <tr>
                    <td><?php echo 'Q'. $i++;?>
                    <td><?php echo $j->pertanyaan.'?';?>
                    </td>
                    <td><?php echo $j->bobot;?>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

          </div>
        </div>
        <a class="btn btn-default"href="<?php echo base_url().'pertanyaan' ?>">Kembali</a>
      </div>

    </div>
  </div>
</div>
