<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
        <h3>
          Hasil Skrining -
          <?php
          foreach ($dataJawaban as $orang) {
          $kode = $orang->kode_skrining;
          $name = $orang->nama;
          $telp = $orang->telp;
          $hasil = $orang->hasil;
          $tp_lhir = $orang->tp_lahir;
          $tgl_lhir = $orang->tgl_lahir;
          $umur = $orang->usia;
          $status = $orang->jenis_user;
          $riwayat = $orang->riw_penyakit;
          $tujuan = $orang->tujuan_rs;
          $alamat = $orang->alamat;
          // $kec = $orang->nama_kec;
          $date = $orang->tgl;

          }
          echo $kode;

          if ($hasil >=4) {
            $kesimpulan = "BERISIKO SEDANG/TINGGI";
          }elseif ($hasil >= 1) {
            $kesimpulan = "BERISIKO RENDAH";
          }elseif ($hasil == "0") {
            $kesimpulan = "SEHAT";
          }
          ?>
        </h3>
        <button type="button" name="button" class="btn btn-info btn-lg" onclick="window.location.href='<?php echo base_url().'skrining' ?>'"> Kembali </button>
        <button type="button" name="button" class="btn btn-warning btn-lg" onclick="window.print()"> Cetak</button>
        </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12" style="font-size:14px;">
            <div class="form-group col-sm-10">
              <h4>Detail Peserta</h4>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Nama </label>
              <input type="text" name="" class="col-sm-6" value="<?php echo $name ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">No Telp</label>
              <input type="text"  class="col-sm-6" name="" value="<?php echo $telp ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">TTL</label>
              <input type="text" name="" class="col-sm-6" value="<?php echo $tp_lhir .', '. $tgl_lhir ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Usia</label>
              <input type="text" name="" class="col-sm-6" value="<?php echo $umur?> Tahun " readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Status Kunjungan</label>
              <input type="text" name="" class="col-sm-6" value="<?php echo $status?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Riwayat penyakit</label>
              <input type="text" class="col-sm-6"name="" value="<?php echo $riwayat ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Tujuan Kunjungan</label>
              <input type="text" class="col-sm-6" name="" value="<?php echo $tujuan ?>" readonly>
            </div>
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Alamat Domisili</label>
              <textarea name="" class="col-sm-6" readonly><?php echo $alamat ?></textarea>
            </div>
            <!-- <div class="form-group col-sm-12">
              <label for="" class="col-sm-3">Kecamatan Asal</label>
              <input type="text" name="" value="<?php echo $kec ?>" readonly> -->
            <!-- </div> -->
            <div class="form-group col-sm-12">
              <label for="" class="col-sm-2">Hasil Skrining</label>
              <input type="text" id="hasil" class="col-sm-6" value="<?php echo $kesimpulan ?>" readonly>
            </div>
            <div class="form-group col-sm-10">
              <h4>Detail Jawaban</h4>
              <?php
              $i=1;
              foreach ($dataJawabans as $j) {
                echo '<p>'.$i++.') '.$j->pertanyaan.'? </p>';
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
          <button type="button" name="button" class="btn btn-default btn-lg" onclick="window.location.href='<?php echo base_url().'skrining' ?>'"> Kembali </button>
        </div>
      </div>

    </div>
  </div>
</div>
<style media="screen">
  #hasil{
    font-weight: bold;
  }
</style>
