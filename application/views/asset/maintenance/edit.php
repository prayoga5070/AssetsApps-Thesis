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
                    <div class="card-header">
                        <h3 class="card-title">Process Maintenance</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-lg-9">
                        <form action="<?php echo base_url(); ?>asset/maintenance/post_edit/<?php echo encode_id($row->id); ?>" method="post">
                            <!-- .card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group row">
                                            <label for="code" class="col-sm-3 col-form-label">No Asset</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="code" class="form-control" value="<?php echo $row->code; ?>" readonly>
                                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('code') . '</div>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Requester</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="created_by" value="<?php echo $row->name; ?>" readonly>
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="summary" class="col-sm-3 col-form-label">Summary Notes</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="summary" rows="6" readonly><?php echo $log; ?></textarea>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Request Date</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" id="created_by" value="<?php echo $row->created_at; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="note" class="col-sm-3 col-form-label">Notes</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="note" rows="6"></textarea>
                                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('note') . '</div>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="status" class="col-sm-3 col-form-label">Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control">
                                                    <option value="">-- Pilih Status --</option>
                                                    <option value="On Progress">On Progress</option>
                                                    <option value="Done">Done</option>
                                                </select>
                                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('status') . '</div>'; ?>
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
                                <?php if ($this->session->flashdata('msg')) : ?>
                                    <?php echo $this->session->flashdata('msg'); ?>
                                <?php endif; ?>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <div class="row">
                                    <div class="mr-2">
                                        <button type="submit" class="btn btn-info">Save</button></a>
                                    </div>
                                    <div>
                                        <a href="<?php echo base_url(); ?>asset/maintenance"><button type="button" class="btn btn-info">Cancel</button></a>
                                    </div>
                                </div>
                            </div>
                        </form>
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