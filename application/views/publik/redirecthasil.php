<div class="modal fade-in" id="resume" role="dialog">
    <div class="modal-dialog">
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selesai !</h4>
        </div>
        <div class="modal-body">
          <img style="max-height:60px; margin-left:20px" src="<?php echo base_url()?>assets/img/favicon.png">
        	<h5>Anda telah berhasil mengisi data skrining mandiri</h5>
        	<h4 class="info-text">
        	<?php # echo "Kode Antrian $kokom[nama] adalah $kokom[kode]."; 
        	foreach ($user as $key => $value) {
            $id= $value->id_user;
            echo "Nama : $value->nama";
            echo "- Kode Anda : $value->kode_skrining".'<br>';
            if ($value->hasil >=4) {
              echo "Status adalah SEGERA RUJUKAN - Berisiko Sedang/Tinggi";
            }elseif ($value->hasil < 4) {
              echo "Status : Risiko Rendah Terhadap COVID-19";
            }elseif ($value->hasil = 0) {
              echo "Selalu patuhi Protokol Kesehatan, Anda SEHAT";
            }
            echo '<br>'."$value->tgl_skrining";
          };
        	#echo array_sum($kokom); ?>
        	</h4>
          <h5>Silakan simpan baik baik dan tunjukan hasil skrining Anda hanya kepada Tim Skrining Terpusat RS dr Suyoto</h5>
        	<BR>
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
</style>