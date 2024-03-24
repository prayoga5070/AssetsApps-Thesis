<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Detail Asset</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url(); ?>dashboard/admin">Home</a></li>
              <li class="breadcrumb-item active">Detail Asset</li>
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
                <h3 class="card-title">Detail Asset</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="#">
                <div class="card-body">
                  <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                  <div class="form-group">
                    <label>Kode Asset</label>
                    <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Nama Asset</label>
                    <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Photo</label>
                      <img src="<?php echo base_url().$row->file_path.$row->file_name; ?>" alt="">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a href="<?php echo base_url(); ?>qr/user/asset"><button type="button" class="btn btn-info">Back</button></a>
                </div>
              </form>
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
 