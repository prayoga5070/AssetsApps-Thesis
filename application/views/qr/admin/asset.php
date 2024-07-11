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
            </div>
        <?php } ?>
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
                </div>
                <div class=" col-md-6">
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3">Status</label>
                            <div class="col-sm-9">

                                <select id="status-data" name="statusAsset" class="form-control select2">
                                    <option value="">-- ALL STATUS --</option>

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="input-group">
                            <label class="col-md-3">User</label>
                            <div class="col-sm-9">
                                <input type="text" id="userAsset" class="form-control ">
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>
    <div class="col-lg-12 mt-3">
        <button type="button" class="btn btn-sm btn-primary" onclick="list()">Cari</button>
        <button type="button" class="btn btn-sm btn-secondary" onclick="resetForm()">Reset</button>
        <span class="text-warning ml-4"><i>*Klik "Cari" untuk menampilkan data</i></span>
    </div>
    <div><br /></div>
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
<script>
$(document).ready(function () {
    list();
    $('#asset1').on('length.dt', function (e, settings, len) {
      localStorage.dataTablePageLength = len;
    });

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
</script>
</div>