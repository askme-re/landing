<div class="site-section pt-8" id="features-section">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-lg-10">
        <div class="mb-10">
          <div class="card">
            <div class="card-header text-center">
              <h4 class="card-title">Input Data Peserta Skrining</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url().'welcome/screening_save'?>">
								
				<input type="text" name="id" style="display:none" value="<?php echo $user_id; ?>"/>
								
                <div class="form-row col-12">
                  <div class="form-group col-sm-12">
                    <label class="control-label">Jenis Skrining</label>
					<select class="form-control" id="jenis" name="jenis" required>
						<option disabled="" selected="true">Pilih salah satu</option>
						<?php
						foreach ($jenis as $row) {
						?>
							<option value="<?php echo $row->id; ?>">
								<?php echo $row->wabah; ?>
							</option>
						<?php } ?>
					</select>
                  </div>
									
				<div class="form-row col-12">
					<div class="form-group col-sm-12">
						<h4 class="info-text"> Bagaimana keadaan Anda saat ini?</h4>
					</div>
				</div>	
				
				<div class="form_group col-sm-12" id="isi">
				
				</div>
				
				<div class="form-group col-sm-12 row" style="margin-top: 15px;">
					<div class="col-sm-2">
						<a href="<?php echo base_url()?>landing" class="btn btn-secondary" role="button">Batal</a>
					</div>
					<div class="col-sm-8">
					</div>
					<div class="col-sm-2">
						<button type="submit" class="btn btn-primary">Kirim</button>
					</div>
				</div>
									
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script src="<?php echo base_url()?>assets/theme/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {	

	$("#jenis").change(function () {
		var vJenis = this.value;
		
		$.ajax({
			url:'<?php echo base_url()?>welcome/ajax_quiz',
			method: 'post',
			data: {jenis: vJenis},
			dataType: 'json',
			success: function(res){
				// console.log(res);
				$("#isi").html(res);
				$("#pertanyaan").css("display","block");
			}
		});
  });
	
});
</script>