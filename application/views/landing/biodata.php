

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
              <form method="POST" action="<?php echo base_url().'landing/biodata_save'?>">
								
								<input type="text" name="id" style="display:none" value="<?php echo $user->id; ?>"/>
							
                <div class="form-row col-12">
                  <div class="form-group col-sm-12">
                    <label >Nama Lengkap <small>(wajib)</small></label>
                    <input name="nama" id="nama" type="text" class="form-control" placeholder="Contoh: Andrew Setiawan" required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Tempat Lahir <small>(wajib)</small></label>
                    <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Contoh: Jakarta" required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Tanggal Lahir <small>(wajib)</small></label>
                    <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control" placeholder="DD/MM/YYYY" required/>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Alamat <small>(wajib)</small></label>
                    <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Contoh: Jalan ... RT/RW ..." required/>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Provinsi <small>(wajib)</small></label>
                    <select name="prov" id="prov" class="form-control">
                        <option value="0"> Piih Provinsi </option>;
                      <?php 
                        foreach($prov as $v){
                          echo '<option value="'.$v->k.'">'.$v->v.'</option>';
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kabupaten/Kota <small>(wajib)</small></label>
                    <select name="kab" id="kab" class="form-control">
                      <option value="0"> Piih Kabupaten/Kota </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Kecamatan <small>(wajib)</small></label>
                    <select name="kec" id="kec" class="form-control">
                      <option value="0"> Piih Kecamatan </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-6">
                    <label>Desa/Kelurahan <small>(wajib)</small></label>
                    <select name="kel" id="kel" class="form-control">
                      <option value="0"> Piih Desa/Kelurahan </option>
                    </select>
                  </div>
                  <div class="form-group col-sm-12">
                    <label>Email</label>
                    <input name="email" id="email" type="email" class="form-control" placeholder="andrew@mail.com">
                  </div>
                  <div class="form-group col-sm-12">
                    <label>No. Telepon <small>(wajib)</small></label>
                    <input name="telp" id="telp" type="text" class="form-control" value="<?php echo $user->telp; ?>" readonly>
                  </div>
                  <hr>
                  <br/>
                  <div class="form-group col-sm-12 row" style="margin-top: 15px;">
                    <div class="col-sm-2">
					<a href="<?php echo base_url()?>landing" class="btn btn-secondary" role="button">Batal</a>
                    </div>
                    <div class="col-sm-8">
                    </div>
                    <div class="col-sm-2">
                      <button type="submit" class="btn btn-primary">Selanjutnya</button>
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
			url:'ajax_quiz',
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
		
		 if(vTelp === "" || vTelp === " "){
			 alert("No. Telepon tidak boleh kosong!");
			 $('#telp').focus();
			 return false;
		 }
		
		 console.log(vNama + vProv);
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