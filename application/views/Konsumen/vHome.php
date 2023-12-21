<div class="hero-wrap ftco-degree-bg" style="background-image: url('<?= base_url('asset/carbook-master/') ?>images/bg_1.jpg');" data-stellar-background-ratio="0.5">
	<div class="overlay"></div>
	<div class="container">
		<div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
			<div class="col-lg-8 ftco-animate">
				<div class="text w-100 text-center mb-md-5 pb-md-5">
					<h1 class="mb-4">Autocare Kuningan</h1>
					<p style="font-size: 18px;">Selamat Datang Konsumen, Nikmati Pelayanan Service dari Autocare Kuningan</p>

				</div>
			</div>
		</div>
	</div>
</div>

<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row no-gutters">
			<div class="col-md-12	featured-top">
				<div class="row no-gutters">
					<div class="col-md-6 d-flex align-items-center">
						<form action="<?= base_url('Konsumen/cHome/reservasi') ?>" method="POST" class="request-form ftco-animate bg-primary">
							<h2>Reservasi Service</h2>
							<?php
							if ($this->session->userdata('success')) {
							?>
								<div class="alert alert-success" role="alert">
									<?= $this->session->userdata('success') ?>
								</div>
							<?php
							}
							?>
							<div class="d-flex">
								<div class="form-group mr-2">
									<label for="" class="label">Plat Kendaraan</label>
									<input type="text" name="plat" class="form-control" placeholder="Masukkan Plat Kendaraan" required>
								</div>
								<div class="form-group ml-2">
									<label for="" class="label">Tahun Kendaraan</label>
									<input type="text" name="tahun" class="form-control" placeholder="Masukkan Tahun Kendaraan" required>
								</div>
							</div>

							<div class="d-flex">
								<div class="form-group mr-2">
									<label for="" class="label">Model Kendaraan</label>
									<select class="custom-select" name="model" required>
										<option value="">---Model Kendaraan---</option>
										<option value="Sedan">Sedan</option>
										<option value="Mini Van">Mini Van</option>
									</select>
								</div>
								<div class="form-group ml-2">
									<label for="" class="label">Brand Kendaraan</label>
									<select class="custom-select" name="brand" required>
										<option value="">---Brand Kendaraan---</option>
										<option value="Honda">Honda</option>
										<option value="Suzuki">Suzuki</option>
										<option value="BMW">BMW</option>
										<option value="Daihatsu">Daihatsu</option>
										<option value="Toyota">Toyota</option>
									</select>
								</div>
							</div>
							<div class="d-flex">
								<div class="form-group mr-2">
									<label for="" class="label">Jam Kedatangan</label>
									<input type="time" name="jam" min="08:00" max="16:00" name="plat" class="form-control" placeholder="Masukkan Plat Kendaraan" required>
								</div>
								<div class="form-group ml-2">
									<label for="" class="label">Jenis Service</label>
									<select class="custom-select" name="jenis" required>
										<option value="">---Jenis Service---</option>
										<option value="Ganti Oli">Ganti Oli</option>
										<option value="Tune Up">Tune Up</option>
										<option value="Ganti Aki">Ganti Aki</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Service Now" class="btn btn-secondary py-3 px-4">
							</div>
						</form>
					</div>
					<div class="col-md-6 d-flex align-items-center">
						<div class="services-wrap rounded-right w-100">
							<h3 class="heading-section mb-4">Better Way to Service Your Perfect Vehicle</h3>
							<div class="row d-flex mb-4">
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Choose Location</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Select the Best Deal</h3>
										</div>
									</div>
								</div>
								<div class="col-md-4 d-flex align-self-stretch ftco-animate">
									<div class="services w-100 text-center">
										<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
										<div class="text w-100">
											<h3 class="heading mb-2">Reserve Your Service Vehicle</h3>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
</section>


<section class="ftco-section ftco-no-pt bg-light">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12 heading-section text-center ftco-animate mb-5">
				<span class="subheading">Informasi Sparepart</span>
				<h2 class="mb-2">Sparepart Autocare - Kuningan</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="carousel-car owl-carousel">
					<?php
					foreach ($sparepart as $key => $value) {
					?>
						<div class="item">
							<div class="car-wrap rounded ftco-animate">
								<div class="img rounded d-flex align-items-end" style="background-image: url(<?= base_url('asset/foto-sparepart/' . $value->gambar) ?>);">
								</div>
								<div class="text">
									<h2 class="mb-0"><a href="#"><?= $value->nama_sparepart ?></a></h2>
									<div class="d-flex mb-3">
										<span class="cat"><?= $value->satuan ?></span>
										<p class="price ml-auto">Rp. <?= number_format($value->harga) ?><span> /<?= $value->satuan ?></span></p>
									</div>
								</div>
							</div>
						</div>
					<?php
					}
					?>


				</div>
			</div>
		</div>
	</div>
</section>



<section class="ftco-section ftco-intro" style="background-image: url(<?= base_url('asset/carbook-master/') ?>images/bg_3.jpg);">
	<div class="overlay"></div>
	<div class="container">
		<div class="row justify-content-end">
			<div class="col-md-6 heading-section heading-section-white ftco-animate">
				<h2 class="mb-3">Do You Want To Earn With Us? So Don't Be Late.</h2>
			</div>
		</div>
	</div>
</section>


<section class="ftco-section testimony-section bg-light">
	<div class="container">
		<div class="row justify-content-center mb-5">
			<div class="col-md-7 text-center heading-section ftco-animate">
				<span class="subheading">Testimonial</span>
				<h2 class="mb-3">Happy Clients</h2>
			</div>
		</div>
		<div class="row ftco-animate">
			<div class="col-md-12">
				<div class="carousel-testimony owl-carousel ftco-owl">
					<?php
					foreach ($ulasan as $key => $value) {
					?>
						<div class="item">
							<div class="testimony-wrap rounded text-center py-4 pb-5">
								<div class="user-img mb-2" style="background-image: url(<?= base_url('asset/carbook-master/') ?>images/person_1.jpg)">
								</div>
								<div class="text pt-4">
									<p class="mb-4"><?= $value->testimoni ?></p>
									<p class="name"><?= $value->nama_pelanggan ?></p>
									<?php
									if ($value->rating == '0') {
									?>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
									<?php
									} else if ($value->rating == '1') {
									?>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
									<?php
									} else if ($value->rating == '2') {
									?>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
									<?php
									} else if ($value->rating == '3') {
									?>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star"></span>
										<span class="ion-ios-star"></span>
									<?php
									} else if ($value->rating == '4') {
									?>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star"></span>
									<?php
									} else if ($value->rating == '5') {
									?>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
										<span class="ion-ios-star checked"></span>
									<?php
									}
									?>
								</div>
							</div>
						</div>
					<?php
					}
					?>


				</div>
			</div>
		</div>
	</div>
</section>