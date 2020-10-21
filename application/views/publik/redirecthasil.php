<div class="modal fade" id="resume" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Selesai !</h4>
        </div>
        <div class="modal-body">
        <!-- <form method="POST" action="<?php echo base_url().'index.php/Welcome/quwa/$value->id_user'?>" > -->
        <form>
          <img style="max-height:60px; margin-left:20px" src="<?php echo base_url()?>assets/img/favicon.png">
        	<h5>Anda telah berhasil mengisi data skrining mandiri</h5>
        	<h4 class="info-text">
        	<?php # echo "Kode Antrian $kokom[nama] adalah $kokom[kode]."; 
        	foreach ($user as $key => $value) {
            $id= $value->id_user;
            echo "Nama : $value->nama";
            echo "- Kode Anda : $value->kode_skrining".'<br>';
            if ($value->hasil >=6) {
              echo "Status adalah SEGERA RUJUKAN";
            }elseif ($value->hasil <6) {
              echo "Status : SEHAT";
            }

echo '<br>'."$value->tgl_skrining";
          };
        	#echo array_sum($kokom); ?>
        	</h4>
          <h5>Silakan simpan baik baik dan tunjukan hasil skrining Anda hanya kepada Tim Skrining Terpusat RS dr Suyoto</h5>
        	<BR>
        </div>
        <div class="modal-footer">
        <a href="<?php  echo base_url('Welcome/inde/'.$id) ?>" class="btn btn-info btn-sm">Unduh</a>
          <a href="<?php echo base_url().''?>">
          KEMBALI
          </a>
        </div>
        </form>
      </div>
      
    </div>
  </div>

  <script type="text/javascript">
    $(window).on('load',function(){
        $('#resume').modal('show');
    });
</script>