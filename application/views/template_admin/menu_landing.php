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
<!-- jQuery (required for Bootstrap components) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Bootstrap JS (required for Bootstrap components) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<!-- Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
