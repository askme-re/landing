


<div class="site-section pt-8" id="features-section">
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-lg-10">
        <div class="mb-8">
          <div class="card">
            <div class="card-header text-center">
              <h4 class="card-title">Input Data Peserta Skrining</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?php echo base_url().'index.php/landing/screening_save'?>">
								
								<input type="text" name="id" style="display:none" value="<?php $user_id; ?>"/>
								
                <div class="form-row col-12">
                  <div class="form-group col-sm-12">
                    <label class="control-label">Jenis Infeksi</label>
										<select class="form-control" id="jenis" name="jenis">
											<option disabled="" selected="true">Pilih salah satu</option>
											<option value="1"> COVID-19 </option>
											<option value="2"> Malaria </option>
											<option value="3"> Demam Berdarah </option>
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
											<a href="<?php echo base_url()?>index.php/landing" class="btn btn-secondary" role="button">Cancel</a>
										</div>
										<div class="col-sm-8">
										</div>
										<div class="col-sm-2">
											<button type="submit" class="btn btn-primary">Submit</button>
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
			url:'<?php echo base_url()?>/index.php/landing/ajax_quiz',
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