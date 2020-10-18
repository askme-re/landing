<p>
  <button class="btn btn-fill btn-warning btn-wd" type="button" data-toggle="collapse" data-target="#collapsePencarian" aria-expanded="false" aria-controls="collapseExample">
    Filter XLS</button>
</p>
<div class="collapse" id="collapsePencarian">
  <div class="panel panel-primary panel-body">
    <form method="POST" action="<?php echo base_url('skrining/exp_skrining') ?>" class="form-inline">
      <div class="form-group">
		<label class="col-form-label">Status :</label>
		 	<select style="min-height:40px" class="form-control" id="dd_status" name="dd_status">
				<option value="" selected="selected" disabled >Pilihan</option>
				<option value="Pasien">Pasien</option>
				<option value="Pengunjung">Pengunjung</option>
				<option value="Pegawai">Pegawai</option>
			</select>
		</div>
      <div class="form-group">
        <label>Kata Kunci</label>
        <input style="min-height:40px" name="keyword" id="keyword" type="text" class="form-control" placeholder="Ex: Jakarta" />
      </div>
      <div class="form-group">
        <label>Tanggal </label>
        <input style="min-height:40px" name="tgl_lahir" id="tgl" type="text" class="form-control" placeholder="DD/MM/YYYY" />
      </div>
      <button type="submit" class="form-control btn-primary">Unduh</button>
    </form>
  </div>
</div>