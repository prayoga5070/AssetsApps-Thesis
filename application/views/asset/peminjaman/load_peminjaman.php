<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Peminjaman Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Peminjaman Asset</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <!-- /.row -->
    <!-- small box -->
    <a href="<?= base_url(); ?>asset/peminjaman/add" class="small-box-footer">
      <div class="small-box bg-success">
        <div class="inner text-center">
          <h3>Buat Pengajuan</h3>
        </div>
      </div>
    </a>
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-12">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Data Peminjaman Asset
            </h3>
            <div class="card-body">
              <table id="example3" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th class="d-none">User</th>
                    <th>Location</th>
                    <th>Alasan Peminjaman</th>
                    <th>Created Time</th>
                    <th>Status</th>
                    <th>Flow</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  foreach ($get_all_peminjaman as $row) {
                  ?>
                    <tr>
                      <td><?php echo $row->id ?></td>
                      <td class="d-none"><?php echo $row->user_id ?></td>
                      <td><?php echo $row->lokasi_id ?></td>
                      <td><?php echo $row->alasan_peminjaman ?></td>
                      <td><?php echo $row->created_at ?></td>
                      <td><?php echo $row->status_id ?></td>
                      <td><?php echo $row->flow_id ?></td>
                      <td>
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo base_url(); ?>asset/peminjaman/view_detail/<?php echo encode_id($row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-info"></i> View</a>
                        </div>
                        <div class="btn-group btn-group-sm">
                          <a href="<?php echo base_url(); ?>asset/peminjaman/edit/<?php echo encode_id($row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> Edit</a>
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