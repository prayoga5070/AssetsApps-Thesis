<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Peminjaman</li>
                        <li class="breadcrumb-item active">Process</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-lg-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Process Pengajuan Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-lg-12">
                        <form id="formProcessPengajuanPeminjaman">
                            <!-- .card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input type="text" id="start_date" name="start_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->start_date ?>" readonly>
                                                </div>
                                                <div class="col-sm-2 text-center">
                                                    <p>S/d</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" id="end_date" name="end_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->end_date ?>" readonly>
                                                </div>
                                            </div>
                                            <div id="date_error" style="color: red; font-size: 14px;"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" name="description" rows="6" readonly><?php echo $row->description ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="approver_note" class="col-sm-3 col-form-label">Approver Note</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" name="approver_note" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group row mt-1 col-9">
                                            <div class="table-responsive">
                                                <table id="gridPinjamAsset" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Category Id</th>
                                                            <th>Kategori Asset</th>
                                                            <th>User</th>
                                                            <th>Location</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($categories as $item) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $item->id ?></td>
                                                                <td><?php echo $item->category_id ?></td>
                                                                <td><?php echo $item->name ?></td>
                                                                <td><?php echo $item->user_name ?></td>
                                                                <td><?php echo $item->location ?></td>
                                                                <td><?php echo $item->description ?></td>
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button type="button" id="btnAddAssetPeminjaman" class="btn btn-success btn-sm mr-3">
                                                                            <i class="fa fa-pen"></i> Add Item
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <label id="gridPinjamAsset_error" style="font-size: 12px; color:red; margin-left: 0px;"></label>
                                        </div>
                                    </div>
                                </div>
                                <?php if ($this->session->flashdata('msg')) : ?>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="mr-2">
                                        <button id="btnSubmit" type="button" class="btn btn-success">Save</button></a>
                                    </div>
                                    <div class="mr-2">
                                        <button id="btnReject" type="button" class="btn btn-danger">Reject</button></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url(); ?>asset/peminjaman"><button type="button" class="btn btn-info">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card -->
            </section>
            <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>

