<script type="text/javascript">

    var save_method; //for save method string
    var table;

    $(document).ready(function() {

        //datatables
        table = $('#tblResults').DataTable({
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.

            // Load data for the table's content from an Ajax source
            "ajax": {
                "url": "<?php echo site_url('home/ajax_list')?>",
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



    function add_item()
    {
        save_method = 'add';
        clean_form('form');
        $('#modal_form').modal('show'); // show bootstrap modal
        $('#btnSave').attr('disabled',false); //set button enable
        $('.modal-title').text('Add Item'); // Set Title to Bootstrap modal title
    }

    function edit_item(id)
    {
        save_method = 'update';
        clean_form('form');

        //Ajax Load data from ajax
        $.ajax({
            url : "<?php echo site_url('home/ajax_edit/')?>/" + id,
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {

                $('[name="Id"]').val(data.Id);
                $('[name="Name"]').val(data.Name);
                $('[name="Description"]').val(data.Description);
                $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
                $('#btnSave').attr('disabled',false); //set button enable
                $('.modal-title').text('Edit Item'); // Set title to Bootstrap modal title

            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                msg_error('Error get data from ajax');
            }
        });
    }

    function reload_table()
    {
        table.ajax.reload(null,false); //reload datatable ajax
    }

    function save()
    {
        $('#btnSave').text('Saving...'); //change button text
        $('#btnSave').attr('disabled',true); //set button disable
        var url;

        if(save_method == 'add') {
            url = "<?php echo site_url('home/ajax_add')?>";
        } else {
            url = "<?php echo site_url('home/ajax_update')?>";
        }

        // ajax adding data to database
        $.ajax({
            url : url,
            type: "POST",
            data: $('#form').serialize(),
            dataType: "JSON",
            success: function(data)
            {
                clean_errors();
                if(data.status) //if success close modal and reload ajax table
                {
                    $('#modal_form').modal('hide');
                    reload_table();
                }
                else
                {
                    check_errors('#form', data.errores);
                    msg_error(data.error);
                }

                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                msg_error('Error at insert/update data');
                $('#btnSave').text('Save'); //change button text
                $('#btnSave').attr('disabled',false); //set button enable

            }
        });
    }

    function delete_item(id)
    {
        if(confirm('Are you sure delete this data?'))
        {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('home/ajax_delete')?>/"+id,
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    //if success reload ajax table
                    $('#modal_form').modal('hide');
                    reload_table();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    msg_error('Error deleting data');
                }
            });

        }
    }

</script>