<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- /.content-wrapper -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Scan Asset</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>qr/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Scan Asset</li>
          </ol>
        </div><!-- /.col -->
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
            <h3 class="card-title">
              <i class="fas fa-chart-pie mr-1"></i>
              Scan Asset
            </h3>
            <div class="card-body">
              <video id="previewKamera" style="width: 300px;height: 300px;"></video>
              <br>
              <select class="form-control" id="pilihKamera" style="max-width:300px"></select>
              <br>
              <form action="<?= base_url('qr/asset/scan_detail'); ?>" method="post">
                <input class="form-control" type="text" id="qr" name="qr">
              </form>

              <script type="text/javascript" src="<?= base_url('assets/qrcode/qrcode/index.min.js'); ?>"></script>
              <script src="<?= base_url('assets/qrcode/qrcode/jquery-3.5.1.min.js'); ?>"></script>

              <script>
                let selectedDeviceId = null;
                const codeReader = new ZXing.BrowserMultiFormatReader();
                const sourceSelect = $("#pilihKamera");

                $(document).on('change', '#pilihKamera', function() {
                  selectedDeviceId = $(this).val();
                  if (codeReader) {
                    codeReader.reset()
                    initScanner()
                  }
                })

                function initScanner() {
                  codeReader
                    .listVideoInputDevices()
                    .then(videoInputDevices => {
                      videoInputDevices.forEach(device =>
                        console.log(`${device.label}, ${device.deviceId}`)
                      );

                      if (videoInputDevices.length > 0) {

                        if (selectedDeviceId == null) {
                          if (videoInputDevices.length > 1) {
                            selectedDeviceId = videoInputDevices[1].deviceId
                          } else {
                            selectedDeviceId = videoInputDevices[0].deviceId
                          }
                        }


                        if (videoInputDevices.length >= 1) {
                          sourceSelect.html('');
                          videoInputDevices.forEach((element) => {
                            const sourceOption = document.createElement('option')
                            sourceOption.text = element.label
                            sourceOption.value = element.deviceId
                            if (element.deviceId == selectedDeviceId) {
                              sourceOption.selected = 'selected';
                            }
                            sourceSelect.append(sourceOption)
                          })

                        }

                        codeReader
                          .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                          .then(result => {
                            //hasil scan
                            console.log(result.text);
                            if (!result.text.includes("<?= base_url(''); ?>")) {
                              alert('Qr Code not Found');
                            }
                            else{
                              window.location.href = result.text;

                            }
                          })
                          .catch(err => console.error(err));

                      } else {
                        alert("Camera not found!")
                      }
                    })
                    .catch(err => console.error(err));
                }


                if (navigator.mediaDevices) {


                  initScanner()

                } else {
                  alert('Cannot access camera.');
                }
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