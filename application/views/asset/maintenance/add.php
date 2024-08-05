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
                        <li class="breadcrumb-item active">Add</li>
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
                        <h3 class="card-title">Create Maintenance</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="col-lg-9">
                        <form action="<?= base_url('asset/maintenance/post_add'); ?>" method="post">
                            <!-- .card-body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-10">
                                        <div class="form-group row">
                                            <label for="code" class="col-sm-3 col-form-label">No Asset</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="code" id="code" value="<?php echo set_value('code'); ?>">
                                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('code') . '</div>'; ?>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Requester</label>
                                            <div class="col-sm-9">
                                                <input type="text" class="form-control" name="created_by" readonly value="<?php echo $userLogInName ?>">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group row">
                                            <label for="created_by" class="col-sm-3 col-form-label">Summary Notes</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" id="created_by" rows="6" readonly></textarea>
                                            </div>
                                        </div> -->
                                        <div class="form-group row">
                                            <label for="note" class="col-sm-3 col-form-label">Notes</label>
                                            <div class="col-sm-9">
                                                <textarea type="text" class="form-control" name="note" rows="6"><?php echo set_value('note'); ?></textarea>
                                                <?php echo '<div style="color: red;font-size: 14px">' . form_error('note') . '</div>'; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <button id="btnScanMaintenance" type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                            Scan
                                        </button>
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

<!-- Asset Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="assetModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form inside the modal -->
                <!-- Content Wrapper. Contains page content -->
                <div class="">
                    <!-- /.content-wrapper -->
                    <!-- Content Header (Page header) -->
                    <div class="content-header">
                        <div class="container-fluid">
                        </div><!-- /.row -->
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    <div class="col-lg-3 col-12">
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-12">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-body">
                                        <!-- <video id="previewKamera" style="width: 300px;height: 300px;"></video> -->
                                        <div style="width:100%; height:100%; position: relative;">
                                            <div id="loadingOverlay" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.5); display: flex; justify-content: center; align-items: center; z-index: 1;">
                                                <div class="spinner-border text-light" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                            </div>
                                            <video id="previewKamera" style="width:100%; height:100%; object-fit: cover; background-color:black; z-index: 0;"></video>
                                        </div>
                                        <br><br>
                                        <select class="form-control" id="pilihKamera" style="width:100%;"></select>
                                        <br>
                                        <form action="<?= base_url('qr/asset/scan_detail'); ?>" method="post">
                                            <input class="form-control" type="text" id="qr" name="qr">
                                        </form>

                                        <script type="text/javascript" src="<?= base_url('assets/qrcode/qrcode/index.min.js'); ?>"></script>
                                        <script>
                                            $(document).ready(function() {
                                                let selectedDeviceId = null;
                                                const codeReader = new ZXing.BrowserMultiFormatReader();
                                                const sourceSelect = $("#pilihKamera");

                                                $('#exampleModal').on('shown.bs.modal', function() {
                                                    initScanner();
                                                });

                                                $('#exampleModal').on('hidden.bs.modal', function() {
                                                    if (codeReader) {
                                                        codeReader.reset();
                                                    }
                                                });

                                                $(document).on('change', '#pilihKamera', function() {
                                                    selectedDeviceId = $(this).val();
                                                    if (codeReader) {
                                                        codeReader.reset();
                                                        initScanner();
                                                    }
                                                });

                                                function initScanner() {
                                                    loadingOverlay.style.display = 'flex'; // Show the loading overlay

                                                    codeReader
                                                        .listVideoInputDevices()
                                                        .then(videoInputDevices => {
                                                            if (videoInputDevices.length > 0) {
                                                                if (selectedDeviceId == null) {
                                                                    if (videoInputDevices.length > 1) {
                                                                        selectedDeviceId = videoInputDevices[1].deviceId;
                                                                    } else {
                                                                        selectedDeviceId = videoInputDevices[0].deviceId;
                                                                    }
                                                                }

                                                                if (videoInputDevices.length >= 1) {
                                                                    sourceSelect.html('');
                                                                    videoInputDevices.forEach((element) => {
                                                                        const sourceOption = document.createElement('option');
                                                                        sourceOption.text = element.label;
                                                                        sourceOption.value = element.deviceId;
                                                                        if (element.deviceId == selectedDeviceId) {
                                                                            sourceOption.selected = 'selected';
                                                                        }
                                                                        sourceSelect.append(sourceOption);
                                                                    });
                                                                }

                                                                codeReader
                                                                    .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                                                                    .then(result => {
                                                                        const segments = result.text.split('/');
                                                                        const lastSegment = segments[segments.length - 1];

                                                                        $.ajax({
                                                                            url: `<?= base_url("asset/maintenance/scan_maintenance/"); ?>${lastSegment}`,
                                                                            type: 'GET',
                                                                            dataType: 'json',
                                                                            success: function(response) {
                                                                                $("#code").val(response.asset_code);
                                                                                $("#exampleModal").modal('hide');
                                                                            },
                                                                            error: function(xhr, status, error) {
                                                                                console.error(error);
                                                                            }
                                                                        });
                                                                    })
                                                                    .catch(err => console.error(err));
                                                            } else {
                                                                alert("Camera not found!");
                                                            }
                                                        })
                                                        .catch(err => console.error(err));

                                                    // Hide the loading overlay once the video is loaded and playing
                                                    previewKamera.onloadeddata = () => {
                                                        loadingOverlay.style.display = 'none'; // Hide the loading overlay
                                                    };

                                                    // Show the loading overlay every time the modal is shown
                                                    previewKamera.onwaiting = () => {
                                                        loadingOverlay.style.display = 'flex'; // Show the loading overlay while waiting for video
                                                    };
                                                }
                                            });
                                        </script>
                                    </div><!-- /.card-body -->
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
    </div>
</div>
</div>
</div>