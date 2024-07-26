<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Detail Lookup</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Detail lookup</li>
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
            <h3 class="card-title">Detail Lookup</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" value="<?php echo $row->typename; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Value</label>
                <input type="text" name="value" class="form-control" value="<?php echo $row->value; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Order By</label>
                  <input type="text" name="urutan" class="form-control" value="<?php echo $row->urutan; ?>" readonly>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-form-label">Status</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="radio" name="myradio" value="1" <?= $row->status == '1' ? 'checked' : ''; ?> disabled>&nbsp; Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="myradio" value="0" <?= $row->status == '0' ? 'checked' : ''; ?> disabled>&nbsp; Inactive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>Configuration/Lookup/index"><button type="button" class="btn btn-info">Back</button></a>
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