<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Assets</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Assets</li>
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
                <div class="col-lg-12">
                    <form id="filter">
                        <div class="row">
                            <div class=" col-md-6">
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label class="col-md-3">Kode Asset</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="kodeAsset" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label class="col-md-3">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="nameAsset" class="form-control ">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label class="col-md-3">Kategori</label>

                                        <div class="col-sm-9">
                                            <select id="kategoriAsset" class="form-control">
                                                <option value="">-- Pilih Kategori --</option>
                                                <?php
                                                foreach ($assetCategories as $row) {
                                                ?>
                                                    <option value=<?php echo $row->id ?>><?php echo $row->name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" col-md-6">

                                <div class="form-group row">
                                    <div class="input-group">
                                        <label class="col-md-3">User</label>
                                        <div class="col-sm-9">
                                            <input type="text" id="userAsset" class="form-control ">
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="input-group">
                                        <label class="col-md-3">Status</label>
                                        <div class="col-sm-9">

                                            <select id="statusAsset" name="statusAsset" class="form-control select2">
                                                <option value="">-- ALL STATUS --</option>
                                                <option value="Maintenance">Maintenance</option>
                                                <option value="Writeoff">Writeoff</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="row">
                    <div class="col-lg-12 mt-3">
                        <button type="button" class="btn btn-sm btn-secondary" style="float: right; margin: 5px; padding-left: 50px;padding-right: 50px;" onclick="resetForm()">Reset</button>
                        <button type="button" class="btn btn-sm btn-primary" style="float: right; margin: 5px; padding-left: 50px;padding-right: 50px;" onclick="list()">Search</button>
                    </div>
                </div>
                <div><br /></div>
                <?php if ($this->session->userdata('logged_in')['dept'] == 6) { ?>
                    <div class="col-lg-3 col-12">
                        <!-- small box -->
                        <a href="<?= base_url(); ?>qr/asset/add" class="small-box-footer">
                            <div class="small-box bg-primary">
                                <div class="inner">
                                    <h3>Add Asset</h3>
                                </div>
                        </a>
                    </div>
                    <div class="col-lg-12 mt-3">
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadData">Upload Data</button>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#uploadFoto">Upload Foto</button>
                    </div>
        </div>
        <div><br /></div>
    <?php } ?>
    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Data Assets
            </h3>
            <div class="card-body">
                <table id="asset1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Kode Asset</th>
                            <th>Kategori Asset</th>
                            <th>Nama Asset</th>
                            <th>Status</th>
                            <th>User</th>
                            <th>QRCode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                </table>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.Left col -->
</div>
<!-- /.row (main row) -->
</div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<div class="modal fade none-border" id="uploadData">
    <div class="modal-dialog">
        <form method="post" autocomplete="off" action="<?= base_url() ?>qr/asset/uploadExcel" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);padding-bottom:25px;color:black;padding-top:15px;padding-left:20px;margin-bottom:0%">
                    <h4 class="modal-title" style="color:white"><strong>Upload Data With Excel</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="uploadDataPopup">
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="button" class="btn btn-sm btn-secondary" onclick="downloadForm()">Download Template</button>
                            <div><br /></div>
                            <input type="file" id="fileExcel" name="fileExcel">
                            <div><br /></div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);margin-bottom:0%">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade none-border" id="uploadFoto">
    <div class="modal-dialog">
        <form method="post" autocomplete="off" action="<?= base_url() ?>qr/asset/uploadFotos" enctype="multipart/form-data">

            <div class="modal-content">
                <div class="modal-header" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);padding-bottom:25px;color:black;padding-top:15px;padding-left:20px;margin-bottom:0%">
                    <h4 class="modal-title" style="color:white"><strong>Upload Foto</strong></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body" id="uploadFotoPopup">
                    <div class="row">
                        <div class="col-lg-12">
                            <p>MOHON PERIKSA KEMBALI DATA YANG DIMASUKKAN. HARAP MASUKKAN KODE ASSET SEBAGAI NAMA FILE.</p>
                            <input type="file" id="files" name="fileFoto[]" multiple><br><br>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);margin-bottom:0%">
                    <button type="submit" class="btn btn-sm btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="modal fade none-border" id="notif">
    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);padding-bottom:25px;color:black;padding-top:15px;padding-left:20px;margin-bottom:0%">
                <h4 class="modal-title" style="color:white"><strong>Notif Upload</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12" id="notifPopup">
                        <?= isset($notif) ? $notif : '' ?>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style=" background: #466368;
  background: -webkit-linear-gradient(#648880, #293f50);
  background:    -moz-linear-gradient(#648880, #293f50);
  background:         linear-gradient(#648880, #293f50);margin-bottom:0%">
            </div>
        </div>
    </div>
</div>
<button type="button" id="notifToogle" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#notif">Upload Data</button>

<script>
    $(document).ready(function() {
        list();
        $('#asset1').on('length.dt', function(e, settings, len) {
            localStorage.dataTablePageLength = len;
        });
        var errorCheck = $("#notifPopup").html();
        var CheckTest = errorCheck.toString().replace(/\n|\r/g, "").trim();
        if (CheckTest != null && CheckTest != "") {
            document.getElementById("notifToogle").click();
        }
    });

    function list() {
        if (localStorage.dataTablePageLength) {
            pageLength = localStorage.dataTablePageLength;
        } else {
            pageLength = 10;
        }
        $table = $("#asset1").find('tbody');
        if ($.fn.DataTable.isDataTable("#asset1")) {
            $('#asset1').DataTable().clear().destroy();
        }
        var table = $("#asset1").DataTable({
            "searching": false,
            "ordering": true,
            "info": true,
            "processing": true,
            "serverSide": true,
            "language": {
                "infoFiltered": ""
            },

            "ajax": {
                "url": '<?= base_url() ?>' + 'qr/asset/tableData',
                "type": "POST",
                "data": function(d) {
                    return $.extend({}, d, {
                        "statusAsset": $('#statusAsset').val(),
                        "nameAsset": $('#nameAsset').val(),
                        "kodeAsset": $('#kodeAsset').val(),
                        "kategori": $('#kategoriAsset').val(),
                        "userAsset": $('#userAsset').val()
                    });
                }
            },
        });
    }

    function resetForm() {
        document.getElementById("filter").reset();

        list();
    }

    function downloadForm() {
        document.location = "<?= base_url(); ?>qr/asset/downloadTemplate";
    }
</script>
</div>