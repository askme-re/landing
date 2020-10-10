<div class="modal fade" id="resume" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TERIMA KASIH!</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="<?php echo base_url().'index.php/Welcome/quwa/$kokom[kode]'?>" >
        	<h5>Anda telah berpartisi</h5>
        	<h4 class="info-text">
        	<?php  echo "Kode Antrian $kokom[nama] adalah $kokom[kode]."; 
        	// $query = $this->db->get("select * from temp_trx where kode='$kokom[kode]'");
        	#var_dump($kokom);
        	$kode = $kokom['kode'];
        	#var_export($kokom);
        	#echo array_sum($kokom); ?>
        	</h4>
        	<BR>
        </div>
        <div class="modal-footer">
        <a href="<?php  echo base_url('Welcome/inde/' . $kokom['kode']); ?>" class="btn btn-info btn-sm">Cetak</a>
          <!-- <input type="submit" class="btn btn-previous btn-default btn-wd btn-sm" value="CETAK PDF"> -->
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