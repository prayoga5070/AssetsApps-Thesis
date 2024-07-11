<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengajuan Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan Peminjaman</li>
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
                        <h3 class="card-title">Pengajuan Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('peminjaman/add'); ?>" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>User</label>
                                <input class="form-control" type="text" name="code" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Lokasi Peminjaman</label>
                                <input class="form-control" type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alasan Peminjaman</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <h3>List Asset</h3>
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Code</th>
                                        <th>Name</th>
                                        <th>Year</th>
                                        <th>Description</th>
                                        <th>QR Code</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div class="mr-2">
                                    <a href="<?php echo base_url(); ?>asset/peminjaman"><button type="button" class="btn btn-info">Back</button></a>
                                </div>
                                <div>
                                    <button type="submit" class="btn btn-info">Save</button></a>
                                </div>
                            </div>
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