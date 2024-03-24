<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit Asset</li>
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
            <h3 class="card-title">Edit Asset</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url('user/asset/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $row->id; ?>">
              <div class="form-group">
                <label>Kode Asset</label>
                <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('code') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Nama Asset</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('name') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Year Acquisation</label>
                <select class="form-control" name="year_acq">
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('year_acq') . '</div>'; ?>
                  <option value="<?= $row->year_acq; ?>"><?= $row->year_acq; ?></option>
                  <?php
                  for ($year = (int)date('Y'); 2000 <= $year; $year--) : ?>
                    <option value="<?= $year; ?>"><?= $year; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="<?php echo $row->status; ?>"><?php echo $row->status; ?></option>
                  <option value="Writeoff">Writeoff</option>
                  <option value="Active">Active</option>
                </select>
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('status') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>User</label>
                <input type="text" name="user" class="form-control" value="<?php echo $row->user; ?>">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('user') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" value="<?php echo $row->location; ?>">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('location') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="" class="form-control" value="<?php echo $row->description; ?>"></textarea>
              </div>
              <div class="form-group">
                <label>Photo</label>
                <?php if ($row->file_name != NULL) { ?>
                  <img src="<?php echo base_url($row->file_path . "/" . $row->file_name); ?>" style="display: block;margin-left: auto;margin-right: auto;" width="50%" height="50%">
                  <br>
                <?php } else { ?>
                  <p>Image Not Found</p>
                <?php } ?> <br> <br>
                <input type="file" class="form-control" name="fileupload">* <h8>Hanya dapat upload gambar</h8>
                <p><span class="text-danger">*</span> <b>Data mandatory harus diisi</b></p>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>asset/setup"><button type="button" class="btn btn-info">Back</button></a>
              <button type="submit" class="btn btn-primary">Update</button>
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