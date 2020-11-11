<div class="content">
  <div class="row">
    <div class="col-md-12">
      <!-- <div class="card"> -->
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Daftar Hasil Skrining</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-striped table-bordered" style="width:100%;font-size:13px;" id="tabelHSkrining">
              <thead class=" text-primary" align="center">
                <th>
                  No
                </th>
                <th>
                  Waktu
                </th>
                <th>
                  Kode
                </th>
                <th>
                  Nama
                </th>
                <th>
                  Telp
                </th>
                <th>
                  Hasil
                </th>
                <th>
                  Tgl Lahir
                </th>
                <th>
                  Usia
                </th>
                <th>
                  Jenis User
                </th>
                <th>
                  Riwayat Penyakit
                </th>
                <th>
                  Tujuan Ke
                </th>
                <th>
                  Q1
                </th>
                <th>
                  Q2
                </th>
                <th>
                  Q3
                </th>
                <th>
                  Q4
                </th>
                <th>
                  Q5
                </th>
                <th>
                  Q6
                </th>
                <th>
                  Q7
                </th>
                <th>
                  Q8
                </th>
                <th>
                  Q9
                </th>
                <th>
                  Q10
                </th>
                <th>
                  Q11
                </th>
                <th>
                  Q12
                </th>
                <th>
                  Q13
                </th>

              </thead>
              <tbody>

              </tbody>
                  </table>
                </div>
                <?php $this->load->view('admin/pencarian_modal') ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.11/css/jquery.dataTables.min.css">
      <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
      <!-- https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css -->
<!-- https://cdn.datatables.net/buttons/1.6.4/css/buttons.dataTables.min.css -->
<!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script> -->

<script type="text/javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<!--
<script type="text/javascript">
    $(document).ready(function() {
    table = $('#tabelHSkrining').DataTable({
        "dom": 'B<"top"i>rt<"bottom"flp><"clear">',
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url" : "<?php echo base_url(); ?>skrining/get_hasil_skrining",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

});
</script> -->
<script>
 $('#tabelHSkrining').DataTable({
        "ajax": {
            url : "<?php echo base_url(); ?>skrining/get_hasil_skrining",
            type : 'GET'
        },
    });
 // $(document).ready(function() {
 //
 //     var dataTable1 = $('#tabelHSkrining').DataTable({
 //        "ajax":{
 //               url:"<?php echo base_url(); ?>skrining/get_hasil_skrining",
 //               type:"POST"
 //          },
 //         dom: 'Bfrtip',
 //         buttons: [
 //             'copy', 'csv', 'excel', 'pdf', 'print', 'colvis'
 //         ]
 //     } );
 //
 // } );
</script>
