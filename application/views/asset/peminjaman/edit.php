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
                        <li class="breadcrumb-item active">Edit</li>
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
                        <h3 class="card-title">Edit Pengajuan Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-lg-12">
                        <form id="formAddPengajuanPeminjaman">
                            <!-- .card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="date" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                                            <div class="row">
                                                <div class="col-sm-5">
                                                    <input type="text" id="start_date" name="start_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->start_date ?>">
                                                </div>
                                                <div class="col-sm-2 text-center">
                                                    <p>S/d</p>
                                                </div>
                                                <div class="col-sm-5">
                                                    <input type="text" id="end_date" name="end_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->end_date ?>">
                                                </div>
                                            </div>
                                            <div id="date_error" style="color: red; font-size: 14px;"></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="description" class="col-sm-3 col-form-label">Description</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" name="description" rows="6"><?php echo $row->description ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="mr-2">
                                            <button id="btnTambahAsset" type="button" class="btn btn-info" data-toggle="modal" data-target="#modalPinjamAsset">Tambah Asset</button>
                                        </div>
                                        <div class="form-group row mt-1 col-9">
                                            <div class="table-responsive">
                                                <table id="gridPinjamAsset" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Category Id</th>
                                                            <th>Kategori Asset</th>
                                                            <th>User Id</th>
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
                                                                <td><?php echo $item->user_id ?></td>
                                                                <td><?php echo $item->user_name ?></td>
                                                                <td><?php echo $item->location ?></td>
                                                                <td><?php echo $item->description ?></td>
                                                                <td>
                                                                    <div class="btn-group btn-group-sm">
                                                                        <button type="button" id="btnEditPinjamAsset" class="btn btn-warning btn-sm mr-3">
                                                                            <i class="fa fa-pen"></i> Edit
                                                                        </button>
                                                                        <button type="button" id="btnDeletePinjamAsset" class="btn btn-danger btn-sm mr-3">
                                                                            <i class="fa fa-trash"></i> Delete
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
                                        <button id="btnSubmit" type="button" class="btn btn-info">Save</button></a>
                                    </div>
                                    <div class="mr-2">
                                        <button id="btnDraft" type="button" class="btn btn-info">Draft</button></a>
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
<div class="modal fade" id="modalPinjamAsset" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>Tambah Aset Dipinjam</div>
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
                                    <form id="form_modal">
                                        <div class="form-group">
                                            <label for="category_modal" class="col-form-label">Kategori Asset</label>
                                            <div>
                                                <select id="category_modal" name="category_modal" class="form-control">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php
                                                    foreach ($assetCategories as $item2) {
                                                    ?>
                                                        <option value=<?php echo $item2->id ?>><?php echo $item2->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_modal" class="col-form-label">User</label>
                                            <div>
                                                <select id="user_modal" name="user_modal" class="form-control">
                                                    <option value="">-- Pilih User --</option>
                                                    <?php
                                                    foreach ($users as $item2) {
                                                    ?>
                                                        <option value=<?php echo $item2->id ?>><?php echo $item2->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_modal" class="col-form-label">Location</label>
                                            <input type="text" class="form-control" name="location_modal" id="location_modal" value="<?php echo set_value('code'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="note_modal" class="col-sm-3 col-form-label">Description</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" id="note_modal" name="note_modal" rows="6"></textarea>
                                                    <!-- <input type="text" class="form-control" name="note_modal" id="note_modal"> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="btnAddCategoryPeminjaman" type="button" class="btn btn-info">Add</button></a>
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

<!-- Asset Modal -->
<div class="modal fade" id="modalEditPinjamAsset" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div>Edit Aset Dipinjam</div>
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
                                    <form id="form_edit_modal">
                                        <input type="number" class="form-control" name="id_edit_modal" id="id_edit_modal" hidden>
                                        <div class="form-group">
                                            <label for="category_edit_modal" class="col-form-label">Kategori Asset</label>
                                            <div>
                                                <select id="category_edit_modal" name="category_modal" class="form-control">
                                                    <option value="">-- Pilih Kategori --</option>
                                                    <?php
                                                    foreach ($assetCategories as $item3) {
                                                    ?>
                                                        <option value=<?php echo $item3->id ?>><?php echo $item3->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="user_edit_modal" class="col-form-label">User</label>
                                            <div>
                                                <select id="user_edit_modal" name="user_edit_modal" class="form-control">
                                                    <option value="">-- Pilih User --</option>
                                                    <?php
                                                    foreach ($users as $item2) {
                                                    ?>
                                                        <option value=<?php echo $item2->id ?>><?php echo $item2->name ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="location_edit_modal" class="col-form-label">Location</label>
                                            <input type="text" class="form-control" name="location_edit_modal" id="location_edit_modal" value="<?php echo set_value('code'); ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="note_edit_modal" class="col-sm-3 col-form-label">Description</label>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <textarea type="text" class="form-control" id="note_edit_modal" name="note_edit_modal" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <button id="btnEditCategoryPeminjaman" type="button" class="btn btn-info">Save</button></a>
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
</style>

<script>
    $(document).ready(function() {
        var row;
        var rowData;
        let state = '';

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
                },
                {
                    "targets": 3,
                    "visible": false,
                    "searchable": false
                }
            ]
        });

        $('#btnTambahAsset').click(function() {
            $('#form_modal')[0].reset();
            state = 'add';
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

        $("#formAddPengajuanPeminjaman").validate({
            rules: {
                start_date: {
                    required: true,
                },
                end_date: {
                    required: true,
                    dateGreaterThan: "#start_date"
                },
                location: {
                    required: true,
                },
                description: {
                    required: true,
                }
            },
            messages: {
                start_date: {
                    required: "Tanggal Peminjaman field wajib diisi.",
                },
                end_date: {
                    required: "Tanggal Peminjaman field wajib diisi.",
                    dateGreaterThan: "Tanggal akhir harus setelah tanggal mulai."
                },
                location: {
                    required: "Location field wajib diisi.",
                },
                description: {
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

        $('#gridPinjamAsset tbody').on('click', '#btnDeletePinjamAsset', function() {
            row = $(this).closest('tr');
            table.row(row).remove().draw();
        });

        $('#gridPinjamAsset tbody').on('click', '#btnEditPinjamAsset', function() {
            row = $(this).closest('tr');
            rowData = table.row(row).data();

            $('#id_edit_modal').val(rowData[0]).change();
            $('#category_edit_modal').val(rowData[1]).change();
            $('#user_edit_modal').val(rowData[3]);
            $('#location_edit_modal').val(rowData[5]);
            $('#note_edit_modal').val(rowData[6]);

            $('#modalEditPinjamAsset').modal('show');
        });

        $('#btnSubmit').click(function(event) {
            let status = "On Progress";
            var formData = $('#formAddPengajuanPeminjaman').serializeArray();
            dataToSendPostAdd('Submit', formData);
        });

        $('#btnDraft').click(function(event) {
            event.preventDefault();
            var formData = $('#formAddPengajuanPeminjaman').serializeArray();
            dataToSendPostAdd('Draft', formData);
        });

        function dataToSendPostAdd(status, formData) {
            var checkForm = $("#formAddPengajuanPeminjaman").valid();
            var checkGrid = validateGrid();
            if (checkGrid && checkForm) {
                formData.push({
                    name: 'status',
                    value: status
                });

                var tableData = [];
                table.rows().every(function(rowIdx, tableLoop, rowLoop) {
                    var data = this.data();
                    tableData.push({
                        id: data[0],
                        asset_category_id: data[1],
                        user_id: data[3],
                        user: data[4],
                        location: data[5],
                        description: data[6]
                    });
                });
                var combinedData = {
                    form: formData,
                    table: tableData
                };
                var jsonData = JSON.stringify(combinedData);

                $.ajax({
                    url: '<?php echo base_url('asset/peminjaman/post_edit/'); ?><?php echo $row->id ?>',
                    type: 'POST',
                    data: jsonData,
                    contentType: 'application/json',
                    beforeSend: function(data) {
                        // alert(jsonData);
                    },
                    success: function(resp) {
                        // console.dir(resp);
                        window.location.href = resp.url;
                    }
                });
            }
        }

        // Validate grid
        function validateGrid() {
            if (table.rows().count() < 1) {
                $("#gridPinjamAsset_error").text("Harap pilih minimal 1 asset.");
                return false;
            } else {
                $("#gridPinjamAsset_error").text("");
                return true;
            }
            return true;
        }

        // form modal popup
        $('#btnAddCategoryPeminjaman').click(function() {
            if ($("#form_modal").valid()) {
                var categoryId = $('#category_modal option:selected').val();
                var category = $('#category_modal option:selected').text();
                var userId = $('#user_modal option:selected').val();
                var user = $('#user_modal option:selected').text();
                var location = $('#location_modal').val();
                var note = $('#note_modal').val();

                table.row.add([
                    0,
                    categoryId,
                    category,
                    userId,
                    user,
                    location,
                    note,
                    '<div class="btn-group btn-group-sm">' +
                    '<button type="button" id="btnEditPinjamAsset" class="btn btn-warning btn-sm mr-3">' +
                    '<i class="fa fa-pen"></i> Edit' +
                    '</button>' +
                    '<button type="button" id="btnDeletePinjamAsset" class="btn btn-danger btn-sm mr-3">' +
                    '<i class="fa fa-trash"></i> Delete' +
                    '</button>' +
                    '</div>'
                ]).draw(false);

                $('#modalPinjamAsset').modal('hide');
            }
        });

        $('#btnEditCategoryPeminjaman').click(function() {
            if ($("#form_edit_modal").valid()) {
                var id = $('#id_edit_modal').val();
                var categoryId = $('#category_edit_modal option:selected').val();
                var category = $('#category_edit_modal option:selected').text();
                var userId = $('#user_edit_modal option:selected').val();
                var user = $('#user_edit_modal option:selected').text();
                var location = $('#location_edit_modal').val();
                var note = $('#note_edit_modal').val();

                table.row(row).data([
                    id,
                    categoryId,
                    category,
                    userId,
                    user,
                    location,
                    note,
                    rowData[7]
                ]).draw(false);

                $('#modalEditPinjamAsset').modal('hide');
            }
        });
    });
</script>