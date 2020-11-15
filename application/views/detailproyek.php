<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Percobaan</title>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.3.1/css/buttons.dataTables.min.css"/>
    </head>

<body>
    <div class="container">
        <h1 style="font-size:20pt">percobaan</h1>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title" >Custom Filter : </h3>
            </div>
            <div class="panel-body">
                <form id="form-filter" class="form-horizontal">
                    <div class="form-group">
                      <label for="FirstName" class="col-sm-2 control-label">pertanyaan</label>
                      <div class="col-sm-4">
                          <input type="text" class="form-control" id="id">
                      </div>
                    </div>
                    <div class="form-group">
                        <label for="FirstName" class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="description">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="FirstName" class="col-sm-2 control-label">Pertan</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="pertanyaan">
                        </div>
                    </div>
                    <button type="button" id="btn-filter" class="btn btn-primary">Filter</button>
              </form>
            </div>
        </div>
        <table id="table" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <!-- <th> No </th> -->
                  <th width="300px"> Jenis Penyakit Menular </th>
                  <th width="300px"> Keterangan </th>
                  <th> Aksi </th>
                  <th> Aksi </th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                  <!-- <th> No </th> -->
                  <th> Jenis Penyakit Menular </th>
                  <th> Keterangan </th>
                  <th> Aksi </th>
                  <th> Aksi </th>
                </tr>
            </tfoot>
        </table>
    </div>




    <script src="https://code.jquery.com/jquery-2.2.3.min.js" ></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.22/datatables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.flash.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.27/build/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.3.1/js/buttons.print.min.js"></script>



<script type="text/javascript">

// var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({
        "dom": 'Bfrtip',
        "buttons": [
        'csv', 'excel', 'pdf', 'print'
      ],
        "info":false,
        "searching":false,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url" : "<?php echo base_url() ?>skrining_data/get_skrining",
            "type": "POST",
            "data": function( data ){
              data.pertanyaan = $('#pertanyaan').val();
              data.description = $('#description').val();
            }
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        {
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });
    $('#btn-filter').click(function(){ //button filter event click
        table.ajax.reload();  //just reload table
    });

});
</script>

</body>
</html>
