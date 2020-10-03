<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url();?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="<?php echo base_url();?>assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>ASK_ME</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">

	<!-- CSS Files -->
  <link href="<?php echo base_url();?>assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/gsdk-bootstrap-wizard.css" rel="stylesheet" />
	<link href="<?php echo base_url();?>assets/css/demo.css" rel="stylesheet" />
  <!--   Core JS Files   -->
  <script src="<?php echo base_url();?>assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/bootstrap.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url();?>assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

</head>

<body>
<div class="latar">
  <!--   Big container   -->
  <div class="container">
    <div class="row">
      <div class="col-sm-12">

        <!--      Wizard container        -->
        <div class="wizard-container">
          <div class="card wizard-card" data-color="theme" id="wizardProfile">
            <form method="POST" action="<?php echo base_url().'index.php/Welcome/quwa'?>" >
              <div class="wizard-header">
                <h3>
                  <b><a href="<?php echo base_url('');?>"> AKS_ME</a></b> Screening Kesehatan Anda <br>
                  <small>Isi formulir berikut sesuai keadaan Anda</small>
                </h3>
              </div>
						  <div class="wizard-navigation">
  							<ul>
                  <li><a href="#bio" data-toggle="tab">Data Diri</a></li>
				  <!--
                  <li><a href="#cluster" data-toggle="tab">Klaster</a></li>
				  -->
                  <li><a href="#quiz" data-toggle="tab">Screening</a></li>
                </ul>
						  </div>

              <div class="tab-content">
                <div class="tab-pane" id="bio">
                  <div class="row">
                    <h4 class="info-text"> Mari lengkapi data diri terlebih dahulu</h4>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label>Nama Lengkap <small>(wajib)</small></label>
                          <input name="nama" id="nama" type="text" class="form-control" placeholder="Contoh: Andrew Setiawan" required/>
                      </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="form-group">
                        <label>Tempat Lahir <small>(wajib)</small></label>
                        <input name="tempat_lahir" id="tempat_lahir" type="text" class="form-control" placeholder="Contoh: Jakarta" required/>
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Tanggal Lahir <small>(wajib)</small></label>
                        <input name="tgl_lahir" id="tgl_lahir" type="text" class="form-control" placeholder="DD/MM/YYYY" required/>
                      </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label>Alamat <small>(wajib)</small></label>
                        <input name="alamat" id="alamat" type="text" class="form-control" placeholder="Contoh: Jalan ... RT/RW ..." required/>
                      </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="form-group">
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
                    </div>
                    <div class="col-sm-5 ">
                      <div class="form-group">
                        <label>Kabupaten/Kota <small>(wajib)</small></label>
						<input name="kab" type="text" class="form-control" placeholder="Contoh: Jakarta Barat">
                      </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1">
                      <div class="form-group">
                        <label>Kecamatan <small>(wajib)</small></label>
						<input name="kec" type="text" class="form-control" placeholder="Contoh: Kalideres">
                      </div>
                    </div>
                    <div class="col-sm-5">
                      <div class="form-group">
                        <label>Desa/Kelurahan <small>(wajib)</small></label>
							<input name="kel" type="text" class="form-control" placeholder="Contoh: Tegal Alur">
                      </div>
                    </div>
                    <div class="col-sm-5 col-sm-offset-1"">
                      <div class="form-group">
                        <label>No. Telepon <small>(wajib)</small></label>
                        <input name="telp" id="telp" type="number" class="form-control" placeholder="Contoh: 08123456789">
                      </div>
                    </div>
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="form-group">
                        <label>Email <small>(wajib)</small></label>
                        <input name="email" id="email" type="email" class="form-control" placeholder="andrew@mail.com">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="tab-pane" id="cluster">
                  <h4 class="info-text"> Screening Apa yang ingin Anda lakukan? </h4>
                  <div class="row">
                    <div class="col-sm-10 col-sm-offset-1">
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="covid">
                          <div class="icon">
                            <i class="fa fa-pencil"></i>
                          </div>
                          <h6>COVID-19</h6>
                          </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="Malaria">
                          <div class="icon">
                            <i class="fa fa-terminal"></i>
                          </div>
                          <h6>Malaria</h6>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="Malaria">
                          <div class="icon">
                            <i class="fa fa-terminal"></i>
                          </div>
                          <h6>Malaria</h6>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="Malaria">
                          <div class="icon">
                            <i class="fa fa-terminal"></i>
                          </div>
                          <h6>Malaria</h6>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="Malaria">
                          <div class="icon">
                            <i class="fa fa-terminal"></i>
                          </div>
                          <h6>Malaria</h6>
                        </div>
                      </div>
                      <div class="col-sm-4">
                        <div class="choice" data-toggle="wizard-checkbox">
                          <input type="radio" name="jobb" value="Malaria">
                          <div class="icon">
                            <i class="fa fa-terminal"></i>
                          </div>
                          <h6>Malaria</h6>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="quiz">
				
				<h4 class="info-text">Screening Apa yang ingin Anda lakukan? </h4>
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
					   <div class="col-sm-12">
							<div class="form-group label-floating">
								<label class="control-label">Jenis Infeksi</label>
								<select class="form-control" id="jenis" name="jenis">
									<option disabled="" selected=""></option>
									<option value="1"> COVID-19 </option>
									<option value="2"> Malaria </option>
									<option value="3"> Demam Berdarah </option>
								</select>
							</div>
						</div>
					   <div class="col-sm-12" id="pertanyaan" style="display: none;">
						<div class="row" >
							<div class="col-sm-12">
							  <h4 class="info-text"> Bagaimana keadaan Anda saat ini?</h4>
							</div>
							<div class="col-sm-12" id="isi">
							
							</div>
						</div>
						
					</div>
				  </div>
                </div>
              </div>
              <div class="wizard-footer height-wizard">
                <div class="pull-right">
                  <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' id="btn_next" value='Selanjutnya' />
									
                  <!--<input type='submit' onClick="$('#createFormId').modal('show')" data-toggle="modal" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />-->
									
                  <input type='submit' id="btn_submit" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Finish' />
                </div>
                <div class="pull-left">
                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Sebelumnya' />
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
        </div> <!-- wizard container -->
      </div>
    </div><!-- end row -->
  </div> <!--  big container -->
<!-- ini untk pengecekan -->


<script type="text/javascript">
$(document).ready(function() {
	$('#prov').change(function() {
		var selGroup = $(this).val();
		 console.log(selGroup);
		
		 if(selGroup==0){
			 alert("Pilih Provinsi");
			 return false;
		 }
		
		 $.ajax({
			 url:'ajax_kab',
			 method: 'post',
			data: {id: selGroup},
			dataType: 'json',
			success: function(res){
				 if(res.status == 1){
					 var option = "<option value='0'>Pilih Kabupaten/Kota</option>";
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
		
		 if(vEmail === "" || vEmail === " "){
			 alert("Email tidak boleh kosong!");
			 $('#email').focus();
			return false;
		 }
		
		 console.log(vNama + vProv);
		// return false;

  }); 
	
});
</script>