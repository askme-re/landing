<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title;?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css"/>
    <noscript>


  </head>

  <body>

  <div class="container">
  <h3>Crud Edit & Delete</h3><hr/>
<div id="info"></div>
   <div class="table-responsive">
     <table id="user_data" class="table table-striped table-bordered" style="width:100%">
      <thead>
           <tr>
                <th>NO</th>
                 <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Action</th>
           </tr>
      </thead>
        </table>
      </div>
  </div>

    <div id="userModal" class="modal fade">
      <div class="modal-dialog">

       <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Edit Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
          <div class="modal-body">

           <?php echo form_open('home/updata', 'id="mydata1" '); ?>
            <div class="form-group">
              <input type="text" class="form-control" name="nim" id="nim" placeholder="Enter NIM" readonly/>
            </div>
              <div class="form-group">
              <input type="text" class="form-control" name="nama" id="nama" placeholder="Enter Nama">
              <small id="NamaHelp" class="form-text text-muted">Masukan nama lengkap anda.</small>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

    </div>
</div>

  <!-- Javascripts-->
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <!-- <script src="<?php echo base_url();?>asset/bootbox.min.js"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <!-- <script src="<?php echo base_url();?>asset/custom.js"></script> -->

    <script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
<script>
 // $('#tabelHSkrining').DataTable({
 //        "ajax": {
 //            url : "<?php echo base_url(); ?>skrining/get_hasil_skrining",
 //            type : 'GET'
 //        },
 //    });
 $(document).ready(function() {

     var dataTable1 = $('#userdata').DataTable({
        "ajax":{
               url:"<?php echo base_url(); ?>skrining/get_hasil_skrining",
               type:"POST"
          },
         dom: 'Bfrtip',
         buttons: [
             'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
         ]
     } );

 } );
</script>
</body>
</html>
