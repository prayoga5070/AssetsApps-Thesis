<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Add Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Add Asset</li>
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
            <h3 class="card-title">Add Asset</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?php base_url(); ?>post" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <div class="form-group">
                <label>Kode Asset</label>
                <input type="text" name="code" class="form-control" placeholder="Input Kode Asset">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('code') . '</div>'; ?>
              </div>
              <div class="form-group ">
                <label>Kategori</label>
                <select id="kategoriAsset" name='id_category' class="form-control">
                  <?php
                  foreach ($assetCategories as $row) {
                  ?>
                    <option value=<?php echo $row->id ?>><?php echo $row->name ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nama Asset</label>
                <input type="text" name="name" class="form-control" placeholder="Input Nama Asset">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('name') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Year Acquisation</label>
                <select class="form-control" name="year_acq">
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('year_acq') . '</div>'; ?>
                  <?php
                  for ($year = (int)date('Y'); 2000 <= $year; $year--) : ?>
                    <option value="<?= $year; ?>"><?= $year; ?></option>
                  <?php endfor; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option>-- Pilih Status --</option>
                  <option value="Active">Active</option>
                  <option value="Writeoff">Writeoff</option>
                  <option value="Inactive">Inactive</option>
                </select>
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('status') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>User</label>
                <input type="text" name="user" class="form-control" placeholder="Pengguna Saat Ini">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('user') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control" placeholder="Lokasi Asset">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('location') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Description</label>
                <!-- <input type="text" name="description" class="form-control" placeholder="Deskripsi Asset"> -->
                <textarea name="description" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <label>Photo</label>
                <input type="file" class="form-control" name="fileupload">* <h8>Hanya dapat upload gambar</h8>
                <p><span class="text-danger">*</span> <b>Data mandatory harus diisi</b></p>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>qr/asset/setup"><button type="button" class="btn btn-info">Back</button></a>
              <button type="submit" class="btn btn-primary">Save</button>
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