<!-- Asset Modal -->
<div class="modal fade" id="modalAddAssetPeminjaman" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg-custom" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <!-- Main content -->
                <section class="content">
                    <div class="col-lg-3 col-12">
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <!-- <div class="card-header">
                                </div> -->
                                <div class="card-body">
                                    <h3>Daftar Asset</h3>
                                    <form id="form_add_asset_modal">
                                        <input type="number" class="form-control" name="id_edit_modal" id="id_add_asset_modal" hidden>
                                        <div class="form-group">
                                            <div class="table-responsive">
                                                <table id="gridAddAssetPinjam" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Category Id</th>
                                                            <th>Category</th>
                                                            <th>Location</th>
                                                            <th>Description</th>
                                                            <th>Photo</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($assetDropdown as $item3) {
                                                        ?>
                                                            <tr>
                                                                <td><?php echo $item3->id ?></td>
                                                                <td><?php echo $item3->code ?></td>
                                                                <td><?php echo $item3->name ?></td>
                                                                <td><?php echo $item3->category_id ?></td>
                                                                <td><?php echo $item3->category_name ?></td>
                                                                <td><?php echo $item3->location ?></td>
                                                                <td><?php echo $item3->description ?></td>
                                                                <td>
                                                                    <img src="<?php echo base_url($item3->file_path . "/" . $item3->file_name); ?>" style="display: block;margin-left: auto;margin-right: auto;" width="35%" height="35%">
                                                                </td>
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button type="button" id="btnPilihAssetPinjam" class="btn btn-info btn-sm mr-3">
                                                                            <i class="fa fa-edit"></i> Pilih
                                                                        </button>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <br>
                                            <hr>
                                            <h3>Asset Dipilih</h3>
                                            <div class="table-responsive">
                                                <table id="gridAssetDipilih" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Code</th>
                                                            <th>Name</th>
                                                            <th>Category</th>
                                                            <th>Location</th>
                                                            <th>Description</th>
                                                            <th>Photo</th>
                                                            <th>Action</th>
                                                            <th>Peminjaman Category Id</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.card-body -->
                                <!-- /.card -->
                        </section>
                        <!-- /.Left col -->
                    </div>
                    <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
    </div>
</div>

<style>
    .error {
        color: red;
        font-size: 12px;
    }

    .modal-lg-custom {
        max-width: 80%;
    }
</style>

<script>
    $(document).ready(function() {
        var row;
        var row2;
        var rowData;
        var rowData2;
        let peminjamanCategoryId;

        var table = $("#gridPinjamAsset").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "lengthMenu": [
                [5]
            ],
            "dom": '<"top"l>rt<"bottom"ip><"">',
            "columnDefs": [{
                    "targets": 0,
                    "visible": false,
                    "searchable": false
                },
                {
                    "targets": 1,
                    "visible": false,
                    "searchable": false
                }
            ]
        });

        var table2 = $("#gridAddAssetPinjam").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "lengthMenu": [
                [5]
            ],
            // "dom": '<"top"l>rt<"bottom"ip><"">',
            "columnDefs": [{
                    "targets": 0,
                    "visible": false,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 2,
                },
                {
                    "targets": 3,
                },
                {
                    "targets": 4,
                    "searchable": false
                },
                {
                    "targets": 5,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 6,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 7,
                    "searchable": false,
                    "orderable": false
                }
            ]
        });

        var table3 = $("#gridAssetDipilih").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "lengthMenu": [
                [5]
            ],
            // "dom": '<"top"l>rt<"bottom"ip><"">',
            "columnDefs": [{
                    "targets": 0,
                    "visible": false,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 2,
                },
                {
                    "targets": 3,
                },
                {
                    "targets": 4,
                    "searchable": false
                },
                {
                    "targets": 5,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 6,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 7,
                    "searchable": false,
                    "orderable": false
                },
                {
                    "targets": 8,
                    "visible": false,
                    "searchable": false,
                    "orderable": false
                }
            ]
        });

        // Custom validation rule for integers greater than 0
        $.validator.addMethod("greaterThanZero", function(value, element) {
            return this.optional(element) || (parseInt(value) > 0);
        }, "Please enter a number greater than 0.");

        $.validator.addMethod("dateGreaterThan", function(value, element, param) {
            return moment(value, "YYYY-MM-DD").isAfter(moment($(param).val(), "YYYY-MM-DD"));
        }, "End date must be later than start date.");

        $("#form_modal").validate({
            rules: {
                category_modal: {
                    required: true,
                },
                qty_modal: {
                    required: true,
                    number: true,
                    greaterThanZero: true
                },
                note_modal: {
                    required: true,
                }
            },
            messages: {
                category_modal: {
                    required: "Kategori Asset field wajib diisi.",
                },
                qty_modal: {
                    required: "Quantity field wajib diisi.",
                    number: "Harap masukan angka yang sesuai.",
                    greaterThanZero: "Masukan angka lebih besar dari 0."
                },
                note_modal: {
                    required: "Description field wajib diisi.",
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass(validClass);
            }
        });

        $("#form_edit_modal").validate({
            rules: {
                category_modal: {
                    required: true,
                },
                qty_modal: {
                    required: true,
                    number: true,
                    greaterThanZero: true
                },
                note_modal: {
                    required: true,
                }
            },
            messages: {
                category_modal: {
                    required: "Kategori Asset field wajib diisi.",
                },
                qty_modal: {
                    required: "Quantity field wajib diisi.",
                    number: "Harap masukan angka yang sesuai.",
                    greaterThanZero: "Masukan angka lebih besar dari 0."
                },
                note_modal: {
                    required: "Description field wajib diisi.",
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass(validClass);
            }
        });

        $("#formProcessPengajuanPeminjaman").validate({
            rules: {
                approver_note: {
                    required: true,
                }
            },
            messages: {
                approver_note: {
                    required: "Approver Note field wajib diisi.",
                }
            },
            errorPlacement: function(error, element) {
                error.insertAfter(element);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass(validClass);
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass("is-invalid").addClass(validClass);
            }
        });

        $('#gridPinjamAsset tbody').on('click', '#btnAddAssetPeminjaman', function() {
            row = $(this).closest('tr');
            rowData = table.row(row).data();
            peminjamanCategoryId = rowData[0];
            let categoryId = rowData[1];
            table2.column(3).search('^' + categoryId + '$', true, false).draw();
            table3.column(3).search('^' + categoryId + '$', true, false).draw();

            $('#modalAddAssetPeminjaman').modal('show');
        });

        $('#btnSubmit').click(function(event) {
            event.preventDefault();
            var formData = $('#formProcessPengajuanPeminjaman').serializeArray();
            dataToSendPostAdd('Done', formData);
        });

        $('#btnReject').click(function(event) {
            event.preventDefault();
            var formData = $('#formProcessPengajuanPeminjaman').serializeArray();
            dataToSendPostAdd('Rejected', formData);
        });

        function dataToSendPostAdd(status, formData) {
            var checkForm = $("#formProcessPengajuanPeminjaman").valid();
            if (checkForm) {
                formData.push({
                    name: 'status',
                    value: status
                });

                var tableData = [];
                table3.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    tableData.push({
                        id: data[0],
                        peminjamanCategoryId: data[8]
                    });
                });

                if (tableData.length === 0 && status === 'Done') {
                    alert('Harap pilih minimal 1 item untuk dipinjamkan.')
                    return;
                }

                var combinedData = {
                    form: formData,
                    table: tableData
                };
                var jsonData = JSON.stringify(combinedData);

                $.ajax({
                    url: '<?php echo base_url('asset/peminjaman/post_process/'); ?><?php echo $row->id ?>',
                    type: 'POST',
                    data: jsonData,
                    contentType: 'application/json',
                    success: function(resp) {
                        try {
                            if (resp.status === 'success') {
                                window.location.href = resp.url;
                            } else {
                                alert(resp);
                            }
                        } catch (error) {
                            console.dir(resp);
                            alert('Error parsing server response: ' + error.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.dir(xhr.responseText);
                        alert('Server error: ' + xhr.responseText);
                    }
                });
            }
        }

        // form modal popup
        $('#gridAddAssetPinjam tbody').on('click', '#btnPilihAssetPinjam', function(e) {
            row2 = $(this).closest('tr');
            rowData2 = table2.row(row2).data();

            table3.row.add([
                rowData2[0], // Id
                rowData2[1], // Code
                rowData2[2], // Name
                rowData2[3], // Category
                rowData2[4], // Location
                rowData2[5], // Description
                rowData2[6],
                '<div class="btn-group btn-group-sm"><button type="button" class="btn btn-danger btn-sm mr-3" onclick="removeRow(this)"><i class="fa fa-trash"></i> Remove</button></div>',
                peminjamanCategoryId,
            ]).draw(false);

            // Disable the button after clicking
            $(this).prop('disabled', true);
        });

        // Function to remove a row from gridAssetDipilih
        window.removeRow = function(button) {
            var row3 = $(button).closest('tr');
            var rowData3 = table3.row(row3).data();
            var assetId = rowData3[0];

            // Remove the asset from gridAssetDipilih
            table3.row(row3).remove().draw(false);

            // Re-enable the button in gridAddAssetPinjam if it exists
            $('#gridAddAssetPinjam tbody tr').each(function() {
                row2 = $(this);
                rowData2 = table2.row(row2).data();
                if (rowData2 && rowData2[0] === assetId) {
                    row2.find('#btnPilihAssetPinjam').prop('disabled', false);
                }
            });
        };
    });
</script>