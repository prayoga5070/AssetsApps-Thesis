<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Maintenance Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Maintenance Asset</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <form action="<?= base_url('asset/maintenance'); ?>" method="post" class="mb-3">
      <div class="form-row">
        <div class="form-group col-md-6 row ml-auto">
          <label for="created_at" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control datepick1" name="created_at" placeholder="Select date">
          </div>
        </div>
        <div class="form-group col-md-6 row ml-auto">
          <label for="created_by" class="col-sm-2 col-form-label">Requester</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="created_by">
          </div>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-6 row ml-auto">
          <label for="code" class="col-sm-2 col-form-label">Kode</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="code">
          </div>
        </div>
        <div class="form-group col-md-6 row ml-auto">
          <label for="status" class="col-sm-2 col-form-label">Status</label>
          <div class="col-sm-10">
            <select name="status" class="form-control">
              <option value="">-- Pilih Status --</option>
              <option value="Waiting for Maintenance">Waiting for Maintenance</option>
              <option value="On Progress">On Progress</option>
              <option value="Done">Done</option>
            </select>
            <?php echo '<div style="color: red;font-size: 14px">' . form_error('status') . '</div>'; ?>
          </div>
        </div>
      </div>
      <div class="text-right">
        <button type="submit" class="btn btn-primary">Search</button>
      </div>
    </form>

    <hr>

    <!-- /.row -->
    <!-- small box -->
    <div class="col-lg-3 col-12">
      <a href="<?= base_url(); ?>asset/maintenance/add" class="small-box-footer">
        <div class="small-box bg-primary">
          <div class="inner text-center">
            <h3>Create</h3>
          </div>
        </div>
      </a>
    </div>
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Maintenance List
            </h3>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th class="d-none">Id</th>
                    <th>Tanggal</th>
                    <th>Kode Asset</th>
                    <th>Requester</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($get_all_peminjaman as $row) {
                  ?>
                    <tr>
                      <td class="d-none"><?php echo $row->id ?></td>
                      <td><?php echo $row->created_at ?></td>
                      <td><?php echo $row->code ?></td>
                      <td><?php echo $row->name ?></td>
                      <td><?php echo $row->status ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo base_url(); ?>asset/maintenance/view/<?php echo encode_id($row->id); ?>" class="btn btn-info btn-sm mr-3">
                            <i class="fa fa-eye"></i> View
                          </a>
                          <?php if ($user_level == 4) : ?>
                            <a href="<?php echo base_url(); ?>asset/maintenance/edit/<?php echo encode_id($row->id); ?>" class="btn btn-info btn-sm <?php echo ($row->status == 'Done') ? 'disabled' : ''; ?>">
                              <i class="fa fa-edit"></i> Process
                            </a>
                          <?php endif; ?>
                        </div>
                      </td>
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
  </section>
  <!-- /.content -->
</div>