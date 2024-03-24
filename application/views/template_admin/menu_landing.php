<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="container-fluid">
			<div class="navbar-right">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand page-scroll" href="#page-top"><img src="<?= base_url(); ?>assets/images/test.png" alt="Sanza theme logo" height="58" width="42"></a>
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<!-- change navbar E-Digital 28-2-24 -->
							<li><a class="trigger right-caret">E - Digital</a>
								<ul class="dropdown-menu sub-menu">
									<li class="nav-item dropdown">
										<a class="trigger right-caret" role="button" data-bs-toggle="dropdown" aria-expanded="false">
											Application
										</a>
										<ul class="dropdown-menu sub-menu">
											<li>
												<a class="dropdown-item">
													<form action="<?= base_url(); ?>qr/auth/validate" method="post" class="dropdown-item">
														<input type="hidden" name="email" value="<?php echo $this->session->userdata('logged_in')['email'] ?>">
														<input type="hidden" name="dept" value="<?php echo $this->session->userdata('logged_in')['dept'] ?>">
														<button class="unstyled-button" type="submit">ASSETS APP</button>
													</form>
												</a>
											</li>
											<li>
												<a href="https://booking.portal-mki.com/">Book Meeting Room</a>
											</li>
										</ul>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="#page-top">Home</a>
					</li>
					<li>
						<a class="page-scroll" href="<?= base_url(); ?>superadmin/manage/dashboard">Manage Website</a>
					</li>
					<li>
						<a class="page-scroll" href="<?= base_url(); ?>auth/logout">Logout</a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div><!--/.container-fluid -->
	</div>
</nav>

<!-- modal -->
<!-- Modal SO Outstanding -->
<div class="modal" id="soOutstandingModal">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Bagian header modal -->
			<div class="modal-header">
				<h4 class="modal-title">SO Outstanding</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Bagian body modal -->
			<div class="modal-body">
				<p>Silahkan Pilih Tanggal Periode Yang akan ditampilkan.</p>

				<!-- Date Time Picker -->
				<form id="datePickerForm" action="<?= base_url('dashboard/sooutstanding') ?>" method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="startDate" class="small">Start Date:</label>
							<input type="text" class="form-control weekYear auto-fill" id="startDate" name="startDate" placeholder="Select date">
							<small id="startDateHelp" class="form-text text-muted">
								Format: yyyy-mm-dd (contoh: 2024-01-31)
							</small>
						</div>
						<div class="form-group col-md-6">
							<label for="endDate" class="small">End Date:</label>
							<input type="text" class="form-control weekYear auto-fill" id="endDate" name="endDate" placeholder="Select date">
							<small id="endDateHelp" class="form-text text-muted">
								Format: yyyy-mm-dd (contoh: 2024-02-15)
							</small>
						</div>
					</div>

					<!-- Input tersembunyi untuk menyimpan nilai date picker -->
					<input type="hidden" id="datepickerStatus" name="datepickerStatus" value="1">
				</form>
			</div>



			<!-- Bagian footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<!-- Ganti link menjadi button dengan fungsi submit form -->
				<button type="button" class="btn btn-primary" onclick="submitForm()">Tampilkan</button>
			</div>

		</div>
	</div>
</div>

<!-- Modal SO OutstandingV1 -->
<div class="modal" id="soOutstandingModalv1">
	<div class="modal-dialog">
		<div class="modal-content">

			<!-- Bagian header modal -->
			<div class="modal-header">
				<h4 class="modal-title">SO Outstanding</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>

			<!-- Bagian body modal -->
			<div class="modal-body">
				<p>Silahkan Pilih Tanggal Periode Yang akan ditampilkan.</p>

				<!-- Date Time Picker -->
				<form id="datePickerFormv1" action="<?= base_url('dashboard/sooutstandingv1') ?>" method="post">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label for="startDate" class="small">Start Date:</label>
							<input type="text" class="form-control weekYear auto-fill" id="startDate" name="startDate" placeholder="Select date">
							<small id="startDateHelp" class="form-text text-muted">
								Format: yyyy-mm-dd (contoh: 2024-01-31)
							</small>
						</div>
						<div class="form-group col-md-6">
							<label for="endDate" class="small">End Date:</label>
							<input type="text" class="form-control weekYear auto-fill" id="endDate" name="endDate" placeholder="Select date">
							<small id="endDateHelp" class="form-text text-muted">
								Format: yyyy-mm-dd (contoh: 2024-02-15)
							</small>
						</div>
					</div>

					<!-- Input tersembunyi untuk menyimpan nilai date picker -->
					<input type="hidden" id="datepickerStatus" name="datepickerStatus" value="1">
				</form>
			</div>



			<!-- Bagian footer modal -->
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<!-- Ganti link menjadi button dengan fungsi submit form -->
				<button type="button" class="btn btn-primary" onclick="submitFormv1()">Tampilkan</button>
			</div>

		</div>
	</div>
</div>

<!-- jQuery (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Bootstrap JS (required for Bootstrap components) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<!-- Custom script to initialize date-time picker with default date -->
<script>
	$(document).ready(function() {
		$('.datetimepicker').datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
			startDate: new Date() // Set the default date to today
		});
	});

	$('#weekYear').datepicker({
		todayHighlight: true,
		format: "mm-yyyy",
		viewMode: "months",
		minViewMode: "months"
	});

	$("#weekYear").on("changeDate", function(event) {});

	// Fungsi untuk submit form
	function submitForm() {
		document.getElementById("datePickerForm").submit();
	}

	// Fungsi untuk submit formV1
	function submitFormv1() {
		document.getElementById("datePickerFormv1").submit();
	}
</script>
<script>
	$(document).ready(function() {
		// Fungsi untuk mengisi otomatis nilai form text berdasarkan form sebelumnya
		$(".auto-fill").on("change", function() {
			var currentValue = $(this).val();
			var targetSelector = $(this).data("target");

			// Cek apakah target ada
			if ($(targetSelector).length > 0) {
				$(targetSelector).val(currentValue);
			}
		});
	});
</script>