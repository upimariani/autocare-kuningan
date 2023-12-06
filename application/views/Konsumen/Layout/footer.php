<footer class="ftco-footer ftco-bg-dark ftco-section">
	<div class="container">
		<div class="row mb-5">
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2"><a href="#" class="logo">AutoCare<span>KUNINGAN</span></a></h2>
					<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
					<ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
						<li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
						<li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4 ml-md-5">
					<h2 class="ftco-heading-2">Information</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">About</a></li>
						<li><a href="#" class="py-2 d-block">Services</a></li>
						<li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
						<li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
						<li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Customer Support</h2>
					<ul class="list-unstyled">
						<li><a href="#" class="py-2 d-block">FAQ</a></li>
						<li><a href="#" class="py-2 d-block">Payment Option</a></li>
						<li><a href="#" class="py-2 d-block">Booking Tips</a></li>
						<li><a href="#" class="py-2 d-block">How it works</a></li>
						<li><a href="#" class="py-2 d-block">Contact Us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-md">
				<div class="ftco-footer-widget mb-4">
					<h2 class="ftco-heading-2">Have a Questions?</h2>
					<div class="block-23 mb-3">
						<ul>
							<li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
							<li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
							<li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-center">

				<p>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
					Copyright &copy;<script>
						document.write(new Date().getFullYear());
					</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
					<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
				</p>
			</div>
		</div>
	</div>
</footer>



<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
		<circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
		<circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
	</svg></div>


<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery-migrate-3.0.1.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/popper.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/bootstrap.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.easing.1.3.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.waypoints.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.stellar.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/owl.carousel.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/aos.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.animateNumber.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/bootstrap-datepicker.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/jquery.timepicker.min.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/google-map.js"></script>
<script src="<?= base_url('asset/carbook-master/') ?>js/main.js"></script>
<script>
	function highlightStar(obj, id) {
		removeHighlight(id);
		$('#rate-' + id + ' li').each(function(index) {
			$(this).addClass('highlight');
			if (index == $('#rate-' + id + ' li').index(obj)) {
				return false;
			}
		});
	}

	// event yang terjadi pada saat kita mengarahkan kursor kita ke sebuah object
	function removeHighlight(id) {
		$('#rate-' + id + ' li').removeClass('selected');
		$('#rate-' + id + ' li').removeClass('highlight');
	}

	function addRating(obj, id) {
		$('#rate-' + id + ' li').each(function(index) {
			$(this).addClass('selected');
			$('#rate-' + id + ' #rating').val((index + 1));
			if (index == $('#rate-' + id + ' li').index(obj)) {
				return false;
			}
		});
		$.ajax({
			url: "<?php echo base_url('berita/tambah_rating'); ?>",
			data: 'id=' + id + '&rating=' + $('#rate-' + id + ' #rating').val(),
			type: "POST"
		});
	}

	function resetRating(id) {
		if ($('#rate-' + id + ' #rating').val() != 0) {
			$('#rate-' + id + ' li').each(function(index) {
				$(this).addClass('selected');
				if ((index + 1) == $('#rate-' + id + ' #rating').val()) {
					return false;
				}
			});
		}
	}
</script>
</body>

</html>