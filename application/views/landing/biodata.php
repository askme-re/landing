<div class="site-section pt-8" id="features-section">
  <div class="container">
    <!-- <div class="row justify-content-center ">
      <div class="col-lg-10">
        <div class="mb-8"> -->
          <div class="panel" >
            <div class="panel-header text-center" style="padding-top:40px;">
              <h4 class="panel-title">Pengisian Data Diri</h4>
            </div>
            <div class="panel-body">
              <form method="POST" action="<?php echo base_url().'welcome/biodata_save'?>">
				<!-- <input type="text" name="id" style="display:none" value="<?php echo $user->id; ?>"/> -->

                <div class="form-row col-12">
                  <div class="form-group col-sm-12">
                    <label >Nama Lengkap </label>
                    <input name="nama" id="nama" type="text" minlength="2" class="form-control" placeholder="Contoh: Andrew Setiawan" required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Tempat Lahir </label>
                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Contoh: Jakarta" required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Tanggal Lahir </label>
                    <select name="tgl" id="tgl" class="form-control" required>
                      <option value="" selected="selected" disabled> Pilih Tanggal </option>
                      <?php for ($i=1; $i < 32; $i++) { ?>
                        <option value="<?php echo $i ?>">
                          <?php echo $i ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Bulan Lahir </label>
                    <select name="bulan" id="bulan" class="form-control" required>
                      <option value="" selected="selected" disabled> Pilih Bulan </option>
                      <?php for ($i=1; $i < 13; $i++) { ?>
                        <option value="<?php echo $i ?>">
                          <?php echo $i ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Tahun Lahir </label>
                    <?php $thn = date("Y");
                    $min = $thn-100;?>
                    <select name="tahun" id="tahun" class="form-control" required>
                      <option selected="selected" value="" disabled> Pilih Tahun </option>
                      <?php for ($i=$min; $i <= $thn; $i=$i+1) { ?>
                        <option value="<?php echo $i ?>">
                          <?php echo $i ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                  <!-- <div class="form-group col-sm-6">
                    <label>Tanggal Lahir </label>
                    <input name="tgl_lahir" id="tgl_lahir" type="date" class="form-control" placeholder="DD/MM/YYYY" required/>
                  </div> -->
                  <div class="form-group col-sm-12">
                    <label>Alamat Domisili</label>
                    <input name="alamat" id="alamat" type="text" class="form-control" minlength="2"placeholder="Contoh: Jalan ... RT/RW ..." required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Provinsi </label>
                    <select name="prov" id="prov" class="form-control" required>
                        <option value="" selected="selected"> Piih Provinsi </option>;
                      <?php
                        foreach($prov as $v){
                          echo '<option value="'.$v->k.'">'.$v->v.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kabupaten/Kota </label>
                    <select name="kab" id="kab" class="form-control" required>
                      <option value="" selected="selected"> Piih Kabupaten/Kota </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kecamatan </label>
                    <select name="kec" id="kec" class="form-control" required>
                      <option value="" selected="selected"> Piih Kecamatan </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Desa/Kelurahan </label>
                    <select name="kel" id="kel" class="form-control" required>
                      <option value="" selected="selected"> Piih Desa/Kelurahan </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Email <small>(Tidak wajib)</small></label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="Contoh: andrew@mail.com">
                  </div>
                  <div class="form-group col-sm-6">
                    <label>No Handphone </label>
                    <input name="telp" id="telp" type="tel" maxlength="13" minlength="9" class="form-control" placeholder="Contoh: 0832932932399" required>
                  </div>

                  <!-- data tambahan -->
                  <div class="form-group col-sm-6">
          					<label class="col-form-label">Status Kunjungan:</label>
          					<select class="form-control" id="dd_status" name="dd_status" required>
          						<option value="" selected="selected" disabled >Pilih Salah Satu</option>
          						<option value="Pasien">Pasien</option>
          						<option value="Pengunjung">Pengunjung</option>
          						<option value="Pegawai RS">Pegawai RS</option>
          					</select>
          				</div>
          				<div class="form-group col-sm-6">
          				<label class="col-form-label">Tujuan Kunjungan:</label>
          				<select class="form-control" id="dd_tujuan" name="dd_tujuan" required>
          					<option value="" selected="selected" disabled >Pilih Salah Satu</option>
          					<option value="Rawat Jalan (Poliklinik)">Rawat Jalan (Poliklinik)</option>
          					<option value="Rawat Inap">Rawat Inap</option>
          					<option value="Laboratorium">Laboratorium</option>
          					<option value="Farmasi">Farmasi</option>
          					<option value="Radiologi">Radiologi</option>
          					<option value="Administrasi RS (Admin Ranap, BPJS, dll)">Administrasi RS (Admin Ranap, BPJS, dll)</option>
          					<option value="Manajemen RS (Jajaran pimpinan, pengadaan dll)">Manajemen RS (Jajaran pimpinan, pengadaan dll)</option>
          					<option value="Rehab Medik (Terapi)">Rehab Medik (Terapi)</option>
          				</select>
          				</div>

          				<div class="form-group col-sm-12">
          					<label class="col-form-label">Riwayat Penyakit Serius:</label>
          				</div>
          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_1" name="cb_tujuan[]" value="Kencing Manis (diabetes)" >
          						<label class="custom-control-label" for="cb_tujuan_1">Kencing Manis (diabetes)</label>
          					</div>
          				</div>
          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_2" name="cb_tujuan[]" value="Tekanan Darah Tinggi (Hipertensi)" >
          						<label class="custom-control-label" for="cb_tujuan_2">Tekanan Darah Tinggi (Hipertensi)</label>
          					</div>
          				</div>

          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_3" name="cb_tujuan[]" value="Penyakit Kanker" >
          						<label class="custom-control-label" for="cb_tujuan_3">Penyakit Kanker</label>
          					</div>
          				</div>

          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_4" name="cb_tujuan[]" value="Penyakit Ginjal" >
          						<label class="custom-control-label" for="cb_tujuan_4">Penyakit Ginjal</label>
          					</div>
          				</div>

          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_5" name="cb_tujuan[]" value="Penyakit Lupus" >
          						<label class="custom-control-label" for="cb_tujuan_5">Penyakit Lupus</label>
          					</div>
          				</div>

          				<div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_6" name="cb_tujuan[]" value="Penyakit Saraf " >
          						<label class="custom-control-label" for="cb_tujuan_6">Penyakit Saraf </label>
          					</div>
          				</div>
                        <div class="form-group col-sm-6">
          					<div class="custom-control custom-checkbox">
          						<input type="checkbox" class="custom-control-input" id="cb_tujuan_7" name="cb_tujuan[]" value="Tidak ada " autofocus>
          						<label class="custom-control-label" for="cb_tujuan_7">Tidak Ada </label>
          					</div>
          				</div>
                  <!-- data tambahan -->
                  <hr>
                  <br/>
                  <div class="form-group col-sm-12 row" style="margin-top: 15px;">
                    <div class="col-sm-2">
					<a href="<?php echo base_url()?>landing" class="btn btn-secondary" role="button">Batal</a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary" id="btn_next">Lanjut</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        <!-- </div>
      </div>
    </div>-->
  <!-- </div> -->
</div>


<script src="<?php echo base_url()?>assets/theme/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
	$("#jenis").change(function () {
        var vJenis = this.value;

		$.ajax({
			url:'ajax_quiz',
			method: 'post',
			data: {jenis: vJenis},
			dataType: 'json',
			success: function(res){
				$("#isi").html(res);
				$("#pertanyaan").css("display","block");
			}
		});
    });

	$("#cinta").click(function(){
	var vNama = $('#nama').val();
	console.log("ini kalo kel" + vNama);
	});

  $("#btn_next").click(function(){
		var vNama = $('#nama').val();
		var vTempatLahir = $('#tempat_lahir').val();
		var vTglLahir = $('#tgl_lahir').val();
		var vAlamat = $('#alamat').val();
		var vProv = $('#prov').val();
		var vKab = $('#kab').val();
		var vKec = $('#kec').val();
		var vKel = $('#kel').val();
		var vTelp = $('#telp').val();
		var vEmail = $('#email').val();

		 if(vProv == 0){
			 alert("Provinsi tidak boleh kosong!");
			 $('#prov').focus();
			 return false;
		 }

		 if(vKab == 0){
			 alert("Kabupaten/Kota tidak boleh kosong!");
			 $('#kab').focus();
			 return false;
		 }

		 if(vKec == 0){
			 alert("Kecamatan tidak boleh kosong!");
			 $('#kec').focus();
			 return false;
		 }

		 if(vKel == 0){
		 alert("Desa/Kelurahan tidak boleh kosong!");
			 $('#kel').focus();
			 return false;
		 }
		 // console.log(vNama + vProv);
		// return false;

  });


  // Dropdown Ajax
	$('#prov').change(function() {
		var selGroup = $(this).val();
		 console.log(selGroup);

		 if(selGroup==0){
			 alert("Pilih Provinsi");
			 return false;
		 }

		 $.ajax({
			 url:'<?php echo base_url()?>welcome/ajax_kab',
			 method: 'post',
			data: {id: selGroup},
			dataType: 'json',
			success: function(res){
				 if(res.status == 1){
					 var option = "<option value='0'>Tentukan Kabupaten/Kota</option>";
					 var src = res.data;

					 if(src.length>0){
						 for(var i=0; i<src.length; i++){
							 var id = src[i].k;
							 var name = src[i].v;

							 option += "<option value='"+id+"'>"+name+"</option>";
						 }
           }

					 $("#kab").empty();
					 $("#kab").append(option);
				 }
			 }
		 });
  });


	$('#kab').change(function() {
		var selGroup = $(this).val();
		 console.log(selGroup);

		 if(selGroup==0){
			 alert("Tentukan Kabupaten/Kota");
			 return false;
		 }

		 $.ajax({
			 url:'<?php echo base_url()?>welcome/ajax_kec',
			 method: 'post',
			data: {id: selGroup},
			dataType: 'json',
			success: function(res){
				 if(res.status == 1){
					 var option = "<option value='0'>Tentukan Kecamatan</option>";
					 var src = res.data;

					 if(src.length>0){
						 for(var i=0; i<src.length; i++){
							 var id = src[i].k;
							 var name = src[i].v;

							 option += "<option value='"+id+"'>"+name+"</option>";
						 }
           }

					 $("#kec").empty();
					 $("#kec").append(option);
				 }
			 }
		 });
  });


	$('#kec').change(function() {
		var selGroup = $(this).val();
		 console.log(selGroup);

		 if(selGroup==0){
			 alert("Tentukan Kecamatan");
			 return false;
		 }

		 $.ajax({
			 url:'<?php echo base_url()?>welcome/ajax_kel',
			 method: 'post',
			data: {id: selGroup},
			dataType: 'json',
			success: function(res){
				 if(res.status == 1){
					 var option = "<option value='0'>Tentukan Desa/Kelurahan</option>";
					 var src = res.data;

					 if(src.length>0){
						 for(var i=0; i<src.length; i++){
							 var id = src[i].k;
							 var name = src[i].v;

							 option += "<option value='"+id+"'>"+name+"</option>";
						 }
           }

					 $("#kel").empty();
					 $("#kel").append(option);
				 }
			 }
		 });
	});

});
</script>
