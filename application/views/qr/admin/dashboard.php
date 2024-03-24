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
          <div class="col-lg-3 col-12">
            <!-- small box -->
            <a href="<?= base_url(); ?>qr/asset/scan" class="small-box-footer">
            <div class="small-box bg-primary">
              <div class="inner">
                <h3>Scan Asset</h3>
              </div>
              </a>
            </div>
          </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                  Data Asset
                </h3>
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Kode</th>
                    <th>Nama</th>
                    <th>User</th>
                    <th>Location</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                     foreach ($get_all_asset as $row) { 
                     ?>
                  <tr>
                    <td><?php echo $row->code?></td>
                    <td><?php echo $row->name?></td>
                    <td><?php echo $row->user?></td>
                    <td><?php echo $row->location?></td>
                  </tr>
                  <?php } ?>
                  </tbody>
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
  </div>
 