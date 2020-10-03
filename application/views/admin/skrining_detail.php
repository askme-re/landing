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
					foreach($datascreening as $result): 
						?>
				<!-- <form method="post" action="<?php echo base_url().'index.php/Admin/updatequiz' ?>" class="form-horizontal"> -->
	          		<div class="row">
	          		  <div class="col-sm-8 col-sm-offset-2">
		          		  <input type="hidden" name="id" class="form-control" value="<?php echo $result->id;?>">
		          		  <div class="form-group">
	          		  		<label>Nama: </label>
		          		    <input type="text" name="pertanyaan" class="form-control" value="<?php echo $result->nama;?>" dis>
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Kode Antrian </label>
		          		    <input type="text" name="pilihan" class="form-control" value="<?php echo $result->kode;?>">
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Tanggal </label>
		          		    <input type="text" name="pilihan" class="form-control" value="<?php echo $result->pertanyaan;?>">
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Hasil Screening</label>
		          		    <input type="text" name="pilihan2" class="form-control" value="<?php echo $result->nilai;?>">
		          		  </div>
		          		  <div class="form-group">
	          		  		<label>Hasil Pertanyaan</label>
		          		    <input type="text" name="pilihan2" class="form-control" value="<?php echo $result->nilai;?>">
		          		  </div>
	          		  </div>
		          		<div class="col-sm-3">
		          			<button type="submit" class="btn btn-default btn-sm" style="vertical-align:super;" href="<?php echo base_url().'index.php/Admin/Skrinning' ?>">Kembali </button>
		          		</div>
	          		</div>
	          		</div>
				<!-- </form> -->
			 <?php endforeach; ?>
	              
           	  </div>
         </div>
    </div>
</div>
</div>