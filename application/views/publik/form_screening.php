<script type="text/javascript" src="<?php echo base_url();?>assets/js/kustom.js"></script>-->
<form role="form" id="formfield" action="inc/Controller/OperatorController.php" method="post"  enctype="multipart/form-data" onsubmit="return validateForm();">
<input type="hidden" name="action" value="add_form" /> 


          <div class="row">
          <label class="col-sm-3 col-form-label">Golongan Klien</label>
          <div class="col-sm-9">
            <div class="form-group">
              <select id="institusi" name="institusi" class="form-control">
                <div class="filter-option-inner">
                  <option disabled> Pilih jenis institusi</option>
                  <option value="2">ya</option>
                  <option value="0">Organisasi Besar</option>
                </div>
              </select>
            </div>
          </div>
          </div>



       <div class="form-group">
         <label>Nama Lengkap</label><span class="label label-danger">*wajib</span>
         <input class="form-control" placeholder="Masukan Nama Lengkap" name="name" id="name">
       </div>

        <div class="form-group">
          <label>Tanggal Lahir</label><span class="label label-danger">*wajib</span>
          <input class="form-control" placeholder="DD-MM-YYYY" name="dob" id="dob">
       </div>
       <div class="form-group">
        <label><?php echo "Pilih jenis Skreening" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="jenisinfeksi" value="20" id="infeksi">
            Malaria
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="jenisinfeksi" value="90" id="infeksi" checked>
            Covid
          </label>
          </div>
       </div>
       <!-- pertanyaan 1 -->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah saat ini anda merasa demam atau riwayat demam (Dewasa jika suhu ≥ 38O C, anak jika suhu ≥ 37,5OC" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid1" value="2" id="covid1">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid1" value="0" id="covid1">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 2 -->
       <div class="form-group">
        <label><?php echo "dalam 14 hari terakhir, Apakah anda mengalami batuk?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid2" value="2" id="covid2">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid2" value="0" id="covid2">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 3-->
       <div class="form-group">
        <label><?php echo "dalam 14 hari terakhir, Apakah anda mengalami pilek atau hidung tersumbat?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid3" value="2" id="covid3">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid3" value="0" id="covid3">
            Tidak
          </label>
          </div>
       </div>
        <!-- pertanyaan 4 -->
       <div class="form-group">
        <label><?php echo "dalam 14 hari terakhir, Apakah anda mengalami sesak atau kesulitan" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid4" value="2" id="covid4">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid4" value="0" id="covid4">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 5 -->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda mengalami nyeri tenggorokan atau kesulitan menelan?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid5" value="2" id="covid5">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid5" value="0" id="covid5">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 6-->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda mengalami diare?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid6" value="2" id="covid6">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid6" value="0" id="covid6">
            Tidak
          </label>
          </div>
       </div>
 <!-- pertanyaan 7 -->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda mengalami gangguan pada penciuman and atau sulit untuk membau (Anosmia)?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid7" value="6" id="covid7">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid7" value="0" id="covid7"checked>
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 8 -->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda mengalami gangguan pada indera perasa atau pengecapan anda (dysgeusia)" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid8" value="6" id="covid8">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid8" value="0" id="covid8">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 9-->
       <div class="form-group">
        <label><?php echo "dalam 14 hari terakhir, Apakah anda mengalami sakit kepala" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid9" value="1" id="covid9">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid9" value="0" id="covid9">
            Tidak
          </label>
          </div>
       </div>

        <!-- pertanyaan 10 -->
       <div class="form-group">
        <label><?php echo "dalam 14 hari terakhir, Apakah anda mengalami kelemahan atau merasa lemas?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid10" value="1" id="covid10">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid10" value="0" id="covid10">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 11 -->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda mengalami nyeri otot?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid11" value="1" id="covid11">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid11" value="0" id="covid11">
            Tidak
          </label>
          </div>
       </div>
              <!-- pertanyaan 12-->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhir, Apakah anda pernah kontak/sentuhan dengan pasien positif atau probabel COVID 19 dengan radius 1 meter selama 15 menit?
Melakukan kontak fisik, atau berada dalam satu ruangan, atau berkunjung (berada dalam radius 1 meter dengan kasus pasien dalam pengawasan, probable atau konfirmasi) dalam 2 hari sebelum kasus timbul gejala dan hingga 14 hari setelah kasus timbul gejala" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid12" value="6" id="covid12">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid12" value="0" id="covid12">
            Tidak
          </label>
          </div>
       </div>

                     <!-- pertanyaan 13-->
       <div class="form-group">
        <label><?php echo "Dalam 14 hari terakhirApakah anda pernah berkunjung atau tinggal di negara/ daerah sudah terjadi penyebaran COVID 19?" ?></label>
          <div class="radio">
          <label>
            <input type="radio" name="covid13" value="2" id="covid13">
            Ya
          </label>
          </div>
          <div class="radio">
          <label>
            <input type="radio" name="covid13" value="0" id="covid13">
            Tidak
          </label>
          </div>
       </div>


           <input type="button" name="btn" value="Submit" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
  <input type="button" name="btn" value="Reset" onclick="window.location=''" class="btn btn-default" data-modal-type="confirm"/>
</form>

<div class="modal fade" id="confirm-submit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Konfirmasi
            </div>
            <div class="modal-body">
                Are you sure you want to submit the following details?
                <table class="table">
                    <tr>
                        <th>Nama</th>
                        <td id="fname"></td>
                    </tr>
                    <tr>
                        <th>Tangal Lahir</th>
                        <td id="fdob"></td>
                    </tr>
                    <tr>
                        <th>Jenis</th>
                        <td id="fjenis"></td>
                    </tr>
                    <tr>
                        <th>Q1</th>
                        <td id="fcovid1"></td>
                    </tr>
                    <tr>
                        <th>Q2</th>
                        <td id="fcovid2"></td>
                    </tr>
                    <tr>
                        <th>Q3</th>
                        <td id="fcovid3"></td>
                    </tr>
                    <tr>
                        <th>Q4</th>
                        <td id="fcovid4"></td>
                    </tr>
                    <tr>
                        <th>Q5</th>
                        <td id="fcovid5"></td>
                    </tr>
				    <th>Q6</th>
                        <td id="fcovid6"></td>
                    </tr>
                    <tr>
                        <th>Q7</th>
                        <td id="fcovid7"></td>
                    </tr>
                    <tr>
                        <th>Q8</th>
                        <td id="fcovid8"></td>
                    </tr>
                    <tr>
                        <th>Q9</th>
                        <td id="fcovid9"></td>
                    </tr>
                    <tr>
                        <th>10</th>
                        <td id="fcovid10"></td>
                    </tr>
                    <tr>
                        <th>Q11</th>
                        <td id="fcovid11"></td>
                    </tr>
                    <tr>
                        <th>Q12</th>
                        <td id="fcovid12"></td>
                    </tr>
                    <tr>
                        <th>Q13</th>
                        <td id="fcovid13"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="#" id="submit" class="btn btn-success success">Submit</a>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
var infeksi = document.getElementById('infeksi').value;

	$('#submitBtn').click(function() {
     $('#fname').text($('#name').val());
     $('#fdob').text($('#dob').val());
//      if (document.getElementById('infeksi').checked) {
//   rate_value = document.getElementById('infeksi').value;
// }
     $('#fjenis').text($('#institusi').val());
     $('#fcovid1').text($('#covid1').val());
     $('#fcovid2').text($('#covid2').val());
     $('#fcovid3').text($('#covid3').val());
     $('#fcovid4').text($('#covid4').val());
     $('#fcovid5').text($('#covid5').val());
     $('#fcovid6').text($('#covid6').val());
     $('#fcovid7').text($('#covid7').val());
     $('#fcovid8').text($('#covid8').val());
     $('#fcovid9').text($('#covid9').val());
     $('#fcovid10').text($('#covid10').val());
     $('#fcovid11').text($('#covid11').val());
     $('#fcovid12').text($('#covid12').val());
     $('#fcovid13').text($('#covid13').val());

});



$('#submit').click(function(){
    alert('submitting');
    $('#formfield').submit();
});
</script>
<!-- 
<div id="contact">
    <button type="button" class="btn btn-info btn" data-toggle="modal" data-target="#contact-modal">Tampilkan Form</button>
    </div>
    <div id="contact-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <a class="close" data-dismiss="modal">×</a>
                    <h3>Form Kontak</h3>
                </div>
                <form id="contactForm" name="contact" role="form">
                    <div class="modal-body">                
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" class="form-control"></textarea>
                        </div>                    
                    </div>
                    <div class="modal-footer">                    
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" id="submit">
                    </div>
                </form>
            </div>
        </div>
    </div>     