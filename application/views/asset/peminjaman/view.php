<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Detail Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Detail Peminjaman</li>
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
                        <h3 class="card-title">Detail Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>User</label>
                                <input type="text" name="code" class="form-control" value="<?php echo $row->user_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Lokasi Peminjaman</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->lokasi_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Alasan Peminjaman</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->alasan_peminjaman; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Created Time</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->created_at; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->status_id; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Flow</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $row->flow_id; ?>" readonly>
                            </div>
                            <h3>List Asset</h3>
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Description</th>
                                        <th>QR Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($log as $entry) {
                                    ?>
                                        <tr>
                                            <td><?php echo $entry->id ?></td>
                                            <td><?php echo $entry->code ?></td>
                                            <td><?php echo $entry->name ?></td>
                                            <td><?php echo $entry->year_acq ?></td>
                                            <td><?php echo $entry->description ?></td>
                                            <td><?php echo $entry->qrcode ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>asset/peminjaman"><button type="button" class="btn btn-info">Back</button></a>
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