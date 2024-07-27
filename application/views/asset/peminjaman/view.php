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
                        <li class="breadcrumb-item active">Peminjaman</li>
                        <li class="breadcrumb-item active">View</li>
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
                        <h3 class="card-title">View Pengajuan Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-lg-12">
                        <!-- .card-body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date" class="col-sm-3 col-form-label">Tanggal Peminjaman</label>
                                        <div class="row">
                                            <div class="col-sm-5">
                                                <input type="text" id="start_date" name="start_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->start_date; ?>" readonly>
                                            </div>
                                            <div class="col-sm-2 text-center">
                                                <p>S/d</p>
                                            </div>
                                            <div class="col-sm-5">
                                                <input type="text" id="end_date" name="end_date" class="form-control datepick1" placeholder="Select date" value="<?php echo $row->end_date; ?>" readonly>
                                            </div>
                                        </div>
                                        <div id="date_error" style="color: red; font-size: 14px;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="location" class="col-sm-3 col-form-label">Location</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" class="form-control" name="location" value="<?php echo $row->location; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="description" class="col-sm-3 col-form-label">Description</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" name="description" rows="6" readonly><?php echo $row->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="approver_note" class="col-sm-3 col-form-label">Approver Note</label>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <textarea type="text" class="form-control" name="approver_note" rows="6" readonly><?php echo $row->notes_approver; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div>
                                        <h3>List Request Peminjaman</h3>
                                    </div>
                                    <div class="form-group row mt-1 col-9">
                                        <div class="table-responsive">
                                            <table id="gridPinjamAsset" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Kategori Asset</th>
                                                        <th>Quantity</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($categories as $row) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $row->name ?></td>
                                                            <td><?php echo $row->quantity ?></td>
                                                            <td><?php echo $row->description ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <label id="gridPinjamAsset_error" style="font-size: 12px; color:red; margin-left: 0px;"></label>
                                    </div>
                                    <hr>
                                    <div>
                                        <h3>List Asset Dipinjamkan</h3>
                                    </div>
                                    <div class="form-group row mt-1 col-9">
                                        <div class="table-responsive">
                                            <table id="gridPinjamAsset2" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Code</th>
                                                        <th>Name</th>
                                                        <th>Photo</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($assets as $item2) {
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $item2->code ?></td>
                                                            <td><?php echo $item2->name ?></td>
                                                            <td>
                                                                <img src="<?php echo base_url($item2->file_path . "/" . $item2->file_name); ?>" style="display: block;margin-left: auto;margin-right: auto;" width="35%" height="35%">
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
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
                            <div>
                                <a href="<?php echo base_url(); ?>asset/peminjaman"><button type="button" class="btn btn-info">Back</button></a>
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