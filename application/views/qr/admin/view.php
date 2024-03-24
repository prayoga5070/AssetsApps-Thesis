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
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
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
          <form action="" method="post">
            <div class="card-body">
              <div class="form-group">
                <label>Kode Asset</label>
                <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Nama Asset</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Year Acquisation</label>
                <input type="text" name="year_acq" class="form-control" value="<?= $row->year_acq; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Status</label>
                  <input type="text" name="status" class="form-control" value="<?php echo $row->status; ?>" readonly>
              </div>
              <div class="form-group">
                <label>User</label>
                <input type="text" name="user" class="form-control"  value="<?php echo $row->user; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Location</label>
                <input type="text" name="location" class="form-control"  value="<?php echo $row->location; ?>" readonly>
              </div>
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="" class="form-control" readonly><?php echo $row->description; ?></textarea>
              </div>
              <div class="form-group">
                <label>Photo</label>
                <?php if($row->file_name != NULL){ ?>
                  <img src="<?php echo base_url($row->file_path."/".$row->file_name); ?>" style="display: block;margin-left: auto;margin-right: auto;" width="50%" height="50%">
                  <br>
                <?php }else{ ?>
                  <p>Image Not Found</p>
                <?php } ?>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>qr/dashboard"><button type="button" class="btn btn-info">Back</button></a>
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