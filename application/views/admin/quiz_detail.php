<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
        </div>
      <div class="card-body">	
	<?php 

	#if($datapertanyaan->num_rows() > 0):
					foreach($datapertanyaan as $setelan): 
						?>
				<form method="post" action="<?php echo base_url().'index.php/Admin/updatequiz' ?>" class="form-horizontal">
	          		<div class="row">
	          		  <div class="col-sm-8 col-sm-offset-2">
		          		  <input type="hidden" name="id" class="form-control" value="<?php echo $setelan->id;?>">
		          		  <div class="form-group">
	          		  		<label>Pertanyaan: </label>
		          		    <input type="text" name="pertanyaan" class="form-control" value="<?php echo $setelan->pertanyaan;?>">
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Pilihan Jawaban ke-1 </label>
		          		    <input type="text" name="pilihan" class="form-control" value="<?php echo $setelan->pilihan;?>">
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Pilihan Jawaban ke-2 </label>
		          		    <input type="text" name="pilihan2" class="form-control" value="<?php echo $setelan->pilihan2;?>">
		          		  </div>
	          		  </div>
		          		<div class="col-sm-3">
		          			<button type="submit" class="btn btn-default btn-sm" style="vertical-align:super;">Ubah Pertanyaan </button>
		          		</div>
	          		</div>
	          		</div>
				</form>
			 <?php endforeach; ?>
	              
           	  </div>
         </div>
    </div>
</div>
</div>