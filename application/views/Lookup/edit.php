<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Lookup</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Edit Lookup</li>
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
            <h3 class="card-title">Edit Lookup</h3>
          </div>
          <!-- /.card-header -->
          <!-- form start -->
          <form action="<?= base_url('Lookup/update'); ?>" method="post" enctype="multipart/form-data">
            <div class="card-body">
              <input type="hidden" name="id" value="<?php echo $row->id; ?>">
              <div class="form-group">
                <label>Type</label>
                <input type="text" name="type" class="form-control" value="<?php echo $row->typename; ?>" placeholder="Input Type">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('type') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" class="form-control" value="<?php echo $row->name; ?>" placeholder="Input Nama Menu">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('name') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Value</label>
                <input type="text" name="value" class="form-control" value="<?php echo $row->value; ?>" placeholder="Input Value">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('value') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label>Order No</label>
                <input type="text" name="order" class="form-control" value="<?php echo $row->urutan; ?>" placeholder="Input Urutan">
                <?php echo '<div style="color: red;font-size: 14px">' . form_error('order') . '</div>'; ?>
              </div>
              <div class="form-group">
                <label class="col-md-3 col-form-label">Status</label>
                <div class="col-md-9">
                  <div class="input-group">
                    <input type="radio" name="myradio2" value="1" <?= $row->status == '1' ? 'checked' : ''; ?> >&nbsp; Active &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="radio" name="myradio2" value="0" <?= $row->status == '0' ? 'checked' : ''; ?> >&nbsp; Inactive &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </div>
                  <?php echo '<div style="color: red;font-size: 14px">' . form_error('myradio2') . '</div>'; ?>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <a href="<?php echo base_url(); ?>Configuration/Lookup/index"><button type="button" class="btn btn-info">Back</button></a>
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
<script>
  $(document).ready(function () {
    
    
  });

</script>