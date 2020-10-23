<div class="modal fade-in" id="resume" role="dialog">
    <div class="modal-dialog">
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <table>
            <tr>
              <td>
          <img style="max-height:60px;" src="<?php echo base_url()?>assets/img/favicon.png">
              </td>
              <td>
          <h4 class="titlecetak">Terima kasih atas kesediaan Anda mengisi data dalam aplikasi ini.</h4>
              </td>
            </tr>
          </table>
        </div>
        <div class="modal-body">
        	<?php 	foreach ($user as $key => $value) {
            $id= $value->id_user; ?>
            <div class="rs_name">
            <?php echo "Nama : $value->nama".'<br>';; 
            echo "Kode Unik Anda : $value->kode_skrining".'<br>'; ?>
            </div>
            <p class="rs_light"><?php
            if ($value->hasil >= 4) {
              echo "Selalu patuhi Protokol Kesehatan, Anda dalam keadaan"."<strong> DARURAT </strong> karena berisiko sedang atau tinggi terhadap (COVID-19). Segera hubungi petugas kesehatan di RS dr Suyoto untuk RUJUKAN LANJUTAN";
            }elseif ($value->hasil >= 1) {
              echo "Selalu patuhi Protokol Kesehatan, Anda patut "."<strong> WAS-WAS </strong> karena berisiko rendah terhadap (COVID-19)";
            }
            if ($value->hasil == "0") {
              echo "Selalu patuhi Protokol Kesehatan, Anda "."<strong> SEHAT </strong> dan berisiko rendah terhadap (COVID-19)";
            }
          };?> </p>
          <p class="rs_light small">Silakan simpan baik baik dan tunjukan hasil skrining Anda hanya kepada Tim Skrining Terpusat RS dr Suyoto</p>
          <p class="rs_info">Data ini hanya berlaku 1x24 jam dari waktu Skrining</p>
            <p class="rs_light small">Waktu skrining : <?php echo "$value->tgl_skrining"; ?> </p>
        </div>
          <div class="modal-footer">
          <a href="<?php  echo base_url('Welcome/inde/'.$id) ?>" class="btn btn-info btn-md">Unduh</a>
            <a href="<?php echo base_url().''?>">KEMBALI</a>
          </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript">
    $(window).on('load',function(){
        $('#resume').modal('show');
    });
</script>
<style type="text/css">
body{
  background-color: blue;
}
.btn-info {
  color: white;
}
.titlecetak{
margin-left: 10px;
text-align: center;
}
.rs_name{
  font-weight: bold;
  font-size: 18px;
  text-align: center;
}
.rs_light{
  border: solid;
  margin-top: 15px;
  text-align: center;
}
.rs_light.small {
  border: none;
font-size: 14px;
font-style: italic;
}
.rs_info{
  background-color: pink;
  text-align: center;
}
</style>