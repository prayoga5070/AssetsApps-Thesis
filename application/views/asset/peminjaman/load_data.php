<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Pengajuan Peminjaman Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Pengajuan Peminjaman Asset</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <form action="<?= base_url('asset/peminjaman'); ?>" method="post" class="mb-3">
      <div class="form-row">
        <div class="form-group col-md-6 row ml-auto">
          <label for="created_at" class="col-sm-2 col-form-label">Tanggal</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" name="created_at" id="datepick1" placeholder="Select date">
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
              <option value="Draft">Draft</option>
              <option value="Submit">Submit</option>
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
    <div class="col-lg-1 col-12">
      <a href="<?= base_url(); ?>asset/peminjaman/add" class="small-box-footer">
        <div class="small-box bg-success">
          <div class="inner text-center">
            <h5>Create</h5>
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
              Pengajuan Peminjaman List
            </h3>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Tanggal Create</th>
                    <th>Deskripsi</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Durasi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($get_all_peminjaman as $item) {
                  ?>
                    <tr>
                      <td><?php echo $item->id ?></td>
                      <td><?php echo $item->created_at ?></td>
                      <td><?php echo $item->description ?></td>
                      <td><?php echo $item->name ?></td>
                      <td><?php echo $item->status ?></td>
                      <td><?php echo $item->durasi ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <?php if ($item->created_by == $user_id || $user_id == 2) : ?>
                            <a href="<?php echo base_url(); ?>asset/peminjaman/view/<?php echo encode_id($item->id); ?>" class="btn btn-info btn-sm mr-3">
                              <i class="fa fa-eye"></i> View
                            </a>
                          <?php endif; ?>
                          <?php if ($item->status == "Draft" && $item->created_by == $user_id) : ?>
                            <a href="<?php echo base_url(); ?>asset/peminjaman/edit/<?php echo encode_id($item->id); ?>" class="btn btn-info btn-sm mr-3 <?php echo ($item->status == 'Done') ? 'disabled' : ''; ?>">
                              <i class="fa fa-edit"></i> Edit
                            </a>
                          <?php endif; ?>
                          <?php if ($item->status == "Submit" && $user_id == 2) : ?>
                            <a href="<?php echo base_url(); ?>asset/peminjaman/process/<?php echo encode_id($item->id); ?>" class="btn btn-info btn-sm mr-3 <?php echo ($item->status == 'Done') ? 'disabled' : ''; ?>">
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