<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Maintenance</li>
                        <li class="breadcrumb-item active">Process</li>
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
                    <!-- .card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Process Maintenance</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="col-lg-12">
                        <!-- .card-body -->
                        <div class="card-body">
                            <div class="col-lg-9">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group row">
                                            <label for="code" class="col-sm-3 col-form-label">No Asset</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Requester</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="created_by" value="<?php echo $row->name; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Request Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="created_by" value="<?php echo $row->created_at; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">History Notes</label>
                                            <div class="table-responsive col-sm-9">
                                                <table id="example4" class="table table-bordered table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th class="d-none">Id</th>
                                                            <th>Tanggal</th>
                                                            <th>Requester</th>
                                                            <th>Notes</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach ($log as $row) : ?>
                                                            <tr>
                                                                <td class="d-none"><?php echo $row->id; ?></td>
                                                                <td><?php echo $row->created_at; ?></td>
                                                                <td><?php echo $row->name; ?></td>
                                                                <td><?php echo $row->notes; ?></td>
                                                                <td><?php echo $row->status; ?></td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <div class="row">
                                <div>
                                    <a href="<?php echo base_url(); ?>asset/maintenance"><button type="button" class="btn btn-info">Back</button></a>
                                </div>
                            </div>
                        </div>
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