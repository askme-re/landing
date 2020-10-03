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
          <h4 class="card-title">Pertanyaan : <?php echo $setelan->pertanyaan;?></h4>
				<form method="post" action="<?php echo base_url().'index.php/Admin/updateskor' ?>" class="form-horizontal">
	          		<div class="row">
	          		  <div class="col-sm-8 col-sm-offset-2">
		          		  <input type="hidden" name="id" class="form-control" value="<?php echo $setelan->id;?>">
		          		  <div class="form-group">
		          		  <label>JAwaban : <?php echo $setelan->pilihan;  ?> </label>
		          		    <input type="text" name="bobot1" class="form-control" value="<?php echo $setelan->bobot1;?>">
		          		  </div>
		          		  <div class="form-group">
		          		  <label>JAwaban : <?php echo $setelan->pilihan2;  ?> </label>
		          		    <input type="text" name="bobot2" class="form-control" value="<?php echo $setelan->bobot2;?>">
		          		  </div>
	          		  </div>
		          		<div class="col-sm-3">
		          			<button type="submit" class="btn btn-default btn-sm" style="vertical-align:super;">Ubah Skor Jawban</button>
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