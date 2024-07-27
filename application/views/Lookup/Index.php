<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Lookup</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Lookup</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- <div class="col-lg-3 col-12">
            <a href="<?= base_url(); ?>qr/asset/add" class="small-box-footer">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>Add Asset</h3>
                    </div>
                </div>    
            </a>
        </div> -->
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <!-- Custom tabs (Charts with tabs)-->
                <div class="card">
                    <div class="card-header">
                        <!-- <h3 class="card-title">
                            <i class="fas fa-chart-pie mr-1"></i>
                            Data Assets
                        </h3> -->
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div id="divSearchParameter" style="display:none">
                                    <!-- Start Notes-->
                                    <!-- <div class="note note-yellow m-b-15">
                                        <div class="note-icon f-s-20">
                                            <i class="fa fa-lightbulb fa-2x"></i>
                                        </div>
                                        <div class="note-content">
                                            <h4 class="m-t-5 m-b-5 p-b-2">Petunjuk Pencarian Data:</h4>
                                            <ul class="m-b-5 p-l-25">
                                                <li>Gunakan separator <b>titik koma</b> [;] untuk melakukan pencarian lebih dari satu kata</li>
                                                <li><b>Contoh: </b> [Kata pertama;Kata Kedua;Dan seterusnya]</li>
                                            </ul>
                                        </div>
                                    </div> -->
                                    <!--End Notes-->
                                    <div class="form-inline">
                                        <div class="form-group row m-b-15 col-md-6 _searchCriteria">
                                            <label class="col-md-3 col-form-label text-muted">Type</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-group input-group-xs">
                                                    <input id="txtTypeSearchParam" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-b-15 col-md-6 _searchCriteria">
                                            <label class="col-md-3 col-form-label text-muted">Name</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-group input-group-xs">
                                                    <input id="txtNamaSearchParam" type="text" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3 float-right">
                                        <a href="#" class="btn btn-success" id="BtnSearch"><span><i class="fa fa-search"></i> Search </span></a>
                                        <a href="#" class="btn btn-success" id="BtnClearSearch"><span><i class="fa fa-times"></i> Clear </span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-15 ">
                                <a href="#" class="btn btn-success" id="btnOpenShowParameterSearch" onclick="ShowParameter('divSearchParameter','btnOpenShowParameterSearch','btnHideShowParameterSearch')"><span><i class="fa fa-search"></i></span></a>
                                <a href="#" class="btn btn-success" style="display:none" id="btnHideShowParameterSearch" onclick="HideParameter('divSearchParameter','btnOpenShowParameterSearch','btnHideShowParameterSearch')"><span><i class="fa fa-sort-up"></i> Hide Search Panel</span></a> &nbsp;
                                <a href="#" class="btn btn-success" data-toggle="modal" onclick="Create()"><span><i style="margin-right: 4px" class="fa fa-plus"></i></span>Create</a> &nbsp;
                                <a href="#" class="btn btn-success" data-toggle="modal" id="button-edit" onclick="Edit()"><span><i style="margin-right: 4px" class="fa fa-edit"></i></span>Edit</a> &nbsp;
                                <a href="#" class="btn btn-success" data-toggle="modal" id="button-view" onclick="View()"><span><i style="margin-right: 4px" class="fa fa-eye"></i></span>View</a> &nbsp;
                                <a href="#" class="btn btn-success" data-toggle="modal" id="button-delete" onclick="Delete()"><span><i style="margin-right: 4px" class="fa fa-trash"></i></span>Delete</a> &nbsp;
                            </div>
                            <table id="LookupTable" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>No</th>
                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Value</th>
                                        <th>Order By</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Time</th>
                                        <th>Updated By</th>
                                        <th>Updated Time</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div><!-- /.card-body -->
                    </div>
                </div><!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
        </div><!-- /.container-fluid -->
    </section>
