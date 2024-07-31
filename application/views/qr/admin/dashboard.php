<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">

    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
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
                  <label class="col-md-3">Location</label>
                  <div class="col-sm-9">
                    <input type="text" id="locationAsset" class="form-control ">
                  </div>

                </div>
        </form>
      </div>
    </div>
    <div class="col-lg-12 mt-3">
      <button type="button" class="btn btn-sm btn-primary" onclick="list()">Cari</button>
      <button type="button" class="btn btn-sm btn-secondary" onclick="resetForm()">Reset</button>
      <span class="text-warning ml-4"><i>*Klik "Cari" untuk menampilkan data</i></span>
    </div>
    <div class="col-lg-3 col-12">
      <div><br /></div>
      <!-- small box -->
      <a href="<?= base_url(); ?>qr/asset/scan" class="small-box-footer">
        <div class="small-box bg-primary">
          <div class="inner">
            <h3>Scan Asset</h3>
          </div>
      </a>
    </div>
</div>

<section class="col-lg-12">


  <!-- Custom tabs (Charts with tabs)-->
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="fas fa-chart-pie mr-1"></i>
        Data Asset
      </h3>
      <div class="card-body">
        <table id="dashboard1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Kategori</th>
              <th>Nama</th>
              <th>User</th>
              <th>Location</th>
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

<script>
  $(document).ready(function() {
    list();
    $('#dashboard1').on('length.dt', function(e, settings, len) {
      localStorage.dataTablePageLength = len;
    });

  });

  function list() {
    if (localStorage.dataTablePageLength) {
      pageLength = localStorage.dataTablePageLength;
    } else {
      pageLength = 10;
    }
    $table = $("#dashboard1").find('tbody');
    if ($.fn.DataTable.isDataTable("#dashboard1")) {
      $('#dashboard1').DataTable().clear().destroy();
    }
    var table = $("#dashboard1").DataTable({
      "searching": false,
      "ordering": true,
      "info": true,
      "processing": true,
      "serverSide": true,
      "language": {
        "infoFiltered": ""
      },

      "ajax": {
        "url": '<?= base_url() ?>' + 'qr/asset/tableDataDashboard',
        "type": "POST",
        "data": function(d) {
          return $.extend({}, d, {
            "locationAsset": $('#locationAsset').val(),
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
</script>
<!-- /.content -->
</div>