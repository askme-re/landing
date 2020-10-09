<div class="modal fade" id="resume" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TERIMA KASIH!</h4>
        </div>
        <div class="modal-body">
        <form method="POST" action="<?php echo base_url().'index.php/Welcome/quwa'?>" >
        	<!-- <label id="dnama">ss</label> -->
        	<p id="dnama"></p>
        	<input type="text" value="Anda telah berpartisipasi" readonly="">
        	<?php  echo "$nama"; ?>
        	<BR>
        	<!-- <button>KEMBALI</button> -->
        	<!-- <input type="submit" value="KEMBALI"> -->
        </form>
        </div>
        <div class="modal-footer">
          <input type="submit" class="btn btn-default" value="Cetak PDF">
          <button type="button" class="btn btn-default" data-dismiss="modal">KEMBALI</button>
        </div>
      </div>
      
    </div>
  </div>

  <script type="text/javascript">
    $(window).on('load',function(){
        $('#resume').modal('show');
    });
</script>