<!-- /.content -->
</div>
<script>
let State = "";
let data;
$(document).ready(function () {

  });

  let tableLookup = $('#LookupTable').DataTable({
        "fixedHeader": {
            "header": true
        },
        "destroy": true,
        "responsive": true,
        "processing": true, // untuk menampilkan bar prosessing
        "serverSide": true, // untuk proses server side datatable harus diset true
        "orderMulti": false, // untuk disable multi order column
        "retrieve": true,
        "autoWidth": true,
        "dom": '<"top"i>rt<"bottom"lp><"clear">', // untuk menghilangkan search global
        "select": true,
        "drawCallback": function () {
        },
        "order": [
            [0, 'asc']
        ], // Default sortingnya berdasarkan kolom / field ke 0 (paling pertama)
        "ajax": {
            "url": "<?= base_url('/Configuration/Lookup/getDataLookupNew') ?>", // URL file untuk proses select datanya
            "type": "POST",
        },
        "columns": [
            { "data" : 'id',"visible": false},
            { "data" : 'no',"sortable": false},
            { "data" : "typename" },  // Tampilkan kolom nama_kategori pada table kategori
            { "data" : "name" },  // Tampilkan kolom nama_kategori pada table kategori
            { "data" : "value" },  // Tampilkan kolom subkat pada table sub kategori
            { "data" : "urutan" },  // Tampilkan kolom subkat pada table sub kategori
            { "data" : "status" },  // Tampilkan kolom subkat pada table sub kategori
            { "data" : "createdby"}, // Tampilkan kolomid_kategori pada table kategori
            { "data" : "createdtime"}, // Tampilkan kolomid_kategori pada table kategori
            { "data" : "updatedby"}, // Tampilkan kolomid_kategori pada table kategori
            { "data" : "updatedtime"} // Tampilkan kolomid_kategori pada table kategori
        ],
        "fnInitComplete": function () {
            EnabDisabButton();
            initSelect();
        }
    });

  

    //--------------------------Function untuk melempar parameter search ---------------------//
    //Untuk melempar parameter search
    oTable = $('#LookupTable').DataTable();
    $('#BtnSearch').click(function () {
        oTable.columns(2).search($('#txtTypeSearchParam').val().trim());
        oTable.columns(3).search($('#txtNamaSearchParam').val().trim());

        //hit search ke server
        oTable.draw();
    });

    //---------------------Function untuk reset data pencarian----------------//
    $('#BtnClearSearch').click(function () {
        $('#txtTypeSearchParam').val("");
        $('#txtNamaSearchParam').val("");
        oTable.columns(2).search($('#txtTypeSearchParam').val().trim());
        oTable.columns(3).search($('#txtNamaSearchParam').val().trim());
        //hit search ke server
        oTable.draw();
    });

    function cekSelectedClassMain() {
    selectedRows = [];
    $('#LookupTable .selected').each(function () {
        var isi = $(this).index();
        selectedRows.push(isi);
    });
    }

    function EnabDisabButton() {
        setTimeout(function () {
            cekSelectedClassMain();
            if (selectedRows.length > 1 || selectedRows.length == 0) {
                $('#button-edit').addClass('disabled');
                $('#button-edit').attr('data-toggle', 'tooltip').attr('title', 'Data yang dipilih kurang atau lebih dari 1');
                $('#button-view').addClass('disabled');
                $('#button-view').attr('data-toggle', 'tooltip').attr('title', 'Data yang dipilih kurang atau lebih dari 1');
                $('#button-print').addClass('disabled');
                $('#button-print').attr('data-toggle', 'tooltip').attr('title', 'Data yang dipilih kurang atau lebih dari 1');
                if (selectedRows.length == 0) {
                    $('#button-delete').addClass('disabled');
                    $('#button-delete').attr('data-toggle', 'tooltip').attr('title', 'Data yang dipilih kurang dari 1');
                }
            }
            else if (selectedRows.length <= 1) {
                $('#button-edit').removeClass('disabled');
                $('#button-edit').removeAttr("data-toggle").attr('title', 'Hanya dapat menyunting 1 data');
                $('#button-view').removeClass('disabled');
                $('#button-view').removeAttr("data-toggle").attr('title', 'Hanya dapat menyunting 1 data');
                $('#button-print').removeClass('disabled');
                $('#button-print').removeAttr("data-toggle").attr('title', 'Hanya dapat menyunting 1 data');
                $('#button-delete').removeClass('disabled');
                $('#button-delete').removeAttr("data-toggle").attr('title', 'Hanya dapat menyunting 1 data');
                //$('.context-menu-icon-edit').removeClass('hidden');
                //$('.context-menu-icon-copy').removeClass('hidden');
            }
        }, 2);
    }

    function initSelect() {
        $('#LookupTable tbody').on('click', 'tr', function (event) {
            switch (event.which) {
                case 1:
                    EnabDisabButton();
                    break;
            }
        });
        EnabDisabButton();
    }

    function Create() {
        State = "create";
        window.location.href = "<?php echo base_url('Configuration/Lookup/create'); ?>";
    }

    function View() {
        State = "view";
        $("#LookupTable .selected").each(function () {
            var rowNode = $('#LookupTable').find('tbody tr:eq(' + $(this).index() + ')').get(0);
            data = tableLookup.row($(rowNode).closest('tr')).data();
        });
        window.location.href = "<?php echo base_url('Configuration/Lookup/view/'); ?>"+data.id;
    }

    function Edit() {
        State = "edit";
        $("#LookupTable .selected").each(function () {
            var rowNode = $('#LookupTable').find('tbody tr:eq(' + $(this).index() + ')').get(0);
            data = tableLookup.row($(rowNode).closest('tr')).data();
        });
        window.location.href = "<?php echo base_url('Configuration/Lookup/edit/'); ?>"+data.id;
    }

    function Delete(id) {
        listSelected = [];
        State = "delete";
        $("#LookupTable .selected").each(function () {
            var rowNode = $('#LookupTable').find('tbody tr:eq(' + $(this).index() + ')').get(0);
            data = tableLookup.row($(rowNode).closest('tr')).data();
            listSelected.push(data.Id)
        });

        var Ids = listSelected.toString();
        $.ajax({
            url: '<?php echo base_url('Configuration/Lookup/delete'); ?>',
            type: 'POST',
            data: { ids: Ids },
            success: function (d) {
                tableLookup.draw();
            }
        });
    }
</script>