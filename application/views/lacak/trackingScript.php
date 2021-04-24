<script>
let save_method; //for save method string
let table;
let base_url = '<?php echo base_url();?>';

function show(status) {
    $('#table').DataTable().clear();
    $('#table').DataTable().destroy();

    $('#tableTracking').show();
    //datatables
    table = $('#table').DataTable({

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('index.php/lacak/lacakList?status=')?>" + status,
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [{
                "targets": [-1], //last column
                "orderable": false, //set not orderable
            },
            {
                "targets": [-2], //2 last column (photo)
                "orderable": false, //set not orderable
            },
        ],

    });
}

function selesai(id) {
    if (confirm('Selesaikan data ini?')) {
        // ajax delete data to database
        $.ajax({
            url: "<?php echo site_url('index.php/lacak/lacakSelesai')?>/" + id,
            type: "POST",
            dataType: "JSON",
            success: function(data) {
                //if success reload ajax table
                reload_table();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error updating data');
            }
        });

    }
}

function reload_table() {
    table.ajax.reload(null, false); //reload datatable ajax 
}
</script>