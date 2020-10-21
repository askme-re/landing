<div class="content">
  <div class="row">
    <div class="col-md-12">
            <!-- <div class="card"> -->
      <?php if($this->session->flashdata('msg')): ?>
        <p><?php echo $this->session->flashdata('msg'); ?></p>
      <?php endif; ?>
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Pengguna</h4>
        </div>
      <div class="card-body">
        
        <div class="table-responsive">
          <table class="table" id="tabelPengguna">
            <thead class=" text-primary">
              <th> No </th>
              <th> Nama </th>
              <th> Jenis Pengguna </th>
              <th> Telp/HP </th>
              <th> Riwayat Penyakit</th>
            </thead>
            <tbody>
             
            </tbody>
          </table>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="http://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>


<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script> -->
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script> -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script> -->


<script>
 $('#tabelPengguna').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>index.php/user/get_pengguna",
            type : 'GET'
        },
});
// var table = $('#tabelPengguna').DataTable({
//     serverSide: true,
//     ajax: {
//             url : "<?php echo base_url(); ?>user/get_pengguna",
//             type : 'GET'
//         },
//     lengthMenu: [[10, 100, -1], [10, 100, "All"]],
//     pageLength: 10,
//     buttons: [
//         {
//             extend: 'excel',
//             text: '<span class="fa fa-file-excel-o"></span> Excel Export',
//             exportOptions: {
//                 modifier: {
//                     search: 'applied',
//                     order: 'applied'
//                 }
//             }
//         }
//     ],
//     // other options
// });
</script>