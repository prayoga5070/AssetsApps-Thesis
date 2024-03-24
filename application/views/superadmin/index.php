	<!-- Header -->
	<header>
		<div class="container-fluid">
			<div class="slider-container">
				<img src="<?= base_url(); ?>assets/images/uploads/slider/slider-3.jpeg" class="img-responsive" alt="portfolio">
			</div>
		</div>
	</header>
	<footer>
		<div class="container text-center">
			<p><span>@2023 Mitra Kiara Indonesia</span></p>
		</div>
	</footer>
	<!-- Bootstrap core JavaScript
		================================================== -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script>
		$(function() {
			$(".dropdown-menu > li > a.trigger").on("click", function(e) {
				var current = $(this).next();
				var grandparent = $(this).parent().parent();
				if ($(this).hasClass('left-caret') || $(this).hasClass('right-caret'))
					$(this).toggleClass('right-caret left-caret');
				grandparent.find('.left-caret').not(this).toggleClass('right-caret left-caret');
				grandparent.find(".sub-menu:visible").not(current).hide();
				current.toggle();
				e.stopPropagation();
			});
			$(".dropdown-menu > li > a:not(.trigger)").on("click", function() {
				var root = $(this).closest('.dropdown');
				root.find('.left-caret').toggleClass('right-caret left-caret');
				root.find('.sub-menu:visible').hide();
			});
		});
	</script>
	</body>

	</html>