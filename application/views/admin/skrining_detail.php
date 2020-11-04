<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
        <h3>
          Detail Skrining :
          <?php
            // var_dump($id);
          foreach ($dataJawaban as $orang) {
          $name = $orang->nama;
          $telp = $orang->telp;
          $riwayat = $orang->riw_penyakit;
          $tujuan = $orang->tujuan_rs;
          $prov = $orang->nama_prop;
          $kec = $orang->nama_kec;
          $date = $orang->tgl;

          }
          echo $name;
          ?>
        </h3>
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">No Telp</label>
              <input type="text" name="" value="<?php echo $telp ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Riwayat penyakit</label>
              <input type="text" name="" value="<?php echo $riwayat ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Tujuan Kunjungan</label>
              <input type="text" class="col-sm-6" name="" value="<?php echo $tujuan ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Provinsi Asal</label>
              <input type="text" name="" value="<?php echo $prov ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Kecamatan Asal</label>
              <input type="text" name="" value="<?php echo $kec ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Tanggal Terdata</label>
              <input type="text" name="" value="<?php echo $date ?>" readonly>

            </div>
            <div class="form-group col-sm-10">
              <h4>Detail Jawaban</h4>
              <?php

              foreach ($dataJawaban as $j) {

                echo '<p>'.$j->pertanyaan.'? </p>';
                // echo ''.$j->bobot;
                if ($j->bobot > 0) {
                  echo " <p> Jawab : Ya </p>";
                }elseif ($j->bobot == 0) {
                  echo "<p> Jawab : Tidak </p> ";
                }
                ?>
                <br>
                <?php } ?>

            </div>
          </div>
          <a class="btn btn-default"href="<?php echo base_url().'pertanyaan' ?>">Kembali</a>
        </div>
      </div>

    </div>
  </div>
</div>
