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
                                <label>Last Photo</label>
                                <?php if ($row->file_name != NULL) { ?>
                                    <img src="<?php echo base_url($row->file_path . "/" . $row->file_name); ?>" style="display: block;margin-left: auto;margin-right: auto;" width="30%" height="30%">
                                    <br>
                                <?php } else { ?>
                                    <p>Image Not Found</p>
                                <?php } ?> <br>
                            </div>
                            <table id="example3" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Year Acquisation</th>
                                        <th>Status</th>
                                        <th>User</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Last Update</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($log as $row) {
                                    ?>
                                        <tr>
                                            <td><?php echo $row->year_acq ?></td>
                                            <td><?php echo $row->status ?></td>
                                            <td><?php echo $row->user ?></td>
                                            <td><?php echo $row->location ?></td>
                                            <td><?php echo $row->description ?></td>
                                            <td><?php echo $row->created_at ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <a href="<?php echo base_url(); ?>qr/report/log"><button type="button" class="btn btn-info">Back</button></a>
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