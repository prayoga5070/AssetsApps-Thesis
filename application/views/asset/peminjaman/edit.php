<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- /.content-wrapper -->
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Peminjaman</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Edit Peminjaman</li>
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
                        <h3 class="card-title">Edit Peminjaman</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="<?= base_url('asset/peminjaman/post_edit'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                            <div class="form-group">
                                <label>Lokasi Peminjaman</label>
                                <input type="text" name="id_lokasi" class="form-control" value="<?php echo $row->lokasi_id; ?>">
                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('id_lokasi') . '</div>'; ?>
                            </div>
                            <div class="form-group">
                                <label>Alasan Peminjaman</label>
                                <textarea name="description" class="form-control"><?php echo $row->alasan_peminjaman; ?></textarea>
                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('alasan_peminjaman') . '</div>'; ?>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pengajuan Peminjaman</label>
                                <textarea name="created_at" class="form-control"><?php echo $row->created_at; ?></textarea>
                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('created_at') . '</div>'; ?>
                            </div>
                            <input type="hidden" name="status_id" value="<?php echo $row->status_id; ?>">
                            <input type="hidden" name="flow_id" value="<?php echo $row->flow_id; ?>">
                            <button id="btnPinjamAsset" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Tambah Asset
                            </button>
                        </div>
                        <table id="example3" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                    <th>Year</th>
                                    <th>Description</th>
                                    <th>QR Code</th>
                                    <th>Action</th>
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
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="<?php echo base_url(); ?>asset/peminjaman/view_detail/<?php echo encode_id($row->id); ?>" class="btn btn-info btn-sm"><i class="fa fa-trash-alt"></i> Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    <a href="<?php echo base_url(); ?>asset/peminjaman"><button type="button" class="btn btn-info mr-2">Back</button></a>
                    <button type="submit" class="btn btn-primary">Save</button>
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


<!-- Asset Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assetModalLabel">Tambah Asset</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <form id="addAssetForm">
                    <div class="form-group">
                        <label>Pilih Aset</label>
                        <select name="select2" id="select2" style="width: 200px;">
                            <option value="">Select an asset</option>
                            <?php foreach ($assets as $asset) : ?>
                                <option value="<?php echo $asset->id; ?>">
                                    <?= $asset->name; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Asset</button>
                </form>
            </div>
        </div>
    </div>
</div>